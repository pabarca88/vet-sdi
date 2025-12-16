<!--EVOLUCION-->
<div class="row">
    <div class="col-md-12 mt-2 mb-0">
        <h6 class="f-20 text-c-blue mb-2">Evolución</h6>
    </div>
</div>
<!--FORMULARIOS-->
<div class="row">
    <!--MOTIVO CONSULTA-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header-a" id="mot-consulta-ev">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left" type="button" data-toggle="collapse" data-target="#mot-consulta-ev-c" aria-expanded="false" aria-controls="mot-consulta-ev-c">
                Motivo de la consulta
                </button>
            </div>
            <div id="mot-consulta-ev-c" class="collapse show" aria-labelledby="mot-consulta-ev" data-parent="#mot-consulta-ev">
                <div class="card-body-aten-a">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="dg_ingreso">Diagnóstico de Ingreso</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header-a" id="eval-actual">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#eval-actual-c" aria-expanded="false" aria-controls="eval-actual-c">
                Evaluación actual
                </button>
            </div>
            <div id="eval-actual-c" class="collapse show" aria-labelledby="eval-actual" data-parent="#eval-actual">
                <div class="card-body-aten-a">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="evaluacion_control">Evaluación actual</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="evaluacion_control" id="evaluacion_control"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--PLAN PROPUESTO-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header-a" id="plan">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#plan-c" aria-expanded="false" aria-controls="plan-c">
                Plan propuesto
                </button>
            </div>
            <div id="plan-c" class="collapse show" aria-labelledby="plan" data-parent="#plan">
                <div class="card-body-aten-a">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="plan_prop_evol">Plan propuesto</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="plan_prop_evol" id="plan_prop_evol"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--RESULTADOS-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header-a" id="mot-consulta">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                Resultados
                </button>
            </div>
            <div id="mot-consulta-c" class="collapse show" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                <div class="card-body-aten-a">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label class="floating-label-activo-sm"for="sesion_n_dex" >Nº Sesión</label>
                            <input type="number" class="form-control form-control-sm" name="sesion_n_dex" id="sesion_n_dex">
                        </div>
                        <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                            <label class="floating-label-activo-sm"for="evol_result" >Resultados</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="evol_result" id="evol_result"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--indic y próximo control-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header-a" id="ind_prox_control">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ind_prox_control-c" aria-expanded="false" aria-controls="ind_prox_control-c">
                Indicaciones y Próximo Control
                </button>
            </div>
            <div id="ind_prox_control-c" class="collapse show" aria-labelledby="ind_prox_control" data-parent="#ind_prox_control">
                <div class="card-body-aten-a">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label class="floating-label-activo-sm" for="prox_control" >Próximo Control</label>
                            <input type="date" class="form-control form-control-sm" name="prox_control" id="prox_control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="evol_indicaciones">Indicaciones</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="evol_indicaciones" id="evol_indicaciones"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
        <button type="button" class="btn btn-info"><i class="feather icon-save"></i> Guardar evolución</button>
    </div>
</div>
