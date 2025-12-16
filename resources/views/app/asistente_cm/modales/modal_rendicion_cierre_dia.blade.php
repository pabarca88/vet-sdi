<div id="rendicion_cierre_dia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rendicion_cierre_dia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Rendición Cierres de Cajas</h5>
                <button type="button" class="close text-white" aria-label="Close" onclick="cerrarModalCierreDia();"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <div class="row info-basica">
                    <div class="col-md-12" id="div_horario">
                        <h6>Usted esta Rindiendo a <span id="nombre_receptor"></span> lo siguiente: </h6><br/>
                        <input type="hidden" name="cierre_numero_cierre_hidde" id="cierre_numero_cierre_hidde" value="">
                        <table id="rendicion_cierre_dia_table" class="display table-bordered table table-striped dt-responsive nowrap table-xs text-wrap" style="width:100%">
                            <tbody>
                                <tr>
                                    <th class="align-left">Número cierre</th>
                                    <td class="align-left" id="cierre_numero_cierre"></td>
                                </tr>
                                <tr>
                                    <th class="align-left">Total de Rendiciones</th>
                                    <td class="align-left" id="cierre_total_rendiciones"></td>
                                </tr>
                                <tr>
                                    <th class="align-left">Total de Documentos</th>
                                    <td class="align-left" id="cierre_total_documento"></td>
                                </tr>
                                <tr>
                                    <th class="align-left">Total de Bonos</th>
                                    <td class="align-left" id="cierre_total_bonos"></td>
                                </tr>
                                <tr>
                                    <th class="align-left">Total de Efectivo</th>
                                    <td class="align-left" id="cierre_total_efectivo"></td>
                                </tr>
                                <tr>
                                    <th class="align-left">Total de Otros</th>
                                    <td class="align-left" id="cierre_total_otros"></td>
                                </tr>
                            </tbody>
                            <tbody>
                        </table>
                    </div>
                    <div class="col-md-12" style="display: flex;flex-wrap: wrap;flex-direction: column;align-items: center;">
                        <div id="aprobacion_cierre_dia">En Espera de Aprobación <span id="cierre_aprobacion_tiempo"></span></div>
                        <img src="{{ asset('images/spinner.svg') }}" class="img-fluid" alt="cargando">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-sm btn-danger" type="button" onclick="cerrarModalCierreDia();">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
