
@php
    use Illuminate\Support\Str;

    $esMascota = request()->filled('id_mascota');

    // Crear un array para almacenar el estado final de cada pieza
    $piezasEstado = [];
    $fuenteHistorialUrg = collect($odontograma_historial ?? $odontograma ?? []);
    if ($fuenteHistorialUrg->isNotEmpty()) {
        // Agrupar por pieza
        $historialPorPieza = [];
        foreach ($fuenteHistorialUrg as $pieza) {
            $codigoPieza = (string) data_get($pieza, 'pieza', '');
            if ($codigoPieza === '') {
                continue;
            }
            $historialPorPieza[$codigoPieza][] = $pieza;
        }

        foreach ($historialPorPieza as $codigoPieza => $historial) {
            $estadoFinal = 'normal';
            foreach ($historial as $pieza) {
                $tratamiento = Str::lower((string) data_get($pieza, 'tratamiento', data_get($pieza, 'descripcion', '')));
                $diagnostico = Str::lower((string) data_get($pieza, 'diagnostico', ''));
                $estado = (string) data_get($pieza, 'estado', '');

                if (Str::contains($diagnostico, 'carie') || Str::contains($tratamiento, 'carie')) {
                    $estadoFinal = 'carie';
                }
                // Prioridad: si hay algún implante con estado 0, es ausente
                if (Str::contains($tratamiento, 'implante') || Str::contains($diagnostico, 'implante')) {
                    if ($estado === '0') {
                        $estadoFinal = 'ausente';
                        break; // No importa lo demás, es ausente
                    }
                    $estadoFinal = 'implante';
                }

                if (Str::contains($tratamiento, 'endodoncia') ||
                    Str::contains($tratamiento, 'pulpotomia') ||
                    Str::contains($tratamiento, 'pulpectomia')) {
                    $estadoFinal = 'endodoncia';
                }
            }
            $piezasEstado[$codigoPieza] = $estadoFinal;
        }
    }
@endphp

<style>
    .odontograma {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom:20px;
        margin-top:10px;
    }

    .fila {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 5px;
    }

    .pieza_urg {
        border: 1px solid #749ef1;
        background-color: #ddecff;
        text-align: center;
        padding: 8px 5px;
        cursor: pointer;
        border-radius: 13px;
        transition: 0.1s ease;
        font-size:0.85rem;
        color: #2353b5;
        font-weight: 600;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 80px;
        position: relative;
    }

    .pieza_urg img {
        width: 35px;
        height: 35px;
        object-fit: contain;
        margin-bottom: 5px;
        pointer-events: none;
    }

    .pieza_urg.seleccionada {
        background-color: #a366d1;
        color: #fff;
        border-color: #601886;
    }

    .pieza-urg-marca {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
    }

    .pieza-urg-caries {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #ff1f1f;
        box-shadow: 0 0 0 2px rgba(255, 31, 31, 0.2);
    }

    .pieza-urg-implante {
        width: 3px;
        height: 50px;
        background: #111;
        transform: translate(-50%, -50%) rotate(16deg);
        border-radius: 2px;
    }
</style>
@php
    if ($esMascota) {
        $filaSuperior = array_merge(range(109, 101), range(201, 209));
        $filaInferior = array_merge(range(409, 401), range(301, 309));
        $imagenTemporalFelino = 'images/dental/dientes/d11.png';
    }
