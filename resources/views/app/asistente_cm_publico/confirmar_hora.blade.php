@extends('template.asistente_cm_publico.template')
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
                                    <a href="{{ ROUTE('asistentecm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('asistentecm.buscar_paciente') }}">Confirmar hora Institución</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Buscador de pacientes-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-md-12 align-botton">
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Confirmar Hora</h4>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $lugares_atencion->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <table id="tabla_hora_por_confirmar" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <!-- <th class="text-center align-middle">id</th> -->
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Hora</th>
                                            <th class="text-center align-middle">Prof./Lab.</th>
                                            <th class="text-center align-middle">Paciente</th>
                                            <th class="text-center align-middle">Teléfono</th>
                                            <th class="text-center align-middle">Notificado</th>
                                            <th class="text-center align-middle">F.Notificado</th>
                                            <th class="text-center align-middle">Aciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($horas as $hm )
                                            <tr>
                                                <!-- <td class="text-center align-middle">
                                                    {{ $hm->id }}
                                                </td> -->
                                                <td class="text-center align-middle">
                                                    {{ \Carbon\Carbon::parse($hm->fecha_consulta)->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ \Carbon\Carbon::parse($hm->hora_inicio)->format('H:i') }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $hm->profesional->apellido_uno }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $hm->paciente->nombres }} {{ $hm->paciente->apellido_uno }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $hm->paciente->telefono_uno }}
                                                    @if(!empty($hm->paciente->telefono_dos))
                                                        <br>{{ $hm->paciente->telefono_dos }}
                                                    @endif
                                                </td>
                                                @if(!empty($hm->notificacionesconfirmacion))
                                                    <td class="align-middle text-center">
                                                            @php
                                                                $medio_notificacion_array = json_decode($hm->notificacionesconfirmacion->medio_notificacion);
                                                                // var_dump($medio_notificacion_array);
                                                            @endphp
                                                            @foreach($medio_notificacion_array as $key_paso => $paso)
                                                                @if($key_paso == 0)
                                                                    {{ '1°: '}}
                                                                    @foreach($paso as $noti)
                                                                        {{ mb_strtoupper($noti->tipo.', ') }}
                                                                    @endforeach

                                                                @else
                                                                    {{ '2°: '}}
                                                                    @foreach($paso as $noti)
                                                                        {{ mb_strtoupper($noti->tipo.', ') }}
                                                                    @endforeach
                                                                @endif

                                                            @endforeach

                                                    </td>
                                                    <td class="text-center align-middle">
                                                    {{ \Carbon\Carbon::parse($hm->notificacionesconfirmacion->fecha_notificacion)->format('d-m-Y H:i') }}
                                                    </td>
                                                @else
                                                    <td class="align-middle text-center">
                                                        Sin notificar
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        N/A
                                                    </td>
                                                @endif

                                                <td>
                                                    <div class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Confirmar" onclick="confirmar_hora('{{ $hm->id }}','Telefonica');">
                                                        <!-- <i class="feather icon-activity"></i> -->
                                                        C
                                                    </div>
                                                    <div class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"data-placement="top" title="Cancelar" onclick="cancelar_hora('{{ $hm->id }}','Telefonica');">
                                                        <!-- <i class="feather icon-edit"></i> -->
                                                        CN
                                                    </div>
                                                    @if(!empty($hm->notificacionesconfirmacion))
                                                    <div class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip"data-placement="top" title="No contesta" onclick="no_contesta('{{ $hm->id }}', '{{ $hm->notificacionesconfirmacion->id }}', 'Telefonica');">
                                                        <!-- <i class="feather icon-edit"></i> -->
                                                        NoC
                                                    </div>
                                                    @else
                                                    <div class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip"data-placement="top" title="No contesta" onclick="no_contesta('{{ $hm->id }}', '0', 'Telefonica');">
                                                        <!-- <i class="feather icon-edit"></i> -->
                                                        NoC
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
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
    <!--Cierre: Container Completo-->
@endsection

