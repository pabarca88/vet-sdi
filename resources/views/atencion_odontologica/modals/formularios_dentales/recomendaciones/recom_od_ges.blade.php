<div id="m_ges_dental" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_ges_dental" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Ges Odontológico</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <embed src="{{ asset('documentos\dental\ges dental.pdf') }}" type="application/pdf" data-documento="IND_ODONTO.pdf" data-url="documentos\dental\ges dental.pdf" width="100%" height="750px"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_ges_dental');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>
<script>
    function ges_dental()
    {
        $('#m_ges_dental').modal('show');
    }
</script>
