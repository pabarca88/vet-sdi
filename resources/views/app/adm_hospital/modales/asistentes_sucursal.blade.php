<div id="asistentes_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asistentes_sucursal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asistentes de ( Nombre de sucursal) <!--Sin los parentesis, solo cargar el nombre de la sucursal--></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form>
                <div class="row">
                    <div class="col-sm-12">
                        <h6>Ingrese Rut de el o la asistente que desea asociar a su lugar de atención</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Rut" aria-label="Rut" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-info btn-sm" type="button" id="button-addon2">Asociar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <table>
                            <!--TABLA RESPONSIVA HACIA ABAJO-->
                            <table id="res-config" class="display table table-striped dt-responsive nowrap text-center table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Acción</th>
                                        <th>Rut</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="habdes_1">
                                                <label class="custom-control-label" for="habdes_1"></label>
                                            </div>
                                        </td>
                                        <td>00.000.000-0</td>
                                        <td>Pepita Sanchez Díaz</td>
                                    </tr>
                                </tbody>
                            </table>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm mx-auto" >Guardar cambios</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>