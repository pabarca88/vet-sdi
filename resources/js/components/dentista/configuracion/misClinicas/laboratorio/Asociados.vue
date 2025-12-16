<template>
    <div class="tab-pane fade show active" id="laboratorio-clinica" role="tabpanel" aria-labelledby="laboratorio-clinica-tab">
        <div class="card">
            <div class="card-header pt-3 pb-2">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3">Laboratorios asociados</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" onclick="añadir_lab();">
                            <i class="feather icon-plus"></i> Añadir
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="lab_dental_1" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">Identificación</th>
                            <th class="align-middle">Especialidad</th>
                            <th class="align-middle">Contacto</th>
                            <th class="align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="align-middle"><span>Laboratorio dental Artdent</span><br><span>00.000.000-0</span></td>
                            <td class="align-middle"><span>Protesis</span><br>
                            </td>
                            <td class="align-middle"><span>contacto@correo.cl</span><br>
                                <span>2938934834</span>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_lab();" data-toggle="tooltip" data-placement="top" title="Editar">
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