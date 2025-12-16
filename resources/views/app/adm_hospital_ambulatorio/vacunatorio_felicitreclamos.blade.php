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
                            <h5 class="m-b-10 font-weight-bold">Personal Estadistica Reclamos</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_vacunatorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Personal</a></li>
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
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-estadisticas-tab" data-toggle="tab" href="#pills-estadisticas" role="tab" aria-controls="pills-estadisticas" aria-selected="false">Estadísticas de Rechazo horas</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-reclamos-tab" data-toggle="tab" href="#pills-reclamos" role="tab" aria-controls="pills-reclamos" aria-selected="false">Reclamos y Felicitaciones</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-estadisticas" role="tabpanel" aria-labelledby="pills-estadisticas-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12 align-botton">
                                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Estadísticas </h4>
                                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_profesional">
                                                <i class="feather icon-plus"></i> Registrar Nuevo Profesional
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header bg-light">
                                                        <h5 class="text-primary">Datos de Rechazo de Horas<span class="text-muted font-weight-light">&nbsp;(Total)</span></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="pie-chart-2" style="width:100%"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div style="overflow-x:auto;">
                                            <table id="tabla_estadistica_horas" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Mes de rechazo</th>
                                                        <th class="text-center align-middle">Especialidad</th>
                                                        <th class="text-center align-middle">Motivo</th>
                                                        <th class="text-center align-middle">Atendido por:</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>diciembre 2021</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Dermatólogo</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>sin hora disponible</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Juan Sanchez</strong></span><br>
                                                            <span>17.345.466-2</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>diciembre 2021</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Medicina General</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>sin hora disponible</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Juan Sanchez</strong></span><br>
                                                            <span>17.345.466-2</span>
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
                    <div class="tab-pane fade" id="pills-reclamos" role="tabpanel" aria-labelledby="pills-reclamos-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12 align-botton">
                                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Estadísticas felicitaciones y Reclamos </h4>
                                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_rec">
                                                <i class="feather icon-plus"></i> Registrar nuevo reclamo
                                            </button>
                                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_felicit">
                                                <i class="feather icon-plus"></i> Registrar nuevas Felicitaciones
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header bg-light">
                                                        <h5 class="text-primary">Datos de Reclamos <span class="text-muted font-weight-light">&nbsp;(Total)</span></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="pie-chart-3" style="width:100%"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div style="overflow-x:auto;">
                                            <table id="tabla_est_reclamos" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Mes de reclamo</th>
                                                        <th class="text-center align-middle">Funcionario o Profesional</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Motivo</th>
                                                        <th class="text-center align-middle">Atendido por:</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>diciembre 2021</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Dr. Escobar</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Reclamo</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>Demora en la Atención</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Juan Sanchez</strong></span><br>
                                                            <span>17.345.466-2</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>diciembre 2021</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Dr. Maldonado</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Reclamo</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>Demora en la Atención</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Juan Sanchez</strong></span><br>
                                                            <span>17.345.466-2</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>diciembre 2021</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Dra. Sepúlveda</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Felicitaciones</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>Excelente Atención</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>Juan Sanchez</strong></span><br>
                                                            <span>17.345.466-2</span>
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
