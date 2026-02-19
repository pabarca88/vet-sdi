<!--Diagnóstico-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a " id="diagnostico">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                Diagnóstico e Indicaciones
            </button>
        </div>
        <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
            <div class="card-body-aten-a  shadow-none">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="descripcion_hipotesis">Diagnóstico</label>
                        <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado,eno_diagnositico_confirmado,diagnostico_cons,diag_endos_eda" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="descripcion_cie">Diagnóstico CIE-10</label>
                        <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,descripcion_cie_esp,eno_diagnostico_cie" name="descripcion_cie" id="descripcion_cie" value="" onchange="cargarIgual('descripcion_cie')">
                        <input type="hidden" class="form-control form-control-sm" data-input_igual="id_lic_descripcion_cie,id_descripcion_cie_esp,eno_id_diagnostico_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="" onchange="cargarIgual('id_descripcion_cie')">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="descripcion_hipotesis">Obs. Cínicas para recordar en consulta</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" name="obs_clinicas" id="obs_clinicas"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="indicaciones">Indicaciones</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" name="indicaciones" id="indicaciones"></textarea>
                    </div>
                    <div class=" col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3 pt-2">
                        <div class="custom-control custom-switch" >
                            <input type="checkbox" class="custom-control-input" id="motivo1"  data-toggle="collapse" data-target="#motivo1_c" aria-expanded="false" aria-controls="motivo1_c">
                            <label class="custom-control-label font-weight-bold text-c-blue" for="motivo1">Enviar indicación por email</label>
                        </div>
                    </div>
                    <div class=" col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3 pt-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="motivo2"  data-toggle="collapse" data-target="#motivo2_c" aria-expanded="false" aria-controls="motivo2_c">
                            <label class="custom-control-label font-weight-bold text-c-blue" for="motivo2">Imprimir indicaciones</label>
                        </div>
                    </div> 
                    <div class=" col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3">
                        <button type="button" class="btn btn-outline-purple btn-xs mt-1 btn-block"><i class="feather icon-calendar"></i> Agendar Próximo Control</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
