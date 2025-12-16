<!--Signos vitales-->
<div id="formularios_signos_vitales" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100" data-width="300px" data-offset="true">
    <header class="bs-canvas-header p-3 bg-info overflow-auto">
        <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-light">&times;</span></button><h5 class="d-inline-block text-light mb-0 float-right mt-1">Formularios Signos Vitales</h5>
    </header>
    <div class="bs-canvas-content">
        <div class="accordion" id="accordionExample">
            <div class="card-sidebar mb-0 rounded-0">
                <div class="card-header-sidebar" id="headingOne">
                    <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i  class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        Temperatura Pulso
                    </button>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body-sidebar">
                        <br>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Tº</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Pulso</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Frec. Reposo</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_utilidades">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_utilidades" aria-expanded="false" aria-controls="collapse_utilidades"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        Estado Nutricional
                    </button>
                    </h2>
                </div>
                <div id="collapse_utilidades" class="collapse" aria-labelledby="heading_utilidades" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <br>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Peso</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Talla</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Imc</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Est. Nutricional</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_recom">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_recom" aria-expanded="false" aria-controls="collapse_recom"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        Presión Arterial
                    </button>
                    </h2>
                </div>
                <div id="collapse_recom" class="collapse" aria-labelledby="heading_recom" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <br>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">BI</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">BD</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Pié</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Sentado</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_hosp">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_hosp" aria-expanded="false" aria-controls="collapse_hosp"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                    Comunicación y Conciencia
                    </button>
                    </h2>
                </div>
                <div id="collapse_hosp" class="collapse" aria-labelledby="headinghospm" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <br>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conciencia</label>
                                        <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;" id="hosp_op_evol" name="hosp_op_evol"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Lenguaje</label>
                                        <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;" id="hosp_op_evol" name="hosp_op_evol"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Traslado</label>
                                        <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;" id="hosp_op_evol" name="hosp_op_evol"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
