@php
    $responsableFvu = $responsable_mascota ?? $responsable ?? null;
    $galeriaFvu = collect($galeria_mascota ?? [])->filter()->values();
    $vacunasFvu = collect($vacunas_fvu ?? [])->values();
    $desparasitacionesFvu = collect($desparasitaciones_fvu ?? [])->values();
    $fichasFvu = collect($fichas_veterinarias ?? [])->values();
    $documentosFvu = collect($documentos_mascota ?? [])->values();

    $edadMascota = null;
    if (!empty($mascota->fecha_nacimiento)) {
        try {
            $edadMascota = \Carbon\Carbon::parse($mascota->fecha_nacimiento)->age;
        } catch (\Throwable $e) {
            $edadMascota = null;
        }
    }

    $fotoMascota = $mascota->foto_perfil ?: asset('images/iconos/usuario_profesional.svg');
    $sexoMascota = $mascota->sexo === 'M' ? 'Masculino' : ($mascota->sexo === 'F' ? 'Femenino' : 'Sin registro');
    $especieMascota = optional($mascota->especieMascota)->nombre ?: ($mascota->otra_especie ?: $mascota->especie ?: 'N/N');
    $razaMascota = optional($mascota->razaMascota)->nombre ?: ($mascota->otra_especie ?: '-');
    $tamanoMascota = optional($mascota->tamanoMascota)->nombre ?: ($mascota->tamano ?: '-');
    $colorMascota = '-';

    $cantidadVacunas = $vacunasFvu->count();
    $cantidadDesparasitaciones = $desparasitacionesFvu->count();
    $cantidadDocumentos = $documentosFvu->count();
    $cantidadAlergias = !empty($mascota->vacunas) ? 1 : 0;
    $tieneCronico = !empty($mascota->enfermedad_cronica);
    $tieneDiscapacidad = false;
    $tieneTransfusiones = false;

    $cirugiasTexto = trim((string) ($mascota->cirugias ?? ''));
    $cirugiasLista = collect(preg_split('/[\r\n]+/', $cirugiasTexto))
        ->map(function ($item) {
            return trim($item);
        })
        ->filter()
        ->values();

    $tratamientosLista = $fichasFvu->flatMap(function ($ficha) {
        return collect(data_get($ficha, 'PresupuestosMascota', []))->map(function ($presupuesto) {
            return trim(
                (string) (
                    data_get($presupuesto, 'tratamiento') ?:
                    data_get($presupuesto, 'descripcion') ?:
                    data_get($presupuesto, 'observaciones') ?:
                    'Tratamiento registrado'
                )
            );
        });
    })->filter()->unique()->values();

    $diagnosticosLista = $fichasFvu->map(function ($ficha) {
        return trim((string) (
            data_get($ficha, 'hipotesis_diagnostico') ?:
            data_get($ficha, 'diagnostico_ce10') ?:
            data_get($ficha, 'motivo_consulta') ?:
            data_get($ficha, 'observaciones') ?:
            ''
        ));
    })->filter()->unique()->values();

    $microchip = $mascota->chip ?: 'Sin registro';
    $pesoMascota = data_get($mascota, 'peso') ?: 'Sin registro';
    $telefonoResponsable = $responsableFvu ? trim(($responsableFvu->telefono_uno ?? '') . ' / ' . ($responsableFvu->telefono_dos ?? '')) : 'Sin registro';
    $nombreResponsable = $responsableFvu
        ? trim(($responsableFvu->nombres ?? '') . ' ' . ($responsableFvu->apellido_uno ?? '') . ' ' . ($responsableFvu->apellido_dos ?? ''))
        : 'Sin registro';

    $arcadaSuperiorIzquierda = range(109, 101);
    $arcadaSuperiorDerecha = range(201, 209);
    $arcadaInferiorIzquierda = range(409, 401);
    $arcadaInferiorDerecha = range(301, 309);
@endphp

