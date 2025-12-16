<div id="fuerza_sup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fuerza_sup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Evaluación fuerza extremidad superior</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ex-fuerza-sup" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="cintura-fuerza-tab" data-toggle="tab" href="#cintura-fuerza" role="tab" aria-controls="cintura-fuerza" aria-selected="true">Art. Cintura escapular</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="hombro-fuerza-tab" data-toggle="tab" href="#hombro-fuerza" role="tab" aria-controls="hombro-fuerza" aria-selected="false">Art. Hombro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="codo-fuerza-tab" data-toggle="tab" href="#codo-fuerza" role="tab" aria-controls="codo-fuerza" aria-selected="false">Codo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="racu-distal-fuerza-tab" data-toggle="tab" href="#racu-distal-fuerza" role="tab" aria-controls="racu-distal-fuerza" aria-selected="false">Art. Radio-Cubital Distal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="muneca-fuerza-tab" data-toggle="tab" href="#muneca-fuerza" role="tab" aria-controls="muneca-fuerza" aria-selected="false">Art. Muñeca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="dedos-fuerza-tab" data-toggle="tab" href="#dedos-fuerza" role="tab" aria-controls="dedos-fuerza" aria-selected="false">Dedos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="prueba-minig-fuerza-tab" data-toggle="tab" href="#prueba-minig-fuerza" role="tab" aria-controls="prueba-minig-fuerza" aria-selected="false">Prueba de Mingazzini</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="obs-conclusiones-fuerza-tab" data-toggle="tab" href="#obs-conclusiones-fuerza" role="tab" aria-controls="obs-conclusiones-fuerza" aria-selected="false">Observaciones y Conclusiones</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ex-fuerza-sup">
                            <!--ART. CINTURA ESCAPULAR-->
                            <div class="tab-pane fade show active" id="cintura-fuerza" role="tabpanel" aria-labelledby="cintura-fuerza-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Articulaciones Cintura Escapular</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="ace_flex_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ace_flex_d" id="ace_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="ace_flex_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ace_flex_i" id="ace_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="ace_exten_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ace_exten_d" id="ace_exten_d"></textarea>
                                    </div>   
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">                                
                                       <label class="floating-label-activo-sm" for="ace_exten_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ace_exten_i" id="ace_exten_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">                                    
                                       <label class="floating-label-activo-sm" for="ace_abd_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ace_abd_d" id="ace_abd_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">                                    
                                       <label class="floating-label-activo-sm" for="ace_abd_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ace_abd_i" id="ace_abd_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">                                    
                                       <label class="floating-label-activo-sm" for="ace_aduc_d" >Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ace_aduc_d" id="ace_aduc_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">                                    
                                       <label class="floating-label-activo-sm" for="ace_aduc_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ace_aduc_i" id="ace_aduc_i"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm" for="ace_obs">Obs. Articulación</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ace_obs" id="ace_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--ART.HOMBRO-->
                            <div class="tab-pane fade show" id="hombro-fuerza" role="tabpanel" aria-labelledby="hombro-fuerza-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Articulaciones Hombro</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="ah_flex_d">Derecha</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ah_flex_d" id="ah_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="ah_flex_i">Izquierda</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ah_flex_i" id="ah_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm"  for="ah_ext_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ah_ext_d" id="ah_ext_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="ah_ext_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ah_ext_i" id="ah_ext_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm"  for="ah_abd_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ah_abd_d" id="ah_abd_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="ah_abd_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ah_abd_i" id="ah_abd_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="ah_aduc_d">Derecha</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ah_aduc_d" id="ah_aduc_d"></textarea>
                                    </div>
                                   <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                       <label class="floating-label-activo-sm" for="ah_aduc_i">Izquierda</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ah_aduc_i" id="ah_aduc_i"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="ah_obs">Obs. Articulación</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ah_obs" id="ah_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--ART.CODO-->
                            <div class="tab-pane fade show" id="codo-fuerza" role="tabpanel" aria-labelledby="codo-fuerza-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Articulaciones Codo</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                   <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="ac_flex_d">Derecha</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ac_flex_d" id="ac_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="ac_flex_i">Izquierda</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ac_flex_i" id="ac_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="ac_ext_d">Derecha</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ac_ext_d" id="ac_ext_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="ac_ext_i">Izquierda</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ac_ext_i" id="ac_ext_i"></textarea>
                                    </div>
                                   <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="ac_abd_d">Derecha</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ac_abd_d" id="ac_abd_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="ac_abd_i">Izquierda</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ac_abd_i" id="ac_abd_i"></textarea>
                                    </div>
                                   <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="ac_aduc_d">Derecha</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ac_aduc_d" id="ac_aduc_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="ac_aduc_i">Izquierda</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ac_aduc_i" id="ac_aduc_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                           <label class="floating-label-activo-sm" for="ac_obs">Obs. Articulación</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ac_obs" id="ac_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--ART.RADIO-CUBITAL DISTAL-->
                            <div class="tab-pane fade show" id="racu-distal-fuerza" role="tabpanel" aria-labelledby="racu-distal-fuerza-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Articulaciones Radio-Cubital DIstal</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                   <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="arcd_flex_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arcd_flex_d" id="arcd_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="arcd_flex_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arcd_flex_i" id="arcd_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="arcd_ext_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arcd_ext_d" id="arcd_ext_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="arcd_ext_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arcd_ext_i" id="arcd_ext_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="arcd_abd_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arcd_abd_d" id="arcd_abd_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="arcd_abd_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arcd_abd_i" id="arcd_abd_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="arcd_aduc_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arcd_aduc_d" id="arcd_aduc_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="arcd_aduc_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arcd_aduc_i" id="arcd_aduc_i"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="arcd_obs">Obs. Articulación</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arcd_obs" id="arcd_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--ART. MUÑECA-->
                            <div class="tab-pane fade show" id="muneca-fuerza" role="tabpanel" aria-labelledby="muneca-fuerza-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Articulaciones Muñeca</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="amu_flex_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="amu_flex_d" id="amu_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="amu_flex_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="amu_flex_i" id="amu_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="amu_ext_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="amu_ext_d" id="amu_ext_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                           <label class="floating-label-activo-sm" for="amu_ext_i">Izquierda</label>
                                           <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="amu_ext_i" id="amu_ext_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="amu_abd_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="amu_abd_d" id="amu_abd_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="amu_abd_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="amu_abd_i" id="amu_abd_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="amu_aduc_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="amu_aduc_d" id="amu_aduc_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="amu_aduc_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="amu_aduc_i" id="amu_aduc_i"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="amu_obs">Obs. Articulación</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="amu_obs" id="amu_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--ART.DEL DEDOS-->
                            <div class="tab-pane fade show" id="dedos-fuerza" role="tabpanel" aria-labelledby="dedos-fuerza-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> Articulacion del dedo</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Flexión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="aded_flex_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_flex_d" id="aded_flex_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="aded_flex_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_flex_i" id="aded_flex_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Extensión</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="aded_ext_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_ext_d" id="aded_ext_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="aded_ext_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_ext_i" id="aded_ext_i"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14">Abducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="aded_abd_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_abd_d" id="aded_abd_d"></textarea>                                    
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="aded_abd_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_abd_i" id="aded_abd_i"></textarea>                                    
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <h6 class="mt-2 mb-2 f-14"> Aducción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="aded_aduc_d">Derecha</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_aduc_d" id="aded_aduc_d"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <label class="floating-label-activo-sm" for="aded_aduc_i">Izquierda</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_aduc_i" id="aded_aduc_i"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="aded_obs">Obs. Articulación</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="aded_obs" id="aded_obs"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--PRUEBA MINGAZZINI-->
                            <div class="tab-pane fade show" id="prueba-minig-fuerza" role="tabpanel" aria-labelledby="prueba-minig-fuerza-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="t-aten d-inline float-left"> PRUEBA DE MINGAZZINI</h6>
                                        <p class="fecha-sm d-inline float-right"><strong>Fecha del examen</strong> 
                                            <script>
                                                var f = new Date();
                                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                             </script>
                                         </p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm" for="minga">Prueba de Mingazzini</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="minga" id="minga"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--OBSERVACIONES Y CONCLUSIONES-->
                            <div class="tab-pane fade show" id="obs-conclusiones-fuerza" role="tabpanel" aria-labelledby="obs-conclusiones-fuerza-tab">
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
                                        <label class="floating-label-activo-sm" for="extsup_coment">Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="extsup_coment" id="extsup_coment"></textarea>
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
    function fuerza_sup() {
        $('#fuerza_sup').modal('show');
    }
</script>
