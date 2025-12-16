<div id="a_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_sucursal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Añadir nueva sucursal</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rut</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección</label>
                            <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Región</label>
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
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Comuna</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione</option>
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valparaíso</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono_1" id="telefono_1" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono_2" id="telefono_2" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="not_pacientes_1">
                                <label for="not_pacientes_1" class="cr"></label>
                                <label>Notificar a pacientes</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm mx-auto" >Añadir nueva sucursal</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>