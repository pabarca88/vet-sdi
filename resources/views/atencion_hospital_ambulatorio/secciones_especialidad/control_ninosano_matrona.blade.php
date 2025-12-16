<div class="tab-pane fade" id="ns" role="tabpanel" aria-labelledby="ns-tab">
    <div class="row bg-white shadow-sm rounded m-1 pt-3">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h6 class="text-c-blue">Control Niño Sano</h6>
            <hr>
        </div>
        <!--INFORMACIÓN DEL EMBARAZO PARTO Y PUERPERIO-->
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header" id="motivo">
                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                        Información del embarazo parto y puerperio
                    </button>
                </div>
                <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                    <div class="card-body-aten shadow-none">
                        <div class="row">
                            <div class="col-md-12">
                                <form>
                                    <div class="form-row mb-2">
                                        <div class="col-md-12">
                                            <!--Formulario / Menor de edad-->
                                            @include('atencion_pediatrica.generales.seccion_menor')
                                            <!--Cierre: Formulario / Menor de edad-->
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-md-12">
                                            <h6>I.-Información del embarazo puerperio</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Clínica / Hospital</label>
                                            <input type="text" class="form-control form-control-sm" name="n_clinica_hospital" id="n_clinica_hospital">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Patología del embarazo</label>
                                            <input type="text" class="form-control form-control-sm" name="p_pat_embarazo" id="p_pat_embarazo">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Semanas gestación</label>
                                            <input type="text" class="form-control form-control-sm" name="p_sem_gest" id="p_sem_gest">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Embarazo controlado</label>
                                            <input type="text" class="form-control form-control-sm" name="p_cont_emb" id="p_cont_emb">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Tipo de parto</label>
                                            <input type="text" class="form-control form-control-sm" name="p_tpo_parto" id="p_tpo_parto">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Lactancia</label>
                                            <input type="text" class="form-control form-control-sm" name="p_madre_lactancia" id="p_madre_lactancia">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Inscripción en Registro Civil</label>
                                            <input type="text" class="form-control form-control-sm" name="p_insc" id="p_insc">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="p_otros_parto" id="p_otros_parto">
                                        </div>
                                    </div>
                                    <div class="form-row mb-3 mt-2">
                                        <div class="col-md-12">
                                            <h6 onclick="abrir_div('recien_nacido');">II. Datos del recién nacido <i id="btn_recien_nacido" class="fas fa-plus-circle text-primary"  data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                        </div>
                                    </div>
                                    <div class="form-row" id="recien_nacido" style="display:none;">
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label-activo-sm">Fecha nacimiento</label>
                                            <input type="date" class="form-control form-control-sm" name="p_fn" id="p_fn">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label-activo-sm">Hora</label>
                                            <input type="time" class="form-control form-control-sm" name="p_hora" id="p_hora">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">Peso (kg.)</label>
                                            <input type="number" class="form-control form-control-sm" name="p_nac" id="p_nac">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">Talla (cm.)</label>
                                            <input type="number" class="form-control form-control-sm" name="p_talla" id="p_talla">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">Perimetro cefálico (cm.)</label>
                                            <input type="number" class="form-control form-control-sm" name="p_pc" id="p_pc">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">APGAR min</label>
                                            <input type="text" class="form-control form-control-sm" name="p_apgar_1" id="p_apgar_1">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">APGAR 5 min</label>
                                            <input type="text" class="form-control form-control-sm" name="p_apgar_5" id="p_apgar_5">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">Edad gestacional</label>
                                            <input type="text" class="form-control form-control-sm" name="p_eg" id="p_eg">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Reanimación</label>
                                            <input type="text" class="form-control form-control-sm" name="p_reanimacion" id="p_reanimacion">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Medicamentos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_uso_medicamento" id="p_uso_medicamento"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Diagnóstico</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_n_diag" id="p_n_diag"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Pronóstico</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_n_pronostico" id="p_n_pronostico"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Observaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_n_obs" id="p_n_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row mb-3 mt-2">
                                        <div class="col-md-12">
                                            <h6 onclick="abrir_div('vac_part_puerp');">III. Vacunas <i id="btn_vac_part_puerp" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                        </div>
                                    </div>
                                    <div class="form-row" id="vac_part_puerp" style="display:none;">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">BCG</label>
                                            <input type="text" class="form-control form-control-sm" name="p_bcg" id="p_bcg">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Hepatitis B</label>
                                            <input type="text" class="form-control form-control-sm" name="p_hep_b" id="p_hep_b">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Otra</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_otra_vac" id="p_otra_vac"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Sueros y Medicamentos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_otra_msuero" id="p_otra_msuero"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row mb-3 mt-2">
                                        <div class="col-md-12">
                                            <h6 onclick="abrir_div('extamiz');">IV. Exámenes y Tamizaje <i id="btn_extamiz" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                        </div>
                                    </div>
                                    <div class="form-row" id="extamiz" style="display:none;">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">TSH</label>
                                            <input type="text" class="form-control form-control-sm" name="p_tsh" id="p_tsh">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Evaluacion auditíva</label>
                                            <input type="text" class="form-control form-control-sm" name="p_eval_audit" id="p_eval_audit">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">PKU</label>
                                            <input type="text" class="form-control form-control-sm" name="p_pku" id="p_pku">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Otros</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_otros_ex" id="p_otros_ex"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTROL NIÑO SANO 0-7 DÍAS-->
        <div class="col-sm-12 col-md-12 col-lg-12" id="07">
            <div class="card">
                <div class="card-header" id="motivo0">
                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#motivo_c0" aria-expanded="false" aria-controls="motivo_c0">
                        Control Niño Sano (0-7 Días)
                    </button>
                </div>
                <div id="motivo_c0" class="collapse" aria-labelledby="motivo0" data-parent="#motivo0" style="">
                    <div class="card-body-aten shadow-none">
                        <!--CARGA FICHA TIPO-->
                        <div class="row justify-content-end">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--CONTROL PARAMETROS GENERALES-->
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <h5 class="text-c-blue mb-3">Control parámetros generales</h5>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                <label class="floating-label">Anamnesis</label>
                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_07anamnesis" name="p_07anamnesis"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Exper.Embarazo gral.</label>
                                    <select name="p_07_p_puerp" data-titulo="Experiencia_parto" id="p_07_p_puerp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_puerp','div_p_07_p_puerp','obs_p_07_p_puerp',2);">
                                        <option selected value="1">Normal y Felíz</option>
                                        <option value="2">Anormal</option>
                                        <option value="3">No Realizada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_07_p_puerp" style="display:none">
                                    <label class="floating-label-activo-sm">Experiencia del embarazo parto y puerperio <i>(describir)</i></label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Experiencia_parto" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_puerp" id="obs_p_07_p_puerp"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Est. Emoc.redes </label>
                                    <select name="p_07_p" id="p_07_p" data-titulo="Emoción"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p','div_p_07_p','obs_p_07_p',2);">
                                        <option selected value="1">Normal</option>
                                        <option value="2">Alterado</option>
                                        <option value="3">No Informadas</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_07_p" style="display:none">
                                    <label class="floating-label-activo-sm">Estado emocional familiar <i>(describir)</i></label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Emoción" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_p" id="obs_p_07_p"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Lactancia </label>
                                    <select name="p_07_p_lactancia" id="p_07_p_lactancia" data-titulo="Lactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_lactancia','div_p_07_p_lactancia','obs_p_07_p_lactancia',2);">
                                        <option selected value="1">Normal e Informada</option>
                                        <option value="2">Anormal</option>
                                        <option value="3">No Examinada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_07_p_lactancia" style="display:none">
                                    <label class="floating-label-activo-sm">Lactancia <i>(describir)</i></label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Lactancia" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_p_lactancia" id="obs_p_07_p_lactancia"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ant. heredo-fam. Mat.</label>
                                    <select name="p_07_p_ant_mat" id="p_07_p_ant_mat" data-titulo="Antec_mat"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ant_mat','div_p_07_p_ant_mat','obs_p_07_p_ant_mat',2);">
                                        <option selected value="1">No</option>
                                        <option value="2">Si</option>
                                        <option value="3">No Informados</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_07_p_ant_mat" style="display:none">
                                    <label class="floating-label-activo-sm">Ant. heredo-fam. Mat. <i>(describir)</i></label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Antec_mat" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_p_ant_mat" id="obs_p_07_p_ant_mat"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ant. heredo-fam. Pat.</label>
                                    <select name="p_07_p_ant_pat" id="p_07_p_ant_pat" data-titulo="Antec_pat"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ant_pat','div_p_07_p_ant_pat','obs_p_07_p_ant_pat',2);">
                                        <option selected value="1">No</option>
                                        <option value="2">Si</option>
                                        <option value="3">No Informada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_07_p_ant_pat" style="display:none">
                                    <label class="floating-label-activo-sm">Ant. heredo-fam. Pat. <i>(describir)</i></label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Antec_pat" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_p_ant_pat" id="obs_p_07_p_ant_pat"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--Examen físico del menor-->
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <h5 class="text-c-blue">Examen físico del menor</h5>
                            </div>
                        </div>
                        <div class="form-row" ID="EX_07">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label">Inspección general</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_07insp" name="p_07insp" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Actividad</label>
                                            <select name="p_07_p_rnact" data-titulo="Actividad" id="p_07_p_rnact" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_rnact','div_p_07_p_rnact','obs_p_07_p_rnact',2);">
                                                <option value="0">Seleccione</option>
                                                <option selected value="1">Normal y Felíz</option>
                                                <option value="2">Anormal</option>
                                                <option value="3">No Realizada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_rnact" style="display:none">
                                            <label class="floating-label-activo-sm">Actividad</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Experiencia_parto" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_rnact" id="obs_p_07_p_rnact"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Malformaciones</label>
                                            <select name="p_07_malf" id="p_07_malf" data-titulo="Malf"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_malf','div_p_07_malf','obs_p_07_malf',2);">
                                                <option selected value="1">No</option>
                                                <option value="2">Si</option>
                                                <option value="3">No Informadas</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_malf" style="display:none">
                                            <label class="floating-label-activo-sm">Malformaciones</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Malf" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_malf" id="obs_p_07_malf"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tono y Postura </label>
                                            <select name="p_07_p_tp" id="p_07_p_tp" data-titulo="Tono"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_tp','div_p_07_p_tp','obs_p_07_p_tp',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterada</option>
                                                <option value="3">No Informada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_tp" style="display:none">
                                            <label class="floating-label-activo-sm">Tono y Postura</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Tono" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_tp" id="obs_p_07_p_tp"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Piél</label>
                                            <select name="p_07_p_piel" id="p_07_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_piel','div_p_07_p_piel','obs_p_07_p_piel',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Anormal</option>
                                                <option value="3">No Informado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_piel" style="display:none">
                                            <label class="floating-label-activo-sm">Examen de Piél </label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_piel" id="obs_p_07_p_piel"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                            <select name="p_07_p_ojo" id="p_07_p_ojo" data-titulo="Ojos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ojo','div_p_07_p_ojo','obs_p_07_p_ojo',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_ojo" style="display:none">
                                            <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Ojos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ojo" id="obs_p_07_p_ojo"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ex Buco-dental</label>
                                            <select name="p_07_p_dental" id="p_07_p_dental" data-titulo="Dental"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_dental','div_p_07_p_dental','obs_p_07_p_dental',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Anormal</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_dental" style="display:none">
                                            <label class="floating-label-activo-sm">Ex Buco-dental</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Dental" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_dental" id="obs_p_07_p_dental"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Cabeza y Cuello</label>
                                            <select name="p_07_p_ccuello" data-titulo="Cab_cuello" id="p_07_p_ccuello" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ccuello','div_p_07_p_ccuello','obs_p_07_p_ccuello',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Anormal</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_ccuello" style="display:none">
                                            <label class="floating-label">Cabeza y Cuello</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Cab_cuello" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ccuello" id="obs_p_07_p_ccuello"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Cordón</label>
                                            <select name="p_07_pcordon" id="p_07_pcordon" data-titulo="Cordon"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_pcordon','div_p_07_pcordon','obs_p_07_pcordon',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Anormal</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_pcordon" style="display:none">
                                            <label class="floating-label-activo-sm">Cordón</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Cordon" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_pcordon" id="obs_p_07_pcordon"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tórax</label>
                                            <select name="p_07_p_torax" id="p_07_p_torax" data-titulo="Torax"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_torax','div_p_07_p_torax','obs_p_07_p_torax',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_torax" style="display:none">
                                            <label class="floating-label-activo-sm">Tórax</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Torax" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_torax" id="obs_p_07_p_torax"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Abdomen</label>
                                            <select name="p_07_p_abd" id="p_07_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_abd','div_p_07_p_abd','obs_p_07_p_abd',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_abd" style="display:none">
                                            <label class="floating-label-activo-sm">Abdomen</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_abda" id="obs_p_07_p_abd"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Columna</label>
                                            <select name="p_07_p_col" id="p_07_p_col" data-titulo="Columna"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_col','div_p_07_p_col','obs_p_07_p_col',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterada</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_col" style="display:none">
                                            <label class="floating-label-activo-sm">Columna</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Columna" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_col" id="obs_p_07_p_col"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Extremidades</label>
                                            <select name="p_07_p_ext" id="p_07_p_ext" data-titulo="Extrem"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ext','div_p_07_p_ext','obs_p_07_p_ext',2);">
                                                <option selected value="1">Normales</option>
                                                <option value="2">Alteradas</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_ext" style="display:none">
                                            <label class="floating-label-activo-sm">Extremidades</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Extrem" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ext" id="obs_p_07_p_ext"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Genitales-ano</label>
                                            <select name="p_07_p_gen" id="p_07_p_gen" data-titulo="Genitales"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_gen','div_p_07_p_gen','obs_p_07_p_gen',2);">
                                                <option selected value="1">Normales</option>
                                                <option value="2">Anormales</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_gen" style="display:none;">
                                            <label class="floating-label-activo-sm">Genitales</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Genitales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_gen" id="obs_p_07_p_gen"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ex. Neurológico (reflejos)</label>
                                            <select name="p_07_p_neuro" id="p_07_p_neuro" data-titulo="Neuro"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_neuro','div_p_07_p_neuro','obs_p_07_p_neuro',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_07_p_neuro" style="display:none;">
                                            <label class="floating-label-activo-sm">Ex Neurológico</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Neuro" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_neuro" id="obs_p_07_p_neuro"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="abrir_modal_guardar_tipo();"><i class="fas fa-save"></i> Guardar nuevo examen tipo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--Antropometria-->
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-row mb-2">
                                    <div class="col-md-12">
                                        <h5 class="text-c-blue ">Antropometría</h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Peso (kg.)</label>
                                        <input type="number" class="form-control form-control-sm" name="p_07_matpeso" id="p_07_matpeso">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Longitud</label>
                                        <input type="number" class="form-control form-control-sm" name="p_07_matlong_var" id="p_07_matlong_var">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Perímetro Cefálico</label>
                                        <input type="number" class="form-control form-control-sm" name="p_07_perim" id="p_07_perim">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Otros</label>
                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_otros" name="p_07_otros" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--Estado de salud materno-->
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <h5 class="text-c-blue ">Estado de salud materno</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="floating-label">Signos vitales</label>
                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_sv" name="p_07_sv"></textarea>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label">Peso (kg.)</label>
                                <input type="number" class="form-control form-control-sm" name="p_07_matpeso" id="p_07_matpeso">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label">Variación (kg.)</label>
                                <input type="number" class="form-control form-control-sm" name="p_07_matpeso_var" id="p_07_matpeso_var">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Involución uterina</label>
                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_utero" name="p_07_mat_utero" ></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Hda. Operatoria</label>
                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_heridaop" name="p_07_mat_heridaop" ></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Zona genito-anal</label>
                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_ga" name="p_07_mat_ga" ></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Extremidades inferiores (edemas)</label>
                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_ext" name="p_07_mat_ext" ></textarea>
                            </div>
                        </div>
                        <br>
                        <!--Lactancia materna-->
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <h5 class="text-c-blue ">Lactancia materna</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Lactancia en general</label>
                                    <select name="p_07_mat_lact" id="p_07_mat_lact" data-titulo="Lactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_mat_lact','div_p_07_mat_lact','obs_p_07_mat_lact',2);">
                                        <option selected value="1">Normal e Informada</option>
                                        <option value="2">Alterada</option>
                                        <option value="3">No Examinada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_07_mat_lact" style="display:none;">
                                    <label class="floating-label-activo-sm">Ex. mamas</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Lactancia" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_mat_lact" id="obs_p_07_mat_lact"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Técnica</label>
                                    <select name="p_07_p_tlactancia" id="p_07_p_tlactancia" data-titulo="TLactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_tlactancia','div_p_07_p_tlactancia','obs_p_07_p_tlactancia',2);">
                                        <option selected value="1">Informada</option>
                                        <option value="2">Alterada</option>
                                        <option value="3">No Examinada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_07_p_tlactancia" style="display:none;">
                                    <label class="floating-label-activo-sm">Técnica</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="TLactancia" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_p_tlactancia" id="obs_p_07_p_tlactancia"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                <label class="floating-label-activo-sm">Ex. mamas</label>
                                    <select name="p_07_mat_lactmamas" id="p_07_mat_lactmamas" data-titulo="ex_mamas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_mat_lactmamas','div_p_07_mat_lactmamas','obs_p_07_mat_lactmamas',2);">
                                        <option selected value="1">Normales</option>
                                        <option value="2">Alterada</option>
                                        <option value="3">No Examinadas</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_07_mat_lactmamas" style="display:none;">
                                    <label class="floating-label-activo-sm">Ex. mamas</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="ex_mamas" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_mat_lactmamas" id="obs_p_07_mat_lactmamas"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--Diagnósticos-->
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <h5 class="text-c-blue ">Diagnósticos</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="floating-label">General</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Incremento ponderal</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Lactancia</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Salud del lactante</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Salud de la madre</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Salud psicosocial</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                            </div>
                        </div>
                        <br>
                        <!--Indicaciones y próximo control-->
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <h5 class="text-c-blue ">Indicaciones y próximo control</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="p_07_fecha_proxcontrol" id="p_07_fecha_proxcontrol">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Control con:</label>
                                <input type="text" class="form-control form-control-sm" name="p_07_control_con" id="p_07_control_con">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label">Indicaciones</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_07_ind" id="p_07_ind"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="floating-label">Sugerencias</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_07_sugerencias" id="p_07_sugerencias"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTROL NIÑO SANO 1 MES-->
        <div class="col-sm-12 col-md-12 col-lg-12" id="1mes">
            <div class="card">
                <div class="card-header" id="motivo1">
                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open" type="button" data-toggle="collapse" data-target="#motivo_c1" aria-expanded="false" aria-controls="motivo_c1">
                        Control Niño Sano (1 Mes)
                    </button>
                </div>
                <div id="motivo_c1" class="collapse" aria-labelledby="motivo1" data-parent="#motivo1">
                    <div class="card-body-aten shadow-none">
                        <!--CARGA FICHA TIPO-->
                        <div class="form-row justify-content-end">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--CONTROL PARAMETROS GENERALES-->
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h5 class="text-c-blue mb-3">Control parámetros generales</h5>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Anamnesis</label>
                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_1anamnesis" name="p_1anamnesis" ></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Relaciones Fam</label>
                                    <select name="p_1_p_relfam" data-titulo="Relaciones_fam" id="p_1_p_relfam" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_relfam','div_p_1_relfam','obs_p_1_prelfam',2);">
                                        <option selected value="1">Normal y Feliz</option>
                                        <option value="2">Anormal</option>
                                        <option value="3">No Realizada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_relfam" style="display:none">
                                    <label class="floating-label-activo-sm">Relaciones Fam</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Relaciones_fam" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_relfam" id="obs_p_1_prelfam"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--Examen físico del menor-->
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <h5 class="text-c-blue ">Examen físico del menor</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Inspección general</label>
                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_07insp" name="p_07insp" ></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Piél</label>
                                    <select name="p_1_p_piel" id="p_1_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_piel','div_p_1_p_piel','obs_p_1_p_piel',2);">
                                        <option selected value="1">Normal </option>
                                        <option value="2">Alterada</option>
                                        <option value="3">No Examinada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_p_piel" style="display:none">
                                    <label class="floating-label-activo-sm">Examen de Piél </label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_piel" id="obs_p_1_p_piel"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ganglios</label>
                                    <select name="p_1_ganglios" id="p_1_ganglios" data-titulo="Ganglios"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_ganglios','div_p_1_ganglios','obs_p_1_ganglios',2);">
                                        <option selected value="1">Normal</option>
                                        <option value="2">Anormales</option>
                                        <option value="3">No Examinados</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_ganglios" style="display:none">
                                    <label class="floating-label-activo-sm">Ganglios</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Ganglios" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_ganglios" id="obs_p_1_ganglios"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Cardio_pulmonar</label>
                                    <select name="p_1_p_cpulm" data-titulo="Cardio_pulm" id="p_1_p_cpulm" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_cpulm','div_p_1_p_cpulm','obs_p_1_p_cpulm',2);">
                                        <option value="0">Seleccione</option>
                                        <option selected value="1">Normal </option>
                                        <option value="2">Alterado</option>
                                        <option value="3">No Realizado</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_p_cpulm" style="display:none">
                                    <label class="floating-label-activo-sm">Cardio_pulmonar</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Cardio_pulm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_cpulm" id="obs_p_1_p_cpulm"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Abdomen</label>
                                    <select name="p_1_p_abd" id="p_1_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_abd','div_p_1_p_abd','obs_p_1_p_abd',2);">
                                        <option selected value="1">Normal </option>
                                        <option value="2">Alterado</option>
                                        <option value="3">No Examinado</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_p_abd" style="display:none">
                                    <label class="floating-label-activo-sm">Abdomen</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_abd" id="obs_p_1_p_abd"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ex.Genito-anal</label>
                                    <select name="p_1_exganal" id="p_1_exganal" data-titulo="Ex.Genito-anal"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_exganal','div_p_1_exganal','obs_p_1_exganal',2);">
                                        <option selected value="1">Normal </option>
                                        <option value="2">Alterado</option>
                                        <option value="3">No Examinado</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_exganal" style="display:none">
                                    <label class="floating-label-activo-sm">Ex.Genito-anal</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Ex.Genito-anal" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_exganal" id="obs_p_1_exganal"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Reflejos </label>
                                    <select name="p_1_p_ref" id="p_1_p_ref" data-titulo="Reflejos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_ref','div_p_1_p_ref','obs_p_1_p_ref',2);">
                                        <option selected value="1">Normales </option>
                                        <option value="2">Alterados</option>
                                        <option value="3">No Realizados</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_p_ref" style="display:none">
                                    <label class="floating-label-activo-sm">Reflejos</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Reflejos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_ref" id="obs_p_1_p_ref"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Motilidad</label>
                                    <select name="p_1_p_mot" id="p_1_p_mot" data-titulo="Motilidad"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_mot','div_p_1_p_mot','obs_p_1_p_mot',2);">
                                        <option selected value="1">Normal </option>
                                        <option value="2">Alterada</option>
                                        <option value="3">No Examinada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_p_mot" style="display:none">
                                    <label class="floating-label-activo-sm">Examen de Motilidad </label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Motilidad" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_mot" id="obs_p_1_p_mot"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tono Axilar</label>
                                    <select name="p_1_tonoaxil" id="p_1_tonoaxil" data-titulo="Tono Axilar"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_tonoaxil','div_p_1_tonoaxil','obs_p_1_tonoaxil',2);">
                                        <option selected value="1">Normal</option>
                                        <option value="2">Anormal</option>
                                        <option value="3">No Examinado</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_tonoaxil" style="display:none">
                                    <label class="floating-label-activo-sm">Tono Axilar</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Tono Axilar" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_tonoaxil" id="obs_p_1_tonoaxil"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Signos Par.Cer</label>
                                    <select name="p_1_p_paralisis" data-titulo="Signos Par.Cer" id="p_1_p_paralisis" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_paralisis','div_p_1_p_paralisis','obs_p_1_p_paralisis',2);">
                                        <option value="0">Seleccione</option>
                                        <option selected value="1">No</option>
                                        <option value="2">Si</option>
                                        <option value="3">No Evaluado</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_p_paralisis" style="display:none">
                                    <label class="floating-label-activo-sm">Signos Par.Cer</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Signos Par.Cer" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_paralisis" id="obs_p_1_p_paralisis"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Columna</label>
                                    <select name="p_1_p_col" id="p_1_p_col" data-titulo="Columna"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_col','div_p_1_p_col','obs_p_1_p_col',2);">
                                        <option selected value="1">Normal </option>
                                        <option value="2">Alterado</option>
                                        <option value="3">No Examinada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_p_col" style="display:none">
                                    <label class="floating-label-activo-sm">Columna</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Columna" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_col" id="obs_p_1_p_col"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Caderas</label>
                                    <select name="p_1_cadera" id="p_1_cadera" data-titulo="Caderas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_cadera','div_p_1_cadera','obs_p_1_cadera',2);">
                                        <option selected value="1">Normales </option>
                                        <option value="2">Alteradas</option>
                                        <option value="3">No Examinadas</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_cadera" style="display:none">
                                    <label class="floating-label-activo-sm">Caderas</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Caderas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_cadera" id="obs_p_1_cadera"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Extremidades</label>
                                    <select name="p_1_p_ext" id="p_1_p_ext" data-titulo="Extremidades"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_ext','div_p_1_p_ext','obs_p_1_p_ext',2);">
                                        <option selected value="1">Normal </option>
                                        <option value="2">Alteradas</option>
                                        <option value="3">No Examinadas</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_p_ext" style="display:none">
                                    <label class="floating-label-activo-sm">Extremidades</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Extremidades" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_ext" id="obs_p_1_p_ext"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Oftalmología</label>
                                    <select name="p_1_p_ojo" id="p_1_p_ojo" data-titulo="Oftalmología"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_ojo','div_p_1_p_ojo','obs_p_1_p_ojo',2);">
                                        <option selected value="1">Normal </option>
                                        <option value="2">Alterado</option>
                                        <option value="3">No Examinado</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_p_ojo" style="display:none">
                                    <label class="floating-label-activo-sm">Oftalmología</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Oftalmología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_ojo" id="obs_p_1_p_ojo"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Audición</label>
                                    <select name="p_1_audio" id="p_1_audio" data-titulo="Audición"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_audio','div_p_1_audio','obs_p_1_audio',2);">
                                        <option selected value="1">Normal</option>
                                        <option value="2">Anormal</option>
                                        <option value="3">No Examinada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_audio" style="display:none">
                                    <label class="floating-label-activo-sm">Audición</label>
                                    <textarea class="form-control form-control-sm"  data-titulo="Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_audio" id="obs_p_1_audio"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Buco-Dental</label>
                                    <select name="p_1_p_bd" data-titulo="Buco-Dental" id="p_1_p_bd" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_bd','div_p_1_p_bd','obs_p_1_p_bd',2);">
                                        <option value="0">Seleccione</option>
                                        <option selected value="1">Normal </option>
                                        <option value="2">Alterado</option>
                                        <option value="3">No Realizado</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_p_1_p_bd" style="display:none">
                                    <label class="floating-label-activo-sm">Buco-Dental</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Buco-Dental" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_bd" id="obs_p_1_p_bd"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4 mx-auto">
                                <div class="form-group">
                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="abrir_modal_guardar_tipo();"><i class="fas fa-save"></i> Guardar nuevo examen tipo</button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--Antropometría-->
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <h5 class="text-c-blue">Antropometría</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="floating-label">Peso en (gr.)</label>
                                <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label">Longitud (cm.)</label>
                                <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label">Perímetro cefálico (cm.)</label>
                                <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label">Cefalohematomas Fontanella ant.</label>
                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                            </div>
                        </div>
                        <br>
                        <!--Lactancia materna-->
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <h5 class="text-c-blue">Lactancia materna</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="floating-label">General</label>
                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="lac_general" name="lac_general" ></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label">Técnica</label>
                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="tec" name="tec" ></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label">Ex. Mamas</label>
                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="mamas" name="mamas" ></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label">Señales de maltrato</label>
                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                            </div>
                        </div>
                        <br>
                        <!--Diagnósticos-->
                         <div class="form-row mb-2">
                            <div class="col-md-12">
                                <h5 class="text-c-blue">Diagnósticos</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="floating-label">General</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Incremento ponderal</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Nutricional</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Salud del lactante</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Salud de la madre</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_madre" id="sal_madre"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Salud psicosocial</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_psico" id="sal_psico"></textarea>
                            </div>
                        </div>
                        <br>
                        <!--Indicaciones y próximo control-->
                         <div class="form-row mb-2">
                            <div class="col-md-12">
                                <h5 class="text-c-blue">Indicaciones y próximo control</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="p_07_fecha_proxcontrol" id="p_07_fecha_proxcontrol">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Control con</label>
                                <input type="text" class="form-control form-control-sm" name="p_07_control_con" id="p_07_control_con">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label">Indicaciones</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_07_ind" id="p_07_ind"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="floating-label">Sugerencias</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_07_sugerencias" id="p_07_sugerencias"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
