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
                                <h5 class="text-white d-inline ml-2 f-16 mt-1"><strong>Registro de atención hospitalizada
                                        cesárea</strong></h5>
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
                                            aria-selected="false">Protocolo parto</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="recuperacion-tab" data-toggle="tab"
                                            href="#recuperacion" role="tab" aria-controls="recuperacion"
                                            aria-selected="false">Recuperación</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="sala-parto-tab" data-toggle="tab"
                                            href="#sala-parto" role="tab" aria-controls="sala-parto"
                                            aria-selected="false">Sala</a>
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
                                'app.cirugia.secciones_cesarea.solicitud_sala_parto'
                            )
                            <?php
                            // require_once '../cirugia_obstetricia/secciones_obstetricia/solicitud_sala_parto.php';
                            ?>
                        </div>

                        <!--Ingreso de paciente-->
                        <div class="tab-pane fade" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                            <?php
                            // require_once '../cirugia_obstetricia/secciones_obstetricia/ingreso_paciente.php';
                            ?>
                        </div>

                        <!--Protocolo de parto-->
                        <div class="tab-pane fade" id="protocolo" role="tabpanel" aria-labelledby="protocolo-tab">
                            <?php
                            // require_once '../cirugia_obstetricia/secciones_obstetricia/protocolo_parto.php';
                            ?>
                        </div>

                        <!--Recuperación-->
                        <div class="tab-pane fade" id="recuperacion" role="tabpanel" aria-labelledby="recuperacion-tab">
                            <?php
                            // require_once '../cirugia_obstetricia/secciones_obstetricia/recuperacion_parto.php';
                            ?>
                        </div>

                        <!--Sala-->
                        <div class="tab-pane fade" id="sala-parto" role="tabpanel" aria-labelledby="sala-parto-tab">
                            <?php
                            // require_once '../cirugia_obstetricia/secciones_obstetricia/sala_parto.php';
                            ?>
                        </div>

                        <!--Epicrisis y carnet de alta-->
                        <div class="tab-pane fade" id="alta" role="tabpanel" aria-labelledby="alta-tab">
                            <?php
                            // require_once '../cirugia_obstetricia/secciones_obstetricia/epicrisis_carnet.php';
                            ?>
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
                            <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                CONTACTO DE EMERGENCIA
                            </button>
                        </h2>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i
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
                                            <div class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
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

    <!--Sidebar 2 (formularios generales)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_atencion" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg"
        data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                    class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios generales</h5>
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
                            <button type="button" class="btn btn-sm btn-info btn-block"
                                onclick="m_cons_cirg();">Consentimiento cirugía</button>
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
                </div>
                <div class="btn-mas">
                    <label for="btn-mas" class="fa fa-plus"></label>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Botón flotante-->

@endsection
