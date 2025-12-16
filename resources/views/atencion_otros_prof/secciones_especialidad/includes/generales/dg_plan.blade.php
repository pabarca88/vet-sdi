<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="diagnostico">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left  card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                Diagnóstico y plan de tratamiento
            </button>
        </div>
        <div id="diagnostico_c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
            <div class="card-body-aten-a">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="floating-label-activo-sm"for="hipotesis">Hipótesis diagnóstica</label>
                        <input type="text" class="form-control form-control-sm"  data-input_igual="hipotesis_certificado,eno_diagnositico_confirmado" name="hipotesis" id="hipotesis" onchange="cargarIgual('hipotesis')">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="floating-label-activo-sm"for="indicaciones">Indicaciones</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="indicaciones" id="indicaciones"></textarea>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="floating-label-activo-sm"for="espect_pcte">Espectativas del paciente</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="espect_pcte" id="espect_pcte"></textarea>
                    </div>
                    <div class="form-group col-md-3">
                        <button type="button" class="btn btn-primary-light-c btn-block btn-sm " onclick="e_plan();"><i class="feather icon-plus"></i> Plan de tratamiento</button>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="alert alert-warning" role="alert">
                            Se añadió un plan de trataminto
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("atencion_otros_prof.secciones_especialidad.includes.generales.modals.planificacion")
