<div id="modal_prev_acc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_prev_acc" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Prevensión Accidentes</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos\pediatria\prev. accidentes.pdf') }}" type="application/pdf" data-documento="prev. accidentes.pdf" data-url="documentos/pediatria/prev. accidentes.pdf" width="100%" height="800px"/>
              </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('modal_prev_acc');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>


