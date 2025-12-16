<div id="m_biopsia_cir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_biopsia_cir" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Examen de Biopsia </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                                </input>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label">Nº de orden</label>
                                <input type="number" type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group fill">
                                <label class="label">Frasco uno</label>
                                
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Zona 1 de toma de muestra</label>
                                <input type="text" name="zona" id="zona" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
						<div class="col-sm-2">
                            <div class="form-group fill">
                                <label class="label">Frasco dos</label>
                                
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Zona 2 de toma de muestra</label>
                                <input type="text" name="zona" id="zona" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
						<div class="col-sm-2">
                            <div class="form-group">
                                <label class="label">Frasco tres</label>
                                
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Zona 3 de toma de muestra</label>
                                <input type="text" name="zona" id="zona" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
						<div class="col-sm-2">
                            <div class="form-group fill">
                                <label class="label">Frasco cuatro</label>
                                
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Zona 4 de toma de muestra</label>
                                <input type="text" name="zona" id="zona" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label">Patólogo o Laboratorio</label>
                                <input type="text" name="zona" id="zona" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biopsia_orl" id="obs_biopsia_orl"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-plus"></i> Agregar examen</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº Orden</th>
                                            <th class="text-center align-middle">localización</th>
                                            <th class="text-center align-middle">Zona</th>
                                            <th class="text-center align-middle">Patólogo</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                            <td class="text-center align-middle">7217821</td>
                                            <td class="text-center align-middle">PROSTATA</td>
                                            <td class="text-center align-middle">LOBULO MEDIO</td>
                                            <td class="text-center align-middle">DR LOPEZ</td>
                                            <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
