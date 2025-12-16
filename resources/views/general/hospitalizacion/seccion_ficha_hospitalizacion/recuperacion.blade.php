<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-3 shadow-none">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                <h6 class="f-20 text-c-blue">Sala de recuperación</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="evolucion-rec" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="info-ingreso-tab" data-toggle="tab" href="#info-ingreso" role="tab" aria-controls="info-ingreso"  aria-selected="true">Ingresar evolución</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="indicaciones-tab" data-toggle="tab" href="#indicaciones" role="tab" aria-controls="indicaciones" aria-selected="false">Resumen de evoluciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="cirugia-pab-tab" data-toggle="tab" href="#cirugia-pab" role="tab" aria-controls="cirugia-pab" aria-selected="false">Historia de evoluciones</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="evolucion-rec">
                            <!--INGRESAR EVOLUCION-->
                            <div class="tab-pane fade show active" id="info-ingreso" role="tabpanel"
                                aria-labelledby="info-ingreso-tab">
                                <form>
                                    <div class="row">
            <div class="col-md-2">
                <h6 class="t-aten">Evoluciones</h6>
            </div>
            <div class="col-md-10 float-right">
                <div class="btn-toolbar d-flex justify-content-end" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                        <button type="button" class="btn btn-info-light-c btn-sm"><i class="feather icon-plus"></i>Nueva evolución</button>
                    </div>
                </div>
            </div>
        </div>
                                  <div class="form-row">
                                        <div class="col-md-12">
                                            <p class="text-secondary">00-00-0000 00:00:00 hrs</p>
                                        </div>
                                        <div class="form-group col-md-12">

                                            <label class="floating-label-activo-sm">Evolución</label>
                                            <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--RESUMEN DE EVOLUCIONES-->
                            <div class="tab-pane fade show" id="indicaciones" role="tabpanel"
                                aria-labelledby="indicaciones-tab">
                                <form>
                                 <div class="form-row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control form-control-sm" rows="3" onfocus="this.rows=5" onblur="this.rows=4;"></textarea>
                                </div>
                            </div>
                                </form>
                            </div>
                             <!--HISTORIA DE EVOLUCION-->
                            <div class="tab-pane fade show" id="indicaciones" role="tabpanel"
                                aria-labelledby="indicaciones-tab">
                                <form>
                                 
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        @include('general.secciones_ficha.receta_examen.seccion_receta_examen_hosp')
                    </div>
                </div>
       
    </div>
</div>
