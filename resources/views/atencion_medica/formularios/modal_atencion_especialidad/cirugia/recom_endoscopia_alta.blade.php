<div id="m_ind_endosc_alta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_ind_endosc_alta"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones generales Endoscopías Digestivas Altas
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/cirugia/gastroscopía.pdf') }}" type="application/pdf"
                    data-documento="gastroscopía.pdf" data-url="documentos/cirugia/gastroscopía.pdf" width="100%"
                    height="750px" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-info btn-sm"
                        onclick="envio_indicaciones_pdf('m_ind_endosc_alta');">Enviar al Paciente</button>
                </div>
            </div>
        </div>
    </div>
</div>
