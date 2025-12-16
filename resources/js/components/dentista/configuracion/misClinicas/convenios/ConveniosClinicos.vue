<template>
    <div class="tab-pane fade" id="convenios-clinica" role="tabpanel" aria-labelledby="convenios-clinica-tab">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3">Convenios</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" onclick="añadir_convenio();">
                            <i class="feather icon-plus"></i> Añadir
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="convenios_1" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Identificación</th>
                            <th class="text-center align-middle">Nº convenio</th>
                            <th class="text-center align-middle">Condiciones</th>
                            <th class="text-center align-middle">Descuento</th>
                            <th class="text-center align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center">
                                <span class="font-weight-bolder">AFP PERICA</span><br>
                                <span>00.000.000-0</span>
                            </td>
                            <td class="align-middle text-center">
                                <span>02</span><br>
                            </td>
                            <td class="align-middle text-center">
                                <span>Solo con carnet de AFP</span>
                            </td>
                            <td class="align-middle text-center">
                                <span>30% arancel</span>
                            </td>
                            <td class="align-middle text-center">
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_convenio();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>                                                           
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>