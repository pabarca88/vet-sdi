<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="enf_urgencia">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#enf_urgencia_c" aria-expanded="false" aria-controls="enf_urgencia_c">
                Atención Enfermería 
            </button>
        </div>
        <div id="enf_urgencia_c" class="collapse" aria-labelledby="enf_urgencia" data-parent="#enf_urgencia">
            <div class="card-body-aten-a">
                <div id="form-enf_urgencia">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="enf_urgencia" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ing_enf_tab" data-toggle="tab" href="#ing_enf" role="tab" aria-controls="ing_enf" aria-selected="true">Antecedentes de Ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="enf_cont_ciclo_tab" data-toggle="tab" href="#enf_cont_ciclo" role="tab" aria-controls="enf_cont_ciclo" aria-selected="true">Control de Ciclo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="enf_asig_urg_tab" data-toggle="tab" href="#enf_asig_urg" role="tab" aria-controls="enf_asig_urg" aria-selected="true">Asignación de Urgencia </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="enf_tto_tab" data-toggle="tab" href="#enf_tto" role="tab" aria-controls="enf_tto" aria-selected="true">Tratamientos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="enf_proc_tab" data-toggle="tab" href="#enf_proc" role="tab" aria-controls="enf_proc" aria-selected="true">Procedimientos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="enf_cura_tab" data-toggle="tab" href="#enf_cura" role="tab" aria-controls="enf_cura" aria-selected="true">Curaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="enf_examenes_tab" data-toggle="tab" href="#enf_examenes" role="tab" aria-controls="enf_examenes" aria-selected="true">Exámenes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="orl_adulto">
                                <!--INGRESO ENFERMERIA-->
                                <div class="tab-pane fade show active" id="ing_enf" role="tabpanel" aria-labelledby="ing_enf_tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                            <h6 class="t-aten">Antecedentes de ingreso</h6>
                                         </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="ing_enf" role="tabpanel" aria-labelledby="ing_enf_tab">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm" for="motivo">Motivo de consulta</label>
                                                                <input type="text" class="form-control form-control-sm" name="motivo" id="motivo">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm" for="antecedentes">Medio en que llega</label>
                                                                <input type="text" class="form-control form-control-sm" name="antecedentes" id="antecedentes">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm" for="antecedentes">Escala EVA</label>
                                                                <input type="text" class="form-control form-control-sm" name="antecedentes" id="antecedentes">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                <label class="floating-label-activo-sm" for="examen_fisico">Observaciones de la Urgencia</label>
                                                                <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="EXAMEN ENFERMERÍA"></textarea>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <!--CONTROL DE CICLO-->
                                <div class="tab-pane fade show" id="enf_cont_ciclo" role="tabpanel" aria-labelledby="enf_cont_ciclo_tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten d-inline ml-3">Control del ciclo</h6>
                                         </div>
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="enf_cont_ciclo" role="tabpanel" aria-labelledby="enf_cont_ciclo_tab"><br>
                                                    <div class="col-sm-12 col-md-12">
                                                        @include('general.secciones_ficha.signos_vitales_ingreso_urgencia')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ASIGNAR URGENCIA-->
                                <div class="tab-pane fade show " id="enf_asig_urg" role="tabpanel" aria-labelledby="enf_asig_urg_tab">
                                    <div class="row pb-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-row">
                                                <div class="col-sm-6 col-md-6">
                                                    <h6 class="t-aten">Asignar Urgencia</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md">
                                                    <div class="card text-center bg-danger h-100">
                                                      <div class="card-body pt-3 pb-1">
                                                        <h4 class="text-white font-weight-bold">C1</h4>
                                                        <p class="card-text text-white font-weight-bold">GRAVE CON RIESGO VITAL</p>
                                                        <button type="button" class="btn btn-xxs btn-outline-light">ASIGNAR</button>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md">
                                                    <div class="card text-center bg-naranjo h-100">
                                                      <div class="card-body pt-3 pb-1">
                                                        <h4 class="text-white font-weight-bold">C2</h4>
                                                        <p class="card-text text-white font-weight-bold">GRAVE SIN RIESGO VITAL</p>
                                                        <button type="button" class="btn btn-xxs btn-outline-light">ASIGNAR</button>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md">
                                                    <div class="card text-center bg-amarillo text-white h-100">
                                                      <div class="card-body pt-3 pb-1">
                                                        <h4 class="text-white font-weight-bold">C3</h4>
                                                        <p class="card-text text-white font-weight-bold">COMPLEJIDAD MEDIA</p>
                                                        <button type="button" class="btn btn-xxs btn-outline-light">ASIGNAR</button>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md">
                                                    <div class="card text-center bg-verde h-100">
                                                      <div class="card-body pt-3 pb-1">
                                                        <h4 class="text-white font-weight-bold">C4</h4>
                                                        <p class="card-text text-white font-weight-bold">CONDICIÓN NO URGENTE</p>
                                                        <button type="button" class="btn btn-xxs btn-outline-light">ASIGNAR</button>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md">
                                                    <div class="card text-center bg-primary text-white h-100">
                                                      <div class="card-body pt-3 pb-1">
                                                        <h4 class="text-white font-weight-bold">C5</h4>
                                                        <p class="card-text text-white font-weight-bold">CONSULTA GENERAL</p>
                                                        <button type="button" class="btn btn-xxs btn-outline-light">ASIGNAR</button>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--EL ALERT QUE APAREZCA O SE SELECCIONE EN RELACIÓN AL COLOR DE LA CATEGORIZACIÓN-->
                                             <div class="form-row mt-3">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="alert bg-danger text-white" role="alert">
                                                      <i class="fas fa-check"></i>&nbsp; &nbsp; PACIENTE ASIGNADO <strong>GRAVE CON RIESGO VITAL</strong>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="alert bg-naranjo text-white" role="alert">
                                                      <i class="fas fa-check"></i>&nbsp; &nbsp; PACIENTE ASIGNADO <strong>GRAVE SIN RIESGO VITAL</strong>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="alert bg-amarillo text-white" role="alert">
                                                      <i class="fas fa-check"></i>&nbsp; &nbsp;<strong> PACIENTE ASIGNADO CON COMPLEJIDAD MEDIA</strong>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="alert bg-verde text-white" role="alert">
                                                      <i class="fas fa-check"></i>&nbsp; &nbsp; PACIENTE ASIGNADO <strong>CON CONDICIÓN NO URGENTE</strong>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="alert bg-primary text-white" role="alert">
                                                      <i class="fas fa-check"></i>&nbsp; &nbsp; PACIENTE ASIGNADO <strong>CON CONSULTA GENERAL</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EJECUTAR TRATAMIENTO-->
                                <div class="tab-pane fade show " id="enf_tto" role="tabpanel" aria-labelledby="enf_tto_tab">
                                    <div class="row">
                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="enf_urg" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link-aten text-reset active" id="tto_ingreso_tab_2" data-toggle="tab" href="#tto_ingreso_2" role="tab" aria-controls="tto_ingreso_2" aria-selected="true">Tratamientos Administrar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-aten text-reset" id="tto_pendiente_tab" data-toggle="tab" href="#tto_pendiente" role="tab" aria-controls="tto_pendiente" aria-selected="flase">Tratamientos Pendientes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-aten text-reset" id="resumen_tto_tab" data-toggle="tab" href="#resumen_tto" role="tab" aria-controls="resumen_tto" aria-selected="flase">Resumen </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="tto_ingreso_2" role="tabpanel" aria-labelledby="tto_ingreso_tab_2">
                                                    <div class="form-row">
                                                        <div class="col-sm-6 col-md-6 mb-3 m-t-5">
                                                            <h6 class="text-aten"> Tratamientos Administrar</h6>
                                                        </div>
                                                        <div class="col-sm-10 col-md-6 col-lg-6 col-xl-6 d-inline">
                                                            <button type="button" class="btn btn-info-light-c btn-sm btn-agregar-tratamiento d-inline float-right" ><i class="feather icon-plus"></i> Nuevo Tratamiento</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 m-t-5">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <p>
                                                                        <script>
                                                                            var f = new Date();
                                                                            document.write(  + f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear() + " -/" + f.getHours()+ ":" + f.getMinutes() +" min " );
                                                                        </script>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>
                                                                    <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_tto','div_resp_tto','nom_resp_tto',4);">
                                                                        <option  value="0">Seleccione</option>
                                                                        <option  value="1">Juana Perez </option>
                                                                        <option  value="2">Maria la del Barrio</option>
                                                                        <option  value="3">alumna en práctica</option>
                                                                        <option  value="4">Otro/a<option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_resp_tto" style="display:none;">
                                                                    <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Nombre/Rut <i>(Anotar)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Subj.S/C OD" data-seccion="Agudeza Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nom_resp_tto" id="nom_resp_tto"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Indicado Por:</label>
                                                                    <select name="resp_ind_tto"  id="resp_ind_tto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_ind_tto','div_resp_ind_tto','nom_resp_ind_tto',4);">
                                                                        <option  value="0">Seleccione</option>
                                                                        <option  value="1"> Dr. Juana Perez </option>
                                                                        <option  value="2">Dra. Maria la del Barrio</option>
                                                                        <option  value="3">alumna en práctica</option>
                                                                        <option  value="4">Otro/a<option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_resp_ind_tto" style="display:none;">
                                                                    <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Nombre/Rut/indica tto <i>(Anotar)</i></label>
                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nom_resp_ind_tto" id="nom_resp_ind_tto"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Vía de Administración:</label>
                                                                    <select name="via_ttoy" id="via_ttoy"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('via_ttoy','div_via_tto_otroy','via_tto_otroy',8);">
                                                                        <option  value="0">Seleccione</option>
                                                                        <option  value="1"> Oral </option>
                                                                        <option  value="2">IM</option>
                                                                        <option  value="3">EV Directa</option>
                                                                        <option  value="4">EV Suero</option>
                                                                        <option  value="5">Rectal</option>
                                                                        <option  value="6">Subcutánea</option>
                                                                        <option  value="7">Otro/a<option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_via_tto_otro" style="display:none;">
                                                                    <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Otra vía tto <i>(Anotar)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Subj.S/C OD" data-seccion="Agudeza Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="via_tto_otroy" id="via_tto_otroy"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Medicamento</i></label>
                                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_ret_cc_od">Dosis</label>
                                                                    <textarea class="form-control form-control-sm"    rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_od_cc" id="av_ret_od_cc"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_ret_cc_od">Tolerancia/efectos adversos</label>
                                                                    <textarea class="form-control form-control-sm"    rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_od_cc" id="av_ret_od_cc"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="registro_alternativo_paciente" checked="">
                                                                    <label for="registro_alternativo_paciente" class="cr"></label>
                                                                </div>
                                                                <label>Listo</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <hr>
                                                <div id="contenedor_tratamiento">
                                                    <div id="tratamiento" class="row">
                                                    </div>
                                                </div>
                                                <!--PAGINACIÓN-->
                                                <!--Programar paginación para las evoluciones, ejemplo: Se muestran 8 y para ver las otras se usa la paginación-->
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <nav aria-label="...">
                                                            <ul class="pagination justify-content-end">
                                                                <li class="page-item disabled">
                                                                    <a class="page-link">Anterior</a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                <li class="page-item active" aria-current="page">
                                                                    <a class="page-link" href="#">2</a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#">Siguiente</a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tto_pendiente" role="tabpanel" aria-labelledby="tto_pendiente_tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-6 col-md-6 mb-3 m-t-5">
                                                            <H6><i class="feather icon-heart m-l-10"></i> Tratamientos Pendientes</H6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 m-t-5">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <p>
                                                                        <script>
                                                                            var f = new Date();
                                                                            document.write(  + f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear() + " -/" + f.getHours()+ ":" + f.getMinutes() +" min " );
                                                                        </script>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable1</label>
                                                                    <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_tto','div_resp_tto','nom_resp_tto',4);">
                                                                        <option  value="0">Seleccione</option>
                                                                        <option  value="1">Juana Perez </option>
                                                                        <option  value="2">Maria la del Barrio</option>
                                                                        <option  value="3">alumna en práctica</option>
                                                                        <option  value="4">Otro/a<option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_resp_tto" style="display:none;">
                                                                    <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Nombre/Rut <i>(Anotar)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Subj.S/C OD" data-seccion="Agudeza Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nom_resp_tto" id="nom_resp_tto"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Indicado Por:</label>
                                                                    <select name="resp_ind_tto"  id="resp_ind_tto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_ind_tto','div_resp_ind_tto','nom_resp_ind_tto',4);">
                                                                        <option  value="0">Seleccione</option>
                                                                        <option  value="1"> Dr. Juana Perez </option>
                                                                        <option  value="2">Dra. Maria la del Barrio</option>
                                                                        <option  value="3">alumna en práctica</option>
                                                                        <option  value="4">Otro/a<option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_resp_ind_tto" style="display:none;">
                                                                    <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Nombre/Rut/indica tto <i>(Anotar)</i></label>
                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nom_resp_ind_tto" id="nom_resp_ind_tto"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Vía de Administración:</label>
                                                                    <select name="via_ttoy" id="via_ttoy"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('via_ttoy','div_via_tto_otroy','via_tto_otroy',8);">
                                                                        <option  value="0">Seleccione</option>
                                                                        <option  value="1"> Oral </option>
                                                                        <option  value="2">IM</option>
                                                                        <option  value="3">IM</option>
                                                                        <option  value="4">EV Directa</option>
                                                                        <option  value="5">EV Suero</option>
                                                                        <option  value="6">Rectal</option>
                                                                        <option  value="7">Subcutánea</option>
                                                                        <option  value="8">Otro/a<option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_via_tto_otroy" style="display:none;">
                                                                    <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Otra vía tto <i>(Anotar)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Subj.S/C OD" data-seccion="Agudeza Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="via_tto_otroy" id="via_tto_otroy"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Medicamento</i></label>
                                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_ret_cc_od">Dosis</label>
                                                                    <textarea class="form-control form-control-sm"    rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_od_cc" id="av_ret_od_cc"></textarea>
                                                                </div>
                                                            </div>
                                                            {{--  <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_ret_cc_od">Tolerancia/efectos adversos</label>
                                                                    <textarea class="form-control form-control-sm"    rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_od_cc" id="av_ret_od_cc"></textarea>
                                                                </div>
                                                            </div>  --}}
                                                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="registro_alternativo_paciente" checked="">
                                                                    <label for="registro_alternativo_paciente" class="cr"></label>
                                                                </div>
                                                                <label>Pendiente</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade " id="resumen_tto" role="tabpanel" aria-labelledby="resumen_tto_tab">
                                                    <h6>Resumen de tratamiento y control Enfermería</h6>
                                                    <div class="col-sm-12 col-md-12 m-t-20">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Resumen de Control y tratamiento enfermería</i></label>
                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="av_ret_cc_od">Observaciones</label>
                                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_od_cc" id="av_ret_od_cc"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EJECUTAR PROCEDIMIENTO-->
                                <div class="tab-pane fade show " id="enf_proc" role="tabpanel" aria-labelledby="enf_proc_tab">
                                    <div class="form-row mx-2">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten d-inline">Procedimientos</h6>
                                            <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-procedimiento d-inline float-right mb-2" ><i class="feather icon-plus"></i> Nuevo procedimiento</button>
                                         </div>
                                    </div>
                                    <div class="border px-2 pt-3 pb-1 mb-4 rounded shadow mx-2">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="av_subj_sc_od">Responsable</label>
                                                    <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm">
                                                        <option  value="0">Seleccione</option>
                                                        <option  value="1">Juana Perez </option>
                                                        <option  value="2">Maria la del Barrio</option>
                                                        <option  value="3">alumna en práctica</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="av_subj_sc_od">Indicado por:</label>
                                                    <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm">
                                                        <option  value="0">Seleccione</option>
                                                        <option  value="1">Juana Perez </option>
                                                        <option  value="2">Maria la del Barrio</option>
                                                        <option  value="3">alumna en práctica</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="proc_enf_urg">Procedimiento</label>
                                                    <select name="proc_enf_urg"  id="proc_enf_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('proc_enf_urg','div_proc_enf_urg',obs_proc_enf_urg',7);">
                                                        <option  value="0">Seleccione</option>
                                                        <option  value="1">Reanimación</option>
                                                        <option  value="2">Nebulización</option>
                                                        <option  value="3">Curación</option>
                                                        <option  value="4">Sonda Folley</option>
                                                        <option  value="5">Sonda Nasogástrica</option>
                                                        <option  value="6">Inmovilización Fx.</option>
                                                        <option  value="7">Otro/a<option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="procedimiento_1">
                                                    <label class="custom-control-label" for="procedimiento_1">Finalizado</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-11 col-xxxl-11">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm t-red" for="obs_proc_enf_urg">Observaciones</label>
                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_proc_enf_urg" id="obs_proc_enf_urg"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1 col-xxxl-1">
                                                <button type="button" class="btn btn-icon btn-danger-light-c"><i class="feather icon-x"></i></button>
                                                <button type="button" class="btn btn-icon btn-info-light-c"><i class="feather icon-save"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="contenedor_procedimiento">
                                        <div id="procedimiento" class="row">
                                        </div>
                                    </div>
                                    <!--PAGINACIÓN-->
                                    <!--Programar paginación para las evoluciones, ejemplo: Se muestran 8 y para ver las otras se usa la paginación-->
                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <nav aria-label="...">
                                                <ul class="pagination justify-content-end">
                                                    <li class="page-item disabled">
                                                        <a class="page-link">Anterior</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item active" aria-current="page">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Siguiente</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <!--EJECUTAR CURACIONES-->
                                <div class="tab-pane fade show " id="enf_cura" role="tabpanel" aria-labelledby="enf_cura_tab">
                                    <div class="form-row mb-3 m-t-15">
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-1">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active" id="cur_plana-tab" data-toggle="tab" href="#cur_plana" role="tab" aria-controls="cur_plana" aria-selected="true">Curaciones Planas</a>
                                                <a class="nav-link-aten text-reset" id="cur_lpp-tab" data-toggle="tab" href="#cur_lpp" role="tab" aria-controls="cur_lpp" aria-selected="false">Curación.LPP</a>
                                                <a class="nav-link-aten text-reset" id="cur_pd-tab" data-toggle="tab" href="#cur_pd" role="tab" aria-controls="cur_pd" aria-selected="false">Píe Diabético</a>
                                                <a class="nav-link-aten text-reset" id="cur_quem-tab" data-toggle="tab" href="#cur_quem" role="tab" aria-controls="cur_quem" aria-selected="false">Quemados</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9 col-md-9 col-lg-9 col-xl-9 col-xxl-11">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <!--CURACION PLANA-->
                                                <div class="tab-pane fade show active" id="cur_plana" role="tabpanel" aria-labelledby="cur_plana-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <h6 class="t-aten">Curación Plana</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-10" id="enf_urgencia" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="val_hda-tab" data-toggle="tab" href="#val_hda" role="tab" aria-controls="val_hda" aria-selected="true">Valoración</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="cur_hda-tab" data-toggle="tab" href="#cur_hda" role="tab" aria-controls="cur_hda" aria-selected="true">Curación</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                            <div class="tab-content" id="Curación de lesiones planas">
                                                                <div class="tab-pane fade show active" id="val_hda" role="tabpanel" aria-labelledby="val_hda-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="alert alert-warning" role="alert">
                                                                                Si desea ocupar el item de observaciones debe necesariamente elegir otra opción para sumar el puntaje.
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_asp">Aspecto</label>
                                                                                <select name="cp_asp" id="cp_asp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_asp','div_cp_asp','obs_cp_asp',6);">
                                                                                    <option selected  value="0">Seleccione</option>
                                                                                    <option value="1">Erimatoso </option>
                                                                                    <option value="2">Enrojecido</option>
                                                                                    <option value="3">Amarillo pálido</option>
                                                                                    <option value="4">Necrótico </option>
                                                                                    <option value="6">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_asp" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_asp">Obs. <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_asp" id="obs_cp_asp"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                            <div class="form-group">
                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-block"onclick="curac_hda();"> <i class="feather icon-plus"></i> Guía</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_me">Mayor Extensión</label>
                                                                                <select name="cp_me" id="cp_me" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_me','div_cp_me','obs_cp_me',6);">
                                                                                    <option selected  value="0">Seleccione</option>
                                                                                    <option value="1">0-1 cm</option>
                                                                                    <option value="2">1-3 cm</option>
                                                                                    <option value="3">3-6 cm</option>
                                                                                    <option value="4">>6 cm</option>
                                                                                    <option value="6">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_me" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_me">Obs. <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_me" id="obs_cp_me"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_pro">Profundidad</label>
                                                                                <select name="cp_pro" id="cp_pro" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_pro','div_cp_pro','obs_cp_pro1',6);">
                                                                                    <option selected  value="0">Seleccione</option>
                                                                                    <option value="1">0 </option>
                                                                                    <option value="2">0-1 cm</option>
                                                                                    <option value="3">1-2 cm</option>
                                                                                    <option value="4">2-3 cm</option>
                                                                                    <option value="5"> >3 cm </option>
                                                                                    <option value="6">Otros</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_pro" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_pro">Obs. <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_pro" id="obs_cp_pro"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_ecant">Exudado-Cantidad</label>
                                                                                <select name="cp_ecant" id="cp_ecant" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_ecant','div_cp_ecant','obs_cp_ecant',6);">
                                                                                    <option selected  value="0">Seleccione</option>
                                                                                    <option value="1">Ausente</option>
                                                                                    <option value="2">Escaso</option>
                                                                                    <option value="3">Moderado</option>
                                                                                    <option value="4">Abundante</option>
                                                                                    <option value="6">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_ecant" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_ecant">Obs. <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_ecant" id="obs_cp_ecant"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_ecal">Exudado-Calidad</label>
                                                                                <select name="cp_ecal" id="cp_ecal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_ecal','div_cp_ecal','obs_cp_ecal',6);">
                                                                                    <option selected  value="0">Seleccione</option>
                                                                                    <option value="1">Sin exudado </option>
                                                                                    <option value="2">Seroso</option>
                                                                                    <option value="3">Turbio</option>
                                                                                    <option value="4">Purulento </option>
                                                                                    <option value="6">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_ecal" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_ecal">Obs. <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_ecal" id="obs_cp_ecal"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_tn">Tejido esfacelado o necrótico</label>
                                                                                <select name="cp_tn" id="cp_tn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_tn','div_cp_tn','obs_cp_tn',6);">
                                                                                    <option selected  value="0">Seleccione</option>
                                                                                    <option value="1">Ausente</option>
                                                                                    <option value="2"><25 %</option>
                                                                                    <option value="3">25 - 50 %</option>
                                                                                    <option value="4">>50 - 75 %</option>
                                                                                    <option value="5">>75 %</option>
                                                                                    <option value="6">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_tn" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_tn">Obs. <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_tn" id="obs_cp_tn"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_tg">Tejido granulatorio</label>
                                                                                <select name="cp_tg" id="cp_tg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_tg','div_cp_tg','obs_cp_tg',6);">
                                                                                    <option selected  value="0">Seleccione</option>
                                                                                    <option value="1">100- 75 % </option>
                                                                                    <option value="2"><75 - 50 %</option>
                                                                                    <option value="3"><50 - 25 %</option>
                                                                                    <option value="4"><25 %</option>
                                                                                    <option value="6">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_tg" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_tg">Obs. <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_tg" id="obs_cp_tg"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_ed">Edema</label>
                                                                                <select name="cp_ed" id="cp_ed" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_ed','div_cp_ed','obs_cp_ed',6);">
                                                                                    <option selected  value="0">Seleccione</option>
                                                                                    <option value="1">Ausente </option>
                                                                                    <option value="2">+</option>
                                                                                    <option value="3">++</option>
                                                                                    <option value="4">+++</option>
                                                                                    <option value="6">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_ed" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_ed">Obs.<i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_ed" id="obs_cp_ed"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_dol">Dolor</label>
                                                                                <select name="cp_dol" id="cp_dol" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_dol','div_cp_dol','obs_cp_dol',6);">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">0 - 1</option>
                                                                                    <option value="2">2 - 3</option>
                                                                                    <option value="3">4 - 6</option>
                                                                                    <option value="4">7 - 10</option>
                                                                                    <option value="6">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_dol" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_dol">Obs. <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_dol" id="obs_cp_dol"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_pielc">Piel circundante</label>
                                                                                <select name="cp_pielc" id="cp_pielc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_pielc','div_cp_pielc','obs_cp_pielc',6);">
                                                                                    <option selected  value="0">Seleccione</option>
                                                                                    <option value="1">Sana </option>
                                                                                    <option value="2">Descamada</option>
                                                                                    <option value="3">Erimatosa</option>
                                                                                    <option value="4">Macerada</option>
                                                                                    <option value="6">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_pielc" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_pielc">Obs. <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_pielc" id="obs_cp_pielc"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="bh_dren_1">P.Total</label>
                                                                                <input type="number" class="form-control form-control-sm" name="ptos_tot_ev" id="ptos_tot_ev">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <button type="button" class="btn btn-outline-primary btn-sm  btn-block"onclick="cur_guia();"> <i class="feather icon-plus"></i> Guía</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm" for="obs_cp_gral">Obs. Valoración Herida</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=1;" name="obs_cp_gral" id="obs_cp_gral"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm" for="obs_orin">Obs. Curación Plana</label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_orin" id="obs_orin"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade show" id="cur_hda" role="tabpanel" aria-labelledby="cur_hda-tab">
                                                                    @include('general.secciones_ficha.urgencia.curacion_lpp')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--CURACION LPP-->
                                                <div class="tab-pane fade " id="cur_lpp" role="tabpanel" aria-labelledby="cur_lpp-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <h6 class="t-aten">Curación LPP</h6>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-3" id="enf_urgencia" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active" id="val_lpp-tab" data-toggle="tab" href="#val_lpp" role="tab" aria-controls="val_lpp" aria-selected="true">Valoración</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="cur1_lpp-tab" data-toggle="tab" href="#cur1_lpp" role="tab" aria-controls="cur1_lpp" aria-selected="true">Curación</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                <div class="tab-content" id="Curación de lesiones planas">
                                                                    <div class="tab-pane fade show active" id="val_lpp" role="tabpanel" aria-labelledby="val_lpp-tab">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="bh_dren_1">Localización</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Redón </option>
                                                                                        <option value="2">Torácico</option>
                                                                                        <option value="3">Teja</option>
                                                                                        <option value="4">Penrose</option>
                                                                                        <option value="5">Kher</option>
                                                                                        <option value="6">Jackson-Pratt</option>
                                                                                        <option value="7">Pezzer</option>
                                                                                        <option value="8">Nelaton</option>
                                                                                        <option value="9">Drenaje percutáneo Rx</option>
                                                                                        <option value="10">Tubo silicona Sarotoga</option>
                                                                                        <option value="11">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="bh_dren_1">Diámetro</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected  value="0">Seleccione</option>
                                                                                        <option value="1">Redón </option>
                                                                                        <option value="2">Torácico</option>
                                                                                        <option value="3">Teja</option>
                                                                                        <option value="4">Penrose</option>
                                                                                        <option value="5">Kher</option>
                                                                                        <option value="6">Jackson-Pratt</option>
                                                                                        <option value="7">Pezzer</option>
                                                                                        <option value="8">Nelaton</option>
                                                                                        <option value="9">Drenaje percutáneo Rx</option>
                                                                                        <option value="10">Tubo silicona Sarotoga</option>
                                                                                        <option value="11">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="bh_dren_1">Profundidad</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected  value="0">Seleccione</option>
                                                                                        <option value="1">Redón </option>
                                                                                        <option value="2">Torácico</option>
                                                                                        <option value="3">Teja</option>
                                                                                        <option value="4">Penrose</option>
                                                                                        <option value="5">Kher</option>
                                                                                        <option value="6">Jackson-Pratt</option>
                                                                                        <option value="7">Pezzer</option>
                                                                                        <option value="8">Nelaton</option>
                                                                                        <option value="9">Drenaje percutáneo Rx</option>
                                                                                        <option value="10">Tubo silicona Sarotoga</option>
                                                                                        <option value="11">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="bh_dren_1">Infección</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected  value="0">Seleccione</option>
                                                                                        <option value="1">Redón </option>
                                                                                        <option value="2">Torácico</option>
                                                                                        <option value="3">Teja</option>
                                                                                        <option value="4">Penrose</option>
                                                                                        <option value="5">Kher</option>
                                                                                        <option value="6">Jackson-Pratt</option>
                                                                                        <option value="7">Pezzer</option>
                                                                                        <option value="8">Nelaton</option>
                                                                                        <option value="9">Drenaje percutáneo Rx</option>
                                                                                        <option value="10">Tubo silicona Sarotoga</option>
                                                                                        <option value="11">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <label class="floating-label-activo-sm" for="bh_dren_1">Tipo Curación</label>
                                                                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                    <option selected  value="0">Seleccione</option>
                                                                                    <option value="1">Redón </option>
                                                                                    <option value="2">Torácico</option>
                                                                                    <option value="3">Teja</option>
                                                                                    <option value="4">Penrose</option>
                                                                                    <option value="5">Kher</option>
                                                                                    <option value="6">Jackson-Pratt</option>
                                                                                    <option value="7">Pezzer</option>
                                                                                    <option value="8">Nelaton</option>
                                                                                    <option value="9">Drenaje percutáneo Rx</option>
                                                                                    <option value="10">Tubo silicona Sarotoga</option>
                                                                                    <option value="11">Otros</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="obs_orin">Obs. Curación LPP1</label>
                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_orin" id="obs_orin"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{--  <div class="form-row">
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="cp_asp">Aspecto</label>
                                                                                    <select name="cp_asp" id="cp_asp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_asp','div_cp_asp','obs_cp_asp',6);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Erimatoso </option>
                                                                                        <option value="2">Enrojecido</option>
                                                                                        <option value="3">Amarillo pálido</option>
                                                                                        <option value="4">Necrótico </option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_asp" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_cp_asp">Obs.<i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_asp" id="obs_cp_asp"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <button type="button" class="btn btn-success btn-sm  btn-block"onclick="curac_hda();"> <i class="fa fa-plus"></i> Guía</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="cp_me">Mayor Extensión</label>
                                                                                    <select name="cp_me" id="cp_me" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_me','div_cp_me','obs_cp_me',6);">
                                                                                        <option value="0">Seleccione </option>
                                                                                        <option selected  value="1">0-1 cm</option>
                                                                                        <option value="2">1-3 cm</option>
                                                                                        <option value="3">3-6 cm</option>
                                                                                        <option value="4">>6 cm</option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_me" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_cp_me">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_me" id="obs_cp_me"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="cp_pro">Profundidad</label>
                                                                                    <select name="cp_pro" id="cp_pro" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_pro','div_cp_pro','obs_cp_pro1',6);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">0 </option>
                                                                                        <option value="2">0-1 cm</option>
                                                                                        <option value="3">1-2 cm</option>
                                                                                        <option value="4">2-3 cm</option>
                                                                                        <option value="5"> >3 cm </option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_pro" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_cp_pro">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_pro" id="obs_cp_pro"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="cp_ecant">Exudado-Cantidad</label>
                                                                                    <select name="cp_ecant" id="cp_ecant" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_ecant','div_cp_ecant','obs_cp_ecant',6);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Ausente</option>
                                                                                        <option value="2">Escaso</option>
                                                                                        <option value="3">Moderado</option>
                                                                                        <option value="4">Abundante</option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_ecant" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_cp_ecant">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_ecant" id="obs_cp_ecant"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="cp_ecal">Exudado-Calidad</label>
                                                                                    <select name="cp_ecal" id="cp_ecal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_ecal','div_cp_ecal','obs_cp_ecal',6);">
                                                                                        <option value="0">Seleccione </option>
                                                                                        <option selected  value="1">Sin exudado </option>
                                                                                        <option value="2">Seroso</option>
                                                                                        <option value="3">Turbio</option>
                                                                                        <option value="4">Purulento </option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_ecal" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_cp_ecal">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_ecal" id="obs_cp_ecal"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="cp_tn">Tejido esfacelado o necrótico</label>
                                                                                    <select name="cp_tn" id="cp_tn" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_tn','div_cp_tn','obs_cp_tn',6);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Ausente</option>
                                                                                        <option value="2"><25 %</option>
                                                                                        <option value="3">25 - 50 %</option>
                                                                                        <option value="4">>50 - 75 %</option>
                                                                                        <option value="5">>75 %</option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_tn" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_cp_tn">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_tn" id="obs_cp_tn"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="cp_tg">Tejido granulatorio</label>
                                                                                    <select name="cp_tg" id="cp_tg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_tg','div_cp_tg','obs_cp_tg',6);">
                                                                                        <option selected  value="0">100- 75 % </option>
                                                                                        <option value="2"><75 - 50 %</option>
                                                                                        <option value="3"><50 - 25 %</option>
                                                                                        <option value="4"><25 %</option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_tg" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_cp_tg">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_tg" id="obs_cp_tg"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="cp_ed">Edema</label>
                                                                                    <select name="cp_ed" id="cp_ed" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_ed','div_cp_ed','obs_cp_ed',6);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Ausente </option>
                                                                                        <option value="2">+</option>
                                                                                        <option value="3">++</option>
                                                                                        <option value="4">+++</option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_ed" style="display:none;">
                                                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_ed">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_ed" id="obs_cp_ed"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="cp_dol">Dolor</label>
                                                                                    <select name="cp_dol" id="cp_dol" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_dol','div_cp_dol','obs_cp_dol',6);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">0 - 1</option>
                                                                                        <option value="2">2 - 3</option>
                                                                                        <option value="3">4 - 6</option>
                                                                                        <option value="4">7 - 10</option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_dol" style="display:none;">
                                                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_dol">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_dol" id="obs_cp_dol"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="cp_pielc">Piel circundante</label>
                                                                                    <select name="cp_pielc" id="cp_pielc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_pielc','div_cp_pielc','obs_cp_pielc',6);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Sana </option>
                                                                                        <option value="2">Descamada</option>
                                                                                        <option value="3">Erimatosa</option>
                                                                                        <option value="4">Macerada</option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_pielc" style="display:none;">
                                                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_pielc">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_pielc" id="obs_cp_pielc"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">P.Total</label>
                                                                                    <input type="number" class="form-control form-control-sm" name="ptos_tot_ev" id="ptos_tot_ev">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                <div class="form-group">
                                                                                    <button type="button" class="btn btn-success btn-sm btn-block"onclick="cur_guia();"> <i class="fa fa-plus"></i> Guía</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="obs_cp_gral">Observaciones Valoración Herida</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=3;" name="obs_cp_gral" id="obs_cp_gral"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="obs_orin">Observaciones Curación Plana</label>
                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_orin" id="obs_orin"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>  --}}
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="cur1_lpp" role="tabpanel" aria-labelledby="cur1_lpp-tab">
                                                                        @include('general.secciones_ficha.urgencia.curacion_heridas')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--  <div class="form-row">
                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">Localización</label>
                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                        <option selected value="0">Seleccione </option>
                                                                        <option value="1">Redón </option>
                                                                        <option value="2">Torácico</option>
                                                                        <option value="3">Teja</option>
                                                                        <option value="4">Penrose</option>
                                                                        <option value="5">Kher</option>
                                                                        <option value="6">Jackson-Pratt</option>
                                                                        <option value="7">Pezzer</option>
                                                                        <option value="8">Nelaton</option>
                                                                        <option value="9">Drenaje percutáneo Rx</option>
                                                                        <option value="10">Tubo silicona Sarotoga</option>
                                                                        <option value="11">Otros</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                    <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">Diámetro</label>
                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                        <option selected value="0">Seleccione </option>
                                                                        <option value="1">Redón </option>
                                                                        <option value="2">Torácico</option>
                                                                        <option value="3">Teja</option>
                                                                        <option value="4">Penrose</option>
                                                                        <option value="5">Kher</option>
                                                                        <option value="6">Jackson-Pratt</option>
                                                                        <option value="7">Pezzer</option>
                                                                        <option value="8">Nelaton</option>
                                                                        <option value="9">Drenaje percutáneo Rx</option>
                                                                        <option value="10">Tubo silicona Sarotoga</option>
                                                                        <option value="11">Otros</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                    <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">Profundidad</label>
                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                        <option selected value="0">Seleccione </option>
                                                                        <option value="1">Redón </option>
                                                                        <option value="2">Torácico</option>
                                                                        <option value="3">Teja</option>
                                                                        <option value="4">Penrose</option>
                                                                        <option value="5">Kher</option>
                                                                        <option value="6">Jackson-Pratt</option>
                                                                        <option value="7">Pezzer</option>
                                                                        <option value="8">Nelaton</option>
                                                                        <option value="9">Drenaje percutáneo Rx</option>
                                                                        <option value="10">Tubo silicona Sarotoga</option>
                                                                        <option value="11">Otros</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                    <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">Infección</label>
                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                        <option selected value="0">Seleccione </option>
                                                                        <option value="1">Redón </option>
                                                                        <option value="2">Torácico</option>
                                                                        <option value="3">Teja</option>
                                                                        <option value="4">Penrose</option>
                                                                        <option value="5">Kher</option>
                                                                        <option value="6">Jackson-Pratt</option>
                                                                        <option value="7">Pezzer</option>
                                                                        <option value="8">Nelaton</option>
                                                                        <option value="9">Drenaje percutáneo Rx</option>
                                                                        <option value="10">Tubo silicona Sarotoga</option>
                                                                        <option value="11">Otros</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                    <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm t-red" for="bh_dren_1">Tipo Curación</label>
                                                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                    <option selected value="0">Seleccione </option>
                                                                    <option value="1">Redón </option>
                                                                    <option value="2">Torácico</option>
                                                                    <option value="3">Teja</option>
                                                                    <option value="4">Penrose</option>
                                                                    <option value="5">Kher</option>
                                                                    <option value="6">Jackson-Pratt</option>
                                                                    <option value="7">Pezzer</option>
                                                                    <option value="8">Nelaton</option>
                                                                    <option value="9">Drenaje percutáneo Rx</option>
                                                                    <option value="10">Tubo silicona Sarotoga</option>
                                                                    <option value="11">Otros</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" for="obs_orin">Obs. Curación LPP</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_orin" id="obs_orin"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>  --}}
                                                    </div>
                                                </div>
                                                <!--PIE DIABÉTICO-->
                                                <div class="tab-pane fade" id="cur_pd" role="tabpanel" aria-labelledby="cur_pd-tab">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                <div class="form-group">
                                                                   <h6 class="t-aten">Curación Pié Diabético</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-3" id="enf_urgencia" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active" id="val_pie-tab" data-toggle="tab" href="#val_pie" role="tab" aria-controls="val_pie" aria-selected="true">Valoración</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="curac_pie-tab" data-toggle="tab" href="#curac_pie" role="tab" aria-controls="curac_pie" aria-selected="true">Curación</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="alert alert-warning" role="alert">
                                                                    Si desea ocupar el item de observaciones debe necesariamente elegir otra opción para sumar el puntaje.
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                <div class="tab-content" id="pie_diab">
                                                                    <div class="tab-pane fade show active" id="val_pie" role="tabpanel" aria-labelledby="val_pie-tab">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">Aspecto</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Erimatoso </option>
                                                                                        <option value="2">Enrojecido</option>
                                                                                        <option value="3">Amarillo pálido</option>
                                                                                        <option value="4">Necrótico grisáceo</option>
                                                                                        <option value="5">Necrótico negruzco</option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm  btn-block"onclick="p_diab();"> <i class="feather icon-plus"></i> Guía</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">Mayor Extensión</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">0-1 cm</option>
                                                                                        <option value="2">1-3 cm</option>
                                                                                        <option value="3">3-6 cm</option>
                                                                                        <option value="4">6-10 cm</option>
                                                                                        <option value="5">>10 cm</option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">Profundidad</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="1">Seleccione </option>
                                                                                        <option value="1">0 </option>
                                                                                        <option value="2">0-1 cm</option>
                                                                                        <option value="3">1-2 cm</option>
                                                                                        <option value="4">2-3 cm</option>
                                                                                        <option value="5"> >3 cm </option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">Exudado-Cantidad</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Ausente</option>
                                                                                        <option value="2">Escaso</option>
                                                                                        <option value="3">Moderado</option>
                                                                                        <option value="4">Abundante</option>
                                                                                        <option value="5">Muy abundante</option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                  
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="bh_dren_1">Exudado-Calidad</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="1">Seleccione </option>
                                                                                        <option value="1">Sin exudado </option>
                                                                                        <option value="2">Seroso</option>
                                                                                        <option value="3">Turbio</option>
                                                                                        <option value="4">Purulento </option>
                                                                                        <option value="5">Purulento gangrenoso</option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="bh_dren_1">Tejido esfacelado o necrótico</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Ausente</option>
                                                                                        <option value="2"><25 %</option>
                                                                                        <option value="3">25 - 50 %</option>
                                                                                        <option value="4">>50 - 75 %</option>
                                                                                        <option value="5">>75 %</option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm t-red" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                           <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="bh_dren_1">Tejido granulatorio</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="1">Seleccione </option>
                                                                                        <option value="1">100 % </option>
                                                                                        <option value="2">99 - 75 %</option>
                                                                                        <option value="3"><75 - 50 %</option>
                                                                                        <option value="4"><50 - 25 %</option>
                                                                                        <option value="5"><25 %</option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="bh_dren_1">Edema</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Ausente </option>
                                                                                        <option value="2">+</option>
                                                                                        <option value="3">++</option>
                                                                                        <option value="4">+++</option>
                                                                                        <option value="5">++++</option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                           <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">Dolor</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">0 - 1</option>
                                                                                        <option value="2">2 - 3</option>
                                                                                        <option value="3">4 - 6</option>
                                                                                        <option value="4">7 - 8</option>
                                                                                        <option value="5">9 - 10</option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="bh_dren_1">Piel circundante</label>
                                                                                    <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Sana </option>
                                                                                        <option value="2">Descamada</option>
                                                                                        <option value="3">Erimatosa</option>
                                                                                        <option value="4">Macerada</option>
                                                                                        <option value="5">Gangrena</option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_bh_dren_1" style="display:none;">
                                                                                    <label class="floating-label-activo-sm" for="obs_bh_dren_1">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bh_dren_1" id="obs_bh_dren_1"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="bh_dren_1">P.Total</label>
                                                                                    <input type="number" class="form-control form-control-sm" name="ptos_tot_ev" id="ptos_tot_ev">
                                                                                </div>
                                                                            </div>
                                                                           <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-1">
                                                                                <button type="button" class="btn btn-outline-primary btn-sm  btn-block"onclick="g_pdiab();"> <i class="feather icon-plus"></i> Guía</button>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="obs_orin">Obs. Curación Pié Diabético</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=3;" name="obs_orin" id="obs_orin"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <!--ANTECEDENTES RELEVANTES-->
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten mt-2 mb-2">ANTECEDENTES RELEVANTES</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                        <label class="floating-label-activo-sm" for="pat_prop">Enfermedad actual</label>
                                                                                        <select class="form-control form-control-sm" name="pat_prop" id="pat_prop" multiple="multiple">
                                                                                            <option value="1">Hipertensión</option>
                                                                                            <option value="2">Diabetes</option>
                                                                                            <option value="3">Hipercolesterolemia</option>
                                                                                            <option value="4">Hiperlipidemia</option>
                                                                                            <option value="5">Cancer</option>
                                                                                            <option value="6">Obesidad</option>
                                                                                            <option value="7">Hipertiroidismo</option>
                                                                                            <option value="8">Hipotiroidismo</option>
                                                                                            <option value="9">Cirugías</option>
                                                                                            <option value="10">Inmunodepresión</option>
                                                                                            <option value="11">Tabaquismo</option>
                                                                                            <option value="12">Insuficiencia venosa</option>
                                                                                            <option value="13">Insuficiencia arterial</option>
                                                                                            <option value="14">Sustancias Ilícitas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                        <label class="floating-label-activo-sm" for="sint_act">Medicamentos / Tratamientos</label>
                                                                                        <select class="form-control form-control-sm" name="sint_act" id="sint_act" multiple="multiple">
                                                                                            <option value="1">Hipoglicemiantes</option>
                                                                                            <option value="2">Antibióticos</option>
                                                                                            <option value="3">Corticosteroides</option>
                                                                                            <option value="4">Tratamiento Anticoagulante</option>
                                                                                            <option value="5">Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                                                                        <label class="floating-label-activo-sm" for="ot_pat_act">Resultado de exámenes</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="curac_pie" role="tabpanel" aria-labelledby="curac_pie-tab">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="cp_cult">Toma de Cultivo</label>
                                                                                    <select name="cp_cult" id="cp_cult" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_cult','div_cp_cult','obs_cp_cult',6);">
                                                                                        <option selected value="0">Seleccione</option>
                                                                                        <option value="1">No</option>
                                                                                        <option value="2">Si</option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_cult" style="display:none;">
                                                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_cult">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_cult" id="obs_cp_cult"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="cp_td">Tipos de debridamiento</label>
                                                                                    <select name="cp_td" id="cp_td" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_td','div_cp_td','obs_cp_td',8);">
                                                                                        <option selected value="0">Seleccione </option>
                                                                                        <option value="1">Quirúrgico </option>
                                                                                        <option value="2">Cortante</option>
                                                                                        <option value="3">Enzimático</option>
                                                                                        <option value="4">Autolítico</option>
                                                                                        <option value="5">Osmótico</option>
                                                                                        <option value="6">Larval</option>
                                                                                        <option value="7">Mecánico</option>
                                                                                        <option value="8">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_td" style="display:none;">
                                                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_td">Otras <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_td" id="obs_cp_td"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="cp_duch">Duchoterapia</label>
                                                                                    <select name="cp_duch" id="cp_duch" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_duch','div_cp_duch','obs_cp_duch',3);">
                                                                                        <option selected value="0">Seleccione</option>
                                                                                        <option value="1">Si</option>
                                                                                        <option value="2">No</option>
                                                                                        <option value="3">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_duch" style="display:none;">
                                                                                    <label class="floating-label-activo-sm t-red" for="obs_cp_duch">Observaciones <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_duch" id="obs_cp_duch"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                 <div class="form-row mt-2">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten">Tipo de Antisépticos y materiales usados</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="floating-label-activo-sm" for="pie_ant">Tipo de antisepticos</label>
                                                                                        <select class="form-control form-control-sm" name="pie_ant" id="pie_ant" multiple="multiple">
                                                                                            <option value="1">Solución fisiológica</option>
                                                                                            <option value="2">Bialcohol</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="floating-label-activo-sm" for="tpo_aposc">Tipo de apósitos y materiales</label>
                                                                                        <select class="form-control form-control-sm" name="tpo_aposc" id="tpo_aposc" multiple="multiple">
                                                                                            <option value="1">Apósitos Pasivos</option>
                                                                                            <option value="2">Apósito Interactivo (Espuma Hidrofílica)</option>
                                                                                            <option value="3">Apósito Bioactivo (Alginato)</option>
                                                                                            <option value="4">Apósitos Mixtos</option>
                                                                                            <option value="5">Vasocontrictores</option>
                                                                                            <option value="6">Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <label class="floating-label-activo-sm" for="antisep">Observaciones</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
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
                                                <!--QUEMADOS-->
                                                <div class="tab-pane fade" id="cur_quem" role="tabpanel" aria-labelledby="cur_quem-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <h6 class="t-aten">Curación Quemados</h6>
                                                            </div>
                                                            <ul class="nav nav-tabs-aten nav-fill mb-2" id="enf_urgencia" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="val_quem-tab" data-toggle="tab" href="#val_quem" role="tab" aria-controls="val_quem" aria-selected="true">Valoración</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="curac_quem-tab" data-toggle="tab" href="#curac_quem" role="tab" aria-controls="curac_quem" aria-selected="true">Curación</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="quemados">
                                                                <div class="tab-pane fade show active" id="val_quem" role="tabpanel" aria-labelledby="val_quem-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="qmsupqm">Superficie quemada</label>
                                                                                <select name="qmsupqm" id="qmsupqm" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('qmsupqm','div_qmsupqm','obs_qmsupqm',11);">
                                                                                    <option selected value="0">Seleccione </option>
                                                                                    <option value="1">< 9% </option>
                                                                                    <option value="2">9-18%</option>
                                                                                    <option value="3"> >18%</option>
                                                                                    <option value="11">Otros</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_qmsupqm" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_qmsupqm">Otras <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_qmsupqm" id="obs_qmsupqm"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-block"onclick="quem();"> <i class="feather icon-plus"></i> Guía</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="qmdr">Grado quemadura</label>
                                                                                <select name="qmdr" id="qmdr" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('qmdr','div_qmdr','obs_qmdr',11);">
                                                                                    <option selected value="0">Seleccione </option>
                                                                                    <option value="1">Primer grado</option>
                                                                                    <option value="2">Segundo grado</option>
                                                                                    <option value="3">Tercer grado</option>
                                                                                    <option value="4">Mixta</option>
                                                                                    <option value="11">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_qmdr" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_qmdr">Observaciones <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_qmdr" id="obs_qmdr"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="bh_dren_1">Infección</label>
                                                                                <select name="bh_dren_1" id="bh_dren_1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bh_dren_1','div_bh_dren_1','obs_bh_dren_1',11);">
                                                                                    <option selected value="0">Seleccione </option>
                                                                                    <option value="1">No</option>
                                                                                    <option value="2">Si</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="qm_tq">Tipo quemadura</label>
                                                                                <select name="qm_tq" id="qm_tq" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('qm_tq','div_qm_tq','obs_qm_tq',11);">
                                                                                    <option selected value="0">Seleccione </option>
                                                                                    <option value="1">Solar</option>
                                                                                    <option value="2">Por Liquidos</option>
                                                                                    <option value="3">Vapores y gases</option>
                                                                                    <option value="4">Sust. Químicas</option>
                                                                                    <option value="5">Eléctricidad</option>
                                                                                    <option value="6">Fuego directo</option>
                                                                                    <option value="11">Otros</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_qm_tq" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_qm_tq">Otra causa <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_qm_tq" id="obs_qm_tq"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm" for="qm_tc">Tipo curación</label>
                                                                                <select name="qm_tc" id="qm_tc" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('qm_tc','div_qm_tc','obs_qm_tc',11);">
                                                                                    <option selected value="0">Seleccione </option>
                                                                                    <option value="1">Plana superficial</option>
                                                                                    <option value="2">Con remoción de tejidos</option>
                                                                                    <option value="3">Aseo quirúrgico</option>
                                                                                    <option value="11">Otros</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_qm_tc" style="display:none;">
                                                                                <label class="floating-label-activo-sm" for="obs_bh_dren_1">Observaciones <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_qm_tc" id="obs_qm_tc"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <!--ANTECEDENTES RELEVANTES-->
                                                                            <div class="form-row mt-2">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">Antecedentes relevantes</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-6 col-xxl-4">
                                                                                    <label class="floating-label-activo-sm" for="pat_propq">Enfermedad actual</label>
                                                                                    <select class="form-control form-control-sm" name="pat_propq" id="pat_propq" multiple="multiple">
                                                                                        <option value="1">Hipertensión</option>
                                                                                        <option value="2">Diabetes</option>
                                                                                        <option value="3">Hipercolesterolemia</option>
                                                                                        <option value="4">Hiperlipidemia</option>
                                                                                        <option value="5">Cáncer</option>
                                                                                        <option value="6">Obesidad</option>
                                                                                        <option value="7">Hipertiroidismo</option>
                                                                                        <option value="8">Hipotiroidismo</option>
                                                                                        <option value="9">Cirugías</option>
                                                                                        <option value="10">Inmunodepresión</option>
                                                                                        <option value="11">Tabaquismo</option>
                                                                                        <option value="12">Insuficiencia venosa</option>
                                                                                        <option value="13">Insuficiencia arterial</option>
                                                                                        <option value="14">Sustancias Ilícitas</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-4">
                                                                                    <label class="floating-label-activo-sm" for="med_quem">Medicamentos / Tratamientos</label>
                                                                                    <select class="form-control form-control-sm" name="med_quem" id="med_quem" multiple="multiple">
                                                                                        <option value="1">Hipoglicemiantes</option>
                                                                                        <option value="2">Antibióticos</option>
                                                                                        <option value="3">Corticosteroides</option>
                                                                                        <option value="4">Tratamiento Anticoagulante</option>
                                                                                        <option value="5">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                                                                    <label class="floating-label-activo-sm" for="ot_pat_act">Resultado de exámenes</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="2"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade show" id="curac_quem" role="tabpanel" aria-labelledby="curac_quem-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm" for="cp_cult">Toma de Cultivo</label>
                                                                                <select name="cp_cult" id="cp_cult" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_cult','div_cp_cult','obs_cp_cult',6);">
                                                                                    <option selected value="0">Seleccione </option>
                                                                                    <option value="1">No</option>
                                                                                    <option value="2">Si</option>
                                                                                    <option value="6">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_cult" style="display:none;">
                                                                                <label class="floating-label-activo-sm" for="obs_cp_cult">Observaciones <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_cult" id="obs_cp_cult"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm" for="cp_td">Tipos de debridamiento</label>
                                                                                <select name="cp_td" id="cp_td" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_td','div_cp_td','obs_cp_td',8);">
                                                                                    <option selected value="0">Seleccione </option>
                                                                                    <option value="1">Quirúrgico </option>
                                                                                    <option value="2">Cortante</option>
                                                                                    <option value="3">Enzimático</option>
                                                                                    <option value="4">Autolítico</option>
                                                                                    <option value="5">Osmótico</option>
                                                                                    <option value="6">Larval</option>
                                                                                    <option value="7">Mecánico</option>
                                                                                    <option value="8">Otros</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_td" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_td">Otras <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_td" id="obs_cp_td"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm t-red" for="cp_duch">Duchoterapia</label>
                                                                                <select name="cp_duch" id="cp_duch" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_duch','div_cp_duch','obs_cp_duch',3);">
                                                                                    <option selected value="0">Seleccione </option>
                                                                                    <option value="1">Si</option>
                                                                                    <option value="2">No</option>
                                                                                    <option value="3">Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_cp_duch" style="display:none;">
                                                                                <label class="floating-label-activo-sm t-red" for="obs_cp_duch">Observaciones <i>(Describir)</i></label>
                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_duch" id="obs_cp_duch"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-row mt-2">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">Tipo de Antisépticos y materiales usados</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label class="floating-label-activo-sm" for="ants_qm">Tipo de antisepticos</label>
                                                                                    <select class="form-control form-control-sm" name="ants_qm" id="ants_qm" multiple="multiple">
                                                                                        <option value="1">Solución fisiológica</option>
                                                                                        <option value="2">Bialcohol</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label class="floating-label-activo-sm" for="tpo_aposqm">Tipo de apósitos y materiales</label>
                                                                                    <select class="form-control form-control-sm" name="tpo_aposqm" id="tpo_aposqm" multiple="multiple">
                                                                                        <option value="1">Apósitos Pasivos</option>
                                                                                        <option value="2">Apósito Interactivo(Espuma Hidrofílica)</option>
                                                                                        <option value="3">Apósito Bioactivo(Alginato)</option>
                                                                                        <option value="4">Apósitos Mixtos</option>
                                                                                        <option value="5">Vasocontrictores</option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="obs_orin">Observaciones Curación Quemados</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_orin" id="obs_orin"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EXÁMENES-->
                                <div class="tab-pane fade show " id="enf_examenes" role="tabpanel" aria-labelledby="enf_examenes_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                        <h6 class="t-aten">Exámenes</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>
                                                            <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_pto','div_resp_pto','nom_resp_pto',4);">
                                                                <option  value="0">Seleccione</option>
                                                                <option  value="1">Juana Perez </option>
                                                                <option  value="2">Maria la del Barrio</option>
                                                                <option  value="3">alumna en práctica</option>
                                                                <option  value="4">Otro/a<option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_resp_pto" style="display:none;">
                                                            <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Nombre/Rut <i>(Anotar)</i></label>
                                                            <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Subj.S/C OD" data-seccion="Agudeza Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nom_resp_pto" id="nom_resp_pto"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-6 col-lg-6 col-xl-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Examen</i></label>
                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-9 col-lg-9 col-xl-10">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm t-red" for="av_ret_cc_od">Observaciones</label>
                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_od_cc" id="av_ret_od_cc"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="exam_1">
                                                            <label class="custom-control-label" for="exam_1">Tomado</label>
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
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="hosp_enf">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#hosp_enf_urg" aria-expanded="false" aria-controls="hosp_enf_urg">
                Informe de hospitalización enfermería
            </button>
        </div>
        <div id="hosp_enf_urg" class="collapse" aria-labelledby="hosp_enf" data-parent="#hosp_enf">
            <div class="card-body-aten-a">
                <div id="form-hosp_enf_urg">
                    <div class="col-md-12 py-40 px-0">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                @include('general.hospitalizacion.seccion_ficha_hospitalizacion.hospitalizar_enf_urgencia')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('urgencia.modal_enfermeria.barthel')
