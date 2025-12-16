<!--datos Contacto-->
<div id="control_aud_audio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cal_audifono" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Audiometria Control Audífono</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">

                <div class="row info-basica" id="info-basica-1">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Fecha</label>
                            <div class="col-sm-7 my-auto ml-2" id="fecha_audiometria"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Audiometría</label>
                            <div class="col-sm-12 my-auto ml-2" id="audiom_control"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function aud_cont_audif (){
        $('#control_aud_audio').modal('show');
    }

</script>
