<div id="registrar_mutcajas_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_mutcajas_editar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar Mutualidades y Cajas</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut Empresa </label>
                                <input type="number" class="form-control form-control-sm" name="rut_emp" id="rut_emp">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Mes a Pagar</label>
                                <input type="date" class="form-control form-control-sm" name="mes_pago" id="mes_pago">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha de Pago</label>
                                <input class="form-control form-control-sm" name="f_pago" id="f_pago" type="date" >
                            </div>
                        </div>
                    </div>
                    <div  class="modal-header">
                        <h5 class="modal-title text-black text-center">Mutualidades </h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                               <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Mutuales</label>
                                    <select class="form-control form-control-sm" id="mutuales">
                                        <option>Seleccione  opci&oacute;n</option>
                                        <option value="AL">Asoc Chilena Seguridad</option>
                                        <option value="LA">Mutual de Seguridad</option>
                                        <option value="VA">IST</option>
                                        <option value="VA">Otras</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Trabajadores</label>
                                <input class="form-control form-control-sm" name="salud" id="salud" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Porcentaje</label>
                                <input class="form-control form-control-sm" name="cot_vol" id="cot_vol" type="text">
                            </div>
                        </div>
                    </div>
                    <div  class="modal-header">
                        <h5 class="modal-title text-black text-center">Cajas de Compensaci&oacuten </h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                           <div class="form-group fill">
                                 <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Cajas</label>
                                    <select class="form-control form-control-sm" id="mutuales">
                                        <option>Seleccione  opci&oacute;n</option>
                                        <option value="AL">Los Heroes</option>
                                        <option value="LA">Chilena Consolidada</option>
                                        <option value="VA">etc</option>
                                        <option value="VA">Otras</option>
                                    </select>
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Trabajadores</label>
                                <input class="form-control form-control-sm" name="salud" id="salud" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Porcentaje</label>
                                <input class="form-control form-control-sm" name="cot_vol" id="cot_vol" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Pago de Prestamos y Otros</label>
                                <input class="form-control form-control-sm" name="t_desc_prev" id="t_desc_prev" type="number" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Informar Pago al Director por correo electr&oacute;nico</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar </button>
            </div>
        </div>
    </div>
</div>