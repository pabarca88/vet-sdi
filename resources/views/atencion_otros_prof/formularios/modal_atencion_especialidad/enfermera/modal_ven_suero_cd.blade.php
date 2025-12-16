<div id="modal_ven_suero_cd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_ven_suero_cd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Tratamiento Suero - Via venosa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Suero / Medicamento</label>
                            <textarea class="caja-texto form-control form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="suero_med_cd" id="suero_med_cd"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Hora inicio</label>
                            <input type="time" class="caja-texto form-control form-control-sm" id="inicio_suero_ven_cd" name="">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Hora término</label>
                            <input type="time" class="caja-texto form-control form-control-sm" id="termino_suero_ven_cd" name="">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">cc / hora</label>
                            <input type="text" class="caja-texto form-control form-control-sm"  id="cc_hora_suero_ven_cd" name="">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Sitio de puncion</label>
                            <input type="text" class="caja-texto form-control form-control-sm" id="puncion_suero_ven_cd" name="puncion_suero_ven_cd">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="caja-texto form-control form-control-sm" rows="3"  onfocus="this.rows=6" onblur="this.rows=3;" name="obs_suero_ven_cd" id="obs_suero_ven_cd"></textarea>
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
    