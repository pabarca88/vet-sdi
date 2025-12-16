<div id="m_habla" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_habla" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_habla">Evaluación Habla y Lenguaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-fono_habla" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="hab_leng_fone_tab" data-toggle="tab" href="#hab_leng_fone" role="tab" aria-controls="hab_leng_fone" aria-selected="true">Fonemas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="dif_voc-tab" data-toggle="tab" href="#dif_voc" role="tab" aria-controls="dif_voc" aria-selected="false">Dífonos Vocálicos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="dif_consonanticos-tab" data-toggle="tab" href="#dif_consonanticos" role="tab" aria-controls="dif_consonanticos" aria-selected="false">Dífonos Consonánticos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="est_dislalias-tab" data-toggle="tab" href="#est_dislalias" role="tab" aria-controls="est_dislalias" aria-selected="false">Dislalias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="est_disartrias-tab" data-toggle="tab" href="#est_disartrias" role="tab" aria-controls="est_disartrias" aria-selected="false">Otras Alt.habla/lenguaje</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ex_voz-tab" data-toggle="tab" href="#ex_voz" role="tab" aria-controls="ex_voz" aria-selected="false">Voz</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ex_hl_coment-tab" data-toggle="tab" href="#ex_hl_coment" role="tab" aria-controls="ex_hl_coment" aria-selected="false">Comentarios</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-ofa">
                            <!--EVALUACIÓN GENERAL-->
                            <div class="tab-pane fade show active" id="hab_leng_fone" role="tabpanel" aria-labelledby="hab_leng_fone_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="cara" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <H6 class="form_fono_center"> FONEMAS</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">B</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_b" id="fon_b">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">P</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_p" id="fon_p">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">M</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_m" id="fon_m">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">F</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_f" id="fon_f">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">D</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_d" id="fon_d">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">T</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_t" id="fon_t">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">S</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_s" id="fon_s">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">N</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_n" id="fon_n">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">L</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_l" id="fon_l">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">R</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_r" id="fon_r">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">RR</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_rr" id="fon_rr">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">Y</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_y" id="fon_y">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">Ñ</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_nn" id="fon_nn">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">CH</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_ch" id="fon_ch">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">K</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_k" id="fon_k">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">G</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_g" id="fon_g">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">Otros</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_ot" id="fon_ot">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">X-Y</label>
                                                                    <input type="text" class="form-control form-control-sm" name="fon_xy" id="fon_xy">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group fill">
                                                                    <label id="" name="" class="floating-label-activo-sm">Otros y Comentarios</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_fonemas" id="obs_fonemas"></textarea>
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
                            <div class="tab-pane fade show" id="dif_voc" role="tabpanel" aria-labelledby="dif_voc-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="difonos" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <H6 class="form_fono_center"> DÍFONOS VOCÁLICOS</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">AI</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_ai" id="difon_ai">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">IA</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_ia" id="difon_ia">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">OI</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_oi" id="difon_oi">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">IO</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_io" id="difon_io">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">IE</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_ie" id="difon_ie">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">EI</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_ei" id="difon_ei">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">AU</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_au" id="difon_au">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">UA</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_ua" id="difon_ua">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">UE</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_ue" id="difon_ue">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">EU</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_eu" id="difon_eu">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">IU</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_iu" id="difon_iu">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">UI</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_ui" id="difon_ui">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">UO</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_uo" id="difon_uo">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3 mt-2">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label">Otros</label>
                                                                    <input type="text" class="form-control form-control-sm" name="difon_otro" id="difon_otro">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group fill">
                                                                    <label id="" name="" class="floating-label-activo-sm">Otros y Comentarios</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_difon" id="obs_difon"></textarea>
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
                            <div class="tab-pane fade show" id="dif_consonanticos" role="tabpanel" aria-labelledby="dif_consonanticos-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
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
                                                                    <label id="" name="" class="floating-label-activo-sm">Otros y Comentarios</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_difon_c" id="obs_difon_c"></textarea>
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
                            <div class="tab-pane fade show" id="est_dislalias" role="tabpanel" aria-labelledby="est_dislalias-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="labios" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">DISLALIAS</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Presencia de Dislalia</label>
                                                                    <select name="disl_pre" id="disl_pre" data-titulo="Presencia de Dislalia" data-seccion="DISLALIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('disl_pre','div_disl_pre','disl_pre_obs',2);">
                                                                        <option value="1"> No</option>
                                                                        <option value="2"> Si (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_disl_pre" style="display:none">
                                                                    <label class="floating-label-activo-sm">Obs Presencia de Dislalia</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Presencia de Dislalia" data-seccion="DISLALIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="disl_pre_obs" id="disl_pre_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Causa de Dislalia</label>
                                                                    <select name="disl_cau" id="disl_cau" data-titulo="Causa de Dislalia" data-seccion="DISLALIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('disl_cau','div_disl_cau','disl_cau_obs',4);">
                                                                        <option value="1">Funcional</option>
                                                                        <option value="2">Audiógena</option>
                                                                        <option value="3">Orgánica Disglósica</option>
                                                                        <option value="4">Orgánica Otra (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_disl_cau" style="display:none">
                                                                    <label class="floating-label-activo-sm">Causa de Dislalia</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Causa de Dislalia" data-seccion="DISLALIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="disl_cau_obs" id="disl_cau_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Tipo de Dislalia</label>
                                                                    <select name="disl_tpo" id="disl_tpo" data-titulo="Tipo de Dislalia" data-seccion="DISLALIAS" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('disl_tpo','div_disl_tpo','disl_tpo_obs',3);">
                                                                        <option value="1">Simple</option>
                                                                        <option value="2">Múltiple </option>
                                                                        <option value="3">Generalizada (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_disl_tpo" style="display:none">
                                                                    <label  class="floating-label-activo-sm">Tipo de Dislalia</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs.Tipo de Dislalia" data-seccion="DISLALIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="disl_tpo_obs" id="disl_tpo_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="rotac" id="rotac" value="">
                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                        <input type="checkbox" id="rotac_check" name="rotac_check" value="" />
                                                                        <label for="psi_ter_indiv_check" class="cr"></label>
                                                                    </div>
                                                                    <label>Rotacismo</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="sigmat" id="sigmat" value="">
                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                        <input type="checkbox" id="sigmat_check" name="sigmat_check" value="" />
                                                                        <label for="psi_ter_grup_check" class="cr"></label>
                                                                    </div>
                                                                    <label>Sigmatismo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="div_ofa_vest_boc">
                                                                    <label  class="floating-label-activo-sm">Obs Examen de Dislalias</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Examen de Dislalias" data-seccion="DISLALIAS" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="disl_obs" id="disl_obs"></textarea>
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
                            <div class="tab-pane fade show" id="est_disartrias" role="tabpanel" aria-labelledby="est_disartrias-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="labios" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">DISARTRIAS Y OTRAS ALT DEL HABLA Y LENGUAJE</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Tipo de Alteración</label>
                                                                    <select name="ot_at_tip_alt" id="ot_at_tip_alt" data-titulo="Forma Labios" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ot_at_tip_alt','div_ot_at_tip_alt','ot_at_tip_alt_obs',4);">
                                                                        <option value="1"> Apraxia Verbal</option>
                                                                        <option value="2"> Afasia Motriz</option>
                                                                        <option value="3"> Disartria</option>
                                                                        <option value="4"> Otra (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ot_at_tip_alt" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs Tipo de Alteración</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Forma Labios" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ot_at_tip_alt_obs" id="ot_at_tip_alt_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Causa Conocida</label>
                                                                    <select name="ot_alt_cc" id="ot_alt_cc" data-titulo="Causa Conocida" data-seccion="OTRAS ALT HABLAY LENGUAJE" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ot_alt_cc','div_ot_alt_cc','ot_alt_cc_obs',2);">
                                                                        <option value="1">No</option>
                                                                        <option value="2">Si (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ot_alt_cc" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs.Causa Conocida</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs.Causa Conocida" data-seccion="OTRAS ALT HABLAY LENGUAJE" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ot_alt_cc_obs" id="ot_alt_cc_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Disartria</label>
                                                                    <select name="ot_at_d" id="ot_at_d" data-titulo="Forma Labios" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ot_at_d','div_ot_at_d','ot_at_d_obs',2);">
                                                                        <option value="1"> No</option>
                                                                        <option value="2"> Si (describir gravedad)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ot_at_d" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs Disartrias</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Forma Labios" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ot_at_d_obs" id="ot_at_d_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Tipo de Disartria</label>
                                                                    <select name="ot_at_dt" id="ot_at_dt" data-titulo="Tono" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ot_at_dt','div_ot_at_dt','ot_at_dt_obs',7);">
                                                                        <option value="1">Disartria Espástica
                                                                        <option value="2">Disartria Cerebelosa o Disartria Escandida</option>
                                                                        <option value="3">Disartria Atáxica</option>
                                                                        <option value="4">Disartria Hipocinética</option>
                                                                        <option value="5">Disartria Hipercinética</option>
                                                                        <option value="6">Disartria Flácida</option>
                                                                        <option value="7">Describir</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ot_at_dt" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs Tipo de Disartria</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Obs Tono" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ot_at_dt_obs" id="ot_at_dt_obs"></textarea>
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
                            <div class="tab-pane fade show" id="ex_voz" role="tabpanel" aria-labelledby="ex_voz-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="labios" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">VOZ</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Fluidez</label>
                                                                    <select name="vo_flu_voz" id="vo_flu_voz" data-titulo="Fluidez" data-seccion="VOZ" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vo_flu_voz','div_vo_flu_voz','vo_flu_voz_obs',2);">
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2"> Espasmofemia (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_vo_flu_voz" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs Fluidez</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Fluidez" data-seccion="VOZ" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vo_flu_voz_obs" id="vo_flu_voz_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Tipo</label>
                                                                    <select name="vo_tpo_voz" id="vo_tpo_voz" data-titulo="Tipo" data-seccion="VOZ" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vo_tpo_voz','div_vo_tpo_voz','vo_tpo_voz_obs',5);">
                                                                        <option value="1">Normal</option>
                                                                        <option value="2">Tónico</option>
                                                                        <option value="3">Clónico</option>
                                                                        <option value="4">Mixto</option>
                                                                        <option value="5">Otro (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_vo_tpo_voz" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs Tipo</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Tipo" data-seccion="VOZ" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vo_tpo_voz_obs" id="vo_tpo_voz_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Ritmo</label>
                                                                    <select name="vo_ritm" id="vo_ritm" data-titulo="Ritmo" data-seccion="VOZ" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vo_ritm','div_vo_ritm','vo_ritm_obs',4);">
                                                                        <option value="1">Normal</option>
                                                                        <option value="2">Bradilália</option>
                                                                        <option value="3">Taquilália</option>
                                                                        <option value="4">Otro(describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_vo_ritm" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs.Ritmo</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs.Ritmo" data-seccion="VOZ" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vo_ritm_obs" id="vo_ritm_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Prosodia</label>
                                                                    <select name="vo_pro" id="vo_pro" data-titulo="Prosodia" data-seccion="VOZ" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vo_pro','div_vo_pro','vo_pro_obs',4);">
                                                                        <option value="1">Adecuada</option>
                                                                        <option value="2">Exagerada</option>
                                                                        <option value="3">Monótona</option>
                                                                        <option value="4">Otra (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_vo_pro" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs Prosodia</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Prosodia" data-seccion="VOZ" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vo_pro_obs" id="vo_pro_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="div_ofa_vest_boc">
                                                                    <label id="" name="" class="floating-label-activo-sm">Obs Examen de la Voz</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Examen del Labio Superior" data-seccion="VOZ" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ex_voz_obs" id="ex_voz_obs"></textarea>
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
                            <div class="tab-pane fade show" id="ex_hl_coment" role="tabpanel" aria-labelledby="ex_hl_coment-tab">
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
                                                            <label id="" name="" class="floating-label-activo-sm">COMENTARIOS E INFORME</label>
                                                            <textarea class="form-control form-control-sm"   rows="4" onfocus="this.rows=12" onblur="this.rows=1;" name="ofa_lab_obs" id="ofa_lab_obs"></textarea>
                                                        </div>
                                                    </div>
                                                </div
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
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function habla() {
        $('#m_habla').modal('show');
    }
</script>
