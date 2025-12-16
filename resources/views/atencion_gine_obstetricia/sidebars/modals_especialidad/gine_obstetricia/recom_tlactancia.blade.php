<div id="m_ind_tecn_lactancia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_ind_tecn_lactancia" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Técnicas de Lactancia</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <embed src="{{ asset('documentos/pediatria/tecn_lactancia.pdf') }}" type="application/pdf" data-documento="tecn_lactancia.pdf" data-url="documentos/pediatria/tecn_lactancia.pdf" width="100%" height="800px"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_ind_tecn_lactancia');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>
<script>
    function tec_lactancia() {
        $('#m_ind_tecn_lactancia').modal('show');
    }
</script>
