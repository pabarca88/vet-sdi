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
                                <h5 class="m-b-10 font-weight-bold">GES</h5>
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
                    <div class="card">
                        <div class="card-top bg-info" id="tabla-registros">
                            <h5 class="font-weight-bold">GES</h5>
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
                                                <button type="button" class="btn btn-info-light-c btn-sm" onclick="filtrar_ges();">Buscar</button>
                                            </div>
                                        </div>


                                    </div>
                                    {{--  tablas de registros --}}
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabla_registros_ges" class=" display table dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>GES</th>
                                                        <th>FECHA</th>
                                                        <th>HORA</th>

                                                        <th>PACIENTE</th>
                                                        {{-- <th>RUT PACIETNE</th> --}}

                                                        <th>PROFESIONAL</th>
                                                        {{-- <th>RUT PROFESIONAL</th> --}}

                                                        <th>INSTITUCION</th>
                                                        <th>DIRECCION INST.</th>

                                                        <th>CONFIRMACION DE DIAGNOSTICO</th>
                                                        <th>TRATAMIENTO</th>

                                                        {{-- <th>codigo_verificacion</th> --}}
                                                        {{-- <th>created_at</th> --}}

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($registros)
                                                        @foreach ($registros as $registro)
                                                            <tr>
                                                                <td>{{ $registro->nombre_ges }} </td>
                                                                <td>{{ $registro->fecha_ficha_ges }} </td>
                                                                <td>{{ $registro->hora_ficha_ges }} </td>

                                                                <td>{{ $registro->paciente_nombre }}<br>{{ $registro->paciente_rut }}</td>
                                                                {{-- <td>{{ $registro->paciente_rut }} </td> --}}

                                                                <td>{{ $registro->profesional_nombre }}<br>{{ $registro->profesional_rut }}</td>
                                                                {{-- <td>{{ $registro->profesional_rut }} </td> --}}

                                                                <td>{{ $registro->nombre_institucion_ficha_ges }} </td>
                                                                <td>{{ $registro->direccion_institucion_ficha_ges }} </td>

                                                                <td>{{ $registro->confirmacion_diagnostica_ficha_ges }} </td>
                                                                <td>{{ $registro->paciente_tratamiento_ficha_ges }} </td>

                                                                {{-- <td>{{ $registro->codigo_verificacion }} </td> --}}
                                                                {{-- <td>{{ $registro->created_at }} </td> --}}
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
            $('#tabla_registros_ges').DataTable({
                responsive: true,
            });
        });

        function filtrar_ges()
        {
            var valido = 1;
            var mensaje = '';
            var anio = $('#filtro_anio').val();
            var mes = $('#filtro_mes').val();

            $('#tabla_registros_ges tbody').html('');
            $('#tabla_registros_ges').DataTable().destroy();

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
                var url = '{{ route("ministerio.ges.buscar") }}';

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
                        $('#tabla_registros_ges tbody').html('');

                        $.each(data.registros, function (key, value)
                        {
                            var html = '';
                            html += '<tr>';
                            html +=     '<td>'+value.nombre_ges+' </td>';
                            html +=     '<td>'+value.fecha_ficha_ges+' </td>';
                            html +=     '<td>'+value.hora_ficha_ges+' </td>';

                            html +=     '<td>'+value.paciente_nombre+'<br>'+value.paciente_rut+'</td>';
                            // html +=     '<td>'+value.paciente_rut+' </td>';

                            html +=     '<td>'+value.profesional_nombre+'<br>'+value.profesional_rut+'</td>';
                            // html +=     '<td>'+value.profesional_rut+' </td>';

                            html +=     '<td>'+value.nombre_institucion_ficha_ges+' </td>';
                            html +=     '<td>'+value.direccion_institucion_ficha_ges+' </td>';

                            html +=     '<td>'+value.confirmacion_diagnostica_ficha_ges+' </td>';
                            html +=     '<td>'+value.paciente_tratamiento_ficha_ges+' </td>';

                            // html +=     '<td>'+value.codigo_verificacion+' </td>';
                            // html +=     '<td>'+value.created_at+' </td>';
                            html += '</tr>';

                            $('#tabla_registros_ges tbody').append(html);
                        });


                         $('#tabla_registros_ges').DataTable({
                            responsive: true,
                            buttons: ['csv', 'excel'],
                        });
                    }
                    else
                    {
                        console.log('sin registros');

                         $('#tabla_registros_ges').DataTable({
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
