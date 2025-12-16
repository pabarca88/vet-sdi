<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="exam_esp_orl">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_orl_c" aria-expanded="false" aria-controls="exam_esp_orl_c">
                ATENCIÓN ENFERMERÍA
            </button>
        </div>
        <div id="exam_esp_orl_c" class="collapse" aria-labelledby="exam_esp_orl" data-parent="#exam_esp_orl">
            <div class="card-body-aten-a">
                <div id="form-orl-adulto">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-10" id="enf_urgencia" role="tablist">
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
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                <div class="tab-pane fade show active" id="ing_enf" role="tabpanel" aria-labelledby="ing_enf_tab">
                                                                    <div class="col-sm-12 col-md-12">
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
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--CONTROL DE CICLO-->
                                <div class="tab-pane fade show" id="enf_cont_ciclo" role="tabpanel" aria-labelledby="enf_cont_ciclo_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ASIGNAR URGENCIA-->
                                <div class="tab-pane fade show " id="enf_asig_urg" role="tabpanel" aria-labelledby="enf_asig_urg_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-row">
                                                                <div class="col-sm-6 col-md-6 mb-3 m-t-10">
                                                                    <H6><i class="feather icon-heart m-l-10"></i> Asignar Urgencia</H6>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-1">

                                                                </div>


                                                                <div class="col-md-2">
                                                                    <a href="#" >
                                                                        <div class="card bg-c order-card"style="background-color:#ff0000">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-6"><h3 class="text-white">2</h3></div>
                                                                                    <div class="col-6"><p class="text-white m-b-0">Ver<i class="feather icon-arrow-up m-l-10"></i></p></div>
                                                                                </div>
                                                                                <i class="card-icon feather icon-heart"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <a href="#" >
                                                                    <div class="card bg-c order-card" style="background-color:#F46732">
                                                                        <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-6"><h3 class="text-white">5</h3></div>
                                                                            <div class="col-6"><p class="text-white m-b-0">Ver<i class="feather icon-arrow-up m-l-10"></i></p></div>
                                                                        </div>
                                                                            <i class="card-icon feather icon-heart"></i>
                                                                        </div>
                                                                    </div>
                                                                     </a>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <a href="#" >
                                                                    <div class="card bg-c order-card" style="background-color:#F6F92C">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-6"><h3 class="text-white">8</h3></div>
                                                                                <div class="col-6"><p class="text-white m-b-0">Ver<i class="feather icon-arrow-up m-l-10"></i></p></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                 </a>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <a href="#" >
                                                                    <div class="card bg-c-green order-card">
                                                                        <div class="card-body">
                                                                            <h2 class="text-white">0</h2>
                                                                            <i class="card-icon feather icon-heart"></i>
                                                                        </div>
                                                                    </div>
                                                                     </a>
                                                                </div>

                                                                <div class="col-md-2">
                                                                <a href="#" >
                                                                    <div class="card bg-c-blue order-card">
                                                                        <div class="card-body">
                                                                            <h2 class="text-white">2</h2>
                                                                            <i class="card-icon feather icon-heart"></i>
                                                                        </div>
                                                                    </div>
                                                                     </a>
                                                                </div>
                                                                <div class="col-md-1">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EJECUTAR TRATAMIENTO-->
                                <div class="tab-pane fade show " id="enf_tto" role="tabpanel" aria-labelledby="enf_tto_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                            <div class="row">

                                                                <ul class="nav nav-tabs-aten nav-fill mb-10" id="enf_urg" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active" id="tto_ingreso_tab_2" data-toggle="tab" href="#tto_ingreso_2" role="tab" aria-controls="tto_ingreso_2" aria-selected="true">Tratamientos Administrados</a>
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
                                                                                    <H6><i class="feather icon-heart m-l-10"></i> Tratamientos Administrados</H6>
                                                                                </div>
                                                                                <div class="col-sm-10 col-md-6 col-lg-6 col-xl-6 d-inline">
                                                                                    <button type="button" class="btn btn-info-light-c btn-sm btn-agregar-evolucion d-inline float-right" ><i class="feather icon-plus"></i> Nuevo Tratamiento</button>
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
                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl32">
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
                                                                        <div class="tab-pane fade" id="tto_pendiente" role="tabpanel" aria-labelledby="tto_pendiente_tab">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-6 col-md-6 mb-3 m-t-5">
                                                                                    <H6><i class="feather icon-heart m-l-10"></i> Tratamientos Administrados</H6>
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
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EJECUTAR PROCEDIMIENTO-->
                                <div class="tab-pane fade show " id="enf_proc" role="tabpanel" aria-labelledby="enf_proc_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">



                                                            <div class="form-row">

                                                                <div class="col-sm-6 col-md-6 mb-3 m-t-5">
                                                                    <H6><i class="feather icon-heart m-l-10"></i> Procedimientos</H6>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 d-inline">
                                                                    <button type="button" class="btn btn-info-light-c btn-sm btn-agregar-evolucion d-inline float-right" ><i class="feather icon-plus"></i> Nuevo Procedimiento</button>
                                                                </div>

                                                            </div>

                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Procedimiento</label>
                                                                            <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_pto','div_resp_pto','nom_resp_pto',4);">
                                                                                <option  value="0">Seleccione</option>
                                                                                <option  value="1">Reanimación</option>
                                                                                <option  value="2">Nebulización</option>
                                                                                <option  value="3">Curación</option>
                                                                                <option  value="4">Inmovilización Fx.</option>
                                                                                <option  value="5">Otro/a<option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
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
                                    </div>
                                </div>
                                <!--EXÁMENES-->
                                <div class="tab-pane fade show " id="enf_examenes" role="tabpanel" aria-labelledby="enf_examenes_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                        <div class="row">

                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 mb-3 m-t-5">
                                                                    <H6><i class="feather icon-heart m-l-10"></i> Examenes</H6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
                                                                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Examen</i></label>
                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm t-red" for="av_ret_cc_od">Observaciones</label>
                                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_od_cc" id="av_ret_od_cc"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                        <div class="switch switch-success d-inline m-r-10">
                                                                            <input type="checkbox" id="registro_alternativo_paciente" checked="">
                                                                            <label for="registro_alternativo_paciente" class="cr"></label>
                                                                        </div>
                                                                        <label>tomado</label>
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
        </div>
    </div>
</div>

