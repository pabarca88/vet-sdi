<div class="videocall">

@include('general.secciones_ficha.video_llamada.seccion_jaas_container')


</div>
<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
		<div class="col-md-12 py-0 px-2">
			<div class="row mx-0">

				<div class="col-sm-12 col-md-12">
					<ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
						<li class="nav-item-secciones">
							<a  class="nav-secciones active text-uppercase" id="atencion-diagnostica-tab" data-toggle="tab" href="#atencion-diagnostica" role="tab" aria-controls="atencion-diagnostica" aria-selected="true">Atención especialidad</a>
						</li>
						<li class="nav-item-secciones">
							<a onclick="dame_atencion_sico()" class="nav-secciones text-uppercase" id="atencion_sicosocial-tab" data-toggle="tab" href="#atencion_sicosocial" role="tab" aria-controls="atencion_sicosocial" aria-selected="false">Evaluación Psicosocial</a>
						</li>
                          @if($tiene_controles == 1)
						<li class="nav-item-secciones">
								<a class="nav-secciones  text-uppercase" onclick="dame_control()" id="evolucion-tab" data-toggle="tab" href="#evolucion" role="tab" aria-controls="evolucion" aria-selected="true">Evolución</a>
						</li>
                        <li class="nav-item-secciones">
								<a class="nav-secciones  text-uppercase" onclick="dame_historial_controles()" id="evolucion-tab" data-toggle="tab" href="#historial_evolucion" role="tab" aria-controls="historial_evolucion" aria-selected="true">Historial Evolución</a>
						</li>
                        @endif
					</ul>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="form-row mb-1">
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
							<div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
							<div class="alert-atencion alert alert-success-b alert-dismissible fade show"  role="alert" id="mensaje_historias"></div>
						</div>
					</div>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<form action="{{ route('ficha.otro.prof.registrar_ficha_sico') }}" method="POST">
						<input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
						<input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
						<input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
						<input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
						<input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
						<input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
						<input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
						<input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
						<input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
						<input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
						<input type="hidden" name="mostrarpdf" id="mostrarpdf" value="0">
						<input type="hidden" name="tipopdf" id="tipopdf" value="0">
						<input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                        <input type="hidden" name="hora_agendada" id="hora_agendada" value="0">
                        <input type="hidden" name="finalizando_sesiones" id="finalizando_sesiones" value="0">
                        <input type="hidden" name="id_plan" id="id_plan" value="0">
						@csrf
						<div class="tab-content" id="ficha-ad-psico">
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-message">
                                    <strong>Error:</strong> {!! session('error') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-message">
                                    <strong>Éxito:</strong> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                                </div>
                            @endif
							<!--ATENCIÓN  DIAGNOSTICA-->
							<div class="tab-pane fade show active" id="atencion-diagnostica" role="tabpanel" aria-labelledby="atencion-diagnostica">
								<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="row">
											<div class="col-md-12 mt-2 mb-0">
												<h6 class="f-20 text-c-blue mb-3">Atención diagnóstica</h6>
											</div>
										</div>
										<!--FORMULARIOS-->
										<div class="row">
											<!--MOTIVO CONSULTA-->
											<!--RESPONSABLE-->
											<!--Formulario / Menor de edad-->
											@include('general.secciones_ficha.seccion_menor')
											<!--Cierre: Formulario / Menor de edad-->
											<!--INFORMACIÓN-->
											@include('atencion_otros_prof.secciones_especialidad.includes.generales.motivo_cons')
											<!--ANTECEDENTES FAMILIARES-->
											{{--  @include('atencion_otros_prof.secciones_especialidad.includes.generales.antecedentes')  --}}
											<!--ANTECEDENTES PSICO-SOCIALES-->
											{{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
												<div class="card-a">
													<div class="card-header-a" id="ant_gen">
														<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#ant_gen-c" aria-expanded="false" aria-controls="ant_gen-c">
														Antecedentes Psico-sociales
														</button>
													</div>
													<div id="ant_gen-c" class="collapse" aria-labelledby="ant_gen" data-parent="#ant_gen">
														<div class="card-body-aten-a">
															<div class="row">
																<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
																	<ul class="nav nav-tabs-aten nav-fill mb-3" id="myTab" role="tablist">
																		<li class="nav-item">
																			<a class="nav-link-aten text-reset active" id="ps_ant_gen_tab" data-toggle="tab" href="#ps_ant_gen" role="tab" aria-controls="ps_ant_gen" aria-selected="true">Generales</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link-aten text-reset" id="residencia_tab" data-toggle="tab" href="#residencia" role="tab" aria-controls="residencia" aria-selected="false">Residencia</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link-aten text-reset" id="psi_habitos_tab" data-toggle="tab" href="#psi_habitos" role="tab" aria-controls="psi_habitos" aria-selected="false">Hábitos</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link-aten text-reset" id="psi_trabajo_tab" data-toggle="tab" href="#psi_trabajo" role="tab" aria-controls="psi_trabajo" aria-selected="false">Trabajo</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link-aten text-reset" id="psi_esparcimiento_tab" data-toggle="tab" href="#psi_esparcimiento" role="tab" aria-controls="psi_esparcimiento" aria-selected="false">Esparcimiento</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link-aten text-reset" id="psi_obs_gen_ant_tab" data-toggle="tab" href="#psi_obs_gen_ant" role="tab" aria-controls="psi_obs_gen_ant" aria-selected="false">Obs. generales</a>
																		</li>
																	</ul>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
																	<div class="tab-content" id="pediat-contenido">
																		<!--generales-->
																		<div class="tab-pane fade show active" id="ps_ant_gen" role="tabpanel" aria-labelledby="ps_ant_gen_tab">
																			<div class="form-row">
																				<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
																					<label class="floating-label-activo-sm" for="lugar_nacimiento">Lugar de nacimiento</label>
																					<input type="text" class="form-control form-control-sm" name="lugar_nacimiento" id="lugar_nacimiento">
																				</div>
																				<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
																					<label class="floating-label-activo-sm" for="estado_civil">Estado civil</label>
																					<select class="form-control form-control-sm" name="estado_civil" id="estado_civil">
																					<option value="0">Seleccione</option>
																					<option value="1">Soltero/a</option>
																					<option value="2">En pareja</option>
																					<option value="3">Casado/a</option>
																					<option value="4">Separado/a</option>
																					<option value="5">Viudo/a</option>
																					</select>
																				</div>
																				<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
																					<label class="floating-label-activo-sm" for="niv_ed">Nivel de educación</label>
																					<select class="form-control form-control-sm" name="niv_ed" id="niv_ed">
																					<option value="0">Seleccione</option>
																					<option value="1">Básica incompleta</option>
																					<option value="2">Básica completa</option>
																					<option value="3">Ens. Media incompleta</option>
																					<option value="4">Ens. Media completa</option>
																					<option value="5">Universitaria incompleta</option>
																					<option value="6">Universitaria completa</option>
																					</select>
																				</div>
																				<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
																					<label class="floating-label-activo-sm" for="ocupacion">Ocupación</label>
																					<input type="text" class="form-control form-control-sm" name="ocupacion" id="ocupacion">
																				</div>
																				<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
																					<label class="floating-label-activo-sm" for="religion">Religión</label>
																					<input type="text" class="form-control form-control-sm" name="religion" id="religion">
																				</div>
																			</div>
																		</div>
																		<!--residencia-->
																		<div class="tab-pane fade show" id="residencia" role="tabpanel" aria-labelledby="residencia_tab">
																			<div class="form-row">
																				<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																					<label class="floating-label-activo-sm" for="vive_con">Vive con</label>
																					<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="vive_con" id="vive_con"></textarea>
																				</div>
																				<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																					<label class="floating-label-activo-sm" for="vive_obs">Observaciones</label>
																					<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="vive_obs" id="vive_obs"></textarea>
																				</div>
																			</div>
																		</div>
																		<!--habitos-->
																		<div class="tab-pane fade show" id="psi_habitos" role="tabpanel" aria-labelledby="psi_habitos_tab">

																			<div class="form-row">
																				<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																					<label class="floating-label-activo-sm" for="alcohol">Consumo de alcohol</label>
																					<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="alcohol" id="alcohol"></textarea>
																				</div>
																				<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																					<label class="floating-label-activo-sm"for="tabaco" >Consumo de tabaco</label>
																					<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="tabaco" id="tabaco"></textarea>
																				</div>
																				<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																					<label class="floating-label-activo-sm" for="sustancias_ilicitas">Consumo de sust. ilícitas</label>
																					<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sustancias_ilicitas" id="sustancias_ilicitas"></textarea>
																				</div>
																				<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																					<label class="floating-label-activo-sm" for="sexualidad">Sexualidad</label>
																					<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sexualidad" id="sexualidad"></textarea>
																				</div>
																				<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
																					<label class="floating-label-activo-sm" for="com_generales">Comentarios generales</label>
																					<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="com_generales" id="com_generales"></textarea>
																				</div>
																			</div>

																		</div>
																		<!--trabajo-->
																		<div class="tab-pane fade" id="psi_trabajo" role="tabpanel" aria-labelledby="psi_trabajo_tab">

																			<div class="form-row">
																				<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
																					<label class="floating-label-activo-sm" for="ant_laborales">Antecedentes laborales</label>
																					<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_laborales" id="ant_laborales"></textarea>
																				</div>
																			</div>

																		</div>
																		<!--esparcimiento-->
																		<div class="tab-pane fade" id="psi_esparcimiento" role="tabpanel" aria-labelledby="psi_esparcimiento_tab">

																			<div class="form-row">
																				<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
																					<label class="floating-label-activo-sm" for="ant_esparc" >Esparcimiento</label>
																					<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_esparc" id="ant_esparc"></textarea>
																				</div>
																			</div>

																		</div>
																		<!--OBSERVACIONES GENERALES-->
																		<div class="tab-pane fade show " id="psi_obs_gen_ant" role="tabpanel" aria-labelledby="psi_obs_gen_ant_tab">
																			<div class="form-row">

																				<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
																					<label class="floating-label-activo-sm" for="obs_generales" >Observaciones generales</label>
																					<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="obs_generales" id="obs_generales"></textarea>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>  --}}
											<!--BIOPATOGRAFÍA-->
											{{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
												<div class="card-a">
													<div class="card-header-a" id="biopato">
														<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#biopato-c" aria-expanded="false" aria-controls="biopato-c">
														Biopatografía
														</button>
													</div>
													<div id="biopato-c" class="collapse" aria-labelledby="biopato" data-parent="#biopato">
														<div class="card-body-aten-a">

															<div class="form-row">
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="prenatal"  >Prenatal</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="prenatal" id="prenatal"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="natal"  >Natal</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="natal" id="natal"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="infancia" >Infancia</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="infancia" id="infancia"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="adolescencia" >Adolescencia</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="adolescencia" id="adolescencia"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="edad_adulta" >Edad adulta</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="edad_adulta" id="edad_adulta"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="ad_mayor" >Adulto mayor</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ad_mayor" id="ad_mayor"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
																	<label class="floating-label-activo-sm"for="actualidad"  >Actualidad</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="actualidad" id="actualidad"></textarea>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>  --}}

											<!--ANTECEDENTES MÉDICOS, PSIQUIATRICOS, PSICOLÓGICOS-->
											{{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
												<div class="card-a">
													<div class="card-header-a" id="a-med">
														<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#a-med-c" aria-expanded="false" aria-controls="a-med-c">
														Antecedentes médicos, psiquiatricos, psicológicos
														</button>
													</div>
													<div id="a-med-c" class="collapse" aria-labelledby="a-med" data-parent="#a-med">
														<div class="card-body-aten-a">

															<div class="form-row">
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="ant_medicos">Antecedentes médicos</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_medicos" id="ant_medicos"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="ant_suicidio">Ant. de suicidio (paciente o familiares)</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="ant_suicidio" id="ant_suicidio"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="enf_mentales">Ant. de enfermedades mentales (paciente o familiares)</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="enf_mentales" id="enf_mentales" ></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="trat_psicologicos_prev">Tratamientos psicológicos previos</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="trat_psicologicos_prev" id="trat_psicologicos_prev"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="trat_psiquiatricos_prev">Tratamientos psiquiátricos previos</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="trat_psiquiatricos_prev" id="trat_psiquiatricos_prev"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="medicacion_actual">Medicación (actual)</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="medicacion_actual" id="medicacion_actual"></textarea>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>  --}}
											{{--  @include('atencion_otros_prof.secciones_especialidad.includes.generales.eval_psiconeuro')  --}}
											<!--EXÁMEN MENTAL-->
											{{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
												<div class="card-a">
													<div class="card-header-a" id="exmental">
														<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exmental-c" aria-expanded="false" aria-controls="exmental-c">
														Examen mental
														</button>
													</div>
													<div id="exmental-c" class="collapse" aria-labelledby="exmental" data-parent="#exmental">
														<div class="card-body-aten-a">

															<div class="form-row">
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="presentacion">Presentación</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="presentacion" id="presentacion"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="conciencia">Conciencia</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="conciencia" id="conciencia"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="actitud">Actitud</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="actitud" id="actitud"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="atencion_concentracion">Atención y concentración</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="atencion_concentracion" id="atencion_concentracion"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="afectividad">Afectividad</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="afectividad" id="afectividad"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="pensamiento">Pensamiento</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="pensamiento" id="pensamiento"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="sensopercepcion">Sensopercepción</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sensopercepcion" id="sensopercepcion"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="psicomotricidad">Psicomotricidad</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psicomotricidad" id="psicomotricidad"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="sueno">Sueño</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sueno" id="sueno"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="higiene">Higiene</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="higiene" id="higiene"></textarea>
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm"for="alimentacion">Alimentación</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="alimentacion" id="alimentacion"></textarea>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>  --}}
											<!--PLAN DE TRABAJO-->
											<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
												<div class="card-a">
													<div class="card-header-a" id="plan-trabajo">
														<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left" type="button" data-toggle="collapse" data-target="#plan-trabajo-c" aria-expanded="true" aria-controls="plan-trabajo-c">
														Plan de trabajo
														</button>
													</div>
													<div id="plan-trabajo-c" class="collapse show" aria-labelledby="plan-trabajo" data-parent="#plan-trabajo">
														<div class="card-body-aten-a">

															<div class="form-row">
																<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
																	{{-- <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="ind_terapia();"><i class="feather icon-plus"></i> Plan de tratamiento</button> --}}
                                                                    <button type="button"
                                                                    class="btn btn-outline-primary btn-block btn-sm "
                                                                    onclick="hora_medica_pedir({{ $profesional->id }},{{ $id_lugar_atencion }}); dame_plan_tratamiento({{ $id_ficha_atencion }})"><i
                                                                        class="feather icon-file-plus"></i> Plan de
                                                                    Tratamiento</button>
																</div>

																<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
																	<button type="button" class="btn btn-primary-light-c btn-block btn-sm" onclick="ind_ic_psi();"><i class="feather icon-plus"></i> Indicar Interconsulta Siquiatría</button>
																</div>
																<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
																	<button type="button" class="btn btn-primary-light-c btn-block btn-sm" onclick="informe_psi();"><i class="feather icon-plus"></i> Enviar Informe</button>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>
											<!--DIAGNÓSTICO Y PLAN DE TRATAMIENTO-->
											<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
												<div class="card-a">
													<div class="card-header-a" id="diagnostico">
														<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left" type="button" data-toggle="collapse" data-target="#diagnostico-c" aria-expanded="false" aria-controls="diagnostico-c">
														Diagnóstico e Indicaciones
														</button>
													</div>
													<div id="diagnostico-c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
														<div class="card-body-aten-a">
															<div class="form-row">
																<div class="form-group col-md-4">
																	<label class="floating-label-activo-sm"for="hipotesis">Hipótesis diagnóstica</label>
																	<input type="text" class="form-control form-control-sm"  data-input_igual="hipotesis_certificado,eno_diagnositico_confirmado,diagnostico_tratamiento" name="hipotesis" id="hipotesis" onchange="cargarIgual('hipotesis')">
																</div>
																<div class="form-group col-md-4">
																	<label class="floating-label-activo-sm"for="indicaciones">Indicaciones</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="indicaciones" id="indicaciones"></textarea>
																</div>
																<div class="form-group col-md-4">
																	<label class="floating-label-activo-sm"for="pronostico">Pronóstico</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="pronostico" id="pronostico"></textarea>
																</div>
															</div>
															<div class="form-row">

																{{--  <div class="form-group col-md-4">
																	<label class="floating-label-activo-sm"for="indicaciones">DSM-5  (Por grupo Patología)</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="indicaciones" id="indicaciones"></textarea>
																</div>  --}}
																 <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="descripcion_cie">Diagnóstico CIE-10</label>
																	<input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,descripcion_cie_esp,eno_diagnostico_cie" name="descripcion_cie" id="descripcion_cie" value="" onchange="cargarIgual('descripcion_cie')">
																	<input type="hidden" class="form-control form-control-sm" data-input_igual="id_lic_descripcion_cie,id_descripcion_cie_esp,eno_id_diagnostico_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="" onchange="cargarIgual('id_descripcion_cie')">
																</div>
																<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
																	<label class="floating-label-activo-sm" for="descripcion_dsm-5">Diagnóstico DSM-5</label>
																	<input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,descripcion_cie_esp,eno_diagnostico_cie" name="descripcion_dsm-5" id="descripcion_dsm-5" value="" onchange="cargarIgual('descripcion_dsm-5')">
																	<input type="hidden" class="form-control form-control-sm" data-input_igual="id_lic_descripcion_cie,id_descripcion_cie_esp,eno_id_diagnostico_cie" name="id_descripcion_dsm-5" id="id_descripcion_dsm-5" value="" onchange="cargarIgual('id_descripcion_dsm-5')">
																</div>

															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<!--GUARDAR O IMPRIMIR FICHA-->
											<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
												<div class="row mb-3">
													<div class="col-md-12 text-center">
														<input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
														<input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="atencion_sicosocial" role="tabpanel" aria-labelledby="atencion_sicosocial">
								@include('general.secciones_ficha.siquiatria.eval_sicosocial')
							</div>
							<!--EVOLUCION-->
							<div class="tab-pane fade" id="evolucion" role="tabpanel" aria-labelledby="evolucion">
								@include('atencion_otros_prof.secciones_especialidad.includes.generales.evolucion')
							</div>
                            <!--EVOLUCION-->
							<div class="tab-pane fade" id="historial_evolucion" role="tabpanel" aria-labelledby="historial_evolucion">
								@include('atencion_otros_prof.secciones_especialidad.includes.generales.historial_evolucion')
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


@include('atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.modal_indicar_terapia')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.m_interconsulta_psi')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.informe_psico')
<!-- MODAL AGREGAR HORA MEDICA -->
<div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info pt-3 pb-2">
                <h5 class="modal-title text-white text-center">Tomar hora</h5>
                <button id="cerrar_tomar_hora" type="button" class="close text-white close_agenda_agregar_paciente" onclick="$('#agenda_agregar_paciente').modal('hide');" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                {{--  BUSCADOR DE RUT  --}}
                <div class="row div_rut_buscar">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <h6 class="text-c-blue ml-2 mb-3">Ingrese el rut del paciente</h6>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8 mb-3">
                        <form id="validacion_rut_form">
                            <div class="form-group" id="validacion_rut_div">
                                <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <button class="btn btn-info" onclick="buscar_paciente();" type="button" id="button-addon2">
                            Buscar
                        </button>
                    </div>
                </div>



                <form id="form_reseva_de_horas">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="reserva_hora_id_profesional" name="reserva_hora_id_profesional" value="">
                    <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">
                    <input type="hidden" id="reserva_hora_id_lugar_atencion" name="reserva_hora_id_lugar_atencion" value="">
                    <input type="hidden" id="reserva_hora_fecha_consulta" name="reserva_hora_fecha_consulta" value="">
                    <input type="hidden" id="reserva_hora_hora_consulta" name="reserva_hora_hora_consulta" value="">
                    <input type="hidden" id="reserva_hora_origen" name="reserva_hora_origen" value="escritorio_paciente">
                    <input type="hidden" id="reserva_hora_id_asistente" name="reserva_hora_id_asistente" value="2">

                    {{--  VISUALIZACION DE DATOS DEL PACIENTE  --}}
                    <div id="reserva_datos_paciente" class="row mx-3">
                        <table class="table table-borderless table-xs">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <strong>Rut</strong>
                                    </th>
                                    <td><span id="reserva_rut_paciente"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Nombre</strong>
                                    </th>
                                    <td><span id="reserva_hora_nombre"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Fecha Nacimiento</strong>
                                    </th>
                                    <td><span id="reserva_fecha_nacimiento"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Sexo</strong>
                                    </th>
                                    <td><span id="reserva_sexo"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Convenio</strong>
                                    </th>
                                    <td><span id="reserva_convenio"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Dirección</strong>
                                    </th>
                                    <td><span id="reserva_direccion"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Correo Electrónico</strong>
                                    </th>
                                    <td id="reserva_hora_email"></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Teléfono</strong>
                                    </th>
                                    <td><span id="reserva_hora_telefono"></span></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Descripción Reserva</label>
                                <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger close_agenda_agregar_paciente" onclick="$('#agenda_agregar_paciente').modal('hide');" data-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="agendar_hora();" class="btn btn-info">Agendar Hora</button>

                        </div>
                    </div>

                    {{--  FORMULARIO DE PACIENTE NUEVO  --}}
                    <div id="reserva_agregar_paciente_hora">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    Paciente no registrado, complete los datos para registrar al paciente
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombres</label>
                                    <input type="text" required class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Primer Apellido</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Segundo Apellido</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">F. Nacimiento</label>
                                    <input type="date" class="form-control form-control-sm" name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sexo</label>
                                    <select id="reserva_hora_sexo" name="reserva_hora_sexo" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                    <select id="reserva_hora_profesion" name="reserva_hora_profesion" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($profesion_oficio))
                                            @foreach ($profesion_oficio as $prof_ofic)
                                                <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                    <select id="reserva_hora_convenio" name="reserva_hora_convenio" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($prevision))
                                            @foreach ($prevision as $p)
                                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-9 col-md-9">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                    <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                                </div>
                            </div>

                            <div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N&uacute;mero</label>
                                    <input type="address" class="form-control form-control-sm" name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Region</label>
                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control" required>
                                        <option value="0">Seleccione Regi&oacute;n</option>
                                        @if (isset($region))
                                            @foreach ($region as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                        <option value="0">Seleccione Ciudad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                    <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda()" name="reserva_hora_correo" id="reserva_hora_correo">
                                    <span id="mensaje_email_reserva" style="display:none"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                    <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Descrici&oacute;n Reserva</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="text-c-blue ml-2 mb-3">Enviar confirmaci&oacute;n</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                        <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                        <label class="custom-control-label" for="sms">SMS</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger close_agenda_agregar_paciente"  onclick="$('#agenda_agregar_paciente').modal('hide');">Cancelar</button>
                            <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();" class="btn btn-info">
                                Tomar Hora
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- FIN MODAL AGREGAR HORA MEDICA -->
<!-- MODAL CONTROL NUTRICIONAL HISTORIAL -->
<div class="modal fade" id="modalControlPsicologica" tabindex="-1" role="dialog" aria-labelledby="modalControlPsicologica" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h6 class="modal-title text-primary f-18">Control Psicológico</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalControlPsicologica').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                        <h6 class="text-c-blue f-20">Historial de controles</h6>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                        <div class="card-informacion">
                            <div class="card-body" id="contenido_control_nutricional_historial">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL CONTROL NUTRICIONAL HISTORIAL -->
<!-- MODAL AGREGAR SESIONES -->
<div class="modal fade" id="agregar_sesiones" tabindex="-1" role="dialog" aria-labelledby="agregarSesionesLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="agregarSesionesLabel">Agregar Sesiones al Plan Psicológico</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <p>Estás finalizando las sesiones actuales. Si deseas continuar, ingresa la cantidad de nuevas sesiones que deseas agregar:</p>

        <div class="form-group">
          <label for="input_sesiones_adicionales">Cantidad de nuevas sesiones</label>
          <input type="number" class="form-control" id="input_sesiones_adicionales" min="1" placeholder="Ej: 3">
        </div>

        <div class="alert alert-danger d-none" id="error_sesion_alert">
          Debes ingresar una cantidad válida mayor a cero.
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="confirmar_agregar_sesiones()">Guardar</button>
      </div>

    </div>
  </div>
</div>
<!-- -->
@section('page-script-ficha-atencion')
    <script>
        // DECLARACIÓN GLOBAL (accesible desde cualquier parte del script)
        var archivosSubidos = [];
        document.addEventListener('DOMContentLoaded', function () {
            const btnGrabar = document.getElementById('btnGrabarvoz');
            const campoTexto = document.getElementById('com_inf_fono');
            const estado = document.getElementById('estado_voz_voz');

            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

            if (!SpeechRecognition) {
                btnGrabar.disabled = true;
                estado.textContent = 'Navegador no compatible con dictado por voz.';
                return;
            }

            const reconocimiento = new SpeechRecognition();
            reconocimiento.lang = 'es-CL';
            reconocimiento.continuous = false;
            reconocimiento.interimResults = false;

            btnGrabar.addEventListener('click', () => {
                reconocimiento.start();
                estado.textContent = '🎙️ Escuchando...';
            });


            reconocimiento.onresult = function (event) {
                const resultado = event.results[0][0].transcript;
                campoTexto.value += (campoTexto.value ? ' ' : '') + resultado;
            };

            reconocimiento.onend = function () {
                estado.textContent = '✅ Dictado finalizado.';
            };

            reconocimiento.onerror = function (event) {
                estado.textContent = '❌ Error: ' + event.error;
            };
            iniciarVozIndex();
        });


        function iniciarVozIndex(){
            const btnGrabarIndex = document.getElementById('btnGrabarvozIndex');
            const campoTextoIndex = document.getElementById('evol_indicaciones');
            const estadoIndex = document.getElementById('estado_voz_index');

            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

            if (!SpeechRecognition) {
                btnGrabarIndex.disabled = true;
                estadoIndex.textContent = 'Navegador no compatible con dictado por voz.';
                return;
            }

            const reconocimiento = new SpeechRecognition();
            reconocimiento.lang = 'es-CL';
            reconocimiento.continuous = false;
            reconocimiento.interimResults = false;

            btnGrabarIndex.addEventListener('click', () => {
                reconocimiento.start();
                estadoIndex.textContent = '🎙️ Escuchando...';
            });


            reconocimiento.onresult = function (event) {
                const resultado = event.results[0][0].transcript;
                campoTextoIndex.value += (campoTextoIndex.value ? ' ' : '') + resultado;
            };

            reconocimiento.onend = function () {
                estadoIndex.textContent = '✅ Dictado finalizado.';
            };

            reconocimiento.onerror = function (event) {
                estadoIndex.textContent = '❌ Error: ' + event.error;
            };
        }
    </script>
<script>
	$(document).ready(function() {
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


			 $("#descripcion_dsm-5").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('profesional.getDSM-5') }}",
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
                    $('#descripcion_dsm-5').val(ui.item.label); // display the selected text
                    $('#id_descripcion_dsm-5').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        });
</script>
@endsection
<script>
    function cargarIgual(input)
    {

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
       /** CARGAR mensaje */
            $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio el resto es opcional.');
            $('#mensaje_ficha').show();
            setTimeout(function(){
                $('#mensaje_ficha').hide();
            }, 5000);
            @if($fichas->count()>0)
                $('#mensaje_historias').html(' El paciente posee historia medica previa. ');
            @else
                $('#mensaje_historias').html(' Primera consulta del paciente. ');
            @endif
                $('#mensaje_historias').show();
                setTimeout(function(){
                    $('#mensaje_historias').hide();
                }, 6000);

    function evaluar_hermanos() {
        var valor = $('#tiene_hnos').val();

        if (valor == '0') {
            $('#cantidad_hnos').attr('disabled', true).val('');
            $('.btn-agregar-hermanos').attr('disabled', true);
            $('#contenedor_hermanos').html('');
        } else if (valor == '1') {
            if ($('.hermanos').length === 0) {
                agregarHermanos(); // Solo agrega si no hay ninguno
            }
            $('#cantidad_hnos').attr('disabled', true);
            $('.btn-agregar-hermanos').attr('disabled', false);
        }
    }


    function agregarHermanos() {
        var cantidad = $('.hermanos').length;
        if (cantidad >= 10) {
            swal({
                title:'Error',
                text:'No se pueden agregar más de 10 hermanos',
                icon:'error'
            });
            return;
        }

        cantidad++;
        var html = '';
        html += '<div class="hermanos" id="hermanos_' + cantidad + '">';
        html += '    <div class="form-row">';
        html += '        <div class="col-sm-12 col-md-6">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Nombre Hermano/a</label>';
        html += '                <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_hno_' + cantidad + '" id="psi_hf_nombre_hno_' + cantidad + '">';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-6">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Relación con Hermano</label>';
        html += '                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="psi_rel_hf_hno_' + cantidad + '" id="psi_hf_rel_hno_' + cantidad + '"></textarea>';
        html += '            </div>';
        html += '        </div>';
        html += '    </div>';
        html += '</div>';

        $('#contenedor_hermanos').append(html);
        $('#cantidad_hnos').val(cantidad);
    }


    function quitarHermano() {
        var cantidad = $('.hermanos').length;

        if (cantidad > 0) {
            $('#hermanos_' + cantidad).remove();
            cantidad--;
            $('#cantidad_hnos').val(cantidad);
        }

        if (cantidad === 0) {
            $('#tiene_hnos').val('0');
            evaluar_hermanos();
        }
    }




    function evaluar_hijos() {
        var valor = $('#tiene_hijos').val();

        if (valor == '0') {
            $('#cantidad_hijos').attr('disabled', true).val('');
            $('.btn-agregar-hijos').attr('disabled', true);
            $('#contenedor_hijo').html('');
        } else if (valor == '1') {
            if ($('.hijos').length === 0) {
                agregarHijo();
            }
            $('#cantidad_hijos').attr('disabled', true);
            $('.btn-agregar-hijos').attr('disabled', false);
        }
    }

    function agregarHijo(){
        var cantidad = $('.hijos').length;
        if (cantidad >= 10) {
            swal({
                title:'Error',
                text:'No se pueden agregar más de 10 hermanos',
                icon:'error'
            });
            return;
        }

        cantidad++;
        var html = '';
        html += '<div class="hijos" id="hijo_'+cantidad+'">';
        html += '   <div class="form-row">';
        html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '           <div class="form-group">';
        html += '               <label class="floating-label-activo-sm">Nombre Hijo/a</label>';
        html += '               <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_hijo_'+cantidad+'" id="psi_hf_nombre_hijo_'+cantidad+'">';
        html += '           </div>';
        html += '       </div>';
        html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '           <div class="form-group">';
        html += '               <label class="floating-label-activo-sm">Relación con Hijo/a</label>';
        html += '               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_hijo_'+cantidad+'" id="psi_hf_rel_hijo_'+cantidad+'"></textarea>';
        html += '           </div>';
        html += '       </div>';
        html += '   </div>';
        html += '</div>';

        $('#contenedor_hijo').append(html);
        $('#cantidad_hijos').val(cantidad);
    }

    function quitarHijo() {
        var cantidad = $('.hijos').length;

        if (cantidad > 0) {
            $('#hijo_' + cantidad).remove();
            cantidad--;
            $('#cantidad_hijos').val(cantidad);
        }

        if (cantidad === 0) {
            $('#tiene_hijos').val('0');
            evaluar_hijos();
        }
    }


    /* Ponemos "agregarOtro en el ámbito de toda la página */

    function agregarOtro(){
        var cantidad = $('.otro').length;
        if (cantidad >= 10) {
            swal({
                title:'Error',
                text:'No se pueden agregar más de 10 otros',
                icon:'error'
            });
            return;
        }

        cantidad++;
        var html = '';
        html += '<div class="otro" id="otro_'+cantidad+'">';
        html += '   <div class="form-row">';
        html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '           <div class="form-group">';
        html += '               <label class="floating-label-activo-sm">Nombre </label>';
        html += '               <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_ot_per_'+cantidad+'" id="psi_hf_nombre_ot_per_'+cantidad+'">';
        html += '           </div>';
        html += '       </div>';
        html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '           <div class="form-group">';
        html += '               <label class="floating-label-activo-sm">Relación </label>';
        html += '               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_ot_per_'+cantidad+'" id="psi_hf_rel_ot_per_'+cantidad+'"></textarea>';
        html += '           </div>';
        html += '       </div>';
        html += '   </div>';
        html += '</div>';

        $('#contenedor_otro').append(html);
        $('#cantidad_ot_per').val(cantidad);

    }

    function quitarOtro(){
        var cantidad = $('.otro').length;

        if (cantidad > 0) {
            $('#otro_' + cantidad).remove();
            cantidad--;
            $('#cantidad_otros').val(cantidad);
        }

        if (cantidad === 0) {
            $('#tiene_otros').val('0');
        }
    }

   function IsNumeric(valor) {
       var log = valor.length;
       var sw = "S";
       for (x = 0; x < log; x++) {
           v1 = valor.substr(x, 1);
           v2 = parseInt(v1);
           //Compruebo si es un valor numérico
           if (isNaN(v2)) {
               sw = "N";
           }
       }
       if (sw == "S") {
           return true;
       } else {
           return false;
       }
   }

   var primerslap = false;
   var segundoslap = false;

   function formateafecha(fecha) {
       var long = fecha.length;
       var dia;
       var mes;
       var ano;

       if ((long >= 2) && (primerslap == false)) {
           dia = fecha.substr(0, 2);
           if ((IsNumeric(dia) == true) && (dia <= 31) && (dia != "00")) {
               fecha = fecha.substr(0, 2) + "/" + fecha.substr(3, 7);
               primerslap = true;
           } else {
               fecha = "";
               primerslap = false;
           }
       } else {
           dia = fecha.substr(0, 1);
           if (IsNumeric(dia) == false) {
               fecha = "";
           }
           if ((long <= 2) && (primerslap = true)) {
               fecha = fecha.substr(0, 1);
               primerslap = false;
           }
       }
       if ((long >= 5) && (segundoslap == false)) {
           mes = fecha.substr(3, 2);
           if ((IsNumeric(mes) == true) && (mes <= 12) && (mes != "00")) {
               fecha = fecha.substr(0, 5) + "/" + fecha.substr(6, 4);
               segundoslap = true;
           } else {
               fecha = fecha.substr(0, 3);;
               segundoslap = false;
           }
       } else {
           if ((long <= 5) && (segundoslap = true)) {
               fecha = fecha.substr(0, 4);
               segundoslap = false;
           }
       }
       if (long >= 7) {
           ano = fecha.substr(6, 4);
           if (IsNumeric(ano) == false) {
               fecha = fecha.substr(0, 6);
           } else {
               if (long == 10) {
                   if ((ano == 0) || (ano < 1900) || (ano > 2100)) {
                       fecha = fecha.substr(0, 6);
                   }
               }
           }
       }

       if (long >= 10) {
           fecha = fecha.substr(0, 10);
           dia = fecha.substr(0, 2);
           mes = fecha.substr(3, 2);
           ano = fecha.substr(6, 4);
           // Año no viciesto y es febrero y el dia es mayor a 28
           if ((ano % 4 != 0) && (mes == 02) && (dia > 28)) {
               fecha = fecha.substr(0, 2) + "/";
           }
       }
       return (fecha);
   }

    function evaluar_opcion(opcion) {
        console.log(opcion);
        $('#titulo_planificacion').html(opcion);
    }
</script>
<script>
        /*-Agendar hora medica-*/
        function hora_medica_pedir(id_profesional, id_lugar_atencion, tipo_agenda = null){

            $('#modal_reserva_hora_lugar_atencion').val('');
            $('#modal_reserva_dias_atencion').val('');
            $('#modal_reserva_fecha').val('');
            $('#modal_reserva_hora_lista_horas').html('');
            // asigno id profesioanl
            $('#modal_reserva_hora_id_profesional').val(id_profesional);
            $('#modal_reserva_hora_tipo_agenda').val(tipo_agenda);

            carga_calendario_profesional_pedir();

            // cargo lugares de atencion  y asigno lugar con hora mas proxima
            lugar_atencion_profesional($('#modal_reserva_hora_id_profesional'), 'modal_reserva_hora_lugar_atencion', id_lugar_atencion)
            $('#indicar_terapia').modal('show');
        }



        function carga_calendario_profesional_pedir()
        {
            $('#modal_reserva_fecha').val('');
            $('#modal_reserva_fecha').attr('disabled',true);
            $('#modal_reserva_hora_lista_horas').html('');

            let id_profesional = $('#modal_reserva_hora_id_profesional').val();
            let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
            let url = "{{ route('profesional.DiasLaboralesProfesionaLugarAtencionBuscador') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_profesional: id_profesional,
                    lugar_atencion: id_lugar_atencion,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {


                    {{--  calendario(data.registros.horario_agenda_laboral, data.registros.horario_agenda_no_laboral);  --}}

                    if(data.registros.horario_agenda_laboral != '')
                    {
                        console.log(data);
                        let dias = ['','LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                        var dias_activos = data.registros.horario_agenda_laboral.split(',');
                        var dias_texto = '';
                        var cant = 0;

                        $.each(dias_activos, function(index, value)
                        {
                            if(cant>0)
                                dias_texto += ' - '+dias[value];
                            else
                                dias_texto += dias[value];

                            cant++;
                        });

                        $('#modal_reserva_dias_atencion').html(dias_texto);

                        /** calendario */
                        $('#modal_reserva_fecha').attr('disabled',false);

                        $("#modal_reserva_fecha").flatpickr({
                            "disable": [
                                function(date) {
                                    return !dias_activos.includes(String(date.getDay()));
                                }
                            ],
                            minDate: "today",
                            maxDate: new Date(Date.now() + 60 * 24 * 60 * 60 * 1000), // 60 días desde hoy
                            locale: {
                                firstDayOfWeek: 1,
                                weekdays: {
                                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                                },
                                months: {
                                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                                longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                },
                            },
                        });
                        /** fin calendario */

                    }
                    else
                    {
                        $('#modal_reserva_dias_atencion').html('NO INFORMADOS');
                        $('#modal_reserva_fecha').attr('disabled',true);
                        $('#modal_reserva_fecha_seleccionada').html('');
                    }

                } else {
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function lugar_atencion_profesional(element, div_destino, value_init = '')
        {
            let id_profesional = $(element).val();
            let url = "{{ route('profesional.lugaresAtencionProfesionalBuscador') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_profesional: id_profesional,
                    },
                })
                .done(function(data) {
                    if (data.estado == 1) {
                        {{--  console.log(data);  --}}
                        let input_lugar_atencion = $('#'+div_destino);

                        input_lugar_atencion.find('option').remove();
                        input_lugar_atencion.append('<option value="">Seleccione</option>');
                        $(data.registros).each(function(i, v) { // indice, valor
                            input_lugar_atencion.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })

                        if(value_init != '')
                        {
                            input_lugar_atencion.val(value_init);
                            carga_calendario_profesional_pedir();
                        }

                    } else {
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cargar_horas_disponibles_calendario_profesion(dia)
    {

        let id_profesional = $('#modal_reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
        console.log('cargar_horas_disponibles_calendario_profesion');
        console.log(dia);

        let url = "{{ route('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                dia: dia,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1) {
                $('#modal_reserva_fecha_seleccionada').html('Horas disponibles para el dia: '+data.text_fecha);

                $('#modal_reserva_hora_lista_horas').html('');
                $.each(data.registros, function(index, value)
                {
                    var hr1 = moment(value.hora,'HH:mm:ss').format('HH:mm');
                    var html = '';
                    html += '<div class="col-md-2 btn btn-outline-primary btn-sm my-1 mx-1" data-hora="'+value.hora+'" onclick="generar_reserva_cita(\''+value.hora+'\');">';
                    html += ''+hr1;
                    html += '</div>';

                    $('#modal_reserva_hora_lista_horas').append(html);
                });

            } else {
                // alert('No se pudo Cargar las ciudades');
                $('#modal_reserva_hora_lista_horas').html('<span style="font-weight: bold; text-align: center;">"Sin disponibilidad de Horas"</span>');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function generar_reserva_cita(hora)
    {
        console.log('generar_reserva_cita');
        $('.div_rut_buscar').hide();
        $('#form_reseva_de_horas').hide();
        $('#reserva_datos_paciente').hide();
        $('#reserva_agregar_paciente_hora').hide();

        $('#indicar_terapia').modal('hide');

        let id_profesional = $('#modal_reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
        let fecha_consulta = $('#modal_reserva_fecha').val();
        $('#reserva_hora_id_profesional').val('');
        $('#reserva_hora_id_lugar_atencion').val('');
        $('#reserva_hora_fecha_consulta').val('');
        $('#reserva_hora_hora_consulta').val('');

        let url = "{{ route('paciente.get.informacion') }}";
        var datos = {};
        var id_dependiente_activo = '{{ $paciente->id }}';

        if(id_dependiente_activo != '')
            datos.id_dependiente_activo = id_dependiente_activo;

        $.ajax({
            url: url,
            type: "get",
            data: datos,
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                $('.div_rut_buscar').hide();
                $('#form_reseva_de_horas').show();
                $('#reserva_datos_paciente').show();
                $('#reserva_agregar_paciente_hora').hide();

                $('#agenda_agregar_paciente').modal('show');

                $('#reserva_hora_id_profesional').val(id_profesional);
                $('#reserva_hora_id_lugar_atencion').val(id_lugar_atencion);
                $('#reserva_hora_fecha_consulta').val(fecha_consulta);
                $('#reserva_hora_hora_consulta').val(hora);

                $('#reserva_hora_id_paciente').val(data.registro.id);

                $('#reserva_rut_paciente').html(data.registro.rut);
                $('#reserva_hora_nombre').html(data.registro.nombres + ' ' + data.registro.apellido_uno + ' ' + data.registro.apellido_dos);
                $('#reserva_fecha_nacimiento').html(data.registro.fecha_nac);
                if (data.registro.sexo == 'M') {
                    $('#reserva_sexo').text('Masculino');
                } else {
                    $('#reserva_sexo').text('Femenino');
                }
                $('#reserva_convenio').html(data.registro.prevision.nombre);
                $('#reserva_direccion').html(data.registro.direccion.direccion+' '+data.registro.direccion.numero_dir+', '+data.registro.direccion.ciudad.nombre);
                $('#reserva_hora_email').html(data.registro.email);
                $('#reserva_hora_telefono').html(data.registro.telefono_uno);



            }
            else
            {
                swal({
                    title: "Debe completar los datos de Inscripción",
                    text: error,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{--  GENERAR HORA USUARIO EXISTENTE  --}}
    function agendar_hora() {

        let url = "{{ route('paciente.solicitar.hora') }}";
        let _token = $('#_token').val();
        let fecha_consulta = $('#reserva_hora_fecha_consulta').val()+' '+$('#reserva_hora_hora_consulta').val();
        let reserva_hora_id = $('#reserva_hora_id_paciente').val();
        let id_profesional = $('#reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#reserva_hora_id_lugar_atencion').val();
        let id_asistente = $('#reserva_hora_id_asistente').val();
        let origen = $('#reserva_hora_origen').val();

        let tipo_agenda = $('#modal_reserva_hora_tipo_agenda').val();
        var tipo_agenda_text = 'C';

        console.log(tipo_agenda);
        console.log(tipo_agenda_text);

        switch (tipo_agenda) {
            case '1':
                tipo_agenda_text = 'C';//CONSULTA
                break;
            case '2':
                tipo_agenda_text = 'D';//DENTAL
                break;
            case '3':
                tipo_agenda_text = 'T';//TELEMEDICINA
                break;
            case '4':
                tipo_agenda_text = 'E';//EXAMEN
                break;
        }

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                fecha_consulta: fecha_consulta,
                reserva_hora_id: reserva_hora_id,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
                id_asistente: id_asistente,
                origen: origen,
                tipo_hora_medica: tipo_agenda_text,
            }
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {

                data = JSON.parse(data);
                console.log(data);
                if(data.estado == 'error')
                {
                    swal({
                        title: "Error!",
                        text: data.msj,
                        icon: "error",
                        type: "error",
                        buttons: "Cerrar",
                    });
                }
                else
                {
                    swal({
                        title: "Hora Agendada Correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    });
                    // ponemos la fecha y hora de la proxima atencion
                    $('#proxima_fecha_atencion').html(data.fecha_consulta);
                    $('#proxima_hora_atencion_inicio').html(data.hora_inicio);
                    $('#proxima_hora_atencion_fin').html(data.hora_termino);
                    guardar_plan_tratamiento_psico();
                    $('#hora_agendada').val(1);
                    let esUltimaSesion = false;
                    if($('#finalizando_sesiones').val() == 1){
                        esUltimaSesion = true;
                    }
                    console.log(esUltimaSesion);
                }
                $('#agenda_agregar_paciente').modal('hide');

                    $('#reserva_hora_id_profesional').val('');
                    $('#reserva_hora_id_lugar_atencion').val('');
                    $('#reserva_hora_fecha_consulta').val('');
                    $('#reserva_hora_hora_consulta').val('');
                    $('#reserva_hora_id_paciente').val('');
                    $('#reserva_rut_paciente').html('');
                    $('#reserva_hora_nombre').html('');
                    $('#reserva_fecha_nacimiento').html('');
                    $('#reserva_sexo').text('');
                    $('#reserva_convenio').html('');
                    $('#reserva_direccion').html('');
                    $('#reserva_hora_email').html('');
                    $('#reserva_hora_telefono').html('');


            } else {

                swal({
                    title: "Error!",
                    text: "Problema en la solicitud de la hora",
                    icon: "error",
                    type: "error",
                    buttons: "Cerrar",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function dame_plan_tratamiento(id_ficha_atencion){
        let url = "{{ route('profesional.dame_plan_tratamiento') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_ficha_atencion: id_ficha_atencion,
                id_profesional: $('#id_profesional_fc').val(),
                id_paciente: $('#id_paciente_fc').val(),
                hora_agendada : $('#hora_agendada').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje == 'ok') {
                var numero_sesion;
                var consulta = '';
                if(data.registro.sesion_actual == null || data.registro.sesion_actual == 0){
                    numero_sesion = 0 + ' de ' + data.registro.numero_sesiones + ' (No se ha iniciado tratamiento)';
                }else if(data.registro.sesion_actual == data.registro.numero_sesiones){
                    numero_sesion = 'Estamos finalizando el tratamiento con un total de ' + data.registro.numero_sesiones + ' sesiones';
                    consulta = '¿Desea continuar con mas sesiones? Presione <a href="javascript:void(0)" onclick="agregar_sesiones()"> aquí </a>';
                    $('#finalizando_sesiones').val(1);
                    $('#contenedor_agendar_hora').addClass('d-none', true);
                }
                else{
                    $('#contenedor_agendar_hora').removeClass('d-none', true);
                    $('#contenedor_agendar_hora').css('display','block');
                    numero_sesion = 'Vamos en la sesión '+parseInt(data.registro.sesion_actual) + ' de ' + data.registro.numero_sesiones + ' sesiones';
                }
                $('#id_plan').val(data.registro.id);
                $('#numero_sesion').html(numero_sesion);
                $('#consulta').html(consulta);
                $('#num_sesion_obesidad').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_diabetes').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_hipertension').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_dislipidemia').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_irenal').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_hiperuric').val(parseInt(data.registro.sesion_actual));
                $('#diagnostico_tratamiento').val(data.registro.diagnostico);
                $('#hipotesis').val(data.registro.diagnostico);
                $('#tratamiento_seguir').val(data.registro.tratamiento);
                $('#numero_sesiones').val(data.registro.numero_sesiones);
                $('#objetivos').val(data.registro.objetivos);
            } else {
                var numero_sesion = ' (No se ha iniciado tratamiento)';

                $('#numero_sesion').html(numero_sesion);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function guardar_plan_tratamiento_psico() {
        const diagnostico = $('#diagnostico_tratamiento').val().trim();
        const tratamiento = $('#tratamiento_seguir').val().trim();
        const sesiones = $('#numero_sesiones').val().trim();
        const objetivos = $('#objetivos').val().trim();
        const id_ficha_atencion = $('#id_fc').val();
        const tipo_sesiones = $('#tipo_sesiones').val();

        // Validación simple
        if (!diagnostico || !sesiones || !objetivos) {
            swal({
                title: 'Error',
                text: 'Todos los campos obligatorios deben estar completos',
                icon: 'error'
            });
            return;
        }

        const data = {
            diagnostico: diagnostico,
            tratamiento: tratamiento,
            numero_sesiones: sesiones,
            objetivos: objetivos,
            id_ficha_atencion: id_ficha_atencion,
            tipo_sesiones: tipo_sesiones,
            _token: CSRF_TOKEN // Asegúrate de definir CSRF_TOKEN en tu vista
        };

        console.log(data);

        $.ajax({
            url: '{{ route("profesional.guardar_planificacion_nutri") }}', // Ajusta si tu ruta es diferente
            method: 'POST',
            data: data,
            success: function(response) {
                console.log(response);

                swal({
                    title: 'Éxito',
                    text: 'Planificación psicológica guardada correctamente',
                    icon: 'success'
                }).then(() => {
                    $('#plan_nutri').modal('hide');
                    $('#form_plan_nutri')[0].reset(); // limpia el formulario
                    // Aquí podrías recargar alguna parte de la vista si necesitas
                });
            },
            error: function(xhr) {
                let mensaje = 'Ocurrió un error al guardar la planificación.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error'
                });
                console.error(xhr.responseText);
            }
        });
    }

    function guardar_evaluacion_sico() {
        let datos_sico = {};

        $('#atencion_sicosocial').find('input, select, textarea').each(function() {
            let name = $(this).attr('name');
            if (!name) return;

            if ($(this).is(':checkbox')) {
                datos_sico[name] = $(this).is(':checked') ? 1 : 0;
            } else if ($(this).is(':radio')) {
                if ($(this).is(':checked')) {
                    datos_sico[name] = $(this).val();
                }
            } else {
                datos_sico[name] = $(this).val();
            }
        });

        // Agrega los identificadores adicionales
        const payload = {
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_profesional: $('#id_profesional_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            datos_nutri: datos_sico,
            archivos_adjuntos: archivosSubidos,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        console.log(datos_sico);

        $.ajax({
            url: '{{ route("profesional.guardar_evaluacion_nutricional") }}', // Asegúrate que la ruta exista
            method: 'POST',
            data: payload,
            success: function(response) {
                console.log(response);
                swal({
                    title: 'Éxito',
                    text: response.detalle || 'Evaluación psicológica guardada correctamente.',
                    icon: 'success'
                });
            },
            error: function(xhr) {
                let mensaje = 'Error al guardar la evaluación.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error'
                });
                console.error(xhr.responseText);
            }
        });
    }

    function dame_atencion_sico(){
        let id_ficha_atencion = $('#id_fc').val();
        let url = "{{ route('profesional.dame_evaluacion_nutricional') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_ficha_atencion: id_ficha_atencion,
                id_profesional: $('#id_profesional_fc').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje == 'ok') {
                let registros = data.registro;
                // Recorremos todas las propiedades del objeto
                for (let key in registros) {
                    if (registros.hasOwnProperty(key)) {
                        // Ignorar claves vacías o inválidas para selectores jQuery
                        if (!key || key.trim() === '#' || /[^a-zA-Z0-9_-]/.test(key)) {
                            continue;
                        }

                        let $element = $('#' + key);
                        if ($element.length > 0) {
                            let value = registros[key];
                            $element.val(value !== null ? value : '');
                        }
                    }
                }
                evaluar_hermanos();
            } else {
                // swal({
                //     title: "Error!",
                //     text: data.detalle,
                //     icon: "error",
                //     // buttons: "Aceptar",
                //     //SuccessMode: true,
                // });
                console.log('error');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function dame_historial_controles(){
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let data = {
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_ficha_atencion: id_ficha_atencion,
            id_profesional: id_profesional,
            _token: CSRF_TOKEN
        }

        console.log(data);
        let url = "{{ route('profesional.dame_historial_controles_nutricionales') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje === 'ok') {
                if (data.mensaje === 'ok') {
                    const planes = data.planes;
                    const controlesAgrupados = data.controles_agrupados;

                    const tablaPlanes = $('#tabla_planes tbody');
                    tablaPlanes.empty();

                    planes.forEach(plan => {
                        const estado = plan.estado == 1 ? 'Activo' : 'Finalizado';

                        tablaPlanes.append(`
                            <tr>
                                <td>${plan.id}</td>
                                <td>${plan.fecha}</td>
                                <td>${plan.numero_sesiones}</td>
                                <td>${estado}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary ver-controles" data-plan="${plan.id}">
                                        Ver controles
                                    </button>
                                </td>
                            </tr>
                        `);
                    });

                    // Evento al hacer clic en "Ver controles"
                    $('#tabla_planes').on('click', '.ver-controles', function () {
                        const planId = $(this).data('plan');
                        const controles = controlesAgrupados[planId];

                        const tablaControles = $('#tabla_controles tbody');
                        tablaControles.empty();

                        if (!controles || controles.length === 0) {
                            tablaControles.append('<tr><td colspan="5">Sin controles registrados para este plan.</td></tr>');
                            return;
                        }
                        console.log(controles);
                        controles.forEach(ctrl => {
                             // Convertir la fecha a objeto Date solo si existe
                            let fechaFormateada = '-';
                            if (ctrl.fecha) {
                                // Crear un objeto Date
                                const fecha = new Date(ctrl.fecha);
                                // Formatear a YYYY-MM-DD o a un formato legible sin la hora
                                // Por ejemplo:
                                fechaFormateada = fecha.toISOString().split('T')[0];
                                // Esto deja solo la parte antes de la T, ej: "2025-07-01"

                                // Alternativamente, para formato local más legible:
                                // fechaFormateada = fecha.toLocaleDateString();
                                // que puede mostrar algo como "7/1/2025" según configuración local
                            }
                            tablaControles.append(`
                                <tr>
                                    <td>${fechaFormateada ?? '-'}</td>
                                    <td>${ctrl.num_sesion_obesidad ?? '-'}</td>
                                    <td>${ctrl.trabajo_en_obesidad ?? '-'}</td>
                                    <td>${ctrl.objetivo_logrado == 1 ? '✔️' : '❌'}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-info ver-detalle-control"
                                            data-id-ficha="${ctrl.id_ficha_atencion}">
                                            Ver detalle
                                        </button>
                                    </td>
                                </tr>
                            `);
                        });


                    });
                }

            } else {
                swal({
                    title: "Sin registros",
                    text: data.detalle ?? 'No se encontraron controles.',
                    icon: "warning",
                    button: "Aceptar",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
            // swal({
            //     title: "Error!",
            //     text: "No se pudo cargar el historial de controles nutricionales.",
            //     icon: "error",
            //     // buttons: "Aceptar",
            //     //SuccessMode: true,
            // });
        });

    }

    function dame_control(id_ficha_atencion = null){
        let historial = true;
        if(id_ficha_atencion == null){
            id_ficha_atencion = $('#id_fc').val();
            historial = false;
        }
        let id_paciente = $('#id_paciente_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let url = "{{ route('profesional.dame_control_nutricional') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                _token: CSRF_TOKEN
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje == 'ok') {
                let registros = data.registro.datos_control;
                console.log(registros);
                if(!historial){
                    // Recorremos todas las propiedades del objeto
                    for (let key in registros) {
                        if (registros.hasOwnProperty(key)) {
                            // Buscamos un input, select o textarea que tenga el mismo ID
                            let $element = $('#' + key);

                            if ($element.length > 0) {
                                let value = registros[key];

                                // Establecemos el valor (null lo convertimos en vacío)
                                $element.val(value !== null ? value : '');
                            }
                        }
                    }
                }else{
                    // Abrimos modal
                    $('#modalControlPsicologica').modal('show');

                    let html = '';

                    for (let key in registros) {
                        if (registros.hasOwnProperty(key)) {
                            let valor = registros[key];

                        // 👉 Omitir si la clave empieza con "num_sesion"
                        if (key.startsWith('num_sesion')) {
                            continue;
                        }

                            // Filtrar nulls, vacíos y "0"
                            if (valor !== null && valor !== '' && valor !== '0') {
                                // Opcional: formatear claves para mostrar como texto legible
                                let label = key.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());

                                html += `
                                    <div class="mb-2">
                                        <strong>${label}:</strong> ${valor}
                                    </div>
                                `;
                            }
                        }
                    }

                    if (html === '') {
                        html = '<p class="text-muted">No hay información relevante para mostrar.</p>';
                    }

                    if (key === 'objetivo_logrado') {
                        let label = 'Objetivo Logrado';
                        let icono = (valor == '1')
                            ? '<span class="text-success"><i class="fas fa-check-circle"></i> Sí</span>'
                            : '<span class="text-danger"><i class="fas fa-times-circle"></i> No</span>';

                        html += `
                            <div class="mb-2">
                                <strong>${label}:</strong> ${icono}
                            </div>
                        `;
                        continue; // evita que se duplique más abajo
                    }


                    $('#contenido_control_nutricional_historial').html(html);
                }


            } else {
                console.log('No se pudo cargar el control nutricional.');
                $('#num_sesion_obesidad').val(data.num_sesion);
                $('#num_sesion_diabetes').val(data.num_sesion);
                $('#num_sesion_hipertension').val(data.num_sesion);
                $('#num_sesion_dislipidemia').val(data.num_sesion);
                $('#num_sesion_irenal').val(data.num_sesion);
                $('#num_sesion_hiperuric').val(data.num_sesion);
            }
        })

        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
            console.log('Error al cargar el control nutricional.');
        });

    }
</script>
<script>
    $('#agregar_sesiones').on('hidden.bs.modal', function () {
        $('#indicar_terapia').modal('show');
    });

    $(document).ready(function() {
        $('#select_1').select2();
        $('#select_2').select2();
        $('#select_3').select2();
        $('#select_4').select2();
        $('#select_5').select2();
        $('#select_6').select2();
        $('#select_7').select2();
        $('#select_8').select2();
        $('#select_9').select2();
        $('#select_10').select2();
        $('#select_11').select2();
        $('#select_12').select2();
        $('#select_13').select2();
        $('#select_14').select2();
        $('#select_15').select2();

        $('#form_ficha_nutri').on('submit', function(e) {
            const hora = $('#hora_agendada').val();
            const hipotesis = $('#hipotesis').val().trim(); // <- elimina espacios

            // Validar hipótesis primero
            if (!hipotesis) {
                e.preventDefault(); // Detiene el envío
                swal({
                    title: 'Campo obligatorio',
                    text: 'Debe ingresar una hipótesis antes de guardar.',
                    icon: 'error',
                    buttons: 'Aceptar',
                });
                return; // No seguir con otras validaciones
            }

            if (hora === '0') {
                e.preventDefault(); // Detiene el envío temporalmente

                swal({
                    title: '¿Está seguro?',
                    text: "No ha agendado el próximo control. ¿Desea continuar?",
                    icon: 'warning',
                    buttons: ["Cancelar", "Continuar cerrando"],
                    dangerMode: true,
                }).then((result) => {
                    if (result) {
                        // Envía el formulario manualmente si el usuario confirma
                        $('#form_ficha_nutri')[0].submit();
                    }
                });
            }
            // Si hora no es 1, el formulario se envía directamente
        });

        $('#tabla_controles').on('click', '.ver-detalle-control', function () {
            const idFicha = $(this).data('id-ficha');

            if (idFicha) {
                dame_control(idFicha); // llama tu función existente
            }
        });
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

    function internutri() {
        $('#modal_interconsulta').modal('show');
    }

    function informeNutri() {
        $('#informe_nutri').modal('show');
    }

    function examenes_nutri() {
        $('#indicar_examen_nutri').modal('show');
    }

    function e_plan_nutri() {
        $('#plan_nutri').modal('show');
    }

    function dieta_diaria_nutri() {
        $('#m_dieta_diaria').modal('show');
    }

    function encuesta_nutri() {
        $('#m_test_alimentacion_mens').modal('show');
    }

    function dieta_nutri() {
        $('#m_dieta_nutri').modal('show');
    }

    function dieta_diab() {
        $('#m_rec_diab').modal('show');
    }

    function raciones() {
        $('#m_raciones').modal('show');
    }

    function indicadores_nutri() {
        $('#m_indicadores_nutri').modal('show');
    }

        function agregar_sesiones(){
        $('#indicar_terapia').modal('hide');
        $('#agregar_sesiones').modal('show');
    }

    function confirmar_agregar_sesiones() {
        let cantidad = parseInt($('#input_sesiones_adicionales').val());

        if (isNaN(cantidad) || cantidad <= 0) {
            $('#error_sesion_alert').removeClass('d-none');
            return;
        }

        $('#error_sesion_alert').addClass('d-none');
        $('#agregar_sesiones').modal('hide');

        // Obtener variables desde los inputs ocultos
        let id_profesional = $('#id_profesional_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_plan = $('#id_plan').val();
        let _token = $('meta[name="csrf-token"]').attr('content');

        let url = "{{ route('profesional.continuar_sesiones_nutricion') }}";

        $.ajax({
            url: url,
            method: "POST",
            data: {
                _token: _token,
                id_plan: id_plan,
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                id_ficha_atencion: id_ficha_atencion,
                nuevas_sesiones: cantidad
            },
            success: function(response) {
                console.log('Sesiones agregadas correctamente:', response);
                swal({
                    title: "Sesiones actualizadas",
                    text: "Se han agregado " + cantidad + " sesiones al tratamiento.",
                    icon: "success",
                    buttons: "Aceptar"
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al agregar sesiones:', error);
                swal({
                    title: "Error",
                    text: "Ocurrió un problema al intentar agregar sesiones.",
                    icon: "error",
                    buttons: "Cerrar"
                });
            }
        });
    }
</script>
