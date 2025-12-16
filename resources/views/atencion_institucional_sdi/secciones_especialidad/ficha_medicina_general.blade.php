<!-- FICHA ATENCION GENERAL -->

<!--
crear laboratorio invitado para carga de resultados de examen antecedentes del paciente

crear correo con instruccion de carga masiva de pacientes
archivo CSV carga masiva, nombre rut y correo
-->

<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 mt-2">
                <div class="mx-3 alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_ant_sdi') }}" method="POST">
                    <div class="col-sm-12 col-md-12">
                        <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                        <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                        <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
						<input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                        <input type="hidden" name="id_paciente" value="{{ $paciente->id }}" id="id_paciente">
                        <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                        <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                        <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                        <input type="hidden" name="cronico" id="cronico" value="0">
                        <input type="hidden" name="ges" id="ges" value="0">
                        <input type="hidden" name="confidencial" id="confidencial" value="0">
                        <input type="hidden" name="profesional_visible" id="profesional_visible" value="1">
                        <input type="hidden" name="motivo" id="motivo" value="Carga de antecedentes de paciente SDI">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <style>
                                    .container {
                                      position: relative;
                                      width: 100%;
                                      overflow: hidden;
                                      padding-top: 10%;
                                      padding-bottom: 1%;
                                      margin-bottom: 1%;
                                    }

                                    .responsive-iframe {
                                      position: absolute;
                                      top: 0;
                                      left: 0;
                                      bottom: 0;
                                      right: 0;
                                      width: 100%;
                                      height: 75%;
                                      border: none;
                                    }
                                    </style>
                                {{-- <div class="container">
                                    <iframe class="responsive-iframe" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                                  </div>
                                 <iframe src="" frameborder="3,3px,3px,3px" width="100%" height="10%" aria-placeholder="VIDEOCONSULTA">

                                </iframe>  --}}
                            </div>
                        </div>
						{{-- Antecedentes I (Transfusiones y Donación de Órganos) --}}
						<div class="row mb-3">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
								<h5 class="f-22 d-inline text-c-blue">1. Transfusiones y donación de órganos</h5>
								<button type="button" class="btn btn-primary btn-icon d-inline m-0 float-right" data-toggle="collapse" data-target=".info_residencial_sos" aria-expanded="false" aria-controls="info_residencial_sos_1 info_residencial_sos_2">
											<i class="feather icon-edit"></i>
										</button>
							</div>
							<div class="col-md-12">
								<!--Card Datos Sangre Donación de Organos-->
								<div class="card">
									<!--<div class="card-informacion d-flex align-items-center justify-content-between">
										<h5 class="mb-0 text-white">Antecedentes I (Transfusiones y Donación de Órganos)</h5>
										<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial_sos" aria-expanded="false" aria-controls="info_residencial_sos_1 info_residencial_sos_2">
											<i class="feather icon-edit"></i>
										</button>
									</div>-->
									<!--Sangre Donación de Organo-->
									<div class="card-body border-top info_residencial_sos collapse show" id="info_residencial_sos_1">
										<div class="row">
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-1">
													<label class="col-sm-4 col-form-label ml-0 font-weight-bolder">¿Acepta transfusión?</label>
													<div class="col-sm-7 col-form-label">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->transfusion == 1)
															SI
														@else
															NO
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-1">
													<label class="col-sm-4 col-form-label ml-0 font-weight-bolder">¿Donante de sangre?</label>
													<div class="col-sm-7  col-form-label">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_sangre == 1)
															SI
														@else
															NO
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-1">
													<label class="col-sm-4 col-form-label ml-0 font-weight-bolder">Grupo sanguíneo</label>
													<div class="col-sm-7   col-form-label text-danger">
														@if ($paciente->Antecedentes()->first() != null)
															@if ($paciente->Antecedentes()->first()->GrupoSanguineo()->first() != null)
																{{ $paciente->Antecedentes()->first()->GrupoSanguineo()->first()->nombre_gs }}
															@endif
														@else
															Sin registro
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-1">
													<label class="col-sm-4 col-form-label ml-0 font-weight-bolder">Grupo sanguíneo</label>
													<div class="col-sm-7  col-form-label text-danger">
														@if ($paciente->Antecedentes()->first() != null)
															@if ($paciente->Antecedentes()->first()->GrupoSanguineo()->first() != null)
																{{ $paciente->Antecedentes()->first()->GrupoSanguineo()->first()->nombre_gs }}
															@endif
														@else
															Sin registro
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-0">
													<label
														class="col-sm-4 col-form-label ml-0 font-weight-bolder">Comentarios de grupo sanguíneo</label>
													<div class="col-sm-7  col-form-label">
														@if ($paciente->Antecedentes()->first() != null)
															@if ($paciente->Antecedentes()->first()->GrupoSanguineo()->first() != null)
																{{ $paciente->Antecedentes()->first()->GrupoSanguineo()->first()->descripcion_gs }}
															@endif
														@else
															Sin registro
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-0">
													<label
														class="col-sm-4 col-form-label ml-0 font-weight-bolder">Comentarios de grupo sanguíneo</label>
													<div class="col-sm-7  col-form-label">
														@if ($paciente->Antecedentes()->first() != null)
															@if ($paciente->Antecedentes()->first()->GrupoSanguineo()->first() != null)
																{{ $paciente->Antecedentes()->first()->GrupoSanguineo()->first()->descripcion_gs }}
															@endif
														@else
															Sin registro
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label ml-0 font-weight-bolder">Vacuna o hepatitis</label>
													<div class="col-sm-7  col-form-label text-danger">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->hepatitis == 1)
															SI
														@else
															NO
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label ml-0 font-weight-bolder">Comentarios hepatitis o VIH</label>
													<div class="col-sm-7  col-form-label">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentario_hepa != '')
															{{ $paciente->Antecedentes()->first()->comentario_hepa }}
														@else
															Sin registro
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label ml-0 font-weight-bolder"> ¿Donante total de órganos? </label>
													<div class="col-sm-7  col-form-label">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 1)
															SI
														@else
															NO
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label ml-0 font-weight-bolder"> ¿Donante parcial de órganos?
													</label>
													<div class="col-sm-7  col-form-label">
													@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos_parcial == 1)
															SI
														@else
															NO
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label ml-0 font-weight-bolder">Órganos a donar</label>
													<div class="col-sm-7 col-form-label">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentarios != '')
															{{ $paciente->Antecedentes()->first()->comentarios }}
														@else
															Sin Registros
														@endif
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label ml-0 font-weight-bolder"> Impedimento para donar
													</label>
													<div class="col-sm-7 col-form-label">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->impedimento_donar != '')
															{{ $paciente->Antecedentes()->first()->impedimento_donar }}
														@else
															Sin Registros
														@endif
													</div>
												</div>
											</div>
										</div>
										<!--<div class="row">
											<div class="col-md-6">
												<div class="form-group row mb-0">
													<label
														class="col-sm-4 col-form-label font-weight-bolder">Comentarios de grupo sanguíneo</label>
													<div class="col-sm-7 col-form-label">
														@if ($paciente->Antecedentes()->first() != null)
															@if ($paciente->Antecedentes()->first()->GrupoSanguineo()->first() != null)
																{{ $paciente->Antecedentes()->first()->GrupoSanguineo()->first()->descripcion_gs }}
															@endif
														@else
															Sin registro
														@endif
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label font-weight-bolder">Vacuna o hepatitis</label>
													<div class="col-sm-7 col-form-label text-danger">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->hepatitis == 1)
															SI
														@else
															NO
														@endif
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label font-weight-bolder">Comentarios hepatitis o VIH</label>
													<div class="col-sm-7 col-form-label">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentario_hepa != '')
															{{ $paciente->Antecedentes()->first()->comentario_hepa }}
														@else
															Sin registro
														@endif
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label font-weight-bolder"> ¿Donante total de órganos? </label>
													<div class="col-sm-7 col-form-label">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 1)
															SI
														@else
															NO
														@endif
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label font-weight-bolder"> ¿Donante parcial de órganos?
													</label>
													@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos_parcial == 1)
															SI
														@else
															NO
														@endif
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label font-weight-bolder">Órganos a donar</label>
													<div class="col-sm-7 col-form-label">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentarios != '')
															{{ $paciente->Antecedentes()->first()->comentarios }}
														@else
															Sin Registros
														@endif
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row mb-0">
													<label class="col-sm-4 col-form-label font-weight-bolder"> Impedimento para donar
													</label>
													<div class="col-sm-7 col-form-label">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->impedimento_donar != '')
															{{ $paciente->Antecedentes()->first()->impedimento_donar }}
														@else
															Sin Registros
														@endif
													</div>
												</div>
											</div>
										</div>-->
									</div>
									<!--Cierre: Sangre Donación de Organo-->
									<!--(Editar) Sangre Donación de Organo-->
									<div class="card-body border-top info_residencial_sos collapse "id="info_residencial_sos_2">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">
														¿Acepta Transfusión?
													</label>
													<div class="col-sm-7 my-auto">

														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->transfusion == 1)
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_transfusion" id="edit_transfusion" value="1" checked>
																<label class="form-check-label" for="transfusion_si">Si</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_transfusion" id="edit_transfusion" value="0">
																<label class="form-check-label" for="transfusion_no">No</label>
															</div>
														@else
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_transfusion" id="edit_transfusion" value="1">
																<label class="form-check-label" for="transfusion_si">Si</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_transfusion" id="edit_transfusion" value="0" checked>
																<label class="form-check-label" for="transfusion_no">No</label>
															</div>
														@endif
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">¿Donante de Sangre?</label>


													@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_sangre == 1)
														<div class="col-sm-7 my-auto">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_dona_sangre" id="edit_dona_sangre" value="1" checked>
																<label class="form-check-label" for="dona_sangre_si">Si</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_dona_sangre" id="edit_dona_sangre" value="0">
																<label class="form-check-label" for="dona_sangre_no">No</label>
															</div>
														</div>
													@else
														<div class="col-sm-7 my-auto">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_dona_sangre" id="edit_dona_sangre" value="1">
																<label class="form-check-label" for="donante_sangre_si">Si</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_dona_sangre" id="edit_dona_sangre" value="0" checked>
																<label class="form-check-label" for="donante_sangre_no">No</label>
															</div>
														</div>
													@endif

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Grupo Sanguíneo</label>
													<div class="col-sm-7 my-auto">
														<select name="editar_grupo_sanguineo"
															id="editar_grupo_sanguineo" class="form-control">
															<option value="">Seleccione</option>

															@if (isset($grupo_sanguineo) && $grupo_sanguineo != null && $grupo_sanguineo != '')
																@foreach ($grupo_sanguineo as $gs)
																	@if (isset($paciente->Antecedentes()->first()->id_grupo_sanguineo) && $gs->id == $paciente->Antecedentes()->first()->id_grupo_sanguineo)
																		<option value="{{ $gs->id }}" selected>
																			{{ $gs->nombre_gs }}</option>
																	@else
																		<option value="{{ $gs->id }}">
																			{{ $gs->nombre_gs }}</option>
																	@endif
																@endforeach
															@endif

														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													{{--  <label class="col-sm-4 col-form-label font-weight-bolder">Comentarios de grupo sanguíneo</label>  --}}

													{{--  @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentario_gs != null)
														<div class="col-sm-7">
															<textarea id="comentarios_gruposangre" class="form-control" placeholder="Comentarios de grupo sanguíneo">{{ $paciente->Antecedentes()->first()->comentario_gs }}</textarea>
														</div>
													@else
														<div class="col-sm-7">
															<textarea id="comentarios_gruposangre" class="form-control" placeholder="Comentarios de grupo sanguíneo"></textarea>
														</div>
													@endif  --}}

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Vacuna o Hepatitis</label>
													@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->hepatitis == 1)
														<div class="col-sm-7 my-auto">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_hepatitis" id="edit_hepatitis" value="1" checked>
																<label class="form-check-label" for="edit_hepatitis_si">Si</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_hepatitis" id="edit_hepatitis" value="0">
																<label class="form-check-label" for="edit_hepatitis_no">No</label>
															</div>
														</div>
													@else
														<div class="col-sm-7 my-auto">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_hepatitis" id="edit_hepatitis" value="1">
																<label class="form-check-label" for="edit_hepatitis_si">Si</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_hepatitis" id="edit_hepatitis" value="0" checked>
																<label class="form-check-label" for="edit_hepatitis_no">No</label>
															</div>
														</div>
													@endif
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">
														Comentarios Hepatitis o VIH
													</label>
													@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentario_hepa != null)
														<div class="col-sm-7">
															<textarea id="comentarios_hepatitis" class="form-control" placeholder="Comentarios de hepatitis">{{ $paciente->Antecedentes()->first()->comentario_hepa }}</textarea>
														</div>
													@else
														<div class="col-sm-7">
															<textarea id="comentarios_hepatitis" class="form-control" placeholder="Comentarios"></textarea>
														</div>
													@endif

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row div_edit_donante_total">
													<label class="col-sm-4 col-form-label font-weight-bolder">¿Donante Total de Órganos?</label>

													@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 1)
														<div class="col-sm-7 my-auto">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="1" checke onchange="validar_donante_organo_total();"d>
																<label class="form-check-label" for="donante_total_si">Si</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="0" onchange="validar_donante_organo_total();">
																<label class="form-check-label" for="donante_total_no">No</label>
															</div>
														</div>
													@else
														<div class="col-sm-7 my-auto">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="1" onchange="validar_donante_organo_total();">
																<label class="form-check-label" for="donante_total_si">Si</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="0" checked onchange="validar_donante_organo_total();">
																<label class="form-check-label" for="donante_total_no">No</label>
															</div>
														</div>
													@endif
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row div_edit_donante_parcial">
													<label class="col-sm-4 col-form-label font-weight-bolder">¿Donante Parcial de Órganos?</label>

													@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos_parcial == 1)
														<div class="col-sm-7 my-auto">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="1" checked onchange="validar_donante_organo_parcial();">
																<label class="form-check-label" for="donante_parcial_si">Si</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="0" onchange="validar_donante_organo_parcial();">
																<label class="form-check-label" for="donante_parcial_no">No</label>
															</div>
														</div>
													@else
														<div class="col-sm-7 my-auto">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="1" onchange="validar_donante_organo_parcial();">
																<label class="form-check-label"
																	for="donante_parcial_si">Si</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="0" checked onchange="validar_donante_organo_parcial();">
																<label class="form-check-label" for="donante_parcial_no">No</label>
															</div>
														</div>
													@endif


												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group row div_edit_comentario">
													<label class="col-sm-4 col-form-label font-weight-bolder"> Órganos a donar </label>
													<div class="col-sm-7">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentarios != null)
															<textarea id="comentarios_organo" class="form-control" placeholder="Órganos a donar">{{ $paciente->Antecedentes()->first()->comentarios }} </textarea>
														@else
															<textarea id="comentarios_organo" class="form-control" placeholder="Órganos a donar"></textarea>
														@endif
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row div_edit_comentario_impedimento">
													<label class="col-sm-4 col-form-label font-weight-bolder">Impedimento para donar</label>

													<div class="col-sm-7">
														@if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->impedimento_donar != null)
															<textarea id="comentarios_impedimento" class="form-control" placeholder="Impedimento para donar">{{ $paciente->Antecedentes()->first()->impedimento_donar }}</textarea>
														@else
															<textarea id="comentarios_impedimento" class="form-control" placeholder="Impedimento para donar"></textarea>
														@endif
													</div>
												</div>
											</div>
										</div>
										<div class="row container-fluid">
											<div class="col-md-5">
												<div class="form-group row">
													<label id="" name="" class="floating-label-activo-sm">Código Verificación</label>
													<input type="text"  class="form-control" name="codigo_varificacion" id="codigo_varificacion">
												</div>
											</div>
											<div class="col-md-2"></div>
											<div class="col-md-5">
												<div class="form-group row">
													<button type="button" onclick="editar_antecedentes_paciente({{ $paciente->id }});" class="btn btn-primary">Guardar Cambios</button>
												</div>
											</div>
										</div>
									</div>
									<!--cierre(Editar) Sangre Donación de Organo-->
								</div>
								<!--Cierre: Datos Sangre Donación de Organos-->
							</div>
						</div>

						@include('app.profesional.edicion_paciente.antecedentes_paciente_dos')

                        <input type="hidden" name="descripcion_hipotesis" id="descripcion_hipotesis" value="Carga de antecedentes Paciente">

                    </div>

                    {{--  div de botones para crear ordenes --}}
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="display:none;" >
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                    {{-- @include('general.secciones_ficha.seccion_receta_examen_comunes')--}}
                                    <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-info-light-c mt-1"  value="Guardar Ficha y Finalizar su Consulta">
                                <input type="submit" class="btn btn-success-light-c mt-1" value="Guardar Ficha e ir a su Agenda">
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                </form>
            </div>
        </div>
    </div>
