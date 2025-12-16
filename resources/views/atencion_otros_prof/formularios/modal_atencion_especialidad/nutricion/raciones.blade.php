<div id="m_raciones" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_raciones" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Tamaño de Raciones en la dieta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#m_raciones').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <embed src="{{ asset('documentos/nutri/raciones.pdf') }}" type="application/pdf" data-url="documentos/nutri/raciones.pdf" data-documento="raciones.pdf"  width="100%" height="340px">
                    </div>
                </div>

                <div class="form-row">

                    <div class="col-sm-12 mt-4">
                        <div class="form-group fill">
                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="observacion_m_raciones" id="observacion_m_raciones"></textarea>
                        </div>
                    </div>
                </div>
            </div>
           <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#m_raciones').modal('hide')">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_raciones');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>
