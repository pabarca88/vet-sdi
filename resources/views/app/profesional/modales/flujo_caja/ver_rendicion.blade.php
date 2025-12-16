<div id="ver_rendicion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ver_rendicion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Rendición Caja Diaria</h5>
                <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" onclick="cerrar_modal_rendicion()" ><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal" onclick="cerrar_modal_rendicion()">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function cerrar_modal_rendicion(){
        $('#ver_rendicion').modal('hide');
    }
</script>