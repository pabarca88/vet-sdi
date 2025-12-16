<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_dent_endo_tab" data-toggle="tab" href="#atencion_dent_endo" role="tab" aria-controls="atencion_dent_endo" aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="odonto_adulto_tab" data-toggle="tab" href="#odonto_adulto" role="tab" aria-controls="odonto_adulto" aria-selected="false">Odontograma</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="eval_periimpl_tab" data-toggle="tab" href="#eval_periimpl" role="tab" aria-controls="eval_periimpl" aria-selected="false">Evaluación-Periodoncica</a>
                    </li>
                    {{-- <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="evaluacion_general_tab" data-toggle="tab" href="#evaluacion_general" role="tab" aria-controls="evaluacion_general" aria-selected="false">Evaluación</a>
                    </li> --}}
                    {{--  <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tratamiento_tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento/Presupuesto</a>
                    </li>  --}}
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="presupuesto_tab" data-toggle="tab" href="#presupuesto" role="tab" aria-controls="presupuesto" aria-selected="false">Presupuesto</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row mb-1">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="alert-atencion alert alert-success-b alert-dismissible fade show"  role="alert" id="mensaje_historias"></div>
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
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_especialidad" id="id_especialidad" value="{{ $profesional->id_especialidad }}">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                    <input type="hidden" name="tipo_examen_especial" id="tipo_examen_especial" value="{{ $lista_examen_especial }}">
                    <input type="hidden" name="ficha_id_atencion_dental_odon" id="ficha_id_atencion_dental_odon" value="{{ $id_ficha_atencion }}">
                    <input type="hidden" name="ficha_id_lugar_atencion" id="ficha_id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="id_presupuesto" id="id_presupuesto" value="{{ isset($presupuesto) ? $presupuesto->id : '' }}">
                    <input type="hidden" name="id_tratamiento_urgencia" id="id_tratamiento_urgencia" value="" />
                    <input type="hidden" name="id_tratamiento" id="id_tratamiento" value="" />
                    @csrf
                    <div class="tab-content" id="od_endo-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_dent_endo" role="tabpanel" aria-labelledby="atencion_dent_endo_tab">
                            <!--FORMULARIOS-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                <!--Formulario / Menor de edad-->
                                @include('general.secciones_ficha.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                            </div>
                        <!--Motivo consulta-->
                          @include('atencion_odontologica.generales.motivo_consulta')

                            <!--EXAMEN ODONT GENERAL - PARAMETROS DE CONTROL-->
                            {{-- @include('atencion_odontologica.generales.odonto_gral') --}}
@include('atencion_odontologica.generales.control_urgencias')
                            @include('atencion_odontologica.generales.includes.endodoncia')
                            {{-- <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="hospitalizar_paciente">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#hospitalizar_paciente-c" aria-expanded="false" aria-controls="hospitalizar_paciente-c">
                                            Hospitalizar Paciente
                                        </button>
                                    </div>
                                    <div id="hospitalizar_paciente-c" class="collapse" aria-labelledby="hospitalizar_paciente" data-parent="#hospitalizar_paciente">
                                        <div class="card-body-aten-a shadow-none">
                                            @include('general.hospitalizacion.hospitalizar')
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            @include('general.secciones_ficha.diagnostico')



                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-info-light-c mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                        <input type="submit" class="btn btn-success-light-c mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                    </div>
                                </div>
                            </div>
                            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        </div>
                        <!-- ODONTOGRAMA-->
                        <div class="tab-pane fade" id="odonto_adulto" role="tabpanel" aria-labelledby="odonto_adulto-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="odon_adults_tab" data-toggle="tab" href="#odon_adults" role="tab" aria-controls="odon_adults" aria-selected="true">Odontograma Adulto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="odon_infts_tab" data-toggle="tab" href="#odon_infts" role="tab" aria-controls="odon_infts" aria-selected="false">Odontograma Infantil</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="gral_od_adulto">
                                                            <!-ADULTO-->
                                                            <div class="tab-pane fade active show " id="odon_adults" role="tabpanel" aria-labelledby="odon_adults_tab">
                                                                @include('atencion_odontologica.generales.odontograma_adulto')
                                                            </div>
                                                            <!-NIÑOS-->
                                                            <div class="tab-pane fade" id="odon_infts" role="tabpanel" aria-labelledby="odon_infts_tab">
                                                                @include('atencion_odontologica.generales.odontograma_infantil')
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
                        <!--CIERRE: ODONTOGRAMA--->
                        <!-- EVALUACION PERIODONCICA -->
                        <!-- PERIIMPLANTE -->
                         <!-- PERIIMPLANTE -->
                        <div class="tab-pane fade" id="eval_periimpl" role="tabpanel" aria-labelledby="eval_periimpl_tab">
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
                                            <div class="tab-pane fade active show " id="eval_18" role="tabpanel" aria-labelledby="eval_18_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="eval_17" role="tabpanel" aria-labelledby="eval_17_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="eval_16" role="tabpanel" aria-labelledby="eval_16_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_15" role="tabpanel" aria-labelledby="eval_15_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_14" role="tabpanel" aria-labelledby="eval_14_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_13" role="tabpanel" aria-labelledby="eval_13_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_12" role="tabpanel" aria-labelledby="eval_12_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_11" role="tabpanel" aria-labelledby="eval_11_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_21" role="tabpanel" aria-labelledby="eval_21_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_22" role="tabpanel" aria-labelledby="eval_22_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_23" role="tabpanel" aria-labelledby="eval_23_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_24" role="tabpanel" aria-labelledby="eval_24_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_25" role="tabpanel" aria-labelledby="eval_25_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_26" role="tabpanel" aria-labelledby="eval_26_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_27" role="tabpanel" aria-labelledby="eval_27_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_28" role="tabpanel" aria-labelledby="eval_28_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--ARCADA INFERIOR-->
                                            <div class="tab-pane fade  show " id="eval_48" role="tabpanel" aria-labelledby="eval_48_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_47" role="tabpanel" aria-labelledby="eval_47_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_46" role="tabpanel" aria-labelledby="eval_46_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_45" role="tabpanel" aria-labelledby="eval_45_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_44" role="tabpanel" aria-labelledby="eval_44_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_43" role="tabpanel" aria-labelledby="eval_43_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_42" role="tabpanel" aria-labelledby="eval_42_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_41" role="tabpanel" aria-labelledby="eval_41_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_31" role="tabpanel" aria-labelledby="eval_31_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_32" role="tabpanel" aria-labelledby="eval_32_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_33" role="tabpanel" aria-labelledby="eval_33_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade  show " id="eval_34" role="tabpanel" aria-labelledby="eval_34_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_35" role="tabpanel" aria-labelledby="eval_35_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_36" role="tabpanel" aria-labelledby="eval_36_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_37" role="tabpanel" aria-labelledby="eval_37_tab">
                                               <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_38" role="tabpanel" aria-labelledby="eval_38_tab">
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
                        <!-- CIERRE PERIIMPLANTE -->
                        <!-- EVALUACION PERIODONCICA -->
                        <!-- EVALUAION-->
                        {{-- <div class="tab-pane fade" id="evaluacion_general" role="tabpanel" aria-labelledby="evaluacion_general_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="eval_adults_tab" data-toggle="tab" href="#eval_adults" role="tab" aria-controls="eval_adults" aria-selected="true">Adulto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_infts_tab" data-toggle="tab" href="#eval_infts" role="tab" aria-controls="eval_infts" aria-selected="false">Evaluación  Infantil</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="gral_od_adulto">
                                                            <!-ADULTO-->
                                                            <div class="tab-pane fade active show " id="eval_adults" role="tabpanel" aria-labelledby="eval_adults_tab">
                                                                @include('atencion_odontologica.generales.evaluacion_adulto')
                                                            </div>
                                                            <!-NIÑOS-->
                                                            <div class="tab-pane fade" id="eval_infts" role="tabpanel" aria-labelledby="eval_infts_tab">
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
                        </div> --}}
                        <!--CIERRE: EVALUACION--->
                        <!-- TRATAMIENTO-->
                        <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento_tab">
                           @include('atencion_odontologica.generales.tratamiento_presup')
                        </div>
                        <!--CIERRE: TRATAMIENTO--->
                        <!--CIERRE: PRESUPUESTO--->
                        <div class="tab-pane fade" id="presupuesto" role="tabpanel" aria-labelledby="presupuesto_tab">
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

@include('atencion_odontologica.modals.infantil.tratamiento_boca_completainf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_inferiorinf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_superiorinf')
@include('atencion_odontologica.modals.atencion_general.formularios_generales.m_info_lab')
@include('atencion_odontologica.modals.odontograma.modal_insumos')
@include('atencion_odontologica.modals.odontograma.modal_insumos_editar')
@include('atencion_odontologica.modals.odontograma.modal_insumos_urgencias')
@include("general.reserva_hora.modal.tomar_hora_dental")
@section('page-script-ficha-atencion')

<script>
    function abrir_modal_insumos(){
        $('#modal_insumos').modal('show');
    }
    function dame_marcas_implantes(value){
        let id_tipo_insumo = value.value;
        let tipo_insumo_text = value.options[value.selectedIndex].text;
        console.log(tipo_insumo_text);
        $('#titulo_tipo_insumo').html(tipo_insumo_text);
        if(id_tipo_insumo == 1){
            // quitar la clase d-none al select de marcas
            $('#marcas_implantes_select').removeClass('d-none');
            $('#insumos_select').addClass('d-none');
        }else{
            // quitar la clase d-none al select de marcas
            $('#marcas_implantes_select').addClass('d-none');
            $('#insumos_select').removeClass('d-none');
        }
        let url = '{{ ROUTE("dental.dame_implantes_dental") }}';
        let data = {
            id_tipo_insumo: id_tipo_insumo,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                $('#nombreInsumo').empty();
                let insumos = resp;
                insumos.forEach(e => {
                    $('#nombreInsumo').append(`
                    <option value="${e.id}"> ${e.descripcion} </option>
                    `);
                });
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
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
            beforeSend: function(){
                swal({
                    title: "Cargando...",
                    text: "Por favor, espere mientras se procesa su solicitud.",
                    icon: "info",
                    buttons: false,
                    closeOnClickOutside: false
                });
            },
            success: function(response) {
                swal.close();
                console.log(response);
                if(response.estado == 'ok'){
                    let fecha = response.fecha_atencion;
                    $('#proxima_fecha_atencion').html(fecha.fecha_consulta);
                    $('#proxima_hora_atencion').html(fecha.hora_inicio+' a '+fecha.hora_termino);
                    $('#proxima_fecha_atencion_impl').html(fecha.fecha_consulta);
                    $('#proxima_hora_atencion_impl').html(fecha.hora_inicio+' a '+fecha.hora_termino);
                    $('#observaciones_hora_dental').html(fecha.observaciones);
                }else{
                    $('#proxima_fecha_atencion').html('');
                    $('#proxima_hora_atencion').html('');
                    $('#proxima_fecha_atencion_impl').html('');
                    $('#proxima_hora_atencion_impl').html('');
                    $('#observaciones_hora_dental').html('');
                }

            },
            error: function(error) {
                swal.close();
                console.log(error);
            }
        });
    }

    function agregar_cirujano_impl(){
        $('#div_nuevo_cirujano_impl').removeClass('d-none');
        $('#div_nuevo_cirujano_impl').addClass('d-block');
    }

    function agregar_cirujano_impl_man(){
        $('#div_nuevo_cirujano_impl_man').removeClass('d-none');
        $('#div_nuevo_cirujano_impl_man').addClass('d-block');
    }

    function ocultar_cirujano_impl(){
        $('#div_nuevo_cirujano_impl').addClass('d-none');
        $('#div_nuevo_cirujano_impl').removeClass('d-block');
    }

    function guardar_insumo(){
        let nombreInsumo = $('#nombreInsumo option:selected').text();
        let tipoInsumo = $('#tipoInsumo').val();
        if(tipoInsumo == 1){
            var marcaInsumo = $('#marcasImplantes option:selected').text();
        }else{
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

        if(nombreInsumo == ''){
            valido = 0;
            mensaje += '<li>Nombre insumo </li>';
        }
        if(tipoInsumo == 0){
            valido = 0;
            mensaje += '<li>Tipo de Insumo </li>';
        }
        if(cantidad == '' || cantidad <= 0){
            valido = 0;
            mensaje += '<li>Cantidad </li>';
        }
        if(precio == '' || cantidad <= 0){
            valido = 0;
            mensaje += '<li>Precio </li>';
        }

        if(valido == 1){
            let data = {
                insumos: nombreInsumo,
                idTipoInsumo: tipoInsumo,
                tipoInsumo: tipoInsumo_text,
                marcaInsumo: marcaInsumo,
                idMarcaInsumo: idMarcaInsumo,
                cantidad: cantidad,
                valor: precio,
                total: total,
                id_paciente: $('#id_paciente').val(),
                id_ficha_atencion: $('#id_fc').val(),
                observaciones: $('#insumos_obs_tto').val(),
                _token: CSRF_TOKEN
            }

            console.log(data);
            let url = '{{ ROUTE("dental.agregar_insumos_tto") }}';
            $.ajax({
                url: url,
                type:'post',
                data: data,
                success: function(resp){
                    console.log(resp);
                    if(resp.mensaje == 'ok'){
                        swal({
                            icon:'success',
                            text:'Se a agregado los insumos correctamente',
                            title:'Exito'
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
                            if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                    // Botones de acción
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            }else{
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            }
                            table.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                                insumo.observaciones,
                                insumo.cantidad,       // Cantidad utilizada
                                formatoMoneda(insumo.valor),         // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                        });
                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();

                        let table_endo = $('#table_insumos_endodoncia').DataTable();
                        //Limpiar la tabla sin perder la configuración de DataTables
                        table_endo.clear();
                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                                                 // Botones de acción
                            if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                    // Botones de acción
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            }else{
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            }
                            if(insumo.urgencia == 0){
                                table_endo.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                                    insumo.observaciones,
                                    insumo.cantidad,       // Cantidad utilizada
                                    formatoMoneda(insumo.valor),         // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                            }

                        });
                        //Dibujar la tabla nuevamente con los nuevos datos
                        table_endo.draw();
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }else{
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }



    }

    function eliminar_insumo(id){
        swal({
            title: "¿Esta seguro que desea ELIMINAR el insumo dental?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete){
                confirmar_eliminar_insumo(id);
            }
        });
    }

    function confirmar_eliminar_insumo(id){
        console.log(id);
        let data = {
            id: id,
            id_paciente: $('#id_paciente').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: CSRF_TOKEN
        }
        let url = '{{ ROUTE("dental.eliminar_insumos_tto") }}';
        $.ajax({
            url: url,
            type:'post',
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'ok'){
                    swal({
                        icon:'success',
                        text:'Se a eliminado insumos correctamente',
                        title:'Exito'
                    });
                    let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos;
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
                        $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));
                            $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));


                        let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_odon_gral').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();

                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                    // Botones de acción
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            }else{
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            }
                            table.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                                insumo.observaciones,
                                insumo.cantidad,       // Cantidad utilizada
                                formatoMoneda(insumo.valor),         // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();
                        let table_endo = $('#table_insumos_endodoncia').DataTable();
                        //Limpiar la tabla sin perder la configuración de DataTables
                        table_endo.clear();
                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                                                 // Botones de acción
                            if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                    // Botones de acción
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            }else{
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            }
                            if(insumo.urgencia == 0){
                                table_endo.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                                    insumo.observaciones,
                                    insumo.cantidad,       // Cantidad utilizada
                                    formatoMoneda(insumo.valor),         // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                            }

                        });
                        //Dibujar la tabla nuevamente con los nuevos datos
                        table_endo.draw();

                        $('#contenedor_insumos').empty();
                        insumos.forEach(insumo => {
                            if(insumo.presupuesto == 1 && insumo.urgencia == 0){
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
                            if(insumo.presupuesto == 1){
                                if(insumo.estado_pago == 'ok'){
                                    var clase = 'bg-success';
                                }else if(insumo.estado_pago == 'intermedio'){
                                    var clase = 'bg-warning';
                                }else{
                                    var clase = 'bg-danger';
                                }
                                let rowNode = table_insumos.row.add([
                                `${insumo.insumos} ${insumo.nombre_marca}`,
                                insumo.observaciones,
                                insumo.cantidad,         // Nombre del insumo
                                formatoMoneda(insumo.valor),       // Cantidad utilizada
                                0,         // Unidad de medida
                                formatoMoneda(total),
                                ' <div class="circle '+clase+'"></div>',
                                ''

                            ]).draw(false).node();
                             // Agregar clases a la fila
                             $(rowNode).addClass('text-center align-middle status-circle');
                            }

                        });

                        table_insumos.draw();

                        $('#table_pagos_reasignar_insumos tbody').empty();
                        insumos.forEach(insumo => {
                            if(insumo.presupuesto == 1){
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
            error: function(error){
                console.log(error);
            }
        });
    }

</script>
<script>

    /** MENSAJE*/
    /** CARGAR mensaje */
    $('#mensaje_ficha').html(' El campo dignóstico y la actualización del Odontograma son Obligatorio el resto es  opcional');
    $('#mensaje_ficha').show();
    setTimeout(function(){
        $('#mensaje_ficha').hide();
    }, 5000);
    document.addEventListener("DOMContentLoaded", function () {
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

        });
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
    $(document).ready(function() {

        mostrar_nueva_pieza_ex_radio_end(1000);
        mostrar_pieza_dental_examen_end(1000);
        mostrar_nueva_pieza_ex_radio(1000);
        mostrar_pieza_dental_examen(1000);
        mostrar_nueva_pieza_dental(1000);
        mostrar_nueva_pieza_dental_end(1000);
        $('#tabla_odontologico_tratamiento').DataTable({
            responsive: true,
        });
        $('#table_insumos_endodoncia').DataTable();
        $('#table_piezas_presupuesto_odonto').DataTable();
        $('#table_piezas_presupuesto_endo').DataTable();
        $('#paciente_piezas_dentales_ex').select2();
        $('#paciente_piezas_dentales_end_ex').select2();
        $('#paciente_piezas_dentales_end_ex_').select2();
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

        $('.prestacion-autocomplete').each(function() {
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
                    $('#valor_trabajo_menor').val(ui.item.valor);
                    $(this).next('input[type="hidden"]').val(ui.item.value); // Asigna el valor al input hidden correspondiente
                    return false;
                }
            });
        });
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

        const piezasSelect = $('#paciente_piezas_dentales_ex');

        // // Inicializar Select2
        // piezasSelect.select2();

        // Control de selección de piezas en el odontograma
        $('.pieza').on('click', function () {
            const piezaNumero = $(this).data('pieza').toString(); // Convertir a string por seguridad

            if ($(this).hasClass('seleccionada')) {
                // Si ya está seleccionada, deseleccionarla
                $(this).removeClass('seleccionada');
                const options = piezasSelect.val().filter(item => item !== piezaNumero); // Filtra el elemento a eliminar
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

        const piezasSelect_ = $('#paciente_piezas_dentales_end_ex_');

        // Control de selección de piezas en el odontograma
        $('.pieza_endodoncia').on('click', function () {
            const piezaNumero = $(this).data('pieza_end').toString(); // Convertir a string por seguridad

            if ($(this).hasClass('seleccionada')) {
                // Si ya está seleccionada, deseleccionarla
                $(this).removeClass('seleccionada');
                const options = piezasSelect_.val().filter(item => item !== piezaNumero); // Filtra el elemento a eliminar
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
    $(document).ready(function() {
        $('#tabla_odontologicos_pieza').DataTable({
        responsive: true,
    });
    });

    $(document).ready(function () {
        $('#tabla_aranceles').DataTable({
            responsive: true,
        });
    });
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
    $(document).ready(function() {

        /* formatear rut */
        $("#solicitado_por_rut_rfl").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });

        $('#descripcion_hipotesis').keyup(function(){
            if($.trim(this.value) != ''){
                $('.btn_agregar_medicamento').removeAttr("disabled");
                $('.btn_medicamento_pdf').removeAttr("disabled");
                $('.btn_agregar_examen').removeAttr("disabled");
                $('.btn_examenes_pdf').removeAttr("disabled");
            }
            else
            {
                $('.btn_agregar_medicamento').attr('disabled','disabled');
                $('.btn_medicamento_pdf').attr('disabled','disabled');
                $('.btn_agregar_examen').attr('disabled','disabled');
                $('.btn_examenes_pdf').attr('disabled','disabled');
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


    })

    /** MANEJO DE IMAGENES */
    var myDropzone ;
    Dropzone.options.misImagenes = {
        init:function()
        {
            myDropzone = this;
        },
        url: "{{ route('profesional.imagen.carga') }}",
        method: 'post',
        createImageThumbnails: true,
        addRemoveLinks: true,
        headers:{
            'X-CSRF-TOKEN' : CSRF_TOKEN,
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
        success: function(file, response){
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
                if (typeof message !== "string" && message.error)
                {
                    message = message.error;
                }
                else
                {
                    message = message.message;
                }
                for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
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
    function cargar_lista_imagenes()
    {
        // console.log('--------------cargar_lista_imagenes----------------------');
        lista_imagenes = [];
        let temp  = myDropzone.getAcceptedFiles();
        $.each(temp, function( index, value )
        {
            if(value.status == "success")
            {
                if(value.xhr !== undefined)
                {
                    var img_temp = JSON.parse(value.xhr.response);
                    lista_imagenes[index] = [
                        url=img_temp.img.url,
                        nombre_origian= img_temp.img.original_file_name,
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

    /** REGISTO ANTECEDENTES */
    function carga_campos_antecedente_nuevo()
    {
        if($('#tipo_antecedente').val()!='')
        {
            $('#div_campos_antecedente_nuevo').html('');
            var html = '';
            if($('#tipo_antecedente').val() == 'alergia')
            {
                html +='';

                html += '<div class="form-row">';
                html += '    <div class="form-group col-sm-6 col-md-6">';
                html += '        <label class="floating-label-activo-sm">Seleccione</label>';
                html += '        <input type="text" id="alergia_paciente" name="alergia_paciente" class="form-control form-control-sm"  value="">';
                html += '        <input type="hidden" name="id_alergia_paciente" id="id_alergia_paciente" value=""/>';
                html += '    </div>';
                html += '    <div class="form-group col-sm-6 col-md-6">';
                html += '        <label class="floating-label-activo-sm">Detalle</label>';
                html += '        <input type="text" name="alergia_comentario_paciente" id="alergia_comentario_paciente"  class="form-control form-control-sm"  value="">';
                html += '    </div>';
                html += '    <div class="form-group col-sm-6 col-md-6">';
                html += '       <button type="button" class="btn btn-success btn-sm" onclick="agregar_alergia_paciente();">Guardar</button>';
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
            if($('#tipo_antecedente').val() == 'enfermedades_cronicas')
            {
                html +='';
            }
            if($('#tipo_antecedente').val() == 'anestesias')
            {
                html +='';
            }
            if($('#tipo_antecedente').val() == 'cirugia')
            {
                html +='';
            }
        }
        else
        {
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

        if(alergia=="")
        {
            mensaje +='Campo requerido alergia\n';
            valido = 1;
        }
        // if(id_alergia=="")
        // {
        //     mensaje +='Campo requerido id alergia\n';
        //     valido = 1;
        // }
        if(comentario=="")
        {
            mensaje +='Campo requerido Detalle\n';
            valido = 1;
        }
        if(paciente=="")
        {
            mensaje +='Campo requerido paciente\n';
            valido = 1;
        }

        if(valido == 0)
        {
            swal({
                title: "Alergia agregada correctamente. ***PENDIDENTE POR HACER***",
                icon: "success",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
        else
        {
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

    function evaluar_para_carga_detalle(select, div, input, valor)
    {
        var valor_select = $('#'+select+'').val();
        if(valor_select == valor) $('#'+div+'').show();
        else {
            $('#'+div+'').hide();
            $('#'+input+'').val('');
        }
    }

    function abrir_modal_guardar_tipo()
    {
        $('#modal_registrar_ficha_tipo_orl').modal('show');
        cargarSeccion('registro_f_t_orl_detalle');
    }

    function cargarSeccion(div_destino)
    {
        // var tipo = $('#'+select+'').val();
        $('#'+div_destino).html('');
        var seccion_actual = '';
        var seccion_previa = '';
        $('#form-otorrino').find('select,textarea').each(function(key, elemento){


            html ='';

            // if(seccion_previa == '' && seccion_actual == '')
            if(key == 0)
            {
                seccion_actual = $(elemento).data('seccion').trim();
                seccion_previa = $(elemento).data('seccion').trim();

                html +='<hr>';
                html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                html +='<hr>';
            }
            else
            {
                if($(elemento).data('seccion'))
                seccion_actual = $(elemento).data('seccion').trim();
            }

            if(seccion_actual == seccion_previa)
            {
                html +='<hr>';
                html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                html +='<hr>';
            }

            html +='<div class="row" style="margin-top:10px;">';
            if($(elemento).prop('nodeName') == 'SELECT')
            {
                if($(elemento).val() == 0)
                    $(elemento).val(1)

                html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                html +='<div class="col-md-5">';
                html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                html +='</div>';
                html +='<div class="col-md-2"></div>';
            }
            else if($(elemento).prop('nodeName') == 'TEXTAREA')
            {
                if($(elemento).data('tipo'))
                    html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                else
                    html +='<div class="col-md-5">Detalle</div>';
                html +='<div class="col-md-5">';
                html +='    <textarea class="form-control caja-texto form-control-sm '+$(elemento).attr('id')+'_editar" style="display:none;" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_'+$(elemento).attr('id')+'" id="observaciones_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</textarea>';
                html +='    <label class="'+$(elemento).attr('id')+'_mostrar" id="label_observacion_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</label>';
                html +='</div>';
                html +='<div class="col-md-2">';
                html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_mostrar"  onclick="cambiar_div(\''+$(elemento).attr('id')+'_editar'+'\',\''+$(elemento).attr('id')+'_mostrar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Editar</button>';
                html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_editar" style="display:none;" onclick="cambiar_div(\''+$(elemento).attr('id')+'_mostrar'+'\',\''+$(elemento).attr('id')+'_editar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Guardar</button>';
                html +='</div>';

            }
            html +='</div>';
            $('#'+div_destino).append(html);
            seccion_previa = $(elemento).data('seccion');
        });
    }

    function cambiar_div(mostrar, ocultar, label, textarea)
    {
        $('.'+mostrar).show();
        $('.'+ocultar).hide();
        $('#'+label).html( $('#'+textarea).val() );
    }

    function guardar_tipo_ficha_otorrino()
    {
        var registro_f_t_orl_nombre = $('#registro_f_t_orl_nombre').val();
        var registro_f_t_orl_descripcion = $('#registro_f_t_orl_descripcion').val();
        var _token = CSRF_TOKEN;
        if(registro_f_t_orl_nombre == ''){
            swal({
                    title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                return false;
        }
        if(registro_f_t_orl_descripcion == ''){
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

        $('#registro_f_t_orl_detalle').find('input,textarea').each(function(key, elemento){
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
                id_profesional : $('#id_profesional').val(),

                modal_agregar_tipo_apreciacion_auditiva :  data.modal_agregar_tipo_apreciacion_auditiva,
                modal_agregar_tipo_apreciacion_resp :  data.modal_agregar_tipo_apreciacion_resp,
                modal_agregar_tipo_disfonia :  data.modal_agregar_tipo_disfonia,
                modal_agregar_tipo_ex_boca :  data.modal_agregar_tipo_ex_boca,
                modal_agregar_tipo_examen_bio_od :  data.modal_agregar_tipo_examen_bio_od,
                modal_agregar_tipo_examen_bio_oi :  data.modal_agregar_tipo_examen_bio_oi,
                modal_agregar_tipo_examen_faringe :  data.modal_agregar_tipo_examen_faringe,
                modal_agregar_tipo_examen_fnd :  data.modal_agregar_tipo_examen_fnd,
                modal_agregar_tipo_examen_fni :  data.modal_agregar_tipo_examen_fni,
                modal_agregar_tipo_examen_laringe :  data.modal_agregar_tipo_examen_laringe,
                modal_agregar_tipo_examen_od :  data.modal_agregar_tipo_examen_od,
                modal_agregar_tipo_examen_oi :  data.modal_agregar_tipo_examen_oi,
                modal_agregar_tipo_nariz_general :  data.modal_agregar_tipo_nariz_general,
                modal_agregar_tipo_usa_audifono :  data.modal_agregar_tipo_usa_audifono,
                observaciones_aprec_auditiva_def :  data.observaciones_aprec_auditiva_def,
                observaciones_aprec_resp_def :  data.observaciones_aprec_resp_def,
                observaciones_audifono :  data.observaciones_audifono,
                observaciones_det_disfonia :  data.observaciones_det_disfonia,
                observaciones_det_nariz_general :  data.observaciones_det_nariz_general,
                observaciones_detalle_ex_boca :  data.observaciones_detalle_ex_boca,
                observaciones_ex_farige_anormal :  data.observaciones_ex_farige_anormal,
                observaciones_ex_fnd_anormal :  data.observaciones_ex_fnd_anormal,
                observaciones_ex_fni_anormal :  data.observaciones_ex_fni_anormal,
                observaciones_ex_larige_anormal :  data.observaciones_ex_larige_anormal,
                observaciones_ex_od_anormal :  data.observaciones_ex_od_anormal,
                observaciones_ex_oi_anormal :  data.observaciones_ex_oi_anormal,
                observaciones_obs_ex_biom :  data.observaciones_obs_ex_biom,
                observaciones_obs_ex_nasal :  data.observaciones_obs_ex_nasal,
                observaciones_obs_ex_oidos :  data.observaciones_obs_ex_oidos,
                observaciones_obs_ex_orl :  data.observaciones_obs_ex_orl,
                observaciones_obs_examen_bio_od :  data.observaciones_obs_examen_bio_od,
                observaciones_obs_examen_bio_oi :  data.observaciones_obs_examen_bio_oi,
                observaciones_obs_examen_laringe :  data.observaciones_obs_examen_laringe,
                registro_f_t_orl_descripcion :  data.registro_f_t_orl_descripcion,
                registro_f_t_orl_nombre :  data.registro_f_t_orl_nombre,

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
        .done(function(data)
        {
            // console.log('-----------------------');
            // console.log(data);
            // console.log('-----------------------');
            if(data.estado == 1)
            {
                $('#modal_registrar_ficha_tipo_orl').modal('hide');
                swal({
                    title: "Tipo Ficha Registrado",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }
            else{

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

    function cargar_info_ficha_tipo_orl(select, div_descripcion)
    {
        let id_ft = $('#'+select).val();
        if(id_ft == '')
        {
            $('#'+div_descripcion).html('');
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    $(elemento).val(0);
                }
                else
                {
                    $(elemento).val('');
                }
            });

            evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
            evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
            evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
            evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
            evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
            evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
            evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
            evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
            evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
            evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
            evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
            evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
            evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
            evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
            evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
            evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
            evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
            evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
            evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);
            return false;
        }
        $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

        url = "{{ route('profesional.buscar_ficha_tipo_otorrino') }}";
        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_profesional : $('#id_profesional').val(),
                id_ficha_tipo :  id_ft,
            },
        })
        .done(function(data)
        {
            // console.log('-----------------------');
            // console.log(data);
            // console.log('-----------------------');
            if(data.estado == 1)
            {
                $.each(data.registros, function(index, value)
                {
                    // console.log(index);
                    // console.log(value);
                    // console.log($('#'+index));

                    if(index == 'id_usa_audifono')
                        index = 'usa_audifono';

                    if(index == 'id_tipo_episodios')
                        index = 'episodios';

                    if(index == 'id_tipo_equilibrio')
                        index = 'equilibrio';

                    if(index == 'id_tipo_ng')
                        index = 'ng';

                    if(index == 'id_tipo_sint_acomp')
                        index = 'sint_acomp';

                    if(index == 'id_tipo_vertigo')
                        index = 'tipo_vertigo';

                    if(index == 'obs_tipo_vertigo')
                        index = 'detalle_tipo_vertigo';

                    if(index == 'obs_sint_acomp')
                        index = 'detalle_sint_acompanantes';

                    if(index == 'obs_ng')
                        index = 'detalle_ng';

                    if(index == 'obs_episodios')
                        index = 'detalle_episodios';

                    if(index == 'obs_equilibrio')
                        index = 'detalle_equilibrio';



                    $('#'+index).val(value);
                });

                evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
                evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
                evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
                evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
                evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
                evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);

            }
            else{

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

    function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
    {
        rut = $(rut).val();

        // console.log('------------------------------------');
        // console.log(rut.length);
        // console.log(rut);
        // console.log('------------------------------------');

        if(rut.length>5)
        {
            url = "{{ route('profesional.buscar') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    rut : rut,
                },
            })
            .done(function(data)
            {
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {

                    if(data.registros.length>0)
                    {
                        var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                        var id = data.registros[0].id;
                        // $('#'+input_nombre).attr('readonly', true);
                        $('#'+input_nombre).val(nombre);
                        $('#'+input_id).val(id);
                        $('#'+div_solicitar).hide();
                        mensaje = '';
                        $('#div_mensaje').hide();
                        $('#mensaje_solicitado_por').html(mensaje);
                        $('#solicitado_por_nombre_rfl').val('');
                        $('#solicitado_por_apellido_rfl').val('');
                        $('#solicitado_por_telefono_rfl').val('');
                        $('#solicitado_por_email_rfl').val('');
                    }
                    else
                    {
                        mensaje = 'Profesional no encontrato, debe ingresar datos.';
                        $('#'+input_nombre).val('');
                        $('#'+input_id).val('');
                        $('#'+div_solicitar).show();
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        $('#solicitado_por_nombre_rfl').val('');
                        $('#solicitado_por_apellido_rfl').val('');
                        $('#solicitado_por_telefono_rfl').val('');
                        $('#solicitado_por_email_rfl').val('');
                        // $('#'+input_nombre).attr('readonly', true);
                    }
                }
                else
                {
                    mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                    $('#div_mensaje').show();
                    $('#mensaje_solicitado_por').html(mensaje);
                    // $('#'+input_nombre).attr('readonly', false);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else if(rut.length==0)
        {
            $('#'+input_nombre).val('');
            // $('#'+input_nombre).attr('readonly', true);
            $('#'+input_id).val('');
            $('#'+div_solicitar).hide();
            $('#div_mensaje').hide();
            $('#mensaje_solicitado_por').html('');
        }
    }

    function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
    {
        var nombre = $('#'+input_nombre).val();
        var apellido = $('#'+input_apellido).val();
        if(nombre != '' || apellido != '')
        {
            // $('#'+input_solitado_por).attr('readonly', true);
            $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
        }
        else
        {
            // $('#'+input_solitado_por).attr('readonly', false);
            $('#'+input_solitado_por).val();
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
                    let dosis = $('#'+div_dosis);

                    dosis.find('option').remove();
                    dosis.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +
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

        var cant_comp = $('#'+div_dosis+' option:selected').attr('data-cant_comp');
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
                    let select_cant_comp = $('#'+div_comp);

                    select_cant_comp.find('option').remove();
                    select_cant_comp.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        select_cant_comp.append('<option value="' + v.id + '">' + v.cant +'</option>');
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

        if($('#cronicos').val() != 'n_C')
        {
            var nombre_enfermedad = $("#cronicos option:selected").text();
            $('#titulo_med_patologia').html( ('Medicamentos '+nombre_enfermedad).toUpperCase());
            $('.medicamento_patologia').show();
            $('#btn_registro_med_patologia').attr('onclick','agregar_medicamento_cronico_patologia(\''+$('#cronicos').val()+'\')');
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
        }
        else
        {
            $('.medicamento_patologia').hide();
            $('#hipertension_div').hide();
            $('#control_peso_div').hide();
            $('#diabetes_div').hide();

            $('#titulo_med_patologia').html( 'Medicamentos' );
        }
    }

    function registrar_control_obesidad() {

        let peso = $('#registro_peso').val();
        let variacion = $('#registro_peso_variacion').val();
        let ideal = $('#registro_peso_ideal').val();
        let url = "{{ route('ficha_medica.registrar_control_obesidad') }}";
        let hora_medica = $('#hora_medica').val();
        var validar = 0;
        var mensaje ='';

        if( peso == '' )
        {
            $('#registro_peso').focus();
            mensaje += 'Debe ingresar el Peso del Control Actual.\n';
            validar = 1;
        }
        if( variacion == '' )
        {
            $('#registro_peso_variacion').focus();
            mensaje += 'Debe ingresar la Variación.\n';
            validar = 1;
        }
        if( ideal == '' )
        {
            $('#registro_peso_ideal').focus();
            mensaje += 'Debe ingresar el Peso Ideal.\n';
            validar = 1;
        }

        if(validar == 1)
        {
            swal({
                title: "Debe ingresar todos los datos requeridos." ,
                text: mensaje,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
            return false;
        }
        else
        {
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
        var mensaje ='';

        if( sistolica == '' )
        {
            $('#presion_sistolica_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Sistólica.\n';
            validar = 1;
        }
        if( diastolica == '' )
        {
            $('#presion_diastolica_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Diastólica.\n';
            validar = 1;
        }
        if( ideal == '' )
        {
            $('#ideal_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Ideal.\n';
            validar = 1;
        }

        if(validar == 1)
        {
            swal({
                title: "Debe ingresar todos los datos requeridos." ,
                text: mensaje,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
            return false;
        }
        else
        {
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

    function agregar_medicamento_cronico()
    {

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
                id_profesional:id_profesional,
                id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                nombre_medicamento:nombre_medicamento,
                id_medicamento:id_medicamento,
                cantidad:cantidad,
                tipo_enfermedad:tipo_enfermedad,
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
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


                }
                else{

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

    function ver_medicamento_cronico()
    {

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
                id_paciente:id_paciente,
                tipo_enfermedad:'cronico'
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
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
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        html += '<tr>';
                        html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                        html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                        html += '    </td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <input type="checkbox" name="medicamento_cronico_general" id="medicamento_cronico_general_'+value.id+'">';
                        html += '    </td>';
                        html += '</tr>';
                    });

                }
                else
                {

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

    function eliminar_med_cronico(id)
    {
        let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


        var _token = CSRF_TOKEN;
        var id =id;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id:id
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    swal({
                        title: "Medicamento Cronico.",
                        text: "Medicamento Eliminado.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    ver_medicamento_cronico();
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
            else{

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
    function agregar_medicamento_cronico_patologia(tipo)
    {

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
                id_profesional:id_profesional,
                id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                nombre_medicamento:nombre_medicamento,
                cantidad:cantidad,
                tipo_enfermedad:tipo_enfermedad,
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
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
                }
                else{

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

    function ver_medicamento_cronico_patologia()
    {

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
                id_paciente:id_paciente,
                tipo_enfermedad:tipo_enfermedad
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
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
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        html += '<tr>';
                        html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                        html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico_patologia(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                        html += '    </td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <input type="checkbox" name="medicamento_cronico_patologia" id="medicamento_cronico_patologia_'+value.id+'">';
                        html += '    </td>';
                        html += '</tr>';
                    });

                }
                else
                {

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

    function eliminar_med_cronico_patologia(id)
    {
        let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


        var _token = CSRF_TOKEN;
        var id =id;
        var tipo_enfermedad = $('#cronicos').val();

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id:id
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    swal({
                        title: "Medicamento Cronico.",
                        text: "Medicamento Eliminado.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    ver_medicamento_cronico_patologia(tipo_enfermedad);
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
            else{

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

    function mostrar_nueva_pieza_ex_radio(counter){
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

function mostrar_nuevas_imagenes_dent(counter){
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

function ocultar_pieza_imagenes_rx(){
    $('#contenedor_nueva_imagen_dent').empty();
}



    function eliminar_pieza_dental_rx(id){
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

function editar_pieza_dental_rx(id){
    // abrir_modal
    $('#modal_agregar_imagenes_dental_paciente').modal('show');
}


function confirmar_eliminar_pieza_dental_rx(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_rx') }}";
    let id_paciente = $('#id_paciente').val();

    $.ajax({
        type:'post',
        url: url,
        data:{
            id: id,
            id_paciente: id_paciente,
            _token: CSRF_TOKEN
        },
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.v);
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}

function amplificar_imagen(path){
    // abrir modal
    $('#modal_imagen_dental_rx').modal('show');
    $('.zoom-container').on('mousemove', function (e) {
            const $img = $(this).find('img');
            const offsetX = e.offsetX; // Posición X del mouse dentro del contenedor
            const offsetY = e.offsetY; // Posición Y del mouse dentro del contenedor
            const width = $(this).width();
            const height = $(this).height();
            const xPercent = (offsetX / width) * 100; // Porcentaje X
            const yPercent = (offsetY / height) * 100; // Porcentaje Y

            $img.css('transform-origin', `${xPercent}% ${yPercent}%`); // Ajusta el origen de transformación
        });
    $('#imagen_paciente_rx').attr('src',"{{ asset('storage') }}"+"/"+path);
}

function eliminar_rx(id){
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

function confirmarEliminarImagenRx(id){
    let url = "{{ ROUTE('profesional.eliminar_imagen_rx_paciente') }}";
    let data = {
        _token: CSRF_TOKEN,
        id:id,
        id_ficha_atencion: $('#id_fc').val(),
        id_paciente: $('#id_paciente').val()
    }

    $.ajax({
        type:'post',
        data: data,
        url: url,
        success: function(resp){
            if(resp.mensaje == 'OK'){
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.v);
            }else{
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.mensaje);
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_imagen_dental(id,path){
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
            confirmar_eliminar_imagen_dental(id,path);
        } else {
            swal('Cancelado', 'La imagen no fue eliminada :(', 'error');
        }
    });

}

function confirmar_eliminar_imagen_dental(id,path){
    let url = "{{ route('profesional.eliminar_imagen_dental_paciente') }}";
    let data = {
        _token: CSRF_TOKEN,
        id:id,
        path: path,
        id_paciente: $('#id_paciente').val()
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);

            if(resp.mensaje == 'OK'){
                let seccion = resp.seccion;
                if(seccion == 'gral'){
                    $('#contenedor_imagenes_dent').empty();
                    $('#contenedor_imagenes_dent').append(resp.v);
                }else if(seccion == 'implantologia'){
                    $('#contenedor_imagenes_dent_estudio').empty();
                    $('#contenedor_imagenes_dent_estudio').append(resp.v);
                }else{
                    $('#contenedor_imagenes_dent_period').empty();
                    $('#contenedor_imagenes_dent_period').append(resp.v);
                }

            }else{
                // $('#contenedor_imagenes_dent').empty();
                // $('#contenedor_imagenes_dent').append(resp.mensaje);
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_pieza_dental_imagenes(id){
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

function confirmar_eliminar_pieza_dental_imagenes(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_imagenes_paciente') }}";
    let id_paciente = $('#id_paciente').val();

    let data = {
        _token: CSRF_TOKEN,
        id_paciente: id_paciente,
        id: id
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                let seccion = resp.seccion;
                if(seccion == 'gral'){
                    $('#contenedor_imagenes_dent').empty();
                    $('#contenedor_imagenes_dent').append(resp.v);
                }else if(seccion == 'implantologia'){
                    $('#contenedor_imagenes_dent_estudio').empty();
                    $('#contenedor_imagenes_dent_estudio').append(resp.v);
                }else{
                    $('#contenedor_imagenes_dent_period').empty();
                    $('#contenedor_imagenes_dent_period').append(resp.v);
                }

                swal({
                    title:'Exito',
                    text:'Se ha guardado con exito',
                    icon:'success'
                })
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_pieza_dental_imagenes_estudio(id){
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

function confirmar_eliminar_pieza_dental_imagenes_estudio(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_imagenes_paciente') }}";
    let id_paciente = $('#id_paciente').val();

    let data = {
        _token: CSRF_TOKEN,
        id_paciente: id_paciente,
        id: id
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_imagenes_dent_estudio').empty();
                $('#contenedor_imagenes_dent_estudio').append(resp.v);
                swal({
                    title:'Exito',
                    text:'Se ha guardado con exito',
                    icon:'success'
                })
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function mostrar_pieza_dental_examen(count){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen') }}";
    let data = {
        count: count,
        id_paciente: $('#id_paciente').val(),
        _token: CSRF_TOKEN
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_nueva_pieza_dental').empty();
                $('#contenedor_nueva_pieza_dental').append(resp.v);

            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

    function pedir_autorizacion_presupuesto_dental(){
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

    function  confirmar_pedir_autorizacion_presupuesto_dental()
    {
        $('#modal_autorizacion_presupuesto').modal('show');
        $('#modal_autorizacion_imagen').html('');
        $('#modal_autorizacion_mensaje').html('');
        $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
    }

    function  cerrar_autorizacion_presupuesto()
    {
        $('#modal_autorizacion_presupuesto').modal('hide');
    }

    function mostrar_nueva_pieza_dental_hist(count, tipo){
        let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_hist') }}";
        let data = {
            count: count,
            id_paciente: $('#id_paciente').val(),
            seccion: tipo,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    if(tipo == 'impl'){
                        $('#contenedor_piezas_hist').empty();
                        $('#contenedor_piezas_hist').append(resp.v);
                    }else{
                        $('#contenedor_piezas_hist_period').empty();
                        $('#contenedor_piezas_hist_period').append(resp.v);
                    }


                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }


    {{--  mostrar div   --}}
    function mostrar_div(div)
    {
        if ($('.'+div).is(':visible')) {
            $('.'+div).hide();
            $('#senal_med_cronico').addClass('fa-angle-down');
            $('#senal_med_cronico').removeClass('fa-angle-up');
        } else {
            $('.'+div).show();
            $('#senal_med_cronico').removeClass('fa-angle-down');
            $('#senal_med_cronico').addClass('fa-angle-up');
        }
    }


    {{--  CRONICO VER CONTROL DE HIPERTENSION  --}}
    function ver_control_hipertension()
    {

        let url = "{{ route('hipertension.getHipertension') }}";


        var _token = CSRF_TOKEN;
        var id_paciente = $('#id_paciente_fc').val();
        $('#control_hipertension').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
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
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                        html += '<tr>';
                        html += '    <td class="text-center align-middle">'+value.id+'</td>';
                        html += '    <td class="text-center align-middle">'+fecha+'</td>';
                        html += '    <td class="text-center align-middle">'+value.sistolica+'</td>';
                        html += '    <td class="text-center align-middle">'+value.diastolica+'</td>';
                        html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                        html += '</tr>';
                    });

                }
                else
                {

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
    function ver_control_obesidad()
    {

        let url = "{{ route('control_obesidad.getControlObesidad') }}";


        var _token = CSRF_TOKEN;
        var id_paciente = $('#id_paciente_fc').val();
        $('#control_obesidad').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
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
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();


                        html += '<tr>';
                        html += '    <td class="text-center align-middle">'+value.id+'</td>';
                        html += '    <td class="text-center align-middle">'+fecha+'</td>';
                        html += '    <td class="text-center align-middle">'+value.peso+'</td>';
                        html += '    <td class="text-center align-middle">'+value.variacion+'</td>';
                        html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                        html += '    <!--<td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>-->';
                        html += '</tr>';
                    });

                }
                else
                {

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
    function visualizar_pdf_examen(tipo_examen)
    {
        if(tipo_examen!='')
        {
            var array_datos = {};
            $('.div_form_examen_'+tipo_examen).find('input,textarea,select').each(function (key, element){
                array_datos[element.id] = element.value;
            });

            var imagenes = $('#input_lista_imagenes').val();
            if(imagenes != '')
            {
                imagenes = JSON.stringify(imagenes);
            }

            var data ='id_ficha='+$('#id_fc').val()+'&contenido='+JSON.stringify(array_datos)+'&imagenes='+imagenes;
            Fancybox.show(
                [
                    {
                    src: '{{ route("pdf.visualizar.examen") }}?'+data,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }
        else
        {
            console.log('tipo examen no especificado');
        }
    }

</script>

<script>
    /* Ponemos "agregarPieza" en el ámbito de toda la página */
    function agregarPieza(){
        var html = '';
        html += '<div id="pieza_dental" class="row">';
        html += '    <div class="form-row">';
        html += '        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Pieza N°</label>';
        html += '                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">';
        html += '            </div>';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="form-row">';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Resp.Calor</label>';
        html += '                <select id="sel_endo_resp_calor" name="sel_endo_resp_calor" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
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
        html += '                <select id="sel_endo_resp_frio" name="sel_endo_resp_frio" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
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
        html += '                <select id="sel_endo_resp_elect" name="sel_endo_resp_elect" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
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
        html += '                <select id="sel_endo_resp_perc" name="sel_endo_resp_perc" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
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
        html += '                <select id="sel_endo_resp_expl" name="sel_endo_resp_expl" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
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
        html += '                <select id="sel_endo_cavitaria" name="sel_endo_cavitaria" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
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
    } // agregarPieza

    $(document).ready(function(){
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-pieza').click(function(){
            agregarPieza();
        });
    });
    function agregarPieza1(){
        var html = '';
        html += '<hr>';
        html += '<div id="pieza_dental_dolor" class="row">';
        html += '    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
        html += '    <div class="form-row">';
        html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '                <label class="floating-label-activo-sm">Pieza N°</label>';
        html += '                <input type="text" class="form-control form-control-sm" name="" id="">';
        html += '            </div>';
        html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '                <div class="form-group">';
        html += '                    <label class="floating-label-activo-sm">Tipo de Dolor</label>';
        html += '                    <select name="tipo_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="tipo_dolor" class="form-control form-control-sm">';
        html += '                        <option selected  value="1">Espontáneo</option>';
        html += '                        <option value="2">Provocado</option>';
        html += '                        <option value="3">Otro describir</option>';
        html += '                    </select>';
        html += '                </div>';
        html += '                <div class="form-group" id="div_tipo_dolor" style="display:none;">';
        html += '                    <label class="floating-label-activo-sm">Tipo de dolor</label>';
        html += '                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor" id="obs_tipo_dolor"></textarea>';
        html += '                </div>';
        html += '            </div>';
        html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '                <div class="form-group">';
        html += '                    <label class="floating-label-activo-sm">Intensidad</label>';
        html += '                    <select name="intensidad" data-titulo="Ex_cuello" data-seccion="Cuello"  id="intensidad" class="form-control form-control-sm">';
        html += '                        <option selected  value="1">Leve</option>';
        html += '                        <option value="2">Moderado</option>';
        html += '                        <option value="3">Intenso</option>';
        html += '                        <option value="4">Otro describir</option>';
        html += '                    </select>';
        html += '                </div>';
        html += '                <div class="form-group" id="div_intensidad" style="display:none;">';
        html += '                    <label class="floating-label-activo-sm">Intensidad</label>';
        html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad" id="obs_intensidad"></textarea>';
        html += '                </div>';
        html += '            </div>';
        html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '                <div class="form-group">';
        html += '                    <label class="floating-label-activo-sm">Modo dolor</label>';
        html += '                    <select name="modo_dolor" data-titulo="Ex_cuello" data-seccion="Cuello"  id="modo_dolor" class="form-control form-control-sm">';
        html += '                        <option selected  value="1">Pulsátil</option>';
        html += '                        <option value="2">Permanente</option>';
        html += '                        <option value="3">Otro describir</option>';
        html += '                    </select>';
        html += '                </div>';
        html += '                <div class="form-group" id="div_modo_dolor" style="display:none;">';
        html += '                    <label class="floating-label-activo-sm">Modo dolor</label>';
        html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor" id="obs_modo_dolor"></textarea>';
        html += '                </div>';
        html += '            </div>';
        html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '                <div class="form-group">';
        html += '                    <label class="floating-label-activo-sm">Localización</label>';
        html += '                    <select name="loc_dolor" data-titulo="Ex_cuello" data-seccion="Cuello"  id="loc_dolor" class="form-control form-control-sm">';
        html += '                        <option selected  value="1">Localizado</option>';
        html += '                        <option value="2">Referido</option>';
        html += '                        <option value="3">Otro describir</option>';
        html += '                    </select>';
        html += '                </div>';
        html += '                <div class="form-group" id="div_loc_dolor" style="display:none;">';
        html += '                    <label class="floating-label-activo-sm">Localización</label>';
        html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor" id="obs_loc_dolor"></textarea>';
        html += '                </div>';
        html += '            </div>';
        html += '            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '                <div class="form-group">';
        html += '                    <label class="floating-label-activo-sm">Provocación del Dolor</label>';
        html += '                    <select name="provocacion_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor" class="form-control form-control-sm">';
        html += '                        <option selected  value="1">Frío</option>';
        html += '                        <option value="2">Calor</option>';
        html += '                        <option value="3">Actividad</option>';
        html += '                        <option value="4">Masticación</option>';
        html += '                        <option value="5">Otro describir</option>';
        html += '                    </select>';
        html += '                </div>';
        html += '                <div class="form-group" id="div_provocacion_dolor" style="display:none;">';
        html += '                    <label class="floating-label-activo-sm">Provocación del Dolor</label>';
        html += '                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor" id="obs_provocacion_dolor"></textarea>';
        html += '                </div>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="form-row">';
        html += '            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '                <div class="form-group">';
        html += '                    <label class="floating-label-activo-sm">Cuando duele</label>';
        html += '                    <select name="cdo_duele" data-titulo="Ex_cuello" data-seccion="Cuello"  id="cdo_duele" class="form-control form-control-sm">';
        html += '                        <option selected  value="1">Palpación</option>';
        html += '                        <option value="2">Decubito</option>';
        html += '                        <option value="3">Otro describir</option>';
        html += '                    </select>';
        html += '                </div>';
        html += '                <div class="form-group" id="div_cdo_duele" style="display:none;">';
        html += '                    <label class="floating-label-activo-sm">Cuando duele</label>';
        html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cdo_duele" id="obs_cdo_duele"></textarea>';
        html += '                </div>';
        html += '            </div>';
        html += '            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '                <div class="form-group">';
        html += '                    <label class="floating-label-activo-sm">Tpo Evolución</label>';
        html += '                    <select name="tpo_evolucion" data-titulo="Ex_cuello" data-seccion="Cuello"  id="tpo_evolucion" class="form-control form-control-sm">';
        html += '                        <option selected  value="1">Menos de 1 Semana</option>';
        html += '                        <option value="2">Más de 1 Semana</option>';
        html += '                        <option value="3">Otro describir</option>';
        html += '                    </select>';
        html += '                </div>';
        html += '                <div class="form-group" id="div_tpo_evolucion" style="display:none;">';
        html += '                    <label class="floating-label-activo-sm">Tpo Evolución</label>';
        html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_evolucionr" id="obs_tpo_evolucion"></textarea>';
        html += '                </div>';
        html += '            </div>';
        html += '            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '                <div class="form-group">';
        html += '                    <label class="floating-label-activo-sm">Efecto Analgésicos</label>';
        html += '                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor" id="obs_loc_dolor"></textarea>';
        html += '                </div>';
        html += '            </div>';
        html += '        </div>';
        html += '    </div>';
        html += '</div>';

        $('#contenedor_pieza_dental_endodolor').append(html);
    } // agregarPieza

    $(document).ready(function(){
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-pieza1').click(function(){
            agregarPieza1();
        });
    });
    function agregarPieza2(){
        var html = '';
        html += '<hr>';
        html += '<div id="pieza_dental_dolor" class="row">';
        html += '    <div class="col-sm-12 col-md-12 col-xl-12">';
            html += '   <div class="tab-content" id="v-pills-tabContent">';
            html += '       <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>';
            html += '           <div class="col-sm-12 col-md-12">';
            html += '               <div class="form-row">';
            html += '                   <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '                       <div class="form-group">';
            html += '                           <label class="floating-label-activo-sm">Pieza N°</label>';
            html += '                           <input type="text" class="form-control form-control-sm">';
            html += '                       </div>';
            html += '                   </div>';
            html += '                   <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '                       <div class="form-group">';
            html += '                           <label class="floating-label-activo-sm">Tipo de Tratamiento</label>';
            html += '                           <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" >';
            html += '                               <option selected  value="1">Uniradicular</option>';
            html += '                               <option value="2">Biradicular</option>';
            html += '                               <option value="2">Triradicular</option>';
            html += '                           </select>';
            html += '                       </div>';
            html += '                       <div class="form-group" id="div_piel_tegumnto" style="display:none;">';
            html += '                           <label class="floating-label-activo-sm">Tipo de Tratamiento</label>';
            html += '                           <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>';
            html += '                       </div>';
            html += '                   </div>';
            html += '                   <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '                       <div class="form-group">';
            html += '                           <label class="floating-label-activo-sm">Convenio</label>';
            html += '                           <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">';
            html += '                               <option selected  value="1">Convenio</option>';
            html += '                               <option value="2">Sin Convenio</option>';
            html += '                           </select>';
            html += '                       </div>';
            html += '                   </div>';
            html += '                   <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '                       <div class="form-group">';
            html += '                           <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> Cargar a presupuesto</button>';
            html += '                       </div>';
            html += '                   </div>';
            html += '               </div>';
            html += '           </div>';
            html += '       </div>';
            html += '</div>';

            $('#contenedor_pieza_plan_endo').append(html);
        } // agregarPieza
    $(document).ready(function(){
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-pieza2').click(function(){
            agregarPieza2();
        });
    });

    function agregarPieza3(){
        var html = '';
        html += '<hr>';
        html += ' <div id="pieza_dentalrx" class="row">';
        html += '     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
        html += '         <div class="form-row">';
        html += '             <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '                 <div class="form-group">';
        html += '                     <label class="floating-label-activo-sm">Pieza N°</label>';
        html += '                     <input class="form-control form-control-sm" type="text" name=""id="">';
        html += '                 </div>';
        html += '             </div>';
        html += '             <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">';
        html += '                 <div class="form-group">';
        html += '                     <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>';
        html += '                     <select name="rx_esp_peri_apical" id="rx_esp_peri_apical" data-titulo="Rx_endo" data-seccion="endo_rx" class="form-control form-control-sm" >';
        html += '                         <option value="0">Seleccione</option>';
        html += '                         <option value="1">Normal</option>';
        html += '                         <option value="2">Engrosado</option>';
        html += '                         <option value="3">Ausente</option>';
        html += '                         <option value="4">Otro</option>';
        html += '                     </select>';
        html += '                 </div>';
        html += '                 <div class="form-group"   id="div_detalle_rx_esp_peri_apical" style="display:none">';
        html += '                     <label class="floating-label-activo-sm">Espacio Periodontal Apical<i>(describir)</i></label>';
        html += '                     <select name="h_apical" id="h_apical" data-titulo="Rx endodoncia" data-seccion="endo_rx" class="form-control form-control-sm">';
        html += '                         <textarea class="form-control caja-texto form-control-sm" data-titulo="Rx endodoncia" data-seccion=endo_rx"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_rx_esp_peri_apical" id="det_rx_esp_peri_apical"></textarea>';
        html += '                 </div>';
        html += '             </div>';
        html += '             <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">';
        html += '                 <div class="form-group">';
        html += '                     <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>';
        html += '                     <select name="h_apical" id="h_apical" data-titulo="Rx endodoncia" data-seccion="endo_rx" class="form-control form-control-sm">';
        html += '                         <option value="0">Seleccione</option>';
        html += '                         <option value="1">Normal</option>';
        html += '                         <option value="2">Zona apical Difusa</option>';
        html += '                         <option value="3">Zona apical Corticalizada</option>';
        html += '                         <option value="4">Osteítis Condensante</option>';
        html += '                         <option value="5">Otro<i>(describir)</i></option>';
        html += '                     </select>';
        html += '                 </div>';
        html += '                 <div class="form-group"  id="div_detalle_h_apical" style="display:none">';
        html += '                     <label class="floating-label-activo-sm">Hueso Alveolar Apical<i>(describir)</i></label>';
        html += '                     <textarea class="form-control caja-texto form-control-sm" data-titulo="Rx endodoncia" data-seccion="endo_rx" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical" id="aprec_h_apical"></textarea>';
        html += '                 </div>';
        html += '             </div>';
        html += '         </div>';
        html += '         <div class="form-row">';
        html += '             <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">';
        html += '                 <div class="form-group">';
        html += '                         <label class="floating-label-activo-sm">Observaciones Examen Pieza</label>';
        html += '                         <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Rx endodoncia" data-seccion="endo_rx" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>';
        html += '                 </div>';
        html += '             </div>';
        html += '             <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '                 <div class="form-group">';
        html += '                     <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-rx_pieza" ><i class="fas fa-save"></i> Cargar Otra Pieza</button>';
        html += '                 </div>';
        html += '             </div>';
        html += '         </div>';
        html += '     </div>';
        html += ' </div>';

            $('#contenedor_pieza_dental_endorx').append(html);
        } // agregarPieza
    $(document).ready(function(){
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-pieza3').click(function(){
            agregarPieza3();
        });
    });
</script>

<script>
    function mostrar_nueva_pieza_dental(counter){
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

        var contador = 0;
        var piezas_buscadas = new Set();

function mostrar_nueva_pieza_dental_tto(pieza){
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
            seccion:'impl',
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


function mostrar_nueva_pieza_dental_tto_period(counter){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_tto') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            seccion:'period',
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

function mostrar_nueva_pieza_dental_end(counter){
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

function ocultarExamen(counter){
    $('#nueva_pieza_dental_odontodolor').empty();
}

function ocultarExamenEnd(counter){
    $('#contenedor_nuevo_examen_end').empty();
}

function guardar_pieza_dental_dolor(count){
    let derivado_por = $('#ex_grl_deriv').val();
    let zona_dolor = $('#ex_grl_zdolor').val();
    let historia_anterior = $('#ex_grl_hp').val();

    let pieza_numero = $('#numero_pieza'+count).val();
    let tipo_dolor = $('#tipo_dolor'+count).val();
    let intensidad = $('#intensidad'+count).val();
    let modo_dolor = $('#modo_dolor'+count).val();
    let loc_dolor = $('#loc_dolor'+count).val();
    let provocacion_dolor = $('#provocacion_dolor'+count).val();
    let cdo_duele = $('#cdo_duele'+count).val();
    let tpo_evolucion = $('#tpo_evolucion'+count).val();
    let obs_anal_dolor = $('#obs_anal_dolor'+count).val();

    let valido = 1;
    let mensaje = '';

    if(derivado_por == ''){
        valido = 0;
        mensaje += '<li>Campo requerido Derivado por </li>';
    }
    if(zona_dolor == ''){
        valido = 0;
        mensaje += '<li>Campo requerido Zona dolor </li>';
    }
    if(historia_anterior == ''){
        valido = 0;
        mensaje += '<li>Campo requerido Historia anterior </li>';
    }
    if(pieza_numero == ''){
        valido = 0;
        mensaje += '<li>Campo requerido N° Pieza </li>';
    }
    if(tipo_dolor == 0){
        valido = 0;
        mensaje += '<li>Campo requerido Tipo Dolor </li>';
    }
    if(intensidad == 0){
        valido = 0;
        mensaje += '<li>Campo requerido Intensidad </li>';
    }
    if(obs_anal_dolor == ''){
        valido = 0;
        mensaje += '<li>Campo requerido Observaciones analgesicos dolor </li>';
    }

    if(valido == 0){
        swal({
            title: "Campos requeridos",
            content:{
                element: "div",
                attributes:{
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
        id_lugar_atencion : $('#id_lugar_atencion').val(),
        id_ficha_atencion: $('#id_ficha_atencion').val(),
        id_profesional: $('#id_profesional_fc').val(),
        count: count
    }

    let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_dolor') }}";

    $.ajax({
        url: url,
        type:'post',
        data: data,
        success: function(resp){
            console.log(resp);
            $('#contenedor_pieza_dental_odontodolor').empty();
            $('#contenedor_pieza_dental_odontodolor').append(resp.v);
            $('#nueva_pieza_dental_odontodolor').empty();
        },
        error: function(error){
            console.log(error);
        }
    });
}

function mostrar_pieza_dental_examen(count){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen') }}";
    let data = {
        count: count,
        id_paciente: $('#id_paciente').val(),
        _token: CSRF_TOKEN
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_nueva_pieza_dental').empty();
                $('#contenedor_nueva_pieza_dental').append(resp.v);

            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function mostrar_pieza_dental_examen_end(count){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen_end') }}";
    let data = {
        count: count,
        id_paciente: $('#id_paciente').val(),
        tipo_examen:'endo',
        _token: CSRF_TOKEN
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#nueva_pieza_dental_endo').empty();
                $('#nueva_pieza_dental_endo').append(resp.v);

            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function mostrar_nueva_pieza_ex_radio_end(counter){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_rx_end') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            tipo_examen: 'endo',
            id_paciente: $('#id_paciente').val(),
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#nueva_pieza_end').empty();
            $('#nueva_pieza_end').append(resp.v);

            // Esperar a que el DOM se actualice antes de inicializar Dropzone
            setTimeout(function() {
                if (typeof initDropzoneEnd === 'function') {
                    initDropzoneEnd(counter);
                }
            }, 100);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function eliminar_pieza_dental_rx_end(id){
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
            swal('Cancelado', 'El RX no fue eliminado :(', 'error');
        }
    });
}

function confirmar_eliminar_pieza_dental_rx_end(id){
    let url = "{{ route('profesional.eliminar_pieza_dental_rx_end') }}";
    let data = {
        _token: CSRF_TOKEN,
        id_paciente: $('#id_paciente').val(),
        id: id
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_pieza_dental_endorx_endo').empty();
                $('#contenedor_pieza_dental_endorx_endo').append(resp.v);
                swal({
                    title:'Exito',
                    text:'Se ha eliminado con éxito',
                    icon:'success'
                })
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_pieza_dental_pieza(id,tipo){
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

function confirmar_eliminar_pieza_dental_pieza(id, tipo){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_pieza') }}";
    let data = {
        _token: CSRF_TOKEN,
        id_paciente: $('#id_paciente').val(),
        id: id,
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        tipo: tipo
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                let examenes = resp.examenes;
                if(tipo == 'gral'){
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
                }else if(tipo == 'endo'){
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
                    $('#numero_pieza_tto_end').empty();
                    $('#numero_pieza_tto_end').append(`
                        <option value="0" selected>Seleccione</option>
                    `);
                    examenes.forEach(pieza => {
                        $('#numero_pieza_tto_end').append(`
                            <option value="${pieza.numero_pieza}">${pieza.numero_pieza}</option>
                        `);
                    });
                }else{
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
                    title:'Exito',
                    text:'Se ha eliminado con éxito',
                    icon:'success'
                });

                $('#contenedor_examenes_grupos_dentales').empty();
                $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
            }
        },
        error: function(error){
            console.log(error);
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

    function confirmarEliminarExamenAgregado(id){
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

    function confirmarEliminarExamenEndAgregado(id, tipo_examen){
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
                    if(tipo_examen == 'endo'){
                        $('#contenedor_examen_dolor_end').empty();
                        $('#contenedor_examen_dolor_end').append(vista);
                    }else if(tipo_examen == 'odontop'){
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

    function guardar_pieza_dental_end(count){
        let derivado_por = $('#ex_end_derivado_por').val();
        let zona_dolor = $('#ex_end_zona_dolor').val();
        let historia_anterior = $('#ex_end_hist_ant').val();

        let pieza_numero = $('#end_numero_pieza'+count).val();
        let tipo_dolor = $('#end_tipo_dolor'+count).val();
        let intensidad = $('#end_intensidad'+count).val();
        let modo_dolor = $('#end_modo_dolor'+count).val();
        let loc_dolor = $('#end_loc_dolor'+count).val();
        let provocacion_dolor = $('#end_provocacion_dolor'+count).val();
        let cdo_duele = $('#end_cdo_duele'+count).val();
        let tpo_evolucion = $('#end_tpo_evolucion'+count).val();
        let obs_anal_dolor = $('#end_obs_loc_dolor'+count).val();

        let valido = 1;
        let mensaje = '';

        if(derivado_por == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Derivado por </li>';
        }
        if(zona_dolor == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Zona dolor </li>';
        }
        if(historia_anterior == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Historia anterior </li>';
        }
        if(pieza_numero == ''){
            valido = 0;
            mensaje += '<li>Campo requerido N° Pieza </li>';
        }
        if(tipo_dolor == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Tipo Dolor </li>';
        }
        if(intensidad == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Intensidad </li>';
        }
        if(obs_anal_dolor == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Observaciones analgesicos dolor </li>';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
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
            id_lugar_atencion : $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_ficha_atencion').val(),
            id_profesional: $('#id_profesional_fc').val(),
            count: count
        }

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_end_dolor') }}";

        $.ajax({
            url: url,
            type:'post',
            data: data,
            success: function(resp){
                console.log(resp);
                $('#contenedor_examen_dolor_end').empty();
                $('#contenedor_examen_dolor_end').append(resp.v);
                $('#contenedor_nuevo_examen_end').empty();
                mostrar_nueva_pieza_dental_end(2000);
            },
            error: function(error){
                console.log(error);
            }
        });
    }

function cargar_a_presupuesto_end_g() {
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
            cargar_a_presupuesto_end_g_confirmar();
        }
    });
}

function eliminar_rx_end(id){
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

function confirmarEliminarImagenRxEnd(id){
    let url = "{{ ROUTE('profesional.eliminar_imagen_rx_end_paciente') }}";
    let data = {
        _token: CSRF_TOKEN,
        id:id,
        id_paciente: $('#id_paciente_fc').val()
    }

    $.ajax({
        type:'post',
        data: data,
        url: url,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_pieza_dental_endorx_endo').empty();
                $('#contenedor_pieza_dental_endorx_endo').append(resp.v);
            }else{
                $('#contenedor_pieza_dental_endorx_endo').empty();
                $('#contenedor_pieza_dental_endorx_endo').append(resp.mensaje);
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function cargar_a_presupuesto_end_g_confirmar(){
    // Obtener los valores seleccionados en el select
    var piezasSeleccionadas = $('#paciente_piezas_dentales_end_ex_').val();
    var ttoPiezas = $('#diag_presupuesto_pieza_g_endo').val();
    var diagnostico = $('#diagnostico_combo_g').val();
    var tipo = "endo";

    let valido = 1;
    let mensaje = '';

    if(piezasSeleccionadas.length == 0){
        valido = 0;
        mensaje += '<li>Piezas seleccionadas </li>'
    }
    if(ttoPiezas == ''){
        valido = 0;
        mensaje += '<li>Tratamiento </li>';
    }
    if(diagnostico == '' || diagnostico == 0){
        valido = 0;
        mensaje += '<li>Diagnóstico </li>';
    }

    if(valido == 0){
        swal({
                title: "Campos requeridos",
                content:{
                    element: "ul",
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: "error",
            });
            return false;
    }

    let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_endo') }}";
    let data = {
        piezas: piezasSeleccionadas,
        tto: ttoPiezas,
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        id_paciente: $('#id_paciente').val(),
        tipo: tipo,
        diagnostico: diagnostico,
        _token: "{{ csrf_token() }}"
    }
    console.log(data);
    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.status == 1){
                swal({
                    icon:'success',
                    title:'Info',
                    text: resp.mensaje
                });
                let odontograma = resp.odontograma_paciente;
                odontograma_global = odontograma;
                let html = '';
                odontograma.forEach(function(odonto){
                    html += '<tr>';
                    html += '<td>'+odonto.fecha+'</td>';
                    html += '<td>'+odonto.tratamiento+'</td>';
                    html += '<td>'+odonto.caras+'</td>';
                    html += '<td>'+odonto.pieza+'</td>';
                    html += '<td>'+odonto.diagnostico+'</td>';
                    html += '<td>'+formatoMoneda(odonto.valor)+'</td>';
                    // html += '<td>';
                    // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                    // if(odonto.presupuesto == 0){
                    //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                    // }else{
                    //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="feather icon-x"></i>Sacar de presupuesto</button>';
                    // }

                    // html += '</td>';
                     // Checkbox para seleccionar el odontograma
                    html += '<td>';
                    html += '<div class="form-check">';
                    html += '<input class="form-check-input" type="checkbox" value="' + odonto.id + '" '
                    html += odonto.presupuesto == 1 ? 'checked ' : '';
                    html += 'onchange="togglePresupuesto(' + odonto.id + ', this.checked)">';
                    html += '<label class="form-check-label"></label>';
                    html += '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="form-check">';
                    html += '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' + odonto.id + '" ';
                    html += 'id="seleccionCheck' + odonto.id + '" ';
                    html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                    html += '<label class="form-check-label" for="seleccionCheck' + odonto.id + '"></label>';
                    html += '</div>';
                    html += '</td>';
                    html += '</tr>';
                });
                $('#contenedor_examenes_grupos_dentales').empty();
                $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                $('#table_odontograma tbody').html(html);
                $('#contenedor_piezas_dentales_presupuesto').empty();
                $('#table_trabajos_presupuesto tbody').empty();
                odontograma.forEach(function(odonto){
                        if(odonto.presupuesto == 1){
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
                                                            <button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
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
                $('#subtotal_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                $('#total_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                $('#total_presupuesto_dental').val(total_general);
                $('#total_presupuesto').val(formatoMoneda(total_general));

                $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));

                let table = $('#presup_estado_pago').DataTable();
                table.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                odontograma.forEach(function(odonto) {

                        if (odonto.presupuesto == 1) {
                            if(odonto.estado_pago == 'ok'){
                                var clase = 'bg-success';
                            }else if(odonto.estado_pago == 'incompleto'){
                                var clase = 'bg-warning';
                            }else{
                                var clase = 'bg-danger';
                            }

                            if(odonto.estado == 0){
                                var estado = 'PENDIENTE';
                            }else{
                                var estado = 'TERMINADO';
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
                // se cargan las piezas seleccionadas en tabla con id table_piezas_presupuesto_odonto
                let table_odon_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                table_odon_gral.clear().draw();

                odontograma.forEach(function(pieza){
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_odon_gral.row.add([
                                pieza.pieza,
                                pieza.descripcion,
                                formatoMoneda(formatoMoneda(pieza.valor)),
                                '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma('+pieza.id+')"><i class="feather icon-x"> </i> </button>'

                            ]).draw(false).node(); // Obtener el nodo de la fila


                });
                let table_endo = $('#table_piezas_presupuesto_endo').DataTable();
                table_endo.clear().draw();

                odontograma.forEach(function(pieza){
                    // if(pieza.tipo == 'endo'){
                        // Agregar una nueva fila a la tabla
                        let rowNode = table_endo.row.add([
                            pieza.pieza,
                            pieza.diagnostico,
                            pieza.descripcion,
                            formatoMoneda(formatoMoneda(pieza.valor)),
                            '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma('+pieza.id+')"><i class="feather icon-x"> </i> </button>'

                        ]).draw(false).node(); // Obtener el nodo de la fila
                    // }
                });
                // limpiar formulario
                $('#diag_presupuesto_pieza_g_endo').val('');
                $('#paciente_piezas_dentales_end_ex_').val(null).trigger('change');
            }else{
                swal({
                    icon:'error',
                    title:'info',
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
        error: function(error){
            console.log(error.responseText);
        }
    });
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

function cargar_a_presupuesto_impl_g_confirmar(){
    // Obtener los valores seleccionados en el select
    var piezasSeleccionadas = $('#paciente_piezas_dentales_ex').val();
    var ttoPiezas = $('#diag_presupuesto_pieza_g').val();

    let valido = 1;
    let mensaje = '';

    if(piezasSeleccionadas.length == 0){
        valido = 0;
        mensaje += '<li>Piezas seleccionadas </li>'
    }
    if(ttoPiezas == ''){
        valido = 0;
        mensaje += '<li>Tratamiento </li>';
    }

    if(valido == 0){
        swal({
                title: "Campos requeridos",
                content:{
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
        tto: ttoPiezas,
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        id_paciente: $('#id_paciente').val(),
        _token: "{{ csrf_token() }}"
    }
    console.log(data);
    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.status == 1){
                swal({
                    icon:'success',
                    title:'Info',
                    text: resp.mensaje
                });
                let odontograma = resp.odontograma_paciente;
                let html = '';
                odontograma.forEach(function(odonto){
                    html += '<tr>';
                    html += '<td>'+odonto.fecha+'</td>';
                    html += '<td>'+odonto.tratamiento+'</td>';
                    html += '<td>'+odonto.caras+'</td>';
                    html += '<td>'+odonto.pieza+'</td>';
                    html += '<td>'+odonto.diagnostico+'</td>';
                    html += '<td>'+formatoMoneda(odonto.valor)+'</td>';
                    // html += '<td>';
                    // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                    // if(odonto.presupuesto == 0){
                    //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                    // }else{
                    //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="feather icon-x"></i>Sacar de presupuesto</button>';
                    // }

                    // html += '</td>';
                     // Checkbox para seleccionar el odontograma
                    html += '<td>';
                    html += '<div class="form-check">';
                    html += '<input class="form-check-input" type="checkbox" value="' + odonto.id + '" '
                    html += odonto.presupuesto == 1 ? 'checked ' : '';
                    html += 'onchange="togglePresupuesto(' + odonto.id + ', this.checked)">';
                    html += '<label class="form-check-label"></label>';
                    html += '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="form-check">';
                    html += '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' + odonto.id + '" ';
                    html += 'id="seleccionCheck' + odonto.id + '" ';
                    html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                    html += '<label class="form-check-label" for="seleccionCheck' + odonto.id + '"></label>';
                    html += '</div>';
                    html += '</td>';
                    html += '</tr>';
                });
                $('#contenedor_examenes_grupos_dentales').empty();
                $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                $('#table_odontograma tbody').html(html);
                $('#contenedor_piezas_dentales_presupuesto').empty();
                $('#table_trabajos_presupuesto tbody').empty();
                odontograma.forEach(function(odonto){
                        if(odonto.presupuesto == 1){
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
                $('#subtotal_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                $('#total_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                $('#total_presupuesto_dental').val(total_general);
                $('#total_presupuesto').val(formatoMoneda(total_general));

                $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));

                let table = $('#presup_estado_pago').DataTable();
                table.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                odontograma.forEach(function(odonto) {

                        if (odonto.presupuesto == 1) {
                            if(odonto.estado_pago == 'ok'){
                                var clase = 'bg-success';
                            }else if(odonto.estado_pago == 'incompleto'){
                                var clase = 'bg-warning';
                            }else{
                                var clase = 'bg-danger';
                            }

                            if(odonto.estado == 0){
                                var estado = 'PENDIENTE';
                            }else{
                                var estado = 'TERMINADO';
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
                //limpiar_formulario_cargar_presupuesto_g();
                $('#table_pagos_reasignar_odontograma tbody').empty();
                odontograma.forEach(function(odonto) {
                    if (odonto.presupuesto == 1) {
                        let fila = `<tr>
                            <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                            <td>${odonto.pieza}</td>
                            <td>${formatoMoneda(odonto.valor)}</td>
                            <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                        </tr>`;
                        $('#table_pagos_reasignar_odontograma tbody').append(fila);
                    }
                });
                // se cargan las piezas seleccionadas en tabla con id table_piezas_presupuesto_odonto
                let table_odon_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                table_odon_gral.clear().draw();

                odontograma.forEach(function(pieza){
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_odon_gral.row.add([
                                pieza.pieza,
                                pieza.descripcion,
                                formatoMoneda(formatoMoneda(pieza.valor)),
                                '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma('+pieza.id+')"><i class="feather icon-x"> </i> </button>'

                            ]).draw(false).node(); // Obtener el nodo de la fila


                });
                let table_endo = $('#table_piezas_presupuesto_endo').DataTable();
                table_endo.clear().draw();

                odontograma.forEach(function(pieza){
                    // if(pieza.tipo == 'endo'){
                        // Agregar una nueva fila a la tabla
                        let rowNode = table_endo.row.add([
                            pieza.pieza,
                            pieza.diagnostico,
                            pieza.descripcion,
                            formatoMoneda(formatoMoneda(pieza.valor)),
                            '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma('+pieza.id+')"><i class="feather icon-x"> </i> </button>'

                        ]).draw(false).node(); // Obtener el nodo de la fila
                    // }
                });
                // limpiar formulario
                $('#diag_presupuesto_pieza_g').val('');
                $('#paciente_piezas_dentales_ex').val(null).trigger('change');
            }else{
                swal({
                    icon:'error',
                    title:'info',
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
        error: function(error){
            console.log(error.responseText);
        }
    });
}


     /** MENSAJE*/
    /** CARGAR mensaje */
                $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio los demás datos se cargan solos. ');
        $('#mensaje_ficha').show();
        setTimeout(function(){
            $('#mensaje_ficha').hide();
        }, 6000);
        @if($fichas->count()>0)
                        $('#mensaje_historias').html(' El paciente posee historia medica previa. ');
                    @else
                        $('#mensaje_historias').html(' Primera consulta del paciente. ');
                    @endif
                        $('#mensaje_historias').show();
                        setTimeout(function(){
                            $('#mensaje_historias').hide();
                        }, 6000);

</script>


@endsection