</div>
<!--CIERRE: FICHA ATENCION GENERAL-->

@section('page-script-ficha-atencion')
    <script>
         /** MENSAJE*/
        /** CARGAR mensaje */
        $('#mensaje_ficha').html('<strong>RECUERDE QUE ESTOS ANTECEDENTES SON DE VITAL IMPORTANCIA PARA SU PACIENTE Y USTED ES EL MÉDICO RESPONSABLE</strong>');
        $('#mensaje_ficha').show();
        setTimeout(function(){
            $('#mensaje_ficha').hide();
        }, 9000);

        $(document).ready(function() {

        });


		function editar_antecedentes_paciente(id) {

            let id_paciente = id;

            let edit_transfusion = $('input:radio[name=edit_transfusion]:checked').val();

            let edit_dona_sangre = $('input:radio[name=edit_dona_sangre]:checked').val();
            let editar_grupo_sanguineo = $('#editar_grupo_sanguineo').val();
            {{--  let comentarios_gruposangre = $('#comentarios_gruposangre').val();  --}}
            let edit_hepatitis = $('input:radio[name=edit_hepatitis]:checked').val();
            let comentarios_hepatitis = $('#comentarios_hepatitis').val();
            let edit_donante_total = $('input:radio[name=edit_donante_total]:checked').val();
            let edit_donante_parcial = $('input:radio[name=edit_donante_parcial]:checked').val();
            let comentarios_organo = $('#comentarios_organo').val();
            let comentarios_impedimento = $('#comentarios_impedimento').val();


            let url = "{{ route('profesional.editar_antecedentes_paciente') }}";


            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        id_paciente: id_paciente,
                        edit_transfusion: edit_transfusion,
                        edit_dona_sangre: edit_dona_sangre,
                        editar_grupo_sanguineo: editar_grupo_sanguineo,
                        {{--  comentarios_gruposangre: comentarios_gruposangre,  --}}
                        edit_hepatitis: edit_hepatitis,
                        comentarios_hepatitis: comentarios_hepatitis,
                        edit_donante_total: edit_donante_total,
                        edit_donante_parcial: edit_donante_parcial,
                        comentarios_organo: comentarios_organo,
                        comentarios_impedimento: comentarios_impedimento

                    },
                })
                .done(function(data) {




                    if (data != 'failed') {

                        swal({
                            title: "se modifico antecedentes del paciente",
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 100);
                        // alert('se modifico antecedentes del paciente');
                        // location.reload();

                    } else {
                        swal({
                            title: "Error al modificar los antecedentes",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('Error al modificar los antecedentes');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

    </script>
@endsection
