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
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
        <h1 class="text-c-blue mt-1 mb-1 f-22 d-inline">Odontograma Adulto</h1>
        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-purple d-inline float-md-right mr-2">Ver simbología</button>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-informacion">
            <div class="card-body">
                <!--ODONTOGRAMA SUPERIOR ADULTOS-->
                <div class="col-md-12 d-flex flex-row align-items-end justify-content-center mt-3">
                    @foreach (range(18, 11) as $i)
                        @php
                            $codigoPieza = '1.' . ($i % 10); // Genera códigos 3.1, 3.2, ..., 3.8
                            $codigoPiezaImagen = '1' . ($i % 10); // Para las imágenes
                            $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                            // Determinar la imagen según el estado
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

                        <div class="text-center mx-1">

                            <div class="diente_adulto" id="t{{ $codigoPieza }}">
                                <img src="{{ asset($imagen) }}" class="wid-60 img-fluid" role="button"
                                    onclick="info_odontograma('{{ $codigoPieza }}');">
                            </div>
                            <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2 font-weight-bold">{{ $codigoPieza }}</label>
                        </div>
                    @endforeach
                    {{-- Piezas 2.1 - 2.8 --}}
                    @foreach (range(21, 28) as $i)
                        @php
                            $codigoPieza = '2.' . ($i % 10); // Genera códigos 2.1, 2.2, ..., 2.8
                            $codigoPiezaImagen = '2' . ($i % 10); // Para las imágenes
                            $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                            // Determinar la imagen según el estado
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

                        <div class="text-center mx-1">

                            <div class="diente_adulto" id="t{{ $codigoPieza }}">
                                <img src="{{ asset($imagen) }}" class="wid-60 img-fluid" role="button"
                                    onclick="info_odontograma('{{ $codigoPieza }}');">
                            </div>
                            <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2 font-weight-bold">{{ $codigoPieza }}</label>
                        </div>
                    @endforeach
                </div>
                <!--ODONTOGRAMA INFERIOR ADULTOS-->
                <div class="col-md-12 d-flex flex-row align-items-start justify-content-center mt-5">
                    @foreach (range(48, 41) as $i)
                        @php
                            $codigoPieza = '4.' . ($i % 10); // Genera códigos 4.1, 4.2, ..., 4.8
                            $codigoPiezaImagen = '4' . ($i % 10); // Para las imágenes
                            $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal'; // Estado preprocesado en PHP principal

                            // Determinar la imagen según el estado
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

                        <div class="text-center mx-1">
                            <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2 font-weight-bold">{{ $codigoPieza }}</label>
                            <div class="diente_adulto" id="t{{ $codigoPieza }}">
                                <img src="{{ asset($imagen) }}" class="wid-60 img-fluid" role="button"
                                    onclick="info_odontograma('{{ $codigoPieza }}');">
                            </div>

                        </div>
                    @endforeach
                    @foreach (range(31, 38) as $i)
                    @php
                        $codigoPieza = '3.' . ($i % 10); // Genera códigos 3.1, 3.2, ..., 3.8
                        $codigoPiezaImagen = '3' . ($i % 10); // Para las imágenes
                        $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal'; // Estado preprocesado en PHP principal

                        // Determinar la imagen según el estado
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

                    <div class="text-center mx-1">
                        <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent font-weight-bold mt-2">{{ $codigoPieza }}</label>
                        <div class="diente_adulto" id="t{{ $codigoPieza }}">
                            <img src="{{ asset($imagen) }}" class="wid-60 img-fluid" role="button"
                                onclick="info_odontograma('{{ $codigoPieza }}');">
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--SIMBOLOGIA ADULTO-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Simbología del odontograma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/diente-sano/diente-sano15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Diente sano</h6>
                  </div>
            </div>
        </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/diente-ausente/dau15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Diente ausente</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/extraccion/porhacer/extraccion_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Extracción</h6>
                  </div>
            </div>
        </div>
         <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/fractura/fractura_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Fractura</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/impactado/impactado_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Diente Impactado</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/carie/carie15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Caries</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/endodoncia/endo15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Endodoncia</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/pulpotomia/pulpotomia15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Pulpotomía</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/pulpectomia/pulpectomia_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Pulpectomía</h6>
                  </div>
            </div>
        </div>
         <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/implante/impl15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Implante</h6>
                  </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/movilidad/movilidad_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Movilidad</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/perno-munon/hecho/perno_munon_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Perno muñón</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/corona/hecho/corona_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Corona</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/corona-provisoria/hecho/cp_hecho_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Corona provisoria</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/corona_mal_estado/c_malestado15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Corona en mal estado</h6>
                  </div>
            </div>
        </div>
       
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/protesis-removible/p_removible15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Prótesis removible</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/residuo-radicular/hecho/rr_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Resto radicular</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/ribbond/hecho/ribbond_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Ribbond</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/sellante/sellante_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Sellante</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/surco/surco_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Surco</h6>
                  </div>
            </div>
        </div>
         <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/atricion/atricion15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Atrición</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/abrasion/abrasion15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Abrasión</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/abfraccion/abfraccion15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Abfracción</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/erosion/erosion15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Erosión</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/obturacion/obturacion15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Obturación</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/ortodoncia/ortodoncia15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Ortodoncia</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/fluor/fluor15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Fluor</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/otro-tto/otro-tto15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Otro Tratamiento</h6>
                  </div>
            </div>
        </div>
         <!--<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="media align-middle">
                  <img src="" class="align-self-center wid-40 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-4"></h6>
                  </div>
            </div>
        </div>-->

        <!-------------->

        </div>
    </div>
  </div>
</div>
</div>
