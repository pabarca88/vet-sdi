<div id="registrar_asistentes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_asistentes" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Nuevo/a Asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellidos</label>
                                <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                            </div>
                        </div>
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
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Región</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valparaíso</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
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
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Dirección / Calle</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Número / Dpto.</label>
                                <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group"> 
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Profesión</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione  opción</option>
                                        <option value="AL">Secretaria</option>
                                        <option value="LA">Secretaria Comercial</option>
                                        <option value="VA">Secretaria Asistente Dental</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Función Asignada</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione  opción</option>
                                    <option value="AL">Secretaria Recepción</option>
                                    <option value="LA">Secretaria Administración</option>
                                    <option value="LA">Secretaria Caja</option>
                                    <option value="VA">Asistente Dental</option>
                                    <option value="VA">Otra</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"> Otra Función</label>
                                <input class="form-control form-control-sm" name="ot_func" id="ot_func" type="text" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="switch switch-alert d-inline m-r-10">
                                    <input type="checkbox" id="correo-3" checked="">
                                    <label for="correo-3" class="cr"></label>
                                </div>
                                <label>Notificar por correo electrónico</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="rol-1" checked="">
                                    <label for="rol-1" class="cr"></label>
                                </div>
                                <label>Rol-1</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="rol-2" checked="">
                                    <label for="rol-2" class="cr"></label>
                                </div>
                                <label>Rol-2</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="rol-3" checked="">
                                    <label for="rol-3" class="cr"></label>
                                </div>
                                <label>Rol-3</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="rol-4" checked="">
                                    <label for="rol-4" class="cr"></label>
                                </div>
                                <label>Rol-4</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="rol-5" checked="">
                                    <label for="rol-5" class="cr"></label>
                                </div>
                                <label>Rol-5</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="rol-6" checked="">
                                    <label for="rol-6" class="cr"></label>
                                </div>
                                <label>Rol-6</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar asistente</button>
                </form>
            </div>
        </div>
    </div>
</div>

