
     <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/ficha_medica_unica.css?t=<?=time()?>">
    {{--  <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">  --}}
    {{--  <link rel="stylesheet" href="{{ asset('css/plugins//plugins/responsive.bootstrap4.min.css') }}">  --}}


    {{--  <!--formulario sm-->  --}}
    {{--  <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">  --}}
    {{--  <!-- Estilo cards -->  --}}
    {{--  <link rel="stylesheet" href="{{ asset('css/card-style.css') }}">  --}}

    <!-- Estilo cards -->
    <link rel="stylesheet" href="{{ asset('css/iconos-sdi.css') }}">




<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row mx-3 mt-2">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12  mt-4">
                    <h4 class="text-c-blue float-left d-inline">Ficha Médica Única</h4>
                    <button type="button" class="btn btn-xs btn-danger d-inline float-right ml-2 mb-2"><i class="feather icon-x"></i> Cerrar</button>
                    <button type="button" class="btn btn-xs btn-primary d-inline float-right ml-2 mb-2"><i class="feather icon-printer"></i> Imprimir</button>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                    <div class="card shadow">
                        <div class="card-body pb-0 pt-2">
                            <div class="row align-middle">
                                <div class="col-sm-12 col-md-2">
                                    <img class="img-fluid wid-70 rounded-circle" src="{{ asset('images/iconos/paciente-f.svg') }}">
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <p><i class="feather icon-user"></i><strong> Paciente</strong> <br>Daniela Edith Sepúlveda Bravo <br>(18.382.693-k)
                                        </p>
                                </div>
                                <div class="col-sm-6  col-md-2">
                                    <p><i class="feather icon-calendar"></i><strong> Edad</strong> <br>29 años <br> (00/00/0000)</p>
                                </div>
                                <div class="col-sm-6  col-md-2">
                                    <p><i class="feather icon-user"></i><strong> Sexo</strong> <br>Femenino</p>
                                </div>
                                <div class="col-sm-6  col-md-3">
                                    <p><i class="feather icon-home"></i><strong> Dirección</strong> <br>Jorge Llanos, 153. Los Andes. Región de Valparaíso</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--INFORMACIÓN PACIENTE-->
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6 class="text-c-blue">Información del paciente</h6>
                            <hr>
                            <ul>
                                <li><i class="feather icon-droplet"></i><strong> Grupo sanguíneo</strong></li>
                                <li class="text-danger">B rH+</li>
                            </ul>
                            <ul>
                                <li><i class="feather icon-heart "></i> <strong>Paciente crónico</strong></li>
                                <li>Diabetes</li>
                                <li>Hipertensión</li>
                                <li>Cáncer de colon</li>
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Alergias medicamentos</strong></li>
                                <li>Diabetes</li>
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Alergias generales</strong></li>
                                <li>Diabetes</li>
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Cirugías</strong></li>
                                <li>Diabetes</li>
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Medicamentos de uso crónico</strong></li>
                                <li>Diabetes</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--LADO DERECHO-->
                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="cirugias_fmu();">Cirugías</button>
                            <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="alergias_fmu();">Alergias</button>
                            <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="responsables_fmu();"><i class="feather icon-users"></i> Responsables</button>
                            <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="confidencial_fmu();"><i class="feather icon-lock"></i> Confidencial</button>
                            <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="trat_act_fmu();"><i class="feather icon-file-plus"></i> Tratamientos activos</button>
                            <button type="button" class="btn btn-xs btn-danger mb-1" onclick="c_sos_fmu();"><i class="feather icon-phone"></i> Contacto de emergencia</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pb-3">
                            <div class="card border-card-primary h-100 shadow">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Tratamientos en curso</strong></li>
                                        <li>No hay registros</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pb-3">
                            <div class="card border-card-primary  h-100 shadow">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Cirugías recientes</strong></li>
                                        <li>No hay registros</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pb-3">
                            <div class="card border-card-primary h-100">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Medicamentos recientes</strong></li>
                                        <li>No hay registros</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pb-3">
                            <div class="card border-card-primary shadow h-100">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Prótesis y ortesis</strong></li>
                                        <li>No hay registros</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                            <h5 class="text-c-blue">Historia médica</h5>
                        </div>
                        <!--HISTORIAL-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="enf-cron">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#enf-cron-c" aria-expanded="false" aria-controls="enf-cron-c">
                                      Control de enfermedades crónicas
                                    </button>
                                </div>
                                <div id="enf-cron-c" class="collapse" aria-labelledby="enf-cron" data-parent="#mot-consulta">
                                    <div class="card-body-aten-a shadow-none">
                                        <form>
                                            <div class="form-row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--HISTORIAL-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="mot-consulta">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#odonto-c" aria-expanded="false" aria-controls="odonto-c">
                                      Historial odontológico
                                    </button>
                                </div>
                                <div id="odonto-c" class="collapse" aria-labelledby="odonto" data-parent="#mot-consulta">
                                    <div class="card-body-aten-a shadow-none">
                                        <form>
                                            <div class="form-row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--HISTORIAL-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="nino-sano">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#nino-sano-c" aria-expanded="false" aria-controls="nino-sano-c">
                                      Historial de niño sano
                                    </button>
                                </div>
                                <div id="nino-sano-c" class="collapse" aria-labelledby="mot-consulta" data-parent="#nino-sano">
                                    <div class="card-body-aten-a shadow-none">
                                        <form>
                                            <div class="form-row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--HISTORIAL-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="etc">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#etc-c" aria-expanded="false" aria-controls="etc-c">
                                      Historial etc ...
                                    </button>
                                </div>
                                <div id="etc-c" class="collapse" aria-labelledby="etc" data-parent="#mot-consulta">
                                    <div class="card-body-aten shadow-none">
                                        <form>
                                            <div class="form-row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    

	<!----MODALS-->







    @include('template.include.nocomplatible')

    @include("atencion_pediatrica.secciones_ficha.modales_fmu.responsables")
    @include("atencion_pediatrica.secciones_ficha.modales_fmu.cirugias")
    @include("atencion_pediatrica.secciones_ficha.modales_fmu.alergias")
    @include("atencion_pediatrica.secciones_ficha.modales_fmu.confidencial")
    @include("atencion_pediatrica.secciones_ficha.modales_fmu.trat_act")
    @include("atencion_pediatrica.secciones_ficha.modales_fmu.c_sos")


    {{--  <script src="{{ asset('js/vendor-all.min.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/ripple.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/pcoded.min.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/documentos.js') }}?upd={{ random_int(1111,9999) }}"></script>  --}}




	<!-- datatable Js -->
    {{--  <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>
    <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>  --}}





	<!-- Tablas ficha médica única-->
    <script src="{{ asset('js/tablas_patologias_cronicas_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_tratamientos_antecedentes_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_odontologia_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_obstetricos_control_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_informacion_confidencial_fmu.js') }}"></script>






	<!--Modals-->
	<script type="text/javascript">
		function responsables_fmu() {
	        $('#responsables').modal('show');
	    	}

	   	function c_sos_fmu() {
	        $('#c_sos').modal('show');
	    }

	    function cirugias_fmu() {
	        $('#cirugias').modal('show');
	    }

	    function alergias_fmu() {
	        $('#alergias').modal('show');
	    }

	    function confidencial_fmu() {
	        $('#confidencial').modal('show');
	    }

	    function trat_act_fmu() {
	        $('#trat_act').modal('show');
	    }



	</script>

