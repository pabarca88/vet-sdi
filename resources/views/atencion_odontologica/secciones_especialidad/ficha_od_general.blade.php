<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_dent_endo_tab" data-toggle="tab"
                            href="#atencion_dent_endo" role="tab" aria-controls="atencion_dent_endo"
                            aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="odontograma_gral_tab" data-toggle="tab"
                            href="#odontograma_gral" role="tab" aria-controls="odontograma_gral"
                            aria-selected="false">Odontograma</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="eval_periimpl_tab" data-toggle="tab"
                            href="#eval_periimpl" role="tab" aria-controls="eval_periimpl"
                            aria-selected="false">Evaluación-Periodontológica</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="evaluacion_general_tab" data-toggle="tab"
                            href="#evaluacion_general" role="tab" aria-controls="evaluacion_general"
                            aria-selected="false">Caras y grupos</a>
                    </li>
                    {{--  <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tratamiento_tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento/Presupuesto</a>
                    </li>  --}}
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="presupuesto_tab" onclick="actualizar_presupuesto()"
                            data-toggle="tab" href="#presupuesto" role="tab" aria-controls="presupuesto"
                            aria-selected="false">Presupuesto</a>
                    </li>
                </ul>
            </div>
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
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('dental.registrar_ficha_atencion_dental') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}"
                        id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}"
                        id="id_profesional_fc">
                    <input type="hidden" name="id_especialidad" id="id_especialidad"
                        value="{{ $profesional->id_especialidad }}">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion"
                        value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                    <input type="hidden" name="tipo_examen_especial" id="tipo_examen_especial"
                        value="{{ $lista_examen_especial }}">
                    <input type="hidden" name="ficha_id_atencion_dental_odon" id="ficha_id_atencion_dental_odon"
                        value="{{ $id_ficha_atencion }}">
                    <input type="hidden" name="ficha_id_lugar_atencion" id="ficha_id_lugar_atencion"
                        value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="id_presupuesto" id="id_presupuesto" value="{{ isset($presupuesto) ? $presupuesto->id : '' }}">
                    <input type="hidden" name="id_tratamiento_urgencia" id="id_tratamiento_urgencia" value="" />
                    <input type="hidden" name="id_tratamiento" id="id_tratamiento" value="" />
                    @csrf
                    <div class="tab-content" id="od_endo-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_dent_endo" role="tabpanel"
                            aria-labelledby="atencion_dent_endo_tab">
                            <!--FORMULARIOS-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                @include('general.secciones_ficha.seccion_menor')
                            </div>
                            <!--Motivo consulta-->

                            @include('atencion_odontologica.generales.motivo_consulta')
                            <!--EXAMEN ODONT GENERAL - PARAMETROS DE CONTROL-->
                            <!--ODONTOLOGIA URGENCIA-->
                            @include('atencion_odontologica.generales.control_urgencias')
                            @include('atencion_odontologica.generales.odonto_gral')

                            <!--CONTROL ODONTOLOGICO-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="control_odontologico">
                                        <button
                                            class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open "
                                            type="button" data-toggle="collapse"
                                            data-target="#control_odontologico-c" aria-expanded="false"
                                            aria-controls="control_odontologico-c" onclick="proxima_atencion_paciente(); dame_evoluciones_od_gral();">
                                            Evoluciones
                                        </button>
                                    </div>
                                    <div id="control_odontologico-c" class="collapse"
                                        aria-labelledby="control_odontologico" data-parent="#control_odontologico">
                                        <div class="card-body-aten-a shadow-none">
                                            @include('atencion_odontologica.generales.control_odontologico')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  <!--FORMULARIO / SIGNOS VITALES Y OTROS-->
                            @include('general.secciones_ficha.signos_vitales')  --}}

                            {{--  <!--CRONICOS / GES / CONFIDENCIAL -->
                            @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')  --}}
                            <!--Diagnóstico-->
                            @include('general.secciones_ficha.diagnostico')
                            <!--Diagnóstico-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-purple mt-1"
                                            onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); "
                                            value="Guardar Ficha y Finalizar su Consulta">
                                        <input type="submit" class="btn btn-info mt-1"
                                            onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); "
                                            value="Guardar Ficha e ir a su Agenda">
                                    </div>
                                </div>
                            </div>
                            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        </div>
                        <div class="tab-pane fade" id="eval_periimpl" role="tabpanel"
                            aria-labelledby="eval_periimpl_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        @include('atencion_odontologica.generales.periodontograma_general')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--IMPLANTES ADULTO-->
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="periimplante_adulto">
                                        <!--ARCADA SUPERIOR-->
                                        <div class="tab-pane fade active show " id="eval_18" role="tabpanel"
                                            aria-labelledby="eval_18_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_1_8')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="eval_17" role="tabpanel"
                                            aria-labelledby="eval_17_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_1_7')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="eval_16" role="tabpanel"
                                            aria-labelledby="eval_16_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_1_6')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_15" role="tabpanel"
                                            aria-labelledby="eval_15_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_1_5')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_14" role="tabpanel"
                                            aria-labelledby="eval_14_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_1_4')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_13" role="tabpanel"
                                            aria-labelledby="eval_13_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_1_3')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_12" role="tabpanel"
                                            aria-labelledby="eval_12_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_1_2')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_11" role="tabpanel"
                                            aria-labelledby="eval_11_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_1_1')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_21" role="tabpanel"
                                            aria-labelledby="eval_21_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_2_1')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_22" role="tabpanel"
                                            aria-labelledby="eval_22_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_2_2')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_23" role="tabpanel"
                                            aria-labelledby="eval_23_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_2_3')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_24" role="tabpanel"
                                            aria-labelledby="eval_24_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_2_4')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_25" role="tabpanel"
                                            aria-labelledby="eval_25_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_2_5')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_26" role="tabpanel"
                                            aria-labelledby="eval_26_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_2_6')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_27" role="tabpanel"
                                            aria-labelledby="eval_27_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_2_7')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_28" role="tabpanel"
                                            aria-labelledby="eval_28_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_2_8')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ARCADA INFERIOR-->
                                        <div class="tab-pane fade  show " id="eval_48" role="tabpanel"
                                            aria-labelledby="eval_48_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_4_8')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_47" role="tabpanel"
                                            aria-labelledby="eval_47_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_4_7')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_46" role="tabpanel"
                                            aria-labelledby="eval_46_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_4_6')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_45" role="tabpanel"
                                            aria-labelledby="eval_45_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_4_5')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_44" role="tabpanel"
                                            aria-labelledby="eval_44_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_4_4')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_43" role="tabpanel"
                                            aria-labelledby="eval_43_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_4_3')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_42" role="tabpanel"
                                            aria-labelledby="eval_42_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_4_2')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_41" role="tabpanel"
                                            aria-labelledby="eval_41_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_4_1')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_31" role="tabpanel"
                                            aria-labelledby="eval_31_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_3_1')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_32" role="tabpanel"
                                            aria-labelledby="eval_32_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_3_2')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_33" role="tabpanel"
                                            aria-labelledby="eval_33_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_3_3')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade  show " id="eval_34" role="tabpanel"
                                            aria-labelledby="eval_34_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_3_4')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_35" role="tabpanel"
                                            aria-labelledby="eval_35_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_3_5')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_36" role="tabpanel"
                                            aria-labelledby="eval_36_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_3_6')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_37" role="tabpanel"
                                            aria-labelledby="eval_37_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_3_7')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade  show " id="eval_38" role="tabpanel"
                                            aria-labelledby="eval_38_tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        @include('atencion_odontologica.generales.pieza_3_8')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- ODONTOGRAMA-->
                        <div class="tab-pane fade show " id="odontograma_gral" role="tabpanel"
                            aria-labelledby="odontograma_gral-tab">
                            <div class="col-12 px-0">
                                <ul class="nav nav-tabs-secciones mb-3 mt-1" id="odonto_general" role="tablist">
                                    <li class="nav-item-secciones">
                                        <a class="nav-secciones active text-uppercase" id="odonto_adulto_tab"
                                            data-toggle="tab" href="#odonto_adulto" role="tab"
                                            aria-controls="odonto_adulto" aria-selected="true">Odontograma Adulto</a>
                                    </li>
                                    <li class="nav-item-secciones">
                                        <a class="nav-secciones text-uppercase" id="odonto_infan_tab"
                                            data-toggle="tab" href="#odonto_infan" role="tab"
                                            aria-controls="odonto_infan" aria-selected="false">Odontograma
                                            Pediátrico</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 px-0">
                                <div class="tab-content" id="odontograma_gral">
                                    <div class="tab-pane fade show active" id="odonto_adulto" role="tabpanel"
                                        aria-labelledby="odonto_adulto_tab">
                                        <div class="row">
                                            <div class="col-md-12">

                                                @include('atencion_odontologica.generales.odontograma_adulto')

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="odonto_infan" role="tabpanel"
                                        aria-labelledby="odonto_infan_tab">
                                        <div class="row">
                                            <div class="col-md-12">

                                                @include('atencion_odontologica.generales.odontograma_infantil')

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ODONTOGRAMA--->

                        <div class="tab-pane fade" id="evaluacion_general" role="tabpanel"
                            aria-labelledby="evaluacion_general_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10"
                                                            id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active"
                                                                    id="eval_adults_tab" data-toggle="tab"
                                                                    href="#eval_adults" role="tab"
                                                                    aria-controls="eval_adults"
                                                                    aria-selected="true">Adulto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset"
                                                                    id="eval_infts_tab" data-toggle="tab"
                                                                    href="#eval_infts" role="tab"
                                                                    aria-controls="eval_infts"
                                                                    aria-selected="false">Evaluación Infantil</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="gral_od_adulto">
                                                            <!-ADULTO-->
                                                                <div class="tab-pane fade active show "
                                                                    id="eval_adults" role="tabpanel"
                                                                    aria-labelledby="eval_adults_tab">
                                                                    @include('atencion_odontologica.generales.evaluacion_adulto')
                                                                </div>
                                                                <!-NIÑOS-->
                                                                    <div class="tab-pane fade" id="eval_infts"
                                                                        role="tabpanel"
                                                                        aria-labelledby="eval_infts_tab">
                                                                        @include('atencion_odontologica.generales.evaluacion_infantil')
                                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: EVALUACION--->
                        <!-- TRATAMIENTO-->
                        <div class="tab-pane fade" id="tratamiento" role="tabpanel"
                            aria-labelledby="tratamiento_tab">
                            @include('atencion_odontologica.generales.tratamiento_presup')
                        </div>
                        <!--CIERRE: TRATAMIENTO--->
                        <!--CIERRE: PRESUPUESTO--->
                        <div class="tab-pane fade" id="presupuesto" role="tabpanel"
                            aria-labelledby="presupuesto_tab">
                            @include('atencion_odontologica.generales.presupuesto')
                        </div>
                        <!--CIERRE: PRESUPUESTO--->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('atencion_odontologica.modals.odontograma.tratamiento_boca_completa')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_inferior')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_superior')
@include('atencion_odontologica.modals.odontograma.tratamiento_laboratorio')
@include('atencion_odontologica.modals.odontograma.modal_odontograma')
<div id="modal_autorizacion_presupuesto" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="Recepcion de bonos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_autorizacionLabel">Autorización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="cerrar_autorizacion_presupuesto();"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body d-flex justify-content-between">
                <button class="btn btn-info btn-sm shadow-sm" type="button" onclick="abrir_autorizacion();"><i
                        class="feather feather icon-lock f-12"></i> ENVIAR AUTORIZACION PRESUPUESTO</button>
                <button class="btn btn-sm btn-danger" onclick="cerrar_autorizacion_presupuesto();">Cerrar</button>
            </div>
        </div>
    </div>
</div>



@include('atencion_odontologica.modals.infantil.tratamiento_boca_completainf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_inferiorinf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_superiorinf')
@include('atencion_odontologica.modals.atencion_general.formularios_generales.m_info_lab')
@include('atencion_odontologica.modals.odontograma.modal_insumos')
@include('atencion_odontologica.modals.odontograma.modal_insumos_editar')
@include('atencion_odontologica.modals.odontograma.modal_insumos_urgencias')
<!--Modal reservar hora -->
<div class="modal fade" id="reservar_hora" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="reservar_hora" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h6 class="modal-title text-white f-18">Agendar nueva cita</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#reservar_hora').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_reserva_hora_id_profesional" id="modal_reserva_hora_id_profesional" value="">
                <input type="hidden" name="modal_reserva_hora_tipo_agenda" id="modal_reserva_hora_tipo_agenda" value="1">

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
                            <div class="row pl-3" id="modal_reserva_hora_lista_horas">

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

