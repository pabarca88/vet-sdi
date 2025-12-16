<div id="eva" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="eva" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Escala de EVA </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <h6 class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">Fecha del examen</h6>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">
                        <script>
                            var f = new Date();
                            document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                         </script>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group ">
                            <label class="floating-label-activo-sm">Evaluado por:</label>
                            <input type="text" class="form-control form-control-sm" name="resp_eva" id="resp_eva" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div id="grupo_musc">
                            <form >
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                        <div class="form-group fill">
                                            <img src="{{ asset('images/img_urgencia/e_eva.png') }}" style="width:80%">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group ">
                                            <label class="floating-label-activo-sm">Puntaje EVA</label>
                                            {{--  <input type="number" class="form-control form-control-sm" name="total_eva" id="total_eva">  --}}
                                            <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;" data-input_igual="total_e" name="total_eva" id="total_eva" onchange="cargarIgual('total_eva');">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="eval_est_mmgral">Observación y Recomendaciones</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="guardar_eva()" data-dismiss="modal"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function i_eva() {
        $('#eva').modal('show');
    }

    function guardar_eva(){
        let total_eva = $('#total_eva').val();
        $('#puntos_eva').val(total_eva);
    }

</script>
