@extends('template.paciente_dependiente.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip"
                                    data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.mis_profesionales') }}">Mis Veterinarios</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-md-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-white" id="myTab" role="tablist">
                        @foreach( $lista_especialidad as $le)
                            <li class="nav-item" onclick="active_e('{{$le}}')">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user2-tab" data-toggle="tab" href="#user2" role="tab" aria-controls="user2" aria-selected="false">{{$le}}</a>
                            </li>
                        @endforeach
                            <li class="nav-item" onclick="active_e('all')">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="user2-tab" data-toggle="tab" href="#user2" role="tab" aria-controls="user2" aria-selected="false">VER TODOS</a>
                            </li>
                            <!--<li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user1-tab" data-toggle="tab" href="#todos" role="tab" aria-controls="todos" aria-selected="true">Todos</a>
                                </li>-->
                                <!--
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user2-tab" data-toggle="tab"
                                    href="#user2" role="tab" aria-controls="user2" aria-selected="false">Medicina
                                    General</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user3-tab" data-toggle="tab"
                                    href="#odontologia" role="tab" aria-controls="odontologia"
                                    aria-selected="false">Odontología</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user4-tab" data-toggle="tab"
                                    href="#user4" role="tab" aria-controls="user4" aria-selected="false">Psicología</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user5-tab" data-toggle="tab"
                                    href="#user5" role="tab" aria-controls="user5" aria-selected="false">Cardiología</a>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="myTabContent">
                    <!--Pills Medicina General-->
                    <div class="tab-pane fade active show" id="user2" role="tabpanel" aria-labelledby="user2-tab">
                        <div class="row mb-n4">
                            @if(isset($profesional))
                                @foreach( $profesional as $p)
                                    @if(in_array($p->id, $desvinculados)==false)
                                    @php
                                        $especialidad_profesional = optional($p->Especialidad()->first())->nombre ?? 'Veterinario';
                                        $nombre_profesional = trim(collect([$p->nombre, $p->apellido_uno, $p->apellido_dos])->filter()->implode(' '));
                                    @endphp
                                    <!--Card Tomar Hora Perfil Médico -->
                                    <div class="col-md-4 filtro_le le_{{ $especialidad_profesional }}">
                                        <div class="card user-card user-card-1 mt-4">
                                            <div class="card-body pt-0">
                                                <div class="user-about-block text-center">
                                                    <div class="row align-items-end">
                                                        <div class="col"></div>
                                                        <div class="col">
                                                            <div class="position-relative d-inline-block">
                                                                <img class="img-radius img-fluid wid-80" src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="Mis médicos">
                                                            </div>
                                                        </div>
                                                        <div class="col text-right pb-3">
                                                            <div class="dropdown" style="cursor:pointer">
                                                                <a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="feather icon-more-horizontal" data-toggle="tooltip" data-placement="top" title="Opciones"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href='{{ url("Paciente/dependiente/desvincular_profesional/{$paciente->id}/{$paciente->id}/{$p->id}") }}'>Desvincular Veterinario</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <a href="#!" data-toggle="modal" data-target="#modal-report">
                                                        <span class="badge badge-purple mt-2">{{ $especialidad_profesional }}</span>
                                                        <h5 class="mb-1 mt-2">{{ $nombre_profesional }}</h5>
                                                    </a>
                                                    <p class="mb-3 text-muted">
                                                        <!--<i class="feather icon-calendar"></i></p>-->
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-info"
                                                        data-profesional-id="{{ $p->id }}"
                                                        data-profesional-nombre="{{ $nombre_profesional }}"
                                                        data-profesional-especialidad="{{ $especialidad_profesional }}"
                                                        onclick="abrirModalReservaVeterinaria(this);">
                                                        <i class="feather icon-calendar"></i> Agendar Hora
                                                    </button>
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-outline-info mt-2"
                                                        onclick="abrirFichaProfesionalMascota({{ $p->id }});">
                                                        <i class="feather icon-user"></i> Ver información profesional
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--CIERRE: Card Tomar Hora Perfil Médico -->
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!--Cierre: Pills Medicina General-->
                </div>
                <!--Cierre: Pills-->
            </div>
        </div>
    </div>
</div>
<!--Cierre: Container Completo-->

@include('app.general.buscador_profesionales.modals.ficha_profesional')

<div class="modal fade" id="modal_reserva_veterinaria" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_reserva_veterinaria_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_reserva_veterinaria_label">Agendar Hora Veterinaria</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="reserva_vet_profesional_id" value="">
                <input type="hidden" id="reserva_vet_lugar_id" value="">
                <input type="hidden" id="reserva_vet_fecha" value="">
                <input type="hidden" id="reserva_vet_hora" value="">
                <div class="mb-3">
                    <div class="small text-muted">Veterinario seleccionado</div>
                    <div class="font-weight-bold" id="reserva_vet_profesional_nombre">-</div>
                    <div class="text-muted small" id="reserva_vet_profesional_especialidad"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm mb-0">Lugar de atención</label>
                            <select class="form-control form-control-sm" id="reserva_vet_lugar_select" onchange="cambiarLugarReservaVeterinaria();">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm mb-0">Dirección</label>
                            <div class="border rounded p-2 small bg-light min-vh-0 reserva-vet-direccion" id="reserva_vet_direccion">
                                Seleccione un lugar de atención.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm mb-0">Días de atención</label>
                            <div class="border rounded p-2 small bg-light min-vh-0 reserva-vet-direccion" id="reserva_vet_dias">
                                Seleccione un lugar de atención.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm mb-0">Fecha</label>
                            <input
                                class="form-control form-control-sm"
                                type="text"
                                id="reserva_vet_fecha_input"
                                placeholder="Seleccione una fecha"
                                disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="small font-weight-bold text-center mb-2" id="reserva_vet_fecha_texto"></div>
                        <div class="row" id="reserva_vet_horas">
                            <div class="col-12 text-center text-muted small">Seleccione lugar y fecha para ver horas disponibles.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-info" id="btn_confirmar_reserva_vet" onclick="confirmarReservaVeterinaria();" disabled>
                    <i class="feather icon-check"></i> Confirmar Reserva
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script>
        function abrirFichaProfesionalMascota(idProfesional) {
            $.ajax({
                url: "{{ route('profesional.informacionProfesional') }}",
                type: 'GET',
                data: {
                    id_profesional: idProfesional,
                },
            }).done(function(data) {
                data = normalizarRespuestaAjax(data);

                if (data.estado !== 1 || !data.profesional) {
                    swal({
                        title: 'Información profesional',
                        text: data.msj || 'No fue posible cargar la información del veterinario.',
                        icon: 'error',
                        buttons: 'Aceptar',
                    });
                    return;
                }

                const profesional = data.profesional;
                const direccion = profesional.direccion || null;
                const ciudad = direccion && direccion.ciudad ? direccion.ciudad : null;
                const tipoEspecialidad = profesional.tipo_especialidad ? profesional.tipo_especialidad.nombre : (profesional.especialidad ? profesional.especialidad.nombre : 'Veterinario/a');
                const subTipoEspecialidad = profesional.sub_tipo_especialidad ? profesional.sub_tipo_especialidad.nombre : '';
                const direccionTexto = direccion
                    ? [direccion.direccion, direccion.numero_dir ? '#' + direccion.numero_dir : ''].filter(Boolean).join(' ')
                    : 'No informado';

                $('#modal_info_pro_foto').attr('src', profesional.img_profesional);
                $('#modal_info_pro_nombre').html((profesional.nombre || '') + ' ' + (profesional.apellido_uno || '') + ' ' + (profesional.apellido_dos || ''));
                $('#modal_info_pro_tipo_especialidad').html(tipoEspecialidad);
                $('#modalinfo_pro_sub_tipo_especialidad').html(subTipoEspecialidad !== '' ? ': ' + subTipoEspecialidad : '');
                $('#modal_info_pro_rut').text(profesional.rut || 'No informado');
                $('#modal_info_pro_email').text(profesional.email || 'No informado');
                $('#modal_info_pro_telefono').text(profesional.telefono_uno || 'No informado');
                $('#modal_info_pro_ciudad').text(ciudad ? ciudad.nombre : 'No informado');
                $('#modal_info_pro_direccion').text(direccionTexto);

                $('#modal_info_pro_academicos').html('');
                $(profesional.antecedente_academico || []).each(function(_, value) {
                    let html = '';
                    html += '<div class="col-md-3" align="left">' + (value.tipo_antecedente_academico ? value.tipo_antecedente_academico.nombre : 'Antecedente') + '</div>';
                    html += '<div class="col-md-4"><b>' + (value.nombre || 'No informado') + '</b></div>';
                    html += '<div class="col-md-5"><b>' + (((value.ciudad_pais || '') + ' ' + (value.universidad || '')).trim()) + '</b>' + (value.anio || '') + '</div>';
                    $('#modal_info_pro_academicos').append(html);
                });
                $('#modal_info_pro_academicos_vacio').toggle((profesional.antecedente_academico || []).length === 0);

                if ($.fn.DataTable.isDataTable('#modal_info_pro_lugar_atencion')) {
                    $('#modal_info_pro_lugar_atencion').DataTable().clear().destroy();
                }

                $('#modal_info_pro_lugar_atencion tbody').html('');
                $.each(data.lugares_atencion || [], function(_, value) {
                    const direccionLugar = value.direccion
                        ? [value.direccion.direccion, value.direccion.numero_dir ? '#' + value.direccion.numero_dir : '', value.direccion.ciudad ? value.direccion.ciudad.nombre : ''].filter(Boolean).join(', ')
                        : 'No informado';
                    let html = '<tr>';
                    html += '<td><span><strong>' + (value.nombre || 'Sin nombre') + ':</strong></span><br>' + direccionLugar + '</td>';
                    html += '<td style="color:#666666;text-align:left">' + (value.convenio && value.convenio.convenios ? value.convenio.convenios : 'No informado') + '</td>';
                    html += '<td style="text-align:left">' + (value.telefono || 'No informado') + '</td>';
                    html += '</tr>';
                    $('#modal_info_pro_lugar_atencion tbody').append(html);
                });
                $('#modal_info_pro_lugares_vacio').toggle((data.lugares_atencion || []).length === 0);

                $('#modal_info_pro_lugar_atencion').DataTable({
                    responsive: true,
                });

                $('#ficha_profesional').modal('show');
            }).fail(function() {
                swal({
                    title: 'Información profesional',
                    text: 'No fue posible cargar la información del veterinario.',
                    icon: 'error',
                    buttons: 'Aceptar',
                });
            });
        }

        const reservaVeterinariaState = {
            lugares: [],
            flatpickrInstance: null,
        };

        function active_e(tipo_esp){
            if(tipo_esp=='all')
            {
                $('.filtro_le').removeClass('d-none');
            }else{
                $('.filtro_le').addClass('d-none');
                $('.le_'+tipo_esp).removeClass('d-none');
            }
        }

        function normalizarRespuestaAjax(data) {
            if (typeof data === 'string') {
                try {
                    return JSON.parse(data);
                } catch (error) {
                    return {};
                }
            }

            return data || {};
        }

        function abrirModalReservaVeterinaria(button) {
            const profesionalId = $(button).data('profesional-id');
            const profesionalNombre = $(button).data('profesional-nombre');
            const profesionalEspecialidad = $(button).data('profesional-especialidad');

            $('#reserva_vet_profesional_id').val(profesionalId);
            $('#reserva_vet_profesional_nombre').text(profesionalNombre || '-');
            $('#reserva_vet_profesional_especialidad').text(profesionalEspecialidad || '');

            resetearModalReservaVeterinaria();
            $('#modal_reserva_veterinaria').modal('show');
            cargarLugaresReservaVeterinaria(profesionalId);
        }

        function resetearModalReservaVeterinaria() {
            reservaVeterinariaState.lugares = [];
            if (reservaVeterinariaState.flatpickrInstance) {
                reservaVeterinariaState.flatpickrInstance.destroy();
                reservaVeterinariaState.flatpickrInstance = null;
            }

            $('#reserva_vet_lugar_id').val('');
            $('#reserva_vet_fecha').val('');
            $('#reserva_vet_hora').val('');
            $('#reserva_vet_lugar_select').html('<option value="">Seleccione</option>');
            $('#reserva_vet_direccion').text('Seleccione un lugar de atención.');
            $('#reserva_vet_dias').text('Seleccione un lugar de atención.');
            $('#reserva_vet_fecha_input').val('').prop('disabled', true);
            $('#reserva_vet_fecha_texto').text('');
            $('#reserva_vet_horas').html('<div class="col-12 text-center text-muted small">Seleccione lugar y fecha para ver horas disponibles.</div>');
            $('#btn_confirmar_reserva_vet').prop('disabled', true);
        }

        function cargarLugaresReservaVeterinaria(idProfesional) {
            $.ajax({
                url: "{{ route('profesional.lugaresAtencionProfesionalBuscador') }}",
                type: 'GET',
                data: {
                    id_profesional: idProfesional,
                },
            }).done(function(data) {
                data = normalizarRespuestaAjax(data);
                if (data.estado !== 1 || !Array.isArray(data.registros) || data.registros.length === 0) {
                    $('#reserva_vet_horas').html('<div class="col-12 text-center text-danger small">Este veterinario no tiene lugares de atención disponibles.</div>');
                    return;
                }

                reservaVeterinariaState.lugares = data.registros;
                const $select = $('#reserva_vet_lugar_select');
                $select.html('<option value="">Seleccione</option>');

                $.each(data.registros, function(_, lugar) {
                    $select.append('<option value="' + lugar.id + '">' + lugar.nombre + '</option>');
                });
            }).fail(function() {
                $('#reserva_vet_horas').html('<div class="col-12 text-center text-danger small">No fue posible cargar los lugares de atención.</div>');
            });
        }

        function obtenerLugarReservaSeleccionado() {
            const idLugar = $('#reserva_vet_lugar_select').val();
            return reservaVeterinariaState.lugares.find(function(lugar) {
                return String(lugar.id) === String(idLugar);
            }) || null;
        }

        function formatearDireccionLugar(lugar) {
            if (!lugar || !lugar.direccion) {
                return 'Dirección no informada.';
            }

            const partes = [];
            if (lugar.direccion.direccion) {
                let direccion = lugar.direccion.direccion;
                if (lugar.direccion.numero_dir) {
                    direccion += ' ' + lugar.direccion.numero_dir;
                }
                partes.push(direccion);
            }
            if (lugar.direccion.ciudad && lugar.direccion.ciudad.nombre) {
                partes.push(lugar.direccion.ciudad.nombre);
            }

            return partes.length > 0 ? partes.join(', ') : 'Dirección no informada.';
        }

        function cambiarLugarReservaVeterinaria() {
            const lugar = obtenerLugarReservaSeleccionado();

            $('#reserva_vet_lugar_id').val(lugar ? lugar.id : '');
            $('#reserva_vet_direccion').text(formatearDireccionLugar(lugar));
            $('#reserva_vet_fecha').val('');
            $('#reserva_vet_hora').val('');
            $('#btn_confirmar_reserva_vet').prop('disabled', true);
            $('#reserva_vet_fecha_texto').text('');
            $('#reserva_vet_horas').html('<div class="col-12 text-center text-muted small">Seleccione una fecha para ver horas disponibles.</div>');

            if (!lugar) {
                $('#reserva_vet_dias').text('Seleccione un lugar de atención.');
                $('#reserva_vet_fecha_input').val('').prop('disabled', true);
                if (reservaVeterinariaState.flatpickrInstance) {
                    reservaVeterinariaState.flatpickrInstance.destroy();
                    reservaVeterinariaState.flatpickrInstance = null;
                }
                return;
            }

            cargarDiasReservaVeterinaria();
        }

        function cargarDiasReservaVeterinaria() {
            const idProfesional = $('#reserva_vet_profesional_id').val();
            const idLugar = $('#reserva_vet_lugar_select').val();

            $.ajax({
                url: "{{ route('profesional.DiasLaboralesProfesionaLugarAtencionBuscador') }}",
                type: 'GET',
                data: {
                    id_profesional: idProfesional,
                    lugar_atencion: idLugar,
                    tipo_agenda: 1,
                },
            }).done(function(data) {
                data = normalizarRespuestaAjax(data);

                if (data.estado !== 1 || !data.registros || !data.registros.horario_agenda_laboral) {
                    $('#reserva_vet_dias').text('Sin días de atención informados.');
                    $('#reserva_vet_fecha_input').val('').prop('disabled', true);
                    return;
                }

                const diasActivos = data.registros.horario_agenda_laboral.split(',').filter(Boolean);
                const diasTexto = {
                    '1': 'Lunes',
                    '2': 'Martes',
                    '3': 'Miércoles',
                    '4': 'Jueves',
                    '5': 'Viernes',
                    '6': 'Sábado',
                    '7': 'Domingo'
                };

                $('#reserva_vet_dias').text(diasActivos.map(function(dia) {
                    return diasTexto[dia] || dia;
                }).join(' - '));

                $('#reserva_vet_fecha_input').prop('disabled', false).val('');

                if (reservaVeterinariaState.flatpickrInstance) {
                    reservaVeterinariaState.flatpickrInstance.destroy();
                }

                reservaVeterinariaState.flatpickrInstance = flatpickr('#reserva_vet_fecha_input', {
                    dateFormat: 'Y-m-d',
                    minDate: 'today',
                    maxDate: new Date().fp_incr(60),
                    disable: [
                        function(date) {
                            const diaSemana = date.getDay() === 0 ? '7' : String(date.getDay());
                            return !diasActivos.includes(diaSemana);
                        }
                    ],
                    locale: 'es',
                    onChange: function(selectedDates, dateStr) {
                        $('#reserva_vet_fecha').val(dateStr || '');
                        $('#reserva_vet_hora').val('');
                        $('#btn_confirmar_reserva_vet').prop('disabled', true);

                        if (!dateStr) {
                            $('#reserva_vet_fecha_texto').text('');
                            $('#reserva_vet_horas').html('<div class="col-12 text-center text-muted small">Seleccione una fecha para ver horas disponibles.</div>');
                            return;
                        }

                        cargarHorasReservaVeterinaria(dateStr);
                    }
                });
            }).fail(function() {
                $('#reserva_vet_dias').text('No fue posible cargar los días de atención.');
            });
        }

        function cargarHorasReservaVeterinaria(fecha) {
            const idProfesional = $('#reserva_vet_profesional_id').val();
            const idLugar = $('#reserva_vet_lugar_select').val();

            $.ajax({
                url: "{{ route('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador') }}",
                type: 'GET',
                data: {
                    id_profesional: idProfesional,
                    id_lugar_atencion: idLugar,
                    dia: fecha,
                    tipo_agenda: 1,
                },
            }).done(function(data) {
                data = normalizarRespuestaAjax(data);
                $('#reserva_vet_hora').val('');
                $('#btn_confirmar_reserva_vet').prop('disabled', true);

                if (data.estado !== 1 || !Array.isArray(data.registros) || data.registros.length === 0) {
                    $('#reserva_vet_fecha_texto').text(data.text_fecha ? 'Horas disponibles para ' + data.text_fecha : '');
                    $('#reserva_vet_horas').html('<div class="col-12 text-center text-muted small">Sin horas disponibles para la fecha seleccionada.</div>');
                    return;
                }

                $('#reserva_vet_fecha_texto').text('Horas disponibles para ' + data.text_fecha);
                $('#reserva_vet_horas').html('');

                $.each(data.registros, function(_, registro) {
                    const horaVisible = moment(registro.hora, 'HH:mm:ss').format('HH:mm');
                    const html = `
                        <div class="col-sm-4 col-md-3 mb-2">
                            <button
                                type="button"
                                class="btn btn-outline-primary btn-sm btn-block reserva-vet-hora"
                                data-hora="${registro.hora}"
                                onclick="seleccionarHoraReservaVeterinaria(this);">
                                ${horaVisible}
                            </button>
                        </div>
                    `;

                    $('#reserva_vet_horas').append(html);
                });
            }).fail(function() {
                $('#reserva_vet_horas').html('<div class="col-12 text-center text-danger small">No fue posible cargar las horas disponibles.</div>');
            });
        }

        function seleccionarHoraReservaVeterinaria(button) {
            $('.reserva-vet-hora').removeClass('active btn-primary').addClass('btn-outline-primary');
            $(button).removeClass('btn-outline-primary').addClass('active btn-primary');
            $('#reserva_vet_hora').val($(button).data('hora'));
            $('#btn_confirmar_reserva_vet').prop('disabled', false);
        }

        function confirmarReservaVeterinaria() {
            const idProfesional = $('#reserva_vet_profesional_id').val();
            const idLugar = $('#reserva_vet_lugar_id').val();
            const fecha = $('#reserva_vet_fecha').val();
            const hora = $('#reserva_vet_hora').val();

            if (!idProfesional || !idLugar || !fecha || !hora) {
                swal({
                    title: 'Reserva de hora',
                    text: 'Debe seleccionar lugar, fecha y hora.',
                    icon: 'error',
                    buttons: 'Aceptar',
                });
                return;
            }

            $('#btn_confirmar_reserva_vet').prop('disabled', true);

            $.ajax({
                url: "{{ route('paciente.solicitar.hora') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    reserva_hora_id: "{{ $responsable->id }}",
                    id_profesional: idProfesional,
                    id_lugar_atencion: idLugar,
                    id_asistente: 2,
                    fecha_consulta: fecha + ' ' + hora,
                    tipo_hora_medica: 'C',
                    representante: 0,
                    acompanante: 0,
                    autorizacion_atencion: 1,
                    id_mascota: "{{ $paciente->id }}",
                },
            }).done(function(data) {
                data = normalizarRespuestaAjax(data);

                if (data.estado === 1 || data.estado === 'success' || data.id) {
                    $('#modal_reserva_veterinaria').modal('hide');
                    swal({
                        title: 'Hora reservada',
                        text: 'La hora fue agendada correctamente.',
                        icon: 'success',
                        buttons: 'Aceptar',
                    }).then(function() {
                        window.location.reload();
                    });
                    return;
                }

                $('#btn_confirmar_reserva_vet').prop('disabled', false);
                swal({
                    title: 'No fue posible agendar la hora',
                    text: data.msj || 'Intente nuevamente.',
                    icon: 'error',
                    buttons: 'Aceptar',
                });
            }).fail(function() {
                $('#btn_confirmar_reserva_vet').prop('disabled', false);
                swal({
                    title: 'No fue posible agendar la hora',
                    text: 'Ocurrió un error al guardar la reserva.',
                    icon: 'error',
                    buttons: 'Aceptar',
                });
            });
        }
    </script>

    <style>
        #modal_reserva_veterinaria {
            font-size: 16px;
        }

        #modal_reserva_veterinaria .modal-title {
            font-size: 20px;
            font-weight: 700;
        }

        #modal_reserva_veterinaria .small,
        #modal_reserva_veterinaria small {
            font-size: 14px !important;
            line-height: 1.4;
        }

        #modal_reserva_veterinaria .floating-label-activo-sm,
        #modal_reserva_veterinaria label {
            font-size: 15px !important;
            line-height: 1.3;
        }

        #modal_reserva_veterinaria .form-control,
        #modal_reserva_veterinaria .form-control-sm,
        #modal_reserva_veterinaria .custom-select,
        #modal_reserva_veterinaria select,
        #modal_reserva_veterinaria input {
            font-size: 15px !important;
            height: 48px;
            line-height: 1.25;
        }

        #modal_reserva_veterinaria .form-group {
            margin-bottom: 1rem;
        }

        #modal_reserva_veterinaria .border.rounded {
            font-size: 15px;
            line-height: 1.45;
            color: #5f6c85;
        }

        #modal_reserva_veterinaria .modal-footer .btn {
            font-size: 15px;
            font-weight: 600;
        }

        #modal_reserva_veterinaria .reserva-vet-hora {
            font-size: 14px !important;
            font-weight: 600;
            min-height: 38px;
        }

        #modal_reserva_veterinaria .flatpickr-calendar {
            font-size: 14px;
        }

        #modal_reserva_veterinaria .flatpickr-day,
        #modal_reserva_veterinaria .flatpickr-weekday,
        #modal_reserva_veterinaria .flatpickr-current-month input.cur-year,
        #modal_reserva_veterinaria .flatpickr-current-month .flatpickr-monthDropdown-months {
            font-size: 14px;
        }

        .reserva-vet-direccion {
            min-height: 64px;
        }
    </style>
@endsection
