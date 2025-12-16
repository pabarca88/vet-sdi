<div id="m_sol_ex_mat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_sol_ex_mat" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">SOLICITUD EXAMENES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                                </input>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nº de Orden</label>
                                <input type="number" name="" id="" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Examen a Solicitar</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="1">Examen de PAP</option>
                                    <option value="1">Eco Obstétrica</option>
                                    <option value="1">Examen de flujo</option>
                                    <option value="1">Cultivo y antibiograma Secreciones</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Sospecha Clínica</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="1">Ca Cervico-Uterino</option>
                                    <option value="2">Examen de rutina</option>
                                    <option value="3">Infección Herida Operatoria</option>
                                    <option value="4">Infección Vaginal</option>
                                    <option value="5">Lesión Cervical Pequeña</option>
                                    <option value="6">Lesión Cervical grande</option>
                                    <option value="7">Papilomatosis</option>


                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Urgencia</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option>Urgente</option>
                                    <option>Urgencia prioridad</option>
                                    <option>Urgencia normal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pap" id="obs_pap"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-3">
                        <!- -**** Al agregar un examen, se debe cargar la tabla *****- ->
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº Orden</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">sospecha</th>
                                            <th class="text-center align-middle">Urgencia</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                            <td class="text-center align-middle">7217821</td>
                                            <td class="text-center align-middle">pap</td>
                                            <td class="text-center align-middle">Ca Cervico-uterino</td>
                                            <td class="text-center align-middle">Urgente</td>
                                            <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
<script>
    function ma_sol_examenes() {
        $('#m_sol_ex_mat').modal('show');
    }
</script>
