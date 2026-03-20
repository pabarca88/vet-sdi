@extends('template.paciente_dependiente.template')

@section('content')

<div class="pcoded-main-container">

    <div class="pcoded-content">

        <!--Header-->

        <div class="page-header">

            <div class="page-block">

                <div class="row align-items-center">

                    <div class="col-md-12">

                        <div class="page-header-title">

                            <h5 class="m-b-10 font-weight-bold">Escritorio de {{ $mascota->nombres ?? $mascota->nombre }}</h5>

                        </div>

                        <ul class="breadcrumb">

                            <li class="breadcrumb-item">

                                <a href="{{ ROUTE('paciente.dependiente.home', ['id_dependiente_activo'=> $mascota->id]) }}">Mi Escritorio </a>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <!--Cierre: Header-->

        <!--Botones superiores-->

        <div class="row m-b-30">

            <div class="col-md-12">

                <div class="card-deck">

                    <div class="card subir">

                        <a href="{{ ROUTE('paciente.dependiente.agendar_hora', ['id_dependiente_activo'=> $mascota->id]) }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-60 text-center mt-1" src="{{ asset('images/iconos/agenda.svg') }}">

                                <h5 class="mt-2"> Reservar Cita Veterinaria</h5>

                            </div>

                        </a>

                    </div>

                    <div class="card subir">

                        <a href="{{ ROUTE('paciente.dependiente.mis_profesionales', ['id_dependiente_activo'=> $mascota->id]) }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-60 text-center" src="{{ asset('images/iconos/profesionales.svg') }}">

                                <h5 class="mt-2"> Mis Veterinarios </h5>

                            </div>

                        </a>

                    </div>
                     <div class="card subir">

                        <a href="{{ ROUTE('registro_vacunas', ['id_dependiente_activo'=> $mascota->id]) }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-60 text-center" src="{{ asset('images/iconos/vacunas.svg') }}">

                                <h5 class="mt-2"> Mis vacunas</h5>

                            </div>

                        </a>

                    </div>
                  

                    <div class="card subir">

                        <a href="{{ ROUTE('registro_desparasitacion', ['id_dependiente_activo'=> $mascota->id]) }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-60 text-center" src="{{ asset('images/iconos/desparasitacion.svg') }}">

                                <h5 class="mt-2"> Registro de desparasitación</h5>

                            </div>

                        </a>

                    </div>


                    <div class="card subir">

                        <a href="{{ ROUTE('paciente.dependiente.mi_ficha', ['id_dependiente_activo'=> $mascota->id]) }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-60 text-center" src="{{ asset('images/iconos/fvu.svg') }}">

                                <h5 class="mt-1"> Mi Ficha Veterinaria Única</h5>

                            </div>

                        </a>

                    </div>

                    <div class="card subir">

                        <a href="{{ ROUTE('paciente.dependiente.receta', ['id_dependiente_activo'=> $mascota->id]) }}">

                            <div class="card-body text-center" style="cursor:pointer">

                                <img class="wid-60 text-center" src="{{ asset('images/iconos/docs.svg') }}">

                                <h5 class="mt-2">Documentos </h5>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!--CIERRE: Row Botones -->

        <!--Row Mis Horas Médicas y Botón Examenes-->

        <!--Tabla agenda del día y flujo de caja-->

        <div class="row m-b-30">

            <div class="col-md-8">

                <div class="card h-100 pb-0">

                    <div class="card-header text-center bg-c-info">

                        <h5 class="text-white d-inline text-center" style="font-size: 1.2rem;">Mis horas agendadas</h5>

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
                                            <td colspan="5" class="text-center align-middle">No existen registros</td>
                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card subir text-center h-100">

                    <img class="img-fluid card-img-top" src="{{ asset('images/iconos/profesional_no_inscrito.svg') }}"

                        alt="Flujo de caja">

                    <a href="{{ ROUTE('paciente.acceso_pni') }}" class="btn  btn-arrastre"

                        type="button">

                        <div class="card-body">

                            <h5 style="font-size: 1.1rem;" class="card-title pt-2">Atención por profesional no registrado</h5>

                            <p class="card-text">

                                Haga click acá para ser atendido, los datos de su atención quedarán

                                registrados en su Ficha Médica Única

                            </p>

                        </div>

                    </a>

                </div>

            </div>

        </div>



        <!--Cierre: Botones acceso examenes y profesional no inscrito-->

        <!--Row Botones-->

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

        <!--Cierre: Row Botones-->

    </div>

</div>

@endsection

@section('page-styles')
    <style>
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
            background-color: #7d4bc4;
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
