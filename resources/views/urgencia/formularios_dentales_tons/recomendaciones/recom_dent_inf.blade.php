<div id="m_dent_inf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_dent_inf" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Erupciones Dentales</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <embed src="{{ asset('img_dental\denticion_inf.png') }}" type="application/pdf" data-documento="IND_ODONTO.pdf" data-url="img_dental\denticion_inf.png" width="100%" height="650px"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_dent_inf');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>
<script>
    function dent_inf()
    {
        $('#m_dent_inf').modal('show');
    }
</script>
