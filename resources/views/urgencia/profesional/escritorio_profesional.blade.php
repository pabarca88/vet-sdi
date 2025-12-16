@extends('template.urgencia.template_profesional')
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
                            <h5 class="m-b-10 font-weight-bold">Escritorio Profesional Médico Urgencias</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('urgencia.profesional.home') }}">Mi escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--Cierre: Header-->
		<div class="col-sm-12">
            <div class="row">
                <div class="col-md-2">
                    <div class="card subir">
                        <a href="{{ route('urgencia.profesional.atencion')}}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Atención Pacientes</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card subir">
                        <a href="{{ route('urgencia.profesional.triage')}}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Triage o Categorización</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card subir">

                        <a href="{{ route('urgencia.profesional.box')}}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Box-Bergere</h5>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card subir">

                        <a href="{{ route('urgencia.profesional.ambulancia')}}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center"  src="{{ asset('images/iconos/equipamiento.svg') }}">
                                <h5 class="mt-1 mb-0">Ambulancias</h5>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card subir">

                        <a href="{{ route('urgencia.profesional.camas')}}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Camas</h5>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card subir">

                        <a href="{{ route('urgencia.profesional.buscar.paciente')}}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Buscar Pacientes</h5>
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

