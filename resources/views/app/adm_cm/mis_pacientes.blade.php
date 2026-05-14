@extends('template.adm_cm.template')

@section('page-styles')
    <link href='{{ asset('css/perfiles_usuarios.css') }}' rel='stylesheet' />
@endsection

@section('content')
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
                            <li class="breadcrumb-item"><a href="#">Mascotas y Responsables</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="text-white mb-0">Mascotas y Responsables</h5>
                                <small class="text-white-50">
                                    Contexto activo:
                                    {{ $contextoActivo['label'] ?? ($institucion->nombre ?? 'Sin contexto') }}
                                </small>
                            </div>
                            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                                <span class="badge badge-light">{{ $contextoActivo['role_label'] ?? 'Administrador' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('adm_cm.pacientes') }}" class="mb-4">
                            <div class="form-row align-items-end">
                                <div class="col-md-4 mb-2">
                                    <label class="floating-label-activo-sm mb-0">Institución / Sucursal</label>
                                    <select name="contexto" class="form-control form-control-sm">
                                        @foreach ($contextosCentro as $contexto)
                                            <option value="{{ $contexto['key'] }}" @selected(($contextoActivo['key'] ?? '') === $contexto['key'])>
                                                {{ $contexto['label'] }}
                                            </option>
                                        @endforeach
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
                                        <th class="align-middle">Previsión</th>
                                        <th class="align-middle">Chip</th>
                                        <th class="align-middle">Centro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mascotas as $mascota)
                                        @php
                                            $responsable = $mascota->Responsable;
                                            $responsableNombre = trim(collect([
                                                optional($responsable)->nombres,
                                                optional($responsable)->apellido_uno,
                                                optional($responsable)->apellido_dos,
                                            ])->filter()->implode(' '));
                                            $lugaresMascota = collect($mascota->lugaresAtencion ?? [])
                                                ->pluck('id_lugar_atencion')
                                                ->map(fn ($id) => optional($lugares_atencion->get($id))->nombre)
                                                ->filter()
                                                ->unique()
                                                ->values();
                                        @endphp
                                        <tr>
                                            <td class="align-middle">
                                                <strong>{{ $mascota->nombre ?: '-' }}</strong><br>
                                                <small class="text-muted">{{ optional($mascota->tamanoMascota)->nombre ?? ($mascota->tamano ?? '-') }}</small>
                                            </td>
                                            <td class="align-middle">
                                                {{ $responsableNombre !== '' ? $responsableNombre : '-' }}<br>
                                                <small class="text-muted">{{ optional($responsable)->rut ?: 'Sin RUT' }}</small>
                                            </td>
                                            <td class="align-middle">{{ optional($mascota->especieMascota)->nombre ?? ($mascota->especie ?? '-') }}</td>
                                            <td class="align-middle">{{ optional($mascota->razaMascota)->nombre ?? ($mascota->otra_especie ?? '-') }}</td>
                                            <td class="align-middle">{{ optional(optional($responsable)->Prevision)->nombre ?? '-' }}</td>
                                            <td class="align-middle">{{ $mascota->tiene_chip ? ($mascota->chip ?: 'Sí') : 'No' }}</td>
                                            <td class="align-middle">
                                                @if ($lugaresMascota->isNotEmpty())
                                                    {{ $lugaresMascota->implode(', ') }}
                                                @else
                                                    <span class="text-muted">Sin centro asociado</span>
                                                @endif
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
</div>
@endsection
