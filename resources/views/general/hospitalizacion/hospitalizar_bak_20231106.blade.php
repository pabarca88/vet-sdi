@if(isset($seccion_tipo) && $seccion_tipo != '')
<div class="tab-pane fade show" id="in-hosp{{ '-'.$seccion_tipo }}" role="tabpanel" aria-labelledby="in-hosp{{ '-'.$seccion_tipo }}-tab">
    @else
<div class="tab-pane fade show" id="in-hosp" role="tabpanel" aria-labelledby="in-hosp-tab">
@endif

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h6 class="t-aten-dos">Detalle hospitalización</h6>
        </div>
    </div>
    <div class="form-row">
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-group">
                <label class="floating-label-activo-sm">Hospitalizar en:</label>
                <select name="in_hosp_hospen" id="in_hosp_hospen" data-titulo="Hospitalización" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('in_hosp_hospen','in_hosp_div_detalle_hospen','in_hosp_obs_hospen',3);">
                    <option value="1" selected>Clínica</option>
                    <option value="2">Hospital</option>
                    <option value="3">Otro (Describir)</option>
                </select>
            </div>
            <div class="form-group" id="in_hosp_div_detalle_hospen" style="display:none">
                <label class="floating-label-activo-sm">Otro lugar <i>(Describir)</i></label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="in_hosp_obs_hospen" id="in_hosp_obs_hospen"></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-group">
                <label class="floating-label-activo-sm">Nombre de la institución</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="in_hosp_nom_inst" id="in_hosp_nom_inst"></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-group">
                <label class="floating-label-activo-sm">Servicio</label>
                <select name="in_hosp_hosp_enserv" id="in_hosp_hosp_enserv" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('in_hosp_hosp_enserv','in_hosp_div_detalle_hosp_enserv','in_hosp_obs_hosp_enserv',4);">
                    <option value="1" selected>Servicio Urgencia</option>
                    <option value="2">Sala</option>
                    <option value="3">UTI</option>
                    <option value="4">Otro</option>
                </select>
            </div>
            <div class="form-group" id="in_hosp_div_detalle_hosp_enserv" style="display:none">
                <label class="floating-label-activo-sm">Otro servicio <i>(Describir)</i></label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="in_hosp_obs_hosp_enserv" id="in_hosp_obs_hosp_enserv"></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="form-group">
                <label class="floating-label-activo-sm">Motivo</label>
                <select name="in_hosp_motivo_hosp" id="in_hosp_motivo_hosp" data-titulo="Otro Tratamiento" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('in_hosp_motivo_hosp','in_hosp_div_motivo_hosp','in_hosp_obs_motivo_hosp',5);">
                    <option value="1" selected>Cirugía</option>
                    <option value="2">Tratamiento Médico</option>
                    <option value="3">Estudio Clínico</option>
                    <option value="4">Observación</option>
                    <option value="5">Otro</option>
                </select>
            </div>
            <div class="form-group" id="in_hosp_div_motivo_hosp" style="display:none">
                <label class="floating-label-activo-sm">Otro tratamiento <i>(Describir)</i></label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="in_hosp_obs_motivo_hosp" id="in_hosp_obs_motivo_hosp"></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-12">
            <div class="form-group">
                <label class="floating-label-activo-sm">Observaciones a la hospitalización</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="in_hosp_obs_hospitalizar" id="in_hosp_obs_hospitalizar"></textarea>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="ingresohosp()";><i class="feather icon-file"></i> Orden de hospitalización </button>
        </div>
        <div class="form-group col-md-6">
            <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_pabellon()";><i class="feather icon-file"></i> Solicitar pabellón</button>
        </div>
    </div>
</div>
