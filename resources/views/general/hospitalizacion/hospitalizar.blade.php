@if(isset($seccion_tipo) && $seccion_tipo != '')
<div class="tab-pane fade show" id="in-hosp{{ '-'.$seccion_tipo }}" role="tabpanel" aria-labelledby="in-hosp{{ '-'.$seccion_tipo }}-tab">
@else
<div class="tab-pane fade show" id="in-hosp" role="tabpanel" aria-labelledby="in-hosp-tab">
@endif

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h6 class="t-aten">Detalle hospitalización</h6>
        </div>
    </div>
    <div class="form-row">
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-group">
                <label class="floating-label-activo-sm">Hospitalizar en:</label>
                @if(isset($seccion_tipo) && $seccion_tipo != '')
                <select name="in_hosp_hospen{{ '_'.$seccion_tipo }}" id="in_hosp_hospen{{ '_'.$seccion_tipo }}" data-titulo="Hospitalización" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('in_hosp_hospen{{ '_'.$seccion_tipo }}','in_hosp_div_detalle_hospen{{ '_'.$seccion_tipo }}','in_hosp_obs_hospen{{ '_'.$seccion_tipo }}',3);">
                @else
                <select name="in_hosp_hospen" id="in_hosp_hospen" data-titulo="Hospitalización" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('in_hosp_hospen','in_hosp_div_detalle_hospen','in_hosp_obs_hospen',3);">
                @endif
                    <option value="1" selected>Clínica</option>
                    <option value="2">Hospital</option>
                    <option value="3">Otro (Describir)</option>
                </select>
            </div>
            @if(isset($seccion_tipo) && $seccion_tipo != '')
            <div class="form-group" id="in_hosp_div_detalle_hospen{{ '_'.$seccion_tipo }}" style="display:none">
            @else
            <div class="form-group" id="in_hosp_div_detalle_hospen" style="display:none">
            @endif
                <label class="floating-label-activo-sm">Otro lugar (Describir)</label>
                @if(isset($seccion_tipo) && $seccion_tipo != '')
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. ¿Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="in_hosp_obs_hospen{{ '_'.$seccion_tipo }}" id="in_hosp_obs_hospen{{ '_'.$seccion_tipo }}"></textarea>
                @else
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. ¿Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="in_hosp_obs_hospen" id="in_hosp_obs_hospen"></textarea>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-group">
                <label class="floating-label-activo-sm">Nombre de la institución</label>
                @if(isset($seccion_tipo) && $seccion_tipo != '')
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="in_hosp_nom_inst{{ '_'.$seccion_tipo }}" id="in_hosp_nom_inst{{ '_'.$seccion_tipo }}"></textarea>
                @else
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="in_hosp_nom_inst" id="in_hosp_nom_inst"></textarea>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-group">
                <label class="floating-label-activo-sm">Servicio</label>
                @if(isset($seccion_tipo) && $seccion_tipo != '')
                <select name="in_hosp_hosp_enserv{{ '_'.$seccion_tipo }}" id="in_hosp_hosp_enserv{{ '_'.$seccion_tipo }}" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('in_hosp_hosp_enserv{{ '_'.$seccion_tipo }}','in_hosp_div_detalle_hosp_enserv{{ '_'.$seccion_tipo }}','in_hosp_obs_hosp_enserv{{ '_'.$seccion_tipo }}',4);">
                @else
                <select name="in_hosp_hosp_enserv" id="in_hosp_hosp_enserv" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('in_hosp_hosp_enserv','in_hosp_div_detalle_hosp_enserv','in_hosp_obs_hosp_enserv',4);">
                @endif
                    <option value="1" selected>Servicio Urgencia</option>
                    <option value="2">Sala</option>
                    <option value="3">UTI</option>
                    <option value="4">Otro</option>
                </select>
            </div>
            @if(isset($seccion_tipo) && $seccion_tipo != '')
            <div class="form-group" id="in_hosp_div_detalle_hosp_enserv{{ '_'.$seccion_tipo }}" style="display:none">
            @else
            <div class="form-group" id="in_hosp_div_detalle_hosp_enserv" style="display:none">
            @endif
                <label class="floating-label-activo-sm">Otro servicio (Describir)</label>
                @if(isset($seccion_tipo) && $seccion_tipo != '')
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="in_hosp_obs_hosp_enserv{{ '_'.$seccion_tipo }}" id="in_hosp_obs_hosp_enserv{{ '_'.$seccion_tipo }}"></textarea>
                @else
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="in_hosp_obs_hosp_enserv" id="in_hosp_obs_hosp_enserv"></textarea>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="form-group">
                <label class="floating-label-activo-sm">Motivo</label>
                @if(isset($seccion_tipo) && $seccion_tipo != '')
                <select name="in_hosp_motivo_hosp{{ '_'.$seccion_tipo }}" id="in_hosp_motivo_hosp{{ '_'.$seccion_tipo }}" data-titulo="Otro Tratamiento" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('in_hosp_motivo_hosp{{ '_'.$seccion_tipo }}','in_hosp_div_motivo_hosp{{ '_'.$seccion_tipo }}','in_hosp_obs_motivo_hosp{{ '_'.$seccion_tipo }}',5);">
                @else
                <select name="in_hosp_motivo_hosp" id="in_hosp_motivo_hosp" data-titulo="Otro Tratamiento" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('in_hosp_motivo_hosp','in_hosp_div_motivo_hosp','in_hosp_obs_motivo_hosp',5);">
                @endif
                    <option value="1" selected>Cirugía</option>
                    <option value="2">Tratamiento Médico</option>
                    <option value="3">Estudio Clínico</option>
                    <option value="4">Observación</option>
                    <option value="5">Otro</option>
                </select>
            </div>
            @if(isset($seccion_tipo) && $seccion_tipo != '')
            <div class="form-group" id="in_hosp_div_motivo_hosp{{ '_'.$seccion_tipo }}" style="display:none">
            @else
            <div class="form-group" id="in_hosp_div_motivo_hosp" style="display:none">
            @endif
                <label class="floating-label-activo-sm">Otro tratamiento (Describir)</label>
                @if(isset($seccion_tipo) && $seccion_tipo != '')
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="in_hosp_obs_motivo_hosp{{ '_'.$seccion_tipo }}" id="in_hosp_obs_motivo_hosp{{ '_'.$seccion_tipo }}"></textarea>
                @else
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="in_hosp_obs_motivo_hosp" id="in_hosp_obs_motivo_hosp"></textarea>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-12">
            <div class="form-group">
                <label class="floating-label-activo-sm">Observaciones a la hospitalización</label>
                @if(isset($seccion_tipo) && $seccion_tipo != '')
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="in_hosp_obs_hospitalizar{{ '_'.$seccion_tipo }}" id="in_hosp_obs_hospitalizar{{ '_'.$seccion_tipo }}"></textarea>
                @else
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="in_hosp_obs_hospitalizar" id="in_hosp_obs_hospitalizar"></textarea>
                @endif
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            @if(isset($seccion_tipo) && $seccion_tipo != '')
            <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="ingresohosp('{{ '_'.$seccion_tipo }}')";><i class="feather icon-edit-1"></i> Orden de hospitalización </button>
            @else
            <button type="button" class="btn btn-outline-primary btn-xs btn-block" onclick="ingresohosp('')";><i class="feather icon-edit-1"></i> Orden de hospitalización </button>
            @endif
        </div>
        <div class="form-group col-md-6">
            <button type="button" class="btn btn-outline-primary btn-xs btn-block" onclick="sol_pabellon()";><i class="feather icon-edit-1"></i> Solicitar pabellón</button>
        </div>
    </div>
</div>