@endphp
<div class="odontograma">
    @if ($esMascota)
        <div class="fila mb-3">
            @foreach ($filaSuperior as $pieza)
                @php
                    $codigoPieza = (string) $pieza;
                    $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';
                @endphp
                <div class="pieza_urg" data-pieza_urg="{{ $codigoPieza }}">
                    <img src="{{ asset($imagenTemporalFelino) }}" alt="{{ $codigoPieza }}">
                    @if ($estadoPieza === 'carie')
                        <span class="pieza-urg-marca pieza-urg-caries"></span>
                    @endif
                    @if ($estadoPieza === 'implante')
                        <span class="pieza-urg-marca pieza-urg-implante"></span>
                    @endif
                    <span>{{ $codigoPieza }}</span>
                </div>
            @endforeach
        </div>
        <div class="fila">
            @foreach ($filaInferior as $pieza)
                @php
                    $codigoPieza = (string) $pieza;
                    $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';
                @endphp
                <div class="pieza_urg" data-pieza_urg="{{ $codigoPieza }}">
                    <img src="{{ asset($imagenTemporalFelino) }}" alt="{{ $codigoPieza }}">
                    @if ($estadoPieza === 'carie')
                        <span class="pieza-urg-marca pieza-urg-caries"></span>
                    @endif
                    @if ($estadoPieza === 'implante')
                        <span class="pieza-urg-marca pieza-urg-implante"></span>
                    @endif
                    <span>{{ $codigoPieza }}</span>
                </div>
            @endforeach
        </div>
    @else
        <!-- Fila superior (1.8 al 1.1 y 2.1 al 2.8) -->
        <div class="fila mb-3">
            @for($i = 18; $i >= 11; $i--)
                @php
                    $codigoPieza = '1.' . ($i % 10);
                    $codigoPiezaImagen = '1' . ($i % 10);
                    $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                    // Determinar la imagen según el estado para implantología
                    switch ($estadoPieza) {
                        case 'carie':
                            $imagen = "images/dental/dientes/carie/carie{$codigoPiezaImagen}.png";
                            break;
                        case 'ausente':
                            $imagen = "images/dental/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                            break;
                        case 'implante':
                            $imagen = "images/dental/dientes/implante/impl{$codigoPiezaImagen}.png";
                            break;
                        case 'endodoncia':
                            $imagen = "images/dental/dientes/endodoncia/endo{$codigoPiezaImagen}.png";
                            break;
                        default:
                            $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                            break;
                    }
                @endphp
                <div class="pieza_urg" data-pieza_urg="{{ $codigoPieza }}">
                    <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                    <span>{{ $codigoPieza }}</span>
                </div>
            @endfor

            @for($i = 21; $i <= 28; $i++)
                @php
                    $codigoPieza = '2.' . ($i % 10);
                    $codigoPiezaImagen = '2' . ($i % 10);
                    $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                    // Determinar la imagen según el estado para implantología
                    switch ($estadoPieza) {
                        case 'carie':
                            $imagen = "images/dental/dientes/carie/carie{$codigoPiezaImagen}.png";
                            break;
                        case 'ausente':
                            $imagen = "images/dental/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                            break;
                        case 'implante':
                            $imagen = "images/dental/dientes/implante/impl{$codigoPiezaImagen}.png";
                            break;
                        case 'endodoncia':
                            $imagen = "images/dental/dientes/endodoncia/endo{$codigoPiezaImagen}.png";
                            break;
                        default:
                            $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                            break;
                    }
                @endphp
                <div class="pieza_urg" data-pieza_urg="{{ $codigoPieza }}">
                    <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                    <span>{{ $codigoPieza }}</span>
                </div>
            @endfor
        </div>

        <!-- Fila inferior (4.8 al 4.1 y 3.1 al 3.8) -->
        <div class="fila">
            @for($i = 48; $i >= 41; $i--)
                @php
                    $codigoPieza = '4.' . ($i % 10);
                    $codigoPiezaImagen = '4' . ($i % 10);
                    $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                    // Determinar la imagen según el estado para implantología
                    switch ($estadoPieza) {
                        case 'carie':
                            $imagen = "images/dental/dientes/carie/carie{$codigoPiezaImagen}.png";
                            break;
                        case 'ausente':
                            $imagen = "images/dental/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                            break;
                        case 'implante':
                            $imagen = "images/dental/dientes/implante/impl{$codigoPiezaImagen}.png";
                            break;
                        case 'endodoncia':
                            $imagen = "images/dental/dientes/endodoncia/endo{$codigoPiezaImagen}.png";
                            break;
                        default:
                            $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                            break;
                    }
                @endphp
                <div class="pieza_urg" data-pieza_urg="{{ $codigoPieza }}">
                    <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                    <span>{{ $codigoPieza }}</span>
                </div>
            @endfor

            @for($i = 31; $i <= 38; $i++)
                @php
                    $codigoPieza = '3.' . ($i % 10);
                    $codigoPiezaImagen = '3' . ($i % 10);
                    $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                    // Determinar la imagen según el estado para implantología
                    switch ($estadoPieza) {
                        case 'carie':
                            $imagen = "images/dental/dientes/carie/carie{$codigoPiezaImagen}.png";
                            break;
                        case 'ausente':
                            $imagen = "images/dental/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                            break;
                        case 'implante':
                            $imagen = "images/dental/dientes/implante/impl{$codigoPiezaImagen}.png";
                            break;
                        case 'endodoncia':
                            $imagen = "images/dental/dientes/endodoncia/endo{$codigoPiezaImagen}.png";
                            break;
                        default:
                            $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                            break;
                    }
                @endphp
                <div class="pieza_urg" data-pieza_urg="{{ $codigoPieza }}">
                    <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                    <span>{{ $codigoPieza }}</span>
                </div>
            @endfor
        </div>
    @endif
</div>
