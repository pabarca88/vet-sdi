<div id="fuerza_inf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fuerza_inf" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Evaluación fuerza extremidad inferior</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ex-inferior" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="cadera-fuerza-inf-tab" data-toggle="tab" href="#cadera-fuerza-inf" role="tab" aria-controls="cadera-fuerza-inf" aria-selected="true">Art. Cadera</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="rodilla-fuerza-inf-tab" data-toggle="tab" href="#rodilla-fuerza-inf" role="tab" aria-controls="rodilla-fuerza-inf" aria-selected="false">Art. Rodilla</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="tobillo-fuerza-inf-tab" data-toggle="tab" href="#tobillo-fuerza-inf" role="tab" aria-controls="tobillo-fuerza-inf" aria-selected="false">Art. Tobillo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="pie-fuerza-inf-tab" data-toggle="tab" href="#pie-fuerza-inf" role="tab" aria-controls="pie-fuerza-inf" aria-selected="false">Art. Del pié</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="dedos-fuerza-inf-tab" data-toggle="tab" href="#dedos-fuerza-inf" role="tab" aria-controls="dedos-fuerza-inf" aria-selected="false">Dedos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="prueba-barre-fuerza-inf-tab" data-toggle="tab" href="#prueba-barre-fuerza-inf" role="tab" aria-controls="prueba-barre-fuerza-inf" aria-selected="false">Prueba de Barré</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="obs-conclusiones-fuerza-inf-tab" data-toggle="tab" href="#obs-conclusiones-fuerza-inf" role="tab" aria-controls="obs-conclusiones-fuerza-inf" aria-selected="false">Observaciones y Conclusiones</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ex-inferior">
                            <!--ART.CADERA-->
                            <div class="tab-pane fade show active" id="cadera-fuerza-inf" role="tabpanel" aria-labelledby="cadera-fuerza-inf-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> ARTICULACIONES CADERA</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                     </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="acad_flex_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="acad_flex_d" id="acad_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="acad_flex_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="acad_flex_i" id="acad_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="acad_exten_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="acad_exten_d" id="acad_exten_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="acad_exten_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="acad_exten_i" id="acad_exten_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="acad_abd_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="acad_abd_d" id="acad_abd_d"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="acad_abd_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="acad_abd_i" id="acad_abd_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="acad_aduc_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="acad_aduc_d" id="acad_aduc_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="acad_aduc_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="acad_aduc_i" id="acad_aduc_i"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                      <label class="floating-label-activo-sm" for="acad_obs">Obs. Articulación</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="acad_obs" id="acad_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--ART.RODILLA-->
                            <div class="tab-pane fade show" id="rodilla-fuerza-inf" role="tabpanel" aria-labelledby="rodilla-fuerza-inf-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> ARTICULACIONES RODILLA</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                     </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="arod_flex_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arod_flex_d" id="arod_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="arod_flex_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arod_flex_i" id="arod_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="arod_exten_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arod_exten_d" id="arod_exten_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="arod_exten_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arod_exten_i" id="arod_exten_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="arod_abd_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arod_abd_d" id="arod_abd_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="arod_abd_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arod_abd_i" id="arod_abd_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="arod_aduc_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arod_aduc_d" id="arod_aduc_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="arod_aduc_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arod_aduc_i" id="arod_aduc_i"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm" for="arod_obs">Obs. Articulación</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arod_obs" id="arod_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--ART.TOBILLO-->
                            <div class="tab-pane fade show" id="tobillo-fuerza-inf" role="tabpanel" aria-labelledby="tobillo-fuerza-inf-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> ARTICULACION TOBILLO</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                     </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">                               
                                           <label class="floating-label-activo-sm" for="atob_flex_d">Derecha</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="atob_flex_d" id="atob_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">                               
                                           <label class="floating-label-activo-sm" for="atob_flex_i">Izquierda</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="atob_flex_i" id="atob_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">                         
                                       <label class="floating-label-activo-sm" for="atob_exten_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="atob_exten_d" id="atob_exten_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">                         
                                       <label class="floating-label-activo-sm" for="atob_exten_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="atob_exten_i" id="atob_exten_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">                         
                                       <label class="floating-label-activo-sm" for="atob_abd_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="atob_abd_d" id="atob_abd_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">                                        
                                       <label class="floating-label-activo-sm" for="atob_abd_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="atob_abd_i" id="atob_abd_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5"> 
                                       <label class="floating-label-activo-sm" for="atob_aduc_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="atob_aduc_d" id="katob_aduc_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="atob_aduc_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="atob_aduc_i" id="atob_aduc_i"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm" for="atob_obs">Obs. Articulación</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="atob_obs" id="atob_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--ART.DEL PIÉ-->
                            <div class="tab-pane fade show" id="pie-fuerza-inf" role="tabpanel" aria-labelledby="pie-fuerza-inf-tab">
                                <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                    <h6 class="t-aten d-inline float-left"> ARTICULACIONES PIÉ</h6>
                                    <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                        <script>
                                            var f = new Date();
                                            document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                         </script>
                                     </p>
                                 </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="apie_flex_d" >Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="apie_flex_d" id="apie_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="apie_flex_i" >Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="apie_flex_i" id="apie_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="apie_exten_d" >Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="apie_exten_d" id="apie_exten_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="apie_exten_i" >Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="apie_exten_i" id="apie_exten_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                         <label class="floating-label-activo-sm" for="apie_abd_d" >Derecha</label>
                                         <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="apie_abd_d" id="apie_abd_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="apie_abd_i" >Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="apie_abd_i" id="apie_abd_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="apie_aduc_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="apie_aduc_d" id="apie_aduc_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm"for="apie_aduc_i" >Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="apie_aduc_i" id="apie_aduc_i"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="apie_obs">Obs. Articulación</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="apie_obs" id="apie_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--ART.DEL DEDOS-->
                            <div class="tab-pane fade show" id="dedos-fuerza-inf" role="tabpanel" aria-labelledby="dedos-fuerza-inf-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> ARTICULACIÓN DEDOS</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                     </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="aded_flex_d">Derecha</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_flex_d" id="aded_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="aded_flex_i">Izquierda</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_flex_i" id="aded_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="aded_exten_d">Derecha</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_exten_d" id="aded_exten_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="aded_exten_i">Izquierda</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_exten_i" id="aded_exten_i"></textarea>
                                    </div>
                                   <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="aded_abd_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_abd_d" id="aded_abd_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="aded_abd_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_abd_i" id="aded_abd_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="aded_aduc_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_aduc_d" id="aded_aduc_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="aded_aduc_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_aduc_i" id="aded_aduc_i"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm" for="aded_obs">Obs. Articulación</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_obs" id="aded_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--PRUEBA BARRE-->
                            <div class="tab-pane fade show" id="prueba-barre-fuerza-inf" role="tabpanel" aria-labelledby="prueba-barre-fuerza-inf-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> PRUEBA DE BARRÉ</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                     </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm" for="extinf_barre">Comentarios</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="extinf_barre" id="extinf_barre"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--OBSERVACIONES Y CONCLUSIONES-->
                            <div class="tab-pane fade show" id="obs-conclusiones-fuerza-inf" role="tabpanel" aria-labelledby="obs-conclusiones-fuerza-inf-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> OBSERVACIONES Y CONCLUSIONES</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm" for="extinf_coment">Comentarios</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="extinf_coment" id="extinf_coment"></textarea>
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
    function fuerza_inf() {
        $('#fuerza_inf').modal('show');
    }
</script>
