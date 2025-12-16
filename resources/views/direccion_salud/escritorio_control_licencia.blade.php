@extends('template.direccion_salud.template')

@section('content')

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Control de licencias</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ministerio.home') }}">Mi Escritorio </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->


            <div class="row m-b-10" >
                <div class="col-sm-12">
                    <div class="card-a">
                        <div class="card-header-a mb-3" id="tabla-registros">
                            <h5 class="font-weight-bold">Control de licencias</h5>
                        </div>
                        <div id="tabla-registros-c" class="collapse show" aria-labelledby="tabla-registros" data-parent="#tabla-registros">

                            <div class="card-body-aten-a shadow-none">

                                <div class="row m-b-10 ml-3" >
                                    <ul class="nav nav-pills mt-3 mb-4" id="pills-tab-licencias" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link-modal active" id="pills-tab-emitida-profesional" data-toggle="pill" href="#pills-emitida-profesional" role="tab" aria-controls="pills-emitida-profesional" aria-selected="true">Emitidas por profesionales</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-modal" id="pills-tab-recibida-paciente" data-toggle="pill" href="#pills-recibida-paciente" role="tab" aria-controls="pills-recibida-paciente" aria-selected="false">Recibidas por Paciente</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    {{-- filtros --}}
                                    <div class="col-md-12 mb-3" >
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="date" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-info-light-c btn-sm" onclick="filtrar_control_med();">Buscar</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{--  tablas de registros --}}
                                    <div class="col-md-12">
                                        <div class="tab-content" id="pills-tabContent-licencias">
                                            <div class="tab-pane fade show active" id="pills-emitida-profesional" role="tabpanel" aria-labelledby="pills-tab-emitida-profesional">
                                                <div class="table-responsive">
                                                    <table id="tabla_emitido_profesional"class="table dt-responsive table-xs" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Profesional</th>
                                                                <th>Cantidad</th>
                                                                <th>Detalle</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>jaime kriman<br>Otorrinolaringología</td>
                                                                <td>20</td>
                                                                <td><button class="btn btn-info-light-c btn-sm">Ver</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>jaime kriman<br>Otorrinolaringología</td>
                                                                <td>20</td>
                                                                <td><button class="btn btn-info-light-c btn-sm">Ver</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>jaime kriman<br>Otorrinolaringología</td>
                                                                <td>20</td>
                                                                <td><button class="btn btn-info-light-c btn-sm">Ver</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>jaime kriman<br>Otorrinolaringología</td>
                                                                <td>20</td>
                                                                <td><button class="btn btn-info-light-c btn-sm">Ver</button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-recibida-paciente" role="tabpanel" aria-labelledby="pills-tab-recibida-paciente">
                                                <div class="table-responsive">
                                                    <table id="tabla_recibida-paciente" class="table dt-responsive table-xs" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Paciente</th>
                                                                <th>Cantidad</th>
                                                                <th>Detalle</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Johan Davila<br>6187674-k</td>
                                                                <td>3</td>
                                                                <td><button class="btn btn-info-light-c btn-sm">Ver</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Johan Davila<br>6187674-k</td>
                                                                <td>3</td>
                                                                <td><button class="btn btn-info-light-c btn-sm">Ver</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Johan Davila<br>6187674-k</td>
                                                                <td>3</td>
                                                                <td><button class="btn btn-info-light-c btn-sm">Ver</button></td>
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
    </div>

@endsection
