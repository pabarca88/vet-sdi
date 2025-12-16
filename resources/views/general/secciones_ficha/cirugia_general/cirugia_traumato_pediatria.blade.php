<!--cirugia general-->
<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header" id="exam_esp">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                Examen especialidad Cirugía General
            </button>
        </div>
        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
            <div class="card-body-aten shadow-none">
                <div id="form-pediatria">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="cir_gen_pediat" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ft_cir_gen_ped_tab" data-toggle="tab" href="#ft_cir_gen_ped" role="tab" aria-controls="ft_cir_gen_ped" aria-selected="true">Ficha tipo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="examen_fisico_cgp-tab" data-toggle="tab" href="#examen_fisico_cgp" role="tab" aria-controls="examen_fisico_cgp" aria-selected="true">Examen Físico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="e-plan_tto-tab" data-toggle="tab" href="#e-plan_tto" role="tab" aria-controls="e-plan_tto" aria-selected="false">Planificación de Tratamiento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="in-hosp-gen-tab" data-toggle="tab" href="#in-hosp-gen-" role="tab" aria-control="in-hosp-gen-" aria-selected="false">Hospitalización</a>
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
                                            <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
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
                                            <h6 class="f-16 text-c-blue mb-3">Examen General</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Apreciación Estado General</label>
                                                <select name="e_general" id="e_general" data-titulo="Piel" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_general','div_e_general','obs_e_general',2)">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Anormal Describir</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_e_general" style="display:none">
                                                <label class="floating-label-activo-sm">Describir Apreciación Estado General</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_general" id="obs_e_general"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Signos Vitales</label>
                                                <select name="e_signos_vit" id="e_signos_vit" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_signos_vit','div_e_signos_vit','obs_e_signos_vit',3)">
                                                    <option selected value="1">Normales</option>
                                                    <option value="2">No Examinado</option>
                                                    <option value="3">Alterados Describir</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_e_signos_vit" style="display:none">
                                                <label class="floating-label-activo-sm">Signos Vitales</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Cabeza y Cuello" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_signos_vit" id="obs_e_signos_vit"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Dolor Localizado</label>
                                                <select name="e_dolor_loc" id="e_dolor_loc" data-titulo="Torax" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_dolor_loc','div_e_dolor_loc','obs_e_dolor_loc',2);">
                                                    <option selected value="1">No</option>
                                                    <option value="2">Si Describir</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_e_dolor_loc" style="display:none">
                                                <label class="floating-label-activo-sm">Describir Dolor Localizado</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Torax" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_dolor_loc" id="obs_e_dolor_loc"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Examen segmentario</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Piel y fanéreos</label>
                                                <select name="e_piel_fan" id="e_piel_fan" data-titulo="Piel" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_piel_fan','div_e_piel_fan','obs_e_piel_fan',2)">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Anormal Describir</option>
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
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">No Examinado</option>
                                                    <option value="3">Otro Describir</option>
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
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado Describir</option>
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
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Anormal(describir)</option>
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
                                                    <option selected value="1">Normal</option>
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
                                                    <option selected value="1">Normal</option>
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
                                            <h6 class="f-16 text-c-blue mb-3">Plan de Tratamiento</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Es Urgencia Qx.?</label>
                                                <select name="urgencia_cg" id="urgencia_cg_ped" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cg_ped','div_detalle_urgencia_cg_ped','obs_urgencia_cg_ped',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_urgencia_cg_ped" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Detalle Urgencia Qx</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_urgencia_cg_ped" id="obs_urgencia_cg_ped"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Requiere Hospitalizar?</label>
                                                <select name="hosp_cg" id="hosp_cg_ped" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hosp_cg_ped','div_detalle_hosp_cg_ped','obs_hosp_cg_ped',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_hosp_cg_ped" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Requiere Hospitalizar en:</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_cg_ped" id="obs_hosp_cg_ped"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Otro Tratamiento</label>
                                                <select name="otrotto_cg" id="otrotto_cg_ped" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otrotto_cg_ped','div_detalle_otrotto_cg_ped','obs_otrotto_cg_ped',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_otrotto_cg_ped" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Tratamiento Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otrotto_cg_ped" id="obs_otrotto_cg_ped"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Obs. Plan de tratamiento</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Estado nutricional y vacunas" data-seccion="Estado nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_nutricional_vacunas" id="obs_ex_nutricional_vacunas"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--HOSPITALIZACION-->
                                <div class="tab-pane fade show" id="in-hosp-gen-" role="tabpanel" aria-labelledby="in-hosp-gen-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Detalle hospitalización</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Hospitalizar En:</label>
                                                <select name="hospen_cg_ped" id="hospen_cg_ped" data-titulo="Hospitalización" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hospen_cg_ped','div_detalle_hospen_cg_ped','obs_hospen_cg_ped',3);">
                                                    <option value="1" selected>Clínica</option>
                                                    <option value="2">Hospital</option>
                                                    <option value="3">Otro Describir</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_hospen_cg_ped" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Lugar Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hospen_cg_ped" id="obs_hospen_cg_ped"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Servicio</label>
                                                <select name="hosp_enserv_cg_ped" id="hosp_enserv_cg_ped" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hosp_enserv_cg_ped','div_detalle_hosp_enserv_cg_ped','obs_hosp_enserv_cg_ped',4);">
                                                    <option value="1" selected>Servicio Cirugía Pediátrica</option>
                                                    <option value="2">UTI Pediátrica</option>
                                                    <option value="3">Servicio de urgencia</option>
                                                    <option value="4">Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_hosp_enserv_cg_ped" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Servicio Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_enserv_cg_ped" id="obs_hosp_enserv_cg_ped"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Otro Tratamiento</label>
                                                <select name="otro_tto_cg_ped" id="otro_tto_cg_ped" data-titulo="Otro Tratamiento" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otro_tto_cg_ped','div_detalle_otro_tto_cg_ped','obs_otro_tto_cg_ped',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_otro_tto_cg_ped" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Tratamiento Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otro_tto_cg_ped" id="obs_otro_tto_cg_ped"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Observaciones a la Hospitalización</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ex_pedgen" id="obs_ex_pedgen"></textarea>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="abrir_modal_guardar_tipo('form-ped_gen','registro_f_t_detalle','ped_gen');"><i class="feather icon-save"></i> Guardar nueva ficha tipo</button>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="ingresomedico()";<i class="feather icon-save"></i> Orden de Hospitalización Tto Médico</button>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="in_sol_pabellon()";<i class="feather icon-save"></i> Solicitar Pabellón</button>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="ingreso()";<i class="feather icon-save"></i> Orden de Hospitalización Cirugía</button>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---------------------->
                    <!--<div class="form-row">
                        <div class="col-md-12">
                            <h6 class="f-16 text-c-blue"> Crecimiento y Desarrollo</h6>
                        </div>
                    </div>-->
                    <!--<br>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="floating-label-activo-sm">Descripción Crecimiento y Desarrollo</label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_gral_crec_desarr" id="obs_gral_crec_desarr"></textarea>
                        </div>
                        <div class="form-group col-md-7">
                            {{-- descomentar cuando se tengan antecedentes de embarazon en gine obstetricia --}}
                            {{-- <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="ant_parto ();"></i>Antec. Embarazo y Parto</button> --}}
                            <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="tunner();"></i>G. de Tunner Femenino</button>
                            <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="tunner_m();"></i>G. de Tunner Masculino</button>
                        </div>
                    </div>-->

                    <!--<div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                    <option value="">Seleccione</option>
                                    @if(!empty($fichaTipo['ped_gen']))
                                        @foreach ($fichaTipo['ped_gen'] as $ft )
                                            <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span id="descripcion_ficha_tipo_especialidad"></span>
                        </div>
                    </div>-->
                    <!--<div class="form-row">
                        <div class="col-md-12">
                            <h6 class="f-16 text-c-blue">Estado Nutricional</h6>
                        </div>
                    </div>
                    <hr>
                    <div id="form-ped_gen">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Estado nutricional</label>
                                    <select name="e_nutricional" data-titulo="Examen_nutricional" data-seccion="Estado Nutricional" id="e_nutricional" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_nutricional','div_examen_nutricional','obs_e_nutricional',2);">
                                        <option selected  value="1">Normal</option>
                                        <option value="2">Anormal</option>
                                        <option value="3">Ex. No Realizado</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_examen_nutricional" style="display:none;">
                                    <label class="floating-label-activo-sm">Estado Nutricional(describir)</label>
                                    <textarea class="form-control form-control-sm" data-titulo="obs. Examen_nutricional" data-seccion="Estado Nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_nutricional" id="obs_e_nutricional"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group ">
                                    <label class="floating-label-activo-sm">Vacunas</label>
                                    <select name="e_vacunas" id="e_vacunas" data-titulo="Vacunas" data-seccion="Estado Nutricional" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_vacunas','div_e_vacunas','obs_e_vacunas',2);">
                                        <option selected value="1">Al día</option>
                                        <option value="2">Atrasadas</option>
                                        <option value="3">No Informadas</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_e_vacunas" style="display:none;">
                                    <label class="floating-label-activo-sm">Vacunas(describir)</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="obs. Vacunas" data-seccion="Estado Nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_vacunas" id="obs_e_vacunas"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Obs. Estado nutricional y vacunas</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Estado nutricional y vacunas" data-seccion="Estado Nutricional" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_nutricional_vacunas" id="obs_ex_nutricional_vacunas"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>-->
                        <!--<div class="form-row">
                            <div class="col-md-12">
                                <h6 class="f-16 text-c-blue">Examen Segmentario</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Piel</label>
                                    <select name="e_piel" id="e_piel" data-titulo="Piel" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_piel','div_e_piel','obs_e_piel',2)">
                                        <option selected value="1">Normal</option>
                                        <option value="2">Anormal Describir</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_e_piel" style="display:none">
                                    <label class="floating-label-activo-sm">Describir Examen de piel</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Cabeza y Cuello</label>
                                    <select name="e_cabcuello" id="e_cabcuello" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_cabcuello','div_e_cabcuello','obs_e_cabcuello',3)">
                                        <option selected value="1">Normal</option>
                                        <option value="2">No Examinado</option>
                                        <option value="3">Otro Describir</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_e_cabcuello" style="display:none">
                                    <label class="floating-label-activo-sm">Describir Examen de Cuello</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Cabeza y Cuello" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_cabcuello" id="obs_e_cabcuello"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Torax</label>
                                    <select name="e_torax" id="e_torax" data-titulo="Torax" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_torax','div_e_torax','obs_e_torax',2);">
                                        <option selected value="1">Normal</option>
                                        <option value="2">Alterado Describir</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_e_torax" style="display:none">
                                    <label class="floating-label-activo-sm">Describir Examen de Torax</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Torax" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_torax" id="obs_e_torax"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Abdomen</label>
                                    <select name="e_abdomen" id="e_abdomen" data-titulo="Abdomen" data-seccion="Examen Segmentario"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_abdomen','div_e_abdomen','obs_e_abdomen',2);">
                                        <option selected value="1">Normal</option>
                                        <option value="2">Anormal(describir)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_e_abdomen" style="display:none">
                                    <label class="floating-label-activo-sm">Examen de Abdomen</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Abdomen" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_abdomen" id="obs_e_abdomen"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                    <label class="floating-label-activo-sm">Musculo-Esquelético</label>
                                    <select name="e_muscesq" id="e_muscesq" data-titulo="Musculo-Esquelético" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_muscesq','div_e_muscesq','obs_e_muscesq',2);">
                                        <option selected value="1">Normal</option>
                                        <option value="2">Anormal</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_e_muscesq" style="display:none">
                                    <label class="floating-label-activo-sm">Examen Musculo-Esquelético</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Musculo-Esquelético" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_muscesq" id="obs_e_muscesq"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Organos de los Sentidos</label>
                                    <select name="e_o_sent" id="e_o_sent" data-titulo="O-Sentidos" class="form-control form-control-sm"data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('e_o_sent','div_e_o_sent','obs_e_o_sent',2);">
                                        <option selected value="1">Normal</option>
                                        <option value="2">Anormal</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_e_o_sent" style="display:none">
                                    <label class="floating-label-activo-sm">Examen Organos de los Sentidos</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. O-Sentidos" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_o_sent" id="obs_e_o_sent"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="floating-label-activo-sm">Observaciones Ex Segmentario</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Ex Segmentario" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_segmentario" id="obs_ex_segmentario"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-9" style="margin-bottom: 0;">
                                <label class="floating-label-activo-sm">Observaciones Examen Especialidad</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ex_pedgen" id="obs_ex_pedgen"></textarea>
                            </div>
                            <div class="form-group col-md-3 align-middle" style="margin:auto">
                                <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo('form-ped_gen','registro_f_t_detalle','ped_gen');"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Ficha Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                            </div>
                        </div>-->

                </div>
            </div>
        </div>
    </div>
</div>
