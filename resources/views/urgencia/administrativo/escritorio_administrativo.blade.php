@extends('template.urgencia.template_asistente')
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
                            <h5 class="m-b-10 font-weight-bold">Escritorio Recepción Urgencias</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('urgencia.adminstrativo.home') }}">Mi escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
          <div class="col-sm-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ route('urgencia.adminstrativo.recepcion') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/ingreso-pac.png') }}">
                                <h5 class="mt-1 mb-0">Recepción</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ route('urgencia.adminstrativo.mis.profesionales') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/profesional_1.svg') }}">
                                <h5 class="mt-1 mb-0">Profesionales</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">

                        <a href="{{ route('urgencia.adminstrativo.cama') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/box-aten.png') }}">
                                <h5 class="mt-1 mb-0">Box Atención</h5>
                            </div>
                        </a>

                    </div>
                </div>
                <h5>hacer botón o algo para ver box desocupado? = ambulacia</h5>
            </div>
        </div>
		<div class="col-sm-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ route('urgencia.adminstrativo.ambulancia') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center"  src="{{ asset('images/iconos_urg/ambulancia.png') }}">
                                <h5 class="mt-1 mb-0">Ambulancias</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ route('urgencia.adminstrativo.cama') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/historico-turnos.png') }}">
                                <h5 class="mt-1 mb-0">Histórico Turno</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ route('urgencia.adminstrativo.cama') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/contacto-red.png') }}">
                                <h5 class="mt-1 mb-0">Contactos Red</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ route('urgencia.adminstrativo.buscar.paciente') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/contacto-pacientes.png') }}">
                                <h5 class="mt-1 mb-0">Contacto Pacientes</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--CIERRE: Row Botones -->
    </div>
</div>
{{--  @include('app.adm_cm.modales.en_construccion')
@include('app.asistente_dental_tecn.sidebar_derecho_tons')  --}}
<!--Cierre: Container Completo-->
@endsection

