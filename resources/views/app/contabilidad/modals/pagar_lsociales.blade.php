<div id="pagar_lsocales" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="pagar_lsocales" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Pagar Leyes Sociales</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut Centro M&eacute;dico</label>
                                <input type="number" class="form-control form-control-sm" name="rut_cm" id="rut">
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
                        <h5 class="modal-title text-black text-center">Pagos Previsionales</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">AFP</label>
                                <input class="form-control form-control-sm" name="a_Fam" id="a_Fam" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Cotizaci&oacute;n Salud</label>
                                <input class="form-control form-control-sm" name="salud" id="salud" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Cotizaci&oacute;n Voluntaria</label>
                                <input class="form-control form-control-sm" name="cot_vol" id="cot_vol" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Seguro de Cesant&iacute;a</label>
                                <input class="form-control form-control-sm" name="s_cesantia" id="s_cesantia" type="text">
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Descuentos Asignaciones Familiares</label>
                                <input class="form-control form-control-sm" name="t_desc_prev" id="t_desc_prev" type="number" >
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                            <h5>AFP</h5>
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Mes</th>
                                        <th class="text-center align-middle">AFP</th>
                                        <th class="text-center align-middle">Monto</th>
                                        <th class="text-center align-middle">Cot.Voluntaria</th>
                                        <th class="text-center align-middle">ver PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle"><span>03/12/20</span></td>
                                        <td class="text-center align-middle">Noviembre</td>
                                        <td class="text-center align-middle">Planvital</td>
                                        <td class="text-center align-middle"><span>25.000</span></td>
                                        <td class="text-center align-middle">35000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--Cierre Tabla-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Pagar </button>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                            <h5>Tesoreria</h5>
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Mes</th>
                                        <th class="text-center align-middle">Salud</th>
                                        <th class="text-center align-middle">S Cesantia</th>
                                        <th class="text-center align-middle">ver PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle"><span>03/12/20</span></td>
                                        <td class="text-center align-middle">Noviembre</td>
                                        <td class="text-center align-middle">50.000</td>
                                        <td class="text-center align-middle"><span>25.000</span></td>
                                        <td class="text-center align-middle">verpdf</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--Cierre Tabla-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Pagar </button>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                            <h5>Mutuales de Seguridad</h5>
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Mes</th>
                                        <th class="text-center align-middle">Nombre Mutual</th>
                                        <th class="text-center align-middle">Total</th>
                                        <th class="text-center align-middle">ver PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle"><span>03/12/20</span></td>
                                        <td class="text-center align-middle">Noviembre</td>
                                        <td class="text-center align-middle">IST</td>
                                        <td class="text-center align-middle"><span>25.000</span></td>
                                        <td class="text-center align-middle">verpdf</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--Cierre Tabla-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Pagar </button>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar al director por correo electr&oacute;nico</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar pagos </button>
            </div>
        </div>
    </div>
</div>

