@extends('template.paciente.template')
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
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip"
                                    data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.receta') }}">Receta Online</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Botones-->
        <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="card subir">
                        <a href="{{ route('paciente.receta.receta') }}">
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
                        <a href="{{ route('paciente.receta.examen') }}">
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
                        <a href="{{ route('paciente.receta.licencia') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-3"
                                    src="{{ asset('images/iconos/certificados-ro.svg') }}" alt="Mis certificados">
                                <h5 class="titulos_tarjetas">
                                    Mis licencias
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir">
                        <a href="{{ route('paciente.receta.certificado') }}">
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
                       <a href="{{ ROUTE('paciente.receta.documentos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-3"
                                    src="{{ asset('images/iconos/documentos-ro.svg') }}" alt="Mis documentos">
                                <h5 class="titulos_tarjetas">
                                    Mis documentos e indicaciones
                                </h5>
                            </div>
                        </a>
                    </div>
                </div> 
                <div class="col">
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.mis_controles') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-3"
                                    src="{{ asset('images/iconos/certificados-ro.svg') }}" alt="Mis certificados">
                                <h5 class="titulos_tarjetas">
                                    Mis controles diarios
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        <!--<div class="row m-b-30">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir py-5">
                        <a href="{{ ROUTE('paciente.receta.receta') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/recetas.svg') }}"
                                    alt="Mis Recetas">
                                <h4 class="titulos_tarjetas">
                                    Mis Recetas
                                </h4>
                            </div>
                        </a>
                    </div>
                    <div class="card subir py-5">
                        <a href="{{ ROUTE('paciente.receta.examen') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/examen.svg') }}"
                                    alt="Mis Examenes">
                                <h4 class="titulos_tarjetas">
                                    Mis Exámenes
                                </h4>
                            </div>
                        </a>
                    </div>
					 <div class="card subir py-5">
                        <a href="{{ ROUTE('paciente.receta.examen') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/examen.svg') }}"
                                    alt="Mis controles diarios">
                                <h4 class="titulos_tarjetas">
                                    Mis Controles Diarios
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>-->
        <!--CIERRE:Botones-->
        <!--Botones
        <div class="row m-b-10">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir py-5">
                        <a href="{{ ROUTE('paciente.receta.certificado') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/certificado.svg') }}"
                                    alt="Mis Certificados">
                                <h4 class="titulos_tarjetas">
                                    Mis Certificados
                                </h4>
                            </div>
                        </a>
                    </div>
					<div class="card subir py-5">
                        <a href="{{ ROUTE('paciente.receta.certificado') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/certificado.svg') }}"
                                    alt="Mis Certificados">
                                <h4 class="titulos_tarjetas">
                                    Mis Documentos Médicos
                                </h4>
                            </div>
                        </a>
                    </div>
                    <div class="card subir py-5">
                        <a href="{{ ROUTE('paciente.receta.licencia') }}">
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
        </div>
        CIERRE:Botones-->
    </div>
</div>
<!--Cierre: Container Completo-->
@endsection
