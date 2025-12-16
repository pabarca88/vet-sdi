<div id="embarazoriesgo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="embarazos_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Factores de Riesgo Embarazo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_8" onclick="abrir_riesgo();" class="text-primary" style="cursor: pointer;">Añadir Nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_8" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-3">
                                    <label class="floating-label-activo-sm">Edad</label>
                                    <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label class="floating-label-activo-sm">Escolaridad</label>
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
                                <div class="form-group col-sm-3" id="form_0">
                                    <label class="floating-label-activo-sm">Grupo Sangu&iacute;neo</label>
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
                                <div class="form-group col-sm-3" id="form_0">
                                    <label class="floating-label-activo-sm">Antecedentes Personales</label>
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
                            </div>

                            <div class="form-row">
                                <div class="form-group col-sm-3">
                                    <label class="floating-label-activo-sm">Otros Antecedentes</label>
                                    <input type="text" class="form-control form-control-sm" name="otros_ant_mat" id="otros_ant_mat">
                                </div>
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Antecedentes Paternos</label>
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
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Ant.Familiares Maternos</label>
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
                                <div class="form-group col-md-3" id="form_0">
                                    <label class="floating-label-activo-sm">Ant.Familiares Paternos</label>
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
                            </div>
                            <div class="form-row">
                                 <div class="col-md-6">
                                    <label class="floating-label-activo-sm">Descripci&oacute;n Otros Antecedentes</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1" name="ant_otros" id="ant_otros"></textarea>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="floating-label-activo-sm">Habitos (Alcohol Tabaco Drogas)</label>
                                    <input type="text" class="form-control form-control-sm" name="habitos_mat" id="habitos_mat">
                                 </div>
                            </div>
                            <br>
                            <div class="card-header">
                                <h6>Embarazos y Partos Anteriores</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-2" id="form_0">
                                        <label class="floating-label-activo-sm">Fecha &Uacute;ltimo Parto</label>
                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-md-2" id="form_0">
                                        <label class="floating-label-activo-sm">N&uacute;mero Gestaciones</label>
                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-md-2" id="form_0">
                                        <label class="floating-label-activo-sm">N&uacute;mero Abortos</label>
                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-md-2" id="form_0">
                                        <label class="floating-label-activo-sm">N&uacute;mero Ect&oacute;picos</label>
                                        <input type="text" class="form-control form-control-sm" name="r" id="">
                                    </div>
                                    <div class="form-group col-md-2" id="form_0">
                                        <label class="floating-label-activo-sm">N&uacute;mero Partos</label>
                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-md-2" id="form_0">
                                        <label class="floating-label-activo-sm">N.Partos Espont.</label>
                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-3" id="form_0">
                                        <label class="floating-label-activo-sm">N&uacute;mero Forceps</label>
                                        <input type="text" class="form-control form-control-sm" name="n_forcep" id="n_forcep">
                                    </div>
                                    <div class="form-group col-md-3" id="form_0">
                                        <label class="floating-label-activo-sm">N&uacute;mero Ces&aacute;reas</label>
                                        <input type="text" class="form-control form-control-sm" name="n_cesareas" id="n_cesareas">
                                    </div>
                                    <div class="form-group col-md-6" id="form_0">
                                        <label class="floating-label-activo-sm">Observaci&oacute;nes Partos Anteriores</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_partos_ant" id="obs_partos_ant"></textarea>
                                    </div>
                                </div>
                           
                               
                                
                                    
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-2" id="form_0">
                                            <label class="floating-label-activo-sm">Nac&iacute;dos Vivos</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-md-2" id="form_0">
                                            <label class="floating-label-activo-sm">Viven Actualmente</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-md-2" id="form_0">
                                            <label class="floating-label-activo-sm">Mueren 1 semana</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-md-2" id="form_0">
                                            <label class="floating-label-activo-sm">N&uacute;mero Mortinatos</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-md-2" id="form_0">
                                            <label class="floating-label-activo-sm">Peso < 2500 gr.</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-md-2" id="form_0">
                                            <label class="floating-label-activo-sm">Peso > 4000 gr.</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                    </div>
                                   
                                    <div class="form-row">
                                        <div class="form-group col-md-12" id="form_0">
                                        <label class="floating-label-activo-sm">Observaci&oacute;nes Embarazos y partos</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ant" id="obs_ant"></textarea>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Factores de Riesgo Obst&eacute;trico</label>
                                        <select class="form-control form-control-sm" id="" name="">
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
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Descripci&oacute;n Otros Factores de Riesgo</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="" id=""></textarea>
                                    </div>
                                    <div class="form-group fill col-sm-4">
                                        <button type="button" class="btn btn-success btn-sm btn-block">Añadir</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <h5>Antecedentes Progenitores</h5>
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
            <hr>
            <div class="row">
                <div class="col-md-12">
                <h5>Factores Riesgos Actúal</h5>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                <h5>Partos Anteriores</h5>
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
            <hr>
        </div>
    </div>
</div>