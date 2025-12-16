<div class="row">
    <div class="col-sm-12">
        <!--Card Datos medicos generales-->
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                <h5 class="mb-0 text-white">Antecedentes II (Datos Médicos Generales)</h5>
                <!--
                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_antecedentes_patologicos" aria-expanded="false" aria-controls="info_antecedentes_patologicos_1 info_antecedentes_patologicos_2">
                    <i class="feather icon-edit"></i>
                </button>
                -->
            </div>
            {{--
            <div class="card-body border-top iinfo_antecedentes_patologicos collapse show" id="info_antecedentes_patologicos_1">
                <div class="row"></div>
                <form>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bolder">Alérgias e Intolerancias</label>
                        <div class="col-sm-7 my-auto ml-2">
                            <ul>
                                <li>Penicilina</li>
                                <li>Huevo</li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bolder">Antecedentes Quirúrgicos</label>
                        <div class="col-sm-7 my-auto ml-2">
                            <ul>
                                <li>Colecistectomía 1990</li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bolder">Patologías Crónicas</label>
                        <div class="col-sm-7 my-auto ml-2">
                            <ul>
                                <li>Diabetes</li>
                                <li>Hipotiroidismo</li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bolder">Medicamentos de uso Crónico</label>
                        <div class="col-sm-7 my-auto ml-2">
                            <ul>
                                <li>Aspirina</li>
                                <li>Metformina</li>
                                <li>Eutirox</li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
             --}}

             <div class="card-body border-top iinfo_antecedentes_patologicos collapse show row" id="info_antecedentes_patologicos_1">
                {{-- ALERGIAS --}}
                <div class="col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                            <h5 class="mb-0 text-white">
                                Alérgias e Intolerancias 
                            </h5>
                            <button class="float-right feather icon-edit btn btn-success"></button>
                        </div>

                        {{-- VER --}}
                        <div class="card-body border-top info_contacto_sos collapse show" id="info_antecedentes_patologicos_1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <table class="table table-bordered table-xs"  id="table_alergias_paciente_ver">
                                                <thead>
                                                    <tr>
                                                        <th>Alergia</th>
                                                        <th>Detalle</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (isset($alergias))
                                                        @foreach ($alergias as $alergia)
                                                            <tr class="tr_alergias_paciente" id="row{{  $alergia->id  }}">
                                                                <td>
                                                                    {{ $alergia->nombre_alergia }}
                                                                </td>
                                                                <td>
                                                                    {{ $alergia->comentario }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="2">
                                                                <center>
                                                                    <b>No hay alergias registradas</b>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Patologías Crónicas --}}
                <div class="col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between bg-c-yellow">
                            <h5 class="mb-0 text-white">
                                Patologías Crónicas
                            </h5>
                            <button class="float-right feather icon-edit btn btn-success"></button>
                        </div>

                        <div class="card-body border-top info_contacto_sos collapse show" id="info_contacto_sos_1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <table class="table table-bordered table-xs" id="table_patologia_cronica_ver">
                                                <thead>
                                                    <tr>
                                                        <th>Patología</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (isset($patoligias_cronicas))
                                                        @foreach ($patoligias_cronicas as $cronica)
                                                            <tr>
                                                                <td>
                                                                    {{ $cronica->nombre_patologia_cronica }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="2">
                                                                <center>
                                                                    <b>No hay patologias crónicas registradas</b>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                 {{-- Medicamentos de uso Crónico --}}
                <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between bg-c-red">
                            <h5 class="mb-0 text-white">
                                Medicamentos de uso Crónico
                            </h5>
                            <button class="float-right feather icon-edit btn btn-success"></button>
                        </div>
                        <div class="card-body border-top info_contacto_sos collapse show" id="info_contacto_sos_1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <table class="table table-bordered table-xs" id="table_medicamento_cronico_ver">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Dosis</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (isset($medicamentos_cronicos))
                                                        @foreach ($medicamentos_cronicos as $med_cronico)
                                                            <tr>
                                                                <td>
                                                                    {{ $med_cronico->nombre_medicamento_cronico }}
                                                                </td>
                                                                <td>
                                                                    {{ $med_cronico->dosis }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="2">
                                                                <center>
                                                                    <b>No hay Medicamentos crónicos registradas</b>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 {{-- antecedentes cirugias --}}
                <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between bg-c-green">
                            <h5 class="mb-0 text-white">
                                    Antecedentes Quirúrgicos
                            </h5>
                            <button class="float-right feather icon-edit btn btn-success"></button>
                        </div>
                        <div class="card-body border-top info_contacto_sos collapse show" id="info_contacto_sos_1">

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <table class="table table-bordered table-xs" id="table_antecedente_cirugia_ver">
                                                <thead>
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Operación</th>
                                                        <th>Complicaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (isset($antecedentes_cirugias))
                                                        @foreach ($antecedentes_cirugias as $cirugia)
                                                            <tr>
                                                                <td>
                                                                    {{ $cirugia->fecha_cirugia }}
                                                                </td>
                                                                <td>
                                                                    {{ $cirugia->nombre }}
                                                                </td>
                                                                <td>
                                                                    {{ $cirugia->comentarios }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="2">
                                                                <center>
                                                                    <b>No hay Antecedentes Quirúrgicos registradas</b>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



             </div>
            <!--Cierre: Datos medicos generales-->
            <!--(Editar) Datos medicos generales-->

            <!--Datos ANTECEDENTES PATOLOGICOS GENERALES-->
			<div class="card-body border-top info_antecedentes_patologicos collapse " id="info_antecedentes_patologicos_2">

				<div class="container-fluid">
					<div class="row">

                        {{-- ALERGIAS --}}
						<div class="col-sm-12 col-md-6">
							<div class="card">
								<div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
									<h5 class="mb-0 text-white">
										Alérgias e Intolerancias
									</h5>
								</div>
                                {{--  EDITAR --}}
								<div class="card-body border-top info_contacto_sos collapse show" id="info_antecedentes_patologicos_2">

									<div class="row">
										<form id="agregar_alergia_paciente">
											<div class="col-sm-12">
												<div class="form-row">
													<div class="form-group col-sm-6 col-md-6">
														<label class="floating-label-activo-sm">Seleccione</label>
														<input type="text" id="alergia_paciente" name="alergia_paciente" class="form-control form-control-sm"  value="">
														<input type="hidden" name="id_alergia_paciente" id="id_alergia_paciente" value=""/>
													</div>
													<div class="form-group col-sm-6 col-md-6">
														<label class="floating-label-activo-sm">Detalle</label>
														<input type="text" name="alergia_comentario_paciente" id="alergia_comentario_paciente"  class="form-control form-control-sm"  value="">
													</div>
												</div>
											</div>
											<div class="col-sm-12">
												 <button type="button" onclick="agregar_alergia_paciente({{ $paciente->id }});" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Agregar alergia</button>
											</div>
										</form>
									</div>
									<br>
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<div class="row form-group">
													<table class="table table-bordered table-xs"  id="table_alergias_paciente">
														<thead>
															<tr>
																<th>Alergia</th>
																<th>Detalle</th>
																<th>Acción</th>
															</tr>
														</thead>
														<tbody>

															@if (isset($alergias))
																@foreach ($alergias as $alergia)
																	<tr class="tr_alergias_paciente" id="row{{  $alergia->id  }}">
																		<td>
																			{{ $alergia->nombre_alergia }}
																		</td>
																		<td>
																			{{ $alergia->comentario }}
																		</td>
																		<td>
																			<div name="remove" id="{{  $alergia->id  }}" class="btn btn-danger btn_remove" onclick="eliminar_antecedente_alergia_paciente('{{  $alergia->id  }}');">Quitar</div>
																		</td>
																	</tr>
																@endforeach
															@else
																<tr>
																	<td colspan="2">
																		<center>
																			<b>No hay alergias registradas</b>
																		</center>
																	</td>
																</tr>
															@endif

														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>

                        {{-- Patologías Crónicas --}}
						<div class="col-sm-12 col-md-6">
							<div class="card">
								<div class="card-body d-flex align-items-center justify-content-between bg-c-yellow">
									<h5 class="mb-0 text-white">
										Patologías Crónicas
									</h5>
								</div>

								<div class="card-body border-top info_contacto_sos collapse show" id="info_contacto_sos_1">
									<div class="row">
										<form id="agregar_patologia_cronica">
											<div class="col-sm-12">
												<div class="form-row">
													<div class="form-group col-sm-12 col-md-12">
														<label class="floating-label-activo-sm">Seleccione</label>
                                                        <select class="form-control form-control-sm" onchange="antecedente_cambiar_enfermedad_cronica();" id="ant_nombre_patologia_cronica" name="ant_nombre_patologia_cronica">
                                                            <option value="0">Seleccione una opción</option>
                                                            <option value="1">OBESIDAD</option>
                                                            <option value="2">HIPERTENSIÓN ARTERIAL</option>
                                                            <option value="3">DIABETES</option>
                                                            <option value="4">INSUFICIENCIA RENAL</option>
                                                            <option value="5">MARCADORES TUMORALES</option>
                                                            <option value="6">REUMATOLOGÍA</option>
                                                            <option value="7">LITEMIA</option>
                                                        </select>
														<input type="hidden" name="id_ant_nombre_patologia_cronica" id="id_ant_nombre_patologia_cronica" value=""/>
													</div>
												</div>
											</div>
											<div class="col-sm-12">

												 <button type="button" onclick="agregar_patologia_cronica_paciente({{ $paciente->id }});" class="btn btn-warning  btn-sm float-right"><i class="fa fa-plus"></i> Agregar Patología</button>

											</div>
										</form>
									</div>
									<br>
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<div class="row form-group">
													<table class="table table-bordered table-xs" id="table_patologia_cronica">
														<thead>
															<tr>
																<th>Patología</th>
																<th>Acción</th>
															</tr>
														</thead>
														<tbody>

															@if (isset($patoligias_cronicas))
																@foreach ($patoligias_cronicas as $cronica)
																	<tr>
																		<td>
																			{{ $cronica->nombre_patologia_cronica }}
																		</td>
																		 <td>
																			<div name="remove" id="{{  $cronica->id  }}" class="btn btn-danger btn_remove" onclick="eliminar_patologia_cronica_paciente('{{  $paciente->id  }}','{{  $cronica->id  }}');">Quitar</div>
																		</td>
																	</tr>
																@endforeach
															@else
																<tr>
																	<td colspan="2">
																		<center>
																			<b>No hay patologias crónicas registradas</b>
																		</center>
																	</td>
																</tr>
															@endif

														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>

								</div>

							</div>
						</div>

                        {{-- Medicamentos de uso Crónico --}}
						<div class="col-sm-12 col-md-6">
							<div class="card">
								<div class="card-body d-flex align-items-center justify-content-between bg-c-red">
									<h5 class="mb-0 text-white">
										Medicamentos de uso Crónico
									</h5>
								</div>
								<div class="card-body border-top info_contacto_sos collapse show" id="info_contacto_sos_1">
									 <div class="row">
										<form id="agregar_medicamento_cronico_paciente">
											<div class="col-sm-12">
												<div class="form-row">
													<div class="form-group col-sm-6 col-md-6">
														<label class="floating-label-activo-sm">Seleccione</label>
														<input type="text" id="antecedentes_medicamento_cronico_paciente" name="antecedentes_medicamento_cronico_paciente" class="form-control form-control-sm" placeholder="Nombre" value="">
														<input type="hidden" name="id_antecedentes_medicamento_cronico_paciente" id="id_antecedentes_medicamento_cronico_paciente" value=""/>
													</div>
													<div class="form-group col-sm-6 col-md-6">
														<label class="floating-label-activo-sm">Dosis Diaria</label>
														{{--  <input type="person" class="form-control form-control-sm" name="antecedentes_dosis_medicamento_cronico_paciente" id="antecedentes_dosis_medicamento_cronico_paciente">  --}}
                                                        <select class="form-control form-control-sm" name="antecedentes_dosis_medicamento_cronico_paciente" id="antecedentes_dosis_medicamento_cronico_paciente"></select>
													</div>
												</div>
											</div>
											<div class="col-sm-12">
                                                <button type="button" onclick="agregar_medicamento_cronico_paciente({{ $paciente->id }});" class="btn btn-danger  btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento</button>
											</div>
										</form>

									</div>
									<br>
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<div class="row form-group">
												  <table class="table table-bordered table-xs" id="table_medicamento_cronico">
														<thead>
															<tr>
																<th>Nombre</th>
																<th>Dosis</th>
																<th>Acción</th>
															</tr>
														</thead>
														<tbody>

															@if (isset($medicamentos_cronicos))
																@foreach ($medicamentos_cronicos as $med_cronico)
																	<tr>
																		<td>
																			{{ $med_cronico->nombre_medicamento_cronico }}
																		</td>
                                                                        <td>
																			{{ $med_cronico->dosis }}
																		</td>
																		<td>
																			<div name="remove" id="{{  $med_cronico->id  }}" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_cronico_paciente('{{  $paciente->id  }}','{{  $med_cronico->id  }}');">Quitar</div>
																		</td>
																	</tr>
																@endforeach
															@else
																<tr>
																	<td colspan="2">
																		<center>
																			<b>No hay Medicamentos crónicos registradas</b>
																		</center>
																	</td>
																</tr>
															@endif

														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

                        {{-- antecedentes cirugias --}}
						<div class="col-sm-12 col-md-6">
							<div class="card">
								<div class="card-body d-flex align-items-center justify-content-between bg-c-green">
									<h5 class="mb-0 text-white">
										 Antecedentes Quirúrgicos
									</h5>
								</div>
								<div class="card-body border-top info_contacto_sos collapse show" id="info_contacto_sos_1">
									<div class="row">
										<form id="agregar_antecedentes_cirugias_paciente">
											<div class="col-sm-12">
												<div class="form-row">
													<div class="form-group col-sm-4 col-md-4">
														<label class="floating-label-activo-sm">Fecha (Aproximada)</label>
														<input type="text" class="form-control form-control-sm" name="fecha_hora_operacion" id="ant_cirugias_fecha_hora_operacion">
													</div>
													<div class="form-group col-sm-4 col-md-4">
														<label class="floating-label-activo-sm">Operación</label>
														<input type="person" class="form-control form-control-sm" name="operacion" id="ant_cirugias_operacion">
													</div>
													<div class="form-group col-sm-4 col-md-4">
														<label class="floating-label-activo-sm">Complicaciones</label>
														<input type="text" class="form-control form-control-sm" name="comentarios" id="ant_cirugias_comentarios">
													</div>
												</div>
											</div>
											<div class="col-sm-12">
                                                <button type="button" onclick="agregar_cirugias_paciente({{ $paciente->id }});" class="btn btn-success  btn-sm float-right"><i class="fa fa-plus"></i> Agregar Cirugias</button>
											</div>
										</form>
									</div>
									<br>
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<div class="row form-group">
												  <table class="table table-bordered table-xs" id="table_antecedente_cirugia">
														<thead>
															<tr>
																<th>Fecha</th>
																<th>Operación</th>
																<th>Complicaciones</th>
																<th>Acción</th>
															</tr>
														</thead>
														<tbody>

															@if (isset($antecedentes_cirugias))
																@foreach ($antecedentes_cirugias as $cirugia)
																	<tr>
                                                                        <td>
                                                                            {{ $cirugia->fecha_cirugia }}
                                                                        </td>
																		<td>
                                                                            {{ $cirugia->nombre }}
																		</td>
                                                                        <td>
                                                                            {{ $cirugia->comentarios }}
																		</td>
																		<td>
																			<div name="remove" id="{{  $med_cronico->id  }}" class="btn btn-danger btn_remove" onclick="eliminar_cirugias_paciente('{{  $paciente->id  }}','{{  $cirugia->id  }}');">Quitar</div>
																		</td>

																	</tr>
																@endforeach
															@else
																<tr>
																	<td colspan="2">
																		<center>
																			<b>No hay Antecedentes Quirúrgicos registradas</b>
																		</center>
																	</td>
																</tr>
															@endif
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

                        {{-- COMENTADO --}}
						 <!--<div class="col-sm-12 col-md-6">
							<div class="card-body d-flex align-items-center justify-content-between bg-c-green">
									<h5 class="mb-0 text-white">
										Antecedentes Quirúrgicos
									</h5>
								</div>

								<div class="card-body border-top info_contacto_sos collapse show" id="info_contacto_sos_1">
									 <div class="row">
										<form id="agregar_antecedente_quirurgico_paciente">
											<div class="col-sm-12">
												<div class="form-row">
													<div class="form-group col-sm-4 col-md-4">
														<label class="floating-label-activo-sm">fecha</label>
														<input type="date" class="form-control form-control-sm" name="fecha_hora_operacion" id="fecha_hora_operacion">
													</div>
													<div class="form-group col-sm-4 col-md-4">
														<label class="floating-label-activo-sm">Operación</label>
														<input type="person" class="form-control form-control-sm" name="operacion" id="operacion">
													</div>
													<div class="form-group col-sm-4 col-md-4">
														<label class="floating-label-activo-sm">Complicaciones</label>
														<input type="text" class="form-control form-control-sm" name="complicaciones" id="complicaciones">
													</div>
												</div>
											</div>
											<div class="col-sm-12">
												<button type="button" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Operación</button>
											</div>
										</form>
									</div>
									<br>
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<div class="row form-group">
												  <table class="table table-bordered table-xs" id="table_antecedente_quirurgico_paciente">
														<thead>
															<tr>
																<th>Fecha</th>
																<th>Operación</th>
																<th>Complicaciones</th>
																<th>Acción</th>
															</tr>
														</thead>
													   <tbody>
															@if (isset($antecedentes_quirurgicos))
																@foreach ($antecedentes_quirurgicos as $quirurgico)
																	<tr>
																		<td>
																			<h5> {{ $quirurgico->operacion }}</h5>
																		</td>
																		<td>

																			<h5>{{ \Carbon\Carbon::parse($quirurgico->fecha_hora_operacion)->format('d/m/Y') }}
																			</h5>
																		</td>
																		<td>
																			<h5>botones</h5>
																		</td>

																	</tr>
																@endforeach
															@else
																<tr>
																	<td colspan="2">
																		<center>
																			<b>No hay Antecedentes Quirúrgicos
																				registradas</b>
																		</center>
																	</td>
																</tr>
															@endif
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>-->

					</div>
				</div>

				<!--(Editar) Datos ANTECEDENTES PATOLOGICOS GENERALES-->
			</div>
			<!--Cierre: Datos medicos generales-->
		</div>
	</div>
</div>


<!-- ANTECEDENTE CONFIDENCIAL -->
<div class="row">
    <div class="col-md-12">
            <!--Card Datos Confidenciales-->
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                <h5 class="mb-0 text-white">Antecedentes III (Datos Confidenciales)</h5>
                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right div_data" data-toggle="collapse" data-target=".info_confidencial_sos" aria-expanded="false" aria-controls="info_confidencial_sos_1 info_confidencial_sos_2" style="display: none;">
                    <i class="feather icon-edit"></i>
                </button>
            </div>

            <!-- SOLICITUD DE PERMISO PARA VER -->
            <div class="card-body border-top info_confidencial_sos collapse show div_autorizacion" id="info_confidencial_permiso" >
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-row">
                            <input type="hidden" name="id_tipo_autorizacion_acompanante" id="id_tipo_autorizacion_acompanante" value="5">
                            <input type="hidden" name="id_control" id="id_control" value="{{ $paciente->id }}">
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Rut</label>
                                @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
                                    <input type="text" class="form-control form-control-sm" name="rut_acompanante" id="rut_acompanante" oninput="formatoRut(this)">
                                @else
                                    <input type="text" class="form-control form-control-sm" name="rut_acompanante" id="rut_acompanante" oninput="formatoRut(this)" value="{{ $paciente->rut }}" readonly>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Nombres</label>
                                @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
                                    <input type="text" class="form-control form-control-sm" name="nombre_acompanante" id="nombre_acompanante">
                                @else
                                    <input type="text" class="form-control form-control-sm" name="nombre_acompanante" id="nombre_acompanante" value="{{ $paciente->nombres }}" readonly>
                                @endif

                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Apellidos</label>
                                @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
                                    <input type="text" class="form-control form-control-sm" name="apell_acompanante" id="apell_acompanante">
                                @else
                                    <input type="text" class="form-control form-control-sm" name="apell_acompanante" id="apell_acompanante" value="{{ $paciente->apellido_uno.' '.$paciente->apellido_dos }}" readonly>
                                @endif

                            </div>
                            <div class="form-group col-md-3" id="">
                                <label class="floating-label-activo-sm">Relación</label>
                                <select name="relacion_acompanante" id="relacion_acompanante" class="form-control form-control-sm">
                                    @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
                                        <option value="0">Seleccione</option>
                                        <option value="1">Madre</option>
                                        <option value="2">Padre</option>
                                    @else
                                        <option value="99" checked>Paciente</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3" id="">
                                <label class="floating-label-activo-sm">Forme de envio</label>
                                <select name="tipo_medio_acompanante" id="tipo_medio_acompanante" class="form-control form-control-sm">
                                    <option value="1">SMS</option>
                                    <option value="2">EMAIL</option>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Teléfono</label>
                                @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
                                    <input type="text" class="form-control form-control-sm" name="tel_acompanante" id="tel_acompanante">
                                @else
                                    <input type="text" class="form-control form-control-sm" name="tel_acompanante" id="tel_acompanante" value="{{ $paciente->telefono_uno }}" readonly>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Email</label>
                                @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
                                    <input type="text" class="form-control form-control-sm" name="email_acompanante" id="email_acompanante">
                                @else
                                    <input type="text" class="form-control form-control-sm" name="email_acompanante" id="email_acompanante" value="{{ $paciente->email }}" readonly>
                                @endif

                            </div>
                            <div class="form-group col-md-3">
                                <button type="button" class="btn btn-success btn-block btn-sm" onclick="solicitar_autorizacion();"><i class="fa fa-plus"></i> Autoriza el examen</button>
                                <!--genera codigo de aceptación al teléfono del responsable -->
                            </div>

                            {{--  <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Nombre del acompañante</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_acompanante" id="nombre_acompanante" value="{!! old('nombre_acompanante') !!}">
                            </div>
                            <div class="form-group col-md-6" id="form_0">
                                <label class="floating-label-activo-sm">Relaci&oacute;n</label>
                                <input type="text" class="form-control form-control-sm" name="relacion_acompanante" id="relacion_acompanante" value="{!! old('relacion_acompanante') !!}">
                            </div>  --}}
                        </div>

                    </div>
                </div>
            </div>


            <!-- INFO ANTECEDENTE CONFIDENCIAL -->
            <div class="card-body border-top info_confidencial_sos collapse div_data show" id="info_confidencial_sos_1" style="display: none;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label font-weight-bolder">¿Acepta Romper Clave en caso de Urgencia?</label>
                            <div class="col-sm-5 col-form-label">
                                @if ($ant_confidenciales != null && $ant_confidenciales->rompeclave == 1)
                                    SI
                                @else
                                    NO
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label font-weight-bolder">Antecedentes Médicos</label>
                            <div class="col-sm-5 my-auto ml-2">
                                @if ($ant_confidenciales != null && $ant_confidenciales->antecedentes != '')
                                    {{ trim($ant_confidenciales->antecedentes) }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label font-weight-bolder">Otros Antecedentes</label>
                            <div class="col-sm-5 my-auto ml-2">
                                @if ($ant_confidenciales != null && $ant_confidenciales->otros_antecedentes != '')
                                    {{ trim($ant_confidenciales->otros_antecedentes) }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--Cierre: confidencial-->
            <!--(Editar) confidencial-->
            <div class="card-body border-top info_confidencial_sos collapse "id="info_confidencial_sos_2">
                <div class="row">

                        <div class="col-sm-6" >
                            <label class="font-weight-bolder">¿Autoriza  romper clave en caso de urgencia?</label>
                        </div>
                        <div class="col-sm-5 my-auto">
                            @if ($ant_confidenciales != null && $ant_confidenciales->rompeclave == 1)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="edit_rompe_clave" id="edit_rompe_clave" value="1" checked>
                                    <label class="form-check-label" for="rompe_clave_si">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="edit_rompe_clave" id="edit_rompe_clave" value="0">
                                    <label class="form-check-label" for="rompe_clave_no">No</label>
                                </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="edit_rompe_clave" id="edit_rompe_clave" value="1">
                                    <label class="form-check-label" for="rompe_clave_si">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="edit_rompe_clave" id="edit_rompe_clave" value="0" checked>
                                    <label class="form-check-label" for="rompe_clave_no">No</label>
                                </div>
                            @endif
                        </div>

                </div>


                <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12 mt-2">
                                <div class="form-group fill">
                                        <label id="" name="" class="floating-label-activo-sm">Antecedentes Médicos Confidenciales </label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="antecedentes_medicos_conf" id="antecedentes_medicos_conf">@if ($ant_confidenciales != null && $ant_confidenciales->antecedentes != ''){{ trim($ant_confidenciales->antecedentes) }}@endif</textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12 mt-2">
                                <div class="form-group fill">
                                        <label id="" name="" class="floating-label-activo-sm">Otros Antecedentes Personales</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="otros_antecedentes_medicos_conf" id="otros_antecedentes_medicos_conf">@if ($ant_confidenciales != null && $ant_confidenciales->otros_antecedentes != ''){{ trim($ant_confidenciales->otros_antecedentes) }}@endif</textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <div data-toggle="collapse" data-target=".info_confidencial_sos" aria-expanded="false" aria-controls="info_confidencial_sos_1 info_confidencial_sos_2" class="btn btn-danger mr-2">Cancelar</div>
                            <button type="button" onclick="editar_ant_confidencial_paciente({{ $paciente->id }});" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                </div>
            </div>
            <!--cierre(Editar) confidencial-->
        </div>
        <!--Cierre: confidencial-->
    </div>
</div>

@include('atencion_medica.formularios.modal_atencion_general.modal_autorizacion')
