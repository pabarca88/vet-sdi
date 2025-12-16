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
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-18 mt-1"><strong>ATENCIÓN ENFERMERA DE URGENCIAS</strong></h5>

                                 <p class="mt-0 mb-0 text-white d-inline font-weight-bold float-right f-18">
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
            <!--Cierre: Header-->
            <div class="row fondo-gris user-profile user-card pt-0">
                {{--  fmu  --}}
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    @include('app.adm_hospital.servicios.profesionales.fmu')
                </div>

                {{--  ficha  --}}
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <!-- TAB ATENCIÓN -->
                    <div class="row">
                        <div class="col-md-12 px-2">
                            <div class="card" style="background-color:#fff!important ;">
                                <ul class="nav nav-tabs profile-tabs nav-fill pt-0 mt-0" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="band_exam-tab" data-toggle="tab" href="#band_exam" role="tab" aria-controls="band_exam" aria-selected="false">Exámenes</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="hospitalizacion" aria-selected="false">Hospitalización</a>
                                    </li> --}}
                                </ul>

                            </div>
                        </div>
                    </div>

                    <!-- tab general-->
                    <!--Contenido de tab-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content" id="at-oftalmo">
                                <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                                    {{-- @include('page.general.secciones_ficha.atenciones_previas_form') --}}
                                </div>
                                <!--Exámenes-->
                                <div class="tab-pane fade show" id="band_exam" role="tabpanel" aria-labelledby="band_exam_tab">
                                    {{-- @include('page.general.secciones_ficha.bandeja_examenes') --}}
                                </div>
                                <!--Hospitalización-->
                                {{-- <div class="tab-pane fade show" id="hospitalizacion" role="tabpanel" aria-labelledby="hospitalizacion-tab">
                                    @include('page.general.hospitalizacion.hospitalizacion')
                                </div> --}}
                                <!--Atender paciente-->
                                <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                                    @include('app.adm_hospital.servicios.profesionales.atender_paciente_enfermeria')

                                </div>
                                <!--Licencia-->
                                <div class="tab-pane fade show" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                                    {{--  @include('general.secciones_ficha.licencia')  --}}
                                </div>
                                {{--  <!--Ficha Médica Única-->
                                <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                                    @include('general.secciones_ficha.fmu')
                                </div>  --}}
                                <!--Atenciones previas-->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SIDE BAR ORL -->
            {{-- @include("app.adm_hospital.include.sidebar_servicio_enf") --}}
        </div>



        <!--Modals de especialidad -->
        {{--  @include("../modals_generales/autorizacion_acompa.php");  --}}

        <!--Modals formularios generales-->
        {{--  @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_examenes")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_medicamentos")--}}


    </div>
    <!--Cierre: Container Completo-->
    {{--  @include("general.modal.modal_no_disponible")
	@include("atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_biopsia_cirugia")
    @include("atencion_medica.include.sidebar_derecho_cirugia_general")  --}}

	<script>
	function  envio_indicaciones_pdf(id_modal){
                console.log(id_modal);
                let url = "{{ route('indicacion.medica.registro.envio') }}";
                var id_tipo_documento = 1;
                var id_paciente = $('#id_paciente_fc').val();
                var id_profesional = $('#id_profesional_fc').val();
                var id_ficha_atencion = $('#id_fc').val();
                var id_lugar_atencion = $('#id_lugar_atencion').val();
                var observacion = '';
                // var observacion = $('#observacion').val();
                var documento = '';
                var url_documento = '';
                var cuerpo = '';
                var otro = '';
                var token = CSRF_TOKEN;

                if(id_tipo_documento == 1)
                {
                    documento = $('#'+id_modal+' embed').attr('data-documento');
                    url_documento = $('#'+id_modal+' embed').attr('data-url');
                }
                else
                {
                    // cuerpo = $('#cuerpo').val();
                }

                console.log('documento: '+documento+' url_documento: '+url_documento);
                var datos = {};
                datos._token = token;
                datos.id_tipo_documento = id_tipo_documento;
                datos.id_paciente = id_paciente;
                datos.id_profesional = id_profesional;
                datos.id_ficha_atencion = id_ficha_atencion;
                datos.id_lugar_atencion = id_lugar_atencion;
                datos.observacion = observacion;
                datos.documento = documento;
                datos.url = url_documento;
                datos.cuerpo = cuerpo;
                datos.otro = otro;

                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: "json",
                    data: datos,
                    success: function(data) {
                        console.log(data);
                        if(data.estado == 1)
                        {
                            var mensaje = '';
                            mensaje = 'Documento asignado al Paciente para visualizar en su escritorio.\n';
                            if(data.update_correo.estado == 1)
                                mensaje = 'Documento enviado por correo al Paciente.\n';
                            else
                                mensaje = 'Problema al enviar Documento por correo al Paciente.\n';

                            swal({
                                title: "Indicación Enviada al Paciente",
                                text: mensaje,
                                icon: "success",
                            });
                        }
                        else
                        {
                            var texto_error = '';

                            if(data.estado ==  0)
                            {
                                if('error' in data)
                                {
                                    $.each(data.error, function (indexInArray, valueOfElement) {
                                        texto_error += indexInArray+': '+valueOfElement+'\n';
                                    });
                                }
                            }
                            swal({
                                title: "Indicación Enviada al Paciente",
                                text: data.msj+'\n'+texto_error,
                                icon: "warning",
                            });
                        }
                    }
                });
            }
	</script>

@endsection

