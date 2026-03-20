@php
    use Illuminate\Support\Str;

    $arcadaSuperiorFelino = [109, 108, 107, 106, null, 104, 103, 102, 101, 201, 202, 203, 204, null, 206, 207, 208, 209];
    $arcadaInferiorFelino = [409, 408, 407, null, 404, 403, 402, 401, 301, 302, 303, 304, null, 307, 308, 309];

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

        if (Str::contains($tratamiento, 'implante') || Str::contains($diagnostico, 'implante')) {
            $piezasEstadoFelino[$piezaCodigo]['implante'] = true;
        }
    }
@endphp

@php
    $renderPiezaFelina = function ($piezaCodigo, $mostrarCodigoArriba = false) use ($piezasEstadoFelino) {
        $piezaCodigo = (string) $piezaCodigo;
        $estadoPieza = $piezasEstadoFelino[$piezaCodigo] ?? ['carie' => false, 'implante' => false];
        $rutaImagen = asset("images/dental/odontograma_felino/dientes/d{$piezaCodigo}.png");
        $claseAncho = in_array($piezaCodigo, ['104', '204', '304', '404'], true)
            ? 'odonto-felino-img-canine'
            : 'odonto-felino-img-regular';

        ob_start();
@endphp
<div class="odonto-felino-pieza">
    @if ($mostrarCodigoArriba)
        <span class="odonto-felino-codigo odonto-felino-codigo-top">{{ $piezaCodigo }}</span>
    @endif
    <div class="odonto-felino-tooth" id="t{{ $piezaCodigo }}">
        <img
            src="{{ $rutaImagen }}"
            class="img-fluid {{ $claseAncho }}"
            alt="Pieza {{ $piezaCodigo }}"
            role="button"
            onclick="info_odontograma('{{ $piezaCodigo }}');"
        >
        @if ($estadoPieza['carie'])
            <span class="odonto-felino-mark odonto-felino-caries"></span>
        @endif
        @if ($estadoPieza['implante'])
            <span class="odonto-felino-mark odonto-felino-implante"></span>
        @endif
    </div>
    @if (!$mostrarCodigoArriba)
        <span class="odonto-felino-codigo">{{ $piezaCodigo }}</span>
    @endif
</div>
@php
        return ob_get_clean();
    };
@endphp

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
        <h1 class="mt-1 mb-0 f-22 odonto-felino-title d-inline">{{ $tituloOdontogramaMascota }}</h1>
        <button type="button" data-toggle="modal" data-target="#exampleModalFelino" class="btn btn-purple d-inline float-md-right mr-2">
            Ver simbología
        </button>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-informacion odonto-felino-card">
            <div class="card-body odonto-felino-body">
                <div class="odonto-felino-arcada odonto-felino-arcada-top">
                    @foreach ($arcadaSuperiorFelino as $pieza)
                        @if ($pieza === null)
                            <div class="odonto-felino-gap" aria-hidden="true"></div>
                        @else
                            {!! $renderPiezaFelina($pieza) !!}
                        @endif
                    @endforeach
                </div>

                <div class="odonto-felino-arcada odonto-felino-arcada-bottom">
                    @foreach ($arcadaInferiorFelino as $pieza)
                        @if ($pieza === null)
                            <div class="odonto-felino-gap" aria-hidden="true"></div>
                        @else
                            {!! $renderPiezaFelina($pieza, true) !!}
                        @endif
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
                                <img src="{{ asset('images/dental/odontograma_felino/dientes/d101.png') }}" class="odonto-felino-legend-img" alt="Diente">
                            </div>
                            <div class="media-body">
                                <strong>Pieza normal</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="media align-middle">
                            <div class="odonto-felino-legend-box mr-2 position-relative">
                                <img src="{{ asset('images/dental/odontograma_felino/dientes/d101.png') }}" class="odonto-felino-legend-img" alt="Caries">
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
                                <img src="{{ asset('images/dental/odontograma_felino/dientes/d101.png') }}" class="odonto-felino-legend-img" alt="Implante">
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
        .odonto-felino-title {
            color: #7d4bc4;
            font-weight: 700;
        }

        .odonto-felino-card {
            border-radius: 14px;
            overflow: hidden;
        }

        .odonto-felino-body {
            padding: 1.35rem .85rem 1.6rem;
        }

        .odonto-felino-arcada {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            gap: .35rem;
            flex-wrap: nowrap;
        }

        .odonto-felino-arcada-bottom {
            align-items: flex-start;
            margin-top: 3.25rem;
        }

        .odonto-felino-pieza {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-width: 40px;
            flex: 0 0 auto;
        }

        .odonto-felino-gap {
            width: 16px;
            min-width: 16px;
            flex: 0 0 16px;
        }

        .odonto-felino-tooth {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 96px;
        }

        .odonto-felino-img-regular {
            max-height: 88px;
            width: auto;
            max-width: 38px;
        }

        .odonto-felino-img-canine {
            max-height: 92px;
            width: auto;
            max-width: 58px;
        }

        .odonto-felino-codigo {
            color: #364a63;
            font-size: .78rem;
            line-height: 1;
            margin-top: .35rem;
            font-weight: 500;
        }

        .odonto-felino-codigo-top {
            margin-top: 0;
            margin-bottom: .45rem;
        }

        .odonto-felino-mark {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        .odonto-felino-caries {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #ff1f1f;
            box-shadow: 0 0 0 2px rgba(255, 31, 31, 0.16);
        }

        .odonto-felino-implante {
            width: 4px;
            height: 82px;
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

        .odonto-felino-legend-img {
            max-height: 58px;
            width: auto;
        }

        .odonto-felino-legend-box .odonto-felino-implante {
            height: 56px;
        }

        @media (max-width: 1400px) {
            .odonto-felino-arcada {
                gap: .25rem;
            }

            .odonto-felino-pieza {
                min-width: 36px;
            }

            .odonto-felino-gap {
                width: 14px;
                min-width: 14px;
                flex-basis: 14px;
            }

            .odonto-felino-img-regular {
                max-width: 34px;
                max-height: 82px;
            }

            .odonto-felino-img-canine {
                max-width: 52px;
                max-height: 88px;
            }
        }

        @media (max-width: 991.98px) {
            .odonto-felino-body {
                overflow-x: auto;
                padding: 1.25rem;
            }

            .odonto-felino-arcada {
                width: max-content;
                min-width: 100%;
            }
        }
    </style>
@endonce
