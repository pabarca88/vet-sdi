@php
    use Illuminate\Support\Str;

    $nombreEspecieMascota = strtolower(trim(
        (string) (
            optional(optional($mascota ?? $paciente ?? null)->especieMascota)->nombre
            ?? optional($mascota ?? $paciente ?? null)->especie
            ?? ''
        )
    ));

    $esCanino = Str::contains($nombreEspecieMascota, ['canin', 'perro']);
    $esFelino = Str::contains($nombreEspecieMascota, ['felin', 'gato']);

    $arcadaSuperiorMascota = $esCanino
        ? [110, 109, 108, 107, 106, 105, 104, 103, 102, 101, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210]
        : [109, 108, 107, 106, null, 104, 103, 102, 101, 201, 202, 203, 204, null, 206, 207, 208, 209];
    $arcadaInferiorMascota = $esCanino
        ? [411, 410, 409, 408, 407, 406, 405, 404, 403, 402, 401, 301, 302, 303, 304, 305, 306, 307, 308, 309, 310, 311]
        : [409, 408, 407, null, 404, 403, 402, 401, 301, 302, 303, 304, null, 307, 308, 309];

    $baseImagenMascota = $esCanino
        ? 'images/dental/odontograma_canino'
        : 'images/dental/odontograma_felino/dientes';
    $tituloOdontogramaMascota = $esCanino ? 'Odontograma Canino' : 'Odontograma Felino';
    $piezasCaninasAnchas = ['104', '204', '304', '404'];

    $piezasEstadoMascota = [];
    $fuenteHistorialMascota = collect($odontograma_historial ?? $odontograma ?? []);

    foreach ($fuenteHistorialMascota as $registro) {
        $piezaCodigo = (string) data_get($registro, 'pieza', '');
        if ($piezaCodigo === '') {
            continue;
        }

        $diagnostico = Str::lower((string) data_get($registro, 'diagnostico', ''));
        $tratamiento = Str::lower((string) data_get($registro, 'tratamiento', ''));

        if (!isset($piezasEstadoMascota[$piezaCodigo])) {
            $piezasEstadoMascota[$piezaCodigo] = [
                'carie' => false,
                'implante' => false,
            ];
        }

        if (Str::contains($diagnostico, 'carie') || Str::contains($tratamiento, 'carie')) {
            $piezasEstadoMascota[$piezaCodigo]['carie'] = true;
        }

        if (Str::contains($tratamiento, 'implante') || Str::contains($diagnostico, 'implante')) {
            $piezasEstadoMascota[$piezaCodigo]['implante'] = true;
        }
    }
@endphp

@php
    $renderPiezaMascota = function ($piezaCodigo, $mostrarCodigoArriba = false) use ($piezasEstadoMascota, $baseImagenMascota, $piezasCaninasAnchas) {
        $piezaCodigo = (string) $piezaCodigo;
        $estadoPieza = $piezasEstadoMascota[$piezaCodigo] ?? ['carie' => false, 'implante' => false];
        $rutaImagen = asset("{$baseImagenMascota}/d{$piezaCodigo}.png");
        $claseAncho = in_array($piezaCodigo, $piezasCaninasAnchas, true)
            ? 'odonto-mascota-img-canine'
            : 'odonto-mascota-img-regular';

        ob_start();
@endphp
<div class="odonto-mascota-pieza">
    @if ($mostrarCodigoArriba)
        <span class="odonto-mascota-codigo odonto-mascota-codigo-top">{{ $piezaCodigo }}</span>
    @endif
    <div class="odonto-mascota-tooth" id="t{{ $piezaCodigo }}">
        <img
            src="{{ $rutaImagen }}"
            class="img-fluid {{ $claseAncho }}"
            alt="Pieza {{ $piezaCodigo }}"
            role="button"
            onclick="info_odontograma('{{ $piezaCodigo }}');"
        >
        @if ($estadoPieza['carie'])
            <span class="odonto-mascota-mark odonto-mascota-caries"></span>
        @endif
        @if ($estadoPieza['implante'])
            <span class="odonto-mascota-mark odonto-mascota-implante"></span>
        @endif
    </div>
    @if (!$mostrarCodigoArriba)
        <span class="odonto-mascota-codigo">{{ $piezaCodigo }}</span>
    @endif
</div>
@php
        return ob_get_clean();
    };