@section('page-script')
    <script>
        $(document).ready(function()
        {
            $('#tabla_hora_por_confirmar').DataTable({
                responsive: true,
            });
        });



        function confirmar_hora(id_hora, comentario)
        {

            let url = "{{ route('agenda.confirmar_hora') }}";

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        comentario: comentario,
                        id_hora_medica: id_hora
                    },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);
                    console.log(data);
                    swal({
                        title: "Exito!",
                        text: "Se ha confirmado su hora medica",
                        type: "success",
                        // DangerMode: true,
                        confirmButtonText: "Cool"
                    });

                    carga_registro_confirmar_hora();

                } else {
                    swal({
                        title: "Error!",
                        text: "No se pudo Confirmar Reserva",
                        type: "danger",
                        DangerMode: true,
                        confirmButtonText: "Cool"
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
            });

        }

        function cancelar_hora(id_hora, comentario) {

            let url = "{{ route('agenda.cancelar_hora') }}";

            $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    comentario: comentario,
                    id_hora_medica: id_hora
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);
                    console.log(data);
                    swal({
                        title: "Exito!",
                        text: "Hora medica cancelada correctamente",
                        type: "success",
                        confirmButtonText: "Cool"
                    });

                    carga_registro_confirmar_hora();


                } else {
                    alert('No se pudo Confirmar Reserva');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
            });
        }

        function no_contesta(id_hora, id_notificacion, comentario)
        {
            console.log('----------------no_contesta--------------------');
            console.log(id_hora);
            console.log(id_notificacion);
            console.log(comentario);
            console.log('----------------------------------------------');
        }

        function carga_registro_confirmar_hora()
        {
            var body = $('#tabla_hora_por_confirmar tbody');
            $('#tabla_hora_por_confirmar').dataTable().fnClearTable();
            $('#tabla_hora_por_confirmar').dataTable().fnDestroy();
            body.empty();

            url = "{{ route('asistentecm.cargar_hora_por_confirmar') }}";
            $.ajax({
                    url: url,
                    type: "get",
                    data: {}
                })
                .done(function(data) {

                    if (data.estado == 1)
                    {

                        console.log(data.registros);

                        for (i = 0; i < data.registros.length; i++)
                        {

                            var fila = '';
                            fila += '<tr>';
                            fila += '    <!-- <td class="text-center align-middle">'+data.registros[i].id+'</td> -->';
                            fila += '    <td class="text-center align-middle">'+moment(data.registros[i].fecha_consulta).format('DD-MM-YYYY') +'</td>';
                            fila += '    <td class="text-center align-middle">'+data.registros[i].hora_inicio +'</td>';
                            fila += '    <td class="text-center align-middle">'+data.registros[i].profesional.apellido_uno+'</td>';
                            fila += '    <td class="text-center align-middle">'+data.registros[i].paciente.nombres+' '+data.registros[i].paciente.apellido_uno+'</td>';
                            fila += '    <td class="text-center align-middle">';
                            fila += '        '+data.registros[i].paciente.telefono_uno;
                            if(data.registros[i].paciente.telefono_dos != '' && data.registros[i].paciente.telefono_dos != 'null' && data.registros[i].paciente.telefono_dos != null)
                                fila += '            <br>'+data.registros[i].paciente.telefono_dos;
                            fila += '    </td>';

                            if(data.registros[i].notificacionesconfirmacion != '' && data.registros[i].notificacionesconfirmacion != 'null' && data.registros[i].notificacionesconfirmacion != null)
                            {

                                var medio_notificacion_array = JSON.parse(data.registros[i].notificacionesconfirmacion.medio_notificacion);

                                fila += '        <td class="align-middle text-center">';
                                medio_notificacion_array.forEach((paso,key) => {
                                    if(key == 0)
                                    {
                                        fila += '                        1°: ';
                                        paso.forEach(noti => {
                                            fila += ''+noti.tipo.toUpperCase()+', ';
                                        });
                                    }
                                    else
                                    {
                                        fila += '                        2°: ';
                                        paso.forEach(noti => {
                                            fila += ''+noti.tipo.toUpperCase()+', ';
                                        });
                                    }
                                });
                                fila += '        </td>';

                                fila += '        <td class="text-center align-middle">';
                                fila += '        '+data.registros[i].notificacionesconfirmacion.fecha_notificacion+'';
                                fila += '        </td>';
                            }
                            else
                            {
                                fila += '        <td class="align-middle text-center">Sin notificar</td>';
                                fila += '        <td class="align-middle text-center">N/A</td>';
                            }
                            fila += '    <td>';
                            fila += '        <div class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Confirmar" onclick="confirmar_hora(\''+data.registros[i].id+'\',\'Telefonica\');">';
                            fila += '            <!-- <i class="feather icon-activity"></i> -->';
                            fila += '            C';
                            fila += '        </div>';
                            fila += '        <div class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"data-placement="top" title="Cancelar" onclick="cancelar_hora(\''+data.registros[i].id+'\',\'Telefonica\');">';
                            fila += '            <!-- <i class="feather icon-edit"></i> -->';
                            fila += '            CN';
                            fila += '        </div>';
                            if(data.registros[i].notificacionesconfirmacion != '' && data.registros[i].notificacionesconfirmacion != 'null' && data.registros[i].notificacionesconfirmacion != null)
                            {
                                fila += '        <div class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip"data-placement="top" title="No contesta" onclick="no_contesta(\''+data.registros[i].id+'\', \''+data.registros[i].notificacionesconfirmacion.id+'\', \'Telefonica\');">';
                                fila += '            <!-- <i class="feather icon-edit"></i> -->';
                                fila += '            NoC';
                                fila += '        </div>';
                            }
                            else
                            {
                                fila += '        <div class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip"data-placement="top" title="No contesta" onclick="no_contesta(\''+data.registros[i].id+'\', \'0\', \'Telefonica\');">';
                                fila += '            <!-- <i class="feather icon-edit"></i> -->';
                                fila += '            NoC';
                                fila += '        </div>';
                            }

                            fila += '    </td>';
                            fila += '</tr>';

                            body.append(fila);

                        }

                        $('#tabla_hora_por_confirmar').DataTable({
                            responsive: true,
                        });
                    }
                    else
                    {
                        body.empty();
                        $('#tabla_hora_por_confirmar').dataTable().fnClearTable();
                        $('#tabla_hora_por_confirmar').dataTable().fnDestroy();
                        var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>'
                        body.append(fila);
                        $('#tabla_hora_por_confirmar').DataTable({
                            responsive: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

    </script>
@endsection
