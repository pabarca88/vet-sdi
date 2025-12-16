<div id="m_voz" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_voz" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">EVALUACIÓN DE LA VOZ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-fono_habla" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="eval_voz_general-tab" data-toggle="tab" href="#eval_voz_general" role="tab" aria-controls="eval_voz_general" aria-selected="false">P. GENERALES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="eval_voz_orofacial-tab" data-toggle="tab" href="#eval_voz_orofacial" role="tab" aria-controls="eval_voz_orofacial" aria-selected="true">EVALUACION OROFACIAL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="eval_voz_postura-tab" data-toggle="tab" href="#eval_voz_postura" role="tab" aria-controls="eval_voz_postura" aria-selected="true">EVALUACION POSTURAL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="eval_voz_respirac-tab" data-toggle="tab" href="#eval_voz_respirac" role="tab" aria-controls="eval_voz_respirac" aria-selected="false">RESPIRACION</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="eval_voz_pvocales-tab" data-toggle="tab" href="#eval_voz_pvocales" role="tab" aria-controls="eval_voz_pvocales" aria-selected="false">PARÁMETROS VOCALES</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-ofa">
                            <!--EVALUACIÓN GENERAL-->
                            <div class="tab-pane fade show active" id="eval_voz_general" role="tabpanel" aria-labelledby="eval_voz_general-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="Boca" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">PARÁMETROS GENERALES</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <label  class="floating-label-activo-sm">Edad</label>
                                                                <div class="form-group fill">
                                                                    <input type="number" min="0" class="form-control form-control-sm" name="edad" id="edad" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <label  class="floating-label-activo-sm">Ocupación y horas uso</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="tpo_uso_vz" id="tpo_uso_vz">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <label  class="floating-label-activo-sm">Data de la disfonía</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="tpo_disf" id="tpo_disf">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <label class="floating-label-activo-sm">Exposición a ruidos</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="tpo_exp_ruidos" id="tpo_exp_ruidos">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <label  class="floating-label-activo-sm">Audición</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="audic" id="audic">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <label  class="floating-label-activo-sm">Cuadros respiratórios</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="enf_resp" id="enf_resp">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <label class="floating-label-activo-sm">Medicamentos</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="uso_med" id="uso_med">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <label  class="floating-label-activo-sm">Patologias anteriores</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="pat_ant" id="pat_ant">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <label  class="floating-label-activo-sm">Hábitos</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="habitos" id="habitos">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <label  class="floating-label-activo-sm">Tratamientos Anteriores</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="ttos_ant" id="ttos_ant">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">

                                                                <div class="form-group fill">
                                                                    <label  class="floating-label-activo-sm">Observaciones Generales</label>
                                                                    <textarea class="form-control form-control-sm"rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="voz_obs_gen" id="voz_obs_gen"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="eval_voz_orofacial" role="tabpanel" aria-labelledby="eval_voz_orofacial-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="Boca" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">EXAMEN OROFACIAL</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Vestíbulo Bucal</label>
                                                                    <select name="ev_voz_vest_boc" id="ev_voz_vest_boc"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_vest_boc','div_ev_voz_vest_boc','ev_voz_vest_boc_obs',2);">
                                                                        <option value="1"> Adecuado</option>
                                                                        <option value="2"> Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_voz_vest_boc" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs Vestíbulo</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_vest_boc_obs" id="ev_voz_vest_boc_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Frenillo Superior</label>
                                                                    <select name="ev_voz_fre_sup" id="ev_voz_fre_sup" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_fre_sup','div_ev_voz_fre_sup','ev_voz_fre_sup_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_voz_fre_sup" style="display:none">
                                                                    <label class="floating-label-activo-sm">Obs Frenillo Superior</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_fre_sup_obs" id="ev_voz_fre_sup_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Frenillo Inferior</label>
                                                                    <select name="ev_voz_fr_inf" id="ev_voz_fr_inf"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_fr_inf','div_ev_voz_fr_inf','ev_voz_fr_inf_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_voz_fr_inf" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Obs Frenillo Inferior</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_fr_inf_obs" id="ev_voz_fr_inf_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Frenillo Sublingual</label>
                                                                    <select name="ev_voz_fr_sl" id="ev_voz_fr_sl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_fr_sl','div_ev_voz_fr_sl','ev_voz_fr_sl_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_voz_fr_sl" style="display:none">
                                                                    <label class="floating-label-activo-sm">Obs Frenillo Sublingual</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_fr_sl_obs" id="ev_voz_fr_sl_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Paladar Duro</label>
                                                                    <select name="ev_voz_pd" id="ev_voz_pd" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_pd','div_ev_voz_pd','ev_voz_pd_obs',7);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2"> Ojival</option>
                                                                        <option value="3"> Plano</option>
                                                                        <option value="4"> Fisurado Evidente</option>
                                                                        <option value="5"> Sospecha Fisura Submucosa</option>
                                                                        <option value="6"> Tumor</option>
                                                                        <option value="7"> Otra</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_voz_pd" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Obs Paladar Duro</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_pd_obs" id="ev_voz_pd_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Paladar Blando</label>
                                                                    <select name="ev_voz_pb" id="ev_voz_pb"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_pb','div_ev_voz_pb','ev_voz_pb_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_voz_pb" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Obs Paladar Blando</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_pb_obs" id="ev_voz_pb_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Cierre Velo-faringeo</label>
                                                                    <select name="ev_voz_cvf" id="ev_voz_cvf"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_cvf','div_ev_voz_cvf','ev_voz_cvf_obs',5);">
                                                                        <option value="1">Coronal</option>
                                                                        <option value="2">Sagital</option>
                                                                        <option value="3">Circular</option>
                                                                        <option value="4">Circular en Rodete de Passavant</option>
                                                                        <option value="5">Otro(describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_voz_cvf" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Cierre Velo-faringeo</label>
                                                                    <textarea class="form-control form-control-sm"d rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_cvf_obs" id="ev_voz_cvf_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Úvula</label>
                                                                    <select name="ev_voz_uvul" id="ev_voz_uvul"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_uvul','div_ev_voz_uvul','ev_voz_uvul_obs',7);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2"> Ausente</option>
                                                                        <option value="3"> Bífida</option>
                                                                        <option value="4"> Larga</option>
                                                                        <option value="5"> Corta</option>
                                                                        <option value="6"> Tumor</option>
                                                                        <option value="7"> Otra</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_voz_uvul" style="display:none">
                                                                    <label class="floating-label-activo-sm">Obs Úvula</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_uvul_obs" id="ev_voz_uvul_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Amigdalas</label>
                                                                    <select name="ev_voz_amig" id="ev_voz_amig"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_amig','div_ev_voz_amig','ev_voz_amig_obs',3);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2">Hipertroficas</option>
                                                                        <option value="3"> Otra</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_voz_amig" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Obs Amigdalas</label>
                                                                    <textarea class="form-control form-control-sm"rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_amig_obs" id="ev_voz_amig_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Adenoídes</label>
                                                                    <select name="ev_voz_aden" id="ev_voz_aden"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_voz_aden','div_ev_voz_aden','ev_voz_aden_obs',3);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2">Hipertroficas</option>
                                                                        <option value="3"> Otra</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_voz_aden" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Obs Adenoídes</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_aden_obs" id="ev_voz_aden_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8 mt-2">

                                                                <div class="form-group" id="div_ev_voz_vest_boc">
                                                                    <label  class="floating-label-activo-sm">Obs Examen de la Boca</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_voz_boc_obs" id="ev_voz_boc_obs"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="eval_voz_postura" role="tabpanel" aria-labelledby="eval_voz_postura-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="Boca" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">EXAMEN POSTURAL</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-6 mt-2">
                                                                <label class="floating-label-activo-sm">Estática</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="posic_estatica" id="posic_estatica">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <label  class="floating-label-activo-sm">Dinámica</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="posic_dinamica" id="posic_dinamica">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Flexión</label>
                                                                    <select name="ev_vf" id="ev_vf"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_vf','div_ev_vf','ev_vf_obs',2);">
                                                                        <option selected value="1"> Normal</option>
                                                                        <option value="2"> Alterada (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_vf" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs Flexión</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_vf_obs" id="ev_vf_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Extensión</label>
                                                                    <select name="ev_vext" id="ev_vext" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_vext','div_ev_vext','ev_vext_obs',2);">
                                                                        <option selected value="1">Adecuada</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_vext" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Obs Extensión</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_vext_obs" id="ev_vext_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Rotación</label>
                                                                    <select name="ev_vro" id="ev_vro"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_vro','div_ev_vro','ev_vro_obs',2);">
                                                                        <option selected value="1">Adecuada</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_vro" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Obs.Rotación</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_vro_obs" id="ev_vro_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Flexión Lateral</label>
                                                                    <select name="ev_vflat" id="ev_vflat"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_vflat','div_ev_vflat','ev_vflat_obs',2);">
                                                                        <option selected value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_vflat" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Obs Flexión Lateral</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_vflat_obs" id="ev_vflat_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Altura Laríngea</label>
                                                                    <select name="ev_val" id="ev_val"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ev_val','div_ev_val','ev_val_obs',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option selected value="1"> Normal</option>
                                                                        <option value="2"> Alterada (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ev_val" style="display:none">
                                                                    <label class="floating-label-activo-sm">Obs Altura Laríngea</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_val_obs" id="ev_val_obs"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="div_ofa_vest_boc">
                                                                    <label  class="floating-label-activo-sm">Obs Examen Postural</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ev_val_ep_obs" id="ev_val_ep_obs"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="eval_voz_respirac" role="tabpanel" aria-labelledby="eval_voz_respirac-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="labios" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">EXAMEN DE LA RESPIRACION</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Torax</label>
                                                                    <select name="ex_resp_torax" id="ex_resp_torax"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_resp_torax','div_ex_resp_torax','ex_resp_torax_obs',2);">
                                                                        <option selected value="1"> Normal</option>
                                                                        <option value="2"> Alterado (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ex_resp_torax" style="display:none">
                                                                    <label class="floating-label-activo-sm">Obs Torax</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ex_resp_torax_obs" id="ex_resp_torax_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <label  class="floating-label-activo-sm">Dinámica</label>
                                                                <div class="form-group fill">
                                                                    <input type="text" class="form-control form-control-sm" name="resp_din" id="resp_din">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">

                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Columna</label>
                                                                    <select name="resp_col" id="resp_col"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_col','div_resp_col','resp_col_obs',2);">
                                                                        <option selected value="1"> Normal</option>
                                                                        <option value="2"> Alterada (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_resp_col" style="display:none">
                                                                    <label class="floating-label-activo-sm">Obs Columna</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="resp_col_obs" id="resp_col_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Tipo Respiratorio</label>
                                                                    <select name="resp_tpo_resp" id="resp_tpo_resp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_tpo_resp','div_resp_tpo_resp','resp_tpo_resp_obs',2);">
                                                                        <option selected value="1"> Normal</option>
                                                                        <option value="2"> Alterado (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_resp_tpo_resp" style="display:none">
                                                                    <label class="floating-label-activo-sm">Obs.Tipo Respiratorio</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="resp_tpo_resp_obs" id="resp_tpo_resp_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Modo</label>
                                                                    <select name="resp_modo" id="resp_modo"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_modo','div_resp_modo','resp_modo_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_resp_modo" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Obs Modo</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="resp_modo_obs" id="resp_modo_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Duración Soplo</label>
                                                                    <select name="soplo_dur" id="soplo_dur" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('soplo_dur','div_soplo_dur','soplo_dur_obs',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2"> Anormal (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_soplo_dur" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs Duración Soplo</label>
                                                                    <textarea class="form-control form-control-sm" drows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="soplo_dur_obs" id="soplo_dur_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Fuerza del Soplo</label>
                                                                    <select name="soplo_fzasoplo_fza" id="soplo_fza"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('soplo_fza','div_soplo_fza','soplo_fza_obs',2);">
                                                                        <option value="1">Adecuada</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_soplo_fza" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Obs Fuerza del Soplo</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="soplo_fza_obs" id="soplo_fza_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Coordinación Fono-resp</label>
                                                                    <select name="coord_fono_resp" id="coord_fono_resp"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('coord_fono_resp','div_coord_fono_resp','coord_fono_resp_obs',2);">
                                                                        <option value="1">Adecuada</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_coord_fono_resp" style="display:none">
                                                                    <label class="floating-label-activo-sm">Obs Coordinación Fono-resp</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="coord_fono_resp_obs" id="coord_fono_resp_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="div_ofa_vest_boc">
                                                                    <label  class="floating-label-activo-sm">Obs Examen Respiratorio</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ex_respiratorio_obs" id="ex_respiratorio_obs"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="eval_voz_pvocales" role="tabpanel" aria-labelledby="eval_voz_pvocales-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div id="labios" class="form-row">
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <h6 class="floating-center">EXAMEN DE PARÁMETROS VOCALES</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Ataque</label>
                                                            <select name="ataque_voc" id="ataque_voc" data-titulo="Forma Labios" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ataque_voc','div_ataque_voc','ataque_voc_obs',2);">
                                                                <option value="1"> Normal</option>
                                                                <option value="2"> Alterada (describir)</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ataque_voc" style="display:none">
                                                            <label  class="floating-label-activo-sm">Obs Ataque</label>
                                                            <textarea class="form-control form-control-sm" data-titulo="Obs Forma Labios" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ataque_voc_obs" id="ataque_voc_obs"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tono</label>
                                                            <select name="ton_voc" id="ton_voc"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ton_voc','div_ton_voc','ton_voc_obs',2);">
                                                                <option value="1">Adecuado</option>
                                                                <option value="2">Alterado</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ton_voc" style="display:none">
                                                            <label id="" name="" class="floating-label-activo-sm">Obs Tono</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ton_voc_obs" id="ton_voc_obs"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Intensidad</label>
                                                            <select name="int_voz" id="int_voz"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('int_voz','div_int_voz','int_voz_obs',2);">
                                                                <option value="1">No</option>
                                                                <option value="2">Si (describir)</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_int_voz" style="display:none">
                                                            <label id="" name="" class="floating-label-activo-sm">Obs.Intensidad</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="int_voz_obs" id="int_voz_obs"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mt-2">
                                                        <div class="form-group">
                                                            <label  class="floating-label-activo-sm">Obs.Parámetros Vocales</label>
                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="param_voc_obs" id="param_voc_obs"></textarea>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="registrar_ev_voz();"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function e_voz() {
        $('#m_voz').modal('show');
    }

    function registrar_ev_voz()
    {
        var id_ficha_otros_prof = $('#id_fc').val();
        var id_ficha_fono = '';
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var edad = $('#edad').val();
        var tpo_uso_vz = $('#tpo_uso_vz').val();
        var tpo_disf = $('#tpo_disf').val();
        var tpo_exp_ruidos = $('#tpo_exp_ruidos').val();
        var audic = $('#audic').val();
        var enf_resp = $('#enf_resp').val();
        var uso_med = $('#uso_med').val();
        var pat_ant = $('#pat_ant').val();
        var habitos = $('#habitos').val();
        var ttos_ant = $('#ttos_ant').val();
        var voz_obs_gen = $('#voz_obs_gen').val();
        var ev_voz_vest_boc = $('#ev_voz_vest_boc').val();
        var ev_voz_vest_boc_obs = $('#ev_voz_vest_boc_obs').val();
        var ev_voz_fre_sup = $('#ev_voz_fre_sup').val();
        var ev_voz_fre_sup_obs = $('#ev_voz_fre_sup_obs').val();
        var ev_voz_fr_inf = $('#ev_voz_fr_inf').val();
        var ev_voz_fr_inf_obs = $('#ev_voz_fr_inf_obs').val();
        var ev_voz_fr_sl = $('#ev_voz_fr_sl').val();
        var ev_voz_fr_sl_obs = $('#ev_voz_fr_sl_obs').val();
        var ev_voz_pd = $('#ev_voz_pd').val();
        var ev_voz_pd_obs = $('#ev_voz_pd_obs').val();
        var ev_voz_pb = $('#ev_voz_pb').val();
        var ev_voz_pb_obs = $('#ev_voz_pb_obs').val();
        var ev_voz_cvf = $('#ev_voz_cvf').val();
        var ev_voz_cvf_obs = $('#ev_voz_cvf_obs').val();
        var ev_voz_uvul = $('#ev_voz_uvul').val();
        var ev_voz_uvul_obs = $('#ev_voz_uvul_obs').val();
        var ev_voz_amig = $('#ev_voz_amig').val();
        var ev_voz_amig_obs = $('#ev_voz_amig_obs').val();
        var ev_voz_aden = $('#ev_voz_aden').val();
        var ev_voz_aden_obs = $('#ev_voz_aden_obs').val();
        var ev_voz_boc_obs = $('#ev_voz_boc_obs').val();
        var posic_estatica = $('#posic_estatica').val();
        var posic_dinamica = $('#posic_dinamica').val();
        var ev_vf = $('#ev_vf').val();
        var ev_vf_obs = $('#ev_vf_obs').val();
        var ev_vext = $('#ev_vext').val();
        var ev_vext_obs = $('#ev_vext_obs').val();
        var ev_vro = $('#ev_vro').val();
        var ev_vro_obs = $('#ev_vro_obs').val();
        var ev_vflat = $('#ev_vflat').val();
        var ev_vflat_obs = $('#ev_vflat_obs').val();
        var ev_val = $('#ev_val').val();
        var ev_val_obs = $('#ev_val_obs').val();
        var ev_val_ep_obs = $('#ev_val_ep_obs').val();
        var ex_resp_torax = $('#ex_resp_torax').val();
        var ex_resp_torax_obs = $('#ex_resp_torax_obs').val();
        var resp_din = $('#resp_din').val();
        var resp_col = $('#resp_col').val();
        var resp_col_obs = $('#resp_col_obs').val();
        var resp_tpo_resp = $('#resp_tpo_resp').val();
        var resp_tpo_resp_obs = $('#resp_tpo_resp_obs').val();
        var resp_modo = $('#resp_modo').val();
        var resp_modo_obs = $('#resp_modo_obs').val();
        var soplo_dur = $('#soplo_dur').val();
        var soplo_dur_obs = $('#soplo_dur_obs').val();
        var soplo_fza = $('#soplo_fza').val();
        var soplo_fza_obs = $('#soplo_fza_obs').val();
        var coord_fono_resp = $('#coord_fono_resp').val();
        var coord_fono_resp_obs = $('#coord_fono_resp_obs').val();
        var ex_respiratorio_obs = $('#ex_respiratorio_obs').val();
        var ataque_voc = $('#ataque_voc').val();
        var ataque_voc_obs = $('#ataque_voc_obs').val();
        var ton_voc = $('#ton_voc').val();
        var ton_voc_obs = $('#ton_voc_obs').val();
        var int_voz = $('#int_voz').val();
        var int_voz_obs = $('#int_voz_obs').val();
        var param_voc_obs = $('#param_voc_obs').val();

        var url = "{{ route('ficha.otro.prof.registro.eval.voz') }}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                    _token: CSRF_TOKEN,
                    id_ficha_otros_prof:id_ficha_otros_prof,
                    id_ficha_fono:id_ficha_fono,
                    id_paciente:id_paciente,
                    id_profesional:id_profesional,
                    edad:edad,
                    tpo_uso_vz:tpo_uso_vz,
                    tpo_disf:tpo_disf,
                    tpo_exp_ruidos:tpo_exp_ruidos,
                    audic:audic,
                    enf_resp:enf_resp,
                    uso_med:uso_med,
                    pat_ant:pat_ant,
                    habitos:habitos,
                    ttos_ant:ttos_ant,
                    voz_obs_gen:voz_obs_gen,
                    ev_voz_vest_boc:ev_voz_vest_boc,
                    ev_voz_vest_boc_obs:ev_voz_vest_boc_obs,
                    ev_voz_fre_sup:ev_voz_fre_sup,
                    ev_voz_fre_sup_obs:ev_voz_fre_sup_obs,
                    ev_voz_fr_inf:ev_voz_fr_inf,
                    ev_voz_fr_inf_obs:ev_voz_fr_inf_obs,
                    ev_voz_fr_sl:ev_voz_fr_sl,
                    ev_voz_fr_sl_obs:ev_voz_fr_sl_obs,
                    ev_voz_pd:ev_voz_pd,
                    ev_voz_pd_obs:ev_voz_pd_obs,
                    ev_voz_pb:ev_voz_pb,
                    ev_voz_pb_obs:ev_voz_pb_obs,
                    ev_voz_cvf:ev_voz_cvf,
                    ev_voz_cvf_obs:ev_voz_cvf_obs,
                    ev_voz_uvul:ev_voz_uvul,
                    ev_voz_uvul_obs:ev_voz_uvul_obs,
                    ev_voz_amig:ev_voz_amig,
                    ev_voz_amig_obs:ev_voz_amig_obs,
                    ev_voz_aden:ev_voz_aden,
                    ev_voz_aden_obs:ev_voz_aden_obs,
                    ev_voz_boc_obs:ev_voz_boc_obs,
                    posic_estatica:posic_estatica,
                    posic_dinamica:posic_dinamica,
                    ev_vf:ev_vf,
                    ev_vf_obs:ev_vf_obs,
                    ev_vext:ev_vext,
                    ev_vext_obs:ev_vext_obs,
                    ev_vro:ev_vro,
                    ev_vro_obs:ev_vro_obs,
                    ev_vflat:ev_vflat,
                    ev_vflat_obs:ev_vflat_obs,
                    ev_val:ev_val,
                    ev_val_obs:ev_val_obs,
                    ev_val_ep_obs:ev_val_ep_obs,
                    ex_resp_torax:ex_resp_torax,
                    ex_resp_torax_obs:ex_resp_torax_obs,
                    resp_din:resp_din,
                    resp_col:resp_col,
                    resp_col_obs:resp_col_obs,
                    resp_tpo_resp:resp_tpo_resp,
                    resp_tpo_resp_obs:resp_tpo_resp_obs,
                    resp_modo:resp_modo,
                    resp_modo_obs:resp_modo_obs,
                    soplo_dur:soplo_dur,
                    soplo_dur_obs:soplo_dur_obs,
                    soplo_fza:soplo_fza,
                    soplo_fza_obs:soplo_fza_obs,
                    coord_fono_resp:coord_fono_resp,
                    coord_fono_resp_obs:coord_fono_resp_obs,
                    ex_respiratorio_obs:ex_respiratorio_obs,
                    ataque_voc:ataque_voc,
                    ataque_voc_obs:ataque_voc_obs,
                    ton_voc:ton_voc,
                    ton_voc_obs:ton_voc_obs,
                    int_voz:int_voz,
                    int_voz_obs:int_voz_obs,
                    param_voc_obs:param_voc_obs,
                },
            })
        .done(function(data) {
            if (data.estado == 1)
            {

                $('#m_voz').modal('hide');
                limpiar_e_voz();
                swal({
                    title: "Registro de Evaluacion de la Voz",
                    text: "Carga Exitosa.",
                    icon: "success"
                });
            }
            else
            {
                swal({
                    title: "Registro de Evaluacion de la Voz",
                    text: "Error al registrar",
                    icon: "error"
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function limpiar_e_voz()
    {
        $('#edad').val("{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}") ; // - text
        $('#tpo_uso_vz').val(''); // - text
        $('#tpo_disf').val(''); // - text
        $('#tpo_exp_ruidos').val(''); // - text
        $('#audic').val(''); // - text
        $('#enf_resp').val(''); // - text
        $('#uso_med').val(''); // - text
        $('#pat_ant').val(''); // - text
        $('#habitos').val(''); // - text
        $('#ttos_ant').val(''); // - text
        $('#voz_obs_gen').val(''); // - textarea
        $('#ev_voz_vest_boc').val(1); // - select-one
        $('#ev_voz_vest_boc_obs').val(''); // - textarea
        $('#ev_voz_fre_sup').val(1); // - select-one
        $('#ev_voz_fre_sup_obs').val(''); // - textarea
        $('#ev_voz_fr_inf').val(1); // - select-one
        $('#ev_voz_fr_inf_obs').val(''); // - textarea
        $('#ev_voz_fr_sl').val(1); // - select-one
        $('#ev_voz_fr_sl_obs').val(''); // - textarea
        $('#ev_voz_pd').val(1); // - select-one
        $('#ev_voz_pd_obs').val(''); // - textarea
        $('#ev_voz_pb').val(1); // - select-one
        $('#ev_voz_pb_obs').val(''); // - textarea
        $('#ev_voz_cvf').val(1); // - select-one
        $('#ev_voz_cvf_obs').val(''); // - textarea
        $('#ev_voz_uvul').val(1); // - select-one
        $('#ev_voz_uvul_obs').val(''); // - textarea
        $('#ev_voz_amig').val(1); // - select-one
        $('#ev_voz_amig_obs').val(''); // - textarea
        $('#ev_voz_aden').val(1); // - select-one
        $('#ev_voz_aden_obs').val(''); // - textarea
        $('#ev_voz_boc_obs').val(''); // - textarea
        $('#posic_estatica').val(''); // - text
        $('#posic_dinamica').val(''); // - text
        $('#ev_vf').val(1); // - select-one
        $('#ev_vf_obs').val(''); // - textarea
        $('#ev_vext').val(1); // - select-one
        $('#ev_vext_obs').val(''); // - textarea
        $('#ev_vro').val(1); // - select-one
        $('#ev_vro_obs').val(''); // - textarea
        $('#ev_vflat').val(1); // - select-one
        $('#ev_vflat_obs').val(''); // - textarea
        $('#ev_val').val(1); // - select-one
        $('#ev_val_obs').val(''); // - textarea
        $('#ev_val_ep_obs').val(''); // - textarea
        $('#ex_resp_torax').val(1); // - select-one
        $('#ex_resp_torax_obs').val(''); // - textarea
        $('#resp_din').val(''); // - text
        $('#resp_col').val(1); // - select-one
        $('#resp_col_obs').val(''); // - textarea
        $('#resp_tpo_resp').val(1); // - select-one
        $('#resp_tpo_resp_obs').val(''); // - textarea
        $('#resp_modo').val(1); // - select-one
        $('#resp_modo_obs').val(''); // - textarea
        $('#soplo_dur').val(1); // - select-one
        $('#soplo_dur_obs').val(''); // - textarea
        $('#soplo_fza').val(1); // - select-one
        $('#soplo_fza_obs').val(''); // - textarea
        $('#coord_fono_resp').val(1); // - select-one
        $('#coord_fono_resp_obs').val(''); // - textarea
        $('#ex_respiratorio_obs').val(''); // - textarea
        $('#ataque_voc').val(1); // - select-one
        $('#ataque_voc_obs').val(''); // - textarea
        $('#ton_voc').val(1); // - select-one
        $('#ton_voc_obs').val(''); // - textarea
        $('#int_voz').val(1); // - select-one
        $('#int_voz_obs').val(''); // - textarea
        $('#param_voc_obs').val(''); // - textarea

        evaluar_para_carga_detalle('ev_voz_vest_boc','div_ev_voz_vest_boc','ev_voz_vest_boc_obs',2);
        evaluar_para_carga_detalle('ev_voz_fre_sup','div_ev_voz_fre_sup','ev_voz_fre_sup_obs',2);
        evaluar_para_carga_detalle('ev_voz_fr_inf','div_ev_voz_fr_inf','ev_voz_fr_inf_obs',2);
        evaluar_para_carga_detalle('ev_voz_fr_sl','div_ev_voz_fr_sl','ev_voz_fr_sl_obs',2);
        evaluar_para_carga_detalle('ev_voz_pd','div_ev_voz_pd','ev_voz_pd_obs',7);
        evaluar_para_carga_detalle('ev_voz_pb','div_ev_voz_pb','ev_voz_pb_obs',2);
        evaluar_para_carga_detalle('ev_voz_cvf','div_ev_voz_cvf','ev_voz_cvf_obs',5);
        evaluar_para_carga_detalle('ev_voz_uvul','div_ev_voz_uvul','ev_voz_uvul_obs',7);
        evaluar_para_carga_detalle('ev_voz_amig','div_ev_voz_amig','ev_voz_amig_obs',3);
        evaluar_para_carga_detalle('ev_voz_aden','div_ev_voz_aden','ev_voz_aden_obs',3);
        evaluar_para_carga_detalle('ev_vf','div_ev_vf','ev_vf_obs',2);
        evaluar_para_carga_detalle('ev_vext','div_ev_vext','ev_vext_obs',2);
        evaluar_para_carga_detalle('ev_vro','div_ev_vro','ev_vro_obs',2);
        evaluar_para_carga_detalle('ev_vflat','div_ev_vflat','ev_vflat_obs',2);
        evaluar_para_carga_detalle('ev_val','div_ev_val','ev_val_obs',2);
        evaluar_para_carga_detalle('ex_resp_torax','div_ex_resp_torax','ex_resp_torax_obs',2);
        evaluar_para_carga_detalle('resp_col','div_resp_col','resp_col_obs',2);
        evaluar_para_carga_detalle('resp_tpo_resp','div_resp_tpo_resp','resp_tpo_resp_obs',2);
        evaluar_para_carga_detalle('resp_modo','div_resp_modo','resp_modo_obs',2);
        evaluar_para_carga_detalle('soplo_dur','div_soplo_dur','soplo_dur_obs',2);
        evaluar_para_carga_detalle('soplo_fza','div_soplo_fza','soplo_fza_obs',2);
        evaluar_para_carga_detalle('coord_fono_resp','div_coord_fono_resp','coord_fono_resp_obs',2);
        evaluar_para_carga_detalle('ataque_voc','div_ataque_voc','ataque_voc_obs',2);
        evaluar_para_carga_detalle('ton_voc','div_ton_voc','ton_voc_obs',2);
        evaluar_para_carga_detalle('int_voz','div_int_voz','int_voz_obs',2);

    }
</script>
