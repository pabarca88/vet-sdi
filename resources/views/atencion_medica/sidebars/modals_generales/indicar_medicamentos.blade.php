<div id="indicar_medicamentos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_medicamentos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Indicar medicamento</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Medicamento</label>
                                <select class="form-control form-control-sm" id="" name="">
                                    <option>Seleccione una opción</option>
                                    <option>..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Dosis</label>
                                <select class="form-control form-control-sm" id="" name="">
                                    <option>Seleccione una opción</option>
                                    <option>..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Frecuencia</label>
                                <select class="form-control form-control-sm" id="" name="">
                                    <option>Seleccione una opción</option>
                                    <option>..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Vía de Administración</label>
                                <select class="form-control form-control-sm" id="" name="">
                                    <option>Seleccione una opción</option>
                                    <option>..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Periodo</label>
                                <select class="form-control form-control-sm" id="" name="">
                                    <option>Seleccione una opción</option>
                                    <option>..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un medicamento, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Medicamento</th>
                                            <th class="text-center align-middle">Dosis</th>
                                            <th class="text-center align-middle">Frecuencia</th>
                                            <th class="text-center align-middle">Vía Administración</th>
                                            <th class="text-center align-middle">Periodo</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>Paracetamol</span><br><span>500mg</span></td>
                                            <td class="text-center align-middle">1 Comprimido</td>
                                            <td class="text-center align-middle">8 Horas</td>
                                            <td class="text-center align-middle">Oral</td>
                                            <td class="text-center align-middle">7 días</td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--Cierre: Tabla-->
                        </div>
                        <div class="col-sm-12 mt-3 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="no_existe_switch">
                                <label class="custom-control-label text-primary" for="no_existe_switch"><strong><u>El medicamento no está en la lista</u></strong></label>
                            </div>
                        </div>
                        <div class="row" id="no_existe" style="display:none">
                            <div class="col-sm-12 col-md-12">
                                <p>Ayudanos a mejorar nuestro módulo de recetas ingresando el nombre del medicamento o dispositivo faltante</p>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <input class="form-control form-control-sm" type="text" placeholder="Nombre del medicamento o dispositivo">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3 mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="ranking_recetas_switch">
                                <label class="custom-control-label text-primary" for="ranking_recetas_switch"><strong><u>Ranking de recetas controladas del paciente</u></strong></label>
                            </div>
                        </div>
                        <div class="row" id="ranking_recetas" style="display:none">
                            <div class="col-sm-12 col-md-12">
                                <h6 class="text-c-blue mb-3">Recetas propias</h6>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo de control</label>
                                    <select class="form-control form-control-sm" id="" name="">
                                        <option>Seleccione una opción</option>
                                        <option value="S" data-select2-id="0">Seleccione una opción</option>
                                        <option value="1"> Control Psicotrópicos</option>
                                        <option value="2"> Control Estupefacientes</option>
                                        <option value="3"> Receta cheque </option>
                                        <option value="4"> Receta Retenida Simple</option>
                                        <option value="5"> Receta Retenida C/Codeína</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <input class="form-control form-control-sm" type="text" placeholder="Nº de recetas">
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <h6 class="text-c-blue mb-3">Recetas totales</h6>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo de control</label>
                                    <select class="form-control form-control-sm" id="" name="">
                                        <option value="S" data-select2-id="0">Seleccione una opción</option>
                                        <option value="1"> Control Psicotrópicos</option>
                                        <option value="2"> Control Estupefacientes</option>
                                        <option value="3"> Receta cheque </option>
                                        <option value="4"> Receta Retenida Simple</option>
                                        <option value="5"> Receta Retenida C/Codeína</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <input class="form-control form-control-sm" type="text" placeholder="Nº de recetas">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">
                Guardar</button>
            </div>
        </div>
    </div>
</div>