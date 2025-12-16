@php $count = 1; @endphp
@foreach ($imagenes as $imagen)
    <div class="card">
        <div class="card-body">
            <div class="row mb-1">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-row">
                        <div class="col-sm-4 mt-2">
                            <div class="card">
                                <div class="card text-center" id="img">
                                <H6>Imagenes Pre</H6>
                                </div>
                                <div class="card-body">
                                    <!-- Contenedor de Imágenes -->
                                    <div class="form-row" id="contenedor_piezas_ex_oral">
                                        @php
                                            $imagenes_pre = collect($imagen->paths_imagenes)->filter(function ($item) {
                                                return isset($item['momento']) && $item['momento'] === 'Pre';
                                            });
                                        @endphp

                                        @if ($imagenes_pre->isNotEmpty())
                                            @foreach ($imagenes_pre as $path)
                                                <div>
                                                    <!-- Botón para ampliar imagen -->
                                                    <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                                        <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}"
                                                            alt="Imagen del examen"
                                                            class="img-fluid mx-2 imagen_rx">
                                                    </a>

                                                    @if (!empty($path['id_image_pre']))
                                                        <div class="mt-1 text-muted small">
                                                            ID Pre: {{ $path['id_image_pre'] }}
                                                        </div>
                                                    @endif

                                                    <!-- Botón para eliminar imagen -->
                                                    <button type="button"
                                                            class="btn btn-outline-danger btn-sm my-2"
                                                            onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No hay imágenes disponibles para este examen.</p>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-2">
                            <div class="card">
                                <div class="card text-center" id="img">
                                    <h6>Imágenes Post</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Contenedor de Imágenes -->
                                    <div class="form-row" id="contenedor_piezas_ex_oral">
                                        @php
                                            $imagenes_post = collect($imagen->paths_imagenes ?? [])->filter(function ($item) {
                                                return isset($item['momento']) && $item['momento'] === 'Post';
                                            });
                                        @endphp

                                        @if ($imagenes_post->isNotEmpty())
                                            @foreach ($imagenes_post as $path)
                                                <div>
                                                    <!-- Botón para ampliar imagen -->
                                                    <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                                        <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}"
                                                            alt="Imagen del examen"
                                                            class="img-fluid mx-2 imagen_rx">
                                                    </a>

                                                    <!-- Mostrar ID asociado a la imagen Post -->
                                                    @if (!empty($path['id_image_post']))
                                                    <div class="mt-1 text-muted small">
                                                        ID Post: {{ $path['id_image_post'] }}
                                                    </div>
                                                    @endif
                                                    <!-- Botón para eliminar imagen -->
                                                    <button type="button"
                                                            class="btn btn-outline-danger btn-sm my-2"
                                                            onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No hay imágenes disponibles para este examen.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">
                                <input type="hidden" name="biopsia_odont{{ $count }}" id="biopsia_odont{{ $count }}" value="">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" onchange="biopsia('odont',{{ $count }});" id="biopsia_check_odont{{ $count }}" name="biopsia_check_odont{{ $count }}" value="" @if($imagen->biopsia == 1) checked @endif disabled>
                                    <label for="biopsia_check_odont{{ $count }}" class="cr"></label>
                                </div>
                                <label>biopsia</label>
                                <hr>
                                <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="od_biop_zona{{ $count }}" id="od_biop_zona{{ $count }}" disabled>{{ $imagen->zona_y_motivo }}</textarea>
                                </div>
                                <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia{{ $count }}" id="obs_result_biopsia{{ $count }}" disabled>{{ $imagen->observaciones }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
@php $count++; @endphp
@endforeach
