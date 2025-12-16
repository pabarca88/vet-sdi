@extends('template.asistente.template')

@section('page-styles')
    <link href='{{ asset('js/fullcalendar-5.10.1/lib/main.css') }}' rel='stylesheet' />
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Solicitud Productos e Insumos</h5>
                        </div>
                       <ul class="breadcrumb">
                            <a href="{{ route('asistente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home">  Volver</i> </a>
                       </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-solicitud_insumos-tab" data-toggle="pill" href="#pills-solicitud_insumos" role="tab" aria-controls="pills-solicitud_insumos" aria-selected="false">Solicitudes de Insumo</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-solicitudes-tab" data-toggle="pill" href="#pills-solicitudes_pend" role="tab" aria-controls="pills-solicitudes" aria-selected="false">Solicitudes Pendientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-incluir_stock-tab" data-toggle="pill" href="#pills-incluir_stock" role="tab" aria-controls="pills-incluir_stock" aria-selected="false">Solicitudes de Incluir en Stock</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-solicitud" role="tabpanel" aria-labelledby="pills-solicitud-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Solicitudes y Pedidos de Insumos</h4>
                                                <div class="btn-group float-right" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-light btn-sm" onclick="pedido_insumos();"><i class="feather icon-plus"></i>Agregar Nuevo Pedido </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">

                                            <table id="pedidos_vacunatorio" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Nº Pedido</th>
                                                        <th class="text-center align-middle">Fecha de Pedido</th>
                                                        <th class="text-center align-middle">Ver Pedido</th>
                                                        <th class="text-center align-middle">Estado</th>
                                                        <th class="text-center align-middle">Retirado Por:</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($solicitudes)
                                                        @foreach ($solicitudes as $soli)
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <span>{{ $soli->id }}</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span>{{ $soli->fecha_solicitud }}</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_pedido({{ $soli->id }});" title="Ver Pedido:"><i class="fas fa-th-list"></i></button>
                                                                </td>

                                                                <td class="align-middle text-center">
                                                                    <span>
                                                                        @if ($soli->estado = 1)
                                                                            NUEVA
                                                                        @elseif($soli->estado = 2)
                                                                            APROBADO
                                                                        @elseif($soli->estado = 3)
                                                                            RECHAZADO
                                                                        @elseif($soli->estado = 4)
                                                                            PROCESADA
                                                                        @elseif($soli->estado = 5)
                                                                            RETIRADA
                                                                        @else
                                                                            NO INFORMADO
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    @if ($soli->estado = 5)
                                                                        <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ficha_retiro();" title="Retirado por:"><i class="feather icon-user"></i></button>
                                                                    @else
                                                                        <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top"  title="Retirado por:" disabled="disabled"><i class="feather icon-user"></i></button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="pills-solicitud_insumos" role="tabpanel" aria-labelledby="pills-solicitud_insumos-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Solicitudes y Pedidos de Insumos</h4>
                                                <div class="btn-group float-right" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-light btn-sm" onclick="hacer_pedido();"><i class="feather icon-plus"></i>Agregar Nuevo Pedido</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                            <table id="sol_vacunas_farmacia" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Nº Pedido</th>
                                                        <th class="text-center align-middle">Fecha de Pedido</th>
                                                        <th class="text-center align-middle">Ver Pedido</th>
                                                        <th class="text-center align-middle">Estado</th>
                                                        <th class="text-center align-middle">Retirado Por:</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span>2019</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>02/03/2022</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_pedido();" title="Ver Pedido:"><i class="fas fa-th-list"></i></button>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span>entregado</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ficha_retiro();" title="Retirado por:"><i class="feather icon-user"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span>2020</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>12/02/2022</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_pedido();" title="Ver Pedido:"><i class="fas fa-th-list"></i></button>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span>entregado</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ficha_retiro();" title="Retirado por:"><i class="feather icon-user"></i></button>
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
                    <div class="tab-pane fade" id="pills-solicitudes_pend" role="tabpanel" aria-labelledby="pills-solicitudes_pend-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Solicitudes Pendientes de Entrega</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                        <table id="pendientes_entrega_vacunatorio" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nº Pedido</th>
                                                    <th class="text-center align-middle">Ver Pedido</th>
                                                    <th class="text-center align-middle">Motivo/Pendiente</th>
                                                    <th class="text-center align-middle">Fecha Solicitud</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span>#8129812898</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_pedido();" title="Ver Pedido:"><i class="fas fa-th-list"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>falta Stock</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>02/02/2022</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span>#8129812898</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_pedido();" title="Ver Pedido:"><i class="fas fa-th-list"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>falta Stock</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>02/02/2022</span>
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
                    <div class="tab-pane fade" id="pills-incluir_stock" role="tabpanel" aria-labelledby="pills-incluir_stock-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Solicitud Incluir Producto</h4>
                                                <div class="btn-group float-right" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-light btn-sm" onclick="solicita_incluir();"><i class="feather icon-plus"></i>Solicitar Nuevo Producto</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                            <table id="sol_nuevos_prod" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Nº Solicitud</th>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Ver Solicitud</th>
                                                        <th class="text-center align-middle">Estado</th>
                                                        <th class="text-center align-middle">Autorizado Por:</th>
                                                        <th class="text-center align-middle">Código_autorización:</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span>#8129812898</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>02/02/2022</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_solicitud();" title="Ver Solicitud:"><i class="fas fa-th-list"></i></button>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span>autorizado</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_autorizacion();" title="Autorizado por:"><i class="feather icon-user"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>6665544</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span>#8129812898</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>02/02/2022</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_autorizacion();" title="Ver Solicitud:"><i class="fas fa-th-list"></i></button>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span>autorizado</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ficha_retiro();" title="Autorizado por:"><i class="feather icon-user"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>6665544</span>
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

        {{-- MODAL VER PRODUCTOS DE PEDIDO  --}}
		<div id="ver_pedido" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ver_pedido" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h5 class="modal-title text-white text-center">Ficha Informaci&oacute;n del Pedido</h5>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group fill">
									<ul class="list-group">
									  <li class="list-group-item disabled" aria-disabled="true">Pedido N&ordm; 2121547</li>
									  <li class="list-group-item">20 lapices</li>
									  <li class="list-group-item">20 recetarios</li>
									  <li class="list-group-item">50 formularios de T&ordm;</li>
									  <li class="list-group-item">Chocolate pa la Dany</li>
									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>

        {{--  MODAL VER INFORMACION DE RETIRO --}}
		<div id="ficha_retira" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ficha_retira" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h5 class="modal-title text-white text-center">Ficha Informaci&oacute;n del Retiro</h5>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group fill">
									<H5>Nombre</H5>
									<label class="label-sm">Fulano de Tal</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group fill">
									<H5>RUT</H5>
										<label class="label"> 99656698-7</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group fill">
									<H5>Servicio</H5>
									<label class="label-sm">Policl&iacute;nico</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group fill">
									<H5>C&oacute;digo Autorizaci&oacute;n</H5>
									<label class="label-sm">545525</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group fill">
									<H5>Enviado a Tel&eacute;fono</H5>
									<label class="label-sm">+56 9 96566987</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        {{--  MODAL REALIZAR PEDIDO  --}}
		<div id="solicita_pedido" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="solicita_pedido" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h5 class="modal-title text-white text-center">Solicitud de Pedidos a Bodega</h5>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
					</div>
					<div class="modal-body">
						<form>
							<div class="row">
                                <div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">Categor&iacute;a</label>
										<select class="form-control form-control-sm" id="nueva_solicitud_id_categoria">
											<option value="">Seleccione</option>
                                            @if ($categorias)
                                                @foreach ($categorias as $cat )
                                                    <option value="{{ $cat->id}}">{{ $cat->nombre }}</option>
                                                @endforeach
                                            @endif
                                            <option value="otro">Otro</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">Producto</label>
										<input class="form-control form-control-sm" name="nueva_solicitud_nombre_producto" id="nueva_solicitud_nombre_producto" type="text">
										<input class="form-control form-control-sm" name="nueva_solicitud_id_producto" id="nueva_solicitud_id_producto" type="hidden">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">C&oacute;digo de Producto</label>
										<input class="form-control form-control-sm" name="nueva_solicitud_cod_prod" id="nueva_solicitud_cod_prod" type="text" readonly="readonly">
									</div>
								</div>
                                <br/>
                                <br/>
                                <br/>

								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">Cantidad Solicitada</label>
										<input class="form-control form-control-sm" name="nueva_solicitud_cantidad" id="nueva_solicitud_cantidad" type="number" min="0" step="1">
									</div>
								</div>

								<div class="col-sm-12 mt-2">
                                    <button type="button" class="btn btn-success btn-sm float-right" onclick="registra_producto_solicitud();"><i class="fa fa-plus"></i> Agregar Otro Producto</button>
								</div>

								<br>
								<div class="col-sm-12 mt-3">
									<!--Tabla-->
									<div class="table-responsive">
										<table class="table table-bordered table-sm" id="tabla_nueva_solicitud_productos">
											<thead>
												<tr>
													<th class="text-center align-middle">Codigo</th>
													<th class="text-center align-middle">Nombre</th>
													<th class="text-center align-middle">Cantidad</th>
													<th class="text-center align-middle">Accion</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="text-center align-middle">7217821-5</td>
													<td class="text-center align-middle">resina pqte</td>
													<td class="text-center align-middle">
                                                        <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
													</td>
												</tr>
											</tbody>
										</table>
										<!--Cierre Tabla-->
									</div>
								</div>
							</div>
						</form>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-info mb-0" >Enviar Pedido</button>
						</div>
					</div>
				</div>
			</div>
		</div>

        {{--  ????  --}}
		<div id="solicita_incluir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="solicita_incluir" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h5 class="modal-title text-white text-center">Solicitud de Inclusi&oacute;n Producto a Stock</h5>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
					</div>
					<div class="modal-body">
						<form>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="label">Fecha Solicitud</label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										 <script>
											var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

											var f=new Date();
											document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
										</script>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">Rut Solicitante</label>
										<input class="form-control form-control-sm" name="nombre_prod" id="nombre_prod" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">Tel&eacute;fono Autorizaci&oacute;n</label>
										<input class="form-control form-control-sm" name="nombre_prod" id="nombre_prod" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">Nombre Producto</label>
										<input class="form-control form-control-sm" name="nombre_prod" id="nombre_prod" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">C&oacute;digo de Producto</label>
										<input class="form-control form-control-sm" name="cod_prod" id="cod_prod" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm"> Cantidad Solicitada</label>
										<input class="form-control form-control-sm" name="cant_prod_sol" id="cant_prod_sol" type="text">
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">Nombre / Retira</label>
										<input class="form-control form-control-sm" name="nombre_retira" id="nombre_retira" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">Cargo</label>
										<input class="form-control form-control-sm" name="cargo_retira" id="cargo_retira" type="text">
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">Servicio de Destino</label>
										<input class="form-control form-control-sm" name="serv_retira" id="serv_retira" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">Categor&iacute;a</label>
										<select class="form-control form-control-sm" id="categoria">
											<option>Seleccione  opci&oacute;n</option>
											<optgroup label="Insumos">
												<option value="AL">Librer&iacute;a</option>
												<option value="LA">Materiales de Aseo</option>
												<option value="VA">farmacia</option>
												<option value="VA">Otro</option>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group fill">
										<label class="floating-label-activo-sm">C&oacute;digo de autorizaci&oacute;n</label>
										<input class="form-control form-control-sm" type="text" name="cod_aut" id="cod_aut" type="text">
									</div>
								</div>
								<div class="col-sm-12 mt-2">
										<button type="button" class="btn btn-success btn-sm float-right">
										<i class="fa fa-plus"></i> Agregar Otro Producto</button>
								</div>
								<br>
								<div class="col-sm-12 mt-3">
									<!--Tabla-->
									<div class="table-responsive">
										<table class="table table-bordered table-sm">
											<thead>
												<tr>
													<th class="text-center align-middle">Fecha</th>
													<th class="text-center align-middle">Codigo</th>
													<th class="text-center align-middle">Nombre</th>
													<th class="text-center align-middle">Solicitado</th>
													<th class="text-center align-middle">tel_autorizaci&oacute;n</th>
													<th class="text-center align-middle">Accion</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="text-center align-middle"><span>03/12/21</span></td>
													<td class="text-center align-middle">7217821-5</td>
													<td class="text-center align-middle">resina pqte</td>
													<td class="text-center align-middle">2</td>
													<td class="text-center align-middle">2</td>
													<td class="text-center align-middle">
													<button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
													</td>
												</tr>
											</tbody>
										</table>
										<!--Cierre Tabla-->
									</div>
								</div>
							</div>
						</form>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-info mb-0" >Entregar Pedido</button>
						</div>
					</div>
				</div>
			</div>
		</div>

    </div>
</div>
@endsection


@section('page-script')
    <script>

        $(document).ready(function(){
            /** autocomplete de productos del almacen por categoria */
            $("#nueva_solicitud_nombre_producto").autocomplete({
                appendTo: "#solicita_pedido", // ID del modal o body
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('bodega.autocomplete.productoVerCategoria') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term,
                            id_categoria: $('#nueva_solicitud_id_categoria').val(),
                        },
                        success: function(data) {
                            console.log(data);
                            {{--  console.log(data.length);  --}}
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nueva_solicitud_nombre_producto').val(ui.item.label);
                    $('#nueva_solicitud_id_producto').val(ui.item.value);
                    $('#nueva_solicitud_cod_prod').val(ui.item.codigo);
                    return false;
                }
            });
        });


        function ver_pedido() {
            $('#ver_pedido').modal('show');
        }

        function ficha_retiro() {
            $('#ficha_retira').modal('show');
        }

        function pedido_insumos() {
            $('#solicita_pedido').modal('show');
        }

        function solicita_incluir() {
            $('#solicita_incluir').modal('show');
        }

        function registra_producto_solicitud(){
            var nombre_producto = $('#nueva_solicitud_nombre_producto').val();
            var id_producto = $('#nueva_solicitud_id_producto').val();
            var cod_prod = $('#nueva_solicitud_cod_prod').val();
            var cantidad = $('#nueva_solicitud_cantidad').val();
            var mensaje = '';
            var valido = 1;
            if(nombre_producto == '')
            {
                valido = 0;
                mensaje += 'Nombre de producto es un campo requerido.\n';
            }
            {{--  if(id_producto == '')
            {
                valido = 0;
                mensaje += 'xx es un campo requerido.\n';
            }  --}}
            {{--  if(cod_prod == '')
            {
                valido = 0;
                mensaje += 'xx es un campo requerido.\n';
            }  --}}
            if(cantidad == '' && cantidad <= 0)
            {
                valido = 0;
                mensaje += 'La cantidad es un campo requerido.\n';
            }

            if(valido == 1)
            {

            }
            else
            {
                swal({
                    title: "Campo requerido",
                    text: mensaje,
                    icon: "error",
                });
            }

        }
    </script>
@endsection
