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
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="cirugias_fmu();">Cirugías</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="alergias_fmu();">Alergias</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="responsables_fmu();"><i class="feather icon-users"></i> Responsables</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="confidencial_fmu();"><i class="feather icon-lock"></i> Confidencial</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="trat_act_fmu();"><i class="feather icon-file-plus"></i> Tratamientos activos</button>
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

    @include("general.secciones_ficha.modales_fmu.responsables_fmu")
    @include("general.secciones_ficha.modales_fmu.cirugias_fmu")
    @include("general.secciones_ficha.modales_fmu.alergias_fmu")
    @include("general.secciones_ficha.modales_fmu.confidencial_fmu")
    @include("general.secciones_ficha.modales_fmu.trat_act_fmu")
    @include("general.secciones_ficha.modales_fmu.c_sos_fmu")



	<!-- Tablas ficha médica única-->
    <script src="{{ asset('js/tablas_patologias_cronicas_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_tratamientos_antecedentes_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_odontologia_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_obstetricos_control_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_informacion_confidencial_fmu.js') }}"></script>
    <script src="{{ asset('/js/ficha_medica/main.js') }}"></script>





	<!--Modals-->
	<script>
        function formatDate(date)
        {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('-');
        }

	</script>

