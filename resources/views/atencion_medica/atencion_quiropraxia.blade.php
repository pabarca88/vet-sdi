@extends('template.medicina.template_quiro')
@section('Content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
                <!--HEADER-->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center pb-2">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN QUIROPRAXIA</strong></h5>
                                    <p class="font-weight-bold mt-0 mb-0 text-white float-md-right">
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
                                                {{--  <li class="nav-item" id="nav-licencia">
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
                                                </li>  --}}
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                                </li>
                                                <!-- <li class="nav-item">
                                                    <a class="nav-link text-reset" id="band_exam-tab" data-toggle="tab" href="#band_exam" role="tab" aria-controls="band_exam" aria-selected="false">Exámenes</a>
                                                </li> -->
                                                {{--  <li class="nav-item">
                                                    <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="hospitalizacion" aria-selected="false">Hospitalización</a>
                                                </li>  --}}
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
                            @include('atencion_medica.secciones_especialidad.ficha_quiropraxia')
                        </div>
                        <!--Licencia-->

                        <!--Ficha Médica Única-->

                       <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                            @include('general.secciones_ficha.atenciones_previas_form')
                        </div>

                        <!--Hospitalización-->

                    </div>
                </div>
            </div>
            <!--CIERRE CONTENIDO DE TAB-->

       
            @include("atencion_medica.include.sidebar_derecho_medicina_general")
            @include("general.modal.modal_no_disponible")
            @include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_clasif_colon')
	        @include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_biopsia_cirugia')
            @include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_sol_gastro_endosc')
            {{--  @include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_sol_gastro_func')  --}}
            @include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_sol_gastro_rx')
            @include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_sol_examenes_com')
            @include('general.hospitalizacion.modals.in_solic_pabellon')
	        @include("general.modal.modal_no_disponible")



        </div>
    </div>
	@include('app.profesional.modales.boton_flotante_agenda_autorizacion')
@endsection

