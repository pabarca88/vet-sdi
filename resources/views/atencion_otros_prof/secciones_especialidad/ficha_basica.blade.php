<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_basica-tab" data-toggle="tab" href="#atencion_basica" role="tab" aria-controls="atencion_enfermera" aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ns-tab" data-toggle="tab" href="#ns" role="tab" aria-controls="ns" aria-selected="false">Control Niño Sano</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_orl') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    @csrf
                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_basica" role="tabpanel" aria-labelledby="atencion_basica-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--FORMULARIO / MENOR DE EDAD-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--MOTIVO CONSULTA-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="motivo">
                                                    <button class="accor-closed btn card-act-open pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Anamnesis</label>
                                                                <textarea class="caja-texto form-control form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="anamnesis" id="anamnesis"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--EXAMEN ESPECIALIDAD ENFERMERA - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                        Examen y control
                                                    </button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row" id="form-enf">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Examen y control </label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--EXAMEN ESPECIALIDAD GINECO - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_gin">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_gin_c" aria-expanded="false" aria-controls="exam_esp_gin_c">
                                                        Planificación y tratamiento
                                                    </button>
                                                </div>
                                                <div id="exam_esp_gin_c" class="collapse" aria-labelledby="exam_esp_gin" data-parent="#exam_esp_gin">
                                                    <div class="card-body-aten-a">
                                                        <div id="form-orl-adulto">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Planificación y tratamiento</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--CONTROL DOMICILIARIO-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="diagnostico">
                                                    <button class="accor-closed card-act-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                       Control Domiciliario
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                    <div class="card-body-aten-a">
                                                        <form>
                                                            <div class="form-row" hidden>
                                                                <h6 class="mb-3">I.- Responsable Tratamiento</h6>
                                                            </div>
                                                            <div class="form-row">
                                                                <!--<div class="form-group col-md-6">
                                                                    <p class="font-italic mt-0 mb-0 text-black">
                                                                        @php
                                                                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                                                            $fecha = \Carbon\Carbon::parse(now());
                                                                            $mes = $meses[($fecha->format('n')) - 1];
                                                                            $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y') ;

                                                                        @endphp
                                                                        {{ $fecha }}
                                                                    </p>
                                                                </div>-->

                                                                <div class="form-group col-md-6" hidden>
                                                                    <label class="floating-label">Clave Responsable</label>
                                                                    <input   type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <h6 class="my-3">I.- Oral</h6>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="rn">
                                                                            <label class="custom-control-label" for="rn">Med_1</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-2">
                                                                            <label class="custom-control-label" for="mes-2">Med_2</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-4">
                                                                            <label class="custom-control-label" for="mes-4">Med_3</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                        <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <h6 class="my-3">II.- SUEROS E INYECTABLES</h6>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="floating-label">Suero Tipo/ hora de inicio /gotas/min</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="floating-label">Otras tratamientos parenterales</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--DIAGNÓSTICO-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="diagnostico">
                                                    <button class="accor-closed card-act-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                        Diagnóstico
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis" name="hip-diag_spec" id="hip-diag_spec" onchange="cargarIgual('hip-diag_spec')" >
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Indicaciones</label>
                                                                <input type="text" class="form-control form-control-sm" name="ind_orl" id="ind_orl">
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

                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="row">
                            <!--Formulario / Signos vitales y otros-->
                            @include('general.secciones_ficha.signos_vitales')
                            <!--Cierre: Formulario / Signos vitales y otros-->
                        </div>

                    </div>
                    {{--  div de botones  --}}
                    <div class="bg-white shadow-none rounded  p-15">

                        <!--GUARDAR O IMPRIMIR FICHA-->
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('page-script-ficha-atencion')

@endsection


