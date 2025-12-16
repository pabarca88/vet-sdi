 <div id="solreporte" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="solreporte" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitar Reporte</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Tipo de Reporte</label>
                                <select class="form-control form-control-sm" name="tipo_rep" id="tipo_rep">
                                    <option>Seleccione opción</option>
                                    <option>Atenciones Medicas</option>
                                    <option>Examenes de Laboratorio</option>
                                    <option>Contables</option>
                                    <option>Reclamos</option>
                                    <option>Otros</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Contenido De Reporte</label>
                                <select class="form-control form-control-sm" name="cont_rep" id="cont_rep">
                                    <option>Seleccione opción</option>
                                    <option>Número por mes</option>
                                    <option>Número Total</option>
                                    <option>Gastos</option>
                                    <option>Ingresos</option>
                                    <option>Otros</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Responsable del Reporte</label>
                                <input class="form-control form-control-sm" name="resp_rep" id="resp_rep" type="text" >
                            </div>
                        </div>
                    
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Urgencia</label>
                                <select class="form-control form-control-sm" name="urg_rep" id="urg_rep">
                                    <option>Seleccione opción</option>
                                    <option>Regular</option>
                                    <option>Urgente</option>
                                    
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Otros</label>
                                <input class="form-control form-control-sm" name="otros_rep" id="otros_rep" type="text" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="rep-1" checked="">
                                    <label for="rep-1" class="cr"></label>
                                </div>
                                <label>Enviar Correo</label>
                            </div>
                        </div>
                    </div>
                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </form>
        </div>
    </div>
</div>

