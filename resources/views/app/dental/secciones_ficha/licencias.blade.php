<div class="row">
    <div class="col-sm-12">
        <h5 class="text-c-blue mt-4 mb-1 f-16">Formulario de licencias médicas</h5>
        <hr>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-md-12">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ml-3">
                        <div class="switch switch-success d-inline m-r-10">
                            <input type="checkbox" id="tipo_licencia_1" checked>
                            <label for="tipo_licencia_1" class="cr"></label>
                        </div>
                        <label>Enfermedad común o maternal</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ml-3">
                        <div class="switch switch-success d-inline m-r-10">
                            <input type="checkbox" id="tipo_licencia_2" checked>
                            <label for="tipo_licencia_2" class="cr"></label>
                        </div>
                        <label>Laboral</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6>Información del trabajador</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="floating-label">
                                        Previsión
                                    </label>
                                    <select class="form-control form-control-sm" name="" id="">
                                        <option>Seleccione</option>
                                        <option>..</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Rut</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-sm btn-success btn-block">Verificar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6>Reposo</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Desde</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control form-control-sm" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Hasta</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control form-control-sm" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">
                                        Tipo de reposo
                                    </label>
                                    <select class="form-control form-control-sm" name="tipo_reposo" id="tipo_reposo">
                                        <option>Seleccione una opción</option>
                                        <option>Total</option>
                                        <option>Mañana</option>
                                        <option>Tarde</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6>Información de licencia</h6>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-4 mt-2">
                                        <label class="floating-label">
                                            Tipo de licencia
                                        </label>
                                        <select class="form-control d-inline form-control-sm" name="" id="">
                                            <option>Seleccione una opción</option>
                                            <option>..</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="switch switch-success d-inline m-r-2">
                                            <input type="checkbox" id="info_licencia_1" checked>
                                            <label for="info_licencia_1" class="cr"></label>
                                        </div>
                                        <label>Recuperabilidad laboral</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="switch switch-success d-inline m-r-2">
                                            <input type="checkbox" id="info_licencia_2" checked>
                                            <label for="info_licencia_2" class="cr"></label>
                                        </div>
                                        <label>Inicio trámite de invalidez</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6>Otros antecedentes</h6>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Descripción</label>
                                        <input type="text" class="form-control form-control-sm" name="descripcion"
                                            id="descripcion">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6>Exámenes de apoyo</h6>
                        </div>
                        <div class="card-body">
                            <form>
                                <input type="file" class="form-control-file pb-3" id="exampleFormControlFile1">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-info">Guardar licencia</button>
                    <button type="button" class="btn btn-success">Imprimir</button>
                </div>
            </div>
        </form>
    </div>
</div>
