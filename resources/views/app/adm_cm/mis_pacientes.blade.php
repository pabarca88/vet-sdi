@extends('template.adm_cm.template')

@section('content')
    @php
        $contextosCentro = $contextosCentro ?? collect();
        $contextoActivo = $contextoActivo ?? [];
        $search = $search ?? '';
    @endphp

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('adm_cm.home', ['contexto' => $contextoActivo['key'] ?? null]) }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Mascotas y responsables</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center bg-info">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg mb-1 align-botton d-flex justify-content-between">
                                <div class="text-left">
                                    <h4 class="text-white f-20 d-inline ml-4 mt-1 float-left mb-0">Mascotas y responsables</h4>
                                    <div class="clearfix"></div>
                                    <small class="text-white-50 ml-4">
                                        {{ $contextoActivo['label'] ?? ($institucion->nombre ?? 'Sin contexto') }}
                                    </small>
                                </div>
                                <button class="btn btn-purple btn-sm d-inline float-md-right" type="button" onclick="abrirMensajeDifusionResponsables()">
                                    <i class="feather icon-mail"></i> Enviar mensaje de difusión
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('adm_cm.pacientes') }}" class="mb-4">
                            <div class="form-row align-items-end">
                                <div class="col-md-4 mb-2">
                                    <label class="floating-label-activo-sm mb-0">Institución / Sucursal</label>
                                    <select name="contexto" class="form-control form-control-sm">
                                        @forelse ($contextosCentro as $contexto)
                                            <option value="{{ $contexto['key'] ?? '' }}" @selected(($contextoActivo['key'] ?? '') === ($contexto['key'] ?? ''))>
                                                {{ $contexto['label'] ?? 'Sin contexto' }}
                                            </option>
                                        @empty
                                            <option value="">Sin contexto</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="floating-label-activo-sm mb-0">Buscador</label>
                                    <input
                                        type="text"
                                        name="q"
                                        value="{{ $search }}"
                                        class="form-control form-control-sm"
                                        placeholder="Buscar por nombre del responsable, RUT o nombre de mascota">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <button type="submit" class="btn btn-info btn-sm btn-block">
                                        <i class="feather icon-search"></i> Buscar
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Mascota</th>
                                        <th class="align-middle">Responsable</th>
                                        <th class="align-middle">Especie</th>
                                        <th class="align-middle">Raza</th>
                                        <th class="align-middle">Convenio</th>
                                        <th class="align-middle">Chip-Tatuaje</th>
                                        <th class="align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mascotas as $mascota)
                                        @php
                                            $responsable = $mascota->Responsable;
                                            $nombreResponsable = trim(collect([
                                                optional($responsable)->nombres,
                                                optional($responsable)->apellido_uno,
                                                optional($responsable)->apellido_dos,
                                            ])->filter()->implode(' '));
                                            $rutResponsable = optional($responsable)->rut;
                                            $responsableTexto = $nombreResponsable !== ''
                                                ? $nombreResponsable . ($rutResponsable ? '<br>' . $rutResponsable : '')
                                                : '-';
                                            $especie = optional($mascota->especieMascota)->nombre ?? $mascota->especie ?? '-';
                                            $raza = optional($mascota->razaMascota)->nombre ?? $mascota->otra_especie ?? '-';
                                            $convenio = optional(optional($responsable)->Prevision)->nombre ?? '-';
                                            $chip = $mascota->tiene_chip ? ($mascota->chip ?: 'Si') : 'No';
                                            $fotoMascota = $mascota->foto_perfil ?: ($mascota->sexo === 'M' ? asset('images/iconos/paciente-m.svg') : asset('images/iconos/paciente-f.svg'));
                                            $sexoMascota = $mascota->sexo === 'M' ? 'Macho' : ($mascota->sexo === 'F' ? 'Hembra' : ($mascota->sexo ?? 'Sin registro'));
                                            $tamanoMascota = optional($mascota->tamanoMascota)->nombre ?? $mascota->tamano ?? 'Sin registro';
                                            $galeriaMascota = [];
                                            if (is_array($mascota->galeria)) {
                                                foreach ($mascota->galeria as $bloque) {
                                                    if (is_array($bloque)) {
                                                        foreach ($bloque as $item) {
                                                            if (is_string($item) && $item !== '') {
                                                                $galeriaMascota[] = $item;
                                                            } elseif (is_array($item)) {
                                                                foreach ($item as $sub) {
                                                                    if (is_string($sub) && $sub !== '') {
                                                                        $galeriaMascota[] = $sub;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    } elseif (is_string($bloque) && $bloque !== '') {
                                                        $galeriaMascota[] = $bloque;
                                                    }
                                                }
                                            }
                                            $galeriaMascota = array_values(array_unique($galeriaMascota));
                                        @endphp
                                        <tr>
                                            <td class="align-middle">{{ $mascota->nombre ?? '-' }}</td>
                                            <td class="align-middle">{!! $responsableTexto !!}</td>
                                            <td class="align-middle">{{ $especie }}</td>
                                            <td class="align-middle">{{ $raza }}</td>
                                            <td class="align-middle">{{ $convenio }}</td>
                                            <td class="align-middle">{{ $chip }}</td>
                                            <td class="align-middle">
                                                <button type="button" class="btn btn-info btn-xxs js-ver-mascota"
                                                    data-toggle="modal" data-target="#modalMascotaDetalle"
                                                    data-nombre="{{ $mascota->nombre ?? 'Mascota' }}"
                                                    data-especie="{{ $especie }}"
                                                    data-raza="{{ $raza }}"
                                                    data-tamano="{{ $tamanoMascota }}"
                                                    data-sexo="{{ $sexoMascota }}"
                                                    data-fecha="{{ $mascota->fecha_nacimiento ?? 'Sin registro' }}"
                                                    data-chip="{{ $chip }}"
                                                    data-esterilizado="{{ $mascota->esterilizado ? 'Si' : 'No' }}"
                                                    data-esterilizacion="{{ $mascota->fecha_esterilizacion ?? 'Sin registro' }}"
                                                    data-enfermedad="{{ $mascota->enfermedad_cronica ?? 'Sin registro' }}"
                                                    data-foto="{{ $fotoMascota }}"
                                                    data-galeria='@json($galeriaMascota)'>
                                                    <i class="feather icon-eye"></i> Ver mascota
                                                </button>
                                                <a href="{{ route('profesional.mascota.ficha_veterinaria', ['mascota' => $mascota->id]) }}"
                                                    class="btn btn-purple btn-xxs">
                                                    <i class="feather icon-file-text"></i> Ver ficha veterinaria
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No hay mascotas ni responsables para el contexto activo.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalMascotaDetalle" tabindex="-1" role="dialog" aria-labelledby="modalMascotaDetalleLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white mt-1" id="modalMascotaDetalleLabel">Información de la mascota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img id="modal_mascota_img" class="wid-80 text-center mt-1 rounded-circle" src="{{ asset('images/iconos/paciente-m.svg') }}" alt="Foto Mascota">
                        <h5 class="mt-2 mb-0" id="modal_mascota_nombre"></h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="mb-1"><strong>Especie:</strong> <span id="modal_mascota_especie">-</span></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1"><strong>Raza:</strong> <span id="modal_mascota_raza">-</span></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1"><strong>Tamaño:</strong> <span id="modal_mascota_tamano">-</span></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1"><strong>Sexo:</strong> <span id="modal_mascota_sexo">-</span></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1"><strong>Fecha nacimiento:</strong> <span id="modal_mascota_fecha">-</span></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1"><strong>Chip:</strong> <span id="modal_mascota_chip">-</span></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1"><strong>Esterilizado:</strong> <span id="modal_mascota_esterilizado">-</span></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1"><strong>F. esterilización:</strong> <span id="modal_mascota_esterilizacion">-</span></p>
                        </div>
                        <div class="col-sm-12">
                            <p class="mb-1"><strong>Enf. crónica:</strong> <span id="modal_mascota_enfermedad">-</span></p>
                        </div>
                    </div>
                    <div class="mt-3" id="modal_mascota_galeria_wrapper" style="display:none;">
                        <p class="mb-2"><strong>Fotos</strong></p>
                        <div class="d-flex flex-wrap" id="modal_mascota_galeria"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalMensajeDifusionResponsables" tabindex="-1" role="dialog" aria-labelledby="modalMensajeDifusionResponsablesLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modalMensajeDifusionResponsablesLabel">Mensaje difusión a responsables</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Asunto</label>
                        <input type="text" class="form-control form-control-sm" id="difusion_asunto">
                    </div>
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Mensaje</label>
                        <textarea class="form-control form-control-sm" id="difusion_mensaje" rows="4"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-info" onclick="enviarMensajeDifusionResponsables()">
                            <i class="feather icon-mail"></i> Enviar mensaje
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>
    function abrirMensajeDifusionResponsables() {
        $('#modalMensajeDifusionResponsables').modal('show');
    }

    function enviarMensajeDifusionResponsables() {
        var asunto = $('#difusion_asunto').val();
        var mensaje = $('#difusion_mensaje').val();

        if (asunto === '') {
            swal({ title: 'Error', text: 'Ingrese el asunto', icon: 'error', button: 'Aceptar' });
            return;
        }

        if (mensaje === '') {
            swal({ title: 'Error', text: 'Ingrese el mensaje', icon: 'error', button: 'Aceptar' });
            return;
        }

        $.ajax({
            url: "{{ route('adm_cm.pacientes.difusion') }}",
            type: 'POST',
            data: {
                asunto: asunto,
                mensaje: mensaje,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.estado == 1) {
                    swal({
                        title: 'Mensaje enviado',
                        text: 'El mensaje ha sido enviado correctamente',
                        icon: 'success',
                        button: 'Aceptar',
                    });
                    $('#modalMensajeDifusionResponsables').modal('hide');
                    $('#difusion_asunto').val('');
                    $('#difusion_mensaje').val('');
                } else {
                    swal({
                        title: 'Error',
                        text: response.mensaje || 'Ocurrió un error al enviar el mensaje',
                        icon: 'error',
                        button: 'Aceptar',
                    });
                }
            },
            error: function(xhr) {
                var response = xhr.responseJSON || {};
                swal({
                    title: 'Error',
                    text: response.mensaje || 'Ocurrió un error al enviar el mensaje',
                    icon: 'error',
                    button: 'Aceptar',
                });
            }
        });
    }

    $(document).on('click', '.js-ver-mascota', function () {
        var $btn = $(this);
        $('#modal_mascota_nombre').text($btn.data('nombre') || 'Mascota');
        $('#modal_mascota_especie').text($btn.data('especie') || '-');
        $('#modal_mascota_raza').text($btn.data('raza') || '-');
        $('#modal_mascota_tamano').text($btn.data('tamano') || '-');
        $('#modal_mascota_sexo').text($btn.data('sexo') || '-');
        $('#modal_mascota_fecha').text($btn.data('fecha') || '-');
        $('#modal_mascota_chip').text($btn.data('chip') || '-');
        $('#modal_mascota_esterilizado').text($btn.data('esterilizado') || '-');
        $('#modal_mascota_esterilizacion').text($btn.data('esterilizacion') || '-');
        $('#modal_mascota_enfermedad').text($btn.data('enfermedad') || '-');
        $('#modal_mascota_img').attr('src', $btn.data('foto') || '{{ asset('images/iconos/paciente-m.svg') }}');

        var galeria = $btn.data('galeria') || [];
        if (typeof galeria === 'string') {
            try {
                galeria = JSON.parse(galeria);
            } catch (e) {
                galeria = [];
            }
        }

        var $galeria = $('#modal_mascota_galeria');
        $galeria.empty();
        if (Array.isArray(galeria) && galeria.length > 0) {
            galeria.forEach(function (url) {
                if (!url) return;
                $galeria.append('<img class="img-thumbnail mr-2 mb-2" src="' + url + '" alt="Foto mascota" style="width: 80px; height: 80px; object-fit: cover;">');
            });
            $('#modal_mascota_galeria_wrapper').show();
        } else {
            $('#modal_mascota_galeria_wrapper').hide();
        }
    });
</script>
@endsection
