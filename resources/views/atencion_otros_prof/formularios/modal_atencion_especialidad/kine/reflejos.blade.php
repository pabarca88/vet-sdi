<div id="reflejos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="reflejos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Evaluación Reflejos Osteotendineos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                            <p class="fecha-sm"><strong>Fecha del examen</strong> 
                                <script>
                                    var f = new Date();
                                    document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                 </script>
                             </p>
                        </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ref_bicip">I  Bicipital</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ref_bicip" id="ref_bicip"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ref_tricip">II  Tricipital</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ref_tricip" id="ref_tricip"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ref_est_rad">III  Estilo-radial</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ref_est_rad" id="ref_est_rad"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ref_rot">IV  Rotuliano</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ref_rot" id="ref_rot"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm"  for="ref_aquil">V  Aquiliano</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ref_aquil" id="ref_aquil"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm"  for="ref_cut">VI  Cutáneo</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ref_cut" id="ref_cut"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm"  for="ref_cut_abd">VII  Cutáneo Abdominal</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ref_cut_abd" id="ref_cut_abd"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm"  for="ref_cremast">VIII  Cremasteriano</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ref_cremast" id="ref_cremast"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm"  for="ref_plant">IX  Plantar</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ref_plant" id="ref_plant"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-1">
                            <h6 class="mb-3">Reflejos patológicos</h6>
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="ref_pat">Examen</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ref_pat" id="ref_pat"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-1">
                            <h6 class="mb-3">Conclusiones</h6>
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="ref_concl">Comentarios</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ref_concl" id="ref_concl"></textarea>
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
    function reflejos() {
        $('#reflejos').modal('show');
    }
</script>
