<div id="liquidacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="liquidacion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Liquidación Centro Médico ....</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut_prof" id="rut_prof">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Mes Liquidación</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_liq" id="fecha_liq">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">N° Atenciones</label>
                            <input class="form-control form-control-sm" name="n_atenc" id="n_atenc" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Total Haberes</label>
                            <input class="form-control form-control-sm" name="haberes" id="haberes" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Descuentos</label>
                            <input class="form-control form-control-sm" name="desc" id="desc" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Total a Pagar</label>
                            <input class="form-control form-control-sm" name="total_pago" id="total_pago" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                           <button type="button" class="btn btn-success btn-sm d-inline float-right mr-4" data-dismiss="modal">Agregar Liquidación</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <!--Tabla-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Mes</th>
                                    <th class="text-center align-middle">N° Atenciones</th>
                                    <th class="text-center align-middle">Haberes</th>
                                    <th class="text-center align-middle">Descuentos</th>
                                    <th class="text-center align-middle">A Pagar</th>
                                    <th class="text-center align-middle">ver PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle"><span>03/12/20</span></td>
                                    <td class="text-center align-middle">Noviembre</td>
                                    <td class="text-center align-middle">120</td>
                                    <td class="text-center align-middle"><span>3.000.000</span></td>
                                    <td class="text-center align-middle">900.000</td>
                                    <td class="text-center align-middle">2.100.000</td>
                                    <td class="text-center align-middle">
                                    <button class="btn btn-danger btn-sm btn-info"><i class="feather icon-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <!--Cierre Tabla-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="dep" checked="">
                                <label for="dep" class="cr"></label>
                            </div>
                            <label>Depositar</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-dep" checked="">
                                <label for="correo-dep" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

