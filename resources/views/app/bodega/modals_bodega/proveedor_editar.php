<div id="editar_proveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_proveedor" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar Proveedor</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Proveedor</label>
                                <input class="form-control form-control-sm" name="nombre_prov" id="nombre_prov" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
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
                        <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="phone" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Tel&eacute;fono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="phone" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Direcci&oacute;n / Calle/N&uacute;mero</label>
                            <input class="form-control form-control-sm" name="direccion" id="direccion" type="text">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Regi&oacute;n</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opci&oacute;n</option>
                                <optgroup label="Valparaíso">
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valparaíso</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Comuna</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opci&oacute;n</option>
                                <optgroup label="Valparaíso">
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valparaíso</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>