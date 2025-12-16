<div class="form row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="form-row">
        <div class="col-md-2">
            <ul class="nav flex-column nav-pills mb-3" id="tto_period" role="tablist">
                <li class="nav-item">
                    <a class="nav-link-aten text-reset active" id="pieza_dental_period_tab" data-toggle="tab" href="#pieza_dental_period" role="tab" aria-controls="pieza_dental_period" aria-selected="true">Pieza dental</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-aten text-reset" id="grupo_dental_period_tab" data-toggle="tab" href="#grupo_dental_period" role="tab" aria-controls="grupo_dental_period" aria-selected="true">Grupo dental</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="tab-content" id="tto_periodContent">
                <div class="tab-pane fade show active" id="pieza_dental_period" role="tabpanel" aria-labelledby="pieza_dental_period_tab">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="card-informacion">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 mt-3">
                                            <div class="card-informacion">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Pieza N°</label>
                                                                <select name="numero_pieza_tto_period{{ $counter }}" id="numero_pieza_tto_period{{ $counter }}" class="form-control form-control-sm">
                                                                    <option value="0">Seleccione</option>
                                                                        @foreach (['1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8','3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '4.1', '4.2', '4.3', '4.4', '4.5', '4.6', '4.7', '4.8'] as $pieza)
                                                                        <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Sangrado</label>
                                                                <select name="perio_sang{{ $counter }}" id="perio_sang{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perio_sang{{ $counter }}','div_perio_sang{{ $counter }}','obs_perio_sang{{ $counter }}',3);">
                                                                    <option selected="" value="Espontáneo">Espontáneo</option>
                                                                    <option value="Al cepillarse">Al cepillarse</option>
                                                                    <option value="3">Otro describir</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_perio_sang{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Otro motivo</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perio_sang{{ $counter }}" id="obs_perio_sang{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Supuración</label>
                                                                <select name="perio_sup{{ $counter }}" id="perio_sup{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perio_sup{{ $counter }}','div_perio_sup{{ $counter }}','obs_perio_sup{{ $counter }}',3);">
                                                                    <option selected="" value="Espontánea mal olor">Espontánea mal olor</option>
                                                                    <option value="Espontánea sin mal olor">Espontánea sin mal olor</option>
                                                                    <option value="3">Otro describir</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_perio_sup{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Otro motivo</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perio_sup{{ $counter }}" id="obs_perio_sup{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Higiene</label>
                                                                <select name="period_hig{{ $counter }}" id="period_hig{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_hig{{ $counter }}','div_period_hig{{ $counter }}','obs_period_hig{{ $counter }}',3);">
                                                                    <option selected="" value="Aceptable">Aceptable</option>
                                                                    <option value="Deficiente">Deficiente</option>
                                                                    <option value="3">Otro describir</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_period_hig{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Otro (describir)</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_hig{{ $counter }}" id="obs_period_hig{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Alt MG</label>
                                                                <input type="number" class="form-control form-control-sm" name="period_alt_mg{{ $counter }}" id="period_alt_mg{{ $counter }}" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">P-Sondaje</label>
                                                                <input type="number" class="form-control form-control-sm" name="period_prof_sond{{ $counter }}" id="period_prof_sond{{ $counter }}" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Movilidad-pieza</label>
                                                                <select name="period_mov_dent{{ $counter }}" id="period_mov_dent{{ $counter }}" class="form-control form-control-sm">
                                                                    <option selected="" value="0">Grado 0</option>
                                                                    <option value="Grado 1">Grado 1</option>
                                                                    <option value="Grado 2">Grado 2</option>
                                                                    <option value="Grado 3">Grado 3</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Furcas</label>
                                                                <select name="period_furca{{ $counter }}" id="period_furca{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_furca{{ $counter }}','div_period_furca{{ $counter }}','obs_period_furca{{ $counter }}',3);">
                                                                    <option selected="" value="Normales">Normales</option>
                                                                    <option value="N/corresponde">N/corresponde</option>
                                                                    <option value="3">Otro describir</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_period_furca{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Otro daño</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_furca{{ $counter }}" id="obs_period_furca{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Tipo sonda</label>
                                                                <select name="period_inst{{ $counter }}" id="period_inst{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('period_inst{{ $counter }}','div_period_inst{{ $counter }}','obs_period_inst{{ $counter }}',5);">
                                                                    <option selected="" value="Sonda MARQUIS(MP12B)">Sonda MARQUIS(MP12B)</option>
                                                                    <option value="Sonda UNC 15(MPUNC 15RB)">Sonda UNC 15(MPUNC 15RB)</option>
                                                                    <option value="Sonda OMS 11.5(MPWHOB)">Sonda OMS 11.5(MPWHOB)</option>
                                                                    <option value="Sonda NABERS 15(MPN2B)">Sonda NABERS 15(MPN2B)</option>
                                                                    <option value="5">Otro describir</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_period_inst{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Otro Tipo</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_inst{{ $counter }}" id="obs_period_inst{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period_pza{{ $counter }}" id="obs_period_pza{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card-informacion">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" onchange="biopsia_check_period({{ $counter }})" id="biopsia_check_period{{ $counter }}" name="biopsia_check_period{{ $counter }}" value="">
                                                                <label for="biopsia_check_period{{ $counter }}" class="cr"></label>
                                                            </div>
                                                            <label>Biopsia</label>
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="period_biop_zona{{ $counter }}" id="period_biop_zona{{ $counter }}" disabled=""></textarea>
                                                            </div>
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="period_obs_result_biopsia{{ $counter }}" id="period_obs_result_biopsia{{ $counter }}" disabled=""></textarea>
                                                            </div>
                                                            <hr>
                                                            <h6 style="subt-aten">Estado general del periodonto</h6>
                                                        <hr>
                                                        <div class="form-group text-center">
                                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="solicitar_ic_periodoncia()"><i class="feather icon-check"></i> Solicitar Interconsulta Peridóncia</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <button type="button" class="btn btn-sm btn-outline-info" onclick="guardar_pieza_examen_pieza({{ $counter }})"><i class="feather icon-save"></i> Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="grupo_dental_period" role="tabpanel" aria-labelledby="grupo_dental_period_tab">
                   <div class="form-row">
                    <div class="card-informacion">
                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Sextante N°</label><!--USAR SELECT 2 ?-->
                                            <select class="js-example-basic-multiple select2-dental select2-hidden-accessible" name="pzas_grupo_peri{{ $counter }}" id="pzas_grupo_peri{{ $counter }}" multiple="" data-select2-id="pzas_grupo_peri{{ $counter }}" tabindex="-1" aria-hidden="true">
                                                {{-- <option value="1">SEXTANTE 1</option>
                                                <option value="2">SEXTANTE 2</option>
                                                <option value="3">SEXTANTE 3</option>
                                                <option value="4">SEXTANTE 4</option>
                                                <option value="5">SEXTANTE 5</option>
                                                <option value="6">SEXTANTE 6</option> --}}
                                                <option value="0">Seleccione</option>
                                                @foreach (['1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8','3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '4.1', '4.2', '4.3', '4.4', '4.5', '4.6', '4.7', '4.8'] as $pieza)
                                                    <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Sangrado</label>
                                            <select name="his_sangrado" id="his_sangrado" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('his_sangrado','div_his_sangrado','obs_his_sangrado',3);">
                                                <option selected="" value="1">Espontáneo</option>
                                                <option value="2">Al cepillarse</option>
                                                <option value="3">Otro describir</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_his_sangrado" style="display:none;">
                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_his_sangrado" id="obs_his_sangrado"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Supuración</label>
                                            <select name="histsup" id="histsup" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('histsup','div_histsup','obs_histsup',3);">
                                                <option selected="" value="1">Espontánea mal olor</option>
                                                <option value="2">Espontánea sin mal olor</option>
                                                <option value="3">Otro describir</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_histsup" style="display:none;">
                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_histsup" id="obs_histsup"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Higiene</label>
                                            <select name="his_hig" id="his_hig" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('his_hig','div_his_hig','obs_his_hig',3);">
                                                <option selected="" value="1">Aceptable</option>
                                                <option value="2">Deficiente </option>
                                                <option value="3">Otro describir</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_his_hig" style="display:none;">
                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_his_hig" id="obs_his_hig"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Can.superficies teñidas </label> <!--cantidad de superficies teñidas  x  100 dividido total de superficies presentes-->
                                            <input type="number" class="form-control form-control-sm" name="cant_sup_tenidas" id="cant_sup_tenidas" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Cant. sup presentes </label> <!--cantidad de superficies teñidas  x  100 dividido total de superficies presentes-->
                                            <input type="number" class="form-control form-control-sm" name="cant_sup_presentes" id="cant_sup_presentes" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ind.O'leary </label> <!--cantidad de superficies teñidas  x  100 dividido total de superficies presentes-->
                                            <input type="number" class="form-control form-control-sm" name="ind_oleary" id="ind_oleary" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Plataforma</label>
                                            <select name="plathi" id="plathi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('plathi','div_plathi','obs_plathi',2);">
                                                <option selected="" value="1">Normal</option>
                                                <option value="2">Alterada describir</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_plathi" style="display:none;">
                                            <label class="floating-label-activo-sm">Describir</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plathi" id="obs_plathi"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Alt MG</label>
                                            <select name="permg" id="permg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('permg','div_permg','obs_permg',2);">
                                                <option selected="" value="1">Normal</option>
                                                <option value="2">Alterada (describa)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_permg" style="display:none;">
                                            <label class="floating-label-activo-sm">Describa</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_permg" id="obs_permg"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">P-Sondaje</label>
                                            <select name="personda" id="personda" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('personda','div_personda','obs_personda',2);">
                                                <option selected="" value="1">Aceptable</option>
                                                <option value="2">Alterada(describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_personda" style="display:none;">
                                            <label class="floating-label-activo-sm">Descripción</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_personda" id="obs_personda"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Furcas</label>
                                            <select name="pefurca" id="pefurca" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pefurca','div_pefurca','obs_pefurca',2);">
                                                <option selected="" value="1">Normales</option>
                                                <option value="2">Alteradas (describa)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_pefurca" style="display:none;">
                                            <label class="floating-label-activo-sm">Descripción</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pefurca" id="obs_pefurca"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Instrumento</label>
                                            <select name="per_sondatp" id="per_sondatp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('per_sondatp','div_per_sondatp','obs_per_sondatp',5);">
                                                    <option selected="" value="1">Sonda MARQUIS(MP12B)</option>
                                                <option value="2">Sonda UNC 15(MPUNC 15RB)</option>
                                                <option value="3">Sonda OMS 11.5(MPWHOB)</option>
                                                <option value="4">Sonda NABERS 15(MPN2B)</option>
                                                <option value="5">Otra describir</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_per_sondatp" style="display:none;">
                                            <label class="floating-label-activo-sm">Otra sonda</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_per_sondatp" id="obs_per_sondatp"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Observaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_per" id="obs_per"></textarea>
                                        </div>
                                        <div class="form-group" id="div_anos_perd" style="display:none;">
                                            <label class="floating-label-activo-sm">Años</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anos_perd" id="obs_anos_perd"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group" >
                                <button type="button" class="btn btn-sm btn-outline-info" onclick="guardar_pieza_examen_pieza_g({{ $counter }},'period')"><i class="feather icon-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>

                        <!-- <div class="col-sm-4 mt-2">
                            <div class="form-group fill">

                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" onchange="biopsia_check_period_g(1)" id="biopsia_check_period_g1" name="biopsia_check_period_g1" value="">
                                    <label for="biopsia_check_period_g1" class="cr"></label>
                                </div>
                                <label>biopsia</label>
                                <hr>
                                <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="peri_g_biop_zona1" id="peri_g_biop_zona1">x</textarea>
                                </div>
                                <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="peri_g_obs_result_biopsia1" id="peri_g_obs_result_biopsia1">x</textarea>
                                </div>
                                <hr>
                                    <h6 style="text-align: center;color:blue;">ESTADO GENERAL DEL PERIODONTO</h6>
                                <hr>

                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#numero_pieza_tto_period1000').select2({
            placeholder: "Seleccione",
            allowClear: true,
            width: '100%'
        });
        $('#pzas_grupo_peri1000').select2({
            placeholder: "Seleccione",
            allowClear: true,
            width: '100%'
        });
    });

    function guardar_pieza_examen_pieza(counter){
        let numero_pieza = $('#numero_pieza_tto_period'+counter).val();
        let sangrado = $('#perio_sang'+counter).val();
        let supuracion = $('#perio_sup'+counter).val();
        let higiene = $('#period_hig'+counter).val();
        let alt_mg = $('#period_alt_mg'+counter).val();
        let p_sondaje = $('#period_prof_sond'+counter).val();
        let mov_dent = $('#period_mov_dent'+counter).val();
        let furca = $('#period_furca'+counter).val();
        let tipo_sonda = $('#period_inst'+counter).val();
        let obs_perio_pza = $('#obs_period_pza'+counter).val();
        let obs_perio_sang = $('#obs_perio_sang'+counter).val();
        let obs_perio_sup = $('#obs_perio_sup'+counter).val();
        let obs_period_hig = $('#obs_period_hig'+counter).val();
        let obs_period_furca = $('#obs_period_furca'+counter).val();
        let obs_period_inst = $('#obs_period_inst'+counter).val();
        let biopsia = $('#biopsia_check_period'+counter).is(':checked') ? 1 : 0;
        if(biopsia == 1){
            let zona_biopsia = $('#period_biop_zona'+counter).val();
            let obs_result_biopsia = $('#period_obs_result_biopsia'+counter).val();
            if(zona_biopsia == null || zona_biopsia == ""){
                swal({
                    icon: 'warning',
                    title: 'Atención',
                    text: 'Ingrese Zona y Motivo de Biopsia.'
                });
                return false;
            }
            if(obs_result_biopsia == null || obs_result_biopsia == ""){
                swal({
                    icon: 'warning',
                    title: 'Atención',
                    text: 'Ingrese Observaciones y Resultado de Biopsia.'
                });
                return false;
            }
        }

        let valido = 1;
        let mensaje = "";

        if(numero_pieza == null || numero_pieza == 0){
            valido = 0;
            mensaje += "Seleccione N° de pieza dental. <br>";
        }
        if(sangrado == null || sangrado == 0){
            valido = 0;
            mensaje += "Seleccione Sangrado. <br>";
        }
        if(sangrado == 3){
            if(obs_perio_sang == null || obs_perio_sang == ""){
                valido = 0;
                mensaje += "Ingrese Otro motivo de Sangrado. <br>";
            }else{
                sangrado = obs_perio_sang;
            }
        }
        if(supuracion == null || supuracion == 0){
            valido = 0;
            mensaje += "Seleccione Supuración. <br>";
        }
        if(supuracion == 3){
            if(obs_perio_sup == null || obs_perio_sup == ""){
                valido = 0;
                mensaje += "Ingrese Otro motivo de Supuración. <br>";
            }else{
                supuracion = obs_perio_sup;
            }
        }
        if(higiene == null || higiene == 0){
            valido = 0;
            mensaje += "Seleccione Higiene. <br>";
        }
        if(higiene == 3){
            if(obs_period_hig == null || obs_period_hig == ""){
                valido = 0;
                mensaje += "Ingrese Otro motivo de Higiene. <br>";
            }else{
                higiene = obs_period_hig;
            }
        }
        if(alt_mg == null || alt_mg == ""){
            valido = 0;
            mensaje += "Ingrese Alt MG. <br>";
        }
        if(p_sondaje == null || p_sondaje == ""){
            valido = 0;
            mensaje += "Ingrese P-Sondaje. <br>";
        }
        if(mov_dent == null || mov_dent == ""){
            valido = 0;
            mensaje += "Seleccione Movilidad-pieza. <br>";
        }
        if(furca == null || furca == 0){
            valido = 0;
            mensaje += "Seleccione Furcas. <br>";
        }
        if(furca == 3){
            if(obs_period_furca == null || obs_period_furca == ""){
                valido = 0;
                mensaje += "Ingrese Otro daño de Furcas. <br>";
            }else{
                furca = obs_period_furca;
            }
        }
        if(tipo_sonda == null || tipo_sonda == 0){
            valido = 0;
            mensaje += "Seleccione Tipo sonda. <br>";
        }
        if(tipo_sonda == 5){
            if(obs_period_inst == null || obs_period_inst == ""){
                valido = 0;
                mensaje += "Ingrese Otro Tipo de sonda. <br>";
            }else{
                tipo_sonda = obs_period_inst;
            }
        }
        if(valido == 0){
            swal({
                icon: 'warning',
                title: 'Atención',
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: mensaje
                    },
                }
            });
            return false;
        }

        let data = {
            numero_pieza: numero_pieza,
            sangrado: sangrado,
            supuracion: supuracion,
            higiene: higiene,
            alt_mg: alt_mg,
            p_sondaje: p_sondaje,
            mov_dent: mov_dent,
            furca: furca,
            tipo_sonda: tipo_sonda,
            obs_perio_pza: obs_perio_pza,
            biopsia: biopsia,
            zona_biopsia: biopsia == 1 ? zona_biopsia : '',
            obs_result_biopsia: biopsia == 1 ? obs_result_biopsia : '',
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: '{{ csrf_token() }}'
        }

        console.log(data);


        let url = "{{ ROUTE('profesional.guardar_pieza_examen_pieza_period') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(resp){
                return console.log(resp);
                if(resp.mensaje == 'OK'){
                    mostrar_pieza_dental_examen(2000);
                    $('#contenedor_pieza_dental_endo_gral').empty();
                    $('#contenedor_pieza_dental_endo_gral').append(resp.v);
                    $('#contenedor_examenes_grupos_dentales').empty();
                    $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                    $('#contenedor_nueva_pieza_dental').empty();
                    $('#planificacion_examenes_gral').empty();
                    let examenes = resp.examenes;
                    examenes.forEach(examen => {
                        $('#planificacion_examenes_gral').append(
                            `<div class="form-row">
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                            <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                            <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                <option selected="" value="1">Uniradicular</option>
                                                <option value="2">Biradicular</option>
                                                <option value="2">Triradicular</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                            <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Convenio</label>
                                            <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                                <option selected="" value="1">Convenio</option>
                                                <option value="2">Sin Convenio</option>
                                            </select>
                                        </div>
                                    </div>

                            </div>
                `
                        );
                    });
                    // si es 1 es examen general
                    swal({
                        title: "Pieza dental guardada",
                        text: "La pieza dental para examen ha sido guardada correctamente.",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });

                }
            },
            error: function(error){
                console.log(error);
                return swal({
                    title: "Error al guardar",
                    text: "Ha ocurrido un error al guardar los datos.",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
    }

</script>
