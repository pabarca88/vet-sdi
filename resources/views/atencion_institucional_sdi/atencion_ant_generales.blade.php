@extends('template.medicina_sdi.template')
@section('Content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--HEADER-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-12">
                            <div class="page-header-title pt-2">
                                <h5 class="text-white d-inline f-18 mt-1"><strong>Llenado antecedentes del paciente:&emsp; {{$paciente->nombres}} {{$paciente->apellido_uno}} {{$paciente->apellido_dos}}&emsp; Edad: {{$paciente->edad}}</strong></h5>
                                <h5 class="font-italic d-inline mt-0 mb-0 text-white f-16 float-right">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--CIERRE: HEADER-->

                        <!-- TAB ATENCIÓN -->
                        <!--<div class="user-profile user-card pt-0">
                            <div class="card-body py-0">
                                <div class="user-about-block m-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">COMPLETAR ANTECEDENTES DEL PACIENTE</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
            <!-- CIERRE TAB GENERAL-->

            <!--CONTENIDO DE TAB-->
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="at-oftalmo">
                        <!--Atender paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            @include('atencion_institucional_sdi.secciones_especialidad.ficha_medicina_general')
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

