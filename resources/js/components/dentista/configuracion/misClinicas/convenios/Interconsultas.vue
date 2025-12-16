<template>
    <div class="tab-pane fade show active" id="interconsultas-clinica" role="tabpanel" aria-labelledby="interconsultas-clinica-tab">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3">Interconsultas</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" onclick="añadir_inter();">
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
                            <th class="text-center align-middle">Especialidad</th>
                            <th class="text-center align-middle">Contacto</th>
                            <th class="text-center align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center">
                                <span>Nombre Apellido Apellido</span><br>
                                <span>00.000.000-0</span>
                            </td>
                            <td class="align-middle text-center">
                                <span>Endodoncia</span><br>
                            </td>
                            <td class="align-middle text-center">
                                <span>contacto@dominio.cl</span><br>
                                <span>+56 9 9858 5882</span><br>
                            </td>
                            <td class="align-middle text-center">
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="atencion_inter();" data-toggle="tooltip" data-placement="top" title="Lugares de atención"><i class="feather icon-home"></i></button>
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_inter();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <!--Botón eliminar-->
                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>                    
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>