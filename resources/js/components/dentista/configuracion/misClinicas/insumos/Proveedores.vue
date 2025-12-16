<template>
    <div class="tab-pane fade" id="proveedores-clinica" role="tabpanel" aria-labelledby="proveedores-clinica-tab">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3">Proveedores</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" onclick="añadir_proveedor();">
                            <i class="feather icon-plus"></i> Añadir
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div style="overflow-x:auto;">
                <table id="equip_ins_dental_4" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Proveedor</th>
                            <th class="text-center align-middle">Dirección</th>
                            <th class="text-center align-middle">Contacto</th>
                            <th class="text-center align-middle">Tipo</th>
                            <th class="text-center align-middle">Editar</th>
                            <th class="text-center align-middle">Habilitar /<br> deshabilitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center">
                                <span>Todo Guantes</span>
                            </td>
                            <td class="align-middle text-center">
                                <span>-</span><br>

                            </td>
                            <td class="align-middle text-center">
                                <span>ventas@todoguantes.cl</span><br>
                                <span>+56 9 9858 5882</span><br>
                                <span>+56 9 9858 5882</span>
                            </td>
                            <td class="align-middle text-center">
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="productos_proveedor();" data-toggle="tooltip" data-placement="top" title="Ver productos"><i class="feather icon-info"></i></button>
                            </td>
                            <td class="align-middle text-center">
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_proveedor();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                            </td>
                            <td class="align-middle text-center">
                                <div class="form-check">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="prov-1">
                                        <label class="custom-control-label" for="prov-1"></label>
                                    </div>
                                </div>
                            </td>                                                           
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</template>