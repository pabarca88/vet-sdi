@extends('template.otros_profesionales.template_kine')

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
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN KINESIOLOGÍA</strong></h5>
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
                                        @if (request('token') && request('fmu') == 1)
                                            <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                        @else
                                            @php
                                                $url_temp = 'Profesional/Paciente/Ficha_consulta?_token='.request('_token').'&id_hora_realizar='.request('id_hora_realizar').'&lugar_atencion_id='.request('lugar_atencion_id').'';
                                            @endphp
                                            <a class="nav-link text-reset" id="fmu-tab" href="{{ ROUTE('check_sdi', ['id_recept' => $paciente->id_usuario,'urla'=> $url_temp.'&fmu=0','urln' => $url_temp.'&fmu=1', 'id_tipo' => 2]) }}">FMU</a>
                                        @endif
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="Paciente hospitalizado" aria-selected="false">Hospitalización</a>
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
                            @include('atencion_otros_prof.secciones_especialidad.ficha_kine')
                        </div>
                        <!--Licencia-->
                        <!--Ficha Médica Única-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                            @include('general.secciones_ficha.fmu')
                        </div>
                        <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                            @include('general.secciones_ficha.atenciones_previas_form')
                        <!--Hospitalización-->
                        <div class="tab-pane fade show" id="hospitalizacion" role="tabpanel" aria-labelledby="hospitalizacion-tab">
                             @include('general.hospitalizacion.hospitalizacion')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- SIDE BAR KINE -->
        @include("atencion_otros_prof.modales"){{-- base de botones de sidebar --}}
        @include("atencion_otros_prof.include.sidebar_derecho_kine"){{-- modales y data de sidebar especialidad --}}





    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.informe_kine")

    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.interconsulta_kine")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.e_fuerza_superior")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.e_fuerza_inferior")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.e_func_global")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.e_tono")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.metria")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.pares_craneanos")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.postura")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.reflejos")
    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.sensibilidad")




@endsection