@endphp

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
        <h1 class="mt-1 mb-0 f-22 odonto-mascota-title d-inline">{{ $tituloOdontogramaMascota }}</h1>
        <button type="button" data-toggle="modal" data-target="#exampleModalMascota" class="btn btn-purple d-inline float-md-right mr-2">
            Ver simbología
        </button>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-informacion odonto-mascota-card">
            <div class="card-body odonto-mascota-body">
                <div class="odonto-mascota-arcada odonto-mascota-arcada-top">
                    @foreach ($arcadaSuperiorMascota as $pieza)
                        @if ($pieza === null)
                            <div class="odonto-mascota-gap" aria-hidden="true"></div>
                        @else
                            {!! $renderPiezaMascota($pieza) !!}
                        @endif
                    @endforeach
                </div>

                <div class="odonto-mascota-arcada odonto-mascota-arcada-bottom">
                    @foreach ($arcadaInferiorMascota as $pieza)
                        @if ($pieza === null)
                            <div class="odonto-mascota-gap" aria-hidden="true"></div>
                        @else
                            {!! $renderPiezaMascota($pieza, true) !!}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalMascota" tabindex="-1" aria-hidden="true">
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
                            <div class="odonto-mascota-legend-box mr-2">
                                <img src="{{ asset("{$baseImagenMascota}/d101.png") }}" class="odonto-mascota-legend-img" alt="Diente">
                            </div>
                            <div class="media-body">
                                <strong>Pieza normal</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="media align-middle">
                            <div class="odonto-mascota-legend-box mr-2 position-relative">
                                <img src="{{ asset("{$baseImagenMascota}/d101.png") }}" class="odonto-mascota-legend-img" alt="Caries">
                                <span class="odonto-mascota-mark odonto-mascota-caries"></span>
                            </div>
                            <div class="media-body">
                                <strong>Caries</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="media align-middle">
                            <div class="odonto-mascota-legend-box mr-2 position-relative">
                                <img src="{{ asset("{$baseImagenMascota}/d101.png") }}" class="odonto-mascota-legend-img" alt="Implante">
                                <span class="odonto-mascota-mark odonto-mascota-implante"></span>
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
        .odonto-mascota-title {
            color: #7d4bc4;
            font-weight: 700;
        }

        .odonto-mascota-card {
            border-radius: 14px;
            overflow: hidden;
        }

        .odonto-mascota-body {
            padding: 1.35rem .85rem 1.6rem;
        }

        .odonto-mascota-arcada {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            gap: .35rem;
            flex-wrap: nowrap;
        }

        .odonto-mascota-arcada-bottom {
            align-items: flex-start;
            margin-top: 3.25rem;
        }

        .odonto-mascota-pieza {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-width: 40px;
            flex: 0 0 auto;
        }

        .odonto-mascota-gap {
            width: 16px;
            min-width: 16px;
            flex: 0 0 16px;
        }

        .odonto-mascota-tooth {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 96px;
        }

        .odonto-mascota-img-regular {
            max-height: 88px;
            width: auto;
            max-width: 38px;
        }

        .odonto-mascota-img-canine {
            max-height: 92px;
            width: auto;
            max-width: 58px;
        }

        .odonto-mascota-codigo {
            color: #364a63;
            font-size: .78rem;
            line-height: 1;
            margin-top: .35rem;
            font-weight: 500;
        }

        .odonto-mascota-codigo-top {
            margin-top: 0;
            margin-bottom: .45rem;
        }

        .odonto-mascota-mark {
            position: absolute;
            inset: 50% auto auto 50%;
            transform: translate(-50%, -50%);
            border-radius: 999px;
            pointer-events: none;
        }

        .odonto-mascota-caries {
            width: 14px;
            height: 14px;
            background: rgba(220, 53, 69, .88);
            box-shadow: 0 0 0 4px rgba(220, 53, 69, .18);
        }

        .odonto-mascota-implante {
            width: 0;
            height: 0;
            border-left: 9px solid transparent;
            border-right: 9px solid transparent;
            border-top: 18px solid rgba(23, 162, 184, .9);
            border-radius: 2px;
        }

        .odonto-mascota-legend-box {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            background: #f4f7fb;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .odonto-mascota-legend-img {
            max-height: 46px;
            width: auto;
            max-width: 46px;
        }

        @media (max-width: 1199px) {
            .odonto-mascota-body {
                overflow-x: auto;
            }

            .odonto-mascota-arcada {
                justify-content: flex-start;
                min-width: max-content;
                padding-bottom: .35rem;
            }
        }
    </style>
@endonce
