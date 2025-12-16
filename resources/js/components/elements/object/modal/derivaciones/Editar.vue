<template>
    <div id="editar_interconsultor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="interconsultor" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">
                        Editar Interconsultor
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Especialidad</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione una opción</option>
                                        <optgroup label="Odontólogos">
                                            <option value="AL">Endodóncia</option>
                                            <option value="LA">Periodóncia</option>
                                            <option value="VA">Odontopediatría</option>
                                            <option value="VA">Etc.</option>
                                        </optgroup>
                                        <optgroup label="Médicos">
                                            <option value="AL">Otorrinolaringología</option>
                                            <option value="LA">Cirugía Cabeza y Cuello</option>
                                            <option value="VA">Dermatólogos</option>
                                            <option value="VA">Etc.</option>
                                        </optgroup>
                                        <optgroup label="Otros Profesionales">
                                            <option value="AL">Fonoaudiología</option>
                                            <option value="LA">Kinesiología</option>
                                            <option value="VA">Etc</option>
                                            <option value="VA">Etc.</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                     <input class="form-control form-control-sm" name="nombre_int" id="nombre_int" type="text" >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group fill">
                                    <label class="floating-label">Correo Electrónico</label>
                                    <input class="form-control form-control-sm" name="email" id="email" type="email" >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono</label>
                                    <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono (opcional)</label>
                                    <input class="form-control form-control-sm" name="telefono1" id="telefono1" type="number" >
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="floating-label">Dirección Oficina / Calle</label>
                                    <input class="form-control form-control-sm" name="direccion_lugar_atencion" id="direccion_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="floating-label">Número/of</label>
                                    <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label">Región</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione una opción</option>
                                        <optgroup label="Valparaíso">
                                            <option value="AL">Viña del Mar</option>
                                            <option value="LA">La Calera</option>
                                            <option value="VA">Valparaíso</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label">Comuna</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione una opción</option>
                                        <optgroup label="Valparaíso">
                                            <option value="AL">Viña del Mar</option>
                                            <option value="LA">La Calera</option>
                                            <option value="VA">Valparaíso</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info mb-0" >Agregar proveedor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>