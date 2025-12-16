@php $counter = 1; @endphp
@foreach ($examenes as $examen)
@php
    $piezasSeleccionadas = is_array($examen->grupo_piezas) ? $examen->grupo_piezas : json_decode($examen->grupo_piezas, true);
@endphp
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row">
                    <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Piezas N°</label><!--USAR SELECT 2 ?-->
                            <select class="js-example-basic-multiple select2-dental" name="pzas_grupo_impl{{ $counter }}" id="pzas_grupo_impl{{ $counter }}" multiple="multiple">
                                @foreach (['1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8','3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '4.1', '4.2', '4.3', '4.4', '4.5', '4.6', '4.7', '4.8'] as $pieza)
                                    <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Estabilidad (ISQ)</label>
                            <select name="estab_grupo_implante{{ $counter }}"    id="estab_grupo_implante{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('estab_grupo_implante{{ $counter }}','div_estab_grupo_implante{{ $counter }}','obs_estab_grupo_implante{{ $counter }}',8);">
                                <option @if($examen->id_estabilidad == 1) selected @endif value="1">30</option>
                                <option @if($examen->id_estabilidad == 2) selected @endif value="2">40</option>
                                <option @if($examen->id_estabilidad == 3) selected @endif value="3">50</option>
                                <option @if($examen->id_estabilidad == 4) selected @endif selected  value="4">60</option>
                                <option @if($examen->id_estabilidad == 5) selected @endif value="5">70</option>
                                <option @if($examen->id_estabilidad == 6) selected @endif value="6">80</option>
                                <option @if($examen->id_estabilidad == 7) selected @endif value="7">90</option>
                                <option @if($examen->id_estabilidad == 8) selected @endif value="8">Otra describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_estab_grupo_implante{{ $counter }}" @if($examen->id_estabilidad !== 8) style="display:none;" @endif>
                            <label class="floating-label-activo-sm">Describa otra observación</label>
                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_estab_grupo_implante{{ $counter }}" id="obs_estab_grupo_implante{{ $counter }}">{{ $examen->estabilidad }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Posición</label>
                            <select name="posc_grupo_impl{{ $counter }}"  id="posc_grupo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posc_grupo_impl{{ $counter }}','div_posc_grupo_impl{{ $counter }}','posc_grupo_vp{{ $counter }}',2);">
                                <option @if($examen->id_posicion == 1) selected @endif value="1">Correcta</option>
                                <option @if($examen->id_posicion == 2) selected @endif value="2">Incorrecta(Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_posc_grupo_impl{{ $counter }}" @if($examen->id_posicion !== 2) style="display:none;" @endif>
                            <label class="floating-label-activo-sm">Vestíbulo-palatino</label>
                            <input type="text"class="form-control form-control-sm" id="posc_grupo_vp{{ $counter }}">
                            <div class="form-group mt-1">
                                <label class="floating-label-activo-sm">vestíbulo-lingual</label>
                                <input type="text"class="form-control form-control-sm" id="posc_vl{{ $counter }}">
                            </div>
                            <div class="form-group mt-1">
                                <label class="floating-label-activo-sm">Mesio-distal</label>
                                <input type="text"class="form-control form-control-sm" id="posc_md{{ $counter }}">
                            </div>
                            <div class="form-group mt-1">
                                <label class="floating-label-activo-sm">Cráneo-caudal</label>
                                <input type="text"class="form-control form-control-sm" id="posc_cc{{ $counter }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Altura </label>
                            <input type="number" class="form-control form-control-sm " id="posc_altura{{ $counter }}" value="{{ $examen->altura }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Dpa </label>
                            <input type="number" class="form-control form-control-sm " placeholder="dist. pieza adyacente" id="posc_dpa{{ $counter }}" value="{{ $examen->dpa }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Desgaste del implante</label>
                            <select name="desg_gpo_impl{{ $counter }}"  id="desg_gpo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('desg_gpo_impl{{ $counter }}','div_desg_gpo_impl{{ $counter }}','obs_desg_gpo_impl{{ $counter }}',2);">
                                <option @if($examen->id_desgaste == 1) selected @endif value="1">No</option>
                                <option @if($examen->id_desgaste == 2) selected @endif value="2">Si(describa)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_desg_gpo_impl{{ $counter }}" @if($examen->id_desgaste !== 2) style="display:none;" @endif>
                            <label class="floating-label-activo-sm">Describa otro</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_desg_gpo_impl{{ $counter }}" id="obs_desg_gpo_impl{{ $counter }}">{{ $examen->desgaste }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Estado de la encía</label>
                            <select name="est_encia_gpo_impl{{ $counter }}" id="est_encia_gpo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_encia_gpo_impl{{ $counter }}','div_est_encia_gpo_impl{{ $counter }}','obs_est_encia_gpo_impl{{ $counter }}',2);">
                                <option @if($examen->id_estado_encia == 1) selected @endif value="1">Normal</option>
                                <option @if($examen->id_estado_encia == 2) selected @endif value="2">Anormal(describa)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_est_encia_gpo_impl{{ $counter }}" @if($examen->id_estado_encia !== 2) style="display:none;" @endif>
                            <label class="floating-label-activo-sm">Describa anormal</label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_encia_gpo_impl{{ $counter }}" id="obs_est_encia_gpo_impl{{ $counter }}">{{ $examen->estado_encia }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Hueso circundante</label>
                            <select name="hueso_cont_gpo_impl{{ $counter }}"  id="hueso_cont_gpo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hueso_cont_gpo_impl{{ $counter }}','div_hueso_cont_gpo_impl{{ $counter }}','obs_hueso_cont_gpo_impl{{ $counter }}',2);">
                                <option @if($examen->id_hueso_circundante == 1) selected @endif value="1">Normal</option>
                                <option @if($examen->id_hueso_circundante == 2) selected @endif value="2">Anormal describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_hueso_cont_gpo_impl{{ $counter }}" @if($examen->id_hueso_circundante !== 2) style="display:none;" @endif>
                            <label class="floating-label-activo-sm">Describa Anormal</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hueso_cont_gpo_impl{{ $counter }}" id="obs_hueso_cont_gpo_impl{{ $counter }}">{{ $examen->hueso_circundante }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Evaluación Corona | Prótesis</label>
                            <select name="corprot_cont_impl{{ $counter }}"  id="corprot_cont_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('corprot_cont_impl{{ $counter }}','div_corprot_cont_impl{{ $counter }}','obs_corprot_cont_impl{{ $counter }}',2);">
                                <option @if($examen->id_eva_cp == 1) selected @endif value="1">Normal</option>
                                <option @if($examen->id_eva_cp == 2) selected @endif value="2">Anormal describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_corprot_cont_impl{{ $counter }}" @if($examen->id_eva_cp !== 2) style="display:none;" @endif>
                            <label class="floating-label-activo-sm">Describa Anormal</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_corprot_cont_impl{{ $counter }}" id="obs_corprot_cont_impl{{ $counter }}">{{ $examen->eva_cp }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones al control grupo implante</label>
                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_control_gpo_implante{{ $counter }}" id="obs_control_gpo_implante{{ $counter }}">{{ $examen->observaciones }}</textarea>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_grupo_dental_post_impl({{ $examen->id }})">X</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php $counter++; @endphp
@endforeach

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
