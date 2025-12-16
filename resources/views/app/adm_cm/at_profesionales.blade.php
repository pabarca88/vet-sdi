@extends('template.adm_cm.template')
@section('content')
@include('app.adm_cm.modal_adm.datos_banco')
@include('app.adm_cm.modal_adm.modal_liquidacion')
@include('app.adm_cm.modal_adm.modal_liquidacion_fija')
@include('app.adm_cm.modal_adm.convenio_usuario')
@include('app.adm_cm.modal_adm.contacto_usuario')
@include('app.adm_cm.modal_adm.editar_profesional')
@include('app.adm_cm.modal_adm.registrar_profesional')
@include('app.adm_cm.modal_adm.asociar_profesional')
@include('app.adm_cm.modal_adm.roles_permisos_prof')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Atenciones Profesionales del Centro</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="adm_cm.home">Atenciones Profesionales</a></li>
							
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                            <li class="nav-item">
                                <a class="btn btn-outline-info active btn-sm mr-1 my-1" id="prof_salud-tab" data-toggle="tab" href="#prof-salud" role="tab" aria-controls="prof_-alud" aria-selected="false">Médicos</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="odontologos-tab" data-toggle="tab" href="#odontologos" role="tab" aria-controls="odontologos" aria-selected="false">Odontólogos</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="otros_prof-tab" data-toggle="tab" href="#otros_prof" role="tab" aria-controls="otros_prof" aria-selected="false">Otros Profesionales de la salud</a>
                            </li>
							<li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="otros_prof-tab" data-toggle="tab" href="#otros_prof" role="tab" aria-controls="otros_prof" aria-selected="false">Atenciones Totales Profesionales</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="Profesionales_cm">
                    <!--Tab medicos-->
                    <div class="tab-pane fade active show" id="prof-salud" role="tabpanel" aria-labelledby="prof-salud-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                               <div class="col-md-12">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left"> Atenciones  Profesionales Médicos por mes</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="at_profesionales" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Mes</th>
                                                    <th class="text-center align-middle">N° Atenciones</th>
													<th class="text-center align-middle">Convenio</th>
                                                    <th class="text-center align-middle">Generar Liq./Cobro</th>
													<th class="text-center align-middle">Estado</th>
													<th class="text-center align-middle">Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Jaime Kriman</strong></span><br>
                                                        <span>4.345.466-2</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Octubre</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>120</span>
                                                    </td>
													<td class="align-middle text-center">
														<!--Botón Modal-->
														<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="fas fa-file-contract"></i></button>
													</td>
                                                    <td class="align-middle text-center">
														<!--Botón Modal-->
														<button type="button" class="btn btn-info btn-sm btn-icon" onclick="liquidacion_prof_cm();" data-toggle="tooltip" data-placement="top" title="Generar Liquidación"><i class="fas fa-money-check-alt"></i></button>
													</td>					
													<td class="align-middle text-center">
														<span>Pagada</span>
													</td>
													<td class="align-middle text-center">
														<button type="button" class="btn btn-success btn-sm" onclick="#">
														<i class="feather icon-edit"></i>Ver (pdf)</button>
													</td>                       
                                                </tr>
												<tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Jaime Kriman</strong></span><br>
                                                        <span>4.345.466-2</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Octubre</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>120</span>
                                                    </td>
													<td class="align-middle text-center">
														<!--Botón Modal-->
														<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="fas fa-file-contract"></i></button>
													</td>
                                                    <td class="align-middle text-center">
														<!--Botón Modal-->
														<button type="button" class="btn btn-info btn-sm btn-icon" onclick="liquidacion_arriendoprof_cm();" data-toggle="tooltip" data-placement="top" title="Generar Liquidación"><i class="fas fa-money-check-alt"></i></button>
													</td>					
													<td class="align-middle text-center">
														<span>Pagada</span>
													</td>
													<td class="align-middle text-center">
														<button type="button" class="btn btn-success btn-sm" onclick="#">
														<i class="feather icon-edit"></i>Ver (pdf)</button>
													</td>                       
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>	
                    <!--Cierre: Tab medicos--> 
                    <!--Tab odontologos-->
                    <div class="tab-pane fade" id="odontologos" role="tabpanel" aria-labelledby="odontologos-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                               <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales Odontólogos</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_asistente();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo Odontólogo</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar Odontólogo</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
										<div class="card-body">
											<table id="profesionales_odonto" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
												<thead>
													<tr>
														<th class="text-center align-middle">Nombre / Rut</th>
														<th class="text-center align-middle">Especialidad</th>
														<th class="text-center align-middle">Sucursales</th>
														<th class="text-center align-middle">Contacto</th>
														<th class="text-center align-middle">Datos</th>
														<th class="text-center align-middle">Convenio</th>
														<th class="text-center align-middle">Rol y permisos</th>
														<th class="text-center align-middle">Acción</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="align-middle text-center">
															<span><strong>Jaime Kriman</strong></span><br>
															<span>4.345.466-2</span>
														</td>
														<td class="align-middle text-center">
															<span>Otorrinolaringología</span><br>
														</td>
														<td class="align-middle text-center">
															<span>Ist Viña del Mar</span><br>
															<span>Ist Quilpué</span><br>
															<span>Ist San Felipe</span>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
														</td>					
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
															 <!--Botón Modal-->
															<button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="fas fa-file-contract"></i></button>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
														</td>
														<td class="align-middle text-center">
															<button type="button" class="btn btn-success btn-sm" onclick="editar_datos_profesional();">
															<i class="feather icon-edit"></i> Editar</button>
															<button type="button" class="btn btn-danger btn-sm">
															<i class="feather icon-x-circle"></i> Desasociar</button>
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
                    <!--Cierre: Tab odontologos-->
                    <!--Tab otros profesionales-->
                    <div class="tab-pane fade" id="otros_prof" role="tabpanel" aria-labelledby="otros_prof-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                               <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Otros Profesionales de la Salud</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_administrativo();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo profesional</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar Otros profesionales</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
										<div class="card-body">
											<table id="profesionales_otros" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
												<thead>
													<tr>
														<th class="text-center align-middle">Nombre / Rut</th>
														<th class="text-center align-middle">Profesión/Especialidad</th>
														<th class="text-center align-middle">Sucursales</th>
														<th class="text-center align-middle">Contacto</th>
														<th class="text-center align-middle">Datos</th>
														<th class="text-center align-middle">Convenio</th>
														<th class="text-center align-middle">Rol y permisos</th>
														<th class="text-center align-middle">Acción</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="align-middle text-center">
															<span><strong>Jaime Kriman</strong></span><br>
															<span>4.345.466-2</span>
														</td>
														<td class="align-middle text-center">
															<span>Fonoaudiólogo</span><br><span>Fonoaudiólogo Clínico</span>
														</td>
														<td class="align-middle text-center">
															<span>Ist Viña del Mar</span><br>
															<span>Ist Quilpué</span><br>
															<span>Ist San Felipe</span>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
														</td>					
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
															 <!--Botón Modal-->
															<button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="fas fa-file-contract"></i></button>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_permisos_profesional();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
														</td>
														<td class="align-middle text-center">
															<button type="button" class="btn btn-success btn-sm" onclick="editar_datos_profesional();">
															<i class="feather icon-edit"></i> Editar</button>
															<button type="button" class="btn btn-danger btn-sm">
															<i class="feather icon-x-circle"></i> Desasociar</button>
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
                    <!--Cierre: Tab personal administrativo-->
                   
                </div>
                <!--Cierre: Pills-->
            </div>
			</div>
		</div>
	</div>
</div>
<!--****Cierre Container Completo****-->

@endsection

