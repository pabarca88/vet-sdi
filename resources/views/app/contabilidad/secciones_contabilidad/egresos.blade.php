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
                            <h5 class="m-b-10 font-weight-bold">Egresos</h5>
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


                <div class="">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12 align-botton">
                                        <h4 class="text-white f-20 d-inline ml-4 mt-3">Egresos y gastos en general</h4>
                                        <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_gasto">
                                            <i class="feather icon-plus"></i> Registrar Nuevo Gasto
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                        </div>
                                    </div>
                                    <div style="overflow-x:auto;">
                                        <table id="tabla_egresos_cm" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">N° fact/boleta</th>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Tipo de gasto</th>
                                                    <th class="text-center align-middle">Valor</th>
                                                    <th class="text-center align-middle">fecha de pago</th>
                                                    <th class="text-center align-middle">estado</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>0023214</strong></span><br>
                                                        <span>factura</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>02/12/2021</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <span><strong>luz</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>120000 </span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>12/12/2021</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <span>pagado</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_detalle_gasto();">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                        <i class="feather icon-x-circle"></i> D</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>0023214</strong></span><br>
                                                        <span>factura</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>02/12/2021</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <span><strong>Gastos comunes</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>300000 </span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>12/12/2021</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                            <span>pendiente</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_detalle_gasto();">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                        <i class="feather icon-x-circle"></i> D</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            {{-- @include('app.contabilidad.modals.registrar_gasto') --}}
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

</script>
