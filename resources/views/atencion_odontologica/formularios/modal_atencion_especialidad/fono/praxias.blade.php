<div id="praxias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="praxias" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">PRAXIAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                   
                    <div id="generales_preart" class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono">GENERALES</h6>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <label id="" name="" class="floating-label-activo-sm">Deglución</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="deglucion" id="deglucion"></textarea>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <label id="" name="" class="floating-label-activo-sm">Succión</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="succion" id="succion"></textarea>
                        </div>
                        <br>
                        <div class="col-sm-6 mt-3">
                            <label id="" name="" class="floating-label-activo-sm">Masticación</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="masticacion" id="masticacion"></textarea>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label id="" name="" class="floating-label-activo-sm">Soplo</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="soplo" id="soplo"></textarea>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Otros y Observaciones</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_generales" id="obs_generales"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="respiracion" class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono">RESPIRACIÓN</h6>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <label id="" name="" class="floating-label-activo-sm">Modo</label>
                            <div class="form-group fill">
                                <select class="form-control form-control-sm" name="modo_resp" id="modo_resp">
                                    <option value="NO">•	Normal</option>
                                    <option value="NA">•	Nasal</option>
                                    <option value="BU">•	Bucal</option>
                                    <option value="MI">•	Mixta</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                            <div class="form-group fill">
                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                    <option value="N">•	Normal</option>
                                    <option value="CS">•	Costal Superior</option>
                                    <option value="CD">•	Costo-Diafragmática</option>
                                    <option value="AB">•	Abdominal</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-6 mt-3">
                            <label id="" name="" class="floating-label-activo-sm">C-F-R</label>
                            <div class="form-group fill">
                                <select class="form-control form-control-sm" name="cfr_resp" id="cfr_resp">
                                    <option value="N">•	Adecuada</option>
                                    <option value="CS">•	Alterada</option>
                                    <option value="CD">•	Muy Alterada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label class="floating-label-activo-sm">Tiempo-Máximo</label>
                            <input type="text" class="form-control form-control-sm" name="tpo_max" id="tpo_max">
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label id="" name="" class="floating-label-activo-sm">Fonación</label>
                            <div class="form-group fill">
                                <select class="form-control form-control-sm" name="cfr_resp" id="cfr_resp">
                                    <option value="N">•	Adecuada</option>
                                    <option value="CS">•	Alterada</option>
                                    <option value="CD">•	Muy Alterada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                        </div>
                    </div>
                    <div id="fonacion" class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono">FONACIÓN</h6>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <label id="" name="" class="floating-label-activo-sm">Tono</label>
                            <div class="form-group fill">
                                <select class="form-control form-control-sm" name="tono_fona" id="tono_fona">
                                    <option value="NO">•	Normal</option>
                                    <option value="DG">•	Desplazado a Graves</option>
                                    <option value="DA">•	Desplazado a Agudos</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <label id="" name="" class="floating-label-activo-sm">Intensidad	</label>
                            <div class="form-group fill">
                                <select class="form-control form-control-sm" name="inten_fona" id="inten_fona">
                                    <option value="N">•	Normal</option>
                                    <option value="EL">•	Elevada</option>
                                    <option value="DI">•	Disminuída</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-6 mt-3">
                            <label id="" name="" class="floating-label-activo-sm">Emisión</label>
                            <div class="form-group fill">
                                <select class="form-control form-control-sm" name="emis_fona" id="emis_fona">
                                    <option value="N">•	Normal</option>
                                    <option value="D">•	Disfónica</option>
                                    <option value="A">•	Afónica</option>
                                    <option value="DF">•	Diplofonía</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label class="floating-label-activo-sm">Ataque vocal</label>
                            <div class="form-group fill">
                                <select class="form-control form-control-sm" name="ataq_fona" id="ataq_fona">
                                    <option value="N">•	Normal</option>
                                    <option value="D">•	Duro</option>
                                    <option value="S">•	Soplado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label id="" name="" class="floating-label-activo-sm">Resonancia</label>
                            <div class="form-group fill">
                                <select class="form-control form-control-sm" name="res_fona" id="res_fona">
                                    <option value="N">•	Normal</option>
                                    <option value="HN">•	Hipernasal</option>
                                    <option value="HIN">•	Hiponasal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">
                Guardar</button>
            </div>
        </div>
    </div>
</div>