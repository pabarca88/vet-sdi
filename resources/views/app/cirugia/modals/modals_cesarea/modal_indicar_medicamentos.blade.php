<div id="indicar_medicamentos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_medicamentos" aria-hidden="true">

    <!-- For defining autocomplete -->



    <div class="modal-dialog modal-dialog-centered modal-lg" data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Indicar Medicamento</h5>
                <input type="hidden" id="id_profesional" value="{{ @Auth::user()->id }}">
                <button type="button" class="close" aria-label="Close" onclick="cerrarModalMedicamentosFicha();">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="floating-label">Medicamento</label>
                            <input type="text" id="nombre_medicamento_ficha_dental" name="nombre_medicamento_ficha_dental" onblur="getDosis();" class="form-control form-control-sm">
                            <input type="hidden" id="id_medicamento_ficha_dental" name="id_medicamento_ficha_dental" class="form-control ">
                            <input type="hidden" id="id_medicamento_cant_comp" name="id_medicamento_cant_comp" class="form-control ">
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Composición:</label>
                            <div id="nombre_composicion_farmaco" name="nombre_composicion_farmaco" class="p-t-5"></div>
                        </div>
                    </div>
                    {{--  CUANDO SE ENCUENTRA MEDICAMENTO EN BUSQUEDA  --}}
                    <div class="col-sm-6 mt-2 medicamento_activo">
                        <div class="form-group fill">
                            <label class="floating-label">Presentación</label>
                            <select class="form-control form-control-sm" id="dosis_medicamento_ficha_dental" name="dosis_medicamento_ficha_dental" onchange="getFrecuencia();getCantComp();">
                                <option>Seleccione una opción</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2 medicamento_activo">
                        <div class="form-group fill">
                            <label class="floating-label">Posología</label>
                            <select class="form-control form-control-sm" id="frecuencia_medicamento_ficha_dental"
                                name="frecuencia_medicamento_ficha_dental">
                                <option>Seleccione una opción</option>

                            </select>
                        </div>
                    </div>

                    {{--  SI NO SE ENCUENTRA EL MEDICAMENTO EN LA BUSQUEDA  --}}
                    <div class="col-sm-6 mt-2 medicamento_inactivo" style="display:none;">
                        <div class="form-group fill">
                            <label class="floating-label">Presentación</label>
                            <input type="text" name="dosis_medicamento_ficha_dental_2" id="dosis_medicamento_ficha_dental_2" class="form-control form-control-sm ">
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2 medicamento_inactivo" style="display:none;">
                        <div class="form-group fill">
                            <label class="floating-label">Posología</label>
                            <input type="text" name="frecuencia_medicamento_ficha_dental_2" id="frecuencia_medicamento_ficha_dental_2" class="form-control form-control-sm ">
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Vía de Administración</label>
                            <select class="form-control form-control-sm" id="via_administracion_ficha_dental" name="via_administracion_ficha_dental" onchange="validar_via_administracion();">
                                <option value="0">Seleccione</option>
                                <option value="1">V&iacute;a Oral</option>
                                <option value="2">V&iacute;a Sublingual</option>
                                <option value="3">V&iacute;a T&oacute;pica</option>
                                <option value="4">V&iacute;a Oftalmol&oacute;gica</option>
                                <option value="5">V&iacute;a &Oacute;tica</option>
                                <option value="6">V&iacute;a Inhalatoria</option>
                                <option value="7">V&iacute;a Nasal</option>
                                <option value="8">V&iacute;a Rectal</option>
                                <option value="9">V&iacute;a Vaginal</option>
                                <option value="10">V&iacute;a parental</option>
                                <option value="11">Otra Vía</option>
                            </select>
                        </div>
                        <div class="form-group fill" id="div_observaciones_medicamento_ficha_dental" style="display: none;">
                            <label class="floating-label">Otra vía de Administración</label>
                            <input type="text" id="observaciones_medicamento_ficha_dental" name="observaciones_medicamento_ficha_dental" class="form-control form-control-sm " disabled >
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Periodo</label>
                            <select class="form-control form-control-sm" id="periodo_ficha_dental" name="periodo_ficha_dental" onchange="validar_periodo();">
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
                                <option value="10">V&iacute;a parental</option>
                                <option value="11">Otro Periodo</option>
                            </select>
                        </div>

                        <div class="form-group fill" id="div_observaciones_periodo_ficha_dental" style="display: none;">
                            <label class="floating-label">Otro Periodo</label>
                            <input type="text" id="observaciones_periodo_ficha_dental" name="observaciones_periodo_ficha_dental" class="form-control form-control-sm " disabled >
                        </div>

                    </div>

                    {{-- cantidad de medicamento a despachar o comprar    --}}
                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Cantidad Comprar/Despachar</label>
                            <select class="form-control form-control-sm" id="cantidad_comprar" name="cantidad_comprar" onchange="validar_cantidad_comprar();">
                                <option value="0">Seleccione</option>
                                <option value="999">Otra Cantidad</option>
                            </select>
                        </div>
                        <div class="form-group fill" id="div_otra_cantidad_a_comprar" style="display: none;">
                            <label class="floating-label">Otra Cantidad</label>
                            <input type="text" id="otra_cantidad_a_comprar" name="otra_cantidad_a_comprar" class="form-control form-control-sm " disabled >
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-1">
                                    <label><strong>Uso Crónico</strong></label>
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="medicamento_uso_cronico">
                                        <label for="medicamento_uso_cronico" class="cr"></label>
                                    </div>
                                    <div class="alert-primary" id="mensaje_uso_cronico" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" onclick="indicar_medicamento_cirugia()"
                                    class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> AgregarMedicamento</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 mt-3">
                    <!--**** Al agregar un medicamento, se debe cargar la tabla *****-->
                    <!--Tabla-->
                    <div class="table-responsive">
                        <table id="tabla_medicamento_cirugia" class="table table-bordered table-xs">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle hidden" hidden="hidden">id_producto</th>
                                    <th class="text-center align-middle hidden" hidden="hidden">uso_cronico</th>
                                    <th class="text-center align-middle">Medicamento</th>
                                    <th class="text-center align-middle">Presentación</th>
                                    <th class="text-center align-middle">Posología</th>
                                    <th class="text-center align-middle">Vía Adm.</th>
                                    <th class="text-center align-middle">Periodo</th>
                                    <th class="text-center align-middle">Comprar</th>
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
                    {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  --}}
                    {{--  <button type="button" onclick="alerta_registro_medicamento();" data-dismiss="modal" class="btn btn-info">Generar Receta</button>  --}}
                    <button type="button" onclick="registrar_medicamentos_ficha();" data-dismiss="modal" class="btn btn-info">Generar Receta</button>
                </div>

                <div class="col-sm-12 mt-3 mb-2">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="no_existe_switch">
                        <label class="custom-control-label text-primary" for="no_existe_switch"><strong><u>Sugerencia de medicamento.</u></strong></label>
                    </div>
                </div>
                <div class="row" id="no_existe" style="display:none">
                    <div class="col-sm-12 col-md-12">
                        <p>Ayudanos a mejorar nuestro módulo de recetas ingresando el nombre del medicamento o dispositivo faltante</p>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <input class="form-control form-control-sm" id="med_faltante" type="text" placeholder="Nombre del medicamento o dispositivo">

                    </div>
                    <div class="col-sm-4 col-md-4">
                        <button type="button" class="btn btn-info" onclick="enviar_medicamento_faltante();">Enviar Solicitud</button>
                    </div>
                </div>
                <div class="col-sm-12 mt-3 mb-2">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="ranking_recetas_switch">
                        <label class="custom-control-label text-primary" for="ranking_recetas_switch"><strong><u>Ranking  de recetas controladas del paciente</u></strong></label>
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
