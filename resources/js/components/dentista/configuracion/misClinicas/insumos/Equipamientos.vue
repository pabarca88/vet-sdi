<template>
    <div class="tab-pane fade show active" id="equipaliento-clinica" role="tabpanel" aria-labelledby="equipaliento-clinica-tab">
        <div class="card">
            <div class="card-header pt-3 pb-2">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3">Equipamiento</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" onclick="equipamiento_dental();">
                            <i class="feather icon-plus"></i> Añadir
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="equip_ins_dental_1" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">Nº de serie</th>
                            <th class="align-middle">Descripción</th>
                            <th class="align-middle">Fecha<br> instalación</th>
                            <th class="align-middle">Última<br> mantención</th>
                            <th class="align-middle">Sucursal</th>
                            <th class="align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="align-middle">SD-109</td>
                            <td class="align-middle">Sillon dental<br>(Siemens)</td><!--Nombre y marca-->
                            <td class="align-middle">24/04/2019</td>
                            <td class="align-middle">12/01/2022</td>
                            <td class="align-middle">Clinica dental RedMedichile</td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_equip_dent();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="proveedor();" data-toggle="tooltip" data-placement="top" title="Proveedor"><i class="feather icon-info"></i></button>
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>