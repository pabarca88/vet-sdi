<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="ficha-ad-terapi" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="fcc-atencion-diagnostica" data-toggle="tab" href="#atencion-diagnostica" role="tab" aria-controls="atencion-diagnostica" aria-selected="false">Atención diagnóstica</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones  text-uppercase" id="evolucion-tab" data-toggle="tab" href="#evolucion" role="tab" aria-controls="evolucion" aria-selected="true">Evolución</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="tab-content" id="ficha-ad-terapia">
                    <!--ATENCIÓN  DIAGNOSTICA-->
                    <div class="tab-pane fade show active" id="atencion-diagnostica" role="tabpanel" aria-labelledby="atencion-diagnostica">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Atención diagnóstica</h6>
                                        <hr>
                                    </div>
                                </div>
                                <!--FORMULARIOS-->
                                <div class="row">
                                    <!--ANTECEDENTES GENERALES-->
                                    <!--MOTIVO CONSULTA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="mot-consulta">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                                  Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-c" class="collapse" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="to_motivo_consulta" id="to_motivo_consulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Derivado Por:</label>
                                                                <input type="text" class="form-control form-control-sm"name="to_derivado por" id="to_derivado por">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="to_observaciones" id="to_observaciones"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="ant-generales">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#ant-generales-c" aria-expanded="false" aria-controls="ant-generales-c">
                                                  Antecedentes generales
                                                </button>
                                            </div>
                                            <div id="ant-generales-c" class="collapse" aria-labelledby="ant-generales" data-parent="#ant-generales">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Estado civil</label>
                                                                <select class="form-control form-control-sm" name="to_estado_civil" id="to_estado_civil">
                                                                  <option>Seleccione</option>
                                                                  <option>Soltero/a</option>
                                                                  <option>En pareja</option>
                                                                  <option>Casado/a</option>
                                                                  <option>Separado/a</option>
                                                                  <option>Viudo/a</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Nivel de educación</label>
                                                                <select class="form-control form-control-sm" name="to_niv_ed" id="to_niv_ed">
                                                                  <option>Seleccione</option>
                                                                  <option>Básica incompleta</option>
                                                                  <option>Básica completa</option>
                                                                  <option>Ens. Media incompleta</option>
                                                                  <option>Ens. Media completa</option>
                                                                  <option>Universitaria incompleta</option>
                                                                  <option>Universitaria completa</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Lugar de nacimiento</label>
                                                                <input type="text" class="form-control form-control-sm" name="to_lugar_nacimiento" id="to_lugar_nacimiento">
                                                            </div>

                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Ambiente Laboral</label>
                                                                <input type="text" class="form-control form-control-sm" name="to_ocupacion_amb" id="to_ocupacion_amb">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Ocupación</label>
                                                                <input type="text" class="form-control form-control-sm" name="to_ocupacion" id="to_ocupacion">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Religión</label>
                                                                <input type="text" class="form-control form-control-sm" name="to_religion" id="to_religion">
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--RESIDENCIA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="residencia">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#residencia-c" aria-expanded="false" aria-controls="residencia-c">
                                                Condiciones de   Residencia
                                                </button>
                                            </div>
                                            <div id="residencia-c" class="collapse" aria-labelledby="residencia" data-parent="#residencia">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                           <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Vive con</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="to_vive_con" id="to_vive_con"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Adaptada a condición ?</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="to_vive_obs" id="to_vive_obs"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--HISTORIA FAMILIAR-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="hist-familiar">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#hist-familiar-c" aria-expanded="false" aria-controls="hist-familiar-c">
                                                  Historia familiar / personas significativas
                                                </button>
                                            </div>
                                            <div id="hist-familiar-c" class="collapse" aria-labelledby="hist-familiar" data-parent="#hist-familiar">
                                                <div class="card-body-aten-a">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="myTab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="padres-hf-tab" data-toggle="tab" href="#padres-hf" role="tab" aria-controls="padres-hf" aria-selected="true">Padres</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="hermanos-hf-tab" data-toggle="tab" href="#hermanos-hf" role="tab" aria-controls="hermanos-hf" aria-selected="false">Hermanos</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="relacion-hf-tab" data-toggle="tab" href="#relacion-hf" role="tab" aria-controls="relacion-hf" aria-selected="false">Relación marital</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="hijos-hf-tab" data-toggle="tab" href="#hijos-hf" role="tab" aria-controls="hijos-hf" aria-selected="false">Hijos</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="otros-hf-tab" data-toggle="tab" href="#otros-hf" role="tab" aria-controls="otros-hf" aria-selected="false">Otras personas</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="obs-gen-hf-tab" data-toggle="tab" href="#obs-gen-hf" role="tab" aria-controls="obs-gen-hf" aria-selected="false">Observaciones generales</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="pediat-contenido">
                                                                <!--PADRES-->
                                                                <div class="tab-pane fade show active" id="padres-hf" role="tabpanel" aria-labelledby="padres-hf-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <h6 class="text-c-blue mb-3">PADRE</h6>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre padre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con el padre</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_padre" id="rel_padre"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <h6 class="text-c-blue mb-3">MADRE</h6>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre madre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_madre" id="nombre_madre">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con la madre</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_madre" id="rel_madre"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación entre padres</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_entre_padres" id="rel_entre_padres"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--HERMANOS-->
                                                                <div class="tab-pane fade show" id="hermanos-hf" role="tabpanel" aria-labelledby="hermanos-hf-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="text-c-blue mb-3">HERMANOS</h6>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">¿Tiene hermanos/as?</label>
                                                                                <select class="form-control form-control-sm" name="tiene_hnos" id="tiene_hnos">
                                                                                    <option>Seleccione</option>
                                                                                    <option>No tiene</option>
                                                                                    <option>Si tiene</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Cantidad</label>
                                                                                <input type="number" class="form-control form-control-sm" name="cantidad_hnos" id="cantidad_hnos">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <button type="button" class="btn btn-sm btn-outline-primary btn-block">Añadir</button>
                                                                            <!--Cuando el paciente dice la cantidad, se presiona el boton AÑADIR, automaticamente se agregan los inputs
                                                                                    nombre y relacion por cada hermano ingresado-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre Hermano/a</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hno" id="nombre_hno">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con Pepita</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hno" id="rel_hno"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre Hermano/a</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hno" id="nombre_hno">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con (primer nombre de hno/a)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="nombre_hno" id="nombre_hno"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación entre hermanos</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_entre_hnos" id="rel_entre_hnos"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--RELACION MARITAL-->
                                                                <div class="tab-pane fade show" id="relacion-hf" role="tabpanel" aria-labelledby="relacion-hf-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="text-c-blue mb-3">RELACIÓN MARITAL</h6>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre de pareja</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_pareja" id="nombre_pareja">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con la pareja</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_pareja" id="rel_pareja"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_pareja_obs" id="rel_pareja_obs"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--HIJOS-->
                                                                <div class="tab-pane fade" id="hijos-hf" role="tabpanel" aria-labelledby="hijos-hf-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12">
                                                                            <h6 class="text-c-blue mb-3 col-lg-3 col-xl-3">HIJOS</h6>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">¿Tiene hijos/as?</label>
                                                                                <select class="form-control form-control-sm" name="tiene_hijos" id="tiene_hijos">
                                                                                    <option>Seleccione</option>
                                                                                    <option>No tiene</option>
                                                                                    <option>Si tiene</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Cantidad</label>
                                                                                <input type="number" class="form-control form-control-sm" name="cantidad_hijos" id="cantidad_hijos">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <button type="button" class="btn btn-sm btn-outline-primary btn-block">Añadir</button>
                                                                            <!--Cuando el paciente dice la cantidad, se presiona el boton AÑADIR, automaticamente se agregan los inputs
                                                                                    nombre y relacion por cada hijo/a ingresado-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre Hij@</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hijo" id="nombre_hijo">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con Nombre hij@</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hijo" id="rel_hijo"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre Hij@</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hijo" id="nombre_hijo">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con nombre hij@</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hijo" id="rel_hijo"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación entre hij@</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_entre_hijos" id="rel_entre_hijos"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--OTRAS PERSONAS-->
                                                                <div class="tab-pane fade" id="otros-hf" role="tabpanel" aria-labelledby="otros-hf-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="text-c-blue mb-3">OTRAS PERSONAS <a href="#" class="badge badge-light-primary">+ Añadir</a></h6>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hijo" id="nombre_hijo">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con (Nombre de la persona)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hijo" id="rel_hijo"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hijo" id="nombre_hijo">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con (Nombre de la persona)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hijo" id="rel_hijo"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--OBSERVACIONES GENERALES-->
                                                                <div class="tab-pane fade show " id="obs-gen-hf" role="tabpanel" aria-labelledby="obs-gen-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="text-c-blue mb-3">OBSERVACIONES GENERALES</h6>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="obs_generales" id="obs_generales"></textarea>
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
                                    <!--ANTECEDENTES-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="antecedentes">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#antecedentes-c" aria-expanded="false" aria-controls="antecedentes-c">
                                                  Hábitos psicobiológicos
                                                </button>
                                            </div>
                                            <div id="antecedentes-c" class="collapse" aria-labelledby="antecedentes" data-parent="#antecedentes">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Consumo de alcohol</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="alcohol" id="alcohol"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Consumo de tabaco</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="tabaco" id="tabaco"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Consumo de sust. ilicitas</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sustancias_ilicitas" id="sustancias_ilicitas"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Sexualidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sexualidad" id="sexualidad"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Comentarios generales</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="com_generales" id="com_generales"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--AVD-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="a-med">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#a-med-c" aria-expanded="false" aria-controls="a-med-c">
                                                  Funcionalidad y Actividades de la vida diaria (AVD)
                                                </button>
                                            </div>
                                            <div id="a-med-c" class="collapse" aria-labelledby="a-med" data-parent="#a-med">
                                                <div class="card-body-aten-a">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="myTab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="bertel-tab" data-toggle="tab" href="#bertel" role="tab" aria-controls="bertel" aria-selected="true">ABVD indice de Barthel</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="lawton-tab" data-toggle="tab" href="#lawton" role="tab" aria-controls="lawton" aria-selected="false">AIVD Escala de Lawton</a>
                                                                </li>
                                                                  <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="prot_ortesis-tab" data-toggle="tab" href="#prot_ortesis" role="tab" aria-controls="prot_ortesis" aria-selected="false">Protesís/Ortesís</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="contexto-tab" data-toggle="tab" href="#contexto" role="tab" aria-controls="contexto" aria-selected="false">Contexto Vida diaria</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="avd-contenido">
                                                                <!--avd-->
                                                                <div class="tab-pane fade show active" id="bertel" role="tabpanel" aria-labelledby="bertel-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Alimentación</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Baño/Ducha</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Vestuario</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Higiene/Aséo</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Deposición</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Micción</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Uso WC</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Traslado sillón/cama</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Deambulación</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Escaleras</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>TOTAL</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade show" id="lawton" role="tabpanel" aria-labelledby="lawton-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Uso Teléfono</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Compras</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Preparación Comida</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Cuidados de casa</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Lavado de Ropa</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Uso de trasporte</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Medicación</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Manejo de dinero</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>ABVD --> Katz</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>TOTAL</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <!--protesis-->
                                                                <div class="tab-pane fade show" id="prot_ortesis" role="tabpanel" aria-labelledby="prot_ortesis-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Usa Audífono</label>
                                                                                <select name="usa_audifono" id="usa_audifono" data-titulo="Usa Audífono" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">No</option>
                                                                                    <option value="2">Si OD</option>
                                                                                    <option value="3">Si OI</option>
                                                                                    <option value="4">Si Ambos</option>
                                                                                    <option value="5">Anotar Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"  id="div_detalle_usa_audifono" style="display:none">
                                                                                <label class="floating-label-activo-sm">Usa Audífono</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Usa Audífono" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="audifono" id="audifono"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Apreciación Auditiva</label>
                                                                                <select name="apreciacion_auditiva" id="apreciacion_auditiva" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">Aceptable</option>
                                                                                    <option value="2">Deficiente</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_detalle_apreciacion_auditiva" style="display:none">
                                                                                <label class="floating-label-activo-sm">Apreciación Auditiva</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_auditiva_def" id="aprec_auditiva_def"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Usa Lentes</label>
                                                                                <select name="usa_lentes" id="usa_lentes" data-titulo="Usa Audífono" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_lentes','div_detalle_usa_lentes','obs_lentes',5)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">No</option>
                                                                                    <option value="2">Si Cerca</option>
                                                                                    <option value="3">Si Lejos</option>
                                                                                    <option value="4">Si Bifocales</option>
                                                                                    <option value="5">Anotar Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"  id="div_detalle_usa_lentes" style="display:none">
                                                                                <label class="floating-label-activo-sm">Lentes</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Usa Audífono" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_lentes" id="obs_lentes"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Apreciación Visual</label>
                                                                                <select name="apreciacion_visual" id="apreciacion_visual" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_visual','div_detalle_apreciacion_visual','aprec_visual_def',2)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">Aceptable</option>
                                                                                    <option value="2">Deficiente</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_detalle_apreciacion_visual" style="display:none">
                                                                                <label class="floating-label-activo-sm">Apreciación Visual</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_visual_def" id="aprec_visual_def"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Usa Protesis Dental</label>
                                                                                <select name="usa_protesis_dent" id="usa_protesis_dent" data-titulo="Usa protesis_dent" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_protesis_dent','div_detalle_usa_protesis_dent','protesis_dent',5)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">No</option>
                                                                                    <option value="2">Si parcial removible</option>
                                                                                    <option value="3">Si total</option>
                                                                                    <option value="4">Si Ambas removibles</option>
                                                                                    <option value="5">Anotar Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"  id="div_detalle_usa_protesis_dent" style="display:none">
                                                                                <label class="floating-label-activo-sm">Usa Protesis Dental</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Usa Audífono" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="protesis_dent" id="protesis_dent"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ajuste prótesis</label>
                                                                                <select name="ajuste_protesis" id="ajuste_protesis" data-titulo="Ajuste_protesis" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ajuste_protesis','div_detalle_ajuste_protesis','obs_ajuste_protesis',2)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">Aceptable</option>
                                                                                    <option value="2">Deficiente</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_detalle_ajuste_protesis" style="display:none">
                                                                                <label class="floating-label-activo-sm">Ajuste prótesis (Obs)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ajuste_protesis" id="obs_ajuste_protesis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--contexto-->
                                                                <div class="tab-pane fade show" id="contexto" role="tabpanel" aria-labelledby="contexto-tab">

                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group text-center">
                                                                                <h6>VIVIENDA</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Casa</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Departamento</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Piso</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm"> N° Pisos</label>
                                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Ascensor</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Escaleras</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group text-center">
                                                                                <h6>MOVILIDAD</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>bastón</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Muletas</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Andador</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>SSRR</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>SSRR Eléc.</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Scooter</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group text-center">
                                                                                <h6>BAÑO</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Tina</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Ducha</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Silla en ducha</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Barra en ducha</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>WC.elevado</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Wc.con barras</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>lavamanos/barra</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Tabla/Ducha</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Tina con Barras</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Otras Observaciones</label>
                                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group text-center">
                                                                                <h6>VIDA DIARIA</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Alcanzador</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Abotonador</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Adap. Calcetas</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Mangos Alargados</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Mangos Engrosados</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Adaptador Universal</label>
                                                                            </div>

                                                                        </div>


                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Reborde de platos</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Cuchara especial</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Vasos especiales</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Otras Observaciones</label>
                                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Observaciones Generales</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_pareja_obs" id="rel_pareja_obs"></textarea>
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
                                    <!--BIOPATOGRAFÍA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="biopato">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#biopato-c" aria-expanded="false" aria-controls="biopato-c">
                                                  Biopatografía
                                                </button>
                                            </div>
                                            <div id="biopato-c" class="collapse" aria-labelledby="biopato" data-parent="#biopato">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Prenatal</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="prenatal" id="prenatal"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Natal</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="natal" id="natal"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Infancia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="infancia" id="infancia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Adolescencia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="adolescencia" id="adolescencia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Edad adulta</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="edad_adulta" id="edad_adulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Adulto mayor</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ad_mayor" id="ad_mayor"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Actualidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="actualidad" id="actualidad"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--ANTECEDENTES LABORALES-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="laboral">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#laboral-c" aria-expanded="false" aria-controls="laboral-c">
                                                  Antecedentes laborales
                                                </button>
                                            </div>
                                            <div id="laboral-c" class="collapse" aria-labelledby="laboral" data-parent="#laboral">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Antecedentes laborales</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_laborales" id="ant_laborales"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--EXÁMEN MENTAL-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="exmental">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exmental-c" aria-expanded="false" aria-controls="exmental-c">
                                                  Exámen mental
                                                </button>
                                            </div>
                                            <div id="exmental-c" class="collapse" aria-labelledby="exmental" data-parent="#exmental">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Presentación</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="presentacion" id="presentacion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Conciencia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="conciencia" id="conciencia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Actitud</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="actitud" id="actitud"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Atención y concentración</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="antencion_concentracion" id="antencion_concentracion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Afectividad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="afectividad" id="afectividad"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Pensamiento</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="pensamiento" id="pensamiento"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Sensopercepción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sensopercepcion" id="sensopercepcion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Psicomotricidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psicomotricidad" id="psicomotricidad"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Sueño</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sueno" id="sueno"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Higiene</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="higiene" id="higiene"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Alimentación</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="alimentacion" id="alimentacion"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--PLAN DE TRABAJO-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="plan-trabajo">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#plan-trabajo-c" aria-expanded="false" aria-controls="plan-trabajo-c">
                                                  Plan de trabajo
                                                </button>
                                            </div>
                                            <div id="plan-trabajo-c" class="collapse" aria-labelledby="plan-trabajo" data-parent="#plan-trabajo">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="tratamiento" id="tratamiento" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="tratamiento_check" name="tratamiento_check" value="" />
                                                                                <label for="tratamiento_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Solo Control</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="lentes" id="lentes" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="lentes_check" name="lentes_check" value="" />
                                                                                <label for="lentes_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Terápia Individual</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="procedimiento" id="procedimiento" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="procedimiento_check" name="procedimiento_check" value="" />
                                                                                <label for="procedimiento_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Terápia Grupal</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Obs. Plan de tratamiento</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tratamiento" id="obs_plan_tratamiento"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="ind_terapia_to();"><i class="feather icon-plus"></i> Plan de tratamiento</button>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="ind_ic_to();"><i class="feather icon-plus"></i> Indicar Interconsulta</button>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="informe_tera();"><i class="feather icon-plus"></i> Enviar Informe</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="diagnostico">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-c" aria-expanded="false" aria-controls="diagnostico-c">
                                                  Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagnostico-c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm" name="hip-diag" id="hip-diag">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label">Diagnóstico CIE-10</label>
                                                                <input type="text" class="form-control form-control-sm" name="cie10" id="cie10">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--BOTON GUARDAR-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                        <button type="button" class="btn btn-info"><i class="fas fa-save"></i> Guardar atención diagnóstica</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--EVOLUCION-->
                    <div class="tab-pane fade" id="evolucion" role="tabpanel" aria-labelledby="evolucion">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Evolución</h6>
                                        <hr>
                                    </div>
                                </div>
                                <!--FORMULARIOS-->
                                <div class="row">
                                    <!--MOTIVO CONSULTA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="mot-consulta-ev">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-ev-c" aria-expanded="false" aria-controls="mot-consulta-ev-c">
                                                  Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-ev-c" class="collapse" aria-labelledby="mot-consulta-ev" data-parent="#mot-consulta-ev">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="motivo_consulta_evol" id="motivo_consulta_evol"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--MOTIVO CONSULTA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="eval-actual">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#eval-actual-c" aria-expanded="false" aria-controls="eval-actual-c">
                                                  Evaluación actual
                                                </button>
                                            </div>
                                            <div id="eval-actual-c" class="collapse" aria-labelledby="eval-actual" data-parent="#eval-actual">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Evaluación actual</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--PLAN PROPUESTO-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="plan">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#plan-c" aria-expanded="false" aria-controls="plan-c">
                                                  Plan propuesto
                                                </button>
                                            </div>
                                            <div id="plan-c" class="collapse" aria-labelledby="plan" data-parent="#plan">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Plan propuesto</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--RESULTADOS-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="mot-consulta">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                                  Resultados
                                                </button>
                                            </div>
                                            <div id="mot-consulta-c" class="collapse" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Resultados</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                        <button type="button" class="btn btn-info"><i class="fas fa-save"></i> Guardar evolución</button>
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
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.terapia_ocup.modal_indicar_terapia')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.terapia_ocup.m_interconsulta_to')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.terapia_ocup.informe_tera')
<script>
    function evaluar_para_carga_detalle(select, div, input, valor)
    {
        var valor_select = $('#'+select+'').val();
        if(valor_select == valor) $('#'+div+'').show();
        else {
            $('#'+div+'').hide();
            $('#'+input+'').val('');
        }
    }
</script>



