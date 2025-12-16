@php $counter = 1; @endphp
@foreach ($examenes as $examen)
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-informacion">
            <div class="card-body">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                            <label class="floating-label-activo-sm">Pieza N°</label>
                            <input type="text" class="form-control form-control-sm" name="numero_pieza_post_impl{{ $counter }}" id="numero_pieza_post_impl{{ $counter }}" value="{{ $examen->numero_pieza }}">
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Móvil</label>
                                <select name="estab_post_implante{{ $counter }}"  id="estab_post_implante{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('estab_post_implante{{ $counter }}','div_estab_post_implante{{ $counter }}','obs_estab_post_implante{{ $counter }}',2);">
                                    <option @if($examen->id_movil == 0) selected @endif value="0">Seleccione</option>
                                    <option @if($examen->id_movil == 1) selected @endif value="1" selected>No</option>
                                    <option @if($examen->id_movil == 2) selected @endif value="2">Sí</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_estab_post_implante{{ $counter }}" @if($examen->id_movil !== 2) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Describa</label>
                                <textarea class="form-control form-control-sm" data-titulo=""  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_estab_post_implante{{ $counter }}" id="obs_estab_post_implante{{ $counter }}">{{ $examen->movil }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Posición</label>
                                <select name="posc_post_impl{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="posc_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posc_post_impl{{ $counter }}','div_posc_post_impl{{ $counter }}','posc_post_vp{{ $counter }}',2);">
                                    <option @if($examen->id_posicion == 1) selected @endif value="1">Correcta</option>
                                    <option @if($examen->id_posicion == 2) selected @endif value="2">Incorrecta(Describir)</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_posc_post_impl{{ $counter }}" @if($examen->id_posicion !== 2) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Vestíbulo-palatino</label>
                                <input type="text"class="form-control form-control-sm" id="posc_post_vp{{ $counter }}">
                                <div class="form-group mt-1">
                                    <label class="floating-label-activo-sm">vestíbulo-lingual</label>
                                    <input type="text"class="form-control form-control-sm" id="posc_post_vl{{ $counter }}">
                                </div>
                                <div class="form-group mt-1">
                                    <label class="floating-label-activo-sm">Mesio-distal</label>
                                    <input type="text"class="form-control form-control-sm" id="posc_post_md{{ $counter }}">
                                </div>
                                <div class="form-group mt-1">
                                    <label class="floating-label-activo-sm">Cráneo-caudal</label>
                                    <input type="text"class="form-control form-control-sm" id="posc_post_cc{{ $counter }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Exposición de espiras</label>
                                <select name="exp_esp_post_impl{{ $counter }}"  id="exp_esp_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('exp_esp_post_impl{{ $counter }}','div_exp_esp_post_impl{{ $counter }}','obs_exp_esp_post_impl{{ $counter }}',2);">
                                    <option @if($examen->id_exp_esp == 0) selected @endif value="0">Seleccione</option>
                                    <option @if($examen->id_exp_esp == 1) selected @endif value="1" selected>No</option>
                                    <option @if($examen->id_exp_esp == 2) selected @endif value="2">Sí</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_exp_esp_post_impl{{ $counter }}" @if($examen->id_exp_esp !== 2) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Describa</label>
                                <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_exp_esp_post_impl{{ $counter }}" id="obs_exp_esp_post_impl{{ $counter }}">{{ $examen->exp_esp }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Supuración</label>
                                <select name="sut_post_impl{{ $counter }}"  id="sut_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sut_post_impl{{ $counter }}','div_sut_post_impl{{ $counter }}','obs_sut_post_impl{{ $counter }}',2);">
                                    <option @if($examen->id_sup == 0) selected @endif value="0">Seleccione</option>
                                    <option @if($examen->id_sup == 1) selected @endif value="1" selected>No</option>
                                    <option @if($examen->id_sup == 2) selected @endif value="2">Sí</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_sut_post_impl{{ $counter }}" @if($examen->id_sup !== 2) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Describa</label>
                                <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sut_post_impl{{ $counter }}" id="obs_sut_post_impl{{ $counter }}">{{ $examen->supuracion }}</textarea>
                            </div>
                        </div>
                        {{-- <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Desgaste del implante</label>
                                <select name="desg_impl"  id="desg_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('desg_impl','div_desg_impl','obs_desg_impl',2);">
                                    <option value="1">No</option>
                                    <option value="2">Si(describa)</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_desg_impl" style="display:none;">
                                <label class="floating-label-activo-sm">Describa otro</label>
                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_desg_impl" id="obs_desg_impl"></textarea>
                            </div>
                        </div> --}}
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Estado de la encía</label>
                                <select name="est_encia_post_impl{{ $counter }}" id="est_encia_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_encia_post_impl{{ $counter }}','div_est_encia_post_impl{{ $counter }}','obs_est_encia_post_impl{{ $counter }}',2);">
                                    <option @if($examen->est_encia == 1) selected @endif value="1">Normal</option>
                                    <option @if($examen->est_encia == 2) selected @endif value="2">Anormal(describa)</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_est_encia_post_impl{{ $counter }}" @if($examen->est_encia !== 2) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Describa anormal</label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_encia_post_impl{{ $counter }}" id="obs_est_encia_post_impl{{ $counter }}">{{ $examen->estado_encia }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Pérdida ósea marginal</label>
                                <input type="text" class="form-control form-control-sm" id="perd_osea_marg_post_impl{{ $counter }}" value="{{ $examen->perdida_osea_marginal }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Observaciones al control del implante</label>
                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_control_post_implante{{ $counter }}" id="obs_control_post_implante{{ $counter }}">{{ $examen->observaciones }}</textarea>
                            </div>
                        </div>
                        @if($examen->tipo == 2)
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre Implantólogo</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_implantologo{{ $counter }}" id="nombre_implantologo{{ $counter }}" value="{{ $examen->nombre_implantologo }}">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_post_impl({{ $examen->id }})">X</button>

                </div>
            </div>
        </div>
        </div>
    </div>
@php $counter++; @endphp
@endforeach
