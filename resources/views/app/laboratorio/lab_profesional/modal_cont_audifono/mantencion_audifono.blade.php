<!--datos Contacto-->
<div id="mantencion_audifono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mantencion_audifono" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Mantención Audífono</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">

                <div class="row info-basica" id="info-basica-1">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                            <div class="col-sm-7 my-auto ml-2" id="contacto_prof_rut"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Correo electrónico</label>
                            <div class="col-sm-7 my-auto ml-2" id="contacto_prof_email"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Teléfonos</label>
                            <div class="col-sm-7 my-auto ml-2" >
                                <ul>
                                    <li id="contacto_prof_telefono1"><span></span></li>
                                    <li id="contacto_prof_telefono2"><span></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
                            <div class="col-sm-7 my-auto ml-2" id="contacto_prof_direccion"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function mant_audif (){
        $('#mantencion_audifono').modal('show');
    }

</script>