@include('urgencia.modal_enfermeria.cudyr')
@include('urgencia.modal_enfermeria.glasgow')
@include('urgencia.modal_enfermeria.braden')
@include('urgencia.modal_enfermeria.caidas')
@include('urgencia.modal_enfermeria.eva')
@include('urgencia.modal_enfermeria.balance_hidrico')
@include('urgencia.modal_enfermeria.pie_diab')
@include('urgencia.modal_enfermeria.pie_diab_guia')
@include('urgencia.modal_enfermeria.curaciones_hda')
@include('urgencia.modal_enfermeria.curaciones_guia')
@include('urgencia.modal_enfermeria.quemados')
@section('page-script-ficha-atencion')
<script>
    /** MENSAJE*/
    /** CARGAR mensaje */
    $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio el resto es  opcional');
    $('#mensaje_ficha').show();
    setTimeout(function(){
        $('#mensaje_ficha').hide();
    }, 5000);
        /** cronico */
    $(document).ready(function() {
        $('#pie_ant').select2();
        $('#tpo_aposc').select2();
        $('#u_med').select2();
        $('#pat_prop').select2();
        $('#pat_propq').select2();
        $('#sint_act').select2();
        $('#med_quem').select2();
        $('#ants_qm').select2();
        $('#tpo_aposqm').select2();

    });


    function cargarIgual(input)
    {

        let actual = $('#'+input);
        let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        $.each(equivalentes, function( index, value ) {
            var equivalente = $('#'+value);
            equivalente.val(actual.val());
        });

    }
    function evaluar_para_carga_detalle(select, div, input, valor)
    {
        var valor_select = $('#'+select+'').val();
        if(valor_select == valor) $('#'+div+'').show();
        else {
            $('#'+div+'').hide();
            $('#'+input+'').val('');
        }
    }
      /* Ponemos "agregarEvolucion" en el ámbito de toda la página */
      function agregarTratamiento(){
        var html = '';
        html += '<div id="contenedor_tratamiento">';
        html += '<div id="tratamiento" class="row border">';
        html += '<div class="col-sm-12 col-md-12 m-t-5">';
        html += '<div class="form-row">';
        html += '<div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        var f = new Date();
        html += ' <input class="form-control form-control-sm" name="fecha" type="hidden" value="'+ f.getFullYear() + " -/ " + (f.getMonth() + 1) + "-" + f.getDate()+'">';
        html += ' <input class="form-control form-control-sm" name="hora" type="hidden" value="'+ f.getHours()+ ":"+ f.getMinutes() +'">';
        html += f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear() + " -/ " + f.getHours()+ ":"+ f.getMinutes()+ " min.";
        html += '(Rut responsable)';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="form-group">';
        html += '     <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>';
        html += '     <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm">';
        html += '             <option  value="0">Seleccione</option>';
        html += '             <option  value="1">Juana Perez </option>';
        html += '             <option  value="2">Maria la del Barrio</option>';
        html += '             <option  value="3">alumna en práctica</option>';
        html += '             <option  value="4">Otro/a<option>';
        html += '          <select>';
        html += '     </div>';
        html += '  </div>';
        html += '<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '  <div class="form-group">';
        html += '     <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Indicado Por:</label>';
        html += '     <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm">';
        html += '             <option  value="0">Seleccione</option>';
        html += '             <option  value="1">Juana Perez </option>';
        html += '             <option  value="2">Maria la del Barrio</option>';
        html += '             <option  value="3">alumna en práctica</option>';
        html += '             <option  value="4">Otro/a<option>';
        html += '      <select>';
        html += '   </div>';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="form-group">';
        html += '     <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Vía de Administración:</label>';
        html += '     <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm">';
        html += '             <option  value="0">Seleccione</option>';
        html += '             <option  value="1">Oral</option>';
        html += '             <option  value="2">IM</option>';
        html += '             <option  value="3">EV Directa</option>';
        html += '             <option  value="4">EV Suero<option>';
        html += '             <option  value="3">Rectal</option>';
        html += '             <option  value="4">Subcutánea<option>';
        html += '          <select>';
        html += '  </div>';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-12 m-t-5">';
        html += '  <div class="form-row">';
            html += '<div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1">';


                html += '</div>';
        html += '    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '       <div class="form-group">';
        html += '        <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Medicamento</i></label>';
        html += '        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>';
        html += '    </div>';
        html += '  </div>';
        html += '  <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
        html += '       <div class="form-group">';

        html += '        <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Dosis</i></label>';
        html += '        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>';
        html += '     </div>';
        html += '   </div>';
        html += '  <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="form-group">';

        html += '      <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Tolerancia/efectos adversos</i></label>';
        html += '      <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>';
        html += '  </div>';
        html += '  </div>';
        html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += ' <div class="switch switch-success d-inline m-r-10">';
        html += '  <input type="checkbox" id="registro_alternativo_paciente" checked="">';
        html += ' <label for="registro_alternativo_paciente" class="cr"></label>';
        html += ' </div>';
        html += '  <label>Listo</label>';
        html += '</div>';
        html += '    </div>';
        html += '    </div>';
        html += ' </div>';
        html += '<div class="form-row">';
        html += '</div>';
        html += '</div>';
        html += '</form>';
        html += ' </div>';
        html += '</div>';
        html += '</div>';
        html += '       ';
        html += '    </div>';
        html += '</div>';

       $('#contenedor_tratamiento').append(html);
   } // agregarEvolucion
   $(document).ready(function(){
       /* Sacar la funcion "agregarPieza de este ámbito */
       $('.btn-agregar-tratamiento').click(function(){
           agregarTratamiento();
       });
   });
   function agregarProcedimiento(){
    var html = '';
    html += '<div class=" border  px-2 pt-3 pb-1 mb-4 rounded shadow mx-2">';
    html += '<div id="contenedor_procedimiento">';
    html += '<div id="procedimiento" class="row">';
  html += ' <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
   html += ' <div class="form-row">';
       html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
           html += ' <div class="form-group">';
               html += ' <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>';
               html += ' <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm">';
                   html += ' <option  value="0">Seleccione</option>';
                   html += ' <option  value="1">Juana Perez </option>';
                   html += ' <option  value="2">Maria la del Barrio</option>';
                   html += ' <option  value="3">alumna en práctica</option>';
               html += ' </select>';
           html += ' </div>';
       html += ' </div>';
       html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
           html += ' <div class="form-group">';
               html += ' <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Indicado por:</label>';
               html += ' <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm">';
                   html += ' <option  value="0">Seleccione</option>';
                   html += ' <option  value="1">Juana Perez </option>';
                   html += ' <option  value="2">Maria la del Barrio</option>';
                   html += ' <option  value="3">alumna en práctica</option>';
               html += ' </select>';
           html += ' </div>';
       html += ' </div>';
       html += ' <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">';
           html += ' <div class="form-group">';
               html += ' <label class="floating-label-activo-sm t-red" for="proc_enf_urg">Procedimiento</label>';
               html += ' <select name="proc_enf_urg"  id="proc_enf_urg" class="form-control form-control-sm">';
                    html += ' <option value="0">Seleccione</option>';
                   html += ' <option  value="1">Reanimación</option>';
                   html += ' <option  value="2">Nebulización</option>';
                   html += ' <option  value="3">Curación</option>';
                   html += ' <option  value="4">Sonda Folley</option>';
                   html += ' <option  value="5">Sonda Nasogástrica</option>';
                   html += ' <option  value="6">Inmovilización Fx.</option>';
                   html += ' <option  value="7">Otro/a<option>';
               html += ' </select>';
           html += ' </div>';
       html += ' </div>';
       html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
          html += '  <div class="custom-control custom-switch">';
                html += ' <input type="checkbox" class="custom-control-input" id="procedimiento_1">';
               html += '  <label class="custom-control-label" for="procedimiento_1">Finalizado</label>';
            html += ' </div>';
    html += ' </div>';
html += ' </div>';
   html += ' <div class="form-row">';
       html += ' <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-11 col-xxxl-11">';
           html += ' <div class="form-group">';
               html += ' <label class="floating-label-activo-sm" for="obs_proc_enf_urg">Observaciones</label>';
               html += ' <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_proc_enf_urg" id="obs_proc_enf_urg"></textarea>';
           html += ' </div>';
       html += ' </div>';
       html += ' <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1 col-xxxl-1">';
            html += ' <button type="button" class="btn btn-icon btn-danger-light-c"><i class="feather icon-x"></i></button>';
            html += ' <button type="button" class="btn btn-icon btn-info-light-c"><i class="feather icon-save"></i></button>';
        html += ' </div>';
    html += ' </div>';
   html += ' </div>';
   html += ' </div>';
   html += ' </div>';
   html += '</div>';
   html += ' </div>';
$('#contenedor_procedimiento').append(html);
   } // agregarEvolucion
   $(document).ready(function(){
       /* Sacar la funcion "agregarPieza de este ámbito */
       $('.btn-agregar-procedimiento').click(function(){
           agregarProcedimiento();
       });
   });

</script>
@endsection


