<div id="registro_ambulancias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registro_ambulancias" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Ambulancias</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nombre Empresa</label>
                                <input class="form-control form-control-sm" name="nombre_emp" id="nombre_emp" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Patente</label>
                                <input class="form-control form-control-sm" name="rut_emp" id="rut_emp" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo de Insumos</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione  opción</option>
                                        <option value="AL">Insumos Médicos</option>
                                        <option value="LA">Insumos Dentales</option>
                                        <option value="VA">Insumos en General</option>
                                        <option value="VA">Instrumental Quirúrgico</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Otros</label>
                                <input class="form-control form-control-sm" name="ins_otros" id="ins_otros" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electrónico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Teléfono</label>
                                <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Dirección / Calle /N° </label>
                                <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Región</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione una opción</option>
                                        <optgroup label="Valparaíso">
                                            <option value="AL">Viña del Mar</option>
                                            <option value="LA">La Calera</option>
                                            <option value="VA">Valparaíso</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Comuna</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione una opción</option>
                                        <optgroup label="Valparaíso">
                                            <option value="AL">Viña del Mar</option>
                                            <option value="LA">La Calera</option>
                                            <option value="VA">Valparaíso</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Contacto</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Cargo</label>
                                <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Teléfono (contacto)</label>
                                <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info mb-0" >Agregar Empresa</button>
            </div>
        </div>
    </div>
</div