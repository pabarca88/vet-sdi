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
                                <h5 class="m-b-10 font-weight-bold">CONTROL MEDICAMENTOS</h5>
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
                                                <button type="button" class="btn btn-info-light-c btn-sm" onclick="filtrar_control_med();">Buscar</button>
                                            </div>
                                        </div>


                                    </div>
                                    {{--  tablas de registros --}}
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabla_registros_control_med" class=" display table dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>PRODUCTO</th>
                                                        <th>FARMACO</th>
                                                        <th>PRESENTACION</th>
                                                        <th>F. INDICACION</th>
                                                        <th>PACIENTE</th>
                                                        <th>PROFESIONAL</th>
                                                        <th>CANT.COMPRAR</th>
                                                        <th>CANT. VENDIDA</th>
                                                        <th>*F. VENTA</th>
                                                        <th>*FARMACIA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($registros)
                                                        @foreach ($registros as $receta)
                                                            @foreach ($receta['detalle'] as $detalle)
                                                                <tr>
                                                                    <td>{{ $detalle['producto'] }}</td>
                                                                    <td>{{ $detalle['farmaco'] }}</td>
                                                                    <td>{{ $detalle['presentacion'] }}</td>
                                                                    <td>{{ date('d-m-Y', strtotime($receta['created_at'])) }}</td>
                                                                    <td>{{ $receta['paciente']['nombres'].' '.$receta['paciente']['apellido_uno'].' '.$receta['paciente']['apellido_dos'] }}<br>{{ $receta['paciente']['rut'] }}</td>
                                                                    <td>{{ $receta['profesional']['nombre'].' '.$receta['profesional']['apellido_uno'].' '.$receta['profesional']['apellido_dos'] }}<br>{{ $receta['profesional']['rut'] }}</td>
                                                                    <td>{{ $detalle['cantidad_compra'] }}</td>
                                                                    <td>{{ $detalle['cantidad_vendida'] }}</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                </tr>
                                                            @endforeach
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
            $('#tabla_registros_control_med').DataTable({
                responsive: true,
            });
        });

        function filtrar_control_med()
        {
            var valido = 1;
            var mensaje = '';
            var anio = $('#filtro_anio').val();
            var mes = $('#filtro_mes').val();

            $('#tabla_registros_control_med tbody').html('');
            $('#tabla_registros_control_med').DataTable().destroy();

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
                var url = '{{ route("ministerio.control_medicamento.buscar") }}';

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
                        $('#tabla_registros_control_med tbody').html('');

                        $.each(data.registros, function (key, value)
                        {

                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();

                            $.each(value.detalle, function (key2, value2)
                            {
                                var html = '';
                                html += '<tr>';
                                html += '   <td>'+value2.producto+'</td>';
                                html += '   <td>'+value2.farmaco+'</td>';
                                html += '   <td>'+value2.presentacion+'</td>';
                                html += '   <td>'+fecha+'</td>';
                                html += '   <td>'+value.paciente.nombres+' '+value.paciente.apellido_uno+' '+value.paciente.apellido_dos+'<br>'+value.paciente.rut+'</td>';
                                html += '   <td>'+value.profesional.nombre+' '+value.profesional.apellido_uno+' '+value.profesional.apellido_dos+'<br>'+value.profesional.rut+'</td>';
                                html += '   <td>'+value2.cantidad_compra+'</td>';
                                html += '   <td>'+value2.cantidad_vendida+'</td>';
                                html += '   <td>-</td>';
                                html += '   <td>-</td>';

                                html += '</tr>';

                                $('#tabla_registros_control_med tbody').append(html);
                            });
                        });


                         $('#tabla_registros_control_med').DataTable({
                            responsive: true,
                            buttons: ['csv', 'excel'],
                        });
                    }
                    else
                    {
                        console.log('sin registros');

                         $('#tabla_registros_control_med').DataTable({
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

