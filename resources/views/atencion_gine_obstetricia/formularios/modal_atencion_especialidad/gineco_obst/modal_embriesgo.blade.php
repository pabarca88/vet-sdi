<div id="embarazoriesgo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="embarazoriesgo_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Factores de riesgo embarazo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/maintance/maintance.png') }}" alt="" class="img-fluid">

                <div style="display: none;">
                    {{-- revisar formulario para realizar --}}
                    <div class="row pt-2 mb-3">
                        <div class="col-md-12">
                            <h6 id="ant_8" onclick="abrir_div('formulario_8');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                        </div>
                    </div>
                    <div class="row py-2" id="formulario_8" style="display:none;">
                        <div class="col-md-12">
                            <form>
                            <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="edad">Edad</label>
                                        <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="escolaridad">escolaridad</label>
                                        <select class="form-control form-control-sm" id="escolaridad" name="escolaridad">
                                            <option>Seleccione</option>
                                            <option>Sin Estudios</option>
                                            <option>B&aacute;sica</option>
                                            <option>Media</option>
                                            <option>T&eacute;cnica</option>
                                            <option>Universitaria</option>
                                            <option>Post-T&iacute;tulo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3" id="form_0">
                                        <label class="floating-label-activo-sm" for="grupo">Grupo sangu&iacute;neo</label>
                                        <select class="form-control form-control-sm" id="grupo" name="grupo">
                                            <option>Seleccione</option>
                                            <option>Grupo A rH +</option>
                                            <option>Grupo B rH +</option>
                                            <option>Grupo AB rH +</option>
                                            <option>Grupo 0 rH +</option>
                                            <option>Grupo A rH -</option>
                                            <option>Grupo B rH -</option>
                                            <option>Grupo AB rH -</option>
                                            <option>Grupo 0 rH -</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3" id="form_0">
                                        <label class="floating-label-activo-sm" for="ant_pers">Antecedentes personales</label>
                                        <select class="form-control form-control-sm" id="ant_pers" name="ant_pers">
                                            <option>Seleccione</option>
                                            <option>Anemia</option>
                                            <option>Diabetes</option>
                                            <option>Hipertens&iacute;on Arterial</option>
                                            <option>Hipotiroid&iacute;smo</option>
                                            <option>Epilepsia</option>
                                            <option>TBC</option>
                                            <option>Ca Mamas</option>
                                            <option>Ca Cervico Uterino</option>
                                            <option>Otros</option>
                                            <option>Sin Antecedentes</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="otros_ant_mat">Otros antecedentes</label>
                                        <input type="text" class="form-control form-control-sm" name="otros_ant_mat" id="otros_ant_mat">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="ant_padre">Antecedentes Paternos</label>
                                        <select class="form-control form-control-sm" id="ant_padre" name="ant_padre">
                                            <option>Seleccione</option>
                                            <option>Anemia</option>
                                            <option>Diabetes</option>
                                            <option>Hipertens&iacute;on Arterial</option>
                                            <option>Hipotiroid&iacute;smo</option>
                                            <option>Epilepsia</option>
                                            <option>TBC</option>
                                            <option>Cancer</option>
                                            <option>Otros</option>
                                            <option>Sin Antecedentes</option>
                                            <option>Desconocido</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="ant_familiares_madre">Ant.familiares maternos</label>
                                        <select class="form-control form-control-sm" id="ant_familiares_madre" name="ant_familiares_madre">
                                            <option>Seleccione</option>
                                            <option>Anemia</option>
                                            <option>Diabetes</option>
                                            <option>Hipertens&iacute;on Arterial</option>
                                            <option>Hipotiroid&iacute;smo</option>
                                            <option>Epilepsia</option>
                                            <option>TBC</option>
                                            <option>Ca Mamas</option>
                                            <option>Ca Cervico Uterino</option>
                                            <option>Otros</option>
                                            <option>Sin Antecedentes</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="ant_familiares_padre">Ant.familiares paternos</label>
                                        <select class="form-control form-control-sm" id="ant_familiares_padre" name="ant_familiares_padre">
                                            <option>Seleccione</option>
                                            <option>Anemia</option>
                                            <option>Diabetes</option>
                                            <option>Hipertens&iacute;on Arterial</option>
                                            <option>Hipotiroid&iacute;smo</option>
                                            <option>Epilepsia</option>
                                            <option>TBC</option>
                                            <option>Cancer</option>
                                            <option>Ca Cervico Uterino</option>
                                            <option>Otros</option>
                                            <option>Sin Antecedentes</option>
                                        </select>
                                    </div>
                                    <div class=" form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm" for="ant_otros">Descripci&oacute;n otros antecedentes</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="ant_otros" id="ant_otros"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm" for="habitos_mat">Habitos (Alcohol, Tabaco, Drogas)</label>
                                        <input type="text" class="form-control form-control-sm" name="habitos_mat" id="habitos_mat">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="mb-3">Embarazos y partos anteriores</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="f_ult_parto">Fecha &Uacute;ltimo parto</label>
                                        <input type="text" class="form-control form-control-sm" name="f_ult_parto" id="f_ult_parto">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="num_gest">N&uacute;mero gestaciones</label>
                                        <input type="text" class="form-control form-control-sm" name="num_gest" id="num_gest">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="num_abortos">N&uacute;mero Abortos</label>
                                        <input type="text" class="form-control form-control-sm" name="num_abortos" id="num_abortos">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="num_ect">N&uacute;mero ect&oacute;picos</label>
                                        <input type="text" class="form-control form-control-sm" name="num_ect" id="num_ect">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="num_part">N&uacute;mero Partos</label>
                                        <input type="text" class="form-control form-control-sm" name="num_part" id="num_part">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="num_part_espon">N.Partos espont.</label>
                                        <input type="text" class="form-control form-control-sm" name="num_part_espon" id="num_part_espon">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="n_forcep">N&uacute;mero Forceps</label>
                                        <input type="text" class="form-control form-control-sm" name="n_forcep" id="n_forcep">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="n_cesareas">N&uacute;mero ces&aacute;reas</label>
                                        <input type="text" class="form-control form-control-sm" name="n_cesareas" id="n_cesareas">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="obs_partos_ant">Observaci&oacute;nes partos anteriores</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="obs_partos_ant" id="obs_partos_ant"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="nac_vivos">Nac&iacute;dos vivos</label>
                                        <input type="text" class="form-control form-control-sm" name="nac_vivos" id="nac_vivos">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="viven">Viven actualmente</label>
                                        <input type="text" class="form-control form-control-sm" name="viven" id="viven">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="muert_semana">Mueren 1 semana</label>
                                        <input type="text" class="form-control form-control-sm" name="muert_semana" id="muert_semana">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="n_mortinato">N&uacute;mero mortinatos</label>
                                        <input type="text" class="form-control form-control-sm" name="n_mortinato" id="n_mortinato">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="peso_menor_dosquin">Peso < 2500 gr.</label>
                                        <input type="text" class="form-control form-control-sm" name="peso_menor_dosquin" id="peso_menor_dosquin">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="peso_may_cuatro">Peso > 4000 gr.</label>
                                        <input type="text" class="form-control form-control-sm" name="peso_may_cuatro" id="peso_may_cuatro">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="obs_ant">Observaci&oacute;nes embarazos y partos</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="obs_ant" id="obs_ant"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm" for="fact_riesgo_obst">Factores de riesgo obst&eacute;trico</label>
                                        <select class="form-control form-control-sm" id="fact_riesgo_obst" name="fact_riesgo_obst">
                                            <option>Seleccione</option>
                                            <option>Anemias</option>
                                            <option>Ces&aacute;rea anterior</option>
                                            <option>Colest&aacute;sia</option>
                                            <option>Placenta Previa</option>
                                            <option>Pre-eclampsia</option>
                                            <option>Tox&eacute;mia</option>
                                            <option>Otros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm" for="ot_fact_riesgo">Descripci&oacute;n Otros factores de riesgo</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="ot_fact_riesgo" id="ot_fact_riesgo"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <button type="button" class="btn btn-info btn-sm btn-block">Añadir</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-pills mb-3" id="ciclo_menstrual" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="ant_prog_tab" data-toggle="pill" href="#ant_prog" role="tab" aria-controls="ant_prog" aria-selected="false">Antecedentes progenitores</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="fact_riesg_tab" data-toggle="pill" href="#fact_riesg" role="tab" aria-controls="fact_riesg" aria-selected="false">Factores de riesgos actúal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="p_anteriores_tab" data-toggle="pill" href="#p_anteriores" role="tab" aria-controls="p_anteriores" aria-selected="false">Partos anteriores</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content" id="c_menstrual">
                                <!--TAB 1-->
                                <div class="tab-pane fade show active" id="ant_prog" role="tabpanel" aria-labelledby="ant_prog_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5> Antecedentes progenitores</h5>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="riesgo_Embarazos_ant" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Fecha</th>
                                                            <th class="text-center align-middle">Edad</th>
                                                            <th class="text-center align-middle">Escolaridad</th>
                                                            <th class="text-center align-middle">Antecedentes Mat</th>
                                                            <th class="text-center align-middle">Antecedentes Pat</th>
                                                            <th class="text-center align-middle">Hábitos</th>
                                                            <th class="text-center align-middle">Otros</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center align-middle">00/00/0000</td>
                                                            <td class="text-center align-middle">16</td>
                                                            <td class="text-center align-middle">Universitaria</td>
                                                            <td class="text-center align-middle">no</td>
                                                            <td class="text-center align-middle">Diabetes</td>
                                                            <td class="text-center align-middle">Alcohol <br>Tabaco</td>
                                                            <td class="text-center align-middle">no
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--TAB 2  -->
                                <div class="tab-pane fade" id="fact_riesg" role="tabpanel" aria-labelledby="fact_riesg_tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h5>Factores de riesgos actúal</h5>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="table-responsive">
                                                <table id="riesgo_Embarazos_ant" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Fecha</th>
                                                            <th class="text-center align-middle">N° Partos</th>
                                                            <th class="text-center align-middle">Nacidos Vivos</th>
                                                            <th class="text-center align-middle">Mortinatos</th>
                                                            <th class="text-center align-middle">Abortos Espontáneos</th>
                                                            <th class="text-center align-middle">Cesáreas</th>
                                                            <th class="text-center align-middle">Peso anormal</th>
                                                            <th class="text-center align-middle">Otros</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center align-middle">00/00/0000</td>
                                                            <td class="text-center align-middle">3</td>
                                                            <td class="text-center align-middle">0</td>
                                                            <td class="text-center align-middle">no</td>
                                                            <td class="text-center align-middle">no</td>
                                                            <td class="text-center align-middle">no</td>
                                                            <td class="text-center align-middle">No</td>
                                                            <td class="text-center align-middle">No</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--TAB 3  -->
                                <div class="tab-pane fade" id="p_anteriores" role="tabpanel" aria-labelledby="p_anteriores_tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h5>Partos anteriores</h5>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="table-responsive">
                                                <table id="riesgo_Embarazos_ant" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Fecha</th>
                                                            <th class="text-center align-middle">N° de Embarazo</th>
                                                            <th class="text-center align-middle">Control</th>
                                                            <th class="text-center align-middle">Tipo de Parto</th>
                                                            <th class="text-center align-middle">Puerperio</th>
                                                            <th class="text-center align-middle">R-N</th>
                                                            <th class="text-center align-middle">Tratamientos complicaciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center align-middle">00/00/0000</td>
                                                            <td class="text-center align-middle">1</td>
                                                            <td class="text-center align-middle">Controlado</td>
                                                            <td class="text-center align-middle">Vaginal</td>
                                                            <td class="text-center align-middle">Normal</td>
                                                            <td class="text-center align-middle">Sano <br>3000 gr</td>
                                                            <td class="text-center align-middle">ninguno</td>
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
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function Aro_gen() {
        $('#embarazoriesgo_modal').modal('show');
    }

</script>
