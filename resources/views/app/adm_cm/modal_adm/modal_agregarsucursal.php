<html lang="es">
<div id="modal_agregarsucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_agregarsucursal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center"> Agregar Sucursal Centro M&eacute;dico</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <h6>Agregar Sucursal</h6>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Sucursal</label>
                                <input class="form-control form-control-sm" name="sucurs" id="sucurs" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione Regi&oacute;n</option>
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valparaíso</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione Comuna</option>
                                    <optgroup label="Valparaíso">
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Tel&eacute;fonos</label>
                                <input type="text" class="form-control form-control-sm" name="nom_cont" id="nom_cont">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Email Institucional</label>
                                <input type="text" class="form-control form-control-sm" name="cargo_cont" id="cargo_cont">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre Contacto</label>
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
                                <label class="floating-label-activo-sm">N&#176; Tel&eacute;fono</label>
                                <input class="form-control form-control-sm" name="tel_cont" id="tel_cont" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Email</label>
                                <input class="form-control form-control-sm" name="email_cont" id="email_cont" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <input class="form-control form-control-sm" name="observ_cont" id="observ_cont" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-success btn-sm d-inline float-right mr-4" data-dismiss="modal">Agregar Sucursal</button>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table id="tabla_Nva sucursal" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Sucursal</th>
                                        <th class="text-center align-middle">Ciudad</th>
                                        <th class="text-center align-middle">Tel&eacute;fono</th>
                                        <th class="text-center align-middle">Email</th>
                                        <th class="text-center align-middle">Observaciones</th>
                                        <th class="text-center align-middle">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle"><span> Veracruz</span></td>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>