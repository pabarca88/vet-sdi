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
                            </div>
                            <ul class="breadcrumb mt-2">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">
                                    <a href="#">Panel de configuración</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Botones-->

            <div class="row m-b-30">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="{{ ROUTE('profesional.lugares_atencion') }}">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3" src="{{ asset('images/iconos/lugar.svg') }}"
                                            alt="Mis Lugares de Atención">
                                        <h5>
                                            Mis lugares de atención
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="{{ route('profesional.mis_asistentes') }}">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3"
                                            src="{{ asset('images/iconos/mis_asistentes.svg') }}" alt="Mis Asistentes">
                                        <h5>
                                            Mis asistentes
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="{{ route('profesional.diagnosticos_cie10') }}">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3"
                                            src="{{ asset('images/iconos/diagnosticos-frecuentes.svg') }}"
                                            alt=" Configuración Diagnósticos CIE-10">
                                        <h5>
                                            Configuración Diagnósticos CIE-10
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="#">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3"
                                            src="{{ asset('images/iconos/configurar-lab.png') }}"
                                            alt="Diagnósticos Frecuentes CIE 10">
                                        <h5>
                                            Configurar mis laboratorios
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="#">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3"
                                        src="{{ asset('images/iconos/asistente-online.svg') }}"

                                        alt="Profesional">
                                        <h5 class="f-16">
                                        Contratar asistente online
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @if($profesional->id_especialidad == 2)
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="{{ route('profesional.aranceles') }}">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3"
                                        src="{{ asset('images/iconos/adm_comercial.png') }}"

                                        alt="Profesional">
                                        <h5 class="f-16">
                                            Configurar mis aranceles
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endif
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="#">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3"
                                        src="{{ asset('images/iconos/configurar-ficha-medica.png') }}"

                                        alt="Profesional">
                                        <h5 class="f-16">
                                        Personalizar mi ficha de atención
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="{{ ROUTE('profesional.mis_propios_convenios') }}">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3"
                                        src="{{ asset('images/iconos/convenios.png') }}"

                                        alt="Profesional">
                                        <h5 class="f-16">
                                        Mis convenios de atención
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @if($profesional->id_especialidad == 2)
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="{{ ROUTE('profesional.tons') }}">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3"
                                        src="{{ asset('images/iconos/usuario_asistente.svg') }}"

                                        alt="Profesional">
                                        <h5 class="f-16">
                                        Tons de atención
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endif
                        @if($profesional->id_especialidad == 2)
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="{{ ROUTE('profesional.mantencion_equipo') }}">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3"
                                        src="{{ asset('images/iconos/usuario_asistente.svg') }}"

                                        alt="Profesional">
                                        <h5 class="f-16">
                                        Mantención de equipo dentales
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endif
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card subir py-3">
                                <a href="{{ ROUTE('profesional.mantencion_equipo') }}">
                                    <div class="card-body text-center" style="cursor:pointer">
                                        <img class="wid-70 text-center mb-3"
                                        src="{{ asset('images/iconos/usuario_asistente.svg') }}"

                                        alt="Profesional">
                                        <h5 class="f-16">
                                        Editar mis equipos quirúrgicos
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--CIERRE:Botones-->
            <!--Botones-->
            <div class="row m-b-10">
                <div class="col-md-12">
                    <div class="card-deck">

                        {{--  <div class="card subir py-4">
                            <a href="{{ route('profesional.diagnosticos_frecuentes') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-90 text-center mb-3"
                                        src="{{ asset('images/iconos/diagnosticos_frecuentes.svg') }}"
                                        alt="Diagnósticos Frecuentes">
                                    <h5>
                                        Diagnósticos Frecuentes
                                    </h5>
                                </div>
                            </a>
                        </div>  --}}
                        {{--  <div class="card subir py-4">
                            <a href="{{ route('profesional.examenes_frecuentes') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-90 text-center mb-3"
                                        src="{{ asset('images/iconos/examenes_frecuentes.svg') }}"
                                        alt="Examenes Frecuentes">
                                    <h5>
                                        Exámenes Frecuentes
                                    </h5>
                                </div>
                            </a>
                        </div>  --}}
                        {{--  <div class="card subir py-4">
                            <a href="https://www.redmedichile.cl/admin/login.php">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-90 text-center mb-3"
                                        src="{{ asset('images/iconos/panel_administracion.svg') }}"
                                        alt="Panel de Administración">
                                    <h5>
                                        Panel de Administración
                                    </h5>
                                </div>
                            </a>
                        </div>  --}}


                    </div>
                </div>
            </div>
            <!--CIERRE:Botones-->
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection
