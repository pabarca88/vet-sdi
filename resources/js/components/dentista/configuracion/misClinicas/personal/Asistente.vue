<template>
    <div class="tab-pane fade show active" id="asistentes-clinica" role="tabpanel" aria-labelledby="asistentes-clinica-tab">
        <div class="card">
            <div class="card-header pt-3 pb-2">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3">Asistentes</h6>
                        <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                            <button type="button" class="btn btn-sm btn-info" onclick="registrar_asistente();"><i class="feather icon-plus" aria-hidden="true"></i> Registrar asistente</button>
                            <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                            <div class="dropdown-menu py-1">
                                <button class="dropdown-item btn btn-info btn-sm" type="button" onclick="asociar_asistente();">Asociar asistente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="personal_dental_1" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
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
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Desasociar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>