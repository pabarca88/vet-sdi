<div id="plan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="plan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Planificación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <div id="planificacion" class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono">Tratamiento Planificado</h6>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-3 mt-2">
                            <label class="floating-label-activo-sm" for='plan_fec_inicio_tto'>Fecha Inicio Tratamiento</label>
                            <input type="date" class="form-control form-control-sm" name="plan_fec_inicio_tto" id="plan_fec_inicio_tto">
                        </div>
                        <div class="col-sm-6 mt-2">
                            <label class="floating-label-activo-sm" for='plan_dg_ingreso'>Diagnósticos</label>
                            <input type="text" class="form-control form-control-sm" name="plan_dg_ingreso" id="plan_dg_ingreso">
                        </div>
                        <div class="col-sm-3 mt-2">
                            <label  class="floating-label-activo-sm" for='plan_n_sesiones'>Número de Sesiones</label>
                            <input type="text" class="form-control form-control-sm" name="plan_n_sesiones" id="plan_n_sesiones">
                        </div>
                    </div>

                        <hr>
                    <div class="form-row">

                        <div class="col-sm-12 mt-2">
                            <label  class="floating-label-activo-sm" for='obj'>Objetivos</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obj" id="obj"></textarea>
                        </div>
                        <br>
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
    function e_plan() {
        $('#plan').modal('show');
    }
</script>
