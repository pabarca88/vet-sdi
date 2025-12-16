<div id="func_global" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="func_global" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Funcionalidad global</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="fun-global" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="pos-baj-fg-tab" data-toggle="tab" href="#pos-baj-fg" role="tab" aria-controls="pos-baj-fg" aria-selected="true">Posiciones bajas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="pos-med-fg-tab" data-toggle="tab" href="#pos-med-fg" role="tab" aria-controls="pos-med-fg" aria-selected="false">Posiciones medias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="pos-alt-fg-tab" data-toggle="tab" href="#pos-alt-fg" role="tab" aria-controls="pos-alt-fg" aria-selected="false">Posiciones altas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="obs-con-fg-tab" data-toggle="tab" href="#obs-con-fg" role="tab" aria-controls="obs-con-fg" aria-selected="false">Observaciones y conclusiones</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="fun-global">
                            <!--POSICIONES BAJAS-->
                            <div class="tab-pane fade show active" id="pos-baj-fg" role="tabpanel" aria-labelledby="pos-baj-fg-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Posiciones bajas</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14"> Control de cabeza</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_cab">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_cab" id="cont_cab"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14"> Control de pelvis</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_pelvis">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_pelvis" id="cont_pelvis"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14">Giros</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_giros">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_giros" id="cont_giros"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14">Arrastre</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_arrastre">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_arrastre" id="cont_arrastre"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14">Reincorporación</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_reinc">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_reinc" id="cont_reinc"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14">Cuadrúpeda</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_cuad">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_cuad" id="cont_cuad"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--POSICIONES MEDIAS-->
                            <div class="tab-pane fade show" id="pos-med-fg" role="tabpanel" aria-labelledby="pos-med-fg-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Posiciones medias</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14"> Control de tronco</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_tronco">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_tronco" id="cont_tronco"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14">Sedestación</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_sedest">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_sedest" id="cont_sedest"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14">Transferencia</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_trans" >Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_trans" id="cont_trans"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--POSICIONES ALTAS-->
                            <div class="tab-pane fade show" id="pos-alt-fg" role="tabpanel" aria-labelledby="pos-alt-fg-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Posiciones altas</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14">Bipedestación</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_bipedest">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_bipedest" id="cont_bipedest"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14">Equilibrio</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_equil">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_equil" id="cont_equil"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                        <h6 class="mt-2 mb-2 f-14">Marcha</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                        <div class="form-group">
                                           <label class="floating-label-activo-sm" for="cont_marcha">Descripción</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_marcha" id="cont_marcha"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--OBSERVACIONES Y CONCLUSIONES-->
                            <div class="tab-pane fade show" id="obs-con-fg" role="tabpanel" aria-labelledby="obs-con-fg-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left">Observaciones y conclusiones</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                           <label class="floating-label-activo-sm" for="cont_coment">Comentarios</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cont_coment" id="cont_coment"></textarea>
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
    function func_global() {
        $('#func_global').modal('show');
    }
</script>
