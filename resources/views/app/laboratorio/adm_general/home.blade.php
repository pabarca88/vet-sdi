@extends('template.adm_cm.template')
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
                                <h5 class=" font-weight-bold">Administrador general laboratorio</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="escritorio.php">Mi escritorio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Botones-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card subir py-auto bg-info">
                        <div class="card-body text-center">
                             <h5 class=" mb-0 text-white f-24">Institución {{ mb_strtoupper($institucion->nombre) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card subir py-auto" style="min-height: 120px;">
                        <a href="{{ ROUTE('laboratorio.configuracion') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                <h6 class="mt-2 mb-0">Configurar mi centro</h6>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card subir py-auto" style="min-height: 120px;">
                        <a href="{{ ROUTE('laboratorio.area_comercial') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/adm_comercial.png') }}">
                                <h6 class="mt-2 mb-0">Administración comercial</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card subir py-auto" style="min-height: 120px;">
                        <a href="{{route('laboratorio.venta_audifonos')}}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/audifono-discapacidad.png') }}">
                                <h6 class="mt-2 mb-0">Venta de Audifonos</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card subir py-auto" style="min-height: 120px;">
                        <a href="{{ ROUTE('laboratorio.prestaciones') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/prestaciones.png') }}">
                                <h6 class="mt-2 mb-0">Prestaciones Laboratorio</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card subir py-auto" style="min-height: 120px;">
                        <a href="{{ ROUTE('laboratorio.profesionales_institucion') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/personal.png') }}">
                                <h6 class="mt-2 mb-0">RRHH Laboratorio</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card subir py-auto" style="min-height: 120px;">
                        <a href="{{ ROUTE('laboratorio.mis_profesionales') }}">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-50 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h6 class="mt-2 mb-0">Agendas del Laboratorio</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card subir py-auto" style="min-height: 120px;">
                        <a href="{{ ROUTE('laboratorio.pacientes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                                <h6 class="mt-2 mb-0">Pacientes</h6>
                            </div>
                        </a>
                    </div>
                </div>
				 <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3" onclick="en_construccion()">
                    <div class="card subir py-auto" style="min-height: 120px;">
                        <a href="{{ ROUTE('laboratorio.personal') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/estadisticas.png') }}">
                                <h6 class="mt-2 mb-0">Estadísticas</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card subir py-auto" onclick="en_construccion()";>
                        <a href="#">
                            <div class="card-body text-center" style="cursor:pointer; min-height: 120px;">
                                <img class="wid-50 text-center rounded" src="{{ asset('images/iconos/mis_asistentes.svg') }}">
                                <h6 class="mt-1">Contratar asistentes en linea</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <!--<div class="col-md-12">
                    <div class="card subir py-auto bg-warning">
                        <div class="card-body text-center" style="cursor:pointer">
                            <h6 class="mb-0 text-white f-20"></h6>
                        </div>
                    </div>
                </div>-->
                <div class="col-md-3 d-none">
                    <div class="card subir py-auto" onclick="en_construccion()";>
                      {{--  <a href="{{ ROUTE('laboratorio.laboratorio') }}"></a>--}}
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/laboratorio.svg') }}">
                                <h6 class="mt-2 mb-0">Laboratorio</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 d-none">
                    <div class="card subir py-auto" onclick="en_construccion()";>
                      {{-- <a href="{{ ROUTE('laboratorio.laboratorio') }}"></a>--}}
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/imagenologia.svg') }}">
                                <h6 class="mt-2 mb-0">Imagenología</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 d-none">
                    <div class="card subir py-auto" onclick="en_construccion()";>
                       {{-- <a href="{{ ROUTE('laboratorio.vacunatorio') }}"></a>--}}
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/vacunatorio.svg') }}">
                                <h6 class="mt-2 mb-0">Vacunatorio</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 d-none">
                    <div class="card subir py-auto" onclick="en_construccion()";>
                       {{-- <a href="{{ ROUTE('laboratorio.dental') }}"></a>--}}
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/dental.png') }}">
                                <h6 class="mt-2 mb-0">Dental</h6>
                            </div>
                        </a>
                    </div>
                </div>
				
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
    @include('app.adm_cm.modales.en_construccion')
@endsection
