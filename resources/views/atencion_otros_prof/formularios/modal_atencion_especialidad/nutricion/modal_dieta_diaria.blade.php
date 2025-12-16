<div id="m_dieta_diaria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_dieta_diaria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Ingesta diaria de alimentos (<script>
                                var f = new Date();
                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                            </script>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="a-solida-tab" data-toggle="tab" href="#a-solida" role="tab" aria-controls="a-solida" aria-selected="true">Alimentacion sólida</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="a-liquida-tab" data-toggle="tab" href="#a-liquida" role="tab" aria-controls="a-liquida" aria-selected="false">Alimentación líquida</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="obs-conc-a-diaria-tab" data-toggle="tab" href="#obs-conc-a-diaria" role="tab" aria-controls="obs-conc-a-diaria" aria-selected="false">Observaciones y conclusiones</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-nutricional">
                            <!--ALIMENTACION SOLIDA-->
                            <div class="tab-pane fade show active" id="a-solida" role="tabpanel" aria-labelledby="a-solida-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 ">
                                        <h6 class="text-c-blue mb-3">ALIMENTACIÓN SOLIDA</h6>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-row">
                                        <h6 class="col-sm-3 col-md-3 col-form-label font-weight-bolder">Desayuno</h6>
                                        <div class="form-group col-sm-9 col-md-9">
                                            <label class="floating-label-activo-sm">Tipo de alimentos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tpo_alim_desay" id="tpo_alim_desay"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <h6 class="col-sm-3 col-md-3 col-form-label font-weight-bolder">Colación-1</h6>
                                        <div class="form-group col-sm-9 col-md-9">
                                            <label class="floating-label-activo-sm">Tipo de alimentos</label>
                                             <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tpo_alim_col_1" id="tpo_alim_col_1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <h6 class="col-sm-3 col-md-3 col-form-label font-weight-bolder">Almuerzo</h6>
                                        <div class="form-group col-sm-9 col-md-9">
                                            <label class="floating-label-activo-sm">Tipo de alimentos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tpo_alim_almuerzo" id="tpo_alim_almuerzo"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <h6 class="col-sm-3 col-md-3 col-form-label font-weight-bolder">Colación-2</h6>
                                        <div class="form-group col-sm-9 col-md-9">
                                            <label class="floating-label-activo-sm">Tipo de alimentos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tpo_alim_col_2" id="tpo_alim_col_2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <h6 class="col-sm-3 col-md-3 col-form-label font-weight-bolder">Cena</h6>
                                        <div class="form-group col-sm-9 col-md-9">
                                            <label class="floating-label-activo-sm">Tipo de alimentos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tpo_alim_cena" id="tpo_alim_cena"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <h6 class="col-sm-3 col-md-3 col-form-label font-weight-bolder">Colación-3</h6>
                                        <div class="form-group col-sm-9 col-md-9">
                                            <label class="floating-label-activo-sm">Tipo de alimentos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tpo_alim_col_3" id="tpo_alim_col_3"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--ALIMENTACIÓN LIQUIDA-->
                            <div class="tab-pane fade show" id="a-liquida" role="tabpanel" aria-labelledby="a-liquida-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-c-blue mb-3">ALIMENTACIÓN LÍQUIDA</h6>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-row">
                                        <h6 class="col-sm-3 col-md-3 col-form-label font-weight-bolder">Agua</h6>
                                        <div class="form-group col-sm-9 col-md-9">
                                            <label class="floating-label-activo-sm">Cantidad y frecuencia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="c_agua" id="c_agua"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <h6 class="col-sm-3 col-md-3 col-form-label font-weight-bolder">Otros líquidos</h6>
                                        <div class="form-group col-sm-9 col-md-9">
                                            <label class="floating-label-activo-sm">Cantidad y frecuencia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tpo_liquido_cant" id="tpo_liquido_cant"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--OBSERVACIONES Y CONCLUSIONES-->
                            <div class="tab-pane fade show" id="obs-conc-a-diaria" role="tabpanel" aria-labelledby="obs-conc-a-diaria-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-c-blue mb-3">OBSERVACIONES Y CONCLUSIONES</h6>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-row">
                                        <h6 class="col-sm-3 col-md-3 col-form-label font-weight-bolder">Observaciones y conclusiones</h6>
                                        <div class="form-group col-sm-9 col-md-9">
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tpo_liquido_cant" id="tpo_liquido_cant"></textarea>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i>Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="guardar_evaluacion_nutricional()"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
