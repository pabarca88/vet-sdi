@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
	<!--Container Completo-->
	<div class="pcoded-main-container">
		<div class="pcoded-content">
			<div class="page-header">
				<div class="page-block">
					<div class="row">
						<div class="col-md-12">
							<div class="page-header-title">
								<h5 class="font-weight-bolder">Mi Perfil</h5>
							</div>
							<ul class="breadcrumb mb-4">
								<li class="breadcrumb-item">
									<a href="escritorio_profesional_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
										<i class="feather icon-home">
										</i>
									</a>
								</li>
								<li class="breadcrumb-item">
									<a href="perfil.php">Mi Perfil</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-profile user-card mb-4">
				<div class="card-body py-0">
					<div class="user-about-block m-0">
						<div class="row">
							<div class="col-md-12 text-center mt-n4">
								<div class="change-profile text-center">
									<div class="dropdown w-auto d-inline-block">
										<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<div class="profile-dp">
												<div class="position-relative d-inline-block">
													<img class="img-radius img-fluid wid-100" src="../assets/images/iconos/usuario_profesional.svg" alt="User image">
												</div>
												<div class="overlay">
													<span>Actualizar</span>
												</div>
											</div>
										</a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#"><i class="feather icon-upload-cloud mr-2"></i>Cambiar foto de perfil</a>
											<a class="dropdown-item" href="#"><i class="feather icon-trash-2 mr-2"></i>Eliminar fotografía</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 mt-md-2">
								<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="btn btn-outline-info btn-sm mb-2 mx-2 active" id="personal-tab" data-toggle="tab" href="#info_personal" role="tab" aria-controls="info_personal" aria-selected="true"><i class="feather icon-user mr-2"></i>Información Personal</a>
									</li>
									<li class="nav-item">
										<a class="btn btn-outline-info btn-sm mb-2 mx-2" id="academico-tab" data-toggle="tab" href="#info_academico" role="tab" aria-controls="info_academico" aria-selected="false"><i class="feather icon-lock mr-2"></i>Mi Perfil Académico</a>
									</li>
									<li class="nav-item">
										<a class="btn btn-outline-info btn-sm mb-2 mx-2" id="pass-tab" data-toggle="tab" href="#pass" role="tab" aria-controls="pass" aria-selected="false"><i class="feather icon-lock mr-2"></i>Cambiar Contraseña</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="tab-content" id="myTabContent">
						<!--Tab Información Personal-->
						<div class="tab-pane fade show active" id="info_personal" role="tabpanel" aria-labelledby="personal-tab">
							<div class="row">
								<div class="col-md-6">
									<!--Card Información Básica-->
									<div class="card">
										<div class="card-body d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Datos Personales</h5>
											<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--Datos Personales-->
										<div class="card-body border-top info_basica collapse show" id="info_basica-1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Rut</label>
													<div class="col-sm-7 my-auto ml-2 font-weight-bolder"> 00000000-0 </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Nombres</label>
													<div class="col-sm-7 my-auto ml-2 font-weight-bolder"> Jaime Jaime </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Apellidos</label>
													<div class="col-sm-7 my-auto ml-2 font-weight-bolder"> Kriman Astorga</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Sexo</label>
													<div class="col-sm-7 my-auto ml-2 font-weight-bolder"> Hombre </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Nacimiento</label>
													<div class="col-sm-7 my-auto ml-2 font-weight-bolder"> 00-00-0000 </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Profesión</label>
													<div class="col-sm-7 my-auto ml-2 font-weight-bolder"> Tecnico en laboratorio </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Especialidad</label>
													<div class="col-sm-7 my-auto ml-2 font-weight-bolder"> Tecnico en laboratorio </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Rol en laboratorio</label>
													<div class="col-sm-7 my-auto ml-2 font-weight-bolder"> Análisis de muestras </div>
												</div>
											</form>
										</div>
										<!--Cierre: Datos Personales-->
										<!--(Editar)Datos Personales-->
										<div class="card-body border-top info_basica collapse" id="pinfo_basica_2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Rut" value="00000000-0">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nombres</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Nombre" value="Jaime Jaime">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Apellidos</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Segundo Apellido" value="Bravo">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
													<div class="col-sm-7 my-auto">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
															<label class="form-check-label" for="inlineRadio1">Hombre</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
															<label class="form-check-label" for="inlineRadio2">Mujer</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
													<div class="col-sm-7">
														<input type="date" class="form-control" value="000-00-00">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Profesión</label>
													<div class="col-sm-7">
														<select class="form-control" id="exampleFormControlSelect1">
															<option>Seleccione su Profesión</option>
															<option>Tecnólogo médico</option>
															<option>Técnico de laboratorio</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Especialidad</label>
													<div class="col-sm-7">
														<select class="form-control" id="exampleFormControlSelect1">
															<option>Seleccione su especialidad</option>
															<option>Tecnólogo médico</option>
															<option>Técnico de laboratorio</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Rol en laboratorio</label>
													<div class="col-sm-7">
														<select class="form-control" id="exampleFormControlSelect1">
															<option>Seleccione su rol</option>
															<option>Toma de muestras de sangre</option>
															<option>Análisis de muestras</option>
															<option>Toma de muestras rayos</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-form-label"></label>
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="submit" class="btn btn-danger mr-2">Cancelar</button>
														<button type="submit" class="btn btn-info">Guardar Cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--Cierre: (Editar)Datos Personales-->
									</div>
									<!--Cierre: Card Datos Personales-->
								</div>
								<div class="col-md-6">
									<!--Card Contacto-->
									<div class="card">
										<div class="card-body d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Contacto</h5>
											<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--Contacto-->
										<div class="card-body border-top info_contacto collapse show" id="info_contacto_1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Correo Electrónico</label>
													<div class="col-sm-7 my-auto ml-2"> profesional@.. </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
													<div class="col-sm-7 my-auto ml-2"> 81912915 </div>
												</div>
											</form>
										</div>
										<!--Cierre: Contacto-->
										<!--(Editar) Contacto-->
										<div class="card-body border-top info_contacto collapse " id="info_contacto_2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Correo Electrónico</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Correo Electrónico" value="paciente@..">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Teléfono" value="81912915">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-form-label"></label>
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="submit" class="btn btn-danger mr-2">Cancelar</button>
														<button type="submit" class="btn btn-info">Guardar Cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--(Editar) Contacto-->
									</div>
									<!--Cierre: Card Contacto-->
									<!--Card Residencia-->
									<div class="card">
										<div class="card-body d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Residencia</h5>
											<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--Residencia-->
										<div class="card-body border-top info_residencial collapse show" id="info_residencial_1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Comuna</label>
													<div class="col-sm-7 my-auto ml-2"> Viña del Mar </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
													<div class="col-sm-7 my-auto ml-2"> Calle Nº Depto.. </div>
												</div>
											</form>
										</div>
										<!--Cierre: Residencia-->
										<!--(Editar) Residencia-->
										<div class="card-body border-top info_residencial collapse " id="info_residencial_2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Comuna</label>
													<div class="col-sm-7">
														<select class="form-control" id="exampleFormControlSelect1">
															<option>Seleccione su comuna</option>
															<option selected>Viña del Mar</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Dirección" value="Calle Nº Depto..">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-form-label"></label>
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="submit" class="btn btn-danger mr-2">Cancelar</button>
														<button type="submit" class="btn btn-info">Guardar Cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--(Editar) Residencia-->
									</div>
									<!--Cierre: Card Residencia-->
								</div>
							</div>
						</div>
						<!--Cierre: Tab Información Personal-->
						<!--Tab Cambiar Contraseña-->
						<div class="tab-pane fade" id="pass" role="tabpanel" aria-labelledby="pass-tab">
							<div class="row">
								<div class="col-md-6">
									<!--Card Contraseña-->
									<div class="card">
										<div class="card-body d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Cambie su Contraseña</h5>
											<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--Contraseña-->
										<div class="card-body border-top pass_personal collapse show" id="pass_personal_1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Contraseña Actual</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
												</div>
											</form>
										</div>
										<!--Cierre: Contraseña-->
										<!--(Editar)Contraseña-->
										<div class="card-body border-top pass_personal collapse" id="pass_personal_2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Contraseña Actual</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Contraseña Actual">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nueva Contraseña</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Nueva Contraseña">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Repita su Contraseña</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Repita la Contraseña">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-form-label"></label>
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="submit" class="btn btn-danger mr-2">Cancelar</button>
														<button type="submit" class="btn btn-info">Guardar Cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--Cierre: (Editar)Contraseña-->
									</div>
									<!--Cierre: Card Contraseña-->
								</div>
							</div>
						</div>
						<!--Tab perfil profesional-->
						<div class="tab-pane fade" id="info_academico" role="tabpanel" aria-labelledby="academico-tab">
							<div class="row">
								<div class="col-md-6">
									<!--Card profesion-->
									<div class="card">
										<div class="card-body d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Titulo Profesional</h5>
											<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".u_personal" aria-expanded="false" aria-controls="u_personal_1 u_personal_2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--profesion-->
										<div class="card-body border-top u_personal collapse show" id="u_personal_1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Universidad</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> Universidad de Chile</div>
													<label class="col-sm-4 col-form-label">Año de Titulo</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> 1979</div>
													<label class="col-sm-4 col-form-label">Ciudad y País</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> Santiago de Chile</div>
												</div>
											</form>
										</div>

										<!--Cierre: profesion->
										<!--(Editar)profesion-->
										<div class="card-body border-top u_personal collapse" id="u_personal_2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Universidad</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Universidad de Titulo">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Año de Titulo</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Año de Titulo">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Ciudad y País</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Ciudad y País">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-form-label"></label>
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="submit" class="btn btn-danger mr-2">Cancelar</button>
														<button type="submit" class="btn btn-info">Guardar Cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--Cierre: (Editar)profesion-->
									</div>
									<!--Cierre: Card profesion-->
								</div>
								<div class="col-md-6">
									<!--Card especialidad-->
									<div class="card">
										<div class="card-body d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Especialidad</h5>
											<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".u_e_personal" aria-expanded="false" aria-controls="u_e_personal_1 u_e_personal_2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--especialidad-->
										<div class="card-body border-top u_e_personal collapse show" id="u_e_personal_1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Universidad</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> Universidad de Chile</div>
													<label class="col-sm-4 col-form-label">Año de Titulo</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> 1982</div>
													<label class="col-sm-4 col-form-label">Ciudad y País</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> Santiago de Chile</div>
												</div>
											</form>
										</div>

										<!--Cierre: especialidad->
										<!--(Editar)especialidad-->
										<div class="card-body border-top u_e_personal collapse" id="u_e_personal_2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Universidad</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Universidad de Titulo">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Año de Titulo</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Año de Titulo">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Ciudad y País</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Ciudad y País">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-form-label"></label>
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="submit" class="btn btn-danger mr-2">Cancelar</button>
														<button type="submit" class="btn btn-info">Guardar Cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--Cierre: (Editar)especialidad-->
									</div>
									<!--Cierre: Card especialidad-->
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<!--Card subespecialidad-->
									<div class="card">
										<div class="card-body d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Subespecialidad</h5>
											<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".u_academica" aria-expanded="false" aria-controls="u_academica_3 u_academica_4">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--subespecialidad-->
										<div class="card-body border-top u_academica collapse show" id="u_academica_3">
											<form>
												<div class="form-group row">
												    <label class="col-sm-4 col-form-label">Nombre de Subespecialidad</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> Otología</div>
													<label class="col-sm-4 col-form-label">Universidad</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> Universidad de Chile</div>
													<label class="col-sm-4 col-form-label">Año de Titulo</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> 1979</div>
													<label class="col-sm-4 col-form-label">Ciudad y País</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> Santiago de Chile</div>
												</div>
											</form>
										</div>

										<!--Cierre: subespecialidad->
										<!--(Editar)subespecialidad-->
										<div class="card-body border-top u_academica collapse" id="u_academica_4">
											<form>
											    <div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nombre Subspecialidad</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Otología">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Universidad</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Universidad de Titulo">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Año de Titulo</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Año de Titulo">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Ciudad y País</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Ciudad y País">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-form-label"></label>
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="submit" class="btn btn-danger mr-2">Cancelar</button>
														<button type="submit" class="btn btn-info">Guardar Cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--Cierre: (Editar)subespecialidad-->
									</div>
									<!--Cierre: Card Otros-->
								</div>
								<div class="col-md-6">
									<!--Card Otros-->
									<div class="card">
										<div class="card-body d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Otros </h5>
											<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".u_ot_personal" aria-expanded="false" aria-controls="u_ot_personal_1 u_ot_personal_2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--Otros-->
										<div class="card-body border-top u_ot_personal collapse show" id="u_ot_personal_1">
											<form>
												<div class="form-group row">
												    <label class="col-sm-4 col-form-label">Otra Especialización</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> Cirugía de la Jaqueca</div>
													<label class="col-sm-4 col-form-label">Universidad</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> Universidad de Chile</div>
													<label class="col-sm-4 col-form-label">Año de Titulo</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> 1982</div>
													<label class="col-sm-4 col-form-label">Ciudad y País</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> Santiago de Chile</div>
												</div>
											</form>
										</div>

										<!--Cierre: Otros->
										<!--(Editar)Otros-->
										<div class="card-body border-top u_ot_personal collapse" id="u_ot_personal_2">
											<form>
											    <div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Otra Especialización</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Cirugía de la Jaqueca">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Universidad</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Universidad de Titulo">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Año de Titulo</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Año de Titulo">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Ciudad y País</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Ciudad y País">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-form-label"></label>
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="submit" class="btn btn-danger mr-2">Cancelar</button>
														<button type="submit" class="btn btn-info">Guardar Cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--Cierre: (Editar)Otros-->
									</div>
									<!--Cierre: Card Otros-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Cierre: Container Completo-->

	<script>
		// [ customer-scroll ] start
			var px = new PerfectScrollbar('.cust-scroll', {
				wheelSpeed: .5,
				swipeEasing: 0,
				wheelPropagation: 1,
				minScrollbarLength: 40,
			});
			// [ customer-scroll ] end
	</script>
@endsection
