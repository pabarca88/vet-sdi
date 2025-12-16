@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Info Sueldos Personal</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_contabilidad') }}">Volver escritorio Contabilidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Sueldos Personal</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <select class="form-control form-control-sm" name="filtro_anio" id="filtro_anio" onchange="carga_por_fecha();">
                                @for ($i = 2023;$i <= date('Y'); $i++)
                                    @if (empty($ano_toma))
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @else
                                        @if ($ano_toma == $i)
                                            <option value="{{ $i }}" selected>{{ $i }}</option>
                                        @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4 mb-4">
                            @php $array_mes = ['', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE']; @endphp
                            <select class="form-control form-control-sm" name="filtro_mes" id="filtro_mes" onchange="carga_por_fecha();">
                                @foreach ($array_mes as $mes )
                                    @if (!empty($mes))
                                        @if ($mes_toma == $loop->index)
                                            <option value="{{ $loop->index }}" selected>{{ $mes }}</option>
                                        @else
                                            <option value="{{ $loop->index }}">{{ $mes }}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!--Card Nav Pills-->
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills bg-white" id="rrhh_cm" role="tablist">
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-prof_salud-tab" data-toggle="tab" href="#pills-prof-salud" role="tab" aria-controls="pills-prof_salud" aria-selected="false">Profesionales de la salud</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="administrativos-tab" data-toggle="tab" href="#administrativos" role="tab" aria-controls="administrativos" aria-selected="false">Personal administrativo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="limpieza-mantencion-tab" data-toggle="tab" href="#limpieza-mantencion" role="tab" aria-controls="limpieza-mantencion" aria-selected="false">Limpieza y Mantención</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content" id="rrhh_cm">
                                <div class="tab-pane fade show active"id="pills-prof-salud" role="tabpanel" aria-labelledby="pills-prof-salud-tab">
                                    <table id="liquidaciones_de_sueldos" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre</th>
                                                <th class="text-center align-middle">Info-empleado</th>
                                                <th class="text-center align-middle">Sucursal</th>
                                                <th class="text-center align-middle">S. Base</th>
                                                <th class="text-center align-middle">Mes de Pago</th>
                                                <th class="text-center align-middle">Estado</th>
                                                <th class="text-center align-middle">Pagar</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($registro_profesional))
                                                @foreach ($registro_profesional as $personal)
                                                @if($personal->persona !== null)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            {{ (empty($personal->persona->nombres)?$personal->persona->nombre:$personal->persona->nombres).' '.$personal->persona->apellido_uno.' '.$personal->persona->apellido_dos }}
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <!--Botón Modal contacto -->
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto_persona('{{ $personal->tipo_empleado }}', '', '{{ $personal->id_empleado }}');" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>

                                                            @if(strpos(strtoupper($personal->tipo_empleado), 'ADMINISTRADOR') !== false)
                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos('{{ $personal->persona->id_admin }}');" data-toggle="tooltip" data-placement="top" title="Dato Deposito"><i class="fab fa-creative-commons-nc"></i></button>
                                                            @else
                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos('{{ $personal->persona->id_usuario }}');" data-toggle="tooltip" data-placement="top" title="Dato Deposito"><i class="fab fa-creative-commons-nc"></i></button>
                                                            @endif
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            {{ $personal->Institucion->nombre }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                              <span class="#">800.000</span>
                                                        </td>
                                                        @if ($personal->remuneracion)
                                                            {{-- remuneracion existente --}}
                                                            <td class="align-middle text-center">{{ $array_mes[$personal->remuneracion->r_mes_liq].'-'.$personal->remuneracion->r_ano_liq }}</td>

                                                            @if($personal->remuneracion->estado == 1)
                                                                <td class="align-middle text-center">
                                                                    <span class="badge badge-info">Generada</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <!--Botón pago-->
                                                                    {{-- <button type="button" class="btn btn-secondary btn-sm" onclick="mostrar_pasar_pagado('{{ $personal->remuneracion->id }}', $('#filtro_anio').val(), $('#filtro_mes').val());"><i class="feather icon-edit"></i>Pagar</button> --}}
                                                                    <button type="button" class="btn btn-secondary btn-sm" onclick="mostrar_pasar_pagado('{{ $personal->id }}', '{{ $personal->id_empleado }}', '{{ $personal->remuneracion->id }}');"><i class="feather icon-edit"></i>Pagar</button>
                                                                </td>
                                                            @elseif($personal->remuneracion->estado == 2)
                                                                <td class="align-middle text-center">
                                                                    <span class="badge badge-success">Pagado</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <!--Botón pago-->
                                                                    {{-- <button type="button" class="btn btn-secondary btn-sm" onclick=""><i class="feather icon-edit"></i>Pagar</button> --}}
                                                                </td>
                                                            @endif

                                                        @else
                                                            {{-- sin remuneracion --}}
                                                            <td class="align-middle text-center">-</td>

                                                            <td class="align-middle text-center">
                                                                <span class="badge badge-danger">Pendiente</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <!--Botón pago-->
                                                                <button type="button" class="btn btn-secondary btn-sm" onclick="generar_pago('PROFESIONAL', '{{ $personal->id_profesional }}', '{{ $personal->id }}', $('#filtro_anio').val(), $('#filtro_mes').val());"><i class="feather icon-edit"></i>Generar</button>
                                                            </td>
                                                        @endif



                                                    </tr>
                                                @endif
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                 <!--Tab asistentes-->
                                <div class="tab-pane fade" id="administrativos" role="tabpanel" aria-labelledby="administrativos-tab">
                                    <table id="liquidaciones_de_sueldos" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre</th>
                                                <th class="text-center align-middle">Info-empleado</th>
                                                <th class="text-center align-middle">Sucursal</th>
                                                <th class="text-center align-middle">S. Base</th>
                                                <th class="text-center align-middle">Mes de Pago</th>
                                                <th class="text-center align-middle">Estado</th>
                                                <th class="text-center align-middle">Pagar</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($registro_personal))
                                                @foreach ($registro_personal as $personal)
                                                @if($personal->persona !== null)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            {{ (empty($personal->persona->nombres)?$personal->persona->nombre:$personal->persona->nombres).' '.$personal->persona->apellido_uno.' '.$personal->persona->apellido_dos }}
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <!--Botón Modal contacto -->
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto_persona('{{ $personal->tipo_empleado }}', '', '{{ $personal->id_empleado }}');" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>

                                                            @if(strpos(strtoupper($personal->tipo_empleado), 'ADMINISTRADOR') !== false)
                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos('{{ $personal->persona->id_admin }}');" data-toggle="tooltip" data-placement="top" title="Dato Deposito"><i class="fab fa-creative-commons-nc"></i></button>
                                                            @else
                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos('{{ $personal->persona->id_usuario }}');" data-toggle="tooltip" data-placement="top" title="Dato Deposito"><i class="fab fa-creative-commons-nc"></i></button>
                                                            @endif
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            {{ $personal->Institucion->nombre }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                              <span class="#">800.000</span>
                                                        </td>
                                                        @if ($personal->remuneracion)
                                                            {{-- remuneracion existente --}}
                                                            <td class="align-middle text-center">{{ $array_mes[$personal->remuneracion->r_mes_liq].'-'.$personal->remuneracion->r_ano_liq }}</td>

                                                            @if($personal->remuneracion->estado == 1)
                                                                <td class="align-middle text-center">
                                                                    <span class="badge badge-info">Generada</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <!--Botón pago-->
                                                                    {{-- <button type="button" class="btn btn-secondary btn-sm" onclick="mostrar_pasar_pagado('{{ $personal->remuneracion->id }}', $('#filtro_anio').val(), $('#filtro_mes').val());"><i class="feather icon-edit"></i>Pagar</button> --}}
                                                                    <button type="button" class="btn btn-secondary btn-sm" onclick="mostrar_pasar_pagado('{{ $personal->id }}', '{{ $personal->id_empleado }}', '{{ $personal->remuneracion->id }}');"><i class="feather icon-edit"></i>Pagar</button>
                                                                </td>
                                                            @elseif($personal->remuneracion->estado == 2)
                                                                <td class="align-middle text-center">
                                                                    <span class="badge badge-success">Pagado</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <!--Botón pago-->
                                                                    {{-- <button type="button" class="btn btn-secondary btn-sm" onclick=""><i class="feather icon-edit"></i>Pagar</button> --}}
                                                                </td>
                                                            @endif

                                                        @else
                                                            {{-- sin remuneracion --}}
                                                            <td class="align-middle text-center">-</td>

                                                            <td class="align-middle text-center">
                                                                <span class="badge badge-danger">Pendiente</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <!--Botón pago-->
                                                                <button type="button" class="btn btn-secondary btn-sm" onclick="generar_pago('{{ $personal->tipo_empleado }}', '{{ $personal->id_empleado }}', '{{ $personal->id }}', $('#filtro_anio').val(), $('#filtro_mes').val());"><i class="feather icon-edit"></i>Generar</button>
                                                            </td>
                                                        @endif



                                                    </tr>
                                                @endif
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!--Tab aseo y mantencion-->
                                <div class="tab-pane fade" id="limpieza-mantencion" role="tabpanel" aria-labelledby="limpieza-mantencion-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3>mantención y aseo</h3>
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
</div>
<!--****Cierre Container Completo****-->


@endsection



@section('modales-profesionales_inst')

    @include('app.adm_cm.modal_adm.datos_banco')
    @include('app.adm_cm.modal_adm.horario_usuario')
    @include('app.adm_cm.modal_adm.convenio_usuario')

    {{--  @include('app.adm_cm.modal_adm.contacto')  --}}
    @include('app.contabilidad.modals.remuneraciones')
    @include('app.contabilidad.modals.modal_pagado')

    @include('app.adm_cm.modal_adm.liquidacion_profesionales')
@endsection
<script>
    function carga_por_fecha()
    {
        var ano = $('#filtro_anio').val();
        var mes = $('#filtro_mes').val();
        window.location.href = "{{ route('adm_cm.sueldos') }}?filtro_anio="+ano+"&filtro_mes="+mes+"";
    }
    {{--
    function cambio_estado_personal(id) {

        let id_asistente = id;
        let url = "{{ route('adm_cm.cambio_estado_personal') }}";

        if ($('#estado_personal').prop('checked')) {
            let confirmacion = confirm('Esta seguro que desea habilitar a este personal?');
            if (confirmacion == true) {

                let estado = 1;

                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            //_token: _token,
                            id_asistente: id_asistente,
                            estado: estado
                        },
                    })
                    .done(function(data) {
                        if (data == 'ok') {
                            $('#estado_personal').prop('checked', true);

                        } else {
                            swal({
                                title: "Error al Habilitar al Personal",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            // setTimeout(function() {
                            //     location.reload()
                            // }, 4000);
                            // alert('Error al Habilitar al o la asistente');
                            $('#estado_personal').prop('checked', false);
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });

            } else {
                $('#estado_personal').prop("checked", false);
            }
        } else {
            let confirmacion = confirm('Esta seguro que desea deshabilitar a este Personal?');
            if (confirmacion == true) {

                let estado = 0;

                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            //_token: _token,
                            id_asistente: id_asistente,
                            estado: estado
                        },
                    })
                    .done(function(data) {
                        if (data == 'ok') {
                            $('#estado_personal').prop('checked', false)

                        } else {
                            alert('Error al Deshabilitar al o la asistente');
                            $('#estado_personal').prop("checked", true);
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });

            } else {
                $('#estado_personal').prop("checked", true);
            }
        }
    };
    --}}
</script>
