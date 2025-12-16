<div id="agregar_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_producto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar producto</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">C&oacute;digo de Producto</label>
                                <input class="form-control form-control-sm" name="cod_prod" id="cod_prod" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"> Cantidad Cr&iacute;tica</label>
                                <input class="form-control form-control-sm" name="cant_crit" id="cant_crit" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nombre Producto</label>
                                <input class="form-control form-control-sm" name="nom_prod" id="nom_prod" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Categor&iacute;a</label>
                                <select class="form-control form-control-sm" id="categoria">
                                    <option>Seleccione  opci&oacute;n</option>
                                    <optgroup label="Farmacia">
                                        <option value="AL">Medicamentos</option>
                                        <option value="LA">Desinfectantes</option>
                                        <option value="VA">Sanitizadores</option>
                                        <option value="VA">Aseo Quir&uacute;rgico</option>
                                    </optgroup>
                                    <optgroup label="Insumos">
                                        <option value="AL">Librer&iacute;a</option>
                                        <option value="LA">Materiales de Aseo</option>
                                        <option value="VA">otro</option>
                                        <option value="VA">Otro</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Agregar Producto</button>
                </div>
            </div>
        </div>
    </div>
</div>