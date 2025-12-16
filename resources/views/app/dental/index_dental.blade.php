@extends('template.dental.template')
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>Registro de atención dental</strong></h5>
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
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2"id="registro-dental" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active"id="atencion-paciente-tab" data-toggle="tab" href="#atencion-paciente" role="tab" aria-controls="atencion-paciente" aria-selected="true">Atender paciente</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="licencias-tab" data-toggle="tab" href="#licencias" role="tab" aria-controls="licencias" aria-selected="false">Licencias</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="pill"aria-controls="fmu" aria-selected="false">FMU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="atenciones-previas-tab" data-toggle="tab" href="#atencion-previas" role="tab" aria-controls="atencion-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                       <a class="nav-link text-reset" id="examenes-tab" data-toggle="tab" href="#examenes" role="tab" aria-controls="examenes" aria-selected="false">Exámenes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="presupuesto-tab" data-toggle="tab" href="#presupuesto" role="tab" aria-controls="presupuesto" aria-selected="false">PRESUPUESTOS</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Menú Pills-->
            <!--Contenido Pills-->
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="registro-dental-contenido">
                        <div class="tab-pane fade show active" id="atencion-paciente" role="tabpanel" aria-labelledby="atencion-paciente-tab">
                            @include('app.dental.secciones_dentales.ficha_atencion_dental')
                        </div>
                        <div class="tab-pane fade show" id="licencias" role="tabpanel" aria-labelledby="licencias-tab">

                        </div>
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">

                        </div>
                        <div class="tab-pane fade show" id="atencion-previas" role="tabpanel"
                            aria-labelledby="atencion-previas-tab">

                        </div>
                        <div class="tab-pane fade show" id="examenes" role="tabpanel" aria-labelledby="examenes-tab">
                            @include('general.secciones_ficha.bandeja_examenes')
                        </div>
                        <div class="tab-pane fade show" id="presupuesto" role="tabpanel" aria-labelledby="presupuesto-tab">
                            @include('app.dental.secciones_ficha/presupuesto')
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre:Contenido Pills-->

        </div>
        <!--////// SIDEBARS //////-->
        <!--Sidebar 1 (antecedentes del paciente)-->
        <div class="position-fixed w-100 h-100"></div>
        <div id="antecedentes_paciente"
            class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px"
            data-offset="true">
            <header class="bs-canvas-header p-3 bg-info overflow-auto">
                <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                        class="text-light">&times;</span></button>
                <h5 class="d-inline-block text-light mb-0 float-right mt-1">Antecedentes del paciente</h5>
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
                                        {{ $paciente->nombres }}
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Apellidos</label>
                                    <div class="col-7 ml-2 text-secondary">
                                        {{ $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Rut</label>
                                    <div class="col-7 ml-2 text-secondary">
                                        {{ $paciente->rut }}
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Nacimiento</label>
                                    <div class="col-7 ml-2 text-secondary">
                                        {{ $paciente->fecha_nac }}
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Edad</label>
                                    <div class="col-7 ml-2 text-secondary">
                                        <span>{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</span>
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Sexo</label>
                                    <div class="col-7 ml-2 text-secondary">
                                        @if ($paciente->sexo == 'M')
                                            Masculino
                                        @else
                                            Femenino
                                        @endif
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Dirección</label>
                                    <div class="col-7 ml-2 text-secondary">

                                        @if (isset($paciente))
                                            @if ($paciente->Direccion()->first() != null)
                                                {{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}
                                            @else
                                                <span class="error">NO HA REGISTRADO DIRECCIÓN !</span>
                                            @endif
                                        @else
                                            <span class="error">NO HA REGISTRADO DIRECCIÓN !</span>
                                        @endif


                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Comuna / Región</label>
                                    <div class="col-7 ml-2 text-secondary">
                                        @if (isset($paciente))
                                            @if ($paciente->Direccion()->first()->Ciudad()->first() != null)
                                                {{ $paciente->Direccion()->first()->Ciudad()->first()->nombre }}<br>
                                                {{ $paciente->Direccion()->first()->Ciudad()->first()->nombre }}
                                            @else
                                                <span class="error">NO HA REGISTRADO CIUDAD !</span>
                                            @endif
                                        @else
                                            <span class="error">NO HA REGISTRADO CIUDAD !</span>
                                        @endif

                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Correo Electrónico</label>
                                    <div class="col-7 ml-2 text-secondary">
                                        {{ $paciente->email }}
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Teléfono</label>
                                    <div class="col-7 ml-2 text-secondary">
                                        {{ $paciente->telefono_uno }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-sidebar">
                        <div class="card-header-sidebar" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-light btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo"><i
                                        class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    CONTACTO DE EMERGENCIA
                                </button>
                            </h2>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Rut</label>
                                <div class="col-7 ml-2 text-secondary">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            <strong>{{ $paciente->ContactosEmergencia()->first()->rut }}</strong>
                                        </span>
                                    @else
                                        <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                                    @endif


                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Nombre</label>
                                <div class="col-7 ml-2 text-secondary">


                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            <strong>{{ $paciente->ContactosEmergencia()->first()->nombre }}</strong>
                                        </span>
                                    @else
                                        <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                                    @endif


                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Apellidos</label>
                                <div class="col-7 ml-2 text-secondary">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            <strong>{{ $paciente->ContactosEmergencia()->first()->apellido_uno .' ' .$paciente->ContactosEmergencia()->first()->apellido_dos }}</strong>
                                        </span>
                                    @else
                                        <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                                    @endif


                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Dirección</label>
                                <div class="col-7 ml-2 text-secondary">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            <strong>
                                                {{ $paciente->ContactosEmergencia()->first()->Direccion()->first()->direccion .
                                                    ' ' .
                                                    $paciente->ContactosEmergencia()->first()->Direccion()->first()->numero_dir }}
                                            </strong>
                                        </span>
                                    @else
                                        <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                                    @endif


                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Comuna / Región</label>
                                <div class="col-7 ml-2 text-secondary">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            <strong>{{ $paciente->ContactosEmergencia()->first()->Direccion()->first()->Ciudad()->first()->nombre }}</strong>
                                        </span>
                                    @else
                                        <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                                    @endif



                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Correo Electr&oacute;nico</label>
                                <div class="col-7 ml-2 text-secondary">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            <strong>{{ $paciente->ContactosEmergencia()->first()->email }}</strong>
                                        </span>
                                    @else
                                        <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                                    @endif

                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-4 text-info-2 font-weight-bolder">Tel&eacute;fono</label>
                                <div class="col-7 ml-2 text-secondary">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            <strong>{{ $paciente->ContactosEmergencia()->first()->telefono }}</strong>
                                        </span>
                                    @else
                                        <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                                    @endif



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
                                <label class="col-4 text-info-2 font-weight-bolder">Otras Alergias e
                                    Intolerancias</label>
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
                                <label class="col-4 text-info-2 font-weight-bolder">Acepta Transfusión de
                                    Sangre</label>
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

                                @if (isset($fichas))
                                    @foreach ($fichas as $fic)
                                        @if ($fic->Profesional()->first()->id == $profesional->id)
                                            <div class="row mr-2">
                                                <div
                                                    class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
                                                    <p class="pt-3 pl-2 text-secondary">
                                                        {{ $fic->created_at }}<br>
                                                        {{ $fic->Profesional()->first()->Especialidad()->first()->nombre }}<br>
                                                        {{ $fic->Profesional()->first()->nombre .' ' .$fic->Profesional()->first()->apellido_uno .' ' .$fic->Profesional()->first()->apellido_dos }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Sidebar 1-->

        <!--Sidebar 2 (formularios dentales)-->
        <div class="position-fixed w-100 h-100"></div>
        <div id="formularios_dentales"
            class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px"
            data-offset="true">
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
                                <img src="{{ asset('img_dental/sano.png') }}"> Diente Sano
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/ausente.png') }}"> Diente Ausente
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/carie.png') }}"> Carie
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/composite.png') }}"> Composite
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/sellante.png') }}"> Sellante
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/incrustacion.png') }}"> Incrustación
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/endodoncia.png') }}"> Endodoncia
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/corona.png') }}"> Corona
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/surco.png') }}"> Surco
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/obturacion.png') }}"> Obturación
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/implante.png') }}"> Implante
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/l_cuello.png') }}"> Lesión de Cuello
                                <hr class="mt-1 mb-1">

                                <img src="{{ asset('img_dental/fractura.png') }}"> Fractura
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
                                        class="btn btn-sm btn-info btn-block accion_modal_orden_trabajo">ORDEN DE
                                        TRABAJO MENOR</button>
                                    <button type="button"
                                        class="btn btn-sm btn-info btn-block accion_modal_orden_trabajoM">ORDEN DE
                                        TRABAJO MAYOR</button>
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
                                        INSUMOS / MATERIALES</button>
                                    <!-- <button type="button"
                                                                                                                                                                                                    class="btn btn-sm btn-info btn-block accion_modal_pedido_materiales">PEDIDO
                                                                                                                                                                                                    MATERIALES</button>-->
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
                                        class="btn btn-sm btn-info btn-block accion_modal_control_trabajo">CONTROL DE
                                        ENVIOS A LABORATORIO</button>
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
                                        class="btn btn-sm btn-info btn-block accion_modal_anestesia">Antestesia</button>
                                    <button type="button"
                                        class="btn btn-sm btn-info btn-block accion_m_aconsentcir">Cirugía
                                        Menor</button>
                                    <button type="button"
                                        class="btn btn-sm btn-info btn-block accion_m_aconsentcirm">Cirugía
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
                                        RECOMENDACIONES A PACIENTES.
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse_recom" class="collapse" aria-labelledby="heading_recom"
                                data-parent="#accordion_formularios_atencion">
                                <div class="card-body-sidebar">
                                    <a href="{{ asset('documentos/consejosodontopediatría.pdf') }}"
                                        target="_blank"><button type="button" class="btn btn-sm btn-info btn-block "
                                            style="margin-bottom:5px">La Dentición Temporal y sus Cuidados</button></a>
                                    <a href="{{ asset('documentos/Higieneycontrolesodontopediatra.pdf') }}"
                                        target="_blank">
                                        <button type="button" class="btn btn-sm btn-info btn-block ">Higiene y Control
                                        </button></a>
                                    <a href="#"><button type="button" class="btn btn-sm btn-info btn-block "
                                            style="margin-bottom:5px;margin-top:5px">Otros</button></a>
                                    <a href="#">
                                        <button type="button" class="btn btn-sm btn-info btn-block ">Otros</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Sidebar 3 (formularios generales)-->
        <div class="position-fixed w-100 h-100"></div>
        <div id="formularios_atencion"
            class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px"
            data-offset="true">
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
                                    class="btn btn-sm btn-info  btn-block accion_modal_certificado_reposo">
                                    Certificado de reposo
                                </button>

                                <!--Boton Modal Formulario de interconsulta-->
                                <button type="button" class="btn btn-sm btn-info  btn-block accion_modal_interconsulta">
                                    Interconsulta
                                </button>

                                <!--Boton Modal Formulario de informe médico-->
                                <button type="button" class="btn btn-sm btn-info  btn-block accion_modal_inf_medico">
                                    Informe Médico
                                </button>

                                <!--Boton Modal formulario uso personal-->
                                <button type="button" class="btn btn-sm btn-info  btn-block accion_modal_uso_personal">
                                    Uso Personal
                                </button>
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
                                    class="btn btn-sm btn-info btn">Constancia
                                    GES</button>

                                <!--Boton Modal Formulario Enfermedades de Declaración Obligatoria -->
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_enfermedades_declaracion_obligatoria">Enfermedades
                                    de Declaración Obligatoria</button>

                                <!--Boton Modal Formulario Reembolso Médico-->
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_reembolso_medico">Reembolso
                                    Gastos Médicos</button>

                                <!--Boton Modal Formulario Reembolso Dental-->
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_modal_reembolso_dental">Reembolso
                                    Gastos Dentales</button>
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
                            aria-labelledby="heading_consentimientos_informados"
                            data-parent="#accordion_formularios_atencion">
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

        <!--Modals odontograma-->
        @include('app.dental.modals.odontograma.modal_odontograma')
        @include( 'app.dental.modals.Antecedentes_dentales.anestesia' )
        @include(
            'app.dental.modals.Antecedentes_dentales.hemorragias'
        )
        @include(
            'app.dental.modals.Antecedentes_dentales.fracturas'
        )

        <!--Ficha Dental Indicaciones-->
        @include(
            'app.dental.modals.ficha.modal_indicar_medicamentos'
        )
        @include('app.dental.modals.ficha.modal_indicar_examenes')
        @include(
            'app.dental.modals.ficha.modal_enfermedades_cronicas'
        )

        <!--Modals Formularios Dentales-->
        <!--Examenes dentales-->
        @include(
            'app.dental.modals.formularios_dentales.examenes_dentales.m_exradiologico'
        )
        @include(
            'app.dental.modals.formularios_dentales.examenes_dentales.m_exbiopsia'
        )

        <!--Laboratorio Dental-->

        @include(
            'app.dental.modals.formularios_dentales.laboratorio_dental.m_trabajo'
        )
        @include(
            'app.dental.modals.formularios_dentales.laboratorio_dental.m_trabajoM'
        )

        <!--Pedido Material Trabajo-->

        @include(
            'app.dental.modals.formularios_dentales.pedido_material_trabajo.pedido_insumos_materiales'
        )
        @include(
            'app.dental.modals.formularios_dentales.pedido_material_trabajo.m_pmateriales'
        )

        <!--Ayudante Dental-->
        @include(
            'app.dental.modals.formularios_dentales.ayudante_dental.modal_gastosmaterial_gen'
        )
        @include(
            'app.dental.modals.formularios_dentales.ayudante_dental.modal_control_trabajo'
        )

        <!--Concentimiento Informado-->
        @include(
            'app.dental.modals.formularios_dentales.concentimientos_informados.anestesia'
        )
        @include(
            'app.dental.modals.formularios_dentales.concentimientos_informados.cirugia_menor'
        )
        @include(
            'app.dental.modals.formularios_dentales.concentimientos_informados.cirugia_mayor'
        )

        <!--Recomendaciones Pacientes-->
        @include(
            'app.dental.modals.formularios_dentales.concentimientos_informados.anestesia'
        )
        @include(
            'app.dental.modals.formularios_dentales.concentimientos_informados.cirugia_menor'
        )
        @include(
            'app.dental.modals.formularios_dentales.concentimientos_informados.cirugia_mayor'
        )

        <!--Modals Atenciones Generales-->
        <!--Formularios Generales-->




        <!--Formularios Notificacion-->

        @include(
            'app.dental.modals.atencion_general.formularios_notificacion.enfermedades_declaracion_obligatoria'
        )
        @include(
            'app.dental.modals.atencion_general.formularios_notificacion.reembolso_medico'
        )
        @include(
            'app.dental.modals.atencion_general.formularios_notificacion.reembolso_dental'
        )

        @include(
            'app.dental.modals.adulto.tratamiento_boca_completa'
        )
        @include(
            'app.dental.modals.adulto.tratamiento_maxilar_inferior'
        )
        @include(
            'app.dental.modals.adulto.tratamiento_maxilar_superior'
        )


    </div>
@endsection
