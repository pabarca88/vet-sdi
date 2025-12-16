<div id="rendicion_caja_diaria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rendicion_caja_diaria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Rendición Caja Diaria</h5>
                <button type="button" class="close text-white" aria-label="Close" onclick="cerrarModalRendicion();"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <div class="row info-basica">
                    <div class="col-md-12" id="div_horario">
                        <h6>Usted esta Rindiendo a <span id="nombre_receptor"></span> lo siguiente: </h6><br/>
                        <input type="hidden" name="numero_rendicion_hidde" id="numero_rendicion_hidde" value="">
                        <table id="rendicion_caja_diaria_table" class="display table-bordered table table-striped dt-responsive nowrap table-xs text-wrap" style="width:100%">
                            <tbody>
                                <tr>
                                    <th class="align-left">Número Rendición</th>
                                    <td class="align-left" id="numero_rendicion"></td>
                                </tr>
                                <tr>
                                    <th class="align-left">Total de Documentos</th>
                                    <td class="align-left" id="total_documento"></td>
                                </tr>
                                <tr>
                                    <th class="align-left">Total de Bonos</th>
                                    <td class="align-left" id="total_bonos"></td>
                                </tr>
                                <tr>
                                    <th class="align-left">Total de Efectivo</th>
                                    <td class="align-left" id="total_efectivo"></td>
                                </tr>
                                <tr>
                                    <th class="align-left">Total de Otros</th>
                                    <td class="align-left" id="total_otros"></td>
                                </tr>
                            </tbody>
                            <tbody>
                        </table>
                    </div>
                    <div class="col-md-12" style="display: flex;flex-wrap: wrap;flex-direction: column;align-items: center;">
                        <div id="aprobacion">En Espera de Aprobación <span id="aprobacion_tiempo"></span></div>
                        <img src="{{ asset('images/spinner.svg') }}" class="img-fluid" alt="cargando">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-sm btn-danger" type="button" onclick="cerrarModalRendicion();">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
