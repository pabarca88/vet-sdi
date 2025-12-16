
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
                            <h5 class="m-b-10 font-weight-bold">Facturar</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_contabilidad') }}">Volver escritorio Contabilidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">

            <!--Card Nav Pills-->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-white" id="factura" role="tablist">
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-hacerfactura-tab" data-toggle="tab" href="#pills-hacerfactura" role="tab" aria-controls="pills-hacerfactura" aria-selected="false">Facturas</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-guias-tab" data-toggle="tab" href="#pills-guias" role="tab" aria-controls="pills-guias" aria-selected="false">Guias</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-boleta-tab" data-toggle="tab" href="#pills-boleta" role="tab" aria-controls="pills-boleta" aria-selected="false">Boletas</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-iva-tab" data-toggle="tab" href="#pills-iva" role="tab" aria-controls="pills-iva" aria-selected="false">IVA/Impuestos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-hacerfactura" role="tabpanel" aria-labelledby="pills-hacerfactura-tab">
                <div class="row mb-n4">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <div class="col-md-12 align-botton">
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Factura</h4>
                                    <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#facturar">
                                        <i class="feather icon-plus"></i> Registrar Nueva Venta
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="container" id="printTable">
                                            <div>
                                                <div class="card">
                                                    <div class="row invoice-contact">
                                                        <div class="col-md-8">
                                                            <div class="invoice-box row">
                                                                <div class="col-sm-12">
                                                                    <table class="table table-responsive invoice-table table-borderless p-l-20">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <a href="index.html" class="b-brand">
                                                                                        <img class="img-fluid" src="../assets/images/logos/logo.svg" style="width:50%" alt="Logo_sdi">
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Centro Medico Los Claveles </font></font></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los Claveles 2028 Viña del Mar </font><font style="vertical-align: inherit;">(123) -65202</font></font></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><a class="text-secondary" href="mailto:medichile@gmail.com" target="_top"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">medichile@gmail.com</font></font></a></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">+56 9 99191919</font></font></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row invoive-info">
                                                            <div class="col-md-4 col-xs-12 invoice-client-info">
                                                                <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Información del cliente :</font></font></h6>
                                                                <h6 class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">josefina villa</font></font></h6>
                                                                <p class="m-0 m-t-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Las Magnolias 2020 Concon tel: 32-22212141 </font></font></p>
                                                                <p class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quinta Región Chile (aún)</font></font></p>
                                                                <p><a class="text-secondary" href="mailto:demo@gmail.com" target="_top"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">demo@gmail.com</font></font></a></p>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6">
                                                                <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Información del pedido :</font></font></h6>
                                                                <table class="table table-responsive invoice-table invoice-order table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fecha :</font></font></th>
                                                                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">14 de noviembre</font></font></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado :</font></font></th>
                                                                            <td>
                                                                                <span class="label label-warning"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pendiente</font></font></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Identificación :</font></font></th>
                                                                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                #146859
                                                                            </font></font></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6">
                                                                <h6 class="m-b-20"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura </font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">#125863478945</font></font></span></h6>
                                                                <h6 class="text-uppercase text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total adeudado:
                                                                        </font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 950.00</font></font></span>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="table-responsive">
                                                                    <table class="table invoice-detail-table">
                                                                        <thead>
                                                                            <tr class="thead-default">
                                                                                <th><font style="vertical-align: inherit;">Descripción</font></th>
                                                                                <th><font style="vertical-align: inherit;">Cantidad</font></th>
                                                                                <th><font style="vertical-align: inherit;">Monto</font></th>
                                                                                <th><font style="vertical-align: inherit;">Total</font></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <h6><font style="vertical-align: inherit;">Diseño de logo</font></h6>
                                                                                    <p class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </font></font></p>
                                                                                </td>
                                                                                <td><font style="vertical-align: inherit;">6</font></td>
                                                                                <td><font style="vertical-align: inherit;">200,00 $</font></td>
                                                                                <td><font style="vertical-align: inherit;">$ 1200.00</font></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Diseño de logo</font></h6>
                                                                                    <p class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </font></font></p>
                                                                                </td>
                                                                                <td><font style="vertical-align: inherit;">7</font></td>
                                                                                <td><font style="vertical-align: inherit;">$ 100,00</font></td>
                                                                                <td><font style="vertical-align: inherit;">700,00 $</font></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Diseño de logo</font></font></h6>
                                                                                    <p class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </font></font></p>
                                                                                </td>
                                                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5</font></td>
                                                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 150,00</font></td>
                                                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 750,00</font></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-responsive invoice-table invoice-total">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th><font style="vertical-align: inherit;">Total parcial:</font></th>
                                                                            <td><font style="vertical-align: inherit;">$2650,00</font></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><font style="vertical-align: inherit;">Descuento (5%):</font></th>
                                                                            <td><font style="vertical-align: inherit;">$132</font></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><font style="vertical-align: inherit;">Sub-Total:</font></th>
                                                                            <td><font style="vertical-align: inherit;">$2418</font></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><font style="vertical-align: inherit;">Impuestos (19%):</font></th>
                                                                            <td><font style="vertical-align: inherit;">$ 504.3</font></td>
                                                                        </tr>

                                                                        <tr class="text-info">
                                                                            <td>
                                                                                <hr>
                                                                                <h5 class="text-primary m-r-10"><font style="vertical-align: inherit;">Total:</font></h5>
                                                                            </td>
                                                                            <td>
                                                                                <hr>
                                                                                <h5 class="text-primary"><font style="vertical-align: inherit;">$ 3154.0</font></h5>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h6><font style="vertical-align: inherit;">Términos y Condiciones :</font></h6>
                                                                <p><font style="vertical-align: inherit;">lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <font style="vertical-align: inherit;">Ut enim ad minim veniam, quis nostrud ejercicio ullamco laboris nisi ut aliquip ex ea commodo consequat. </font><font style="vertical-align: inherit;">Duis aute irure dolor
                                                                </font></font></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col-sm-12 invoice-btn-group text-center">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary btn-print-invoice m-b-10"><font style="vertical-align: inherit;">Impresión</font></button>
                                                        <button type="button" class="btn waves-effect waves-light btn-secondary m-b-10 "><font style="vertical-align: inherit;">Cancelar</font></button>
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
            <div class="tab-pane fade" id="pills-guias" role="tabpanel" aria-labelledby="pills-guias-tab">
                <div class="row mb-n4">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <div class="col-md-12 align-botton">
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Guias</h4>
                                    <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_gasto">
                                        <i class="feather icon-plus"></i> Guias de Despacho y Notas de Credito
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                    </div>
                                </div>
                                <div style="overflow-x:auto;">
                                    <table id="tab_guias" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">N° Guia</th>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Glosa</th>
                                                <th class="text-center align-middle">Valor Total</th>
                                                <th class="text-center align-middle">Ver</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>0023214</strong></span><br>
                                                    <span>Guia</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>02/12/2021</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                        <span><strong>devolución</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>120000 </span>
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
                                                    <span>Nota de Credito</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>02/12/2021</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                        <span><strong>devolución</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>120000 </span>
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
            <div class="tab-pane fade" id="pills-boleta" role="tabpanel" aria-labelledby="pills-boleta-tab">
                <div class="row mb-n4">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <div class="col-md-12 align-botton">
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Boletas</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                    </div>
                                </div>
                                <div style="overflow-x:auto;">
                                    <table id="tab_boletas" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">N° Factura</th>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Glosa</th>
                                                <th class="text-center align-middle">Valor Total</th>
                                                <th class="text-center align-middle">Impuesto</th>
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
                                                    <span><strong>Examen</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>10.000</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>1900</span>
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
            <div class="tab-pane fade" id="pills-iva" role="tabpanel" aria-labelledby="pills-iva-tab">
                <div class="row mb-n4">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <div class="col-md-12 align-botton">
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Liquidación IVA</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                    </div>
                                </div>
                                <div style="overflow-x:auto;">
                                    <table id="tab_iva" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">N° Factura</th>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Glosa</th>
                                                <th class="text-center align-middle">Valor Total</th>
                                                <th class="text-center align-middle">Impuesto</th>
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
                                                    <span><strong>Atenciones Laboratorio</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>1.000.000</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>190.000</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="veringreso();" data-toggle="tooltip" data-placement="top" title="VER"><i class="feather icon-settings"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>12555</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>02/1/2020</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>Atenciones Laboratorio</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>1.000.000</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>190.000</span>
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
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Impuestos</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                    </div>
                                </div>
                                <div style="overflow-x:auto;">
                                    <table id="tab_lib_diarios1" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">N° Factura</th>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Glosa</th>
                                                <th class="text-center align-middle">Valor Total</th>
                                                <th class="text-center align-middle">Impuesto</th>
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
                                                    <span><strong>bonos Isapre</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>1.000.000</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>190.000 </span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="veringreso();" data-toggle="tooltip" data-placement="top" title="VER"><i class="feather icon-settings"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>12358</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>02/1/2020</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>bonos Isapre</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>2.000.000</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>380.000 </span>
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
        </div>
    </div>
</div>

@include('app.contabilidad.modals.facturar')
@endsection
