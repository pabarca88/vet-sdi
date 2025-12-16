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
								<h5 class="font-weight-bolder">Perfil Laboratorio</h5>
							</div>
							<ul class="breadcrumb mb-4">
								<li class="breadcrumb-item">
									<a href="escritorio_admin_general_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
										<i class="feather icon-home">
										</i>
									</a>
								</li>
								<li class="breadcrumb-item">
									<a href="perfil_laboratorio.php">Perfil laboratorio</a>
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
													<img class="img-radius img-fluid wid-100" src="../assets/images/iconos/usuario_laboratorio.svg" alt="User image">
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
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<!--Card Información Básica-->
							<div class="card">
								<div class="card-body d-flex align-items-center justify-content-between bg-info">
									<h5 class="mb-0 text-white">Identificación (casa matriz)</h5>
									<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
										<i class="feather icon-edit"></i>
									</button>
								</div>
								<!--Datos básicos-->
								<div class="card-body border-top info_basica collapse show" id="info_basica-1">
									<form>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
											<div class="col-sm-7 my-auto ml-2"> 00000000-0 </div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label font-weight-bolder">Nombre del laboratorio</label>
											<div class="col-sm-7 my-auto ml-2"> Nombre Laboratorio </div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label font-weight-bolder">Tipo de laboratorio</label>
											<div class="col-sm-7 my-auto ml-2"> 
											Laboratorio clínico </div>
										</div>
									</form>
								</div>
								<!--Cierre: Datos básicos-->
								<!--(Editar)Datos básicos-->
								<div class="card-body border-top info_basica collapse" id="pinfo_basica_2">
									<form>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" placeholder="Rut" value="00000000-0">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label font-weight-bolder">Nombre del laboratorio</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" placeholder="Nombre del laboratorio" value="Nombre del laboratorio">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label font-weight-bolder">Tipo de laboratorio</label>
											<div class="col-sm-7">
												<select class="form-control" id="exampleFormControlSelect1">
													<option>Seleccione una opción</option>
													<option>Laboratorio Clínico</option>
													<option></option>
													<option></option>
													<option></option>
													<option></option>
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
									<h5 class="mb-0 text-white">Contacto (casa matriz)</h5>
									<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
										<i class="feather icon-edit"></i>
									</button>
								</div>
								<!--Contacto-->
								<div class="card-body border-top info_contacto collapse show" id="info_contacto_1">
									<form>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label font-weight-bolder">Correo Electrónico</label>
											<div class="col-sm-7 my-auto ml-2"> laboratorio@.. </div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
											<div class="col-sm-7 my-auto ml-2"> 81912915 </div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label font-weight-bolder">Teléfono (opcional)</label>
											<div class="col-sm-7 my-auto ml-2"> 32 3782839 </div>
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
											<label class="col-sm-4 col-form-label font-weight-bolder">Teléfono (Opcional)</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" placeholder="Teléfono" value="32 398938">
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
							<!--Card Ubicación casa matriz-->
							<div class="card">
								<div class="card-body d-flex align-items-center justify-content-between bg-info">
									<h5 class="mb-0 text-white">Ubicación (casa matriz)</h5>
									<button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
										<i class="feather icon-edit"></i>
									</button>
								</div>
								<!--Ubicación casa matriz-->
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
								<!--Cierre: Ubicación casa matriz-->
								<!--(Editar) Ubicación casa matriz-->
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
								<!--(Editar) Ubicación casa matriz-->
							</div>
							<!--Cierre: Card Ubicación casa matriz-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Cierre: Container Completo-->
@endsection