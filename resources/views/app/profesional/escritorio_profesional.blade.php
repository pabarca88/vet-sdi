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
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item mt-4">
                                    <a href="#">Escritorio profesional</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Botones superiores-->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card-deck">
                        <div class="card subir">
                            {{-- <a href="{{ route('profesional.mi_agenda') }}"> --}}
                            <div class="card-body text-center px-2" onclick="seleccionar_lugar_atencion();"
                                style="cursor:pointer">
                                <img class="wid-40 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h6 class="mt-1">Mi <br>agenda</h6>
                            </div>
                            {{-- </a> --}}
                        </div>
                        <div class="card subir">
                            <a href="{{ route('profesional.pacientes') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/mascotas.svg') }}">
                                    <h6 class="mt-1">Mis <br>clientes</h6>
                                </div>
                            </a>
                        </div>
                        <div class="card subir">
                            <a href="{{ route('profesional.configuracion') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center"
                                        src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                    <h6 class="mt-1"> Panel de <br>configuración</h6>
                                </div>
                            </a>
                        </div>
                        <div class="card subir">
                            <a href="{{ route('profesional.index_receta_online') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/docs.svg') }}">
                                    <h6 class="mt-1">Mis <br>documentos</h6>
                                </div>
                            </a>
                        </div>
                        @if($agenda_examen)
                        <div class="card subir">
                            <a href="{{ route('profesional.index_transcripcion_examen') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/examenes.svg') }}">
                                    <h6 class="mt-1 f-13">Transcripción <br>examenes</h6>
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!--Tabla agenda del día y Farmacrónicos-->
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card h-100 pb-0">
                        <div class="card-header text-center bg-c-info">
                            <div class="row">
                                <div class="col-sm-4 d-inline text-left">
                                    <h5 class="text-white my-2" style="font-size: 1.1rem;">Mi agenda del día</h5>
                                </div>
                                <div class="col-md-4 d-inline text-right mt-1">
									<select name="lugares_atencion_agenda" id="lugares_atencion_agenda" class="form-control form-control-sm" onchange="buscar_hora_medica();">
										<option value="">Seleccione Lugar</option>
									</select>
                                </div>
                                <div class="col-sm-4 d-inline text-right mt-1">
                                    <input type="date" onChange="buscar_hora_medica();" class="form-control form-control-sm" id="buscar_horas" name="buscar_horas" value="{{ $fecha_carga }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 pt-4">
                            <div class="dt-responsive table-responsive align-middle pb-0">
                                <table id="simpletable" class="table table-striped table-bordered nowrap table-sm"
                                    style="height: 100px">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-left">Hora</th>
                                            <th class="text-center align-left">Paciente</th>
                                            <th class="text-center align-left">Lugar Atención</th>
                                            <!--<th class="text-center align-middle">Acción</th>-->
                                        </tr>
                                    </thead>
                                   <tbody>
                                        @if (isset($hora_dia))
                                            @foreach ($hora_dia as $hd)
                                                <tr>
                                                    <td class="text-center align-left">{{ $hd->hora_inicio }}</td>
                                                    <td class="text-center align-left bg-estado-light-amarillo">
                                                        <strong>
															<span>{{ $hd->paciente->nombres . ' ' . $hd->paciente->apellido_uno . ' ' . $hd->paciente->apellido_dos }}</span>
														<strong>
														<!--<br style="line-height: 1%;"><span>{{ $hd->paciente->rut }}</span>-->
                                                    </td>
                                                    <td class="text-center align-left">{{ $hd->lugar_atencion->nombre }}</td>
                                                    <!--
                                                    <td class="text-center align-middle">
                                                        <button href="#!" class="btn btn-info btn-sm btn-icon"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Atender Paciente"><i class="feather icon-check"></i>
                                                        </button>
                                                        <button href="#!" class="btn btn-danger btn-sm btn-icon"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Anular Hora"><i class="feather icon-x"></i>
                                                        </button>
                                                    </td>
                                                    -->
                                                </tr>
                                            @endforeach
                                        @else
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 <!--<div class="col-md-4 mb-3">
                    <div class="card subir text-center h-100">
                        <img class="img-fluid card-img-top" src="{{ asset('images/iconos/inscripciones_1.svg') }}"
                            alt="Farmacrónicos">
                         <a href="http://cronicos.cl/registro.php" target="_blank" class="btn  btn-arrastre" type="button">
                            <div class="card-body">
                                <h5 style="font-size: 1.2rem;" class="card-title pt-2">Inscripción en Farmacrónicos</h5>
                                <p class="card-text">Inscriba a sus Pacientes en crónicos.cl <br> Obtendrá Importantes Novedades en el Manejo de su Patología<br> y en el uso de sus Medicamentos</p>
                            </div>
                        </a>
                    </div>
                </div>-->
            </div>

            <!--Botones-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-deck">
                        <!--<div class="card social-widget-card bg-c-info opacidad">
                            <a href="{{ route('profesional.mis_estadisticas') }}" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-40 mb-2" src="{{ asset('images/iconos/estadisticas.svg') }}">
                                    <h5 class="my-auto text-white">Mis Estadísticas</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card social-widget-card bg-c-info opacidad px-0">
                             <a href="https://www.cronicos.cl/" target="_blank" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-40 mb-2" src="{{ asset('images/iconos/cronicos.svg') }}">
                                    <h5 class="my-auto text-white">Portal Crónicos</h5>
                                </div>
                            </a>
                        </div>-->
                        @if($director_medico)
                        <div class="card social-widget-card bg-c-info opacidad px-0">
                            <a href="{{ ROUTE('adm_cm.adm_medico') }}" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-30 mb-3" src="{{ asset('images/iconos/otros_servicios.svg') }}">
                                    <h5 class="my-auto text-white">Direccion medica</h5>
                                </div>
                            </a>
                        </div>
                        @endif
                        <div class="card social-widget-card bg-c-info opacidad px-0">
                            <a href="{{ route('profesional.flujo_caja') }}" class="btn" type="button">
                                <div class="card-body">
                                    <img class="wid-30 mb-3" src="{{ asset('images/iconos/flujo_caja_3.svg') }}">
                                    <h5 class="my-auto text-white">Flujo de Caja</h5>
                                </div>
                            </a>
                        </div>
						<div class="card social-widget-card bg-c-info opacidad px-0">
                            <a href="{{ route('app.descarga') }}" class="btn" type="button" target="_blank">
                                <div class="card-body">
                                    <img class="wid-30 mb-3" src="{{ asset('images/iconos/lock.svg') }}">
                                    <h5 class="my-auto text-white">VETPASS</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Botones-->
        </div>
    </div>
    <!--Cierre: Container Completo-->

    @include('app.profesional.modales.seleccionar_lugar_atencion')

@endsection
