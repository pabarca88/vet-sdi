@extends('template.laboratorio.administrador_local.template')
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
                            <li class="breadcrumb-item"><a href="escritorio_admin_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="administracion_admin.php">Administración</a></li>
                            <li class="breadcrumb-item"><a href="gastos_laboratorio_admin.php">Gastos</a></li>
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
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Gastos</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>
                    <table id="gastos" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Fecha de facturación</th>
                                <th class="text-center align-middle">Fecha de pago</th>
                                <th class="text-center align-middle">Sucursal</th>
                                <th class="text-center align-middle">Historial de<br> pagos</th>
                                <th class="text-center align-middle">Habilitar /<br> deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>Agua</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>18/11/2021</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>01/12/2021</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Nombre sucursal cm</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-success btn-sm" onclick="historial_gasto();"><i class="feather icon-file-text"></i> Ver historial</button>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="form-check">
                                      <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                    </div>
                                </td>                                                           
                            </tr>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>Luz</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>22/11/2021</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>05/12/2021</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Nombre sucursal cm</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-success btn-sm" onclick="historial_gasto();"><i class="feather icon-file-text"></i> Ver historial</button>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="form-check">
                                      <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                    </div>
                                </td>                                               
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->


<!-- Modal Historial de gastos -->
<div id="historial_gasto_lab" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="historial_gasto_lab" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
               <h5 class="modal-title text-white text-center">Historial de gastos</h5>
               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                          <i class="feather icon-alert-circle"></i> Historial de gastos anuales
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-c-blue">Nombre de la sucursal</h6>
                    </div>
                    <div class="col-md-12">
                        <table id="tabla_facturacion" class="display table table-striped table-hover dt-responsive nowrap table-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center">Tipo</th>
                                    <th class="align-middle text-center">Fecha de pago</th>
                                    <th class="align-middle text-center">Valor</th>
                                    <th class="align-middle text-center">Estado</th>
                                    <th class="align-middle text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle text-center">Agua</td>
                                    <td class="align-middle text-center">01/12/2021</td>
                                    <td class="align-middle text-center">$79.343</td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-danger">No pagado</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button type="button" class="btn btn-secondary btn-sm">Pagar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-center">Agua</td>
                                    <td class="align-middle text-center">01/12/2021</td>
                                    <td class="align-middle text-center">$67.533 CLP</td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-success">Pagado</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        -
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info">Imprimir historial</button>
            </div>
        </div>
    </div>
</div>

@endsection