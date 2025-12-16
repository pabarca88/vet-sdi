<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
            </div>
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="pediatria_general" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_cirugia_gen-tab" data-toggle="tab" href="#atencion_cirugia_gen" role="tab" aria-controls="atencion_cirugia_gen" aria-selected="false">Ficha cirugía General</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="atencion_traumato_gen-tab" data-toggle="tab" href="#atencion_traumato_gen" role="tab" aria-controls="atencion_traumato_gen" aria-selected="false">Traumatología y Ortopedia</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="atencion_quemados_gen-tab" data-toggle="tab" href="#atencion_quemados_gen" role="tab" aria-controls="atencion_quemados_gen" aria-selected="false">Quemados</a>
                    </li>
                </ul>
            </div>
			<!--ALERTA-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert"><strong>Solo el campo diagnóstico es obligatorio el resto es opcional</strong>
                </div>
            </div>

            <form action="{{ route('fichaAtencion.registrar_ficha_ped_cir_trum_quem') }}" method="POST" class="col-sm-12 col-md-12">
                <div class="col-sm-12 col-md-12">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    @if ($responsable)
                        <input type="hidden" name="id_responsable_fc" id="id_responsable_fc" value="{{ $responsable->id }}">
                        <input type="hidden" name="rut_responsable_fc" id="rut_responsable_fc" value="{{ $responsable->rut }}">
                    @else
                        <input type="hidden" name="id_responsable_fc" id="id_responsable_fc" value="{{ $paciente->id }}">
                        <input type="hidden" name="rut_responsable_fc" id="rut_responsable_fc" value="{{ $paciente->rut }}">
                    @endif
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">

                    @csrf
                    <div class="tab-content" id="cir_ped-contenido">
                        <!--ATENCIÓN ESPECIALIDAD CIRUGIA PEDIATRICA GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_cirugia_gen" role="tabpanel" aria-labelledby="atencion_cirugia_gen-tab">
                            <div class="row ">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-2 mb-0">
                                            <h5 class="f-18 text-c-blue mb-3">Ficha cirugía general pediátrica </h5>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->
                                    </div>
                                    <div class="row">
                                        <!--MOTIVO CONSULTA-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="motivo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten-a shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Síntoma Principal de consulta</label>
                                                                <select name="sintoma_cons_ped_cg" id="sintoma_cons_ped_cg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sintoma_cons_ped_cg','div_obs_sintoma_cons_ped_cg','obs_sintoma_cons_ped_cg',5);">
                                                                    <option value="0">Seleccione síntoma</option>
                                                                    <option value="1">Dolor</option>
                                                                    <option value="2">Deformidad</option>
                                                                    <option value="3">Alteración funcional</option>
                                                                    <option value="4">Masa</option>
                                                                    <option value="5">Otro </option>
                                                                </select>

                                                                <div id="div_obs_sintoma_cons_ped_cg" style="margin-top: 10px ;display:none">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Describa otro signo o síntoma</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Sintoma" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sintoma_cons_ped_cg" id="obs_sintoma_cons_ped_cg"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                <input type="text" class="form-control form-control-sm" name="motivo_ped_cg" id="motivo_ped_cg">
                                                            </div>

                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Antecedentes cirugías especialidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="antec_especialidad_ped_cg" id="antec_especialidad_ped_cg"></textarea>
                                                            </div>

                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Antecedentes generales especialidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="antec_especialidad_gen_cg" id="antec_especialidad_gen_cg"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!--CIRUGIA GENERAL-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                        Examen especialidad Cirugía General
                                                    </button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                                    <div class="card-body-aten-a">
                                                        <div id="form-pediatria_cir_general">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="cir_gen_pediat" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="ft_cir_gen_ped_tab" data-toggle="tab" href="#ft_cir_gen_ped" role="tab" aria-controls="ft_cir_gen_ped" aria-selected="true">Ficha tipo</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="examen_fisico_cgp-tab" data-toggle="tab" href="#examen_fisico_cgp" role="tab" aria-controls="examen_fisico_cgp" aria-selected="true">Examen físico</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="e-plan_tto-tab" data-toggle="tab" href="#e-plan_tto" role="tab" aria-controls="e-plan_tto" aria-selected="false">Planificación de tratamiento</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="cir_gen_pediat">

                                                                        <!--FICHA TIPO-->
                                                                        <div class="tab-pane fade show active" id="ft_cir_gen_ped" role="tabpanel" aria-labelledby="ft_cir_gen_ped_tab">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <h6 class="t-aten">FICHA TIPO</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['ped_gen']))
                                                                                            @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--EXAMEN FISICO CIR GEN-->
                                                                        <div class="tab-pane fade show" id="examen_fisico_cgp" role="tabpanel" aria-labelledby="examen_fisico_cgp-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">EXAMEN GENERAL</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Apreciación estado general</label>
                                                                                        <select name="e_general" id="e_general" data-titulo="Apreciación estado general" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_general','div_e_general','obs_e_general',2)">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal (describir)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_general" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir apreciación estado general</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación estado general" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_general" id="obs_e_general"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Signos vitales</label>
                                                                                        <select name="e_signos_vit" id="e_signos_vit" data-titulo="Signos vitales" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_signos_vit','div_e_signos_vit','obs_e_signos_vit',3)">
                                                                                            <option selected value="1">Normales</option>
                                                                                            <option value="2">No Examinado</option>
                                                                                            <option value="3">Alterados (Describir)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_signos_vit" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Signos vitales</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Signos vitales" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_signos_vit" id="obs_e_signos_vit"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Dolor localizado</label>
                                                                                        <select name="e_dolor_loc" id="e_dolor_loc" data-titulo="Dolor localizado" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_dolor_loc','div_e_dolor_loc','obs_e_dolor_loc',2);">
                                                                                            <option selected value="1">No</option>
                                                                                            <option value="2">Si Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_dolor_loc" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir dolor localizado</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Dolor localizado" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_dolor_loc" id="obs_e_dolor_loc"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">EXAMEN SEGMENTARIO</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Piel y fanéreos</label>
                                                                                        <select name="e_piel_fan" id="e_piel_fan" data-titulo="Piel" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_piel_fan','div_e_piel_fan','obs_e_piel_fan',2)">
                                                                                            <option value="1" selected>Normal</option>
                                                                                            <option value="2">Anormal (describir)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_piel_fan" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir examen de piel y fanéreos</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel_fan" id="obs_e_piel_fan"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Cabeza y cuello</label>
                                                                                        <select name="ex_cabcuello" id="ex_cabcuello" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_cabcuello','div_ex_cabcuello','obs_ex_cabcuello',3)">
                                                                                            <option value="1" selected>Normal</option>
                                                                                            <option value="2">No examinado</option>
                                                                                            <option value="3">Otro (describir)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_ex_cabcuello" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir examen de cuello</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Cabeza y Cuello" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_cabcuello" id="obs_ex_cabcuello"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Tórax</label>
                                                                                        <select name="ex_torax" id="ex_torax" data-titulo="Torax" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_torax','div_ex_torax','obs_ex_torax',2);">
                                                                                            <option value="1" selected>Normal</option>
                                                                                            <option value="2">Alterado (Describir)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_ex_torax" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir examen de tórax</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Torax" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_torax" id="obs_ex_torax"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Abdomen</label>
                                                                                        <select name="ex_abdomen" id="ex_abdomen" data-titulo="Abdomen" data-seccion="Examen Segmentario"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_abdomen','div_ex_abdomen','obs_ex_abdomen',2);">
                                                                                            <option value="1" selected>Normal</option>
                                                                                            <option value="2">Anormal (describir)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_ex_abdomen" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Examen de abdomen</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Abdomen" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_abdomen" id="obs_ex_abdomen"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Musculo-Esquelético</label>
                                                                                        <select name="ex_muscesq" id="ex_muscesq" data-titulo="Musculo-Esquelético" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_muscesq','div_ex_muscesq','obs_ex_muscesq',2);">
                                                                                            <option value="1" selected>Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_ex_muscesq" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Examen Musculo-Esquelético</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Musculo-Esquelético" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_muscesq" id="obs_ex_muscesq"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Órganos de los sentidos</label>
                                                                                        <select name="ex_o_sent" id="ex_o_sent" data-titulo="O-Sentidos" class="form-control form-control-sm"data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('ex_o_sent','div_ex_o_sent','obs_ex_o_sent',2);">
                                                                                            <option value="1" selected>Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_ex_o_sent" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Examen órganos de los sentidos</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. O-Sentidos" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_o_sent" id="obs_ex_o_sent"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="floating-label-activo-sm">Observaciones Ex. Segmentario</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Ex Segmentario" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_segmentario" id="obs_ex_segmentario"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--PLAN DE TRATAMIENTO-->
                                                                        <div class="tab-pane fade show" id="e-plan_tto" role="tabpanel" aria-labelledby="e-plan_tto-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">PLAN DE TRATAMIENTO</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">¿Es urgencia Qx.?</label>
                                                                                        <select name="urgencia_cg" id="urgencia_cg_ped" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cg_ped','div_detalle_urgencia_cg_ped','obs_urgencia_cg_ped',2);">
                                                                                            <option value="1" selected>No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_detalle_urgencia_cg_ped" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Detalle Urgencia Qx</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_urgencia_cg_ped" id="obs_urgencia_cg_ped"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">¿Requiere hospitalizar?</label>
                                                                                        <select name="hosp_cg" id="hosp_cg_ped" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hosp_cg_ped','div_detalle_hosp_cg_ped','obs_hosp_cg_ped',2);">
                                                                                            <option value="1" selected>No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"id="div_detalle_hosp_cg_ped" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Requiere hospitalizar en:</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_cg_ped" id="obs_hosp_cg_ped"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Otro tratamiento</label>
                                                                                        <select name="otrotto_cg_ped" id="otrotto_cg_ped" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otrotto_cg_ped','div_detalle_otrotto_cg_ped','obs_otrotto_cg_ped',2);">
                                                                                            <option value="1" selected>No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_detalle_otrotto_cg_ped" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Otro tratamiento <i>(Describir)</i></label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otrotto_cg_ped" id="obs_otrotto_cg_ped"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Obs. Plan de tratamiento</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Estado nutricional y vacunas" data-seccion="Estado nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tto_cg_ped" id="obs_plan_tto_cg_ped"></textarea>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--ATENCIÓN TRAUMATOLOGIA-->
                        <div class="tab-pane fade show " id="atencion_traumato_gen" role="tabpanel" aria-labelledby="atencion_traumato_gen-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-2 mb-0">
                                            <h5 class="f-18 text-c-blue mb-3">Ficha traumatología pediátrica </h5>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--FORMULARIO / MENOR DE EDAD-->
                                        @include('atencion_medica.generales.seccion_menor')

                                        <!--MOTIVO CONSULTA-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="motivo_trau">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_trau_c" aria-expanded="false" aria-controls="motivo_trau_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_trau_c" class="collapse show" aria-labelledby="motivo_trau" data-parent="#motivo_trau">
                                                    <div class="card-body-aten-a shadow-none">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Síntoma Principal de Consulta</label>
                                                                    <select name="sintoma_cons_ped_trau" id="sintoma_cons_ped_trau" data-titulo="sintoma principal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sintoma_cons_ped_trau','div_det_sintoma_trau','obs_sintoma_cons_ped_trau',5)">
                                                                        <option value="0">Seleccione Síntoma</option>
                                                                        <option value="1">Dolor</option>
                                                                        <option value="2">Deformidad</option>
                                                                        <option value="3">Alteración funcional</option>
                                                                        <option value="4">masa</option>
                                                                        <option value="5">Otro </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_det_sintoma_trau" style="display:none">
                                                                    <label class="floating-label-activo-sm">Describa Otro Signo o Síntoma</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Sintoma" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sintoma_cons_ped_trau" id="obs_sintoma_cons_ped_trau"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                    <input type="text" class="form-control form-control-sm" name="motivo_ped_trau" id="motivo_ped_trau">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Antecedentes cirugías especialidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="antec_especialidad_ped_trau" id="antec_especialidad_ped_trau"></textarea>
                                                            </div>

                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Antecedentes generales especialidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="antec_especialidad_gen_trau" id="antec_especialidad_gen_trau"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--TRAUMATOLOGIA INFANTIL-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_traumatologia">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_traumatologia_c" aria-expanded="false" aria-controls="exam_esp_traumatologia_c">
                                                        Examen Paciente Traumatología Infantíl
                                                    </button>
                                                </div>
                                                <div id="exam_esp_traumatologia_c" class="collapse" aria-labelledby="exam_esp_traumatologia" data-parent="#exam_esp_traumatologia">
                                                    <div class="card-body-aten-a shadow-none">
                                                        <div id="form-pediatria_traumato">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-crec_des_trauma" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="crec-traumato-des-tab" data-toggle="tab" href="#crec-traumato-des" role="tab" aria-controls="crec-traumato-des" aria-selected="true">Crecimiento y desarrollo</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="e-segment-traumato-tab" data-toggle="tab" href="#e-segment-traumato" role="tab" aria-controls="e-segment-traumato" aria-selected="false">Examen físico</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="e-traumato-tab" data-toggle="tab" href="#e-traumato" role="tab" aria-controls="e-traumato" aria-selected="false">Lesiones Traumáticas y tumores</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="ortopedia-tab" data-toggle="tab" href="#ortopedia" role="tab" aria-controls="ortopedia" aria-selected="false">Ortopedia</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="ev-crec_des_trauma">
                                                                        <!--TRAUMATO CRECIMIENTO Y DESARROLLO-->
                                                                        <div class="tab-pane fade show active" id="crec-traumato-des" role="tabpanel" aria-labelledby="crec-traumato-des-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-2">
                                                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                      <button class="btn nav-link-aten-b active" id="et-rn-tab" data-toggle="pill" data-target="#et-rn" type="button" role="tab" aria-controls="et-rn" aria-selected="true" onclick="selccionar_eval_crecimiento('2')">Recien nacido</button>
                                                                                      <button class="btn nav-link-aten-b" id="etuno-tab" data-toggle="pill" data-target="#etuno" type="button" role="tab" aria-controls="etuno" aria-selected="false" onclick="selccionar_eval_crecimiento('3')">1 mes</button>
                                                                                      <button class="btn nav-link-aten-b" id="etdos-tab" data-toggle="pill" data-target="#etdos" type="button" role="tab" aria-controls="etdos" aria-selected="false" onclick="selccionar_eval_crecimiento('4')">2 a 5 meses</button>
                                                                                      <button class="btn nav-link-aten-b" id="etseis-tab" data-toggle="pill" data-target="#etseis" type="button" role="tab" aria-controls="etseis" aria-selected="false" onclick="selccionar_eval_crecimiento('5')">6 a 11 meses</button>
                                                                                      <button class="btn nav-link-aten-b" id="etdoce-tab" data-toggle="pill" data-target="#etdoce" type="button" role="tab" aria-controls="etdoce" aria-selected="false" onclick="selccionar_eval_crecimiento('6')">12 a 23 meses</button>
                                                                                      <button class="btn nav-link-aten-b" id="etdosa-tab" data-toggle="pill" data-target="#etdosa" type="button" role="tab" aria-controls="etdosa" aria-selected="false" onclick="selccionar_eval_crecimiento('7')">2 a 4 años</button>
                                                                                      <button class="btn nav-link-aten-b" id="etseisa-tab" data-toggle="pill" data-target="#etseisa" type="button" role="tab" aria-controls="etseisa" aria-selected="false" onclick="selccionar_eval_crecimiento('8')">6 a 9 años</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-10">
                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                        <input type="hidden" name="id_cns_tipo" id="id_cns_tipo" value="2">
                                                                                        <!--RECIEN NACIDO-->
                                                                                        <div class="tab-pane fade show active" id="et-rn" role="tabpanel" aria-labelledby="et-rn-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <h6 class="t-aten">Examen de recién nacido</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-6 col-md-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Caderas</label>
                                                                                                        <select name="cadera_rn" id="cadera_rn" data-titulo="Caderas" data-seccion="Examen de recién nacido" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cadera_rn','div_cadera_rn','obs_cadera_rn',2);">
                                                                                                            <option selected value="1">Normales</option>
                                                                                                            <option value="2">Alteradas</option>
                                                                                                            <option value="3">No Realizado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6">
                                                                                                    <div class="form-group" id="div_cadera_rn" style="display:none">
                                                                                                        <label class="floating-label-activo-sm">Caderas</label>
                                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Caderas_Obs" data-seccion="Examen de recién nacido" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cadera_rn" id="obs_cadera_rn"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-6 col-md-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Columna</label>
                                                                                                        <select name="columna_rn" id="columna_rn" data-titulo="Columna"data-seccion="Examen de recién nacido" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('columna_rn','div_columna_rn','obs_columna_rn',2);">
                                                                                                            <option selected value="1">Normal</option>
                                                                                                            <option value="2">Alterada</option>
                                                                                                            <option value="3">No Realizado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6">
                                                                                                    <div class="form-group" id="div_columna_rn" style="display:none">
                                                                                                        <label class="floating-label-activo-sm">Columna</label>
                                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Columna Obs" data-seccion="Examen de recién nacido"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_columna_rn" id="obs_columna_rn"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-6 col-md-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Extremidades</label>
                                                                                                        <select name="p_ext_rn" id="p_ext_rn" data-titulo="Extrem"class="form-control form-control-sm" data-seccion="Examen de recién nacido" onchange="evaluar_para_carga_detalle('p_ext_rn','div_p_ext_rn','obs_p_ext_rn',2);">
                                                                                                            <option selected value="1">Normales</option>
                                                                                                            <option value="2">Alteradas</option>
                                                                                                            <option value="3">No Realizado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6">
                                                                                                    <div class="form-group" id="div_p_ext_rn" style="display:none">
                                                                                                        <label class="floating-label-activo-sm">Extremidades</label>
                                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Extrem" data-seccion="Examen de recién nacido" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_ext_rn" id="obs_p_ext_rn"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                        <option value="">Seleccione</option>
                                                                                                        @if(!empty($fichaTipo['ped_gen']))
                                                                                                            @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Control recién nacido</button>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <!--1 MES-->
                                                                                        <div class="tab-pane fade show" id="etuno" role="tabpanel" aria-labelledby="etuno-tab">

                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <h6 class="t-aten">Examen de 1 mes</h6>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Caderas</label>
                                                                                                            <select name="cadera_1m" id="cadera_1m" data-titulo="Caderas" data-seccion="Examen de 1 mes" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cadera_1m','div_cadera_1m','obs_cadera_1m',2);">
                                                                                                                <option selected value="1">Normales</option>
                                                                                                                <option value="2">Alteradas</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_cadera_1m" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Caderas</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Caderas" data-seccion="Examen de 1 mes"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cadera_1m" id="obs_cadera_1m"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Columna</label>
                                                                                                            <select name="columna_1m" id="columna_1m" data-titulo="Columna" data-seccion="Examen de 1 mes" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('columna_1m','div_columna_1m','obs_columna_1m',2);">
                                                                                                                <option selected value="1">Normal</option>
                                                                                                                <option value="2">Alterada</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_columna_1m" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Columna</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Columna" data-seccion="Examen de 1 mes"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_columna_1m" id="obs_columna_1m"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Extremidades</label>
                                                                                                            <select name="p_ext_1m" id="p_ext_1m" data-titulo="Extrem" data-seccion="Examen de 1 mes"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_ext_1m','div_p_ext_1m','obs_p_ext_1m',2);">
                                                                                                                <option selected value="1">Normales</option>
                                                                                                                <option value="2">Alteradas</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_p_ext_1m" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Extremidades</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Extrem" data-seccion="Examen de 1 mes"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_ext_1m" id="obs_p_ext_1m"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            @if(!empty($fichaTipo['ped_gen']))
                                                                                                                @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Control 1 mes</button>
                                                                                                    </div>
                                                                                                </div>

                                                                                        </div>

                                                                                        <!--2-5 MESES-->
                                                                                         <div class="tab-pane fade show" id="etdos" role="tabpanel" aria-labelledby="etdos-tab">

                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <h6 class="t-aten">Examen 2 a 5 meses</h6>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Caderas</label>
                                                                                                            <select name="cadera_25" id="cadera_25" data-titulo="Caderas" data-seccion="Examen 2 a 5 meses" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cadera_25','div_cadera_25','obs_cadera_25',2);">
                                                                                                                <option selected value="1">Normales</option>
                                                                                                                <option value="2">Alteradas</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_cadera_25" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Caderas</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Caderas"data-seccion="Examen 2 a 5 meses" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cadera_25" id="obs_cadera_25"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Columna</label>
                                                                                                            <select name="columna_25" id="columna_25" data-titulo="Columna"data-seccion="Examen 2 a 5 meses" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('columna_25','div_columna_25','obs_columna_25',2);">
                                                                                                                <option selected value="1">Normal</option>
                                                                                                                <option value="2">Alterada</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_columna_25" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Columna</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Columna"data-seccion="Examen 2 a 5 meses" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_columna_25" id="obs_columna_25"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Extremidades</label>
                                                                                                            <select name="p_ext_25" id="p_ext_25" data-titulo="Extrem"data-seccion="Examen 2 a 5 meses" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_ext_25','div_p_ext_25','obs_p_ext_25',2);">
                                                                                                                <option selected value="1">Normales</option>
                                                                                                                <option value="2">Alteradas</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_p_ext_25" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Extremidades</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Extrem" data-seccion="Examen 2 a 5 meses" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_ext_25" id="obs_p_ext_25"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-5 col-md-5">
                                                                                                        <div class="form-group">
                                                                                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="rx_cadera()";><i class="feather icon-file-text"></i> Solicitar Rx.Cadera</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-7 col-md-7">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Resultados Rx.</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Extrem" data-seccion="Examen 2 a 5 meses" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="result_rx_25" id="result_rx_25"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            @if(!empty($fichaTipo['ped_gen']))
                                                                                                                @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Control 2 a 5 meses</button>
                                                                                                    </div>
                                                                                                </div>

                                                                                        </div>

                                                                                        <!--6-11 MESES-->
                                                                                        <div class="tab-pane fade show" id="etseis" role="tabpanel" aria-labelledby="etseis-tab">

                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <h6 class="t-aten">Examen 6 a 11 meses</h6>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Caderas</label>
                                                                                                            <select name="cadera_611" id="cadera_611" data-titulo="Caderas" data-seccion="Examen 6 a 11 meses" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cadera_611','div_cadera_611','obs_cadera_611',2);">
                                                                                                                <option selected value="1">Normales</option>
                                                                                                                <option value="2">Alteradas</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_cadera_611" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Caderas</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Caderas" data-seccion="Examen 6 a 11 meses" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cadera_611" id="obs_cadera_611"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Columna</label>
                                                                                                            <select name="columna_611" id="columna_611" data-titulo="Columna" data-seccion="Examen 6 a 11 meses" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('columna_611','div_columna_611','obs_columna_611',2);">
                                                                                                                <option selected value="1">Normal</option>
                                                                                                                <option value="2">Alterada</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_columna_611" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Columna</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Columna" data-seccion="Examen 6 a 11 meses" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_columna_611" id="obs_columna_611"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Extremidades</label>
                                                                                                            <select name="p_ext_611" id="p_ext_611" data-titulo="Extrem" data-seccion="Examen 6 a 11 meses" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_ext_611','div_p_ext_611','obs_p_ext_611',2);">
                                                                                                                <option selected value="1">Normales</option>
                                                                                                                <option value="2">Alteradas</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_p_ext_611" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Extremidades</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Extrem" data-seccion="Examen 6 a 11 meses"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_ext_611" id="obs_p_ext_611"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            @if(!empty($fichaTipo['ped_gen']))
                                                                                                                @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Control 6 a 11 meses</button>
                                                                                                    </div>
                                                                                                </div>

                                                                                        </div>

                                                                                        <!--12-23 MESES-->
                                                                                        <div class="tab-pane fade show" id="etdoce" role="tabpanel" aria-labelledby="etdoce-tab">

                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <h6 class="t-aten">Examen 12 a 23 meses</h6>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Caderas</label>
                                                                                                            <select name="cadera_1223" id="cadera_1223" data-titulo="Caderas" data-seccion="Examen 12 a 23 meses" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cadera_1223','div_cadera_1223','obs_cadera_1223',2);">
                                                                                                                <option selected value="1">Normales</option>
                                                                                                                <option value="2">Alteradas</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_cadera_1223" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Caderas</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Caderas" data-seccion="Examen 12 a 23 meses" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cadera_1223" id="obs_cadera_1223"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Columna</label>
                                                                                                            <select name="columna_1223" id="columna_1223" data-titulo="Columna"data-seccion="Examen 12 a 23 meses" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('columna_1223','div_columna_1223','obs_columna_1223',2);">
                                                                                                                <option selected value="1">Normal</option>
                                                                                                                <option value="2">Alterada</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_columna_1223" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Columna</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Columna" data-seccion="Examen 12 a 23 meses" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_columna_1223" id="obs_columna_1223"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Extremidades</label>
                                                                                                            <select name="p_ext_1223" id="p_ext_1223" data-titulo="Extrem" data-seccion="Examen 12 a 23 meses" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_ext_1223','div_p_ext_1223','obs_p_ext_1223',2);">
                                                                                                                <option selected value="1">Normales</option>
                                                                                                                <option value="2">Alteradas</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_p_ext_1223" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Extremidades</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Extrem" data-seccion="Examen 12 a 23 meses" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_ext_1223" id="obs_p_ext_1223"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            @if(!empty($fichaTipo['ped_gen']))
                                                                                                                @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Control 12 a 23 meses</button>
                                                                                                    </div>
                                                                                                </div>

                                                                                        </div>

                                                                                        <!--2-4 AÑOS-->
                                                                                         <div class="tab-pane fade show" id="etdosa" role="tabpanel" aria-labelledby="etdosa-tab">

                                                                                               <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <h6 class="t-aten">Examen 2 a 4 años</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Marcha</label>
                                                                                                            <select name="marcha_24" id="marcha_24" data-titulo="Marcha" data-seccion="Examen 2 a 4 años" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('marcha_24','div_marcha_24','obs_marcha_24',2);">
                                                                                                                <option selected value="1">Normal</option>
                                                                                                                <option value="2">Alterada</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_marcha_24" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Marcha</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Marcha" data-seccion="Examen 2 a 4 años"rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_marcha_24" id="obs_marcha_24"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Pié Plano Flexible</label>
                                                                                                            <select name="ppf_24" id="ppf_24" data-titulo="Pié Plano Flexible" data-seccion="Examen 2 a 4 años"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ppf_24','div_ppf_24','obs_ppf_24',2);">
                                                                                                                <option selected value="1">No</option>
                                                                                                                <option value="2">Si</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_ppf_24" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Pié Plano Flexible</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Pié Plano Flexible" data-seccion="Examen 2 a 4 años" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ppf_24" id="obs_ppf_24"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Pié Plano Doloroso</label>
                                                                                                            <select name="p_ppd_24" id="p_ppd_24" data-titulo="Pié Plano Doloroso" data-seccion="Examen 2 a 4 años"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_ppd_24','div_p_ppd_24','obs_p_ppd_24',2);">
                                                                                                                <option selected value="1">No</option>
                                                                                                                <option value="2">Si</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_p_ppd_24" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Pié Plano Doloroso</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Pié Plano Doloroso" data-seccion="Examen 2 a 4 años" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_ppd_24" id="obs_p_ppd_24"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Genu Valgo</label>
                                                                                                            <select name="p_gv_24" id="p_gv_24" data-titulo="Genu Valgo" data-seccion="Examen 2 a 4 años"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_gv_24','div_p_gv_24','obs_p_gv_24',2);">
                                                                                                                <option selected value="1">No</option>
                                                                                                                <option value="2">Si</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_p_gv_24" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Genu Valgo</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Genu Valgo" data-seccion="Examen 2 a 4 años" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_gv_24" id="obs_p_gv_24"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Ang.Costa Bertani</label>
                                                                                                            <input type="text" data-titulo="Ang.Costa Bertani" data-seccion="Examen 2 a 4 años" class="form-control form-control-sm" name="p_24_angcostbertane" id="p_24_angcostbertane" placeholder="N=120-130°">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Ang.Calcáneo-Plantar</label>
                                                                                                            <input type="text" data-titulo="Ang.Calcáneo-Plantar" data-seccion="Examen 2 a 4 años" class="form-control form-control-sm" name="p_24_angcalcplant" id="p_24_angcalcplant" placeholder="N=<19°">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Ang.de Meary</label>
                                                                                                            <input type="text"data-titulo="Ang.de Meary" data-seccion="Examen 2 a 4 años" class="form-control form-control-sm" name="p_24_angmeary" id="p_24_angmeary" placeholder="N=>10°">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Ang.Astrágalo-Calcáneo</label>
                                                                                                            <input type="text"  data-titulo="Ang.Astrágalo-Calcáneo" data-seccion="Examen 2 a 4 años"   class="form-control form-control-sm" name="p_24_angastracalcaneo" id="p_24_angastracalcaneo" placeholder="N=>25-50°">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="rx_pie()";><i class="feather icon-file-text"></i> Solicitar Rx.Pié</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Resultado Rx.Pié</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Resultado Rx.Pié" data-seccion="Examen 6 a 9 años" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="p_24_result_rx" id="p_24_result_rx"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            @if(!empty($fichaTipo['ped_gen']))
                                                                                                                @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Control 2 a 4 años</button>
                                                                                                    </div>
                                                                                                </div>

                                                                                        </div>

                                                                                        <!--6-9 AÑOS-->
                                                                                        <div class="tab-pane fade show" id="etseisa" role="tabpanel" aria-labelledby="etseisa-tab">

                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <h6 class="t-aten">Examen 6 a 9 años</h6>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Marcha</label>
                                                                                                            <select name="marcha_69" id="marcha_69" data-titulo="Marcha" data-seccion="Examen 6 a 9 años"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('marcha_69','div_marcha_69','obs_marcha_69',2);">
                                                                                                                <option selected value="1">Normal</option>
                                                                                                                <option value="2">Alterada</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_marcha_69" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Marcha</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Marcha" data-seccion="Examen 6 a 9 años" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_marcha_69" id="obs_marcha_69"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Pié Plano Flexible</label>
                                                                                                            <select name="ppf_69" id="ppf_69" data-titulo="Pié Plano Flexible" data-seccion="Examen 6 a 9 años" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ppf_69','div_ppf_69','obs_ppf_69',2);">
                                                                                                                <option selected value="1">No</option>
                                                                                                                <option value="2">Si</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_ppf_69" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Pié Plano Flexible</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Pié Plano Flexible" data-seccion="Examen 6 a 9 años" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ppf_69" id="obs_ppf_69"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Pié Plano Doloroso</label>
                                                                                                            <select name="p_ppd_69" id="p_ppd_69" data-titulo="Pié Plano Doloroso" data-seccion="Examen 6 a 9 años" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_ppd_69','div_p_ppd_69','obs_p_ppd_69',2);">
                                                                                                                <option selected value="1">No</option>
                                                                                                                <option value="2">Si</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_p_ppd_69" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Pié Plano Doloroso</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Pié Plano Doloroso" data-seccion="Examen 6 a 9 años" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_ppd_69" id="obs_p_ppd_69"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-6 col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Genu Valgo</label>
                                                                                                            <select name="p_69_g_valgo" id="p_69_g_valgo" data-titulo="Genu Valgo" data-seccion="Examen 6 a 9 años" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_g_valgo','div_p_69_g_valgo','obs_p_69_g_valgo',2);">
                                                                                                                <option selected value="1">No</option>
                                                                                                                <option value="2">Si</option>
                                                                                                                <option value="3">No Realizado</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6">
                                                                                                        <div class="form-group" id="div_p_69_g_valgo" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Genu Valgo</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Genu Valgo" data-seccion="Examen 6 a 9 años" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_69_g_valgo" id="obs_p_69_g_valgo"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Ang.Costa Bertani</label>
                                                                                                            <input type="text" data-titulo="Ang.Costa Bertani" data-seccion="Examen 6 a 9 años" class="form-control form-control-sm" name="p_69_angcosbertani" id="p_69_angcosbertani" placeholder="N=120-130°">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Ang.Calcáneo-Plantar</label>
                                                                                                            <input type="text" data-titulo="Ang.Calcáneo-Plantar" data-seccion="Examen 6 a 9 años" class="form-control form-control-sm" name="p_69_ang_calplantar" id="p_69_ang_calplantar" placeholder="N=<19°">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Ang.de Meary</label>
                                                                                                            <input type="text" data-titulo="Ang.de Meary" data-seccion="Examen 6 a 9 años" class="form-control form-control-sm" name="p_69_ang_meary" id="p_69_ang_meary" placeholder="N=>10°">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Ang.Astrágalo-Calcáneo</label>
                                                                                                            <input type="text" data-titulo="Ang.Astrágalo-Calcáneo" data-seccion="Examen 6 a 9 años" class="form-control form-control-sm" name="p_69_angastracalcaneo" id="p_69_angastracalcaneo" placeholder="N=>25-50°">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="rx_pie()";><i class="feather icon-file-text"></i> Solicitar Rx.Pié</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Resultado Rx.Pié</label>
                                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Resultado Rx.Pié" data-seccion="Examen 6 a 9 años" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="p_69_result_rx" id="p_69_result_rx"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            @if(!empty($fichaTipo['ped_gen']))
                                                                                                                @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Control 6 a 9 meses</button>
                                                                                                    </div>
                                                                                                </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--EXAMEN FISICO-->
                                                                        <div class="tab-pane fade show"  id="e-segment-traumato" role="tabpanel" aria-labelledby="e-segment-traumato-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">EXAMEN SEGMENTARIO TRAUMATOLÓGICO</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Cabeza y cuello</label>
                                                                                        <select name="exfis_cabcuello" id="exfis_cabcuello" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('exfis_cabcuello','div_exfis_cabcuello','obs_exfis_cabcuello',2)">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                            <option value="3">No Examinador</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_exfis_cabcuello" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir Anormalidad</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_exfis_cabcuello" id="obs_exfis_cabcuello"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Columna</label>
                                                                                        <select name="e_columna" id="e_columna" data-titulo="Columna" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_columna','div_e_columna','obs_e_columna',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Alterado Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_columna" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir examen de Columna</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Columna" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_columna" id="obs_e_columna"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Parrilla Costal</label>
                                                                                        <select name="e_parrilla" id="e_parrilla" data-titulo="Parrilla Costal" data-seccion="Examen Segmentario"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_parrilla','div_e_parrilla','obs_e_parrilla',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal(describir)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_parrilla" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Parrilla Costal</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Parrilla Costal" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_parrilla" id="obs_e_parrilla"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Extremidades Superiores</label>
                                                                                        <select name="e_ext_sup" id="e_ext_sup" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_ext_sup','div_e_ext_sup','obs_e_ext_sup',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_ext_sup" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Extremidades Superiores</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_ext_sup" id="obs_e_ext_sup"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Pélvis</label>
                                                                                        <select name="e_pelvis" id="e_pelvis" data-titulo="Pélvis" class="form-control form-control-sm"data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('e_pelvis','div_e_pelvis','obs_e_pelvis',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_pelvis" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Pélvis</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Pélvis" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_pelvis" id="obs_e_pelvis"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Extremidades Inferiores</label>
                                                                                        <select name="e_extinfer" id="e_extinfer" data-titulo="Extremidadess Inferiores" class="form-control form-control-sm" data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('e_extinfer','div_e_extinfer','obs_e_extinfer',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_extinfer" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Extremidades Inferiores</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_extinfer" id="obs_e_extinfer"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Tendones y ligamentos</label>
                                                                                        <select name="e_tend_lig" id="e_tend_lig" data-titulo="Tendones y ligamentos" class="form-control form-control-sm"data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('e_tend_lig','div_e_tend_lig','obs_e_tend_lig',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_tend_lig" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Tendones y ligamentos</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Tendones y ligamentos" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_tend_lig" id="obs_e_tend_lig"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Otros del Examen Físico</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Otros del Examen Físico" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_tra_fisico" id="obs_ex_tra_fisico"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['ped_gen']))
                                                                                            @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Ex.físico</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--ESGUINCESFRACTURASTUMORES-->
                                                                        <div class="tab-pane fade show" id="e-traumato" role="tabpanel" aria-labelledby="e-traumato-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten ">Esguinces</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Causa</label>
                                                                                        <select name="t_causa_acc_esg" data-titulo="Causa" data-seccion="Esguinces" id="t_causa_acc_esg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('t_causa_acc_esg','div_t_causa_acc_esg','obs_t_causa_acc_esg',2);">
                                                                                            <option selected  value="1">Accidente</option>
                                                                                            <option value="2">Otro</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_t_causa_acc_esg" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Causa <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" data-titulo="Causa" data-seccion="Esguinces" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_t_causa_acc_esg" id="obs_t_causa_acc_esg"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Tipo de lesión</label>
                                                                                        <select name="tipo_lesion_esg" id="tipo_lesion_esg" data-titulo="Signos y Síntomas" data-seccion="Esguinces" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_lesion_esg','div_tipo_lesion_esg','obs_tipo_lesion_esg',3);">
                                                                                            <option selected value="1">Esguince Simple</option>
                                                                                            <option selected value="2">Esguince Complicado</option>
                                                                                            <option value="3">Otros Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_tipo_lesion_esg" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Tipo de lesión <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Signos y Síntomas" data-seccion="Esguinces" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_lesion_esg" id="obs_tipo_lesion_esg"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Signos y Síntomas</label>
                                                                                        <select name="signos_sintomas_esg" id="signos_sintomas_esg" data-titulo="Signos y Síntomas" data-seccion="Esguinces" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('signos_sintomas_esg','div_signos_sintomas_esg','obs_signos_sintomas_esg',3);">
                                                                                            <option selected value="1">Solo dolor</option>
                                                                                            <option selected value="2">Dolor y deformidad</option>
                                                                                            <option value="3">Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_signos_sintomas_esg" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Signos y Síntomas <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Signos y Síntomas" data-seccion="Esguinces" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_signos_sintomas_esg" id="obs_signos_sintomas_esg"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Complicaciones</label>
                                                                                        <select name="complic_esg" id="complic_esg" data-titulo="Signos y Síntomas" data-seccion="Esguinces" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('complic_esg','div_complic_esg','obs_complic_esg',2);">
                                                                                            <option selected value="1">No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_complic_esg" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Complicaciones <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Signos y Síntomas" data-seccion="Esguinces" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_complic_esg" id="obs_complic_esg"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Localización</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Localización" data-seccion="Esguinces" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="localizacion_esguince" id="localizacion_esguince"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Plan de tratamiento</label>
                                                                                        <select name="plan_tto_esg" id="plan_tto_esg" data-titulo="Plan de tratamiento" data-seccion="Esguinces" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('plan_tto_esg','div_plan_tto_esg','obs_plan_tto_esg',3);">
                                                                                            <option selected value="1">Inmovilización</option>
                                                                                            <option selected value="2">Cirugía</option>
                                                                                            <option value="3">Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_plan_tto_esg" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Describir Otro tratamiento <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Otro Plan de tratamiento " data-seccion="Esguinces" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tto_esg" id="obs_plan_tto_esg"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Obs. Esguinces </label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Esguinces" data-seccion="Esguinces" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_esguince" id="obs_esguince"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-5">
                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['ped_gen']))
                                                                                            @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-5">
                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-5">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Esguinces</button>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten ">Fracturas</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Causa</label>
                                                                                        <select name="t_causa_acc_fx" data-titulo="Causa" data-seccion="Fracturas" id="t_causa_acc_fx" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('t_causa_acc_fx','div_t_causa_acc_fx','obs_t_causa_acc_fx',2);">
                                                                                            <option selected  value="1">Accidente</option>
                                                                                            <option value="2">Otro</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_t_causa_acc_fx" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Causa <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" data-titulo="Causa" data-seccion="Fracturas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_t_causa_acc_fx" id="obs_t_causa_acc_fx"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Tipo de lesión</label>
                                                                                        <select name="tipo_lesion_fx" id="tipo_lesion_fx" data-titulo="Tipo de lesión" data-seccion="Fracturas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_lesion_fx','div_tipo_lesion_fx','obs_tipo_lesion_fx',3);">
                                                                                            <option selected value="1">Fractura Simple</option>
                                                                                            <option selected value="2">Fractura Expuesta y Complicada</option>
                                                                                            <option value="3">Otros Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_tipo_lesion_fx" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Tipo de lesión <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Tipo de lesión" data-seccion="Fracturas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_lesion_fx" id="obs_tipo_lesion_fx"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Signos y Síntomas</label>
                                                                                        <select name="signos_sintomas_fx" id="signos_sintomas_fx" data-titulo="Signos y Síntomas" data-seccion="Fracturas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('signos_sintomas_fx','div_signos_sintomas_fx','obs_signos_sintomas_fx',2);">
                                                                                            <option selected value="1">Solo dolor</option>
                                                                                            <option value="2">Atros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_signos_sintomas_fx" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Signos y Síntomas <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Signos y Síntomas" data-seccion="Fracturas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_signos_sintomas_fx" id="obs_signos_sintomas_fx"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Complicaciones</label>
                                                                                        <select name="complic_fx" id="complic_fx" data-titulo="Complicaciones" data-seccion="Fracturas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('complic_fx','div_complic_fx','obs_complic_fx',3);">
                                                                                            <option selected value="1">Lento e Indoloro</option>
                                                                                            <option value="2">Rápido e Indoloro</option>
                                                                                            <option value="3">Otros Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_complic_fx" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Complicaciones <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Desc.Complicaciones" data-seccion="Fracturas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_complic_fx" id="obs_complic_fx"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Localización</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Localización" data-seccion="Fracturas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="local_fx" id="local_fx"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Plan de tratamiento</label>
                                                                                        <select name="plan_tto_fx" id="plan_tto_fx" data-titulo="Plan de tratamiento" data-seccion="Esguinces" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('plan_tto_fx','div_plan_tto_fx','obs_plan_tto_fx',3);">
                                                                                            <option selected value="1">Inmovilización</option>
                                                                                            <option selected value="2">Cirugía</option>
                                                                                            <option value="3">Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_plan_tto_fx" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Describir Otro tratamiento <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Otro Plan de tratamiento " data-seccion="Esguinces" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tto_fx" id="obs_plan_tto_fx"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Obs Fracturas</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Fracturas" data-seccion="Fracturas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_fracturas" id="obs_fracturas"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-5">
                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['ped_gen']))
                                                                                            @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-5">
                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-5">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Fracturas</button>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten ">Masas y Tumores</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Localización</label>
                                                                                        <select name="ex_loc_tumo" data-titulo="Localización" data-seccion="Masas y Tumores" id="ex_loc_tumo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_loc_tumo','div_ex_loc_tumo','obs_ex_loc_tumo',2);">
                                                                                            <option selected  value="1">Ex. No Realizado</option>
                                                                                            <option value="2">descrip. Localización</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_ex_loc_tumo" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Localización <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" data-titulo="Localización" data-seccion="Masas y Tumores" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_loc_tumo" id="obs_ex_loc_tumo"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Signos y Síntomas</label>
                                                                                        <select name="e_signos_sint_tu" id="e_signos_sint_tu" data-titulo="Signos y Síntomas" data-seccion="Masas y Tumores" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_signos_sint_tu','div_e_signos_sint_tu','obs_e_signos_sint_tu',2);">
                                                                                            <option selected value="1">NO</option>
                                                                                            <option value="2">SI</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_signos_sint_tu" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Signos y Síntomas <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Signos y Síntomas" data-seccion="Masas y Tumores" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_signos_sint_tu" id="obs_e_signos_sint_tu"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Crecimiento</label>
                                                                                        <select name="e_crec_tu" id="e_crec_tu" data-titulo="Crecimiento" data-seccion="Masas y Tumores" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_crec_tu','div_e_crec_tu','obs_e_crec_tu',3);">
                                                                                            <option selected value="1">Lento e Indoloro</option>
                                                                                            <option value="2">Rápido e Indoloro</option>
                                                                                            <option value="3">Otros Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_crec_tu" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Crecimiento <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Obs.Crecimiento" data-seccion="Masas y Tumores" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_crec_tu" id="obs_e_crec_tu"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Plan de tratamiento</label>
                                                                                        <select name="plan_tto_tu" id="plan_tto_tu" data-titulo="Plan de tratamiento" data-seccion="Esguinces" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('plan_tto_tu','div_plan_tto_tu','obs_plan_tto_tu',4);">
                                                                                            <option selected value="1">Radioterápia</option>
                                                                                            <option selected value="2">Quimioterápia</option>
                                                                                            <option selected value="3">Cirugía</option>
                                                                                            <option value="4">Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_plan_tto_tu" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Describir Otro tratamiento <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Otro Plan de tratamiento " data-seccion="Esguinces" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tto_tu" id="obs_plan_tto_tu"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Obs. Masas y Tumores</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Masas y Tumores" data-seccion="Masas y Tumores" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_masas_tu" id="obs_ex_masas_tu"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-5">
                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['ped_gen']))
                                                                                            @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-5">
                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-5">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Tumores</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--ORTOPEDIA-->
                                                                        <div class="tab-pane fade show" id="ortopedia" role="tabpanel" aria-labelledby="ortopedia-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-2">
                                                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                      <button class="btn nav-link-aten-b active" id="ortopedia-lactante-tab" data-toggle="pill" data-target="#ortopedia-lactante" type="button" role="tab" aria-controls="ortopedia-lactante" aria-selected="true">Ortopedia del lactante</button>
                                                                                      <button class="btn nav-link-aten-b" id="ortopedia-infante-tab" data-toggle="pill" data-target="#ortopedia-infante" type="button" role="tab" aria-controls="ortopedia-infante" aria-selected="false">Ortopedia del infante</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                        <input type="hidden" name="tipo_ortopedia" id="tipo_ortopedia">

                                                                                        <!--ORTOPEDIA DEL LACTANTE-->
                                                                                        <div class="tab-pane fade show active" id="ortopedia-lactante" role="tabpanel" aria-labelledby="ortopedia-lactante-tab">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                     <h6 class="t-aten-dos">Ortopedia</h6>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <h6 class="t-aten">Ortopedia del lactante</h6>
                                                                                                </div>
                                                                                                <!--GENERAL-->
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <h6 class="badge badge-primary-light">GENERAL</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Peso</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="orto_peso_lac" id="orto_peso_lac">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Talla</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="orto_talla_lac" id="orto_talla_lac">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Movilidad Espontánea</label>
                                                                                                        <select name="e_orto_lact_mov" id="e_orto_lact_mov" data-titulo="Movilidad Espontánea" data-seccion="Ortopedia del lactante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_orto_lact_mov','div_e_orto_lact_mov','obs_e_orto_lact_mov',2);">
                                                                                                            <option selected value="1">Normal</option>
                                                                                                            <option value="2">Alterado Describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_e_orto_lact_mov" style="display:none">
                                                                                                        <label class="floating-label-activo-sm"> Describir Movilidad Espontánea</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Movilidad Espontánea" data-seccion="Ortopedia del lactante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_orto_lact_mov" id="obs_e_orto_lact_mov"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!--EXPLORACION AXIAL-->
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="badge badge-primary-light">Exploración Axial</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Movilidad cervical</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Movilidad cervical" data-seccion="Exploración Axial" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="mov_cerv_ortolact" id="mov_cerv_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Musc Esternocleidomastoídeo</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Musc Esternocleidomastoídeo" data-seccion="Exploración Axial" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ecm_ortolact" id="ecm_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Test de Adams</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Test de Adams" data-seccion="Exploración Axial" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="test_adams_ortolact" id="test_adams_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Angiomas vellosidades etc.</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Angiomas vellosidades etc." data-seccion="Exploración Axial" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="angvellos_ortolact" id="angvellos_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Cifosis Lumbar</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Cifosis Lumbar" data-seccion="Exploración Axial" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="cifosis_lumbar_ortolact" id="cifosis_lumbar_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!--EXPLORACIÓN PERIFÉRICA MB. SUPERIOR-->
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="badge badge-primary-light">Exploración Periférica Mb. Superior</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Flexo-extensión de codo</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Flexo-extensión de codo" data-seccion="Exploración Periférica Mb. Superior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="flexoext_codo_ortolact" id="flexoext_codo_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Dedo en resorte</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Dedo en resorte" data-seccion="Exploración Periférica Mb. Superior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="dedo_resorte_ortolact" id="dedo_resorte_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Rigidez</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Rigidez" data-seccion="Exploración Periférica Mb. Superior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="rigidez_ortolact" id="rigidez_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!--EXPLORACIÓN PERIFÉRICA MB. INFERIOR-->
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="badge badge-primary-light">Exploración Periférica Mb. Inferior</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Cadera M. de Ortolani Barlow</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Exploración Periférica Mb. Inferior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="caderas_ortolact" id="caderas_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Abducción</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Exploración Periférica Mb. Inferior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="abd_ortolact" id="abd_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Pliegues Poplíteos</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Exploración Periférica Mb. Inferior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="pliegues_ortolacr" id="pliegues_ortolacr"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Rodillas Flexo recurvatum</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Exploración Periférica Mb. Inferior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="rodillas_ortolact" id="rodillas_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Pié Flexión dorsal</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Exploración Periférica Mb. Inferior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="pie_flexdors_ortolact" id="pie_flexdors_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Aspecto plantar</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Aspecto plantar" data-seccion="Exploración Periférica Mb. Inferior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="plantar_ortolact" id="plantar_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Pié Valgo / Varo de retropíe</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Pié Valgo / Varo de retropíe" data-seccion="Exploración Periférica Mb. Inferior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="pie_valvaro_retro_ortolact" id="pie_valvaro_retro_ortolact"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <label class="floating-label-activo-sm">Observaciones ortopedia del lactante</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones ortopedia del lactante" data-seccion="Observaciones ortopedia del lactante"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_ortopedia_ortolact" id="obs_ex_ortopedia_ortolact"></textarea>
                                                                                                </div>


                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                        <option value="">Seleccione</option>
                                                                                                        @if(!empty($fichaTipo['ped_gen']))
                                                                                                            @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Ortopedia Lactantes</button>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <!--ORTOPEDIA DEL INFANTE-->
                                                                                        <div class="tab-pane fade show" id="ortopedia-infante" role="tabpanel" aria-labelledby="ortopedia-infante-tab">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <h6 class="t-aten-dos">Ortopedia</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <h6 class="t-aten">Ortopedia del infante</h6>
                                                                                                </div>
                                                                                                    <!--GENERAL-->
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <h6 class="badge badge-primary-light">GENERAL</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Peso</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="peso_ortoinf" id="peso_ortoinf">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Talla</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="talla_ortoinf" id="talla_ortoinf">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Manipulación</label>
                                                                                                        <select name="e_orto_inf_manip" id="e_orto_inf_manip" data-titulo="Manipulación" data-seccion="Ortopedia del infante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_orto_inf_manip','div_e_orto_inf_manip','obs_e_orto_inf_manip',2);">
                                                                                                            <option selected value="1">Normal</option>
                                                                                                            <option value="2">Alterado Describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_e_orto_inf_manip" style="display:none">
                                                                                                        <label class="floating-label-activo-sm"> Describir Manipulación</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Movilidad Espontánea" data-seccion="Ortopedia del lactante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_orto_inf_manip" id="obs_e_orto_inf_manip"></textarea>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <!--EXPLORACIÓN AXIAL-->
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="badge badge-primary-light">Exploración axial</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Movilidad vertebral</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Movilidad vertebral" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="mov_vert_ortoinf" id="mov_vert_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Ritmo Lumbo-Pélvico</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Ritmo Lumbo-Pélvico" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ritmo_lumbosac_ortoinf" id="ritmo_lumbosac_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">indice Cif / Lord Sagital</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Indice Cif / Lord Sagital" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="indicecif_ortoinf" id="indicecif_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">irritación radicular</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Irritación radicular" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="irrit_radicular_ortoinf" id="irrit_radicular_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Neurológico basico</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Neurológico basico" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_neuro_bas_ortoinf" id="ex_neuro_bas_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!--EXPLORACIÓN PERIFÉRICA-->
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="badge badge-primary-light">Exploración periférica</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">balance articular (inclinómetro)</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="balance articular" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="balance_art_ortoinf" id="balance_art_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Balance muscular manual</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Balance muscular manual" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="balance_musc_ortoinf" id="balance_musc_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Hiperlaxitud articular</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Hiperlaxitud articular" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="hiperlaxart_ortoinf" id="hiperlaxart_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Dismetría de miembros inferiores</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Dismetría de miembros inferiores" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="dismetriamsup_ortoinf" id="dismetriamsup_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Signos inflamatorios</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Signos inflamatorios" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="sig_inf_ortoinf" id="sig_inf_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Test clinicos</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Test clinicos" data-seccion="Ortopedia del infante" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="test_clin_ortoinf" id="test_clin_ortoinf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <label class="floating-label-activo-sm">Observaciones ortopedia del infante</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. ortopedia del infante" data-seccion="Ortopedia del infante"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_ortoinf" id="obs_ex_ortoinf"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                                        <option value="">Seleccione</option>
                                                                                                        @if(!empty($fichaTipo['ped_gen']))
                                                                                                            @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Ortopedia Infantes</button>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--ATENCIÓN QUEMADOS-->
                        <div class="tab-pane fade show " id="atencion_quemados_gen" role="tabpanel" aria-labelledby="atencion_quemados_gen-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-2 mb-0">
                                            <h5 class="f-18 text-c-blue mb-3">Ficha paciente quemado pediátrico </h5>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->

                                        <!--MOTIVO CONSULTA-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="motivo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten-a shadow-none">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Síntoma principal de consulta</label>
                                                                    <select name="sintoma_cons_ped_quem" id="sintoma_cons_ped_quem" data-titulo="sintoma principal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sintoma_cons_ped_quem','div_obs_sintoma_cons_quem','obs_sintoma_cons_quem',4)">
                                                                        <option value="0">Seleccione causa</option>
                                                                        <option value="1">Accidente doméstico</option>
                                                                        <option value="2">Accidente automovilístico</option>
                                                                        <option value="3">Incendio</option>
                                                                        <option value="4">Otro </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_obs_sintoma_cons_quem" style="display:none">
                                                                    <label class="floating-label-activo-sm">Describa otro signo o síntoma</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Sintoma" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sintoma_cons_quem" id="obs_sintoma_cons_quem"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                <input type="text" class="form-control form-control-sm" name="motivo_ped_quem" id="motivo_ped_quem">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Antecedentes cirugías especialidad</label>
                                                                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="antec_especialidad_ped_quem" id="antec_especialidad_ped_quem"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Antecedentes generales especialidad</label>
                                                                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="antec_especialidad_gen_quem" id="antec_especialidad_gen_quem"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--EXAMEN PACIENTE QUEMADO-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_quemados">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_quemados_c" aria-expanded="false" aria-controls="exam_esp_quemados_c">
                                                        Examen paciente quemado
                                                    </button>
                                                </div>
                                                <div id="exam_esp_quemados_c" class="collapse" aria-labelledby="exam_esp_quemados" data-parent="#exam_esp_quemados">
                                                    <div class="card-body-aten-a shadow-none">
                                                        <div id="form-pediatria">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-quemados" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="quemados-evaluacion-tab" data-toggle="tab" href="#quemados-evaluacion" role="tab" aria-controls="quemados-evaluacion" aria-selected="true">Evaluación de la Quemadura</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="planif_quemados_tto-tab" data-toggle="tab" href="#planif_quemados_tto" role="tab" aria-controls="planif_quemados_tto" aria-selected="false">Planificación de tratamiento</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="ev-quemados">
                                                                        <!--EVALUACION-->
                                                                        <div class="tab-pane fade show active" id="quemados-evaluacion" role="tabpanel" aria-labelledby="quemados-evaluacion-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">Causa</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Etiología de Quemadura</label>
                                                                                        <select name="e_etiologia" id="e_etiologia" data-titulo="Etiología de Quemadura" data-seccion="Quemados" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_etiologia','div_e_etiologia','obs_e_etiologia',13)">
                                                                                            <option value="0" >Seleccione causa </option>
                                                                                            <optgroup label='Temperatura:'>
                                                                                                <option value="1" >Calor </option>
                                                                                                <option value="2" >Frío</option>
                                                                                            </optgroup>
                                                                                            <optgroup label='Eléctricas:'>
                                                                                                <option value="3"> Alto</option>
                                                                                                <option value="4"> Bajo</option>
                                                                                            </optgroup>
                                                                                            <optgroup label=' Radiantes:'>
                                                                                                <option value="5"> Rayos UV </option>
                                                                                                <option value="6"> Rayos X</option>
                                                                                                <option value="7"> Energía atómica</option>
                                                                                            </optgroup>
                                                                                            <optgroup label='Químicos:'>
                                                                                                <option value="8"> Ácidos, </option>
                                                                                                <option value="9"> Álcalis</option>
                                                                                            </optgroup>
                                                                                            <optgroup label=' Biológicos:'>
                                                                                                <option value="10"> Insectos  </option>
                                                                                                <option value="11"> Medusas</option>
                                                                                                <option value="12">  Peces</option>
                                                                                            </optgroup>
                                                                                            <optgroup label='Otros:'>
                                                                                                <option value="13"> Otros Describir</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_etiologia" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir Otra etiología</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.  Otra etiología" data-seccion="Quemados" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_etiologia" id="obs_e_etiologia"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Zona Especial</label>
                                                                                        <select name="e_zona_esp" id="e_zona_esp" data-titulo="Zona Especial" data-seccion="Quemados" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_zona_esp','div_e_zona_esp','obs_e_zona_esp',9)">
                                                                                            <option value="0">Seleccione Zona</option>
                                                                                            <option value="1">Cabeza</option>
                                                                                            <option value="2">Cuello</option>
                                                                                            <option value="3">Manos</option>
                                                                                            <option value="4">Pies</option>
                                                                                            <option value="5">Pliegues</option>
                                                                                            <option value="6">Genitales</option>
                                                                                            <option value="7">Mamas</option>
                                                                                            <option value="8">Periné</option>
                                                                                            <option value="9">Otros describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_zona_esp" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir Zona Especial</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Zona Especial" data-seccion="Quemados"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_zona_esp" id="obs_e_zona_esp"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Zona neutra</label>
                                                                                        <select name="e_zona_neutra" id="e_zona_neutra" data-titulo="Zona neutra" data-seccion="Quemados" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_zona_neutra','div_e_zona_neutra','obs_e_zona_neutra',3);">
                                                                                            <option selected value="0">Seleccione Zona</option>
                                                                                            <option selected value="1">Tronco</option>
                                                                                            <option selected value="2">Extremidades</option>
                                                                                            <option value="3">Otra Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_zona_neutra" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir zona neutra</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.zona neutra" data-seccion="Quemados" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_zona_neutra" id="obs_e_zona_neutra"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">Profundidad de la quemadura</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Profundidad de la quemadura</label>
                                                                                        <select name="e_prof_quem" id="e_prof_quem" data-titulo="Profundidad de la quemadura" data-seccion="Quemados" class="form-control form-control-sm">
                                                                                            <option value="0">Seleccione Profundidad</option>
                                                                                            <option value="1">Tipo A</option>
                                                                                            <option value="2">Tipo AB A</option>
                                                                                            <option value="3">Tipo AB B</option>
                                                                                            <option value="4">Tipo B</option>
                                                                                        </select>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="tipo_quemadura()";><i class="feather icon-info"></i> Tipo quemadura</button>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Superficie quemada</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="sup_quem" id="sup_quem">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="sup_quemada()";><i class="feather icon-info"></i> Superficie quemada</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Indice de gravedad</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="ind_gravedad_garces" id="ind_gravedad_garces" data-titulo="Superficie quemada" data-seccion="Quemados">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="gravedad_garces()";><i class="feather icon-info"></i> Indice de Gravedad Garcés</button>
                                                                                    </div>
                                                                                    @include("atencion_pediatrica.formularios.modal_atencion_especialidad.cirugia.gravedad_garces")
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Observaciones examen</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Examen" data-seccion="Quemados"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_segmentario" id="obs_ex_segmentario"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['ped_gen']))
                                                                                            @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Quemados</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--PLAN TRATAMIENTO-->
                                                                        <div class="tab-pane fade show" id="planif_quemados_tto" role="tabpanel" aria-labelledby="planif_quemados_tto-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">Planificación de Tratamiento</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">¿Es Urgente Aséo Quirúrgico?</label>
                                                                                        <select name="urgencia_quem" id="urgencia_quem_ped" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_quem_ped','div_detalle_urgencia_quem_ped','obs_urgencia_quem_ped',2);">
                                                                                            <option value="1" selected>No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-12" id="div_detalle_urgencia_quem_ped" style="display:none">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Detalle Urgencia Qx</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_urgencia_quem_ped" id="obs_urgencia_quem_ped"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Requiere Hospitalizar?</label>
                                                                                        <select name="hosp_quem" id="hosp_quem_ped" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hosp_quem_ped','div_detalle_hosp_quem_ped','obs_hosp_quem_ped',2);">
                                                                                            <option value="1" selected>No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-12" id="div_detalle_hosp_quem_ped" style="display:none">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Requiere Hospitalizar en:</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_quem_ped" id="obs_hosp_quem_ped"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Otro Procedimiento o Tratamiento</label>
                                                                                        <select name="otrotto_quem_ped" id="otrotto_quem_ped" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otrotto_quem_ped','div_otrotto_quem_ped','obs_otrotto_quem_ped',2);">
                                                                                            <option value="1" selected>No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-12" id="div_otrotto_quem_ped" style="display:none">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Otro Procedimiento o Tratamiento</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otrotto_quem_ped" id="obs_otrotto_quem_ped"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Obs. Plan de tratamiento</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Estado nutricional y vacunas" data-seccion="Estado nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_quem" id="obs_plan_quem"></textarea>
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
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SECCIONES GENERALES -->
                        <div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales-tab">
                            <div class="row">
                                <!--HOSPITALIZACION-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                                </div>

                                <!-- CONTROL POST QUIRURGICO -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="post-qx">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#post-qx-c" aria-expanded="false" aria-controls="post-qx-c">
                                                Control Post Quirúrgico
                                            </button>
                                        </div>
                                        <div id="post-qx-c" class="collapse" aria-labelledby="post-qx" data-parent="#post-qx">
                                            <div class="card-body-aten-a shadow-none">

                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Estado general</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Estado General" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eg_cpq_cg" id="eg_cpq_cg"></textarea>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Herida operatoria curación</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="hoc_cpa_cg" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="hoc_cpa_cg" id="hoc_cpa_cg"></textarea>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Masas palpables</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="masas_cpq_cg" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="masas_cpq_cg" id="masas_cpq_cg"></textarea>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Observaciones estado general paciente</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Estado general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_egp_cpq_cg" id="obs_egp_cpq_cg"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Formulario / Signos vitales y otros-->
                                @include('general.secciones_ficha.signos_vitales')

                                <!--CRONICOS / GES / CONFIDENCIAL -->
                                @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')

                                <!--DIAGNÓSTICO -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="diag-cg">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open" type="button" data-toggle="collapse" data-target="#diag-cg-c" aria-expanded="false" aria-controls="diag-cg-c">
                                                Diagnóstico
                                            </button>
                                        </div>
                                        <div id="diag-cg-c" class="collapse" aria-labelledby="diag-cg" data-parent="#diag-cg">
                                            <div class="card-body-aten-a shadow-none">

                                                <div class="form-row">
                                                     <div class="form-group col-md-4">
														<label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
														<input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado,eno_diagnositico_confirmado" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" >
													</div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Indicaciones</label>
                                                        <input type="text" class="form-control form-control-sm" name="ind_esp_cirugia" id="ind_esp_cirugia">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="descripcion_cie_esp" id="descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie_esp');">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="id_descripcion_cie_esp" id="id_descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie_esp');">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
								{{--  div de botones  --}}

								<div class="col-sm-12 col-md-12">
									<div class="card">
										<div class="card-body">
											<!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
											@include('general.secciones_ficha.seccion_receta_examen_comunes')
											<!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
										</div>

										<!--GUARDAR O IMPRIMIR FICHA-->

										<div class="col-md-12 text-center" style=" margin-top:25px;">
											<input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
											<input type="submit" class="btn btn-success  mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
										</div>
									</div>
								</div>

                            </div>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

