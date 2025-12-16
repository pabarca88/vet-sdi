 <div id="modal_contactadm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_contactadm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">contacto administrativos Centro Médico</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <h6>Agregar Contacto</h6>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input type="text" class="form-control form-control-sm" name="nom_cont" id="nom_cont">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Cargo</label>
                            <input type="text" class="form-control form-control-sm" name="cargo_cont" id="cargo_cont">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Sucursal</label>
                            <input class="form-control form-control-sm" name="sucurs" id="sucurs" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">N° Teléfono</label>
                            <input class="form-control form-control-sm" name="tel_cont" id="tel_cont" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Email</label>
                            <input class="form-control form-control-sm" name="email_cont" id="email_cont" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <input class="form-control form-control-sm" name="observ_cont" id="observ_cont" type="text" >
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <!--Tabla-->
                    <div class="table-responsive">
                        <table id="tabla_contactos" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Nombre</th>
                                    <th class="text-center align-middle">Cargo</th>
                                    <th class="text-center align-middle">Sucursal</th>
                                    <th class="text-center align-middle">Telefono</th>
                                    <th class="text-center align-middle">Email</th>
                                    <th class="text-center align-middle">Observaciones</th>
                                    <th class="text-center align-middle">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle"><span>juan jose Veracruz</span></td>
                                    <td class="text-center align-middle">Administrador</td>
                                    <td class="text-center align-middle">La Serena</td>
                                    <td class="text-center align-middle"><span>+56 996565550</span></td>
                                    <td class="text-center align-middle">laserena@centro.cl</td>
                                    <td class="text-center align-middle">llamar de 4 a 6</td>
                                    <td class="text-center align-middle">
                                    <button class="btn btn-danger btn-sm btn-info"><i class="feather icon-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <!--Cierre Tabla-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>