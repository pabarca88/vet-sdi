<div id="plan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="plan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Plan de tratamiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div id="planificacion">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Fecha Inicio Tto.</label>
                                <input type="date" class="form-control form-control-sm" name="fec_inicio_tto" id="fec_inicio_tto">
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">Diagnóstico</label>
                                <input type="text" class="form-control form-control-sm" name="dg_ingreso" id="dg_ingreso">
                            </div>
                            <div class="col-sm-12 col-md-4 col-xl-3 col-xl-3">
                                <label class="floating-label-activo-sm">Día y Hora de Tto.</label>
                                <input type="datetime" class="form-control form-control-sm" name="dia_de_tto" id="dia_de_tto">
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Número de Sesiones</label>
                                <input type="text" class="form-control form-control-sm" name="nim_sesion" id="nim_sesion">
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                <label class="floating-label-activo-sm">Objetivos</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obj" id="obj"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm " data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="submit" class="btn btn-info-light-c btn-sm "><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function e_plan() {
        $('#plan').modal('show');
    }
</script>
