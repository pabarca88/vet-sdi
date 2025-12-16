<template>
    <div class="tab-pane fade" id="insumos-clinica" role="tabpanel" aria-labelledby="insumos-clinica-tab">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3">Insumos generales</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" onclick="nuevo_producto();">
                            <i class="feather icon-plus"></i> Añadir
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div style="overflow-x:auto;">
                    <table id="equip_ins_dental_2" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle wid-70">Producto</th>
                                <th class="text-center align-middle wid-30">Stock Inicial</th>
                                <th class="text-center align-middle wid-30">Entradas</th>
                                <th class="text-center align-middle wid-30">Salidas</th>
                                <th class="text-center align-middle wid-30">Stock actual</th>
                                <th class="text-center align-middle wid-40">Sucursal</th>
                                <th class="text-center align-middle">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span class="font-weight-bolder">Guantes desechables talla M</span><br><!--Nombre-->
                                    <span>#8129812898</span><!--Código-->
                                </td>
                                <td class="align-middle text-center">
                                    <span>300</span><br>
                                </td>
                                <td class="align-middle text-center">
                                    <span>-</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>100</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>250</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Nombre sucursal</span>
                                </td> 
                                <td class="align-middle text-center">
                                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="proveedor();" data-toggle="tooltip" data-placement="top" title="Más información"><i class="feather icon-info"></i></button>
                                    <button type="button" class="btn btn-success btn-sm btn-icon" onclick="añadir_producto();" data-toggle="tooltip" data-placement="top" title="Añadir productos"><i class="feather icon-feather icon-plus"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="quitar_producto();" data-toggle="tooltip" data-placement="top" title="Quitar productos"><i class="feather icon-feather icon-minus"></i></button>
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_producto();" data-toggle="tooltip" data-placement="top" title="Editar productos"><i class="feather icon-edit"></i></button>
                                </td>                                                                    
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>