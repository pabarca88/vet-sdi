{{--  MODAL AGREGAR RESUMEN CONTRATO, ROLES, ACCESO --}}
<div id="ver_contrato_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_rol" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar Empleado Nuevo</h5>
                <button type="button" class="close text-white cerrar_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <table id="tabla_ver_contrato" class="display table-bordered table table-striped dt-responsive nowrap table-xs" >
                    <tbody>
                        <tr>
                            <th class="align-middle" colspan="2">Tipo Contrato</th>
                            <th class="align-middle" colspan="2">
                                <div class="form-control form-control-sm" name="ver_contrato_tipo_contrato" id="ver_contrato_tipo_contrato"></div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4"><h5>Información Personal</h5></th>
                        </tr>
                        <tr>
                            <th class="align-middle">Rut</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_rut" id="ver_contrato_rut"></div>
                            </th>
                            <th class="align-middle">Nombres</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_nombre" id="ver_contrato_nombre"></div>
                            </th>
                        </tr>

                        <tr>
                            <th class="align-middle">Apellido Paterno</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_apellido_uno" id="ver_contrato_apellido_uno"></div>
                            </th>
                            <th class="align-middle">Apellido Materno</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_apellido_dos" id="ver_contrato_apellido_dos"></div>
                            </th>
                        </tr>
                        <tr>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_email" id="ver_contrato_email"></div>
                            </th>
                            <th class="align-middle">Telefono</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_telefono" id="ver_contrato_telefono"></div>
                            </th>
                        </tr>

                        <tr>
                            <th colspan="4"><h5>Dirección</h5></th>
                        </tr>
                        <tr>
                            <th class="align-middle">Región</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_region" id="ver_contrato_region"></div>
                            </th>
                            <th class="align-middle">Ciudad</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_ciudad" id="ver_contrato_ciudad"></div>
                            </th>
                        </tr>

                        <tr>
                            <th class="align-middle">Dirección</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_direccion" id="ver_contrato_direccion"></div>
                            </th>
                            <th class="align-middle">Número</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_numero" id="ver_contrato_numero"></div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4"><h5>Horario</h5></th>
                        </tr>
                        <tr>
                            <th class="align-middle">Dias Laborales</th>
                            <th class="align-middle" colspan="3">
                                <div class="form-control form-control-sm" name="ver_contrato_dias_laborales" id="ver_contrato_dias_laborales"></div>
                            </th>
                        </tr>
                        <tr>
                            <th class="align-middle">Hora entrada</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_hora_entrada" id="ver_contrato_hora_entrada"></div>
                            </th>
                            <th class="align-middle">Hora salida</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_hora_salida" id="ver_contrato_hora_salida"></div>
                            </th>

                        </tr>
                        <tr>
                            <th class="align-middle">Hora inicio colación</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_hora_entrada_colacion" id="ver_contrato_hora_entrada_colacion"></div>
                            </th>
                            <th class="align-middle">Hora término colación</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_hora_salida_colacion" id="ver_contrato_hora_salida_colacion"></div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4"><h5>Identificador a Institución</h5></th>
                        </tr>
                        <tr>
                            <th class="align-middle">Clave de Ingreso</th>
                            <th class="align-middle">
                                <div class="form-control form-control-sm" name="ver_contrato_clave_ingreso" id="ver_contrato_clave_ingreso"></div>
                            </th>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm mx-auto cerrar_modal" data-dismiss="modal" aria-label="Close">Cerrar</button>
            </div>
        </div>
    </div>
</div>
