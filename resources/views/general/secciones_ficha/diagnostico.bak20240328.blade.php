<!--Diagnóstico-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a " id="diagnostico">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                Diagnóstico
            </button>
        </div>
        <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
            <div class="card-body-aten-a  shadow-none">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="descripcion_hipotesis">Hipótesis diagnóstica</label>
                        <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado,eno_diagnositico_confirmado" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="descripcion_cie">Diagnóstico CIE-10</label>
                        <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,descripcion_cie_esp,eno_diagnostico_cie" name="descripcion_cie" id="descripcion_cie" value="" onchange="cargarIgual('descripcion_cie')">
                        <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,id_descripcion_cie_esp,eno_id_diagnostico_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="" onchange="cargarIgual('id_descripcion_cie')">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm" for="indicaciones">Indicaciones</label>
                        <input type="text" class="form-control form-control-sm" name="indicaciones" id="indicaciones">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
