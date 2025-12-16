<div id="registrar_licencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_licencia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Licencia M&eacute;dica</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">N&deg; Licencia</label>
                            <input type="number" class="form-control form-control-sm" name="num_lic" id="num_lic">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Inicio Reposo</label>
                            <input class="form-control form-control-sm" name="f_inic_rep" id="f_inic_rep" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">T&eacute;rmino Reposo</label>
                            <input class="form-control form-control-sm" name="f_fin_rep" id="f_fin_rep" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">D&iacute;as de Licencia</label>
                            <input class="form-control form-control-sm" name="dias_lic" id="dias_lic" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Lugar de Trabajo</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione Sucursal</option>
                                <option>Suc 1</option>
                                <option>Suc 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Funci&oacute;n</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione opci&oacute;n</option>
                                <option>Mantenci�n el&eacute;ctrica</option>
                                <option>Mantenci�n Agua</option>
                                <option>Mantenci�n Estructura</option>
                                <option>etc</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-lic" checked="">
                                <label for="correo-lic" class="cr"></label>
                            </div>
                            <label>Notificar acuso recibo por email</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-lic_sonline" checked="">
                                <label for="correo-lic_sonline" class="cr"></label>
                            </div>
                            <label>Contratar Secretaria online</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar </button>

            </div>
        </div>
    </div>
</div>
