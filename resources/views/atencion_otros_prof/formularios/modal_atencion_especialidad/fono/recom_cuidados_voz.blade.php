<div id="m_cuid_voz" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cuid_voz" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones generales Cuidados de la Voz</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/fono/cuidados de la voz.pdf') }}" type="application/pdf"  width="100%" height="500px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info btn-sm">Enviar a paciente</button>
            </div>
        </div>
    </div>
</div>
<script>
    function voz() {
        $('#m_cuid_voz').modal('show');
    }
</script>
