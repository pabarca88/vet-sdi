<div id="mamas_ant_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mamas_ant_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes  Mamas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_2" class="text-primary" style="cursor: pointer;">Añadir Nuevo Antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_2" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Tipo de Examen</label>
                                    <input type="text" class="form-control form-control-sm" name="proc_ant" id="proc_ant">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Resultado</label>
                                    <input type="text" class="form-control form-control-sm" name="proc_ant" id="proc_ant">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Indicaciones</label>
                                    <input type="text" class="form-control form-control-sm" name="proc_ant" id="proc_ant">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group fill col-sm-8">
                                    <label class="floating-label-activo-sm">Tratamientos o complicaciones</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" name="otros_ant" id="otros_ant"></textarea>
                                </div>
                                <div class="form-group fill col-sm-4">
                                    <button type="button" class="btn btn-success btn-sm btn-block">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="hemorragias_dental" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Tipo de Examen</th>
                                        <th class="text-center align-middle">Resultado</th>
                                        <th class="text-center align-middle">Indicaciones</th>
                                        <th class="text-center align-middle">Tratamientos complicaciones - otros</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">00/00/0000</td>
                                        <td class="text-center align-middle">Mamografía</td>
                                        <td class="text-center align-middle">Normal</td>
                                        <td class="text-center align-middle">Control Anual
                                        </td>
                                        <td class="text-center align-middle">No</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>