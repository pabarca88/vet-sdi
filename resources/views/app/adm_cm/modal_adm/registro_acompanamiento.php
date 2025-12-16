 <div id="registro_acompanamiento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registro_acompanamiento" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Servicio Acompañamiento de Enfermos</h5>
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
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Especialidad</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <option>Medicina General</option>
                                    <option>Medicina Interna</option>
                                    <option>Otorrinolaringologo</option>
                                    <option>Odontologo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Teléfono</label>
                                <input class="form-control form-control-sm" name="telefono" id="telefono" type="phone" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Email</label>
                                <input class="form-control form-control-sm" name="telefono" id="telefono" type="email" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Dirección / Calle N° Of</label>
                                <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Región</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <option>decimo quinta</option>
                                    <option>primera</option>
                                    <option>Segunda</option>
                                    <option>etc</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ciudad</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option>etc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="modal-header">
                            <h6 class="modal-title  text-center">Asignar Roles</h6>
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

                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Registrar Profesional Médico</button>
                        </form>
                    </div>
                </form>
        </div>
    </div>
</div>