<div id="m_cuid_mamas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cuid_mamas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones Cuidado de las mamas en el Puerperio</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <embed src="{{ asset('documentos/gine_obstetricia/cuidado_mamas.pdf') }}" type="application/pdf" data-documento="cuidado_mamas.pdf" data-url="documentos/gine_obstetricia/cuidado_mamas.pdf" width="100%" height="750px"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_cuid_mamas');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>




<script>
    function rec_cuid_mamas() {
        $('#m_cuid_mamas').modal('show');
    }
</script>
