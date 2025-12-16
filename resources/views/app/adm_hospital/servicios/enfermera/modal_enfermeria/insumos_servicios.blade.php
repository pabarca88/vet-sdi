<!-- MODAL AGREGAR INSUMOS -->
<div class="modal fade" id="modalAgregarInsumos_" tabindex="-1" role="dialog" aria-labelledby="modalAgregarInsumos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Insumos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group m-t-10">
                                    <label class="floating-label-activo-sm" for="insumo">Insumo</label>
                                    <input type="text" class="form-control form-control-sm" id="insumo" name="insumo">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group m-t-10">
                                    <label class="floating-label-activo-sm" for="cantidad">Cantidad</label>
                                    <input type="text" class="form-control form-control-sm" id="cantidad" name="cantidad">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group m-t-10">
                                    <label class="floating-label-activo-sm" for="observaciones">Observaciones</label>
                                    <textarea class="form-control form-control-sm" id="observaciones" name="observaciones" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @if($enfermera)
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
                @endif
            </div>
        </div>
    </div>
</div>