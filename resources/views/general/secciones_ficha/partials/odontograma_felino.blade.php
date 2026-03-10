@php
    use Illuminate\Support\Str;

    $arcadaSuperiorIzquierdaFelino = range(109, 101);
    $arcadaSuperiorDerechaFelino = range(201, 209);
    $arcadaInferiorIzquierdaFelino = range(409, 401);
    $arcadaInferiorDerechaFelino = range(301, 309);

    // Imagen temporal única para todas las piezas (reemplazar aquí cuando envíen imágenes finales)
    $imagenBaseFelino = 'images/dental/dientes/d11.png';

    // Estados visuales por pieza: carie (punto rojo), implante (línea negra)
    $piezasEstadoFelino = [];
    $fuenteHistorialFelino = collect($odontograma_historial ?? $odontograma ?? []);
    $nombreEspecieMascota = strtolower(trim(optional(optional($mascota ?? null)->especieMascota)->nombre ?? ''));
    $tituloOdontogramaMascota = stripos($nombreEspecieMascota, 'canin') !== false
        ? 'Odontograma Canino'
        : (stripos($nombreEspecieMascota, 'felin') !== false ? 'Odontograma Felino' : 'Odontograma Mascota');

    foreach ($fuenteHistorialFelino as $registro) {
        $piezaCodigo = (string) data_get($registro, 'pieza', '');
        if ($piezaCodigo === '') {
            continue;
        }

        $diagnostico = Str::lower((string) data_get($registro, 'diagnostico', ''));
        $tratamiento = Str::lower((string) data_get($registro, 'tratamiento', ''));

        if (!isset($piezasEstadoFelino[$piezaCodigo])) {
            $piezasEstadoFelino[$piezaCodigo] = [
                'carie' => false,
                'implante' => false,
            ];
        }

        if (Str::contains($diagnostico, 'carie') || Str::contains($tratamiento, 'carie')) {
            $piezasEstadoFelino[$piezaCodigo]['carie'] = true;
        }

        // Confirmado para dejar listo: implante se representa con línea negra
        if (Str::contains($tratamiento, 'implante') || Str::contains($diagnostico, 'implante')) {
            $piezasEstadoFelino[$piezaCodigo]['implante'] = true;
        }
    }
