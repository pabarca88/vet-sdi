@extends('template.hospitales.template')

{{--  @section('menu')
    @include('page.administrativo.include.menu')
@endsection  --}}
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container pcoded-main-container-urgencia" style="">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN MÉDICA {{ $servicio->nombre }}</strong></h5>
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
                            <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1" onclick="finalizar_atencion('{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}')">Finalizar atención</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                {{--  fmu  --}}
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    @include('app.adm_hospital.servicios.profesionales.fmu')
                </div>

                {{--  ficha  --}}
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <!-- TAB ATENCIÓN -->
                    <div class="row">
                        <div class="col-md-12 px-2">
                            <div class="card-header rounded" style="background-color:#fff!important ;">
                                <ul class="nav nav-tabs profile-tabs nav-fill pt-2 " id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Evolucionar paciente</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset " id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false">Licencia</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="band_exam-tab" data-toggle="tab" href="#band_exam" role="tab" aria-controls="band_exam" aria-selected="false">Exámenes</a>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>

                    <!-- tab general-->
                    <!--Contenido de tab-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content" id="at-oftalmo">
                                <!--Licencia-->
                                <div class="tab-pane fade show " id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                                    {{-- @include('page.general.secciones_ficha.licencia') --}}
                                </div>
                                <!--Atenciones previas-->
                                <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                                    {{-- @include('page.general.secciones_ficha.atenciones_previas_form') --}}
                                </div>
                                 <!--Exámenes-->
                                 <div class="tab-pane fade show" id="band_exam" role="tabpanel" aria-labelledby="band_exam_tab">
                                    {{-- @include('page.general.secciones_ficha.bandeja_examenes') --}}
                                </div>
                                <!--Hospitalización-->

                                <!--Atender paciente-->
                                <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                                    @include('app.adm_hospital.servicios.profesionales.atender_paciente_profesional')
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include("app.adm_hospital.include.sidebar_servicio_prof"){{-- modales y data de sidebar especialidad --}}
            @include("app.dental.modals.odontograma.modal_odontograma")
        </div>

@endsection


