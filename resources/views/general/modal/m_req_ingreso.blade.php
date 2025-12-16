<div id="modal_ireqingreso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_ireqingreso"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Requisitos de Ingreso Hospitalización</h5>
                <button type="button" class="close text-white"  data-bs-dismiss="modal"aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/generales/requisitos-ingreso.pdf') }}" type="application/pdf"
                    data-documento="requisitos-ingreso.pdf" data-url="documentos/generales/requisitos-ingreso.pdf" width="100%"
                    height="750px" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-info btn-sm"
                        onclick="envio_indicaciones_pdf('modal_ireqingreso');">Enviar al Paciente</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function r_ingreso() {
        $('#modal_ireqingreso').modal('show');
    }
</script>