@endphp

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
        <h1 class="text-c-blue mt-1 mb-1 f-22 d-inline">{{ $tituloOdontogramaMascota }}</h1>
        <button type="button" data-toggle="modal" data-target="#exampleModalFelino" class="btn btn-purple d-inline float-md-right mr-2">Ver simbología</button>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-informacion">
            <div class="card-body">
                <div class="col-md-12 d-flex flex-row align-items-end justify-content-center mt-3">
                    @foreach ($arcadaSuperiorIzquierdaFelino as $pieza)
                        @php
                            $piezaCodigo = (string) $pieza;
                            $estadoPieza = $piezasEstadoFelino[$piezaCodigo] ?? ['carie' => false, 'implante' => false];
                        @endphp
                        <div class="text-center mx-1">
                            <div class="diente_adulto odonto-felino-tooth" id="t{{ $piezaCodigo }}">
                                <img src="{{ asset($imagenBaseFelino) }}" class="wid-60 img-fluid" role="button" onclick="info_odontograma('{{ $piezaCodigo }}');">
                                @if ($estadoPieza['carie'])
                                    <span class="odonto-felino-mark odonto-felino-caries"></span>
                                @endif
                                @if ($estadoPieza['implante'])
                                    <span class="odonto-felino-mark odonto-felino-implante"></span>
                                @endif
                            </div>
                            <label data-ndiente="{{ $piezaCodigo }}" class="nav-label-dent mt-2 font-weight-bold">{{ $piezaCodigo }}</label>
                        </div>
                    @endforeach

                    @foreach ($arcadaSuperiorDerechaFelino as $pieza)
                        @php
                            $piezaCodigo = (string) $pieza;
                            $estadoPieza = $piezasEstadoFelino[$piezaCodigo] ?? ['carie' => false, 'implante' => false];
                        @endphp
                        <div class="text-center mx-1">
                            <div class="diente_adulto odonto-felino-tooth" id="t{{ $piezaCodigo }}">
                                <img src="{{ asset($imagenBaseFelino) }}" class="wid-60 img-fluid" role="button" onclick="info_odontograma('{{ $piezaCodigo }}');">
                                @if ($estadoPieza['carie'])
                                    <span class="odonto-felino-mark odonto-felino-caries"></span>
                                @endif
                                @if ($estadoPieza['implante'])
                                    <span class="odonto-felino-mark odonto-felino-implante"></span>
                                @endif
                            </div>
                            <label data-ndiente="{{ $piezaCodigo }}" class="nav-label-dent mt-2 font-weight-bold">{{ $piezaCodigo }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-12 d-flex flex-row align-items-start justify-content-center mt-5">
                    @foreach ($arcadaInferiorIzquierdaFelino as $pieza)
                        @php
                            $piezaCodigo = (string) $pieza;
                            $estadoPieza = $piezasEstadoFelino[$piezaCodigo] ?? ['carie' => false, 'implante' => false];
                        @endphp
                        <div class="text-center mx-1">
                            <label data-ndiente="{{ $piezaCodigo }}" class="nav-label-dent mt-2 font-weight-bold">{{ $piezaCodigo }}</label>
                            <div class="diente_adulto odonto-felino-tooth" id="t{{ $piezaCodigo }}">
                                <img src="{{ asset($imagenBaseFelino) }}" class="wid-60 img-fluid" role="button" onclick="info_odontograma('{{ $piezaCodigo }}');">
                                @if ($estadoPieza['carie'])
                                    <span class="odonto-felino-mark odonto-felino-caries"></span>
                                @endif
                                @if ($estadoPieza['implante'])
                                    <span class="odonto-felino-mark odonto-felino-implante"></span>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    @foreach ($arcadaInferiorDerechaFelino as $pieza)
                        @php
                            $piezaCodigo = (string) $pieza;
                            $estadoPieza = $piezasEstadoFelino[$piezaCodigo] ?? ['carie' => false, 'implante' => false];
                        @endphp
                        <div class="text-center mx-1">
                            <label data-ndiente="{{ $piezaCodigo }}" class="nav-label-dent font-weight-bold mt-2">{{ $piezaCodigo }}</label>
                            <div class="diente_adulto odonto-felino-tooth" id="t{{ $piezaCodigo }}">
                                <img src="{{ asset($imagenBaseFelino) }}" class="wid-60 img-fluid" role="button" onclick="info_odontograma('{{ $piezaCodigo }}');">
                                @if ($estadoPieza['carie'])
                                    <span class="odonto-felino-mark odonto-felino-caries"></span>
                                @endif
                                @if ($estadoPieza['implante'])
                                    <span class="odonto-felino-mark odonto-felino-implante"></span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalFelino" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Simbología del odontograma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="media align-middle">
                            <div class="odonto-felino-legend-box mr-2">
                                <img src="{{ asset($imagenBaseFelino) }}" class="wid-45" alt="Diente">
                            </div>
                            <div class="media-body">
                                <strong>Pieza normal</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="media align-middle">
                            <div class="odonto-felino-legend-box mr-2 position-relative">
                                <img src="{{ asset($imagenBaseFelino) }}" class="wid-45" alt="Caries">
                                <span class="odonto-felino-mark odonto-felino-caries"></span>
                            </div>
                            <div class="media-body">
                                <strong>Caries</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="media align-middle">
                            <div class="odonto-felino-legend-box mr-2 position-relative">
                                <img src="{{ asset($imagenBaseFelino) }}" class="wid-45" alt="Implante">
                                <span class="odonto-felino-mark odonto-felino-implante"></span>
                            </div>
                            <div class="media-body">
                                <strong>Implante</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@once
    <style>
        .odonto-felino-tooth {
            position: relative;
            display: inline-block;
        }

        .odonto-felino-mark {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        .odonto-felino-caries {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #ff1f1f;
            box-shadow: 0 0 0 2px rgba(255, 31, 31, 0.2);
        }

        .odonto-felino-implante {
            width: 4px;
            height: 88px;
            background: #111;
            transform: translate(-50%, -50%) rotate(16deg);
            border-radius: 2px;
        }

        .odonto-felino-legend-box {
            width: 56px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .odonto-felino-legend-box .odonto-felino-implante {
            height: 60px;
        }
    </style>
@endonce
