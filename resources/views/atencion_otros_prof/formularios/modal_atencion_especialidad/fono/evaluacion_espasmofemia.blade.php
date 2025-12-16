<div id="m_eval_espasmof" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_eval_espasmof" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Evaluación de la Espasmofemia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="tede" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="ant-gen-eves-tab" data-toggle="tab" href="#ant-gen-eves" role="tab" aria-controls="ant-gen-eves" aria-selected="true">Antecedentes generales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="eval-eves-tab" data-toggle="tab" href="#eval-eves" role="tab" aria-controls="eval-eves" aria-selected="false">Evaluaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="hab-eves-tab" data-toggle="tab" href="#hab-eves" role="tab" aria-controls="hab-eves" aria-selected="false">Habla</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="lect-con-eves-tab" data-toggle="tab" href="#lect-con-eves" role="tab" aria-controls="lect-con-eves" aria-selected="false">Lectura </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="rep-palora-eves-tab" data-toggle="tab" href="#rep-palora-eves" role="tab" aria-controls="rep-palora-eves" aria-selected="false">Repeticiones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="dg_plan-tab" data-toggle="tab" href="#dg_plan" role="tab" aria-controls="dg_plan" aria-selected="false">Diagnóstico</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="tede_info">
                            <!--ANTECEDENTES GENERALES-->
                            <div class="tab-pane fade show active" id="ant-gen-eves" role="tabpanel" aria-labelledby="ant-gen-eves-tab">
                                <div id="espasmofemia" class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">ANTECEDENTES GENERALES</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                        <label class="floating-label-activo-sm">Comienzo</label>
                                        <select class="form-control form-control-sm" name="modo_resp" id="modo_resp">
                                            <option value="1">Espontáneo</option>
                                            <option value="2">Provocado</option>
                                            <option value="3">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                        <label class="floating-label-activo-sm">Condiciones de aparición</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cond_aparicion" id="cond_aparicion"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                        <label class="floating-label-activo-sm">Evolución</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="evol" id="evol"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                        <label class="floating-label-activo-sm">Tratamientos anteriores</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="trat_ant" id="trat_ant"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                        <label class="floating-label-activo-sm">Personalidad</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="perso" id="perso"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                        <label class="floating-label-activo-sm">Conciencia del Problema</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="con_prob" id="con_prob"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Fenómenos Emocionales</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fen_em" id="fen_em"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Factor Hereditario</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fact_her" id="fact_her"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Relación Familiar</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="rel_fam" id="rel_fam"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Comentario y Observaciones Ant.Generales</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_coment_ag" id="obs_coment_ag"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--EVALUACIONES-->
                            <div class="tab-pane fade show" id="eval-eves" role="tabpanel" aria-labelledby="eval-eves-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">EVALUACIONES</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2">
                                        <label class="floating-label-activo-sm">Evaluación OFA</label>
                                            <select class="form-control form-control-sm" name="ev_ofa" id="ev_ofa">
                                                <option value="NO">Normal</option>
                                                <option value="NA">Nasal</option>
                                                <option value="BU">Bucal</option>
                                                <option value="MI">Mixta</option>
                                            </select>
                                        </div>
                                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-2 ">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ofa" id="obs_ofa"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2">
                                        <label class="floating-label-activo-sm">Praxias</label>
                                        <select class="form-control form-control-sm" name="praxias" id="praxias">
                                            <option value="NO">Normal</option>
                                            <option value="NA">Nasal</option>
                                            <option value="BU">Bucal</option>
                                            <option value="MI">Mixta</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-2 ">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_praxias" id="obs_praxias"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Respiración</label>
                                        <select class="form-control form-control-sm" name="resp" id="resp">
                                            <option value="NO">Normal</option>
                                            <option value="NA">Nasal</option>
                                            <option value="BU">Bucal</option>
                                            <option value="MI">Mixta</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Musculatura</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="musc" id="musc"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Comentario y Observaciones Evaluaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_coment_eval" id="obs_coment_eval"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--HABLA-->
                            <div class="tab-pane fade show" id="hab-eves" role="tabpanel" aria-labelledby="hab-eves-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">HABLA EN GENERAL</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Fluidez</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fluidez" id="fluidez"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Ritmo</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ritmo" id="ritmo"></textarea>
                                    </div>
                                   <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Prosódia</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="prosodia" id="prosodia"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">HABLA ESPONTÁNEA</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Verbal</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cond_verb" id="cond_verb"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Motora Asociada</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="condmot" id="condmot"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Caractéres de Enunciados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="enunc" id="enunc"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label  class="floating-label-activo-sm">Fenómenos Emocionales Asociados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="emocional" id="emocional"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Comentario y Observaciones Habla</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_coment_hab" id="obs_coment_hab"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--HABLA -->

                            <!--LECTURA -->
                            <div class="tab-pane fade show" id="lect-con-eves" role="tabpanel" aria-labelledby="lect-con-eves-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">LECTURA SIN RITMO</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Verbal</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectsin_verb" id="lectsin_verb"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Motora Asociada</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectsin_mot" id="lectsin_mot"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Caractéres de Enunciados</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectsin_enun" id="lectsin_enun"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Fenómenos Emocionales Asociados</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectsin_emoc" id="lectsin_emoc"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">Lectura con ritmo</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Verbal</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectcon_verb" id="lectcon_verb"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Motora Asociada</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectcon_mot" id="lectcon_mot"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Caractéres de Enunciados</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectcon_enun" id="lectcon_enun"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Fenómenos Emocionales Asociados</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectcon_emoc" id="lectcon_emoc"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Comentario y Observaciones Lectura</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_coment_lect" id="obs_coment_lect"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!--REPETICIONES-->

                            <div class="tab-pane fade show" id="rep-palora-eves" role="tabpanel" aria-labelledby="rep-palora-eves-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">REP. DE PALABRAS Y ORACIONES</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Verbal</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="con_verb_pal_or" id="con_verb_pal_or"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Motora Asociada</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="con_mot_pal_or" id="con_mot_pal_or"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Caractéres de Enunciados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="caract_enunc_pal_or" id="caract_enunc_pal_or"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Fenómenos Emocionales Asociados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fen_asoc_pal_or" id="fen_asoc_pal_or"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <h6 class="tit-gen">REP. DE SERIES AUTOMÁTICAS </h6>
                                   </div>
                               </div>
                               <div class="form-row">
                                   <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm">Conducta Verbal</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="con_verb_pal_ser" id="con_verb_pal_ser"></textarea>
                                   </div>
                                   <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm">Conducta Motora Asociada</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="con_mot_pal_ser" id="con_mot_pal_ser"></textarea>
                                   </div>
                                   <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm">Caractéres de Enunciados</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="caract_enunc_pal_ser" id="caract_enunc_pal_ser"></textarea>
                                   </div>
                                   <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                       <label class="floating-label-activo-sm">Fenómenos Emocionales Asociados</label>
                                       <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fen_asoc_pal_ser" id="fen_asoc_pal_ser"></textarea>
                                   </div>
                               </div>
                               <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Comentario y Observaciones Repeticiones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_coment_rep" id="obs_coment_rep"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--REPETICIONES-->
                            <!--DIAGNOSTICO PLAN-->
                            <div class="tab-pane fade show" id="dg_plan" role="tabpanel" aria-labelledby="dg_plan-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">DIAGNÓSTICO Y PLAN DE TRATAMIENTO</h6>
                                    </div>
                                </div>
                               <div class="form-row">
                                   <div class="col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                       <label class="floating-label-activo-sm">Diagnóstico</label>
                                       <div class="form-group">
                                           <select class="form-control form-control-sm" name="dg_espasmp" id="dg_espasm">
                                               <option value="NO">Espasmofémia Tónica</option>
                                               <option value="NA">Espasmofémia Clónica</option>
                                               <option value="BU">Espasmofémia Mixta</option>
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                       <label class="floating-label-activo-sm">Gravedad</label>
                                       <div class="form-group">
                                           <select class="form-control form-control-sm" name="grav_espasm" id="grav_espasm">
                                               <option value="NO">Ligera</option>
                                               <option value="NA">Moderada</option>
                                               <option value="BU">Grave</option>
                                               <option value="MI">Severa</option>
                                           </select>
                                       </div>
                                   </div>
                               </div>
                               <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Plan de trabajo</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="plan" id="plan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--DIAGNOSTICO PLAN-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" class="btn btn-info-light-c btn-sm" onclick="registrar_ev_espasmofemia();"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function e_espasmo() {
        $('#m_eval_espasmof').modal('show');
    }

    function registrar_ev_espasmofemia()
    {
        var id_ficha_otros_prof = $('#id_fc').val();
        var id_ficha_fono = '';
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();

        var modo_resp = $('#modo_resp').val(); // - select-one
        var cond_aparicion = $('#cond_aparicion').val(); // - textarea
        var evol = $('#evol').val(); // - textarea
        var trat_ant = $('#trat_ant').val(); // - textarea
        var perso = $('#perso').val(); // - textarea
        var con_prob = $('#con_prob').val(); // - textarea
        var fen_em = $('#fen_em').val(); // - textarea
        var fact_her = $('#fact_her').val(); // - textarea
        var rel_fam = $('#rel_fam').val(); // - textarea
        var obs_coment_ag = $('#obs_coment_ag').val(); // - textarea
        var ev_ofa = $('#ev_ofa').val(); // - select-one
        var obs_ofa = $('#obs_ofa').val(); // - textarea
        var praxias = $('#praxias').val(); // - select-one
        var obs_praxias = $('#obs_praxias').val(); // - textarea
        var resp = $('#resp').val(); // - select-one
        var obs_resp = $('#obs_resp').val(); // - textarea
        var musc = $('#musc').val(); // - textarea
        var obs_coment_eval = $('#obs_coment_eval').val(); // - textarea
        var fluidez = $('#fluidez').val(); // - textarea
        var ritmo = $('#ritmo').val(); // - textarea
        var prosodia = $('#prosodia').val(); // - textarea
        var cond_verb = $('#cond_verb').val(); // - textarea
        var condmot = $('#condmot').val(); // - textarea
        var enunc = $('#enunc').val(); // - textarea
        var emocional = $('#emocional').val(); // - textarea
        var obs_coment_hab = $('#obs_coment_hab').val(); // - textarea
        var lectsin_verb = $('#lectsin_verb').val(); // - textarea
        var lectsin_mot = $('#lectsin_mot').val(); // - textarea
        var lectsin_enun = $('#lectsin_enun').val(); // - textarea
        var lectsin_emoc = $('#lectsin_emoc').val(); // - textarea
        var lectcon_verb = $('#lectcon_verb').val(); // - textarea
        var lectcon_mot = $('#lectcon_mot').val(); // - textarea
        var lectcon_enun = $('#lectcon_enun').val(); // - textarea
        var lectcon_emoc = $('#lectcon_emoc').val(); // - textarea
        var obs_coment_lect = $('#obs_coment_lect').val(); // - textarea
        var con_verb_pal_or = $('#con_verb_pal_or').val(); // - textarea
        var con_mot_pal_or = $('#con_mot_pal_or').val(); // - textarea
        var caract_enunc_pal_or = $('#caract_enunc_pal_or').val(); // - textarea
        var fen_asoc_pal_or = $('#fen_asoc_pal_or').val(); // - textarea
        var con_verb_pal_ser = $('#con_verb_pal_ser').val(); // - textarea
        var con_mot_pal_ser = $('#con_mot_pal_ser').val(); // - textarea
        var caract_enunc_pal_ser = $('#caract_enunc_pal_ser').val(); // - textarea
        var fen_asoc_pal_ser = $('#fen_asoc_pal_ser').val(); // - textarea
        var obs_coment_rep = $('#obs_coment_rep').val(); // - textarea
        var dg_espasm = $('#dg_espasm').val(); // - select-one
        var grav_espasm = $('#grav_espasm').val(); // - select-one
        var plan = $('#plan').val(); // - textarea

        var url = "{{ route('ficha.otro.prof.registro.eval.espasmofemia') }}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                    _token: CSRF_TOKEN,
                    id_ficha_otros_prof:id_ficha_otros_prof,
                    id_ficha_fono:id_ficha_fono,
                    id_paciente:id_paciente,
                    id_profesional:id_profesional,
                    modo_resp:modo_resp,
                    cond_aparicion:cond_aparicion,
                    evol:evol,
                    trat_ant:trat_ant,
                    perso:perso,
                    con_prob:con_prob,
                    fen_em:fen_em,
                    fact_her:fact_her,
                    rel_fam:rel_fam,
                    obs_coment_ag:obs_coment_ag,
                    ev_ofa:ev_ofa,
                    obs_ofa:obs_ofa,
                    praxias:praxias,
                    obs_praxias:obs_praxias,
                    resp:resp,
                    obs_resp:obs_resp,
                    musc:musc,
                    obs_coment_eval:obs_coment_eval,
                    fluidez:fluidez,
                    ritmo:ritmo,
                    prosodia:prosodia,
                    cond_verb:cond_verb,
                    condmot:condmot,
                    enunc:enunc,
                    emocional:emocional,
                    obs_coment_hab:obs_coment_hab,
                    lectsin_verb:lectsin_verb,
                    lectsin_mot:lectsin_mot,
                    lectsin_enun:lectsin_enun,
                    lectsin_emoc:lectsin_emoc,
                    lectcon_verb:lectcon_verb,
                    lectcon_mot:lectcon_mot,
                    lectcon_enun:lectcon_enun,
                    lectcon_emoc:lectcon_emoc,
                    obs_coment_lect:obs_coment_lect,
                    con_verb_pal_or:con_verb_pal_or,
                    con_mot_pal_or:con_mot_pal_or,
                    caract_enunc_pal_or:caract_enunc_pal_or,
                    fen_asoc_pal_or:fen_asoc_pal_or,
                    con_verb_pal_ser:con_verb_pal_ser,
                    con_mot_pal_ser:con_mot_pal_ser,
                    caract_enunc_pal_ser:caract_enunc_pal_ser,
                    fen_asoc_pal_ser:fen_asoc_pal_ser,
                    obs_coment_rep:obs_coment_rep,
                    dg_espasm:dg_espasm,
                    grav_espasm:grav_espasm,
                    plan:plan,
                },
            })
        .done(function(data) {
            if (data.estado == 1)
            {

                $('#m_eval_espasmof').modal('hide');
                limpiar_e_espasmogemia();
                swal({
                    title: "Registro de Evaluacion de la Espasmofemia",
                    text: "Carga Exitosa.",
                    icon: "success"
                });
            }
            else
            {
                swal({
                    title: "Registro de Evaluacion de la Espasmofemia",
                    text: "Error al registrar",
                    icon: "error"
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function limpiar_e_espasmogemia()
    {
        $('#modo_resp').val('1'); // - select-one
        $('#cond_aparicion').val(); // - textarea
        $('#evol').val(''); // - textarea
        $('#trat_ant').val(''); // - textarea
        $('#perso').val(''); // - textarea
        $('#con_prob').val(''); // - textarea
        $('#fen_em').val(''); // - textarea
        $('#fact_her').val(''); // - textarea
        $('#rel_fam').val(''); // - textarea
        $('#obs_coment_ag').val(''); // - textarea
        $('#ev_ofa').val('NO'); // - select-one
        $('#obs_ofa').val(''); // - textarea
        $('#praxias').val('NO'); // - select-one
        $('#obs_praxias').val(''); // - textarea
        $('#resp').val('NO'); // - select-one
        $('#obs_resp').val(''); // - textarea
        $('#musc').val(''); // - textarea
        $('#obs_coment_eval').val(''); // - textarea
        $('#fluidez').val(''); // - textarea
        $('#ritmo').val(''); // - textarea
        $('#prosodia').val(''); // - textarea
        $('#cond_verb').val(''); // - textarea
        $('#condmot').val(''); // - textarea
        $('#enunc').val(''); // - textarea
        $('#emocional').val(''); // - textarea
        $('#obs_coment_hab').val(''); // - textarea
        $('#lectsin_verb').val(''); // - textarea
        $('#lectsin_mot').val(''); // - textarea
        $('#lectsin_enun').val(''); // - textarea
        $('#lectsin_emoc').val(''); // - textarea
        $('#lectcon_verb').val(''); // - textarea
        $('#lectcon_mot').val(''); // - textarea
        $('#lectcon_enun').val(''); // - textarea
        $('#lectcon_emoc').val(''); // - textarea
        $('#obs_coment_lect').val(''); // - textarea
        $('#con_verb_pal_or').val(''); // - textarea
        $('#con_mot_pal_or').val(''); // - textarea
        $('#caract_enunc_pal_or').val(''); // - textarea
        $('#fen_asoc_pal_or').val(''); // - textarea
        $('#con_verb_pal_ser').val(''); // - textarea
        $('#con_mot_pal_ser').val(''); // - textarea
        $('#caract_enunc_pal_ser').val(''); // - textarea
        $('#fen_asoc_pal_ser').val(''); // - textarea
        $('#obs_coment_rep').val(''); // - textarea
        $('#dg_espasm').val('NO'); // - select-one
        $('#grav_espasm').val('NO'); // - select-one
        $('#plan').val(''); // - textarea
    }
</script>







