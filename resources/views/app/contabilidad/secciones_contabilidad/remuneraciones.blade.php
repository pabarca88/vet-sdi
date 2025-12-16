@extends('template.adm_cm.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Contabilidad</h5>
                        </div>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_contabilidad') }}">Volver escritorio Contabilidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="col-sm-12">


            <div class="row">
                <div class="col-md-12">
                    <!--Card Nav Pills-->
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-sueldos-tab" data-toggle="tab" href="#pills-sueldos" role="tab" aria-controls="pills-sueldos" aria-selected="false">Remuneraciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-leyesociales-tab" data-toggle="tab" href="#pills-leyesociales" role="tab" aria-controls="pills-leyesociales" aria-selected="false">Imposiciones y L sociales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-mut_cajas-tab" data-toggle="tab" href="#pills-mut_cajas" role="tab" aria-controls="pills-mut_cajas" aria-selected="false">Mutual  y cajas Compensación</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-finiquitos-tab" data-toggle="tab" href="#pills-finiquitos" role="tab" aria-controls="pills-finiquitos" aria-selected="false">Finiquitos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-vacaciones-tab" data-toggle="tab" href="#pills-vacaciones" role="tab" aria-controls="pills-vacaciones" aria-selected="false">Vacaciones/Permisos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-licencias-tab" data-toggle="tab" href="#pills-licencias" role="tab" aria-controls="pills-licencias" aria-selected="false">Licencias</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="pills-remuneraciones-tabContent">
                        <div class="tab-pane fade show active" id="pills-sueldos" role="tabpanel" aria-labelledby="pills-sueldos-tab">
                            <div class="row mb-n10">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Remuneraciones</h4>
                                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_remuneracion">
                                                    <i class="feather icon-plus"></i> Remuneraciones
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                </div>
                                            </div>
                                            <div style="overflow-x:auto;">
                                                <table id="tabla_remuneraciones_contabilidad" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Mes</th>
                                                            <th class="text-center align-middle">Nombre / Rut</th>
                                                            <th class="text-center align-middle">S.Base</th>
                                                            <th class="text-center align-middle">Grat</th>
                                                            <th class="text-center align-middle">T Impon</th>
                                                            <th class="text-center align-middle">Colac</th>
                                                            <th class="text-center align-middle">Mov</th>
                                                            <th class="text-center align-middle">T Haberes</th>
                                                            <th class="text-center align-middle">AFP</th>
                                                            <th class="text-center align-middle">Salud</th>
                                                            <th class="text-center align-middle">S.Ces.</th>
                                                            <th class="text-center align-middle">Antic.</th>
                                                            <th class="text-center align-middle">S.Liq.</th>
                                                            <th class="text-center align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($profesionales_contratados as $profesional)
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span><strong><?php echo date('m') ?></strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                {{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                @if($profesional->contrato)
                                                                {{ number_format($profesional->contrato->monto_imponible,0,',','.') }}
                                                                @else
                                                                CONVENIO
                                                                @endif
                                                            </td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center">

                                                            </td>
                                                            <td class="align-middle text-center">
                                                                @if($profesional->contrato)
                                                                    @php $colacion = ($profesional->contrato->colacion_porcentaje / 100) * $profesional->contrato->monto_imponible; @endphp
                                                                    {{ number_format($colacion,0,',','.') }}
                                                                @else
                                                                    CONVENIO
                                                                @endif
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                @if($profesional->contrato)
                                                                @php $locomocion = ($profesional->contrato->locomocion_porcentaje / 100) * $profesional->contrato->monto_imponible; @endphp
                                                                    {{ number_format($locomocion,0,',','.') }}
                                                                @else
                                                                    CONVENIO
                                                                @endif
                                                            </td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-success btn-sm" onclick="editar_remuneracionc();">
                                                                    <i class="feather icon-edit"></i> Editar</button>
                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                    <i class="feather icon-x-circle"></i>E</button>
                                                            </td>
                                                        </tr>

                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-12 mb-3">

                                                @include("app.adm_cm.contabilidad.modals_contador.registrar_remuneracion")
                                                {{-- @include("modals_contador/registrar_remuneracion_editar"); --}}

                                                </div>
                                        </div>
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                </div>
                                            </div>
                                            <div style="overflow-x:auto;">
                                                <table id="rem2_sumas" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                    <thead>
                                                        <tr>
                                                        <td colspan="14"><h5 class="text-center">Sumas Totales libro remuneraciones</h5>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center align-middle">---</th>
                                                            <th class="text-center align-middle">----------</th>
                                                            <th class="text-center align-middle">S.Base</th>
                                                            <th class="text-center align-middle">Grat</th>
                                                            <th class="text-center align-middle">T Impon</th>
                                                            <th class="text-center align-middle">Colac</th>
                                                            <th class="text-center align-middle">Mov</th>
                                                            <th class="text-center align-middle">T Haberes</th>
                                                            <th class="text-center align-middle">AFP</th>
                                                            <th class="text-center align-middle">Salud</th>
                                                            <th class="text-center align-middle">S.Ces.</th>
                                                            <th class="text-center align-middle">Antic.</th>
                                                            <th class="text-center align-middle">S.Liq.</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span><strong>sumatoria</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>total rem</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>500.000</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>50.000</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>550.000</span><br>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>25000</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>35000</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>610.000</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>75240</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>43112</span><br>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>4251</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>0</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>410.000</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-leyesociales" role="tabpanel" aria-labelledby="pills-leyesociales-tab">
                            <div class="row mb-n10">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Libro Imposiciones y Leyes sociales</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                </div>
                                            </div>
                                            <div style="overflow-x:auto;">
                                                <table id="tabla_leyes_sociales" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Nombre / Rut</th>
                                                            <th class="text-center align-middle">Fecha-contrato</th>
                                                            <th class="text-center align-middle">AFP</th>
                                                            <th class="text-center align-middle">SALUD</th>
                                                            <th class="text-center align-middle">Seguro Cesantía</th>
                                                            <th class="text-center align-middle">IST</th>
                                                            <th class="text-center align-middle">C Voluntaria</th>
                                                            <th class="text-center align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span><strong>Juan Sanchez</strong></span><br>
                                                                <span>17.345.466-2</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>02/1/2022</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>10.232 </span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>8542 </span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>1214</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>1514</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>no</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-success btn-sm" onclick="editar_leyessoc();">
                                                                <i class="feather icon-edit"></i> editar datos</button>
                                                                <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                                <i class="feather icon-x-circle"></i> D</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                <div class="col-md-12 mb-3">

                                                {{--  include("modals_contador/pagar_lsociales");
                                                include("modals_contador/pagar_lsociales_editar");  --}}

                                                </div>
                                        </div>
                                                <table id="tabla_totales_leyes_sociales" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                <h5>TOTALES</h5>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">---</th>
                                                            <th class="text-center align-middle">---</th>
                                                            <th class="text-center align-middle">AFP</th>
                                                            <th class="text-center align-middle">SALUD</th>
                                                            <th class="text-center align-middle">Seguro Cesantía</th>
                                                            <th class="text-center align-middle">IST</th>
                                                            <th class="text-center align-middle">C Voluntaria</th>
                                                            <th class="text-center align-middle">Sumar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                            ----
                                                            </td>
                                                            <td class="align-middle text-center">
                                                            ---
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>10.232 </span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>8542 </span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>1214</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>1514</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>no</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-success btn-sm" onclick="pagar_leyessoc();">
                                                                <i class="feather icon-edit"></i> Pagar</button>
                                                                <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                                <i class="feather icon-x-circle"></i> D</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-mut_cajas" role="tabpanel" aria-labelledby="pills-mut_cajas-tab">
                            <div class="row mb-n10">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Mutuales y Cajas de Compensación</h4>
                                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_mutcajas">
                                                    <i class="feather icon-plus"></i> Registrar mutualidad y cajas
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                </div>
                                            </div>
                                            <div style="overflow-x:auto;">
                                                <table id="tabla_mutuales_cajas_compensacion" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Nombre / Rut</th>
                                                            <th class="text-center align-middle">Fecha-contrato</th>
                                                            <th class="text-center align-middle">AFP</th>
                                                            <th class="text-center align-middle">SALUD</th>
                                                            <th class="text-center align-middle">Seguro Cesantía</th>
                                                            <th class="text-center align-middle">IST</th>
                                                            <th class="text-center align-middle">C Voluntaria</th>
                                                            <th class="text-center align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span><strong>Juan Sanchez</strong></span><br>
                                                                <span>17.345.466-2</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>02/1/2022</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>10.232 </span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>8542 </span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>1214</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>1514</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>no</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-success btn-sm" onclick="editar_mutcaja();">
                                                                <i class="feather icon-edit"></i> editar datos</button>
                                                                <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                                <i class="feather icon-x-circle"></i> D</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    app.contabilidad.modals.registrar_mutcajas
                                                @include('app.contabilidad.modals.registrar_mutcajas')
                                                @include('app.contabilidad.modals.registrar_mutcajas_editar')

                                                </div>
                                        </div>
                                            <table id="tabla_totales_mut_cajas" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                            <h5>TOTALES</h5>
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">---</th>
                                                        <th class="text-center align-middle">---</th>
                                                        <th class="text-center align-middle">AFP</th>
                                                        <th class="text-center align-middle">SALUD</th>
                                                        <th class="text-center align-middle">Seguro Cesantía</th>
                                                        <th class="text-center align-middle">IST</th>
                                                        <th class="text-center align-middle">C Voluntaria</th>
                                                        <th class="text-center align-middle">Sumar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            ----
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            ---
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>10.232 </span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>8542 </span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>1214</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>1514</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span>no</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm" onclick="pagar_leyessoc();">
                                                            <i class="feather icon-edit"></i> Pagar</button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                            <i class="feather icon-x-circle"></i> D</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-finiquitos" role="tabpanel" aria-labelledby="pills-finiquitos-tab">
                            <div class="row mb-n10">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Finiquitos</h4>
                                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#finiquito">
                                                    <i class="feather icon-plus"></i> Registrar Finiquito Empleado
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">

                                                @include('app.contabilidad.modals.finiquito')

                                                </div>
                                            </div>
                                            <div style="overflow-x:auto;">
                                                <table id="tab_finiquitos" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Nombre / Rut</th>
                                                            <th class="text-center align-middle">Fecha-contrato</th>
                                                            <th class="text-center align-middle">AFP</th>
                                                            <th class="text-center align-middle">SALUD</th>
                                                            <th class="text-center align-middle">Seguro Cesantía</th>
                                                            <th class="text-center align-middle">IST</th>
                                                            <th class="text-center align-middle">otros</th>
                                                            <th class="text-center align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span><strong>Juan Sanchez</strong></span><br>
                                                                <span>17.345.466-2</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>02/1/2022</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>10.232 </span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>8542 </span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>1214</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>1514</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>no</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-success btn-sm" onclick="editar_finiquito();">
                                                                <i class="feather icon-edit"></i> editar datos</button>
                                                                <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                                <i class="feather icon-x-circle"></i> D</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">

                                                        @include('app.contabilidad.modals.finiquito_editar')

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-vacaciones" role="tabpanel" aria-labelledby="pills-vacaciones-tab">
                            <div class="row mb-n10">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Vacaciones</h4>
                                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_vac_perm">
                                                    <i class="feather icon-plus"></i> Registrar Vacaciones/Permisos
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">

                                                </div>
                                            </div>

                                            <div style="overflow-x:auto;">
                                                <table id="tab_vacaciones" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Nombre / Rut</th>
                                                            <th class="text-center align-middle">Fecha-contrato</th>
                                                            <th class="text-center align-middle">Tipo</th>
                                                            <th class="text-center align-middle">inicio</th>
                                                            <th class="text-center align-middle">Término</th>
                                                            <th class="text-center align-middle">Total</th>
                                                            <th class="text-center align-middle">Acumulados</th>
                                                            <th class="text-center align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span><strong>Juan Sanchez</strong></span><br>
                                                                <span>17.345.466-2</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>02/1/2020</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>Permiso </span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>02/1/2022</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>02/2/2022</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>15 dias habiles</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>20</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-success btn-sm" onclick="autorizarperm();">
                                                                <i class="feather icon-edit"></i> Autorizar Permiso</button>
                                                                <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                                <i class="feather icon-x-circle"></i> D</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                    @include('app.contabilidad.modals.vac_permisos_registrar')
                                                    @include('app.contabilidad.modals.vac_permisos_autorizar')

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-licencias" role="tabpanel" aria-labelledby="pills-licencias-tab">
                            <div class="row mb-n4">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="col-md-12 align-botton">
                                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Licencias Médicas</h4>
                                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_licencia">
                                                    <i class="feather icon-plus"></i> Registrar Licencia
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">

                                                    @include('app.contabilidad.modals.licencias_procesar')
                                                    @include('app.contabilidad.modals.licencias_registrar')

                                                </div>
                                            </div>
                                            <div style="overflow-x:auto;">
                                                <table id="tabla_licencias" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Nombre / Rut</th>
                                                            <th class="text-center align-middle">Fecha-inicio/fecha térm.</th>
                                                            <th class="text-center align-middle">N° días</th>
                                                            <th class="text-center align-middle">Contacto</th>
                                                            <th class="text-center align-middle">Lugar de trabajo</th>
                                                            <th class="text-center align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span><strong>Juan Sanchez</strong></span><br>
                                                                <span>17.345.466-2</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span><strong>02/1/2022</strong></span><br>
                                                                <span><strong>12/1/2022</strong>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>10 </span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contactoc();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>Plaza Oeste</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-success btn-sm" onclick="licencias();">
                                                                <i class="feather icon-edit"></i> Procesar Licencia</button>
                                                                <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                                <i class="feather icon-x-circle"></i> D</button>
                                                            </td>
                                                        </tr>
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
    </div>
</div>
@endsection
<script type="text/javascript">
    function editar_mutcaja(){
        $('#registrar_mutcajas_editar').modal('show');
    }
    function autorizarperm(){
        $('#autorizar_vac_perm').modal('show');
    }
    function licencias(){
        $('#procesar_licencia').modal('show');
    }
    function editar_finiquito(){
        $('#finiquito_editar').modal('show');
    }
    function editar_leyessoc(){
        $('#pagar_lsocales_editar').modal('show');
    }
    function pagar_leyessoc(){ $('#pagar_lsocales').modal('show');}

    function editar_remuneracionc(){
        $('#registrar_remuneracion_editar').modal('show');
    }
</script>
