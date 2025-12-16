<template>
    <div class="tab-pane fade" id="oficinas-box-clinica" role="tabpanel" aria-labelledby="oficinas-box-clinica-tab">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline">Oficinas y box</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" onclick="of_box_clinica();">
                            <i class="feather icon-plus"></i> Añadir
                        </button>
                    </div>
                </div>                
            </div>
            <div class="card-body">
                <table id="config_dental_3" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">Nombre</th>
                            <th class="align-middle">Sucursal</th>
                            <th class="align-middle">Nº de sillones</th>
                            <th class="align-middle">Uso</th>
                            <th class="align-middle">Capacidad</th>
                            <th class="align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--<tr class="text-center">
                            <td class="align-middle">Box 1</td>
                            <td class="align-middle"><span>Clinica dental RedMedichile</span>
                            </td>
                            <td class="align-middle">2
                            </td>
                            <td class="align-middle">Ortodoncia
                            </td>
                            <td class="align-middle">Todo odontólogo
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_of_box_clinica();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>