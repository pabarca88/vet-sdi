@extends('template.asistente_adm_cm.template')
@section('content')
@include('app.asistente_adm_cm.modal_adm.datos_banco')
@include('app.asistente_adm_cm.modal_adm.horario_usuario')
@include('app.asistente_adm_cm.modal_adm.convenio_usuario')
@include('app.asistente_adm_cm.modal_adm.contacto_usuario')
@include('app.asistente_adm_cm.modal_adm.editar_profesional')
@include('app.asistente_adm_cm.modal_adm.registrar_profesional')
@include('app.asistente_adm_cm.modal_adm.roles_permisos_prof')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Liquidaciones a Profesionales</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="adm_cm.home">Profesionales</a></li>

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
                                               <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Liquidaciones Profesionales Médicos</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_profesional();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a profesional</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar profesional</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="liq_profesionales_med" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
													<th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Profesional</th>
													<th class="text-center align-middle">Periodo</th>
													<th class="text-center align-middle">N°Liquidación</th>
                                                    <th class="text-center align-middle">Estado</th>
													<th class="text-center align-middle">Datos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
													 <td class="align-middle text-center">
                                                        <span>10/11/2022</span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Jaime Kriman</strong></span><br>
                                                        <span>4.345.466-2</span><br>
														<span>Otorrinolaringología</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>10/03/2022 a 17/03/2022</span><br>
                                                    </td>
													<td class="align-middle text-center">
                                                        <span>10202122</span><br>
                                                    </td>
													<td class="align-middle text-center">
                                                        <span>Pagada</span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
														<!--Botón Modal-->
														<button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>

														<!--Botón Modal-->
														<button type="button" class="btn btn-info btn-sm btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
														 <!--Botón Modal-->
														<button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>

														<!--Botón Modal-->
														<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="fas fa-file-contract"></i></button>
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
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Liquidaciones Profesionales Odontólogos</h4>
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
											<table id="liq_profesionales_od" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
												<thead>
													<tr>
														<th class="text-center align-middle">Fecha</th>
														<th class="text-center align-middle">Profesional</th>
														<th class="text-center align-middle">Periodo</th>
														<th class="text-center align-middle">N°Liquidación</th>
														<th class="text-center align-middle">Estado</th>
														<th class="text-center align-middle">Datos</th>
														<th class="text-center align-middle">Acción</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														 <td class="align-middle text-center">
															<span>10/11/2022</span><br>
														</td>
														<td class="align-middle text-center">
															<span><strong>J. Kriman</strong></span><br>
															<span>4.345.466-2</span><br>
															<span>Implantología</span>
														</td>
														<td class="align-middle text-center">
															<span>10/03/2022 a 17/03/2022</span><br>
														</td>
														<td class="align-middle text-center">
															<span>10202122</span><br>
														</td>
														<td class="align-middle text-center">
															<span>Pagada</span><br>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>

															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
															 <!--Botón Modal-->
															<button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>

															<!--Botón Modal-->
															<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="fas fa-file-contract"></i></button>
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
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Liquidaciones Otros Profesionales de la Salud</h4>
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
											<table id="liq_profesionales_otros" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
												<thead>
													<tr>
														<th class="text-center align-middle">Fecha</th>
														<th class="text-center align-middle">Profesional</th>
														<th class="text-center align-middle">Periodo</th>
														<th class="text-center align-middle">N°Liquidación</th>
														<th class="text-center align-middle">Estado</th>
														<th class="text-center align-middle">Datos</th>
														<th class="text-center align-middle">Acción</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														 <td class="align-middle text-center">
															<span>10/11/2022</span><br>
														</td>
														<td class="align-middle text-center">
															<span><strong>J. Kriman</strong></span><br>
															<span>4.345.466-2</span><br>
															<span>Implantología</span>
														</td>
														<td class="align-middle text-center">
															<span>10/03/2022 a 17/03/2022</span><br>
														</td>
														<td class="align-middle text-center">
															<span>10202122</span><br>
														</td>
														<td class="align-middle text-center">
															<span>Pagada</span><br>
														</td>
														<td class="align-middle text-center">
															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>

															<!--Botón Modal-->
															<button type="button" class="btn btn-info btn-sm btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
															 <!--Botón Modal-->
															<button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>

															<!--Botón Modal-->
															<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="fas fa-file-contract"></i></button>
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
