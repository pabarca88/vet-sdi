@php $count_odon = 1; @endphp
@foreach ($examenes as $examen)
<div class="card">
    <div class="card-body">

        <div >
            <div id="pieza_dental_dolor" class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Pieza N°</label>
                                <input type="text" class="form-control form-control-sm" name="ex_grl_dol_pi_n{{ $count_odon }}" id="ex_grl_dol_pi_n{{ $count_odon }}" value="{{ $examen->numero_piezas }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Espacio periodontal Apical</label>
                                <select name="odontop_rx_esp_peri_apical{{ $count_odon }}" id="odontop_rx_esp_peri_apical{{ $count_odon }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('odontop_rx_esp_peri_apical','odontop_div_detalle_rx_esp_peri_apical','odontop_det_rx_esp_peri_apical',4)">
                                    <option value="0" @if($examen->espacio_periodontal == 0) selected @endif>Seleccione</option>
                                    <option value="1" @if($examen->espacio_periodontal == 1) selected @endif>Normal</option>
                                    <option value="2" @if($examen->espacio_periodontal == 2) selected @endif>Engrosado</option>
                                    <option value="3" @if($examen->espacio_periodontal == 3) selected @endif>Ausente</option>
                                    <option value="4" @if($examen->espacio_periodontal == 4) selected @endif>Otro</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_tipo_dolor{{ $count_odon }}" style="display:none;">
                                <label class="floating-label-activo-sm">Espacio periodontal Apical</label>
                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor{{ $count_odon }}" id="obs_tipo_dolor{{ $count_odon }}">{{ $examen->observacion }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Hueso alveolar Apical</label>
                                <select name="odontop_h_apical{{ $count_odon }}" id="odontop_h_apical{{ $count_odon }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('odontop_h_apical','odontop_div_detalle_h_apical','odontop_aprec_h_apical',5)">
                                    <option value="0" @if($examen->hueso_alveolal == 0) selected @endif>Seleccione</option>
                                    <option value="1" @if($examen->hueso_alveolal == 1) selected @endif>Normal</option>
                                    <option value="2" @if($examen->hueso_alveolal == 2) selected @endif>Zona apical Difusa</option>
                                    <option value="3" @if($examen->hueso_alveolal == 3) selected @endif>Zona apical Corticalizada</option>
                                    <option value="4" @if($examen->hueso_alveolal == 4) selected @endif>Osteítis Condensante</option>
                                    <option value="5" @if($examen->hueso_alveolal == 5) selected @endif>Otro<i>(describir)</i></option>
                                </select>
                            </div>
                            <div class="form-group" id="div_intensidad{{ $count_odon }}" style="display:none;">
                                <label class="floating-label-activo-sm">Intensidad</label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad{{ $count_odon }}" id="obs_intensidad{{ $count_odon }}"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <!-- Contenedor de Imágenes -->
                            <div class="form-row" id="contenedor_piezas_ex_oral">

                                @if (!empty($examen->decoded_imagenes) && is_array($examen->decoded_imagenes))
                                    <div class="imagen-gallery">
                                    @foreach ($examen->decoded_imagenes as $imagen)
                                        @if (is_array($imagen) && isset($imagen['paths_imagenes']) && is_array($imagen['paths_imagenes']))
                                            @foreach ($imagen['paths_imagenes'] as $path)
                                            <div class="imagen-card">
                                                <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path }}')">
                                                    <img src="{{ asset('storage/' . str_replace('\\', '', $path)) }}" alt="Imagen del examen" title="Click para amplificar">
                                                </a>
                                                <button type="button" class="btn btn-delete" onclick="eliminar_rx({{ $imagen['id']}})" title="Eliminar imagen">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="no-imagenes">
                                                <i class="fas fa-exclamation-triangle mb-2"></i>
                                                <p class="mb-0">Formato de imagen no válido</p>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                @else
                                    <div class="no-imagenes">
                                        <i class="fas fa-images mb-2" style="font-size: 24px;"></i>
                                        <p class="mb-0">No hay imágenes disponibles para este examen</p>
                                        <small class="text-muted">Las imágenes aparecerán aquí una vez que sean subidas</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="observaciones" class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control form-control-sm" id="observaciones" rows="3">{{ $examen->observaciones }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <button type="button" class="btn btn-icon btn-danger-light-c"
                                onclick="eliminarExamenAgregadoRxOdontop({{ $examen->id }})"><i class="feather icon-x"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php $count_odon++; @endphp
@endforeach
