
@extends('template.contabilidad.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Info Sueldos Personal</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_contabilidad') }}">Volver escritorio Contabilidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-md-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-white" id="cont_cm" role="tablist">

                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-ventas-tab" data-toggle="tab" href="#pills-ventas" role="tab" aria-controls="pills-ventas" aria-selected="false">Ventas</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-gastos-tab" data-toggle="tab" href="#pills-gastos" role="tab" aria-controls="pills-gastos" aria-selected="false">Gastos</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-libro_diario-tab" data-toggle="tab" href="#pills-libro_diario" role="tab" aria-controls="pills-libro_diario" aria-selected="false">Libro diario</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-fact_porcobrar-tab" data-toggle="tab" href="#pills-fact_porcobrar" role="tab" aria-controls="pills-fact_porcobrar" aria-selected="false">Facturas Por Cobrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-fact_porpagar-tab" data-toggle="tab" href="#pills-fact_porpagar" role="tab" aria-controls="pills-fact_porpagar" aria-selected="false">Facturas por pagar</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-fact_porpagar-tab" data-toggle="tab" href="#pills-fact_porpagar" role="tab" aria-controls="pills-fact_porpagar" aria-selected="false">Historico Facturas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-ventas" role="tabpanel" aria-labelledby="pills-ventas-tab">
                        <div class="row mb-n10">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12 align-botton">
                                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Libro de Ventas</h4>
                                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_venta">
                                                <i class="feather icon-plus"></i> Registrar Nueva Venta
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                        <table id="#" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">N° fact/boleta</th>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">vendedor</th>
                                                    <th class="text-center align-middle">rubro</th>
                                                    <th class="text-center align-middle">producto</th>
                                                    <th class="text-center align-middle">cantidad</th>
                                                    <th class="text-center align-middle">valor/doc</th>
                                                    <th class="text-center align-middle">Impuesto</th>
                                                    <th class="text-center align-middle">comprador</th>
                                                    <th class="text-center align-middle">estado/pago</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>0023214</strong></span><br>
                                                        <span>factura</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>02/12/2021</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>monica caceres</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <span><strong>Insumos Médicos</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>medio contraste</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>2 unid </span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>17000</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>2365</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>c. escobar</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <span>pagado</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_detalleventa();">
                                                        <i class="feather icon-edit"></i> ver doc</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                        <i class="feather icon-x-circle"></i> D</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>565445</strong></span><br>
                                                        <span>Bono Atención</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>02/12/2021</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>monica caceres</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <span><strong>atencion medica</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>consultas</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>210 unid </span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>170000</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>236521</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>c.Tobarr</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <span>pagado</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_detalleventa();">
                                                        <i class="feather icon-edit"></i> ver doc</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                        <i class="feather icon-x-circle"></i> D</button>
                                                    </td>
                                                </tr>
                                            </tbody>

                                                {{--  include("modals_contador/registar_venta.php");  --}}


                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-gastos" role="tabpanel" aria-labelledby="pills-gastos-tab">
                        <div class="row mb-n10">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12 align-botton">
                                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Libro Gastos</h4>
                                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_gasto">
                                                <i class="feather icon-plus"></i> Registrar Nuevo Gasto
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                            <table id="#" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">N° fact/boleta</th>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Tipo de gasto</th>
                                                        <th class="text-center align-middle">Valor</th>
                                                        <th class="text-center align-middle">fecha de pago</th>
                                                        <th class="text-center align-middle">estado</th>
                                                        <th class="text-center align-middle">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>0023214</strong></span><br>
                                                            <span>factura</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>02/12/2021</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                                <span><strong>luz</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>120000 </span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>12/12/2021</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                                <span>pagado</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm" onclick="editar_detalle_gasto();">
                                                            <i class="feather icon-edit"></i> Editar</button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                            <i class="feather icon-x-circle"></i> D</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>0023214</strong></span><br>
                                                            <span>factura</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>02/12/2021</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                                <span><strong>Gastos comunes</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>300000 </span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>12/12/2021</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                                <span>pendiente</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm" onclick="editar_detalle_gasto();">
                                                            <i class="feather icon-edit"></i> Editar</button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                            <i class="feather icon-x-circle"></i> D</button>
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
                    <div class="tab-pane fade" id="pills-libro_diario" role="tabpanel" aria-labelledby="pills-libro_diario-tab">
                        <div class="row mb-n10">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12 align-botton">
                                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Libro Diario debe</h4>
                                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_venta">
                                                <i class="feather icon-plus"></i> Registrar Nuevo Gasto
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                            <table id="#" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">N°</th>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Salida por</th>
                                                        <th class="text-center align-middle">tipo</th>
                                                        <th class="text-center align-middle">Cantidad</th>
                                                        <th class="text-center align-middle">Vence</th>
                                                        <th class="text-center align-middle">Ver</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>12354</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>02/1/2020</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>gasto general</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>luz</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>110000</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>06/1/2020</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="veringreso();" data-toggle="tooltip" data-placement="top" title="VER"><i class="feather icon-settings"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>12554</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>03/1/2020</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Compra insumos</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>ins laboratorio</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>1.121.000 </span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>30/1/2020</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="veringreso();" data-toggle="tooltip" data-placement="top" title="VER"><i class="feather icon-settings"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12 align-botton">
                                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Libro Diario Haberes</h4>
                                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_venta">
                                                <i class="feather icon-plus"></i> Registrar Nuevo Ingreso
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                            <table id="#" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">N°</th>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">ingreso por</th>
                                                        <th class="text-center align-middle">tipo</th>
                                                        <th class="text-center align-middle">Cantidad</th>
                                                        <th class="text-center align-middle">Ver</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>12354</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>02/1/2020</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>rend caja 1</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>efectivo</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>2.121.000 </span>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="veringreso();" data-toggle="tooltip" data-placement="top" title="VER"><i class="feather icon-settings"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>12554</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>03/1/2020</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>rend caja 2</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>efectivo</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>2.121.000 </span>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="veringreso();" data-toggle="tooltip" data-placement="top" title="VER"><i class="feather icon-settings"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>12114</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>04/1/2020</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>rend caja 3</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>efectivo</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>2.121.000 </span>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="veringreso();" data-toggle="tooltip" data-placement="top" title="VER"><i class="feather icon-settings"></i></button>
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
                    <div class="tab-pane fade" id="pills-fact_porcobrar" role="tabpanel" aria-labelledby="pills-fact_porcobrar-tab">
                            <div class="row mb-n10">
                            <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="row">
                                                <div class="col-md-12 align-botton">
                                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Facturas por cobrar</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 filter-bar invoice-list">
                                            <nav class="navbar m-b-30 p-10">
                                                <ul class="nav">
                                                    <li class="nav-item f-text active">
                                                        <a class="nav-link text-secondary" href="#!"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Filtrar: </font></font><span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(Actual)</font></font></span></a>
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle text-secondary" href="#" id="bydate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-clock"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Por fecha</font></font></a>
                                                        <div class="dropdown-menu" aria-labelledby="bydate">
                                                            <a class="dropdown-item" href="#!">Mostrar Todo</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#!">Hoy</a>
                                                            <a class="dropdown-item" href="#!">Ayer</a>
                                                            <a class="dropdown-item" href="#!">Esta Semana</a>
                                                            <a class="dropdown-item" href="#!">Este Mes</a>
                                                            <a class="dropdown-item" href="#!">Este Año</a>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle text-secondary" href="#" id="bystatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chart-line"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Por estado</font></font></a>
                                                        <div class="dropdown-menu" aria-labelledby="bystatus">
                                                            <a class="dropdown-item" href="#!">Mostrar Todo</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#!">Abierto</a>
                                                            <a class="dropdown-item" href="#!">En Espera</a>
                                                            <a class="dropdown-item" href="#!">Resuelto</a>
                                                            <a class="dropdown-item" href="#!">Cerrado</a>
                                                            <a class="dropdown-item" href="#!">Duplicar</a>
                                                            <a class="dropdown-item" href="#!">No Arreglar</a>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle text-secondary" href="#" id="bypriority" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-ol"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Por prioridad</font></font></a>
                                                        <div class="dropdown-menu" aria-labelledby="bypriority">
                                                            <a class="dropdown-item" href="#!">Mostrar Todo</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#!">Alta prioridad</a>
                                                            <a class="dropdown-item" href="#!">Alta</a>
                                                            <a class="dropdown-item" href="#!">Normal</a>
                                                            <a class="dropdown-item" href="#!">Baja</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="nav-item nav-grid f-view">
                                                    <span class="m-r-15"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Modo de vista: </font></font></span>
                                                    <button type="button" class="btn waves-effect waves-light btn-primary btn-icon m-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mostrar Como Lista">
                                                        <i class="fas fa-list-ul"></i>
                                                    </button>
                                                    <button type="button" class="btn waves-effect waves-light btn-primary btn-icon m-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mostrar Como Grilla">
                                                        <i class="fas fa-th-large"></i>
                                                    </button>
                                                </div>
                                            </nav>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-blue">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-primary btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pendiente</a>
                                                                        <a class="dropdown-item" href="#!">Pagado</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">En Espera</a>
                                                                        <a class="dropdown-item" href="#!">Canceleda</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SWIFT</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-primary"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Imprimir Factura</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Descargar Factura</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Editar Factura</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Eliminar Factura</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-green">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-success btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pending</a>
                                                                        <a class="dropdown-item" href="#!">Paid</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">On Hold</a>
                                                                        <a class="dropdown-item" href="#!">Canceled</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Payoneer</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-success"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Print Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Download invoice</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Edit Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Remove Invoice</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-red">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-danger btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pending</a>
                                                                        <a class="dropdown-item" href="#!">Paid</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">On Hold</a>
                                                                        <a class="dropdown-item" href="#!">Canceled</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Paypal</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-danger"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Print Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Download invoice</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Edit Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Remove Invoice</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-yellow">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-warning btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pending</a>
                                                                        <a class="dropdown-item" href="#!">Paid</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">On Hold</a>
                                                                        <a class="dropdown-item" href="#!">Canceled</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Paypal</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-warning"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-warning"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Print Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Download invoice</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Edit Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Remove Invoice</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-green">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-success btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pending</a>
                                                                        <a class="dropdown-item" href="#!">Paid</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">On Hold</a>
                                                                        <a class="dropdown-item" href="#!">Canceled</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Payoneer</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-success"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Print Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Download invoice</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Edit Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Remove Invoice</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-blue">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-primary btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pending</a>
                                                                        <a class="dropdown-item" href="#!">Paid</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">On Hold</a>
                                                                        <a class="dropdown-item" href="#!">Canceled</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SWIFT</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-primary"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Print Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Download invoice</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Edit Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Remove Invoice</a>
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
                    <div class="tab-pane fade" id="pills-fact_porpagar" role="tabpanel" aria-labelledby="pills-fact_porpagar-tab">
                            <div class="row mb-n10">
                            <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="row">
                                                <div class="col-md-12 align-botton">
                                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Facturas por pagar</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 filter-bar invoice-list">
                                            <nav class="navbar m-b-30 p-10">
                                                <ul class="nav">
                                                    <li class="nav-item f-text active">
                                                        <a class="nav-link text-secondary" href="#!"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Filtrar: </font></font><span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(Actual)</font></font></span></a>
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle text-secondary" href="#" id="bydate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-clock"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Por fecha</font></font></a>
                                                        <div class="dropdown-menu" aria-labelledby="bydate">
                                                            <a class="dropdown-item" href="#!">Mostrar Todo</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#!">Hoy</a>
                                                            <a class="dropdown-item" href="#!">Ayer</a>
                                                            <a class="dropdown-item" href="#!">Esta Semana</a>
                                                            <a class="dropdown-item" href="#!">Este Mes</a>
                                                            <a class="dropdown-item" href="#!">Este Año</a>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle text-secondary" href="#" id="bystatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chart-line"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Por estado</font></font></a>
                                                        <div class="dropdown-menu" aria-labelledby="bystatus">
                                                            <a class="dropdown-item" href="#!">Mostrar Todo</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#!">Abierto</a>
                                                            <a class="dropdown-item" href="#!">En Espera</a>
                                                            <a class="dropdown-item" href="#!">Resuelto</a>
                                                            <a class="dropdown-item" href="#!">Cerrado</a>
                                                            <a class="dropdown-item" href="#!">Duplicar</a>
                                                            <a class="dropdown-item" href="#!">No Arreglar</a>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle text-secondary" href="#" id="bypriority" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-ol"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Por prioridad</font></font></a>
                                                        <div class="dropdown-menu" aria-labelledby="bypriority">
                                                            <a class="dropdown-item" href="#!">Mostrar Todo</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#!">Alta prioridad</a>
                                                            <a class="dropdown-item" href="#!">Alta</a>
                                                            <a class="dropdown-item" href="#!">Normal</a>
                                                            <a class="dropdown-item" href="#!">Baja</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="nav-item nav-grid f-view">
                                                    <span class="m-r-15"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Modo de vista: </font></font></span>
                                                    <button type="button" class="btn waves-effect waves-light btn-primary btn-icon m-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mostrar Como Lista">
                                                        <i class="fas fa-list-ul"></i>
                                                    </button>
                                                    <button type="button" class="btn waves-effect waves-light btn-primary btn-icon m-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mostrar Como Grilla">
                                                        <i class="fas fa-th-large"></i>
                                                    </button>
                                                </div>
                                            </nav>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-blue">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-primary btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pendiente</a>
                                                                        <a class="dropdown-item" href="#!">Pagado</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">En Espera</a>
                                                                        <a class="dropdown-item" href="#!">Canceleda</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SWIFT</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-primary"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Imprimir Factura</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Descargar Factura</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Editar Factura</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Eliminar Factura</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-green">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-success btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pending</a>
                                                                        <a class="dropdown-item" href="#!">Paid</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">On Hold</a>
                                                                        <a class="dropdown-item" href="#!">Canceled</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Payoneer</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-success"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Print Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Download invoice</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Edit Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Remove Invoice</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-red">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-danger btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pending</a>
                                                                        <a class="dropdown-item" href="#!">Paid</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">On Hold</a>
                                                                        <a class="dropdown-item" href="#!">Canceled</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Paypal</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-danger"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Print Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Download invoice</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Edit Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Remove Invoice</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-yellow">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-warning btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pending</a>
                                                                        <a class="dropdown-item" href="#!">Paid</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">On Hold</a>
                                                                        <a class="dropdown-item" href="#!">Canceled</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Paypal</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-warning"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-warning"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Print Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Download invoice</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Edit Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Remove Invoice</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-green">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-success btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pending</a>
                                                                        <a class="dropdown-item" href="#!">Paid</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">On Hold</a>
                                                                        <a class="dropdown-item" href="#!">Canceled</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Payoneer</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-success"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Print Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Download invoice</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Edit Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Remove Invoice</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="card card-border-c-blue">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <h5 class="d-inline-block m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></h5>
                                                                <div class="dropdown-secondary dropdown float-right">
                                                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado : </font></font></span>
                                                                    <button class="btn waves-effect waves-light btn-primary btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atrasado</font></font></button>
                                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                        <a class="dropdown-item" href="#!">Pending</a>
                                                                        <a class="dropdown-item" href="#!">Paid</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item active" href="#!">On Hold</a>
                                                                        <a class="dropdown-item" href="#!">Canceled</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura: 0028</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicado el: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25/01/2015</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <ul class="list list-unstyled text-right">
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 8,750</font></font></li>
                                                                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Método: </font></font><span class="text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SWIFT</font></font></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-t-30">
                                                                <div class="task-list-table">
                                                                    <p class="task-due"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vencimiento: </font></font></strong><strong class="label label-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23 horas</font></font></strong></p>
                                                                </div>
                                                                <div class="task-board m-0 float-right">
                                                                    <a href="invoice.html" class="btn waves-effect waves-light btn-primary"><i class="fas fa-eye m-0"></i></a>
                                                                    <div class="dropdown-secondary dropdown d-inline">
                                                                        <button class="btn waves-effect waves-light btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></button>
                                                                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-bell mr-2"></i>Print Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-download mr-2"></i>Download invoice</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-edit mr-2"></i>Edit Invoice</a>
                                                                            <a class="dropdown-item" href="#!"><i class="fas fa-trash mr-2"></i>Remove Invoice</a>
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
                </div>
            </div>
           @include("app.contabilidad.modals.registrar_gasto")
           @include("app.contabilidad.modals.registrar_venta")
    </div>
</div>
@endsection



