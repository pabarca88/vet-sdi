<template>
    <div class="tab-pane fade" id="tiempo-atencion-clinica" role="tabpanel" aria-labelledby="tiempo-atencion-clinica-tab">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline">Tiempo de atención</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" onclick="añadir_procedimientos_clinica();">
                            <i class="feather icon-plus"></i> Añadir procedimiento
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="config_dental_2" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">Procedimiento</th>
                            <th class="align-middle">Tiempo</th>
                            <th class="align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--
                        <tr class="text-center">
                            <td class="align-middle"><strong>Primera consulta</strong><br>(Infantil)</td>
                            <td class="align-middle"><span>30 min</span>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_procedimientos_clinica();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="align-middle"><strong>Primera consulta</strong><br>(Adulto)</td>
                            <td class="align-middle"><span>30 min</span>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_procedimientos_clinica(();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="align-middle"><strong>Extracción simple</strong><br>(Adulto-Infantil)</td>
                            <td class="align-middle"><span>40 min</span>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_procedimientos_clinica(();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>
                        -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>