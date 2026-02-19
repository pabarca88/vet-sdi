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
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo del Examen Lab Otorrinolaringología</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="AL">Seleccione</option>
                                    <optgroup label="OÌDOS">
                                        <option value="AL">Audiometría Niños</option>
                                        <option value="LA">Audiometría Adultos</option>
                                        <option value="LA">Impedanciometría</option>
                                        <option value="LA">Examen Funcional 8º Par Completo</option>
                                        <option value="LA">Emisioones Oto-Acústicas</option>
                                        <option value="LA">BERA</option>
                                    </optgroup>
                                    <optgroup label="NARIZ">
                                        <option value="AL">Rinomanometría</option>
                                        <option value="AL">Cultivo y Antibiograma Secreción nasal y Rcto. Eosinófilos</option>
                                    </optgroup>
                                    <optgroup label="FARINGO-LARÍNGE">
                                        <option value="AL">Nasofibrolaringoscopía</option>
                                        <option value="AL">Cultivo y Antibiograma Frotis Faríngeo</option>
                                         <option value="AL">Cultivo y Antibiograma Frotis Faríngeo Investigar Hongos</option>
                                    </optgroup>
                                    <optgroup label="TRATAMIENTOS">
                                        <option value="AL">Ejercicios de Rehabilitación Vestivular</option>
                                        <option value="AL">Otros</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                             <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo del Examen Lab Radiología</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="AL">Seleccione</option>
                                    <optgroup label="OÌDOS">
                                        <option value="AL">TAC OIDO DERECHO CON CONTRASTE</option>
                                        <option value="AL">TAC OIDO DERECHO SIN CONTRASTE</option>
                                        <option value="AL">TAC OIDO IZQUIERDO CON CONTRASTE</option>
                                        <option value="AL">TAC OIDO IZQUIERDO SIN CONTRASTE</option>
                                        <option value="AL">RNM OIDO DERECHO </option>
                                        <option value="AL">RNM OIDO IZQUIERDO </option>
                                    </optgroup>
                                    <optgroup label="NARIZ">
                                         <option value="AL">TAC NARIZ Y CAVIDADES PARANASALES CON CONTRASTE</option>
                                        <option value="AL">TAC NARIZ Y CAVIDADES PARANASALES SIN CONTRASTE</option>
                                    </optgroup>
                                    <optgroup label="CUELLO Y GLANDULAS ANEXAS">
                                        <option value="AL">ECOTOMOGRAFÍA DE CUELLO</option>
                                        <option value="AL">CINTIGRAMA TIROÍDEO</option>
                                         <option value="AL">OTROS</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Prioridad</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <option>..</option>
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
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>Hemograma y vhs</span></td>
                                            <td class="text-center align-middle">Sangre</td>
                                            <td class="text-center align-middle">Urgente</td>
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
                <button type="submit" class="btn btn-info">
                Guardar</button>
            </div>
        </div>
    </div>
</div>