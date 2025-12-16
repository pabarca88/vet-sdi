@extends('template.template_cirugia_general_urgencia')
@section('Content')

    <!--Container Completo-->
    <div class="pcoded-main-container pcoded-main-container-urgencia" style="">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN FICHA ATENCIÓN GENERAL URGENCIAS</strong></h5>
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
            <div class="row">
                {{--  fmu  --}}
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    @include('general.secciones_ficha.fmu_urgencia')
                </div>

                {{--  ficha  --}}
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <!-- TAB ATENCIÓN -->
                    <div class="row">
                        <div class="col-md-12 px-2">
                            <div class="card-header rounded" style="background-color:#fff!important ;">
                                <ul class="nav nav-tabs profile-tabs nav-fill pt-2 " id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false">Licencia</a>
                                    </li>
                                    {{--  <li class="nav-item">
                                        <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                    </li>  --}}
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="band_exam-tab" data-toggle="tab" href="#band_exam" role="tab" aria-controls="band_exam" aria-selected="false">Exámenes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="hospitalizacion" aria-selected="false">Hospitalización</a>
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
                                <!--Atender paciente-->
                                <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                                    @include('atencion_urgencia.secciones_especialidad.ficha_urgencia')
                                </div>
                                <!--Licencia-->
                                <div class="tab-pane fade show" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                                    @include('general.secciones_ficha.licencia')
                                </div>
                                {{--  <!--Ficha Médica Única-->
                                <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                                    @include('general.secciones_ficha.fmu')
                                </div>  --}}
                                <!--Atenciones previas-->
                                <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                                    @include('general.secciones_ficha.atenciones_previas_form')
                                </div>
                                 <!--Exámenes-->
                                <div class="tab-pane fade show" id="band_exam" role="tabpanel" aria-labelledby="band_exam_tab">
                                    @include('general.secciones_ficha.bandeja_examenes')
                                </div>
                                <!--Hospitalización-->
                                <div class="tab-pane fade show" id="hospitalizacion" role="tabpanel" aria-labelledby="hospitalizacion-tab">
                                    @include('general.hospitalizacion.hospitalizacion')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- SIDE BAR ORL -->
        @include("atencion_medica.modales"){{-- base de botones de sidebar --}}

        <!--Modals de especialidad -->
        {{--  @include("../modals_generales/autorizacion_acompa.php");  --}}

        <!--Modals formularios generales-->
        {{--  @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_examenes")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_medicamentos")--}}


    </div>
    <!--Cierre: Container Completo-->
    @include("general.modal.modal_no_disponible")
	@include("atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_biopsia_cirugia")
    @include("atencion_medica.include.sidebar_derecho_cirugia_general")
@endsection

