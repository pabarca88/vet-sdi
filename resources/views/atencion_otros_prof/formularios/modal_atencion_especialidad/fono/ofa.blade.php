<div id="est_ofa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="est_ofa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_ofa">Evaluación OFA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-fono_habla" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="ofa-cara-tab" data-toggle="tab" href="#ofa_cara" role="tab" aria-controls="ofa_cara" aria-selected="false">Cara</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="boca_eval_tab" data-toggle="tab" href="#boca_eval" role="tab" aria-controls="boca_eval" aria-selected="true">Boca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="lengua-tab" data-toggle="tab" href="#lengua" role="tab" aria-controls="lengua" aria-selected="true">Lengua</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ofa-labios-tab" data-toggle="tab" href="#ofa_labios" role="tab" aria-controls="ofa_labios" aria-selected="false">Labios</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-ofa">
                            <!--EVALUACIÓN GENERAL-->
                            <div class="tab-pane fade show active" id="ofa_cara" role="tabpanel" aria-labelledby="ofa-cara-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="Boca" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">EXAMEN DE LA CARA</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="est_osea">Estructura ósea</label>
                                                                    <select name="est_osea" id="est_osea" data-titulo="Estructura ósea" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_osea','div_est_osea','est_osea_obs',2);">
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2"> Alterada (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_est_osea" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="est_osea_obs">Obs Estructura ósea</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Estructura ósea" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="est_osea_obs" id="est_osea_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="form_fac">Forma Facial</label>
                                                                    <select name="form_fac" id="form_fac" data-titulo="Forma Facial" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('form_fac','div_form_fac','form_fac_obs',2);">
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2"> Alterada (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_form_fac" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="form_fac_obs">Obs Forma Facial</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Forma Facial" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="form_fac_obs" id="form_fac_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="ap_bucal">Apertura Bucal</label>
                                                                    <select name="ap_bucal" id="ap_bucal" data-titulo="Apertura Bucal" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ap_bucal','div_ap_bucal','ap_bucal_obs',2);">
                                                                        <option value="1">Adecuada</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_ap_bucal" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="ap_bucal_obs">Obs.Apertura Bucal</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs.Apertura Bucal" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ap_bucal_obs" id="ap_bucal_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="dientes" >Dientes</label>
                                                                    <select name="dientes" id="dientes" data-titulo="Dientes" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('dientes','div_dientes','dientes_obs',2);">
                                                                        <option value="1">Normales</option>
                                                                        <option value="2">Anormales</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_dientes"  style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="dientes_obs">Obs Dientes</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Dientes" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="dientes_obs" id="dientes_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="mordid" >Mordida</label>
                                                                    <select name="mordid" id="mordid" data-titulo="Mordida" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mordid','div_mordid','mordid_obs',2);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_mordid" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="mordid_obs">Obs Mordida</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Mordida" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="mordid_obs" id="mordid_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="nariz">Nariz</label>
                                                                    <select name="nariz" id="nariz" data-titulo="Nariz" data-seccion="EXAMEN DE LA CARA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('nariz','div_nariz','nariz_obs',2);">
                                                                        <option value="1">Normal</option>
                                                                        <option value="2">Con Alteraciones</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_nariz" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="nariz_obs">Obs Nariz</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Nariz" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="nariz_obs" id="nariz_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="div_ofa_vest_boc">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="cara_obs" >Obs Examen de la Cara</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Examen de la Cara" data-seccion="EXAMEN DE LA CARA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cara_obs" id="cara_obs"></textarea>
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
                            <div class="tab-pane fade show" id="boca_eval" role="tabpanel" aria-labelledby="boca_eval_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="Boca" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">BOCA</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="vestib">Vestíbulo Bucal</label>
                                                                    <select name="vestib" id="vestib" data-titulo="Vestíbulo Bucal" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vestib','div_vestib','vestib_obs',2);">
                                                                        <option value="1"> Adecuado</option>
                                                                        <option value="2"> Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_vestib" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="vestib_obs">Obs Vestíbulo</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Vestíbulo Bucal" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vestib_obs" id="vestib_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="fren_sup">Frenillo Superior</label>
                                                                    <select name="fren_sup" id="fren_sup" data-titulo="Frenillo Superior" data-seccion="BOCA"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('fren_sup','div_fren_sup','fren_sup_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_fren_sup" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="fren_sup_obs">Obs Frenillo Superior</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Frenillo Superior" data-seccion="BOCA"rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fren_sup_obs" id="fren_sup_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="fren_inf">Frenillo Inferior</label>
                                                                    <select name="fren_inf" id="fren_inf" data-titulo="Frenillo Inferior" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('fren_inf','div_fren_inf','fren_inf_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_fren_inf" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="fren_inf_obs">Obs Frenillo Inferior</label>
                                                                    <textarea class="form-control form-control-sm"data-titulo="Obs. Frenillo Inferior" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fren_inf_obs" id="fren_inf_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="fren_subl">Frenillo Sublingual</label>
                                                                    <select name="fren_subl" id="fren_subl" data-titulo="Frenillo Sublingual" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('fren_subl','div_fren_subl','fren_subl_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_fren_subl" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="fren_subl_obs">Obs Frenillo Sublingual</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Frenillo Sublingual" data-seccion="BOCA"rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fren_subl_obs" id="fren_subl_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="palad_duro">Paladar Duro</label>
                                                                    <select name="palad_duro" id="palad_duro"data-titulo="Paladar Duro" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('palad_duro','div_palad_duro','palad_duro_obs',7);">
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
                                                                <div class="form-group" id="div_palad_duro" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="palad_duro_obs">Obs Paladar Duro</label>
                                                                    <textarea class="form-control form-control-sm"data-titulo="Obs. Paladar Duro" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="palad_duro_obs" id="palad_duro_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="palad_bl">Paladar Blando</label>
                                                                    <select name="palad_bl" id="palad_bl"data-titulo="Paladar Blando" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('palad_bl','div_palad_bl','palad_bl_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_palad_bl" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="palad_bl_obs">Obs Paladar Blando</label>
                                                                    <textarea class="form-control form-control-sm"data-titulo="Obs. Paladar Blando" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="palad_bl_obs" id="palad_bl_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="cierre_vf">Cierre Velo-faringeo</label>
                                                                    <select name="cierre_vf" id="cierre_vf"data-titulo="Cierre Velo-faringeo" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cierre_vf','div_cierre_vf','cierre_vf_obs',5);">
                                                                        <option value="1">Coronal</option>
                                                                        <option value="2">Sagital</option>
                                                                        <option value="3">Circular</option>
                                                                        <option value="4">Circular en Rodete de Passavant</option>
                                                                        <option value="5">Otro(describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_cierre_vf" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="cierre_vf_obs">Cierre Velo-faringeo</label>
                                                                    <textarea class="form-control form-control-sm"data-titulo="Obs. Cierre Velo-faringeo" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cierre_vf_obs" id="cierre_vf_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="uvul">Úvula</label>
                                                                    <select name="uvul" id="uvul" data-titulo="Úvula" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('uvul','div_uvul','uvul_obs',7);">
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
                                                                <div class="form-group" id="div_uvul" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="uvul_obs">Obs Úvula</label>
                                                                    <textarea class="form-control form-control-sm"data-titulo="Obs. Úvula" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="uvul_obs" id="uvul_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="amigd">Amigdalas</label>
                                                                    <select name="amigd" id="amigd" data-titulo="Amigdalas" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('amigd','div_amigd','amigd_obs',3);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2">Hipertroficas</option>
                                                                        <option value="3"> Otra</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_amigd" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="amigd_obs">Obs Amigdalas</label>
                                                                    <textarea class="form-control form-control-sm"data-titulo="Obs. Amigdalas" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="amigd_obs" id="amigd_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="adenoi">Adenoídes</label>
                                                                    <select name="adenoi" id="adenoi" data-titulo="Adenoídes" data-seccion="BOCA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('adenoi','div_adenoi','adenoi_obs',3);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2">Hipertroficas</option>
                                                                        <option value="3"> Otra</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_adenoi" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm"for="adenoi_obs" >Obs Adenoídes</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Adenoídes" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="adenoi_obs" id="adenoi_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8 mt-2">

                                                                <div class="form-group" id="div_ofa_vest_boc">
                                                                    <label  class="floating-label-activo-sm" for="obs_gral_boc" >Obs Examen de la Boca</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Examen de la Boca" data-seccion="BOCA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_gral_boc" id="obs_gral_boc"></textarea>
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
                            <div class="tab-pane fade show" id="lengua" role="tabpanel" aria-labelledby="lengua-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form>
                                                        <div id="Boca" class="form-row">
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group fill">
                                                                    <h6 class="floating-center">EXAMEN DE LA LENGUA</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="forma">Forma Lingual</label>
                                                                    <select name="forma" id="forma" data-titulo="Forma Lingual" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('forma','div_forma','forma_obs',2);">
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2"> Alterada (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_forma" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="forma_obs">Obs Forma Lingual</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Forma Lingual" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="forma_obs" id="forma_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="posicion">Posición</label>
                                                                    <select name="posicion" id="posicion" data-titulo="Posición" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posicion','div_posicion','posicion_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_posicion" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="posicion_obs">Obs Posición</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Posición" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="posicion_obs" id="posicion_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm"for="tono" >Tono Lingual</label>
                                                                    <select name="tono" id="tono" data-titulo="Tono Lingual" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tono','div_tono','otono_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_tono" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="tono_obs">Obs.Tono Lingual</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs.Tono Lingual" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tono_obs" id="tono_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="cicatriz">Cicatrices</label>
                                                                    <select name="cicatriz" id="cicatriz" data-titulo="Cicatrices" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cicatriz','div_cicatriz','cicatriz_obs',2);">
                                                                        <option value="1">Adecuado</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_cicatriz" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="cicatriz_obs">Obs Cicatrices</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Cicatrices" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cicatriz_obs" id="cicatriz_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="tam">Tamaño</label>
                                                                    <select name="tam" id="tam" data-titulo="Tamaño" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tam','div_tam','tam_obs',4);">
                                                                        <option value="0">Seleccione</option>
                                                                        <option value="1"> Normal</option>
                                                                        <option value="2"> Microglosia</option>
                                                                        <option value="3"> Macroglosia</option>
                                                                        <option value="4"> Otra(describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_tam" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="tam_obs">Obs Tamaño</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Tamaño" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tam_obs" id="tam_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 mt-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="funcion">Funcionalidad Lingual</label>
                                                                    <select name="funcion" id="funcion" data-titulo="Funcionalidad Lingual" data-seccion="EXAMEN DE LA LENGUA" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('funcion','div_funcion','funcion_obs',2);">
                                                                        <option value="1">Adecuada</option>
                                                                        <option value="2">Alteracion Funcional</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_funcion" style="display:none">
                                                                    <label id="" name="" class="floating-label-activo-sm" for="funcion_obs">Obs Funcionalidad Lingual</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Funcionalidad Lingual" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="funcion_obs" id="funcion_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 mt-2">
                                                                <div class="form-group" id="div_ofa_vest_boc">
                                                                    <label id="" name="" class="floating-label}
                                                                    -activo-sm" for="leng_obs">Obs Examen de la Lengua</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs Examen de la Lengua" data-seccion="EXAMEN DE LA LENGUA" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="leng_obs" id="leng_obs"></textarea>
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
                            <div class="tab-pane fade show" id="ofa_labios" role="tabpanel" aria-labelledby="ofa-labios-tab">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link-aten text-reset active" id="lab_sup-tab" data-toggle="tab" href="#lab_sup" role="tab" aria-controls="lab_sup" aria-selected="true">Labio Superior</a>
                                            <a class="nav-link-aten text-reset" id="lab_inf-tab" data-toggle="tab" href="#lab_inf" role="tab" aria-controls="lab_inf" aria-selected="true">Labio Inferior</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">

                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="lab_sup" role="tabpanel" aria-labelledby="lab_sup-tab">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-row">
                                                        <form>
                                                            <div id="labios_sup" class="form-row">
                                                                <div class="col-sm-3 mt-2">
                                                                    <div class="form-group fill">
                                                                        <H6 class="floating-center" > Labio Superior</H6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="formalab" >Forma Labio</label>
                                                                        <select name="formalab" id="formalab" data-titulo="Forma Labios" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('formalab','div_formalab','formalab_obs',2);">
                                                                            <option value="1"> Normal</option>
                                                                            <option value="2"> Alterada (describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_formalab" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="formalab_obs" >Obs Forma Labios</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Forma Labios" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="formalab_obs" id="formalab_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="tonolab" >Tono</label>
                                                                        <select name="tonolab" id="tonolab" data-titulo="Tono" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tonolab','div_tonolab','tonolab_obs',2);">
                                                                            <option value="1">Adecuado</option>
                                                                            <option value="2">Alterado</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_tonolab" style="display:none">
                                                                        <label class="floating-label-activo-sm" for="tonolab_obs">Obs Tono</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Obs Tono" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tonolab_obs" id="tonolab_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="cicatriz_lab" >Cicatriz</label>
                                                                        <select name="cicatriz_lab" id="cicatriz_lab" data-titulo="Cicatriz" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cicatriz_lab','div_cicatriz_lab','cicatriz_lab_obs',2);">
                                                                            <option value="1">No</option>
                                                                            <option value="2">Si (describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_cicatriz_lab" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm"  for="cicatriz_lab_obs" >Obs.Cicatriz</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs.Cicatriz" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cicatriz_lab_obs" id="cicatriz_lab_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="posicion_lab">Posición</label>
                                                                        <select name="posicion_lab" id="posicion_lab" data-titulo="Posición" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posicion_lab','div_posicion_lab','posicion_lab_obs',2);">
                                                                            <option value="1">Adecuado</option>
                                                                            <option value="2">Alteracion Funcional</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_posicion_lab" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="posicion_lab_obs">Obs Posición</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Posición" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="posicion_lab_obs" id="posicion_lab_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="tamano_lab">Tamaño</label>
                                                                        <select name="tamano_lab" id="tamano_lab" data-titulo="Tamaño" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tamano_lab','div_tamano_lab','tamano_lab_obs',2);">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="1"> Normal</option>
                                                                            <option value="2"> Anormal (describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_tamano_lab" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="tamano_lab_obs">Obs Tamaño</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Tamaño" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tamano_lab_obs" id="tamano_lab_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm"for="funcionalidad" >Funcionalidad Labial</label>
                                                                        <select name="funcionalidad" id="funcionalidad" data-titulo="Funcionalidad Labial" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('funcionalidad','div_funcionalidad','funcionalidad_obs',2);">
                                                                            <option value="1">Adecuada</option>
                                                                            <option value="2">Alteracion Funcional</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_funcionalidad" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="funcionalidad_obs">Obs Funcionalidad Labial</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Funcionalidad Labial" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="funcionalidad_obs" id="funcionalidad_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 mt-2">
                                                                    <div class="form-group" id="div_ofa_vest_boc">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="obs_lab">Obs Examen del Labio Superior</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Examen del Labio Superior" data-seccion="OFA LABIO SUPERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_lab_sup" id="obs_lab_sup"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="lab_inf" role="tabpanel" aria-labelledby="lab_inf-tab">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-row">
                                                        <form>
                                                            <div id="labios_inf" class="form-row">
                                                                <div class="col-sm-3 mt-2">
                                                                    <div class="form-group fill">
                                                                        <H6 class="floating-center" > Labio Inferior</H6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="formalabi" >Forma Labio</label>
                                                                        <select name="formalabi" id="formalabi" data-titulo="Forma Labios" data-seccion="OFA LABIO INFERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('formalabi','div_formalabi','formalabi_obs',2);">
                                                                            <option value="1"> Normal</option>
                                                                            <option value="2"> Alterada (describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_formalabi" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="formalabi_obs" >Obs Forma Labios</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Forma Labios" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="formalabi_obs" id="formalabi_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="tonolabi" >Tono</label>
                                                                        <select name="tonolabi" id="tonolabi" data-titulo="Tono" data-seccion="OFA LABIO SUPERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tonolabi','div_tonolabi','tonolabi_obs',2);">
                                                                            <option value="1">Adecuado</option>
                                                                            <option value="2">Alterado</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_tonolab" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="tonolabi_obs">Obs Tono</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Obs Tono" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tonolabi_obs" id="tonolabi_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="cicatrizi_lab" >Cicatriz</label>
                                                                        <select name="cicatrizi_lab" id="cicatrizi_lab" data-titulo="Cicatriz" data-seccion="OFA LABIO INFERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cicatrizi_lab','div_cicatrizi_lab','cicatrizi_lab_obs',2);">
                                                                            <option value="1">No</option>
                                                                            <option value="2">Si (describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_cicatrizi_lab" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm"  for="cicatrizi_lab_obs" >Obs.Cicatriz</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs.Cicatriz" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cicatrizi_lab_obs" id="cicatrizi_lab_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="posicioni_lab">Posición</label>
                                                                        <select name="posicioni_lab" id="posicioni_lab" data-titulo="Posición" data-seccion="OFA LABIO INFERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posicioni_lab','div_posicioni_lab','posicioni_lab_obs',2);">
                                                                            <option value="1">Adecuado</option>
                                                                            <option value="2">Alteracion Funcional</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_posicioni_lab" style="display:none">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="posicioni_lab_obs">Obs Posición</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Posición" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="posicioni_lab_obs" id="posicioni_lab_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="tamanoi_lab">Tamaño</label>
                                                                        <select name="tamanoi_lab" id="tamanoi_lab" data-titulo="Tamaño" data-seccion="OFA LABIO INFERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tamanoi_lab','div_tamanoi_lab','tamanoi_lab_obs',2);">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="1"> Normal</option>
                                                                            <option value="2"> Anormal (describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_tamanoi_lab" style="display:none">
                                                                        <label  class="floating-label-activo-sm" for="tamanoi_lab_obs">Obs Tamaño</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Tamaño" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tamanoi_lab_obs" id="tamanoi_lab_obs"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mt-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm"for="funcionalidadi" >Funcionalidad Labial</label>
                                                                        <select name="funcionalidadi" id="funcionalidadi" data-titulo="Funcionalidad Labial" data-seccion="OFA LABIO INFERIOR" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('funcionalidadi','div_funcionalidadi','funcionalidadi_obs',2);">
                                                                            <option value="1">Adecuada</option>
                                                                            <option value="2">Alteracion Funcional</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_funcionalidadi" style="display:none">
                                                                        <label  class="floating-label-activo-sm" for="funcionalidadi_obs">Obs Funcionalidad Labial</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Funcionalidad Labial" data-seccion="OFA LABIO INFERIOR" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="funcionalidadi_obs" id="funcionalidadi_obs"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12 mt-2">

                                                                    <div class="form-group" id="div_ofa_vest_boc">
                                                                        <label id="" name="" class="floating-label-activo-sm" for="obs_lab_supi">Obs Examen del Labio Inferior</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs Examen del Labio Superior" data-seccion="OFA LABIO INFERIO" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_lab_supi" id="obs_lab_supi"></textarea>
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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-info" onclick="registrar_est_ofa();">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function est_ofa(){
        $('#est_ofa').modal('show');
    }

    function registrar_est_ofa()
    {
        var id_ficha_otros_prof = $('#id_fc').val();
        var id_ficha_fono = '';
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var est_osea = $('#est_osea').val();
        var est_osea_obs = $('#est_osea_obs').val();
        var form_fac = $('#form_fac').val();
        var form_fac_obs = $('#form_fac_obs').val();
        var ap_bucal = $('#ap_bucal').val();
        var ap_bucal_obs = $('#ap_bucal_obs').val();
        var dientes = $('#dientes').val();
        var dientes_obs = $('#dientes_obs').val();
        var mordid = $('#mordid').val();
        var mordid_obs = $('#mordid_obs').val();
        var nariz = $('#nariz').val();
        var nariz_obs = $('#nariz_obs').val();
        var cara_obs = $('#cara_obs').val();
        var vestib = $('#vestib').val();
        var vestib_obs = $('#vestib_obs').val();
        var fren_sup = $('#fren_sup').val();
        var fren_sup_obs = $('#fren_sup_obs').val();
        var fren_inf = $('#fren_inf').val();
        var fren_inf_obs = $('#fren_inf_obs').val();
        var fren_subl = $('#fren_subl').val();
        var fren_subl_obs = $('#fren_subl_obs').val();
        var palad_duro = $('#palad_duro').val();
        var palad_duro_obs = $('#palad_duro_obs').val();
        var palad_bl = $('#palad_bl').val();
        var palad_bl_obs = $('#palad_bl_obs').val();
        var cierre_vf = $('#cierre_vf').val();
        var cierre_vf_obs = $('#cierre_vf_obs').val();
        var uvul = $('#uvul').val();
        var uvul_obs = $('#uvul_obs').val();
        var amigd = $('#amigd').val();
        var amigd_obs = $('#amigd_obs').val();
        var adenoi = $('#adenoi').val();
        var adenoi_obs = $('#adenoi_obs').val();
        var obs_gral_boc = $('#obs_gral_boc').val();
        var forma = $('#forma').val();
        var forma_obs = $('#forma_obs').val();
        var posicion = $('#posicion').val();
        var posicion_obs = $('#posicion_obs').val();
        var tono = $('#tono').val();
        var tono_obs = $('#tono_obs').val();
        var cicatriz = $('#cicatriz').val();
        var cicatriz_obs = $('#cicatriz_obs').val();
        var tam = $('#tam').val();
        var tam_obs = $('#tam_obs').val();
        var funcion = $('#funcion').val();
        var funcion_obs = $('#funcion_obs').val();
        var leng_obs = $('#leng_obs').val();
        var formalab = $('#formalab').val();
        var formalab_obs = $('#formalab_obs').val();
        var tonolab = $('#tonolab').val();
        var tonolab_obs = $('#tonolab_obs').val();
        var cicatriz_lab = $('#cicatriz_lab').val();
        var cicatriz_lab_obs = $('#cicatriz_lab_obs').val();
        var posicion_lab = $('#posicion_lab').val();
        var posicion_lab_obs = $('#posicion_lab_obs').val();
        var tamano_lab = $('#tamano_lab').val();
        var tamano_lab_obs = $('#tamano_lab_obs').val();
        var funcionalidad = $('#funcionalidad').val();
        var funcionalidad_obs = $('#funcionalidad_obs').val();
        var obs_lab_sup = $('#obs_lab_sup').val();
        var formalabi = $('#formalabi').val();
        var formalabi_obs = $('#formalabi_obs').val();
        var tonolabi = $('#tonolabi').val();
        var tonolabi_obs = $('#tonolabi_obs').val();
        var cicatrizi_lab = $('#cicatrizi_lab').val();
        var cicatrizi_lab_obs = $('#cicatrizi_lab_obs').val();
        var posicioni_lab = $('#posicioni_lab').val();
        var posicioni_lab_obs = $('#posicioni_lab_obs').val();
        var tamanoi_lab = $('#tamanoi_lab').val();
        var tamanoi_lab_obs = $('#tamanoi_lab_obs').val();
        var funcionalidadi = $('#funcionalidadi').val();
        var funcionalidadi_obs = $('#funcionalidadi_obs').val();
        var obs_lab_supi = $('#obs_lab_supi').val();

        var url = "{{ route('ficha.otro.prof.registro.eval.ofa') }}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                    _token: CSRF_TOKEN,
                    id_ficha_otros_prof: id_ficha_otros_prof,
                    id_ficha_fono: id_ficha_fono,
                    id_paciente: id_paciente,
                    id_profesional: id_profesional,
                    est_osea: est_osea,
                    est_osea_obs: est_osea_obs,
                    form_fac: form_fac,
                    form_fac_obs: form_fac_obs,
                    ap_bucal: ap_bucal,
                    ap_bucal_obs: ap_bucal_obs,
                    dientes: dientes,
                    dientes_obs: dientes_obs,
                    mordid: mordid,
                    mordid_obs: mordid_obs,
                    nariz: nariz,
                    nariz_obs: nariz_obs,
                    cara_obs: cara_obs,
                    vestib: vestib,
                    vestib_obs: vestib_obs,
                    fren_sup: fren_sup,
                    fren_sup_obs: fren_sup_obs,
                    fren_inf: fren_inf,
                    fren_inf_obs: fren_inf_obs,
                    fren_subl: fren_subl,
                    fren_subl_obs: fren_subl_obs,
                    palad_duro: palad_duro,
                    palad_duro_obs: palad_duro_obs,
                    palad_bl: palad_bl,
                    palad_bl_obs: palad_bl_obs,
                    cierre_vf: cierre_vf,
                    cierre_vf_obs: cierre_vf_obs,
                    uvul: uvul,
                    uvul_obs: uvul_obs,
                    amigd: amigd,
                    amigd_obs: amigd_obs,
                    adenoi: adenoi,
                    adenoi_obs: adenoi_obs,
                    obs_gral_boc: obs_gral_boc,
                    forma: forma,
                    forma_obs: forma_obs,
                    posicion: posicion,
                    posicion_obs: posicion_obs,
                    tono: tono,
                    tono_obs: tono_obs,
                    cicatriz: cicatriz,
                    cicatriz_obs: cicatriz_obs,
                    tam: tam,
                    tam_obs: tam_obs,
                    funcion: funcion,
                    funcion_obs: funcion_obs,
                    leng_obs: leng_obs,
                    formalab: formalab,
                    formalab_obs: formalab_obs,
                    tonolab: tonolab,
                    tonolab_obs: tonolab_obs,
                    cicatriz_lab: cicatriz_lab,
                    cicatriz_lab_obs: cicatriz_lab_obs,
                    posicion_lab: posicion_lab,
                    posicion_lab_obs: posicion_lab_obs,
                    tamano_lab: tamano_lab,
                    tamano_lab_obs: tamano_lab_obs,
                    funcionalidad: funcionalidad,
                    funcionalidad_obs: funcionalidad_obs,
                    obs_lab_sup: obs_lab_sup,
                    formalabi: formalabi,
                    formalabi_obs: formalabi_obs,
                    tonolabi: tonolabi,
                    tonolabi_obs: tonolabi_obs,
                    cicatrizi_lab: cicatrizi_lab,
                    cicatrizi_lab_obs: cicatrizi_lab_obs,
                    posicioni_lab: posicioni_lab,
                    posicioni_lab_obs: posicioni_lab_obs,
                    tamanoi_lab: tamanoi_lab,
                    tamanoi_lab_obs: tamanoi_lab_obs,
                    funcionalidadi: funcionalidadi,
                    funcionalidadi_obs: funcionalidadi_obs,
                    obs_lab_supi: obs_lab_supi,
                    otro: '',
                    estado: 1,
                },
            })
        .done(function(data) {
            if (data.estado == 1)
            {

                $('#est_ofa').modal('hide');
                limpiar_est_ofa();
                swal({
                    title: "Registro de Evaluacion OFA",
                    text: "Carga Exitosa.",
                    icon: "success"
                });
            }
            else
            {
                swal({
                    title: "Registro de Evaluacion OFA",
                    text: "Error al registrar",
                    icon: "error"
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function limpiar_est_ofa()
    {
        $('#id_ficha_otros_prof').val(1);//bigInteger
        $('#id_ficha_fono').val(1);//bigInteger
        $('#id_paciente').val(1);//bigInteger
        $('#id_profesional').val(1);//bigInteger
        $('#est_osea').val(1);//integer
        $('#est_osea_obs').val('');//string
        $('#form_fac').val(1);//integer
        $('#form_fac_obs').val('');//string
        $('#ap_bucal').val(1);//integer
        $('#ap_bucal_obs').val('');//string
        $('#dientes').val(1);//integer
        $('#dientes_obs').val('');//string
        $('#mordid').val(1);//integer
        $('#mordid_obs').val('');//string
        $('#nariz').val(1);//integer
        $('#nariz_obs').val('');//string
        $('#cara_obs').val('');//string
        $('#vestib').val(1);//integer
        $('#vestib_obs').val('');//string
        $('#fren_sup').val(1);//integer
        $('#fren_sup_obs').val('');//string
        $('#fren_inf').val(1);//integer
        $('#fren_inf_obs').val('');//string
        $('#fren_subl').val(1);//integer
        $('#fren_subl_obs').val('');//string
        $('#palad_duro').val(1);//integer
        $('#palad_duro_obs').val('');//string
        $('#palad_bl').val(1);//integer
        $('#palad_bl_obs').val('');//string
        $('#cierre_vf').val(1);//integer
        $('#cierre_vf_obs').val('');//string
        $('#uvul').val(1);//integer
        $('#uvul_obs').val('');//string
        $('#amigd').val(1);//integer
        $('#amigd_obs').val('');//string
        $('#adenoi').val(1);//integer
        $('#adenoi_obs').val('');//string
        $('#obs_gral_boc').val('');//string
        $('#forma').val(1);//integer
        $('#forma_obs').val('');//string
        $('#posicion').val(1);//integer
        $('#posicion_obs').val('');//string
        $('#tono').val(1);//integer
        $('#tono_obs').val('');//string
        $('#cicatriz').val(1);//integer
        $('#cicatriz_obs').val('');//string
        $('#tam').val(1);//integer
        $('#tam_obs').val('');//string
        $('#funcion').val(1);//integer
        $('#funcion_obs').val('');//string
        $('#leng_obs').val('');//string
        $('#formalab').val(1);//integer
        $('#formalab_obs').val('');//string
        $('#tonolab').val(1);//integer
        $('#tonolab_obs').val('');//string
        $('#cicatriz_lab').val(1);//integer
        $('#cicatriz_lab_obs').val('');//string
        $('#posicion_lab').val(1);//integer
        $('#posicion_lab_obs').val('');//string
        $('#tamano_lab').val(1);//integer
        $('#tamano_lab_obs').val('');//string
        $('#funcionalidad').val(1);//integer
        $('#funcionalidad_obs').val('');//string
        $('#obs_lab_sup').val('');//string
        $('#formalabi').val(1);//integer
        $('#formalabi_obs').val('');//string
        $('#tonolabi').val(1);//integer
        $('#tonolabi_obs').val('');//string
        $('#cicatrizi_lab').val(1);//integer
        $('#cicatrizi_lab_obs').val('');//string
        $('#posicioni_lab').val(1);//integer
        $('#posicioni_lab_obs').val('');//string
        $('#tamanoi_lab').val(1);//integer
        $('#tamanoi_lab_obs').val('');//string
        $('#funcionalidadi').val(1);//integer
        $('#funcionalidadi_obs').val('');//string
        $('#obs_lab_supi').val('');//string
        $('#otro').val('');//string
        $('#estado').val(1);//integer

        evaluar_para_carga_detalle('est_osea','div_est_osea','est_osea_obs',2);
        evaluar_para_carga_detalle('form_fac','div_form_fac','form_fac_obs',2);
        evaluar_para_carga_detalle('ap_bucal','div_ap_bucal','ap_bucal_obs',2);
        evaluar_para_carga_detalle('dientes','div_dientes','dientes_obs',2);
        evaluar_para_carga_detalle('mordid','div_mordid','mordid_obs',2);
        evaluar_para_carga_detalle('nariz','div_nariz','nariz_obs',2);
        evaluar_para_carga_detalle('vestib','div_vestib','vestib_obs',2);
        evaluar_para_carga_detalle('fren_sup','div_fren_sup','fren_sup_obs',2);
        evaluar_para_carga_detalle('fren_inf','div_fren_inf','fren_inf_obs',2);
        evaluar_para_carga_detalle('fren_subl','div_fren_subl','fren_subl_obs',2);
        evaluar_para_carga_detalle('palad_duro','div_palad_duro','palad_duro_obs',7);
        evaluar_para_carga_detalle('palad_bl','div_palad_bl','palad_bl_obs',2);
        evaluar_para_carga_detalle('cierre_vf','div_cierre_vf','cierre_vf_obs',5);
        evaluar_para_carga_detalle('uvul','div_uvul','uvul_obs',7);
        evaluar_para_carga_detalle('amigd','div_amigd','amigd_obs',3);
        evaluar_para_carga_detalle('adenoi','div_adenoi','adenoi_obs',3);
        evaluar_para_carga_detalle('forma','div_forma','forma_obs',2);
        evaluar_para_carga_detalle('posicion','div_posicion','posicion_obs',2);
        evaluar_para_carga_detalle('tono','div_tono','otono_obs',2);
        evaluar_para_carga_detalle('cicatriz','div_cicatriz','cicatriz_obs',2);
        evaluar_para_carga_detalle('tam','div_tam','tam_obs',4);
        evaluar_para_carga_detalle('funcion','div_funcion','funcion_obs',2);
        evaluar_para_carga_detalle('formalab','div_formalab','formalab_obs',2);
        evaluar_para_carga_detalle('tonolab','div_tonolab','tonolab_obs',2);
        evaluar_para_carga_detalle('cicatriz_lab','div_cicatriz_lab','cicatriz_lab_obs',2);
        evaluar_para_carga_detalle('posicion_lab','div_posicion_lab','posicion_lab_obs',2);
        evaluar_para_carga_detalle('tamano_lab','div_tamano_lab','tamano_lab_obs',2);
        evaluar_para_carga_detalle('funcionalidad','div_funcionalidad','funcionalidad_obs',2);
        evaluar_para_carga_detalle('formalabi','div_formalabi','formalabi_obs',2);
        evaluar_para_carga_detalle('tonolabi','div_tonolabi','tonolabi_obs',2);
        evaluar_para_carga_detalle('cicatrizi_lab','div_cicatrizi_lab','cicatrizi_lab_obs',2);
        evaluar_para_carga_detalle('posicioni_lab','div_posicioni_lab','posicioni_lab_obs',2);
        evaluar_para_carga_detalle('tamanoi_lab','div_tamanoi_lab','tamanoi_lab_obs',2);
        evaluar_para_carga_detalle('funcionalidadi','div_funcionalidadi','funcionalidadi_obs',2);

    }
</script>