<br>
<div class="user-profile user-card mt-0 mt-n4" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-1 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12"></div>
        </div>
        <div class="row mx-1 mt-3">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h4 class="text-c-blue text-center mb-4 mt-3 f-26">Ficha Veterinaria Única</h4>
            </div>
        </div>

        <div class="row mx-1">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-3">
                        <div class="card rounded-xl" id="enf-cron">
                            <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $mascota->id }}">
                            <div class="row px-2 py-1">
                                <div class="col-sm-12 col-md-12">
                                    <div class="media">
                                        <img class="img-radius img-fluid wid-70 mr-3 align-self-center" id="profile-image" src="{{ $fotoMascota }}" alt="Mascota image">
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <h6 class="f-16">
                                                        <span class="text-c-blue">{{ $mascota->nombre ?? 'Mascota' }}</span><br>
                                                        <small>N° Microchip ({{ $microchip }})</small>
                                                    </h6>
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                    <h6 class="f-16">
                                                        <span class="text-c-blue">{{ $edadMascota !== null ? $edadMascota . ' Años' : 'Sin registro' }}</span><br>
                                                        <small>{{ !empty($mascota->fecha_nacimiento) ? '(' . \Carbon\Carbon::parse($mascota->fecha_nacimiento)->format('d-m-Y') . ')' : '' }}</small>
                                                    </h6>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                    <h6 class="f-16"><span class="text-c-blue">{{ $sexoMascota }}</span></h6>
                                                    <p>Sexo</p>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                    <h6 class="f-16"><span class="text-c-blue">{{ $especieMascota }}</span></h6>
                                                    <p>Especie</p>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                    <h6 class="f-16"><span class="text-c-blue">{{ $razaMascota }}</span></h6>
                                                    <p>Raza</p>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                    <h6 class="f-16"><span class="text-c-blue">{{ $tamanoMascota }}</span></h6>
                                                    <p>Tamaño</p>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                    <h6 class="f-16"><span class="text-c-blue">{{ $colorMascota }}</span></h6>
                                                    <p>Color</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-9">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body px-2 py-1">
                                        <div class="media">
                                            <img src="{{ asset('images/iconos/gruposanguineo.png') }}" class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="Grupo sanguineo">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1 text-danger">Grupo Sanguíneo</h5>
                                                <h5 class="mt-0 text-danger">N/A</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body px-2 py-1">
                                        <div class="media">
                                            <img src="{{ asset('images/iconos/alergias.png') }}" class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="Alergias">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Alergias</h5>
                                                <h5 class="mt-0 text-danger">{{ $cantidadAlergias > 0 ? 'SI' : 'NO' }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body px-2 py-1">
                                        <div class="media">
                                            <img src="{{ asset('images/iconos/peso.png') }}" class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="Peso">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Peso</h5>
                                                <h5 class="mt-0 text-info">{{ $pesoMascota }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body px-2 py-1">
                                        <div class="media">
                                            <img src="{{ asset('images/iconos/enfermedad-cronica.png') }}" class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="Paciente cronico">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Paciente crónico</h5>
                                                <h5 class="mt-0 text-info">{{ $tieneCronico ? 'SI' : 'NO' }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body px-2 py-1">
                                        <div class="media">
                                            <img src="{{ asset('images/iconos/transfusion.jpg') }}" class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="Transfusiones">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Transfusiones</h5>
                                                <h5 class="mt-0 text-danger">{{ $tieneTransfusiones ? 'SI' : 'NO' }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body px-2 py-1">
                                        <div class="media">
                                            <img src="{{ asset('images/iconos/discapacidad.png') }}" class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="Discapacidad">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Discapacidad</h5>
                                                <h5 class="mt-0">{{ $tieneDiscapacidad ? 'SI' : '-' }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body px-2 py-1">
                                        <div class="media">
                                            <img src="{{ asset('images/iconos/esterilizacion.png') }}" class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="Esterilizado">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Esterilizado/a</h5>
                                                <h5 class="mt-0 text-info">{{ $mascota->esterilizado ? 'SI' : 'NO' }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body px-2 py-1">
                                        <div class="media">
                                            <img src="{{ asset('images/iconos/microchip.png') }}" class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="Microchip">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">N° Microchip</h5>
                                                <h5 class="mt-0 text-info">{{ $microchip }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <button class="btn btn-purple-light-c shadow-sm rounded-xl pt-3 pb-4 btn-block collapsed" type="button" data-toggle="collapse" data-target="#cabecera_info" aria-expanded="false" aria-controls="cabecera_info">
                                    <i class="feather icon-plus"></i> Ver más información
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card rounded-xl">
                            <div class="card-header-fmu border-none" style="border:0px!important;" id="enf-cron-mascota"></div>
                            <div id="cabecera_info" class="collapse" aria-labelledby="enf-cron-mascota" data-parent="#cabecera_info">
                                <div class="card-body pt-2" style="padding-top: 0px!important;">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-0">
                                            <ul class="nav nav-tabs profile-tabs nav-fill mt-1 mb-3" id="myTabMascota" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset active" id="seccion_ident_contacto-tab" data-toggle="tab" href="#seccion_ident_contacto" role="tab" aria-controls="seccion_ident_contacto" aria-selected="true">Info. Del Responsable</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="seccion_enfer_cronicas-tab" data-toggle="tab" href="#seccion_enfer_cronicas" role="tab" aria-controls="seccion_enfer_cronicas" aria-selected="false">Enfermedades Crónicas</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="seccion_alergias-tab" data-toggle="tab" href="#seccion_alergias" role="tab" aria-controls="seccion_alergias" aria-selected="false">Alergias</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="seccion_ultimas_cirugia-tab" data-toggle="tab" href="#seccion_ultimas_cirugia" role="tab" aria-controls="seccion_ultimas_cirugia" aria-selected="false">Últimas Cirugias</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="seccion_ultimo_tratamiento-tab" data-toggle="tab" href="#seccion_ultimo_tratamiento" role="tab" aria-controls="seccion_ultimo_tratamiento" aria-selected="false">Últimos Tratamientos</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="discap-tab" data-toggle="tab" href="#discap" role="tab" aria-controls="discap" aria-selected="false">Documentos</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 pb-2">
                                            <div class="tab-content" id="at-oftalmo-mascota">
                                                <div class="tab-pane fade show active" id="seccion_ident_contacto" role="tabpanel" aria-labelledby="seccion_ident_contacto-tab">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                                                            <div class="media">
                                                                <img src="{{ asset('images/iconos/persona-info.png') }}" class="wid-35 rounded-circle align-self-start mr-2" alt="Responsable">
                                                                <div class="media-body">
                                                                    <h6 class="mt-0 mb-1 pt-1">Responsable</h6>
                                                                    <h6 class="mt-0 text-c-blue">{{ $nombreResponsable ?: 'Sin registro' }}</h6>
                                                                    <small class="mt-0 text-c-blue">{{ $responsableFvu->rut ?? '' }}</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                                                            <div class="media">
                                                                <img src="{{ asset('images/iconos/tel-info.png') }}" class="wid-35 rounded-circle align-self-start mr-2" alt="Telefono">
                                                                <div class="media-body">
                                                                    <h6 class="mt-0 mb-1 pt-1">Teléfono</h6>
                                                                    <h6 class="mt-0 text-c-blue">{{ trim($telefonoResponsable, ' /') ?: 'Sin registro' }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                                                            <div class="media">
                                                                <img src="{{ asset('images/iconos/email-info.png') }}" class="wid-35 rounded-circle align-self-start mr-2" alt="Email">
                                                                <div class="media-body">
                                                                    <h6 class="mt-0 mb-1 pt-1">Email</h6>
                                                                    <h6 class="mt-0 text-c-blue">{{ $responsableFvu->email ?? 'Sin registro' }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                                                            <div class="media">
                                                                <img src="{{ asset('images/iconos/direccion-info.png') }}" class="wid-35 rounded-circle align-self-start mr-2" alt="Mascota">
                                                                <div class="media-body">
                                                                    <h6 class="mt-0 mb-1 pt-1">Mascota</h6>
                                                                    <h6 class="mt-0 text-c-blue">{{ $especieMascota }} / {{ $razaMascota }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="seccion_enfer_cronicas" role="tabpanel" aria-labelledby="seccion_enfer_cronicas-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="display table table-striped table-xs table-bordered dt-responsive nowrap pb-4" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>NOMBRE</th>
                                                                        <th>COMENTARIO</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Enfermedad crónica</td>
                                                                        <td>{{ $mascota->enfermedad_cronica ?: 'Sin registros' }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="seccion_alergias" role="tabpanel" aria-labelledby="seccion_alergias-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="display table table-bordered table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>NOMBRE</th>
                                                                        <th>COMENTARIO</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Antecedentes reportados</td>
                                                                        <td>{{ $mascota->vacunas ?: 'Sin registros' }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="seccion_ultimas_cirugia" role="tabpanel" aria-labelledby="seccion_ultimas_cirugia-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="display table table-bordered table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>PROCEDIMIENTO</th>
                                                                        <th>DETALLE</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($cirugiasLista as $cirugia)
                                                                        <tr>
                                                                            <td>Cirugía registrada</td>
                                                                            <td>{{ $cirugia }}</td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="2">Sin registros</td>
                                                                        </tr>
                                                                    @endforelse
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="seccion_ultimo_tratamiento" role="tabpanel" aria-labelledby="seccion_ultimo_tratamiento-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <ul>
                                                                @forelse ($tratamientosLista as $tratamiento)
                                                                    <li>{{ $tratamiento }}</li>
                                                                @empty
                                                                    <li>No hay registros</li>
                                                                @endforelse
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="discap" role="tabpanel" aria-labelledby="discap-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="display table-bordered table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Tipo</th>
                                                                        <th>Nombre</th>
                                                                        <th>Fecha</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($documentosFvu as $documento)
                                                                        <tr>
                                                                            <td>{{ $documento['tipo'] ?? '-' }}</td>
                                                                            <td>{{ $documento['nombre'] ?? '-' }}</td>
                                                                            <td>{{ !empty($documento['fecha']) ? \Carbon\Carbon::parse($documento['fecha'])->format('d-m-Y') : '-' }}</td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="3">Sin documentos</td>
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            <button type="button" class="btn btn-xs btn-purple-light-c mb-1"><i class="feather icon-users"></i> Responsables</button>
                            <button type="button" class="btn btn-xs btn-purple-light-c mb-1"><i class="feather icon-lock"></i> Información Confidencial</button>
                            <button type="button" class="btn btn-xs btn-danger-light-c mb-1"><i class="feather icon-phone"></i> Contacto de emergencia</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card border-card-info h-100">
                                <div class="card-body px-2 py-3">
                                    <div class="media">
                                        <img src="{{ asset('images/iconos/tto-curso.png') }}" class="wid-35 rounded-xl mr-3" alt="Tratamientos en curso">
                                        <div class="media-body">
                                            <h5 class="f-16 text-info font-weight-bold">Tratamientos en curso</h5>
                                            <ul>
                                                @forelse ($tratamientosLista as $tratamiento)
                                                    <li style="font-size: 12px"><i class="fas fa-caret-right text-purple"></i>&nbsp;&nbsp;{{ $tratamiento }}</li>
                                                @empty
                                                    <li>No hay registros</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card border-card-danger h-100">
                                <div class="card-body px-2 py-3">
                                    <div class="media">
                                        <img src="{{ asset('images/iconos/meds-cronicos.png') }}" class="wid-35 rounded-xl mr-3" alt="Medicamentos cronicos">
                                        <div class="media-body">
                                            <h5 class="f-16 text-danger font-weight-bold">Medicamentos crónicos</h5>
                                            <ul>
                                                @if ($tieneCronico)
                                                    <li>{{ $mascota->enfermedad_cronica }}</li>
                                                @else
                                                    <li>No hay registros</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card border-card-info h-100">
                                <div class="card-body px-2 py-3">
                                    <div class="media">
                                        <img src="{{ asset('images/iconos/ant-qx.png') }}" class="wid-35 rounded-xl mr-3" alt="Cirugias recientes">
                                        <div class="media-body">
                                            <h5 class="f-16 text-info font-weight-bold">Cirugías recientes</h5>
                                            <ul>
                                                @forelse ($cirugiasLista as $cirugia)
                                                    <li class="text-capitalize"><i class="fas fa-caret-right text-info"></i> {{ $cirugia }}</li>
                                                @empty
                                                    <li>No hay registros</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card border-card-info h-100">
                                <div class="card-body px-2 py-3">
                                    <div class="media">
                                        <img src="{{ asset('images/iconos/prot-ort.png') }}" class="wid-35 rounded-xl mr-3" alt="Protesis y ortesis">
                                        <div class="media-body">
                                            <h5 class="f-16 text-info font-weight-bold">Prótesis y Ortesis</h5>
                                            <ul>
                                                <li>No hay registros</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                            <h5 class="f-20 text-c-blue mb-3">Historial médico</h5>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="histo_medico">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#histo_medico_c" aria-expanded="false" aria-controls="histo_medico_c">
                                        Historial Médico
                                    </button>
                                </div>
                                <div id="histo_medico_c" class="collapse" aria-labelledby="histo_medico" data-parent="#histo_medico">
                                    <div class="card-body-aten-a">
                                        <div class="row mt-3">
                                            <div class="col-sm-12 pb-4">
                                                <table class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle">Fecha</th>
                                                            <th class="align-middle">Profesional</th>
                                                            <th class="align-middle">Diagnóstico</th>
                                                            <th class="align-middle">Ficha</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($fichasFvu as $ficha)
                                                            @php
                                                                $profesionalFicha = trim(
                                                                    data_get($ficha, 'Profesional.nombres', '') . ' ' .
                                                                    data_get($ficha, 'Profesional.apellido_uno', '') . ' ' .
                                                                    data_get($ficha, 'Profesional.apellido_dos', '')
                                                                );
                                                                $fechaFicha = data_get($ficha, 'created_at');
                                                                $diagnosticoFicha = data_get($ficha, 'hipotesis_diagnostico')
                                                                    ?: data_get($ficha, 'diagnostico_ce10')
                                                                    ?: data_get($ficha, 'motivo_consulta')
                                                                    ?: data_get($ficha, 'observaciones')
                                                                    ?: '-';
                                                            @endphp
                                                            <tr>
                                                                <td class="align-middle">{{ $fechaFicha ? \Carbon\Carbon::parse($fechaFicha)->format('d-m-Y') : '-' }}</td>
                                                                <td class="align-middle">{{ $profesionalFicha !== '' ? $profesionalFicha : '-' }}</td>
                                                                <td class="align-middle">{{ $diagnosticoFicha }}</td>
                                                                <td class="align-middle">#{{ data_get($ficha, 'id', '-') }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4">No existen registros</td>
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

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="vacunas">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#vacunas_c" aria-expanded="false" aria-controls="vacunas_c">
                                        Registro de Vacunas
                                    </button>
                                </div>
                                <div id="vacunas_c" class="collapse" aria-labelledby="vacunas" data-parent="#vacunas">
                                    <div class="card-body-aten-a">
                                        <div class="table-responsive">
                                            <table class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Edad</th>
                                                        <th class="align-middle">Fecha dosis</th>
                                                        <th class="align-middle">Vacuna</th>
                                                        <th class="align-middle">Próx.Dosis</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($vacunasFvu as $vacuna)
                                                        <tr>
                                                            <td class="align-middle">{{ $vacuna['edad'] ?? '-' }}</td>
                                                            <td class="align-middle"><span class="badge badge-secondary">{{ !empty($vacuna['fecha_dosis']) ? \Carbon\Carbon::parse($vacuna['fecha_dosis'])->format('d-m-Y') : '-' }}</span></td>
                                                            <td class="align-middle">{{ $vacuna['vacuna'] ?? '-' }}</td>
                                                            <td class="align-middle text-center"><span class="badge badge-info">{{ !empty($vacuna['proxima_dosis']) ? \Carbon\Carbon::parse($vacuna['proxima_dosis'])->format('d-m-Y') : '-' }}</span></td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4">Sin registros</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="desparasitacion">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#desparasitacion_c" aria-expanded="false" aria-controls="desparasitacion_c">
                                        Registro de Desparasitación
                                    </button>
                                </div>
                                <div id="desparasitacion_c" class="collapse" aria-labelledby="desparasitacion" data-parent="#desparasitacion">
                                    <div class="card-body-aten-a">
                                        <div class="table-responsive">
                                            <table class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Fecha dosis</th>
                                                        <th class="align-middle">Antiparasitario</th>
                                                        <th class="align-middle">Tipo</th>
                                                        <th class="align-middle">Próx.Dosis</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($desparasitacionesFvu as $registro)
                                                        <tr>
                                                            <td class="align-middle"><span class="badge badge-secondary">{{ !empty($registro['fecha_dosis']) ? \Carbon\Carbon::parse($registro['fecha_dosis'])->format('d-m-Y') : '-' }}</span></td>
                                                            <td class="align-middle">{{ $registro['antiparasitario'] ?? '-' }}</td>
                                                            <td class="align-middle">{{ $registro['tipo'] ?? '-' }}</td>
                                                            <td class="align-middle text-center"><span class="badge badge-info">{{ !empty($registro['proxima_dosis']) ? \Carbon\Carbon::parse($registro['proxima_dosis'])->format('d-m-Y') : '-' }}</span></td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4">Sin registros</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="odonto_felino">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#odonto_felino_c" aria-expanded="false" aria-controls="odonto_felino_c">
                                        Historial Odontológico Felino
                                    </button>
                                </div>
                                <div id="odonto_felino_c" class="collapse" aria-labelledby="odonto_felino" data-parent="#odonto_felino">
                                    <div class="card-body-aten-a">
                                        <div class="odontograma-felino-wrap">
                                            <h4 class="odontograma-felino-titulo">ODONTOGRAMA FELINO (IMAGEN)</h4>

                                            <div class="odontograma-felino-lienzo">
                                                <div class="odontograma-felino-cuadrante">
                                                    @foreach ($arcadaSuperiorIzquierda as $pieza)
                                                        <label class="odontograma-pieza">
                                                            <input type="checkbox" name="odontograma_felino[]" value="{{ $pieza }}">
                                                            <span class="odontograma-caja"></span>
                                                            <span class="odontograma-numero">{{ $pieza }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>

                                                <div class="odontograma-felino-cuadrante">
                                                    @foreach ($arcadaSuperiorDerecha as $pieza)
                                                        <label class="odontograma-pieza">
                                                            <input type="checkbox" name="odontograma_felino[]" value="{{ $pieza }}">
                                                            <span class="odontograma-caja"></span>
                                                            <span class="odontograma-numero">{{ $pieza }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>

                                                <div class="odontograma-eje odontograma-eje-horizontal"></div>
                                                <div class="odontograma-eje odontograma-eje-vertical"></div>

                                                <div class="odontograma-felino-cuadrante">
                                                    @foreach ($arcadaInferiorIzquierda as $pieza)
                                                        <label class="odontograma-pieza">
                                                            <input type="checkbox" name="odontograma_felino[]" value="{{ $pieza }}">
                                                            <span class="odontograma-caja"></span>
                                                            <span class="odontograma-numero">{{ $pieza }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>

                                                <div class="odontograma-felino-cuadrante">
                                                    @foreach ($arcadaInferiorDerecha as $pieza)
                                                        <label class="odontograma-pieza">
                                                            <input type="checkbox" name="odontograma_felino[]" value="{{ $pieza }}">
                                                            <span class="odontograma-caja"></span>
                                                            <span class="odontograma-numero">{{ $pieza }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="odontograma-felino-resumen">
                                                <h4 class="odontograma-felino-subtitulo">PIEZAS DE ODONTOGRAMA FELINOS</h4>
                                                <div class="odontograma-felino-grid">
                                                    <div>
                                                        <strong>ARCADA SUPERIOR IZQUIERDA</strong><br>
                                                        N° PIEZAS: 109 AL 101
                                                    </div>
                                                    <div>
                                                        <strong>ARCADA SUPERIOR DERECHA</strong><br>
                                                        N° PIEZAS: 201 AL 209
                                                    </div>
                                                    <div>
                                                        <strong>ARCADA INFERIOR IZQUIERDA</strong><br>
                                                        N° PIEZAS: 409 AL 401
                                                    </div>
                                                    <div>
                                                        <strong>ARCADA INFERIOR DERECHA</strong><br>
                                                        N° PIEZAS: 301 AL 309
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="documentos">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#documentos_c" aria-expanded="false" aria-controls="documentos_c">
                                        Documentación
                                    </button>
                                </div>
                                <div id="documentos_c" class="collapse" aria-labelledby="documentos" data-parent="#documentos">
                                    <div class="card-body-aten-a">
                                        <div class="table-responsive">
                                            <table class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo</th>
                                                        <th>Nombre</th>
                                                        <th>Fecha</th>
                                                        <th>Estado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($documentosFvu as $documento)
                                                        <tr>
                                                            <td>{{ $documento['tipo'] ?? '-' }}</td>
                                                            <td>{{ $documento['nombre'] ?? '-' }}</td>
                                                            <td>{{ !empty($documento['fecha']) ? \Carbon\Carbon::parse($documento['fecha'])->format('d-m-Y') : '-' }}</td>
                                                            <td>{{ $documento['estado'] ?? '-' }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4">Sin documentos</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($galeriaFvu->isNotEmpty())
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="galeria">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#galeria_c" aria-expanded="false" aria-controls="galeria_c">
                                            Fotos y Galería
                                        </button>
                                    </div>
                                    <div id="galeria_c" class="collapse" aria-labelledby="galeria" data-parent="#galeria">
                                        <div class="card-body-aten-a">
                                            <div class="d-flex flex-wrap">
                                                <img class="img-thumbnail mr-2 mb-2" src="{{ $fotoMascota }}" alt="Foto perfil" style="width: 110px; height: 110px; object-fit: cover;">
                                                @foreach ($galeriaFvu as $foto)
                                                    <img class="img-thumbnail mr-2 mb-2" src="{{ $foto }}" alt="Galería mascota" style="width: 110px; height: 110px; object-fit: cover;">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/ficha_medica_unica.css') }}">
<style type="text/css">
    .auth-wrapper
    {
        background-color: #f3f3f3!important;
    }

    .odontograma-felino-wrap {
        margin-top: 6px;
    }

    .odontograma-felino-titulo,
    .odontograma-felino-subtitulo {
        color: #343a40;
        font-weight: 600;
    }

    .odontograma-felino-lienzo {
        background: #d8e2ee;
        border-radius: 8px;
        padding: 18px 14px;
        position: relative;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px 24px;
    }

    .odontograma-felino-cuadrante {
        display: grid;
        grid-template-columns: repeat(9, minmax(42px, 1fr));
        gap: 8px;
        position: relative;
        z-index: 2;
    }

    .odontograma-pieza {
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        margin: 0;
    }

    .odontograma-pieza input {
        display: none;
    }

    .odontograma-caja {
        width: 30px;
        height: 30px;
        border: 3px solid #1b9ed8;
        border-radius: 4px;
        background: #f3f7fb;
        box-shadow: inset 0 0 0 1px #9db6c8;
    }

    .odontograma-pieza input:checked + .odontograma-caja {
        background: #1b9ed8;
        box-shadow: inset 0 0 0 2px #f3f7fb;
    }

    .odontograma-numero {
        font-size: 12px;
        font-weight: 700;
        color: #3d4348;
        margin-top: 4px;
    }

    .odontograma-eje {
        position: absolute;
        border-color: #525a63;
        border-style: dashed;
        z-index: 1;
    }

    .odontograma-eje-horizontal {
        left: 14px;
        right: 14px;
        top: 50%;
        border-width: 0 0 2px 0;
    }

    .odontograma-eje-vertical {
        top: 14px;
        bottom: 14px;
        left: 50%;
        border-width: 0 0 0 2px;
    }

    .odontograma-felino-resumen {
        margin-top: 16px;
    }

    .odontograma-felino-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        border-top: 2px solid #d24b3e;
        border-left: 2px solid #d24b3e;
    }

    .odontograma-felino-grid > div {
        border-right: 2px solid #d24b3e;
        border-bottom: 2px solid #d24b3e;
        padding: 14px;
        font-size: 22px;
        line-height: 1.3;
    }

    @media (max-width: 992px) {
        .odontograma-felino-lienzo {
            grid-template-columns: 1fr;
        }

        .odontograma-eje-vertical {
            display: none;
        }

        .odontograma-eje-horizontal {
            top: 50%;
        }
    }

    @media (max-width: 768px) {
        .odontograma-felino-cuadrante {
            grid-template-columns: repeat(5, minmax(42px, 1fr));
        }

        .odontograma-felino-grid {
            grid-template-columns: 1fr;
        }

        .odontograma-felino-grid > div {
            font-size: 18px;
        }
    }
</style>
