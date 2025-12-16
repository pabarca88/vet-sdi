<!--cobro fijo-->
<div id="liquidaciom_arriendo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="liquidaciom_arriendo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Cobro de Arriendo Mensual</h5>
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
                            <li>00.000.000-0 (rut del titular)</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <h6 class="mb-0">Nombre</h6>
                        <ul>
                            <li>Nombres y apellidos del titular</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-0">Tipo de Cobro</h6>
                        <ul>
                            <li>Valor fijo mensual</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                            <label>350.000</label>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
					<div class="col-sm-6">
                        <button type="button" class="btn btn-info btn-sm float-right" data-toggle="" data-target="" aria-expanded="false" ">
                            <i class="feather icon-check-square"></i> Generar Cobro
                        </button>
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
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group fill">
                            <label class="floating-label">Tipo de cobro</label>
                             <select class="form-control form-control-sm">
                                <option>Valor fijo Mensual</option>
                                <option>Valor fijo mas gastos variables</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group fill">
                            <label class="floating-label">valor Fijo</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group fill">
                            <label class="floating-label">Valor gastos</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre">
                        </div>
                    </div>
					<div class="col-sm-3">
                        <div class="form-group fill">
                            <label class="floating-label">Valor Total</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre">
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
