<!--datos convenio-->
<div id="convenio_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="convenio_usuario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Convenio Usuario</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">

                <div class="row info-basica collapse show" id="info-basica-1">
                    <div class="col-md-12">
                        <h6 class="mb-0 d-inline">Rut</h6>
                        <button type="button" class="btn btn-link text-primary btn-sm float-right" data-toggle="collapse" data-target=".info-basica" aria-expanded="false" aria-controls="info-basica-1 info-basica-2">
                            <i class="feather icon-edit"></i> Editar información
                        </button>
                        <ul>
                            <li>Porcentaje</li>
							<li>20%</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-0">Cobros Extras</h6>
                        <ul>
                            <li>Aséo</li>
							<li>Insumos</li>
							<li>Esterilización</li>
                        </ul>
                    </div>
					<div class="col-md-6">
                        <h6 class="mb-0">Autorización</h6>
                        <ul>
                            <li>Pendiente</li>
                        </ul>
                    </div>
                </div>
                <div class="row info-basica collapse" id="info-basica-2">
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rut</label>
                            <input class="form-control form-control-sm" type="text" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Tipo de Cobro</label>
                             <select class="form-control form-control-sm" id="cm_prof_cobro">
                                <option value="0">Seleccione</option>
                                <option value="1">Fijo</option>
                                <option value="2">Porcentaje</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Valor</label>
                              <input class="form-control form-control-sm" name="cm_prof_cobro_valor" id="cm_prof_cobro_valor" type="text">
                        </div>
                    </div>
                    <div class="col-sm-4">
                       <div class="form-group fill">
                            <label class="floating-label">Extras</label>
                            <input class="form-control form-control-sm" name="cm_prof_cobro_extras" id="cm_prof_cobro_extras" type="text">
                        </div>
                    </div>
					<div class="col-sm-4">
                       <div class="form-group fill">
                            <label class="floating-label">Código</label>
                            <input class="form-control form-control-sm" name="cm_prof_aceptacion" id="cm_prof_aceptacion" type="text">
                        </div>
                    </div>
					<div class="col-sm-4">
                       <div class="form-group fill">
                            <button type="button" class="btn btn-success btn-sm" >Solicitar  Código </button>
                        </div>
                    </div>
					<div class="col-sm-12">
                        <button type="button" class="btn btn-info btn-sm float-right" data-toggle="collapse" data-target=".info-basica" aria-expanded="false" aria-controls="info-basica-1 info-basica-2">
                            <i class="feather icon-check-square"></i> Guardar cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
