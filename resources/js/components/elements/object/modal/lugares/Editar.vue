<template>
    <div id="editar_lugar_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_lugar_atencion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="editar_lugar_atencion_titulo">Configurar lugar de atención</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_editar_lugar_atencion">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre</label>
                                <input name="editar_nombre_lugar_atencion" id="editar_nombre_lugar_atencion" type="text"  class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Dirección&nbsp;/&nbsp;Calle</label>
                                <input name="editar_direccion_lugar_atencion" id="editar_direccion_lugar_atencion" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Número</label>
                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Comuna</label>
                                <select class="js-example-basic-single form-control">
                                    <option>Seleccione</option>
                                    <optgroup label="Valparaíso">
                                        <option value="AL">Viña del Mar</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Tipo</label>
                                <select class="js-example-basic-single form-control">
                                    <option>Seleccione</option>
                                    <option>Centro Médico</option>
                                    <option>Consulta Particular</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Correo Electrónico</label>
                                <input name="editar_email_lugar_atencion" id="editar_email_lugar_atencion" type="email" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Teléfono</label>
                                <input name="editar_telefono_lugar_atencion" id="editar_telefono_lugar_atencion" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="not_pacientes_2">
                                    <label for="not_pacientes_2" class="cr"></label>
                                    <label>Notificar a pacientes modificación</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-info">Guardar Cambios</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</template>