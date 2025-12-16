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
                            <h5 class="m-b-10 font-weight-bold">Infraestructura y Boxes de Atención</h5>
                        </div>
                       <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_vacunatorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Boxes y Equipamiento</a></li>
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
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active"  id="pills-instalac-tab" data-toggle="pill" href="#pills-instalac" role="tab" aria-controls="pills-instalac" aria-selected="true">Boxes de Vacunación</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-equipamiento-tab" data-toggle="pill" href="#pills-equipamiento" role="tab" aria-controls="pills-equipamiento" aria-selected="false">Equipamiento</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-instalac" role="tabpanel" aria-labelledby="pills-instalac-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Boxes</h4>
                                                <div class="btn-group float-right" role="group" aria-label="Basic example">
                                                  <button type="button" class="btn btn-outline-light btn-sm" onclick="box();"><i class="feather icon-plus"></i>Agregar Nuevo Box</button>
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
                                            <table id="box_vacunas" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Nº Box</th>
                                                        <th class="text-center align-middle">Fecha de Habilitación</th>
                                                        <th class="text-center align-middle">Destino</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span>box 1</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>02/02/2022</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>Vacunas Infantiles</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span>box 2</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>13/02/2022</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>Vacunas Adultos</span>
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
                    <div class="tab-pane fade" id="pills-equipamiento" role="tabpanel" aria-labelledby="pills-equipamiento-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Boxes</h4>
                                                <div class="btn-group float-right" role="group" aria-label="Basic example">
                                                  <button type="button" class="btn btn-outline-light btn-sm" onclick="equipo();"><i class="feather icon-plus"></i>Agregar Nuevo Equipamiento</button>
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
                                        <table id="equipos_vacunas" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre Equipo</th>
                                                    <th class="text-center align-middle">Fecha Incorporación</th>
                                                    <th class="text-center align-middle">Uso</th>
                                                    <th class="text-center align-middle">Proveedor</th>
                                                    <th class="text-center align-middle">Sucursal/Servicio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span>Carro de Paro</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>02/02/2022</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Urgencias</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Equipos medicos ltda.</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Nombre servicio</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span>Desfibrilador</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>02/02/2022</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Urgencias</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Equipos medicos ltda.</span>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?php
@include("adm_cm.modal_vacunatorio.registrar_box");
@include("modal_vacunatorio.registrar_equipo");

?>
<!--****Cierre Container Completo****-->


@endsection
