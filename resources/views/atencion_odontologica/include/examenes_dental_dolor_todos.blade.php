@php $count = 1; @endphp
@foreach ($examenes as $examen)
<div class="card">
    <div class="card-body">
        <div id="pieza_dental_dolor" class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Pieza N°</label>
                            <input type="text" class="form-control form-control-sm" name="ex_grl_dol_pi_n{{ $count }}" id="ex_grl_dol_pi_n{{ $count }}" value="{{ $examen->numero_pieza }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo de Dolor</label>
                            <select name="tipo_dolor{{ $count }}" id="tipo_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_dolor{{ $count }}','div_tipo_dolor','obs_tipo_dolor',3);">
                                <option @if($examen->tipo_dolor == 1) selected @endif value="1">Espontáneo</option>
                                <option @if($examen->tipo_dolor == 2) selected @endif value="2">Provocado</option>
                                <option @if($examen->tipo_dolor == 3) selected @endif value="3">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_tipo_dolor" style="display:none;">
                            <label class="floating-label-activo-sm">Tipo de dolor</label>
                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor{{ $count }}" id="obs_tipo_dolor{{ $count }}">{{ $examen->observacion }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Intensidad</label>
                            <select name="intensidad{{ $count }}" id="intensidad{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad{{ $count }}','div_intensidad','obs_intensidad',4);">
                                <option @if($examen->intensidad == 1) selected @endif value="1">Leve</option>
                                <option @if($examen->intensidad == 2) selected @endif value="2">Moderado</option>
                                <option @if($examen->intensidad == 3) selected @endif value="3">Intenso</option>
                                <option @if($examen->intensidad == 4) selected @endif value="4">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_intensidad" style="display:none;">
                            <label class="floating-label-activo-sm">Intensidad</label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad{{ $count }}" id="obs_intensidad{{ $count }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Modo dolor</label>
                            <select name="modo_dolor{{ $count }}"  id="modo_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor{{ $count }}','div_modo_dolor','obs_modo_dolor',3);">
                                <option @if($examen->modo_dolor == 1) selected @endif value="1">Pulsátil</option>
                                <option @if($examen->modo_dolor == 2) selected @endif value="2">Permanente</option>
                                <option @if($examen->modo_dolor == 3) selected @endif value="3">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_modo_dolor" style="display:none;">
                            <label class="floating-label-activo-sm">Modo dolor</label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor{{ $count }}" id="obs_modo_dolor{{ $count }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Localización</label>
                            <select name="loc_dolor{{ $count }}" id="loc_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor{{ $count }}','div_loc_dolor','obs_loc_dolor',3);">
                                <option selected  value="1">Localizado</option>
                                <option value="2">Referido</option>
                                <option value="3">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_loc_dolor" style="display:none;">
                            <label class="floating-label-activo-sm">Localización</label>
                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor{{ $count }}" id="obs_loc_dolor{{ $count }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Provocación del Dolor</label>
                            <select name="provocacion_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor{{ $count }}','div_provocacion_dolor','obs_provocacion_dolor',5);">
                                <option selected  value="1">Frío</option>
                                <option value="2">Calor</option>
                                <option value="3">Actividad</option>
                                <option value="4">Masticación</option>
                                <option value="5">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_provocacion_dolor" style="display:none;">
                            <label class="floating-label-activo-sm">Provocación del Dolor</label>
                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor{{ $count }}" id="obs_provocacion_dolor{{ $count }}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Cuando duele</label>
                            <select name="cdo_duele{{ $count }}"  id="cdo_duele{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cdo_duele{{ $count }}','div_cdo_duele','obs_cdo_duele',3);">
                                <option selected  value="1">Palpación</option>
                                <option value="2">Decubito</option>
                                <option value="3">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_cdo_duele" style="display:none;">
                            <label class="floating-label-activo-sm">Cuando duele</label>
                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cdo_duele{{ $count}}" id="obs_cdo_duele{{ $count}}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tpo Evolución</label>
                            <select name="tpo_evolucion{{ $count }}"  id="tpo_evolucion{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_evolucion{{ $count }}','div_tpo_evolucion','obs_tpo_evolucion',3);">
                                <option selected  value="1">Menos de 1 Semana</option>
                                <option value="2">Más de 1 Semana</option>
                                <option value="3">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_tpo_evolucion" style="display:none;">
                            <label class="floating-label-activo-sm">Tpo Evolución</label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_evolucion{{ $count }}" id="obs_tpo_evolucion{{ $count }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Efecto Analgésicos</label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anal_dolor{{ $count }}" id="obs_anal_dolor{{ $count }}">{{ $examen->observaciones }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <button type="button" class="btn btn-icon btn-danger-light-c"
                            onclick="eliminarExamenAgregado({{ $examen->id }})"><i class="feather icon-x"></i>
                        </button>
                        {{-- <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php $count++; @endphp
@endforeach
