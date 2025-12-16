@extends('template.laboratorio.laboratorio_profesional.template')
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
                                <h5 class="m-b-10 font-weight-bold">Recepción de muestras</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio_profesional_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="procesos_laboratorio.php">Procesos</a></li>
                                <li class="breadcrumb-item"><a href="recepcion_muestras_laboratorio.php">Recepción de muestras</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-light pb-1 pt-2">
                                <h5 class="text-primary">Solicitud de examen</h5>
                            </div>
                            <div class="card-body">
                                <!--Num Solicitud de examen y fecha-->
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Nº de Petición</label>
                                            <input type="number" class="form-control form-control-sm form-control-sm-activo" name="orden" id="orden">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Nº de Solicitud</label>
                                            <input type="number" class="form-control form-control-sm form-control-sm-activo" name="orden" id="orden">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <button type="button" class="btn btn-info btn-sm">Ingresar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header bg-light pb-1 pt-2">
                                <h5 class="text-primary d-inline mt-4">Identificación del Paciente</h5>
                            </div>
                            <div class="card-body">
                                <!--Paciente-->
                                <div class="table-responsive">
                                    <table class="table table-xs table-borderless">
                                        <tr>
                                          <th scope="row">Rut</th>
                                          <td>00000000-0</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Nombres</th>
                                          <td>Jacob Larry</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Apellidos</th>
                                          <td>Escobar Campos</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Nacimiento</th>
                                          <td>00/00/0000</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Edad</th>
                                          <td>26</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Sexo</th>
                                          <td>Masculino</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Dirección</th>
                                          <td>Las Maravillas #134jksdjdsjsk</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Comuna</th>
                                          <td>Valparaíso</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header bg-light pb-1 pt-2">
                                <h5 class="text-primary d-inline mt-4">Identificación de la solicitud</h5>
                            </div>
                            <div class="card-body">
                                <!--Paciente-->
                                <div class="table-responsive">
                                    <table class="table table-xs table-borderless">
                                        <tr>
                                          <th scope="row">Profesional que solicita</th>
                                          <td>Jaime Kriman Astorga</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Recepción de solicitud</th>
                                          <td>00/00/0000 00:00hrs</td><!--Fecha y Hora-->
                                        </tr>
                                        <tr>
                                          <th scope="row">Tipo de muestra</th>
                                          <td>Sangre</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Extracción (muestra)</th>
                                          <td>00/00/0000 00:00hrs</td><!--Fecha y Hora-->
                                        </tr>
                                        <tr>
                                          <th scope="row">Recepción (muestra)</th>
                                          <td>00/00/0000 00:00hrs</td><!--Fecha y Hora-->
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--Seleccionar exámenes para añadir-->
                    <div class="col-md-12 h-100">
                        <div class="card">
                            <div class="card-header bg-info pb-1 pt-2">
                                <h5 class="text-white">Recepción de muestras</h5>
                            </div>
                            <div class="card-body">
                                    <table id="recepcion_muestras" class="display table table-striped table-hover dt-responsive nowrap table-sm text-center align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Examen</th>
                                                <th>Estado</th>
                                                <th>Extracción</th>
                                                <th>Recepción</th>
                                                <th>Tubo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle text-center">7823738</td>
                                                <td class="align-middle text-center">Nombre examen</td>
                                                <td class="align-middle text-center"><span class="badge badge-success">Recepcionada</span></td>
                                                <td class="align-middle text-center">00/00/00<br>
                                                00:00hrs</td>
                                                <td class="align-middle text-center">00/00/00<br>
                                                00:00hrs</td>
                                                <td class="align-middle text-center">Color del tubo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div class="col-sm-12 col-md-12 mx-auto text-center">
                                        <button type="button" class="btn btn-success">Enviar a procesar solicitud</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->


   @endsection
