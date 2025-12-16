@extends('template.profesional.template')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Mis Estadísticas</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Mis Estadísticas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-4">
                    <div class="card bg-c-info text-white widget-visitor-card">
                        <div class="card-body text-center">
                            <h2 class="text-white">
                                @if (isset($total_pacientes))
                                    {{ $total_pacientes }}
                                @else
                                    0
                                @endif

                            </h2>
                            <h6 class="text-white">Pacientes en total</h6>
                            <i class="feather icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-success text-white widget-visitor-card">
                        <div class="card-body text-center">
                            <h2 class="text-white">
                                @if (isset($treinta_dias))
                                    {{ $treinta_dias }}
                                @else
                                    0
                                @endif

                            </h2>
                            <h6 class="text-white">Pacientes atendidos (Últ. 30 días)</h6>
                            <i class="feather icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-danger text-white widget-visitor-card">
                        <div class="card-body text-center">
                            <h2 class="text-white">23</h2>
                            <h6 class="text-white">Inasistencias Pacientes</h6>
                            <i class="feather feather icon-x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="text-primary">Datos en atenciónes médicas<span
                                    class="text-muted font-weight-light">&nbsp;(Total)</span></h5>
                        </div>
                        <div class="card-body">
                            <div id="pie-chart-1" style="width:100%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="text-primary">Horas Médicas<span
                                    class="text-muted font-weight-light">&nbsp;(Últimos 6 meses)</span></h5>
                        </div>
                        <div class="card-body">
                            <div id="bar-chart-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card table-card">
                        <div class="card-header borderless bg-light">
                            <h5 class="text-primary">Pacientes atendidos por<span
                                    class="text-muted font-weight-light">&nbsp;(Total)</span></h5>
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
    <!--Cierre: Container Completo-->

@endsection
