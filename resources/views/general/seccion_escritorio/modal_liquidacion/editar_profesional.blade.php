<!--Modal Editar profesional-->
<div id="editar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Especialidad</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Medicina General</option>
                                <option>Medicina Interna</option>
                                <option>Otorrinolaringologo</option>
                                <option>Odontologo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Sub-Especialidad</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Otología</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Profesional Otorrinolaringólogo</option>
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
                <button type="submit" class="btn btn-info">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
