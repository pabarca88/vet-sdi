<div id="tunner_modal_m" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tunner_modal_m" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Grados de desarrollo Tunner Masculino</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Grados de desarrollo Tunner-->
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h5>Grados de desarrollo Tunner <i id="grado_tunner_ped_m" class="fas fa-plus-circle text-primary tooltip-test" title="Añadir antecedente" style="cursor:pointer;"></i></h5>
                    </div>
                    <div class="col-md-12" id="form_11_ped" style="display:none;">
                        <form>
                            <div class="form-row">
                                <div class="form-group fill col-sm-4">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group fill col-sm-4">
                                    <label class="floating-label">Grado Tanner</label>
                                    <input type="text" class="form-control form-control-sm" name="tanner" id="tanner">
                                </div>
                                <div class="form-group fill col-sm-4">
                                    <label class="floating-label">Edad cronológica</label>
                                    <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                </div>
                                <div class="form-group fill col-sm-8">
                                    <label class="floating-label">Comentarios sobre el desarrollo</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="cometarios_tanner" id="cometarios_tanner"></textarea>
                                </div>
                                <div class="form-group fill col-sm-4">
                                    <button type="button" class="btn btn-success btn-sm btn-block">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="fracturas_dental" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Tanner</th>
                                        <th class="text-center align-middle">Figura</th>
                                        <th class="text-center align-middle">Signos</th>
                                        <th class="text-center align-middle">Edad Biológica</th>
                                        <th class="text-center align-middle">Sel Grado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">I</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_1_m.png') }}" style="width:100%"></td>
                                        <td class="text-center align-middle">Los Testículos tienen un Volumen menor a 4 cc<br>Escroto y pene con características Infantiles</td>
                                        <td class="text-center align-middle">Menor de 12 Años</td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="gm1" checked="">
                                                <label for="gm1" class="cr"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">II</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_2_m.png') }}" style="width:100%"></td>
                                        <td class="text-center align-middle">El Pene no se modifica,los testículos aumentan su tamaño de 4 a 8 cc.<br> La piél del escrotose enrojece y se hace mas laxa</td>
                                        <td class="text-center align-middle">12 Años</td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="gm2" checked="">
                                                <label for="gm2" class="cr"></label>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">III</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_3_m.png') }}" style="width:100%"></td>
                                        <td class="text-center align-middle">Crecimiento del pene en longitud Volumen testicular entre 6 y 12 cc <br>El escroto está aún mas laxo </td>
                                        <td class="text-center align-middle">12 Años 6 meses</td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="gm3" checked="">
                                                <label for="gm3" class="cr"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">IV</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_4_m.png') }}" style="width:100%"></td>
                                        <td class="text-center align-middle">Mayor crecimiento del peney aumento de su diametro con desarrollo del glande <br> Los testículos tienen entre 15 y 20 cc escroto mas desarrollado y pigmentado</td>
                                        <td class="text-center align-middle">13 Años 6 meses </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="gm4" checked="">
                                                <label for="gm4" class="cr"></label>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">V</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_5_m.png') }}" style="width:100%"></td>
                                        <td class="text-center align-middle">Los genitales tienen forma y tamaño adulto <br>Volumen testicular aprox 25 cc.</td>
                                        <td class="text-center align-middle">14 años y 6 meses o mayor</td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="gm5" checked="">
                                                <label for="gm5" class="cr"></label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <hr>
                        <h5>Controles de evolución</h5>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="ev_tunner_gt" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
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
