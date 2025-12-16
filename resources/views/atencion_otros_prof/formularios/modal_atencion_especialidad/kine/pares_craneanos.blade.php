<div id="pares" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="pares" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Evaluación pares craneanos</h5>
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
                            <label class="floating-label-activo-sm"for="pc_uno">I Olfatorio</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_uno" id="pc_uno"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="pc_dos">II Óptico</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_dos" id="pc_dos"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="pc_tres">III Oculo-Motor</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_tres" id="pc_tres"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="pc_cuatro">IV  Troclear</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_cuatro" id="pc_cuatro"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="pc_cinco">V  Trigémino</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_cinco" id="pc_cinco"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="pc_seis">VI  Abducente</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_seis" id="pc_seis"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="pc_siete">VII  Facial</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_siete" id="pc_siete"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="pc_ocho">VIII  Audítivo</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_ocho" id="pc_ocho"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm"for="pc_nueve">IX  Glosofaríngeo</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_nueve" id="pc_nueve"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="pc_diez">X  Vago</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_diez" id="pc_diez"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="pc_once">XI  Espinal (Accesorio)</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_once" id="pc_once"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="pc_doce">XII  Hipogloso</label>
                            <textarea class="form-control form-control-sm" placeholder="Describir examen" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="pc_doce" id="pc_doce"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-1">
                            <h6 class="t-aten">Conclusiones</h6>
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="pc_conclusiones">Comentarios</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="pc_conclusiones" id="pc_conclusiones"></textarea>
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
    function pares() {
        $('#pares').modal('show');
    }
</script>
