<div id="p_diab" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="p_diab" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Aspecto Pié Diabético</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div id="grupo_musc">
                            <form>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group fill">
                                            <img src="{{ asset('images/img_urgencia/asp_pie_diab.png') }}" style="width:80%">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function p_diab() {
        $('#p_diab').modal('show');
    }
</script>
