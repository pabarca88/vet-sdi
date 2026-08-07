@extends('template.paciente_dependiente.template')

@section('content')

<div class="pcoded-main-container">

    <div class="pcoded-content">

        <!--Header-->

        <div class="pd-hero">
            <div>
                <h4 class="pd-hero-title text-capitalize mb-0">Escritorio de {{ $mascota->nombres ?? $mascota->nombre }}</h4>
                <p class="pd-hero-subtitle mb-0">Toda su información veterinaria en un solo lugar</p>
            </div>
            <a class="pd-hero-btn" href="{{ ROUTE('paciente.home') }}"><i class="feather icon-home"></i> Volver al Inicio</a>
        </div>

        <!--Cierre: Header-->

        <!--Botones superiores-->

        <div class="pd-actions">

            <a class="pd-action" href="{{ ROUTE('paciente.dependiente.agendar_hora', ['id_dependiente_activo'=> $mascota->id]) }}">
                <span class="pd-action-icon"><img src="{{ asset('images/iconos/agenda.svg') }}" alt=""></span>
                <span class="pd-action-label">Reservar Cita Veterinaria</span>
            </a>

            <a class="pd-action" href="{{ ROUTE('paciente.dependiente.mis_profesionales', ['id_dependiente_activo'=> $mascota->id]) }}">
                <span class="pd-action-icon"><img src="{{ asset('images/iconos/profesionales.svg') }}" alt=""></span>
                <span class="pd-action-label">Mis Veterinarios</span>
            </a>

            <a class="pd-action" href="{{ ROUTE('registro_vacunas', ['id_dependiente_activo'=> $mascota->id]) }}">
                <span class="pd-action-icon"><img src="{{ asset('images/iconos/vacunas.svg') }}" alt=""></span>
                <span class="pd-action-label">Mis vacunas</span>
            </a>

            <a class="pd-action" href="{{ ROUTE('registro_desparasitacion', ['id_dependiente_activo'=> $mascota->id]) }}">
                <span class="pd-action-icon"><img src="{{ asset('images/iconos/desparasitacion.svg') }}" alt=""></span>
                <span class="pd-action-label">Registro de desparasitación</span>
            </a>

            <a class="pd-action" href="{{ ROUTE('paciente.dependiente.mi_ficha', ['id_dependiente_activo'=> $mascota->id]) }}">
                <span class="pd-action-icon"><img src="{{ asset('images/iconos/fvu.svg') }}" alt=""></span>
                <span class="pd-action-label">Mi Ficha Veterinaria Única</span>
            </a>

            <a class="pd-action" href="{{ ROUTE('paciente.dependiente.receta', ['id_dependiente_activo'=> $mascota->id]) }}">
                <span class="pd-action-icon"><img src="{{ asset('images/iconos/docs.svg') }}" alt=""></span>
                <span class="pd-action-label">Documentos</span>
            </a>

        </div>

        <!--CIERRE: Row Botones -->

        <!--Row Mis Horas Médicas y Botón Examenes-->

        <!--Tabla agenda del día y flujo de caja-->

        <div class="row m-b-30">

            <div class="col-md-8">

                <div class="card h-100 pb-0 pd-card">

                    <div class="card-header pd-card-header">

                        <span class="pd-card-header-icon"><i class="feather icon-calendar"></i></span>
                        <h5 class="mb-0">Mis citas agendadas</h5>

                    </div>

                    <div class="card-body pt-4 pb-0">

                        <div class="dt-responsive table-responsive" style="height:247px;">

                            <table id="simpletable" class="table table-striped table-bordered nowrap table-xs">

                                <thead>

                                    <tr>

                                        <th class="text-center align-middle">Acción</th>

                                        <th class="text-center align-middle">Mascota</th>

                                        <th class="text-center align-middle">Profesional</th>

                                        <th class="text-center align-middle">Información de Atención</th>

                                        <th class="text-center align-middle">Estado</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @forelse ($hora_medica as $hora)
                                        <tr>
                                            <td class="text-center align-middle">
                                                @if (in_array((int) ($hora->id_estado_visual ?? $hora->id_estado), [1, 8, 16], true))
                                                    <button class="btn btn-info btn-sm rounded-circle btn-confirmar-hora"
                                                        data-toggle="tooltip" data-placement="top" title="Confirmar Hora"
                                                        onclick="confirmar({{ $hora->id }});">
                                                        <i class="feather icon-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm rounded-circle btn-anular-hora"
                                                        data-toggle="tooltip" data-placement="top" title="Anular Hora"
                                                        onclick="anular({{ $hora->id }});">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                @elseif (($hora->id_estado_visual ?? $hora->id_estado) == 2)
                                                    <button class="btn btn-info btn-sm rounded-circle btn-confirmar-hora"
                                                        data-toggle="tooltip" data-placement="top" title="Hora confirmada"
                                                        disabled="disabled">
                                                        <i class="feather icon-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm rounded-circle btn-anular-hora"
                                                        data-toggle="tooltip" data-placement="top" title="Anular Hora"
                                                        onclick="anular({{ $hora->id }});">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                @else
                                                    <button class="btn btn-info btn-sm rounded-circle btn-confirmar-hora"
                                                        data-toggle="tooltip" data-placement="top" title="Confirmar Hora"
                                                        disabled="disabled">
                                                        <i class="feather icon-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm rounded-circle btn-anular-hora"
                                                        data-toggle="tooltip" data-placement="top" title="Anular Hora"
                                                        disabled="disabled">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                @endif
                                            </td>

                                            <td class="text-center align-middle">
                                                <strong>{{ $hora->nombre_mascota ?: ($mascota->nombre ?? 'Sin mascota') }}</strong>
                                                @if (!empty($hora->nombre_especie_mascota))
                                                    <br>{{ $hora->nombre_especie_mascota }}
                                                @endif
                                            </td>

                                            <td class="text-center align-middle">
                                                {{ $hora->nombre_profesional_completo }}<br>
                                                {{ $hora->nombre_especialidad_resumen }}
                                            </td>

                                            <td class="text-center align-middle">
                                                {{ $hora->nombre_lugar_atencion }}<br>
                                                {{ $hora->direccion_lugar_atencion }}<br>
                                                <span style="font-weight:bold;">
                                                    {{ \Carbon\Carbon::parse($hora->fecha_consulta . ' ' . $hora->hora_inicio)->format('d-m-Y H:i') }}
                                                    hrs
                                                </span>
                                            </td>

                                            <td class="text-center align-middle">
                                                @php $estadoVisualHora = (int) ($hora->id_estado_visual ?? $hora->id_estado); @endphp
                                                <span class="estado-hora-chip {{ in_array($estadoVisualHora, [1, 8, 16], true) ? 'pendiente' : ($estadoVisualHora == 2 ? 'confirmada' : ($estadoVisualHora == 3 ? 'cancelada' : (in_array($estadoVisualHora, [4, 5], true) ? 'en-proceso' : ($estadoVisualHora == 6 ? 'realizada' : ($estadoVisualHora == 7 ? 'inasistida' : 'desconocida'))))) }}">
                                                    {{ $hora->texto_estado }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center align-middle">
                                                <div class="pd-empty">
                                                    <span class="pd-empty-icon"><i class="feather icon-calendar"></i></span>
                                                    <p class="pd-empty-title">Aún no tienes horas agendadas</p>
                                                    <p class="pd-empty-text">Reserva una atención para {{ $mascota->nombres ?? $mascota->nombre }}.</p>
                                                    <a class="pd-empty-cta" href="{{ ROUTE('paciente.dependiente.agendar_hora', ['id_dependiente_activo'=> $mascota->id]) }}">Reservar Cita Veterinaria</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card h-100 pd-promo">

                    <img class="pd-promo-img" src="{{ asset('images/iconos/profesional_no_inscrito.svg') }}" alt="">

                    <h5 class="pd-promo-title">Atención por veterinario no registrado</h5>

                    <p class="pd-promo-text">
                        Los datos de su atención quedarán registrados en su Ficha Veterinaria Única.
                    </p>

                    <a href="{{ ROUTE('paciente.acceso_pni') }}" class="pd-promo-cta">Registrar atención</a>

                </div>

            </div>

        </div>



        <!--Cierre: Botones acceso examenes y profesional no inscrito-->

        <!--Row Botones

        <div class="row">

            <div class="col-md-12">

                <div class="card-deck">

                    <div class="card social-widget-card bg-c-info opacidad">

                        <a href="https://www.cronicos.cl/" class="btn" type="button">

                            <div class="card-body">

                                <div class="row">

                                    <h5 class="my-auto text-white ml-3 text-left">Portal Crónicos</h5>

                                    <img class="wid-70 ml-auto" src="{{ asset('images/iconos/cronicos.svg') }}">

                                </div>

                            </div>

                        </a>

                    </div>

                    <div class="card social-widget-card bg-c-info opacidad">

                        <a href="http://cronicos.cl/registro.php" target="_blank"  class="btn" type="button">

                            <div class="card-body">

                                <div class="row my-auto">

                                    <h5 class="my-auto text-white text-left">Inscriba sus<br> Medicamentos</h5>

                                    <img class="wid-70 ml-auto" src="{{ asset('images/iconos/medicamentos.svg') }}">

                                </div>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

        Cierre: Row Botones-->

    </div>

</div>

@endsection

@section('page-styles')
    <style>
        .pcoded-content {
            margin-top: 4px;
        }

        .card .card-header h5 {
            color: #212529;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .card-header {
            padding: 0.5rem 1.2rem 0.6rem;
            margin-bottom: 0;
            font-size: 1.2rem;
            background-color: #f7f7f7;
            color: #212529;
            border-bottom: 0px solid rgba(0, 0, 0, 0.125);
        }

        .pd-hero,
        .pd-card-header h5,
        .pd-empty-title,
        .pd-promo-title {
            font-weight: 700;
        }

        .pd-hero-title {
            font-weight: 800;
        }

        .pd-hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            background: linear-gradient(135deg, #44ad93 0%, #1e7d6d 100%);
            border-radius: 18px;
            padding: 28px 30px;
            margin: 20px 0 24px;
        }

        .pd-hero-title {
            font-size: 1.4rem;
            color: #fff;
        }

        .pd-hero-subtitle {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.85);
            margin-top: 4px;
        }

        .pd-hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fff;
            color: #0e7c7c;
            font-size: 0.85rem;
            font-weight: 700;
            padding: 10px 18px;
            border-radius: 999px;
            text-decoration: none;
            flex-shrink: 0;
        }

        .pd-hero-btn:hover {
            background: #f2fdfc;
            color: #0e7c7c;
            text-decoration: none;
        }

        .pd-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 14px;
            margin-bottom: 24px;
        }

        .pd-action {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-align: center;
            background: #fff;
            border: 1px solid #eef0f2;
            border-radius: 16px;
            padding: 20px 12px;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: border-color .15s ease, transform .15s ease, box-shadow .15s ease;
        }

        .pd-action:hover {
            border-color: #8a7fe0;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(138, 127, 224, .15);
            text-decoration: none;
        }

        .pd-action-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pd-action-icon img {
            width: 44px;
            height: 44px;
        }

        .pd-action-label {
            font-size: 0.85rem;
            font-weight: 700;
            color: #343a40;
        }

        .pd-card {
            border-radius: 16px;
            border: 1px solid #eef0f2;
            overflow: hidden;
        }

        .pd-card-header {
            background: #fff;
            border-bottom: 1px solid #eef0f2;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pd-card-header-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #f1eefc;
            color: #5b4fc4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .pd-card-header h5 {
            color: #212529;
            font-size: 1.05rem;
        }

        .pd-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            padding: 26px 12px;
        }

        .pd-empty-icon {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #f1eefc;
            color: #5b4fc4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 6px;
        }

        .pd-empty-title {
            color: #343a40;
            margin: 0;
        }

        .pd-empty-text {
            color: #6c757d;
            font-size: 0.85rem;
            margin: 0 0 10px;
        }

        .pd-empty-cta {
            display: inline-block;
            background: linear-gradient(135deg, #44ad93 0%, #1e7d6d 100%);
            color: #fff;
            font-size: 0.85rem;
            font-weight: 700;
            padding: 10px 20px;
            border-radius: 999px;
            text-decoration: none;
        }

        .pd-empty-cta:hover {
            opacity: .9;
            color: #fff;
            text-decoration: none;
        }

        .pd-promo {
            border-radius: 16px;
            border: none;
            background: linear-gradient(135deg, #44ad93 0%, #1e7d6d 100%);
            padding: 24px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .pd-promo-img {
            width: 250px;
            max-width: 100%;
            height: auto;
            margin-bottom: 12px;
        }

        .pd-promo-title {
            font-size: 1.2rem;
            color: #fff;
            margin-bottom: 6px;
        }

        .pd-promo-text {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 16px;
        }

        .pd-promo-cta {
            display: inline-block;
            background: #fff;
            color: #0e7c7c;
            font-size: 0.85rem;
            font-weight: 700;
            padding: 10px 20px;
            border-radius: 999px;
            text-decoration: none;
        }

        .pd-promo-cta:hover {
            background: #f2fdfc;
            color: #0e7c7c;
            text-decoration: none;
        }

        .estado-hora-chip {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            color: #fff;
            font-size: 0.7rem;
            font-weight: 600;
            line-height: 1.1;
            text-align: center;
            white-space: normal;
        }

        .estado-hora-chip.cancelada {
            background-color: #ff3d4f;
        }

        .estado-hora-chip.pendiente {
            background-color: #ffb640;
        }

        .estado-hora-chip.confirmada {
            background-color: #6ac000;
        }

        .estado-hora-chip.en-proceso {
            background-color: #8a7fe0;
        }

        .estado-hora-chip.realizada {
            background-color: #17c1c1;
        }

        .estado-hora-chip.inasistida {
            background-color: #6c757d;
        }

        .estado-hora-chip.desconocida {
            background-color: #4a5568;
        }
    </style>
@endsection

@section('page-script')
    <script>
        function confirmar(id)
        {
            $('.btn-confirmar-hora').attr('disabled', true);
            $('.btn-anular-hora').attr('disabled', true);

            let url = "{{ route('paciente.hora.medica.confirmar') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id_hora: id,
                    _token: CSRF_TOKEN,
                },
                success: function(data)
                {
                    if (data != null && parseInt(data.estado, 10) === 1) {
                        swal({
                            title: "Exito!",
                            text: "Se ha confirmado su hora medica",
                            type: "success",
                        });
                    } else {
                        swal({
                            title: "Error!",
                            text: "Se ha presentado un problema en la confirmación de su hora medica.\nIntente de nuevo.",
                            type: "error",
                        });
                    }

                    setTimeout(function() {
                        window.location.reload();
                    }, 500);
                }
            });
        }

        function anular(id)
        {
            $('.btn-confirmar-hora').attr('disabled', true);
            $('.btn-anular-hora').attr('disabled', true);

            let url = "{{ route('paciente.hora.medica.cancelar') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id_hora: id,
                    _token: CSRF_TOKEN,
                },
                success: function(data)
                {
                    if (data != null && parseInt(data.estado, 10) === 1) {
                        swal({
                            title: "Exito!",
                            text: "Se ha cancelado su hora medica",
                            type: "success",
                        });
                    } else {
                        swal({
                            title: "Error!",
                            text: "Se ha presentado un problema en la cancelación de su hora medica.\nIntente de nuevo.",
                            type: "error",
                        });
                    }

                    setTimeout(function() {
                        window.location.reload();
                    }, 500);
                }
            });
        }
    </script>
@endsection
