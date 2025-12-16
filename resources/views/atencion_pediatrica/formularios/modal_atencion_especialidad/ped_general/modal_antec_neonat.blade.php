<div id="neonat_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="neonat_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes de embarazo y puerperio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Embarazo y puerperio-->
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h5>Embarazo y puerperio </h5>
                    </div>
                    <div class="col-md-12" id="form_8_ped" >
                        <form>
                            <div class="form-row">
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label">N° de Embarazo</label>
                                    <input type="number" class="form-control form-control-sm" name="num_emb" id="num_emb">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label">Controlado</label>
                                    <input type="text" class="form-control form-control-sm" name="control_emb" id="control_emb">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label">Tipo de parto</label>
                                    <input type="text" class="form-control form-control-sm" name="tipo_parto" id="tipo_parto">
                                </div>
                                <div class="form-group fill col-sm-6">
                                    <label class="floating-label">Puerperio</label>
                                    <input type="text" class="form-control form-control-sm" name="puerperio" id="puerperio">
                                </div>
                                <div class="form-group fill col-sm-6">
                                    <label class="floating-label">Recién nacido (APGAR)</label>
                                    <input type="text" class="form-control form-control-sm" name="apgar_1" id="apgar_1">
                                </div>
                                <div class="form-group fill col-sm-8">
                                    <label class="floating-label">Tratamientos o complicaciones</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="otros_ant" id="otros_ant"></textarea>
                                </div>
                                <div class="form-group fill col-sm-4">
                                    <button type="button" class="btn btn-success btn-sm btn-block">Cerrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
