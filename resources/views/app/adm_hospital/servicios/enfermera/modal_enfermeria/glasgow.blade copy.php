<div id="glasgow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="glasgow" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Escala de Glasgow</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="fun-global" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="glasgow_adult_tab" data-toggle="tab" href="#glasgow_adult" role="tab" aria-controls="glasgow_adult" aria-selected="true">Adulto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="glasgow_nino_tab" data-toggle="tab" href="#glasgow_nino" role="tab" aria-controls="glasgow_nino" aria-selected="false">Niño</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="glasgow_lact_tab" data-toggle="tab" href="#glasgow_lact" role="tab" aria-controls="glasgow_lact" aria-selected="false">Lactante</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="glasgow_ejem_tab" data-toggle="tab" href="#glasgow_ejem" role="tab" aria-controls="glasgow_ejem" aria-selected="false">ejemplo</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="form-group row">
                    <h6 class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">Fecha del examen</h6>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">
                        <script>
                            var f = new Date();
                            document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                         </script>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group ">
                            <label class="floating-label-activo-sm">Evaluado por:</label>
                            <input type="text" class="form-control form-control-sm" name="resp_bart" id="resp_bart">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ex-inferior">
                            <div class="tab-pane fade show active" id="glasgow_adult" role="tabpanel" aria-labelledby="glasgow_adult_tab">
                                <div id="contenedor_grupo_musc">
                                    <div id="glasgow_adulto">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-6">
                                                    <h6>EVALUACIÓN ADULTO</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="b_com" >Apertura Ocular</label>
                                                        <select name="b_com" id="b_com" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('b_com','div_b_com','obs_b_com',4);">
                                                            <option selected  value="4">Espontánea</option>
                                                            <option value="3">Al oir una voz</option>
                                                            <option value="2">En respuesta al dolor</option>
                                                            <option value="0">Ninguna</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_b_com" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_b_com">Descripción <i>Otro</i></label>
                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_b_com" id="obs_b_com"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                    <div class="form-group ">
                                                        <label class="floating-label-activo-sm">Puntos</label>
                                                        <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="b_lav" >Mejor respuesta Verbal</label>
                                                        <select name="b_lav" id="b_lav" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('b_lav','div_b_lav','obs_b_lav',4);">
                                                            <option selected  value="5">Orientada</option>
                                                            <option value="4">Confusa</option>
                                                            <option value="3">Palabras Inapropiadas</option>
                                                            <option value="2">Sonidos incomprensibles</option>
                                                            <option value="1">Ninguna</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_b_lav" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_b_lav">Descripción <i>Otro</i></label>
                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_b_lav" id="obs_b_lav"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                    <div class="form-group ">
                                                        <label class="floating-label-activo-sm">Puntos</label>
                                                        <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="b_vest" >Mejor respuesta Motriz</label>
                                                        <select name="b_vest" id="b_vest" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('b_vest','div_b_vest','obs_b_vest',4);">
                                                            <option selected  value="5">Obedece</option>
                                                            <option  value="3">Localiza</option>
                                                            <option value="4">Se retira</option>
                                                            <option value="3">Flexión anormal</option>
                                                            <option value="2">Respuesta del extensor</option>
                                                            <option value="1">Ninguna</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_b_vest" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_b_vest">Descripción <i>Otro</i></label>
                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_b_vest" id="obs_b_vest"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                    <div class="form-group ">
                                                        <label class="floating-label-activo-sm">Puntos</label>
                                                        <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row mt-7">
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group ">
                                                        <label class="floating-label-activo-sm">Puntos Glasgow</label>
                                                        <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="eval_est_mmgral">Observación y Recomendaciones</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="glasgow_nino" role="tabpanel" aria-labelledby="glasgow_nino_tab">
                                <div id="contenedor_grupo_musc">
                                    <div id="grupo_musc">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-6">
                                                    <h6>EVALUACIÓN NIÑO</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="b_com" >Apertura Ocular</label>
                                                        <select name="b_com" id="b_com" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('b_com','div_b_com','obs_b_com',4);">
                                                            <option selected  value="4">Espontánea</option>
                                                            <option value="3">Al oir una voz</option>
                                                            <option value="2">En respuesta al dolor</option>
                                                            <option value="0">Ninguna</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_b_com" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_b_com">Descripción <i>Otro</i></label>
                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_b_com" id="obs_b_com"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                    <div class="form-group ">
                                                        <label class="floating-label-activo-sm">Puntos</label>
                                                        <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="b_lav" >Mejor respuesta Verbal</label>
                                                        <select name="b_lav" id="b_lav" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('b_lav','div_b_lav','obs_b_lav',4);">
                                                            <option selected  value="5">Orientada apropiada</option>
                                                            <option value="4">Confusa</option>
                                                            <option value="3">Palabras Inapropiadas</option>
                                                            <option value="2">Palabras incomprensibles Sonidos no específicos</option>
                                                            <option value="1">Ninguna</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_b_lav" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_b_lav">Descripción <i>Otro</i></label>
                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_b_lav" id="obs_b_lav"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                    <div class="form-group ">
                                                        <label class="floating-label-activo-sm">Puntos</label>
                                                        <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="b_vest" >Mejor respuesta Motriz</label>
                                                        <select name="b_vest" id="b_vest" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('b_vest','div_b_vest','obs_b_vest',4);">
                                                            <option selected  value="5">Obedece órdenes</option>
                                                            <option  value="3">Localiza estimulos dolorosos</option>
                                                            <option value="4">Se retira en respuesta al dolor</option>
                                                            <option value="3">Flexión en respuesta al dolor</option>
                                                            <option value="2">Extensión en respuesta al dolor</option>
                                                            <option value="1">Ninguna</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_b_vest" style="display:none;">
                                                        <label class="floating-label-activo-sm" for="obs_b_vest">Descripción <i>Otro</i></label>
                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_b_vest" id="obs_b_vest"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                    <div class="form-group ">
                                                        <label class="floating-label-activo-sm">Puntos</label>
                                                        <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row mt-7">
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group ">
                                                        <label class="floating-label-activo-sm">Puntos Glasgow</label>
                                                        <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="eval_est_mmgral">Observación y Recomendaciones</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="glasgow_lact" role="tabpanel" aria-labelledby="glasgow_lact_tab">
                                <div id="contenedor_grupo_musc">
                                    <div id="grupo_musc">
                                        <form>
                                            <form>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-6">
                                                        <h6>EVALUACIÓN LACTANTE</h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="b_com" >Apertura Ocular</label>
                                                            <select name="b_com" id="b_com" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('b_com','div_b_com','obs_b_com',4);">
                                                                <option selected  value="4">Espontánea</option>
                                                                <option value="3">Al oir una voz</option>
                                                                <option value="2">En respuesta al dolor</option>
                                                                <option value="0">Ninguna</option>
                                                                <option value="4">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_b_com" style="display:none;">
                                                            <label class="floating-label-activo-sm" for="obs_b_com">Descripción <i>Otro</i></label>
                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_b_com" id="obs_b_com"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                        <div class="form-group ">
                                                            <label class="floating-label-activo-sm">Puntos</label>
                                                            <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="b_lav" >Mejor respuesta Verbal</label>
                                                            <select name="b_lav" id="b_lav" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('b_lav','div_b_lav','obs_b_lav',4);">
                                                                <option selected  value="5">Arrullos y balbuceos</option>
                                                                <option value="4">Irritable llanto</option>
                                                                <option value="3">llora en respuesta al dolor</option>
                                                                <option value="2">Gime en respuesta al dolor</option>
                                                                <option value="1">Ninguna</option>
                                                                <option value="4">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_b_lav" style="display:none;">
                                                            <label class="floating-label-activo-sm" for="obs_b_lav">Descripción <i>Otro</i></label>
                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_b_lav" id="obs_b_lav"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                        <div class="form-group ">
                                                            <label class="floating-label-activo-sm">Puntos</label>
                                                            <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="b_vest" >Mejor respuesta Motriz</label>
                                                            <select name="b_vest" id="b_vest" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('b_vest','div_b_vest','obs_b_vest',4);">
                                                                <option selected  value="5">Se mueve espontáneamente</option>
                                                                <option  value="3">Se retrae en respuesta al tacto</option>
                                                                <option value="4">Se retira en respuesta al dolor</option>
                                                                <option value="3">Postura de decorticación(flexión anormal en resp al dolor)</option>
                                                                <option value="2">Postura de descerebración(extensión anormal en resp al dolor)</option>
                                                                <option value="1">Ninguna</option>
                                                                <option value="4">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_b_vest" style="display:none;">
                                                            <label class="floating-label-activo-sm" for="obs_b_vest">Descripción <i>Otro</i></label>
                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_b_vest" id="obs_b_vest"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                        <div class="form-group ">
                                                            <label class="floating-label-activo-sm">Puntos</label>
                                                            <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row mt-7">
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group ">
                                                            <label class="floating-label-activo-sm">Puntos Glasgow</label>
                                                            <input type="number" class="form-control form-control-sm" name="ptos_bart" id="ptos_bart">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="eval_est_mmgral">Observación y Recomendaciones</label>
                                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="glasgow_ejem" role="tabpanel" aria-labelledby="glasgow_ejem_tab">
                                <div id="contenedor_grupo_musc">
                                    <div id="grupo_musc">
                                            <form name="sumar">

                                                <p type="text-align" name="etiqueta1" class="etiqueta1"> Opciónes de impresión </p>

                                                <label>Apertura Ocular</label> <br>
                                                <select name="list1" class="list1">
                                                    <option selected  value="4">Espontánea</option>
                                                    <option value="3">Al oir una voz</option>
                                                    <option value="2">En respuesta al dolor</option>
                                                    <option value="0">Ninguna</option>
                                                    <option value="4">Otro</option>
                                                </select>
                                                <br>

                                                <label>Cantidad</label> <br>
                                                <select name="list2" class="list2">
                                                    <option selected="true" disabled="disabled">Seleccine...</option>
                                                    <option value="20">25</option>
                                                    <option value="40">50</option>
                                                    <option value="80">100</option>
                                                    <option value="120">200</option>
                                                    <option value="160">300</option>
                                                    <option value="300">500</option>
                                                </select>
                                                <br>

                                                <label>Impresión</label> <br>
                                                <select name="list3" class="list3">
                                                    <option selected="true" disabled="disabled">Seleccine...</option>
                                                    <option value="50">4/0 (Color solo frente)</option>
                                                    <option value="100">4/4 (Color frente y vuelta)</option>
                                                </select>
                                                <br>

                                                <label>Tipo de papel</label> <br>
                                                <select name="list4" class="list4">
                                                    <option selected="true" disabled="disabled">Seleccine...</option>
                                                    <option value="200">Coché 300 g</option>
                                                    <option value="300">Cartulina sulfatada 12 pts 1 cara</option>
                                                </select>
                                                <br>

                                                <p type="text-align" name="etiqueta1" class="etiqueta1">  Terminados </p>

                                                <label>Plastificado frente y vuelta</label> <br>
                                                <select name="list5" class="list5">
                                                    <option selected="true" disabled="disabled">Seleccine...</option>
                                                    <option value="150">Delgado brillante (BOPP)</option>
                                                    <option value="300">Delgado mate (BOPP)</option>
                                                </select>
                                                <br>

                                                <label>Esquinas redondeadas (con datos de contacto hacia arriba)</label> <br>
                                                <select name="list6" class="list6">
                                                    <option selected="true" disabled="disabled">Seleccine...</option>
                                                    <option value="0">Ninguna</option>
                                                    <option value="80">4</option>
                                                </select>
                                                <br> <br>

                                                <label>Total</label>
                                                <input type="text" name="total">

                                            </form>

                                            <script>
                                                var numero3 = 0, numero1 = 0, numero2 = 0, numero4 = 0, numero5 = 0, numero6 = 0;
                                                caja = document.forms["sumar"].elements;

                                                $(".list1").change(function() {
                                                numero1 = parseFloat(caja["list1"].value);
                                                mostrar();
                                                });

                                                $(".list2").change(function() {
                                                numero2 = parseFloat(caja["list2"].value);
                                                mostrar();
                                                });

                                                $(".list3").change(function() {
                                                numero3 = parseFloat(caja["list3"].value);
                                                mostrar();
                                                });

                                                $(".list4").change(function() {
                                                numero4 = parseFloat(caja["list4"].value);
                                                mostrar();
                                                });

                                                $(".list5").change(function() {
                                                numero5 = parseFloat(caja["list5"].value);
                                                mostrar();
                                                });

                                                $(".list6").change(function() {
                                                numero6 = parseFloat(caja["list6"].value);
                                                mostrar();
                                                });


                                                function mostrar() {
                                                        if (numero1 >= 0 && numero2 >= 0 && numero3 >= 0 && numero4 >= 0 && numero5 >= 0 && numero6 >= 0) {
                                                            var resultado = 0;
                                                            resultado = (numero1 + numero2 + numero3 + numero4 + numero5 + numero6);
                                                            caja["total"].value = (resultado);
                                                        }
                                                    }

                                            </script>





                                        </div>


                                </div>


                            </div>


                            <br>
                            <div class="form-row mt-7">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="eval_est_mmgral">Observación y Recomendaciones</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
 {{--  <script>
                                                     //Este método hace que al estar listo el documento se ejecuten los métodos
                                                        function ready(fn) {
                                                            if (document.readyState != 'loading'){
                                                            fn();
                                                            } else {
                                                            document.addEventListener('DOMContentLoaded', fn);
                                                            }
                                                        }
                                                        // En esta variable se guardaran todos los elegidos
                                                        var valores = {};
                                                        var sumaTotal = 0;

                                                        // Metodo para agregar el "onchange" y hacer la magia
                                                        function agregarListeners(){
                                                                var listas = document.getElementsByTagName("select");

                                                            //Activar RecolectarElegidos cada que se detecte un cambio
                                                            for (var i = 0; i < listas.length; i++) {
                                                                listas[i].addEventListener("change", RecolectarElegidos, false);
                                                            }
                                                        }

                                                        // Método que busca en todas las listas los elementos Elegidos
                                                        function RecolectarElegidos(elemento){
                                                            var _listaQueSeCambio = elemento.target;
                                                            var _seleccionados = _listaQueSeCambio.selectedOptions;
                                                            var _nombreLista = _listaQueSeCambio.name;
                                                            var _temporal = [];

                                                            for(var i = 0; i < _seleccionados.length; i++){
                                                            var _valorSeleccionado = _seleccionados[i].value;
                                                            var _valorCantidad = 0;
                                                            console.warn(_seleccionados[i].value);

                                                            if(_valorSeleccionado == 'A'){
                                                                _valorCantidad = 5;
                                                            } else if(_valorSeleccionado == 'B'){
                                                                _valorCantidad = 10;
                                                            } else if(_valorSeleccionado == 'C'){
                                                                _valorCantidad = 7;
                                                            }

                                                            var _temp = {
                                                                valorLetra: _valorSeleccionado,
                                                                valorCantidad: _valorCantidad
                                                            }

                                                            _temporal.push(_temp);
                                                            }

                                                            //Guardamos los valores recolectados
                                                            valores[_nombreLista] = _temporal;

                                                            // Una vez que tenemos todo recolectado, hay que ir a sumarlos
                                                            calcularSuma(valores);
                                                        }

                                                        // Dados valores recolectados los recorre y suma
                                                        function calcularSuma(valores){
                                                            var _cantidad = 0

                                                            for(var indice in valores){
                                                            for(var i = 0; i < valores[indice].length; i++){
                                                                _cantidad += valores[indice][i].valorCantidad;
                                                            }
                                                            }

                                                            // Guardar la suma en nuestra variable global
                                                            sumaTotal = _cantidad;

                                                            //Opcional mostrarlos en pantalla
                                                            mostrarElegidos();
                                                        }

                                                        //Este método es para mostrar que valores se elegieron y la suma, aunque realmente no es necesario solo para la demostraión
                                                        function mostrarElegidos(){
                                                            var _divResultados = document.getElementById('resultados');
                                                            _divResultados.innerHTML = '<strong>Suma Total: </strong> ' + sumaTotal +
                                                                                        '<hr>' +
                                                                                        '<pre>' + JSON.stringify(valores, null, 2) + '</pre>';

                                                        }
                                                  </script>  --}}
<script>
    function i_glasgow(){
        $('#glasgow').modal('show');
    }

</script>
