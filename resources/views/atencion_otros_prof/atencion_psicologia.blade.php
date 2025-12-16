@extends('template.otros_profesionales.template_psicologia')

@section('Content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-2">
                            <div class="page-header-title mt-2">
                                <h5 class="text-white d-inline f-16 mt-2"><strong>ATENCIÓN PSICOLOGIA ADULTO</strong></h5>
                                <p class="f-16 mt-0 mb-0 text-white float-md-right d-inline mr-3">
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
                            {{--  <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0 mt-1">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
                                    </li>

                                    {{--  <li class="nav-item" id="nav-fmu">
                                        @if(!empty(session('fmu_token')) && session('fmu_estado') == 1)
                                            <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                        @else
                                            <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>
                                        @endif
                                    </li>  --}}
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    {{--  <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion_op-tab" data-toggle="tab" href="#hospitalizacion_op" role="tab" aria-controls="hospitalizacion_op" aria-selected="false">Hospitalización</a>
                                    </li>  --}}
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
                    <div class="tab-content" id="at-sico_ad">
                        <!--Atender paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            @include('atencion_otros_prof.secciones_especialidad.ficha_psico_adulto')
                        </div>
                        <!--Ficha Médica Única-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
							@include('general.secciones_ficha.fmu')
                        </div>
                        <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                            {{--  @include('atencion_medica.secciones_ficha.atenciones_previas')  --}}
                            @include('general.secciones_ficha.atenciones_previas_form')
                        </div>
                        <!--Hospitalización-->
                        <div class="tab-pane fade show" id="hospitalizacion_op" role="tabpanel" aria-labelledby="hospitalizacion_op-tab">
                            @include('general.hospitalizacion.hospitalizacion_op')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDE BAR sico-->
        {{-- @include("atencion_otros_prof.modales")base de botones de sidebar --}}
        @include("atencion_otros_prof.include.sidebar_derecho_psicologia"){{-- modales y data de sidebar especialidad --}}
        @include("general.modal.modal_no_disponible")


    </div>


    @include('app.profesional.modales.boton_flotante_agenda_autorizacion')
@endsection
