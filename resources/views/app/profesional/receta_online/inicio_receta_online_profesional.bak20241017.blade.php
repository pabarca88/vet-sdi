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
                                <h5 class="m-b-10 font-weight-bold">Receta Online</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">
                                    <a href="#">Receta Online</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Botones-->
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <div class="card subir">
                        <a href="{{ route('profesional.mis_recetas') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-3" src="{{ asset('images/iconos/recetas-ro.svg') }}"
                                    alt="Mis recetas">
                                <h5 class="titulos_tarjetas">
                                    Mis recetas
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir">
                        <a href="{{ route('profesional.mis_examenes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-3" src="{{ asset('images/iconos/examenes-ro.svg') }}"
                                    alt="Mis exámenes">
                                <h5 class="titulos_tarjetas">
                                    Mis exámenes
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir">
                        <a href="{{ route('profesional.mis_certificados') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-3"
                                    src="{{ asset('images/iconos/certificados-ro.svg') }}" alt="Mis certificados">
                                <h5 class="titulos_tarjetas">
                                    Mis certificados
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir">
                        <a href="{{ route('profesional.mis_documentos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-3" src="{{ asset('images/iconos/documentos-ro.svg') }}" alt="Mis documentos">
                                <h5 class="titulos_tarjetas">
                                    Mis documentos
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir">
                        <a href="{{ ROUTE('profesional.historial_mensajes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-3"
                                    src="{{ asset('images/iconos/msje.png') }}" alt="Mis documentos">
                                <h5>
                                    Mis mensajes
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!--CIERRE:Botones-->
            <!--Botones-->
            <!--<div class="row m-b-10">
                <div class="col-md-12">
                    <div class="card-deck">
                        <div class="card subir py-5">
                            <a href="{{ route('profesional.mis_certificados') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-100 text-center mb-3"
                                        src="{{ asset('images/iconos/certificado.svg') }}" alt="Mis Certificados">
                                    <h4 class="titulos_tarjetas">
                                        Mis Certificados
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <div class="card subir py-5">
                            <a href="#">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/licencia.svg') }}"
                                        alt="Mis Licencias">
                                    <h4 class="titulos_tarjetas">
                                        Mis Licencias
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--CIERRE:Botones-->
        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection
