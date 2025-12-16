<div id="indicar_examen_orl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_examen_orl" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen / Tratamientos Especialidad Orl</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo del Examen Lab Otorrinolaringología</label>
                                <select class="form-control form-control-sm" name="tipo_ex_lab_orl" id="tipo_ex_lab_orl" onchange="mostrar_otros('tipo_ex_lab_orl','div_otros_examen_orl','otro');">
                                    <option value="">Seleccione</option>
                                    <optgroup label="OÌDOS">
                                        <option value="1" >Audiometría Niños</option>
                                        <option value="2" >Audiometría Adultos</option>
                                        <option value="3" >Impedanciometría</option>
                                        <option value="4" >Examen Funcional 8º Par Completo</option>
                                        <option value="5" >Emisiones Oto-Acústicas</option>
                                        <option value="6" >BERA</option>
                                    </optgroup>
                                    <optgroup label="NARIZ">
                                        <option value="7">Rinomanometría</option>
                                        <option value="8">Cultivo y Antibiograma Secreción nasal y Rcto. Eosinófilos</option>
                                    </optgroup>
                                    <optgroup label="FARINGO-LARÍNGE">
                                        <option value="9">Nasofibrolaringoscopía</option>
                                        <option value="10">Cultivo y Antibiograma Frotis Faríngeo</option>
                                        <option value="11">Cultivo y Antibiograma Frotis Faríngeo Investigar Hongos</option>
                                    </optgroup>
                                    <optgroup label="TRATAMIENTOS">
                                        <option value="12">Ejercicios de Rehabilitación Vestibular</option>
                                        <option value="otro">Otros</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-2" id="div_otros_examen_orl" style="display:none;">
                            <label id="" name="" class="floating-label-activo-sm">Otros Examen</label>
                            <input class="form-control form-control-sm" type="text" name="otro_examen_examen_orl" id="otro_examen_examen_orl" value="">
                        </div>
                    </div>
                    <hr>

                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo del Examen Lab Radiología</label>
                                <select class="form-control form-control-sm" name="tipo_ex_rx_orl" id="tipo_ex_rx_orl" onchange="mostrar_otros('tipo_ex_rx_orl','div_otros_examen_rx_orl','otro');">
                                    <option value="">Seleccione</option>
                                    <optgroup label="OÌDOS">
                                        <option value="13" data-contraste="1">TAC OIDO DERECHO CON CONTRASTE</option>
                                        <option value="14" data-contraste="0">TAC OIDO DERECHO SIN CONTRASTE</option>
                                        <option value="15" data-contraste="1">TAC OIDO IZQUIERDO CON CONTRASTE</option>
                                        <option value="16" data-contraste="0">TAC OIDO IZQUIERDO SIN CONTRASTE</option>
                                        <option value="5" data-contraste="1">RNM OIDO DERECHO CON CONTRASTE</option>
                                        <option value="6" data-contraste="0">RNM OIDO DERECHO SIN CONTRASTE</option>
                                        <option value="7" data-contraste="1">RNM OIDO IZQUIERDO CON CONTRASTE</option>
                                        <option value="8" data-contraste="0">RNM OIDO IZQUIERDO SIN CONTRASTE</option>
                                    </optgroup>
                                    <optgroup label="NARIZ">
                                        <option value="9" data-contraste="1">TAC NARIZ Y CAVIDADES PARANASALES CON CONTRASTE</option>
                                        <option value="10" data-contraste="0">TAC NARIZ Y CAVIDADES PARANASALES SIN CONTRASTE</option>
                                    </optgroup>
                                    <optgroup label="CUELLO Y GLANDULAS ANEXAS">
                                        <option value="11" data-contraste="0">ECOTOMOGRAFÍA PARTES BLANDAS DE CUELLO</option>
                                        <option value="12" data-contraste="0">CINTIGRAMA TIROÍDEO</option>
                                        <option value="otro">OTROS</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-2" id="div_otros_examen_rx_orl" style="display:none;">
                            <label id="" name="" class="floating-label-activo-sm">Otros Examen</label>
                            <input class="form-control form-control-sm" type="text" name="otro_examen_examen_rx_orl" id="otro_examen_examen_rx_orl" value="">
                        </div>
                    </div>
                    <hr>

                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Prioridad</label>
                                <select class="form-control form-control-sm" name="examen_esp_orl_prioridad" id="examen_esp_orl_prioridad">
                                    <option value="1">Baja</option>
                                    <option value="2" selected>Media</option>
                                    <option value="3">Alta</option>
                                    <option value="4">Urgente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="examen_esp_orl_examen" id="examen_esp_orl_examen"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right" onclick="indicar_examen_orl();"><i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs tabla_examenes_ficha" id="tabla_examen_esp_orl">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Nombre Examen</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">Prioridad</th>
                                            <th class="text-center align-middle">Con Contraste</th>
                                            <th class="text-center align-middle">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
                <button type="submit" class="btn btn-info" onclick="registro_examen_ficha_orl();">Guardar</button>
            </div>
        </div>
    </div>
</div>
