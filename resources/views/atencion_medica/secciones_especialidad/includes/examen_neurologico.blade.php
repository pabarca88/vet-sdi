<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="exam_esp">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                Examen especialidad Neurología
            </button>
        </div>
        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
            <div class="card-body-aten-a shadow-none">
                <div id="form-oftalmologia-adulto">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="neuro" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="neuro_examen_gen_tab" data-toggle="tab" href="#neuro_examen_gen" role="tab" aria-controls="neuro_examen_gen" aria-selected="true">Funciones Corticales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex_pares_cr-tab" data-toggle="tab" href="#ex_pares_cr" role="tab" aria-controls="ex_pares_cr" aria-selected="true">Pares Craneales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex_motor-tab" data-toggle="tab" href="#ex_motor" role="tab" aria-controls="ex_motor" aria-selected="true">Sistema Motor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex_sens-tab" data-toggle="tab" href="#ex_sens" role="tab" aria-controls="ex_sens" aria-selected="true">Sistema Sensitivo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex_cerebelo-tab" data-toggle="tab" href="#ex_cerebelo" role="tab" aria-controls="ex_cerebelo" aria-selected="true">Cerebelo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex_postura-tab" data-toggle="tab" href="#ex_postura" role="tab" aria-controls="ex_postura" aria-selected="true">Postura y Marcha</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex_im-tab" data-toggle="tab" href="#ex_im" role="tab" aria-controls="ex_im" aria-selected="true">Signos de Irritación Meningea</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex_plan_tto-tab" data-toggle="tab" href="#ex_plan_tto" role="tab" aria-controls="ex_plan_tto" aria-selected="false">Planificación de Tratamiento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="in-hosp-tab" data-toggle="tab" href="#in-hosp" role="tab" aria-control="in-hosp" aria-selected="false">Hospitalización</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="neurologia_adulto">
                                <!--EXAMEN  GEN-->
                                <div class="tab-pane fade show active" id="neuro_examen_gen" role="tabpanel" aria-labelledby="neuro_examen_gen_tab">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active" id="examen_conciencia-tab" data-toggle="tab" href="#examen_conciencia" role="tab" aria-controls="examen_conciencia" aria-selected="true">Conciencia Orientación Comportamiento</a>
                                                <a class="nav-link-aten text-reset" id="ex_lenguaje-tab" data-toggle="tab" href="#ex_lenguaje" role="tab" aria-controls="ex_lenguaje" aria-selected="false">Lenguaje</a>
                                                <a class="nav-link-aten text-reset" id="examen_memoria-tab" data-toggle="tab" href="#examen_memoria" role="tab" aria-controls="examen_memoria" aria-selected="false">Memoria</a>
                                                <a class="nav-link-aten text-reset" id="ex_cp_cont-tab" data-toggle="tab" href="#ex_cp_cont" role="tab" aria-controls="ex_cp_cont" aria-selected="false">Cap.Constructiva Perceptiva</a>
                                                <a class="nav-link-aten text-reset" id="ex_lobulo_frontal-tab" data-toggle="tab" href="#ex_lobulo_frontal" role="tab" aria-controls="ex_lobulo_frontal" aria-selected="false">Lobulo Frontal</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                               <div class="tab-pane fade show active" id="examen_conciencia" role="tabpanel" aria-labelledby="examen_conciencia-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="eval_conciencia">Evaluación de Conciencia</label>
                                                                    <select name="eval_conciencia" data-titulo="Evaluación de Conciencia" data-seccion="Funciones Corticales" id="eval_conciencia" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_conciencia','div_eval_conciencia','obs_eval_conciencia',2);">
                                                                        <option value="0">Seleccione</option>

                                                                        <option value="Normal y Alerta">Normal y Alerta</option>
                                                                        <option value="Observaciones">Observaciones</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_eval_conciencia" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_eval_conciencia">Observaciones Estado Conciencia<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Observaciones Estado Conciencia" data-seccion="Funciones Corticales" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_eval_conciencia" id="obs_eval_conciencia" placeholder="disminuido o Exitado"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="conciencia_dism">Conciencia Disminuida</label>
                                                                    <select name="conciencia_dism" data-titulo="Conciencia Disminuida" data-seccion="Funciones Corticales" id="conciencia_dism" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('conciencia_dism','div_conciencia_dism','obs_conciencia_dism',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Disminuido (Anotar)">Disminuido (Anotar)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_conciencia_dism" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_conciencia_dism">Obs.Conciencia Disminuida<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs.Conciencia Disminuida" data-seccion="Funciones Corticales" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_conciencia_dism" id="obs_conciencia_dism" placeholder="Somnolencia Estupor Coma Glasgow"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="orientac">Orientación<i>(Describir)</i></label>
                                                                    <select name="orientac" data-titulo="Orientación" data-seccion="Funciones Corticales" id="orientac" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('orientac','div_orientac','obs_orientac',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Orientado en Tiempo y espacio">Orientado en Tiempo y espacio</option>
                                                                        <option value="Alterado (Anotar)">Alterado (Anotar)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_orientac" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_orientac">Obs.Orientacion Alterada<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs.Orientacion Alterada" data-seccion="Funciones Corticales" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_orientac" id="obs_orientac" placeholder="Orientación en tiempo espacio que hace"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="comport_mot">Comportamiento Motor</label>
                                                                    <select name="comport_mot" data-titulo="Comportamiento Motor" data-seccion="Funciones Corticales" id="comport_mot" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('comport_mot','div_comport_mot','obs_comport_mot',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Orientado en Tiempo y espacio">Orientado en Tiempo y espacio</option>
                                                                        <option value="Alterado (Anotar)">Alterado (Anotar)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_comport_mot" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_comport_mot">Obs.Comportamiento Motor<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs.Comportamiento Motor" data-seccion="Funciones Corticales" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_comport_mot" id="obs_comport_mot" placeholder="Hiper/hipokinético Tenso Relajado"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="comport_emoc">Comportamiento Emocional</label>
                                                                    <select name="comport_emoc" data-titulo="Comportamiento Emocional" data-seccion="Funciones Corticales" id="comport_emoc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('comport_emoc','div_comport_emoc','obs_comport_emoc',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Orientado en Tiempo y espacio">Orientado en Tiempo y espacio</option>
                                                                        <option value="Alterado (Anotar)">Alterado (Anotar)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_comport_emoc" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_comport_emoc">Obs.Comportamiento Emocional<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs.Comportamiento Emocional" data-seccion="Funciones Corticales" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_comport_emoc" id="obs_comport_emoc" placeholder="Hostíl Deprimido, eufórico etc"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="ex_lenguaje" role="tabpanel" aria-labelledby="ex_lenguaje-tab">
                                                    <div class="col-sm-12 col-md-12 p-10 m-9" >
                                                        <h6 style="text-align: center">Características</h6>
                                                     </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_fluidez">Fluidez</label>
                                                                    <select name="l_fluidez" data-titulo="Fluidez" id="l_fluidez" data-seccion="Lenguaje" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_fluidez','div_l_fluidez','obs_l_fluidez',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal Describir">Anormal Describir</option>
                                                                        <option value="No Examinada">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_fluidez" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_fluidez">Alteración<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Alteración" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_fluidez" id="obs_l_fluidez"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_int_vol">Intensidad y Volumen</label>
                                                                    <select name="l_int_vol" data-titulo="Intensidad y Volumen" id="l_int_vol" data-seccion="Lenguaje" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_int_vol','div_l_int_vol','obs_l_int_vol',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal Describir">Anormal Describir</option>
                                                                        <option value="No Examinada">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_int_vol" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_int_vol">Alteración<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Alteración" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_int_vol" id="obs_l_int_vol"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_artic">Articulación</label>
                                                                    <select name="l_artic" data-titulo="Articulación" id="l_artic" data-seccion="Lenguaje" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_artic','div_l_artic','obs_l_artic',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal Describir">Anormal Describir</option>
                                                                        <option value="No Examinada">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_artic" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_artic">Alteración<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Alteración" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_artic" id="obs_l_artic"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_exact">Exactitud</label>
                                                                    <select name="l_exact" data-titulo="Exactitud" data-seccion="Lenguaje" id="l_exact" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_exact','div_l_exact','obs_l_exact',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal Describir">Anormal Describir</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_exact" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_exact">Alteración <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Tipos" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_exact" id="obs_l_exact"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_denom_img">Denom Imagenes</label>
                                                                    <select name="l_denom_img" data-titulo="Denom Imagenes" id="l_denom_img" data-seccion="Lenguaje" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_denom_img','div_l_denom_img','obs_l_denom_img',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal Describir">Anormal Describir</option>
                                                                        <option value="No Examinada">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_denom_img" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_denom_img">Alteración<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Alteración" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_denom_img" id="obs_l_denom_img"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_repet">Repeticiones</label>
                                                                    <select name="l_repet" data-titulo="Repeticiones" id="l_repet" data-seccion="Lenguaje" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_repet','div_l_repet','obs_l_repet',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal Describir">Anormal Describir</option>
                                                                        <option value="No Examinada">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_repet" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_repet">Alteración<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Alteración" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_repet" id="obs_l_repet"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_comp_oral">Comprensión Oral</label>
                                                                    <select name="l_comp_oral" data-titulo="Comprensión Oral" id="l_comp_oral" data-seccion="Lenguaje" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_comp_oral','div_l_comp_oral','obs_l_comp_oral',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal Describir">Anormal Describir</option>
                                                                        <option value="No Examinada">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_comp_oral" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_comp_oral">Alteración<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Alteración" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_comp_oral" id="obs_l_comp_oral"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_lec_esc">Lecto-Escritura</label>
                                                                    <select name="l_lec_esc" data-titulo="Lecto-Escritura" data-seccion="Lenguaje" id="l_lec_esc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_lec_esc','div_l_lec_esc','obs_l_lec_esc',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal Describir">Anormal Describir</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_lec_esc" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_lec_esc">Alteración <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Tipos" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_lec_esc" id="obs_l_lec_esc"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 p-10 m-9" >
                                                        <h6 style="text-align: center">Afasias</h6>
                                                     </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_afas">Afasia</label>
                                                                    <select name="l_afas" data-titulo="Afasia" id="l_afas" data-seccion="Lenguaje" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_afas','div_l_afas','obs_l_afas',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No Examinada">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_afas" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_afas">Obs.Alteración<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs.Alteración" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_afas" id="obs_l_afas"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_af_tipo">Tipos</label>
                                                                    <select name="l_af_tipo" data-titulo="Tipos" data-seccion="Lenguaje" id="l_af_tipo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_af_tipo','div_l_af_tipo','obs_l_af_tipo',4);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Motora">Motora</option>
                                                                        <option value="Sensitiva">Sensitiva</option>
                                                                        <option value="Global">Global</option>
                                                                        <option value="Describir Observaciones">Describir Observaciones</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_af_tipo" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_af_tipo">Describir <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Tipos" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_af_tipo" id="obs_l_af_tipo"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 p-10 m-9" >
                                                        <h6 style="text-align: center">Disartrias</h6>
                                                     </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_disar">Disartria</label>
                                                                    <select name="l_disar" data-titulo="Disartria" id="l_disar" data-seccion="Lenguaje" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_disar','div_l_disar','obs_l_disar',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No Examinada">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_l_disar" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_l_disar">Describir<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Disartria" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_l_disar" id="obs_l_disar"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="l_disar_ot">Otros Tipos <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Tipos" data-seccion="Lenguaje" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="l_disar_ot" id="l_disar_ot" placeholder="Describa alteración"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="examen_memoria" role="tabpanel" aria-labelledby="examen_memoria-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="m_inmed">Memoria inmediata</label>
                                                                    <select name="m_inmed" data-titulo="Memoria inmediata" data-seccion="Memoria" id="m_inmed" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('m_inmed','div_m_inmed','obs_m_inmed',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                        <option value="No Examinado">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_m_inmed" style="display:none;">
                                                                    <label class="floating-label-activo-sm" for="obs_m_inmed">Alteración de la M. inmediata</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Alteración de la M. inmediata" data-seccion="Memoria" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_m_inmed" id="obs_m_inmed"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="m_rec">Memoria Reciente</label>
                                                                    <select name="m_rec" data-titulo="Memoria Reciente" data-seccion="Memoria" id="m_rec" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('m_rec','div_m_rec','obs_m_rec',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                        <option value="No Examinado">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_m_rec" style="display:none;">
                                                                    <label class="floating-label-activo-sm" for="obs_m_rec">Alteración de la M. Reciente</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Alteración de la M. Reciente" data-seccion="Memoria" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_m_rec" id="obs_m_rec"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="m_rem">Memoria Remota</label>
                                                                    <select name="m_rem" data-titulo="Memoria Remota" data-seccion="Memoria" id="m_rem" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('m_rem','div_m_rem','obs_m_rem',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                        <option value="No Examinado">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_m_rem" style="display:none;">
                                                                    <label class="floating-label-activo-sm" for="obs_m_rem">Alteración de la M. Remota</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Alteración de la M. Remota" data-seccion="Memoria" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_m_rem" id="obs_m_rem"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="m_ot_est">Otros Estudios</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Otros Estudios" data-seccion="Memoria" id="m_ot_est" name="m_ot_estt"  rows="1" onfocus="this.rows=4"  onblur="this.rows=1;"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="ex_cp_cont" role="tabpanel" aria-labelledby="ex_cp_cont-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="cc_prax">Praxias</label>
                                                                    <select name="cc_prax" data-titulo="Praxias" data-seccion="Cap. Constructiva" id="cc_prax" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cc_prax','div_cc_prax','obs_cc_prax',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                        <option value="No Examinado">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_cc_prax" style="display:none;">
                                                                    <label class="floating-label-activo-sm" for="obs_cc_prax">Observaciones</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Praxias" data-seccion="Cap. Constructiva" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cc_prax" id="obs_cc_prax"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="cc_gnos">Gnosias</label>
                                                                    <select name="cc_gnos" data-titulo="Gnosias" data-seccion="Cap. Constructiva" id="cc_gnos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cc_gnos','div_cc_gnos','obs_cc_gnos',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                        <option value="No Examinado">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_cc_gnos" style="display:none;">
                                                                    <label class="floating-label-activo-sm" for="obs_cc_gnos">Observaciones</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Gnosias" data-seccion="Cap. Constructiva" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cc_gnos" id="obs_cc_gnos"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                               <div class="tab-pane fade" id="ex_lobulo_frontal" role="tabpanel" aria-labelledby="ex_lobulo_frontal-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="lf_pat_motalter">Patrones Mot. Alternantes</label>
                                                                    <select name="lf_pat_motalter" data-titulo="Patrones Mot Alternantes" data-seccion="Lob. Frontal" id="lf_pat_motalter" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('lf_pat_motalter','div_lf_pat_motalter','obs_lf_pat_motalter',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                        <option value="No Examinado">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_lf_pat_motalter" style="display:none;">
                                                                    <label class="floating-label-activo-sm" for="obs_lf_pat_motalter">Obs. Patrones Mot. Alternantes</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Lob. Frontal OD" data-seccion="Lob. Frontal" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_lf_pat_motalter" id="obs_lf_pat_motalter"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="lf_cap_ab">Cap. Abstracción</label>
                                                                    <select name="lf_cap_ab" data-titulo="Cap. Abstracción" data-seccion="Lob. Frontal" id="lf_cap_ab" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('lf_cap_ab','div_lf_cap_ab','obs_lf_cap_ab',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                        <option value="No Examinado">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_lf_cap_ab" style="display:none;">
                                                                    <label class="floating-label-activo-sm" for="obs_lf_cap_ab">Obs. Cap. Abstracción</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Cap. Abstracción" data-seccion="Lob. Frontal" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_lf_cap_ab" id="obs_lf_cap_ab"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="lf_capjui">Cap. Juicio</label>
                                                                    <select name="lf_capjui" data-titulo="Cap. Juicio" data-seccion="Lob. Frontal" id="lf_capjui" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('lf_capjui','div_lf_capjui','obs_lf_capjui',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                        <option value="No Examinado">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_lf_capjui" style="display:none;">
                                                                    <label class="floating-label-activo-sm" for="obs_lf_capjui">Obs. Cap. Juicio</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Cap. Juicio" data-seccion="Lob. Frontal" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_lf_capjui" id="obs_lf_capjui"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="lf_in_ci">Cap. Inhibir Comportamiento Inapropiado</label>
                                                                    <select name="lf_in_ci" data-titulo="Cap. Inhibir Comportamiento I" data-seccion="Lob. Frontal" id="lf_in_ci" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('lf_in_ci','div_lf_in_ci','obs_lf_in_ci',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                        <option value="No Examinado">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_lf_in_ci" style="display:none;">
                                                                    <label class="floating-label-activo-sm" for="obs_lf_in_ci">Obs. Cap. Inhibir Comportamiento Inapropiado</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Cap. Inhibir Comportamiento Inapropiado" data-seccion="Lob. Frontal" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_lf_in_ci" id="obs_lf_in_ci"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="lf_ref_hip">Reflejos Hipofrontales</label>
                                                                    <select name="lf_ref_hip" data-titulo="Reflejos Hipofrontales" data-seccion="Lob. Frontal" id="lf_ref_hip" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('lf_ref_hip','div_lf_ref_hip','obs_lf_ref_hip',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                        <option value="No Examinado">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_lf_ref_hip" style="display:none;">
                                                                    <label class="floating-label-activo-sm" for="obs_lf_ref_hip">Obs. Reflejos Hipofrontales</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Reflejos Hipofrontales" data-seccion="Lob. Frontal" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_lf_ref_hip" id="obs_lf_ref_hip"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label-activo-sm" for="otros_ex_lob_fr">Otros antecedentes Lóbulo Frontal</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antecedentes Importantes" data-seccion="Lob. Frontal" id="otros_ex_lob_fr" name="otros_ex_lob_fr" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm" for="obs_ex_generales_fc">Observaciones Generales  Funciones Corticales</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antecedentes Importantes" data-seccion="Cap. Constructiva" id="obs_ex_generales_fc" name="obs_ex_generales_fc"  rows="1" onfocus="this.rows=4"  onblur="this.rows=1;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--PARES CRANEALES-->
                                <div class="tab-pane fade show" id="ex_pares_cr" role="tabpanel" aria-labelledby="ex_pares_cr-tab">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten-red text-reset active" id="prim_pares-tab" data-toggle="tab" href="#prim_pares" role="tab" aria-controls="prim_pares" aria-selected="true">I AL VI</a>
                                                <a class="nav-link-aten text-reset" id="seg_pares-tab" data-toggle="tab" href="#seg_pares" role="tab" aria-controls="seg_pares" aria-selected="false">VII AL XII</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="prim_pares" role="tabpanel" aria-labelledby="prim_pares-tab"><br>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="pc_olf">I Olfatorio</label>
                                                                    <!-- I Olfatorio -->
                                                                    <select name="pc_olf" data-titulo="I Olfatorio" data-seccion="Nervios Craneales" id="pc_olf" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_olf','div_pc_olf','obs_pc_olf',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normales">Normales</option>
                                                                        <option value="Anormales">Anormales</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_olf" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_pc_olf"> <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. N. Olfatorio " data-seccion="Nervios Craneales"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_olf" id="obs_pc_olf"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="pc_opt">II.- Óptico</label>
                                                                    <!-- II Óptico -->
                                                                    <select name="pc_opt" data-titulo="II.- Óptico" data-seccion="Nervios Craneales" id="pc_opt" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_opt','div_pc_opt','obs_pc_opt',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_opt" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_pc_opt"> <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. N. Óptico " data-seccion="Nervios Craneales"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_opt" id="obs_pc_opt"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="pc_ocumot">III.- Oculo-Motor</label>
                                                                    <!-- III Oculo-Motor -->
                                                                    <select name="pc_ocumot" data-titulo="III.- Oculo-Motor" id="pc_ocumot" data-seccion="Nervios Craneales" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_ocumot','div_pc_ocumot','obs_pc_ocumot',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                    </select>

                                                                </div>
                                                                <div class="form-group" id="div_pc_ocumot" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_pc_ocumot"><i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. N.Oculo-Motor  " data-seccion="Nervios Craneales"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_ocumot" id="obs_pc_ocumot"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="pc_troq">IV.- Troclear</label>
                                                                    <!-- IV Troclear -->
                                                                    <select name="pc_troq" data-titulo="IV.- Troclear" data-seccion="Nervios Craneales" id="pc_troq" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_troq','div_pc_troq','obs_pc_troq',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_troq" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_pc_troq"> <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. N.Troclear  " data-seccion="Nervios Craneales"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_troq" id="obs_pc_troq"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="pc_trig">V.- Trigémino</label>
                                                                    <!-- V Trigémino -->
                                                                    <select name="pc_trig" data-titulo="V.- Trigémino" data-seccion="Nervios Craneales" id="pc_trig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_trig','div_pc_trig','obs_pc_trig',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_trig" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_pc_trig"><i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. N. Trigémino" data-seccion="Nervios Craneales"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_trig" id="obs_pc_trig"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm " for="pc_abd">VI.- Abducente</label>
                                                                    <!-- VI Abducente -->
                                                                    <select name="pc_abd" data-titulo="VI.- Abducente" data-seccion="Nervios Craneales" id="pc_abd" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_abd','div_pc_abd','obs_pc_abd',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Claro">Claro</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_abd" style="display:none;">
                                                                    <label class="floating-label-activo-sm " for="obs_pc_abd"><i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. N. Abducente"  data-seccion="Nervios Craneales"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_abd" id="obs_pc_abd"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade " id="seg_pares" role="tabpanel" aria-labelledby="seg_pares-tab">
                                                    <br>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm "for="pc_fac">VII.- Facial</label>
                                                                    <select name="pc_fac" data-titulo="VII.- Facial" data-seccion="Nervios Craneales" id="pc_fac" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_fac','div_pc_fac','obs_pc_fac',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normales">Normales</option>
                                                                        <option value="Anormales">Anormales</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_fac" style="display:none;">
                                                                    <label class="floating-label-activo-sm "for="obs_pc_fac"> <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. VII.- Facial" data-seccion="Nervios Craneales"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_fac" id="obs_pc_fac"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm "for="pc_aud">VIII.- Audítivo</label>
                                                                    <!-- VIII.- Audítivo -->
                                                                    <select name="pc_aud" data-titulo="VIII.- Audítivo" data-seccion="Nervios Craneales" id="pc_aud" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_aud','div_pc_aud','obs_pc_aud',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_aud" style="display:none;">
                                                                    <label class="floating-label-activo-sm "for="obs_pc_aud">Obs. Audítivo <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Audítivo " data-seccion="Nervios Craneales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_aud" id="obs_pc_aud"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm  "for="pc_glof">IX.- Glosofaríngeo</label>
                                                                    <!-- IX.- Glosofaríngeo -->
                                                                    <select name="pc_glof" data-titulo="IX.- Glosofaríngeo" data-seccion="Nervios Craneales" id="pc_glof" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_glof','div_pc_glof','obs_pc_glof',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_glof" style="display:none;">
                                                                    <label class="floating-label-activo-sm "for="obs_pc_glof">Obs. Glosofaríngeo<i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Glosofaríngeo" data-seccion="Nervios Craneales"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_glof" id="obs_pc_glof"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm "for="pc_vago">X.- Vago</label>
                                                                    <!-- X.- Vago -->
                                                                    <select name="pc_vago" data-titulo="X.- Vago" data-seccion="Nervios Craneales" id="pc_vago" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_vago','div_pc_vago','obs_pc_vago',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_vago" style="display:none;">
                                                                    <label class="floating-label-activo-sm "for="obs_pc_vago">Obs. Vago <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Vago" data-seccion="Nervios Craneales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_vago" id="obs_pc_vago"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm "for="pc_esp">XI.- Espinal (Accesorio)</label>
                                                                    <!-- XI.- Espinal -->
                                                                    <select name="pc_esp" data-titulo="XI.- Espinal" data-seccion="Nervios Craneales" id="pc_esp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_esp','div_pc_esp','obs_pc_esp',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_esp" style="display:none;">
                                                                    <label class="floating-label-activo-sm "for="obs_pc_esp">Obs: Espinal</label>
                                                                    <textarea class="form-control form-control-sm"  data-titulo="Obs. Espinal" data-seccion="Nervios Craneales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_esp" id="obs_pc_esp"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm "for="pc_hipog">XII.- Hipogloso</label>
                                                                    <!-- XII.- Hipogloso -->
                                                                    <select name="pc_hipog" data-titulo="XII.- Hipogloso" data-seccion="Nervios Craneales" id="pc_hipog" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pc_hipog','div_pc_hipog','obs_pc_hipog',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option  value="Normal">Normal</option>
                                                                        <option value="Anormal">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_pc_hipog" style="display:none;">
                                                                    <label class="floating-label-activo-sm "for="obs_pc_hipog">Obs. Hipogloso</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Hipogloso" data-seccion="Nervios Craneales"rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pc_hipog" id="obs_pc_hipog"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="pares();"><i class="feather icon-plus"></i> Pares Craneanos</button>
                                                    </div>
                                                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="obs_gen_pc">observaciones Pares Craneales</label>
                                                            <textarea class="form-control form-control-sm mt-1 "  data-titulo="Obs. Tyndall OI" data-seccion="Nervios Craneales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_gen_pc" id="obs_gen_pc"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EXAMEN  MOTOR-->
                                <div class="tab-pane fade show" id="ex_motor" role="tabpanel" aria-labelledby="ex_motor-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm " for="sm_trof_mot">Trofismo motor</label>
                                                        <!-- Trofismo motor -->
                                                        <select name="sm_trof_mot" data-titulo="Trofismo motor" data-seccion="Sistema Motor" id="sm_trof_mot" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sm_trof_mot','div_sm_trof_mot','obs_sm_trof_mot',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normales">Normales</option>
                                                            <option value="Anormales">Anormales</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_sm_trof_mot" style="display:none;">
                                                        <label class="floating-label-activo-sm " for="obs_sm_trof_mot">Trofismo motor <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Trofismo motor"  data-seccion="Sistema Motor"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sm_trof_mot" id="obs_sm_trof_mot"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm " for="sm_tono">Tono</label>
                                                        <!-- Tono -->
                                                        <select name="sm_tono" data-titulo="Tono" data-seccion="Sistema Motor" id="sm_tono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sm_tono','div_sm_tono','obs_sm_tono',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normales">Normales</option>
                                                            <option value="Anormales">Anormales</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_sm_tono" style="display:none;">
                                                        <label class="floating-label-activo-sm " for="obs_sm_tono">Tono <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Tono" data-seccion="Sistema Motor" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sm_tono" id="obs_sm_tono"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm " for="sm_fuer">Fuerza</label>
                                                        <!-- Fuerza -->
                                                        <select name="sm_fuer" data-titulo="Fuerza" data-seccion="Sistema Motor" id="sm_fuer" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sm_fuer','div_sm_fuer','obs_sm_fuer',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option value="Bordes netos y Normales">Bordes netos y Normales</option>
                                                            <option value="Anormales">Anormales</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_sm_fuer" style="display:none;">
                                                        <label class="floating-label-activo-sm " for="obs_sm_fuer">Fuerza <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Fuerza"  data-seccion="Sistema Motor" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sm_fuer" id="obs_sm_fuer"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm " for="sm_r_prof">Reflejos Profundos</label>
                                                        <!-- Reflejos Profundos -->
                                                        <select name="sm_r_prof" data-titulo="Reflejos Profundos" data-seccion="Sistema Motor" id="sm_r_prof" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sm_r_prof','div_sm_r_prof','obs_sm_r_prof',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normales">Normales</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_sm_r_prof" style="display:none;">
                                                        <label class="floating-label-activo-sm " for="obs_sm_r_prof">Reflejos Profundos <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Reflejos Profundos"  data-seccion="Sistema Motor" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sm_r_prof" id="obs_sm_r_prof"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm " for="sm_r_sup">Reflejos Superficiales</label>
                                                        <!-- Reflejos Superficiales -->
                                                        <select name="sm_r_sup" data-titulo="Reflejos Superficiales" data-seccion="Sistema Motor" id="sm_r_sup" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sm_r_sup','div_sm_r_sup','obs_sm_r_sup',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_sm_r_sup" style="display:none;">
                                                        <label class="floating-label-activo-sm " for="obs_sm_r_sup">Reflejos Superficiales<i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Reflejos Superficiales" data-seccion="Sistema Motor" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sm_r_sup" id="obs_sm_r_sup"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm " for="sm_mov_anor">Movimientos Anormales</label>
                                                        <!-- Movimientos Anormales -->
                                                        <select name="sm_mov_anor" data-titulo="Movimientos Anormales" data-seccion="Sistema Motor" id="sm_mov_anor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sm_mov_anor','div_sm_mov_anor','obs_sm_mov_anor',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_sm_mov_anor" style="display:none;">
                                                        <label class="floating-label-activo-sm " for="obs_sm_mov_anor">Movimientos Anormales<i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Movimientos Anormales" data-seccion="Sistema Motor" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sm_mov_anor" id="obs_sm_mov_anor"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="sm_ot_ant">Otros Antecedentes Importantes S. Motor</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Otros Antecedentes Importantes S. Motor" data-seccion="Sistema Motor" id="sm_ot_ant" name="sm_ot_ant"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="reflejos();"><i class="feather icon-plus"></i> Reflejos Osteotendineos</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="fuerza_sup();"><i class="feather icon-plus"></i>Examen Fuerza extremidad Superior</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="fuerza_inf();"><i class="feather icon-plus"></i> Examen Fuerza extremidad Inferior</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="postural();"><i class="feather icon-plus"></i> Examen motor Postura y Marcha</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="tono();"><i class="feather icon-plus"></i> Examen Nervios Motores</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="sensibilidad();"><i class="feather icon-plus"></i> Examen Nervios Sensitivos</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EXAMEN  SENSIBILIDAD-->
                                <div class="tab-pane fade show" id="ex_sens" role="tabpanel" aria-labelledby="ex_sens-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="ss_dolor">Dolor</label>
                                                        <!-- Dolor -->
                                                        <select name="ss_dolor" data-titulo="Dolor" data-seccion="Sistema Sensitivo" id="ss_dolor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ss_dolor','div_ss_dolor','obs_ss_dolor',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_ss_dolor" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_ss_dolor">Dolor <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Dolor"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ss_dolor" id="obs_ss_dolor"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="ss_tact_gr">Tacto Grueso</label>
                                                        <!-- Tacto Grueso -->
                                                        <select name="ss_tact_gr" data-titulo="Tacto Grueso" data-seccion="Sistema Sensitivo" id="ss_tact_gr" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ss_tact_gr','div_ss_tact_gr','obs_ss_tact_gr',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_ss_tact_gr" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_ss_tact_gr">Tacto Grueso <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Tacto Grueso" data-seccion="Sistema Sensitivo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ss_tact_gr" id="obs_ss_tact_gr"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="ss_sen_disc">Sensibilidad discriminativa</label>
                                                        <!-- Sensibilidad discriminativa -->
                                                        <select name="ss_sen_disc" data-titulo="Sensibilidad discriminativa" data-seccion="Sistema Sensitivo" id="ss_sen_disc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ss_sen_disc','div_ss_sen_disc','obs_ss_sen_disc',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_ss_sen_disc" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_ss_sen_disc">Sensibilidad discriminativa<i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Sensibilidad discriminativa"  data-seccion="Sistema Sensitivo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ss_sen_disc" id="obs_ss_sen_disc"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="ss_calor">Calor</label>
                                                        <!-- Calor -->
                                                        <select name="ss_calor" data-titulo="Calor" data-seccion="Sistema Sensitivo" id="ss_calor" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ss_calor','div_ss_calor','obs_ss_calor',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normales">Normales</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_ss_calor" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_ss_calor">Calor <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Calor"  data-seccion="Sistema Sensitivo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ss_calor" id="obs_ss_calor"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="ss_sen_vib">Sensibilidad vibratoria</label>
                                                        <!-- Sensibilidad vibratoria -->
                                                        <select name="ss_sen_vib" data-titulo="Sensibilidad vibratoria" data-seccion="Sistema Sensitivo" id="ss_sen_vib" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ss_sen_vib','div_ss_sen_vib','obs_ss_sen_vib',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normales">Normales</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_ss_sen_vib" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_ss_sen_vib">Sensibilidad vibratoria <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Maculas OD"  data-seccion="Sistema Sensitivo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ss_sen_vib" id="obs_ss_sen_vib"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="ss_sen_pos">Sensibilidad posicional</label>
                                                        <!-- Sensibilidad posicional -->
                                                        <select name="ss_sen_pos" data-titulo="Sensibilidad posicional" data-seccion="Sistema Sensitivo" id="ss_sen_pos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ss_sen_pos','div_ss_sen_pos','obs_ss_sen_pos',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normales">Normales</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_ss_sen_pos" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_ss_sen_pos">Sensibilidad posicional <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Maculas OD"  data-seccion="Sistema Sensitivo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ss_sen_pos" id="obs_ss_sen_pos"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="ss_estereog">Estereognosias</label>
                                                        <!-- Estereognosias -->
                                                        <select name="ss_estereog" data-titulo="Estereognosias" data-seccion="Sistema Sensitivo" id="ss_estereog" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ss_estereog','div_ss_estereog','obs_ss_estereog',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_ss_estereog" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="ss_obs_ss_estereog">Estereognosias<i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Estereognosias" data-seccion="Sistema Sensitivo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ss_estereog" id="obs_ss_estereog"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="ss_grafest">Grafestesia</label>
                                                        <!-- Grafestesia -->
                                                        <select name="ss_grafest" data-titulo="Grafestesia" data-seccion="Sistema Sensitivo" id="ss_grafest" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ss_grafest','div_ss_grafest','obs_ss_grafest',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Sana">Sana</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_ss_grafest" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="ss_obs_ss_grafest">Grafestesia<i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Periferia OD" data-seccion="Sistema Sensitivo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ss_grafest" id="obs_ss_grafest"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm"for="ss_otros_ant_sen">Otros Antecedentes Importantes Sensibilidad</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Otros Antecedentes Importantes Sensibilidad" data-seccion="Sistema Sensitivo" id="otros_ant_sen" name="otros_ant_sen"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="reflejos();"><i class="feather icon-plus"></i> Reflejos Osteotendineos</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="fuerza_sup();"><i class="feather icon-plus"></i>Examen Fuerza extremidad Superior</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="fuerza_inf();"><i class="feather icon-plus"></i> Examen Fuerza extremidad Inferior</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="postural();"><i class="feather icon-plus"></i> Examen motor Postura y Marcha</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="tono();"><i class="feather icon-plus"></i> Examen Nervios Motores</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="sensibilidad();"><i class="feather icon-plus"></i> Examen Nervios Sensitivos</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EXAMEN  CEREBELO-->
                                <div class="tab-pane fade show" id="ex_cerebelo" role="tabpanel" aria-labelledby="ex_cerebelo-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="cer_dism">Dismetría</label>
                                                        <!-- Dismetría -->
                                                        <select name="cer_dism" data-titulo="Dismetría" data-seccion="Cerebelo" id="cer_dism" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cer_dism','div_cer_dism','obs_cer_dism',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormales">Anormales</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_cer_dism" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_cer_dism">Dismetría<i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Dismetría" data-seccion="Cerebelo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cer_dism" id="obs_cer_dism"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="cer_temb">Temblor</label>
                                                        <!-- Temblor -->
                                                        <select name="cer_temb" data-titulo="Temblor" data-seccion="Cerebelo" id="cer_temb" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cer_temb','div_cer_temb','obs_cer_temb',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_cer_temb" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_cer_temb">Temblor <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Temblor" data-seccion="Cerebelo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cer_temb" id="obs_cer_temb"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="cer_diado">Diadococinesia</label>
                                                        <!-- Diadococinesia -->
                                                        <select name="cer_diado" data-titulo="Diadococinesia" data-seccion="Cerebelo" id="cer_diado" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cer_diado','div_cer_diado','obs_cer_diado',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_cer_diado" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_cer_diado">Diadococinesia<i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Diadococinesia"  data-seccion="Cerebelo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cer_diado" id="obs_cer_diado"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="cer_atax">Ataxia</label>
                                                        <!-- Ataxia -->
                                                        <select name="cer_atax" data-titulo="Ataxia" data-seccion="Cerebelo" id="cer_atax" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cer_atax','div_cer_atax','obs_cer_atax',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normales">Normales</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_cer_atax" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_cer_atax">Ataxia <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Ataxia"  data-seccion="Cerebelo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cer_atax" id="obs_cer_atax"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm "for="cer_rig">Rigidez</label>
                                                        <!-- Rigidez -->
                                                        <select name="cer_rig" data-titulo="Rigidez" data-seccion="Cerebelo" id="cer_rig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cer_rig','div_cer_rig','obs_cer_rig',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_cer_rig" style="display:none;">
                                                        <label class="floating-label-activo-sm "for="obs_cer_rig">Rigidez<i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Rigidez" data-seccion="Cerebelo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cer_rig" id="obs_cer_rig"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm"for="cereb_ot_ant">Otros Antecedentes Exploración Cerebelosa</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Otros Antecedentes Exploración Cerebelosa" data-seccion="Cerebelo" id="cereb_ot_ant" name="cereb_ot_ant"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EXAMEN  POSTURA-->
                                <div class="tab-pane fade show" id="ex_postura" role="tabpanel" aria-labelledby="ex_postura-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-10 m-9" >
                                                    <h6 style="text-align: center">Examen Postural</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_tono">Tono Postural</label>
                                                        <select name="post_tono" data-titulo="Tono Postural" data-seccion="Examen Postural" id="post_tono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_tono','div_post_tono','obs_post_tono',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormales">Anormales</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_tono" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_tono">Tono Postural <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Tono Postural" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_tono" id="obs_post_tono"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_epost">Estabilidad Postural</label>
                                                        <select name="post_epost" data-titulo="Estabilidad Postural" data-seccion="Examen Postural" id="post_epost" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_epost','div_post_epost','obs_post_epost',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normales">Normales</option>
                                                            <option value="Anormales">Anormales</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_epost" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_epost">Estabilidad Postural <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Estabilidad Postural" data-seccion="Examen Postural" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_epost" id="obs_post_epost"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_p_pie">Posición de pie</label>
                                                        <select name="post_p_pie" data-titulo="Posición de pie" data-seccion="Examen Postural" id="post_p_pie" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_p_pie','div_post_p_pie','obs_post_p_pie',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option value="Normales">Normales</option>
                                                            <option value="Anormales">Anormales</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_p_pie" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_p_pie">Posición de pie <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Posición de pie" data-seccion="Examen Postural" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_p_pie" id="obs_post_p_pie"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_romb">Romberg</label>
                                                        <select name="post_romb" data-titulo="Romberg" data-seccion="Examen Postural" id="post_romb" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_romb','div_post_romb','obs_post_romb',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option value="Bordes netos y Normales">Bordes netos y Normales</option>
                                                            <option value="Anormales">Anormales</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_romb" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_romb">Romberg <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Romberg" data-seccion="Examen Postural" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_romb" id="obs_post_romb"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-10 m-9">
                                                    <h6 style="text-align: center">Examen Marcha</h6>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_mar_ini">Inicio de la Marcha</label>
                                                        <select name="post_mar_ini" data-titulo="Inicio de la Marcha" data-seccion="Examen Marcha" id="post_mar_ini" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_mar_ini','div_post_mar_ini','obs_post_mar_ini',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_mar_ini" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_mar_ini">Inicio de la Marcha <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Inicio de la Marcha" data-seccion="Examen Marcha" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_mar_ini" id="obs_post_mar_ini"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_mar_gir">Giros</label>
                                                        <select name="post_mar_gir" data-titulo="Giros" data-seccion="Examen Marcha" id="post_mar_gir" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_mar_gir','div_post_mar_gir','obs_post_mar_gir',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_mar_gir" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_mar_gir">Giros <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Giros" data-seccion="Examen Marcha" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_mar_gir" id="obs_post_mar_gir"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_mar_at">Marcha atrás</label>
                                                        <select name="post_mar_at" data-titulo="Marcha atrás" data-seccion="Examen Marcha" id="post_mar_at" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_mar_at','div_post_mar_at','obs_post_mar_at',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Sana">Sana</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_mar_at" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_mar_at">Marcha atrás <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Marcha atrás" data-seccion="Examen Marcha" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_mar_at" id="obs_post_mar_at"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_mar_punt">Marcha puntillas</label>
                                                        <select name="post_mar_punt" data-titulo="Marcha puntillas" data-seccion="Examen Marcha" id="post_mar_punt" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_mar_punt','div_post_mar_punt','obs_post_mar_punt',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_mar_punt" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_mar_punt">Marcha puntillas <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Marcha puntillas" data-seccion="Examen Marcha" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_mar_punt" id="obs_post_mar_punt"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_mar_st">Sobre Talón</label>
                                                        <select name="post_mar_st" data-titulo="Sobre Talón" data-seccion="Examen Marcha" id="post_mar_st" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_mar_st','div_post_mar_st','obs_post_mar_st',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_mar_st" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_mar_st">Sobre Talón <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Sobre Talón" data-seccion="Examen Marcha" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_mar_st" id="obs_post_mar_st"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_mar_tp">Talón-punta</label>
                                                        <select name="post_mar_tp" data-titulo="Talón-punta" data-seccion="Examen Marcha" id="post_mar_tp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_mar_tp','div_post_mar_tp','obs_post_mar_tp',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Sana">Sana</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_mar_tp" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_mar_tp">Talón-punta <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Talón-punta" data-seccion="Examen Marcha" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_mar_tp" id="obs_post_mar_tp"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_mar_ampl">Amplitud de la Marcha</label>
                                                        <select name="post_mar_ampl" data-titulo="Amplitud de la Marcha" data-seccion="Examen Marcha" id="post_mar_ampl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_mar_ampl','div_post_mar_ampl','obs_post_mar_ampl',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_mar_ampl" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_mar_ampl">Amplitud de la Marcha <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Amplitud de la Marcha" data-seccion="Examen Marcha" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_mar_ampl" id="obs_post_mar_ampl"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_mar_bs">Base sustentación</label>
                                                        <select name="post_mar_bs" data-titulo="Base sustentación" data-seccion="Examen Marcha" id="post_mar_bs" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_mar_bs','div_post_mar_bs','obs_post_mar_bs',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_mar_bs" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_mar_bs">Base sustentación <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Base sustentación" data-seccion="Examen Marcha" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_mar_bs" id="obs_post_mar_bs"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="post_mar_brac">Braceo</label>
                                                        <select name="post_mar_brac" data-titulo="Braceo" data-seccion="Examen Marcha" id="post_mar_brac" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('post_mar_brac','div_post_mar_brac','obs_post_mar_brac',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Sana">Sana</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_post_mar_brac" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_post_mar_brac">Braceo <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Braceo" data-seccion="Examen Marcha" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post_mar_brac" id="obs_post_mar_brac"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="desc_mar_anom">Describir Marchas Anómalas</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Describir Marchas Anómalas" data-seccion="Examen Marcha" id="desc_mar_anom" name="desc_mar_anom" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="reflejos();"><i class="feather icon-plus"></i> Reflejos Osteotendineos</button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="fuerza_sup();"><i class="feather icon-plus"></i> Examen Fuerza extremidad Superior</button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="fuerza_inf();"><i class="feather icon-plus"></i> Examen Fuerza extremidad Inferior</button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="postural();"><i class="feather icon-plus"></i> Examen motor Postura y Marcha</button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="tono();"><i class="feather icon-plus"></i> Examen Nervios Motores</button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="sensibilidad();"><i class="feather icon-plus"></i> Examen Nervios Sensitivos</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- EXAMEN IRRITACIÓN MENINGEA -->
                                <div class="tab-pane fade show" id="ex_im" role="tabpanel" aria-labelledby="ex_im-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="im_rnuc">Rigidez de Nuca</label>
                                                        <select name="im_rnuc" data-titulo="Rigidez de Nuca" data-seccion="Irritación Meningea" id="im_rnuc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('im_rnuc','div_im_rnuc','obs_im_rnuc',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_im_rnuc" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_im_rnuc">Rigidez de Nuca <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Rigidez de Nuca" data-seccion="Irritación Meningea" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_im_rnuc" id="obs_im_rnuc"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="im_s_ker">S. de Kerning</label>
                                                        <select name="im_s_ker" data-titulo="S. de Kerning" data-seccion="Irritación Meningea" id="im_s_ker" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('im_s_ker','div_im_s_ker','obs_im_s_ker',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_im_s_ker" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_im_s_ker">S. de Kerning <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. S. de Kerning" data-seccion="Irritación Meningea" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_im_s_ker" id="obs_im_s_ker"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="im_s_bru">S. de Brudzinski</label>
                                                        <select name="im_s_bru" data-titulo="S. de Brudzinski" data-seccion="Irritación Meningea" id="im_s_bru" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('im_s_bru','div_im_s_bru','obs_im_s_bru',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option  value="Normal">Normal</option>
                                                            <option value="Anormal">Anormal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_im_s_bru" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_im_s_bru">S. de Brudzinski <i>(Describir)</i></label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. S. de Brudzinski" data-seccion="Irritación Meningea" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_im_s_bru" id="obs_im_s_bru"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="im_ot_ant">Otros Antecedentes Importantes Exploración Meningea</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Otros Antecedentes Importantes Exploración Meningea" data-seccion="Irritación Meningea" id="im_ot_ant" name="im_ot_ant" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              <!-- PLAN DE TRATAMIENTO -->
                            <div class="tab-pane fade show" id="ex_plan_tto" role="tabpanel" aria-labelledby="ex_plan_tto-tab">
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        // Puedes agregar código aquí si es necesario al cargar la pestaña
                                    });

                                    function showContentneuro() {
                                        const checkbox = document.getElementById('tto_neuro');
                                        const content = document.getElementById('contentTto_neuro');
                                        content.style.display = checkbox.checked ? 'block' : 'none';
                                    }

                                    function showContentProc_neuro() {
                                        const checkbox = document.getElementById('pr_neuro');
                                        const content = document.getElementById('contentProc_neuro');
                                        content.style.display = checkbox.checked ? 'block' : 'none';
                                    }
                                </script>

                                <div class="form-row mt-2">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0">
                                        <h6 class="t-aten">Plan de Tratamiento</h6>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <!-- Tratamiento médico -->
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 mt-0">
                                        <label class="ml-0"><strong>Tratamiento médico</strong></label>
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="tto_neuro" name="tto_neuro" value="1" onchange="showContentneuro()" />
                                            <label for="tto_neuro" class="cr"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div id="contentTto_neuro" style="display: none;">
                                            <div class="form-row">
                                                <div class="form-group col-md-12 mt-1">
                                                    <label class="floating-label-activo-sm" for="rec_tto_neuro">Recomendaciones</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Tratamiento médico" data-tipo="Recom. Médicas Neuro" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_neuro" id="rec_tto_neuro"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Procedimiento -->
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 mt-0">
                                        <label class="ml-0"><strong>Procedimiento</strong></label>
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="pr_neuro" name="pr_neuro" value="1" onchange="showContentProc_neuro()" />
                                            <label for="pr_neuro" class="cr"></label>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 mt-0">
                                        <div id="contentProc_neuro" style="display: none;">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm" for="tipo_proc_neuro">Tipo</label>
                                                    <input type="text" class="form-control form-control-sm" name="tipo_proc_neuro" id="tipo_proc_neuro">
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label class="floating-label-activo-sm" for="plan_proc_neuro">Plan</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Procedimiento" data-seccion="Tipo Procedimiento" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_neuro" id="plan_proc_neuro"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Cirugía -->
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0">
                                        <div class="switch switch-success d-inline m-r-10">
                                            <label class="ml-0"><strong>Cirugía</strong></label>
                                            <input type="checkbox" class="custom-control-input" id="neuro_cir" name="neuro_cir" value="1">
                                            <label class="cr" for="neuro_cir"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div id="contentTto_ojo" style="display: none;">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <h6 class="text-center">Tratamiento médico</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="obs_gen_plan_tto">Obs. Plan de tratamiento</label>
                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion="Plan de tratamiento" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_gen_plan_tto" id="obs_gen_plan_tto"></textarea>
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
