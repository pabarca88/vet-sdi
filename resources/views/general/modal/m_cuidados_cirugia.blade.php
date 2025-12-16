<div id="modal_ipostcir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_ipostcir"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Indicaciones Post Quirúrgicas</h5>
                <button type="button" class="close text-white"  data-bs-dismiss="modal"aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/generales/Indic_post_cirugia.pdf') }}" type="application/pdf"
                    data-documento="Indic_post_cirugia.pdf" data-url="documentos/generales/Indic_post_cirugia.pdf" width="100%"
                    height="750px" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-info btn-sm"
                        onclick="envio_indicaciones_pdf('modal_ipostcir');">Enviar al Paciente</button>
                </div>
            </div>
        </div>
    </div>
</div>
