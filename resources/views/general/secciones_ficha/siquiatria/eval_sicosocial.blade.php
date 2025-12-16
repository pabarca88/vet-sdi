<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-body-aten-a shadow-none">
                <div >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="neuro" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ant_grales-tab" data-toggle="tab" href="#ant_grales" role="tab" aria-controls="ant_grales" aria-selected="true">Antecedentes Generales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset " id="rtel_fam_tab" data-toggle="tab" href="#rtel_fam" role="tab" aria-controls="rtel_fam" aria-selected="false">Relaciones Familiares</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset " id="biopat_tab" data-toggle="tab" href="#biopat" role="tab" aria-controls="biopat" aria-selected="false">Biopatografía</a>
                                </li>
                                    <li class="nav-item">
                                    <a class="nav-link-aten text-reset " id="evalps_neurologica_tab" data-toggle="tab" href="#evalps_neurologica" role="tab" aria-controls="evalps_neurologica" aria-selected="false">Eval siconeurológica</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex_ment_inicio-tab" data-toggle="tab" href="#ex_ment_inicio" role="tab" aria-control="ex_ment_inicio" aria-selected="false">Examen Mental inicio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="siquiatria_adulto">
                                    <!--ANTECEDENTES GEN-->
                                <div class="tab-pane fade show active" id="ant_grales" role="tabpanel" aria-labelledby="ant_grales-tab">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active" id="ant_generales-tab" data-toggle="tab" href="#ant_generales" role="tab" aria-controls="ant_generales" aria-selected="true">Antecedentes Generales</a>
                                                <a class="nav-link-aten text-reset" id="ant_especialidad-tab" data-toggle="tab" href="#ant_especialidad" role="tab" aria-controls="ant_especialidad" aria-selected="true">Antecedentes Especialidad</a>
                                                <a class="nav-link-aten text-reset" id="psi_habitos-tab" data-toggle="tab" href="#psi_habitos" role="tab" aria-controls="psi_habitos" aria-selected="false">Hábitos</a>
                                                <a class="nav-link-aten text-reset" id="psi_trabajo-tab" data-toggle="tab" href="#psi_trabajo" role="tab" aria-controls="psi_trabajo" aria-selected="false">Trabajo</a>
                                                <a class="nav-link-aten text-reset" id="psi_esparcimiento-tab" data-toggle="tab" href="#psi_esparcimiento" role="tab" aria-controls="psi_esparcimiento" aria-selected="false">Esparcimiernto</a>
                                                <a class="nav-link-aten text-reset" id="psi_medic-tab" data-toggle="tab" href="#psi_medic" role="tab" aria-controls="psi_medic" aria-selected="false">Medicamentos en uso</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <!--ANTECEDENTES GENERALES-->
                                                <div class="tab-pane fade show active" id="ant_generales" role="tabpanel" aria-labelledby="ant_generales-tab">
                                                        <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Lugar de nacimiento</label>
                                                                <input type="text" class="form-control form-control-sm" name="psi_ant_lugar_nacimiento" id="psi_ant_lugar_nacimiento">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Estado civil</label>
                                                                <select class="form-control form-control-sm" name="psi_ant_gen_estado_civil_ev" id="psi_ant_gen_estado_civil_ev">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Soltero/a</option>
                                                                <option value="2">En pareja</option>
                                                                <option value="3">Casado/a</option>
                                                                <option value="4">Separado/a</option>
                                                                <option value="5">Viudo/a</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Nivel de educación</label>
                                                                <select class="form-control form-control-sm" name="psi_ant_gen_niv_ed_ev" id="psi_ant_gen_niv_ed_ev">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Básica incompleta</option>
                                                                <option value="2">Básica completa</option>
                                                                <option value="3">Ens. Media incompleta</option>
                                                                <option value="4">Ens. Media completa</option>
                                                                <option value="5">Universitaria incompleta</option>
                                                                <option value="6">Universitaria completa</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Ocupación</label>
                                                                <input type="text" class="form-control form-control-sm" name="psi_ant_gen_ocupacion" id="psi_ant_gen_ocupacion">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Religión</label>
                                                                <input type="text" class="form-control form-control-sm" name="psi_ant_gen_religion_ev" id="psi_ant_gen_religion_ev">
                                                            </div>

                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Residencia </label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" placeholder="¿Con quién vive el paciente?"  onfocus="this.rows=8" onblur="this.rows=1;"name="residencia_psiq_obs" id="residencia_psiq_obs"></textarea>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                                    <!--ANTECEDENTES ESPECIALIDAD-->
                                                <div class="tab-pane fade show" id="ant_especialidad" role="tabpanel" aria-labelledby="ant_especialidad-tab">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Antecedentes médicos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_ant_medicos" id="psi_am_ant_medicos"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Ant. de suicidio (paciente o familiares)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_ant_enf_mentales" id="psi_am_ant_enf_mentales"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Ant. de enfermedades mentales (paciente o familiares)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_ant_suicidio" id="psi_am_ant_suicidio"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Tratamientos psicologicos previos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_trat_psicologicos_prev" id="psi_am_trat_psicologicos_prev"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Tratamientos psiquiátricos previos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_trat_psiquiatricos_prev" id="psi_am_trat_psiquiatricos_prev"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Medicación (actual)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_medicacion_actual" id="psi_am_medicacion_actual"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--HABITOS-->
                                                <div class="tab-pane fade show" id="psi_habitos" role="tabpanel" aria-labelledby="psi_habitos_tab">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Hábitos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" placeholder="Comentario de consumo de alcohol, sust. ilícitas, tabaco, sexualidad, otros."  onfocus="this.rows=6" onblur="this.rows=1;"name="habitos-psiq" id="habitos-psiq"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--TRABAJO-->
                                                <div class="tab-pane fade" id="psi_trabajo" role="tabpanel" aria-labelledby="psi_trabajo_tab">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Antecedentes laborales</label>
                                                                <textarea class="form-control caja-texto form-control-sm" placeholder="Comentarios" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ant_laborales" id="psi_ant_laborales"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--ESPARCIMIENTO-->
                                                <div class="tab-pane fade" id="psi_esparcimiento" role="tabpanel" aria-labelledby="psi_esparcimiento_tab">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Esparcimiento</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  placeholder="Comentarios" onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ant_esparc" id="psi_ant_esparc"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade" id="psi_medic" role="tabpanel" aria-labelledby="psi_medic-tab">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Generales</label>
                                                                    <input type="text" class="form-control form-control-sm" name="psi_ant_gen_medicamentos" id="psi_ant_gen_medicamentos">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Salud mental</label>
                                                                    <input type="text" class="form-control form-control-sm" name="psi_ant_gen_salud_mental" id="psi_ant_gen_salud_mental">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--OBSERVACIONES GENERALES-->
                                                <div class="tab-pane fade show " id="psi_obs_gen_ant" role="tabpanel" aria-labelledby="psi_obs_gen_ant_tab">
                                                    <div class="form-row">

                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <label class="floating-label-activo-sm">Observaciones generales</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_ant_obs_generales" id="psi_ant_obs_generales"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--RELACIONES FAMILIARES-->
                                <div class="tab-pane fade show " id="rtel_fam" role="tabpanel" aria-labelledby="rtel_fam_tab">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active" id="ant_padres-tab" data-toggle="tab" href="#ant_padres" role="tab" aria-controls="ant_padres" aria-selected="true">Padres</a>
                                                <a class="nav-link-aten text-reset" id="ant_hermanos-tab" data-toggle="tab" href="#ant_hermanos" role="tab" aria-controls="ant_hermanos" aria-selected="false">Hermanos</a>
                                                <a class="nav-link-aten text-reset" id="marital-tab" data-toggle="tab" href="#marital" role="tab" aria-controls="marital" aria-selected="false">Relación marital</a>
                                                <a class="nav-link-aten text-reset" id="hijos-tab" data-toggle="tab" href="#hijos" role="tab" aria-controls="hijos" aria-selected="false">Hijos</a>
                                                <a class="nav-link-aten text-reset" id="ot_pers-tab" data-toggle="tab" href="#ot_pers" role="tab" aria-controls="ot_pers" aria-selected="false">Otras Personas</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="ant_padres" role="tabpanel" aria-labelledby="ant_padres-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <h6 class="text-c-blue mb-3">PADRE</h6>
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="nombre_padre" >Nombre padre</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="rel_padre" >Relación con el padre</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_padre" id="rel_padre"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <h6 class="text-c-blue mb-3">MADRE</h6>
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="nombre_madre" >Nombre madre</label>
                                                                    <input type="text" class="form-control form-control-sm" namE="nombre_madre" id="nombre_madre">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="rel_madre" >Relación con la madre</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_madre" id="rel_madre"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="rel_entre_padres" >Relación entre padres</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_entre_padres" id="rel_entre_padres"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="ant_hermanos" role="tabpanel" aria-labelledby="ant_hermanos-tab">
                                                    <div class="col-sm-12 col-md-12 p-10 m-9" >
                                                        <h6 style="text-align: center">Características Hermanos</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="text-c-blue mb-3">HERMANOS</h6>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="tiene_hnos">¿Tiene hermanos/as?</label>
                                                                        <select class="form-control form-control-sm" name="tiene_hnos" id="tiene_hnos" onclick="evaluar_hermanos()">
                                                                            <option value="0" selected>No tiene</option>
                                                                            <option value="1">Si tiene</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md- col-lg-6 col-xl-3">
                                                                    <div class="btn-group w-100" role="group" aria-label="hnos-ps">
                                                                        <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-hermanos  wid-90" onclick="agregarHermanos();" disabled><i class="fas fa-plus"></i> Agregar hermano</button>
                                                                        <button type="button" class="btn btn-outline-danger btn-sm btn-agregar-hermanos wid-10" onclick="quitarHermano()"><i class="fas fa-minus"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" for="cantidad_hnos">Cantidad</label>
                                                                        <input type="number" class="form-control form-control-sm " name="cantidad_hnos" id="cantidad_hnos" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div id="contenedor_hermanos">
                                                                        {{-- <div id="hermanos">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm"for="nombre_hno">Nombre hermano</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="nombre_hno" id="nombre_hno">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm"for="rel_hf_hno">Relación con hermano</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hf_hno" id="rel_hf_hno"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm"for="rel_entre_hnos">Relación entre hermanos</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_entre_hnos" id="rel_entre_hnos"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="marital" role="tabpanel" aria-labelledby="marital-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <h6 class="text-c-blue mb-3">RELACIÓN MARITAL</h6>
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="nombre_pareja_sico">Nombre de pareja</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_pareja_sico" id="nombre_pareja_sico">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="rel_pareja">Relación con la pareja</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_pareja_sico" id="rel_pareja_sico"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="rel_hf_pareja_obs">Observaciones</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_hf_pareja_obs_sico" id="rel_hf_pareja_obs_sico"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="hijos" role="tabpanel" aria-labelledby="ehijos-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="tiene_hijos">¿Tiene hijos/as?</label>
                                                                    <select class="form-control form-control-sm" name="tiene_hijos_sico" id="tiene_hijos_sico" onclick="evaluar_hijos();">
                                                                        <option value="0" selected>No tiene</option>
                                                                        <option value="1">Si tiene</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md- col-lg-6 col-xl-3">
                                                                <div class="btn-group w-100" role="group" aria-label="hijos-ps">
                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-hijos wid-90" onclick="agregarHijo();" disabled><i class="fas fa-plus"></i> Agregar hijos</button>
                                                                <button type="button" class="btn btn-outline-danger btn-sm btn-agregar-hijos wid-10" onclick="quitarHijo()"><i class="fas fa-minus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="cantidad_hijos">Cantidad</label>
                                                                    <input type="number" class="form-control form-control-sm" name="cantidad_hijos_sico" id="cantidad_hijos_sico">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="ot_pers" role="tabpanel" aria-labelledby="ot_pers-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right mb-2">
                                                                    <div class="btn-group float-right" role="group" aria-label="hnos-ps">
                                                                        <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-otros " onclick="agregarOtro();"><i class="fas fa-plus"></i> Agregar otras personas</button>
                                                                        <button type="button" class="btn btn-outline-danger btn-sm btn-agregar-otros" onclick="quitarOtro()"><i class="fas fa-minus"></i></button>
                                                                        <input type="hidden" name="cantidad_ot_per" id="cantidad_ot_per" value="1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="contenedor_otro">
                                                                <div class="otro" id="otro_1">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm"for="nombre_ot_per" >Nombre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_ot_per_1" id="nombre_ot_per_1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm" for="rel_ot_per_1">Relación</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_ot_per_1" id="rel_ot_per_1"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm" for="obs_ex_generales_fc_ev">Observaciones Generales  Funciones Corticales</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antecedentes Importantes" data-seccion="Cap. Constructiva" id="obs_ex_generales_fc_ev" name="obs_ex_generales_fc_ev"  rows="1" onfocus="this.rows=4"  onblur="this.rows=1;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--BIOPATOLOGIA-->
                                <div class="tab-pane fade show" id="biopat" role="tabpanel" aria-labelledby="biopat-tab">
                                    <div class="card-body-aten-a">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <label class="floating-label-activo-sm">Historia social / Biopatografía</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" placeholder="Descripción de biografía , experiencias pasadas."  onfocus="this.rows=13" onblur="this.rows=1;"name="biopat-psiq" id="biopat-psiq"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    <!--EVAL PSICONEUROLOGICA-->
                                <div class="tab-pane fade show" id="evalps_neurologica" role="tabpanel" aria-labelledby="evalps_neurologica-tab">
                                    <div class="card-body-aten-a">
                                        <form>
                                            <div class="row">
                                        <div class="col-sm-3">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active" id="ant_psico_neur-tab" data-toggle="tab" href="#ant_psico_neur" role="tab" aria-controls="ant_psico_neur" aria-selected="true">Antecedentes</a>
                                                <a class="nav-link-aten text-reset" id="eval_psiconeuro-tab" data-toggle="tab" href="#eval_psiconeuro" role="tab" aria-controls="eval_psiconeuro" aria-selected="false">Eval-psiconeurológica</a>
                                                {{--  <a class="nav-link-aten text-reset" id="marital-tab" data-toggle="tab" href="#marital" role="tab" aria-controls="marital" aria-selected="false">otro</a>
                                                <a class="nav-link-aten text-reset" id="hijos-tab" data-toggle="tab" href="#hijos" role="tab" aria-controls="hijos" aria-selected="false">otro</a>
                                                <a class="nav-link-aten text-reset" id="ot_pers-tab" data-toggle="tab" href="#ot_pers" role="tab" aria-controls="ot_pers" aria-selected="false">Otras Personas</a>  --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="ant_psico_neur" role="tabpanel" aria-labelledby="ant_psico_neur-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="card-body-aten-a">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm" for="ant_medicos">Antecedentes médicos</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_medicos_sico" id="ant_medicos_sico"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm" for="ant_suicidio">Ant. de suicidio (paciente o familiares)</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="ant_suicidio_sico" id="ant_suicidio_sico"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm" for="enf_mentales">Ant. de enfermedades mentales (paciente o familiares)</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="enf_mentales_sico" id="enf_mentales_sico" ></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm" for="trat_psicologicos_prev">Tratamientos psicológicos previos</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="trat_psicologicos_prev_sico" id="trat_psicologicos_prev_sico"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm" for="trat_psiquiatricos_prev">Tratamientos psiquiátricos previos</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="trat_psiquiatricos_prev_sico" id="trat_psiquiatricos_prev_sico"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm" for="medicacion_actual">Medicación (actual)</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="medicacion_actual_sico" id="medicacion_actual_sico"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="eval_psiconeuro" role="tabpanel" aria-labelledby="aeval_psiconeurotab">
                                                    <div class="card-body-aten-a shadow-none">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="eval_con">Evalución Conciencia</label>
                                                                    <select name="eval_con_ev" id="eval_con_ev" data-titulo="Evalución Conciencia" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_con','div_eval_con','eval_con_obs',4);">
                                                                        <option value="0" selected>Seleccione</option>
                                                                        <option value="1" >Lúcido</option>
                                                                        <option value="2">Obnubilado</option>
                                                                        <option value="3">Desorientado</option>
                                                                        <option value="4"> Observaciones (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_eval_con" style="display:none">
                                                                    <label class="floating-label-activo-sm" for="eval_con_obs">Detalle Conciencia</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Conciencia" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_con_obs" id="eval_con_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="eval_ori">Orientación</label>
                                                                    <select name="eval_ori_ev" id="eval_ori_ev" data-titulo="Orientación" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_ori','div_eval_ori','eval_ori_obs',4);">
                                                                        <option value="0" selected>Seleccione</option>
                                                                        <option value="1" >Orientado en Tiempo y Espacio</option>
                                                                        <option value="2">Perdido</option>
                                                                        <option value="3">Dudosa</option>
                                                                        <option value="4"> Observaciones (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_eval_ori" style="display:none">
                                                                    <label class="floating-label-activo-sm" for="eval_ori_obs">Detalle Orientación</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Orientación" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_ori_obs" id="eval_ori_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="eval_comp">Comportamiento</label>
                                                                    <select name="eval_comp_ev" id="eval_comp_ev" data-titulo="Comportamiento" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_comp','div_eval_comp','eval_comp_obs',3);">
                                                                        <option value="0" selected>Seleccione</option>
                                                                        <option value="1" >Coherente</option>
                                                                        <option value="2">Incoherente</option>
                                                                        <option value="3"> Observaciones (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_eval_comp" style="display:none">
                                                                    <label class="floating-label-activo-sm" for="eval_comp_obs">Detalle Comportamiento</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Comportamiento" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_comp_obs" id="eval_comp_obs"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="eval_colab">Colaboración</label>
                                                                    <select name="eval_colab_ev" id="eval_colab_ev" data-titulo="Colaboración" data-seccion="Evaluación Psiconeurológica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('eval_colab','div_eval_colab','eval_colab_obs',3);">
                                                                        <option value="0" selected>Seleccione</option>
                                                                        <option value="1">Si</option>
                                                                        <option value="2">No</option>
                                                                        <option value="3"> Observaciones (describir)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_eval_colab" style="display:none">
                                                                    <label class="floating-label-activo-sm" for="eval_colab_obs">Colaboración</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Colaboración" data-seccion="Evaluación Psiconeurológica"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eval_colab_obs" id="eval_colab_obs"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <h6 class="text-c-blue">Arrastre el archivo para adjuntar imágenes o archivos</h6>
                                                            </div>
                                                        </div>
                                                        <style>
                                                            .dropzone .dz-remove {
                                                                color: #dc3545 !important; /* Rojo Bootstrap */
                                                                font-weight: bold;
                                                                text-decoration: underline;
                                                                cursor: pointer;
                                                                display: inline-block;
                                                                margin-top: 5px;
                                                            }

                                                            .dropzone .dz-remove:hover {
                                                                color: #a71d2a !important; /* Rojo más oscuro al pasar el mouse */
                                                            }

                                                            /* Opcional: Cambiar tamaño del texto o añadir íconos */
                                                            .dropzone .dz-remove::before {
                                                                content: "🗑️ ";
                                                            }
                                                        </style>

                                                        <div class="form-row">
                                                            <!--DROPZONE PARA SUBIR DIBUJOS U OTRO ARCHIVO-->
                                                            <div class="col-md-8 mb-3">
                                                                <div class=" text-justify pt-3 pb-1" role="alert">
                                                                    <input type="hidden" name="mi-archivo-subido" id="mi-archivo-subido" value="">
                                                                    <!-- [ Main Content ] start -->
                                                                    <div class="dropzone" id="dropzonePsico" action="{{ route('paciente.archivo.carga') }}"></div>
                                                                    <!-- [ file-upload ] end -->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <div id="listado_imagenes_psico_pc"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label-activo-sm" for="eval_com_coment">Comentario de la Evaluación</label>
                                                                <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="eval_com_coment" id="eval_com_coment"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="marital" role="tabpanel" aria-labelledby="marital-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <h6 class="text-c-blue mb-3">RELACIÓN MARITAL</h6>
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="nombre_pareja">Nombre de pareja</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_pareja" id="nombre_pareja">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="rel_pareja">Relación con la pareja</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_pareja" id="rel_pareja"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="rel_hf_pareja_obs">Observaciones</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_hf_pareja_obs" id="rel_hf_pareja_obs"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--  <div class="tab-pane fade" id="hijos" role="tabpanel" aria-labelledby="ehijos-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="tiene_hijos">¿Tiene hijos/as?</label>
                                                                    <select class="form-control form-control-sm" name="tiene_hijos" id="tiene_hijos" onclick="evaluar_hijos();">
                                                                        <option value="0" selected>No tiene</option>
                                                                        <option value="1">Si tiene</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md- col-lg-6 col-xl-3">
                                                                <div class="btn-group w-100" role="group" aria-label="hijos-ps">
                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-hijos wid-90" onclick="agregarHijo();" disabled><i class="fas fa-plus"></i> Agregar hijos</button>
                                                                <button type="button" class="btn btn-outline-danger btn-sm btn-agregar-hijos wid-10" onclick="quitarHijo()"><i class="fas fa-minus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="cantidad_hijos">Cantidad</label>
                                                                    <input type="number" class="form-control form-control-sm" name="cantidad_hijos" id="cantidad_hijos">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  --}}
                                                {{--  <div class="tab-pane fade" id="ot_pers" role="tabpanel" aria-labelledby="ot_pers-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right mb-2">
                                                                    <div class="btn-group float-right" role="group" aria-label="hnos-ps">
                                                                        <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-otros " onclick="agregarOtro();"><i class="fas fa-plus"></i> Agregar otras personas</button>
                                                                        <button type="button" class="btn btn-outline-danger btn-sm btn-agregar-otros" onclick="quitarOtro()"><i class="fas fa-minus"></i></button>
                                                                        <input type="hidden" name="cantidad_ot_per" id="cantidad_ot_per" value="1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="contenedor_otro">
                                                                <div class="otro" id="otro_1">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm"for="nombre_ot_per" >Nombre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_ot_per_1" id="nombre_ot_per_1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm" for="rel_ot_per_1">Relación</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_ot_per_1" id="rel_ot_per_1"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>  --}}
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm" for="obs_ex_generales_fc_rm">Observaciones Generales  Funciones Corticales</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antecedentes Importantes" data-seccion="Cap. Constructiva" id="obs_ex_generales_fc_rm" name="obs_ex_generales_fc_rm"  rows="1" onfocus="this.rows=4"  onblur="this.rows=1;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        </form>
                                    </div>
                                </div>
                                <!--EXAMEN MENTAL INICIO-->
                                <div class="tab-pane fade show" id="ex_ment_inicio" role="tabpanel" aria-labelledby="ex_ment_inicio-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Aspecto y actitud</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi-actitud_inicial" id="psi-actitud_inicial"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Estado de animo y afecto</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_e_animo_inicial" id="psi_e_animo_inicial"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Pensamiento</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_pensam_inicial" id="psi_pensam_inicial"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Percepción</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_percep_inicial" id="psi_percep_inicial"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Orientación</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_orientacion_inicial" id="psi_orientacion_inicial"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Memoria</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_memoria_inicial" id="psi_memoria_inicial"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Atención y concentración</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_concentracion_inicial" id="psi_concentracion_inicial"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Juicio y raciocinio</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_raciocinio_inicial" id="psi_raciocinio_inicial"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label class="floating-label-activo-sm">Conciencia de enfermedad/Tratamiento</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_con_enfermedad_inicial" id="psi_con_enfermedad_inicial"></textarea>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12">
        <button type="button" class="btn btn-success btn-sm" onclick="guardar_evaluacion_sico()"><i class="fas fa-save"></i> Guardar</button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Verifica si Dropzone ya está inicializado en el elemento
        if (Dropzone.instances.length > 0) {
            Dropzone.instances.forEach(instance => {
                if (instance.element.id === "dropzonePsico") {
                    instance.destroy();
                }
            });
        }

        // Inicializa Dropzone en el elemento con el ID "dropzonePsico"
        myDropzone = new Dropzone("#dropzonePsico", {
            url: "{{ route('paciente.archivo.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4, // Tamaño máximo en MiB
            maxFiles: 4,
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
            dictInvalidFileType: "No puedes subir archivos de este tipo.",
            dictCancelUpload: "Cancelar carga",
            dictUploadCanceled: "Subida cancelada.",
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
            dictRemoveFile: "Eliminar archivo",
            dictMaxFilesExceeded: "No puede cargar más archivos.",
            autoProcessQueue: true, // Desactiva el procesamiento automático
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    formData.append("id", "{{ Auth::user()->id }}");
                });
                this.on("success", function(file, response) {
                    // Manejar la respuesta de éxito
                    console.log(response);
                    if (response.archivo?.nombre_archivo) {
                        archivosSubidos.push(response.archivo.nombre_archivo);
                    }
                });
                this.on("error", function(file, message) {
                    // Manejar el error
                    console.error(message);
                });
                this.on("removedfile", function(file) {
                    // Manejar la eliminación del archivo
                    console.log("Archivo eliminado");
                });
                this.on("canceled", function(file) {
                    // Manejar la cancelación de la carga
                    console.log("Carga cancelada");
                });
            }
        });

    });
</script>

