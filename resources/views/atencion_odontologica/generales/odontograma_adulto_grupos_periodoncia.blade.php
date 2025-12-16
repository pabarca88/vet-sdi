
@php
    use Illuminate\Support\Str;

    // Crear un array para almacenar el estado final de cada pieza
    $piezasEstado = [];
    if(isset($odontograma_historial)){
        // Agrupar por pieza
        $historialPorPieza = [];
        foreach ($odontograma_historial as $pieza) {
            $codigoPieza = $pieza['pieza'];
            $historialPorPieza[$codigoPieza][] = $pieza;
        }

        foreach ($historialPorPieza as $codigoPieza => $historial) {
            $estadoFinal = 'normal';
            foreach ($historial as $pieza) {
                $tratamiento = $pieza['tratamiento'] ?? '';
                $diagnostico = $pieza['diagnostico'] ?? '';
                $estado = $pieza['estado'] ?? '';

                if (Str::contains($diagnostico, 'Carie')) {
                    $estadoFinal = 'carie';
                }
                // Prioridad: si hay algún implante con estado 0, es ausente
                if (Str::contains(Str::lower($tratamiento), 'implante')) {
                    if ($estado == '0') {
                        $estadoFinal = 'ausente';
                        break; // No importa lo demás, es ausente
                    } else {
                        $estadoFinal = 'implante';
                    }
                }

                // endodoncia
                if (Str::contains(Str::lower($tratamiento), 'endodoncia') ||
                    Str::contains(Str::lower($tratamiento), 'pulpotomia') ||
                    Str::contains(Str::lower($tratamiento), 'pulpectomia')) {
                    $estadoFinal = 'endodoncia';
                }
            }
            $piezasEstado[$codigoPieza] = $estadoFinal;
        }
    }
@endphp

<style>

    .pieza_periodoncia {
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

    .pieza_periodoncia img {
        width: 35px;
        height: 35px;
        object-fit: contain;
        margin-bottom: 5px;
        pointer-events: none;
    }

    .pieza_periodoncia.seleccionada {
        background-color: #a366d1;
        color: #fff;
        border-color: #601886;
    }
</style>

<div class="odontograma">
    <!-- Fila superior (1.8 al 1.1 y 2.1 al 2.8) -->
    <div class="fila">
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
            <div class="pieza_periodoncia" data-pieza_period="{{ $codigoPieza }}" >
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
            <div class="pieza_periodoncia" data-pieza_period="{{ $codigoPieza }}" >
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
            <div class="pieza_periodoncia" data-pieza_period="{{ $codigoPieza }}" >
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
            <div class="pieza_periodoncia" data-pieza_period="{{ $codigoPieza }}" >
                <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                <span>{{ $codigoPieza }}</span>
            </div>
        @endfor
    </div>
</div>


