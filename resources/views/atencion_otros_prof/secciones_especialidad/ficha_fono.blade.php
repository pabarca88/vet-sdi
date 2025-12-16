<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones  text-uppercase" id="atencion_fono-tab" data-toggle="tab" href="#atencion_fono" role="tab" aria-controls="atencion_fono" aria-selected="true">Atención Fonoaudiológica</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="control-tab" data-toggle="tab" href="#control" role="tab" aria-controls="control" aria-selected="false">Controles</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="apoyo-tab" data-toggle="tab" href="#apoyo" role="tab" aria-controls="apoyo" aria-selected="false">Laminas y Material de Apoyo</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="#" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    {{--  <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">  --}}
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="mostrarpdf" id="mostrarpdf" value="0">
                    <input type="hidden" name="tipopdf" id="tipopdf" value="0">
                    {{--  <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">  --}}
                    @csrf
                    <div class="tab-content" id="fono-contenido">
                        <!--ATENCIÓN ESPECIALIDAD FONO-->
                        <div class="tab-pane fade show active" id="atencion_fono" role="tabpanel" aria-labelledby="atencion_fono-tab">
                            <div class="row">
                                <!--RESPONSABLE-->
                                <!--Formulario / Menor de edad-->
                                @include('general.secciones_ficha.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->

                                <!--INFORMACIÓN-->
                                @include('atencion_otros_prof.secciones_especialidad.includes.generales.motivo_cons')

                                <!--ANTECEDENTES FAMILIARES-->
                                @include('atencion_otros_prof.secciones_especialidad.includes.generales.antecedentes')

                                <!--EVALUACIÓN COMUNICACIÓN-->
                                <!--HABLA  Y LENGUAJE-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="eval_habla_leng">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#eval_habla_leng_c" aria-expanded="false" aria-controls="eval_habla_leng_c">
                                                Evaluación Habla y Lenguaje
                                            </button>
                                        </div>
                                        <div id="eval_habla_leng_c" class="collapse" aria-labelledby="eval_habla_leng" data-parent="#eval_habla_leng">
                                            <div class="card-body-aten-a">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-fono_habla" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="ev-general-tab" data-toggle="tab" href="#ev-general" role="tab" aria-controls="ev-general" aria-selected="false">Evaluación General</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="lev-lenguaje-tab" data-toggle="tab" href="#ev-lenguaje" role="tab" aria-controls="ev-lenguaje" aria-selected="true">Habla y Lenguaje</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="ev-coment-tab" data-toggle="tab" href="#ev-coment" role="tab" aria-controls="ev-coment" aria-selected="false">Comentarios</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="ev-fono">
                                                            <!--EVALUACIÓN GENERAL-->
                                                            <div class="tab-pane fade show active" id="ev-general" role="tabpanel" aria-labelledby="ev-general-tab">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                            <a class="nav-link-aten text-reset active " id="lenguaje_gen-tab" data-toggle="tab" href="#lenguaje_gen" role="tab" aria-controls="lenguaje_gen" aria-selected="false">Evaluación General</a>
                                                                            <a class="nav-link-aten text-reset" id="gen-ofa-tab" data-toggle="tab" href="#gen_ofa" role="tab" aria-controls="gen_ofa" aria-selected="true">Eval. Audición-OFA</a>
                                                                            <a class="nav-link-aten text-reset" id="voz_gen-tab" data-toggle="tab" href="#voz_gen" role="tab" aria-controls="voz_gen" aria-selected="false">Examen de la Voz</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                            <!--EV.GENERAL-->
                                                                            <div class="tab-pane fade show active" id="lenguaje_gen" role="tabpanel" aria-labelledby="lenguaje_gen-tab">

                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="eval_g_le">Lenguaje Expresivo</label>
                                                                                            <select name="eval_g_le" id="eval_g_le" data-titulo="Lenguaje Expresivo" data-seccion="Evaluación General" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_g_le','div_eval_g_le','eval_g_le_obs',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option selected value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                                <option value="3">No examinado</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_eval_g_le" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="eval_g_le_obs" >Detalle Alteración Expresiva</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Alteración" data-seccion="Evaluación General"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_g_le_obs" id="eval_g_le_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="eval_g_leti" >Tipo Alt. Expresiva</label>
                                                                                            <select name="eval_g_leti" id="eval_g_leti" data-titulo="Tipo Alt. Expresiva" data-seccion="Evaluación General" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_g_leti','div_eval_g_leti','eval_g_leti_obs',8);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Dificultad para unir las palabras en oraciones </option>
                                                                                                <option value="2"> Usa oraciones simples y cortas y altera el orden de las palabras
                                                                                                <option value="3">Dificultad para encontrar las palabras correctas y  usa muletillas como "um" “mmm”
                                                                                                <option value="4"> Vocabulario por debajo de la edad
                                                                                                <option value="5">Deja palabras por fuera de las oraciones al hablar
                                                                                                <option value="6"> Usa ciertas frases una y otra vez, y repite (eco) partes o todas las preguntas
                                                                                                <option value="7"> Emplea tiempos (pasado, presente, futuro) inadecuadamente
                                                                                                <option value="8">Otra</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_eval_g_leti" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="eval_g_leti_obs">Detalle Tipo Alteración Expresiva</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Alteración Expresiva" data-seccion="Evaluación General"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_g_leti_obs" id="eval_g_leti_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"for="eval_g_lr" >Lenguaje Receptivo</label>
                                                                                            <select name="eval_g_lr" id="eval_g_lr" data-titulo="Lenguaje Receptivo" data-seccion="Evaluación General" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_g_lr','div_eval_g_lr','eval_g_lr_obs',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option selected value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                                <option value="3">No examinado</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_eval_g_lr" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="eval_g_lr_obs">Detalle Alteración Receptiva</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Alteración Receptiva" data-seccion="Evaluación General"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_g_lr_obs" id="eval_g_lr_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"for="eval_g_lrti" >Tipo Alt. Receptiva</label>
                                                                                            <select name="eval_g_lrti" id="eval_g_lrti" data-titulo="Tipo Alt.Receptiva" data-seccion="Evaluación General" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_g_lrti','div_eval_g_lrti','eval_g_lrti_obs',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option selected value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                                <option value="3">No examinado</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_eval_g_lrti" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="eval_g_lrti_obs">Detalle Alteración Receptiva </label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Tipo Alt. Expresiva" data-seccion="Evaluación General"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_g_lrti_obs" id="eval_g_lrti_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"for="eval_g_leng_obs" >Observaciones al Examen General</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones al Examen General" data-seccion="Evaluación General" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="eval_g_leng_obs" id="eval_g_leng_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <!--AUD-OFA-->
                                                                            <div class="tab-pane fade show" id="gen_ofa" role="tabpanel" aria-labelledby="gen-ofa-tab">

                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="eval_aud">Apreciación Audición</label>
                                                                                            <select name="eval_aud" id="eval_aud" data-titulo="Apreciación Audición" data-seccion="Eval OFA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_aud','div_obs_eval_aud','eval_aud_obs',3);" >
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">No Examinada</option>
                                                                                                <option selected value="2">Normal</option>
                                                                                                <option value="3">Hipoacusia o dudas</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_obs_eval_aud" style="display:none">
                                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm "  onclick="examenes_fono();"><i class="feather icon-plus"></i> Indicar examen especialidad</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                        <div class="form-group"  id="div_f">
                                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm " onclick="est_ofa();"><i class="feather icon-plus"></i> OFA</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="eval_ofa">Organos Fonoarticulatorios</label>
                                                                                            <select name="eval_ofa" id="eval_ofa" data-titulo="Organos Fonoarticulatorios"  data-seccion="Eval OFA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_ofa','div_eval_ofa','eval_ofa',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                                <option value="3">No Realizada</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group"  id="div_eval_ofa" style="display:none">
                                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" id="btn_obs_eval_aud" onclick="interfono();"><i class="feather icon-plus"></i> Indicar Interconsulta Orl-Neuro</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row mb-2">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <label class="floating-label-activo-sm" for="obs_ex_ofa">Observaciones al Examen OFA</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones al Examen OFA" data-seccion="Eval OFA" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_ofa" id="obs_ex_ofa"></textarea>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <!--EX.VOZ-->
                                                                            <div class="tab-pane fade show" id="voz_gen" role="tabpanel" aria-labelledby="voz_gen-tab">

                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="vo_flu_voz">Fluidez</label>
                                                                                            <select name="vo_flu_voz" id="vo_flu_voz" data-titulo="Fluidez" data-seccion="VOZ" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vo_flu_voz','div_vo_flu_voz','vo_flu_voz_obs',2);">
                                                                                                <option value="1"> Normal</option>
                                                                                                <option value="2"> Espasmofemia <i>(describir)</i></option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_vo_flu_voz" style="display:none">
                                                                                            <label id="" name="" class="floating-label-activo-sm" for="vo_flu_voz_obs">Obs. Fluidez</label>
                                                                                            <textarea class="form-control form-control-sm" data-titulo="Obs Fluidez" data-seccion="VOZ" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vo_flu_voz_obs" id="vo_flu_voz_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="vo_tpo_voz">Tipo</label>
                                                                                            <select name="vo_tpo_voz" id="vo_tpo_voz" data-titulo="Tipo" data-seccion="VOZ" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vo_tpo_voz','div_vo_tpo_voz','vo_tpo_voz_obs',5);">
                                                                                                <option value="1">Normal</option>
                                                                                                <option value="2">Tónico</option>
                                                                                                <option value="3">Clónico</option>
                                                                                                <option value="4">Mixto</option>
                                                                                                <option value="5">Otro (describir)</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_vo_tpo_voz" style="display:none">
                                                                                            <label id="" name="" class="floating-label-activo-sm" for="vo_tpo_voz_obs">Obs Tipo</label>
                                                                                            <textarea class="form-control form-control-sm" data-titulo="Obs Tipo" data-seccion="VOZ" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vo_tpo_voz_obs" id="vo_tpo_voz_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="vo_ritm">Ritmo</label>
                                                                                            <select name="vo_ritm" id="vo_ritm" data-titulo="Ritmo" data-seccion="VOZ" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vo_ritm','div_vo_ritm','vo_ritm_obs',4);">
                                                                                                <option value="1">Normal</option>
                                                                                                <option value="2">Bradilália</option>
                                                                                                <option value="3">Taquilália</option>
                                                                                                <option value="4">Otro(describir)</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_vo_ritm" style="display:none">
                                                                                            <label id="" name="" class="floating-label-activo-sm" for="vo_ritm_obs">Obs.Ritmo</label>
                                                                                            <textarea class="form-control form-control-sm" data-titulo="Obs.Ritmo" data-seccion="VOZ" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vo_ritm_obs" id="vo_ritm_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="vo_pro">Prosodia</label>
                                                                                            <select name="vo_pro" id="vo_pro" data-titulo="Prosodia" data-seccion="VOZ" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vo_pro','div_vo_pro','vo_pro_obs',4);">
                                                                                                <option value="1">Adecuada</option>
                                                                                                <option value="2">Exagerada</option>
                                                                                                <option value="3">Monótona</option>
                                                                                                <option value="4">Otra <i>(describir)</i></option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_vo_pro" style="display:none">
                                                                                            <label id="" name="" class="floating-label-activo-sm" for="vo_pro_obs">Obs.Prosodia</label>
                                                                                            <textarea class="form-control form-control-sm" data-titulo="Obs Prosodia" data-seccion="VOZ" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vo_pro_obs" id="vo_pro_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <button type="button" class="btn btn-primary-light-c btn-block btn-sm " id="btn_obs_eval_aud" onclick="e_voz();"><i class="feather icon-plus"></i> Evaluación de la voz</button>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <button type="button" class="btn btn-primary-light-c btn-block btn-sm " id="btn_obs_eval_aud" onclick="e_espasmo();"><i class="feather icon-plus"></i> Evaluación de Espasmofemia</button>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group" id="div_ofa_vest_boc">
                                                                                            <label id="" name="" class="floating-label-activo-sm" for="ex_voz_obs">Obs.Examen de la Voz</label>
                                                                                            <textarea class="form-control form-control-sm" data-titulo="Obs.Examen de la Voz" data-seccion="VOZ" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ex_voz_obs" id="ex_voz_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--EVALUACIÓN LENGUAJE-->
                                                            <div class="tab-pane fade show" id="ev-lenguaje" role="tabpanel" aria-labelledby="ev-lenguaje-tab">
                                                                <div class="form-row">
                                                                    <div class="col-sm-2">
                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                            {{--  <a class="nav-link-aten text-reset active " id="lenguaje_gen-tab" data-toggle="tab" href="#lenguaje_gen" role="tab" aria-controls="lenguaje_gen" aria-selected="false">Evaluación General</a>  --}}
                                                                            <a class="nav-link-aten text-reset" id="ev-habla-tab" data-toggle="tab" href="#ev-habla" role="tab" aria-controls="ev-habla" aria-selected="true">Habla y Lenguaje</a>
                                                                            <a class="nav-link-aten text-reset" id="resp-eval-tab" data-toggle="tab" href="#resp_eval" role="tab" aria-controls="resp_eval" aria-selected="true">Respiración </a>
                                                                            <a class="nav-link-aten text-reset" id="eval_lenguaje_esp-tab" data-toggle="tab" href="#eval_lenguaje_esp" role="tab" aria-controls="eval_lenguaje_esp" aria-selected="false">Alteraciones Lenguaje</a>
                                                                            {{--  <a class="nav-link-aten text-reset" id="ex_vestibular-tab" data-toggle="tab" href="#ex_vestibular" role="tab" aria-controls="ex_vestibular" aria-selected="false">Examen Vestibular</a>  --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-10">
                                                                        <div class="tab-content" id="v-pills-tabContent">

                                                                            <div class="tab-pane fade show active" id="ev-habla" role="tabpanel" aria-labelledby="ev-habla-tab">

                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="ex_resp">Respiración</label>
                                                                                            <select name="ex_resp" id="ex_resp" data-titulo="Respiración" data-seccion="HABLA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_resp','div_ex_resp','ex_resp_obs',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option selected  value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_ex_resp" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="ex_resp_obs">Detalle Alteración</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Apreciación Respiratoria" data-seccion="HABLA"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_resp_obs" id="ex_resp_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="ex_fonac">Fonación</label>
                                                                                            <select name="ex_fonac" id="ex_fonac" data-titulo="Fonación" data-seccion="HABLA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_fonac','div_ex_fonac','ex_fonac_obs',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option selected  value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_ex_fonac" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="ex_fonac_obs">Detalle Alteración</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle alt Fonación" data-seccion="HABLA"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fonac_obs" id="ex_fonac_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="ex_art_pal">Articulación de Palabras</label>
                                                                                            <select name="ex_art_pal" id="ex_art_pal" data-titulo="Articulación de Palabras" data-seccion="HABLA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_art_pal','div_ex_art_pal','ex_art_pal_obs',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option selected  value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_ex_art_pal" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="ex_art_pal_obs">Detalle Alteración</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Alt Articulación de la Palabra" data-seccion="HABLA"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_art_pal_obs" id="ex_art_pal_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="ex_prosodia">Prosodia</label>
                                                                                            <select name="ex_prosodia" id="ex_prosodia" data-titulo="Prosodia" data-seccion="HABLA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_prosodia','div_ex_prosodia','ex_prosodia_obs',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option selected  value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_ex_prosodia" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="ex_prosodia_obs">Detalle Alteración</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Alteración Prosodia" data-seccion="HABLA"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_prosodia_obs" id="ex_prosodia_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="pragma();"><i class="feather icon-plus"></i> Habilidades Pragmáticas</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="e_praxias();"><i class="feather icon-plus"></i> Praxias Fonoaudiológicas</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label"for="habla_obs" >Comentario del Examen del Habla</label>
                                                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="habla_obs" id="habla_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="tab-pane fade show" id="resp_eval" role="tabpanel" aria-labelledby="resp-eval-tab">
                                                                                <div class="col-sm-12 col-md-12">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <label id="" name="" class="floating-label-activo-sm" for="res_tp">Tipo Respiración</label>
                                                                                                <select name="res_tp" id="res_tp" data-titulo="Tipo Respiración" data-seccion="Evaluación Respiración" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('res_tp','div_res_tp','res_tp_obs',7);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option selected value="1">Normal</option>
                                                                                                    <option value="2"> No Examinada</option>
                                                                                                    <option value="3"> Normal</option>
                                                                                                    <option value="4">Costal Superior</option>
                                                                                                    <option value="5">Costo-Diafragmática</option>
                                                                                                    <option value="6">Abdominal</option>
                                                                                                    <option value="7">Otra (<i>describir)</i></option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_res_tp" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="res_tp_obs">Detalle Alteración<i>(describir)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Alteración" data-seccion="Evaluación Respiración" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="res_tp_obs" id="res_tp_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <label id="" name="" class="floating-label-activo-sm" for="res_mod">Modo Respiración</label>
                                                                                                <select name="res_mod" id="res_mod" data-titulo="Modo Respiración" data-seccion="Evaluación Respiración" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('res_mod','div_res_mod','res_mod_obs',5);">
                                                                                                        <option value="0">Seleccione</option>
                                                                                                        <option value="1"> Normal</option>
                                                                                                        <option value="2"> Nasal</option>
                                                                                                        <option value="3">Bucal</option>
                                                                                                        <option value="4">Mixta</option>
                                                                                                        <option value="5">Otra (<i>describir)</i></option>
                                                                                                    </select>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_res_mod" style="display:none">
                                                                                                <label class="floating-label-activo-sm t-red" for="res_mod_obs">Otra <i>(describir)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Otra" data-seccion="Evaluación Respiración" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="res_mod_obs" id="res_mod_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <label id="" name="" class="floating-label-activo-sm" for="res_cfr">Coordinación Fono-Respiratoria</label>
                                                                                                <select name="res_cfr" id="res_cfr" data-titulo="Coordinación Fono-Respiratoria" data-seccion="Evaluación Respiración" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('res_cfr','div_res_cfr','res_cfr_obs',2);">
                                                                                                        <option value="0">Seleccione</option>
                                                                                                        <option value="1"> Normal</option>
                                                                                                        <option value="2"> Alterada  (<i>describir)</i></option>
                                                                                                    </select>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_res_cfr" style="display:none">
                                                                                                <label class="floating-label-activo-sm t-red" for="res_cfr_obs">Otra <i>(describir)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Otra Discoordinación" data-seccion="Evaluación Respiración" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="res_cfr_obs" id="res_cfr_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label class="floating-label-activo-sm" for="g_resp_obs">Observaciones Respiración</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Respiración" data-seccion="Evaluación Respiración" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="g_resp_obs" id="g_resp_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade show" id="eval_lenguaje_esp" role="tabpanel" aria-labelledby="eval_lenguaje_esp-tab">
                                                                                <div class="col-sm-12 col-md-12">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="fon_p();"><i class="feather icon-plus"></i> Fonema P</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="fon_r();"><i class="feather icon-plus"></i> Fonema R</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="habla();"><i class="feather icon-plus"></i> Eval Habla y lenguaje</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label id="" name="" class="floating-label-activo-sm" for="alt_esp_leng">Alteración específica</label>
                                                                                                <select name="alt_esp_leng" id="alt_esp_leng" data-titulo="Alteración específica" data-seccion=" Eval Habla y lenguaje" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('alt_esp_leng','div_alt_esp_leng','alt_esp_leng_obs',7);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option selected value="1">No Tiene</option>
                                                                                                    <option value="2"> Sustitución de un fonema por otro.</option>
                                                                                                    <option value="3"> Omisión de fonemas.</option>
                                                                                                    <option value="4"> Distorsión fonética.</option>
                                                                                                    <option value="5"> Inversión del orden de los fonemas.</option>
                                                                                                    <option value="6"> Adición de fonemas.</option>
                                                                                                    <option value="7"> Otra (<i>describir)</i></option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_alt_esp_leng" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="alt_esp_leng_obs">Detalle Alteración<i>(describir)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Alteración" data-seccion=" Eval Habla y lenguajen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="alt_esp_leng_obs" id="alt_esp_leng_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label class="floating-label-activo-sm" for="g_leng_obs">Observaciones Eval. Alteración de lenguaje</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Eval. Alteración de lenguaje" data-seccion=" Eval Habla y lenguaje" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="g_leng_obs" id="g_leng_obs"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                            <!--COMENTARIOS-->
                                                            <div class="tab-pane fade show" id="ev-coment" role="tabpanel" aria-labelledby="ev-coment-tab">
                                                                <!--ejemplo -->

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-3">
                                                                        <label class="floating-label-activo-sm">Nombre del Modal</label>

                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Resultado Evaluación</label>
                                                                        <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                    </div>
                                                                    <div class="form-group col-md-5">
                                                                        <label class="floating-label-activo-sm">Comentario Evaluación</label>
                                                                        <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                    </div>
                                                                </div>
                                                                <!--ejemplo -->
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label class="floating-label-activo-sm">Comentario de la evaluación General</label>
                                                                        <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
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

                                <!--COMUNICACIÓN-->
                                @include('atencion_otros_prof.secciones_especialidad.includes.generales.eval_psiconeuro')

                                <!--DIAGNÓSTICO Y PLAN DE TRATAMIENTO-->
                                @include('atencion_otros_prof.secciones_especialidad.includes.generales.dg_plan')
                            </div>

                            <!--INDICACIONES-->
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="interfono();"><i class="feather icon-plus"></i> Indicar interconsulta</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="examenes_fono();"><i class="feather icon-plus"></i> Indicar examen especialidad</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="informefono();"><i class="feather icon-plus"></i> Enviar informe</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
								<!--GUARDAR O IMPRIMIR FICHA-->
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<div class="row mb-3">
										<div class="col-md-12 text-center">
											<input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
											<input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
										</div>
									</div>
								</div>
							</div>
                        </div>

                        <!--CONTROLES ATENCIÓN -->
                        <div class="tab-pane fade" id="control" role="tabpanel" aria-labelledby="control-tab">
                            <div class="row">
                                @include('atencion_otros_prof.secciones_especialidad.includes.generales.controles')
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="est_ofa();"><i class="feather icon-plus"></i> Eval OFA</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="habla();"><i class="feather icon-plus"></i> Habla y Lenguaje
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="e_voz();"><i class="feather icon-plus"></i> VOZ</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="e_espasmo();"><i class="feather icon-plus"></i> Espasmofémia</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="l_praxias() ;"><i class="feather icon-plus"></i> Laminas Praxias</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="l_ling() ;"><i class="feather icon-plus"></i> Test de Ling</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="tede_l();"><i class="feather icon-plus"></i> Test TEDE Complejo</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="tede();"><i class="feather icon-plus"></i> Test TEDE  Simple</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="sopa_l();"><i class="feather icon-plus"></i> Sopa de letras</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="fon_r();"><i class="feather icon-plus"></i> FONEMA R</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="fon_p();"><i class="feather icon-plus"></i> FONEMA P</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="informefono();"><i class="feather icon-plus"></i> Informe Fonoaudiología</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!--MATERIAL DE APOYO-->
                        <div class="tab-pane fade" id="apoyo" role="tabpanel" aria-labelledby="apoyo-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="tit-gen">Material de apoyo</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card">
                                            <div class="card-body">

                                                    <div class="form-row">
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="est_ofa();"><i class="feather icon-plus"></i> Eval OFA</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="habla();"><i class="feather icon-plus"></i> Habla y Lenguaje
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="e_voz();"><i class="feather icon-plus"></i> VOZ</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="e_espasmo();"><i class="feather icon-plus"></i> Espasmofémia</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="l_praxias() ;"><i class="feather icon-plus"></i> Laminas Praxias</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="l_ling() ;"><i class="feather icon-plus"></i> Test de Ling</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="tede_l();"><i class="feather icon-plus"></i> Test TEDE Complejo</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="tede();"><i class="feather icon-plus"></i> Test TEDE Simple </button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="sopa_l();"><i class="feather icon-plus"></i> Sopa de letras</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="fon_r();"><i class="feather icon-plus"></i> FONEMA R</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="fon_p();"><i class="feather icon-plus"></i> FONEMA P</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2" onclick="informefono();"><i class="feather icon-plus"></i> Informe Fonoaudiología</button>
                                                        </div>
                                                    </div>

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
</div>
<!--Modals de especialidad -->
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.fono.ofa')
@include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.evaluacion_voz")
@include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.evaluacion_espasmofemia")
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.fono.praxias')
{{-- @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.informe_fono") --}}
{{-- @include('atencion_otros_prof.formularios.modal_atencion_especialidad.fono.interconsulta_fono') --}}
{{-- @include('atencion_otros_prof.formularios.modal_atencion_especialidad.fono.indicar_examen_esp') --}}
{{-- @include('atencion_otros_prof.formularios.modal_atencion_especialidad.fono.sopaletras') --}}
{{-- @include('atencion_otros_prof.formularios.modal_atencion_especialidad.fono.fonema_p') --}}
{{-- @include('atencion_otros_prof.formularios.modal_atencion_especialidad.fono.fonema_r') --}}
{{-- @include('atencion_otros_prof.formularios.modal_atencion_especialidad.fono.praxias_lam') --}}
{{-- @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.test_ling") --}}
{{-- @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.tede_1") --}}
{{-- @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.tede") --}}

@section('page-script-ficha-atencion')
    <script>
        /** MENSAJE*/
        /** CARGAR mensaje */
        $('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es  opcional');
        $('#mensaje_ficha').show();
        setTimeout(function(){
            $('#mensaje_ficha').hide();
        }, 5000);


        $(document).ready(function() {

        });


        function cargarIgual(input)
        {
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
    </script>
@endsection





