<div id="m_ind_tec_adulto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_ind_tec_adulto"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones y cuidados Pacientes con TEC adultos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/ind_pctes/tec_adulto.pdf') }}" type="application/pdf" data-documento="tec_adulto.pdf" data-url="tec_adulto.pdf" width="100%"
                    height="750px" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_ind_tec_adulto');">Enviar al Paciente</button>
            </div>

        </div>
    </div>
</div>
<script>
    function tec_adulto()
    {
        $('#m_ind_tec_adulto').modal('show');
    }
</script>
