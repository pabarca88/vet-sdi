<div id="sensibilidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sensibilidad" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Examen de la sensibilidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p class="fecha-sm"><strong>Fecha del examen</strong> 
                                <script>
                                    var f = new Date();
                                    document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                 </script>
                             </p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                            <h6 class="t-aten">I.- Primaria</h6>
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="sens_prim">Examen</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="sens_prim" id="sens_prim"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                            <h6 class="t-aten">II.- Secundaria</h6>
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="sens_sec">Examen</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="sens_sec" id="sens_sec"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="t-aten">Conclusiones</h6>
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="sens_coment">Comentarios</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="sens_coment" id="sens_coment"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function sensibilidad() {
        $('#sensibilidad').modal('show');
    }
</script>
