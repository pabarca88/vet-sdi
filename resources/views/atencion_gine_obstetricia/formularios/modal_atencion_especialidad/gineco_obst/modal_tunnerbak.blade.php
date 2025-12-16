<div id="tunner_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tunner_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Grados de Desarrollo Tunner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button type="button" class="btn btn-info-light-c btn-xs mb-2" onclick="abrir_tunner();"><i class="feather icon-plus"></i> Añadir antecendente</button>
                    </div>
                </div>
                <div class="row py-2" id="formulario_5" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">G Tanner</label>
                                    <input type="text" class="form-control form-control-sm" name="tanner" id="tanner">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Edad Cronológica</label>
                                    <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group fill col-sm-8">
                                    <label class="floating-label-activo-sm">Comentarios Acerca del Desarrollo</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" name="cometarios_tanner" id="cometarios_tanner"></textarea>
                                </div>
                                <div class="form-group fill col-sm-4">
                                    <button type="button" class="btn btn-success btn-sm btn-block">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="fracturas_dental" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">tanner</th>
                                        <th class="text-center align-middle">Figura</th>
                                        <th class="text-center align-middle">Signos</th>
                                        <th class="text-center align-middle">Edad Biológica</th>
                                        <th class="text-center align-middle">Sel Grado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">I</td>
                                        <td class="text-center align-middle"> <img src="assets/images/imagenes_gine/tanner_1.png" style="width:50%"></td>
                                        <td class="text-center align-middle">No Hay tejido Mamario Solo <br>el Pezón protruye Areola sin Pigmentar</td>
                                        <td class="text-center align-middle">Menor de 10 Años 6 Meses</td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="g1" checked="">
                                                <label for="g1" class="cr"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">II</td>
                                        <td class="text-center align-middle"> <img src="assets/images/imagenes_gine/tanner_2.png" style="width:50%"></td>
                                        <td class="text-center align-middle">Se palpa tejido Mamario bajo la<br> areola aumentada de diámetro sin sobrepasarla</td>
                                        <td class="text-center align-middle">10 Años 6 Meses</td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="g2" checked="">
                                                <label for="g2" class="cr"></label>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">III</td>
                                        <td class="text-center align-middle"> <img src="assets/images/imagenes_gine/tanner_3.png" style="width:50%"></td>
                                        <td class="text-center align-middle">Crecimiento de la mama <br>Pigmentación de la Areola </td>
                                        <td class="text-center align-middle">11 Años</td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="g3" checked="">
                                                <label for="g3" class="cr"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">IV</td>
                                        <td class="text-center align-middle"> <img src="assets/images/imagenes_gine/tanner_4.png" style="width:50%"></td>
                                        <td class="text-center align-middle">Mayor aumento de la mama <br> Areola más Pigmentada y solevantada</td>
                                        <td class="text-center align-middle">12 Años (sin Menarquia</td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="g4" checked="">
                                                <label for="g4" class="cr"></label>
                                              
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">V</td>
                                        <td class="text-center align-middle"> <img src="assets/images/imagenes_gine/tanner_5.png" style="width:50%"></td>
                                        <td class="text-center align-middle">La mama es de tipo adulto <br>el Pezón protruye Areola se retrae</td>
                                        <td class="text-center align-middle">12 años y 8 meses o mayor</td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="g5" checked="">
                                                <label for="g5" class="cr"></label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <h5> Controles Evolución</h5>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="hormonales" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha Registro</th>
                                        <th class="text-center align-middle">Tanner</th>
                                        <th class="text-center align-middle">Edad Cronológica</th>
                                        <th class="text-center align-middle">Edad Biológica</th>
                                        <th class="text-center align-middle">Comentarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">12/05/2021</td>
                                        <td class="text-center align-middle">II</td>
                                        <td class="text-center align-middle">11 años 3 meses</td>
                                        <td class="text-center align-middle">10 años 6 meses</td>
                                        <td class="text-center align-middle">Control 6 meses</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>