<div id="prest_lab_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="prest_lab_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Solicitudes de laboratorio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_proc" id="fecha_proc">
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Prestación</label>
                                <select class="form-control form-control-sm" id="" name="">
                                    <option value="-1">Seleccione tratamiento</option>
                                    <option value="#">Protesis removible de acrilico</option>
                                    <option value="#">Corona libre de metal</option><!--de acuerdo a los procedimientos cargados en el presupuesto-->
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Comentarios</label>
                                <textarea type="text" class="form-control form-control-sm" name="caras" id="caras"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success btn-sm btn-block"> Añadir solicitud</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-sm btn-info"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function prest_lab() {
        $('#prest_lab_modal').modal('show');
    }
</script>
