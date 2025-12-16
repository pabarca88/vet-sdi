@extends('template.otros_profesionales.template_enfermeria')
@section('Content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN BÁSICA</strong></h5>
                                <p class="font-italic mt-0 mb-0 text-white">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </p>

                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de controles Domiciliarios</a>
                                    </li>
									<li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion_op-tab" data-toggle="tab" href="#hospitalizacion_op" role="tab" aria-controls="hospitalizacion_op" aria-selected="false">Paciente Hospitalizado</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="at-oftalmo">
                        <!--Atender paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            @include('atencion_otros_prof.secciones_especialidad.ficha_basica')
                        </div>
                        <!--Ficha Médica Única-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                             @include('general.secciones_ficha.fmu')
                        </div>
                        <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                           @include('general.secciones_ficha.atenciones_previas_form')
                        </div>
						 <div class="tab-pane fade show" id="hospitalizacion_op" role="tabpanel" aria-labelledby="hospitalizacion_op-tab">
                            @include('general.hospitalizacion.hospitalizacion_op')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Botón flotante-->
        <!-- SIDE BAR enfermeria -->
        @include("atencion_otros_prof.modales"){{-- base de botones de sidebar --}}
        @include("atencion_otros_prof.include.sidebar_derecho_enfermeria")
    </div>
    <!--Cierre: Container Completo-->
@endsection
