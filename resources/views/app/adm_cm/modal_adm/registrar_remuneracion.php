<div id="registrar_remuneracion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_remuneracion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar remuneracion</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Fecha Ingreso</label>
                            <input type="date" class="form-control form-control-sm" name="ingreso_asist" id="ingreso_asist">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Nombres</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle / Número</label>
                            <input class="form-control form-control-sm" name="direccion_asist" id="direccion_asist" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Región</label>
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
                            <label class="floating-label">Comuna</label>
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
                            <label class="floating-label">Lugar de Trabajo</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione Sucursal</option>
                                <option>Suc 1</option>
                                <option>Suc 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione opción</option>
                                <option>Venta de Bonos</option>
                                <option>Agenda</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar </button>
                </form>
            </div>
        </div>
    </div>
</div>