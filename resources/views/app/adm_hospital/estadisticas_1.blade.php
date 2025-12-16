@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10 font-weight-bold">Estadísticas</h5>
                    </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('adm_cm.home') }}">Mi Escritorio</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                    <h4 class="text-white f-20 mt-2 mb-1">Estadísticas del centro</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>

                    <!--Cards-->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-info order-card">
                                <div class="card-body">
                                    <h6 class="text-white">Ingresos</h6>
                                    <h2 class="text-white">3.459</h2>
                                    <p class="m-b-0">$10.233.492 <i class="feather icon-arrow-down m-l-10 m-r-10"></i>$3.323.032 <i class="feather icon-arrow-up"></i></p>
                                    <i class="card-icon fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-info order-card">
                                <div class="card-body">
                                    <h6 class="text-white">Egresos</h6>
                                    <h2 class="text-white">2.234</h2>
                                    <p class="m-b-0">$5.833.221 <i class="feather icon-arrow-down m-l-10 m-r-10"></i>$423.321 <i class="feather icon-arrow-up"></i></p>
                                    <i class="card-icon fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-info order-card">
                                <div class="card-body">
                                    <h6 class="text-white">Balance del mes</h6>
                                    <h2 class="text-white">3244</h2>
                                    <p class="m-b-0">$700.342<i class="feather icon-arrow-down m-l-10 m-r-10"></i>$200.023 <i class="feather icon-arrow-up"></i></p>
                                    <i class="card-icon fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card bg-c-info text-white widget-visitor-card">
                                <div class="card-body text-center">
                                    <h2 class="text-white">234</h2>
                                    <h6 class="text-white">Pacientes en total</h6>
                                    <i class="feather icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-success text-white widget-visitor-card">
                                <div class="card-body text-center">
                                    <h2 class="text-white">345</h2>
                                    <h6 class="text-white">Pacientes atendidos (Últ. 30 días)</h6>
                                    <i class="feather icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-danger text-white widget-visitor-card">
                                <div class="card-body text-center">
                                    <h2 class="text-white">23</h2>
                                    <h6 class="text-white">Inasistencias pacientes</h6>
                                    <i class="feather feather icon-x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Datos en atenciónes médicas-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="text-primary">Datos en atenciónes médicas<span class="text-muted font-weight-light">&nbsp;(Total)</span></h5>
                                </div>
                                <div class="card-body">
                                    <div id="pie-chart-1" style="width:100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--Total horas médicas (6 meses)-->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="text-primary">Horas Médicas<span class="text-muted font-weight-light">&nbsp;(Últimos 6 meses)</span></h5>
                                </div>
                                <div class="card-body">
                                    <div id="bar-chart-1"></div>
                                </div>
                            </div>
                        </div>
                        <!--Pacientes atendidos según previsión-->
                        <div class="col-md-4">
                            <div class="card table-card">
                                <div class="card-header borderless bg-light">
                                    <h5 class="text-primary">Pacientes atendidos por<span class="text-muted font-weight-light">&nbsp;(Total)</span></h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-sm">
                                            <tbody>
                                                <tr class="pb-0">
                                                    <td>Particular</td>
                                                    <td><span class="text-right d-block m-0">
                                                        <span class="m-r-15"><strong>50</strong></span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="pb-0">
                                                    <td>Fonasa</td>
                                                    <td><span class="text-right d-block m-0">
                                                        <span class="m-r-15"><strong>350</strong></span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Banmédica</td>
                                                    <td><span class="text-right d-block m-0">
                                                        <span class="m-r-15"><strong>350</strong></span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Colmena</td>
                                                    <td><span class="text-right d-block m-0">
                                                        <span class="m-r-15"><strong>35</strong></span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cruz Blanca</td>
                                                    <td><span class="text-right d-block m-0">
                                                        <span class="m-r-15"><strong>50</strong></span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nueva Masvida</td>
                                                    <td><span class="text-right d-block m-0">
                                                        <span class="m-r-15"><strong>347</strong></span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Consalud</td>
                                                    <td><span class="text-right d-block m-0">
                                                        <span class="m-r-15"><strong>78</strong></span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cruz del Norte</td>
                                                    <td><span class="text-right d-block m-0">
                                                        <span class="m-r-15"><strong>15</strong></span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Vida Tres</td>
                                                    <td><span class="text-right d-block m-0">
                                                        <span class="m-r-15"><strong>22</strong></span>
                                                        </span>
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