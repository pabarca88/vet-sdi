<div id="editar_personalaseoymantencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_personalaseoymantencion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Nuevo/a Personal Aseo y Mantenci&oacute;n</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
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
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo</label>
                                <select class="form-control form-control-sm"id="tipo">
                                    <option>Seleccione  opci&oacute;n</option>
                                    <option value="AL">Empresa Aseo</option>
                                    <option value="LA">Empresa Mantenci&oacute;n</option>
                                    <option value="VA">Particular</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha Contrato</label>
                                <input type="number" class="form-control form-control-sm" name="fecha" id="fecha">
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione  opci&oacute;n</option>
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valpara&iacute;so</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione  opci&oacute;n</option>
                                    <optgroup label="Valparaíso">
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valpara&iacute;so</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Direcci&oacute;n / Calle</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&uacute;mero / Dpto.</label>
                                <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group"> 
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Profesi&oacute;n</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione  opci&oacute;n</option>
                                        <option value="AL">ninguna</option>
                                        <option value="LA">Otra</option>
                                        <option value="VA">Otra</option><!--cargar tabla profesiones-->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Funci&oacute;n Asignada</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione  opci&oacute;n</option>
                                    <option value="AL">Aseo</option>
                                    <option value="LA">gasfiter&iacute;a</option>
                                    <option value="LA">Electricidad</option>
                                    <option value="VA">Otra</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"> Otra Funci&oacute;n</label>
                                <input class="form-control form-control-sm" name="ot_func" id="ot_func" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="switch switch-alert d-inline m-r-10">
                                    <input type="checkbox" id="correo-2" checked="">
                                    <label for="correo-2" class="cr"></label>
                                </div>
                                <label>Notificar por correo electr&oacute;nico</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h5>Datos Bancarios Para Dep&oacute;sito</h5>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Banco</label>
                                <input type="text" class="form-control form-control-sm" name="banco" id="banco">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Cuenta</label>
                                <input class="form-control form-control-sm" name="n_cta" id="n_cta" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Sucursal</label>
                                <input class="form-control form-control-sm" name="sucursal" id="sucursal" type="text" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar Personal</button>
                </form>
            </div>
        </div>
    </div>
</div>