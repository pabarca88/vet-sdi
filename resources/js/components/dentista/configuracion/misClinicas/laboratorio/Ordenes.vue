<template>
    <div class="tab-pane fade" id="orden-lab-clinica" role="tabpanel" aria-labelledby="orden-lab-clinica-tab">
        <div class="card">
            <div class="card-header pt-3 pb-2">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3">Ordenes de laboratorio</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" onclick="añadir_orden_lab();">
                            <i class="feather icon-plus"></i> Añadir
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="lab_dental_2" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">Nº Orden</th>
                            <th class="align-middle">Identificación</th>
                            <th class="align-middle">Fecha <br>envío</th>
                            <th class="align-middle">Fecha <br>entrega</th>
                            <th class="align-middle">Establecimiento <br>solicitante</th>
                            <th class="align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                             <td class="align-middle"><span>3784938</span>
                            </td>
                            <td class="align-middle"><span>Laboratorio dental Artdent</span><br><span>00.000.000-0</span></td>
                            <td class="align-middle"><span>00/00/0000</span>
                            </td>
                            <td class="align-middle"><span>00/00/0000</span>
                            </td>
                            <td class="align-middle"><span>Redmedichile Curauma</span>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_orden_lab();" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="feather icon-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                    <i class="feather icon-x"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>