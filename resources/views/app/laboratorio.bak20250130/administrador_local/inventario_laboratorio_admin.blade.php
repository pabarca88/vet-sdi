@extends('template.laboratorio.administrador_local.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Inventario</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="administracion_admin.php">Administración</a></li>
                            <li class="breadcrumb-item"><a href="inventario_laboratorio_admin.php">Inventario</a></li>
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
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Insumos laboratorio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Insumos generales</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Insumos laboratorio</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                        <table id="inventario_insumos_lab" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nº lote /código</th>
                                                    <th class="text-center align-middle">Producto</th>
                                                    <th class="text-center align-middle">Stock Inicial</th>
                                                    <th class="text-center align-middle">Entradas</th>
                                                    <th class="text-center align-middle">Salidas</th>
                                                    <th class="text-center align-middle">Stock actual</th>
                                                    <th class="text-center align-middle">Sucursal</th>
                                                    <th class="text-center align-middle">Proveedor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span>#8129812898</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Guantes desechables talla M</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>300</span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>-</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>100</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>250</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Nombre sucursal</span>
                                                    </td> 
                                                    <td class="align-middle text-center">
                                                        <span>Nombre Proveedor</span>
                                                    </td>             
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span>#37283728</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Jeringa Desechable 5 mL</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>1050</span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>-</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>50</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>1000</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Nombre sucursal</span>
                                                    </td> 
                                                    <td class="align-middle text-center">
                                                        <span>Nombre Proveedor</span>
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
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Insumos generales</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <div style="overflow-x:auto;">
                                        <table id="inventario_insumos_generales" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nº lote /código</th>
                                                    <th class="text-center align-middle">Producto</th>
                                                    <th class="text-center align-middle">Stock Inicial</th>
                                                    <th class="text-center align-middle">Entradas</th>
                                                    <th class="text-center align-middle">Salidas</th>
                                                    <th class="text-center align-middle">Stock actual</th>
                                                    <th class="text-center align-middle">Sucursal</th>
                                                    <th class="text-center align-middle">Proveedor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span>#8129812898</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Guantes desechables talla M</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>300</span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>-</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>100</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>250</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Nombre sucursal</span>
                                                    </td> 
                                                    <td class="align-middle text-center">
                                                        <span>Nombre Proveedor</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span>#37283728</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Jeringa Desechable 5 mL</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>1050</span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>-</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>50</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>1000</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Nombre sucursal</span>
                                                    </td> 
                                                    <td class="align-middle text-center">
                                                        <span>Nombre Proveedor</span>
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