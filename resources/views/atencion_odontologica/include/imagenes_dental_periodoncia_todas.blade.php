
@php $count = 1; @endphp
@foreach ($imagenes as $imagen)
<div class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
        <h6 class="t-aten d-inline">Estudio Radiológico - Imagen {{ $count }}</h6>
    </div>

    <!-- EVALUACIÓN RADIOLÓGICA GENERAL -->
    <div class="col-sm-8 mt-2">
        <div class="card-informacion">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="sub-aten">EVALUACIÓN RADIOLÓGICA GENERAL</h6>
                    </div>
                </div>

                <!-- Campo Pieza o zona -->
                <div class="form-row">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Pieza o zona</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" readonly>{{ $imagen->numero_pieza ?? 'No especificada' }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones Radiológicas</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" readonly>{{ $imagen->observaciones ?? 'Sin observaciones' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Imágenes -->
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="aten-a">
                            @if (!empty($imagen->paths_imagenes) && is_array($imagen->paths_imagenes))
                                <div class="imagen-gallery">
                                    @foreach ($imagen->paths_imagenes as $path)
                                        @if (isset($path['momento']) && $path['momento'] === 'Pre')
                                            <div class="imagen-card">
                                                <!-- Botón para ampliar imagen -->
                                                <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                                    <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}"
                                                        alt="Imagen del examen"
                                                        class="img-fluid imagen_rx"
                                                        style="max-width: 150px; max-height: 150px; object-fit: cover;">
                                                        <button type="button" class="btn btn-delete" onclick="eliminar_imagen_dental({{$imagen->id}}, '{{ $path['path'] }}')" title="Eliminar imagen">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted text-center">No hay imágenes disponibles para este examen.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <h6 class="mb-0 font-weight-bold">
                    <i class="fas fa-tooth mr-2"></i> Evaluación Pieza {{ $imagen->numero_pieza ?? 'No especificada' }}
                </h6>
                <div class="d-flex justify-content-between align-items-start">
                    <small class="mr-3 opacity-75">
                        <i class="far fa-calendar-alt mr-1"></i>{{ $imagen->created_at->format('d/m/Y H:i') }}
                    </small>
                    <div class="btn-group" role="group">

                        <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_pieza_dental_imagenes({{ $imagen->id }})" title="Eliminar evaluación">
                            X
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECCIÓN DE BIOPSIA -->
    <div class="col-sm-4">
        <div class="card-informacion">
            <div class="card-body">
                <div class="form-group">
                    <div class="switch switch-success d-inline m-r-10">
                        <input type="checkbox"
                                id="biopsia_check_period_view{{ $imagen->id }}"
                                name="biopsia_check_period_view{{ $imagen->id }}"
                                @if($imagen->biopsia ?? false) checked @endif
                                disabled>
                        <label for="biopsia_check_period_view{{ $imagen->id }}" class="cr"></label>
                    </div>
                    <label>Biopsia</label>

                    @if($imagen->biopsia ?? false)
                    <div class="form-group fill">
                        <label class="floating-label-activo-sm">Zona y Motivo</label>
                        <textarea class="form-control form-control-sm" rows="2" readonly>{{ $imagen->zona_motivo ?? 'Sin información' }}</textarea>
                    </div>
                    <div class="form-group fill">
                        <label class="floating-label-activo-sm">Observaciones y Resultado</label>
                        <textarea class="form-control form-control-sm" rows="3" readonly>{{ $imagen->observaciones_biopsia ?? 'Sin observaciones' }}</textarea>
                    </div>
                    @endif

                    <hr>
                    <h6 class="sub-aten">Estado general del periodonto</h6>
                    <hr>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="solicitar_ic_periodoncia()">
                            <i class="feather icon-check"></i> Solicitar Interconsulta Periodoncia
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@if(!$loop->last)
<hr class="my-4">
@endif

@php $count++; @endphp
@endforeach

@if(count($imagenes) == 0)
    <div class="form-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-informacion">
                <div class="card-body text-center">
                    <div class="empty-state">
                        <i class="feather icon-image" style="font-size: 48px; color: #ccc;"></i>
                        <h5 class="mt-3">No hay estudios radiológicos registrados</h5>
                        <p class="text-muted">Los estudios radiológicos que registres aparecerán aquí.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
