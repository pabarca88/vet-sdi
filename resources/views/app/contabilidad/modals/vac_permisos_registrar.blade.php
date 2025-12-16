<div id="registrar_vac_perm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_vac_perm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Permisos/Vacaciones</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo de permiso</label>
                                <select class="form-control form-control-sm" id="tipo_perm">
                                    <option>Seleccione</option>
                                    <option>Vacaciones Legales</option>
                                    <option>Vacaciones Parciales</option>
                                    <option>Permiso sin goce Sueldo</option>
                                    <option>Permiso Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">A&ntilde;o</label>
                                <input type="number" class="form-control form-control-sm" name="ano_en curso" id="ano_en curso">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">D&iacute;as Totales Permiso</label>
                                <input class="form-control form-control-sm" name="dias_perm_tot" id="dias_perm_tot" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">D&iacute;as Totales Vacaciones</label>
                                <input class="form-control form-control-sm" name="dias_vac_tot" id="dias_vac_tot" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">D&iacute;as de Vacaciones Pendientes</label>
                                <input class="form-control form-control-sm" name="dias_vac_pend" id="dias_vac_pend" type="number" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Inicio Vac/permiso</label>
                                <input class="form-control form-control-sm" name="f_inic_perm" id="f_inic_perm" type="tdate" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">T&eacute;rmino Vac/permiso</label>
                                <input class="form-control form-control-sm" name="f_fin_perm" id="f_fin_perm" type="date" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">D&iacute;as de vacaciones/permiso</label>
                                <input class="form-control form-control-sm" name="dias_perm" id="dias_perm" type="number" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Lugar de Trabajo</label>
                                <select class="form-control form-control-sm" id="lugar_trab">
                                    <option>Seleccione Sucursal</option>
                                    <option>Suc 1</option>
                                    <option>Suc 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Funci&oacute;n</label>
                                <select class="form-control form-control-sm" id="funcion">
                                    <option>Seleccione opci&oacute;n</option>
                                    <option>Mantención el&eacute;ctrica</option>
                                    <option>Mantención Agua</option>
                                    <option>Mantención Estructura</option>
                                    <option>etc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="correo-vac" checked="">
                                    <label for="correo-vac" class="cr"></label>
                                </div>
                                <label>enviar email</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="cod_aut" checked="">
                                    <label for="cod_aut" class="cr"></label>
                                </div>
                                <label>Solicitar Codigo aut.</label>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="sonline" checked="">
                                    <label for="sonline" class="cr"></label>
                                </div>
                                <label>Contratar Secretaria online</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar </button>
                </form>
            </div>
        </div>
    </div>
</div>