@extends('template.pediatria.template_pediatria')

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
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN PEDIÁTRICA GENERAL</strong></h5>
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
                            {{--  <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
                            </div>  --}}
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
                                        <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false">Licencia Pediátrica</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li> {{--
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="examenes-tab" data-toggle="tab" href="#examenes" role="tab" aria-controls="examenes" aria-selected="false">Exámenes</a>
                                    </li>--}}
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="hospitalizacion" aria-selected="false">Hospitalización</a>
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
                            @include('atencion_pediatrica.secciones_especialidad.ficha_pediatria_general')
                        </div>
                        <!--Licencia-->
                        <div class="tab-pane fade show" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                            @include('atencion_pediatrica.secciones_ficha.licencia')
                        </div>
                        <!--Ficha Médica Única-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                            @include('atencion_pediatrica.secciones_ficha.fmu')
                        </div>
                        <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                            {{--  @include('atencion_medica.secciones_ficha.atenciones_previas')  --}}
                            @include('atencion_pediatrica.formularios.atenciones_previas_form')
                        </div>
                        <!--Exámenes-->{{--
                        <div class="tab-pane fade show" id="examenes" role="tabpanel" aria-labelledby="examenes-tab">
                            @include('atencion_medica.secciones_ficha.examenes')
                        </div>--}}
                        <!--Hospitalización-->
                        <div class="tab-pane fade show" id="hospitalizacion" role="tabpanel" aria-labelledby="hospitalizacion-tab">
                            @include('atencion_pediatrica.secciones_ficha.hospitalizacion')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDE BAR ORL -->
        @include("atencion_pediatrica.modales"){{-- base de botones de sidebar --}}
        @include("atencion_pediatrica.include.sidebar_derecho_pediatria"){{-- modales y data de sidebar especialidad --}}


        <!--Modals de especialidad -->
        {{--  @include("../modals_generales/autorizacion_acompa.php");  --}}

        <!--Modals formularios generales-->
        {{--  @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_examenes")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_medicamentos")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.m_interconsulta")  --}}


    </div>
    @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.calculo_imc")
    @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.modal_tunner_m")
    @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.modal_tunner_f")
    @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.modal_antec_neonat")
    @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.carne_vacuna")
    @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.carne_otras_vacunas")
    @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.indicar_vacunas")
    @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.otras_vacunas")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.modal_prev_accidentes")

@endsection
