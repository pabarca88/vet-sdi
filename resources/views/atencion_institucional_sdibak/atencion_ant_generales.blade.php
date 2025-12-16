@extends('template.medicina_sdi.template')
@section('Content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--HEADER-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN GENERAL SDI</strong></h5>
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
                    </div>
                </div>
            </div>
            <!--CIERRE: HEADER-->

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
												{{--
                                                <li class="nav-item" id="nav-licencia">
                                                    @if(!empty(session('lic_token')) && session('lic_estado') == 1)
                                                        <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false" onclick="cargar_licencias();">Licencia</a>
                                                    @else
                                                        <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>
                                                    @endif
                                                </li>
                                                <li class="nav-item" id="nav-fmu">
                                                    @if(!empty(session('fmu_token')) && session('fmu_estado') == 1)
                                                        <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                                    @else
                                                        <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>
                                                    @endif
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="band_exam-tab" data-toggle="tab" href="#band_exam" role="tab" aria-controls="band_exam" aria-selected="false">Exámenes</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="hospitalizacion" aria-selected="false">Hospitalización</a>
                                                </li>
												--}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <!-- CIERRE TAB GENERAL-->

            <!--CONTENIDO DE TAB-->
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="at-oftalmo">
                        <!--Atender paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            @include('atencion_institucional_sdi.secciones_especialidad.ficha_medicina_general')
                        </div>
                        <!--Licencia-->
						<div class="tab-pane fade show" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
							{{-- @include('general.secciones_ficha.licencia') --}}
                        </div>
                        <!--Ficha Médica Única-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                            {{-- @include('general.secciones_ficha.fmu') --}}
                        </div>
                       <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
						{{-- @include('general.secciones_ficha.atenciones_previas_form') --}}
                        </div>
                        <!--Exámenes-->
                        <div class="tab-pane fade show" id="band_exam" role="tabpanel" aria-labelledby="band_exam_tab">
						{{-- @include('general.secciones_ficha.bandeja_examenes') --}}
                        </div>
                        <!--Hospitalización-->
                        <div class="tab-pane fade show" id="hospitalizacion" role="tabpanel" aria-labelledby="hospitalizacion-tab">
                            {{-- @include('general.hospitalizacion.hospitalizacion')--}}
                        </div>
                    </div>
                </div>
            </div>
            <!--CIERRE CONTENIDO DE TAB-->

            <!-- SIDE BAR  -->
			{{-- base de botones de sidebar --}}
            {{-- @include("atencion_medica.modales")--}}
            {{-- @include("atencion_medica.include.sidebar_derecho_medicina_general") --}}
            @include("general.modal.modal_no_disponible")

        </div>
    </div>
	{{--@include('app.profesional.modales.boton_flotante_agenda_autorizacion')--}}
@endsection

