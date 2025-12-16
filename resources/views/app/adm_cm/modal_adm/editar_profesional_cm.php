<div id="editar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar Profesional M&eacute;dico y Dental</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#120;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellidos</label>
                                <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Profesión</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione</option>
                                    <option>Medico Cirujano</option>
                                    <option>Odontólogo</option>
                                    <option>Fonoaudiólogo</option>
                                    <option>Kinesiólogo</option>
                                    <option>Etc.</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Especialidad</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione </option>
                                    <option>Medicina General</option>
                                    <option>Medicina Interna</option>
                                    <option>Otorrinolaringologo</option>
                                    <option>Odontologo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Porcentaje Descuento</label>
                                <input class="form-control form-control-sm" name="desc" id="desc" type="text" >
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
                        <div class="col-sm-2">
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
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Región</label>
                                <select class="form-control form-control-sm" id="region" name="region">
                                    <option>Seleccione </option>
                                    <option>decimo quinta</option>
                                    <option>primera</option>
                                    <option>Segunda</option>
                                    <option>etc</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ciudad</label>
                                <select class="form-control form-control-sm" id="ciudad" name="ciudad">
                                    <option>Seleccione </option>
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
                            <h6 class="modal-title  text-center">Datos de Cuenta para Deposito</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Banco</label>
                                <select class="form-control form-control-sm" id="banco" name="banco">
                                    <option>Seleccione </option>
                                    <option>BCI</option>
                                    <option>Estado</option>
                                    <option>Itaú</option>
                                    <option>etc</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Tipo de Cuenta</label>
                                <select class="form-control form-control-sm" id="tpo_cta" name="tpo_cta">
                                    <option>Seleccione</option>
                                    <option>Corriente</option>
                                    <option>Vista</option>
                                    <option>de Ahorro</option>
                                    <option>etc</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="floating-label-activo-sm">N° Cuenta</label>
                            <input class="form-control form-control-sm" name="n_cta" id="n_cta" type="number" >
                        </div>
                    </div>
                    <div class="row">
                         <div class="modal-header">
                            <h6 class="modal-title  text-center">Asignar Roles</h6>
                         </div>
                         <hr>
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
        </div>
    </div>
</div>