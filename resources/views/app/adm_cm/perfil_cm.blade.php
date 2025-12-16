@extends('template.adm_cm.template')
@section('content')
{{--  ESTILOS PROPIOD DE LA VISTA   --}}
@section('page-styles')
    <link href='{{ asset('css/perfiles_usuarios.css') }}' rel='stylesheet' />
@endsection

{{--  CONTENIDO  --}}
@section('content')
	<!--Container Completo-->
	<div class="pcoded-main-container">
		<div class="pcoded-content">
			<div class="page-header">
				<div class="page-block">
					<div class="row">
						<div class="col-md-12">
							<div class="page-header-title">
								<h5 class="font-weight-bolder">Perfil Centro Médico</h5>
							</div>
							<ul class="breadcrumb mb-4">
								<li class="breadcrumb-item">
									<a href="escritorio_asistente.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
										<i class="feather icon-home"></i>
									</a>
								</li>
								<li class="breadcrumb-item">
									<a href="perfil_asistente.php">Mi perfil</a>
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

													<img class="img-radius img-fluid wid-100" src="{{ asset('images/iconos/cm.png') }}" alt="User image">
												</div>
												<div class="overlay">
													<span>Actualizar</span>
												</div>
											</div>
										</a>
										<div class="dropdown-menu">
											<a class="dropdown-item"><i class="feather icon-upload-cloud mr-2"></i>Cambiar foto de perfil</a>
											<a class="dropdown-item"><i class="feather icon-trash-2 mr-2"></i>Eliminar fotografía</a>
										</div>
									</div>
								</div>
							</div>
							<div id="pills_conf_centro" class="col-md-12 mt-md-2">
								<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="btn btn-outline-info btn-sm mb-2 mx-2 active" id="personal-tab" data-toggle="tab" href="#info_adm_personal" role="tab" aria-controls="info_adm_personal" aria-selected="true"><i class="feather icon-user mr-2"></i>Perfil Administrador</a>
									</li>
									<li class="nav-item">
										<a class="btn btn-outline-info btn-sm mb-2 mx-2" id="info_centro-tab" data-toggle="tab" href="#info_centro" role="tab" aria-controls="info_centro" aria-selected="false"><i class="feather icon-settings mr-2"></i>Perfil del Centro</a>
									</li>
									<li class="nav-item">
										<a class="btn btn-outline-info btn-sm mb-2 mx-2" id="roles-tab" data-toggle="tab" href="#roles" role="tab" aria-controls="roles" aria-selected="false"><i class="feather icon-user-plus mr-2"></i>Administrador de roles y Permisos del Centro</a>
									</li>
									<li class="nav-item">
										<a class="btn btn-outline-info btn-sm mb-2 mx-2" id="areas-tab" data-toggle="tab" href="#areas" role="tab" aria-controls="areas" aria-selected="false"><i class="feather icon-settings mr-2"></i>Areas y Departamentos</a>
									</li>
									<li class="nav-item">
										<a class="btn btn-outline-info btn-sm mb-2 mx-2" id="sucursales-tab" data-toggle="tab" href="#sucursales" role="tab" aria-controls="sucursales" aria-selected="false"><i class="feather icon-settings mr-2"></i>Sucursales</a>
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
						<!--Información Personal-->
						<div class="tab-pane fade show active" id="info_adm_personal" role="tabpanel" aria-labelledby="info_adm_personal-tab">
							<div class="row">
								<div class="col-md-4">
									<!--Card Datos Personales Administrador Centro Médico-->
									<div class="card">
										<div class="card-header d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Información del Administrador del Centro Médico</h5>
											<button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--Datos Personales Administrador Centro Médico-->
										<div class="card-body info_basica collapse show" id="info_basica-1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_rut"></div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_nombre"></div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_direccion"></div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Profesión</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_profesion"></div>
												</div>
											</form>
										</div>
										<!--Datos Personales Administrador Centro Médico-->
										<!--(Editar)Datos Personales Administrador Centro Médico-->
										<div class="card-body info_basica collapse" id="info_basica-2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" placeholder="Rut" id="editar_rut_adm_centro" name="editar_rut_adm_centro"value=" ">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" placeholder="Nombre" id="editar_nombre_adm_centro" name="editar_nombre_adm_centro" value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" placeholder="Dirección" id="editar_direccion_adm_centro" name="editar_direccion_adm_centro" value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Profesión</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" placeholder="Profesión" id="editar_prof_adm_centro" name="editar_prof_adm_centro" value="">
													</div>
												</div>

											</form>
										</div>
										<!--Cierre: (Editar)Datos Personales Administrador Centro Médico-->
									</div>
									<!--Cierre: Card Datos Personales Administrador Centro Médico-->
								</div>
								<div class="col-md-4">
									<!--Card Contacto Administrador Centro Médico-->
									<div class="card">
										<div class="card-header d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Contacto</h5>
											<button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--Contacto Administrador Centro Médico-->
										<div class="card-body info_contacto collapse show" id="info_contacto_1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Correo Electrónico</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_email" name="ver_email">sdsad</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_telefono_uno" name="ver_telefono_uno">df</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder" >Región</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_region"></div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder" >Ciudad</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_ciudad"></div>
												</div>

											</form>
										</div>
										<!--Cierre: Contacto Administrador Centro Médico-->
										<!--(Editar) Contacto Administrador Centro Médico-->
										<div class="card-body info_contacto collapse" id="info_contacto_2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Correo electrónico</label>
													<div class="col-sm-7 font-weight-bolder">
														<input type="text" class="form-control form-control-sm" placeholder="Correo Electrónico" id="editar_email" name="editar_email"  value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Teléfono</label>
													<div class="col-sm-7 font-weight-bolder">
														<input type="text" class="form-control form-control-sm" placeholder="Teléfono"  id="editar_telefono_uno" name="editar_telefono_uno" value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label" >Región</label>
													<div class="col-sm-7">
														<select class="form-control form-control-sm" id="region_agregar" name="region_agregar" onchange="buscar_ciudad();">

														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label" >Ciudad</label>
													<div class="col-sm-7">
														<select class="form-control form-control-sm" id="region_agregar" name="region_agregar" onchange="buscar_ciudad();">

														</select>
													</div>
												</div>


												<div class="form-group row">
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="button" class="btn btn-sm btn-danger mr-2" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">Cancelar</button>
														<button type="button" class="btn btn-sm btn-info" onclick="editar_asistente_datos_contacto();" >Guardar cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--(Editar) Contacto-->
									</div>
									<!--Cierre: Card Contacto-->

									<!--Cierre: Card Residencia-->
								</div>
                                <div class="col-md-4">
									<!--Contraseña-->
									<div class="card">
										<div class="card-header d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Cambiar contraseña</h5>
											<button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--Contraseña-->
										<div class="card-body pass_personal collapse show" id="pass_personal_1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Contraseña actual</label>
													<div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
												</div>
											</form>
										</div>
										<!--Cierre: Contraseña-->
										<!--(Editar)Contraseña-->
										<div class="card-body pass_personal collapse" id="pass_personal_2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Contraseña actual</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" placeholder="Contraseña Actual">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nueva contraseña</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" placeholder="Nueva Contraseña">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Repitir contraseña</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" placeholder="Repita la Contraseña">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-form-label"></label>
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
														<button type="submit" class="btn btn-sm btn-info">Guardar cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--Cierre: (Editar)Contraseña-->
									</div>
									<!--Cierre:Contraseña-->
								</div>

							</div>
						</div>
						<!--Cierre: Tab Información Personal-->

						<!--Info Centro-->
						<div class="tab-pane fade" id="info_centro" role="tabpanel" aria-labelledby="info_centro-tab">
							<div class="row">
								<div class="col-md-6">
									<!--Card Información Básica Centro-->
									<div class="card">
										<div class="card-header d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Datos del Centro Médico</h5>
											<button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--Datos Personales-->
										<div class="card-body info_basica collapse show" id="info_basica-1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_rut"></div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_nombre"></div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_apellido_uno"></div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Razón Social</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_nacimiento"></div>
												</div>
											</form>
										</div>
										<!--Cierre: Datos Personales-->
										<!--(Editar)Datos Personales-->
										<div class="card-body info_basica collapse" id="info_basica-2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" placeholder="Rut" id="editar_rut" name="editar_rut"value=" ">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" placeholder="Nombre" id="editar_nombre" name="editar_nombre" value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" placeholder="Primer Apellido" id="editar_apellido_uno" name="editar_apellido_uno" value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Razón Social</label>
													<div class="col-sm-7">
														<input type="text" class="form-control form-control-sm" id="editar_nacimiento" name="editar_nacimiento" value="}">
													</div>
												</div>
												<div class="form-group row">

												</div>
											</form>
										</div>
										<!--Cierre: (Editar)Datos Personales-->
									</div>
									<!--Cierre: Card Información Básica Centro-->
								</div>

								<div class="col-md-6">
									<!--Card Contacto Centro Medico-->
									<div class="card">
										<div class="card-header d-flex align-items-center justify-content-between bg-info">
											<h5 class="mb-0 text-white">Contacto</h5>
											<button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
												<i class="feather icon-edit"></i>
											</button>
										</div>
										<!--Info centro Medico-->
										<div class="card-body info_contacto collapse show" id="info_contacto_1">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Correo Electrónico</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_email" name="ver_email">sdsad</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_telefono_uno" name="ver_telefono_uno">df</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder" >Región</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_region"></div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label font-weight-bolder" >Ciudad</label>
													<div class="col-sm-7 my-auto ml-2" id="ver_ciudad"></div>
												</div>
											</form>
										</div>
										<!--Cierre: Info centro Medico-->
										<!--(Editar) Info centro Medico-->
										<div class="card-body info_contacto collapse" id="info_contacto_2">
											<form>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Correo electrónico</label>
													<div class="col-sm-7 font-weight-bolder">
														<input type="text" class="form-control form-control-sm" placeholder="Correo Electrónico" id="editar_email" name="editar_email"  value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Teléfono</label>
													<div class="col-sm-7 font-weight-bolder">
														<input type="text" class="form-control form-control-sm" placeholder="Teléfono"  id="editar_telefono_uno" name="editar_telefono_uno" value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label" >Región</label>
													<div class="col-sm-7">
														<select class="form-control form-control-sm" id="region_agregar" name="region_agregar" onchange="buscar_ciudad();">

														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label" >Ciudad</label>
													<div class="col-sm-7">
														<select class="form-control form-control-sm" id="region_agregar" name="region_agregar" onchange="buscar_ciudad();">

														</select>
													</div>
												</div>

												<div class="form-group row">
													<div class="col-sm-12 d-flex justify-content-end">
														<button type="button" class="btn btn-sm btn-danger mr-2" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">Cancelar</button>
														<button type="button" class="btn btn-sm btn-info" onclick="editar_asistente_datos_contacto();" >Guardar cambios</button>
													</div>
												</div>
											</form>
										</div>
										<!--(Editar) Info centro Medico-->
									</div>
									<!--Cierre: Card Info centro Medico-->
								</div>
							</div>
						</div>
						<!--Administrador de roles y permisos-->
						<div class="tab-pane fade" id="roles" role="tabpanel" aria-labelledby="roles-tab">
							<div class="card">
                                <div class="card-header bg-info">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<h4 class="text-white f-20 mt-2 mb-2 float-left">Administrador de Roles y Permisos</h4>
											</div>
											<div class="col-md-6">
												<div class="btn-group mr-2 float-right mt- mb-">
													<button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_otropersonal"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo</button>
												</div>
											</div>
										</div>
									</div>
								</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-12">
                                            <table id="roles_permisos" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-wrap text-center align-middle">Cargo</th>
                                                        <th class="text-wrap text-center align-middle">Rol</th>
                                                        <th class="text-wrap text-center align-middle">Área</th>

                                                        <th class="text-wrap text-center align-middle">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center"><strong>Administrador Médico</strong></td>

                                                        <td class="align-middle text-center">Adm. Médica</td>
                                                        <td class="align-middle text-center">Medica</td>

                                                       <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="pv_contacto();" data-toggle="tooltip" data-placement="top" title="Encargado"><i class="feather icon-phone-call"></i></button>
                                                            <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="rol_permisos_cm();" data-toggle="tooltip" data-placement="top" title="Rol y permisos"><i class="feather icon-settings"></i></button>
                                                           <!-- <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="docs();" data-toggle="tooltip" data-placement="top" title="Documentos"><i class="feather icon-file-text"></i></button>
                                                            <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="();" data-toggle="tooltip" data-placement="top" title="Configurar agenda"><i class="feather icon-calendar"></i></button>-->
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="pv_editar();" data-toggle="tooltip" data-placement="top" title="Editar Cargo"><i class="feather icon-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Desasociar"><i class="feather icon-x"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
                         <!--Tab nueva sucursal-->
                         <div class="tab-pane fade" id="sucursales" role="tabpanel" aria-labelledby="sucursales-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--Card Información Básica sucursal-->
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Datos de Nueva Sucursal</h5>
                                            <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Datos sucursal-->
                                        <div class="card-body info_basica collapse show" id="info_basica-1">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_rut"></div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_nombre"></div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_apellido_uno"></div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Razón Social</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_nacimiento"></div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Datos sucursal-->
                                        <!--(Editar)Datos sucursal-->
                                        <div class="card-body info_basica collapse" id="info_basica-2">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Rut" id="editar_rut" name="editar_rut"value=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Nombre" id="editar_nombre" name="editar_nombre" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Primer Apellido" id="editar_apellido_uno" name="editar_apellido_uno" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Razón Social</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control form-control-sm" id="editar_nacimiento" name="editar_nacimiento" value="}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: (Editar)Datos sucursal-->
                                    </div>
                                    <!--Cierre: Card Información nueva sucursal-->
                                </div>

                                <div class="col-md-6">
                                    <!--Card Contacto sucursal-->
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Contacto</h5>
                                            <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Info sucursal-->
                                        <div class="card-body info_contacto collapse show" id="info_contacto_1">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_email" name="ver_email">sdsad</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_telefono_uno" name="ver_telefono_uno">df</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder" >Región</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_region"></div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder" >Ciudad</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_ciudad"></div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Info sucursal-->
                                        <!--(Editar) Info sucursal-->
                                        <div class="card-body info_contacto collapse" id="info_contacto_2">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Correo electrónico</label>
                                                    <div class="col-sm-7 font-weight-bolder">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Correo Electrónico" id="editar_email" name="editar_email"  value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Teléfono</label>
                                                    <div class="col-sm-7 font-weight-bolder">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Teléfono"  id="editar_telefono_uno" name="editar_telefono_uno" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label" >Región</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control form-control-sm" id="region_agregar" name="region_agregar" onchange="buscar_ciudad();">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label" >Ciudad</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control form-control-sm" id="region_agregar" name="region_agregar" onchange="buscar_ciudad();">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-sm btn-danger mr-2" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">Cancelar</button>
                                                        <button type="button" class="btn btn-sm btn-info" onclick="editar_asistente_datos_contacto();" >Guardar cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--(Editar) Info sucursal-->
                                    </div>
                                    <!--Cierre: Card nueva sucursal-->
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Tab sucursal-->
						<!--Administrador de roles y permisos-->
						<div class="tab-pane fade" id="areas" role="tabpanel" aria-labelledby="areas-tab">
							<div class="user-profile user-card pt-0">
                                <div class="card-body py-0">
                                    <div class="user-about-block m-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link text-reset active" id="equip-med-tab" data-toggle="tab" href="#equip-med" role="tab" aria-controls="equip-med" aria-selected="true">Especialidades</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link text-reset" id="adm-tab" data-toggle="tab" href="#adm" role="tab" aria-controls="adm" aria-selected="false">Áreas</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- tab general-->
                            <!--Contenido de tab-->
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <div class="tab-content" id="myTabContent">
                                        <!--Equipo médico-->
                                        <div class="tab-pane fade show active" id="equip-med" role="tabpanel" aria-labelledby="equip-med-tab">
                                            <div class="card">
                                                <div class="card-header pt-3 pb-2 bg-light">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6 class="f-18 d-inline mt-3">Especialidades</h6>
                                                            <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                <button type="button" class="btn btn-sm btn-info" onclick="();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-12">
                                                            <table id="personal_vac" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-wrap text-center align-middle">Especialidad</th>
                                                                        <th class="text-wrap text-center align-middle">Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="align-middle text-center">Medicina general</td>
                                                                        <td class="align-middle text-center">
                                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="pv_editar();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Administración-->
                                        <div class="tab-pane fade" id="adm" role="tabpanel" aria-labelledby="adm-tab">
                                            <div class="card">
                                                <div class="card-header pt-3 pb-2 bg-light">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6 class="f-18 d-inline mt-3">Áreas</h6>
                                                            <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                <button type="button" class="btn btn-sm btn-info" onclick="();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-12">
                                                            <table id="personal_vac" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-wrap text-center align-middle">Jefe o (administrador)</th>
                                                                        <th class="text-wrap text-center align-middle">Área</th>
                                                                        <th class="text-wrap text-center align-middle">Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="align-middle text-center"><strong>Osvaldo Rojas</strong><br>
                                                                        00.000.000-0</td>
                                                                        <td class="align-middle text-center">Traumatología</td>
                                                                        <td class="align-middle text-center">
                                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="pv_editar();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Limpieza y mantención-->
                                        <div class="tab-pane fade" id="limp-mant" role="tabpanel" aria-labelledby="limp-mant-tab">
                                            <div class="card">
                                                <div class="card-header pt-3 pb-2 bg-light">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6 class="f-18 d-inline mt-3">Limpieza y mantención</h6>
                                                            <!--<div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                <button type="button" class="btn btn-sm btn-info" onclick="r_profesional();"><i class="feather icon-plus" aria-hidden="true"></i> Registrar profesional</button>
                                                            </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-12">
                                                            <table id="personal_vac" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-wrap text-center align-middle">Identificación</th>
                                                                        <th class="text-wrap text-center align-middle">Área</th>
                                                                        <th class="text-wrap text-center align-middle">Sucursal</th>
                                                                        <th class="text-wrap text-center align-middle">Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="align-middle text-center"><strong>Pablo Gutierrez</strong><br>
                                                                        11.344.985-6</td>
                                                                        <td class="align-middle text-center">Limpieza</td>
                                                                        <td class="align-middle text-center">CEMICAL</td>
                                                                        <td class="align-middle text-center">
                                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="pv_contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone-call"></i></button>
                                                                            <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="rol_permisos();" data-toggle="tooltip" data-placement="top" title="Rol y permisos"><i class="feather icon-settings"></i></button>
                                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="docs();" data-toggle="tooltip" data-placement="top" title="Documentos"><i class="feather icon-file-text"></i></button>
                                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="pv_editar();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Otros-->
                                        <div class="tab-pane fade" id="otros" role="tabpanel" aria-labelledby="otros-tab">
                                            <div class="card">
                                                <div class="card-header pt-3 pb-2 bg-light">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6 class="f-18 d-inline mt-3">Otros</h6>
                                                            <!--<div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                <button type="button" class="btn btn-sm btn-info" onclick="r_profesional();"><i class="feather icon-plus" aria-hidden="true"></i> Registrar profesional</button>
                                                            </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-12">
                                                            <table id="personal_vac" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-wrap text-center align-middle">Identificación</th>
                                                                        <th class="text-wrap text-center align-middle">Especialidad</th>
                                                                        <th class="text-wrap text-center align-middle">Sucursal</th>
                                                                        <th class="text-wrap text-center align-middle">Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="align-middle text-center"><strong>Pablo Gutierrez</strong><br>
                                                                        11.344.985-6</td>
                                                                        <td class="align-middle text-center">-</td>
                                                                        <td class="align-middle text-center">CEMICAL</td>
                                                                        <td class="align-middle text-center">
                                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="pv_contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone-call"></i></button>
                                                                            <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="rol_permisos();" data-toggle="tooltip" data-placement="top" title="Rol y permisos"><i class="feather icon-settings"></i></button>
                                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="docs();" data-toggle="tooltip" data-placement="top" title="Documentos"><i class="feather icon-file-text"></i></button>
                                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="pv_editar();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Container Completo-->
        <div id="roles_permisos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="roles_permisos" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title text-white text-center">Rol y permisos</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <h6 class="text-c-blue">Cargo</h6>
                                    <span>Profesional medico</span>
                                </div>
                                <div class="col-sm-12">
                                    <h6 class="text-c-blue mb-2">Roles y Permisos</h6>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="rol_1">
                                        <label class="custom-control-label" for="rol_1">rol_1</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="rol_2">
                                        <label class="custom-control-label" for="rol_2">rol_2</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="rol_3">
                                        <label class="custom-control-label" for="rol_3">rol_3</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="rol_4">
                                        <label class="custom-control-label" for="rol_4">rol_4</label>
                                    </div>

                                </div>
                            </div>
                        </form>

                        <div class="modal-footer mb-0 pb-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-info" >Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{--  @include( 'app.asistente.modales.modal_perfil' )  --}}
    {{--  CONTACTO DE EMERGENCIA  --}}
    @include( 'app.adm_cm.modales.agregar_contacto_emergencia' )
    @include( 'app.adm_cm.modales.informacion_contacto_emergencia' )
    @include( 'app.adm_cm.modales.editar_contacto_emergencia' )

@endsection

{{-- JS ADICIONALES PROPIOS DE LA VISTA  --}}
@section('page-script')
    <script src="{{ asset('js/tabla_contactos_emergencia.js') }}"></script>
	<script src="{{ asset('js/tooltip_contacto_emergencia.js') }}"></script>
    <script>
        $(document).ready(function(){
            $( "#editar_telefono_uno" ).focus(function() {
				if($("#editar_telefono_uno").val() == '')
                {
                    $("#editar_telefono_uno").val("+569");
                    $("#editar_telefono_uno").unbind();
                }
            });
        })
    </script>
@endsection
