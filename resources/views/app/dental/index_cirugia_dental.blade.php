@extends('template.dental.template')

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline ml-2 f-16 mt-1"><strong>Registro de atención en pabellón
                                        dental</strong></h5>
                                <!--Fecha del día-->
                                <button type="button"
                                    class="btn btn-outline-light btn-sm d-inline float-right mr-4 mb-1">Finalizar
                                    atención</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- tab general -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab"
                                            href="#atender" role="tab" aria-controls="atender"
                                            aria-selected="true">Solicitar pabellón</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia"
                                            role="tab" aria-controls="licencia" aria-selected="false">Ingreso paciente</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="protocolo-tab" data-toggle="tab"
                                            href="#protocolo" role="tab" aria-controls="protocolo"
                                            aria-selected="false">Protocolo operatorio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="recuperacion-tab" data-toggle="tab"
                                            href="#recuperacion" role="tab" aria-controls="recuperacion"
                                            aria-selected="false">Recuperación</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="sala-tab" data-toggle="tab" href="#sala"
                                            role="tab" aria-controls="sala" aria-selected="false">Sala</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="alta-tab" data-toggle="tab" href="#alta"
                                            role="tab" aria-controls="alta" aria-selected="false">Epicrisis y carnet de
                                            alta</a>
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
                    <div class="tab-content" id="at-dental-infantil">
                        <!--Solicitud de pabellón-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">

                            @include(
                                'app.dental.cirugia.secciones.solicitud_pabellon'
                            )
                        </div>

                        <!--Ingreso de paciente-->
                        <div class="tab-pane fade" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                            @include(
                                'app.dental.cirugia.secciones.ingreso_paciente'
                            )

                        </div>

                        <!--Protocolo de cirugia-->
                        <div class="tab-pane fade" id="protocolo" role="tabpanel" aria-labelledby="protocolo-tab">
                            @include(
                                'app.dental.cirugia.secciones.protocolo_cirugia'
                            )

                        </div>

                        <!--Recuperación-->
                        <div class="tab-pane fade" id="recuperacion" role="tabpanel" aria-labelledby="recuperacion-tab">

                            @include(
                                'app.dental.cirugia.secciones.recuperacion'
                            )

                        </div>

                        <!--Sala-->
                        <div class="tab-pane fade" id="sala" role="tabpanel" aria-labelledby="sala-tab">
                            @include('app.dental.cirugia.secciones.sala')

                        </div>

                        <!--Epicrisis y carnet de alta-->
                        <div class="tab-pane fade" id="alta" role="tabpanel" aria-labelledby="alta-tab">
                            @include(
                                'app.dental.cirugia.secciones.epicrisis_carnet'
                            )

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
    <!--////// SIDEBARS //////-->
    <!--Sidebar 1 (antecedentes del paciente)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="antecedentes_paciente" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg"
        data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                    class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Antecedentes del paciente</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordionExample">
                <div class="card-sidebar mb-0 rounded-0">
                    <div class="card-header-sidebar" id="headingOne">
                        <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            INFORMACIÓN DEL PACIENTE
                        </button>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Nombres</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Nombre_1 Nombre_2
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Apellidos</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Apellido_1 Apellido_2
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Rut</label>
                                <div class="col-7 ml-2 text-secondary">
                                    00.000.000-0
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Nacimiento</label>
                                <div class="col-7 ml-2 text-secondary">
                                    26/08/1993
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Edad</label>
                                <div class="col-7 ml-2 text-secondary">
                                    27
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Sexo</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Mujer
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Dirección</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Calle, Nº...
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Comuna / Región</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Viña del Mar, Región de Valparaíso
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Correo Electrónico</label>
                                <div class="col-7 ml-2 text-secondary">
                                    paciente@gmail.com
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Teléfono</label>
                                <div class="col-7 ml-2 text-secondary">
                                    283764892
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                CONTACTO DE EMERGENCIA
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Rut</label>
                                <div class="col-7 ml-2 text-secondary">
                                    0000000-0
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Nombre</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Luis
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Apellidos</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Sepúlveda Pino
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Dirección</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Calle Nº...
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Comuna / Región</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Viña del Mar, Región de Valparaíso
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Correo Electrónico</label>
                                <div class="col-7 ml-2 text-secondary">
                                    paciente@gmail.com
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Teléfono</label>
                                <div class="col-7 ml-2 text-secondary">
                                    283764892
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                ANTECEDENTES MÉDICOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Alergias e Intolerancias a
                                    medicamentos</label>
                                <div class="col-7 ml-2 text-secondary listas_sidebar">
                                    <ul>
                                        <li>Ketoprofeno</li>
                                        <li>Naproxeno</li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Otras Alergias e Intolerancias</label>
                                <div class="col-7 ml-2 text-secondary listas_sidebar">
                                    <ul>
                                        <li>Chocolate</li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Operaciones</label>
                                <div class="col-7 ml-2 text-secondary listas_sidebar">
                                    <ul>
                                        <li>Laparotomía exploradora</li>
                                        <li>Reparación unilateral de hernia inguinal</li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Incidentes en Cirugía</label>
                                <div class="col-7 ml-2 text-secondary listas_sidebar">
                                    <ul>
                                        <li>??</li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Grupo Sanguíneo</label>
                                <div class="col-7 ml-2 text-secondary">
                                    AB-
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Acepta Transfusión de Sangre</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Si
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Donante de Órganos</label>
                                <div class="col-7 ml-2 text-secondary">
                                    Si
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseCuatro" aria-expanded="false"
                                aria-controls="collapseThree"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                PATOLOGÍAS CRÓNICAS
                            </button>
                        </h2>
                    </div>
                    <div id="collapseCuatro" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">
                                    ¿Es paciente crónico?
                                </label>
                                <div class="col-7 ml-2 text-secondary">
                                    Si
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">
                                    Patologías Crónicas
                                </label>
                                <div class="col-7 ml-2 text-secondary listas_sidebar">
                                    <ul>
                                        <li>Asma</li>
                                        <li>Hipertensión</li>
                                        <li>Diabetes tipo 1</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseCinco" aria-expanded="false"
                                aria-controls="collapseThree">
                                ATENCIONES MÉDICAS PREVIAS<i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseCinco" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="row mr-2">
                                <div class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
                                    <p class="pt-3 pl-2 text-secondary">16 de Junio de 2016 - 13:00 hrs<br>
                                        Otorrinolaringologia<br>
                                        Dr.Jaime Kriman Astorga
                                    </p>
                                </div>
                            </div>
                            <div class="row mr-2">
                                <div class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
                                    <p class="pt-3 pl-2 text-secondary">23 de Enero de 2020 - 19:00 hrs<br>
                                        Otorrinolaringologia<br>
                                        Dr.Jaime Kriman Astorga
                                    </p>
                                </div>
                            </div>
                            <div class="row mr-2">
                                <div class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
                                    <p class="pt-3 pl-2 text-secondary">18 de Mayo de 2021 - 08:00 hrs<br>
                                        Otorrinolaringologia<br>
                                        Dr.Jaime Kriman Astorga
                                    </p>
                                </div>
                            </div>
                            <div class="row mr-2">
                                <div class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
                                    <p class="pt-3 pl-2 text-secondary">01 de Agosto de 2021 - 12:45 hrs<br>
                                        Otorrinolaringologia<br>
                                        Dr.Jaime Kriman Astorga
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Sidebar 1-->

    <!--Sidebar 2 (formularios dentales)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_dentales" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg"
        data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                    class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Dentales</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordion_formularios_dentales">
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_form_dental">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse_form_dental" aria-expanded="true"
                                aria-controls="collapse_form_dental"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                NOMENCLATURA ODONTOGRAMA
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_form_dental" class="collapse" aria-labelledby="heading_form_dental"
                        data-parent="#accordion_formularios_dentales">
                        <div class="card-body-sidebar">
                            <img src="../assets/img_dental/sano.png"> Diente Sano
                            <hr class="mt-1 mb-1">

                            <img src="../assets/img_dental/ausente.png"> Diente Ausente
                            <hr class="mt-1 mb-1">

                            <img src="../assets/img_dental/carie.png"> Caries
                            <hr class="mt-1 mb-1">

                            <img src="../assets/img_dental/composite.png"> Composite
                            <hr class="mt-1 mb-1">

                            <img src="../assets/img_dental/sellante.png"> Sellante
                            <hr class="mt-1 mb-1">

                            <img src="../assets/img_dental/mantenedor_espacio.png"> Mantenedor de Espacio
                            <hr class="mt-1 mb-1">

                            <img src="../assets/img_dental/pulpotomia.png"> Pulpotomía
                            <hr class="mt-1 mb-1">
                            <img src="../assets/img_dental/pulpectomia.png"> Pulpectomía
                            <hr class="mt-1 mb-1">

                            <img src="../assets/img_dental/corona.png"> Corona
                            <hr class="mt-1 mb-1">

                            <img src="../assets/img_dental/surco.png"> Surco
                            <hr class="mt-1 mb-1">

                            <img src="../assets/img_dental/obturacion.png"> Obturación
                            <hr class="mt-1 mb-1">
                            <img src="../assets/img_dental/fractura.png"> Fractura
                            <hr class="mt-1 mb-1">
                        </div>
                    </div>

                    <div class="card-sidebar">
                        <div class="card-header-sidebar" id="heading_consentimientos_informados1">
                            <h2 class="mb-0">
                                <button class="btn btn-light btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapse_consentimientos_informados1"
                                    aria-expanded="false" aria-controls="collapse_consentimientos_informados1"><i
                                        class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    ORDENES DE EXÁMENES DENTALES
                                </button>
                            </h2>
                        </div>
                        <div id="collapse_consentimientos_informados1" class="collapse"
                            aria-labelledby="heading_consentimientos_informados1"
                            data-parent="#accordion_formularios_atencion">
                            <div class="card-body-sidebar">
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_examenradiologico">Orden
                                    Radiología</button>
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_examenbiopsia">Biopsia</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-sidebar">
                        <div class="card-header-sidebar" id="heading_consentimientos_informados2">
                            <h2 class="mb-0">
                                <button class="btn btn-light btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapse_consentimientos_informados2"
                                    aria-expanded="false" aria-controls="collapse_consentimientos_informados2"><i
                                        class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    LABORATORIO DENTAL
                                </button>
                            </h2>
                        </div>
                        <div id="collapse_consentimientos_informados2" class="collapse"
                            aria-labelledby="heading_consentimientos_informados2"
                            data-parent="#accordion_formularios_atencion">
                            <div class="card-body-sidebar">
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_orden_trabajo">ORDEN DE TRABAJO
                                    MENOR</button>
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_orden_trabajoM">ORDEN DE TRABAJO
                                    MAYOR</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-sidebar">
                        <div class="card-header-sidebar" id="heading_materiales">
                            <h2 class="mb-0">
                                <button class="btn btn-light btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapse_materiales" aria-expanded="false"
                                    aria-controls="collapse_materiales"><i
                                        class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    PEDIDOS MATERIAL DE TRABAJO
                                </button>
                            </h2>
                        </div>
                        <div id="collapse_materiales" class="collapse" aria-labelledby="heading_materiales"
                            data-parent="#accordion_formularios_atencion">
                            <div class="card-body-sidebar">
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_pedido_insumos">PEDIDO
                                    INSUMOS</button>
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_pedido_materiales">PEDIDO
                                    MATERIALES</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-sidebar">
                        <div class="card-header-sidebar" id="heading_ayudante">
                            <h2 class="mb-0">
                                <button class="btn btn-light btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapse_ayudante" aria-expanded="false"
                                    aria-controls="collapse_ayudante"><i
                                        class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    AYUDANTE DENTAL
                                </button>
                            </h2>
                        </div>
                        <div id="collapse_ayudante" class="collapse" aria-labelledby="heading_ayudante"
                            data-parent="#accordion_formularios_atencion">
                            <div class="card-body-sidebar">
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_gastosmaterial_gen">GASTO
                                    MATERIALES</button>
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_control_trabajo">CONTROL DE ENVIOS A
                                    LABORATORIO</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-sidebar">
                        <div class="card-header-sidebar" id="heading_consentimientos_informados">
                            <h2 class="mb-0">
                                <button class="btn btn-light btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapse_consentimientos_informados"
                                    aria-expanded="false" aria-controls="collapse_consentimientos_informados"><i
                                        class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    CONSENTIMIENTOS INFORMADOS
                                </button>
                            </h2>
                        </div>
                        <div id="collapse_consentimientos_informados" class="collapse"
                            aria-labelledby="heading_consentimientos_informados"
                            data-parent="#accordion_formularios_atencion">
                            <div class="card-body-sidebar">
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_anestesia">Anestesia</button>
                                <button type="button" class="btn btn-sm btn-info btn-block accion_m_aconsentcir">Cirugía
                                    Menor</button>
                                <button type="button" class="btn btn-sm btn-info btn-block accion_m_aconsentcirm">Cirugía
                                    Mayor</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-sidebar">
                        <div class="card-header-sidebar" id="heading_recom">
                            <h2 class="mb-0">
                                <button class="btn btn-light btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapse_recom" aria-expanded="false"
                                    aria-controls="collapse_recom"><i
                                        class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    RECOMENDACIONES A PACIENTES
                                </button>
                            </h2>
                        </div>
                        <div id="collapse_recom" class="collapse" aria-labelledby="heading_recom"
                            data-parent="#accordion_formularios_atencion">
                            <div class="card-body-sidebar">
                                <a href="documentos/consejosodontopediatría.pdf" target="_blank"><button type="button"
                                        class="btn btn-sm btn-info btn-block " style="margin-bottom:5px">La Dentición
                                        Temporal y sus Cuidados</button></a>
                                <a href="documentos/Higiene y controles odontopediatra.pdf" target="_blank">
                                    <button type="button"
                                        class="btn btn-sm btn-info btn-block accion_m_aconsentcirm">Higiene y Control
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Sidebar 3 (formularios generales)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_atencion" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg"
        data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                    class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Generales</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordion_formularios_atencion">
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_form_generales">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse_form_generales" aria-expanded="true"
                                aria-controls="collapse_form_generales"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                FORMULARIOS GENERALES
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_form_generales" class="collapse" aria-labelledby="heading_form_generales"
                        data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <!--Boton Modal Formulario certificado de reposo-->
                            <button type="button"
                                class="btn btn-sm btn-info  btn-block accion_modal_certificado_reposo">Certificado de
                                reposo</button>

                            <!--Boton Modal Formulario de interconsulta-->
                            <button type="button"
                                class="btn btn-sm btn-info  btn-block accion_modal_interconsulta">Interconsulta</button>

                            <!--Boton Modal Formulario de informe médico-->
                            <button type="button" class="btn btn-sm btn-info  btn-block accion_modal_informe">Informe
                                Médico</button>

                            <!--Boton Modal formulario uso personal-->
                            <button type="button" class="btn btn-sm btn-info  btn-block accion_modal_uso_personal">Uso
                                Personal</button>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_form_notificaciones">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_form_notificaciones" aria-expanded="false"
                                aria-controls="collapse_form_notificaciones"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                FORMULARIOS DE NOTIFICACIÓN
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_form_notificaciones" class="collapse"
                        aria-labelledby="heading_form_notificaciones" data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <!--Boton Modal Formulario Constancia Ges-->
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_constancia_ges">Constancia
                                GES</button>

                            <!--Boton Modal Formulario Enfermedades de Declaración Obligatoria -->
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_enfermedades_declaracion_obligatoria">Enfermedades
                                de Declaración Obligatoria</button>

                            <!--Boton Modal Formulario Reembolso Médico-->
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_reembolso_medico">Reembolso Gastos
                                Médicos</button>

                            <!--Boton Modal Formulario Reembolso Dental-->
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_reembolso_dental">Reembolso Gastos
                                Dentales</button>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_consentimientos_informados">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_consentimientos_informados"
                                aria-expanded="false" aria-controls="collapse_consentimientos_informados"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                CONSENTIMIENTOS INFORMADOS GENERALES
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_consentimientos_informados" class="collapse"
                        aria-labelledby="heading_consentimientos_informados" data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <!--Boton Modal Formulario Antestesia-->
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_anestesia">Antestesia</button>
                            <!--Boton Modal Formulario consentimiento cirugía-->
                            <button type="button" class="btn btn-sm btn-info btn-block accion_modal_ccd">Consentimiento
                                Cirugía</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Botón flotane-->
    <div class="row">
        <div class="col-sm-12">
            <div class="boton-formularios">
                <input type="checkbox" id="btn-mas">
                <div class="redes">
                    <a id="boton_1" href="#" class="fas fa-user fa-2x" data-toggle="canvas"
                        data-target="#antecedentes_paciente" aria-expanded="false" aria-controls="bs-canvas-right"
                        title="Antecedentes del paciente" data-placement="left"></a>
                    <a id="boton_2" href="#" class="fas fa-notes-medical fa-2x" data-toggle="canvas"
                        data-target="#formularios_atencion" aria-expanded="false" aria-controls="bs-canvas-right"
                        title="Formularios de atención" data-placement="left"></a>
                    <a id="boton_3" href="#" class="fab fas fa-tooth fa-2x" data-toggle="canvas"
                        data-target="#formularios_dentales" aria-expanded="false" aria-controls="bs-canvas-right"
                        title="Formularios dentales" data-placement="left"></a>
                </div>
                <div class="btn-mas">
                    <label for="btn-mas" class="fa fa-plus"></label>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Botón flotante-->
@endsection
