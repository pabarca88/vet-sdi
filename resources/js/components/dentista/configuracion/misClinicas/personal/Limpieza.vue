<template>
    <div class="tab-pane fade" id="limpieza-mantencion-clinica" role="tabpanel" aria-labelledby="limpieza-mantencion-clinica-tab">
        <div class="card">
            <div class="card-header pt-3 pb-2">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3">Limpieza y mantención</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" onclick="registrar_limpieza();">
                            <i class="feather icon-plus"></i> Registrar
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="personal_dental_3" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">Identificación</th>
                            <th class="align-middle">Sucursal</th>
                            <th class="align-middle">Contacto</th>
                            <th class="align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--<tr class="text-center">
                            <td class="align-middle"><span>Pepita Sanchez</span><br><span>00.000.000-0</span></td>
                            <td class="align-middle"><span>RedMedichile Quilpué</span><br>
                                <span>RedMedichile Curauma</span>
                            </td>
                            <td class="align-middle"><span>contacto@correo.cl</span><br>
                                <span>2938934834</span>
                                <span>3784782347</span>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_limpieza();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="align-middle"><span>Superaseo</span><br><span>00.000.000-0</span></td>
                            <td class="align-middle"><span>RedMedichile Quilpué</span><br>
                                <span>RedMedichile Curauma</span>
                                <span>RedMedichile Chiloé</span>
                            </td>
                            <td class="align-middle"><span>contacto@correo.cl</span><br>
                                <span>378234783</span>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_limpiezas();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>