@extends('template.otros_profesionales.template_nutricion')

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
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN NUTRICIONISTA</strong></h5>
                                
                                {{--  <p class="font-italic mt-0 mb-0 text-white">
                                    <span class="f-16 f-w-600">{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}</span>, RUT: <span class="f-16 f-w-600">{{ $paciente->rut}}</span> , Edad <span class="f-16 f-w-600">{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}</span>
                                    <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->id }}">
                                </p>  --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mt-0 mb-0 text-white float-md-right">
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

                                    {{--  <li class="nav-item" id="nav-fmu">
                                        @if(!empty(session('fmu_token')) && session('fmu_estado') == 1)
                                            <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                        @else
                                            <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>
                                        @endif
                                    </li>  --}}
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de atenciones</a>
                                    </li>
                                    {{--  <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="Paciente hospitalizado" aria-selected="false">Hospitalización</a>
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
                    <div class="tab-content" id="at-oftalmo">
                        <!--Atender paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            @include('atencion_otros_prof.secciones_especialidad.ficha_nutri')
                        </div>
                        <!--Licencia-->
                        <!--Ficha Médica Única-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                            @include('general.secciones_ficha.fmu')
                        </div>
                        <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                            @include('general.secciones_ficha.atenciones_previas_form')
                        </div>
                        <!--Exámenes-->{{--
                        <div class="tab-pane fade show" id="examenes" role="tabpanel" aria-labelledby="examenes-tab">
                            @include('atencion_medica.secciones_ficha.examenes')
                        </div>--}}
                        <!--Hospitalización-->
                        <div class="tab-pane fade show" id="hospitalizacion" role="tabpanel" aria-labelledby="hospitalizacion-tab">
                             @include('general.hospitalizacion.hospitalizacion')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDE BAR ORL -->
        @include("atencion_otros_prof.modales"){{-- base de botones de sidebar --}}
        @include("atencion_otros_prof.include.sidebar_derecho_nutricion"){{-- modales y data de sidebar especialidad --}}


        <!--Modals de especialidad -->
        {{--  @include("../modals_generales/autorizacion_acompa.php");  --}}

        <!--Modals formularios generales-->
        {{--  @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_examenes")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_medicamentos")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.m_interconsulta")  --}}


    </div>
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.nutricion.informe_nutri")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.nutricion.modal_dieta_diaria")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.nutricion.modal_dieta")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.nutricion.modal_encuesta_aliment")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.nutricion.modal_indicadores_nutri")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.nutricion.planificacion_nutri")






@endsection
