<div id="horario_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="horario_sucursal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Horario de ( Nombre de sucursal) <!--Sin los parentesis, solo cargar el nombre de la sucursal--></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="text-c-blue">Horario de atención</h6>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group fill">
                            <label class="floating-label">Día</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione</option>
                                <option>Lunes a viernes</option>
                                <option>Sabado y domingos</option>
                                <option>Lunes</option>
                                <option>Martes</option>
                                <option>Miércoles</option>
                                <option>Jueves</option>
                                <option>Viernes</option>
                                <option>Sábado</option>
                                <option>Domingo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group fill">
                            <label class="floating-label">Desde</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione</option>
                                <option>Cargar horas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group fill">
                            <label class="floating-label">Hasta</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione</option>
                                <option>Cargar horas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button type="button" class="btn btn-info btn-sm btn-block">Añadir horario</button></td>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <table>
                                <!--TABLA RESPONSIVA HACIA ABAJO-->
                                <table id="res-config" class="display table table-striped dt-responsive nowrap table-xs text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Desde</th>
                                            <th>Hasta</th>
                                            <th>Día</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>8:00 am</td>
                                            <td>19:00 pm</td>
                                            <td>Martes</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button></td>
                                            </tr>
                                        </tr>
                                        <tr>
                                            <td>8:00 am</td>
                                            <td>19:00 pm</td>
                                            <td>Lunes a viernes</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button></td>
                                            </tr>
                                        <tr>
                                            <td>10:00 am</td>
                                            <td>14:00 pm</td>
                                            <td>Sábado</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button></td>
                                            </tr>
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