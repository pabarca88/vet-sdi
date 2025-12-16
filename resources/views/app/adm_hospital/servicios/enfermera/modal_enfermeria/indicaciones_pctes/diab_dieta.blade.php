<div id="m_ind_diab_dieta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_ind_diab_dieta"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones Sobre dieta paciente diabético</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/ind_pctes/Diabetesdieta.pdf') }}" type="application/pdf" data-documento="Diabetesdieta.pdf" data-url="documentos/ind_pctes/Diabetesdieta.pdf" width="100%"
                    height="750px" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_ind_diab_dieta');">Enviar al Paciente</button>
            </div>

        </div>
    </div>
</div>
<script>
    function diab_dieta()
    {
        $('#m_ind_diab_dieta').modal('show');
    }
</script>
