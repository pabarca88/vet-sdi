<div id="modal_anestesia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_anestesia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Consentimiento Informado Anestesia</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal"aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label">Rut</label>
                        <input type="person" class="form-control form-control-sm" name="rut" id="rut">
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label">Nombres</label>
                        <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label">Apellidos</label>
                        <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label">Edad</label>
                        <input type="number" class="form-control form-control-sm" name="edad" id="edad">
                    </div>
                    <div class="form-group col-sm-8 col-md-8">
                        <label class="floating-label">Dirección</label>
                        <input type="address" class="form-control form-control-sm" name="direccion" id="direccion">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label-activo-sm">Región</label>
                        <select id="region" name="region" class="form-control form-control-sm">
                        <option selected value="0">Seleccione</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label-activo-sm">Comuna</label>
                        <select id="comuna" name="comuna" class="form-control form-control-sm">
                        <option selected value="0">Seleccione</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label-activo-sm">Fecha</label>
                        <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 mb-2">
                        <h6>En representación de</h6>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label">Nombre del paciente</label>
                        <input type="person" class="form-control form-control-sm" type="nombre_paciente" name="nombre_paciente">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label">Incapacitado en estos momentos por</label>
                        <input type="text" class="form-control form-control-sm" type="incapacitacion" name="incapacitacion">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 mb-2">
                        <h6>Certifico que el profesional</h6>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label">Nombre del profesional</label>
                        <input type="person" class="form-control form-control-sm" type="nombre_profesional" name="nombre_profesional">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 mb-2">
                        <h6>Me ha informado acerca de los riesgos y el porqué considera necesario realizar el procedimiento</h6>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label">Nombre y tipo de anestesia</label>          
                        <input type="person" class="form-control form-control-sm" type="nombre_profesional" name="nombre_profesional">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 text-center">
                        <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en PDF</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success btn-sm">Autoentificación</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-sm">Guardar</button>
        </div>
</div>
</div>