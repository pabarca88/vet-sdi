
@php
    use Illuminate\Support\Str;

    // Crear un array para almacenar el estado final de cada pieza para rehabilitación
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
                
                // Prioridad para rehabilitación: implante con corona o prótesis
                if (Str::contains(Str::lower($tratamiento), 'implante')) {
                    if ($estado == '0') {
                        $estadoFinal = 'ausente';
                        break; // No importa lo demás, es ausente
                    } else {
                        $estadoFinal = 'implante';
                    }
                }

                // Tratamientos de rehabilitación específicos
                if (Str::contains(Str::lower($tratamiento), 'corona')) {
                    $estadoFinal = 'corona';
                }
                if (Str::contains(Str::lower($tratamiento), 'protesis')) {
                    $estadoFinal = 'protesis';
                }
                if (Str::contains(Str::lower($tratamiento), 'perno')) {
                    $estadoFinal = 'perno_munon';
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
    .odontograma {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom:20px;
        margin-top:10px;
    }

    .fila {
        display: grid;
        grid-template-columns: repeat(16, 1fr);
        gap: 8px;
    }

    .pieza_implantologia_rehab {
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

    .pieza_implantologia_rehab img {
        width: 35px;
        height: 35px;
        object-fit: contain;
        margin-bottom: 5px;
        pointer-events: none;
    }

    .pieza_implantologia_rehab.seleccionada {
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

                // Determinar la imagen según el estado para rehabilitación
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
                    case 'corona':
                        $imagen = "images/dental/dientes/corona/hecho/corona_{$codigoPiezaImagen}.png";
                        break;
                    case 'protesis':
                        $imagen = "images/dental/dientes/protesis-removible/p_removible{$codigoPiezaImagen}.png";
                        break;
                    case 'perno_munon':
                        $imagen = "images/dental/dientes/perno-munon/hecho/perno_munon_{$codigoPiezaImagen}.png";
                        break;
                    case 'endodoncia':
                        $imagen = "images/dental/dientes/endodoncia/endo{$codigoPiezaImagen}.png";
                        break;
                    default:
                        $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                        break;
                }
            @endphp
            <div class="pieza_implantologia_rehab" data-pieza_impl_rehab="{{ $codigoPieza }}" >
                <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                <span>{{ $codigoPieza }}</span>
            </div>
        @endfor

        @for($i = 21; $i <= 28; $i++)
            @php
                $codigoPieza = '2.' . ($i % 10);
                $codigoPiezaImagen = '2' . ($i % 10);
                $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                // Determinar la imagen según el estado para rehabilitación
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
                    case 'corona':
                        $imagen = "images/dental/dientes/corona/hecho/corona_{$codigoPiezaImagen}.png";
                        break;
                    case 'protesis':
                        $imagen = "images/dental/dientes/protesis-removible/p_removible{$codigoPiezaImagen}.png";
                        break;
                    case 'perno_munon':
                        $imagen = "images/dental/dientes/perno-munon/hecho/perno_munon_{$codigoPiezaImagen}.png";
                        break;
                    case 'endodoncia':
                        $imagen = "images/dental/dientes/endodoncia/endo{$codigoPiezaImagen}.png";
                        break;
                    default:
                        $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                        break;
                }
            @endphp
            <div class="pieza_implantologia_rehab" data-pieza_impl_rehab="{{ $codigoPieza }}" >
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

                // Determinar la imagen según el estado para rehabilitación
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
                    case 'corona':
                        $imagen = "images/dental/dientes/corona/hecho/corona_{$codigoPiezaImagen}.png";
                        break;
                    case 'protesis':
                        $imagen = "images/dental/dientes/protesis-removible/p_removible{$codigoPiezaImagen}.png";
                        break;
                    case 'perno_munon':
                        $imagen = "images/dental/dientes/perno-munon/hecho/perno_munon_{$codigoPiezaImagen}.png";
                        break;
                    case 'endodoncia':
                        $imagen = "images/dental/dientes/endodoncia/endo{$codigoPiezaImagen}.png";
                        break;
                    default:
                        $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                        break;
                }
            @endphp
            <div class="pieza_implantologia_rehab" data-pieza_impl_rehab="{{ $codigoPieza }}" >
                <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                <span>{{ $codigoPieza }}</span>
            </div>
        @endfor

        @for($i = 31; $i <= 38; $i++)
            @php
                $codigoPieza = '3.' . ($i % 10);
                $codigoPiezaImagen = '3' . ($i % 10);
                $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                // Determinar la imagen según el estado para rehabilitación
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
                    case 'corona':
                        $imagen = "images/dental/dientes/corona/hecho/corona_{$codigoPiezaImagen}.png";
                        break;
                    case 'protesis':
                        $imagen = "images/dental/dientes/protesis-removible/p_removible{$codigoPiezaImagen}.png";
                        break;
                    case 'perno_munon':
                        $imagen = "images/dental/dientes/perno-munon/hecho/perno_munon_{$codigoPiezaImagen}.png";
                        break;
                    case 'endodoncia':
                        $imagen = "images/dental/dientes/endodoncia/endo{$codigoPiezaImagen}.png";
                        break;
                    default:
                        $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                        break;
                }
            @endphp
            <div class="pieza_implantologia_rehab" data-pieza_impl_rehab="{{ $codigoPieza }}" >
                <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                <span>{{ $codigoPieza }}</span>
            </div>
        @endfor
    </div>
</div>


