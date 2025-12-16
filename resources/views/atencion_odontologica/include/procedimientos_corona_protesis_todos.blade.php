@php $counter = 100; @endphp
@if(isset($seccion) )
    @if($seccion == 'pfu')
        @foreach ($examenes as $examen)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="n_pieza_pfu{{ $counter }}" id="n_pieza_pfu{{ $counter }}"
                                            value="{{ $examen->numero_pieza }}">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Móvil</label>
                                        <select name="movil_pfu{{ $counter }}" id="movil_pfu{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('movil_pfu{{ $counter }}','div_movil_pfu{{ $counter }}','obs_movil_pfu{{ $counter }}',2);">
                                            <option @if($examen->id_movil == 0) selected @endif value="0">Seleccione</option>
                                            <option @if($examen->id_movil == 1) selected @endif value="1">No</option>
                                            <option @if($examen->id_movil == 2) selected @endif value="2">Sí</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_movil_pfu{{ $counter }}" @if($examen->id_movil !== 2) style="display:none;" @endif>
                                        <label class="floating-label-activo-sm">Describa</label>
                                        <textarea class="form-control form-control-sm" data-titulo="" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_movil_pfu{{ $counter }}" id="obs_movil_pfu{{ $counter }}">{{ $examen->movil }}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Prueba de ajuste</label>
                                        <select name="prueba_ajuste_cor_pfu{{ $counter }}"
                                            id="prueba_ajuste_cor_pfu{{ $counter }}" class="form-control form-control-sm"
                                            onchange="evaluar_para_carga_detalle('prueba_ajuste_cor_pfu{{ $counter }}','div_prueba_ajuste_cor_pfu{{ $counter }}','obs_prueba_ajuste_cor_pfu{{ $counter }}',2);">
                                            <option @if ($examen->id_prueba_ajuste == 1) selected @endif value="1">Buena
                                            </option>
                                            <option @if ($examen->id_prueba_ajuste == 2) selected @endif value="2">No devuelta
                                                a laboratorio</option>

                                        </select>
                                    </div>
                                    <div class="form-group" id="div_prueba_ajuste_cor_pfu{{ $counter }}"
                                        @if ($examen->id_prueba_ajuste !== 2) style="display:none;" @endif>
                                        <label class="floating-label-activo-sm">Otro describa</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                            name="obs_prueba_ajuste_cor_pfu{{ $counter }}" id="obs_prueba_ajuste_cor_pfu{{ $counter }}">{{ $examen->prueba_ajuste }}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group fill">
                                        <label for="tornillo_cor_pfu{{ $counter }}" class="floating-label-activo-sm">Tornillo</label>
                                        <select class="form-control form-control-sm" name="tornillo_cor_pfu{{ $counter }}" id="tornillo_cor_pfu{{ $counter }}" onchange="evaluar_para_carga_detalle('tornillo_cor_pfu{{ $counter }}','div_tornillo_cor_pfu{{ $counter }}','obs_tornillo_cor_pfu{{ $counter }}',3);">
                                            <option @if($examen->id_tornillo == 1) selected @endif value="1">Tornillo rodado</option>
                                            <option @if($examen->id_tornillo == 2) selected @endif value="2">Fractura de tornillo</option>
                                            <option @if($examen->id_tornillo == 3) selected @endif value="3">Otra</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_tornillo_cor_pfu{{ $counter }}" @if($examen->id_tornillo !== 3) style="display:none;" @endif>
                                        <label class="floating-label-activo-sm">Otro describa</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tornillo_cor_pfu{{ $counter }}" id="obs_tornillo_cor_pfu{{ $counter }}">{{ $examen->tornillo }}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Pulido</label>
                                        <select name="pulido_ajuste_pfu{{ $counter }}"
                                            id="pulido_ajuste_pfu{{ $counter }}" class="form-control form-control-sm"
                                            onchange="evaluar_para_carga_detalle('pulido_ajuste_pfu{{ $counter }}','div_pulido_ajuste_pfu{{ $counter }}','det_pulido_ajuste_pfu{{ $counter }}',2)">
                                            <option @if ($examen->id_pulido == 0) selected @endif value="0">Seleccione
                                            </option>
                                            <option @if ($examen->id_pulido == 1) selected @endif value="1">
                                                Satisfactorio</option>
                                            <option @if ($examen->id_pulido == 2) selected @endif value="2">Deficiente
                                                se cita a control</option>

                                        </select>
                                    </div>
                                    <div class="form-group" id="div_pulido_ajuste_pfu{{ $counter }}"
                                        @if ($examen->id_pulido !== 2) style="display:none" @endif>
                                        <label class="floating-label-activo-sm">Detalle <i>(describir)</i></label>
                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"
                                            rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="det_pulido_ajuste_pfu{{ $counter }}"
                                            id="det_pulido_ajuste_pfu{{ $counter }}">{{ $examen->pulido }}</textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Observaciones al procedimiento</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;"
                                            name="aprec_pfu{{ $counter }}" id="aprec_pfu{{ $counter }}">{{ $examen->observaciones }}</textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-danger btn-icon"
                        onclick="eliminar_pieza_dental_pfu({{ $examen->id }})">X</button>
                </div>
            </div>
        @endforeach
    @else
        @foreach ($examenes as $examen)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="n_pieza_pfu{{ $counter }}" id="n_pieza_pfu{{ $counter }}"
                                            value="{{ $examen->numero_pieza }}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo de anclaje</label>
                                        <select name="tipo_anc_impl_pfp0" id="tipo_anc_impl_pfp0" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_anc_impl_pfp{{ $counter }}','div_tipo_anc_impl_pfp{{ $counter }}','det_tipo_anc_impl_pfp{{ $counter }}',3)">
                                            <option @if($examen->id_tipo_anclaje == 0) selected @endif value="0">Seleccione</option>
                                            <option @if($examen->id_tipo_anclaje == 1) selected @endif value="1">Ferulizada Atornillada </option>
                                            <option @if($examen->id_tipo_anclaje == 2) selected @endif value="2">Ferulizada Cementada </option>
                                            <option @if($examen->id_tipo_anclaje == 3) selected @endif value="3">Otra</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_tipo_anc_impl_pfp{{ $counter }}" @if($examen->id_tipo_anclaje !== 3) style="display:none" @endif>
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <input type="text" class="form-control form-control-sm" name="det_tipo_anc_impl_pfp{{ $counter }}" id="det_tipo_anc_impl_pfp{{ $counter }}" value="{{ $examen->tipo_anclaje }}">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Toma de medida y envío a laboratorio</label>
                                        <select name="corona_toma_imp_pfu{{ $counter }}"
                                            id="corona_toma_imp_pfu{{ $counter }}" class="form-control form-control-sm"
                                            onchange="evaluar_para_carga_detalle('corona_toma_imp_pfu{{ $counter }}','div_corona_toma_imp_pfu{{ $counter }}','det_corona_toma_imp_pfu{{ $counter }}',2)">
                                            <option @if ($examen->id_toma_medida == 0) selected @endif value="0">Seleccione
                                            </option>
                                            <option @if ($examen->id_toma_medida == 1) selected @endif value="1">No</option>
                                            <option @if ($examen->id_toma_medida == 1) selected @endif value="2">Si</option>

                                        </select>
                                    </div>
                                    <div class="form-group" id="div_corona_toma_imp_pfu{{ $counter }}"
                                        @if ($examen->id_toma_medida !== 2) style="display:none" @endif>
                                        <label class="floating-label-activo-sm">Nombre Paciente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_pfu{{ $counter }}"
                                            id="nombre_paciente_pfu{{ $counter }}"
                                            value="{{ $examen->nombre_paciente }}">
                                        <div class="form-group mt-3">
                                            <label class="floating-label-activo-sm">Laboratorio</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="lab_pfu{{ $counter }}" id="lab_pfu{{ $counter }}"
                                                value="{{ $examen->nombre_laboratorio }}">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="floating-label-activo-sm">Numero de orden</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="n_orden_pfu{{ $counter }}" id="n_orden_pfu{{ $counter }}"
                                                value="{{ $examen->numero_orden }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Prueba de ajuste</label>
                                        <select name="prueba_ajuste_cor_pfu{{ $counter }}"
                                            id="prueba_ajuste_cor_pfu{{ $counter }}" class="form-control form-control-sm"
                                            onchange="evaluar_para_carga_detalle('prueba_ajuste_cor_pfu{{ $counter }}','div_prueba_ajuste_cor_pfu{{ $counter }}','obs_prueba_ajuste_cor_pfu{{ $counter }}',2);">
                                            <option @if ($examen->id_prueba_ajuste == 1) selected @endif value="1">Buena
                                            </option>
                                            <option @if ($examen->id_prueba_ajuste == 2) selected @endif value="2">No devuelta
                                                a laboratorio</option>

                                        </select>
                                    </div>
                                    <div class="form-group" id="div_prueba_ajuste_cor_pfu{{ $counter }}"
                                        @if ($examen->id_prueba_ajuste !== 2) style="display:none;" @endif>
                                        <label class="floating-label-activo-sm">Otro describa</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                            name="obs_prueba_ajuste_cor_pfu{{ $counter }}" id="obs_prueba_ajuste_cor_pfu{{ $counter }}">{{ $examen->prueba_ajuste }}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Pulido</label>
                                        <select name="pulido_ajuste_pfu{{ $counter }}"
                                            id="pulido_ajuste_pfu{{ $counter }}" class="form-control form-control-sm"
                                            onchange="evaluar_para_carga_detalle('pulido_ajuste_pfu{{ $counter }}','div_pulido_ajuste_pfu{{ $counter }}','det_pulido_ajuste_pfu{{ $counter }}',2)">
                                            <option @if ($examen->id_pulido == 0) selected @endif value="0">Seleccione
                                            </option>
                                            <option @if ($examen->id_pulido == 1) selected @endif value="1">
                                                Satisfactorio</option>
                                            <option @if ($examen->id_pulido == 2) selected @endif value="2">Deficiente
                                                se cita a control</option>

                                        </select>
                                    </div>
                                    <div class="form-group" id="div_pulido_ajuste_pfu{{ $counter }}"
                                        @if ($examen->id_pulido !== 2) style="display:none" @endif>
                                        <label class="floating-label-activo-sm">Detalle <i>(describir)</i></label>
                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"
                                            rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="det_pulido_ajuste_pfu{{ $counter }}"
                                            id="det_pulido_ajuste_pfu{{ $counter }}">{{ $examen->pulido }}</textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Observaciones al procedimiento</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;"
                                            name="aprec_pfu{{ $counter }}" id="aprec_pfu{{ $counter }}">{{ $examen->observaciones }}</textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-danger btn-icon"
                        onclick="eliminar_pieza_dental_pfu({{ $examen->id }})">X</button>
                </div>
            </div>
        @endforeach
    @endif
@endif
