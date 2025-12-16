@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Gastos</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('laboratorio.area_comercial') }}">Volver a Admin. Comercial</a></li>
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
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Gastos y pagos institucionales</h4>
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-outline-light btn-sm" onclick="mostrar_agregar_gasto();"><i class="feather icon-plus"></i> Agregar gasto</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <select class="form-control form-control-sm" name="filtro_anio" id="filtro_anio" onchange="carga_filtros();">
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
                        <div class="col-md-3 mb-3">
                            @php $array_mes = ['', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE']; @endphp
                            <select class="form-control form-control-sm" name="filtro_mes" id="filtro_mes" onchange="carga_filtros();">
                                @if ($ano_toma == 0)
                                    <option value="0" selected>Todos</option>
                                @else
                                    <option value="0">Todos</option>
                                @endif
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
                        <div class="col-md-3 mb-3">
                            <select class="form-control form-control-sm" name="filtro_emisor" id="filtro_emisor" onchange="carga_filtros();">

                                @if ($emisor)
                                    @if ($emision_s == 0)
                                        <option value="0" selected>Seleccione</option>
                                    @else
                                        <option value="0" >Seleccione</option>
                                    @endif

                                    @foreach ($emisor as $em)
                                        @if (trim($emision_s) == $em->emisor)
                                            <option value="{{ $em->emisor }}" selected>{{ $em->emisor }}</option>
                                        @else
                                            <option value="{{ $em->emisor }}">{{ $em->emisor }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="0" selected>Seleccione</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button type="button" class="btn btn-info btn-block btn-sm"><i class="feather icon-download"></i> Descargar reporte</button>
                        </div>
                    </div>
                    <table id="gastos_comunes_inst" class="display table table-striped  table-sm dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="align-middle">Tipo</th>
                                <th class="align-middle">Nombre</th>
                                <th class="align-middle">Fecha Vencimiento</th>
                                <th class="align-middle">Emisor</th>
                                <th class="align-middle">Folio</th>
                                <th class="align-middle">Cuenta Contable</th>
                                <th class="align-middle">Mes de pago</th>
                                <th class="align-middle">Año de pago</th>
                                <th class="align-middle">Modo de pago</th>
                                <th class="align-middle">Monto</th>
                                <th class="align-middle">Sucursal</th>
                                <th class="align-middle">Estado</th>
                                <th class="align-middle">Pagar</th>
                                <th class="align-middle">Editar</th>
                                {{-- <th class="align-middle">Habilitar /<br> deshabilitar</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if ($gastos)
                                @php
                                    $array_tipo = array('', 'Mensual', 'Semestral', 'Anual', 'Esporádico');
                                    $array_grupo = array('', 'Generales', 'Gastos Comunes', 'G. Operativos', 'Otros');
                                    $array_estado = array('', 'NUEVO', 'PAGADO', 'CANCELADO');
                                    $array_estado_color = array('', 'info', 'success', 'danger');
                                    $array_mes = array('', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
                                @endphp
                                @foreach ($gastos as $g)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span>{{ $array_tipo[$g->tipo] }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $g->nombre }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ date('d-m-Y', strtotime($g->vencimiento)) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $g->emisor }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $g->folio }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $array_grupo[$g->grupo] }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $array_mes[$g->mes_pago] }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $g->ano_pago }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $g->modo_pago }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $g->monto }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $g->LugarAtencion->nombre }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="badge badge-{{ $array_estado_color[$g->estado] }}">{{ $array_estado[$g->estado] }}</div>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($g->estado == 1)
                                                <!--Botón pago-->
                                                <button type="button" class="btn btn-success btn-sm" onclick="mostrar_pasar_pagado('{{ $g->id }}');">Pagar</button>
                                            @elseif ($g->estado == 2)

                                            @endif

                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($g->estado == 1)
                                                <!--Botón Modal-->
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="mostrar_editar_gasto('{{ $g->id }}');"><i class="feather icon-edit"></i> Editar</button>
                                            @elseif ($g->estado == 2)

                                            @endif

                                        </td>
                                        {{-- <td class="align-middle text-center">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="activo-1" checked="">
                                                <label for="activo-1" class="cr"></label>
                                            </div>
                                        </td> --}}
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
<!--****Cierre Container Completo****-->
<!--Modal agregar gastos cm -->
@include('app.contabilidad.modals.modal_agregar_gasto')

<!--Modal Pasar a Pagado gastos cm -->
@include('app.contabilidad.modals.modal_pagar_gasto')

<!--Modal editar gastos cm-->
@include('app.contabilidad.modals.modal_editar_gasto')

<script>
    $(document).ready(function() {
        $('#gastos_comunes_inst').DataTable({
            responsive: true,
        });
    });

    function carga_filtros()
    {
        var ano = $('#filtro_anio').val();
        var mes = $('#filtro_mes').val();
        var emisor = $('#filtro_emisor').val();
        window.location.href = "{{ route('gastos.home') }}?filtro_anio="+ano+"&filtro_mes="+mes+"&filtro_emisor="+emisor+"";
    }
</script>

@endsection



