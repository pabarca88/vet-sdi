@extends('template.direccion_salud.template')

@section('content')

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Escritorio ENFERMEDADES DE NOTIFICACION OBLIGATORIA</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ministerio.home') }}">Mi Escritorio </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row m-b-10" >
                <div class="col-sm-12">
                    <div class="card-a">
                        <div class="card-header-a" id="tabla-registros">
                            <h5 class="font-weight-bold">Registros</h5>
                        </div>
                        <div id="tabla-registros-c" class="collapse show" aria-labelledby="tabla-registros" data-parent="#tabla-registros">
                            <div class="card-body-aten-a shadow-none">
                                <div class="row">
                                    {{-- filtros --}}
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm" name="filtro_anio" id="filtro_anio">

                                                    @for ($i = 2023; $i <= intval(date('Y')); $i++)
                                                        @php
                                                            $selected = '';
                                                            if($anio == $i) $selected = 'selected';
                                                            else $selected = '';
                                                        @endphp
                                                        <option value="{{ $i }}" {{ $selected }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm" name="filtro_mes" id="filtro_mes">
                                                    <option value="">Seleccione</option>
                                                    @php
                                                        $meses = array('', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
                                                    @endphp
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option  value="{{ $i }}" {{ $mes == $i ? 'selected' : '' }}>{{$meses[$i]}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-info-light-c btn-sm" onclick="filtrar_eno();">Buscar</button>
                                            </div>
                                        </div>


                                    </div>
                                    {{--  tablas de registros --}}
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabla_registros_eno" class=" display table dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <td>DIARNOSTICO CIE-10</td>
                                                        <td>DIAGNOSTICO</td>
                                                        <td>PRIMER SINTOMA</td>
                                                        <td>PAIS CONTAGIO</td>
                                                        <td>PAIS</td>

                                                        <td>VACUNACION</td>
                                                        <td>F. ULTIMA DOSIS</td>
                                                        <td>N° ULTIMA DOSIS</td>

                                                        <td>TBC</td>
                                                        <td>TBC RECAIDAS</td>

                                                        <td>F. NOTIFICACION</td>
                                                        <td>H. NOTIFICACION</td>

                                                        <td>PACIENTE</td>

                                                        <td>NACIONALIDAD</td>
                                                        <td>OCUPACION</td>
                                                        <td>PUEBLO ORIGINARIO</td>
                                                        <td>CONDICION</td>
                                                        <td>CATEGORIA</td>

                                                        <td>PROFESIONAL</td>

                                                        <td>INSTITUCION</td>
                                                        <td>CODIGO</td>
                                                        <td>CEDE</td>
                                                        <td>CODIGO CEDE</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($registros)
                                                        @foreach ($registros as $registro)
                                                            <tr>
                                                                <td>{{ !empty($registro->diagnostico_cie)?$registro->diagnostico_cie:'' }}</td>
                                                                <td>{{ !empty($registro->diagnositico_confirmado)?$registro->diagnositico_confirmado:'' }}</td>
                                                                <td>{{ $registro->primeros_sintomas }}</td>
                                                                <td>{{ $registro->pais_contagio }}</td>
                                                                <td>{{ $registro->pais }}</td>

                                                                <td>{{ $registro->vacunacion }}</td>
                                                                <td>{{ !empty($registro->fecha_ultima_dosis)?$registro->fecha_ultima_dosis:'' }}</td>
                                                                <td>{{ !empty($registro->numero_ultima_dosis)?$registro->numero_ultima_dosis:'' }}</td>

                                                                <td>{{ !empty($registro->tbc)?$registro->tbc:'' }}</td>
                                                                <td>{{ !empty($registro->tbc_recaidas)?$registro->tbc_recaidas:'' }}</td>

                                                                <td>{{ $registro->fecha_notificacion }}</td>
                                                                <td>{{ $registro->hora_notificacion }}</td>

                                                                <td>{{ $registro->paciente_nombre }}<br/>{{ $registro->paciente_rut }}</td>

                                                                <td>{{ $registro->nacionalidad_paciente }}</td>
                                                                <td>{{ $registro->ocupacion_paciente }}</td>
                                                                <td>{{ $registro->pueblo_originario_paciente }}</td>
                                                                <td>{{ $registro->condicion_paciente }}</td>
                                                                <td>{{ $registro->categoria_paciente }}</td>

                                                                <td>{{ $registro->profesional_nombre }}<br/>{{ $registro->profesional_rut }}</td>

                                                                <td>{{ $registro->nombre_establecimiento }}</td>
                                                                <td>{{ $registro->codigo_establecimiento }}</td>
                                                                <td>{{ $registro->nombre_oficina }}</td>
                                                                <td>{{ $registro->codigo_oficina }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
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

    <script>
        $(document).ready(function () {
            $('#tabla_registros_eno').DataTable({
                responsive: true,
            });
        });

        function filtrar_eno()
        {
            var valido = 1;
            var mensaje = '';
            var anio = $('#filtro_anio').val();
            var mes = $('#filtro_mes').val();

            $('#tabla_registros_eno tbody').html('');
            $('#tabla_registros_eno').DataTable().destroy();

            if(anio == '')
            {
                valido = 0;
                mensaje = 'Anio Requerido para filtrar.\n';
            }

            if(mes == '')
            {
                valido = 0;
                mensaje = 'Mes Requerido para filtrar.\n';
            }

            if(valido == 1)
            {
                var url = '{{ route("ministerio.enfer_noti_obliga.buscar") }}';

                $.ajax({
                    type: "GET",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    url: url,
                    data: {
                        anio : anio,
                        mes : mes,
                    }
                })
                .done(function(data)
                {
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        $('#tabla_registros_eno tbody').html('');

                        $.each(data.registros, function (key, value)
                        {
                            var html = '';
                            html += '<tr>';
                            html +=     '<td>'+(value.diagnostico_cie!=null?value.diagnostico_cie:'')+'</td>';
                            html +=     '<td>'+(value.diagnositico_confirmado!=null?value.diagnositico_confirmado:'')+'</td>';
                            html +=     '<td>'+value.primeros_sintomas+'</td>';
                            html +=     '<td>'+value.pais_contagio+'</td>';
                            html +=     '<td>'+value.pais+'</td>';

                            html +=     '<td>'+value.vacunacion+'</td>';
                            html +=     '<td>'+(value.fecha_ultima_dosis!=null?value.fecha_ultima_dosis:'')+'</td>';
                            html +=     '<td>'+(value.numero_ultima_dosis!=null?value.numero_ultima_dosis:'')+'</td>';

                            html +=     '<td>'+(value.tbc!=null?value.tbc:'')+'</td>';
                            html +=     '<td>'+(value.tbc_recaidas!=null?value.tbc_recaidas:'')+'</td>';

                            html +=     '<td>'+value.fecha_notificacion+'</td>';
                            html +=     '<td>'+value.hora_notificacion+'</td>';

                            html +=     '<td>'+value.paciente_nombre+'<br/>'+value.paciente_rut+'</td>';

                            html +=     '<td>'+value.nacionalidad_paciente+'</td>';
                            html +=     '<td>'+value.ocupacion_paciente+'</td>';
                            html +=     '<td>'+value.pueblo_originario_paciente+'</td>';
                            html +=     '<td>'+value.condicion_paciente+'</td>';
                            html +=     '<td>'+value.categoria_paciente+'</td>';

                            html +=     '<td>'+value.profesional_nombre+'<br/>'+value.profesional_rut+'</td>';

                            html +=     '<td>'+value.nombre_establecimiento+'</td>';
                            html +=     '<td>'+value.codigo_establecimiento+'</td>';
                            html +=     '<td>'+value.nombre_oficina+'</td>';
                            html +=     '<td>'+value.codigo_oficina+'</td>';

                            html += '</tr>';

                            $('#tabla_registros_eno tbody').append(html);
                        });


                         $('#tabla_registros_eno').DataTable({
                            responsive: true,
                            buttons: ['csv', 'excel'],
                        });
                    }
                    else
                    {
                        console.log('sin registros');

                         $('#tabla_registros_eno').DataTable({
                            responsive: true,
                            buttons: ['csv', 'excel'],
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
        }
    </script>
@endsection
