<!--datos Contrato-->
<div id="contrato_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contrato_usuario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Contrato</h5>
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
                            <li>00.000.000-0</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <h6 class="mb-0">Tipo</h6>
                        <ul>
                            <li>Honorarios</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-0">Horas semanales</h6>
                        <ul>
                            <li><span>12 horas</span></li>
							
                        </ul>
                    </div>
					<div class="col-md-6">
                        <h6 class="mb-0">Días</h6>
                        <ul>
                            <li><span>Lunes</span></li>
							<li><span>jueves</span></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <h6 class="mb-0">Función</h6>
                        <ul>
                            <li><span>Atención Urgencias</span></li>
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
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Tipo de Contrato</label>
                            <input type="email" class="form-control form-control-sm" name="email_cont" id="email_cont">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Horas semanales</label>
                            <input class="form-control form-control-sm" name="tel_contacto" id="tel_contacto" type="text">
                        </div>
                    </div>
					 <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Días de la semana</label>
                            <input class="form-control form-control-sm" name="tel_contacto" id="tel_contacto" type="text">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label">Función</label>
                            <input class="form-control form-control-sm" name="dir_contacto" id="dir_contacto" type="text">
                        </div>
                    </div>
					<div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label">Código</label>
                            <input class="form-control form-control-sm" name="dir_contacto" id="dir_contacto" type="text">
                        </div>
                    </div>
					<div class="col-sm-4">
                        <div class="form-group fill">
                            <button type="button" class="btn btn-info btn-sm ">Solicitar Código </button>
                            
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