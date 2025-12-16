@php
    use Illuminate\Support\Str;

    // Crear un array para almacenar el estado final de cada pieza pediátrica
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
                if (Str::contains($diagnostico, 'Fractura')) {
                    $estadoFinal = 'fractura';
                }
                // Para odontopediatría no hay implantes, pero mantenemos extracción
                if (Str::contains(Str::lower($tratamiento), 'extraccion')) {
                    if ($estado == '0') {
                        $estadoFinal = 'ausente';
                        break;
                    }
                }

                // Tratamientos específicos de odontopediatría
                if (Str::contains(Str::lower($tratamiento), 'pulpotomia')) {
                    $estadoFinal = 'pulpotomia';
                }
                if (Str::contains(Str::lower($tratamiento), 'pulpectomia')) {
                    $estadoFinal = 'pulpectomia';
                }
                if (Str::contains(Str::lower($tratamiento), 'corona')) {
                    $estadoFinal = 'corona_acero';
                }
                if (Str::contains(Str::lower($tratamiento), 'obturación')) {
                    $estadoFinal = 'obturacion';
                }
                if (Str::contains(Str::lower($tratamiento), 'sellante')) {
                    $estadoFinal = 'sellante';
                }
                if (Str::contains(Str::lower($tratamiento), 'fluor')) {
                    $estadoFinal = 'fluor';
                }
            }
            $piezasEstado[$codigoPieza] = $estadoFinal;
        }
    }
