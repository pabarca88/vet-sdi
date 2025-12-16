<div id="m_remp_horm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_remp_horm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones Acerca del reemplazo Hormonal en el climaterio</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <embed src="{{ asset('documentos/gine_obstetricia/terapia_reemplazo_hormonal.pdf') }}" type="application/pdf" data-documento="terapia_reemplazo_hormonal.pdf" data-url="documentos/gine_obstetricia/terapia_reemplazo_hormonal.pdf" width="100%" height="750px"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_remp_horm');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>




<script>
    function rec_reemp_horm() {
        $('#m_remp_horm').modal('show');
    }
</script>
