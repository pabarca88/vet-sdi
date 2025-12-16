<div id="postura_mot_neuro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="postura_mot_neuro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_ofa">Examen Motor Postura y Marcha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="postura" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="pos-seg-sup-tab" data-toggle="tab" href="#pos-seg-sup" role="tab" aria-controls="pos-seg-sup" aria-selected="true">Seg. superior</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="pos-seg-med-tab" data-toggle="tab" href="#pos-seg-med" role="tab" aria-controls="pos-seg-med" aria-selected="false">Seg. medio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="pos-seg-inf-tab" data-toggle="tab" href="#pos-seg-inf" role="tab" aria-controls="pos-seg-inf" aria-selected="false">Seg. inferior</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="pos-pat-post-tab" data-toggle="tab" href="#pos-pat-post" role="tab" aria-controls="pos-pat-post" aria-selected="false">Patrón postural</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="post-pat-march-tab" data-toggle="tab" href="#post-pat-march" role="tab" aria-controls="post-pat-march" aria-selected="false">Patrón de marcha</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="postura">
                            <!--SEG.SUPERIOR-->
                            <div class="tab-pane fade show active" id="pos-seg-sup" role="tabpanel" aria-labelledby="pos-seg-sup-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Seg.Superior</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong>
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="ss_ant">Anterior</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ss_ant" id="ss_ant"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="ss_poster">Posterior</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ss_poster" id="ss_poster"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="ss_lat">Lateral</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ss_lat" id="ss_lat"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="ss_conc">Conclusiones</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ss_conc" id="ss_conc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--SEG.MEDIOS-->
                            <div class="tab-pane fade show" id="pos-seg-med" role="tabpanel" aria-labelledby="pos-seg-med-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Seg.Medios</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong>
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="sm_ant">Anterior</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sm_ant" id="sm_ant"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="sm_post">Posterior</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sm_post" id="sm_post"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="sm_lat">Lateral</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sm_lat" id="sm_lat"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="sm_conc">Conclusiones</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sm_conc" id="sm_conc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--SEG.INFERIOR-->
                            <div class="tab-pane fade show" id="pos-seg-inf" role="tabpanel" aria-labelledby="pos-seg-inf-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left">Seg.Inferior </h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong>
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="inf_ant">Anterior</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inf_ant" id="inf_ant"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="inf_post">Posterior</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inf_post" id="inf_post"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="inf_lat">Lateral</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inf_lat" id="inf_lat"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="inf_conc">Conclusiones</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inf_conc" id="inf_conc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--PATRÓN POSTURAL-->
                            <div class="tab-pane fade show" id="pos-pat-post" role="tabpanel" aria-labelledby="pos-pat-post-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Patrón Postural</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong>
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="post_eval">Evaluación</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="post_eval" id="post_eval"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--PATRÓN POSTURAL-->
                            <div class="tab-pane fade show" id="post-pat-march" role="tabpanel" aria-labelledby="post-pat-march-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Patrón de Marcha</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong>
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm" for="eval_gral_marcha">Evaluación</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="eval_gral_marcha" id="eval_gral_marcha"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function postural() {
        $('#postura_mot_neuro').modal('show');
    }
</script>
