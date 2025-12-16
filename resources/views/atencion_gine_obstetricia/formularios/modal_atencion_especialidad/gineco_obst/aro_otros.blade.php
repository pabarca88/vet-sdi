<div id="modal_aro_3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_aro_3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Otros</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">�</span></button>
            </div>
            <div class="modal-body">
                <form id="form_uso_personal">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Dirigido a</label>
                            <input type="text" class="form-control form-control-sm" name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Cargo</label>
                            <input type="person" class="form-control form-control-sm" name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Mensaje</label>
                            <textarea type="text" class="form-control form-control-sm" rows="12" name="mensaje" id="mensaje"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 text-center">
                        <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function Aro_otros() {
        $('#modal_aro_3').modal('show');
    }

</script>
