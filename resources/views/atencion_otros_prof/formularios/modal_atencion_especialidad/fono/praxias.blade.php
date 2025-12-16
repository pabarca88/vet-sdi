<div id="modal_praxias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_praxias" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">PRAXIAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-fono_habla" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="praxia_gen_tab" data-toggle="tab" href="#praxia_gen" role="tab" aria-controls="praxia_gen" aria-selected="false">Generales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="prax_resp-tab" data-toggle="tab" href="#prax_resp" role="tab" aria-controls="prax_resp" aria-selected="true">Respiración</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="prax_fona-tab" data-toggle="tab" href="#prax_fona" role="tab" aria-controls="prax_fona" aria-selected="true">Fonación</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-ofa">
                            <!--EVALUACIÓN GENERAL-->
                            <div class="tab-pane fade show active" id="praxia_gen" role="tabpanel" aria-labelledby="praxia_gen_tab">

                                <div id="labios" class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group fill">
                                            <h6 class="floating-center">GENERALES</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Deglución</label>
                                            <select name="prax_dg" id="prax_dg" data-titulo="Deglución" data-seccion="PRAXIAS GENERALES" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_dg','div_prax_dg','prax_dg_obs',2);">
                                                <option value="1"> Normal</option>
                                                <option value="2"> Alterada (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_dg" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs Deglución</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs Deglución" data-seccion="PRAXIAS GENERALES" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_dg_obs" id="prax_dg_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Succión</label>
                                            <select name="prax_suc" id="prax_suc" data-titulo="Succión" data-seccion="PRAXIAS GENERALES" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_suc','div_prax_suc','prax_suc_obs',2);">
                                                <option value="1"> Normal</option>
                                                <option value="2"> Alterada (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_suc" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs. Succión</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs Succión" data-seccion="PRAXIAS GENERALES" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_suc_obs" id="prax_suc_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Masticación</label>
                                            <select name="prax_mast" id="prax_mast" data-titulo="Masticación" data-seccion="PRAXIAS GENERALES" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_mast','div_prax_mast','prax_mast_obs',2);">
                                                <option value="1"> Normal</option>
                                                <option value="2"> Alterada (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_mast" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs.Masticación</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs.Masticación" data-seccion="PRAXIAS GENERALES" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_mast_obs" id="prax_mast_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Soplo</label>
                                            <select name="prax_sop" id="prax_sop" data-titulo="Soplo" data-seccion="PRAXIAS GENERALES" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_sop','div_prax_sop','prax_sop_obs',2);">
                                                <option value="1"> Normal</option>
                                                <option value="2"> Alterada (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_sop" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs.Soplo</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs.Soplo" data-seccion="PRAXIAS GENERALES" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_sop_obs" id="prax_sop_obs"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group" id="div_ofa_vest_boc">
                                            <label from="" class="floating-label-activo-sm">Obs Examen Praxias Generales</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs Examen de Dislalias" data-seccion="DISLALIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_gen_obs" id="prax_gen_obs"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade show " id="prax_resp" role="tabpanel" aria-labelledby="prax_resp_tab">

                                <div id="labios" class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group fill">
                                            <h6 class="floating-center">RESPIRACIÓN</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Modo</label>
                                            <select name="prax_re_m" id="prax_re_m" data-titulo="Deglución" data-seccion="PRAXIAS RESPIRATORIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_re_m','div_prax_re_m','prax_re_m_obs',5);">
                                                <option value="1">	Normal</option>
                                                <option value="2">	Nasal</option>
                                                <option value="3">	Bucal</option>
                                                <option value="4">	Mixta</option>
                                                <option value="5"> Observaciones (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_re_m" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs Modo</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs Modo" data-seccion="PRAXIAS GENERALES" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_re_m_obs" id="prax_re_m_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tipo</label>
                                            <select name="prax_re_t" id="prax_re_t" data-titulo="Tipo" data-seccion="PRAXIAS RESPIRATORIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_re_t','div_prax_re_t','prax_re_t_obs',5);">
                                                <option value="1">	Normal</option>
                                                <option value="2">	Costal Superior</option>
                                                <option value="3">	Costo-Diafragmática</option>
                                                <option value="4">	Abdominal</option>
                                                <option value="5"> Observaciones (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_re_t" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs. Tipo</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs Tipo" data-seccion="PRAXIAS RESPIRATORIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_re_t_obs" id="prax_re_t_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">C-F-R</label>
                                            <select name="prax_re_cfr" id="prax_re_cfr" data-titulo="C-F-R" data-seccion="PRAXIAS RESPIRATORIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_re_cfr','div_prax_re_cfr','prax_re_cfr_obs',3);">
                                                <option value="1">	Adecuada</option>
                                                <option value="2">	Alterada</option>
                                                <option value="3">	Muy Alterada(describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_re_cfr" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs.C-F-R</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs.C-F-R" data-seccion="PRAXIAS RESPIRATORIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_re_cfr_obs" id="prax_re_cfr_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 mt-2">
                                        <div class="form-group">
                                            <label from="" class="floating-label-activo-sm">Tiempo-Máximo</label>
                                            <input type="text" class="form-control form-control-sm" name="praxias_tiempo_maximo" id="praxias_tiempo_maximo">
                                        </div>

                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Fonación</label>
                                            <select name="prax_re_f" id="prax_re_f" data-titulo="Fonación" data-seccion="PRAXIAS RESPIRATORIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_re_f','div_prax_re_f','prax_re_f_obs',3);">
                                                <option value="1">	Adecuada</option>
                                                <option value="2">	Alterada</option>
                                                <option value="3">	Muy Alterada(describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_re_f" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs.Fonación</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs.Fonación" data-seccion="PRAXIAS RESPIRATORIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_re_f_obs" id="prax_re_f_obs"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group" id="div_ofa_vest_boc">
                                            <label from="" class="floating-label-activo-sm">Obs Examen Praxias Respiratórias</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs Examen de Dislalias" data-seccion="PRAXIAS RESPIRATORIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_re_obs" id="prax_re_obs"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade show " id="prax_fona" role="tabpanel" aria-labelledby="prax_fona_tab">

                                <div id="labios" class="form-row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group fill">
                                            <h6 class="floating-center">FONACIÓN</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tono</label>
                                            <select name="prax_fon_t" id="prax_fon_t" data-titulo="Tono" data-seccion="PRAXIAS FONATORIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_fon_t','div_prax_fon_t','prax_fon_t_obs',4);">
                                                <option value="1"> Normal</option>
                                                <option value="2"> Desplazado a Graves</option>
                                                <option value="3"> Desplazado a Agudos</option>
                                                <option value="4"> Observaciones (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_fon_t" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs Tono</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs Tono" data-seccion="PRAXIAS FONATORIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_fon_t_obs" id="prax_fon_t_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Intensidad</label>
                                            <select name="prax_fon_i" id="prax_fon_i" data-titulo="Intensidad" data-seccion="PRAXIAS FONATORIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_fon_i','div_prax_fon_i','prax_fon_i_obs',4);">
                                                <option value="1"> Normal</option>
                                                <option value="2"> Elevada</option>
                                                <option value="3"> Disminuída</option>
                                                <option value="4"> Observaciones (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_fon_i" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs. Intensidad</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs. Intensidad" data-seccion="PRAXIAS FONATORIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_fon_i_obs" id="prax_fon_i_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Emisión</label>
                                            <select name="prax_fon_e" id="prax_fon_e" data-titulo="Emisión" data-seccion="PRAXIAS FONATORIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_fon_e','div_prax_fon_e','prax_fon_e_obs',5);">
                                                <option value="1"> Normal</option>
                                                <option value="2"> Disfónica</option>
                                                <option value="3"> Afónica</option>
                                                <option value="4"> Diplofonía</option>
                                                <option value="5"> Observaciones (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_fon_e" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs.Emisión</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs.Emisión" data-seccion="PRAXIAS FONATORIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_fon_e_obs" id="prax_fon_e_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ataque Vocal</label>
                                            <select name="prax_fon_av" id="prax_fon_av" data-titulo="Ataque Vocal" data-seccion="PRAXIAS FONATORIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_fon_av','div_prax_fon_av','prax_fon_av_obs',4);">
                                                <option value="1"> Normal</option>
                                                <option value="2"> Duro</option>
                                                <option value="3"> Soplado</option>
                                                <option value="4"> Observaciones (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_fon_av" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs.Ataque Vocal</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs.Ataque Vocal" data-seccion="PRAXIAS FONATORIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_fon_av_obs" id="prax_fon_av_obs"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Resonancia</label>
                                            <select name="prax_fon_r" id="prax_fon_r" data-titulo="Resonancia" data-seccion="PRAXIAS FONATORIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prax_fon_r','div_prax_fon_r','prax_fon_r_obs',4);">
                                                <option value="1"> Normal</option>
                                                <option value="2"> Hipernasal</option>
                                                <option value="3"> Hiponasal</option>
                                                <option value="4"> Observaciones (describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_prax_fon_r" style="display:none">
                                            <label from="" class="floating-label-activo-sm">Obs Resonancia</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Obs Resonancia" data-seccion="PRAXIAS FONATORIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_fon_r_obs" id="prax_fon_r_obs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <div class="form-group" id="div_ofa_vest_boc">
                                                <label from="" class="floating-label-activo-sm">Obs Examen Fonación</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Obs Examen Fonación" data-seccion="PRAXIAS FONATORIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prax_fon_ex_obs" id="prax_fon_ex_obs"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade show" id="dif_cons" role="tabpanel" aria-labelledby="dif_cons-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                        <div id="cara" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <H6 class="form_fono_center"> DÍFONOS CONSONÁNTICOS</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">PL</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_pl" id="difon_c_pl">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">BL</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_bl" id="difon_c_bl">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">FL</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_fl" id="difon_c_fl">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">KL</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_kl" id="difon_c_kl">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">GL</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_gl" id="difon_c_gl">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">TL</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_tl" id="difon_c_tl">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">PR</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_pr" id="difon_c_pr">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">BR</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_br" id="difon_c_br">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">FR</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_fr" id="difon_c_fr">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">TR</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_tr" id="difon_c_tr">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">KR</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_kr" id="difon_c_kr">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">GR</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_gr" id="difon_c_gr">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">DR</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_dr" id="difon_c_dr">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">Otros</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_c_ot" id="difon_c_ot">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group fill">
                                                                    <label from="" class="floating-label-activo-sm">Otros y Comentarios</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_difon_c" id="obs_difon_c"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="ex_hab_leng_com" role="tabpanel" aria-labelledby="ex_hab_leng_com-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="col-sm-12 mt-2">
                                                        <div class="form-group">
                                                            <h6 class="floating-center">COMENTARIOS DEL EXAMEN</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 mt-2">
                                                        <div class="form-group">
                                                            <label from="" class="floating-label-activo-sm">COMENTARIOS E INFORME</label>
                                                            <textarea class="form-control form-control-sm" data-titulo="Obs Examen del Labio Superior" data-seccion="OFA LABIO INFERIOR" rows="4" onfocus="this.rows=12" onblur="this.rows=1;" name="ofa_lab_obs" id="ofa_lab_obs"></textarea>
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
                                <button type="button" class="btn btn-info" onclick="registrar_m_praxias();">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function e_praxias() {
        $('#modal_praxias').modal('show');
    }


    function registrar_m_praxias()
    {
        var id_ficha_otros_prof = $('#id_fc').val();
        var id_ficha_fono = '';
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();

        var prax_dg = $('#prax_dg').val(); // - select-one
        var prax_dg_obs = $('#prax_dg_obs').val(); // - textarea
        var prax_suc = $('#prax_suc').val(); // - select-one
        var prax_suc_obs = $('#prax_suc_obs').val(); // - textarea
        var prax_mast = $('#prax_mast').val(); // - select-one
        var prax_mast_obs = $('#prax_mast_obs').val(); // - textarea
        var prax_sop = $('#prax_sop').val(); // - select-one
        var prax_sop_obs = $('#prax_sop_obs').val(); // - textarea
        var prax_gen_obs = $('#prax_gen_obs').val(); // - textarea
        var prax_re_m = $('#prax_re_m').val(); // - select-one
        var prax_re_m_obs = $('#prax_re_m_obs').val(); // - textarea
        var prax_re_t = $('#prax_re_t').val(); // - select-one
        var prax_re_t_obs = $('#prax_re_t_obs').val(); // - textarea
        var prax_re_cfr = $('#prax_re_cfr').val(); // - select-one
        var prax_re_cfr_obs = $('#prax_re_cfr_obs').val(); // - textarea
        var praxias_tiempo_maximo = $('#praxias_tiempo_maximo').val(); // - text
        var prax_re_f = $('#prax_re_f').val(); // - select-one
        var prax_re_f_obs = $('#prax_re_f_obs').val(); // - textarea
        var prax_re_obs = $('#prax_re_obs').val(); // - textarea
        var prax_fon_t = $('#prax_fon_t').val(); // - select-one
        var prax_fon_t_obs = $('#prax_fon_t_obs').val(); // - textarea
        var prax_fon_i = $('#prax_fon_i').val(); // - select-one
        var prax_fon_i_obs = $('#prax_fon_i_obs').val(); // - textarea
        var prax_fon_e = $('#prax_fon_e').val(); // - select-one
        var prax_fon_e_obs = $('#prax_fon_e_obs').val(); // - textarea
        var prax_fon_av = $('#prax_fon_av').val(); // - select-one
        var prax_fon_av_obs = $('#prax_fon_av_obs').val(); // - textarea
        var prax_fon_r = $('#prax_fon_r').val(); // - select-one
        var prax_fon_r_obs = $('#prax_fon_r_obs').val(); // - textarea
        var prax_fon_ex_obs = $('#prax_fon_ex_obs').val(); // - textarea
        var difon_c_pl = $('#difon_c_pl').val(); // - text
        var difon_c_bl = $('#difon_c_bl').val(); // - text
        var difon_c_fl = $('#difon_c_fl').val(); // - text
        var difon_c_kl = $('#difon_c_kl').val(); // - text
        var difon_c_gl = $('#difon_c_gl').val(); // - text
        var difon_c_tl = $('#difon_c_tl').val(); // - text
        var difon_c_pr = $('#difon_c_pr').val(); // - text
        var difon_c_br = $('#difon_c_br').val(); // - text
        var difon_c_fr = $('#difon_c_fr').val(); // - text
        var difon_c_tr = $('#difon_c_tr').val(); // - text
        var difon_c_kr = $('#difon_c_kr').val(); // - text
        var difon_c_gr = $('#difon_c_gr').val(); // - text
        var difon_c_dr = $('#difon_c_dr').val(); // - text
        var difon_c_ot = $('#difon_c_ot').val(); // - text
        var obs_difon_c = $('#obs_difon_c').val(); // - textarea
        var ofa_lab_obs = $('#ofa_lab_obs').val(); // - textarea

        var url = "{{ route('ficha.otro.prof.registro.examen.praxias') }}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                    _token: CSRF_TOKEN,
                    id_ficha_otros_prof:id_ficha_otros_prof,
                    id_ficha_fono:id_ficha_fono,
                    id_paciente:id_paciente,
                    id_profesional:id_profesional,
                    prax_dg:prax_dg,
                    prax_dg_obs:prax_dg_obs,
                    prax_suc:prax_suc,
                    prax_suc_obs:prax_suc_obs,
                    prax_mast:prax_mast,
                    prax_mast_obs:prax_mast_obs,
                    prax_sop:prax_sop,
                    prax_sop_obs:prax_sop_obs,
                    prax_gen_obs:prax_gen_obs,
                    prax_re_m:prax_re_m,
                    prax_re_m_obs:prax_re_m_obs,
                    prax_re_t:prax_re_t,
                    prax_re_t_obs:prax_re_t_obs,
                    prax_re_cfr:prax_re_cfr,
                    prax_re_cfr_obs:prax_re_cfr_obs,
                    praxias_tiempo_maximo:praxias_tiempo_maximo,
                    prax_re_f:prax_re_f,
                    prax_re_f_obs:prax_re_f_obs,
                    prax_re_obs:prax_re_obs,
                    prax_fon_t:prax_fon_t,
                    prax_fon_t_obs:prax_fon_t_obs,
                    prax_fon_i:prax_fon_i,
                    prax_fon_i_obs:prax_fon_i_obs,
                    prax_fon_e:prax_fon_e,
                    prax_fon_e_obs:prax_fon_e_obs,
                    prax_fon_av:prax_fon_av,
                    prax_fon_av_obs:prax_fon_av_obs,
                    prax_fon_r:prax_fon_r,
                    prax_fon_r_obs:prax_fon_r_obs,
                    prax_fon_ex_obs:prax_fon_ex_obs,
                    difon_c_pl:difon_c_pl,
                    difon_c_bl:difon_c_bl,
                    difon_c_fl:difon_c_fl,
                    difon_c_kl:difon_c_kl,
                    difon_c_gl:difon_c_gl,
                    difon_c_tl:difon_c_tl,
                    difon_c_pr:difon_c_pr,
                    difon_c_br:difon_c_br,
                    difon_c_fr:difon_c_fr,
                    difon_c_tr:difon_c_tr,
                    difon_c_kr:difon_c_kr,
                    difon_c_gr:difon_c_gr,
                    difon_c_dr:difon_c_dr,
                    difon_c_ot:difon_c_ot,
                    obs_difon_c:obs_difon_c,
                    ofa_lab_obs:ofa_lab_obs,
                },
            })
        .done(function(data) {
            if (data.estado == 1)
            {

                $('#modal_praxias').modal('hide');
                limpiar_moda_praxias();
                swal({
                    title: "Registro de Examen Praxias",
                    text: "Carga Exitosa.",
                    icon: "success"
                });
            }
            else
            {
                swal({
                    title: "Registro de Examen Praxias",
                    text: "Error al registrar",
                    icon: "error"
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function limpiar_moda_praxias()
    {
       $('#prax_dg').val(1); // - select-one
        $('#prax_dg_obs').val(''); // - textarea
        $('#prax_suc').val(1); // - select-one
        $('#prax_suc_obs').val(''); // - textarea
        $('#prax_mast').val(1); // - select-one
        $('#prax_mast_obs').val(''); // - textarea
        $('#prax_sop').val(1); // - select-one
        $('#prax_sop_obs').val(''); // - textarea
        $('#prax_gen_obs').val(''); // - textarea
        $('#prax_re_m').val(1); // - select-one
        $('#prax_re_m_obs').val(''); // - textarea
        $('#prax_re_t').val(1); // - select-one
        $('#prax_re_t_obs').val(''); // - textarea
        $('#prax_re_cfr').val(1); // - select-one
        $('#prax_re_cfr_obs').val(''); // - textarea
        $('#praxias_tiempo_maximo').val(''); // - text
        $('#prax_re_f').val(1); // - select-one
        $('#prax_re_f_obs').val(''); // - textarea
        $('#prax_re_obs').val(''); // - textarea
        $('#prax_fon_t').val(1); // - select-one
        $('#prax_fon_t_obs').val(''); // - textarea
        $('#prax_fon_i').val(1); // - select-one
        $('#prax_fon_i_obs').val(''); // - textarea
        $('#prax_fon_e').val(1); // - select-one
        $('#prax_fon_e_obs').val(''); // - textarea
        $('#prax_fon_av').val(1); // - select-one
        $('#prax_fon_av_obs').val(''); // - textarea
        $('#prax_fon_r').val(1); // - select-one
        $('#prax_fon_r_obs').val(''); // - textarea
        $('#prax_fon_ex_obs').val(''); // - textarea
        $('#difon_c_pl').val(''); // - text
        $('#difon_c_bl').val(''); // - text
        $('#difon_c_fl').val(''); // - text
        $('#difon_c_kl').val(''); // - text
        $('#difon_c_gl').val(''); // - text
        $('#difon_c_tl').val(''); // - text
        $('#difon_c_pr').val(''); // - text
        $('#difon_c_br').val(''); // - text
        $('#difon_c_fr').val(''); // - text
        $('#difon_c_tr').val(''); // - text
        $('#difon_c_kr').val(''); // - text
        $('#difon_c_gr').val(''); // - text
        $('#difon_c_dr').val(''); // - text
        $('#difon_c_ot').val(''); // - text
        $('#obs_difon_c').val(''); // - textarea
        $('#ofa_lab_obs').val(''); // - textarea

        evaluar_para_carga_detalle('prax_dg','div_prax_dg','prax_dg_obs',2);
        evaluar_para_carga_detalle('prax_suc','div_prax_suc','prax_suc_obs',2);
        evaluar_para_carga_detalle('prax_mast','div_prax_mast','prax_mast_obs',2);
        evaluar_para_carga_detalle('prax_sop','div_prax_sop','prax_sop_obs',2);
        evaluar_para_carga_detalle('prax_re_m','div_prax_re_m','prax_re_m_obs',5);
        evaluar_para_carga_detalle('prax_re_t','div_prax_re_t','prax_re_t_obs',5);
        evaluar_para_carga_detalle('prax_re_cfr','div_prax_re_cfr','prax_re_cfr_obs',3);
        evaluar_para_carga_detalle('prax_re_f','div_prax_re_f','prax_re_f_obs',3);
        evaluar_para_carga_detalle('prax_fon_t','div_prax_fon_t','prax_fon_t_obs',4);
        evaluar_para_carga_detalle('prax_fon_i','div_prax_fon_i','prax_fon_i_obs',4);
        evaluar_para_carga_detalle('prax_fon_e','div_prax_fon_e','prax_fon_e_obs',5);
        evaluar_para_carga_detalle('prax_fon_av','div_prax_fon_av','prax_fon_av_obs',4);
        evaluar_para_carga_detalle('prax_fon_r','div_prax_fon_r','prax_fon_r_obs',4);
    }
</script>
