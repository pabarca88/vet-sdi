@extends('template.asistente_cm.template')
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
                            <h5 class="m-b-10 font-weight-bold">Escritorio Asistente Centro Médico</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('asistentecm.home') }}">Mi Escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Row Botones-->
        <div class="row m-b-30">
            <div class="col-md-12">
                <div class="card-deck">
                    <!--Cierre de Card-->
                    <div class="card  subir py-auto">
                        <a href="{{ ROUTE('asistentecm.buscar_paciente') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center mt-1 mb-2" src="{{ asset('images/iconos/pacientes.svg') }}">
                                <h5 class="mt-1 mb-0">Buscar Pacientes</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card  subir py-auto">
                        <a href="{{ ROUTE('asistentecm.reservar_hora') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/profesional_2.svg') }}">
                                <h5 class="mt-1 mb-0">Reservar Hora Médica</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('asistentecm.mis_profesionales') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Agenda de Profesionales</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('asistentecm.home') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Agenda de Tratamientos</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('asistentecm.home') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                                <h5 class="mt-1 mb-0">Agenda de Laboratorios</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE: Row Botones -->
        <!--Tablas agendas del día-->
        <div class="row">
            <div class="col-md-4 m-b-30">
                <div class="card h-100 pb-0">
                    <div class="card-header bg-c-info">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h5 class="text-white" style="font-size: 1.0rem;">Agenda diaria de profesionales</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 text-center mt-2 mx-auto">
                                <input type="date" class="form-control form-control-sm" id="date">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 pb-0">
                        <div class="dt-responsive table-responsive" style="height:247px;">
                            <table id="simpletable" class="table table-striped table-bordered nowrap table-xs">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Acción</th>
                                        <th class="text-center align-middle">Profesional</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Lorenzo Gonzáles Córdoba</strong></span><br>
                                            <span>Cirujano Vacular</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Jaime Kriman Astorga</strong></span><br>
                                            <span>Otorrinolaringólogo</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Alejandra Silva Castro</strong></span><br>
                                            <span>Medicina General</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Patricia Zamora Castro</strong></span><br>
                                            <span>Odontólogo</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Julian Montenegro Castro</strong></span><br>
                                            <span>Traumatólogo infantil</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 m-b-30">
                <div class="card h-100 pb-0">
                    <div class="card-header bg-c-info">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h5 class="text-white" style="font-size: 1.0rem;">Agenda diaria de laboratorios</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 text-center mt-2 mx-auto">
                                <input type="date" class="form-control form-control-sm" id="date">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 pb-0">
                        <div class="dt-responsive table-responsive" style="height:247px;">
                            <table id="simpletable" class="table table-striped table-bordered nowrap table-xs">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Acción</th>
                                        <th class="text-center align-middle">Profesional</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Lorenzo Gonzáles Córdoba</strong></span><br>
                                            <span>Cirujano Vacular</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Jaime Kriman Astorga</strong></span><br>
                                            <span>Otorrinolaringólogo</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Alejandra Silva Castro</strong></span><br>
                                            <span>Medicina General</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Patricia Zamora Castro</strong></span><br>
                                            <span>Odontólogo</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Julian Montenegro Castro</strong></span><br>
                                            <span>Traumatólogo infantil</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 m-b-30">
                <div class="card h-100 pb-0">
                    <div class="card-header bg-c-info">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h5 class="text-white" style="font-size: 1.0rem;">Agenda diaria de tratamientos</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 text-center mt-2 mx-auto">
                                <input type="date" class="form-control form-control-sm" id="date">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 pb-0">
                        <div class="dt-responsive table-responsive" style="height:247px;">
                            <table id="simpletable" class="table table-striped table-bordered nowrap table-xs">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Acción</th>
                                        <th class="text-center align-middle">Profesional</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Lorenzo Gonzáles Córdoba</strong></span><br>
                                            <span>Fonoaudiólogo</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Jaime Kriman Astorga</strong></span><br>
                                            <span>Terapia Ocupacional</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Alejandra Silva Castro</strong></span><br>
                                            <span>Kinesiólogo</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Patricia Zamora Castro</strong></span><br>
                                            <span>Terapia Ocupacional</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <a href="#" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver agenda"><i class="feather icon-calendar"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span><strong>Julian Montenegro Castro</strong></span><br>
                                            <span>Kinesiólogo</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Row Botones-->
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir">
                        <button type="button" class="btn btn-c-blanco text-center" data-toggle="modal" data-target="#modal_recepcion_bonos_api">
                            <div class="card-body" style="cursor:pointer">
                                <!-- Boton Modal -->
                                <img class="pt-3 wid-100" src="{{ asset('images/logos/convenios.png') }}">
                                <h5 class="mt-3 pb-3"> Recepción de Bonos y Programas</h5>
                                <!-- CIERRE:Botón Modal -->
                            </div>
                        </button>
                    </div>
                    <div class="card subir">
                        <button type="button" class="btn btn-c-blanco text-center" data-toggle="modal" data-target="#modal_venta_bonos_api">
                            <div class="card-body" style="cursor:pointer">
                                <!-- Boton Modal -->
                                <img class="wid-100 pt-3" src="{{ asset('images/logos/convenios.png') }}">
                                <h5 class="mt-3 pb-3"> Venta Bonos </h5>
                                <!-- CIERRE:Botón Modal -->
                            </div>
                        </button>
                    </div>
                    <div class="card subir">
                        <button type="button" class="btn btn-c-blanco text-center" data-toggle="modal" data-target="#modal_boleta_electronica">
                            <div class="card-body" style="cursor:pointer">
                                <!-- Boton Modal -->
                                <img class="wid-140 pt-3" src="{{ asset('images/logos/sii.svg') }}">
                                <h5 class="mt-3 pb-3"> Boleta Electrónica </h5>
                                <!-- CIERRE:Botón Modal -->
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
