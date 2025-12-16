@php $count = 1; @endphp
@foreach ($imagenes as $imagen)
<div class="form-row">
    <div class="col-sm-8 mt-2">
        <div class="card">
            <div class="card text-center" id="img">
                <H6>EVALUACIÓN RADIOLÓGICA GENERAL</H6>
            </div>
            <div class="card-body">
                <!-- Contenedor de Imágenes -->
                <div class="form-row" id="contenedor_piezas_ex_oral">
                    @if (!empty($imagen->paths_imagenes) && is_array($imagen->paths_imagenes))
                        @foreach ($imagen->paths_imagenes as $path)
                            @if (isset($path['momento']) && $path['momento'] === 'Pre')
                                <div>
                                    <!-- Botón para ampliar imagen -->
                                    <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                        <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}"
                                            alt="Imagen del examen"
                                            class="img-fluid mx-2 imagen_rx">
                                    </a>

                                    <!-- Botón para eliminar imagen -->
                                    <button type="button"
                                            class="btn btn-outline-danger btn-sm my-2"
                                            onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @else
                            <p>No hay imágenes disponibles para este examen.</p>
                            @endif
                        @endforeach
                    @else
                        <p>No hay imágenes disponibles para este examen.</p>
                    @endif
                </div>
            </div>
            <div class="card-footer">

                <div class="form-row">
                    <div class="col-sm-12 mt-2">

                        <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_imagenes({{ $imagen->id }})">X</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 mt-2" >
        <div class="form-group fill">
            <div class="switch switch-success d-inline m-r-10">
                <input type="checkbox" onchange="biopsia_check_implantologia({{ $count }})" id="biopsia_check_implantologia" name="biopsia_check_implantologia" value="" @if($imagen->biopsia == 1) checked @endif>
                <label for="biopsia_check_implantologia" class="cr"></label>
            </div>
            <label>biopsia</label>
            <hr>
            <div class="form-group fill">
                <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="period_biop_zona" id="period_biop_zona">{{ $imagen->zona_y_motivo }}</textarea>
            </div>
            <div class="form-group fill">
                <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="period_obs_result_biopsia" id="period_obs_result_biopsia">{{ $imagen->observaciones }}</textarea>
            </div>
            <hr>
                <h6 style="text-align: center;color:blue;">ESTADO GENERAL DEL PERIODONTO</h6>
            <hr>
            <div class="form-group fill m-50" >
                <button type="button" class="btn btn-outline-success btn-sm " onclick="solicitar_ic_periodoncia()">SOLICITAR INTERCONSULTA PERIODÓNCIA</button>
            </div>
            <div class="form-group fill">
                <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia" id="obs_result_biopsia"></textarea>
            </div>
        </div>
    </div>
</div>

@php $count++; @endphp
@endforeach
