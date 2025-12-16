
@extends('template.adm_cm.template')

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-12 mt-2">
                            <div class="page-header-title">
                                <h5 class="font-weight-bold pt-3 d-inline"><strong>Escritorio Jefe de Servicio: {{ $servicio->nombre }}</strong></h5>
                                <h6 class="p-28 mt-0 mb-0 text-white d-inline float-md-right">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{--  <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card subir">
                                        <a href="#">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                                <h5 class="mt-1 mb-0">Configuración</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card subir">
                                        <a href="#">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos/permiso-calendario.png') }}">
                                                <h5 class="mt-1 mb-0">Permisos y vacaciones</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="card subir">
                                        <a href="{{ route('administrativo.mis.profesionales') }}">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos/profesional_1.svg') }}">
                                                <h5 class="mt-1 mb-0">Profesionales</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="card subir">
                                        <a href="#">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/historico-turnos.png') }}">
                                                <h5 class="mt-1 mb-0">Configuración turno</h5>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="card subir">
                                        <a href="#">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/contacto-red.png') }}">
                                                <h5 class="mt-1 mb-0">Contactos Red</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card subir">
                                        <a href="#">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos_urg/contacto-pacientes.png') }}">
                                                <h5 class="mt-1 mb-0">Contacto pacientes</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card subir">
                                        <a href="#">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos/estadisticas.png') }}">
                                                <h5 class="mt-1 mb-0">Estadísticas</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card subir">
                                        <a href="#">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center" src="{{ asset('images/iconos/entregar-turno.png') }}">
                                                <h5 class="mt-1 mb-0">Entregas de turno</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card subir">
                                        <a href="{{ route('servicio.salas', ['id' => $servicio->id]) }}">
                                            <div class="card-body text-center" style="cursor:pointer">
                                                <img class="wid-60 text-center"  src="{{ asset('images/iconos/aten-med.png') }}">
                                                <h5 class="mt-1 mb-0">Atender Pacientes</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">

                                </div>

                            </div>
                        </div>
                    </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <div class="row">

            </div>
        </div>




        <!--Modals de especialidad -->
        {{--  @include("../modals_generales/autorizacion_acompa.php");  --}}

        <!--Modals formularios generales-->
        {{--  @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_examenes")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_medicamentos")--}}


    </div>
@endsection
