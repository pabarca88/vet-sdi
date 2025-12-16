@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Entrega de Productos</h5>
                        </div>
                       <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_vacunatorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Entregas</a></li>
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
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active"  id="pills-solicitud-tab" data-toggle="pill" href="#pills-solicitud" role="tab" aria-controls="pills-solicitud" aria-selected="true">Solicitudes vacunas</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-entregados-tab" data-toggle="pill" href="#pills-entregados" role="tab" aria-controls="pills-entregados" aria-selected="false">Solicitudes Despachadas</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-solicitudes-tab" data-toggle="pill" href="#pills-solicitudes_pend" role="tab" aria-controls="pills-solicitudes" aria-selected="false">Solicitudes Pendientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-solicitud_insumos-tab" data-toggle="pill" href="#pills-solicitud_insumos" role="tab" aria-controls="pills-solicitud_insumos" aria-selected="false">Solicitudes de Insumo</a>
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
                                                    <button type="button" class="btn btn-outline-light btn-sm" onclick="pedir_vacunas();"><i class="feather icon-plus"></i>Agregar Pedido vacunas</button>
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
                                                        <th class="text-center align-middle">Destino</th>
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
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_pedido();" title="Ver Pedido:"><i class="fas fa-th-list"></i></button>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span>entregado</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ficha_retiro();" title="Retirado por:"><i class="feather icon-user"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>Nombre servicio</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span>#812900000</span>
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
                                                        <td class="align-middle text-center">
                                                            <span>Nombre servicio</span>
                                                        </td>
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

                       

                    <div class="tab-pane fade" id="pills-entregados" role="tabpanel" aria-labelledby="pills-entregados-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Control de Entrega de Productos</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                        <table id="control_entrega_vacunatorio" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nº Entrega</th>
                                                    <th class="text-center align-middle">Pedido N°</th>
                                                    <th class="text-center align-middle">Ver Pedido</th>
                                                    <th class="text-center align-middle">Código Autorización</th>
                                                    <th class="text-center align-middle">Fecha Entrega</th>
                                                    <th class="text-center align-middle">retirado por:</th>
                                                    <th class="text-center align-middle">Sucursal/Servicio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span>#8129812898</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>2020212</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_pedido();" title="Ver Pedido:"><i class="fas fa-th-list"></i></button>
                                                        </td>
                                                    <td class="align-middle text-center">
                                                        <span>306565</span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>02/02/2022</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ficha_retiro();" title="Retirado por:"><i class="feather icon-user"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Nombre servicio</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span>#812555454</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>665454</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_pedido();" title="Ver Pedido:"><i class="fas fa-th-list"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>321212</span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>01/02/2022</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ficha_retiro();" title="Retirado por:"><i class="feather icon-user"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Nombre servicio</span>
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
                                                    <th class="text-center align-middle">Stock actual</th>
                                                    <th class="text-center align-middle">Sucursal/Servicio</th>
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
                                                    <td class="align-middle text-center">
                                                        <span>50</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Nombre servicio</span>
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
                                                    <td class="align-middle text-center">
                                                        <span>50</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Nombre servicio</span>
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
                    <div class="tab-pane fade" id="pills-solicitud_insumos" role="tabpanel" aria-labelledby="pills-solicitud_insumos-tab">
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
                                                        <th class="text-center align-middle">Destino</th>
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
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ver_pedido();" title="Ver Pedido:"><i class="fas fa-th-list"></i></button>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span>entregado</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" onclick="ficha_retiro();" title="Retirado por:"><i class="feather icon-user"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>Nombre servicio</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span>#812900000</span>
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
                                                        <td class="align-middle text-center">
                                                            <span>Nombre servicio</span>
                                                        </td>
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
                                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Solicitud Incluir Vacuna en Farmacia</h4>
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
                                                            <th class="text-center align-middle">Destino</th>
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
                                                            <td class="align-middle text-center">
                                                                <span>Vacunatorio</span>
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
                                                            <td class="align-middle text-center">
                                                                <span>Vacunatorio</span>
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




<!--****Cierre Container Completo****-->


@endsection
