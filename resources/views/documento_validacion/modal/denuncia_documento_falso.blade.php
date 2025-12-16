<div class="modal fade" id="modal_denuncia_documento_falso">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_denuncia_documento_falsoLabel">Denuncia Documento Falso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="cuerpo_modal_denuncia_documento_falso">
                    <img src="{{ asset('images/maintance/maintance.png') }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal" aria-label="Close"> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function abrir_denuncia_documento_falso() {
        $('#modal_denuncia_documento_falso').modal('show');
    }
</script>
