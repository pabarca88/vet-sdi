<div id="modal_uso_personal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_uso_personal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Uso Personal</h5>
                <button type="button" class="close text-white"  data-dismiss="modal" aria-label="Close" onclick="$('#modal_uso_personal').modal('hide')"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_uso_personal">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Dirigido a</label>
                            <input type="text" class="form-control form-control-sm" name="uso_personal_dirigido_a" id="uso_personal_dirigido_a">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Cargo</label>
                            <input type="person" class="form-control form-control-sm" name="uso_personal_cargo" id="uso_personal_cargo">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Mensaje</label>
                            <textarea type="text" class="form-control form-control-sm" rows="12" name="uso_personal_mensaje" id="uso_personal_mensaje"></textarea>
                        </div>
                    </div>
                    {{--  <div class="form-row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                        </div>
                    </div>  --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_uso_personal').modal('hide')"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" onclick="registrar_uso_personal();" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
