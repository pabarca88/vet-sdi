@extends('template.laboratorio.adm_general.template')
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
									<a href="escritorio_admin_general_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
										<i class="feather icon-home">
										</i>
									</a>
								</li>
								<li class="breadcrumb-item">
									<a href="perfil_admin.php">Mi Perfil</a>
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
													<img class="img-radius img-fluid wid-100" src="../assets/images/iconos/usuario_administrador.svg" alt="User image">
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
													<label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
													<div class="col-sm-7 my-auto ml-2"> 00000000-0 </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nombres</label>
													<div class="col-sm-7 my-auto ml-2"> Adolfo Pablo </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Apellidos</label>
													<div class="col-sm-7 my-auto ml-2"> Santander Figueroa</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
													<div class="col-sm-7 my-auto ml-2"> Hombre </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
													<div class="col-sm-7 my-auto ml-2"> 00-00-0000 </div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Profesión</label>
													<div class="col-sm-7 my-auto ml-2"> Ingeniero comercial </div>
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
														<input type="text" class="form-control" placeholder="Nombres" value="Adolfo Pablo">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Apellidos</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" placeholder="Apellidos" value="Santander Figueroa">
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
														<input type="text" class="form-control" placeholder="Profesión" value="Ingeniero comercial ">
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
											<h5 class="mb-0 text-white">Cambiar Contraseña</h5>
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
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Cierre: Container Completo-->
@endsection