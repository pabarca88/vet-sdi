<div id="indicar_examen_oft" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_examen_oft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examenes Especialidad Oftalmología</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo del Examen Lab Oftalmología</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="0">Seleccione</option>
                                    <optgroup label="OJO Y PESTAÑAS">
                                        <option value="1">Ecografía oftálmica</option>
                                        <option value="2">Test de alergia ocular</option>
                                        <option value="3">Electroculograma</option>
                                        <option value="4">Potenciales evocados visuales</option>
                                        <option value="5">OQAS</option>
                                        <option value="6">Biometría</option>
                                        <option value="7">Detección de parásitos en las pestañas</option>
                                    </optgroup>
                                    <optgroup label="LAGRIMALES">
                                        <option value="8">Test de Schirmer</option>
                                        <option value="9">Test de Osmolaridad</option>
                                        <option value="10">Medición de la estabilidad de la lágrima</option>
                                    </optgroup>
                                    <optgroup label="CORNEA Y POLO ANTERIOR">
                                        <option value="11">Topografía Corneal</option>
                                        <option value="12">Queratometría</option>
                                        <option value="13">Paquimetría corneal</option>
                                        <option value="14">Microscopía especular endotelial</option>
                                        <option value="15">Pentacam</option>
                                        <option value="16">Gonioscopia</option>
                                        <option value="17">Aberrometría</option>
                                        <option value="18">OCT Segmento anterior</option>
                                        <option value="19">Rcto Cel. Endoteliales</option>
                                    </optgroup>
                                    <optgroup label="GLAUCOMA">
                                        <option value="20">Tonometría (tomografía láser de escaneado conofocal)</option>
                                        <option value="21">Tomografía HRT</option>
                                        <option value="22">Test genético de glaucoma</option>
                                        <option value="23">Campimetría</option>
                                    </optgroup>
                                    <optgroup label="RETINA MACULA">
                                        <option value="24">Retinografía</option>
                                        <option value="25">Retinografía autofluorescente</option>
                                        <option value="26">Electroretinograma</option>
                                        <option value="27">Angiografía Fluoresceinica y con verde de indocianina</option>
                                        <option value="28">Tomografía de Coherencia Óptica (OCT)</option>
                                        <option value="29">Test genético de degeneración macular</option>
                                    </optgroup>
                                    <optgroup label="OTROS">
                                        <option value="30">Otros</option>

                                    </optgroup>
                                    <optgroup label="ESTUDIO EN MENORES">
                                        <option value="31">Plusoptix</option>
                                        <option value="32">Screening oftalmológico pediátrico</option>
                                        <option value="33">Screening de retina en recién nacidos UNEED</option>

                                    </optgroup>
                                </select>
                            </div>
                        </div>
						<div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Otros Exámenes</label>
                                <input type="text"  name="otros_ex_oftalmo" id="otros_ex_oftalmo" class="form-control form-control-sm " disabled >
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                             <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo del Examen Lab Radiología</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="AL">Seleccione</option>
                                    <optgroup label="ORBITA">
                                        <option value="34">TAC ORBITA DERECHA CON CONTRASTE</option>
                                        <option value="35">TAC ORBITA DERECHA SIN CONTRASTE</option>
                                        <option value="36">TAC ORBITA IZQUIERDA CON CONTRASTE</option>
                                        <option value="37">TAC ORBITA IZQUIERDA SIN CONTRASTE</option>
                                        <option value="38">RNM ORBITA DERECHA </option>
                                        <option value="39">RNM ORBITA IZQUIERDA </option>
                                    </optgroup>
                                    <optgroup label="CEREBRO Y FOSA POSTERIOR">
                                        <option value="40">TAC CEREBRO CON CONTRASTE</option>
                                        <option value="41">TAC CEREBRO SIN CONTRASTE</option>
                                        <option value="42">RNM CEREBRO </option>
                                        <option value="43">TAC FOSA POSTERIOR CON CONTRASTE</option>
                                        <option value="44">TAC FOSA POSTERIOR SIN CONTRASTE</option>
                                        <option value="45">RNM FOSA POSTERIOR </option>
                                    </optgroup>
									<optgroup label="OTROS">
                                        <option value="46">TAC CEREBRO CON CONTRASTE</option>
                                    </optgroup>

                                </select>
                            </div>
                        </div>
						<div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Otros Exámenes Radiológicos</label>
                                <input type="text"  name="otros_exrx_oftalmo" id="otros_exrx_oftalmo" class="form-control form-control-sm " disabled >
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Prioridad</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <option>Baja</option>
									<option>Media</option>
									<option>Alta</option>
									<option>Urgente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Nombre Examen</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">Prioridad</th>
											<th class="text-center align-middle">Observaciones</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>Hemograma y vhs</span></td>
                                            <td class="text-center align-middle">Sangre</td>
                                            <td class="text-center align-middle">Urgente</td>
											<td class="text-center align-middle">En Ayunas</td>
                                            <td class="text-center align-middle">
                                                <button href="#!" class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--Cierre Tabla-->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>
