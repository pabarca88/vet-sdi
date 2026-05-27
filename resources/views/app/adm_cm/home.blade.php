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
                                @php
                                    $nombreAdministrador = trim(Auth::user()->name ?? Auth::user()->nombre ?? 'Administrador');
                                    $primerNombreAdministrador = collect(preg_split('/\s+/', $nombreAdministrador))
                                        ->filter()
                                        ->first() ?? 'Administrador';
                                @endphp
                                <h4 class=" font-weight-bold text-white">Hola, {{ $primerNombreAdministrador }}</h4>
                                <p class="text-white">Bienvenido a tu escritorio de Administrador General de {{ mb_strtoupper($institucion->nombre) }}</p>
                                @if (!empty($contextosCentro) && !empty($contextoActivo))
                                    <form method="GET" action="{{ route('adm_cm.home') }}" class="mt-3">
                                        <div class="form-row align-items-end">
                                            <div class="col-md-5">
                                                <label class="text-white mb-1">Institución / Sucursal activa</label>
                                                <select name="contexto" class="form-control form-control-sm">
                                                    @foreach ($contextosCentro as $contexto)
                                                        <option value="{{ $contexto['key'] }}" @selected(($contextoActivo['key'] ?? '') === $contexto['key'])>
                                                            {{ $contexto['label'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 mt-2 mt-md-0">
                                                <button type="submit" class="btn btn-light btn-sm btn-block">Cambiar</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>

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

                             <h5 class=" mb-0 text-white f-24">Veterinaria {{ mb_strtoupper($institucion->nombre) }}</h5>

                        </div>

                    </div>

                </div>

            </div>

               

               

            <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

                <div class="col">

                    <div class="card subir py-auto">

                        <a href="{{ ROUTE('adm_cm.configuracion') }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center" src="{{ asset('images/iconos/panel_configuracion.svg') }}">

                                <h6 class="mt-2 mb-0">Configurar mi VET</h6>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col">

                    <div class="card subir py-auto">

                        <a href="{{ ROUTE('adm_cm.adm_medico') }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center" src="{{ asset('images/iconos/adm_medica.png') }}">

                                <h6 class="mt-2 mb-0">Administración médica</h6>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col">

                    <div class="card subir py-auto">

                        <a href="{{ ROUTE('adm_cm.area_contratos_nuevos') }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center" src="{{ asset('images/iconos/cotizacion.svg') }}">

                                <h6 class="mt-2 mb-0">Contratos e incorporaciones</h6>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col">



                    <div class="card subir py-auto">

                        <a href="{{ ROUTE('adm_cm.area_comercial') }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center" src="{{ asset('images/iconos/adm_comercial.png') }}">

                                <h6 class="mt-2 mb-0">Administración comercial</h6>

                            </div>

                        </a>

                    </div>



                </div>

                <div class="col">

                    <div class="card subir py-auto">

                        <a href="{{ ROUTE('adm_cm.profesionales') }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center" src="{{ asset('images/iconos/profesionales.svg') }}">

                                <h6 class="mt-2 mb-0">Profesionales</h6>

                            </div>

                        </a>

                    </div>



                </div>

               {{-- <div class="col">

                     <div class="card subir py-auto">

                        <a href="{{ ROUTE('adm_cm.mis_profesionales') }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-45 text-center" src="{{ asset('images/iconos/agenda.svg') }}">

                                <h6 class="mt-2 mb-0">Info profesionales del CM</h6>

                            </div>

                        </a>

                    </div>

                </div>--}}

                <div class="col">

                    <div class="card subir py-auto">

                        <a href="{{ ROUTE('adm_cm.pacientes') }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">

                                <h6 class="mt-2 mb-0">Mascotas y Responsables del VET</h6>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col">

                    <div class="card subir py-auto">

                        <a href="{{ ROUTE('adm_cm.personal') }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/mis_asistentes.svg') }}">

                                <h6 class="mt-1 mb-0">Asistentes</h6>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col">

                    <div class="card subir py-auto">

                        <a href="{{ ROUTE('adm_cm.reporte_estadisticas') }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center" src="{{ asset('images/iconos/estadisticas.svg') }}">

                                <h6 class="mt-1 mb-0">Reporte y estadísticas</h6>

                            </div>

                        </a>

                    </div>

                </div>



            </div>

               

           

                

            <div class="row">

                <div class="col-md-12">

                    <div class="card subir py-auto bg-warning">

                        <div class="card-body text-center" style="cursor:pointer">

                            <h6 class="mb-0 text-white f-20">Áreas del Centro Médico</h6>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="card subir py-auto" onclick="en_construccion()";>

                      {{--  <a href="{{ ROUTE('adm_cm.laboratorio') }}"></a>--}}

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/laboratorio.svg') }}">

                                <h6 class="mt-2 mb-0">Laboratorio</h6>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="card subir py-auto" onclick="en_construccion()";>

                      {{-- <a href="{{ ROUTE('adm_cm.laboratorio') }}"></a>--}}

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/imagenologia.svg') }}">

                                <h6 class="mt-2 mb-0">Imagenología</h6>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="card subir py-auto" onclick="en_construccion()";>

                       {{-- <a href="{{ ROUTE('adm_cm.vacunatorio') }}"></a>--}}

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/vacunatorio.svg') }}">

                                <h6 class="mt-2 mb-0">Vacunatorio</h6>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="card subir py-auto" onclick="en_construccion()";>

                       {{-- <a href="{{ ROUTE('adm_cm.dental') }}"></a>--}}

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-50 text-center"  src="{{ asset('images/iconos/dental.png') }}">

                                <h6 class="mt-2 mb-0">Dental</h6>

                            </div>

                        </a>

                    </div>

                </div>

				<div class="col-md-12">

					<div class="card subir py-auto" onclick="en_construccion()";>

						<a href="#">

							<div class="card-body text-center" style="cursor:pointer">

								<img class="wid-50 text-center rounded" src="{{ asset('images/iconos/mis_asistentes.svg') }}">

								<h6 class="mt-1">Contratar asistentes en linea</h6>

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