@section('page-script-ficha-atencion')
    <script>
        $(document).ready(function() {
            $('#motivo_urg_odped').select2();
            $('#pzas_odp_urg').select2();
            /* formatear rut */
            $("#solicitado_por_rut_rfl").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator: false
            });

            $('#descripcion_hipotesis').keyup(function() {
                if ($.trim(this.value) != '') {
                    $('.btn_agregar_medicamento').removeAttr("disabled");
                    $('.btn_medicamento_pdf').removeAttr("disabled");
                    $('.btn_agregar_examen').removeAttr("disabled");
                    $('.btn_examenes_pdf').removeAttr("disabled");
                } else {
                    $('.btn_agregar_medicamento').attr('disabled', 'disabled');
                    $('.btn_medicamento_pdf').attr('disabled', 'disabled');
                    $('.btn_agregar_examen').attr('disabled', 'disabled');
                    $('.btn_examenes_pdf').attr('disabled', 'disabled');
                }
            });

            $("#descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $("#lic_descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#lic_descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_lic_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            /** cronico */
            /** autocomplete de medicamentos generales */
            $("#nombre_medicamentocron").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron').val(ui.item.label);
                    $('#id_medicamento_cronico').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_cronicomes');
                    return false;
                }
            });

            /** autocomplete de medicamentos patologia */
            $("#nombre_medicamentocron_patologia").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron_patologia').val(ui.item.label);
                    $('#id_medicamentocron_patologia').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_medicamentocron_patologia');
                    return false;
                }
            });

            /** accion check confidencial */
            $('#confidencial').change(function() {
                if ($('#confidencial').is(':checked')) {
                    $('#confidencial_descripcion').show();
                } else {
                    $('#confidencial_descripcion').hide();
                }
            });

            /** accion check ges */
            $('#modal_ges').change(function() {
                if ($('#modal_ges').is(':checked')) {
                    $('#form_ges').modal('show');
                } else {
                    $('#form_ges').modal('hide');
                }
            });

            /** busqueda de diagnostico GES */
            $("#nombre_ges").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('ges.ver') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#nombre_ges').val(ui.item.label); // display the selected text
                    $('#id_ges').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            const piezasSelect_ = $('#paciente_piezas_dentales_urg');
            // Control de selección de piezas en el odontograma
            $('.pieza_urg').on('click', function() {
                const piezaNumero = $(this).data('pieza_urg')
            .toString(); // Convertir a string por seguridad

                if ($(this).hasClass('seleccionada')) {
                    // Si ya está seleccionada, deseleccionarla
                    $(this).removeClass('seleccionada');
                    const options = piezasSelect_.val().filter(item => item !==
                    piezaNumero); // Filtra el elemento a eliminar
                    piezasSelect_.val(options).trigger('change');
                } else {
                    // Si no está seleccionada, agregarla
                    $(this).addClass('seleccionada');

                    let opcionesSeleccionadas = piezasSelect_.val() || [];
                    if (!opcionesSeleccionadas.includes(piezaNumero)) {
                        opcionesSeleccionadas.push(piezaNumero);
                    }

                    piezasSelect_.val(opcionesSeleccionadas).trigger('change');
                }
            });

            const piezasSelect_odontop = $('#paciente_piezas_dentales_ex_odped_urg');
            // Control de selección de piezas en el odontograma
            $('.pieza_odped_urg').on('click', function() {
                const piezaNumero = $(this).data('pieza_odpediat_urg')
            .toString(); // Convertir a string por seguridad

                if ($(this).hasClass('seleccionada')) {
                    // Si ya está seleccionada, deseleccionarla
                    $(this).removeClass('seleccionada');
                    const options = piezasSelect_odontop.val().filter(item => item !==
                    piezaNumero); // Filtra el elemento a eliminar
                    piezasSelect_odontop.val(options).trigger('change');
                } else {
                    // Si no está seleccionada, agregarla
                    $(this).addClass('seleccionada');

                    let opcionesSeleccionadas = piezasSelect_odontop.val() || [];
                    if (!opcionesSeleccionadas.includes(piezaNumero)) {
                        opcionesSeleccionadas.push(piezaNumero);
                    }

                    piezasSelect_odontop.val(opcionesSeleccionadas).trigger('change');
                }
            });

        });

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
        let descripcion = $('#reserva_hora_descripcion').val();

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
                descripcion: descripcion
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

                    proxima_atencion_paciente();


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

        function pagar_presupuesto_urg(){
            $('#modalPagoUrgencia').modal('show');

            // Cargar la información de pagos al abrir el modal
            actualizar_presupuesto_urgencia();
        }





        function abrir_modal_insumos() {
            $('#modal_insumos').modal('show');
        }



        function dame_marcas_implantes(value) {
            let id_tipo_insumo = value.value;
            let tipo_insumo_text = value.options[value.selectedIndex].text;
            console.log(tipo_insumo_text);
            $('#titulo_tipo_insumo').html(tipo_insumo_text);
            if (id_tipo_insumo == 1) {
                // quitar la clase d-none al select de marcas
                $('#marcas_implantes_select').removeClass('d-none');
                $('#insumos_select').addClass('d-none');
            } else {
                // quitar la clase d-none al select de marcas
                $('#marcas_implantes_select').addClass('d-none');
                $('#insumos_select').removeClass('d-none');
            }
            let url = '{{ ROUTE('dental.dame_implantes_dental') }}';
            let data = {
                id_tipo_insumo: id_tipo_insumo,
                _token: CSRF_TOKEN
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    $('#nombreInsumo').empty();
                    let insumos = resp;
                    insumos.forEach(e => {
                        $('#nombreInsumo').append(`
                    <option value="${e.id}"> ${e.descripcion} </option>
                    `);
                    });
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            })
        }

        function dame_insumos_tratamiento() {
            let id_ficha_atencion = $('#id_fc').val();
            let id_paciente = $('#id_paciente_fc').val();

            let url = "{{ route('dental.dame_insumos_tratamiento') }}";
            if (id_paciente == '' || id_paciente == null) {
                id_paciente = $('#id_paciente').val();
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id_ficha_atencion: id_ficha_atencion,
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    swal({
                        title: 'info',
                        text: 'Cargando ...',
                        icon: 'info'
                    });
                },
                success: function(response) {
                    swal.close();
                    console.log(response);
                    if (response.mensaje == 'ok') {
                        $('#prot_implante').empty();
                        let insumos = response.insumos;
                        // Agrega las nuevas opciones desde la respuesta
                        insumos.forEach(function(item) {
                            $('#prot_implante').append(
                                $('<option>', {
                                    value: item.id,
                                    text: item.insumos + ' ' + item.nombre_marca
                                })
                            );
                        });

                        // Refresca select2 para mostrar los nuevos datos
                        $('#prot_implante').trigger('change');
                    } else {
                        swal({
                            title: 'Error',
                            text: response.mensaje,
                            icon: 'error'
                        });
                    }

                }
            });
        }

        function guardar_insumo() {
            let nombreInsumo = $('#nombreInsumo option:selected').text();
            let tipoInsumo = $('#tipoInsumo').val();
            if (tipoInsumo == 1) {
                var marcaInsumo = $('#marcasImplantes option:selected').text();
            } else {
                var marcaInsumo = '';
            }
            var idMarcaInsumo = $('#marcasImplantes').val();
            console.log(idMarcaInsumo);
            let tipoInsumo_text = $('#tipoInsumo option:selected').text();
            let cantidad = $('#cantidad').val();
            let precio = $('#precio').val();
            let total = $('#total').val();

            console.log(tipoInsumo);

            let mensaje = '';
            let valido = 1;

            if (nombreInsumo == '') {
                valido = 0;
                mensaje += '<li>Nombre insumo </li>';
            }
            if (tipoInsumo == 0) {
                valido = 0;
                mensaje += '<li>Tipo de Insumo </li>';
            }
            if (cantidad == '' || cantidad <= 0) {
                valido = 0;
                mensaje += '<li>Cantidad </li>';
            }
            if (precio == '' || cantidad <= 0) {
                valido = 0;
                mensaje += '<li>Precio </li>';
            }

            if (valido == 1) {
                let data = {
                    insumos: nombreInsumo,
                    idTipoInsumo: tipoInsumo,
                    tipoInsumo: tipoInsumo_text,
                    marcaInsumo: marcaInsumo,
                    idMarcaInsumo: idMarcaInsumo,
                    cantidad: cantidad,
                    valor: precio,
                    total: total,
                    id_paciente: $('#id_paciente_fc').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    observaciones: $('#insumos_obs_tto').val(),
                    _token: CSRF_TOKEN
                }

                console.log(data);
                let url = '{{ ROUTE('dental.agregar_insumos_tto') }}';
                $.ajax({
                    url: url,
                    type: 'post',
                    data: data,
                    success: function(resp) {
                        console.log(resp);
                        if (resp.mensaje == 'ok') {
                            swal({
                                icon: 'success',
                                text: 'Se a agregado los insumos correctamente',
                                title: 'Exito'
                            });
                            let nuevo_insumo = resp.insumo;
                            cargar_a_presupuesto_insumo(nuevo_insumo.id);
                            $('#modal_insumos').modal('hide');
                            //limpiar_formulario_insumo();
                            let insumos = resp.insumos;
                            console.log(insumos);
                            let table = $('#table_insumos_odon_gral').DataTable();

                            //Limpiar la tabla sin perder la configuración de DataTables
                            table.clear();



                            //Recorrer el array de insumos y agregarlos a la tabla
                            insumos.forEach(insumo => {
                                let total = insumo.cantidad * insumo.valor;
                                // Botones de acción
                                if (insumo.presupuesto == 0 || insumo.presupuesto == null) {
                                    // Botones de acción
                                    var botones = `
                                    <td>
                                        <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="feather icon-shopping-cart"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                                } else {
                                    var botones = `
                                    <td>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                                }
                                table.row.add([
                                    insumo.insumos + ' ' + insumo
                                    .nombre_marca, // Nombre del insumo
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    formatoMoneda(insumo.valor), // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                            });

                            //Dibujar la tabla nuevamente con los nuevos datos
                            table.draw();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            } else {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje,
                        },
                    },
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }



        }




        function eliminar_insumo(id) {
            swal({
                    title: "¿Esta seguro que desea ELIMINAR el insumo dental?",
                    text: "Favor confirme o cancele la solicitud",
                    icon: "warning",
                    buttons: ["Cancelar", "Solicitar"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        confirmar_eliminar_insumo(id);
                    }
                });
        }

        function confirmar_eliminar_insumo(id) {
            console.log(id);
            let data = {
                id: id,
                id_paciente: $('#id_paciente').val(),
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                _token: CSRF_TOKEN
            }
            let url = '{{ ROUTE('dental.eliminar_insumos_tto') }}';
            $.ajax({
                url: url,
                type: 'post',
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'ok') {
                        swal({
                            icon: 'success',
                            text: 'Se a eliminado insumos correctamente',
                            title: 'Exito'
                        });
                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let valores_lab = resp.valores[3];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos + valores_lab;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_insumos_presupuesto').html(formatoMoneda(valores_insumos));
                        $('#valores_insumos_presupuesto_conf').html(formatoMoneda(valores_insumos));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto').val(formatoMoneda(total_general));
                        $('#total_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto_dental').val(total_general);
                        $('#subtotal_presup').val(formatoMoneda(total_general));
                        $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                            valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                            total_general));
                        $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));


                        let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_odon_gral').DataTable();
                        let table_urg = $('#table_insumos_urg').DataTable();
                        let table_odped_urg = $('#table_insumos_odped_urg').DataTable();
                        //Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();
                        table_urg.clear();
                        table_odped_urg.clear();

                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if (insumo.presupuesto == 0 || insumo.presupuesto == null) {
                                    // Botones de acción
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                                <i class="feather icon-shopping-cart"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id},'urg')"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>`;
                                } else {
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                                <i class="feather icon-shopping-cart"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id},'urg')"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>`;
                                }
                            if (insumo.urgencia == 1) {
                                table_urg.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca,
                                    insumo.observaciones,
                                    insumo.cantidad,
                                    formatoMoneda(insumo.valor),
                                    formatoMoneda(total),
                                    botones
                                ]);
                            } else {
                                table.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca,
                                    insumo.observaciones,
                                    insumo.cantidad,
                                    formatoMoneda(insumo.valor),
                                    formatoMoneda(total),
                                    botones
                                ]);
                                table_odped_urg.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca,
                                    insumo.observaciones,
                                    insumo.cantidad,
                                    formatoMoneda(insumo.valor),
                                    formatoMoneda(total),
                                    botones
                                ]);
                            }
                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();
                        table_urg.draw();
                        table_odped_urg.draw();
                        $('#contenedor_insumos').empty();
                        insumos.forEach(insumo => {
                            if (insumo.presupuesto == 1) {
                                let total = insumo.cantidad * insumo.valor;
                                $('#contenedor_insumos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 col-lg-4 fill">
                                                        <label class="floating-label-activo-sm">Insumo</label>
                                                        <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-1 fill">
                                                        <label class="floating-label-activo-sm">Cantidad</label>
                                                        <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-2 fill">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-2 fill">
                                                        <label class="floating-label-activo-sm">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-md-1 col-lg-1 d-flex">

                                                        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            }

                        });

                        let table_insumos = $('#presup_insumos_pago').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table_insumos.clear();

                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if (insumo.presupuesto == 1) {
                                if (insumo.estado_pago == 'ok') {
                                    var clase = 'bg-success';
                                } else if (insumo.estado_pago == 'intermedio') {
                                    var clase = 'bg-warning';
                                } else {
                                    var clase = 'bg-danger';
                                }
                                let rowNode = table_insumos.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Nombre del insumo
                                    formatoMoneda(insumo.valor), // Cantidad utilizada
                                    0, // Unidad de medida
                                    formatoMoneda(total),
                                    ' <div class="circle ' + clase + '"></div>',
                                    ''

                                ]).draw(false).node();
                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }

                        });

                        table_insumos.draw();

                        $('#table_pagos_reasignar_insumos tbody').empty();
                        insumos.forEach(insumo => {
                            if (insumo.presupuesto == 1) {
                                let total = insumo.cantidad * insumo.valor;
                                $('#table_pagos_reasignar_insumos tbody').append(`
                                <tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${total}" data-id="${insumo.id}" data-info="insumo"></td>
                                    <td>${insumo.insumos} ${insumo.nombre_marca}</td>
                                    <td>${insumo.cantidad}</td>
                                    <td>${formatoMoneda(insumo.valor)}</td>
                                    <td>${formatoMoneda(total)}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>
                                </tr>
                            `);
                            }

                        });
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cantidadInput = document.getElementById("cantidad");
            const precioInput = document.getElementById("precio");
            const totalInput = document.getElementById("total");

            // Calcula el total automáticamente cuando se ingresan datos
            function calcularTotal() {
                const cantidad = parseFloat(cantidadInput.value) || 0;
                const precio = parseFloat(precioInput.value) || 0;
                totalInput.value = (cantidad * precio).toFixed(2);
            }

            cantidadInput.addEventListener("input", calcularTotal);
            precioInput.addEventListener("input", calcularTotal);

            $('#n_pieza_ex_pp1000').select2();
            $('#n_piezas_grupo_ex_pp1000').select2();
            $('#n_pieza_ex_pp_od_gral1000').select2();

            const cantidadInput_urg = document.getElementById("cantidad_urg");
            const precioInput_urg = document.getElementById("precio_urg");
            const totalInput_urg = document.getElementById("total_urg");

            // Calcula el total automáticamente cuando se ingresan datos
            function calcularTotalUrg() {
                const cantidad = parseFloat(cantidadInput_urg.value) || 0;
                const precio = parseFloat(precioInput_urg.value) || 0;
                totalInput_urg.value = (cantidad * precio).toFixed(2);
            }

            cantidadInput_urg.addEventListener("input", calcularTotalUrg);
            precioInput_urg.addEventListener("input", calcularTotalUrg);

        });
        $(document).ready(function() {
            mostrar_nueva_pieza_ex_radio(1000);
            var creatinina = 0;
            $(document).ready(function() {
                {{--  MEDICAMENTOS  --}}
                $("#nombre_medicamento_ficha_dental").autocomplete({
                    source: function(request, response) {
                        // Fetch data
                        $.ajax({
                            url: "{{ route('dental.getArticulo') }}",
                            type: 'post',
                            dataType: "json",
                            data: {
                                _token: CSRF_TOKEN,
                                search: request.term
                            },
                            success: function(data) {
                                console.log(data.length);
                                if (data.length == 0) {
                                    $('.medicamento_activo').hide();
                                    $('.medicamento_inactivo').show();
                                    $('#dosis_medicamento_ficha_dental_2').val('');
                                    $('#frecuencia_medicamento_ficha_dental_2').val(
                                        '');
                                    $('#id_medicamento_ficha_dental').val('');
                                    $('#id_medicamento_tipo_control').val('');
                                    $('#mensaje_med_control').val('');
                                } else {
                                    $('.medicamento_activo').show();
                                    $('.medicamento_inactivo').hide();
                                    $('#dosis_medicamento_ficha_dental_2').val('');
                                    $('#frecuencia_medicamento_ficha_dental_2').val(
                                        '');
                                    $('#id_medicamento_ficha_dental').val('');
                                    $('#id_medicamento_tipo_control').val('');
                                    $('#mensaje_med_control').val('');
                                }
                                response(data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        // Set selection
                        $('#nombre_medicamento_ficha_dental').val(ui.item
                        .label); // display the selected text
                        $('#id_medicamento_ficha_dental').val(ui.item
                        .value); // save selected id to input
                        $('#nombre_composicion_farmaco').html(ui.item
                        .droga); // save selected id to input
                        $('#id_medicamento_tipo_control').val(ui.item
                        .control); // save selected id to input
                        if (ui.item.control == 1 || ui.item.control == 1 || ui.item.control ==
                            2 || ui.item.control == 3 || ui.item.control == 4 || ui.item
                            .control == 5)
                            $('#mensaje_med_control').html(
                                'Este Paciente ha tenido 3 Recetas retenidas este año<br>Consulte en "Ranking de recetas controladas del paciente"'
                                );
                        else
                            $('#mensaje_med_control').html('');

                        return false;
                    }
                });

                {{--  mostrar ocultar mensaje de medicamento de uso cronico en receta de ficha  --}}
                $('#medicamento_uso_cronico').change(function() {
                    if ($('#medicamento_uso_cronico').is(':checked')) {
                        $('#mensaje_uso_cronico').show();
                    } else {
                        $('#mensaje_uso_cronico').hide();
                    }

                });



                {{--  EXAMENES  --}}
                {{--  funcion para capturar el tipo de examen y buscar los subtipo que estan relacionados con el  --}}
                $('#tipo_examen').change(function(e) {
                    e.preventDefault();
                    tipo_examen = $('#tipo_examen').val();

                    $("#sub_tipo_examen").empty();
                    $("#examen").empty();
                    $.ajax({
                            url: '{{ route('listar.sub_tipo_examen') }}',
                            type: 'GET',
                            dataType: 'json',
                            data: {
                                tipo_examen: tipo_examen
                            },
                        })
                        .done(function(response) {

                            $('#sub_tipo_examen').append(
                                `<option value="0">Seleccione... </option>`);
                            for (var i = 0; i < response.length; i++) {
                                $('#sub_tipo_examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                            }

                            /** ACTIVAR CHECHBOK DE CON  CONTRASTE */
                            if ($('#tipo_examen').val() == 362) $('#imagenologia_con_contraste')
                                .removeAttr('disabled');
                            else $('#imagenologia_con_contraste').attr('disabled', 'disabled');
                        })
                        .fail(function() {
                            console.log("error");
                        })

                });

                {{--  buscar examenes por el sub tipo de examen  --}}
                $('#sub_tipo_examen').change(function(e) {

                    e.preventDefault();
                    sub_tipo_examen = $('#sub_tipo_examen').val();

                    $("#examen").empty();
                    $.ajax({
                            url: '{{ route('listar.examen') }}',
                            type: 'GET',
                            dataType: 'json',
                            data: {
                                sub_tipo_examen: sub_tipo_examen
                            },
                        })
                        .done(function(response) {

                            $('#examen').append(
                                `<option value="0">Seleccione... </option>`);
                            for (var i = 0; i < response.length; i++) {
                                $('#examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                            }
                        })
                        .fail(function() {
                            console.log("error");
                        })

                });

                {{--  mostrar ocultar mensaje de examenes de radiologia con contraste --}}
                $('#imagenologia_con_contraste').change(function() {
                    if ($('#imagenologia_con_contraste').is(':checked')) {
                        $('#mensaje_imagenologia_con_contraste').show();
                    } else {
                        $('#mensaje_imagenologia_con_contraste').hide();
                    }

                });

            });
            $('.tratamiento-autocomplete').each(function() {
                $(this).autocomplete({
                    source: function(request, response) {
                        // Fetch data
                        $.ajax({
                            url: "{{ route('dental.getDiagnosticoDental') }}",
                            type: 'post',
                            dataType: "json",
                            data: {
                                _token: CSRF_TOKEN,
                                search: request.term
                            },
                            success: function(data) {
                                if (data.length == 0) {
                                    $('.diagnostico_activo').hide();
                                    $('.diagnostico_inactivo').show();
                                } else {
                                    $('.diagnostico_activo').show();
                                    $('.diagnostico_inactivo').hide();
                                }
                                response(data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        $(this).val(ui.item.label);
                        $(this).next('input[type="hidden"]').val(ui.item
                        .value); // Asigna el valor al input hidden correspondiente
                        return false;
                    }
                });
            });

            $('.tratamiento-urg-autocomplete').each(function() {
                $(this).autocomplete({
                    source: function(request, response) {
                        // Fetch data
                        $.ajax({
                            url: "{{ route('dental.getDiagnosticoDentalUrg') }}",
                            type: 'post',
                            dataType: "json",
                            data: {
                                _token: CSRF_TOKEN,
                                search: request.term
                            },
                            success: function(data) {
                                if (data.length == 0) {
                                    $('.diagnostico_activo').hide();
                                    $('.diagnostico_inactivo').show();
                                } else {
                                    $('.diagnostico_activo').show();
                                    $('.diagnostico_inactivo').hide();
                                }
                                response(data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        $(this).val(ui.item.label);
                        $(this).next('input[type="hidden"]').val(ui.item
                        .value); // Asigna el valor al input hidden correspondiente
                        return false;
                    }
                });
            });

            $('.prestacion-autocomplete').each(function() {
                $(this).autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "{{ route('dental.getPrestacionesLaboratorio') }}",
                            type: 'post',
                            dataType: "json",
                            data: {
                                _token: CSRF_TOKEN,
                                search: request.term
                            },
                            success: function(data) {
                                console.log(data);
                                if (data.length == 0) {
                                    $('.diagnostico_activo').hide();
                                    $('.diagnostico_inactivo').show();
                                } else {
                                    $('.diagnostico_activo').show();
                                    $('.diagnostico_inactivo').hide();
                                }
                                response(data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        $(this).val(ui.item.label);
                        $('#valor_trabajo_menor').val(ui.item.valor);
                        $(this).next('input[type="hidden"]').val(ui.item.value);
                        return false;
                    }
                });
            });
            mostrar_nuevas_imagenes_dent_estudio();
            $('#paciente_piezas_dentales_ex').select2();
            $('#paciente_piezas_dentales_ex_').select2();
            $('#tpo_proc_imp').select2();
            $('#prot_pieza_imp').select2();
            $('#prot_pieza_imp_man').select2();
            $('#prot_implante').select2();
            $('#prot_implante_man').select2();

            // $('.select2').select2({
            //     width: '100%',
            //     placeholder: 'Seleccionar pieza(s)',
            //     allowClear: true
            // });


            const piezasSelect = $('#paciente_piezas_dentales_ex');

            // Inicializar Select2
            piezasSelect.select2({
                placeholder: "Seleccione las piezas",
                allowClear: true
            });

            // Control de selección de piezas en el odontograma
            $('.pieza').on('click', function() {
                const piezaNumero = $(this).data('pieza').toString(); // Convertir a string por seguridad

                if ($(this).hasClass('seleccionada')) {
                    // Si ya está seleccionada, deseleccionarla
                    $(this).removeClass('seleccionada');
                    const options = piezasSelect.val().filter(item => item !==
                    piezaNumero); // Filtra el elemento a eliminar
                    piezasSelect.val(options).trigger('change');
                } else {
                    // Si no está seleccionada, agregarla
                    $(this).addClass('seleccionada');

                    let opcionesSeleccionadas = piezasSelect.val() || [];
                    if (!opcionesSeleccionadas.includes(piezaNumero)) {
                        opcionesSeleccionadas.push(piezaNumero);
                    }

                    piezasSelect.val(opcionesSeleccionadas).trigger('change');
                }
            });

            // generar numero random entre el 10 y el 20
            var random = Math.floor(Math.random() * (20 - 10 + 1) + 10);
            $('#random_preimpl').val(random);
            $('#random_postimpl').val(random);

            // Inicializar select2 en todos los select cuyo id comience con "pzas_grupo_impl"
            $('[id^="pzas_grupo_impl"]').select2();

            mostrar_nueva_pieza_dental_tto_impl(random);
            mostrar_nueva_pieza_post_impl(random);
            mostrar_nuevo_grupo_post_impl(random);
            mostrar_nuevo_pieza_pfu(random);
            mostrar_nuevo_pieza_pfp(random);
        });

        function evaluar_para_carga_detalle(select, div, input, valor) {
            var valor_select = $('#' + select + '').val();
            if (valor_select == valor) $('#' + div + '').show();
            else {
                $('#' + div + '').hide();
                $('#' + input + '').val('');
            }
        }
        /** SECCION PERIODONTOGRAMA GENERAL */

        function getSangrado() {
            $("#suma").text(Math.round((totalSangrado / (totalDientes * 6) * 100)));

        }

        function getPlaca() {
            $("#suma2").text(Math.round((totalPlaca / (totalDientes * 6) * 100)));
        }

        function getSupuracion() {
            $("#suma3").text(Math.round((totalSupuracion / (totalDientes * 6) * 100)));

        }

        function dame_info_pieza() {
            let pieza = $('#historia_pza').val();
            console.log(pieza);
            let url = "{{ route('dental.dame_pieza') }}";
            let id_paciente = $('#id_paciente_fc').val();
            if (id_paciente == '' || id_paciente == null) {
                id_paciente = $('#id_paciente').val();
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    pieza: pieza,
                    id_ficha_atencion: $('#id_fc').val(),
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    swal({
                        title: 'info',
                        text: 'Cargando ...',
                        icon: 'info'
                    });
                },
                success: function(response) {
                    swal.close();
                    console.log(response);
                    // Mapea los datos si los nombres de las claves no coinciden
                    const tipoExamenMap = {
                        1: 'Gral',
                        2: 'Endodoncia',
                        3: 'Odontopediatría' // Ejemplo adicional
                    };
                    // Mapea los datos si los nombres de las claves no coinciden
                    const data = response.map(item => ({
                        fecha: item.fecha || 'N/A', // Asigna valor por defecto si falta
                        diagnostico: item.diagnostico ? item.diagnostico : 'N/A',
                        tratamiento: item.tratamiento ? item.tratamiento : 'N/A',
                        tipo_examen: tipoExamenMap[item.tipo_examen] || 'Otro',
                        caras: item.diagnosticocaras || 'N/A',
                        responsable: item.profesional || 'N/A',
                        estado: item.diagnostico.estado == 1 ? 'TERMINADO' : 'EN ESPERA'
                    }));

                    // Inicializa o actualiza la tabla
                    $('#historia_odontograma_pieza').DataTable({
                        destroy: true,
                        data: data,
                        columns: [{
                                data: 'fecha'
                            },
                            {
                                data: 'diagnostico'
                            },
                            {
                                data: 'tratamiento'
                            },
                            {
                                data: 'tipo_examen'
                            },
                            {
                                data: 'caras'
                            },
                            {
                                data: 'responsable'
                            },
                            {
                                data: 'estado'
                            }
                        ],
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                        }
                    });
                    mostrar_nueva_pieza_dental_tto(pieza);
                },
            })

        }

        function getDefectos() {

            var datops18a = document.getElementById('ps18-a').value;
            var datops18b = document.getElementById('ps18-b').value;
            var datops18c = document.getElementById('ps18-c').value;

            var datops17a = document.getElementById('ps17-a').value;
            var datops17b = document.getElementById('ps17-b').value;
            var datops17c = document.getElementById('ps17-c').value;

            var datops16a = document.getElementById('ps16-a').value;
            var datops16b = document.getElementById('ps16-b').value;
            var datops16c = document.getElementById('ps16-c').value;

            var datops15a = document.getElementById('ps15-a').value;
            var datops15b = document.getElementById('ps15-b').value;
            var datops15c = document.getElementById('ps15-c').value;

            var datops14a = document.getElementById('ps14-a').value;
            var datops14b = document.getElementById('ps14-b').value;
            var datops14c = document.getElementById('ps14-c').value;

            var datops13a = document.getElementById('ps13-a').value;
            var datops13b = document.getElementById('ps13-b').value;
            var datops13c = document.getElementById('ps13-c').value;

            var datops12a = document.getElementById('ps12-a').value;
            var datops12b = document.getElementById('ps12-b').value;
            var datops12c = document.getElementById('ps12-c').value;

            var datops11a = document.getElementById('ps11-a').value;
            var datops11b = document.getElementById('ps11-b').value;
            var datops11c = document.getElementById('ps11-c').value;

            var total18 = parseInt(datops18a) + parseInt(datops18b) + parseInt(datops18c) +
                parseInt(datops17a) + parseInt(datops17b) + parseInt(datops17c) +
                parseInt(datops16a) + parseInt(datops16b) + parseInt(datops16c) +
                parseInt(datops15a) + parseInt(datops15b) + parseInt(datops15c) +
                parseInt(datops14a) + parseInt(datops14b) + parseInt(datops14c) +
                parseInt(datops13a) + parseInt(datops13b) + parseInt(datops13c) +
                parseInt(datops12a) + parseInt(datops12b) + parseInt(datops12c) +
                parseInt(datops11a) + parseInt(datops11b) + parseInt(datops11c);

            var datops28a = document.getElementById('ps28-a').value;
            var datops28b = document.getElementById('ps28-b').value;
            var datops28c = document.getElementById('ps28-c').value;

            var datops27a = document.getElementById('ps27-a').value;
            var datops27b = document.getElementById('ps27-b').value;
            var datops27c = document.getElementById('ps27-c').value;

            var datops26a = document.getElementById('ps26-a').value;
            var datops26b = document.getElementById('ps26-b').value;
            var datops26c = document.getElementById('ps26-c').value;

            var datops25a = document.getElementById('ps25-a').value;
            var datops25b = document.getElementById('ps25-b').value;
            var datops25c = document.getElementById('ps25-c').value;

            var datops24a = document.getElementById('ps24-a').value;
            var datops24b = document.getElementById('ps24-b').value;
            var datops24c = document.getElementById('ps24-c').value;

            var datops23a = document.getElementById('ps23-a').value;
            var datops23b = document.getElementById('ps23-b').value;
            var datops23c = document.getElementById('ps23-c').value;

            var datops22a = document.getElementById('ps22-a').value;
            var datops22b = document.getElementById('ps22-b').value;
            var datops22c = document.getElementById('ps22-c').value;

            var datops21a = document.getElementById('ps21-a').value;
            var datops21b = document.getElementById('ps21-b').value;
            var datops21c = document.getElementById('ps21-c').value;

            var total28 = parseInt(datops28a) + parseInt(datops28b) + parseInt(datops28c) +
                parseInt(datops27a) + parseInt(datops27b) + parseInt(datops27c) +
                parseInt(datops26a) + parseInt(datops26b) + parseInt(datops26c) +
                parseInt(datops25a) + parseInt(datops25b) + parseInt(datops25c) +
                parseInt(datops24a) + parseInt(datops24b) + parseInt(datops24c) +
                parseInt(datops23a) + parseInt(datops23b) + parseInt(datops23c) +
                parseInt(datops22a) + parseInt(datops22b) + parseInt(datops22c) +
                parseInt(datops21a) + parseInt(datops21b) + parseInt(datops21c);


            var datops38a = document.getElementById('ps38-a').value;
            var datops38b = document.getElementById('ps38-b').value;
            var datops38c = document.getElementById('ps38-c').value;

            var datops37a = document.getElementById('ps37-a').value;
            var datops37b = document.getElementById('ps37-b').value;
            var datops37c = document.getElementById('ps37-c').value;

            var datops36a = document.getElementById('ps36-a').value;
            var datops36b = document.getElementById('ps36-b').value;
            var datops36c = document.getElementById('ps36-c').value;

            var datops35a = document.getElementById('ps35-a').value;
            var datops35b = document.getElementById('ps35-b').value;
            var datops35c = document.getElementById('ps35-c').value;

            var datops34a = document.getElementById('ps34-a').value;
            var datops34b = document.getElementById('ps34-b').value;
            var datops34c = document.getElementById('ps34-c').value;

            var datops33a = document.getElementById('ps33-a').value;
            var datops33b = document.getElementById('ps33-b').value;
            var datops33c = document.getElementById('ps33-c').value;

            var datops32a = document.getElementById('ps32-a').value;
            var datops32b = document.getElementById('ps32-b').value;
            var datops32c = document.getElementById('ps32-c').value;

            var datops31a = document.getElementById('ps31-a').value;
            var datops31b = document.getElementById('ps31-b').value;
            var datops31c = document.getElementById('ps31-c').value;

            var total38 = parseInt(datops38a) + parseInt(datops38b) + parseInt(datops38c) +
                parseInt(datops37a) + parseInt(datops37b) + parseInt(datops37c) +
                parseInt(datops36a) + parseInt(datops36b) + parseInt(datops36c) +
                parseInt(datops35a) + parseInt(datops35b) + parseInt(datops35c) +
                parseInt(datops34a) + parseInt(datops34b) + parseInt(datops34c) +
                parseInt(datops33a) + parseInt(datops33b) + parseInt(datops33c) +
                parseInt(datops32a) + parseInt(datops32b) + parseInt(datops32c) +
                parseInt(datops31a) + parseInt(datops31b) + parseInt(datops31c);

            var datops48a = document.getElementById('ps48-a').value;
            var datops48b = document.getElementById('ps48-b').value;
            var datops48c = document.getElementById('ps48-c').value;

            var datops47a = document.getElementById('ps47-a').value;
            var datops47b = document.getElementById('ps47-b').value;
            var datops47c = document.getElementById('ps47-c').value;

            var datops46a = document.getElementById('ps46-a').value;
            var datops46b = document.getElementById('ps46-b').value;
            var datops46c = document.getElementById('ps46-c').value;

            var datops45a = document.getElementById('ps45-a').value;
            var datops45b = document.getElementById('ps45-b').value;
            var datops45c = document.getElementById('ps45-c').value;

            var datops44a = document.getElementById('ps44-a').value;
            var datops44b = document.getElementById('ps44-b').value;
            var datops44c = document.getElementById('ps44-c').value;

            var datops43a = document.getElementById('ps43-a').value;
            var datops43b = document.getElementById('ps43-b').value;
            var datops43c = document.getElementById('ps43-c').value;

            var datops42a = document.getElementById('ps42-a').value;
            var datops42b = document.getElementById('ps42-b').value;
            var datops42c = document.getElementById('ps42-c').value;

            var datops41a = document.getElementById('ps41-a').value;
            var datops41b = document.getElementById('ps41-b').value;
            var datops41c = document.getElementById('ps41-c').value;

            var total48 = parseInt(datops48a) + parseInt(datops48b) + parseInt(datops48c) +
                parseInt(datops47a) + parseInt(datops47b) + parseInt(datops47c) +
                parseInt(datops46a) + parseInt(datops46b) + parseInt(datops46c) +
                parseInt(datops45a) + parseInt(datops45b) + parseInt(datops45c) +
                parseInt(datops44a) + parseInt(datops44b) + parseInt(datops44c) +
                parseInt(datops43a) + parseInt(datops43b) + parseInt(datops43c) +
                parseInt(datops42a) + parseInt(datops42b) + parseInt(datops42c) +
                parseInt(datops41a) + parseInt(datops41b) + parseInt(datops41c);

            var datops18ba = document.getElementById('ps18b-a').value;
            var datops18bb = document.getElementById('ps18b-b').value;
            var datops18bc = document.getElementById('ps18b-c').value;

            var datops17ba = document.getElementById('ps17b-a').value;
            var datops17bb = document.getElementById('ps17b-b').value;
            var datops17bc = document.getElementById('ps17b-c').value;

            var datops16ba = document.getElementById('ps16b-a').value;
            var datops16bb = document.getElementById('ps16b-b').value;
            var datops16bc = document.getElementById('ps16b-c').value;

            var datops15ba = document.getElementById('ps15b-a').value;
            var datops15bb = document.getElementById('ps15b-b').value;
            var datops15bc = document.getElementById('ps15b-c').value;

            var datops14ba = document.getElementById('ps14b-a').value;
            var datops14bb = document.getElementById('ps14b-b').value;
            var datops14bc = document.getElementById('ps14b-c').value;

            var datops13ba = document.getElementById('ps13b-a').value;
            var datops13bb = document.getElementById('ps13b-b').value;
            var datops13bc = document.getElementById('ps13b-c').value;

            var datops12ba = document.getElementById('ps12b-a').value;
            var datops12bb = document.getElementById('ps12b-b').value;
            var datops12bc = document.getElementById('ps12b-c').value;

            var datops11ba = document.getElementById('ps11b-a').value;
            var datops11bb = document.getElementById('ps11b-b').value;
            var datops11bc = document.getElementById('ps11b-c').value;

            var total18b = parseInt(datops18ba) + parseInt(datops18bb) + parseInt(datops18bc) +
                parseInt(datops17ba) + parseInt(datops17bb) + parseInt(datops17bc) +
                parseInt(datops16ba) + parseInt(datops16bb) + parseInt(datops16bc) +
                parseInt(datops15ba) + parseInt(datops15bb) + parseInt(datops15bc) +
                parseInt(datops14ba) + parseInt(datops14bb) + parseInt(datops14bc) +
                parseInt(datops13ba) + parseInt(datops13bb) + parseInt(datops13bc) +
                parseInt(datops12ba) + parseInt(datops12bb) + parseInt(datops12bc) +
                parseInt(datops11ba) + parseInt(datops11bb) + parseInt(datops11bc);


            var datops28ba = document.getElementById('ps28b-a').value;
            var datops28bb = document.getElementById('ps28b-b').value;
            var datops28bc = document.getElementById('ps28b-c').value;

            var datops27ba = document.getElementById('ps27b-a').value;
            var datops27bb = document.getElementById('ps27b-b').value;
            var datops27bc = document.getElementById('ps27b-c').value;

            var datops26ba = document.getElementById('ps26b-a').value;
            var datops26bb = document.getElementById('ps26b-b').value;
            var datops26bc = document.getElementById('ps26b-c').value;

            var datops25ba = document.getElementById('ps25b-a').value;
            var datops25bb = document.getElementById('ps25b-b').value;
            var datops25bc = document.getElementById('ps25b-c').value;

            var datops24ba = document.getElementById('ps24b-a').value;
            var datops24bb = document.getElementById('ps24b-b').value;
            var datops24bc = document.getElementById('ps24b-c').value;

            var datops23ba = document.getElementById('ps23b-a').value;
            var datops23bb = document.getElementById('ps23b-b').value;
            var datops23bc = document.getElementById('ps23b-c').value;

            var datops22ba = document.getElementById('ps22b-a').value;
            var datops22bb = document.getElementById('ps22b-b').value;
            var datops22bc = document.getElementById('ps22b-c').value;

            var datops21ba = document.getElementById('ps21b-a').value;
            var datops21bb = document.getElementById('ps21b-b').value;
            var datops21bc = document.getElementById('ps21b-c').value;

            var total28b = parseInt(datops28ba) + parseInt(datops28bb) + parseInt(datops28bc) +
                parseInt(datops27ba) + parseInt(datops27bb) + parseInt(datops27bc) +
                parseInt(datops26ba) + parseInt(datops26bb) + parseInt(datops26bc) +
                parseInt(datops25ba) + parseInt(datops25bb) + parseInt(datops25bc) +
                parseInt(datops24ba) + parseInt(datops24bb) + parseInt(datops24bc) +
                parseInt(datops23ba) + parseInt(datops23bb) + parseInt(datops23bc) +
                parseInt(datops22ba) + parseInt(datops22bb) + parseInt(datops22bc) +
                parseInt(datops21ba) + parseInt(datops21bb) + parseInt(datops21bc);

            var datops38ba = document.getElementById('ps38b-a').value;
            var datops38bb = document.getElementById('ps38b-b').value;
            var datops38bc = document.getElementById('ps38b-c').value;

            var datops37ba = document.getElementById('ps37b-a').value;
            var datops37bb = document.getElementById('ps37b-b').value;
            var datops37bc = document.getElementById('ps37b-c').value;

            var datops36ba = document.getElementById('ps36b-a').value;
            var datops36bb = document.getElementById('ps36b-b').value;
            var datops36bc = document.getElementById('ps36b-c').value;

            var datops35ba = document.getElementById('ps35b-a').value;
            var datops35bb = document.getElementById('ps35b-b').value;
            var datops35bc = document.getElementById('ps35b-c').value;

            var datops34ba = document.getElementById('ps34b-a').value;
            var datops34bb = document.getElementById('ps34b-b').value;
            var datops34bc = document.getElementById('ps34b-c').value;

            var datops33ba = document.getElementById('ps33b-a').value;
            var datops33bb = document.getElementById('ps33b-b').value;
            var datops33bc = document.getElementById('ps33b-c').value;

            var datops32ba = document.getElementById('ps32b-a').value;
            var datops32bb = document.getElementById('ps32b-b').value;
            var datops32bc = document.getElementById('ps32b-c').value;

            var datops31ba = document.getElementById('ps31b-a').value;
            var datops31bb = document.getElementById('ps31b-b').value;
            var datops31bc = document.getElementById('ps31b-c').value;

            var total38b = parseInt(datops38ba) + parseInt(datops38bb) + parseInt(datops38bc) +
                parseInt(datops37ba) + parseInt(datops37bb) + parseInt(datops37bc) +
                parseInt(datops36ba) + parseInt(datops36bb) + parseInt(datops36bc) +
                parseInt(datops35ba) + parseInt(datops35bb) + parseInt(datops35bc) +
                parseInt(datops34ba) + parseInt(datops34bb) + parseInt(datops34bc) +
                parseInt(datops33ba) + parseInt(datops33bb) + parseInt(datops33bc) +
                parseInt(datops32ba) + parseInt(datops32bb) + parseInt(datops32bc) +
                parseInt(datops31ba) + parseInt(datops31bb) + parseInt(datops31bc);

            var datops48ba = document.getElementById('ps48b-a').value;
            var datops48bb = document.getElementById('ps48b-b').value;
            var datops48bc = document.getElementById('ps48b-c').value;

            var datops47ba = document.getElementById('ps47b-a').value;
            var datops47bb = document.getElementById('ps47b-b').value;
            var datops47bc = document.getElementById('ps47b-c').value;

            var datops46ba = document.getElementById('ps46b-a').value;
            var datops46bb = document.getElementById('ps46b-b').value;
            var datops46bc = document.getElementById('ps46b-c').value;

            var datops45ba = document.getElementById('ps45b-a').value;
            var datops45bb = document.getElementById('ps45b-b').value;
            var datops45bc = document.getElementById('ps45b-c').value;

            var datops44ba = document.getElementById('ps44b-a').value;
            var datops44bb = document.getElementById('ps44b-b').value;
            var datops44bc = document.getElementById('ps44b-c').value;

            var datops43ba = document.getElementById('ps43b-a').value;
            var datops43bb = document.getElementById('ps43b-b').value;
            var datops43bc = document.getElementById('ps43b-c').value;

            var datops42ba = document.getElementById('ps42b-a').value;
            var datops42bb = document.getElementById('ps42b-b').value;
            var datops42bc = document.getElementById('ps42b-c').value;

            var datops41ba = document.getElementById('ps41b-a').value;
            var datops41bb = document.getElementById('ps41b-b').value;
            var datops41bc = document.getElementById('ps41b-c').value;

            var total48b = parseInt(datops48ba) + parseInt(datops48bb) + parseInt(datops48bc) +
                parseInt(datops47ba) + parseInt(datops47bb) + parseInt(datops47bc) +
                parseInt(datops46ba) + parseInt(datops46bb) + parseInt(datops46bc) +
                parseInt(datops45ba) + parseInt(datops45bb) + parseInt(datops45bc) +
                parseInt(datops44ba) + parseInt(datops44bb) + parseInt(datops44bc) +
                parseInt(datops43ba) + parseInt(datops43bb) + parseInt(datops43bc) +
                parseInt(datops42ba) + parseInt(datops42bb) + parseInt(datops42bc) +
                parseInt(datops41ba) + parseInt(datops41bb) + parseInt(datops41bc);

            var totalps = total18 + total28 + total38 + total48 + total18b + total28b + total38b + total48b;
            var mediaps = totalps / (totalDientes * 3);
            var redondeado = Math.round(mediaps * Math.pow(10, 2)) / Math.pow(10, 2);

            $("#suma4").text(redondeado);


            var datomg18a = document.getElementById('mg18-a').value;
            var datomg18b = document.getElementById('mg18-b').value;
            var datomg18c = document.getElementById('mg18-c').value;

            var datomg17a = document.getElementById('mg17-a').value;
            var datomg17b = document.getElementById('mg17-b').value;
            var datomg17c = document.getElementById('mg17-c').value;

            var datomg16a = document.getElementById('mg16-a').value;
            var datomg16b = document.getElementById('mg16-b').value;
            var datomg16c = document.getElementById('mg16-c').value;

            var datomg15a = document.getElementById('mg15-a').value;
            var datomg15b = document.getElementById('mg15-b').value;
            var datomg15c = document.getElementById('mg15-c').value;

            var datomg14a = document.getElementById('mg14-a').value;
            var datomg14b = document.getElementById('mg14-b').value;
            var datomg14c = document.getElementById('mg14-c').value;

            var datomg13a = document.getElementById('mg13-a').value;
            var datomg13b = document.getElementById('mg13-b').value;
            var datomg13c = document.getElementById('mg13-c').value;

            var datomg12a = document.getElementById('mg12-a').value;
            var datomg12b = document.getElementById('mg12-b').value;
            var datomg12c = document.getElementById('mg12-c').value;

            var datomg11a = document.getElementById('mg11-a').value;
            var datomg11b = document.getElementById('mg11-b').value;
            var datomg11c = document.getElementById('mg11-c').value;

            var total18m = parseInt(datomg18a) + parseInt(datomg18b) + parseInt(datomg18c) +
                parseInt(datomg17a) + parseInt(datomg17b) + parseInt(datomg17c) +
                parseInt(datomg16a) + parseInt(datomg16b) + parseInt(datomg16c) +
                parseInt(datomg15a) + parseInt(datomg15b) + parseInt(datomg15c) +
                parseInt(datomg14a) + parseInt(datomg14b) + parseInt(datomg14c) +
                parseInt(datomg13a) + parseInt(datomg13b) + parseInt(datomg13c) +
                parseInt(datomg12a) + parseInt(datomg12b) + parseInt(datomg12c) +
                parseInt(datomg11a) + parseInt(datomg11b) + parseInt(datomg11c);

            var datomg28a = document.getElementById('mg28-a').value;
            var datomg28b = document.getElementById('mg28-b').value;
            var datomg28c = document.getElementById('mg28-c').value;

            var datomg27a = document.getElementById('mg27-a').value;
            var datomg27b = document.getElementById('mg27-b').value;
            var datomg27c = document.getElementById('mg27-c').value;

            var datomg26a = document.getElementById('mg26-a').value;
            var datomg26b = document.getElementById('mg26-b').value;
            var datomg26c = document.getElementById('mg26-c').value;

            var datomg25a = document.getElementById('mg25-a').value;
            var datomg25b = document.getElementById('mg25-b').value;
            var datomg25c = document.getElementById('mg25-c').value;

            var datomg24a = document.getElementById('mg24-a').value;
            var datomg24b = document.getElementById('mg24-b').value;
            var datomg24c = document.getElementById('mg24-c').value;

            var datomg23a = document.getElementById('mg23-a').value;
            var datomg23b = document.getElementById('mg23-b').value;
            var datomg23c = document.getElementById('mg23-c').value;

            var datomg22a = document.getElementById('mg22-a').value;
            var datomg22b = document.getElementById('mg22-b').value;
            var datomg22c = document.getElementById('mg22-c').value;

            var datomg21a = document.getElementById('mg21-a').value;
            var datomg21b = document.getElementById('mg21-b').value;
            var datomg21c = document.getElementById('mg21-c').value;

            var total28m = parseInt(datomg28a) + parseInt(datomg28b) + parseInt(datomg28c) +
                parseInt(datomg27a) + parseInt(datomg27b) + parseInt(datomg27c) +
                parseInt(datomg26a) + parseInt(datomg26b) + parseInt(datomg26c) +
                parseInt(datomg25a) + parseInt(datomg25b) + parseInt(datomg25c) +
                parseInt(datomg24a) + parseInt(datomg24b) + parseInt(datomg24c) +
                parseInt(datomg23a) + parseInt(datomg23b) + parseInt(datomg23c) +
                parseInt(datomg22a) + parseInt(datomg22b) + parseInt(datomg22c) +
                parseInt(datomg21a) + parseInt(datomg21b) + parseInt(datomg21c);


            var datomg38a = document.getElementById('mg38-a').value;
            var datomg38b = document.getElementById('mg38-b').value;
            var datomg38c = document.getElementById('mg38-c').value;

            var datomg37a = document.getElementById('mg37-a').value;
            var datomg37b = document.getElementById('mg37-b').value;
            var datomg37c = document.getElementById('mg37-c').value;

            var datomg36a = document.getElementById('mg36-a').value;
            var datomg36b = document.getElementById('mg36-b').value;
            var datomg36c = document.getElementById('mg36-c').value;

            var datomg35a = document.getElementById('mg35-a').value;
            var datomg35b = document.getElementById('mg35-b').value;
            var datomg35c = document.getElementById('mg35-c').value;

            var datomg34a = document.getElementById('mg34-a').value;
            var datomg34b = document.getElementById('mg34-b').value;
            var datomg34c = document.getElementById('mg34-c').value;

            var datomg33a = document.getElementById('mg33-a').value;
            var datomg33b = document.getElementById('mg33-b').value;
            var datomg33c = document.getElementById('mg33-c').value;

            var datomg32a = document.getElementById('mg32-a').value;
            var datomg32b = document.getElementById('mg32-b').value;
            var datomg32c = document.getElementById('mg32-c').value;

            var datomg31a = document.getElementById('mg31-a').value;
            var datomg31b = document.getElementById('mg31-b').value;
            var datomg31c = document.getElementById('mg31-c').value;

            var total38m = parseInt(datomg38a) + parseInt(datomg38b) + parseInt(datomg38c) +
                parseInt(datomg37a) + parseInt(datomg37b) + parseInt(datomg37c) +
                parseInt(datomg36a) + parseInt(datomg36b) + parseInt(datomg36c) +
                parseInt(datomg35a) + parseInt(datomg35b) + parseInt(datomg35c) +
                parseInt(datomg34a) + parseInt(datomg34b) + parseInt(datomg34c) +
                parseInt(datomg33a) + parseInt(datomg33b) + parseInt(datomg33c) +
                parseInt(datomg32a) + parseInt(datomg32b) + parseInt(datomg32c) +
                parseInt(datomg31a) + parseInt(datomg31b) + parseInt(datomg31c);

            var datomg48a = document.getElementById('mg48-a').value;
            var datomg48b = document.getElementById('mg48-b').value;
            var datomg48c = document.getElementById('mg48-c').value;

            var datomg47a = document.getElementById('mg47-a').value;
            var datomg47b = document.getElementById('mg47-b').value;
            var datomg47c = document.getElementById('mg47-c').value;

            var datomg46a = document.getElementById('mg46-a').value;
            var datomg46b = document.getElementById('mg46-b').value;
            var datomg46c = document.getElementById('mg46-c').value;

            var datomg45a = document.getElementById('mg45-a').value;
            var datomg45b = document.getElementById('mg45-b').value;
            var datomg45c = document.getElementById('mg45-c').value;

            var datomg44a = document.getElementById('mg44-a').value;
            var datomg44b = document.getElementById('mg44-b').value;
            var datomg44c = document.getElementById('mg44-c').value;

            var datomg43a = document.getElementById('mg43-a').value;
            var datomg43b = document.getElementById('mg43-b').value;
            var datomg43c = document.getElementById('mg43-c').value;

            var datomg42a = document.getElementById('mg42-a').value;
            var datomg42b = document.getElementById('mg42-b').value;
            var datomg42c = document.getElementById('mg42-c').value;

            var datomg41a = document.getElementById('mg41-a').value;
            var datomg41b = document.getElementById('mg41-b').value;
            var datomg41c = document.getElementById('mg41-c').value;

            var total48m = parseInt(datomg48a) + parseInt(datomg48b) + parseInt(datomg48c) +
                parseInt(datomg47a) + parseInt(datomg47b) + parseInt(datomg47c) +
                parseInt(datomg46a) + parseInt(datomg46b) + parseInt(datomg46c) +
                parseInt(datomg45a) + parseInt(datomg45b) + parseInt(datomg45c) +
                parseInt(datomg44a) + parseInt(datomg44b) + parseInt(datomg44c) +
                parseInt(datomg43a) + parseInt(datomg43b) + parseInt(datomg43c) +
                parseInt(datomg42a) + parseInt(datomg42b) + parseInt(datomg42c) +
                parseInt(datomg41a) + parseInt(datomg41b) + parseInt(datomg41c);

            var datomg18ba = document.getElementById('mg18b-a').value;
            var datomg18bb = document.getElementById('mg18b-b').value;
            var datomg18bc = document.getElementById('mg18b-c').value;

            var datomg17ba = document.getElementById('mg17b-a').value;
            var datomg17bb = document.getElementById('mg17b-b').value;
            var datomg17bc = document.getElementById('mg17b-c').value;

            var datomg16ba = document.getElementById('mg16b-a').value;
            var datomg16bb = document.getElementById('mg16b-b').value;
            var datomg16bc = document.getElementById('mg16b-c').value;

            var datomg15ba = document.getElementById('mg15b-a').value;
            var datomg15bb = document.getElementById('mg15b-b').value;
            var datomg15bc = document.getElementById('mg15b-c').value;

            var datomg14ba = document.getElementById('mg14b-a').value;
            var datomg14bb = document.getElementById('mg14b-b').value;
            var datomg14bc = document.getElementById('mg14b-c').value;

            var datomg13ba = document.getElementById('mg13b-a').value;
            var datomg13bb = document.getElementById('mg13b-b').value;
            var datomg13bc = document.getElementById('mg13b-c').value;

            var datomg12ba = document.getElementById('mg12b-a').value;
            var datomg12bb = document.getElementById('mg12b-b').value;
            var datomg12bc = document.getElementById('mg12b-c').value;

            var datomg11ba = document.getElementById('mg11b-a').value;
            var datomg11bb = document.getElementById('mg11b-b').value;
            var datomg11bc = document.getElementById('mg11b-c').value;

            var total18bm = parseInt(datomg18ba) + parseInt(datomg18bb) + parseInt(datomg18bc) +
                parseInt(datomg17ba) + parseInt(datomg17bb) + parseInt(datomg17bc) +
                parseInt(datomg16ba) + parseInt(datomg16bb) + parseInt(datomg16bc) +
                parseInt(datomg15ba) + parseInt(datomg15bb) + parseInt(datomg15bc) +
                parseInt(datomg14ba) + parseInt(datomg14bb) + parseInt(datomg14bc) +
                parseInt(datomg13ba) + parseInt(datomg13bb) + parseInt(datomg13bc) +
                parseInt(datomg12ba) + parseInt(datomg12bb) + parseInt(datomg12bc) +
                parseInt(datomg11ba) + parseInt(datomg11bb) + parseInt(datomg11bc);


            var datomg28ba = document.getElementById('mg28b-a').value;
            var datomg28bb = document.getElementById('mg28b-b').value;
            var datomg28bc = document.getElementById('mg28b-c').value;

            var datomg27ba = document.getElementById('mg27b-a').value;
            var datomg27bb = document.getElementById('mg27b-b').value;
            var datomg27bc = document.getElementById('mg27b-c').value;

            var datomg26ba = document.getElementById('mg26b-a').value;
            var datomg26bb = document.getElementById('mg26b-b').value;
            var datomg26bc = document.getElementById('mg26b-c').value;

            var datomg25ba = document.getElementById('mg25b-a').value;
            var datomg25bb = document.getElementById('mg25b-b').value;
            var datomg25bc = document.getElementById('mg25b-c').value;

            var datomg24ba = document.getElementById('mg24b-a').value;
            var datomg24bb = document.getElementById('mg24b-b').value;
            var datomg24bc = document.getElementById('mg24b-c').value;

            var datomg23ba = document.getElementById('mg23b-a').value;
            var datomg23bb = document.getElementById('mg23b-b').value;
            var datomg23bc = document.getElementById('mg23b-c').value;

            var datomg22ba = document.getElementById('mg22b-a').value;
            var datomg22bb = document.getElementById('mg22b-b').value;
            var datomg22bc = document.getElementById('mg22b-c').value;

            var datomg21ba = document.getElementById('mg21b-a').value;
            var datomg21bb = document.getElementById('mg21b-b').value;
            var datomg21bc = document.getElementById('mg21b-c').value;

            var total28bm = parseInt(datomg28ba) + parseInt(datomg28bb) + parseInt(datomg28bc) +
                parseInt(datomg27ba) + parseInt(datomg27bb) + parseInt(datomg27bc) +
                parseInt(datomg26ba) + parseInt(datomg26bb) + parseInt(datomg26bc) +
                parseInt(datomg25ba) + parseInt(datomg25bb) + parseInt(datomg25bc) +
                parseInt(datomg24ba) + parseInt(datomg24bb) + parseInt(datomg24bc) +
                parseInt(datomg23ba) + parseInt(datomg23bb) + parseInt(datomg23bc) +
                parseInt(datomg22ba) + parseInt(datomg22bb) + parseInt(datomg22bc) +
                parseInt(datomg21ba) + parseInt(datomg21bb) + parseInt(datomg21bc);

            var datomg38ba = document.getElementById('mg38b-a').value;
            var datomg38bb = document.getElementById('mg38b-b').value;
            var datomg38bc = document.getElementById('mg38b-c').value;

            var datomg37ba = document.getElementById('mg37b-a').value;
            var datomg37bb = document.getElementById('mg37b-b').value;
            var datomg37bc = document.getElementById('mg37b-c').value;

            var datomg36ba = document.getElementById('mg36b-a').value;
            var datomg36bb = document.getElementById('mg36b-b').value;
            var datomg36bc = document.getElementById('mg36b-c').value;

            var datomg35ba = document.getElementById('mg35b-a').value;
            var datomg35bb = document.getElementById('mg35b-b').value;
            var datomg35bc = document.getElementById('mg35b-c').value;

            var datomg34ba = document.getElementById('mg34b-a').value;
            var datomg34bb = document.getElementById('mg34b-b').value;
            var datomg34bc = document.getElementById('mg34b-c').value;

            var datomg33ba = document.getElementById('mg33b-a').value;
            var datomg33bb = document.getElementById('mg33b-b').value;
            var datomg33bc = document.getElementById('mg33b-c').value;

            var datomg32ba = document.getElementById('mg32b-a').value;
            var datomg32bb = document.getElementById('mg32b-b').value;
            var datomg32bc = document.getElementById('mg32b-c').value;

            var datomg31ba = document.getElementById('mg31b-a').value;
            var datomg31bb = document.getElementById('mg31b-b').value;
            var datomg31bc = document.getElementById('mg31b-c').value;

            var total38bm = parseInt(datomg38ba) + parseInt(datomg38bb) + parseInt(datomg38bc) +
                parseInt(datomg37ba) + parseInt(datomg37bb) + parseInt(datomg37bc) +
                parseInt(datomg36ba) + parseInt(datomg36bb) + parseInt(datomg36bc) +
                parseInt(datomg35ba) + parseInt(datomg35bb) + parseInt(datomg35bc) +
                parseInt(datomg34ba) + parseInt(datomg34bb) + parseInt(datomg34bc) +
                parseInt(datomg33ba) + parseInt(datomg33bb) + parseInt(datomg33bc) +
                parseInt(datomg32ba) + parseInt(datomg32bb) + parseInt(datomg32bc) +
                parseInt(datomg31ba) + parseInt(datomg31bb) + parseInt(datomg31bc);

            var datomg48ba = document.getElementById('mg48b-a').value;
            var datomg48bb = document.getElementById('mg48b-b').value;
            var datomg48bc = document.getElementById('mg48b-c').value;

            var datomg47ba = document.getElementById('mg47b-a').value;
            var datomg47bb = document.getElementById('mg47b-b').value;
            var datomg47bc = document.getElementById('mg47b-c').value;

            var datomg46ba = document.getElementById('mg46b-a').value;
            var datomg46bb = document.getElementById('mg46b-b').value;
            var datomg46bc = document.getElementById('mg46b-c').value;

            var datomg45ba = document.getElementById('mg45b-a').value;
            var datomg45bb = document.getElementById('mg45b-b').value;
            var datomg45bc = document.getElementById('mg45b-c').value;

            var datomg44ba = document.getElementById('mg44b-a').value;
            var datomg44bb = document.getElementById('mg44b-b').value;
            var datomg44bc = document.getElementById('mg44b-c').value;

            var datomg43ba = document.getElementById('mg43b-a').value;
            var datomg43bb = document.getElementById('mg43b-b').value;
            var datomg43bc = document.getElementById('mg43b-c').value;

            var datomg42ba = document.getElementById('mg42b-a').value;
            var datomg42bb = document.getElementById('mg42b-b').value;
            var datomg42bc = document.getElementById('mg42b-c').value;

            var datomg41ba = document.getElementById('mg41b-a').value;
            var datomg41bb = document.getElementById('mg41b-b').value;
            var datomg41bc = document.getElementById('mg41b-c').value;

            var total48bm = parseInt(datomg48ba) + parseInt(datomg48bb) + parseInt(datomg48bc) +
                parseInt(datomg47ba) + parseInt(datomg47bb) + parseInt(datomg47bc) +
                parseInt(datomg46ba) + parseInt(datomg46bb) + parseInt(datomg46bc) +
                parseInt(datomg45ba) + parseInt(datomg45bb) + parseInt(datomg45bc) +
                parseInt(datomg44ba) + parseInt(datomg44bb) + parseInt(datomg44bc) +
                parseInt(datomg43ba) + parseInt(datomg43bb) + parseInt(datomg43bc) +
                parseInt(datomg42ba) + parseInt(datomg42bb) + parseInt(datomg42bc) +
                parseInt(datomg41ba) + parseInt(datomg41bb) + parseInt(datomg41bc);

            var totalmg = total18m + total28m + total38m + total48m + total18bm + total28bm + total38bm + total48bm;
            var mediapsmg = (totalps + totalmg) / (totalDientes * 3);
            var redondeadopsmg = Math.round(mediapsmg * Math.pow(10, 2)) / Math.pow(10, 2);

            $("#suma5").text(redondeadopsmg);
        }

        var contador = 0;
        var piezas_buscadas = new Set();

        function mostrar_nueva_pieza_dental_tto(pieza) {
            // Verificar si la pieza ya fue buscada
            // if (piezas_buscadas.has(pieza)) {
            //     console.log("La pieza ya ha sido buscada.");
            //     return; // Salir de la función si la pieza ya está en el set
            // }

            // Agregar la pieza al set de piezas buscadas
            // piezas_buscadas.add(pieza);

            contador++;
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_tto') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    pieza: pieza,
                    seccion: 'impl',
                    counter: contador,
                    id_paciente: $('#id_paciente').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_pieza_tto_implante').empty();
                    $('#contenedor_pieza_tto_implante').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $('#trabajo_realizar_trabajo_mayor').each(function() {
            $(this).autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getPrestacionesLaboratorio') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.length == 0) {
                                $('.diagnostico_activo').hide();
                                $('.diagnostico_inactivo').show();
                            } else {
                                $('.diagnostico_activo').show();
                                $('.diagnostico_inactivo').hide();
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    console.log(ui.item);
                    $(this).val(ui.item.label);
                    $('#valor_prestacion_trabajo_mayor').val(ui.item.valor);
                    $(this).next('input[type="hidden"]').val(ui.item.value); // Asigna el valor al input hidden correspondiente
                    return false;
                }
            });
        });


        function mostrar_nueva_pieza_dental_tto_period(counter) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_tto') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    seccion: 'period',
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_pieza_plan_implante').empty();
                    $('#contenedor_pieza_plan_implante').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function mostrar_nueva_pieza_dental_end(counter) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_end') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_nuevo_examen_end').empty();
                    $('#contenedor_nuevo_examen_end').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function ocultarExamen(counter) {
            $('#nueva_pieza_dental_odontodolor').empty();
        }

        function ocultarExamenEnd(counter) {
            $('#contenedor_nuevo_examen_end').empty();
        }


        function guardar_pieza_dental_end(count) {
            let derivado_por = $('#ex_end_derivado_por').val();
            let zona_dolor = $('#ex_end_zona_dolor').val();
            let historia_anterior = $('#ex_end_hist_ant').val();

            let pieza_numero = $('#end_numero_pieza' + count).val();
            let tipo_dolor = $('#end_tipo_dolor' + count).val();
            let intensidad = $('#end_intensidad' + count).val();
            let modo_dolor = $('#end_modo_dolor' + count).val();
            let loc_dolor = $('#end_loc_dolor' + count).val();
            let provocacion_dolor = $('#end_provocacion_dolor' + count).val();
            let cdo_duele = $('#end_cdo_duele' + count).val();
            let tpo_evolucion = $('#end_tpo_evolucion' + count).val();
            let obs_anal_dolor = $('#end_obs_loc_dolor' + count).val();

            let valido = 1;
            let mensaje = '';

            if (derivado_por == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Derivado por </li>';
            }
            if (zona_dolor == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Zona dolor </li>';
            }
            if (historia_anterior == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Historia anterior </li>';
            }
            if (pieza_numero == '') {
                valido = 0;
                mensaje += '<li>Campo requerido N° Pieza </li>';
            }
            if (tipo_dolor == 0) {
                valido = 0;
                mensaje += '<li>Campo requerido Tipo Dolor </li>';
            }
            if (intensidad == 0) {
                valido = 0;
                mensaje += '<li>Campo requerido Intensidad </li>';
            }
            if (obs_anal_dolor == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Observaciones analgesicos dolor </li>';
            }

            if (valido == 0) {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje,
                        },
                    },
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
                return false;
            }

            let data = {
                _token: CSRF_TOKEN,
                derivado_por: derivado_por,
                zona_dolor: zona_dolor,
                historia_anterior: historia_anterior,
                pieza_numero: pieza_numero,
                tipo_dolor: tipo_dolor,
                intensidad: intensidad,
                modo_dolor: modo_dolor,
                loc_dolor: loc_dolor,
                provocacion_dolor: provocacion_dolor,
                cdo_duele: cdo_duele,
                tpo_evolucion: tpo_evolucion,
                obs_anal_dolor: obs_anal_dolor,
                id_paciente: $('#id_paciente_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_ficha_atencion: $('#id_ficha_atencion').val(),
                id_profesional: $('#id_profesional_fc').val(),
                count: count
            }

            let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_end_dolor') }}";

            $.ajax({
                url: url,
                type: 'post',
                data: data,
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_examen_dolor_end').empty();
                    $('#contenedor_examen_dolor_end').append(resp.v);
                    $('#contenedor_nuevo_examen_end').empty();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function eliminarExamenAgregado(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar este examen?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmarEliminarExamenAgregado(id);
                }
            })
        }

        function eliminarExamenEndAgregado(id, tipo_examen) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar este examen?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmarEliminarExamenEndAgregado(id, tipo_examen);
                }
            })
        }
        {{--  $('#mensaje_ficha').html(' Para el mejor funcionamiento del sistema rogamos anotar cualquier tipo de incidente o antecedente nuevo del paciente esto aportará a usted o sus colegas mayor información  acerca del paciente a tratar ');
$('#mensaje_ficha').show();
setTimeout(function(){
    $('#mensaje_ficha').hide();
}, 8000);  --}}

        function confirmarEliminarExamenAgregado(id) {
            let url = "{{ route('profesional.eliminar_nueva_pieza_dental') }}";
            var idPaciente = $('#id_paciente_fc').val();
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id: id,
                    id_paciente: idPaciente,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    let mensaje = resp.mensaje;
                    let vista = resp.vista;
                    if (mensaje == 'OK') {
                        swal({
                            title: 'Éxito',
                            text: 'Evolución eliminada correctamente',
                            icon: 'success',
                            button: 'Aceptar'
                        });
                        $('#contenedor_pieza_dental_odontodolor').empty();
                        $('#contenedor_pieza_dental_odontodolor').append(vista);
                    } else {
                        swal({
                            title: 'Error',
                            text: 'mensaje',
                            icon: 'error',
                            button: 'Aceptar'
                        })
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function confirmarEliminarExamenEndAgregado(id, tipo_examen) {
            let url = "{{ route('profesional.eliminar_nueva_pieza_dental_end') }}";
            var idPaciente = $('#id_paciente_fc').val();
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id: id,
                    id_paciente: idPaciente,
                    tipo_examen: tipo_examen,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    let mensaje = resp.mensaje;
                    let vista = resp.vista;
                    if (mensaje == 'OK') {
                        swal({
                            title: 'Éxito',
                            text: 'Evolución eliminada correctamente',
                            icon: 'success',
                            button: 'Aceptar'
                        });
                        if (tipo_examen == 'endo') {
                            $('#contenedor_examen_dolor_end').empty();
                            $('#contenedor_examen_dolor_end').append(vista);
                        } else if (tipo_examen == 'odontop') {
                            $('#contenedor_pieza_dental_od_general').empty();
                            $('#contenedor_pieza_dental_od_general').append(vista);
                        }

                    } else {
                        swal({
                            title: 'Error',
                            text: 'mensaje',
                            icon: 'error',
                            button: 'Aceptar'
                        })
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function mostrarFormularioReceta(id) {
            console.log(id);
            if (id == 1) {
                $('#rec_1').addClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').removeClass('show active');
            } else if (id == 2) {
                $('#rec_2').addClass('show active');
                $('#rec_1').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').removeClass('show active');
            } else if (id == 3) {
                $('#rec_1').removeClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').addClass('show active');
                $('#curaciones_div').removeClass('show active');
            } else {
                console.log('es 4');
                $('#rec_1').removeClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').addClass('show active');
            }
        }

        function indicar_procedimiento_sdi() {
            var ind_med = $('#ind_med').val();
            var ind_cur = $('#ind_cur').val();
            var ind_proc = $('#ind_proc').val();
            var ind_inmmed = $('#ind_inmmed').val();
            var ind_cc = $('#ind_cv_inmmed_urg').val();
            var ind_pp = $('#ind_pp').val();
            var ind_vig_sig = $('#ind_vig_sig').val();

            var obs_ind_med = $('#obs_ind_med_servicio').val();
            var obs_detalle_ind_med = $('#obs_detalle_ind_med').val();

            var params = new URLSearchParams(location.search);
            var id_paciente = $('#id_paciente').val();

            var valido = 0;
            var mensaje = '';

            // if ($.trim(ind_med) == '' || ind_med == 0 || $.trim(ind_med) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Vias y Cateter.\n';
            // }

            // if ($.trim(ind_cur) == '' || ind_cur == 0 || $.trim(ind_cur) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Curaciones.\n';
            // }

            // if ($.trim(ind_proc) == '' || ind_proc == 0 || $.trim(ind_proc) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Sondas y procedimientos.\n';
            // }

            // if ($.trim(ind_inmmed) == '' || ind_inmmed == 0 || $.trim(ind_inmmed) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Inmovilizacion.\n';
            // }

            // if ($.trim(ind_cc) == '' || ind_cc == 0 || $.trim(ind_cc) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Control de ciclo.\n';
            // }

            // if ($.trim(ind_pp) == '' || ind_pp == 0 || $.trim(ind_pp) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Preparar para.\n';
            // }

            // if ($.trim(ind_vig_sig) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Vigilar signos de alerta.\n';
            // }

            // if ($.trim(obs_ind_med) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Observaciones.\n';
            // }

            // if ($.trim(obs_detalle_ind_med) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Detalle de Observaciones.\n';
            // }


            if (valido == 0) {
                let data = {
                    ind_med: ind_med,
                    ind_cur: ind_cur,
                    ind_proc: ind_proc,
                    ind_inmmed: ind_inmmed,
                    ind_cc: ind_cc,
                    ind_pp: ind_pp,
                    ind_vig_sig: ind_vig_sig,
                    id_paciente: id_paciente,
                    obs_ind_med: obs_ind_med,
                    obs_detalle_ind_med: obs_detalle_ind_med,
                    _token: "{{ csrf_token() }}"
                };

                console.log(data);
                var url = "{{ route('indicar_procedimiento_sdi') }}";
                $.ajax({
                        url: url,
                        type: "post",
                        data: data,
                        dataType: "json",
                    })
                    .done(function(data) {
                        if (data.status == 1) {
                            let procedimientos = data.procedimientos;
                            let curaciones = data.curaciones;

                            $('#tabla_procedimientos_servicio tbody').empty();
                            $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                            $('#tabla_curaciones_servicio tbody').empty();
                            $('#tabla_curaciones_procedimientos tbody').empty();
                            $('#tabla_procedimientos_hosp tbody').empty();
                            procedimientos.forEach(function(procedimiento) {
                                console.log(procedimiento.id);
                                if (procedimiento.estado == 0) {
                                    var html = '<span class="badge badge-warning">Suspendido </span>';
                                } else {
                                    var html = '';
                                }
                                let datos = JSON.parse(procedimiento.datos_procedimiento);
                                // Ahora puedes trabajar con datos como un objeto JSON

                                $('#tabla_procedimientos_servicio tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora}</td>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                        <i class="feather icon-x"></i>Eliminar
                                    </button>
                                    <button type="button"
                                        class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                        onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                        <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                        ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                    </button>
                                </td>
                            </tr>
                        `);

                                $('#tabla_procedimientos_hosp tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora}</td>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                <td class="text-center align-middle text-wrap">
                                    <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                </td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                        <i class="feather icon-x"></i>Eliminar
                                    </button>
                                    <button type="button"
                                        class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                        onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                        <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                        ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                    </button>
                                </td>
                            </tr>
                        `);
                            });
                            if (curaciones.length > 0) {
                                curaciones.forEach(function(curacion) {
                                    let datos = curacion.datos_curacion;
                                    // Ahora puedes trabajar con datos como un objeto JSON
                                    console.log(curacion);
                                    $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm" >
                                            <i class="fas fa-edit"></i>

                                        </button>
                                    </td>
                                </tr>
                            `);

                                    $('#tabla_curaciones_procedimientos tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="feather icon-x"></i></button></td>
                            </tr>
                            `);
                                });
                            }

                            swal({
                                title: "Indicación de Procedimiento.",
                                text: data.mensaje,
                                icon: "success",
                                buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        } else {
                            swal({
                                title: "Indicación de Procedimiento.",
                                text: data.mensaje,
                                icon: "error",
                                buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                        }
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            } else {
                swal({
                    title: "Indicación de Procedimiento.",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        }

        function getDosis() {

            let id_medicamento = $('#id_medicamento_ficha_dental').val();
            console.log(id_medicamento);

            let url = "{{ route('dental.getDosis') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        id_medicamento: id_medicamento,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let dosis = $('#dosis_medicamento_ficha_dental');

                        dosis.find('option').remove();
                        dosis.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.dosis + '" data-id="' + v.id +
                                '" data-cant_comp="' + v.cant_comp + '">' + v.present +
                                '</option>');
                        })

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function evaluar_para_carga_detalle(select, div, input, valor) {
            var valor_select = $('#' + select + '').val();
            if (valor_select == valor) $('#' + div + '').show();
            else {
                $('#' + div + '').hide();
                $('#' + input + '').val('');
            }
        }

        function eliminar_procedimiento_sdi(id) {
            swal({
                title: "Eliminar Procedimiento.",
                text: 'Al "Aceptar" Elimina el procedimiento.\n',
                icon: "warning",
                buttons: ["Cancelar", 'Aceptar'],
            }).then((result) => {
                console.log(result);
                if (result == true) {
                    eliminar_procedimiento_sdi_ajax(id);
                } else {
                    console.log('regresar');
                }
            });
        }

        function suspender_procedimiento_sdi(id) {
            var url = "{{ route('suspender_procedimiento_sdi') }}";
            var id_paciente = $('#id_paciente').val();

            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        id: id,
                        id_paciente: id_paciente,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(procedimientos);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            if (procedimiento.estado == 0) {
                                var html = '<span class="badge badge-warning">Suspendido </span>';
                            } else {
                                var html = '';
                            }
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                            <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                            <td class="text-center align-middle text-wrap">
                                <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                            </td>
                            <td class="text-center align-middle text-wrap">
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                    <i class="feather icon-x"></i>Eliminar
                                </button>
                                <button type="button"
                                    class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                    onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                    <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                    ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                </button>
                            </td>
                        </tr>
                    `);

                            $('#tabla_procedimientos_hosp tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                            <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                            <td class="text-center align-middle text-wrap">
                                <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                            </td>
                            <td class="text-center align-middle text-wrap">
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                    <i class="feather icon-x"></i>Eliminar
                                </button>
                                <button type="button"
                                    class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                    onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                    <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                    ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                </button>
                            </td>
                        </tr>
                    `);

                        });

                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                        <tr>
                            <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                            <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                            <td class="text-center align-middle">
                                <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                            </td>
                            <td class="text-center align-middle">
                                <div class="switch switch-success d-inline">
                                    <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                    <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                    Insumos
                                </button>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-outline-warning btn-sm" >
                                    <i class="fas fa-edit"></i>

                                </button>
                            </td>
                        </tr>
                    `);
                        });

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function eliminar_procedimiento_sdi_ajax(id) {
            var url = "{{ route('eliminar_procedimiento_sdi') }}";
            var id_paciente = $('#id_paciente').val();
            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        id: id,
                        id_paciente: id_paciente,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(curaciones);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            if (procedimiento.estado == 0) {
                                var html = '<span class="badge badge-warning">Suspendido </span>';
                            } else {
                                var html = '';
                            }
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                        <i class="feather icon-x"></i>Eliminar
                                    </button>
                                    <button type="button"
                                        class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                        onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                        <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                        ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                    </button>
                                </td>
                            </tr>
                        `);

                            $('#tabla_procedimientos_hosp tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                <td class="text-center align-middle text-wrap">
                                    <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                </td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                        <i class="feather icon-x"></i>Eliminar
                                    </button>
                                    <button type="button"
                                        class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                        onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                        <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                        ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                    </button>
                                </td>
                            </tr>
                        `);
                        });

                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                        <tr>
                            <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                            <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                            <td class="text-center align-middle">
                                <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                            </td>
                            <td class="text-center align-middle">
                                <div class="switch switch-success d-inline">
                                    <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                    <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                    Insumos
                                </button>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-outline-warning btn-sm" >
                                    <i class="fas fa-edit"></i>

                                </button>
                            </td>
                        </tr>
                    `);
                        });

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function eliminarCuracion(id) {
            swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no podrás recuperar este registro!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('eliminar_curacion') }}",
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id,
                                "id_paciente": $('#id_paciente').val()
                            },
                            success: function(data) {

                                // convertir json a objeto
                                var obj = JSON.parse(data);
                                var curaciones = obj.curaciones;
                                $('#tabla_curaciones_servicio tbody').empty();
                                $('#tabla_curaciones_procedimientos tbody').empty();
                                curaciones.forEach(curacion => {
                                    let datos = curacion.datos_curacion;
                                    $('#tabla_curaciones_servicio tbody').append(`
                            <tr>
                                <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle">
                                    <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                </td>
                                <td class="text-center align-middle">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                        <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                        Insumos
                                    </button>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})">
                                        <i class="feather icon-x"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                                    $('#tabla_curaciones_procedimientos tbody').append(`
                        <tr>
                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${curacion.id}</td>
                            <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                            <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${curacion.id}" name="ind_vig_sig${curacion.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        `);
                                });

                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    }
                });

        }

        function eliminar_medicamento_sdi(id) {
            // swal({
            //     title: "Eliminar Medicamento",
            //     text: "¿Está seguro de eliminar el medicamento?",
            //     icon: "warning",
            //     buttons: ["Cancelar", "Aceptar"],
            //     dangerMode: true,
            // }).then((willDelete) => {
            //     if (willDelete) {
            //         let url = "{{ route('detalle_receta.eliminar') }}";
            //         var _token = CSRF_TOKEN;
            //         $.ajax({
            //             url: url,
            //             type: "POST",
            //             data: {
            //                 _token: _token,
            //                 id: id,
            //             },
            //             success: function(resp) {
            //                 console.log(resp);
            //                 let mensaje = resp.status;
            //                 if (mensaje == 'success') {
            //                     let medicamentos = resp.data;
            //                     $('#tbody_tabla_medicamento_cirugia_sdi').empty();
            //                     $('#tbody_tabla_medicamento_manual').empty();
            //                     $('#tabla_tratamientos_servicio tbody').empty();
            //                     medicamentos.forEach(medicamento => {
            //                         console.log(medicamento);
            //                         if (medicamento.id_dosis == null) {
            //                             medicamento.dosis = medicamento.nombre_dosis;
            //                         }

            //                         if (medicamento.id_frecuencia == null || medicamento
            //                             .id_frecuencia == 0) {
            //                             medicamento.indicaciones = medicamento
            //                                 .nombre_frecuencia;
            //                         }

            //                         let fila = `<tr id="row${medicamento.id}">
            //                             <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
            //                             <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
            //                             <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
            //                             <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
            //                             <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
            //                             <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
            //                             <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
            //                             <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
            //                             <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
            //                             <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
            //                             <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="feather icon-x"></i></div></td>
            //                         </tr>`;

            //                         let fila_ = `<tr id="row${medicamento.id}">
            //                             <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
            //                             <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
            //                             <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
            //                             <td><input type="text" disabled></td>
            //                             <td class="p-0">
            //                                 <div class="switch switch-success d-inline">
            //                                     <input type="checkbox" id="tratamiento_listo${medicamento.id}">
            //                                     <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
            //                                 </div><br>
            //                                 <label>Listo</label>
            //                             </td>
            //                             <td></td>
            //                             <td>
            //                                 <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
            //                             </td>
            //                             <td><button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"> </i></button> </td>
            //                         </tr>`;
            //                         $('#tbody_tabla_medicamento_cirugia_sdi').append(fila);
            //                         $('#tbody_tabla_medicamento_manual').append(fila);
            //                         $('#tabla_tratamientos_servicio tbody').append(fila_);
            //                     });
            //                     swal({
            //                         title: "Medicamento Eliminado",
            //                         icon: "success",
            //                         // buttons: "Aceptar",
            //                         //SuccessMode: true,
            //                     });
            //                 }
            //             },
            //             error: function(error) {
            //                 console.log(error.responseText);
            //             }
            //         })
            //     }
            // });
            $('#tabla_medicamento_cirugia_sdi [id='+id_row+']').remove();
        }

        function indicar_medicamento_manual_sdi() {
            let nombre_medicamento_ficha_dental = $('#manual_nombre_medicamento_ficha_dental').val();
            let id_medicamento = $('#manual_id_medicamento_ficha_dental').val();
            let farmaco = $('#manual_nombre_composicion_farmaco').val();
            let tipo_control = $('#manual_tipo_control').val();

            let dosis_medicamento_ficha_dental = $('#manual_dosis_medicamento_ficha_dental').val();
            let frecuencia_medicamento_ficha_dental = $('#manual_frecuencia_medicamento_ficha_dental').val();

            let cantidad_comprar = $('#manual_cantidad_comprar').val();
            let cantidad_numero_comprar = $('#manual_cantidad_numero').val();

            let id_via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental').val();
            let via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental option:selected').text();

            let observaciones_medicamento_ficha_dental = $('#manual_observaciones_via_administracion_ficha_dental').val();

            let id_periodo_ficha_dental = $('#manual_periodo_ficha_dental').val();
            let periodo_ficha_dental = $('#manual_periodo_ficha_dental option:selected').text();

            let observaciones_periodo_ficha_dental = $('#manual_observaciones_periodo_ficha_dental').val();



            var lista_med = [];
            $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    lista_med.push($.trim($(data[2]).text().split("\n").join("")));
                }
            });

            if ($.inArray(nombre_medicamento_ficha_dental, lista_med) == -1) {

                var medicamento_uso_cronico = 0;
                if ($('#manual_medicamento_uso_cronico').is(':checked'))
                    medicamento_uso_cronico = 1;

                var valido = 0;
                var mensaje = '';

                if ($.trim(nombre_medicamento_ficha_dental) == '') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Medicamento.\n';
                }

                if ($.trim(tipo_control) == '0') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Tipo Control.\n';
                }

                if ($.trim(farmaco) == '') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Farmaco.\n';
                }

                if ($.trim(dosis_medicamento_ficha_dental) == '') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Presentación.\n';
                }

                if ($.trim(frecuencia_medicamento_ficha_dental) == '') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Posología.\n';
                }


                if ($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(
                        via_administracion_ficha_dental) == 'Seleccione') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Via de Administración.\n';
                } else if ($('#via_administracion_ficha_dental').val() == 11) {
                    if ($.trim(observaciones_medicamento_ficha_dental) == '') {
                        valido = 1;
                        mensaje += 'Debe ingresar Otra Vía Administración\n';
                    } else {
                        via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
                    }
                }

                // if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
                // {
                //     valido = 1;
                //     mensaje += 'Debe completar el campo Periodo.\n';
                // }
                // else if($('#periodo_ficha_dental').val() == 11)
                // {
                //     if( $.trim(observaciones_periodo_ficha_dental) == '')
                //     {
                //         valido = 1;
                //         mensaje += 'Debe ingresar Otro Periodo\n';
                //     }
                //     else
                //     {
                //         periodo_ficha_dental = observaciones_periodo_ficha_dental;
                //     }
                // }

                // if($.trim(cantidad_comprar) == '')
                // {
                //     valido = 1;
                //     mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
                // }
                // else
                // {
                //     const regex = /\(\d+\) \w+ \w+/g;
                //     if (!regex.test(cantidad_comprar))
                //     {
                //         console.log('no cuadra');
                //         valido = 1;
                //         mensaje += 'El campo de Cantidad a Comprar no tiene el formato adecuado\n Ejemplo: (1) Una Caja.\n';
                //     }
                //     else
                //     {
                //         console.log('correcto');
                //     }
                // }

                if (valido == 0) {
                    var parametros = {
                        "id_tipo_control": tipo_control,
                        "id_medicamento": id_medicamento,
                        "nombre_medicamento_ficha_dental": nombre_medicamento_ficha_dental,
                        "farmaco": farmaco,
                        "dosis_medicamento_ficha_dental": dosis_medicamento_ficha_dental,
                        "frecuencia_medicamento_ficha_dental": frecuencia_medicamento_ficha_dental,
                        "via_administracion_ficha_dental": via_administracion_ficha_dental,
                        "observaciones_medicamento_ficha_dental": observaciones_medicamento_ficha_dental,
                        "medicamento_uso_cronico": medicamento_uso_cronico,

                    }

                    console.log(parametros);
                    $('.medicamentos_sin_registros').remove();
                    agregarMedicamentoManualReceta(parametros, 1);

                    /** enviando a table de medicamento faltante */
                    if ($('#id_medicamento_ficha_dental').val() == '') {
                        $('#med_faltante').val(nombre_medicamento_ficha_dental);
                        enviar_medicamento_faltante_sdi();
                    }


                    $('#manual_nombre_medicamento_ficha_dental').val('');
                    $('#manual_id_medicamento_ficha_dental').val('');
                    $('#manual_nombre_composicion_farmaco').val('');
                    $('#manual_dosis_medicamento_ficha_dental').val('');
                    $('#manual_frecuencia_medicamento_ficha_dental').val('');
                    $('#manual_cantidad_comprar').val('');
                    $('#manual_via_administracion_ficha_dental').val(0);
                    $('#manual_observaciones_via_administracion_ficha_dental').val('');
                    $('#manual_periodo_ficha_dental').val(0);
                    $('#manual_observaciones_periodo_ficha_dental').val('');

                    $("#medicamento_uso_cronico").prop("checked", false).change();

                } else {
                    swal({
                        title: "Ingreso de medicamento(s).",
                        text: mensaje,
                        icon: "error",
                    });
                }
            } else {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text: 'El medicamento está Recetado',
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        }

        function validar_via_administracion_manual_sdi() {
            if ($('#manual_via_administracion_ficha_dental').val() == 11) {
                $('#div_manual_observaciones_via_administracion_ficha_dental').show();
                $('#manual_observaciones_via_administracion_ficha_dental').removeAttr('disabled');
            } else {
                $('#div_manual_observaciones_via_administracion_ficha_dental').hide();
                $('#manual_observaciones_via_administracion_ficha_dental').attr('disabled', 'disabled');
                $('#manual_observaciones_via_administracion_ficha_dental').val('');
            }
        }

        function agregarMedicamentoManualReceta(parametros, receta_am) {

            let url = "{{ route('detalle_receta.registro_manual_receta') }}";
            let id_paciente = $('#id_paciente').val();
            let selectedOption = $('#dosis_medicamento_ficha_dental option:selected');
            let dataId = selectedOption.data('id');
            var _token = CSRF_TOKEN;
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_ficha: $('#id_fc').val(),
                    id_tipo_control: parametros.id_tipo_control,
                    id_medicamento: parametros.id_medicamento,
                    nombre_medicamento_ficha_dental: parametros.nombre_medicamento_ficha_dental,
                    nombre_dosis_ficha_dental: parametros.dosis_medicamento_ficha_dental,
                    nombre_frecuencia_ficha_dental: parametros.frecuencia_medicamento_ficha_dental,
                    via_administracion: parametros.via_administracion_ficha_dental,
                    farmaco: parametros.farmaco,
                    observaciones: parametros.observaciones_medicamento_ficha_dental,
                    uso_cronico: parametros.medicamento_uso_cronico,
                    id_paciente: id_paciente,
                    receta_am: receta_am,
                },
                success: function(resp) {
                    console.log(resp);
                    let mensaje = resp.status;
                    if (mensaje == 'success') {
                        let medicamentos = resp.data;
                        $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                        $('#tbody_tabla_medicamento_manual').empty();
                        $('#tabla_tratamientos_servicio tbody').empty();
                        medicamentos.forEach(medicamento => {
                            console.log(medicamento);
                            if (medicamento.id_dosis == null) {
                                medicamento.dosis = medicamento.nombre_dosis;
                            }

                            if (medicamento.id_frecuencia == null || medicamento.id_frecuencia == 0 ||
                                medicamento.id_frecuencia == 1000) {
                                medicamento.indicaciones = medicamento.nombre_frecuencia;
                            }
                            let fila = `<tr id="row${medicamento.id}">
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="feather icon-x"></i></div></td>
                            </tr>`;

                            let fila_ = `<tr id="row${medicamento.id}">
                                <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                <td><input type="text" disabled></td>
                                <td class="p-0">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="tratamiento_listo${medicamento.id}" disabled>
                                        <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                    </div><br>
                                    <label>Pendiente</label>
                                </td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                </td>
                                <td> <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarObservaciones" onclick="dame_tratamiento(${medicamento.id})"><i class="fas fa-edit"> </i></button></td>
                            </tr>`;
                            $('#tbody_tabla_medicamento_cirugia_sdi').append(fila);
                            $('#tbody_tabla_medicamento_manual').append(fila);
                            $('#tabla_tratamientos_servicio tbody').append(fila_);
                        });
                        swal({
                            title: "Medicamento Agregado",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            })
        }


        function mostrar_nuevas_imagenes_dent(counter) {
            let url = "{{ ROUTE('profesional.mostrar_nuevas_imagenes_dental') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    id_ficha_atencion: $('#id_fc').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_nueva_imagen_dent').empty();
                    $('#contenedor_nueva_imagen_dent').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function mostrar_nuevas_imagenes_dent_estudio(counter) {
            let url = "{{ ROUTE('profesional.mostrar_nuevas_imagenes_dental') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    tipo: 'preimplante',
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_nueva_imagen_dent_estudio').empty();
                    $('#contenedor_nueva_imagen_dent_estudio').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function mostrar_nuevas_imagenes_dent_periodoncica(counter) {
            let url = "{{ ROUTE('profesional.mostrar_nuevas_imagenes_dental') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    tipo: 'periodoncica',
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_nueva_imagen_dent_period').empty();
                    $('#contenedor_nueva_imagen_dent_period').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function ocultar_pieza_imagenes_rx() {
            $('#contenedor_nueva_imagen_dent').empty();
        }

        function ocultar_pieza_imagenes_rx_estudio() {
            $('#contenedor_nueva_imagen_dent_estudio').empty();
        }

        function mostrar_nueva_pieza_ex_radio(counter) {
            console.log(counter);
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_rx') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_examenes_oral_rx').empty();
                    $('#contenedor_examenes_oral_rx').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }



        function eliminar_pieza_dental_rx(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar este examen?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmar_eliminar_pieza_dental_rx(id);
                }
            })
        }

        function editar_pieza_dental_rx(id) {
            // abrir_modal
            $('#modal_agregar_imagenes_dental_paciente').modal('show');
        }


        function confirmar_eliminar_pieza_dental_rx(id) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_rx') }}";
            let id_paciente = $('#id_paciente_fc').val();

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: CSRF_TOKEN
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#pieza_dentalrx').empty();
                        $('#pieza_dentalrx').append(resp.v);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function amplificar_imagen(path) {
            // abrir modal
            $('#modal_imagen_dental_rx').modal('show');
            $('.zoom-container').on('mousemove', function(e) {
                const $img = $(this).find('img');
                const offsetX = e.offsetX; // Posición X del mouse dentro del contenedor
                const offsetY = e.offsetY; // Posición Y del mouse dentro del contenedor
                const width = $(this).width();
                const height = $(this).height();
                const xPercent = (offsetX / width) * 100; // Porcentaje X
                const yPercent = (offsetY / height) * 100; // Porcentaje Y

                $img.css('transform-origin', `${xPercent}% ${yPercent}%`); // Ajusta el origen de transformación
            });
            $('#imagen_paciente_rx').attr('src', "{{ asset('storage') }}" + "/" + path);
        }

        function eliminar_rx(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar esta RX?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmarEliminarImagenRx(id);
                }
            })
        }

        function confirmarEliminarImagenRx(id) {
            let url = "{{ ROUTE('profesional.eliminar_imagen_rx_paciente') }}";
            let data = {
                _token: CSRF_TOKEN,
                id: id,
                id_paciente: $('#id_paciente_fc').val()
            }

            $.ajax({
                type: 'post',
                data: data,
                url: url,
                success: function(resp) {
                    if (resp.mensaje == 'OK') {
                        $('#pieza_dentalrx').empty();
                        $('#pieza_dentalrx').append(resp.v);
                    } else {
                        $('#pieza_dentalrx').empty();
                        $('#pieza_dentalrx').append(resp.mensaje);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function eliminar_imagen_dental(id, path) {
            swal({
                    title: 'Advertencia',
                    text: '¿Está seguro de eliminar esta imagen?',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Aceptar'],
                    dangerMode: true,
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',

                })
                .then((confirm) => {
                    if (confirm) {
                        confirmar_eliminar_imagen_dental(id, path);
                    } else {
                        swal('Cancelado', 'La imagen no fue eliminada :(', 'error');
                    }
                });

        }

        function confirmar_eliminar_imagen_dental(id, path) {
            let url = "{{ route('profesional.eliminar_imagen_dental_paciente') }}";
            let data = {
                _token: CSRF_TOKEN,
                id: id,
                path: path,
                id_paciente: $('#id_paciente_fc').val()
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);

                    if (resp.mensaje == 'OK') {
                        let seccion = resp.seccion;
                        if (seccion == 'gral') {
                            $('#contenedor_imagenes_dent').empty();
                            $('#contenedor_imagenes_dent').append(resp.v);
                        } else if (seccion == 'implantologia') {
                            $('#contenedor_imagenes_dent_estudio').empty();
                            $('#contenedor_imagenes_dent_estudio').append(resp.v);
                        } else {
                            $('#contenedor_imagenes_dent_period').empty();
                            $('#contenedor_imagenes_dent_period').append(resp.v);
                        }

                    } else {
                        // $('#contenedor_imagenes_dent').empty();
                        // $('#contenedor_imagenes_dent').append(resp.mensaje);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function eliminar_pieza_dental_imagenes(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar esta información?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmar_eliminar_pieza_dental_imagenes(id);
                }
            })
        }

        function confirmar_eliminar_pieza_dental_imagenes(id) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_imagenes_paciente') }}";
            let id_paciente = $('#id_paciente_fc').val();

            let data = {
                _token: CSRF_TOKEN,
                id_paciente: id_paciente,
                id: id
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        let seccion = resp.seccion;
                        if (seccion == 'gral') {
                            $('#contenedor_imagenes_dent').empty();
                            $('#contenedor_imagenes_dent').append(resp.v);
                        } else if (seccion == 'implantologia') {
                            $('#contenedor_imagenes_dent_estudio').empty();
                            $('#contenedor_imagenes_dent_estudio').append(resp.v);
                        } else {
                            $('#contenedor_imagenes_dent_period').empty();
                            $('#contenedor_imagenes_dent_period').append(resp.v);
                        }

                        swal({
                            title: 'Exito',
                            text: 'Se ha guardado con exito',
                            icon: 'success'
                        })
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function eliminar_pieza_dental_imagenes_estudio(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar esta información?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmar_eliminar_pieza_dental_imagenes_estudio(id);
                }
            })
        }

        function confirmar_eliminar_pieza_dental_imagenes_estudio(id) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_imagenes_paciente') }}";
            let id_paciente = $('#id_paciente_fc').val();

            let data = {
                _token: CSRF_TOKEN,
                id_paciente: id_paciente,
                id: id
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#contenedor_imagenes_dent_estudio').empty();
                        $('#contenedor_imagenes_dent_estudio').append(resp.v);
                        swal({
                            title: 'Exito',
                            text: 'Se ha guardado con exito',
                            icon: 'success'
                        })
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }


        function pedir_autorizacion_presupuesto_dental() {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de solicitar la autorización del presupuesto?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmar_pedir_autorizacion_presupuesto_dental();
                }
            })
        }

        function confirmar_pedir_autorizacion_presupuesto_dental() {
            $('#modal_autorizacion_presupuesto').modal('show');
            $('#modal_autorizacion_imagen').html('');
            $('#modal_autorizacion_mensaje').html('');
            $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
        }

        function cerrar_autorizacion_presupuesto() {
            $('#modal_autorizacion_presupuesto').modal('hide');
        }

        function mostrar_nueva_pieza_dental_hist(count, tipo) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_hist') }}";
            let data = {
                count: count,
                id_paciente: $('#id_paciente_fc').val(),
                seccion: tipo,
                _token: CSRF_TOKEN
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        if (tipo == 'impl') {
                            $('#contenedor_piezas_hist').empty();
                            $('#contenedor_piezas_hist').append(resp.v);
                        } else {
                            $('#contenedor_piezas_hist_period').empty();
                            $('#contenedor_piezas_hist_period').append(resp.v);
                        }


                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function mostrar_nueva_pieza_dental_period(count) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_period') }}";
            let data = {
                count: count,
                id_paciente: $('#id_paciente_fc').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#contenedor_pieza_period_period').empty();
                        $('#contenedor_pieza_period_period').append(resp.v);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function solicitar_ic_periodoncia() {
            $('#modal_interconsulta_respuesta').modal('show');
        }

        function biopsia_check_implantologia(count) {
            // Obtén el checkbox
            var checkbox = $('#biopsia_check_implantologia' + count);

            // Obtén los textareas
            var textareaZona = $('#im_biop_zona' + count);
            var textareaObservaciones = $('#im_obs_result_biopsia' + count);

            // Verifica si el checkbox está marcado
            if (checkbox.is(':checked')) {
                // Si está marcado, habilita los textareas (remueve el atributo disabled)
                textareaZona.removeAttr('disabled');
                textareaObservaciones.removeAttr('disabled');
            } else {
                // Si no está marcado, deshabilita los textareas (añade el atributo disabled)
                textareaZona.attr('disabled', 'disabled');
                textareaObservaciones.attr('disabled', 'disabled');
            }
        }

        function biopsia_check_period(count) {
            console.log(count);
            // Obtén el checkbox
            var checkbox = $('#biopsia_check_period_period' + count);

            // Obtén los textareas
            var textareaZona = $('#period_biop_zona' + count);
            var textareaObservaciones = $('#period_obs_result_biopsia' + count);

            // Verifica si el checkbox está marcado
            if (checkbox.is(':checked')) {
                // Si está marcado, habilita los textareas (remueve el atributo disabled)
                textareaZona.removeAttr('disabled');
                textareaObservaciones.removeAttr('disabled');
            } else {
                // Si no está marcado, deshabilita los textareas (añade el atributo disabled)
                textareaZona.attr('disabled', 'disabled');
                textareaObservaciones.attr('disabled', 'disabled');
            }
        }
    </script>

    <script>
        function eliminar_pieza_dental_hist(id) {
            swal({
                    title: 'Advertencia',
                    text: '¿Está seguro de eliminar esta pieza?',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Aceptar'],
                    dangerMode: true
                })
                .then((aceptar) => {
                    if (aceptar) {
                        confirmar_eliminar_pieza_dental_hist(id);
                    } else {
                        swal('Cancelado', 'La pieza no fue eliminada :(', 'error');
                    }
                });
        }

        function confirmar_eliminar_pieza_dental_hist(id) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_hist') }}";
            let data = {
                _token: CSRF_TOKEN,
                id_paciente: $('#id_paciente_fc').val(),
                id: id,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val()
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        let seccion = resp.seccion;
                        if (seccion == 'impl') {
                            $('#hist_piezas').empty();
                            $('#hist_piezas').append(resp.v);
                        } else {
                            $('#hist_piezas_period').empty();
                            $('#hist_piezas_period').append(resp.v);
                        }


                        swal({
                            title: 'Exito',
                            text: 'Se ha eliminado con éxito',
                            icon: 'success'
                        });


                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function ocultar_pieza_impl(counter) {
            console.log(counter);
            $('#contenedor_pieza_tto_impl' + counter).empty();
        }

        function cargar_a_presupuesto_impl_g() {
            // preguntar si desea eliminar
            swal({
                    title: "Cargar Piezas",
                    text: "¿Está seguro que desea cargar el grupo de piezas?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    DangerMode: true,
                })
                .then((willLoad) => {
                    if (willLoad) {
                        cargar_a_presupuesto_impl_g_confirmar();
                    }
                });
        }

        function cargar_a_presupuesto_impl_g_confirmar() {
            // Obtener los valores seleccionados en el select
            var piezasSeleccionadas = $('#paciente_piezas_dentales_ex').val();
            let diagnosticoPiezas = $('#diagnostico_combo_g').val();
            var ttoPiezas = $('#diag_presupuesto_pieza_g').val();

            let valido = 1;
            let mensaje = '';

            if(diagnosticoPiezas == 0) {
                valido = 0;
                mensaje += '<li>Diagnóstico </li>';
            }
            if (piezasSeleccionadas.length == 0) {
                valido = 0;
                mensaje += '<li>Piezas seleccionadas </li>'
            }
            if (ttoPiezas == '') {
                valido = 0;
                mensaje += '<li>Tratamiento </li>';
            }

            if (valido == 0) {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "ul",
                        attributes: {
                            innerHTML: mensaje
                        }
                    },
                    icon: "error",
                });
                return false;
            }

            let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_period') }}";
            let data = {
                piezas: piezasSeleccionadas,
                diagnostico: diagnosticoPiezas,
                tto: ttoPiezas,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_paciente: $('#id_paciente_fc').val(),
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == 1) {
                        swal({
                            icon: 'success',
                            title: 'Info',
                            text: resp.mensaje
                        });
                        let odontograma = resp.odontograma_paciente;
                        odontograma_global = resp.odontograma_paciente;
                        let table_odontograma = $('#table_odontograma').DataTable();

                        // Vacía la tabla
                        table_odontograma.clear();

                        // Genera los datos (array de arrays o de objetos si usas columns)
                        let data = [];

                        odontograma.forEach(function(odonto) {
                            if(odonto.urgencia == 0){
                            let switchPresupuesto = `
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                        value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                        onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                    <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                                </div>
                            `;

                            let switchSeleccion = `
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                        id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                        onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                    <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                                </div>
                            `;

                            data.push([
                                odonto.fecha,
                                odonto.tratamiento,
                                odonto.caras,
                                odonto.pieza,
                                odonto.diagnostico,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                switchPresupuesto,
                                switchSeleccion
                            ]);
                            }
                        });

                        // Agrega las nuevas filas
                        table_odontograma.rows.add(data).draw();

                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);

                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        $('#n_pieza_ex_pp1000').empty();
                        // Este array almacenará solo las piezas únicas
                        let piezasUnicas = [];

                        // Este Set sirve para verificar si ya existe una pieza (más rápido que indexOf)
                        let piezasAgregadas = new Set();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                $('#contenedor_piezas_dentales_presupuesto').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                        <label class="floating-label-activo-sm">Pieza</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                        <label class="floating-label-activo-sm">Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                        <label class="floating-label-activo-sm">Total prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                                $('#table_trabajos_presupuesto tbody').append(`
                                <tr>
                                    <td>${odonto.fecha}</td>
                                    <td>${odonto.diagnostico} </td>
                                    <td>${odonto.caras} </td>
                                    <td>${odonto.pieza} </td>
                                    <td>${odonto.tratamiento} </td>
                                    <td>${formatoMoneda(odonto.valor)} </td>
                                    <td> </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                    </td>
                                </tr>
                            `);
                                // ✅ Si la pieza no se ha agregado aún, la incluimos en el array
                                if (!piezasAgregadas.has(odonto.pieza)) {
                                    piezasAgregadas.add(odonto.pieza);
                                    piezasUnicas.push(odonto.pieza);
                                }
                            }
                        });
                        // 🔁 Ahora recorrer el array de piezas únicas y llenar los select
                        piezasUnicas.forEach(function(pieza) {
                            $('#n_pieza_ex_pp1000').append(
                            `<option value="${pieza}">${pieza}</option>`);
                        });
                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let valores_lab = resp.valores[3];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos + valores_lab;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                        $('#total_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                        $('#total_presupuesto_dental').val(total_general);
                        $('#total_presupuesto').val(formatoMoneda(total_general));
                        $('#subtotal_presup').val(formatoMoneda(total_general));
                        $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                            valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                            total_general));

                        let table = $('#presup_estado_pago').DataTable();
                        table.clear().draw();

                        // Recorrer el odontograma y agregar nuevas filas
                        odontograma.forEach(function(odonto) {

                            if (odonto.presupuesto == 1) {
                                if (odonto.estado_pago == 'ok') {
                                    var clase = 'bg-success';
                                } else if (odonto.estado_pago == 'incompleto') {
                                    var clase = 'bg-warning';
                                } else {
                                    var clase = 'bg-danger';
                                }

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(odonto.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(odonto.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
                                    odonto.descripcion,
                                    odonto.pieza,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    0,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    '<div class="circle ' + clase + '"></div>',
                                    estado, // Columna vacía

                                ]).draw(false).node(); // Obtener el nodo de la fila

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }
                        });
                        //limpiar_formulario_cargar_presupuesto_g();
                        $('#table_pagos_reasignar_odontograma tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                let fila = `<tr>
                            <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                            <td>${odonto.pieza}</td>
                            <td>${formatoMoneda(odonto.valor)}</td>
                            <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                        </tr>`;
                                $('#table_pagos_reasignar_odontograma tbody').append(fila);
                            }
                        });

                        let table_od_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                        table_od_gral.clear().draw();

                        odontograma.forEach(function(pieza) {
                                if(pieza.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(pieza.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(pieza.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                if (pieza.presupuesto == 1 && pieza.urgencia == 0) {
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_od_gral.row.add([
                                        pieza.pieza,
                                        pieza.diagnostico,
                                        pieza.descripcion,
                                        formatoMoneda(formatoMoneda(pieza.valor)),
                                        '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                        pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                        '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza(' +
                                        pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                        estado

                                    ]).draw(false).node(); // Obtener el nodo de la fila
                                }
                        });

                    } else {
                        swal({
                            icon: 'error',
                            title: 'info',
                            text: resp.mensaje
                        });
                    }


                    $('#tratamiento_presupuesto tbody').empty();
                    let presupuesto = resp.presupuesto;
                    console.log(presupuesto);
                    $('#tratamiento_presupuesto tbody').append(`
            <tr>
                <td class="text-center align-middle">${presupuesto.fecha}</td>
                <td class="text-center align-middle">${presupuesto.id}</td>
                <td class="text-center align-middle">${presupuesto.aprobado}</td>
                <td class="text-center align-middle">Sector I</td>
                <td class="text-center align-middle">${presupuesto.boca}</td>

                <td class="text-center align-middle">
                    <div class="form-group col-md-4">
                        <div class="switch switch-success d-inline m-r-2">
                            <input type="checkbox" id="info_finalizado" checked="">
                            <label for="info_finalizado" class="cr"></label>
                        </div>
                        <label>Realizado?</label>
                    </div>
                </td>
                <td class="text-center align-middle">
                    ${presupuesto.fecha}
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                        <i class="fa fa-plus"></i> Trabajar en pieza
                    </button>
                </td>
            </tr>
            `);
                    $('#odon_adults').empty();
                    $('#odon_adults').append(resp.odontograma_paciente_vista);
                    $('#odonto_adulto').empty();
                    $('#odonto_adulto').append(resp.odontograma_paciente_vista);
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        function limpiar_formulario_cargar_presupuesto_g() {
            $('#diag_presupuesto_pieza_g').val('');
            $('#paciente_piezas_dentales_ex').empty();
            //$('#paciente_piezas_dentales_ex').selectpicker('refresh');
        }

        function mostrar_nueva_pieza_dental_tto_impl(counter) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_tto_impl') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id_paciente: $('#id_paciente_fc').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    counter: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#pieza_dental_tto_impl').empty();
                    $('#pieza_dental_tto_impl').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function eliminar_pieza_dental_tto_impl(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar este examen?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmar_eliminar_pieza_dental_tto_impl(id);
                }
            })
        }


        function confirmar_eliminar_pieza_dental_tto_impl(id) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_tto_impl') }}";
            let id_paciente = $('#id_paciente_fc').val();

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    id_ficha_atencion: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    _token: CSRF_TOKEN
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        swal({
                            title: 'Exito',
                            text: 'Se ha eliminado con éxito',
                            icon: 'success',
                        });
                        $('#contenedor_tto_implantologia').empty();
                        $('#contenedor_tto_implantologia').append(resp.v);
                        // Verificar si existen exámenes en la respuesta
                        if (resp.examenes && resp.examenes.length > 0) {
                            let detalleCirugia = resp.examenes.map(examen =>
                                `La pieza ${examen.numero_pieza} se ha realizado ${examen.tipo_procedimiento} ` +
                                `usando ${examen.anestesia} con ${examen.numero_tubos} tubos, ` +
                                `con la técnica ${examen.tecnica_anestesia}`
                            ).join("\n");

                            $('#det_cir').val(detalleCirugia);
                            let odontograma = resp.odontograma;
                            let table = $('#presup_estado_pago').DataTable();
                            table.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {

                                if (odonto.presupuesto == 1) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }

                                    if(odonto.estado == 0){
                                        var estado = 'PENDIENTE';
                                    }else if(odonto.estado == 1){
                                        var estado = 'TERMINADO';
                                    }else if(odonto.estado == 2){
                                        var estado = 'EN PROCESO';
                                    }else{
                                        var estado = 'CITADO A CONTROL';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle ' + clase + '"></div>',
                                        estado, // Columna vacía

                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }
                            });
                        } else {
                            $('#det_cir').val('No hay detalles de cirugía disponibles.');
                        }
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function mostrar_nueva_pieza_post_impl(counter) {

            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_post_impl') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id_paciente: $('#id_paciente_fc').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    count: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#pieza_post_implantada').empty();
                    $('#pieza_post_implantada').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function agregar_cirujano_impl() {
            $('#div_nuevo_cirujano_impl').removeClass('d-none');
            $('#div_nuevo_cirujano_impl').addClass('d-block');
        }

        function agregar_cirujano_impl_man() {
            $('#div_nuevo_cirujano_impl_man').removeClass('d-none');
            $('#div_nuevo_cirujano_impl_man').addClass('d-block');
        }

        function ocultar_cirujano_impl() {
            $('#div_nuevo_cirujano_impl').addClass('d-none');
            $('#div_nuevo_cirujano_impl').removeClass('d-block');
        }

        function ocultar_cirujano_impl_man() {
            $('#div_nuevo_cirujano_impl_man').addClass('d-none');
            $('#div_nuevo_cirujano_impl_man').removeClass('d-block');
        }

        function generar_pdf_protocolo_dental() {
            let nombre_cir = $('#prot_cirujanos_imp').val();
            let nombre_anest = $('#prot_anestesista_imp').val();
            let nombre_tons = $('#prot_tons_imp').val();
            let nombre_arsenalera = $('#prot_ars_imp').val();

            let id_forma_mat_impl = $('#prot_forma_mat').val();
            let forma_mat_impl = $('#prot_forma_mat option:selected').text();
            let valido = 1;
            let mensaje = '';
            if (id_forma_mat_impl == 13) {
                forma_mat_impl = $('#det_prot_forma_mat').val();
            }
            let implantes_insumos = $('#prot_implante').val();
            if (implantes_insumos.length == 0) {
                valido = 0;
                mensaje += '<li>Implantes/insumos </li>';
            }
            let id_implantes = $('#prot_proc').val();
            let implantes = $('#prot_proc option:selected').text();
            if (id_implantes == 3) {
                implantes = $('#det_prot_proc').val();
            }

            if (id_implantes == 0) {
                valido = 0;
                mensaje += '<li>Implantes </li>';
            }

            let id_prot_prot_corona = $('#prot_prot_corona').val();
            let prot_prot_corona = $('#prot_prot_corona option:selected').text();
            if (id_prot_prot_corona == 3) {
                prot_prot_corona = $('#det_prot_prot_corona').val();
            }

            let prot_pieza_imp = $('#prot_pieza_imp').val();

            if (id_forma_mat_impl == 0) {
                valido = 0;
                mensaje += '<li>Materia Implante </li>';
            }

            if (nombre_cir == '') {
                valido = 0;
                mensaje += '<li>Cirujano </li>';
            }

            if (nombre_anest == '') {
                valido = 0;
                mensaje += '<li>Anestesista </li>';
            }

            if (nombre_arsenalera == '') {
                valido = 0;
                mensaje += '<li>Arsenalera </li>';
            }

            if (nombre_tons == '') {
                valido = 0;
                mensaje += '<li>Tons </li>';
            }

            if (prot_pieza_imp.length == 0) {
                valido = 0;
                mensaje += '<li>Piezas </li>'
            }
            let det_cir = $('#det_cir').val();

            if (valido == 1) {


                let data = {
                    nombre_cir: nombre_cir,
                    nombre_anest: nombre_anest,
                    nombre_tons: nombre_tons,
                    nombre_arsenalera: nombre_arsenalera,
                    id_forma_mat_impl: id_forma_mat_impl,
                    forma_mat_impl: forma_mat_impl,
                    implantes_insumos: implantes_insumos,
                    id_implantes: id_implantes,
                    implantes: implantes,
                    id_prot_prot_corona: id_prot_prot_corona,
                    prot_prot_corona: prot_prot_corona,
                    prot_pieza_imp: prot_pieza_imp,
                    det_cir: det_cir,
                    id_paciente: $('#id_paciente_fc').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    tipo: 'implantologia',
                    _token: CSRF_TOKEN
                }

                console.log(data);

                $.ajax({
                    type: 'post',
                    url: '{{ route('dental.generar_pdf_protocolo_impl') }}',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        if (data == 'error') {
                            swal({
                                title: 'Error',
                                text: 'Primero debe generar la liquidación.',
                                icon: 'error',
                                button: "Aceptar"
                            });
                            return false;
                        }
                        if (data.ruta) {
                            swal({
                                title: "Reporte generado",
                                text: "El reporte se ha generado correctamente",
                                icon: "success",
                                button: "Aceptar"
                            }).then(() => {
                                // Abrir el PDF en una ventana emergente
                                var width = 800;
                                var height = 600;
                                var left = (screen.width - width) / 2;
                                var top = (screen.height - height) / 2;
                                window.open(data.ruta, 'Presupuesto dental', 'width=' + width +
                                    ',height=' + height + ',top=' + top + ',left=' + left);
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: "Ha ocurrido un error al generar el reporte",
                                icon: "error",
                                button: "Aceptar"
                            });
                        }
                    },
                    else: function(error) {
                        console.log(error.responseText);
                    }
                });
            } else {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje,
                        },
                    },
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });

                return false;
            }
        }

        function generar_pdf_protocolo_man_dental() {
            let nombre_cir = $('#prot_cirujanos_imp_man').val();
            let nombre_cir_nuevo = $('#prot_cirujanos_imp_man_nuevo').val();
            let nombre_anest = $('#prot_anestesista_imp_man').val();
            let nombre_tons = $('#prot_tons_imp_man').val();
            let nombre_arsenalera = $('#prot_ars_imp_man').val();

            let id_forma_mat_impl = $('#prot_forma_mat_man').val();
            let forma_mat_impl = $('#prot_forma_mat_man option:selected').text();
            let valido = 1;
            let mensaje = '';
            if (id_forma_mat_impl == 13) {
                forma_mat_impl = $('#det_prot_forma_mat_man').val();
            }
            let implantes_insumos = $('#prot_implante_man').val();

            let id_implantes = $('#prot_proc_man').val();
            let implantes = $('#prot_proc_man option:selected').text();
            if (id_implantes == 3) {
                implantes = $('#det_prot_proc_man').val();
            }

            if (id_implantes == 0) {
                valido = 0;
                mensaje += '<li>Implantes </li>';
            }

            let id_prot_prot_corona = $('#prot_prot_corona_man').val();
            let prot_prot_corona = $('#prot_prot_corona_man option:selected').text();
            if (id_prot_prot_corona == 3) {
                prot_prot_corona = $('#det_prot_prot_corona_man').val();
            }

            let prot_pieza_imp = $('#prot_pieza_imp_man').val();

            if (id_forma_mat_impl == 0) {
                valido = 0;
                mensaje += '<li>Materia Implante </li>';
            }

            if (nombre_cir == '') {
                valido = 0;
                mensaje += '<li>Cirujano </li>';
            }


            if (prot_pieza_imp.length == 0) {
                valido = 0;
                mensaje += '<li>Piezas </li>'
            }
            let det_cir = $('#det_cir_man').val();

            if (valido == 1) {


                let data = {
                    nombre_cir: nombre_cir,
                    nombre_cir_nuevo: nombre_cir_nuevo,
                    nombre_anest: nombre_anest,
                    nombre_tons: nombre_tons,
                    nombre_arsenalera: nombre_arsenalera,
                    id_forma_mat_impl: id_forma_mat_impl,
                    forma_mat_impl: forma_mat_impl,
                    implantes_insumos: implantes_insumos,
                    id_implantes: id_implantes,
                    implantes: implantes,
                    id_prot_prot_corona: id_prot_prot_corona,
                    prot_prot_corona: prot_prot_corona,
                    prot_pieza_imp: prot_pieza_imp,
                    det_cir: det_cir,
                    id_paciente: $('#id_paciente_fc').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    tipo: 'mantencion',
                    _token: CSRF_TOKEN
                }

                console.log(data);

                $.ajax({
                    type: 'post',
                    url: '{{ route('dental.generar_pdf_protocolo_impl') }}',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        if (data == 'error') {
                            swal({
                                title: 'Error',
                                text: 'Primero debe generar la liquidación.',
                                icon: 'error',
                                button: "Aceptar"
                            });
                            return false;
                        }
                        if (data.ruta) {
                            swal({
                                title: "Reporte generado",
                                text: "El reporte se ha generado correctamente",
                                icon: "success",
                                button: "Aceptar"
                            }).then(() => {
                                // Abrir el PDF en una ventana emergente
                                var width = 800;
                                var height = 600;
                                var left = (screen.width - width) / 2;
                                var top = (screen.height - height) / 2;
                                window.open(data.ruta, 'Presupuesto dental', 'width=' + width +
                                    ',height=' + height + ',top=' + top + ',left=' + left);
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: "Ha ocurrido un error al generar el reporte",
                                icon: "error",
                                button: "Aceptar"
                            });
                        }
                        // limpiar formulario
                        $('#prot_anestesista_imp_man').val('');
                        $('#prot_forma_mat_man').val(0);
                        $('#prot_proc_man').val(0);
                        // $('#det_cir_man').val('');
                        // limpiar los select2
                        $('#prot_implante_man').val(null).trigger('change');
                        $('#prot_pieza_imp_man').val(null).trigger('change');
                    },
                    else: function(error) {
                        console.log(error.responseText);
                    }
                });
            } else {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje,
                        },
                    },
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });

                return false;
            }
        }

        function eliminar_pieza_dental_post_impl(id) {
            // preguntar si desea eliminar
            swal({
                    title: "Eliminar Pieza",
                    text: "¿Está seguro que desea eliminar la pieza?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    DangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        confirmar_eliminar_pieza_post_impl(id);
                    }
                });
        }

        function confirmar_eliminar_pieza_post_impl(id) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_post_impl') }}";
            let id_paciente = $('#id_paciente_fc').val();

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: CSRF_TOKEN
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#contenedor_pieza_post_implantada').empty();
                        $('#contenedor_pieza_post_implantada').append(resp.v);
                    }
                    if (resp.examenes && resp.examenes.length > 0) {
                        let detalleHistoria = resp.examenes.map(implante => {
                            let detalle =
                                `La pieza ${implante.numero_pieza} presenta las siguientes observaciones:\n`;

                            // Móvil
                            if (implante.movil === "Sí") {
                                detalle +=
                                    `Se observa movilidad en la pieza${implante.obs_movil ? `, descrita como: ${implante.obs_movil}` : ''}. `;
                            } else {
                                detalle += `No se observa movilidad en la pieza. `;
                            }

                            // Posición
                            if (implante.posicion === "Correcta") {
                                detalle += `La posición del implante es adecuada. `;
                            } else {
                                detalle +=
                                    `La posición del implante es incorrecta, presentando las siguientes desviaciones: ` +
                                    `vestíbulo-palatino: ${implante.vp || 'N/A'}, ` +
                                    `vestíbulo-lingual: ${implante.vl || 'N/A'}, ` +
                                    `mesio-distal: ${implante.md || 'N/A'} y ` +
                                    `cráneo-caudal: ${implante.cc || 'N/A'}. `;
                            }

                            // Exposición de espiras
                            if (implante.exp_espiras === "Sí") {
                                detalle +=
                                    `Se evidencia exposición de espiras${implante.obs_exp_espiras ? `, descrita como: ${implante.obs_exp_espiras}` : ''}. `;
                            } else {
                                detalle += `No se observa exposición de espiras. `;
                            }

                            // Supuración
                            if (implante.supuracion === "Sí") {
                                detalle +=
                                    `Se detecta presencia de supuración${implante.obs_supuracion ? `, descrita como: ${implante.obs_supuracion}` : ''}. `;
                            } else {
                                detalle += `No se observa supuración. `;
                            }

                            // Estado de la encía
                            if (implante.estado_encia === "Anormal") {
                                detalle +=
                                    `El estado de la encía es anormal, descrito como: ${implante.obs_estado_encia || 'Sin observación'}. `;
                            } else {
                                detalle += `El estado de la encía es normal. `;
                            }

                            // Pérdida ósea marginal
                            if (implante.perdida_osea_marginal) {
                                detalle +=
                                    `Se reporta una pérdida ósea marginal de aproximadamente ${implante.perdida_osea_marginal}. `;
                            }

                            // Observaciones generales
                            if (implante.observaciones) {
                                detalle += `Observaciones adicionales: ${implante.observaciones}. `;
                            }

                            return detalle;
                        }).join("\n\n");

                        $('#det_cir_man').val(detalleHistoria);

                    } else {
                        $('#det_cir_man').val('No hay detalles del control de implantes disponibles.');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

        }

        function mostrar_nuevo_grupo_post_impl(counter) {
            let url = "{{ ROUTE('profesional.mostrar_nuevo_grupo_post_impl') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    count: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#grupo_dental_post_impl').empty();
                    $('#grupo_dental_post_impl').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function eliminar_grupo_dental_post_impl(id) {
            // preguntar si desea eliminar
            swal({
                    title: "Eliminar Grupo",
                    text: "¿Está seguro que desea eliminar el grupo?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    DangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        confirmar_eliminar_grupo_dental_post_impl(id);
                    }
                });
        }

        function confirmar_eliminar_grupo_dental_post_impl(id) {
            let url = "{{ ROUTE('profesional.eliminar_grupo_dental_post_impl') }}";
            let id_paciente = $('#id_paciente_fc').val();

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: CSRF_TOKEN
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        swal({
                            title: 'Exito',
                            text: 'Se ha eliminado con éxito',
                            icon: 'success',
                        });
                        $('#contenedor_grupos_dental_implantada').empty();
                        $('#contenedor_grupos_dental_implantada').append(resp.v);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

        }

        function mostrar_nuevo_pieza_pfu() {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_pfu') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    seccion: 'pfu',
                    id_paciente: $('#id_paciente').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#nueva_pieza_dental').empty();
                    $('#nueva_pieza_dental').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function eliminar_pieza_dental_pfu(id) {
            // preguntar si desea eliminar
            swal({
                    title: "Eliminar Pieza",
                    text: "¿Está seguro que desea eliminar la pieza?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    DangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        confirmar_eliminar_pieza_dental_pfu(id);
                    }
                });
        }

        function confirmar_eliminar_pieza_dental_pfu(id) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_corona_protesis') }}";
            let id_paciente = $('#id_paciente_fc').val();

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: CSRF_TOKEN
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        swal({
                            title: 'Exito',
                            text: 'Se ha eliminado con éxito',
                            icon: 'success',
                        });
                        $('#contenedor_piezas_dentales_pfu').empty();
                        $('#contenedor_piezas_dentales_pfu').append(resp.v);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

        }

        function mostrar_nuevo_pieza_pfp() {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_pfu') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    seccion: 'pfp',
                    id_paciente: $('#id_paciente').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#nueva_pieza_dental_pfp').empty();
                    $('#nueva_pieza_dental_pfp').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function eliminar_pieza_dental_pfp(id) {
            // preguntar si desea eliminar
            swal({
                    title: "Eliminar Pieza",
                    text: "¿Está seguro que desea eliminar la pieza?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    DangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        confirmar_eliminar_pieza_dental_pfp(id);
                    }
                });
        }

        function confirmar_eliminar_pieza_dental_pfp(id) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_corona_protesis') }}";
            let id_paciente = $('#id_paciente_fc').val();

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: CSRF_TOKEN
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#contenedor_piezas_dentales_pfp').empty();
                        $('#contenedor_piezas_dentales_pfp').append(resp.v);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

        }

        function solicitar_protesis() {
            var numero_pieza = $('#n_pieza_protesis').val();
            var tipo_protesis = $('#protesis_imp_sup').val();
            var tipo_protesis_text = $('#protesis_imp_sup option:selected').text();
            if (tipo_protesis == 2) {
                tipo_protesis_text = $('#obs_protesis_imp_sup').val();
            }
            var tipo_protesis_inf = $('#protesis_imp_inf').val();
            var tipo_protesis_inf_text = $('#protesis_imp_inf option:selected').text();
            if (tipo_protesis_inf == 2) {
                tipo_protesis_inf_text = $('#obs_protesis_imp_inf').val();
            }
            var protesis_toma_imp = $('#protesis_toma_imp').val();
            var protesis_toma_imp_text = $('#protesis_toma_imp option:selected').text();
            if (protesis_toma_imp == 2) {
                protesis_toma_imp_text = $('#obs_protesis_toma_imp_inf').val();
            }
            var prueba_ajuste = $('#prueba_ajuste_protesis').val();
            var prueba_ajuste_text = $('#prueba_ajuste_protesis option:selected').text();
            if (prueba_ajuste == 2) {
                prueba_ajuste_text = $('#obs_prueba_ajuste_protesis').val();
            }

            var valido = 1;
            var mensaje = '';

            if (numero_pieza == '') {
                valido = 0;
                mensaje += '<li>Número de pieza</li>';
            }

            if (tipo_protesis == 0) {
                valido = 0;
                mensaje += '<li>Tipo de prótesis superior</li>';
            }

            if (tipo_protesis == 2) {
                if (tipo_protesis_text == '') {
                    valido = 0;
                    mensaje += '<li>Observación tipo de prótesis superior</li>';
                }
            }

            if (tipo_protesis_inf == 0) {
                valido = 0;
                mensaje += '<li>Tipo de prótesis inferior</li>';
            }

            if (tipo_protesis_inf == 2) {
                if (tipo_protesis_inf_text == '') {
                    valido = 0;
                    mensaje += '<li>Observación tipo de prótesis inferior</li>';
                }
            }

            if (protesis_toma_imp == 0) {
                valido = 0;
                mensaje += '<li>Prótesis toma impresión</li>';
            }

            if (protesis_toma_imp == 2) {
                if (protesis_toma_imp_text == '') {
                    valido = 0;
                    mensaje += '<li>Observación prótesis toma impresión</li>';
                }
            }

            if (prueba_ajuste == 0) {
                valido = 0;
                mensaje += '<li>Prueba de ajuste</li>';
            }

            if (valido == 0) {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje,
                        },
                    },
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });

                return false;
            }

            var data = {
                numero_pieza: numero_pieza,
                tipo_protesis: tipo_protesis,
                tipo_protesis_text: tipo_protesis_text,
                tipo_protesis_inf: tipo_protesis_inf,
                tipo_protesis_inf_text: tipo_protesis_inf_text,
                protesis_toma_imp: protesis_toma_imp,
                protesis_toma_imp_text: protesis_toma_imp_text,
                prueba_ajuste: prueba_ajuste,
                prueba_ajuste_text: prueba_ajuste_text,
                id_paciente: $('#id_paciente_fc').val(),
                _token: CSRF_TOKEN
            }

            return console.log(data);
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

        function cargar_a_presupuesto_impl(counter) {
            let pieza = $('#numero_pieza_tto_imp' + counter).val();
            let tto = $('#diag_presupuesto_pieza' + counter).val();
            let valido = 1;
            let mensaje = '';

            console.log(pieza, tto);
            let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_period') }}";
            let data = {
                pieza: pieza,
                tto: tto,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_paciente: $('#id_paciente_fc').val(),
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == 1) {
                        swal({
                            icon: 'success',
                            title: 'Info',
                            text: resp.mensaje
                        });
                        let odontograma = resp.odontograma_paciente;
                        let table_odontograma = $('#table_odontograma').DataTable();

                        // Vacía la tabla
                        table_odontograma.clear();

                        // Genera los datos (array de arrays o de objetos si usas columns)
                        let data = [];

                        odontograma.forEach(function(odonto) {
                            if(odonto.urgencia == 0){
                            let switchPresupuesto = `
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                        value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                        onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                    <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                                </div>
                            `;

                            let switchSeleccion = `
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                        id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                        onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                    <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                                </div>
                            `;

                            data.push([
                                odonto.fecha,
                                odonto.tratamiento,
                                odonto.caras,
                                odonto.pieza,
                                odonto.diagnostico,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                switchPresupuesto,
                                switchSeleccion
                            ]);
                            }
                        });

                        // Agrega las nuevas filas
                        table_odontograma.rows.add(data).draw();
                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);

                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                $('#contenedor_piezas_dentales_presupuesto').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Pieza</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                    </div>
                                                    <div class="form-group col-md-2 d-flex justify-content-center">
                                                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="fas fa-trash"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                                $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(odonto.valor)} </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                            </td>
                                        </tr>
                                    `);
                            }
                        });
                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_clinico').val(formatoMoneda(total_general));
                        $('#total_clinico').val(formatoMoneda(total_general));
                        // guardamos el total en un input hidden
                        $('#total_presupuesto_dental').val(total_general);
                        $('#subtotal_presup').val(formatoMoneda(total_general));
                        $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                            valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                            total_general));

                        let table = $('#presup_estado_pago').DataTable();
                        table.clear().draw();

                        // Recorrer el odontograma y agregar nuevas filas
                        // Recorrer el odontograma y agregar nuevas filas
                        odontograma.forEach(function(odonto) {

                            if (odonto.presupuesto == 1) {
                                if (odonto.estado_pago == 'ok') {
                                    var clase = 'bg-success';
                                } else if (odonto.estado_pago == 'incompleto') {
                                    var clase = 'bg-warning';
                                } else {
                                    var clase = 'bg-danger';
                                }

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(odonto.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(odonto.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
                                    odonto.descripcion,
                                    odonto.pieza,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    0,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    '<div class="circle ' + clase + '"></div>',
                                    estado, // Columna vacía

                                ]).draw(false).node(); // Obtener el nodo de la fila

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }
                        });

                        $('#table_pagos_reasignar_odontograma tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.pieza}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                $('#table_pagos_reasignar_odontograma tbody').append(fila);
                            }
                        });
                        let count = $('#random_preimpl').val();
                        let count_post_impl = $('#random_postimpl').val();
                        $('#numero_pieza_tto_impl' + count).empty();
                        $('#numero_pieza_post_impl' + count).empty();
                        odontograma.forEach(o => {
                            if (o.presupuesto == 1) {
                                $('#numero_pieza_tto_impl' + count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                                $('#numero_pieza_post_impl' + count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                            }

                        });
                    } else {
                        swal({
                            icon: 'error',
                            title: 'info',
                            text: resp.mensaje
                        });
                    }


                    $('#tratamiento_presupuesto tbody').empty();
                    let presupuesto = resp.presupuesto;
                    console.log(presupuesto);
                    $('#tratamiento_presupuesto tbody').append(`
                    <tr>
                        <td class="text-center align-middle">${presupuesto.fecha}</td>
                        <td class="text-center align-middle">${presupuesto.id}</td>
                        <td class="text-center align-middle">${presupuesto.aprobado}</td>
                        <td class="text-center align-middle">Sector I</td>
                        <td class="text-center align-middle">${presupuesto.boca}</td>

                        <td class="text-center align-middle">
                            <div class="form-group col-md-4">
                                <div class="switch switch-success d-inline m-r-2">
                                    <input type="checkbox" id="info_finalizado" checked="">
                                    <label for="info_finalizado" class="cr"></label>
                                </div>
                                <label>Realizado?</label>
                            </div>
                        </td>
                        <td class="text-center align-middle">
                            ${presupuesto.fecha}
                        </td>
                        <td class="text-center align-middle">
                            <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                                <i class="fa fa-plus"></i> Trabajar en pieza
                            </button>
                        </td>
                    </tr>
                    `);

                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        function recargar_piezas_preimplante() {

        }

        function guardar_ficha() {
            let motivo = $('#motivo').val();
            let antecedentes = $('#antecedentes').val();
            let examen_fisico = $('#examen_fisico').val();

            let valido = 1;
            let mensaje = '';

            if (motivo == '') {
                valido = 0;
                mensaje += '<li>Motivo</li>';
            }

            if (antecedentes == '') {
                valido = 0;
                mensaje += '<li>Antecedentes</li>';
            }

            if (examen_fisico == '') {
                valido = 0;
                mensaje += '<li>Examen fisico</li>';
            }

            if (valido == 0) {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje,
                        },
                    },
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });

                return false;
            }

            let data = {
                motivo: motivo,
                antecedentes: antecedentes,
                examen_fisico: examen_fisico,
                descripcion_hipotesis: '',
                hipotesis_diagnostico: '',
                id_profesional_fc: $('#id_profesional').val(),
                id_paciente_fc: $('#id_paciente').val(),
                hora_medica: $('#hora_medica').val(),
                cerrarsession: 2,
                _token: CSRF_TOKEN
            }

            $.ajax({
                type: 'post',
                url: '{{ ROUTE('dental.registrar_ficha_atencion_dental') }}',
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.estado == 'ok') {
                        swal({
                            title: 'exito',
                            text: resp.mensaje,
                            icon: 'success'
                        });
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })

        }


        function ocultar_pieza_impl(counter) {
            console.log(counter);
            $('#contenedor_pieza_tto_impl' + counter).empty();
        }
    </script>

    <script>
        var myDropzone;



        $(document).ready(function() {

            myDropzone = new Dropzone("#mis-imagenes-odontop-pre", {
                url: "{{ route('profesional.imagen.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                },
                acceptedFiles: "image/*",
                maxFilesize: 4,
                maxFiles: 12,
                dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",
                init: function() {
                    this.on("canceled", function(file) {
                        console.log("Subida cancelada");
                        cargar_lista_imagenes();

                        // Acceder a los archivos aceptados
                        const acceptedFiles = this.getAcceptedFiles();
                        console.log(acceptedFiles);
                    });
                }
            });
            var myDropzoneOdontopPost = new Dropzone("#mis-imagenes-odontop-post", {
                url: "{{ route('profesional.imagen.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                },
                acceptedFiles: "image/*",
                maxFilesize: 4, // Tamaño máximo en MB
                maxFiles: 12, // Máximo número de archivos permitidos
                dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",
                init: function() {
                    myDropzoneOdontopPost = this;

                    // Lógica adicional en la inicialización
                    this.on("success", function(file, response) {
                        cargar_lista_imagenes();
                        if (file.previewElement) {
                            file.previewElement.classList.add("dz-success");
                        }
                    });

                    this.on("error", function(file, message) {
                        if (file.previewElement) {
                            file.previewElement.classList.add("dz-error");
                            for (let node of file.previewElement.querySelectorAll(
                                    "[data-dz-errormessage]")) {
                                node.textContent = typeof message === "string" ? message :
                                    message.message || message.error;
                            }
                        }
                    });

                    this.on("removedfile", function(file) {
                        cargar_lista_imagenes();
                    });
                }
            });

            $('#tabla_odontologico_tratamiento').DataTable({
                responsive: true,
            });
            $('#tabla_odontologicos_pieza').DataTable({
                responsive: true,
            });
            $('#tabla_aranceles').DataTable({
                responsive: true,
            });

            // $('#table_odontograma').DataTable({
            //     responsive: true,
            // });

            $('#table_pagos_presupuesto').DataTable();

            /* formatear rut */
            $("#solicitado_por_rut_rfl").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator: false
            });

            $('#descripcion_hipotesis').keyup(function() {
                if ($.trim(this.value) != '') {
                    $('.btn_agregar_medicamento').removeAttr("disabled");
                    $('.btn_medicamento_pdf').removeAttr("disabled");
                    $('.btn_agregar_examen').removeAttr("disabled");
                    $('.btn_examenes_pdf').removeAttr("disabled");
                } else {
                    $('.btn_agregar_medicamento').attr('disabled', 'disabled');
                    $('.btn_medicamento_pdf').attr('disabled', 'disabled');
                    $('.btn_agregar_examen').attr('disabled', 'disabled');
                    $('.btn_examenes_pdf').attr('disabled', 'disabled');
                }
            });

            $("#descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $("#lic_descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#lic_descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_lic_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            /** cronico */
            /** autocomplete de medicamentos generales */
            $("#nombre_medicamentocron").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron').val(ui.item.label);
                    $('#id_medicamento_cronico').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_cronicomes');
                    return false;
                }
            });





            /** autocomplete de medicamentos patologia */
            $("#nombre_medicamentocron_patologia").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron_patologia').val(ui.item.label);
                    $('#id_medicamentocron_patologia').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_medicamentocron_patologia');
                    return false;
                }
            });

            /** accion check confidencial */
            $('#confidencial').change(function() {
                if ($('#confidencial').is(':checked')) {
                    $('#confidencial_descripcion').show();
                } else {
                    $('#confidencial_descripcion').hide();
                }
            });

            /** accion check ges */
            $('#modal_ges').change(function() {
                if ($('#modal_ges').is(':checked')) {
                    $('#form_ges').modal('show');
                } else {
                    $('#form_ges').modal('hide');
                }
            });

            /** busqueda de diagnostico GES */
            $("#nombre_ges").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('ges.ver') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#nombre_ges').val(ui.item.label); // display the selected text
                    $('#id_ges').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

        });

        /** MANEJO DE IMAGENES */


        Dropzone.options.misImagenes = {
            init: function() {
                myDropzone = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response) {
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes();

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error) {
                        message = message.error;
                    } else {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes();
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };



        var lista_imagenes = [];

        function cargar_lista_imagenes() {
            // console.log('--------------cargar_lista_imagenes----------------------');
            lista_imagenes = [];
            let temp = myDropzone.getAcceptedFiles();
            $.each(temp, function(index, value) {
                if (value.status == "success") {
                    if (value.xhr !== undefined) {
                        var img_temp = JSON.parse(value.xhr.response);
                        lista_imagenes[index] = [
                            url = img_temp.img.url,
                            nombre_origian = img_temp.img.original_file_name,
                            nombre_img = img_temp.img.nombre_img,
                            file_extension = img_temp.img.file_extension,
                        ];
                        $('#input_lista_imagenes').val('');
                        $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
                    }
                }
            });


        }
        /** MANEJO DE IMAGENES */

        console.log('dropzoneando');
        var myDropzoneOdontopPre;
        Dropzone.options.misImagenesOdontopPre = {
            init: function() {
                myDropzoneOdontopPre = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            success: function(file, response) {
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes();

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error) {
                        message = message.error;
                    } else {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_imagenes();
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        }

        /** REGISTO ANTECEDENTES */
        function carga_campos_antecedente_nuevo() {
            if ($('#tipo_antecedente').val() != '') {
                $('#div_campos_antecedente_nuevo').html('');
                var html = '';
                if ($('#tipo_antecedente').val() == 'alergia') {
                    html += '';

                    html += '<div class="form-row">';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '        <label class="floating-label-activo-sm">Seleccione</label>';
                    html +=
                        '        <input type="text" id="alergia_paciente" name="alergia_paciente" class="form-control form-control-sm"  value="">';
                    html += '        <input type="hidden" name="id_alergia_paciente" id="id_alergia_paciente" value=""/>';
                    html += '    </div>';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '        <label class="floating-label-activo-sm">Detalle</label>';
                    html +=
                        '        <input type="text" name="alergia_comentario_paciente" id="alergia_comentario_paciente"  class="form-control form-control-sm"  value="">';
                    html += '    </div>';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html +=
                        '       <button type="button" class="btn btn-success btn-sm" onclick="agregar_alergia_paciente();">Guardar</button>';
                    html += '    </div>';
                    html += '</div>';

                    $('#div_campos_antecedente_nuevo').show();
                    $('#div_campos_antecedente_nuevo').html(html);

                    /** autocompletado de alergias */
                    $("#alergia_paciente").autocomplete({
                        source: function(request, response) {
                            // Fetch data
                            $.ajax({
                                url: "{{ route('alergias.ver_autocomplete') }}",
                                type: 'get',
                                dataType: "json",
                                data: {
                                    search: request.term
                                },
                                success: function(data) {
                                    console.log(data);
                                    response(data);
                                }
                            });
                        },
                        select: function(event, ui) {
                            // Set selection
                            $('#alergia_paciente').val(ui.item.label); // display the selected text
                            $('#id_alergia_paciente').val(ui.item.value); // save selected id to input

                            return false;
                        }
                    });

                }
                if ($('#tipo_antecedente').val() == 'enfermedades_cronicas') {
                    html += '';
                }
                if ($('#tipo_antecedente').val() == 'anestesias') {
                    html += '';
                }
                if ($('#tipo_antecedente').val() == 'cirugia') {
                    html += '';
                }
            } else {
                $('#div_campos_antecedente_nuevo').hide();
                $('#div_campos_antecedente_nuevo').html('');
            }
        }

        function agregar_alergia_paciente() {

            let alergia = $('#alergia_paciente').val();
            let id_alergia = $('#id_alergia_paciente').val();
            let comentario = $('#alergia_comentario_paciente').val();
            let paciente = $('#id_paciente_fc').val();
            let token = CSRF_TOKEN;
            var mensaje = '';
            var valido = 0;

            if (alergia == "") {
                mensaje += 'Campo requerido alergia\n';
                valido = 1;
            }
            // if(id_alergia=="")
            // {
            //     mensaje +='Campo requerido id alergia\n';
            //     valido = 1;
            // }
            if (comentario == "") {
                mensaje += 'Campo requerido Detalle\n';
                valido = 1;
            }
            if (paciente == "") {
                mensaje += 'Campo requerido paciente\n';
                valido = 1;
            }

            if (valido == 0) {
                swal({
                    title: "Alergia agregada correctamente. ***PENDIDENTE POR HACER***",
                    icon: "success",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            } else {
                swal({
                    title: "Campo Requerido en registro de Alergia. ***PENDIDENTE POR HACER***",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }


            // let url = "{{ route('profesional.agregar_alergia_paciente') }}";

            // $.ajax({
            //     url: url,
            //     type: 'POST',
            //     dataType: 'json',
            //     data: {
            //         _token: CSRF_TOKEN,
            //         alergia: alergia,
            //         id_alergia: id_alergia,
            //         comentario: comentario,
            //         paciente: paciente
            //     },
            // })
            // .done(function(response) {

            //     if (response.success) {
            //         swal({
            //             title: "Alergia agregada correctamente",
            //             icon: "success",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         });

            //         $('#alergia_paciente').val('');
            //         $('#id_alergia_paciente').val('');

            //     }
            //     else
            //     {
            //         swal({
            //             title: "Error al agregar alergia",
            //             icon: "error",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         })
            //     }

            //     return response;
            // })
            // .fail(function() {
            //     console.log("error");
            // });

        }
        /** FIN REGISTRO ANTECEDENTES  */


        function cargarIgual(input) {

            let actual = $('#' + input);
            let equivalentes = $('#' + input).attr('data-input_igual').split(',');
            $.each(equivalentes, function(index, value) {
                var equivalente = $('#' + value);
                equivalente.val(actual.val());
            });

            // let actual = $('#'+input);
            // let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            // equivalente.val(actual.val());

        }

        function evaluar_para_carga_detalle(select, div, input, valor) {
            var valor_select = $('#' + select + '').val();
            if (valor_select == valor) $('#' + div + '').show();
            else {
                $('#' + div + '').hide();
                $('#' + input + '').val('');
            }
        }

        function abrir_modal_guardar_tipo() {
            $('#modal_registrar_ficha_tipo_orl').modal('show');
            cargarSeccion('registro_f_t_orl_detalle');
        }

        function cargarSeccion(div_destino) {
            // var tipo = $('#'+select+'').val();
            $('#' + div_destino).html('');
            var seccion_actual = '';
            var seccion_previa = '';
            $('#form-otorrino').find('select,textarea').each(function(key, elemento) {


                html = '';

                // if(seccion_previa == '' && seccion_actual == '')
                if (key == 0) {
                    seccion_actual = $(elemento).data('seccion').trim();
                    seccion_previa = $(elemento).data('seccion').trim();

                    html += '<hr>';
                    html += '<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">' +
                        seccion_actual + '</h6></div></div>';
                    html += '<hr>';
                } else {
                    if ($(elemento).data('seccion'))
                        seccion_actual = $(elemento).data('seccion').trim();
                }

                if (seccion_actual == seccion_previa) {
                    html += '<hr>';
                    html += '<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">' +
                        seccion_actual + '</h6></div></div>';
                    html += '<hr>';
                }

                html += '<div class="row" style="margin-top:10px;">';
                if ($(elemento).prop('nodeName') == 'SELECT') {
                    if ($(elemento).val() == 0)
                        $(elemento).val(1)

                    html += '<div class="col-md-5">' + $(elemento).data('titulo') + '</div>';
                    html += '<div class="col-md-5">';
                    html += '    ' + $('#' + $(elemento).attr('id') + ' option:selected').text() + '';
                    html += '    <input type="hidden" name="modal_agregar_tipo_' + $(elemento).attr('id') +
                        '" id="modal_agregar_tipo_' + $(elemento).attr('id') + '" value="' + $(elemento).val() +
                        '">';
                    html += '</div>';
                    html += '<div class="col-md-2"></div>';
                } else if ($(elemento).prop('nodeName') == 'TEXTAREA') {
                    if ($(elemento).data('tipo'))
                        html += '<div class="col-md-5">' + $(elemento).data('titulo') + '</div>';
                    else
                        html += '<div class="col-md-5">Detalle</div>';
                    html += '<div class="col-md-5">';
                    html += '    <textarea class="form-control caja-texto form-control-sm ' + $(elemento).attr(
                        'id') +
                        '_editar" style="display:none;" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_' +
                        $(elemento).attr('id') + '" id="observaciones_' + $(elemento).attr('id') + '">' + $(
                            elemento).val() + '</textarea>';
                    html += '    <label class="' + $(elemento).attr('id') + '_mostrar" id="label_observacion_' + $(
                        elemento).attr('id') + '">' + $(elemento).val() + '</label>';
                    html += '</div>';
                    html += '<div class="col-md-2">';
                    html += '    <button class="btn btn-sm btn-success ' + $(elemento).attr('id') +
                        '_mostrar"  onclick="cambiar_div(\'' + $(elemento).attr('id') + '_editar' + '\',\'' + $(
                            elemento).attr('id') + '_mostrar' + '\',\'label_observacion_' + $(elemento).attr('id') +
                        '\',\'observaciones_' + $(elemento).attr('id') + '\')">Editar</button>';
                    html += '    <button class="btn btn-sm btn-success ' + $(elemento).attr('id') +
                        '_editar" style="display:none;" onclick="cambiar_div(\'' + $(elemento).attr('id') +
                        '_mostrar' + '\',\'' + $(elemento).attr('id') + '_editar' + '\',\'label_observacion_' + $(
                            elemento).attr('id') + '\',\'observaciones_' + $(elemento).attr('id') +
                        '\')">Guardar</button>';
                    html += '</div>';

                }
                html += '</div>';
                $('#' + div_destino).append(html);
                seccion_previa = $(elemento).data('seccion');
            });
        }

        function cambiar_div(mostrar, ocultar, label, textarea) {
            $('.' + mostrar).show();
            $('.' + ocultar).hide();
            $('#' + label).html($('#' + textarea).val());
        }

        function guardar_tipo_ficha_otorrino() {
            var registro_f_t_orl_nombre = $('#registro_f_t_orl_nombre').val();
            var registro_f_t_orl_descripcion = $('#registro_f_t_orl_descripcion').val();
            var _token = CSRF_TOKEN;
            if (registro_f_t_orl_nombre == '') {
                swal({
                    title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                return false;
            }
            if (registro_f_t_orl_descripcion == '') {
                swal({
                    title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                return false;
            }


            var data = [];
            data.registro_f_t_orl_nombre = registro_f_t_orl_nombre;
            data.registro_f_t_orl_descripcion = registro_f_t_orl_descripcion;

            $('#registro_f_t_orl_detalle').find('input,textarea').each(function(key, elemento) {
                //console.log($(elemento).attr('id'));
                //console.log($(elemento).val());
                //console.log($(elemento).prop('nodeName'));
                //console.log('*******');

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            console.log(data);

            url = "{{ route('profesional.ficha_tipo_otorrino') }}";
            $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        id_profesional: $('#id_profesional').val(),

                        modal_agregar_tipo_apreciacion_auditiva: data.modal_agregar_tipo_apreciacion_auditiva,
                        modal_agregar_tipo_apreciacion_resp: data.modal_agregar_tipo_apreciacion_resp,
                        modal_agregar_tipo_disfonia: data.modal_agregar_tipo_disfonia,
                        modal_agregar_tipo_ex_boca: data.modal_agregar_tipo_ex_boca,
                        modal_agregar_tipo_examen_bio_od: data.modal_agregar_tipo_examen_bio_od,
                        modal_agregar_tipo_examen_bio_oi: data.modal_agregar_tipo_examen_bio_oi,
                        modal_agregar_tipo_examen_faringe: data.modal_agregar_tipo_examen_faringe,
                        modal_agregar_tipo_examen_fnd: data.modal_agregar_tipo_examen_fnd,
                        modal_agregar_tipo_examen_fni: data.modal_agregar_tipo_examen_fni,
                        modal_agregar_tipo_examen_laringe: data.modal_agregar_tipo_examen_laringe,
                        modal_agregar_tipo_examen_od: data.modal_agregar_tipo_examen_od,
                        modal_agregar_tipo_examen_oi: data.modal_agregar_tipo_examen_oi,
                        modal_agregar_tipo_nariz_general: data.modal_agregar_tipo_nariz_general,
                        modal_agregar_tipo_usa_audifono: data.modal_agregar_tipo_usa_audifono,
                        observaciones_aprec_auditiva_def: data.observaciones_aprec_auditiva_def,
                        observaciones_aprec_resp_def: data.observaciones_aprec_resp_def,
                        observaciones_audifono: data.observaciones_audifono,
                        observaciones_det_disfonia: data.observaciones_det_disfonia,
                        observaciones_det_nariz_general: data.observaciones_det_nariz_general,
                        observaciones_detalle_ex_boca: data.observaciones_detalle_ex_boca,
                        observaciones_ex_farige_anormal: data.observaciones_ex_farige_anormal,
                        observaciones_ex_fnd_anormal: data.observaciones_ex_fnd_anormal,
                        observaciones_ex_fni_anormal: data.observaciones_ex_fni_anormal,
                        observaciones_ex_larige_anormal: data.observaciones_ex_larige_anormal,
                        observaciones_ex_od_anormal: data.observaciones_ex_od_anormal,
                        observaciones_ex_oi_anormal: data.observaciones_ex_oi_anormal,
                        observaciones_obs_ex_biom: data.observaciones_obs_ex_biom,
                        observaciones_obs_ex_nasal: data.observaciones_obs_ex_nasal,
                        observaciones_obs_ex_oidos: data.observaciones_obs_ex_oidos,
                        observaciones_obs_ex_orl: data.observaciones_obs_ex_orl,
                        observaciones_obs_examen_bio_od: data.observaciones_obs_examen_bio_od,
                        observaciones_obs_examen_bio_oi: data.observaciones_obs_examen_bio_oi,
                        observaciones_obs_examen_laringe: data.observaciones_obs_examen_laringe,
                        registro_f_t_orl_descripcion: data.registro_f_t_orl_descripcion,
                        registro_f_t_orl_nombre: data.registro_f_t_orl_nombre,

                        modal_agregar_tipo_episodios: data.modal_agregar_tipo_episodios,
                        observaciones_detalle_episodios: data.observaciones_detalle_episodios,
                        modal_agregar_tipo_equilibrio: data.modal_agregar_tipo_equilibrio,
                        observaciones_detalle_equilibrio: data.observaciones_detalle_equilibrio,
                        modal_agregar_tipo_ng: data.modal_agregar_tipo_ng,
                        observaciones_detalle_ng: data.observaciones_detalle_ng,
                        modal_agregar_tipo_sint_acomp: data.modal_agregar_tipo_sint_acomp,
                        observaciones_detalle_sint_acompanantes: data.observaciones_detalle_sint_acompanantes,
                        modal_agregar_tipo_vertigo: data.modal_agregar_tipo_tipo_vertigo,
                        observaciones_detalle_tipo_vertigo: data.observaciones_detalle_tipo_vertigo,
                        observaciones_vestibular: data.observaciones_obs_vestibular,
                    },
                })
                .done(function(data) {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if (data.estado == 1) {
                        $('#modal_registrar_ficha_tipo_orl').modal('hide');
                        swal({
                            title: "Tipo Ficha Registrado",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {

                        swal({
                            title: "Problema al Registrar Tipo Ficha.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function cargar_info_ficha_tipo_orl(select, div_descripcion) {
            let id_ft = $('#' + select).val();
            if (id_ft == '') {
                $('#' + div_descripcion).html('');
                $('#form-otorrino').find('select,textarea').each(function(key, elemento) {
                    if ($(elemento).prop('nodeName') == 'SELECT') {
                        $(elemento).val(0);
                    } else {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('usa_audifono', 'div_detalle_usa_audifono', 'audifono', 5);
                evaluar_para_carga_detalle('apreciacion_auditiva', 'div_detalle_apreciacion_auditiva', 'aprec_auditiva_def',
                    2);
                evaluar_para_carga_detalle('examen_oi', 'div_detalle_examen_oi', 'ex_oi_anormal', 2);
                evaluar_para_carga_detalle('examen_od', 'div_detalle_examen_od', 'ex_od_anormal', 2);
                evaluar_para_carga_detalle('examen_bio_oi', 'div_obs_examen_bio_oi', 'obs_examen_bio_oi', 2);
                evaluar_para_carga_detalle('examen_bio_od', 'div_obs_examen_bio_od', 'obs_examen_bio_od', 2);
                evaluar_para_carga_detalle('tipo_vertigo', 'div_detalle_tipo_vertigo', 'detalle_tipo_vertigo', 3);
                evaluar_para_carga_detalle('sint_acomp', 'div_detalle_sintomas_acompanantes', 'detalle_sint_acompanantes',
                    3);
                evaluar_para_carga_detalle('ng', 'div_detalle_ng', 'detalle_ng', 2);
                evaluar_para_carga_detalle('episodios', 'div_detalle_episodios', 'detalle_episodios', 3);
                evaluar_para_carga_detalle('equilibrio', 'div_detalle_equilibrio', 'detalle_equilibrio', 2);
                evaluar_para_carga_detalle('nariz_general', 'div_detalle_nariz_gen', 'det_nariz_general', 2);
                evaluar_para_carga_detalle('apreciacion_resp', 'div_detalle_nariz_resp', 'aprec_resp_def', 2);
                evaluar_para_carga_detalle('examen_fni', 'div_detalle_examen_fni', 'ex_fni_anormal', 2);
                evaluar_para_carga_detalle('examen_fnd', 'div_detalle_examen_fnd', 'ex_fnd_anormal', 2);
                evaluar_para_carga_detalle('disfonia', 'div_disfonia', 'det_disfonia', 2);
                evaluar_para_carga_detalle('ex_boca', 'div_detalle_ex_boca', 'detalle_ex_boca', 2);
                evaluar_para_carga_detalle('examen_faringe', 'div_detalle_examen_faringe', 'ex_farige_anormal', 2);
                evaluar_para_carga_detalle('examen_laringe', 'div_detalle_examen_laringe', 'ex_larige_anormal', 2);
                return false;
            }
            $('#' + div_descripcion).html($('#' + select + ' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_otorrino') }}";
            $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        id_profesional: $('#id_profesional').val(),
                        id_ficha_tipo: id_ft,
                    },
                })
                .done(function(data) {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if (data.estado == 1) {
                        $.each(data.registros, function(index, value) {
                            // console.log(index);
                            // console.log(value);
                            // console.log($('#'+index));

                            if (index == 'id_usa_audifono')
                                index = 'usa_audifono';

                            if (index == 'id_tipo_episodios')
                                index = 'episodios';

                            if (index == 'id_tipo_equilibrio')
                                index = 'equilibrio';

                            if (index == 'id_tipo_ng')
                                index = 'ng';

                            if (index == 'id_tipo_sint_acomp')
                                index = 'sint_acomp';

                            if (index == 'id_tipo_vertigo')
                                index = 'tipo_vertigo';

                            if (index == 'obs_tipo_vertigo')
                                index = 'detalle_tipo_vertigo';

                            if (index == 'obs_sint_acomp')
                                index = 'detalle_sint_acompanantes';

                            if (index == 'obs_ng')
                                index = 'detalle_ng';

                            if (index == 'obs_episodios')
                                index = 'detalle_episodios';

                            if (index == 'obs_equilibrio')
                                index = 'detalle_equilibrio';



                            $('#' + index).val(value);
                        });

                        evaluar_para_carga_detalle('usa_audifono', 'div_detalle_usa_audifono', 'audifono', 5);
                        evaluar_para_carga_detalle('apreciacion_auditiva', 'div_detalle_apreciacion_auditiva',
                            'aprec_auditiva_def', 2);
                        evaluar_para_carga_detalle('examen_oi', 'div_detalle_examen_oi', 'ex_oi_anormal', 2);
                        evaluar_para_carga_detalle('examen_od', 'div_detalle_examen_od', 'ex_od_anormal', 2);
                        evaluar_para_carga_detalle('examen_bio_oi', 'div_obs_examen_bio_oi', 'obs_examen_bio_oi', 2);
                        evaluar_para_carga_detalle('examen_bio_od', 'div_obs_examen_bio_od', 'obs_examen_bio_od', 2);
                        evaluar_para_carga_detalle('tipo_vertigo', 'div_detalle_tipo_vertigo', 'detalle_tipo_vertigo',
                            3);
                        evaluar_para_carga_detalle('sint_acomp', 'div_detalle_sintomas_acompanantes',
                            'detalle_sint_acompanantes', 3);
                        evaluar_para_carga_detalle('ng', 'div_detalle_ng', 'detalle_ng', 2);
                        evaluar_para_carga_detalle('episodios', 'div_detalle_episodios', 'detalle_episodios', 3);
                        evaluar_para_carga_detalle('equilibrio', 'div_detalle_equilibrio', 'detalle_equilibrio', 2);
                        evaluar_para_carga_detalle('nariz_general', 'div_detalle_nariz_gen', 'det_nariz_general', 2);
                        evaluar_para_carga_detalle('apreciacion_resp', 'div_detalle_nariz_resp', 'aprec_resp_def', 2);
                        evaluar_para_carga_detalle('examen_fni', 'div_detalle_examen_fni', 'ex_fni_anormal', 2);
                        evaluar_para_carga_detalle('examen_fnd', 'div_detalle_examen_fnd', 'ex_fnd_anormal', 2);
                        evaluar_para_carga_detalle('disfonia', 'div_disfonia', 'det_disfonia', 2);
                        evaluar_para_carga_detalle('ex_boca', 'div_detalle_ex_boca', 'detalle_ex_boca', 2);
                        evaluar_para_carga_detalle('examen_faringe', 'div_detalle_examen_faringe', 'ex_farige_anormal',
                            2);
                        evaluar_para_carga_detalle('examen_laringe', 'div_detalle_examen_laringe', 'ex_larige_anormal',
                            2);

                    } else {

                        swal({
                            title: "Problema al Cargar Tipo Ficha.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
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

        function cargar_profesional(rut, input_nombre, input_id, div_solicitar) {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if (rut.length > 5) {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                        url: url,
                        type: "GET",
                        data: {
                            rut: rut,
                        },
                    })
                    .done(function(data) {
                        // console.log('-----------------------');
                        // console.log(data);
                        // console.log('-----------------------');
                        if (data.estado == 1) {

                            if (data.registros.length > 0) {
                                var nombre = data.registros[0].nombre + ' ' + data.registros[0].apellido_uno;
                                var id = data.registros[0].id;
                                // $('#'+input_nombre).attr('readonly', true);
                                $('#' + input_nombre).val(nombre);
                                $('#' + input_id).val(id);
                                $('#' + div_solicitar).hide();
                                mensaje = '';
                                $('#div_mensaje').hide();
                                $('#mensaje_solicitado_por').html(mensaje);
                                $('#solicitado_por_nombre_rfl').val('');
                                $('#solicitado_por_apellido_rfl').val('');
                                $('#solicitado_por_telefono_rfl').val('');
                                $('#solicitado_por_email_rfl').val('');
                            } else {
                                mensaje = 'Profesional no encontrato, debe ingresar datos.';
                                $('#' + input_nombre).val('');
                                $('#' + input_id).val('');
                                $('#' + div_solicitar).show();
                                $('#div_mensaje').show();
                                $('#mensaje_solicitado_por').html(mensaje);
                                $('#solicitado_por_nombre_rfl').val('');
                                $('#solicitado_por_apellido_rfl').val('');
                                $('#solicitado_por_telefono_rfl').val('');
                                $('#solicitado_por_email_rfl').val('');
                                // $('#'+input_nombre).attr('readonly', true);
                            }
                        } else {
                            mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            // $('#'+input_nombre).attr('readonly', false);
                        }
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            } else if (rut.length == 0) {
                $('#' + input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#' + input_id).val('');
                $('#' + div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido) {
            var nombre = $('#' + input_nombre).val();
            var apellido = $('#' + input_apellido).val();
            if (nombre != '' || apellido != '') {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#' + input_solitado_por).val($('#' + input_nombre).val() + ' ' + $('#' + input_apellido).val());
            } else {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#' + input_solitado_por).val();
            }
        }



        /** CRONICO */
        function getDosis_cronico(id_medicamento, div_dosis) {

            console.log(id_medicamento);

            let url = "{{ route('dental.getDosis') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        id_medicamento: id_medicamento,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let dosis = $('#' + div_dosis);

                        dosis.find('option').remove();
                        dosis.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.dosis + '" data-id="' + v.id +
                                '" data-cant_comp="' + v.cant_comp + '">' + v.present +
                                '</option>');
                        })

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function getCantCompCronica(div_dosis, div_comp) {

            var cant_comp = $('#' + div_dosis + ' option:selected').attr('data-cant_comp');
            console.log(cant_comp);

            let url = "{{ route('presentacion.getCantComp') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        cant_comp: cant_comp,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let select_cant_comp = $('#' + div_comp);

                        select_cant_comp.find('option').remove();
                        select_cant_comp.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            select_cant_comp.append('<option value="' + v.id + '">' + v.cant + '</option>');
                        })
                        select_cant_comp.append('<option value="999">Otra Cantidad</option>');

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function es_cronico() {
            if ($('#enf_cronico').prop('checked')) {
                $('#form_enfermedad_cronica').modal('show');
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

                $('#cronicos').val('n_C');
                ver_medicamento_cronico();
                $('.medicamento_cronico_div').show();
                $('#senal_med_cronico').removeClass('fa-angle-down');
                $('#senal_med_cronico').addClass('fa-angle-up');

                cambiar_enfermedad_cronica();

            }

        }

        function cambiar_enfermedad_cronica() {

            if ($('#cronicos').val() != 'n_C') {
                var nombre_enfermedad = $("#cronicos option:selected").text();
                $('#titulo_med_patologia').html(('Medicamentos ' + nombre_enfermedad).toUpperCase());
                $('.medicamento_patologia').show();
                $('#btn_registro_med_patologia').attr('onclick', 'agregar_medicamento_cronico_patologia(\'' + $('#cronicos')
                    .val() + '\')');
                ver_medicamento_cronico_patologia();

                $('.medicamento_cronico_div').hide();
                $('#senal_med_cronico').addClass('fa-angle-down');
                $('#senal_med_cronico').removeClass('fa-angle-up');

                switch ($('#cronicos').val()) {
                    case 'cpeso':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').show();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                        break;
                    case 'chipertension':
                        $('#hipertension_div').show();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                        ver_control_hipertension();

                        break;
                    case 'cdiabet':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').show();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                        break;

                    case 'cinsufren':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').show();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                        break;
                    case 'cmtumorales':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').show();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                        break;
                    case 'creumato':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').show();
                        $('#clitemia').hide();
                        break;
                    case 'clitemia':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').show();
                        break;

                    default:
                        break;
                }
            } else {
                $('.medicamento_patologia').hide();
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

                $('#titulo_med_patologia').html('Medicamentos');
            }
        }

        function registrar_control_obesidad() {

            let peso = $('#registro_peso').val();
            let variacion = $('#registro_peso_variacion').val();
            let ideal = $('#registro_peso_ideal').val();
            let url = "{{ route('ficha_medica.registrar_control_obesidad') }}";
            let hora_medica = $('#hora_medica').val();
            var validar = 0;
            var mensaje = '';

            if (peso == '') {
                $('#registro_peso').focus();
                mensaje += 'Debe ingresar el Peso del Control Actual.\n';
                validar = 1;
            }
            if (variacion == '') {
                $('#registro_peso_variacion').focus();
                mensaje += 'Debe ingresar la Variación.\n';
                validar = 1;
            }
            if (ideal == '') {
                $('#registro_peso_ideal').focus();
                mensaje += 'Debe ingresar el Peso Ideal.\n';
                validar = 1;
            }

            if (validar == 1) {
                swal({
                    title: "Debe ingresar todos los datos requeridos.",
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            } else {
                $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            peso: peso,
                            variacion: variacion,
                            ideal: ideal,
                            hora_medica: hora_medica
                        },
                    })
                    .done(function(response) {

                        if (response != '') {
                            console.log(response);
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').text('Se ha agregago control de obesidad correctamente');
                            $('#mensaje').show();
                            {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                            {{--  location.reload();  --}}
                            $('#registro_peso').val('');
                            $('#registro_peso_variacion').val('');
                            $('#registro_peso_ideal').val('');
                            ver_control_obesidad();
                        }
                    })
                    .fail(function(e) {
                        console.log("error");
                        console.log(e);
                    })
            }
        };

        function registrar_hipertension() {

            let sistolica = $('#presion_sistolica_hipertension').val();
            let diastolica = $('#presion_diastolica_hipertension').val();
            let ideal = $('#ideal_hipertension').val();
            let url = "{{ route('ficha_medica.registrar_hipertension') }}";
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            var validar = 0;
            var mensaje = '';

            if (sistolica == '') {
                $('#presion_sistolica_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Sistólica.\n';
                validar = 1;
            }
            if (diastolica == '') {
                $('#presion_diastolica_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Diastólica.\n';
                validar = 1;
            }
            if (ideal == '') {
                $('#ideal_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Ideal.\n';
                validar = 1;
            }

            if (validar == 1) {
                swal({
                    title: "Debe ingresar todos los datos requeridos.",
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            } else {
                $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            sistolica: sistolica,
                            diastolica: diastolica,
                            ideal: ideal,
                            hora_medica: hora_medica,
                            id_lugar_atencion: id_lugar_atencion
                        },
                    })
                    .done(function(response) {

                        if (response != '') {
                            console.log(response);
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').text('Se ha agregado control de Presión Arterial correctamente');
                            $('#mensaje').show();
                            {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                            $('#presion_sistolica_hipertension').val('');
                            $('#presion_diastolica_hipertension').val('');
                            $('#ideal_hipertension').val('');
                            ver_control_hipertension();

                        }
                    })
                    .fail(function(e) {
                        console.log("error");
                        console.log(e);
                    })
            }
        };

        function registrar_diabetes() {

            let peso = $('#peso_diabetes').val();
            let pies = $('#pies_diabetes').val();
            let hgac1 = $('#hga1c_diabetes').val();
            let colesterol = $('#colesterol_diabetes').val();
            let creatina = $('#creatina_diabetes').val();
            let glicosilada_postprandial = $('#glicosilada_postprandial_diabetes').val();
            let glicosinada_ayuno = $('#glicosilada_ayuno_diabetes').val();
            let url = "{{ route('ficha_medica.registrar_diabetes') }}";
            let hora_medica = $('#hora_medica').val();

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        peso: peso,
                        pies: pies,
                        hgac1: hgac1,
                        colesterol: colesterol,
                        creatina: creatina,
                        glicosilada_postprandial: glicosilada_postprandial,
                        glicosinada_ayuno: glicosinada_ayuno,
                        hora_medica: hora_medica
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de diabetes correctamente');
                        $('#mensaje').show();
                        $('#form_enfermedad_cronica').modal('hide');
                        location.reload();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };

        function agregar_medicamento_cronico() {

            let url = "{{ route('medicamento_cronico.registrar') }}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var nombre_medicamento = $('#nombre_medicamentocron').val();
            var id_medicamento = $('#id_medicamentocron').val();
            var cantidad = $('#med_cronicomes option:selected').text()
            var tipo_enfermedad = 'cronico';

            $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        id_profesional: id_profesional,
                        id_ficha_atencion: id_ficha_atencion,
                        id_paciente: id_paciente,
                        nombre_medicamento: nombre_medicamento,
                        id_medicamento: id_medicamento,
                        cantidad: cantidad,
                        tipo_enfermedad: tipo_enfermedad,
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        if (data.estado == 1) {
                            swal({
                                title: "Medicamento Cronico.",
                                text: "Medicamento Registrado con exito.",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            $('#nombre_medicamentocron').val('');

                            $('#dosis_cronicomes').html('<option value="0">Seleccione</option>');
                            $('#med_cronicomes').html('<option value="0">Seleccione</option>');

                            ver_medicamento_cronico();


                        } else {

                            swal({
                                title: "Problema al Registrar Medicamento Cronico.",
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function ver_medicamento_cronico() {

            let url = "{{ route('medicamento_cronico.getRegsitros') }}";


            var _token = CSRF_TOKEN;
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();

            $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        _token: _token,
                        // id_ficha_atencion:id_ficha_atencion,
                        id_paciente: id_paciente,
                        tipo_enfermedad: 'cronico'
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        var html = '';
                        html += '<thead>';
                        html += '    <tr>';
                        html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                        html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                        html += '        <th class="text-center align-middle">Acción</th>';
                        html += '        <th class="text-center align-middle">Check</th>';
                        html += '    </tr>';
                        html += '</thead>';
                        html += '<tbody>';
                        if (data.estado == 1) {

                            $.each(data.registros, function(index, value) {
                                html += '<tr>';
                                html += '    <td class="align-left align-middle">' + value.nombre_medicamento +
                                    '</td>';
                                html += '    <td class="text-center align-middle">' + value.cantidad + '</td>';
                                html += '    <td class="text-center align-middle">';
                                html +=
                                    '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico(\'' +
                                    value.id + '\');"><i class="feather icon-x"></i></button>';
                                html += '    </td>';
                                html += '    <td class="text-center align-middle">';
                                html +=
                                    '        <input type="checkbox" name="medicamento_cronico_general" id="medicamento_cronico_general_' +
                                    value.id + '">';
                                html += '    </td>';
                                html += '</tr>';
                            });

                        } else {

                            html += '<tr>';
                            html += '    <td class="text-center align-middle" colspan="3">SIN REGISTROS</td>';
                            html += '</tr>';

                        }
                        html += '</tbody>';
                        $('#tabla_medicamento_cronico').html(html);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function eliminar_med_cronico(id) {
            let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


            var _token = CSRF_TOKEN;
            var id = id;

            $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        id: id
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        if (data.estado == 1) {
                            swal({
                                title: "Medicamento Cronico.",
                                text: "Medicamento Eliminado.",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            ver_medicamento_cronico();
                        } else {

                            swal({
                                title: "Problema al Eliminar Registro de Medicamento Cronico.",
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    } else {

                        swal({
                            title: "Problema al Eliminar Registro de Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        {{--  MEDICAMENTOS CRONICOS PATOLOGIA  --}}

        function agregar_medicamento_cronico_patologia(tipo) {

            let url = "{{ route('medicamento_cronico.registrar') }}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var nombre_medicamento = $('#nombre_medicamentocron_patologia').val();
            var cantidad = $('#med_cronicomes_patologia option:selected').text();
            var tipo_enfermedad = tipo;

            $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        id_profesional: id_profesional,
                        id_ficha_atencion: id_ficha_atencion,
                        id_paciente: id_paciente,
                        nombre_medicamento: nombre_medicamento,
                        cantidad: cantidad,
                        tipo_enfermedad: tipo_enfermedad,
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        if (data.estado == 1) {
                            swal({
                                title: "Medicamento Cronico.",
                                text: "Medicamento Registrado con exito.",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            $('#nombre_medicamentocron_patologia').val('');
                            $('#id_medicamentocron_patologia').val('');

                            $('#dosis_medicamentocron_patologia').html('<option value="0">Seleccione</option>');
                            $('#med_cronicomes_patologia').html('<option value="0">Seleccione</option>');

                            ver_medicamento_cronico_patologia()
                        } else {

                            swal({
                                title: "Problema al Registrar Medicamento Cronico.",
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function ver_medicamento_cronico_patologia() {

            let url = "{{ route('medicamento_cronico.getRegsitros') }}";


            var _token = CSRF_TOKEN;
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var tipo_enfermedad = $('#cronicos').val();
            $('#tabla_med_patologia').html('');

            $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        _token: _token,
                        // id_ficha_atencion:id_ficha_atencion,
                        id_paciente: id_paciente,
                        tipo_enfermedad: tipo_enfermedad
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        var html = '';
                        html += '<thead>';
                        html += '    <tr>';
                        html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                        html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                        html += '        <th class="text-center align-middle">Acción</th>';
                        html += '        <th class="text-center align-middle">Check</th>';
                        html += '    </tr>';
                        html += '</thead>';
                        html += '<tbody>';
                        if (data.estado == 1) {

                            $.each(data.registros, function(index, value) {
                                html += '<tr>';
                                html += '    <td class="align-left align-middle">' + value.nombre_medicamento +
                                    '</td>';
                                html += '    <td class="text-center align-middle">' + value.cantidad + '</td>';
                                html += '    <td class="text-center align-middle">';
                                html +=
                                    '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico_patologia(\'' +
                                    value.id + '\');"><i class="feather icon-x"></i></button>';
                                html += '    </td>';
                                html += '    <td class="text-center align-middle">';
                                html +=
                                    '        <input type="checkbox" name="medicamento_cronico_patologia" id="medicamento_cronico_patologia_' +
                                    value.id + '">';
                                html += '    </td>';
                                html += '</tr>';
                            });

                        } else {

                            html += '<tr>';
                            html += '    <td class="text-center align-middle" colspan="4">SIN REGISTROS</td>';
                            html += '</tr>';

                        }
                        html += '</tbody>';
                        $('#tabla_med_patologia').html(html);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function eliminar_med_cronico_patologia(id) {
            let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


            var _token = CSRF_TOKEN;
            var id = id;
            var tipo_enfermedad = $('#cronicos').val();

            $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        id: id
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        if (data.estado == 1) {
                            swal({
                                title: "Medicamento Cronico.",
                                text: "Medicamento Eliminado.",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            ver_medicamento_cronico_patologia(tipo_enfermedad);
                        } else {

                            swal({
                                title: "Problema al Eliminar Registro de Medicamento Cronico.",
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    } else {

                        swal({
                            title: "Problema al Eliminar Registro de Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }


        {{--  mostrar div   --}}

        function mostrar_div(div) {
            if ($('.' + div).is(':visible')) {
                $('.' + div).hide();
                $('#senal_med_cronico').addClass('fa-angle-down');
                $('#senal_med_cronico').removeClass('fa-angle-up');
            } else {
                $('.' + div).show();
                $('#senal_med_cronico').removeClass('fa-angle-down');
                $('#senal_med_cronico').addClass('fa-angle-up');
            }
        }


        {{--  CRONICO VER CONTROL DE HIPERTENSION  --}}

        function ver_control_hipertension() {

            let url = "{{ route('hipertension.getHipertension') }}";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_hipertension').html('');

            $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        _token: _token,
                        id_paciente: id_paciente
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {
                        //data = JSON.parse(data);
                        console.log('----------ver_control_hipertension-------------');
                        console.log(data);
                        console.log('-----------------------');
                        var html = '';
                        html += '<thead>';
                        html += '    <tr>';
                        html += '         <th class="text-center align-middle">Nº Control</th>';
                        html += '         <th class="text-center align-middle">Fecha</th>';
                        html += '         <th class="text-center align-middle">Presión Sistólica</th>';
                        html += '         <th class="text-center align-middle">Presión Diastólica</th>';
                        html += '         <th class="text-center align-middle">Presión Ideal</th>';
                        html += '    </tr>';
                        html += '</thead>';
                        html += '<tbody>';
                        if (data.estado == 1) {

                            $.each(data.registros, function(index, value) {
                                var f_temp = (value.created_at).replace('T', ' ').replace('Z', '').replace(
                                    '.000000', '');
                                var fecha = new Date(f_temp);
                                fecha = fecha.getDate() + '-' + (fecha.getMonth() + 1) + '-' + fecha
                                    .getFullYear() + ' ' + fecha.getHours() + ':' + fecha.getMinutes();

                                html += '<tr>';
                                html += '    <td class="text-center align-middle">' + value.id + '</td>';
                                html += '    <td class="text-center align-middle">' + fecha + '</td>';
                                html += '    <td class="text-center align-middle">' + value.sistolica + '</td>';
                                html += '    <td class="text-center align-middle">' + value.diastolica +
                                '</td>';
                                html += '    <td class="text-center align-middle">' + value.ideal + '</td>';
                                html += '</tr>';
                            });

                        } else {

                            html += '<tr>';
                            html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                            html += '</tr>';

                        }
                        html += '</tbody>';
                        $('#control_hipertension').html(html);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        {{--  CRONICO VER CONTROL DE OBESIDAD  --}}

        function ver_control_obesidad() {

            let url = "{{ route('control_obesidad.getControlObesidad') }}";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_obesidad').html('');

            $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        _token: _token,
                        id_paciente: id_paciente
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {
                        //data = JSON.parse(data);
                        console.log('----------ver_control_hipertension-------------');
                        console.log(data);
                        console.log('-----------------------');
                        var html = '';
                        html += '<thead>';
                        html += '    <tr>';
                        html += '    <th class="text-center align-middle">Nº Control</th>';
                        html += '    <th class="text-center align-middle">Fecha</th>';
                        html += '    <th class="text-center align-middle">Peso</th>';
                        html += '    <th class="text-center align-middle">Variación</th>';
                        html += '    <th class="text-center align-middle">Peso Ideal</th>';
                        html += '    <!-- <th class="text-center align-middle">Acción</th>-->';
                        html += '</tr>';
                        html += '</thead>';
                        html += '<tbody>';
                        if (data.estado == 1) {

                            $.each(data.registros, function(index, value) {
                                var f_temp = (value.created_at).replace('T', ' ').replace('Z', '').replace(
                                    '.000000', '');
                                var fecha = new Date(f_temp);
                                fecha = fecha.getDate() + '-' + (fecha.getMonth() + 1) + '-' + fecha
                                    .getFullYear();


                                html += '<tr>';
                                html += '    <td class="text-center align-middle">' + value.id + '</td>';
                                html += '    <td class="text-center align-middle">' + fecha + '</td>';
                                html += '    <td class="text-center align-middle">' + value.peso + '</td>';
                                html += '    <td class="text-center align-middle">' + value.variacion + '</td>';
                                html += '    <td class="text-center align-middle">' + value.ideal + '</td>';
                                html +=
                                    '    <!--<td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>-->';
                                html += '</tr>';
                            });

                        } else {

                            html += '<tr>';
                            html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                            html += '</tr>';

                        }
                        html += '</tbody>';
                        $('#control_obesidad').html(html);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }
        /** FIN CRONICO */

        /** PERVISUALIZACION DE EXAMEN */
        function visualizar_pdf_examen(tipo_examen) {
            if (tipo_examen != '') {
                var array_datos = {};
                $('.div_form_examen_' + tipo_examen).find('input,textarea,select').each(function(key, element) {
                    array_datos[element.id] = element.value;
                });

                var imagenes = $('#input_lista_imagenes').val();
                if (imagenes != '') {
                    imagenes = JSON.stringify(imagenes);
                }

                var data = 'id_ficha=' + $('#id_fc').val() + '&contenido=' + JSON.stringify(array_datos) + '&imagenes=' +
                    imagenes;
                Fancybox.show(
                    [{
                        src: '{{ route('pdf.visualizar.examen') }}?' + data,
                        type: "iframe",
                        preload: false,
                    }, ]
                );
            } else {
                console.log('tipo examen no especificado');
            }
        }

        /* Ponemos "agregarPieza" en el ámbito de toda la página */
        function agregarPieza() {
            var html = '';
            html += '<div id="pieza_dental" class="row">';
            html += '    <div class="form-row">';
            html += '        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Pieza N°</label>';
            html +=
                '                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">';
            html += '            </div>';
            html += '        </div>';
            html += '    </div>';
            html += '    <div class="form-row">';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Resp.Calor</label>';
            html +=
                '                <select id="sel_endo_resp_calor" name="sel_endo_resp_calor" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Resp.Frio</label>';
            html +=
                '                <select id="sel_endo_resp_frio" name="sel_endo_resp_frio" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Eléctrico</label>';
            html +=
                '                <select id="sel_endo_resp_elect" name="sel_endo_resp_elect" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Percusión</label>';
            html +=
                '                <select id="sel_endo_resp_perc" name="sel_endo_resp_perc" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Exploración</label>';
            html +=
                '                <select id="sel_endo_resp_expl" name="sel_endo_resp_expl" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '            <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Cavitaria</label>';
            html +=
                '                <select id="sel_endo_cavitaria" name="sel_endo_cavitaria" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
            html += '                    <option><span>N/R </span> No realizada</option>';
            html += '                    <option><span>↑ </span> Aumentado</option>';
            html += '                    <option><span>↓ </span> Disminuido</option>';
            html += '                    <option><span>N </span> Normal</a></option>';
            html += '                    <option><span>(-) </span> No responde</a></option>';
            html += '                </select>';
            html += '            </div>';
            html += '        </div>';
            html += '       ';
            html += '    </div>';
            html += '</div>';

            $('#contenedor_pieza_dental_endo').append(html);
        }

        function mostrar_nueva_pieza_dental(counter) {

            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#nueva_pieza_dental_odontodolor').empty();
                    $('#nueva_pieza_dental_odontodolor').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function mostrar_nueva_pieza_dental_end(counter) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_end') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_nuevo_examen_end').empty();
                    $('#contenedor_nuevo_examen_end').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function ocultarExamen(counter) {
            $('#nueva_pieza_dental_odontodolor').empty();
        }

        function ocultarExamenEnd(counter) {
            $('#contenedor_nuevo_examen_end').empty();
        }

        function guardar_pieza_dental_dolor(count) {
            let derivado_por = $('#ex_grl_deriv').val();
            let zona_dolor = $('#ex_grl_zdolor').val();
            let historia_anterior = $('#ex_grl_hp').val();

            let pieza_numero = $('#numero_pieza' + count).val();
            let tipo_dolor = $('#tipo_dolor' + count).val();
            let intensidad = $('#intensidad' + count).val();
            let modo_dolor = $('#modo_dolor' + count).val();
            let loc_dolor = $('#loc_dolor' + count).val();
            let provocacion_dolor = $('#provocacion_dolor' + count).val();
            let cdo_duele = $('#cdo_duele' + count).val();
            let tpo_evolucion = $('#tpo_evolucion' + count).val();
            let obs_anal_dolor = $('#obs_anal_dolor' + count).val();

            let valido = 1;
            let mensaje = '';

            if (derivado_por == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Derivado por </li>';
            }
            if (zona_dolor == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Zona dolor </li>';
            }
            if (historia_anterior == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Historia anterior </li>';
            }
            if (pieza_numero == '') {
                valido = 0;
                mensaje += '<li>Campo requerido N° Pieza </li>';
            }
            if (tipo_dolor == 0) {
                valido = 0;
                mensaje += '<li>Campo requerido Tipo Dolor </li>';
            }
            if (intensidad == 0) {
                valido = 0;
                mensaje += '<li>Campo requerido Intensidad </li>';
            }
            if (obs_anal_dolor == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Observaciones analgesicos dolor </li>';
            }

            if (valido == 0) {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje,
                        },
                    },
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
                return false;
            }

            let data = {
                _token: CSRF_TOKEN,
                derivado_por: derivado_por,
                zona_dolor: zona_dolor,
                historia_anterior: historia_anterior,
                pieza_numero: pieza_numero,
                tipo_dolor: tipo_dolor,
                intensidad: intensidad,
                modo_dolor: modo_dolor,
                loc_dolor: loc_dolor,
                provocacion_dolor: provocacion_dolor,
                cdo_duele: cdo_duele,
                tpo_evolucion: tpo_evolucion,
                obs_anal_dolor: obs_anal_dolor,
                id_paciente: $('#id_paciente_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_ficha_atencion: $('#id_ficha_atencion').val(),
                id_profesional: $('#id_profesional_fc').val(),
                count: count
            }

            let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_dolor') }}";

            $.ajax({
                url: url,
                type: 'post',
                data: data,
                success: function(resp) {
                    console.log(resp);
                    mostrar_nueva_pieza_dental(
                    2000); // valor aleatorio para que el id de la nueva pieza dental sea unico
                    $('#contenedor_pieza_dental_odontodolor').empty();
                    $('#contenedor_pieza_dental_odontodolor').append(resp.v);
                    $('#nueva_pieza_dental_odontodolor').empty();
                    swal({
                        title: "Éxito",
                        text: "Pieza dental guardada correctamente.",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function guardar_pieza_dental_end(count) {
            let derivado_por = $('#ex_end_derivado_por').val();
            let zona_dolor = $('#ex_end_zona_dolor').val();
            let historia_anterior = $('#ex_end_hist_ant').val();

            let pieza_numero = $('#end_numero_pieza' + count).val();
            let tipo_dolor = $('#end_tipo_dolor' + count).val();
            let intensidad = $('#end_intensidad' + count).val();
            let modo_dolor = $('#end_modo_dolor' + count).val();
            let loc_dolor = $('#end_loc_dolor' + count).val();
            let provocacion_dolor = $('#end_provocacion_dolor' + count).val();
            let cdo_duele = $('#end_cdo_duele' + count).val();
            let tpo_evolucion = $('#end_tpo_evolucion' + count).val();
            let obs_anal_dolor = $('#end_obs_loc_dolor' + count).val();

            let valido = 1;
            let mensaje = '';

            if (derivado_por == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Derivado por </li>';
            }
            if (zona_dolor == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Zona dolor </li>';
            }
            if (historia_anterior == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Historia anterior </li>';
            }
            if (pieza_numero == '') {
                valido = 0;
                mensaje += '<li>Campo requerido N° Pieza </li>';
            }
            if (tipo_dolor == 0) {
                valido = 0;
                mensaje += '<li>Campo requerido Tipo Dolor </li>';
            }
            if (intensidad == 0) {
                valido = 0;
                mensaje += '<li>Campo requerido Intensidad </li>';
            }
            if (obs_anal_dolor == '') {
                valido = 0;
                mensaje += '<li>Campo requerido Observaciones analgesicos dolor </li>';
            }

            if (valido == 0) {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje,
                        },
                    },
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
                return false;
            }

            let data = {
                _token: CSRF_TOKEN,
                derivado_por: derivado_por,
                zona_dolor: zona_dolor,
                historia_anterior: historia_anterior,
                pieza_numero: pieza_numero,
                tipo_dolor: tipo_dolor,
                intensidad: intensidad,
                modo_dolor: modo_dolor,
                loc_dolor: loc_dolor,
                provocacion_dolor: provocacion_dolor,
                cdo_duele: cdo_duele,
                tpo_evolucion: tpo_evolucion,
                obs_anal_dolor: obs_anal_dolor,
                id_paciente: $('#id_paciente_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_ficha_atencion: $('#id_ficha_atencion').val(),
                id_profesional: $('#id_profesional_fc').val(),
                count: count
            }

            let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_end_dolor') }}";

            $.ajax({
                url: url,
                type: 'post',
                data: data,
                success: function(resp) {
                    console.log(resp);
                    $('#contenedor_examen_dolor_end').empty();
                    $('#contenedor_examen_dolor_end').append(resp.v);
                    $('#contenedor_nuevo_examen_end').empty();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function eliminarExamenAgregado(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar este examen?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmarEliminarExamenAgregado(id);
                }
            })
        }

        function eliminarExamenEndAgregado(id, tipo_examen) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar este examen?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmarEliminarExamenEndAgregado(id, tipo_examen);
                }
            })
        }

        function confirmarEliminarExamenAgregado(id) {
            let url = "{{ route('profesional.eliminar_nueva_pieza_dental') }}";
            var idPaciente = $('#id_paciente_fc').val();
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id: id,
                    id_paciente: idPaciente,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    let mensaje = resp.mensaje;
                    let vista = resp.vista;
                    if (mensaje == 'OK') {
                        swal({
                            title: 'Éxito',
                            text: 'Evolución eliminada correctamente',
                            icon: 'success',
                            button: 'Aceptar'
                        });
                        $('#contenedor_pieza_dental_odontodolor').empty();
                        $('#contenedor_pieza_dental_odontodolor').append(vista);
                    } else {
                        swal({
                            title: 'Error',
                            text: 'mensaje',
                            icon: 'error',
                            button: 'Aceptar'
                        })
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function confirmarEliminarExamenEndAgregado(id, tipo_examen) {
            let url = "{{ route('profesional.eliminar_nueva_pieza_dental_end') }}";
            var idPaciente = $('#id_paciente_fc').val();
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id: id,
                    id_paciente: idPaciente,
                    tipo_examen: tipo_examen,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    let mensaje = resp.mensaje;
                    let vista = resp.vista;
                    if (mensaje == 'OK') {
                        swal({
                            title: 'Éxito',
                            text: 'Evolución eliminada correctamente',
                            icon: 'success',
                            button: 'Aceptar'
                        });
                        if (tipo_examen == 'endo') {
                            $('#contenedor_examen_dolor_end').empty();
                            $('#contenedor_examen_dolor_end').append(vista);
                        } else if (tipo_examen == 'odontop') {
                            $('#contenedor_pieza_dental_od_general').empty();
                            $('#contenedor_pieza_dental_od_general').append(vista);
                        }

                    } else {
                        swal({
                            title: 'Error',
                            text: 'mensaje',
                            icon: 'error',
                            button: 'Aceptar'
                        })
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function mostrarFormularioReceta(id) {
            console.log(id);
            if (id == 1) {
                $('#rec_1').addClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').removeClass('show active');
            } else if (id == 2) {
                $('#rec_2').addClass('show active');
                $('#rec_1').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').removeClass('show active');
            } else if (id == 3) {
                $('#rec_1').removeClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').addClass('show active');
                $('#curaciones_div').removeClass('show active');
            } else {
                console.log('es 4');
                $('#rec_1').removeClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').addClass('show active');
            }
        }

        function indicar_procedimiento_sdi() {
            var ind_med = $('#ind_med').val();
            var ind_cur = $('#ind_cur').val();
            var ind_proc = $('#ind_proc').val();
            var ind_inmmed = $('#ind_inmmed').val();
            var ind_cc = $('#ind_cv_inmmed_urg').val();
            var ind_pp = $('#ind_pp').val();
            var ind_vig_sig = $('#ind_vig_sig').val();

            var obs_ind_med = $('#obs_ind_med_servicio').val();
            var obs_detalle_ind_med = $('#obs_detalle_ind_med').val();

            var params = new URLSearchParams(location.search);
            var id_paciente = $('#id_paciente').val();

            var valido = 0;
            var mensaje = '';

            // if ($.trim(ind_med) == '' || ind_med == 0 || $.trim(ind_med) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Vias y Cateter.\n';
            // }

            // if ($.trim(ind_cur) == '' || ind_cur == 0 || $.trim(ind_cur) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Curaciones.\n';
            // }

            // if ($.trim(ind_proc) == '' || ind_proc == 0 || $.trim(ind_proc) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Sondas y procedimientos.\n';
            // }

            // if ($.trim(ind_inmmed) == '' || ind_inmmed == 0 || $.trim(ind_inmmed) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Inmovilizacion.\n';
            // }

            // if ($.trim(ind_cc) == '' || ind_cc == 0 || $.trim(ind_cc) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Control de ciclo.\n';
            // }

            // if ($.trim(ind_pp) == '' || ind_pp == 0 || $.trim(ind_pp) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Preparar para.\n';
            // }

            // if ($.trim(ind_vig_sig) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Vigilar signos de alerta.\n';
            // }

            // if ($.trim(obs_ind_med) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Observaciones.\n';
            // }

            // if ($.trim(obs_detalle_ind_med) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Detalle de Observaciones.\n';
            // }


            if (valido == 0) {
                let data = {
                    ind_med: ind_med,
                    ind_cur: ind_cur,
                    ind_proc: ind_proc,
                    ind_inmmed: ind_inmmed,
                    ind_cc: ind_cc,
                    ind_pp: ind_pp,
                    ind_vig_sig: ind_vig_sig,
                    id_paciente: id_paciente,
                    obs_ind_med: obs_ind_med,
                    obs_detalle_ind_med: obs_detalle_ind_med,
                    _token: "{{ csrf_token() }}"
                };

                console.log(data);
                var url = "{{ route('indicar_procedimiento_sdi') }}";
                $.ajax({
                        url: url,
                        type: "post",
                        data: data,
                        dataType: "json",
                    })
                    .done(function(data) {
                        if (data.status == 1) {
                            let procedimientos = data.procedimientos;
                            let curaciones = data.curaciones;

                            $('#tabla_procedimientos_servicio tbody').empty();
                            $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                            $('#tabla_curaciones_servicio tbody').empty();
                            $('#tabla_curaciones_procedimientos tbody').empty();
                            $('#tabla_procedimientos_hosp tbody').empty();
                            procedimientos.forEach(function(procedimiento) {
                                console.log(procedimiento.id);
                                if (procedimiento.estado == 0) {
                                    var html = '<span class="badge badge-warning">Suspendido </span>';
                                } else {
                                    var html = '';
                                }
                                let datos = JSON.parse(procedimiento.datos_procedimiento);
                                // Ahora puedes trabajar con datos como un objeto JSON

                                $('#tabla_procedimientos_servicio tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="feather icon-x"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);

                                $('#tabla_procedimientos_hosp tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap">
                                            <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                        </td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="feather icon-x"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);
                            });
                            if (curaciones.length > 0) {
                                curaciones.forEach(function(curacion) {
                                    let datos = curacion.datos_curacion;
                                    // Ahora puedes trabajar con datos como un objeto JSON
                                    console.log(curacion);
                                    $('#tabla_curaciones_servicio tbody').append(`
                                        <tr>
                                            <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                            <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                            <td class="text-center align-middle">
                                                <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="switch switch-success d-inline">
                                                    <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                                    <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                                    Insumos
                                                </button>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-outline-warning btn-sm" >
                                                    <i class="fas fa-edit"></i>

                                                </button>
                                            </td>
                                        </tr>
                                    `);

                                    $('#tabla_curaciones_procedimientos tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="feather icon-x"></i></button></td>
                                    </tr>
                                    `);
                                });
                            }

                            swal({
                                title: "Indicación de Procedimiento.",
                                text: data.mensaje,
                                icon: "success",
                                buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        } else {
                            swal({
                                title: "Indicación de Procedimiento.",
                                text: data.mensaje,
                                icon: "error",
                                buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                        }
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            } else {
                swal({
                    title: "Indicación de Procedimiento.",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        }

        function evaluar_para_carga_detalle(select, div, input, valor) {
            var valor_select = $('#' + select + '').val();
            if (valor_select == valor) $('#' + div + '').show();
            else {
                $('#' + div + '').hide();
                $('#' + input + '').val('');
            }
        }

        function eliminar_procedimiento_sdi(id) {
            swal({
                title: "Eliminar Procedimiento.",
                text: 'Al "Aceptar" Elimina el procedimiento.\n',
                icon: "warning",
                buttons: ["Cancelar", 'Aceptar'],
            }).then((result) => {
                console.log(result);
                if (result == true) {
                    eliminar_procedimiento_sdi_ajax(id);
                } else {
                    console.log('regresar');
                }
            });
        }

        function suspender_procedimiento_sdi(id) {
            var url = "{{ route('suspender_procedimiento_sdi') }}";
            var id_paciente = $('#id_paciente').val();

            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        id: id,
                        id_paciente: id_paciente,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(procedimientos);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            if (procedimiento.estado == 0) {
                                var html = '<span class="badge badge-warning">Suspendido </span>';
                            } else {
                                var html = '';
                            }
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                    <td class="text-center align-middle text-wrap">
                                        <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                            <i class="feather icon-x"></i>Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                            onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                            <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                            ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                        </button>
                                    </td>
                                </tr>
                            `);

                            $('#tabla_procedimientos_hosp tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                    <td class="text-center align-middle text-wrap">
                                        <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                            <i class="feather icon-x"></i>Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                            onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                            <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                            ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                        </button>
                                    </td>
                                </tr>
                            `);

                        });

                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm" >
                                            <i class="fas fa-edit"></i>

                                        </button>
                                    </td>
                                </tr>
                            `);
                        });

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function eliminar_procedimiento_sdi_ajax(id) {
            var url = "{{ route('eliminar_procedimiento_sdi') }}";
            var id_paciente = $('#id_paciente').val();
            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        id: id,
                        id_paciente: id_paciente,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(curaciones);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            if (procedimiento.estado == 0) {
                                var html = '<span class="badge badge-warning">Suspendido </span>';
                            } else {
                                var html = '';
                            }
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="feather icon-x"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);

                            $('#tabla_procedimientos_hosp tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap">
                                            <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                        </td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="feather icon-x"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);
                        });

                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm" >
                                            <i class="fas fa-edit"></i>

                                        </button>
                                    </td>
                                </tr>
                            `);
                        });

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function eliminarCuracion(id) {
            swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no podrás recuperar este registro!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('eliminar_curacion') }}",
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id,
                                "id_paciente": $('#id_paciente').val()
                            },
                            success: function(data) {

                                // convertir json a objeto
                                var obj = JSON.parse(data);
                                var curaciones = obj.curaciones;
                                $('#tabla_curaciones_servicio tbody').empty();
                                $('#tabla_curaciones_procedimientos tbody').empty();
                                curaciones.forEach(curacion => {
                                    let datos = curacion.datos_curacion;
                                    $('#tabla_curaciones_servicio tbody').append(`
                                    <tr>
                                        <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                        <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle">
                                            <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                                <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                                Insumos
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                `);
                                    $('#tabla_curaciones_procedimientos tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap hidden" hidden="hidden">${curacion.id}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${curacion.id}" name="ind_vig_sig${curacion.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                `);
                                });

                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    }
                });

        }

        function enviar_medicamento_faltante_sdi() {
            var med_faltante = $.trim($('#med_faltante').val());
            var med_droga = $.trim($('#manual_nombre_composicion_farmaco').val());

            if (med_faltante != '') {
                /** registro */
                let url = "{{ route('medicamentoFaltante.registro') }}";


                var _token = CSRF_TOKEN;
                var id_profesional = $('#id_profesional').val();

                $.ajax({

                        url: url,
                        type: "POST",
                        data: {
                            _token: _token,
                            id_profesional: id_profesional,
                            nombre: med_faltante,
                            droga: med_droga,
                        },
                    })
                    .done(function(data) {

                        if (data !== 'null') {
                            //data = JSON.parse(data);
                            console.log('-----------------------');
                            console.log(data);
                            console.log('-----------------------');
                            if (data.estado == 1) {
                                swal({
                                    title: "Medicamento/Dispositivo Faltante enviado.\n Proximamente se agregará el Medicamento/Dispositivo Faltante en los registros",
                                    icon: "success",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                                $('#med_faltante').val('');
                                $('#no_existe_switch').prop("checked", false);
                                $('#no_existe').hide();

                            } else {

                                swal({
                                    title: "Problema al Enviar solicitud.",
                                    icon: "warning",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                })
                            }
                        }
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });

            } else {
                swal({
                    title: "Debe Indicar el nombre del Medicamento/Dispositivo Faltante.",
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        }

        function validar_via_administracion_manual_sdi() {
            if ($('#manual_via_administracion_ficha_dental').val() == 11) {
                $('#div_manual_observaciones_via_administracion_ficha_dental').show();
                $('#manual_observaciones_via_administracion_ficha_dental').removeAttr('disabled');
            } else {
                $('#div_manual_observaciones_via_administracion_ficha_dental').hide();
                $('#manual_observaciones_via_administracion_ficha_dental').attr('disabled', 'disabled');
                $('#manual_observaciones_via_administracion_ficha_dental').val('');
            }
        }

        function agregarMedicamentoManualReceta(parametros, receta_am) {

            let url = "{{ route('detalle_receta.registro_manual_receta') }}";
            let id_paciente = $('#id_paciente').val();
            let selectedOption = $('#dosis_medicamento_ficha_dental option:selected');
            let dataId = selectedOption.data('id');
            var _token = CSRF_TOKEN;
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_ficha: $('#id_fc').val(),
                    id_tipo_control: parametros.id_tipo_control,
                    id_medicamento: parametros.id_medicamento,
                    nombre_medicamento_ficha_dental: parametros.nombre_medicamento_ficha_dental,
                    nombre_dosis_ficha_dental: parametros.dosis_medicamento_ficha_dental,
                    nombre_frecuencia_ficha_dental: parametros.frecuencia_medicamento_ficha_dental,
                    via_administracion: parametros.via_administracion_ficha_dental,
                    farmaco: parametros.farmaco,
                    observaciones: parametros.observaciones_medicamento_ficha_dental,
                    uso_cronico: parametros.medicamento_uso_cronico,
                    id_paciente: id_paciente,
                    receta_am: receta_am,
                },
                success: function(resp) {
                    console.log(resp);
                    let mensaje = resp.status;
                    if (mensaje == 'success') {
                        let medicamentos = resp.data;
                        $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                        $('#tbody_tabla_medicamento_manual').empty();
                        $('#tabla_tratamientos_servicio tbody').empty();
                        medicamentos.forEach(medicamento => {
                            console.log(medicamento);
                            if (medicamento.id_dosis == null) {
                                medicamento.dosis = medicamento.nombre_dosis;
                            }

                            if (medicamento.id_frecuencia == null || medicamento.id_frecuencia == 0 ||
                                medicamento.id_frecuencia == 1000) {
                                medicamento.indicaciones = medicamento.nombre_frecuencia;
                            }
                            let fila = `<tr id="row${medicamento.id}">
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                            <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="feather icon-x"></i></div></td>
                                        </tr>`;

                            let fila_ = `<tr id="row${medicamento.id}">
                                            <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                            <td><input type="text" disabled></td>
                                            <td class="p-0">
                                                <div class="switch switch-success d-inline">
                                                    <input type="checkbox" id="tratamiento_listo${medicamento.id}" disabled>
                                                    <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                                </div><br>
                                                <label>Pendiente</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                            </td>
                                            <td> <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarObservaciones" onclick="dame_tratamiento(${medicamento.id})"><i class="fas fa-edit"> </i></button></td>
                                        </tr>`;
                            $('#tbody_tabla_medicamento_cirugia_sdi').append(fila);
                            $('#tbody_tabla_medicamento_manual').append(fila);
                            $('#tabla_tratamientos_servicio tbody').append(fila_);
                        });
                        swal({
                            title: "Medicamento Agregado",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            })
        }


        function mostrar_nueva_pieza_ex_radio_end(counter) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_rx_end') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    tipo_examen: 'endo',
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#nueva_pieza_end').empty();
                    $('#nueva_pieza_end').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


        function ocultar_pieza_imagenes_rx() {
            $('#contenedor_nueva_imagen_dent').empty();
        }

        function ocultar_pieza_imagenes_rx_estudio() {
            $('#contenedor_nueva_imagen_dent_estudio').empty();
        }

        function eliminar_pieza_dental_rx(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar este examen?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmar_eliminar_pieza_dental_rx(id);
                }
            })
        }

        function editar_pieza_dental_rx(id) {
            // abrir_modal
            $('#modal_agregar_imagenes_dental_paciente').modal('show');
        }


        function confirmar_eliminar_pieza_dental_rx(id) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_rx') }}";
            let id_paciente = $('#id_paciente_fc').val();

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: CSRF_TOKEN
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#pieza_dentalrx').empty();
                        $('#pieza_dentalrx').append(resp.v);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function amplificar_imagen(path) {
            // abrir modal
            $('#modal_imagen_dental_rx').modal('show');
            $('.zoom-container').on('mousemove', function(e) {
                const $img = $(this).find('img');
                const offsetX = e.offsetX; // Posición X del mouse dentro del contenedor
                const offsetY = e.offsetY; // Posición Y del mouse dentro del contenedor
                const width = $(this).width();
                const height = $(this).height();
                const xPercent = (offsetX / width) * 100; // Porcentaje X
                const yPercent = (offsetY / height) * 100; // Porcentaje Y

                $img.css('transform-origin', `${xPercent}% ${yPercent}%`); // Ajusta el origen de transformación
            });
            $('#imagen_paciente_rx').attr('src', "{{ asset('storage') }}" + "/" + path);
        }

        function eliminar_rx(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar esta RX?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmarEliminarImagenRx(id);
                }
            })
        }

        function confirmarEliminarImagenRx(id) {
            let url = "{{ ROUTE('profesional.eliminar_imagen_rx_paciente') }}";
            let data = {
                _token: CSRF_TOKEN,
                id: id,
                id_paciente: $('#id_paciente_fc').val()
            }

            $.ajax({
                type: 'post',
                data: data,
                url: url,
                success: function(resp) {
                    if (resp.mensaje == 'OK') {
                        $('#pieza_dentalrx').empty();
                        $('#pieza_dentalrx').append(resp.v);
                    } else {
                        $('#pieza_dentalrx').empty();
                        $('#pieza_dentalrx').append(resp.mensaje);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function eliminar_imagen_dental(id, path) {
            swal({
                    title: 'Advertencia',
                    text: '¿Está seguro de eliminar esta imagen?',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Aceptar'],
                    dangerMode: true,
                    confirmButtonText: 'Sí, eliminarlo!',
                    cancelButtonText: 'Cancelar',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    closeOnConfirm: false,
                    closeOnCancel: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',

                })
                .then((confirm) => {
                    if (confirm) {
                        confirmar_eliminar_imagen_dental(id, path);
                    } else {
                        swal('Cancelado', 'La imagen no fue eliminada :(', 'error');
                    }
                });

        }

        function confirmar_eliminar_imagen_dental(id, path) {
            let url = "{{ route('profesional.eliminar_imagen_dental_paciente') }}";
            let data = {
                _token: CSRF_TOKEN,
                id: id,
                path: path,
                id_paciente: $('#id_paciente_fc').val()
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#contenedor_imagenes_dent').empty();
                        $('#contenedor_imagenes_dent').append(resp.v);
                    } else {
                        // $('#contenedor_imagenes_dent').empty();
                        // $('#contenedor_imagenes_dent').append(resp.mensaje);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function eliminar_pieza_dental_imagenes(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar esta información?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmar_eliminar_pieza_dental_imagenes(id);
                }
            })
        }

        function confirmar_eliminar_pieza_dental_imagenes(id) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_imagenes_paciente') }}";
            let id_paciente = $('#id_paciente_fc').val();

            let data = {
                _token: CSRF_TOKEN,
                id_paciente: id_paciente,
                id: id
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#contenedor_imagenes_dent').empty();
                        $('#contenedor_imagenes_dent').append(resp.v);
                        swal({
                            title: 'Exito',
                            text: 'Se ha guardado con exito',
                            icon: 'success'
                        })
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function mostrar_pieza_dental_examen(count) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen') }}";
            let data = {
                count: count,
                id_paciente: $('#id_paciente_fc').val(),
                id_profesional: $('#id_profesional_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_ficha_atencion: $('#id_fc').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#contenedor_nueva_pieza_dental').empty();
                        $('#contenedor_nueva_pieza_dental').append(resp.v);

                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function mostrar_pieza_dental_examen_end(count) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen_end') }}";
            let data = {
                count: count,
                id_paciente: $('#id_paciente_fc').val(),
                tipo_examen: 'endo',
                _token: CSRF_TOKEN
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#nueva_pieza_dental_endo').empty();
                        $('#nueva_pieza_dental_endo').append(resp.v);

                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function mostrar_pieza_dental_examen_odontop(count) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen_odontop') }}";
            let data = {
                count: count,
                id_paciente: $('#id_paciente_fc').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#nueva_pieza_dental_odontop').empty();
                        $('#nueva_pieza_dental_odontop').append(resp.v);

                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function eliminar_pieza_dental_pieza(id, tipo) {
            swal({
                    title: 'Advertencia',
                    text: '¿Está seguro de eliminar esta pieza?',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Aceptar'],
                    dangerMode: true
                })
                .then((aceptar) => {
                    if (aceptar) {
                        confirmar_eliminar_pieza_dental_pieza(id, tipo);
                    }
                });
        }

        function confirmar_eliminar_pieza_dental_pieza(id, tipo) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_pieza') }}";
            let data = {
                _token: CSRF_TOKEN,
                id_paciente: $('#id_paciente_fc').val(),
                id: id,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                tipo: tipo
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        let examenes = resp.examenes;
                        if (tipo == 'gral') {
                            $('#contenedor_pieza_dental_endo_gral').empty();
                            $('#contenedor_pieza_dental_endo_gral').append(resp.v);

                            $('#planificacion_examenes_gral').empty();
                            examenes.forEach(examen => {
                                $('#planificacion_examenes_gral').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        `);
                            });
                        } else if (tipo == 'endo') {
                            $('#contenedor_pieza_dental_endo').empty();
                            $('#contenedor_pieza_dental_endo').append(resp.v);
                            $('#planificacion_examenes_endo').empty();
                            examenes.forEach(examen => {
                                $('#planificacion_examenes_endo').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        `);
                            });
                        } else {
                            $('#contenedor_pieza_dental_odontop_examen').empty();
                            $('#contenedor_pieza_dental_odontop_examen').append(resp.v);
                            $('#planificacion_examenes_odontop').empty();
                            examenes.forEach(examen => {
                                $('#planificacion_examenes_odontop').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                    <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                        <option selected="" value="1">Uniradicular</option>
                                        <option value="2">Biradicular</option>
                                        <option value="2">Triradicular</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                        <option selected="" value="1">Convenio</option>
                                        <option value="2">Sin Convenio</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        `);
                            });
                        }
                        swal({
                            title: 'Exito',
                            text: 'Se ha eliminado con éxito',
                            icon: 'success'
                        });

                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function eliminar_pieza_dental_rx_end(id) {
            swal({
                    title: 'Advertencia',
                    text: '¿Está seguro de eliminar este RX?',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Aceptar'],
                    dangerMode: true
                })
                .then((aceptar) => {
                    if (aceptar) {
                        confirmar_eliminar_pieza_dental_rx_end(id);
                    } else {
                        Swal.fire('Cancelado', 'El RX no fue eliminado :(', 'error');
                    }
                });
        }

        function confirmar_eliminar_pieza_dental_rx_end(id) {
            let url = "{{ route('profesional.eliminar_pieza_dental_rx_end') }}";
            let data = {
                _token: CSRF_TOKEN,
                id_paciente: $('#id_paciente_fc').val(),
                id: id
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#contenedor_pieza_dental_endorx_endo').empty();
                        $('#contenedor_pieza_dental_endorx_endo').append(resp.v);
                        swal({
                            title: 'Exito',
                            text: 'Se ha eliminado con éxito',
                            icon: 'success'
                        })
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }


        function eliminar_rx_end(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar esta RX?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmarEliminarImagenRxEnd(id);
                }
            })
        }

        function confirmarEliminarImagenRxEnd(id) {
            let url = "{{ ROUTE('profesional.eliminar_imagen_rx_end_paciente') }}";
            let data = {
                _token: CSRF_TOKEN,
                id: id,
                id_paciente: $('#id_paciente_fc').val()
            }

            $.ajax({
                type: 'post',
                data: data,
                url: url,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#contenedor_pieza_dental_endorx_endo').empty();
                        $('#contenedor_pieza_dental_endorx_endo').append(resp.v);
                    } else {
                        $('#contenedor_pieza_dental_endorx_endo').empty();
                        $('#contenedor_pieza_dental_endorx_endo').append(resp.mensaje);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function eliminarExamenAgregadoRxOdontop(id) {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de eliminar este examen?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmarEliminarExamenAgregadoRxOdontop(id);
                }
            })
        }

        function confirmarEliminarExamenAgregadoRxOdontop(id) {
            let url = "{{ route('profesional.eliminar_nueva_pieza_dental_rx_odontop') }}";
            var idPaciente = $('#id_paciente_fc').val();
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id: id,
                    id_paciente: idPaciente,
                    tipo_examen: 'odontop',
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    let mensaje = resp.mensaje;
                    let vista = resp.v;
                    if (mensaje == 'OK') {
                        swal({
                            title: 'Éxito',
                            text: 'Evolución eliminada correctamente',
                            icon: 'success',
                            button: 'Aceptar'
                        });
                        $('#contenedor_pieza_dental_odontop').empty();
                        $('#contenedor_pieza_dental_odontop').append(vista);
                    } else {
                        swal({
                            title: 'Error',
                            text: 'mensaje',
                            icon: 'error',
                            button: 'Aceptar'
                        })
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function mostrar_nueva_pieza_oral_rx_odontop(count) {
            let url = "{{ route('profesional.mostrar_nueva_pieza_dental_rx_end') }}";
            let odontop_numero_pieza = $('#odontop_numero_pieza_' + count).val();
            let odontop_rx_esp_peri_apical = $('#odontop_rx_esp_peri_apical_' + count).val();
            let odontop_h_apical = $('#odontop_h_apical' + count).val();
            let odontop_obs_ex_oral = $('#odontop_obs_ex_oral_' + count).val();
            let data = {
                numero_pieza: odontop_numero_pieza,
                odontop_rx_esp_peri_apical: odontop_rx_esp_peri_apical,
                odontop_h_apical: odontop_h_apical,
                odontop_obs_ex_oral: odontop_obs_ex_oral,
                count: count,
                id_paciente: $('#id_paciente_fc').val(),
                tipo_examen: 'odontop',
                _token: '{{ csrf_token() }}'
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#nueva_pieza_dental_odontop_').empty();
                        $('#nueva_pieza_dental_odontop_').append(resp.v);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function mostrar_pieza_dental_examen_odontop_(count) {
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen_end') }}";
            let data = {
                count: count,
                id_paciente: $('#id_paciente_fc').val(),
                tipo_examen: 'odontop',
                _token: CSRF_TOKEN
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        $('#nueva_pieza_dental_odontop_examen').empty();
                        $('#nueva_pieza_dental_odontop_examen').append(resp.v);

                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function pedir_autorizacion_presupuesto_dental() {
            swal({
                title: 'Advertencia',
                text: '¿Está seguro de solicitar la autorización del presupuesto?',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true
            }).then((aceptar) => {
                if (aceptar) {
                    confirmar_pedir_autorizacion_presupuesto_dental();
                }
            })
        }

        function confirmar_pedir_autorizacion_presupuesto_dental() {
            $('#modal_autorizacion_presupuesto').modal('show');
            $('#modal_autorizacion_imagen').html('');
            $('#modal_autorizacion_mensaje').html('');
            $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
        }

        function cerrar_autorizacion_presupuesto() {
            $('#modal_autorizacion_presupuesto').modal('hide');
        }

         function actualizar_presupuesto(){
            // Obtener valores del formulario

            const id_dcto = $('#tiene_dcto').val();

            // Crear objeto JSON con los datos del formulario
            const data = {
                _token: '{{ csrf_token() }}', // Token CSRF
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                id_dcto: id_dcto
            };

            $.ajax({
                type:'post',
                url: '{{ ROUTE("dental.actualizar_presupuesto") }}',
                data: data,
                success: function(response){
                    console.log('Éxito:', response);
                    if (response.estado == 1) {
                        let tiene_dcto = $('#tiene_dcto').val();
                        if(tiene_dcto != 0){
                            confirmar_aplicar_convenio_tratamiento(tiene_dcto);
                        }else{
                            let pagos = response.pagos;
                            let table = $('#table_pagos_presupuesto').DataTable();
                            let presupuesto = response.presupuesto;
                            $('#id_presupuesto').val(presupuesto.id);
                            // Limpiar la tabla antes de agregar nuevas filas
                            table.clear().draw();
                            pagos.forEach(function(pago) {
                                let rowNode = table.row.add([
                                    pago.fecha_pago,
                                    pago.metodo_pago,
                                    formatoMoneda(pago.total),
                                    `<td>
                                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-search"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_pago_dental(${pago.id})"><i class="feather icon-x"></i></button>
                                    </td>`
                                ]).draw(false).node();

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            });
                            let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table_piezas_odontograma.clear().draw();

                            let odontograma = response.odontograma;

                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {

                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }

                                    if (odonto.estado == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_piezas_odontograma.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle ' + clase + '"></div>',
                                        estado, // Columna vacía

                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }
                            });

                            let insumos = response.insumos;
                            console.log(insumos);
                            let table_insumos = $('#table_insumos_preimplante').DataTable();

                            //Limpiar la tabla sin perder la configuración de DataTables
                            table_insumos.clear();

                            //Recorrer el array de insumos y agregarlos a la tabla
                            insumos.forEach(insumo => {
                                let total = insumo.cantidad * insumo.valor;
                                if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                            // Botones de acción
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                                <i class="feather icon-shopping-cart"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="editar_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>`;
                                }else{
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="editar_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>`;
                                }

                                table_insumos.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca, // Nombre del insumo
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    insumo.valor, // Unidad de medida
                                    total,
                                    botones
                                ]);
                            });
                            let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                            table_insumos_pagos.clear();
                            console.log(insumos);
                            insumos.forEach(insumo => {
                                let total = insumo.cantidad * insumo.valor;
                                if (insumo.presupuesto == 1 && insumo.urgencia == 0) {
                                    if (insumo.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (insumo.estado_pago == 'intermedio') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    let rowNode = table_insumos_pagos.row.add([
                                        insumo.insumos + ' ' + insumo.nombre_marca,
                                        insumo.observaciones,
                                        insumo.cantidad, // Nombre del insumo
                                        formatoMoneda(insumo.valor), // Cantidad utilizada
                                        0, // Unidad de medida
                                        formatoMoneda(total),
                                        ' <div class="circle ' + clase + '"></div>',

                                    ]).draw(false).node();

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }

                            });
                            table_insumos_pagos.draw();
                            $('#montoAbonado').val(formatoMoneda(parseInt(response.suma_pagado)));
                            $('#valores_abonado_presupuesto').html(formatoMoneda(parseInt(response.suma_pagado)));
                            $('#valores_total_abonado_presupuesto_conf').html(formatoMoneda(parseInt(response
                                .suma_pagado)));
                            $('#total_abonado_presupuesto').val(parseInt(response.suma_pagado));
                            $('#total_adeudado_presupuesto').val(parseInt(response.suma_adeudado));
                            $('#valores_laboratorio').html(formatoMoneda(parseInt(response.total_lab)));
                            $('#valores_laboratorio_conf').html(formatoMoneda(parseInt(response.total_lab)));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(parseInt(response.suma_adeudado)));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(parseInt(response.suma_adeudado)));
                            $('#abonos_presup').val(formatoMoneda(response.suma_pagado));
                            $('#subtotal_presup').val(formatoMoneda(response.suma_adeudado));
                            $('#subtotal_lab').val(formatoMoneda(response.total_lab));
                            $('#descuento_lab').val(0);
                            let total = parseInt(response.suma_presupuesto) +  parseInt(response.total_lab);
                            $('#total_presupuesto').val(formatoMoneda(total));
                            $('#total_presupuesto_dental').val(total);
                            let todos = response.todos;

                            let table_ = $('#presup_estado_pago_gral').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table_.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            todos.forEach(function(odonto) {

                                if (odonto.presupuesto == 1) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    if (odonto.atendido == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_.row.add([
                                        odonto.localizacion,
                                        odonto.diagnostico_tratamiento,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(odonto.valor),
                                        ' <div class="circle ' + clase + '"></div>',
                                        estado
                                    ]).draw(false).node();

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }

                            });
                        }

                    } else {
                        console.log('Error:', response.mensaje);
                    }
                },
                error: function(error){
                    console.log(error);
                }
            })
        }



        /** MENSAJE*/
        /** CARGAR mensaje */
        $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio los demás datos se cargan solos. ');
        $('#mensaje_ficha').show();
        setTimeout(function() {
            $('#mensaje_ficha').hide();
        }, 6000);
        @if ($fichas->count() > 0)
            $('#mensaje_historias').html(' El paciente posee historia medica previa. ');
        @else
            $('#mensaje_historias').html(' Primera consulta del paciente. ');
        @endif
        $('#mensaje_historias').show();
        setTimeout(function() {
            $('#mensaje_historias').hide();
        }, 6000);


        function guardarCambiosTratamiento(){
            let id_tratamiento = $('#id_tratamiento').val();

            if(id_tratamiento == 0){
                swal({
                    title: "Error",
                    text: "Debe seleccionar un tratamiento",
                    icon: "error",
                    button: "Aceptar",
                });
                return;
            }

            let estado = $('#estado_tto').val();
            let data = {
                id_tratamiento: id_tratamiento,
                estado: estado,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_profesional: $('#id_profesional').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                observaciones: $('#observaciones_tto').val(),
                _token: CSRF_TOKEN
            }

            console.log(data);

            let url = "{{ route('dental.guardarCambiosTratamientoUrgencia') }}";
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if(resp.mensaje == 'OK'){
                        swal({
                            title: "Pieza guardada",
                            text: "Pieza guardada correctamente",
                            icon: "success",
                            button: "Aceptar",
                        });
                    }

                    $('#modal_cambio_estado_tto').modal('hide');

                    let odontograma = resp.odontograma;
                    odontograma_global = resp.odontograma;

                    let table = $('#presup_estado_pago').DataTable();
                    // Limpiar la tabla antes de agregar nuevas filas
                    table.clear().draw();

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {

                        if (odonto.urgencia == 0) {
                            if(odonto.estado_pago == 'ok'){
                                var clase = 'bg-success';
                            }else if(odonto.estado_pago == 'incompleto'){
                                var clase = 'bg-warning';
                            }else{
                                var clase = 'bg-danger';
                            }

                            if(odonto.estado == 0){
                                var estado = 'PENDIENTE';
                            }else if(odonto.estado == 1){
                                var estado = 'TERMINADO';
                            }else if(odonto.estado == 2){
                                var estado = 'EN PROCESO';
                            }else{
                                var estado = 'CITADO A CONTROL';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table.row.add([
                                odonto.descripcion,
                                odonto.pieza,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                '<div class="circle '+clase+'"></div>',
                                estado, // Columna vacía

                            ]).draw(false).node(); // Obtener el nodo de la fila

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }
                    });

                    let table_urg = $('#table_piezas_presupuesto_odonto').DataTable();
                    table_urg.clear().draw();

                    odontograma.forEach(function(pieza) {
                            if(pieza.estado == 0){
                                var estado = 'PENDIENTE';
                            }else if(pieza.estado == 1){
                                var estado = 'TERMINADO';
                            }else if(pieza.estado == 2){
                                var estado = 'EN PROCESO';
                            }else{
                                var estado = 'CITADO A CONTROL';
                            }
                            if (pieza.presupuesto == 1 && pieza.urgencia == 0) {
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_urg.row.add([
                                    pieza.pieza,
                                    pieza.diagnostico,
                                    pieza.descripcion,
                                    formatoMoneda(formatoMoneda(pieza.valor)),
                                    '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                    pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                    '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza(' +
                                    pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                    estado

                                ]).draw(false).node(); // Obtener el nodo de la fila
                            }
                    });
                    dame_evoluciones_od_gral();
                }
            });
        }

        function proxima_atencion_paciente(){
            let id_ficha_atencion = $('#id_fc').val();
            let id_paciente = $('#id_paciente').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_profesional = $('#id_profesional_fc').val();
            let id_hora_medica = $('#hora_medica').val();

            let url = "{{ ROUTE('dental.proxima_atencion_paciente')}}";

            let data = {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
                id_hora_medica: id_hora_medica,
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    if(response.estado == 'ok'){
                        let fecha = response.fecha_atencion;
                        $('#proxima_fecha_atencion').html(fecha.fecha_consulta);
                        $('#proxima_hora_atencion').html(fecha.hora_inicio+' a '+fecha.hora_termino);
                        $('#proxima_fecha_atencion_od_gral').html(fecha.fecha_consulta);
                        $('#proxima_hora_atencion_od_gral').html(fecha.hora_inicio+' a '+fecha.hora_termino);
                    }else{
                        $('#proxima_fecha_atencion').html('');
                        $('#proxima_hora_atencion').html('');
                        $('#proxima_fecha_atencion_od_gral').html('');
                        $('#proxima_hora_atencion_od_gral').html('');
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    </script>
@endsection