@include("atencion_pediatrica.formularios.modal_atencion_especialidad.cirugia.tipo_quemadura")
@include("atencion_pediatrica.formularios.modal_atencion_especialidad.cirugia.tipo_sup_quemada")
@include("atencion_pediatrica.formularios.modal_atencion_especialidad.cirugia.gravedad_garces")
@include('atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.indicar_rx_pie')
@include('atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.indicar_rx_cadera')

@section('page-script-ficha-atencion')
    <script>
        $(document).ready(function() {

            /** fin formulario pestaña 1 */
            $("#descripcion_cie_esp").autocomplete({
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
                    $('#descripcion_cie_esp').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie_esp').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

        })




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
                            $('#solicitado_por_nombre_eda').val('');
                            $('#solicitado_por_apellido_eda').val('');
                            $('#solicitado_por_telefono_eda').val('');
                            $('#solicitado_por_email_eda').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_eda').val('');
                            $('#solicitado_por_apellido_eda').val('');
                            $('#solicitado_por_telefono_eda').val('');
                            $('#solicitado_por_email_eda').val('');
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
        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
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

        function abrir_modal_guardar_tipo(div_id_data, div_id_detalle,tipo)
        {
            if(tipo == 'cdg')
            {
                $('#btn_modal_registrar_ficha_tipo_dg').click(function(){
                    guardar_tipo_ficha_cdg();
                });
            }
            else if(tipo == 'cg')
            {
                $('#btn_modal_registrar_ficha_tipo_dg').click(function(){
                    guardar_tipo_ficha_cg();
                });
            }
            $('#modal_registrar_ficha_tipo_dg').modal('show');

            cargarSeccion(div_id_detalle,div_id_data);
        }

        function cargarSeccion(div_destino, div_data)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            $('#'+div_data).find('select,textarea').each(function(key, elemento){
                html ='';
                html +='<div class="row" style="margin-top:10px;">';
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-4">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                }
                else if($(elemento).prop('nodeName') == 'TEXTAREA')
                {
                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-6">';
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
            });
        }

        function cambiar_div(mostrar, ocultar, label, textarea){
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }

		/** CARGAR mensaje */
		$('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es  opcional');
		$('#mensaje_ficha').show();
		setTimeout(function(){
			$('#mensaje_ficha').hide();
		}, 5000);

        function guardar_tipo_ficha_cdg()
        {
            var registro_f_t_cg_nombre = $('#registro_f_t_cg_nombre').val();
            var registro_f_t_cg_descripcion = $('#registro_f_t_cg_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_cg_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_cg_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_cg_nombre = registro_f_t_cg_nombre;
            data.registro_f_t_cg_descripcion = registro_f_t_cg_descripcion;

            $('#registro_f_t_cg_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_cdg') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_cg_nombre,
                    descripcion : data.registro_f_t_cg_descripcion,
                    dolor_cdg : data.modal_agregar_tipo_dolor_cdg,
                    obs_dolor_cdg : data.observaciones_obs_dolor_cdg,
                    dolor_cdg : data.modal_agregar_tipo_dolor_cdg,
                    obs_dolor_cdg : data.observaciones_obs_dolor_cdg,
                    otros_sintomas_cdg : data.modal_agregar_tipo_otros_sintomas_cdg,
                    obs_otros_sintomas_cdg : data.observaciones_obs_otros_sintomas_cdg,
                    ceg_cdg : data.modal_agregar_tipo_ceg_cdg,
                    obs_ceg_cdg : data.observaciones_obs_ceg_cdg,
                    masa_cdg : data.modal_agregar_tipo_masa_cdg,
                    obs_masa_cdg : data.observaciones_obs_masa_cdg,
                    urgencia_cdg : data.modal_agregar_tipo_urgencia_cdg,
                    obs_urgencia_cdg : data.observaciones_obs_urgencia_cdg,
                    so_cdg : data.modal_agregar_tipo_so_cdg,
                    obs_so_cdg : data.observaciones_obs_so_cdg,
                    obs_egp_cdg : data.observaciones_obs_egp_cdg,
                    obs_gen_ex_esp_cdg : data.observaciones_obs_gen_ex_esp_cdg,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_dg').modal('hide');
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

        function guardar_tipo_ficha_cg()
        {
            var registro_f_t_cg_nombre = $('#registro_f_t_cg_nombre').val();
            var registro_f_t_cg_descripcion = $('#registro_f_t_cg_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_cg_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_cg_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_cg_nombre = registro_f_t_cg_nombre;
            data.registro_f_t_cg_descripcion = registro_f_t_cg_descripcion;

            $('#registro_f_t_cg_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_cg') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_cg_nombre,
                    descripcion : data.registro_f_t_cg_descripcion,
                    organo_cg : data.modal_agregar_tipo_organo_cg,
                    obs_organo_cg : data.observaciones_obs_organo_cg,
                    ceg_cg : data.modal_agregar_tipo_ceg_cg,
                    obs_ceg_cg : data.observaciones_obs_ceg_cg,
                    masa_cg : data.modal_agregar_tipo_masa_cg,
                    obs_masas_cg : data.observaciones_obs_masas_cg,
                    urgencia_cg : data.modal_agregar_tipo_urgencia_cg,
                    obs_urgencia_cg : data.observaciones_obs_urgencia_cg,
                    so_cg : data.modal_agregar_tipo_so_cg,
                    obs_so_cg : data.observaciones_obs_so_cg,
                    obs_egp_cg : data.observaciones_obs_egp_cg,
                    obs_gen_ex_esp_cg : data.observaciones_obs_gen_ex_esp_cg,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_dg').modal('hide');
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

        function cargar_info_ficha_tipo_cdg(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-cdg').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('dolor_cdg','div_detalle_dolor','obs_dolor_cdg',2);
                evaluar_para_carga_detalle('otros_sintomas_cdg','div_detalle_cd_otros_sintomas','obs_otros_sintomas_cdg',2);
                evaluar_para_carga_detalle('ceg_cdg','div_detalle_ceg_cdg','obs_ceg_cdg',2);
                evaluar_para_carga_detalle('masa_cdg','div_detalle_masa_cdg','obs_masa_cdg',2);
                evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);
                evaluar_para_carga_detalle('so_cdg','div_detale_sospecha__organo_cdg','obs_so_cdg',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_cdg') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional_fc').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('dolor_cdg','div_detalle_dolor','obs_dolor_cdg',2);
                    evaluar_para_carga_detalle('otros_sintomas_cdg','div_detalle_cd_otros_sintomas','obs_otros_sintomas_cdg',2);
                    evaluar_para_carga_detalle('ceg_cdg','div_detalle_ceg_cdg','obs_ceg_cdg',2);
                    evaluar_para_carga_detalle('masa_cdg','div_detalle_masa_cdg','obs_masa_cdg',2);
                    evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);
                    evaluar_para_carga_detalle('so_cdg','div_detale_sospecha__organo_cdg','obs_so_cdg',2);

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

        function cargar_info_ficha_tipo_cg(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-cg').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(1);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
                evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
                evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
                evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
                evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_cg') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional_fc').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
                    evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
                    evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
                    evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
                    evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

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
                            $('#solicitado_por_nombre_cda').val('');
                            $('#solicitado_por_apellido_cda').val('');
                            $('#solicitado_por_telefono_cda').val('');
                            $('#solicitado_por_email_cda').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_cda').val('');
                            $('#solicitado_por_apellido_cda').val('');
                            $('#solicitado_por_telefono_cda').val('');
                            $('#solicitado_por_email_cda').val('');
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

        function selccionar_eval_crecimiento(id)
        {
            $('#id_cns_tipo').val(id);
        }

    </script>

    <!--ALERTA DE ATENCION-->
    <script>
    window.setTimeout(function() {
        $(".alert-atencion").fadeTo(500, 0).slideUp(600, function(){
            $(this).remove();
        });
    }, 5000);
    </script>
@endsection


