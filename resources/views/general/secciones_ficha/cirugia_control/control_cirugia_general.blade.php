<!-- control post qx -->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="Control_cirugia">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#cirugia_general_pc" aria-expanded="false" aria-controls="cirugia_general_pc">
                Control Post Quirúrgico
            </button>
        </div>
        <div id="cirugia_general_pc" class="collapse" aria-labelledby="cirugia_general" data-parent="#Control_cirugia">
            <div class="card-body-aten-a">
                <div id="form-cir_digest">
                    <!--<div class="form-row mb-2">
                        <div class="col-md-12">
                            <h5 style="text-align:center;">Control</h5>
                        </div>
                    </div>-->						
                    <div class="form-row">
                        <!-- ESTADO GENERAL -->
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 ">						 
                            <label class="floating-label-activo-sm" for="eg_cpq_cg">Estado General</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Estado General" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eg_cpq_cg" id="eg_cpq_cg"></textarea>
                        </div>
                        <!-- HERIDA OPERATORIA CURACIÓN -->
                       <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
                            <label class="floating-label-activo-sm" for="hoc_cpa_cg">Herida Operatoria Curación</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="ceg_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="hoc_cpa_cg" id="hoc_cpa_cg"></textarea>
                        </div>
                        <!-- MASAS PALPABLES -->
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
                            <label class="floating-label-activo-sm" for="masas_cpq_cg">Masas Palpables</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="masas_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="masas_cpq_cg" id="masas_cpq_cg"></textarea>
                        </div>
                        <!-- BOTONES MODAL -->
                        <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                           <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="no_disponible();"><i class="feather icon-file"></i> Ver Protocolo Cirugía</button>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                           <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="no_disponible();"><i class="feather icon-file"></i> Ver Epicrisis</button>
                        </div>
                    </div>
                    <!-- Observaciones Estado General Paciente -->
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Obs. Estado General Paciente</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Estado general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_egp_cpq_cg" id="obs_egp_cpq_cg"></textarea>
                        </div>
                    </div>
						
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cierre control post qx -->
