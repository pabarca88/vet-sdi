<div id="indicar_examenrx_orl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_examenrx_orl" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">
                EXAMEN RADIOLOGICO OTORRINOLARINGOLÓGICO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                                </input>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nº de Orden</label>
                                <input type="number" name="" id="" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
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
                                <label class="floating-label-activo-sm">OTRO (ANOTE)</label>
                                <input type="number" name="zona" id="zona" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº Orden</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">Zona</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                            <td class="text-center align-middle">7217821</td>
                                            <td class="text-center align-middle">SCANNER MAXILAR INFERIOR</td>
                                                <td class="text-center align-middle">Suelo Pelvico</td>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>

