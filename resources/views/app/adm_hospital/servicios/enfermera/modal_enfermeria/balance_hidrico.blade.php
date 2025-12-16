<div id="b_hidrico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="b_hidrico" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Balance Hídrico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="fun-global" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="bh_ing_tab" data-toggle="tab" href="#bh_ing" role="tab" aria-controls="bh_ing" aria-selected="true">Entradas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="bh_egre_tab" data-toggle="tab" href="#bh_egre" role="tab" aria-controls="bh_egre" aria-selected="false">Salidas</a>
                            </li>
                            {{--  <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="bh_graf_tab" data-toggle="tab" href="#bh_graf" role="tab" aria-controls="bh_graf" aria-selected="false">Gráfico</a>
                            </li>  --}}
                        </ul>
                    </div>
                </div>
                <div class="form-group row">
                    <h6 class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">Fecha del examen</h6>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">
                        <script>
                            var f = new Date();
                            document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear() + " "+" " + f.getHours() + "Hrs." + f.getMinutes() + "Min." );
                         </script>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group ">
                            <label class="floating-label-activo-sm">Evaluado por:</label>
                            <input type="text" class="form-control form-control-sm" name="resp_bart" id="resp_bart" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ex-inferior">
                            <div class="tab-pane fade show active" id="bh_ing" role="tabpanel" aria-labelledby="bh_ing_tab">
                                <div id="contenedor_ing_balance_hidrico">
                                    <div id="ing_balance_hidrico">
                                        <form name="sumaringreso">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-6">
                                                    <h6>INGRESOS</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm ing_oral " for="ing_oral">Ingesta Oral cc</label>
                                                         <input type="number" min="0" value="0" class="form-control form-control-sm"  name="ing_oral" id="ing_oral">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm fluidoter" for="fluidoter">Fluidoterápia</label>
                                                        <input type="number" min="0" value="0" class="form-control form-control-sm"  name="fluidoter" id="fluidoter">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm dil_med" for="dil_med">Diluciones Medicación</label>
                                                        <input type="number" min="0" value="0" class="form-control form-control-sm" name="dil_med" id="dil_med">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm nut_ent" for="nut_ent">Nutrición Enteral</label>
                                                        <input type="number" min="0" value="0" class="form-control form-control-sm" name="nut_ent" id="nut_ent">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm nut_parent" for="nut_parent">Nutrición Parenteral</label>
                                                         <input type="number" min="0" value="0" class="form-control form-control-sm" name="nut_parent" id="nut_parent">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm hemod" for="hemod">Hemoderivados</label>
                                                        <input type="number" min="0" value="0" class="form-control form-control-sm" name="hemod" id="hemod">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-7">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="eval_est_mmgral">Observaciones </label>
                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="bh_egre" role="tabpanel" aria-labelledby="bh_egre_tab">
                                <div id="contenedor_grupo_musc">
                                    <div id="grupo_musc">
                                        <form name="sumaregresos">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-6">
                                                    <h6>EGRESOS</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link-aten text-reset active" id="egr_orina-tab" data-toggle="tab" href="#egr_orina" role="tab" aria-controls="egr_orina" aria-selected="true">Diurésis</a>
                                                        <a class="nav-link-aten text-reset" id="egr_depos-tab" data-toggle="tab" href="#egr_depos" role="tab" aria-controls="egr_depos" aria-selected="false">Deposiciones</a>
                                                        <a class="nav-link-aten text-reset" id="egr_vom-tab" data-toggle="tab" href="#egr_vom" role="tab" aria-controls="egr_vom" aria-selected="false">Vomitos</a>
                                                        <a class="nav-link-aten text-reset" id="egr_dren_1-tab" data-toggle="tab" href="#egr_dren_1" role="tab" aria-controls="egr_dren_1" aria-selected="false">Drenaje 1</a>
                                                        <a class="nav-link-aten text-reset" id="egr_dren_2-tab" data-toggle="tab" href="#egr_dren_2" role="tab" aria-controls="egr_dren_2" aria-selected="false">Drenaje 2</a>
                                                        <a class="nav-link-aten text-reset" id="egr_dren_3-tab" data-toggle="tab" href="#egr_dren_3" role="tab" aria-controls="egr_dren_3" aria-selected="false">Drenaje 3</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="egr_orina" role="tabpanel" aria-labelledby="egr_orina-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm t-red" for="eg_caract_orin">Carácteristicas Orina</label>
                                                                            <select name="eg_caract_orin" id="eg_caract_orin" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_car_orin','div_bh_car_orin','obs_bh_car_orin',6);">
                                                                                <option selected  value="1">Normal</option>
                                                                                <option value="2">Colúrica</option>
                                                                                <option value="3">Hematúrica</option>
                                                                                <option value="4">Piúrica </option>
                                                                                <option value="5">Sedimento</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm eg_orin " for="eg_orin">Total Egresos Orina</label>
                                                                        <input type="number" min="0" value="0" class="form-control form-control-sm" name="eg_orin" id="eg_orin">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="obs_orin">Observaciones Orina</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_orin" id="obs_orin"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade " id="egr_depos" role="tabpanel" aria-labelledby="egr_depos-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm t-red" for="eg_caract_dep">Carácteristicas Deposiciones</label>
                                                                            <select name="eg_caract_dep" id="eg_caract_dep" class="form-control form-control-sm">
                                                                                <option selected  value="1">Normal</option>
                                                                                <option value="2">Líquidas</option>
                                                                                <option value="3">Sanguinolentas</option>
                                                                                <option value="4">Melénicas</option>
                                                                                <option value="5">Acólicas</option>
                                                                                <option value="6">Mucosas</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm eg_dep" for="eg_dep">Total Egresos Deposiciones</label>
                                                                        <input type="number" min="0" value="0" class="form-control form-control-sm " name="eg_dep" id="eg_dep">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="obs_eg_dep">Observaciones Deposiciones</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_eg_dep" id="obs_eg_dep"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="egr_vom" role="tabpanel" aria-labelledby="egr_vom-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm t-red" for="bh_car_vom">Carácteristicas Vómito</label>
                                                                            <select name="bh_car_vom" id="bh_car_vom" class="form-control form-control-sm">
                                                                                <option selected  value="1">Alimenticios</option>
                                                                                <option value="2">Biliares</option>
                                                                                <option value="3">Hemáticos</option>
                                                                                <option value="4">Fecaloideos</option>
                                                                                <option value="5">Posos de café</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm" for="eg_vom">Total Egresos Vómitos</label>
                                                                        <input type="number" min="0" value="0" class="form-control form-control-sm eg_vom" name="eg_vom" id="eg_vom">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="obs_vom">Observaciones Vómitos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_vom" id="obs_vom"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="egr_dren_1" role="tabpanel" aria-labelledby="egr_dren_1-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm t-red" for="bh_dren_1">Tipo Drenaje</label>
                                                                            <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm">
                                                                                <option selected  value="1">Redón </option>
                                                                                <option value="2">Torácico</option>
                                                                                <option value="3">Teja</option>
                                                                                <option value="4">Penrose</option>
                                                                                <option value="5">Kher</option>
                                                                                <option value="6">Jackson-Pratt</option>
                                                                                <option value="7">Pezzer</option>
                                                                                <option value="8">Nelaton</option>
                                                                                <option value="9">Drenaje percutáneo Rx</option>
                                                                                <option value="10">Tubo silicona Sarotoga</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm eg_dren1" for="eg_dren1">Total Egresos Drenaje 1</label>
                                                                        <input type="number" min="0" value="0" class="form-control form-control-sm" name="eg_dren1" id="eg_dren1">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="obs_orin">Observaciones Drenaje 1</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_dren1" id="obs_dren1"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="egr_dren_2" role="tabpanel" aria-labelledby="egr_dren_2-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm t-red" for="bh_dren_2">Tipo Drenaje</label>
                                                                            <select name="bh_dren_2" id="bh_dren_2" class="form-control form-control-sm">
                                                                                <option selected  value="1">Redón </option>
                                                                                <option value="2">Torácico</option>
                                                                                <option value="3">Teja</option>
                                                                                <option value="4">Penrose</option>
                                                                                <option value="5">Kher</option>
                                                                                <option value="6">Jackson-Pratt</option>
                                                                                <option value="7">Pezzer</option>
                                                                                <option value="8">Nelaton</option>
                                                                                <option value="9">Drenaje percutáneo Rx</option>
                                                                                <option value="10">Tubo silicona Sarotoga</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm eg_dren2" for="eg_dren2">Total Egresos Drenaje 2</label>
                                                                        <input type="number" min="0" value="0" class="form-control form-control-sm" name="eg_dren2" id="eg_dren2">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="obs_dren2">Observaciones Drenaje 2</label>
                                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_dren2" id="obs_dren2"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade show " id="egr_dren_3" role="tabpanel" aria-labelledby="egr_dren_3-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm t-red" for="bh_dren_3">Tipo Drenaje</label>
                                                                            <select name="bh_dren_3" id="bh_dren_3" class="form-control form-control-sm">
                                                                                <option selected  value="1">Redón </option>
                                                                                <option value="2">Torácico</option>
                                                                                <option value="3">Teja</option>
                                                                                <option value="4">Penrose</option>
                                                                                <option value="5">Kher</option>
                                                                                <option value="6">Jackson-Pratt</option>
                                                                                <option value="7">Pezzer</option>
                                                                                <option value="8">Nelaton</option>
                                                                                <option value="9">Drenaje percutáneo Rx</option>
                                                                                <option value="10">Tubo silicona Sarotoga</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm eg_dren3" for="eg_dren3">Total Egresos Drenaje 3</label>
                                                                        <input type="number" min="0" value="0" class="form-control form-control-sm" name="eg_dren3" id="eg_dren3">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="obs_dren3">Observaciones Drenaje 3</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_dren3" id="obs_dren3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--  <div class="tab-pane fade" id="egr_tot" role="tabpanel" aria-labelledby="egr_tot-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-6">
                                                                        <h6>EGRESOS TOTALES</h6>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-6">
                                                                        <div class="form-group ">
                                                                            <label class="floating-label-activo-sm"> TOTAL INGRESOS</label>
                                                                            <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;" data-input_igual="total_bHE" name="total" id="total" onchange="cargarIgual('total');">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-6">
                                                                        <div class="form-group ">
                                                                            <label class="floating-label-activo-sm"> TOTAL EGRESOS</label>
                                                                            <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;" data-input_igual="total_bHE" name="total" id="total" onchange="cargarIgual('total');">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>  --}}

                                                        {{--  <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="bh_egre_gral">Observación y Recomendaciones Generales</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="bh_egre_gral" id="bh_egre_gral"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>  --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{--  <div class="tab-pane fade show" id="bh_graf" role="tabpanel" aria-labelledby="bh_graf_tab">
                                <div class="form-row mt-7">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm" for="eval_est_mmgral">Gráfico ingreso/egreso</label>
                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}

                            <div class="form-row">
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-6">
                                    <div class="form-group ">
                                        <label class="floating-label-activo-sm"> TOTAL INGRESOS GRAL</label>
                                        <input type="number" min="0" value="0" class="form-control form-control-sm" style="color:red;font-weight:bold;" name="total_bi" id="total_bi">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-6">
                                    <div class="form-group ">
                                        <label class="floating-label-activo-sm"> TOTAL EGRESOS GRAL</label>
                                        <input type="number" min="0" value="0" class="form-control form-control-sm" style="color:red;font-weight:bold;" name="total_be" id="total_be">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-6">
                                    <div class="form-group ">
                                        <label class="floating-label-activo-sm"> BALANCE GRAL</label>
                                        <input type="number" min="0" value="0" class="form-control form-control-sm" style="color:red;font-weight:bold;" name="total_bb" id="total_bb">
                                    </div>
                                </div>
                            </div>
                                <hr>
                                <hr>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="bh_egre_gral">Observación y Recomendaciones Generales</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="bh_egre_gral" id="bh_egre_gral"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>


    /** balance hidrico egreso */
    $("#eg_orin").change(function() {
    mostrarEgres();
    });

    $("#eg_dep").change(function() {
    mostrarEgres();
    });

    $("#eg_vom").change(function() {
    mostrarEgres();
    });


    $("#eg_dren1").change(function() {
    mostrarEgres();
    });

    $("#eg_dren2").change(function() {
    mostrarEgres();
    });

    $("#eg_dren3").change(function() {
    mostrarEgres();
    });

    function mostrarEgres() {
        var numero7 = 0, numero8 = 0, numero9 = 0 ,numero10 = 0, numero11 = 0, numero12 = 0;
        caja_egreso = document.forms["sumaregresos"].elements;
        numero7 = parseFloat(caja_egreso["eg_orin"].value);
        numero8 = parseFloat(caja_egreso["eg_dep"].value);
        numero9 = parseFloat(caja_egreso["eg_vom"].value);
        numero10 = parseFloat(caja_egreso["eg_dren1"].value);
        numero11 = parseFloat(caja_egreso["eg_dren2"].value);
        numero12 = parseFloat(caja_egreso["eg_dren3"].value);
        {{--  console.log('mostrar');
        console.log('egreso');
        console.log('numero7: '+numero7);
        console.log('numero8: '+numero8);
        console.log('numero9: '+numero9);
        console.log('numero10: '+numero10);
        console.log('numero11: '+numero11);
        console.log('numero12: '+numero12);  --}}

        var resultado = 0;

        if (parseFloat(numero7) >= 0 && parseFloat(numero8) >= 0 && parseFloat(numero9) >= 0 && parseFloat(numero10) >= 0 && parseFloat(numero11) >= 0 && parseFloat(numero12) >= 0) {
            resultado = (parseFloat(numero7) + parseFloat(numero8) + parseFloat(numero9)+ parseFloat(numero10) + parseFloat(numero11) + parseFloat(numero12) );
        }
        $('#total_be').val(resultado);
        $('#total_bb').val( $('#total_bi').val() - $('#total_be').val());
        $('#puntos_balance').val( $('#total_bi').val() - $('#total_be').val());
        if($('#total_bb').val()>0)
        {
            $('#total_bb').css('color', 'blue');
        }
        else
        {
            $('#total_bb').css('color', 'red');
        }
    }

    /** balance hidrico ingreso */
    $("#ing_oral").change(function() {
        mostrarIngres();
    });

    $("#fluidoter").change(function() {
        mostrarIngres();
    });

    $("#dil_med").change(function() {
        mostrarIngres();
    });

    $("#nut_ent").change(function() {
        mostrarIngres();
    });

    $("#nut_parent").change(function() {
        mostrarIngres();
    });

    $("#hemod").change(function() {
        mostrarIngres();
    });

    function mostrarIngres() {
        var numero1 = 0, numero2 = 0, numero3 = 0 ,numero4 = 0, numero5 = 0, numero6 = 0;
        cajaingreso = document.forms["sumaringreso"].elements;
        numero1 = parseFloat(cajaingreso["ing_oral"].value);
        numero2 = parseFloat(cajaingreso["fluidoter"].value);
        numero3 = parseFloat(cajaingreso["dil_med"].value);
        numero4 = parseFloat(cajaingreso["nut_ent"].value);
        numero5 = parseFloat(cajaingreso["nut_parent"].value);
        numero6 = parseFloat(cajaingreso["hemod"].value);
        {{--  console.log('mostrar');
        console.log('ingreso');
        console.log('numero1: '+numero1);
        console.log('numero2: '+numero2);
        console.log('numero3: '+numero3);
        console.log('numero4: '+numero4);
        console.log('numero5: '+numero5);
        console.log('numero6: '+numero6);  --}}

        var resultado = 0;

        if (parseFloat(numero1) >= 0 && parseFloat(numero2) >= 0 && parseFloat(numero3) >= 0 && parseFloat(numero4) >= 0 && parseFloat(numero5) >= 0 && parseFloat(numero6) >= 0) {
            resultado = (parseFloat(numero1) + parseFloat(numero2) + parseFloat(numero3)+ parseFloat(numero4) + parseFloat(numero5) + parseFloat(numero6) );
        }

        $('#total_bi').val(resultado);
        $('#total_bb').val( $('#total_bi').val() - $('#total_be').val());
        $('#puntos_balance').val( $('#total_bi').val() - $('#total_be').val());
        if($('#total_bb').val()>0)
        {
            $('#total_bb').css('color', 'blue');
        }
        else
        {
            $('#total_bb').css('color', 'red');
        }
    }

    function i_b_hidrico(){
        $('#b_hidrico').modal('show');
    }
</script>
