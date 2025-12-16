<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="nutri" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion-tab" data-toggle="tab"
                            href="#atencion" role="tab" aria-controls="atencion" aria-selected="true">Atención
                            General</a>
                    </li>
                     <li class="nav-item-secciones">
                        <a class="nav-secciones  text-uppercase" onclick="dame_atencion_nutricional()" id="atencion_nutri-tab" data-toggle="tab" href="#atencion_nutri" role="tab" aria-controls="atencion_nutri" aria-selected="true">Evaluación nutricional</a>
                    </li>
                    @if($tiene_controles == 1)
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" onclick="dame_control()" id="control-tab" data-toggle="tab" href="#control"
                            role="tab" aria-controls="control" aria-selected="false">Controles</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" onclick="dame_historial_controles()" id="h_control-tab" data-toggle="tab" href="#h_control"
                            role="tab" aria-controls="h_control" aria-selected="false">Historial de controles</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!--ALERTA-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row mb-1">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert"
                            id="mensaje_ficha"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="alert-atencion alert alert-success-b alert-dismissible fade show" role="alert"
                            id="mensaje_historias"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="tab-content" id="nutri-contenido">
                    <!--ATENCION GENERAL-->
                    <div class="tab-pane fade show active" id="atencion" role="tabpanel"
                        aria-labelledby="atencion-tab">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-message">
                                <strong>Error:</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-message">
                                <strong>Éxito:</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif
                        <form id="form_ficha_nutri" action="{{ route('ficha.otro.prof.registrar_ficha_nutri') }}" method="POST">
                            <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                            <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                            <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                            <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                            <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                            <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                            <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}"
                                id="prevision_paciente_fc">
                            <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}"
                                id="id_profesional_fc">
                            <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion"
                                value="{{ $id_lugar_atencion }}">
                            <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                            <input type="hidden" name="mostrarpdf" id="mostrarpdf" value="0">
                            <input type="hidden" name="tipopdf" id="tipopdf" value="0">
                            <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                            <input type="hidden" name="hora_agendada" id="hora_agendada" value="0">
                            <input type="hidden" name="finalizando_sesiones" id="finalizando_sesiones" value="0">
                            <input type="hidden" name="id_plan" id="id_plan" value="0">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('general.secciones_ficha.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->

                                        <!--Motivo consulta-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="motivop">
                                                    <button
                                                        class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed"
                                                        type="button" data-toggle="collapse"
                                                        data-target="#motivop_c" aria-expanded="false"
                                                        aria-controls="motivop_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivop_c" class="collapse show" aria-labelledby="motivop"
                                                    data-parent="#motivop">
                                                    <div class="card-body-aten-a">

                                                        <div class="form-row">
                                                            <div
                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                <label id="motivo_consulta"
                                                                    class="floating-label-activo-sm">Tipo de
                                                                    consulta</label>
                                                                <select class="form-control form-control-sm"
                                                                    name="" id="">
                                                                    <option value="AL">Espontanea</option>
                                                                    <option value="LA">Derivada</option>
                                                                </select>
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                <label class="floating-label-activo-sm">Derivado
                                                                    por</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="deriv_por" id="deriv_por">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                <label class="floating-label-activo-sm">Diagnóstico de
                                                                    Ingreso</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="dg_ingreso" id="dg_ingreso">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                <label class="floating-label-activo-sm">Se
                                                                    solicita</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="solicitud" id="solicitud">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                <label class="floating-label-activo-sm">N° de
                                                                    Sesiones</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="solicitud" id="solicitud">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                <label class="floating-label-activo-sm">Otra</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="solicitud" id="solicitud">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!--EVALUACIÓN NUTRICIONAL-->
                                        <!--Diagnóstico-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="diagnostico">

                                                    <button
                                                        class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed"
                                                        type="button" data-toggle="collapse"
                                                        data-target="#diagnostico_c" aria-expanded="false"
                                                        aria-controls="diagnostico_c">
                                                        Diagnóstico y plan de tratamiento
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c" class="collapse show"
                                                    aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div
                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Hipótesis
                                                                    diagnóstica</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis,diagnostico_tratamiento"
                                                                    name="hipotesis" id="hipotesis"
                                                                    onchange="cargarIgual('hipotesis')">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label
                                                                    class="floating-label-activo-sm">Indicaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                    name="ind_pedgen" id="ind_pedgen"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <button type="button"
                                                                    class="btn btn-outline-primary btn-block btn-sm "
                                                                    onclick="hora_medica_pedir({{ $profesional->id }},{{ $id_lugar_atencion }}); dame_plan_tratamiento({{ $id_ficha_atencion }})"><i
                                                                        class="feather icon-file-plus"></i> Plan de
                                                                    Tratamiento</button>
                                                            </div>
                                                            @if($tiene_controles == 1)
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="alert alert-success" role="alert">
                                                                    <i class="fas fa-check-circle"></i> Se añadió un
                                                                    plan de tratamiento.
                                                                </div>
                                                            </div>
                                                            @else
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="alert alert-warning" role="alert">
                                                                    <i class="fas fa-check-circle"></i> Debe iniciar un plan de tratamiento.
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Medicamentos o Examen-->
                                    <div class="card">
                                        <div class="form-row">
                                            <div
                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 pr-3 pl-3">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-block btn-sm"
                                                    onclick="internutri();"><i class="feather icon-edit-1"></i>
                                                    Indicar interconsulta</button>
                                            </div>
                                            <div
                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 pr-3 pl-3">
                                                {{-- <button type="button"
                                                    class="btn btn-outline-primary btn-block btn-sm"
                                                    onclick="examenes_nutri();"><i class="feather icon-edit-1"></i>
                                                    Indicar examen especialidad </button> --}}
                                            </div>
                                            <div
                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 pr-3 pl-3">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-block btn-sm"
                                                    onclick="informeNutri() ;"><i class="feather icon-edit-1"></i>
                                                    Enviar informe</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Guardar o imprimir ficha-->
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
                                            <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->

                    <!-- EVALUACION NUTRICIONAL -->
                    <div class="tab-pane fade" id="atencion_nutri" role="tabpanel" aria-labelledby="atencion_nutri-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h5 class="text-c-blue f-20">Evaluación nutricional</h5>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body" id="nutri">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <ul class="nav nav-tabs-aten nav-fill mb-3"
                                                    id="ev-nutricional" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset active" id="antec_fam_tab" data-toggle="tab" href="#antec_fam" role="tab" aria-controls="antec_fam" aria-selected="true">Antecedentes y Patologías</a>
                                                    </li>
                                                        <li class="nav-item">
                                                        <a class="nav-link-aten text-reset"id="hab-consumo-tab" data-toggle="tab"href="#hab-consumo" role="tab"  aria-controls="hab-consumo"  aria-selected="true">Hábitos de consumo</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset"
                                                            id="act-fisica-tab" data-toggle="tab"
                                                            href="#act-fisica" role="tab"
                                                            aria-controls="act-fisica"
                                                            aria-selected="false">Actividad física</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset"
                                                            id="exam-fisico-tab" data-toggle="tab"
                                                            href="#exam-fisico" role="tab"
                                                            aria-controls="exam-fisico"
                                                            aria-selected="false">Examen físico</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset"
                                                            id="in-diet-tab" data-toggle="tab"
                                                            href="#in-diet" role="tab"
                                                            aria-control="in-diet"
                                                            aria-selected="false">Indicadores
                                                            dietéticos</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="tab-content" id="ev-nutricional">
                                                    <!--ANTECEDENTES FAMILIARES-->
                                                    <div class="tab-pane fade show active"  id="antec_fam" role="tabpanel" aria-labelledby="antec_fam_tab">
                                                        {{-- <form> --}}
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <h6 class="text-c-blue">ANTECEDENTES FAMILIARES
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Seleccionar
                                                                        patologías paternas</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="select_1" id="select_1"
                                                                        multiple="multiple">
                                                                        <option value="Hipertensión">Hipertensión</option>
                                                                        <option value="Diabetes">Diabetes</option>
                                                                        <option value="Hipercolesterolemia">Hipercolesterolemia
                                                                        </option>
                                                                        <option value="Hiperlipidemia">Hiperlipidemia</option>
                                                                        <option value="Cancer">Cáncer</option>
                                                                        <option value="Obesidad">Obesidad</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Seleccionar
                                                                        patologías maternas</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="select_2" id="select_2"
                                                                        multiple="multiple">
                                                                        <option value="Hipertensión">Hipertensión</option>
                                                                        <option value="Diabetes">Diabetes</option>
                                                                        <option value="Hipercolesterolemia">Hipercolesterolemia
                                                                        </option>
                                                                        <option value="Hiperlipidemia">Hiperlipidemia</option>
                                                                        <option value="Cancer">Cáncer</option>
                                                                        <option value="Obesidad">Obesidad</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Seleccionar
                                                                        patologías familiares</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="select_3" id="select_3"
                                                                        multiple="multiple">
                                                                        <option value="Hipertensión">Hipertensión</option>
                                                                        <option value="Diabetes">Diabetes</option>
                                                                        <option value="Hipercolesterolemia">Hipercolesterolemia
                                                                        </option>
                                                                        <option value="Hiperlipidemia">Hiperlipidemia</option>
                                                                        <option value="Cancer">Cancer</option>
                                                                        <option value="Obesidad">Obesidad</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <h6 class="text-c-blue mt-3">ANTECEDENTES
                                                                        PATOLÓGICOS PROPIOS</h6>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Seleccionar
                                                                        enfermedad actual</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="select_4" id="select_4"
                                                                        multiple="multiple">
                                                                        <option value="Hipertensión">Hipertensión</option>
                                                                        <option value="Diabetes">Diabetes</option>
                                                                        <option value="Hipercolesterolemia">Hipercolesterolemia
                                                                        </option>
                                                                        <option value="Hiperlipidemia">Hiperlipidemia</option>
                                                                        <option value="Cancer">Cáncer</option>
                                                                        <option value="Obesidad">Obesidad</option>
                                                                        <option value="Hipotiroidismo">Hipotiroidismo</option>
                                                                        <option value="Cirugías">Cirugías</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Seleccionar
                                                                        síntomas actuales</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="select_5" id="select_5"
                                                                        multiple="multiple">
                                                                        <option value="Diarrea">Diarrea</option>
                                                                        <option value="Estreñimiento">Estreñimiento</option>
                                                                        <option value="Gastritis">Gastritis</option>
                                                                        <option value="Náusea">Náusea</option>
                                                                        <option value="Reflujo">Reflujo</option>
                                                                        <option value="Colitis">Colitis</option>
                                                                        <option value="Otros">Otros</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label
                                                                        class="floating-label-activo-sm">Antecedentes
                                                                        ginecológicos</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="select_6" id="select_6"
                                                                        multiple="multiple">
                                                                        <option value="Embarazo Actúal">Embarazo Actual</option>
                                                                        <option value="Anticonceptivos Orales">Anticonceptivos Orales
                                                                        </option>
                                                                        <option value="Climatério">Climatério</option>
                                                                        <option value="Otros">Otros</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Otras
                                                                        patologías actuales</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                        name="otras_patologias_actuales" id="otras_patologias_actuales"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Otros
                                                                        síntomas actuales</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                        name="otros_sintomas_actuales" id="otros_sintomas_actuales"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Otros
                                                                        antecedentes ginecológicos</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                        name="antecedentes_ginecologicos" id="antecedentes_ginecologicos"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Embarazo
                                                                        actual N° Semanas</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                        name="n_semanas_embarazo" id="n_semanas_embarazo"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label
                                                                        class="floating-label-activo-sm">Anticonceptivos
                                                                        ¿Cuáles?</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                        name="usa_anticonceptivo" id="usa_anticonceptivo"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Terapia de reemplazo hormonal ¿Cuál?</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                        name="cual_terapia_hormonal" id="cual_terapia_hormonal"></textarea>
                                                                </div>
                                                            </div>
                                                        {{-- </form> --}}
                                                    </div>
                                                    <!--HABITOS DE CONSUMO-->
                                                    <div class="tab-pane fade show" id="hab-consumo" role="tabpanel" aria-labelledby="hab-consumo-tab">
                                                        {{-- <form> --}}
                                                            <div class="form-row">
                                                                <div
                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="text-c-blue mb-3">
                                                                        HÁBITOS DE CONSUMO</h6>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                    <label for="habito_alcohol_ev"
                                                                        class="floating-label-activo-sm">Alcohol</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="habito_alcohol_ev" id="habito_alcohol_ev">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                    <label for="habito_tabaco_ev"
                                                                        class="floating-label-activo-sm">Tabaco</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="habito_tabaco_ev" id="habito_tabaco_ev">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Café</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="habito_cafe_ev" id="habito_cafe_ev">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Drogas</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="habito_drogas_ev" id="habito_drogas_ev">
                                                                </div>
                                                            </div>
                                                        {{-- </form> --}}
                                                    </div>
                                                    <!--ACTIVIDAD FISICA-->
                                                    <div class="tab-pane fade show" id="act-fisica"
                                                        role="tabpanel"
                                                        aria-labelledby="act-fisica-tab">
                                                        {{-- <form> --}}
                                                            <div class="form-row">
                                                                <div
                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="text-c-blue mb-3">
                                                                        ACTIVIDAD FÍSICA</h6>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label
                                                                        class="floating-label-activo-sm">Tipo
                                                                        actividades</label>
                                                                    <select
                                                                        class="form-control form-control-sm"
                                                                        name="select_13"
                                                                        id="select_13"
                                                                        multiple="multiple">
                                                                        <option value="Gimnasio">Gimnasio
                                                                        </option>
                                                                        <option value="Trotar">Trotar
                                                                        </option>
                                                                        <option value="Máquinas (Casa)">Máquinas
                                                                            (Casa)</option>
                                                                        <option value="Caminata">Caminata
                                                                        </option>
                                                                        <option value="Deporte de baja intensidad">Deporte
                                                                            de baja intensidad</option>
                                                                        <option value="Deporte de mediana intensidad">Deporte de mediana intensidad
                                                                        </option>
                                                                        <option value="Deporte de alta intensidad">Deporte
                                                                            de alta intensidad</option>
                                                                        <option value="Pesas y Cardio (Casa)">Pesas y
                                                                            Cardio (Casa)</option>
                                                                        <option value="Pesas y Cardio (Gym)">Pesas y
                                                                            Cardio (Gym)</option>
                                                                        <option value="Crossfit">Crossfit
                                                                        </option>
                                                                        <option value="Otro">Otro
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label for="tipo_esfuerzo"
                                                                        class="floating-label-activo-sm">Tipo
                                                                        de esfuerzo</label>
                                                                    <select
                                                                        class="form-control form-control-sm"
                                                                        name="tipo_esfuerzo_fisico"
                                                                        id="tipo_esfuerzo_fisico">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Muy ligero">Muy
                                                                            ligero</option>
                                                                        <option value="Moderado">Moderado
                                                                        </option>
                                                                        <option value="Pesado">Pesado
                                                                        </option>
                                                                        <option value="Excepcional">
                                                                            Excepcional</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label
                                                                        class="floating-label-activo-sm ">Frecuencia</label>
                                                                    <input type="url"
                                                                        class="form-control form-control-sm"
                                                                        name="frecuencia_nutri" id="frecuencia_nutri">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <label
                                                                        class="floating-label-activo-sm">Duración</label>
                                                                    <input type="url"
                                                                        class="form-control form-control-sm"
                                                                        name="duracion_nutri" id="duracion_nutri">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label
                                                                        class="floating-label-activo-sm">Observaciones
                                                                        estilo y hábitos</label>
                                                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1" onfocus="this.rows=4"
                                                                        onblur="this.rows=1;" name="observacion_estilo_habitos" id="observacion_estilo_habitos"></textarea>
                                                                </div>
                                                            </div>
                                                        {{-- </form> --}}
                                                    </div>
                                                    <!--EXÁMEN FÍSICO-->
                                                    <div class="tab-pane fade show" id="exam-fisico"
                                                        role="tabpanel"
                                                        aria-labelledby="exam-fisico-tab">
                                                        {{-- <form> --}}
                                                            <div class="form-row">
                                                                <div
                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="text-c-blue mb-3">EXÁMEN
                                                                        FÍSICO</h6>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label
                                                                        class="floating-label-activo-sm">Aspecto
                                                                        geneneral</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" placeholder="Pelo, ojos, piel, labios, etc."
                                                                        rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="aspecto_general" id="aspecto_general"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                    <label
                                                                        class="floating-label-activo-sm">Exámenes
                                                                        solicitados ¿Resultados?</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                        name="examenes_solicitados_ev" id="examenes_solicitados_ev"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Presión
                                                                        arterial</label>
                                                                    <input type="url"
                                                                        class="form-control form-control-sm"
                                                                        name="presion_arterial_ev" id="presion_arterial_ev">
                                                                </div>
                                                            </div>
                                                        {{-- </form> --}}
                                                    </div>
                                                    <!--INDICADORES DIETÉTICOS-->
                                                    <div class="tab-pane fade show" id="in-diet"
                                                        role="tabpanel" aria-labelledby="in-diet-tab">
                                                        <div class="form-row">
                                                            <div
                                                                class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                                <div class="nav flex-column nav-pills mb-3"
                                                                    id="v-pills-tab"
                                                                    role="tablist"
                                                                    aria-orientation="vertical">
                                                                    <a class="nav-link-aten text-reset active "
                                                                        id="comidas-tab"
                                                                        data-toggle="tab"
                                                                        href="#comidas"
                                                                        role="tab"
                                                                        aria-controls="comidas"
                                                                        aria-selected="false">Comidas</a>
                                                                    <a class="nav-link-aten text-reset"
                                                                        id="dieta-tab"
                                                                        data-toggle="tab"
                                                                        href="#dieta"
                                                                        role="tab"
                                                                        aria-controls="dieta"
                                                                        aria-selected="true">Dieta</a>
                                                                    <a class="nav-link-aten text-reset"
                                                                        id="alim_prob-tab"
                                                                        data-toggle="tab"
                                                                        href="#alim_prob"
                                                                        role="tab"
                                                                        aria-controls="alim_prob"
                                                                        aria-selected="false">Alimentos
                                                                        Problema</a>
                                                                    <a class="nav-link-aten text-reset"
                                                                        id="alim_preferidos-tab"
                                                                        data-toggle="tab"
                                                                        href="#alim_preferidos"
                                                                        role="tab"
                                                                        aria-controls="alim_preferidos"
                                                                        aria-selected="false">Alimentos
                                                                        Preferidos</a>
                                                                    <a class="nav-link-aten text-reset"
                                                                        id="uso_med_ot-tab"
                                                                        data-toggle="tab"
                                                                        href="#uso_med_ot"
                                                                        role="tab"
                                                                        aria-controls="uso_med_ot"
                                                                        aria-selected="false">Uso
                                                                        de Medicamentos/
                                                                        otros</a>
                                                                    <a class="nav-link-aten text-reset"
                                                                        id="uso_sal_gr-tab"
                                                                        data-toggle="tab"
                                                                        href="#uso_sal_gr"
                                                                        role="tab"
                                                                        aria-controls="uso_sal_gr"
                                                                        aria-selected="false">Uso
                                                                        de Sal
                                                                        /Grasas</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10">
                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                    <div class="tab-pane fade show active"
                                                                        id="comidas"
                                                                        role="tabpanel"
                                                                        aria-labelledby="comidas-tab">
                                                                            <div
                                                                                class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6
                                                                                        class="tit-gen">
                                                                                        COMIDAS
                                                                                    </h6>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Cantidad
                                                                                        de
                                                                                        comidas
                                                                                        al
                                                                                        día</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="comidas_dia_ev"
                                                                                        id="comidas_dia_ev">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">¿Come
                                                                                        a
                                                                                        horarios?</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="horario_comidas_dia_ev"
                                                                                        id="horario_comidas_dia_ev">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">¿Se
                                                                                        salta
                                                                                        comidas?</label>
                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        name="saltar_comidas_ev"
                                                                                        id="saltar_comidas_ev">
                                                                                        <option value="0">Seleccione</option>

                                                                                        <option
                                                                                            value="Si">
                                                                                            Si
                                                                                        </option>
                                                                                        <option
                                                                                            value="Ocasionalmente">
                                                                                            Ocasionalmente
                                                                                        </option>
                                                                                        <option
                                                                                            value="No">
                                                                                            No
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">¿Porque
                                                                                        se
                                                                                        las
                                                                                        salta?</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;"
                                                                                        name="salto_comida" id="salto_comida"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-row">
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">¿Que
                                                                                        consume
                                                                                        en
                                                                                        la
                                                                                        colación?</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;"
                                                                                        name="comida_colacion" id="comida_colacion"></textarea>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Comidas
                                                                                        en
                                                                                        casa</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;"
                                                                                        name="comidas_casa" id="comidas_casa"></textarea>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Fuera
                                                                                        de
                                                                                        casa</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="comidas_fuera_casa"
                                                                                        id="comidas_fuera_casa">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Tipos
                                                                                        de
                                                                                        comida
                                                                                        fuera
                                                                                        de
                                                                                        casa</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;"
                                                                                        name="tipos_comidas_casa" id="tipos_comidas_casa"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div
                                                                                        class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm">Observaciones
                                                                                            Comidas</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Nutri"
                                                                                            data-seccion="Comidas Nutri" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                            name="obs_comidas" id="obs_comidas"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <!--DIETA-->
                                                                    <div class="tab-pane fade show"
                                                                        id="dieta"
                                                                        role="tabpanel"
                                                                        aria-labelledby="dieta-tab">

                                                                        <div
                                                                            class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="tit-gen">
                                                                                    DIETA
                                                                                </h6>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label
                                                                                    class="floating-label-activo-sm">¿Ha
                                                                                    realizado
                                                                                    dieta?
                                                                                </label>
                                                                                <select
                                                                                    class="form-control form-control-sm"
                                                                                    name="realizado_dieta_ev"
                                                                                    id="realizado_dieta_ev">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option
                                                                                        value="Si">
                                                                                        Si
                                                                                    </option>
                                                                                    <option
                                                                                        value="No">
                                                                                        No
                                                                                    </option>
                                                                                    <option
                                                                                        value="Ocasionalmente">
                                                                                        Ocasionalmente
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Motivo</label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="motivo_dieta"
                                                                                    id="motivo_dieta">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label
                                                                                    class="floating-label-activo-sm">¿Por
                                                                                    cuánto
                                                                                    tiempo?</label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="tiempo_dieta"
                                                                                    id="tiempo_dieta">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <label
                                                                                    class="floating-label-activo-sm">¿Ha
                                                                                    Modificado
                                                                                    Dieta?</label>
                                                                                <select
                                                                                    class="form-control form-control-sm"
                                                                                    name="modificado_dieta_ev"
                                                                                    id="modificado_dieta_ev">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option
                                                                                        value="Si">
                                                                                        Si
                                                                                    </option>
                                                                                    <option
                                                                                        value="No">
                                                                                        No
                                                                                    </option>
                                                                                    <option
                                                                                        value="Ocasionalmente">
                                                                                        Ocasionalmente
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Motivo</label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="motivo_dieta_ev"
                                                                                    id="motivo_dieta_ev">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Apetito</label>
                                                                                <select
                                                                                    class="form-control form-control-sm"
                                                                                    name="apetito_ev"
                                                                                    id="apetito_ev">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option
                                                                                        value="Bueno">
                                                                                        Bueno
                                                                                    </option>
                                                                                    <option
                                                                                        value="Regular">
                                                                                        Regular
                                                                                    </option>
                                                                                    <option
                                                                                        value="Malo">
                                                                                        Malo
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Horario
                                                                                    en
                                                                                    que
                                                                                    siente
                                                                                    hambre</label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="horario_hambre_ev"
                                                                                    id="horario_hambre_ev">
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Observaciones
                                                                                    Dieta</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones dietas"
                                                                                    data-seccion="Obs dietas" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                    name="obs_dietas" id="obs_dietas"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--ALIMENTOS PROBLEMA-->
                                                                    <div class="tab-pane fade"
                                                                        id="alim_prob"
                                                                        role="tabpanel"
                                                                        aria-labelledby="alim_prob-tab">
                                                                        <div
                                                                            class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="tit-gen">
                                                                                    ALIMENTOS PROBLEMA
                                                                                </h6>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Alimentos
                                                                                    que
                                                                                    no
                                                                                    le
                                                                                    agradan
                                                                                    /
                                                                                    No
                                                                                    acostumbra</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                    name="alimentos_no_agrada" id="alimentos_no_agrada"></textarea>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Alimentos
                                                                                    que
                                                                                    le
                                                                                    causan
                                                                                    malestar
                                                                                    (Especificar)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                    name="alimentos_malestar" id="alimentos_malestar"></textarea>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Alergia
                                                                                    alimentos</label>
                                                                                <select
                                                                                    class="form-control form-control-sm"
                                                                                    name="alergia_alimentos"
                                                                                    id="alergia_alimentos">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option
                                                                                        value="Si">
                                                                                        Si
                                                                                    </option>
                                                                                    <option
                                                                                        value="No">
                                                                                        No
                                                                                    </option>
                                                                                    <option
                                                                                        value="No sabe">
                                                                                        No
                                                                                        sabe
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                                                                <label
                                                                                    class="floating-label-activo-sm">
                                                                                    ¿Cuáles
                                                                                    alimentos?
                                                                                    (Especificar)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                    name="alimentos_alergia" id="alimentos_alergia"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--ALIMENTOS PREFERIDOS-->
                                                                    <div class="tab-pane fade"
                                                                        id="alim_preferidos"
                                                                        role="tabpanel"
                                                                        aria-labelledby="alim_preferidos-tab">
                                                                            <div
                                                                                class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="tit-gen">
                                                                                        ALIMENTOS PREFERIDOS
                                                                                    </h6>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Alimentos
                                                                                        preferidos</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                        name="alimentos_preferidos" id="alimentos_preferidos"></textarea>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">
                                                                                        Cantidad
                                                                                        semanal
                                                                                        (Especificar)</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                        name="cantidad_semanal_alimento_preferido" id="cantidad_semanal_alimento_preferido"></textarea>
                                                                                </div>
                                                                            </div>

                                                                    </div>
                                                                    <!--USO MEDICAMENTOS-->
                                                                    <div class="tab-pane fade"
                                                                        id="uso_med_ot"
                                                                        role="tabpanel"
                                                                        aria-labelledby="uso_med_ot-tab">
                                                                            <div
                                                                                class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="tit-gen">
                                                                                        USO DE MEDICAMENTOS / OTROS
                                                                                    </h6>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Suplementos
                                                                                        alimentarios</label>
                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        name="suplementos_alimentarios_ev"
                                                                                        id="suplementos_alimentarios_ev">
                                                                                        <option value="0">Seleccione</option>
                                                                                        <option
                                                                                            value="Si">
                                                                                            Si
                                                                                        </option>
                                                                                        <option
                                                                                            value="No">
                                                                                            No
                                                                                        </option>
                                                                                        <option
                                                                                            value="Ocasionalmente">
                                                                                            Ocasionalmente
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-8 col-xl-9">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">
                                                                                        ¿Cuáles
                                                                                        Suplementos?
                                                                                        (Especificar)</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                        name="suplementos_alimentarios_obs" id="suplementos_alimentarios_obs"></textarea>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">¿Medicamentos?</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                        name="medicamentos" id="medicamentos"></textarea>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <!--SAL - GRASAS -->
                                                                    <div class="tab-pane fade"
                                                                        id="uso_sal_gr"
                                                                        role="tabpanel"
                                                                        aria-labelledby="uso_sal_gr-tab">
                                                                        <div
                                                                            class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="tit-gen">
                                                                                    USO DE SAL / GRASAS
                                                                                </h6>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-3">
                                                                                <label
                                                                                    class="floating-label-activo-sm">¿Agrega
                                                                                    sal
                                                                                    a
                                                                                    su
                                                                                    comida?
                                                                                </label>
                                                                                <select
                                                                                    class="form-control form-control-sm"
                                                                                    name="agrega_sal_ev_sb"
                                                                                    id="agrega_sal_ev_sb">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option
                                                                                        value="Si, alta cantidad">
                                                                                        Si,
                                                                                        alta
                                                                                        cantidad
                                                                                    </option>
                                                                                    <option
                                                                                        value="Si, mediana cantidad">
                                                                                        Si,
                                                                                        mediana
                                                                                        cantidad
                                                                                    </option>
                                                                                    <option
                                                                                        value="Si, baja cantidad">
                                                                                        Si,
                                                                                        baja
                                                                                        cantidad
                                                                                    </option>
                                                                                    <option
                                                                                        value="No">
                                                                                        No
                                                                                    </option>
                                                                                    <option
                                                                                        value="Ocasionalmente">
                                                                                        Ocasionalmente
                                                                                    </option>
                                                                                </select>
                                                                            </div>

                                                                            <div
                                                                                class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-9">
                                                                                <label
                                                                                    class="floating-label-activo-sm">¿Qué
                                                                                    grasa
                                                                                    utilizan
                                                                                    en
                                                                                    casa
                                                                                    para
                                                                                    preparar
                                                                                    su
                                                                                    comida?</label>
                                                                                <select
                                                                                    class="form-control form-control-sm"
                                                                                    name="select_15"
                                                                                    id="select_15"
                                                                                    multiple="multiple">
                                                                                    <option
                                                                                        value="Margarina">
                                                                                        Margarina
                                                                                    </option>
                                                                                    <option
                                                                                        value="Mantequilla">
                                                                                        Mantequilla
                                                                                    </option>
                                                                                    <option
                                                                                        value="Manteca">
                                                                                        Manteca
                                                                                    </option>
                                                                                    <option
                                                                                        value="Aceite vegetal">
                                                                                        Aceite
                                                                                        vegetal
                                                                                    </option>
                                                                                    <option
                                                                                        value="Aceite Oliva">
                                                                                        Aceite
                                                                                        Oliva
                                                                                    </option>
                                                                                    <option
                                                                                        value="Otros">
                                                                                        Otros
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">¿Su
                                                                                    apetito
                                                                                    cambia
                                                                                    con
                                                                                    el
                                                                                    estado
                                                                                    de
                                                                                    ánimo?
                                                                                </label>
                                                                                <select
                                                                                    class="form-control form-control-sm"
                                                                                    name="apetito_estado_animo_ev"
                                                                                    id="apetito_estado_animo_ev">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option
                                                                                        value="Si">
                                                                                        Si
                                                                                    </option>
                                                                                    <option
                                                                                        value="No">
                                                                                        No
                                                                                    </option>
                                                                                    <option
                                                                                        value="Ocasionalmente">
                                                                                        Ocasionalmente
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">
                                                                                    ¿De
                                                                                    que
                                                                                    modo?</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                    name="modo_estado_animo" id="modo_estado_animo"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--ANTECEDENTES-->
                                                    <div class="tab-pane fade show"
                                                        id="antecedentes-nutri" role="tabpanel"
                                                        aria-labelledby="antecedentes-nutri-tab">
                                                        {{-- <form> --}}
                                                            <div class="form-row">
                                                                <div
                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="text-c-blue mb-3">
                                                                        ANTECEDENTES</h6>
                                                                </div>
                                                            </div>
                                                        {{-- </form> --}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="dieta_diaria_nutri();"><i class="fa fa-plus"></i> Ingesta Diaria</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                                    {{-- <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="encuesta_nutri();"><i class="fa fa-plus"></i> Encuesta de Consumo</button> --}}
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="indicadores_nutri();"><i class="fa fa-plus"></i> Cálculo Necesidades</button>
                                                </div>

                                            </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <button type="button" class="btn btn-info mb-2" onclick="guardar_evaluacion_nutricional()"><i class="feather icon-save"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--CONTROLES ATENCIÓN -->
                    <div class="tab-pane fade" id="control" role="tabpanel" aria-labelledby="control-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                <h6 class="text-c-blue f-20">Controles</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-body pb-0">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-obesidad"
                                                    role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset active"
                                                            id="nutri_obesidad_tab" data-toggle="tab"
                                                            href="#nutri_obesidad" role="tab"
                                                            aria-controls="nutri_obesidad"
                                                            aria-selected="true">Obesidad</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="nutri_diabetes_tab"
                                                            data-toggle="tab" href="#nutri_diabetes" role="tab"
                                                            aria-controls="nutri_diabetes"
                                                            aria-selected="false">Diabetes</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset"
                                                            id="nutri_hipertension_tab" data-toggle="tab"
                                                            href="#nutri_hipertension" role="tab"
                                                            aria-controls="nutri_hipertension" aria-selected="false">
                                                            Hipertensión</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset"
                                                            id="nutri_dislipidemias_tab" data-toggle="tab"
                                                            href="#nutri_dislipidemias" role="tab"
                                                            aria-controls="nutri_dislipidemias" aria-selected="false">
                                                            Dislipidemias</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="nutri_irenaltab"
                                                            data-toggle="tab" href="#nutri_irenal" role="tab"
                                                            aria-control="nutri_irenal" aria-selected="false">
                                                            Insuficiencia Renal </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="nutri_hiperuric_tab"
                                                            data-toggle="tab" href="#nutri_hiperuric" role="tab"
                                                            aria-control="nutri_hiperuric" aria-selected="false">
                                                            Hiperuricemia </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="tab-content" id="ev-obesidad-content">
                                    <!--OBESIDAD-->
                                    <div class="tab-pane fade show active" id="nutri_obesidad" role="tabpanel"
                                        aria-labelledby="nutri_obesidad_tab">
                                        {{-- <form> --}}
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control Obesidad</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                            date = new Date().toLocaleDateString();
                                                            document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso
                                                                        inicial</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="peso_inicial_control"
                                                                        id="peso_inicial_control"  onkeyup="calcularVariacionPeso()">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso
                                                                        actual</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="peso_actual_control"
                                                                        id="peso_actual_control"  onkeyup="calcularVariacionPeso()">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Variación</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="peso_variacion_control"
                                                                        id="peso_variacion_control">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="control_logro_obj"
                                                                        id="control_logro_obj">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión
                                                                        N°</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="num_sesion_obesidad" id="num_sesion_obesidad">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo
                                                                        en</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="trabajo_en_obesidad" id="trabajo_en_obesidad">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="colaboracion_obesidad" id="colaboracion_obesidad">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Cumple
                                                                        indicaciones</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="control_cumple_obesidad" id="control_cumple_obesidad">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">
                                                                        Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_res_trat_obesidad" id="com_res_trat_obesidad"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Comentario
                                                                        de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_sesion_obesidad" id="com_sesion_obesidad"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Nuevas indicaciones</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                                                        onblur="this.rows=1;" name="nuevas_indicaciones_obesidad" id="nuevas_indicaciones_obesidad"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        {{-- </form> --}}
                                    </div>
                                    <!--DIABETES-->
                                    <div class="tab-pane fade show" id="nutri_diabetes" role="tabpanel"
                                        aria-labelledby="nutri_diabetes_tab">
                                        {{-- <form> --}}
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control Diabetes</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                            date = new Date().toLocaleDateString();
                                                            document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Última
                                                                        Glicemia</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="ultima_glicemia"
                                                                        id="ultima_glicemia">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso
                                                                        actual</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="peso_atual_diabetes"
                                                                        id="peso_atual_diabetes">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Variación
                                                                        Peso</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="variacion_peso_diabetes"
                                                                        id="variacion_peso_diabetes">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="objetivo_logrado_diabetes" id="objetivo_logrado_diabetes">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión
                                                                        N°</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="num_sesion_diabetes" id="num_sesion_diabetes">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo
                                                                        en</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="trabajo_en_diabetes" id="trabajo_en_diabetes">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="colaboracion_diabetes" id="colaboracion_diabetes">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="ob_log_diabetes" id="ob_log_diabetes">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">
                                                                        Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_res_trat_diabetes" id="com_res_trat_diabetes"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Comentario
                                                                        de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_sesion_diabetes" id="com_sesion_diabetes"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Nuevas indicaciones</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                                                        onblur="this.rows=1;" name="nuevas_indicaciones_diabetes" id="nuevas_indicaciones_diabetes"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- </form> --}}
                                    </div>
                                    <!--HIPERTENSIÓN-->
                                    <div class="tab-pane fade show" id="nutri_hipertension" role="tabpanel"
                                        aria-labelledby="nutri_hipertension_tab">
                                        {{-- <form> --}}
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control Hipertensión</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                            date = new Date().toLocaleDateString();
                                                            document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Presión
                                                                        Arterial</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="presion_arterial_hipertension"
                                                                        id="presion_arterial_hipertension">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso
                                                                        actual</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="peso_actual_hipertension"
                                                                        id="peso_actual_hipertension">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Variación</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="variacion_peso_hipertension"
                                                                        id="variacion_peso_hipertension">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="objetivo_logrado_hipertension" id="objetivo_logrado_hipertension">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión
                                                                        N°</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="num_sesion_hipertension" id="num_sesion_hipertension">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo
                                                                        en</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="trabajo_en_hipertension" id="trabajo_en_hipertension">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="colaboracion_hipertension" id="colaboracion_hipertension">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="ob_log_hipertension" id="ob_log_hipertension">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">
                                                                        Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_res_trat_hipertension" id="com_res_trat_hipertension"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Comentario
                                                                        de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_sesion_hipertension" id="com_sesion_hipertension"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Nuevas indicaciones</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                                                        onblur="this.rows=1;" name="nuevas_indicaciones_hipertension" id="nuevas_indicaciones_hipertension"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- </form> --}}
                                    </div>
                                    <!--DISLIPIDEMIAS-->
                                    <div class="tab-pane fade show" id="nutri_dislipidemias" role="tabpanel"
                                        aria-labelledby="nutri_dislipidemias_tab">
                                        {{-- <form> --}}
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control Dislipidemias</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                            date = new Date().toLocaleDateString();
                                                            document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Colesterol
                                                                        y trigico</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="colesterol_y_trigico"
                                                                        id="colesterol_y_trigico">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Colesterol
                                                                        y trigico actual</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="colesterol_y_trigico_actual"
                                                                        id="colesterol_y_trigico_actual">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Variación</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="variacion_trigico"
                                                                        id="variacion_trigico">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="objetivo_logrado_dislipidemia" id="objetivo_logrado_dislipidemia">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión
                                                                        N°</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="num_sesion_dislipidemia" id="num_sesion_dislipidemia">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo
                                                                        en</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="trabajo_en_dislipidemia" id="trabajo_en_dislipidemia">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="colaboracion_dislipidemia" id="colaboracion_dislipidemia">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="ob_log_dislipidemia" id="ob_log_dislipidemia">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">
                                                                        Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_res_trat_dislipidemia" id="com_res_trat_dislipidemia"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Comentario
                                                                        de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_sesion_dislipidemia" id="com_sesion"_dislipidemia></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Nuevas indicaciones</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                                                        onblur="this.rows=1;" name="nuevas_indicaciones_dislipidemia" id="nuevas_indicaciones_dislipidemia"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- </form> --}}
                                    </div>
                                    <!--INSUFICIENCIA RENAL-->
                                    <div class="tab-pane fade show" id="nutri_irenal" role="tabpanel"
                                        aria-labelledby="nutri_irenal_tab">
                                        {{-- <form> --}}
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control Insuficiencia
                                                        Renal</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                            date = new Date().toLocaleDateString();
                                                            document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Creatinina</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="creatina"
                                                                        id="creatina">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso
                                                                        actual</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="peso_actual_irenal"
                                                                        id="peso_actual_irenal">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Variación</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="variacion_peso_irenal"
                                                                        id="variacion_peso_irenal">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="objetivo_logrado_irenal" id="objetivo_logrado_irenal">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión
                                                                        N°</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="num_sesion_irenal" id="num_sesion_irenal">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo
                                                                        en</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="trabajo_en_irenal" id="trabajo_en_irenal">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="colaboracion_irenal" id="colaboracion_irenal">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="ob_log_irenal" id="ob_log_irenal">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">
                                                                        Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_res_trat_irenal" id="com_res_trat_irenal"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Comentario
                                                                        de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_sesion_irenal" id="com_sesion_irenal"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Nuevas indicaciones</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                                                        onblur="this.rows=1;" name="nuevas_indicaciones_irenal" id="nuevas_indicaciones_irenal"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- </form> --}}
                                    </div>
                                    <!--HIPERURICEMIA-->
                                    <div class="tab-pane fade show" id="nutri_hiperuric" role="tabpanel"
                                        aria-labelledby="nutri_hiperuric_tab">
                                        {{-- <form> --}}
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control HIPERURICEMIA</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                            date = new Date().toLocaleDateString();
                                                            document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Ac
                                                                        Úrico</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="ac_urico"
                                                                        id="ac_urico">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso
                                                                        actual</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="peso_actual_hiperuric"
                                                                        id="peso_actual_hiperuric">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Variación</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="variacion_peso_hiperuric"
                                                                        id="variacion_peso_hiperuric">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="objetivo_logrado_hiperuric" id="objetivo_logrado_hiperuric">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión
                                                                        N°</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="num_sesion_hiperuric" id="num_sesion_hiperuric">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo
                                                                        en</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="trabajo_en_hiperuric" id="trabajo_en_hiperuric">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label
                                                                        class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="colaboracion_hiperuric" id="colaboracion_hiperuric">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo
                                                                        logrado?</label>
                                                                    <select class="form-control form-control-sm"
                                                                        name="ob_log_hiperuric" id="ob_log_hiperuric">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Parcialmente">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">
                                                                        Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_res_trat_hiperuric" id="com_res_trat_hiperuric"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Comentario
                                                                        de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=2"
                                                                        onblur="this.rows=1;" name="com_sesion_hiperuric" id="com_sesion_hiperuric"></textarea>
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Nuevas indicaciones</label>
                                                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                                                        onblur="this.rows=1;" name="nuevas_indicaciones_hiperuric" id="nuevas_indicaciones_hiperuric"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- </form> --}}
                                    </div>
                                    <div class="card-informacion">
                                        <div class="card-body">
                                            <div class="form-row mt-3">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="objetivo_logrado_control">
                                                        <label class="form-check-label" for="objetivo_logrado_control">¿Objetivo del control logrado?</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                            <button type="button" class="btn btn-info" onclick="guardar_control('hiperuric')"><i
                                                    class="feather icon-save"></i> Guardar control</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--HISTORICO CONTROLES ATENCIÓN -->
                    <div class="tab-pane fade" id="h_control" role="tabpanel" aria-labelledby="h_control-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                <h6 class="text-c-blue f-20">Historial de controles</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                <div class="card-informacion">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div style="overflow-x:auto;">
                                                    <table id="tabla_planes" class="table table-bordered table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>Plan N°</th>
                                                                <th>Fecha inicio</th>

                                                                <th>Sesiones</th>
                                                                <th>Estado</th>
                                                                <th>Controles</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>

                                                    <hr>

                                                    <h5>Controles del Plan Seleccionado</h5>
                                                    <table id="tabla_controles" class="table table-bordered table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha</th>
                                                                <th>Sesión</th>
                                                                <th>Peso</th>
                                                                <th>Trabajo en</th>
                                                                <th>Objetivo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12">
                                <div class="card-informacion">
                                    <div class="card-body">
                                        <div id="contenedor_grafico_variacion_peso_controles">
                                            <canvas id="grafico_peso" height="100"></canvas>
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
</div>
<!--Modal reservar hora -->
<div class="modal fade" id="reservar_hora" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="reservar_hora" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h6 class="modal-title text-white f-18">Plan de tratamiento</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#reservar_hora').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_reserva_hora_id_profesional" id="modal_reserva_hora_id_profesional" value="">
                <input type="hidden" name="modal_reserva_hora_tipo_agenda" id="modal_reserva_hora_tipo_agenda" value="1">
                <form id="form_plan_nutri">
                    <div id="planificacion" class="form-row">
                        <div class="col-sm-12 mt-1 mb-3">
                            <div class="fill d-flex justify-content-between">
                                <h6 class="form_fono text-uppercase text-c-blue">INDICACIONES AL PACIENTE</h6>
                                <span id="numero_sesion" class="text-uppercase badge badge-warning pb-1 f-12"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                             <span id="consulta" class="badge badge-warning float-right mb-4 f-14"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        {{-- <div class="col-sm-4 mt-2">
                            <label class="floating-label-activo-sm">Fecha Inicio Tratamiento</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_inicio_tratamiento" id="fecha_inicio_tratamiento">
                        </div> --}}
                        <div class="col-sm-6 mt-2">
                            <label class="floating-label-activo-sm">Diagnóstico</label>
                            <input type="text" class="form-control form-control-sm" data-input_igual="hipotesis" name="diagnostico_tratamiento" id="diagnostico_tratamiento" onchange="cargarIgual('diagnostico_tratamiento')">
                        </div>
                        <div class="col-sm-6 mt-2">
                            <label class="floating-label-activo-sm">Tratamiento a seguir</label>
                            <input type="text" class="form-control form-control-sm" name="tratamiento_seguir" id="tratamiento_seguir">
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col-sm-3 col-md-4 col-lg-4 col-xl-3 mt-2">
                            <label class="floating-label-activo-sm">Número de Sesiones</label>
                            <input type="number" class="form-control form-control-sm" name="numero_sesiones" id="numero_sesiones">
                        </div>
                        <div class="col-sm-9 col-md-8 col-lg-8 col-xl-9 mt-2">
                            <label class="floating-label-activo-sm">Objetivos</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="objetivos" id="objetivos"></textarea>
                        </div>
                        <br>
                    </div>
                </form>
                <div id="contenedor_agendar_hora">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                    <label class="floating-label-activo-sm mb-0">Lugar de atención</label>
                                    <select class="form-control form-control-sm" id="modal_reserva_hora_lugar_atencion" name="modal_reserva_hora_lugar_atencion" onchange="carga_calendario_profesional();">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="mt-4">Usted atiende los dias <span id="modal_reserva_dias_atencion" class="hljs-strong"></span></label>
                            {{--  <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                </div>
                            </div>  --}}
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                    <label class="floating-label-activo-sm mb-0">Seleccione una fecha</label>
                                    {{-- <input class="form-control form-control-sm" type="date" name="modal_reserva_fecha" onchange="cargar_horas_disponibles_calendario_profesion(this.value);" id="modal_reserva_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?>  disabled="disabled"/> --}}
                                    <input class="form-control form-control-sm" type="date" name="modal_reserva_fecha" onchange="cargar_horas_disponibles_calendario_profesion(this.value);" id="modal_reserva_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?>  />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h6 class="text-petroleo" id="modal_reserva_fecha_seleccionada"></h6>
                        </div>
                        <div class="col-md-12">
                            <div class="row" id="modal_reserva_hora_lista_horas">
                                {{--  <div class="col-md-2 btn btn-outline-primary btn-sm btn-block">
                                    8:00
                                </div>  --}}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{--  <button type="button" class="btn btn-info"><i class="feather icon-check-circle"></i>
                                Reservar hora</button>  --}}
                            <h6>Seleccione  Lugar de Atención, Día en el calendario y haga click en la Hora Disponible.</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- MODAL AGREGAR HORA MEDICA -->
<div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info pt-3 pb-2">
                <h5 class="modal-title text-white text-center">Tomar hora</h5>
                <button id="cerrar_tomar_hora" type="button" class="close text-white close_agenda_agregar_paciente" onclick="$('#agenda_agregar_paciente').modal('hide');" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                {{--  BUSCADOR DE RUT  --}}
                <div class="row div_rut_buscar">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <h6 class="text-c-blue ml-2 mb-3">Ingrese el rut del paciente</h6>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8 mb-3">
                        <form id="validacion_rut_form">
                            <div class="form-group" id="validacion_rut_div">
                                <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <button class="btn btn-info" onclick="buscar_paciente();" type="button" id="button-addon2">
                            Buscar
                        </button>
                    </div>
                </div>



                <form id="form_reseva_de_horas">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="reserva_hora_id_profesional" name="reserva_hora_id_profesional" value="">
                    <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">
                    <input type="hidden" id="reserva_hora_id_lugar_atencion" name="reserva_hora_id_lugar_atencion" value="">
                    <input type="hidden" id="reserva_hora_fecha_consulta" name="reserva_hora_fecha_consulta" value="">
                    <input type="hidden" id="reserva_hora_hora_consulta" name="reserva_hora_hora_consulta" value="">
                    <input type="hidden" id="reserva_hora_origen" name="reserva_hora_origen" value="escritorio_paciente">
                    <input type="hidden" id="reserva_hora_id_asistente" name="reserva_hora_id_asistente" value="2">

                    {{--  VISUALIZACION DE DATOS DEL PACIENTE  --}}
                    <div id="reserva_datos_paciente" class="row mx-3">
                        <table class="table table-borderless table-xs">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <strong>Rut</strong>
                                    </th>
                                    <td><span id="reserva_rut_paciente"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Nombre</strong>
                                    </th>
                                    <td><span id="reserva_hora_nombre"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Fecha Nacimiento</strong>
                                    </th>
                                    <td><span id="reserva_fecha_nacimiento"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Sexo</strong>
                                    </th>
                                    <td><span id="reserva_sexo"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Convenio</strong>
                                    </th>
                                    <td><span id="reserva_convenio"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Dirección</strong>
                                    </th>
                                    <td><span id="reserva_direccion"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Correo Electrónico</strong>
                                    </th>
                                    <td id="reserva_hora_email"></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Teléfono</strong>
                                    </th>
                                    <td><span id="reserva_hora_telefono"></span></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Descripción Reserva</label>
                                <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                            </div>
                        </div>
                       <hr>

                               <div class="col-12 text-center">
                                    <!--<button type="button" class="btn btn-danger close_agenda_agregar_paciente" onclick="$('#agenda_agregar_paciente').modal('hide');" data-dismiss="modal">Cancelar</button>-->
                                    <button type="button" onclick="agendar_hora();" class="btn btn-info"><i class="feather icon-check"></i> Agendar Hora</button>
                                </div>

                    </div>

                    {{--  FORMULARIO DE PACIENTE NUEVO  --}}
                    <div id="reserva_agregar_paciente_hora">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    Paciente no registrado, complete los datos para registrar al paciente
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombres</label>
                                    <input type="text" required class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Primer Apellido</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Segundo Apellido</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">F. Nacimiento</label>
                                    <input type="date" class="form-control form-control-sm" name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sexo</label>
                                    <select id="reserva_hora_sexo" name="reserva_hora_sexo" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                    <select id="reserva_hora_profesion" name="reserva_hora_profesion" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($profesion_oficio))
                                            @foreach ($profesion_oficio as $prof_ofic)
                                                <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                    <select id="reserva_hora_convenio" name="reserva_hora_convenio" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($prevision))
                                            @foreach ($prevision as $p)
                                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-9 col-md-9">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                    <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                                </div>
                            </div>

                            <div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N&uacute;mero</label>
                                    <input type="address" class="form-control form-control-sm" name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Region</label>
                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control" required>
                                        <option value="0">Seleccione Regi&oacute;n</option>
                                        @if (isset($region))
                                            @foreach ($region as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                        <option value="0">Seleccione Ciudad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                    <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda()" name="reserva_hora_correo" id="reserva_hora_correo">
                                    <span id="mensaje_email_reserva" style="display:none"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                    <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Descrici&oacute;n Reserva</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="text-c-blue ml-2 mb-3">Enviar confirmaci&oacute;n</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                        <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                        <label class="custom-control-label" for="sms">SMS</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger close_agenda_agregar_paciente"  onclick="$('#agenda_agregar_paciente').modal('hide');">Cancelar</button>
                            <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();" class="btn btn-info">
                                Tomar Hora
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- FIN MODAL AGREGAR HORA MEDICA -->
<!-- MODAL CONTROL NUTRICIONAL HISTORIAL -->
<div class="modal fade" id="modalControlNutricional" tabindex="-1" role="dialog" aria-labelledby="modalControlNutricional" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h6 class="modal-title text-primary f-18">Control nutricional</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalControlNutricional').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                        <h6 class="text-c-blue f-20">Historial de controles</h6>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                        <div class="card-informacion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6" id="contenido_control_nutricional_historial">

                                    </div>
                                    <div class="col-md-6">
                                        <div id="grafico_control_peso">
                                            <canvas id="canvas_grafico_peso"></canvas>
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
</div>
<!-- FIN MODAL CONTROL NUTRICIONAL HISTORIAL -->
<!-- MODAL AGREGAR SESIONES -->
<div class="modal fade" id="agregar_sesiones" tabindex="-1" role="dialog" aria-labelledby="agregarSesionesLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="agregarSesionesLabel">Agregar Sesiones al Plan Nutricional</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <p>Estás finalizando las sesiones actuales. Si deseas continuar, ingresa la cantidad de nuevas sesiones que deseas agregar:</p>

        <div class="form-group">
          <label for="input_sesiones_adicionales">Cantidad de nuevas sesiones</label>
          <input type="number" class="form-control" id="input_sesiones_adicionales" min="1" placeholder="Ej: 3">
        </div>

        <div class="alert alert-danger d-none" id="error_sesion_alert">
          Debes ingresar una cantidad válida mayor a cero.
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
        <button type="button" class="btn btn-info" onclick="confirmar_agregar_sesiones()"><i class="feather icon-save"></i> Guardar</button>
      </div>

    </div>
  </div>
</div>
<!-- -->
@section('page-script-ficha-atencion')
 <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnGrabar = document.getElementById('btnGrabarvoz');
            const campoTexto = document.getElementById('com_inf_fono');
            const estado = document.getElementById('estado_voz_voz');

            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

            if (!SpeechRecognition) {
                btnGrabar.disabled = true;
                estado.textContent = 'Navegador no compatible con dictado por voz.';
                return;
            }

            const reconocimiento = new SpeechRecognition();
            reconocimiento.lang = 'es-CL';
            reconocimiento.continuous = false;
            reconocimiento.interimResults = false;

            btnGrabar.addEventListener('click', () => {
                reconocimiento.start();
                estado.textContent = '🎙️ Escuchando...';
            });

            reconocimiento.onresult = function (event) {
                const resultado = event.results[0][0].transcript;
                campoTexto.value += (campoTexto.value ? ' ' : '') + resultado;
            };

            reconocimiento.onend = function () {
                estado.textContent = '✅ Dictado finalizado.';
            };

            reconocimiento.onerror = function (event) {
                estado.textContent = '❌ Error: ' + event.error;
            };

        });

    </script>

    <script>
        $('#agregar_sesiones').on('hidden.bs.modal', function () {
            $('#reservar_hora').modal('show');
        });

        $(document).ready(function() {
            $('#select_1').select2();
            $('#select_2').select2();
            $('#select_3').select2();
            $('#select_4').select2();
            $('#select_5').select2();
            $('#select_6').select2();
            $('#select_7').select2();
            $('#select_8').select2();
            $('#select_9').select2();
            $('#select_10').select2();
            $('#select_11').select2();
            $('#select_12').select2();
            $('#select_13').select2();
            $('#select_14').select2();
            $('#select_15').select2();

            $('#form_ficha_nutri').on('submit', function(e) {
                const hora = $('#hora_agendada').val();
                const hipotesis = $('#hipotesis').val().trim(); // <- elimina espacios

                // Validar hipótesis primero
                if (!hipotesis) {
                    e.preventDefault(); // Detiene el envío
                    swal({
                        title: 'Campo obligatorio',
                        text: 'Debe ingresar una hipótesis antes de guardar.',
                        icon: 'error',
                        buttons: 'Aceptar',
                    });
                    return; // No seguir con otras validaciones
                }

                if (hora === '0') {
                    e.preventDefault(); // Detiene el envío temporalmente

                    swal({
                        title: '¿Está seguro?',
                        text: "No ha agendado el próximo control. ¿Desea continuar?",
                        icon: 'warning',
                        buttons: ["Cancelar", "Continuar cerrando"],
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            // Envía el formulario manualmente si el usuario confirma
                            $('#form_ficha_nutri')[0].submit();
                        }
                    });
                }
                // Si hora no es 1, el formulario se envía directamente
            });

            $('#tabla_controles').on('click', '.ver-detalle-control', function () {
                const idFicha = $(this).data('id-ficha');

                if (idFicha) {
                    dame_control(idFicha); // llama tu función existente
                }
            });
        });

        function cargarIgual(input)
    {

        let actual = $('#'+input);
        let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        $.each(equivalentes, function( index, value ) {
            var equivalente = $('#'+value);
            equivalente.val(actual.val());
        });

        // let actual = $('#'+input);
        // let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

        // equivalente.val(actual.val());

    }

          function agregar_medicamentos_ficha() {


            var rows1 = [];
            $('#tabla_medicamento_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["id_producto"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["uso_cronico"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["medicamento"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["presentacion"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["posologia"] = $.trim($(data[4]).text().split("\n").join(""));
                    rol["via_administracion"] = $.trim($(data[5]).text().split("\n").join(""));
                    rol["periodo"] = $.trim($(data[6]).text().split("\n").join(""));
                    rol["compra"] = $.trim($(data[7]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });

            $('#medicamentos').val(JSON.stringify(rows1));


        }

        function agregar_examenes_ficha() {
            var rows = [];
            $('#tabla_examen_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    console.log(i);
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                    // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["con_contraste"] = $.trim($(data[3]).text().split("\n").join(""));
                    rows.push(rol);
                }
            });
            $('#examenes').val(JSON.stringify(rows));
        }

        function internutri() {
            $('#modal_interconsulta').modal('show');
        }

        function informeNutri() {
            $('#informe_nutri').modal('show');
        }




        function examenes_nutri() {
            $('#indicar_examen_nutri').modal('show');
        }

        function e_plan_nutri() {
            $('#plan_nutri').modal('show');
        }

        function dieta_diaria_nutri() {
            $('#m_dieta_diaria').modal('show');
        }

        function encuesta_nutri() {
            $('#m_test_alimentacion_mens').modal('show');
        }

        function dieta_nutri() {
            $('#m_dieta_nutri').modal('show');
        }

        function dieta_diab() {
            $('#m_rec_diab').modal('show');
        }

        function raciones() {
            $('#m_raciones').modal('show');
        }

        function indicadores_nutri() {
            $('#m_indicadores_nutri').modal('show');
        }
    </script>
    <script>
        /** MENSAJE*/
        /** CARGAR mensaje */
        $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio el resto es  opcional.');
        $('#mensaje_ficha').show();
        setTimeout(function() {
            $('#mensaje_ficha').hide();
        }, 5000);

        @if ($fichas->count() > 0)
            $('#mensaje_historias').html(' El paciente posee historia medica previa. ');
        @else
            $('#mensaje_historias').html(' Primera consulta del paciente. ');
        @endif
        $('#mensaje_historias').show();
        setTimeout(function() {
            $('#mensaje_historias').hide();
        }, 6000);
    </script>

    <!--ALERTA DE ATENCION-->
    <script>
        window.setTimeout(function() {
            $(".alert-atencion").fadeTo(500, 0).slideUp(600, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
    <script>
        /*-Agendar hora medica-*/
        function hora_medica_pedir(id_profesional, id_lugar_atencion, tipo_agenda = null){

            $('#modal_reserva_hora_lugar_atencion').val('');
            $('#modal_reserva_dias_atencion').val('');
            $('#modal_reserva_fecha').val('');
            $('#modal_reserva_hora_lista_horas').html('');
            // asigno id profesioanl
            $('#modal_reserva_hora_id_profesional').val(id_profesional);
            $('#modal_reserva_hora_tipo_agenda').val(tipo_agenda);

            carga_calendario_profesional_pedir();

            // cargo lugares de atencion  y asigno lugar con hora mas proxima
            lugar_atencion_profesional($('#modal_reserva_hora_id_profesional'), 'modal_reserva_hora_lugar_atencion', id_lugar_atencion)
            $('#reservar_hora').modal('show');
        }

        function carga_calendario_profesional_pedir()
        {
            $('#modal_reserva_fecha').val('');
            $('#modal_reserva_fecha').attr('disabled',true);
            $('#modal_reserva_hora_lista_horas').html('');

            let id_profesional = $('#modal_reserva_hora_id_profesional').val();
            let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
            let url = "{{ route('profesional.DiasLaboralesProfesionaLugarAtencionBuscador') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_profesional: id_profesional,
                    lugar_atencion: id_lugar_atencion,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    {{--  calendario(data.registros.horario_agenda_laboral, data.registros.horario_agenda_no_laboral);  --}}

                    if(data.registros.horario_agenda_laboral != '')
                    {
                        console.log(data);
                        let dias = ['','LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                        var dias_activos = data.registros.horario_agenda_laboral.split(',');
                        var dias_texto = '';
                        var cant = 0;

                        $.each(dias_activos, function(index, value)
                        {
                            if(cant>0)
                                dias_texto += ' - '+dias[value];
                            else
                                dias_texto += dias[value];

                            cant++;
                        });

                        $('#modal_reserva_dias_atencion').html(dias_texto);

                        /** calendario */
                        $('#modal_reserva_fecha').attr('disabled',false);

                        $("#modal_reserva_fecha").flatpickr({
                            "disable": [
                                function(date) {
                                    return !dias_activos.includes(String(date.getDay()));
                                }
                            ],
                            minDate: "today",
                            maxDate: new Date(Date.now() + 60 * 24 * 60 * 60 * 1000), // 60 días desde hoy
                            locale: {
                                firstDayOfWeek: 1,
                                weekdays: {
                                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                                },
                                months: {
                                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                                longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                },
                            },
                        });
                        /** fin calendario */

                    }
                    else
                    {
                        $('#modal_reserva_dias_atencion').html('NO INFORMADOS');
                        $('#modal_reserva_fecha').attr('disabled',true);
                        $('#modal_reserva_fecha_seleccionada').html('');
                    }

                } else {
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }
        /** METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
        function  envio_indicaciones_pdf(id_modal){
            console.log(id_modal);
            let url = "{{ route('indicacion.medica.registro.envio') }}";
            var id_tipo_documento = 1;
            var id_paciente = $('#id_paciente_fc').val();
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var observacion = '';
            var observacion = $('#observacion_'+id_modal).val();
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
        /** FIN METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
        function lugar_atencion_profesional(element, div_destino, value_init = '')
        {
            let id_profesional = $(element).val();
            let url = "{{ route('profesional.lugaresAtencionProfesionalBuscador') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_profesional: id_profesional,
                    },
                })
                .done(function(data) {
                    if (data.estado == 1) {
                        {{--  console.log(data);  --}}
                        let input_lugar_atencion = $('#'+div_destino);

                        input_lugar_atencion.find('option').remove();
                        input_lugar_atencion.append('<option value="">Seleccione</option>');
                        $(data.registros).each(function(i, v) { // indice, valor
                            input_lugar_atencion.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })

                        if(value_init != '')
                        {
                            input_lugar_atencion.val(value_init);
                            carga_calendario_profesional_pedir();
                        }

                    } else {
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cargar_horas_disponibles_calendario_profesion(dia)
        {

            let id_profesional = $('#modal_reserva_hora_id_profesional').val();
            let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
            console.log('cargar_horas_disponibles_calendario_profesion');
            console.log(dia);

            let url = "{{ route('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    dia: dia,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1) {
                    $('#modal_reserva_fecha_seleccionada').html('Horas disponibles para el dia: '+data.text_fecha);

                    $('#modal_reserva_hora_lista_horas').html('');
                    $.each(data.registros, function(index, value)
                    {
                        var hr1 = moment(value.hora,'HH:mm:ss').format('HH:mm');
                        var html = '';
                        html += '<div class="col-md-2 btn btn-outline-primary btn-sm my-1 mx-1" data-hora="'+value.hora+'" onclick="generar_reserva_cita(\''+value.hora+'\');">';
                        html += ''+hr1;
                        html += '</div>';

                        $('#modal_reserva_hora_lista_horas').append(html);
                    });

                } else {
                    // alert('No se pudo Cargar las ciudades');
                    $('#modal_reserva_hora_lista_horas').html('<span style="font-weight: bold; text-align: center;">"Sin disponibilidad de Horas"</span>');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

    function generar_reserva_cita(hora)
    {
        console.log('generar_reserva_cita');
        $('.div_rut_buscar').hide();
        $('#form_reseva_de_horas').hide();
        $('#reserva_datos_paciente').hide();
        $('#reserva_agregar_paciente_hora').hide();

        $('#reservar_hora').modal('hide');

        let id_profesional = $('#modal_reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
        let fecha_consulta = $('#modal_reserva_fecha').val();
        $('#reserva_hora_id_profesional').val('');
        $('#reserva_hora_id_lugar_atencion').val('');
        $('#reserva_hora_fecha_consulta').val('');
        $('#reserva_hora_hora_consulta').val('');

        let url = "{{ route('paciente.get.informacion') }}";
        var datos = {};
        var id_dependiente_activo = '{{ $paciente->id }}';

        if(id_dependiente_activo != '')
            datos.id_dependiente_activo = id_dependiente_activo;

        $.ajax({
            url: url,
            type: "get",
            data: datos,
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                $('.div_rut_buscar').hide();
                $('#form_reseva_de_horas').show();
                $('#reserva_datos_paciente').show();
                $('#reserva_agregar_paciente_hora').hide();

                $('#agenda_agregar_paciente').modal('show');

                $('#reserva_hora_id_profesional').val(id_profesional);
                $('#reserva_hora_id_lugar_atencion').val(id_lugar_atencion);
                $('#reserva_hora_fecha_consulta').val(fecha_consulta);
                $('#reserva_hora_hora_consulta').val(hora);

                $('#reserva_hora_id_paciente').val(data.registro.id);

                $('#reserva_rut_paciente').html(data.registro.rut);
                $('#reserva_hora_nombre').html(data.registro.nombres + ' ' + data.registro.apellido_uno + ' ' + data.registro.apellido_dos);
                $('#reserva_fecha_nacimiento').html(data.registro.fecha_nac);
                if (data.registro.sexo == 'M') {
                    $('#reserva_sexo').text('Masculino');
                } else {
                    $('#reserva_sexo').text('Femenino');
                }
                $('#reserva_convenio').html(data.registro.prevision.nombre);
                $('#reserva_direccion').html(data.registro.direccion.direccion+' '+data.registro.direccion.numero_dir+', '+data.registro.direccion.ciudad.nombre);
                $('#reserva_hora_email').html(data.registro.email);
                $('#reserva_hora_telefono').html(data.registro.telefono_uno);



            }
            else
            {
                swal({
                    title: "Debe completar los datos de inscripción",
                    text: error,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{--  GENERAR HORA USUARIO EXISTENTE  --}}
    function agendar_hora() {

        let url = "{{ route('paciente.solicitar.hora') }}";
        let _token = $('#_token').val();
        let fecha_consulta = $('#reserva_hora_fecha_consulta').val()+' '+$('#reserva_hora_hora_consulta').val();
        let reserva_hora_id = $('#reserva_hora_id_paciente').val();
        let id_profesional = $('#reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#reserva_hora_id_lugar_atencion').val();
        let id_asistente = $('#reserva_hora_id_asistente').val();
        let origen = $('#reserva_hora_origen').val();

        let tipo_agenda = $('#modal_reserva_hora_tipo_agenda').val();
        var tipo_agenda_text = 'C';

        console.log(tipo_agenda);
        console.log(tipo_agenda_text);

        switch (tipo_agenda) {
            case '1':
                tipo_agenda_text = 'C';//CONSULTA
                break;
            case '2':
                tipo_agenda_text = 'D';//DENTAL
                break;
            case '3':
                tipo_agenda_text = 'T';//TELEMEDICINA
                break;
            case '4':
                tipo_agenda_text = 'E';//EXAMEN
                break;
        }

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                fecha_consulta: fecha_consulta,
                reserva_hora_id: reserva_hora_id,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
                id_asistente: id_asistente,
                origen: origen,
                tipo_hora_medica: tipo_agenda_text,
            }
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {

                data = JSON.parse(data);
                if(data.estado == 'error')
                {
                    swal({
                        title: "Error!",
                        text: data.msj,
                        icon: "error",
                        type: "error",
                        buttons: "Cerrar",
                    });
                }
                else
                {
                    swal({
                        title: "Hora Agendada Correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    });
                    guardar_plan_tratamiento_nutri();
                    $('#hora_agendada').val(1);
                    let esUltimaSesion = false;
                    if($('#finalizando_sesiones').val() == 1){
                        esUltimaSesion = true;
                    }
                    console.log(esUltimaSesion);
                }
                $('#agenda_agregar_paciente').modal('hide');

                    $('#reserva_hora_id_profesional').val('');
                    $('#reserva_hora_id_lugar_atencion').val('');
                    $('#reserva_hora_fecha_consulta').val('');
                    $('#reserva_hora_hora_consulta').val('');
                    $('#reserva_hora_id_paciente').val('');
                    $('#reserva_rut_paciente').html('');
                    $('#reserva_hora_nombre').html('');
                    $('#reserva_fecha_nacimiento').html('');
                    $('#reserva_sexo').text('');
                    $('#reserva_convenio').html('');
                    $('#reserva_direccion').html('');
                    $('#reserva_hora_email').html('');
                    $('#reserva_hora_telefono').html('');


            } else {

                swal({
                    title: "Error!",
                    text: "Problema en la solicitud de la hora",
                    icon: "error",
                    type: "error",
                    buttons: "Cerrar",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function guardar_plan_tratamiento_nutri() {
        const diagnostico = $('#diagnostico_tratamiento').val().trim();
        const tratamiento = $('#tratamiento_seguir').val().trim();
        const sesiones = $('#numero_sesiones').val().trim();
        const objetivos = $('#objetivos').val().trim();
        const id_ficha_atencion = $('#id_fc').val();

        // Validación simple
        if (!diagnostico || !sesiones || !objetivos) {
            swal({
                title: 'Error',
                text: 'Todos los campos obligatorios deben estar completos',
                icon: 'error'
            });
            return;
        }

        const data = {
            diagnostico: diagnostico,
            tratamiento: tratamiento,
            numero_sesiones: sesiones,
            objetivos: objetivos,
            id_ficha_atencion: id_ficha_atencion,
            _token: CSRF_TOKEN // Asegúrate de definir CSRF_TOKEN en tu vista
        };

        $.ajax({
            url: '{{ route("profesional.guardar_planificacion_nutri") }}', // Ajusta si tu ruta es diferente
            method: 'POST',
            data: data,
            success: function(response) {
                console.log(response);

                swal({
                    title: 'Éxito',
                    text: response.detalle || 'Planificación guardada correctamente',
                    icon: 'success'
                }).then(() => {
                    $('#plan_nutri').modal('hide');
                    $('#form_plan_nutri')[0].reset(); // limpia el formulario
                    // Aquí podrías recargar alguna parte de la vista si necesitas
                });
            },
            error: function(xhr) {
                let mensaje = 'Ocurrió un error al guardar la planificación.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error'
                });
                console.error(xhr.responseText);
            }
        });
    }

    function guardar_evaluacion_nutricional() {
        let datos_nutri = {};

        $('#atencion_nutri, #m_dieta_diaria, #m_indicadores_nutri').find('input, select, textarea').each(function() {
            let name = $(this).attr('name');
            if (!name) return;

            if ($(this).is(':checkbox')) {
                datos_nutri[name] = $(this).is(':checked') ? 1 : 0;
            } else if ($(this).is(':radio')) {
                if ($(this).is(':checked')) {
                    datos_nutri[name] = $(this).val();
                }
            } else {
                datos_nutri[name] = $(this).val();
            }
        });

        // Agrega los identificadores adicionales
        const payload = {
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_profesional: $('#id_profesional_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            datos_nutri: datos_nutri,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        console.log(datos_nutri);

        $.ajax({
            url: '{{ route("profesional.guardar_evaluacion_nutricional") }}', // Asegúrate que la ruta exista
            method: 'POST',
            data: payload,
            success: function(response) {
                console.log(response);
                swal({
                    title: 'Éxito',
                    text: response.detalle || 'Evaluación guardada correctamente.',
                    icon: 'success'
                });
            },
            error: function(xhr) {
                let mensaje = 'Error al guardar la evaluación.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error'
                });
                console.error(xhr.responseText);
            }
        });
    }


    function dame_plan_tratamiento(id_ficha_atencion){
        let url = "{{ route('profesional.dame_plan_tratamiento') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_ficha_atencion: id_ficha_atencion,
                id_profesional: $('#id_profesional_fc').val(),
                id_paciente: $('#id_paciente_fc').val(),
                hora_agendada : $('#hora_agendada').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje == 'ok') {
                var numero_sesion;
                var consulta = '';
                if(data.registro.sesion_actual == null || data.registro.sesion_actual == 0){
                    numero_sesion = 0 + ' de ' + data.registro.numero_sesiones + ' (No se ha iniciado tratamiento)';
                }else if(data.registro.sesion_actual == data.registro.numero_sesiones){
                    numero_sesion = 'Estamos finalizando el tratamiento con un total de ' + data.registro.numero_sesiones + ' sesiones';
                    consulta = '¿Desea continuar con mas sesiones? Presione <a href="javascript:void(0)" onclick="agregar_sesiones()"> aquí </a>';
                    $('#finalizando_sesiones').val(1);
                    $('#contenedor_agendar_hora').addClass('d-none', true);
                }
                else{
                    $('#contenedor_agendar_hora').removeClass('d-none', true);
                    $('#contenedor_agendar_hora').css('display','block');
                    numero_sesion = 'Vamos en la sesión '+parseInt(data.registro.sesion_actual) + ' de ' + data.registro.numero_sesiones + ' sesiones';
                }
                $('#id_plan').val(data.registro.id);
                $('#numero_sesion').html(numero_sesion);
                $('#consulta').html(consulta);
                $('#num_sesion_obesidad').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_diabetes').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_hipertension').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_dislipidemia').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_irenal').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_hiperuric').val(parseInt(data.registro.sesion_actual));
                $('#diagnostico_tratamiento').val(data.registro.diagnostico);
                $('#hipotesis').val(data.registro.diagnostico);
                $('#tratamiento_seguir').val(data.registro.tratamiento);
                $('#numero_sesiones').val(data.registro.numero_sesiones);
                $('#objetivos').val(data.registro.objetivos);
            } else {
                var numero_sesion = ' (No se ha iniciado tratamiento)';

                $('#numero_sesion').html(numero_sesion);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function dame_atencion_nutricional(){
        let id_ficha_atencion = $('#id_fc').val();
        let url = "{{ route('profesional.dame_evaluacion_nutricional') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_ficha_atencion: id_ficha_atencion,
                id_profesional: $('#id_profesional_fc').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje == 'ok') {
                let registros = data.registro;
                console.log(registros.select_1);
                $('#select_1').val(registros.select_1).trigger('change');
                $('#select_2').val(registros.select_2).trigger('change');
                $('#select_3').val(registros.select_3).trigger('change');
                $('#select_4').val(registros.select_4).trigger('change');
                $('#select_5').val(registros.select_5).trigger('change');
                $('#select_6').val(registros.select_6).trigger('change');
                $('#select_7').val(registros.select_7).trigger('change');
                $('#select_8').val(registros.select_8).trigger('change');
                $('#select_9').val(registros.select_9).trigger('change');
                $('#select_10').val(registros.select_10).trigger('change');
                $('#select_11').val(registros.select_11).trigger('change');
                $('#select_12').val(registros.select_12).trigger('change');
                $('#select_13').val(registros.select_13).trigger('change');
                $('#select_14').val(registros.select_14).trigger('change');
                $('#select_15').val(registros.select_15).trigger('change');
                // Recorremos todas las propiedades del objeto
                for (let key in registros) {
                    if (registros.hasOwnProperty(key)) {
                        // Buscamos un input, select o textarea que tenga el mismo ID
                        let $element = $('#' + key);

                        if ($element.length > 0) {
                            let value = registros[key];

                            // Establecemos el valor (null lo convertimos en vacío)
                            $element.val(value !== null ? value : '');
                        }
                    }
                }
            } else {
                // swal({
                //     title: "Error!",
                //     text: data.detalle,
                //     icon: "error",
                //     // buttons: "Aceptar",
                //     //SuccessMode: true,
                // });
                console.log('error');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function guardar_control(tipo = null){
        console.log(tipo);
        let datos_control = {};

        $('#control').find('input, select, textarea').each(function() {
            let name = $(this).attr('name');
            if (!name) return;

            if ($(this).is(':checkbox')) {
                datos_control[name] = $(this).is(':checked') ? 1 : 0;
            } else if ($(this).is(':radio')) {
                if ($(this).is(':checked')) {
                    datos_control[name] = $(this).val();
                }
            } else {
                datos_control[name] = $(this).val();
            }
        });

        // Agrega los identificadores adicionales
        const payload = {
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_profesional: $('#id_profesional_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            datos_control: datos_control,
            objetivo_logrado: $('#objetivo_logrado_control').is(':checked') ? 1 : 0,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        console.log(payload);
        $.ajax({
            url: '{{ route("profesional.guardar_control_nutricional") }}',
            method: 'POST',
            data: payload,
            success: function(response) {
                console.log(response);
                swal({
                    title: 'Éxito',
                    text: response.detalle || 'Evaluación nutricional guardada correctamente.',
                    icon: 'success'
                });
            },
            error: function(xhr) {
                let mensaje = 'Error al guardar la evaluación.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error'
                });
                console.error(xhr.responseText);
            }
        });
    }

    function dame_historial_controles(){
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let data = {
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_ficha_atencion: id_ficha_atencion,
            id_profesional: id_profesional,
            _token: CSRF_TOKEN
        }

        console.log(data);
        let url = "{{ route('profesional.dame_historial_controles_nutricionales') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje === 'ok') {
                if (data.mensaje === 'ok') {
                    const planes = data.planes;
                    const controlesAgrupados = data.controles_agrupados;

                    const tablaPlanes = $('#tabla_planes tbody');
                    tablaPlanes.empty();

                    planes.forEach(plan => {
                        const estado = plan.estado == 1 ? 'Activo' : 'Finalizado';

                        tablaPlanes.append(`
                            <tr>
                                <td>${plan.id}</td>
                                <td>${plan.fecha}</td>
                                <td>${plan.numero_sesiones}</td>
                                <td>${estado}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary ver-controles" data-plan="${plan.id}">
                                        Ver controles
                                    </button>
                                </td>
                            </tr>
                        `);
                    });

                    $('#tabla_planes').on('click', '.ver-controles', function () {
                            const planId = $(this).data('plan');
                            const controles = controlesAgrupados[planId];
                            console.log(controles);
                            const tablaControles = $('#tabla_controles tbody');
                            tablaControles.empty();

                            if (!controles || controles.length === 0) {
                                tablaControles.append('<tr><td colspan="6">Sin controles registrados para este plan.</td></tr>');
                                return;
                            }

                            controles.forEach((ctrl, index) => {
                                let fechaFormateada = '-';
                                if (ctrl.fecha) {
                                    const fecha = new Date(ctrl.fecha);
                                    fechaFormateada = fecha.toISOString().split('T')[0];
                                }

                                tablaControles.append(`
                                    <tr>

                                        <td>${fechaFormateada}</td>
                                        <td>${index + 1}</td> <!-- Número de sesión generado -->
                                        <td>${ctrl.peso_actual_control ?? '- kg'} </td>
                                        <td>${ctrl.trabajo_en_obesidad ?? 'Obesidad'}</td>
                                        <td>${ctrl.objetivo_logrado == 1 ? '✔️' : '❌'}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-info ver-detalle-control"
                                                data-id-ficha="${ctrl.id_ficha_atencion}">
                                                Ver detalle
                                            </button>
                                        </td>
                                    </tr>
                                `);
                            });
                            // Al final del $('#tabla_planes').on('click', '.ver-controles'...)
                            const labels = [];
                            const pesosIniciales = [];
                            const pesosActuales = [];

                            // Construimos los datos para el gráfico
                            controles.forEach((ctrl, index) => {
                                const fecha = new Date(ctrl.fecha).toISOString().split('T')[0];
                                const pesoInicial = parseFloat(ctrl.datos_control?.peso_inicial_control ?? 0);
                                const pesoActual = parseFloat(ctrl.datos_control?.peso_actual_control ?? 0);

                                labels.push(`Sesión ${index + 1}\n${fecha}`);
                                pesosIniciales.push(pesoInicial);
                                pesosActuales.push(pesoActual);
                            });

                            // Destruimos gráfico anterior si existe
                            if (window.graficoPesoInstance) {
                                window.graficoPesoInstance.destroy();
                            }

                            // Creamos el nuevo gráfico
                            const ctx = document.getElementById('grafico_peso').getContext('2d');
                            window.graficoPesoInstance = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: labels,
                                    datasets: [
                                        {
                                            label: 'Peso Inicial',
                                            data: pesosIniciales,
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                            tension: 0.3
                                        },
                                        {
                                            label: 'Peso Actual',
                                            data: pesosActuales,
                                            borderColor: 'rgba(255, 99, 132, 1)',
                                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                            tension: 0.3
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        title: {
                                            display: true,
                                            text: 'Evolución del Peso en Controles'
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: false,
                                            title: {
                                                display: true,
                                                text: 'Peso (kg)'
                                            }
                                        }
                                    }
                                }
                            });

                        });

                    }

            } else {
                swal({
                    title: "Sin registros",
                    text: data.detalle ?? 'No se encontraron controles.',
                    icon: "warning",
                    button: "Aceptar",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
            // swal({
            //     title: "Error!",
            //     text: "No se pudo cargar el historial de controles nutricionales.",
            //     icon: "error",
            //     // buttons: "Aceptar",
            //     //SuccessMode: true,
            // });
        });

    }



    function dame_control(id_ficha_atencion = null) {
        let historial = true;
        if (id_ficha_atencion == null) {
            id_ficha_atencion = $('#id_fc').val();
            historial = false;
        }

        let id_paciente = $('#id_paciente_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let url = "{{ route('profesional.dame_control_nutricional') }}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                _token: CSRF_TOKEN
            },
        })
        .done(function (data) {
            console.log(data);
            if (data.mensaje == 'ok') {
                let registros = data.registro.datos_control;
                console.log(registros);

                if (!historial) {
                    for (let key in registros) {
                        if (registros.hasOwnProperty(key)) {
                            let $element = $('#' + key);
                            if ($element.length > 0) {
                                let value = registros[key];
                                $element.val(value !== null ? value : '');
                            }
                        }
                    }
                } else {
                    $('#modalControlNutricional').modal('show');
                    let html = '';

                    for (let key in registros) {
                        if (registros.hasOwnProperty(key)) {
                            let valor = registros[key];

                            if (key.startsWith('num_sesion')) {
                                continue;
                            }

                            if (valor !== null && valor !== '' && valor !== '0') {
                                let label = key.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                                html += `
                                    <div class="mb-2">
                                        <strong>${label}:</strong> ${valor}
                                    </div>
                                `;
                            }
                        }
                    }

                    if (html === '') {
                        html = '<p class="text-muted">No hay información relevante para mostrar.</p>';
                    }

                    $('#contenido_control_nutricional_historial').html(html);

                    // === Agregar gráfico Chart.js ===
                    const pesoInicial = parseFloat(registros.peso_inicial_control);
                    const pesos = {
                        Obesidad: parseFloat(registros.peso_actual_control),
                        Diabetes: parseFloat(registros.peso_atual_diabetes),
                        Hipertensión: parseFloat(registros.peso_actual_hipertension),
                        Dislipidemia: parseFloat(registros.colesterol_y_trigico_actual),
                        Irenal: parseFloat(registros.peso_actual_irenal),
                        Hiperuricemia: parseFloat(registros.peso_actual_hiperuric)
                    };

                    const labels = [];
                    const valores = [];

                    for (const [condicion, peso] of Object.entries(pesos)) {
                        if (!isNaN(peso)) {
                            labels.push(condicion);
                            valores.push(peso);
                        }
                    }

                    const pesoBase = new Array(labels.length).fill(pesoInicial);

                    // Destruir gráfico anterior si ya existe
                    if (window.chartPeso) {
                        window.chartPeso.destroy();
                    }

                    // Asegurar que exista el canvas
                    $('#grafico_control_peso').html('<canvas id="canvas_grafico_peso"></canvas>');
                    const ctx = document.getElementById('canvas_grafico_peso').getContext('2d');

                    window.chartPeso = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: 'Peso Actual',
                                    data: valores,
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    fill: false,
                                    tension: 0.3
                                },
                                {
                                    label: 'Peso Inicial',
                                    data: pesoBase,
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderDash: [5, 5],
                                    fill: false,
                                    tension: 0
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                                title: {
                                    display: true,
                                    text: 'Evolución del Peso por Condición'
                                }
                            }
                        }
                    });
                }
            } else {
                console.log('No se pudo cargar el control nutricional.');
                $('#num_sesion_obesidad').val(data.num_sesion);
                $('#num_sesion_diabetes').val(data.num_sesion);
                $('#num_sesion_hipertension').val(data.num_sesion);
                $('#num_sesion_dislipidemia').val(data.num_sesion);
                $('#num_sesion_irenal').val(data.num_sesion);
                $('#num_sesion_hiperuric').val(data.num_sesion);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
            console.log('Error al cargar el control nutricional.');
        });
    }


    function calcularVariacionPeso() {
        let pesoInicial = parseFloat($('#peso_inicial_control').val());
        let pesoActual = parseFloat($('#peso_actual_control').val());

        if (!isNaN(pesoInicial) && !isNaN(pesoActual)) {
            let variacion = pesoActual - pesoInicial;
            if(variacion > 0){
                $('#peso_variacion_control').css('color','red');
            }else if(variacion <= 0){
                $('#peso_variacion_control').css('color','blue');
            }else{
                $('#peso_variacion_control').css('color','blue');
            }
            $('#peso_variacion_control').css('font-weight','bold');
            $('#peso_variacion_control').val(variacion.toFixed(1));
        } else {
            $('#peso_variacion_control').val('');
        }
    }

    function agregar_sesiones(){
        $('#reservar_hora').modal('hide');
        $('#agregar_sesiones').modal('show');
    }

    function confirmar_agregar_sesiones() {
        let cantidad = parseInt($('#input_sesiones_adicionales').val());

        if (isNaN(cantidad) || cantidad <= 0) {
            $('#error_sesion_alert').removeClass('d-none');
            return;
        }

        $('#error_sesion_alert').addClass('d-none');
        $('#agregar_sesiones').modal('hide');

        // Obtener variables desde los inputs ocultos
        let id_profesional = $('#id_profesional_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_plan = $('#id_plan').val();
        let _token = $('meta[name="csrf-token"]').attr('content');

        let url = "{{ route('profesional.continuar_sesiones_nutricion') }}";

        $.ajax({
            url: url,
            method: "POST",
            data: {
                _token: _token,
                id_plan: id_plan,
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                id_ficha_atencion: id_ficha_atencion,
                nuevas_sesiones: cantidad
            },
            success: function(response) {
                console.log('Sesiones agregadas correctamente:', response);
                swal({
                    title: "Sesiones actualizadas",
                    text: "Se han agregado " + cantidad + " sesiones al tratamiento.",
                    icon: "success",
                    buttons: "Aceptar"
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al agregar sesiones:', error);
                swal({
                    title: "Error",
                    text: "Ocurrió un problema al intentar agregar sesiones.",
                    icon: "error",
                    buttons: "Cerrar"
                });
            }
        });
    }


    </script>
    @endsection
