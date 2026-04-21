@extends('template.usuario.template')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title"></div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Suscripciones y servicios cercanos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-n5 mx-1">
            <div class="col-sm-12 mt-n5">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row align-items-end">
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Mascota</label>
                                <select class="custom-select" id="selectedPet">
                                    <option value="">Seleccione mascota</option>
                                    @foreach ($mascotas as $mascota)
                                        <option value="{{ $mascota->id }}" {{ optional($mascotaActiva)->id === $mascota->id ? 'selected' : '' }}>
                                            {{ $mascota->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">¿Qué buscas?</label>
                                <select class="custom-select" id="searchCategory">
                                    <option value="">Seleccione servicio</option>
                                    <option value="alimentos">Alimentos</option>
                                    <option value="centro_veterinario">Centro Veterinario</option>
                                    <option value="pet_shop">Pet Shop</option>
                                    <option value="farmacia">Farmacia Veterinaria</option>
                                    <option value="peluqueria">Peluquería</option>
                                    <option value="hotel_mascotas">Hotel de mascotas</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Ubicación manual</label>
                                <select class="custom-select" id="manualLocation">
                                    <option value="">Seleccione ciudad o comuna</option>
                                    <option value="vina_del_mar">Viña del Mar</option>
                                    <option value="valparaiso">Valparaíso</option>
                                    <option value="quilpue">Quilpué</option>
                                    <option value="villa_alemana">Villa Alemana</option>
                                    <option value="los_andes">Los Andes</option>
                                    <option value="santiago_centro">Santiago Centro</option>
                                    <option value="las_condes">Las Condes</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="d-flex">
                                    <button type="button" class="btn btn-info mr-2" id="btnBuscarServicio">
                                        <i class="feather icon-search"></i> Buscar
                                    </button>
                                    <button type="button" class="btn btn-outline-info" id="btnUseGeolocation">
                                        <i class="fas fa-map-marker-alt"></i> Mi ubicación
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="small text-muted" id="locationStatus">
                            Seleccione una ubicación manual o use la geolocalización automática para buscar servicios cercanos.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white border-bottom">
                        <h4 class="f-20 text-dark pt-2">Lugares adheridos a nuestra comunidad</h4>
                        <div class="small text-muted" id="searchSummary">Aún no se ha realizado una búsqueda.</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <div id="map" style="height: 540px;"></div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card-lineal">
                                    <div class="card-header-lineal">
                                        <h4 class="f-18 text-dark">Información del lugar seleccionado</h4>
                                    </div>
                                    <div class="card-body-lineal p-4">
                                        <div class="text-center mb-3">
                                            <img class="wid-120 text-center mt-1 mb-3" id="selectedPlaceLogo" src="{{ asset('images/otroslogos/logo-local.png') }}">
                                        </div>
                                        <div class="small text-muted text-uppercase">Institución</div>
                                        <h5 class="f-18 text-dark mb-1" id="selectedInstitutionName">Sin selección</h5>
                                        <div class="small text-muted text-uppercase mt-3">Sucursal</div>
                                        <p class="mb-1 font-weight-bold" id="selectedPlaceName">Seleccione un marcador en el mapa</p>
                                        <p class="mb-3" id="selectedPlaceAddress">La información del lugar aparecerá aquí.</p>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="small text-muted text-uppercase">Tipo sede</div>
                                                <p class="mb-3" id="selectedPlaceType">-</p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="small text-muted text-uppercase">Distancia aprox.</div>
                                                <p class="mb-3" id="selectedPlaceDistance">-</p>
                                            </div>
                                        </div>

                                        <div class="small text-muted text-uppercase">Horario</div>
                                        <div id="selectedPlaceSchedule" class="mb-3">-</div>

                                        <div class="small text-muted text-uppercase">Servicios disponibles</div>
                                        <div id="selectedPlaceServices" class="mb-3">-</div>

                                        <div class="small text-muted text-uppercase">Sucursales de la institución</div>
                                        <div id="selectedInstitutionBranches" class="mb-0">-</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="border rounded p-3 bg-light">
                                    <div class="small text-muted text-uppercase mb-2">Resultados de la búsqueda</div>
                                    <div id="searchResultsList" class="text-muted">Sin resultados todavía.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-1 d-none" id="subscriptionSection">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info pt-1 pb-0" role="alert">
                            <p class="p-13 pb-0 mb-1" id="subscriptionHelpText">Indique los productos que desea registrar para recibir de forma mensual.</p>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-9">
                                <label class="floating-label-activo-sm mb-0" id="subscriptionItemLabel">Producto</label>
                                <input type="text" id="subscriptionItemName" class="form-control form-control-sm ui-autocomplete-input" autocomplete="off">
                                <input type="hidden" id="subscriptionItemId" value="">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm mb-0">Cantidad</label>
                                <input class="form-control form-control-sm" type="number" id="subscriptionQuantity" min="1">
                            </div>
                            <div class="form-group col-md-9">
                                <label class="floating-label-activo-sm mb-0">Presentación</label>
                                <select class="form-control form-control-sm" id="subscriptionPresentation">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label></label>
                                <button type="button" class="btn btn-info btn-sm btn-block mt-n3" id="addSubscriptionItem">
                                    <i class="feather icon-check"></i> Añadir
                                </button>
                            </div>
                        </div>

                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th class="align-middle">Producto</th>
                                    <th class="align-middle">Cantidad</th>
                                    <th class="align-middle">Presentación</th>
                                    <th class="align-middle">Quitar</th>
                                </tr>
                            </thead>
                            <tbody id="subscriptionItemsTable">
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No hay elementos agregados.</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-right">
                            <button type="button" class="btn btn-info" id="saveSubscription">
                                <i class="feather icon-save"></i> Guardar suscripción
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-1 d-none" id="bookingSection">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-warning mb-4" role="alert">
                            <p class="mb-0" id="bookingMessage">Este servicio se gestiona mediante sistema de reserva.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sucursal</label>
                                    <select class="form-control form-control-sm" id="bookingBranch">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" id="bookingDate">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Horario disponible</label>
                                    <select class="form-control form-control-sm" id="bookingTime">
                                        <option value="">Seleccione</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-info btn-sm px-4" id="submitBooking">Solicitar reserva</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-1 d-none" id="pendingSection">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body py-5">
                        <p class="text-muted mb-0">Centro Veterinario quedará sin formulario inferior por ahora. Puede buscar lugares en el mapa y revisar la información del establecimiento.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-1 mt-3" id="historySection">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white border-bottom">
                        <h4 class="f-18 text-dark pt-2">Solicitudes guardadas para la mascota</h4>
                    </div>
                    <div class="card-body">
                        <div id="serviceHistoryContent" class="text-muted">Seleccione una mascota y un servicio para ver registros.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>
    const PETS = @json($petsData ?? []);
    const DEFAULT_LOGO = @json(asset('images/otroslogos/logo-local.png'));

    const SERVICE_LAYOUTS = {
        alimentos: 'subscription',
        farmacia: 'subscription',
        pet_shop: 'subscription',
        peluqueria: 'booking',
        hotel_mascotas: 'booking',
        centro_veterinario: 'pending'
    };

    const SERVICE_LABELS = {
        alimentos: 'Alimentos',
        farmacia: 'Farmacia Veterinaria',
        pet_shop: 'Pet Shop',
        peluqueria: 'Peluquería',
        hotel_mascotas: 'Hotel de Mascotas',
        centro_veterinario: 'Centro Veterinario'
    };

    const SUBSCRIPTION_CONTENT = {
        alimentos: {
            helpText: 'Indique los alimentos que desea registrar para recibir de forma mensual.',
            itemLabel: 'Alimento'
        },
        farmacia: {
            helpText: 'Indique los productos de farmacia que desea registrar para recibir de forma mensual.',
            itemLabel: 'Producto'
        },
        pet_shop: {
            helpText: 'Indique los productos de pet shop que desea registrar para recibir de forma mensual.',
            itemLabel: 'Producto'
        }
    };

    const MANUAL_LOCATIONS = {
        vina_del_mar: { label: 'Viña del Mar', coords: [-33.0245, -71.5518] },
        valparaiso: { label: 'Valparaíso', coords: [-33.0472, -71.6127] },
        quilpue: { label: 'Quilpué', coords: [-33.0475, -71.4425] },
        villa_alemana: { label: 'Villa Alemana', coords: [-33.0422, -71.3733] },
        los_andes: { label: 'Los Andes', coords: [-32.8337, -70.5983] },
        santiago_centro: { label: 'Santiago Centro', coords: [-33.4489, -70.6693] },
        las_condes: { label: 'Las Condes', coords: [-33.4080, -70.5670] }
    };

    const ESTABLISHMENTS = [
        {
            id: 1,
            institutionName: 'SDI Centro Veterinario Costa',
            branchName: 'Casa Matriz Viña del Mar',
            branchType: 'Casa matriz',
            city: 'Viña del Mar',
            address: 'Av. Libertad 2450, Viña del Mar',
            coords: [-33.0172, -71.5502],
            services: ['centro_veterinario', 'farmacia', 'pet_shop'],
            logo: DEFAULT_LOGO,
            schedule: [
                'Lunes a Viernes: 09:00 - 20:00',
                'Sábado: 09:30 - 14:00',
                'Domingo: Cerrado'
            ],
            branches: ['Casa Matriz Viña del Mar', 'Sucursal Reñaca', 'Sucursal 15 Norte'],
            isSdi: true
        },
        {
            id: 2,
            institutionName: 'SDI Centro Veterinario Costa',
            branchName: 'Sucursal Reñaca',
            branchType: 'Sucursal',
            city: 'Viña del Mar',
            address: 'Av. Borgoño 14920, Reñaca, Viña del Mar',
            coords: [-32.9678, -71.5452],
            services: ['centro_veterinario', 'peluqueria', 'hotel_mascotas'],
            logo: DEFAULT_LOGO,
            schedule: [
                'Lunes a Viernes: 10:00 - 19:30',
                'Sábado: 10:00 - 15:00',
                'Domingo: Cerrado'
            ],
            branches: ['Casa Matriz Viña del Mar', 'Sucursal Reñaca', 'Sucursal 15 Norte'],
            isSdi: true
        },
        {
            id: 8,
            institutionName: 'SDI Centro Veterinario Costa',
            branchName: 'Sucursal 15 Norte',
            branchType: 'Sucursal',
            city: 'Viña del Mar',
            address: '15 Norte 961, Viña del Mar',
            coords: [-33.0098, -71.5486],
            services: ['centro_veterinario', 'pet_shop', 'farmacia', 'alimentos'],
            logo: DEFAULT_LOGO,
            schedule: [
                'Lunes a Viernes: 09:30 - 19:00',
                'Sábado: 10:00 - 14:30',
                'Domingo: Cerrado'
            ],
            branches: ['Casa Matriz Viña del Mar', 'Sucursal Reñaca', 'Sucursal 15 Norte'],
            isSdi: true
        },
        {
            id: 3,
            institutionName: 'SDI Pet Market Pacífico',
            branchName: 'Sucursal Valparaíso',
            branchType: 'Casa matriz',
            city: 'Valparaíso',
            address: 'Av. Argentina 1120, Valparaíso',
            coords: [-33.0421, -71.6120],
            services: ['pet_shop', 'alimentos', 'farmacia'],
            logo: DEFAULT_LOGO,
            schedule: [
                'Lunes a Viernes: 09:30 - 19:30',
                'Sábado: 10:00 - 16:00',
                'Domingo: Cerrado'
            ],
            branches: ['Sucursal Valparaíso'],
            isSdi: true
        },
        {
            id: 4,
            institutionName: 'SDI Mundo Mascota Interior',
            branchName: 'Sucursal Quilpué',
            branchType: 'Casa matriz',
            city: 'Quilpué',
            address: 'Diego Portales 775, Quilpué',
            coords: [-33.0468, -71.4410],
            services: ['pet_shop', 'alimentos', 'peluqueria'],
            logo: DEFAULT_LOGO,
            schedule: [
                'Lunes a Viernes: 09:00 - 19:00',
                'Sábado: 09:30 - 15:00',
                'Domingo: Cerrado'
            ],
            branches: ['Sucursal Quilpué'],
            isSdi: true
        },
        {
            id: 5,
            institutionName: 'SDI Clinivet Andes',
            branchName: 'Sucursal Los Andes',
            branchType: 'Casa matriz',
            city: 'Los Andes',
            address: 'Esmeralda 381, Los Andes, Región de Valparaíso',
            coords: [-32.8337, -70.5983],
            services: ['centro_veterinario', 'farmacia', 'pet_shop', 'peluqueria', 'hotel_mascotas'],
            logo: DEFAULT_LOGO,
            schedule: [
                'Lunes a Viernes: 10:00 - 20:30',
                'Sábado: 10:00 - 15:00',
                'Domingo: Cerrado'
            ],
            branches: ['Sucursal Los Andes'],
            isSdi: true
        },
        {
            id: 6,
            institutionName: 'SDI Veterinaria Metropolitana',
            branchName: 'Sucursal Las Condes',
            branchType: 'Casa matriz',
            city: 'Las Condes',
            address: 'Av. Apoquindo 5120, Las Condes, Santiago',
            coords: [-33.4145, -70.5786],
            services: ['centro_veterinario', 'farmacia'],
            logo: DEFAULT_LOGO,
            schedule: [
                'Lunes a Viernes: 08:30 - 20:00',
                'Sábado: 09:00 - 14:00',
                'Domingo: Cerrado'
            ],
            branches: ['Sucursal Las Condes', 'Sucursal Santiago Centro'],
            isSdi: true
        },
        {
            id: 7,
            institutionName: 'SDI Veterinaria Metropolitana',
            branchName: 'Sucursal Santiago Centro',
            branchType: 'Sucursal',
            city: 'Santiago Centro',
            address: 'San Diego 440, Santiago Centro',
            coords: [-33.4521, -70.6508],
            services: ['centro_veterinario', 'farmacia', 'pet_shop'],
            logo: DEFAULT_LOGO,
            schedule: [
                'Lunes a Viernes: 09:00 - 19:30',
                'Sábado: 09:30 - 13:30',
                'Domingo: Cerrado'
            ],
            branches: ['Sucursal Las Condes', 'Sucursal Santiago Centro'],
            isSdi: true
        }
    ];

    const searchState = {
        currentLocation: null,
        currentLocationLabel: '',
        locationSource: '',
        filteredPlaces: [],
        selectedPlace: null,
        markers: [],
        userLocationMarker: null,
    };

    let subscriptionItems = [];

    function showMessage(title, text, icon) {
        swal({
            title: title,
            text: text,
            icon: icon,
            buttons: 'Aceptar',
        });
    }

    function getSelectedPet() {
        const petId = $('#selectedPet').val();
        return PETS.find(function (pet) {
            return String(pet.id) === String(petId);
        }) || null;
    }

    function resetSubscriptionInputs() {
        $('#subscriptionItemName').val('');
        $('#subscriptionItemId').val('');
        $('#subscriptionQuantity').val('');
        $('#subscriptionPresentation').html('<option value="">Seleccione</option>');
    }

    function resetPlaceCard() {
        $('#selectedPlaceLogo').attr('src', DEFAULT_LOGO);
        $('#selectedInstitutionName').text('Sin selección');
        $('#selectedPlaceName').text('Seleccione un marcador en el mapa');
        $('#selectedPlaceAddress').text('La información del lugar aparecerá aquí.');
        $('#selectedPlaceType').text('-');
        $('#selectedPlaceDistance').text('-');
        $('#selectedPlaceSchedule').html('-');
        $('#selectedPlaceServices').html('-');
        $('#selectedInstitutionBranches').html('-');
    }

    function hideServiceSections() {
        $('#subscriptionSection, #bookingSection, #pendingSection').addClass('d-none');
    }

    function renderSubscriptionTable() {
        const $table = $('#subscriptionItemsTable');
        $table.empty();

        if (!subscriptionItems.length) {
            $table.html('<tr><td colspan="4" class="text-center text-muted">No hay elementos agregados.</td></tr>');
            return;
        }

        subscriptionItems.forEach(function (item, index) {
            $table.append(
                '<tr>' +
                    '<td>' + item.name + '</td>' +
                    '<td class="text-center">' + item.quantity + '</td>' +
                    '<td>' + item.presentation + '</td>' +
                    '<td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger remove-subscription-item" data-index="' + index + '">Quitar</button></td>' +
                '</tr>'
            );
        });
    }

    function renderHistory() {
        const pet = getSelectedPet();
        const service = $('#searchCategory').val();
        const layout = SERVICE_LAYOUTS[service] || null;
        const $container = $('#serviceHistoryContent');

        if (!pet) {
            $container.html('<div class="text-muted">Seleccione una mascota para ver sus registros.</div>');
            return;
        }

        if (!service || !layout) {
            $container.html('<div class="text-muted">Seleccione un servicio para ver sus registros.</div>');
            return;
        }

        let records = [];
        if (layout === 'subscription') {
            records = (pet.suscripciones || []).filter(function (item) {
                return item.servicio === service;
            });
        } else if (layout === 'booking') {
            records = (pet.reservas || []).filter(function (item) {
                return item.servicio === service;
            });
        }

        if (!records.length) {
            $container.html('<div class="text-muted">No hay registros guardados para este servicio.</div>');
            return;
        }

        let html = '';
        records.slice().reverse().forEach(function (record) {
            html += '<div class="border rounded p-3 mb-3">';
            html += '<div class="font-weight-bold text-dark">' + (SERVICE_LABELS[record.servicio] || record.servicio) + '</div>';
            html += '<div class="small text-muted mb-2">Estado: ' + (record.estado || 'pendiente') + ' | Fecha registro: ' + (record.created_at || '-') + '</div>';
            html += '<div><strong>Lugar:</strong> ' + (record.lugar_nombre || '-') + '</div>';

            if (layout === 'subscription' && Array.isArray(record.items)) {
                html += '<div class="mt-2"><strong>Productos:</strong></div>';
                html += '<ul class="mb-0 pl-3">';
                record.items.forEach(function (item) {
                    html += '<li>' + item.name + ' | Cantidad: ' + item.quantity + ' | Presentación: ' + item.presentation + '</li>';
                });
                html += '</ul>';
            }

            if (layout === 'booking') {
                html += '<div class="mt-2"><strong>Fecha:</strong> ' + (record.fecha || '-') + ' <strong>Hora:</strong> ' + (record.hora || '-') + '</div>';
            }

            html += '</div>';
        });

        $container.html(html);
    }

    function formatDistance(km) {
        if (km === null || typeof km === 'undefined' || Number.isNaN(km)) {
            return '-';
        }

        if (km < 1) {
            return Math.round(km * 1000) + ' m';
        }

        return km.toFixed(1) + ' km';
    }

    function haversineDistance(coordsA, coordsB) {
        if (!coordsA || !coordsB) {
            return null;
        }

        const toRad = function(value) {
            return value * Math.PI / 180;
        };

        const lat1 = coordsA[0];
        const lon1 = coordsA[1];
        const lat2 = coordsB[0];
        const lon2 = coordsB[1];
        const earthRadiusKm = 6371;
        const dLat = toRad(lat2 - lat1);
        const dLon = toRad(lon2 - lon1);
        const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

        return earthRadiusKm * c;
    }

    function clearMarkers() {
        searchState.markers.forEach(function (markerItem) {
            map.removeLayer(markerItem.marker);
        });
        searchState.markers = [];
    }

    function updateLocationStatus() {
        if (!searchState.currentLocation) {
            $('#locationStatus').text('Seleccione una ubicación manual o use la geolocalización automática para buscar servicios cercanos.');
            return;
        }

        const sourceLabel = searchState.locationSource === 'auto' ? 'Ubicación automática' : 'Ubicación manual';
        $('#locationStatus').text(sourceLabel + ': ' + searchState.currentLocationLabel);
    }

    function setCurrentLocation(coords, label, source) {
        searchState.currentLocation = coords;
        searchState.currentLocationLabel = label;
        searchState.locationSource = source;
        updateLocationStatus();

        if (searchState.userLocationMarker) {
            searchState.userLocationMarker.setLatLng(coords);
        } else {
            searchState.userLocationMarker = L.circleMarker(coords, {
                radius: 8,
                color: '#0fb5c0',
                fillColor: '#0fb5c0',
                fillOpacity: 0.9
            }).addTo(map);
        }

        searchState.userLocationMarker.bindPopup('Tu ubicación de referencia: ' + label);
    }

    function fitMapToResults() {
        const bounds = [];

        if (searchState.currentLocation) {
            bounds.push(searchState.currentLocation);
        }

        searchState.filteredPlaces.forEach(function (place) {
            bounds.push(place.coords);
        });

        if (bounds.length === 0) {
            map.setView([-33.0245, -71.5518], 11);
            return;
        }

        if (bounds.length === 1) {
            map.setView(bounds[0], 13);
            return;
        }

        map.fitBounds(bounds, { padding: [40, 40] });
    }

    function renderPlaceCard(place) {
        if (!place) {
            resetPlaceCard();
            return;
        }

        $('#selectedPlaceLogo').attr('src', place.logo || DEFAULT_LOGO);
        $('#selectedInstitutionName').text(place.institutionName);
        $('#selectedPlaceName').text(place.branchName);
        $('#selectedPlaceAddress').text(place.address);
        $('#selectedPlaceType').text(place.branchType);
        $('#selectedPlaceDistance').text(formatDistance(place.distanceKm));
        $('#selectedPlaceSchedule').html(place.schedule.map(function (line) {
            return '<div>' + line + '</div>';
        }).join(''));
        $('#selectedPlaceServices').html(place.services.map(function (service) {
            return '<span class="badge badge-purple-light mr-1 mb-1">' + (SERVICE_LABELS[service] || service) + '</span>';
        }).join(''));
        $('#selectedInstitutionBranches').html(place.branches.map(function (branch) {
            return '<div>' + branch + '</div>';
        }).join(''));
    }

    function renderBookingBranches(selectedService) {
        const $branch = $('#bookingBranch');
        $branch.html('<option value="">Seleccione</option>');

        if (searchState.selectedPlace && searchState.selectedPlace.services.includes(selectedService)) {
            $branch.append('<option value="' + searchState.selectedPlace.branchName + '" selected>' + searchState.selectedPlace.branchName + '</option>');
            return;
        }

        searchState.filteredPlaces.forEach(function (place) {
            $branch.append('<option value="' + place.branchName + '">' + place.branchName + '</option>');
        });
    }

    function renderSearchResultsList() {
        const $container = $('#searchResultsList');

        if (!searchState.filteredPlaces.length) {
            $container.html('<div class="text-muted">No se encontraron establecimientos SDI para este servicio y ubicación.</div>');
            return;
        }

        let html = '<div class="row">';
        searchState.filteredPlaces.forEach(function (place) {
            html += '<div class="col-md-6 mb-3">';
            html += '  <div class="border rounded p-3 h-100">';
            html += '      <div class="font-weight-bold text-dark">' + place.branchName + '</div>';
            html += '      <div class="small text-muted mb-2">' + place.institutionName + '</div>';
            html += '      <div class="small mb-2">' + place.address + '</div>';
            html += '      <div class="small text-muted mb-2">Distancia aprox.: ' + formatDistance(place.distanceKm) + '</div>';
            html += '      <button type="button" class="btn btn-sm btn-outline-info select-search-result" data-place-id="' + place.id + '">Ver en mapa</button>';
            html += '  </div>';
            html += '</div>';
        });
        html += '</div>';

        $container.html(html);
    }

    function renderMarkers() {
        clearMarkers();

        searchState.filteredPlaces.forEach(function (place) {
            const markerInstance = L.marker(place.coords)
                .addTo(map)
                .bindPopup('<strong>' + place.branchName + '</strong><br>' + place.address);

            markerInstance.on('click', function () {
                selectPlace(place.id, true);
            });

            searchState.markers.push({
                id: place.id,
                marker: markerInstance
            });
        });
    }

    function selectPlace(placeId, openPopup) {
        const place = searchState.filteredPlaces.find(function (item) {
            return String(item.id) === String(placeId);
        }) || null;

        searchState.selectedPlace = place;
        renderPlaceCard(place);

        const selectedService = $('#searchCategory').val();
        renderServiceSection(selectedService);

        if (!place) {
            return;
        }

        map.setView(place.coords, 14);
        const markerItem = searchState.markers.find(function (item) {
            return String(item.id) === String(place.id);
        });

        if (openPopup && markerItem) {
            markerItem.marker.openPopup();
        }
    }

    function renderSearchSummary(selectedService) {
        if (!selectedService) {
            $('#searchSummary').text('Aún no se ha realizado una búsqueda.');
            return;
        }

        if (!searchState.currentLocation) {
            $('#searchSummary').text('Seleccione una ubicación para buscar establecimientos SDI.');
            return;
        }

        const serviceLabel = SERVICE_LABELS[selectedService] || selectedService;
        $('#searchSummary').text(
            searchState.filteredPlaces.length + ' establecimiento(s) SDI encontrados para ' +
            serviceLabel + ' cerca de ' + searchState.currentLocationLabel + '.'
        );
    }

    function renderServiceSection(selectedService) {
        const layout = SERVICE_LAYOUTS[selectedService] || null;

        hideServiceSections();

        if (layout === 'subscription') {
            const subscriptionContent = SUBSCRIPTION_CONTENT[selectedService] || SUBSCRIPTION_CONTENT.alimentos;
            $('#subscriptionHelpText').text(subscriptionContent.helpText);
            $('#subscriptionItemLabel').text(subscriptionContent.itemLabel);
            $('#subscriptionSection').removeClass('d-none');
        }

        if (layout === 'booking') {
            const serviceLabel = SERVICE_LABELS[selectedService] || 'Este servicio';
            $('#bookingMessage').text(serviceLabel + ' se gestiona mediante sistema de reserva.');
            renderBookingBranches(selectedService);
            $('#bookingSection').removeClass('d-none');
        }

        if (layout === 'pending') {
            $('#pendingSection').removeClass('d-none');
        }

        renderHistory();
    }

    function runSearch() {
        const selectedService = $('#searchCategory').val();

        if (!selectedService) {
            showMessage('Búsqueda de servicios', 'Seleccione un servicio para buscar establecimientos SDI.', 'error');
            return;
        }

        if (!searchState.currentLocation) {
            showMessage('Búsqueda de servicios', 'Seleccione una ubicación manual o use la geolocalización automática.', 'error');
            return;
        }

        searchState.filteredPlaces = ESTABLISHMENTS
            .filter(function (place) {
                return place.isSdi && place.services.includes(selectedService);
            })
            .map(function (place) {
                const distanceKm = haversineDistance(searchState.currentLocation, place.coords);
                return Object.assign({}, place, {
                    distanceKm: distanceKm
                });
            })
            .sort(function (a, b) {
                return a.distanceKm - b.distanceKm;
            });

        searchState.selectedPlace = searchState.filteredPlaces.length ? searchState.filteredPlaces[0] : null;

        renderMarkers();
        renderSearchSummary(selectedService);
        renderSearchResultsList();
        fitMapToResults();
        renderPlaceCard(searchState.selectedPlace);
        renderServiceSection(selectedService);

        if (searchState.selectedPlace) {
            selectPlace(searchState.selectedPlace.id, true);
        } else {
            resetPlaceCard();
        }
    }

    function handleManualLocationChange() {
        const key = $('#manualLocation').val();
        if (!key || !MANUAL_LOCATIONS[key]) {
            return;
        }

        setCurrentLocation(MANUAL_LOCATIONS[key].coords, MANUAL_LOCATIONS[key].label, 'manual');
        map.setView(MANUAL_LOCATIONS[key].coords, 12);
    }

    function requestGeolocation() {
        if (!navigator.geolocation) {
            showMessage('Geolocalización', 'Tu navegador no soporta geolocalización.', 'error');
            return;
        }

        if (!window.isSecureContext) {
            showMessage(
                'Geolocalización',
                'La geolocalización del navegador requiere una conexión segura. Abre esta página en https://vet-sdi.test o usa la ubicación manual.',
                'error'
            );
            return;
        }

        navigator.geolocation.getCurrentPosition(function(position) {
            const coords = [position.coords.latitude, position.coords.longitude];
            const label = 'Lat ' + position.coords.latitude.toFixed(4) + ', Lon ' + position.coords.longitude.toFixed(4);

            setCurrentLocation(coords, label, 'auto');
            map.setView(coords, 13);
        }, function(error) {
            let message = 'No fue posible obtener tu ubicación.';

            if (error && error.code === 1) {
                message = 'El navegador bloqueó el permiso de ubicación. Debes permitir acceso a la ubicación para este sitio o usar la ubicación manual.';
            } else if (error && error.code === 2) {
                message = 'No se pudo determinar tu ubicación actual. Revisa tu conexión o usa la ubicación manual.';
            } else if (error && error.code === 3) {
                message = 'La solicitud de ubicación tardó demasiado. Intenta nuevamente o usa la ubicación manual.';
            }

            showMessage('Geolocalización', message, 'error');
        });
    }

    function initializeLeafletMap() {
        if (typeof map === 'undefined' || !document.getElementById('map')) {
            return;
        }

        map.setView(MANUAL_LOCATIONS.vina_del_mar.coords, 11);
        resetPlaceCard();
    }

    function loadSubscriptionPresentations(productId) {
        $('#subscriptionPresentation').html('<option value="">Cargando...</option>');

        $.ajax({
            url: "{{ route('listar.presentacion') }}",
            type: 'GET',
            dataType: 'json',
            data: {
                medicamento: productId
            }
        }).done(function (response) {
            const $presentation = $('#subscriptionPresentation');
            $presentation.html('<option value="">Seleccione</option>');

            if (!response || !response.length) {
                return;
            }

            response.forEach(function (item) {
                $presentation.append('<option value="' + item.id + '">' + item.descripcion_presentacion + '</option>');
            });
        }).fail(function () {
            $('#subscriptionPresentation').html('<option value="">No fue posible cargar las presentaciones</option>');
        });
    }

    function initializeSubscriptionAutocomplete() {
        $('#subscriptionItemName').autocomplete({
            minLength: 2,
            source: function (request, response) {
                $.ajax({
                    url: "{{ route('dental.getArticulo') }}",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        search: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                $('#subscriptionItemName').val(ui.item.label);
                $('#subscriptionItemId').val(ui.item.value);
                loadSubscriptionPresentations(ui.item.value);
                return false;
            }
        });
    }

    function addSubscriptionItem() {
        const productId = $('#subscriptionItemId').val();
        const productName = $('#subscriptionItemName').val().trim();
        const quantity = $('#subscriptionQuantity').val();
        const presentationId = $('#subscriptionPresentation').val();
        const presentation = $('#subscriptionPresentation option:selected').text();

        if (!productId || !productName) {
            showMessage('Suscripción', 'Seleccione un producto válido.', 'error');
            return;
        }

        if (!quantity || parseInt(quantity, 10) <= 0) {
            showMessage('Suscripción', 'Ingrese una cantidad válida.', 'error');
            return;
        }

        if (!presentationId) {
            showMessage('Suscripción', 'Seleccione una presentación.', 'error');
            return;
        }

        subscriptionItems.push({
            productId: productId,
            name: productName,
            quantity: parseInt(quantity, 10),
            presentationId: presentationId,
            presentation: presentation
        });

        renderSubscriptionTable();
        resetSubscriptionInputs();
    }

    function saveSubscription() {
        const pet = getSelectedPet();
        const service = $('#searchCategory').val();
        const place = searchState.selectedPlace;

        if (!pet) {
            showMessage('Suscripción', 'Seleccione una mascota.', 'error');
            return;
        }

        if (!place) {
            showMessage('Suscripción', 'Seleccione un establecimiento en el mapa.', 'error');
            return;
        }

        if (!SERVICE_LAYOUTS[service] || SERVICE_LAYOUTS[service] !== 'subscription') {
            showMessage('Suscripción', 'Seleccione un servicio con formulario de suscripción.', 'error');
            return;
        }

        if (!subscriptionItems.length) {
            showMessage('Suscripción', 'Debe agregar al menos un producto.', 'error');
            return;
        }

        $.ajax({
            url: "{{ route('paciente.mascotas.suscripcion_servicios.guardar') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                id_mascota: pet.id,
                servicio: service,
                lugar_nombre: place.branchName,
                lugar_direccion: place.address,
                items: subscriptionItems
            }
        }).done(function (response) {
            if (response.estado !== 1) {
                showMessage('Suscripción', response.msj || 'No fue posible guardar la suscripción.', 'error');
                return;
            }

            pet.suscripciones = response.suscripciones || pet.suscripciones;
            subscriptionItems = [];
            renderSubscriptionTable();
            renderHistory();

            showMessage('Suscripción registrada', response.msj, 'success');
        }).fail(function (xhr) {
            const response = xhr.responseJSON || {};
            showMessage('Suscripción', response.msj || 'No fue posible guardar la suscripción.', 'error');
        });
    }

    function saveBooking() {
        const pet = getSelectedPet();
        const service = $('#searchCategory').val();
        const branch = $('#bookingBranch').val();
        const date = $('#bookingDate').val();
        const time = $('#bookingTime').val();
        const place = searchState.filteredPlaces.find(function (item) {
            return item.branchName === branch;
        }) || searchState.selectedPlace;

        if (!pet) {
            showMessage('Reserva', 'Seleccione una mascota.', 'error');
            return;
        }

        if (!place) {
            showMessage('Reserva', 'Seleccione un establecimiento en el mapa.', 'error');
            return;
        }

        if (!SERVICE_LAYOUTS[service] || SERVICE_LAYOUTS[service] !== 'booking') {
            showMessage('Reserva', 'Seleccione un servicio con sistema de reserva.', 'error');
            return;
        }

        if (!branch || !date || !time) {
            showMessage('Reserva', 'Complete sucursal, fecha y horario.', 'error');
            return;
        }

        $.ajax({
            url: "{{ route('paciente.mascotas.suscripcion_servicios.reserva') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                id_mascota: pet.id,
                servicio: service,
                lugar_nombre: place.branchName,
                lugar_direccion: place.address,
                fecha: date,
                hora: time
            }
        }).done(function (response) {
            if (response.estado !== 1) {
                showMessage('Reserva', response.msj || 'No fue posible registrar la reserva.', 'error');
                return;
            }

            pet.reservas = response.reservas || pet.reservas;
            renderHistory();

            showMessage('Reserva registrada', response.msj, 'success');
        }).fail(function (xhr) {
            const response = xhr.responseJSON || {};
            showMessage('Reserva', response.msj || 'No fue posible registrar la reserva.', 'error');
        });
    }

    $(function () {
        initializeLeafletMap();
        initializeSubscriptionAutocomplete();
        renderSubscriptionTable();
        renderHistory();
        updateLocationStatus();

        $('#btnBuscarServicio').on('click', function () {
            runSearch();
        });

        $('#btnUseGeolocation').on('click', function () {
            requestGeolocation();
        });

        $('#manualLocation').on('change', function () {
            handleManualLocationChange();
        });

        $('#searchCategory, #selectedPet').on('change', function () {
            renderServiceSection($('#searchCategory').val());
        });

        $('#subscriptionItemName').on('input', function () {
            $('#subscriptionItemId').val('');
            $('#subscriptionPresentation').html('<option value="">Seleccione</option>');
        });

        $('#addSubscriptionItem').on('click', function () {
            addSubscriptionItem();
        });

        $(document).on('click', '.remove-subscription-item', function () {
            const index = $(this).data('index');
            subscriptionItems.splice(index, 1);
            renderSubscriptionTable();
        });

        $(document).on('click', '.select-search-result', function () {
            selectPlace($(this).data('place-id'), true);
        });

        $('#saveSubscription').on('click', function () {
            saveSubscription();
        });

        $('#submitBooking').on('click', function () {
            saveBooking();
        });
    });
</script>
@endsection
