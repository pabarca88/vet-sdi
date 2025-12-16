<div id="indicar_medicamentos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_medicamentos"
    aria-hidden="true">

    <!-- For defining autocomplete -->



    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Indicar Medicamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form id="form_indicar_medicamento">
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group">
                                <label class="floating-label">Medicamento</label>
                                <input type="text" id="nombre_medicamento_ficha_dental"
                                    name="nombre_medicamento_ficha_dental" onblur="getDosis()"
                                    class="form-control form-control-sm">
                                <input type="hidden" id="id_medicamento_ficha_dental" name="id_medicamento_ficha_dental"
                                    class="form-control ">


                            </div>
                        </div>
                        <!-- <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Medicamento</label>
                                <select class="form-control form-control-sm" id="" name="">
                                    <option>Seleccione una opción</option>
                                    <option>..</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Dosis</label>
                                <select class="form-control form-control-sm" id="dosis_medicamento_ficha_dental"
                                    name="dosis_medicamento_ficha_dental" onchange="getFrecuencia();">
                                    <option>Seleccione una opción</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Frecuencia</label>
                                <select class="form-control form-control-sm" id="frecuencia_medicamento_ficha_dental"
                                    name="frecuencia_medicamento_ficha_dental">
                                    <option>Seleccione una opción</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Vía de Administración</label>
                                <select class="form-control form-control-sm" id="via_administracion_ficha_dental"
                                    name="via_administracion_ficha_dental">

                                    <option value="0">Seleccione</option>
                                    <option value="1">V&iacute;a Oral</option>
                                    <option value="2">V&iacute;a Sublingual</option>
                                    <option value="3">V&iacute;a T&oacute;pica</option>
                                    <option value="4">V&iacute;a Oftalmol&oacute;gica</option>
                                    <option value="5">V&iacute;a Inhalatoria</option>
                                    <option value="6">V&iacute;a Rectal</option>
                                    <option value="7">V&iacute;a Vaginal</option>
                                    <option value="8">V&iacute;a parental</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Periodo</label>
                                <select class="form-control form-control-sm" id="periodo_ficha_dental"
                                    name="periodo_ficha_dental">
                                    <option value="0">Seleccione</option>
                                    <option value="1">SOS</option>
                                    <option value="2">Dosis unica</option>
                                    <option value="3">3 d&iacute;as</option>
                                    <option value="4">5 d&iacute;as</option>
                                    <option value="5">7 d&iacute;as</option>
                                    <option value="6">10 d&iacute;as</option>
                                    <option value="7">15 d&iacute;as</option>
                                    <option value="8">30 d&iacute;as</option>
                                    <option value="9">Permanente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" onclick="indicar_medicamento_ficha()"
                                class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar
                                Medicamento</button>
                        </div>
                    </div>
                </form>

                <form>
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un medicamento, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table id="tabla_medicamento_ficha" class="table table-bordered table-xs">
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

                                </tbody>
                            </table>
                        </div>
                        <!--Cierre: Tabla-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="alerta_registro_medicamento();" data-dismiss="modal"
                            class="btn btn-info">
                            Cerrar</button>
                    </div>

                </form>

                <div class="col-sm-12 mt-3 mb-2">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="no_existe_switch">
                        <label class="custom-control-label text-primary" for="no_existe_switch"><strong><u>El
                                    medicamento no está en la lista</u></strong></label>
                    </div>
                </div>
                <div class="row" id="no_existe" style="display:none">
                    <div class="col-sm-12 col-md-12">
                        <p>Ayudanos a mejorar nuestro módulo de recetas ingresando el nombre del medicamento o
                            dispositivo faltante</p>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <input class="form-control form-control-sm" type="text"
                            placeholder="Nombre del medicamento o dispositivo">
                    </div>
                </div>
                <div class="col-sm-12 mt-3 mb-2">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="ranking_recetas_switch">
                        <label class="custom-control-label text-primary" for="ranking_recetas_switch"><strong><u>Ranking
                                    de recetas controladas del
                                    paciente</u></strong></label>
                    </div>
                </div>
                <div class="row" id="ranking_recetas" style="display:none">
                    <div class="col-sm-12 col-md-12">
                        <h6 class="text-c-blue mb-3">Recetas propias</h6>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group fill">
                            <label class="floating-label">Tipo de control</label>
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
                            <label class="floating-label">Tipo de control</label>
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

        </div>
    </div>
</div>