@endphp


                <!--ODONTOGRAMA SUPERIOR PEDIÁTRICO-->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                    <div class="d-flex flex-row align-items-end justify-content-center">
                        @foreach (range(55, 51) as $i)
                            @php
                                $codigoPieza = '5.' . ($i % 10);
                                $codigoPiezaImagen = '5' . ($i % 10);
                                $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                                // Determinar la imagen según el estado para dientes pediátricos
                                switch ($estadoPieza) {
                                    case 'carie':
                                        $imagen = "images/dental/odontopediatria/carie/carie{$codigoPiezaImagen}.png";
                                        break;
                                    case 'ausente':
                                        $imagen = "images/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                                        break;
                                    case 'pulpotomia':
                                        $imagen = "images/dientes/pulpotomia/pulpotomia{$codigoPiezaImagen}.png";
                                        break;
                                    case 'pulpectomia':
                                        $imagen = "images/dientes/pulpectomia/pulpectomia_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'corona_acero':
                                        $imagen = "images/dientes/corona/hecho/corona_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'obturacion':
                                        $imagen = "images/dental/odontopediatria/obturacion/obturacion{$codigoPiezaImagen}.png";
                                        break;
                                    case 'sellante':
                                        $imagen = "images/dientes/sellante/sellante_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'fluor':
                                        $imagen = "images/dental/odontopediatria/fluor/fluor{$codigoPiezaImagen}.png";
                                        break;
                                    case 'fractura':
                                        $imagen = "images/dental/odontopediatria/fractura/fractura{$codigoPiezaImagen}.png";
                                        break;
                                    default:
                                        $imagen = "images/dientes/d{$codigoPiezaImagen}.png";
                                        break;
                                }
                                
                                $marginClass = ($i == 55) ? 'mr-4' : (($i == 54) ? 'mx-2' : 'mx-1');
                            @endphp

                            <div class="text-center {{ $marginClass }}" onclick="info_odontograma('{{ $codigoPieza }}');" style="cursor: pointer;">
                                <div class="diente_pediatrico" id="t{{ $codigoPieza }}">
                                    <img src="{{ asset($imagen) }}" class="wid-70 img-fluid" style="pointer-events: none;">
                                </div>
                                <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2 font-weight-bold">{{ $codigoPieza }}</label>
                            </div>
                        @endforeach

                        @foreach (range(61, 65) as $i)
                            @php
                                $codigoPieza = '6.' . ($i % 10);
                                $codigoPiezaImagen = '6' . ($i % 10);
                                $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                                switch ($estadoPieza) {
                                    case 'carie':
                                        $imagen = "images/dental/odontopediatria/carie/carie{$codigoPiezaImagen}.png";
                                        break;
                                    case 'ausente':
                                        $imagen = "images/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                                        break;
                                    case 'pulpotomia':
                                        $imagen = "images/dientes/pulpotomia/pulpotomia{$codigoPiezaImagen}.png";
                                        break;
                                    case 'pulpectomia':
                                        $imagen = "images/dientes/pulpectomia/pulpectomia_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'corona_acero':
                                        $imagen = "images/dientes/corona/hecho/corona_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'obturacion':
                                        $imagen = "images/dental/odontopediatria/obturacion/obturacion{$codigoPiezaImagen}.png";
                                        break;
                                    case 'sellante':
                                        $imagen = "images/dientes/sellante/sellante_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'fluor':
                                        $imagen = "images/dental/odontopediatria/fluor/fluor{$codigoPiezaImagen}.png";
                                        break;
                                    case 'fractura':
                                        $imagen = "images/dental/odontopediatria/fractura/fractura{$codigoPiezaImagen}.png";
                                        break;
                                    default:
                                        $imagen = "images/dientes/d{$codigoPiezaImagen}.png";
                                        break;
                                }
                                
                                $marginClass = ($i == 65) ? 'ml-4' : (($i == 64) ? 'mx-2' : 'mx-1');
                            @endphp

                            <div class="text-center {{ $marginClass }}" onclick="info_odontograma('{{ $codigoPieza }}');" style="cursor: pointer;">
                                <div class="diente_pediatrico" id="t{{ $codigoPieza }}">
                                    <img src="{{ asset($imagen) }}" class="wid-70 img-fluid" style="pointer-events: none;">
                                </div>
                                <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2 font-weight-bold">{{ $codigoPieza }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!--ODONTOGRAMA INFERIOR PEDIÁTRICO-->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                    <div class="d-flex flex-row align-items-end justify-content-center">
                        @foreach (range(85, 81) as $i)
                            @php
                                $codigoPieza = '8.' . ($i % 10);
                                $codigoPiezaImagen = '8' . ($i % 10);
                                $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                                switch ($estadoPieza) {
                                    case 'carie':
                                        $imagen = "images/dental/odontopediatria/carie/carie{$codigoPiezaImagen}.png";
                                        break;
                                    case 'ausente':
                                        $imagen = "images/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                                        break;
                                    case 'pulpotomia':
                                        $imagen = "images/dientes/pulpotomia/pulpotomia{$codigoPiezaImagen}.png";
                                        break;
                                    case 'pulpectomia':
                                        $imagen = "images/dientes/pulpectomia/pulpectomia_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'corona_acero':
                                        $imagen = "images/dientes/corona/hecho/corona_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'obturacion':
                                        $imagen = "images/dental/odontopediatria/obturacion/obturacion{$codigoPiezaImagen}.png";
                                        break;
                                    case 'sellante':
                                        $imagen = "images/dientes/sellante/sellante_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'fluor':
                                        $imagen = "images/dental/odontopediatria/fluor/fluor{$codigoPiezaImagen}.png";
                                        break;
                                    case 'fractura':
                                        $imagen = "images/dental/odontopediatria/fractura/fractura{$codigoPiezaImagen}.png";
                                        break;
                                    default:
                                        $imagen = "images/dientes/d{$codigoPiezaImagen}.png";
                                        break;
                                }
                                
                                $marginClass = ($i == 85) ? 'mr-4' : (($i == 84) ? 'mx-2' : 'mx-1');
                            @endphp

                            <div class="text-center {{ $marginClass }}" onclick="info_odontograma('{{ $codigoPieza }}');" style="cursor: pointer;">
                                <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2 font-weight-bold">{{ $codigoPieza }}</label>
                                <div class="diente_pediatrico" id="t{{ $codigoPieza }}">
                                    <img src="{{ asset($imagen) }}" class="wid-70 img-fluid" style="pointer-events: none;">
                                </div>
                            </div>
                        @endforeach

                        @foreach (range(71, 75) as $i)
                            @php
                                $codigoPieza = '7.' . ($i % 10);
                                $codigoPiezaImagen = '7' . ($i % 10);
                                $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                                switch ($estadoPieza) {
                                    case 'carie':
                                        $imagen = "images/dental/odontopediatria/carie/carie{$codigoPiezaImagen}.png";
                                        break;
                                    case 'ausente':
                                        $imagen = "images/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                                        break;
                                    case 'pulpotomia':
                                        $imagen = "images/dientes/pulpotomia/pulpotomia{$codigoPiezaImagen}.png";
                                        break;
                                    case 'pulpectomia':
                                        $imagen = "images/dientes/pulpectomia/pulpectomia_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'corona_acero':
                                        $imagen = "images/dientes/corona/hecho/corona_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'obturacion':
                                        $imagen = "images/dental/odontopediatria/obturacion/obturacion{$codigoPiezaImagen}.png";
                                        break;
                                    case 'sellante':
                                        $imagen = "images/dientes/sellante/sellante_{$codigoPiezaImagen}.png";
                                        break;
                                    case 'fluor':
                                        $imagen = "images/dental/odontopediatria/fluor/fluor{$codigoPiezaImagen}.png";
                                        break;
                                    case 'fractura':
                                        $imagen = "images/dental/odontopediatria/fractura/fractura{$codigoPiezaImagen}.png";
                                        break;
                                    default:
                                        $imagen = "images/dientes/d{$codigoPiezaImagen}.png";
                                        break;
                                }
                                
                                $marginClass = ($i == 75) ? 'ml-4' : (($i == 74) ? 'mx-2' : 'mx-1');
                            @endphp

                            <div class="text-center {{ $marginClass }}" onclick="info_odontograma('{{ $codigoPieza }}');" style="cursor: pointer;">
                                <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2 font-weight-bold">{{ $codigoPieza }}</label>
                                <div class="diente_pediatrico" id="t{{ $codigoPieza }}">
                                    <img src="{{ asset($imagen) }}" class="wid-70 img-fluid" style="pointer-events: none;">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


