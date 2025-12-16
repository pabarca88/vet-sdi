<div id="modal_presupuesto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_presupuesto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_presupuesto"><strong>PRESUPUESTO Nº:</strong>0000000    <strong>FECHA:</strong>02/05/2021</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success pb-0" role="alert"><!--de acuerdo a las piezas y tratamientos dentales cargadas en el presupuesto-->
                                <ul>
                                    <li>
                                        <strong>Pieza o sector:</strong><span> 1-8</span>
                                    </li>
                                    <li>
                                        <strong>Tratamiento:</strong><span> Extracción</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha procedimiento</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_proc" id="fecha_proc">
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Pieza o sector</label>
                                <select class="form-control form-control-sm" id="" name="">
                                    <option value="-1">Seleccione pieza o sector</option>
                                    <option value="1-8">1-8</option>
                                    <option value="1-3">1-3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Tratamiento</label>
                                <select class="form-control form-control-sm" id="" name="">
                                    <option value="-1">Seleccione procedimiento</option>
                                    <option value="#">Extracción</option>
                                    <option value="#">Endodoncia</option><!--de acuerdo a los procedimientos cargados en el presupuesto-->
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Comentarios</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="2" name="comentarios_tratamiento" id="comentarios_tratamiento"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Trabajo terminado</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Agendar control</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success btn-sm  btn-block"><i class="fa fa-plus"></i> Agregar Tratamiento</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Descripción</th>
                                            <th class="text-center align-middle">Comentarios</th>
                                            <th class="text-center align-middle">Finalizado</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>1-8</span><br>
                                                <strong>Tratamiento: </strong><span>Endodoncia</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--Cierre: Tabla-->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>

        function presupuesto()
        {
            $('#modal_presupuesto').modal('show');
        }
</script>
