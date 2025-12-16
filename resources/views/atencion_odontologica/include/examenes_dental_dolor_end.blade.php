
<div id="contenedor_pieza_dental_endodolor">
    <div id="pieza_dental_dolor_" class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-informacion">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Pieza N°</label>
                                <input type="text" class="form-control form-control-sm" name="end_numero_pieza{{ $counter }}" id="end_numero_pieza{{ $counter }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de Dolor</label>
                                    <select name="end_tipo_dolor{{ $counter }}" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="end_tipo_dolor{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_dolor{{ $counter }}','div_tipo_dolor{{ $counter }}','obs_tipo_dolor{{ $counter }}',3);">
                                        <option selected  value="1">Espontáneo</option>
                                        <option value="2">Provocado</option>
                                        <option value="3">Otro (Describir)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_tipo_dolor{{ $counter }}" style="display:none;">
                                    <label class="floating-label-activo-sm">Tipo de dolor</label>
                                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor{{ $counter }}" id="obs_tipo_dolor{{ $counter }}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Intensidad</label>
                                    <select name="end_intensidad{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="end_intensidad{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad{{ $counter }}','div_intensidad{{ $counter }}','obs_intensidad{{ $counter }}',4);">
                                        <option selected  value="1">Leve</option>
                                        <option value="2">Moderado</option>
                                        <option value="3">Intenso</option>
                                        <option value="4">Otro (Describir)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_intensidad{{ $counter }}" style="display:none;">
                                    <label class="floating-label-activo-sm">Intensidad</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad{{ $counter }}" id="obs_intensidad{{ $counter }}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Modo dolor</label>
                                    <select name="end_modo_dolor{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="end_modo_dolor{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor{{ $counter }}','div_modo_dolor{{ $counter }}','obs_modo_dolor{{ $counter }}',3);">
                                        <option selected  value="1">Pulsátil</option>
                                        <option value="2">Permanente</option>
                                        <option value="3">Otro describir</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_modo_dolor{{ $counter }}" style="display:none;">
                                    <label class="floating-label-activo-sm">Modo dolor</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor{{ $counter }}" id="obs_modo_dolor{{ $counter }}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Localización</label>
                                    <select name="end_loc_dolor{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="end_loc_dolor{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor{{ $counter }}','div_loc_dolor{{ $counter }}','obs_loc_dolor{{ $counter }}',3);">
                                        <option selected  value="1">Localizado</option>
                                        <option value="2">Referido</option>
                                        <option value="3">Otro (Describir)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_loc_dolor{{ $counter }}" style="display:none;">
                                    <label class="floating-label-activo-sm">Localización</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor{{ $counter }}" id="obs_loc_dolor{{ $counter }}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                    <select name="end_provocacion_dolor{{ $counter }}" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="end_provocacion_dolor{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor{{ $counter }}','div_provocacion_dolor','obs_provocacion_dolor',5);">
                                        <option selected  value="1">Frío</option>
                                        <option value="2">Calor</option>
                                        <option value="3">Actividad</option>
                                        <option value="4">Masticación</option>
                                        <option value="5">Otro (Describir)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_provocacion_dolor{{ $counter }}" style="display:none;">
                                    <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor{{ $counter }}" id="obs_provocacion_dolor{{ $counter }}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Cuando duele</label>
                                    <select name="end_cdo_duele{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="end_cdo_duele{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cdo_duele{{ $counter }}','div_cdo_duele','obs_cdo_duele',3);">
                                        <option selected  value="1">Palpación</option>
                                        <option value="2">Decubito</option>
                                        <option value="3">Otro (Describir)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_cdo_duele{{ $counter }}" style="display:none;">
                                    <label class="floating-label-activo-sm">Cuando duele</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cdo_duele{{ $counter }}" id="obs_cdo_duele{{ $counter }}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tpo Evolución</label>
                                    <select name="end_tpo_evolucion{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="end_tpo_evolucion{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_evolucion{{ $counter }}','div_tpo_evolucion','obs_tpo_evolucion',3);">
                                        <option selected  value="1">Menos de 1 Semana</option>
                                        <option value="2">Más de 1 Semana</option>
                                        <option value="3">Otro (Describir)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_tpo_evolucion{{ $counter }}" style="display:none;">
                                    <label class="floating-label-activo-sm">Tpo Evolución</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_evolucion{{ $counter }}" id="obs_tpo_evolucion{{ $counter }}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Efecto Analgésicos</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="end_obs_loc_dolor{{ $counter }}" id="end_obs_loc_dolor{{ $counter }}"></textarea>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card-footer">
                <button type="button" class="btn btn-icon btn-danger" onclick="ocultarExamenEnd({{ $counter }})"><i class="feather icon-x"></i></button>
                <button type="button" class="btn btn-icon btn-info btn-sm" onclick="guardar_pieza_dental_end({{ $counter }})"><i class="feather icon-save"></i></button>
                {{-- <button type="button" class="btn btn-icon btn-info" onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button> --}}
                <div>
            </div>
        </div>
    </div>
</div>
