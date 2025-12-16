<!--Diagnóstico-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a " id="diagnostico">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                Diagnóstico
            </button>
        </div>
        <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
            <div class="card-body-aten-a  shadow-none">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="descripcion_hipotesis">Hipótesis diagnóstica</label>
                        <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado,eno_diagnositico_confirmado,diagnostico_cons,diag_endos_eda" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="descripcion_cie">Diagnóstico CIE-10</label>
                        <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,descripcion_cie_esp,eno_diagnostico_cie" name="descripcion_cie" id="descripcion_cie" value="" onchange="cargarIgual('descripcion_cie')">
                        <input type="hidden" class="form-control form-control-sm" data-input_igual="id_lic_descripcion_cie,id_descripcion_cie_esp,eno_id_diagnostico_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="" onchange="cargarIgual('id_descripcion_cie')">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm" for="indicaciones">Indicaciones</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" name="indicaciones" id="indicaciones"></textarea>
                    </div>
                    {{--  <div class=" col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                        <div class="custom-control custom-switch" >
                            <input type="checkbox" class="custom-control-input accor-closed  collapsed" id="motivo1"  data-toggle="collapse" data-target="#motivo1_c" aria-expanded="false" aria-controls="motivo1_c">
                            <label class="custom-control-label font-weight-bold text-c-blue" for="motivo1">Ingresar Plan de tratamiento</label>
                        </div>
                    </div>  --}}
                    <div class=" col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div id="motivo1_c" class="collapse" aria-labelledby="motivo1" data-parent="#motivo1">
                            <div class="card-body-aten-a">
                                {{--  <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten">Plan de tratamiento</h6>
                                    </div>
                                </div>
                                <hr>  --}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-row">
                                            {{--  <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0" for="tto_med_cda"><strong>Tratamiento médico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="tto_med_cda" name="tto_med_cda" value="1" onchange="javascript:showContentTmcda()" />
                                                        <label for="tto_med_cda" class="cr"></label>
                                                    </div>
                                                </div>
                                                    <div id="contentTto_cda" style="display: none;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label-activo-sm" for="rec_tto_cda">Recomendaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan de Tratamiento" data-tipo="recomendaciones médicas"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_cda" id="rec_tto_cda"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>  --}}
                                            {{--  <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="pr_cda" name="pr_cda" value="1" onchange="javascript: showContentProc_cda()" />
                                                        <label for="pr_cda" class="cr"></label>
                                                    </div>
                                                </div>

                                                <div id="contentProc_cda" style="display: none;">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm" for="tipo_proc_cda"> Tipo</label>
                                                            <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_cda" id="tipo_proc_cda">
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <label class="floating-label-activo-sm" for="plan_proc_cda"> Plan</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_cda" id="plan_proc_cda"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>  --}}
                                            {{--  <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-0 mt-0">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <label class="ml-0" for="tto_med_cda"><strong>Cirugía</strong></label>
                                                        <input type="checkbox" class="custom-control-input" id="cirug_cda" name="cirug_cda" value="{!! old('cirug_cda') !!}">
                                                        <label class="cr" for="cirug_cda"></label>
                                                    </div>
                                                </div>
                                            </div>  --}}
                                        </div>
                                        @php
                                            $subtipo = $profesional->SubTipoEspecialidad()->first();
                                        @endphp
                                        @if($subtipo && $subtipo->nombre == 'Cardiología Adultos' )
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="urgencia_bronco">¿Es Urgencia?</label>
                                                <select name="urgencia_bronco" id="urgencia_bronco"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_bronco','div_detalle_urgencia_bronco','obs_urgencia_bronco',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-row" id="div_detalle_urgencia_bronco" style="display:none">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4  col-xxl-4">
                                                <label class="floating-label-activo-sm" for="obs_bronco">Obs. Estado General Paciente</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" name="obs_bronco" id="obs_bronco" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="ingresohosp();"><i class="feather icon-edit-1"></i> Orden de Hospitalización </button>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_pabellon();"><i class="feather icon-edit-1"></i> Solicitar Pabellón</button>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_ex_funcional_cardio()";><i class="feather icon-edit-1"></i> Solicitar Exámenes Funcionales</button>

                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_rx_cardio()";><i class="feather icon-edit-1"></i> Solicitar Estudio Radiológico</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_ex_comunes()";><i class="feather icon-edit-1"></i> Examenes Frecuentes</button>
                                            </div>
                                        </div>

                                        @endif
                                          @if($subtipo && $subtipo->nombre == 'Homeopatía' )
                                       <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0" for="tto_mcg"><strong>Tratamiento médico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="tto_med_homeo" name="tto_med_homeo" value="1" onchange="javascript: showContentTmhomeo() " />
                                                        <label for="tto_med_homeo" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div id="contentTto_homeo" style="display: none;">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm" for="rec_tto_cirgeneral">Recomendaciones</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan de Tratamiento" data-tipo="recomendaciones médicas"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_cirgeneral" id="rec_tto_cirgeneral"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="pr_homeo" name="pr_homeo" value="1" onchange="javascript: showContentProc_homeo()" />
                                                        <label for="pr_homeo" class="cr"></label>
                                                    </div>
                                                </div>

                                                    <div id="contentProc_homeo" style="display: none;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm" for="tipo_proc_g"> Tipo</label>
                                                                <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_g" id="tipo_proc_g">
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <label class="floating-label-activo-sm" for="plan_proc_g"> Plan</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_cda" id="plan_proc_cda"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-0 mt-0">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <label class="ml-0" for="tto_med_cda"><strong>Cirugía</strong></label>
                                                        <input type="checkbox" class="custom-control-input" id="cirug_cda" name="cirug_cda" value="{!! old('cirug_cda') !!}">
                                                        <label class="cr" for="cirug_cda"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="urgencia_bronco">¿Es Urgencia Qx.?</label>
                                                <select name="urgencia_bronco" id="urgencia_cir_gastrica"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cir_gastrica','div_detalle_urgencia_cir_gastrica','obs_urgencia_cir_gastrica',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 form-group">
                                                <label class="floating-label-activo-sm" for="obs_bronco">Obs. Estado General Paciente</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_bronco" id="obs_cir_gastrica" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row" id="div_detalle_urgencia_cir_gastrica" style="display:none">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="ingresohosp();"><i class="feather icon-edit-1"></i> Orden de Hospitalización </button>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_pabellon();"><i class="feather icon-edit-1"></i> Solicitar Pabellón</button>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-12 col-md-4 col-lg-34col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_endoscopia()";><i class="feather icon-edit-1"></i> Solicitar Estudio Endoscópico</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_rx_gastro()";><i class="feather icon-edit-1"></i> Solicitar Estudio Radiológico</button>
                                            </div>
                                           <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_ex_comunes()";><i class="feather icon-edit-1"></i> Examenes Frecuentes</button>
                                            </div>
                                        </div>
                                        @endif
                                        @if($subtipo && $subtipo->nombre == 'Otorrinolaringología' )
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario1">Boton1</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario2">Boton2</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario3">Boton3</button>
                                        @endif

                                        @if($subtipo && $subtipo->nombre == 'Dermatología' )
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario1">Boton1</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario2">Boton2</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario3">Boton3</button>
                                        @endif

                                        @if($subtipo && $subtipo->nombre == 'Oftalmología' )
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario1">Boton1</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario2">Boton2</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario3">Boton3</button>
                                        @endif

                                        @if($subtipo && $subtipo->nombre == 'Broncopulmonar'  )
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="urgencia_bronco">¿Es Urgencia?</label>
                                                <select name="urgencia_bronco" id="urgencia_bronco"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_bronco','div_detalle_urgencia_bronco','obs_urgencia_bronco',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 form-group">
                                                <label class="floating-label-activo-sm" for="obs_bronco">Obs. Estado General Paciente</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_bronco" id="obs_bronco" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row" id="div_detalle_urgencia_bronco" style="display:none">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="ingresohosp();"><i class="feather icon-edit-1"></i> Orden de Hospitalización </button>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_pabellon();"><i class="feather icon-edit-1"></i> Solicitar Pabellón</button>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_broncoscopia()";><i class="feather icon-edit-1"></i> Solicitar Estudio Endoscópico</button>

                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_rx_bronco()";><i class="feather icon-edit-1"></i> Solicitar Estudio Radiológico</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_espirometria()";><i class="feather icon-edit-1"></i> Examenes Funcionales</button>
                                            </div>
                                        </div>
                                        @endif

                                        @if($subtipo && $subtipo->nombre == 'Cirugía Gástrica' )
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0" for="tto_med_cda"><strong>Tratamiento médico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="tto_med_cda" name="tto_med_cda" value="1" onchange="javascript:showContentTmcda()" />
                                                        <label for="tto_med_cda" class="cr"></label>
                                                    </div>
                                                </div>
                                                    <div id="contentTto_cda" style="display: none;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label-activo-sm" for="rec_tto_cda">Recomendaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan de Tratamiento" data-tipo="recomendaciones médicas"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_cda" id="rec_tto_cda"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="pr_cda" name="pr_cda" value="1" onchange="javascript: showContentProc_cda()" />
                                                        <label for="pr_cda" class="cr"></label>
                                                    </div>
                                                </div>

                                                    <div id="contentProc_cda" style="display: none;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm" for="tipo_proc_cda"> Tipo</label>
                                                                <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_cda" id="tipo_proc_cda">
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <label class="floating-label-activo-sm" for="plan_proc_cda"> Plan</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_cda" id="plan_proc_cda"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-0 mt-0">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <label class="ml-0" for="tto_med_cda"><strong>Cirugía</strong></label>
                                                        <input type="checkbox" class="custom-control-input" id="cirug_cda" name="cirug_cda" value="{!! old('cirug_cda') !!}">
                                                        <label class="cr" for="cirug_cda"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="urgencia_bronco">¿Es Urgencia Qx.?</label>
                                                <select name="urgencia_bronco" id="urgencia_cir_gastrica"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cir_gastrica','div_detalle_urgencia_cir_gastrica','obs_urgencia_cir_gastrica',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 form-group">
                                                <label class="floating-label-activo-sm" for="obs_bronco">Obs. Estado General Paciente</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_bronco" id="obs_cir_gastrica" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                            </div>


                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="ingresohosp();"><i class="feather icon-edit-1"></i> Orden de Hospitalización </button>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_pabellon();"><i class="feather icon-edit-1"></i> Solicitar Pabellón</button>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_endosc_eda()";><i class="feather icon-edit-1"></i> Solicitar Endoscopía Alta</button>

                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_endosc_edb()";><i class="feather icon-edit-1"></i> Solicitar Endoscopía Baja</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="mostrar_modal_examen_cirguria()";><i class="feather icon-edit-1"></i> Examenes</button>
                                            </div>
                                        </div>
                                        @endif

                                        @if($subtipo && $subtipo->nombre =='Gastroenterología' )
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0" for="tto_med_cda"><strong>Tratamiento médico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="tto_med_gastro" name="tto_med_gastro" value="1" onchange="javascript:showContentGastro()" />
                                                        <label for="tto_med_gastro" class="cr"></label>
                                                    </div>
                                                </div>
                                                    <div id="contentTto_gastro" style="display: none;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label-activo-sm" for="rec_tto_gastro">Recomendaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan de Tratamiento" data-tipo="recomendaciones médicas"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_gastro" id="rec_tto_gastro"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="pr_gastro" name="pr_gastro" value="1" onchange="javascript: showContentProc_gastro()" />
                                                        <label for="pr_gastro" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div id="contentProc_gastro" style="display: none;">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm" for="tipo_proc_gastro"> Tipo</label>
                                                            <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_gastro" id="tipo_proc_gastro">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm" for="plan_proc_gastro"> Plan</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_gastro" id="plan_proc_gastro"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <button type="button" class="btn btn-outline-primary btn-xs btn-block" onclick="ingresohosp('')";><i class="feather icon-edit-1"></i> O. hospitalizar </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-0 mt-0">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <label class="ml-0" for="tto_med_cda"><strong>Cirugía</strong></label>
                                                        <input type="checkbox" class="custom-control-input" id="cirug_cda" name="cirug_cda" value="{!! old('cirug_cda') !!}">
                                                        <label class="cr" for="cirug_cda"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_endoscopia()";><i class="feather icon-edit-1"></i> Solicitar Estudio Endoscópico</button>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_rx_gastro()";><i class="feather icon-edit-1"></i> Solicitar Estudio Radiológico</button>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_ex_func_gastro()";><i class="feather icon-edit-1"></i> Examenes Funcionales</button>
                                            </div>
                                             <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_ex_comunes()";><i class="feather icon-edit-1"></i> Examenes Frecuentes</button>
                                            </div>
                                        </div>
                                        @endif

                                        @if($subtipo && $subtipo->nombre == 'Cirugía Coloproctológica' )
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0" for="tto_med_cda"><strong>Tratamiento médico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="tto_med_cda" name="tto_med_cda" value="1" onchange="javascript:showContentTmcda()" />
                                                        <label for="tto_med_cda" class="cr"></label>
                                                    </div>
                                                </div>
                                                    <div id="contentTto_cda" style="display: none;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label-activo-sm" for="rec_tto_cda">Recomendaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan de Tratamiento" data-tipo="recomendaciones médicas"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_cda" id="rec_tto_cda"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="pr_cda" name="pr_cda" value="1" onchange="javascript: showContentProc_cda()" />
                                                        <label for="pr_cda" class="cr"></label>
                                                    </div>
                                                </div>

                                                    <div id="contentProc_cda" style="display: none;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm" for="tipo_proc_cda"> Tipo</label>
                                                                <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_cda" id="tipo_proc_cda">
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <label class="floating-label-activo-sm" for="plan_proc_cda"> Plan</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_cda" id="plan_proc_cda"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-0 mt-0">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <label class="ml-0" for="tto_med_cda"><strong>Cirugía</strong></label>
                                                        <input type="checkbox" class="custom-control-input" id="cirug_cda" name="cirug_cda" value="{!! old('cirug_cda') !!}">
                                                        <label class="cr" for="cirug_cda"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="urgencia_bronco">¿Es Urgencia Qx.?</label>
                                                <select name="urgencia_bronco" id="urgencia_cir_gastrica"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cir_gastrica','div_detalle_urgencia_cir_gastrica','obs_urgencia_cir_gastrica',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 form-group">
                                                <label class="floating-label-activo-sm" for="obs_bronco">Obs. Estado General Paciente</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_bronco" id="obs_cir_gastrica" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row" id="div_detalle_urgencia_cir_gastrica" style="display:none">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="ingresohosp();"><i class="feather icon-edit-1"></i> Orden de Hospitalización </button>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_pabellon();"><i class="feather icon-edit-1"></i> Solicitar Pabellón</button>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_endosc_eda()";><i class="feather icon-edit-1"></i> Solicitar Endoscopía Alta</button>

                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_endosc_edb()";><i class="feather icon-edit-1"></i> Solicitar Endoscopía Baja</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="mostrar_modal_examen_cirguria()";><i class="feather icon-edit-1"></i> Examenes</button>
                                            </div>
                                        </div>
                                        @endif

                                        @if($subtipo && $subtipo->nombre == 'Urología' )
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario1">Boton1</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario2">Boton2</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario3">Boton3</button>
                                        @endif

                                        @if($subtipo && $subtipo->nombre == 'Cirugía digestiva' )
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0" for="tto_med_cda"><strong>Tratamiento médico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="tto_med_cda" name="tto_med_cda" value="1" onchange="javascript:showContentTmcda()" />
                                                        <label for="tto_med_cda" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div id="contentTto_cda" style="display: none;">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm" for="rec_tto_cda">Recomendaciones</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan de Tratamiento" data-tipo="recomendaciones médicas"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_cda" id="rec_tto_cda"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="pr_cda" name="pr_cda" value="1" onchange="javascript: showContentProc_cda()" />
                                                        <label for="pr_cda" class="cr"></label>
                                                    </div>
                                                </div>

                                                    <div id="contentProc_cda" style="display: none;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm" for="tipo_proc_cda"> Tipo</label>
                                                                <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_cda" id="tipo_proc_cda">
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <label class="floating-label-activo-sm" for="plan_proc_cda"> Plan</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_cda" id="plan_proc_cda"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-0 mt-0">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <label class="ml-0" for="tto_med_cda"><strong>Cirugía</strong></label>
                                                        <input type="checkbox" class="custom-control-input" id="cirug_cda" name="cirug_cda" value="{!! old('cirug_cda') !!}">
                                                        <label class="cr" for="cirug_cda"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="urgencia_bronco">¿Es Urgencia Qx.?</label>
                                                <select name="urgencia_bronco" id="urgencia_cir_gastrica"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cir_gastrica','div_detalle_urgencia_cir_gastrica','obs_urgencia_cir_gastrica',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 form-group">
                                                <label class="floating-label-activo-sm" for="obs_bronco">Obs. Estado General Paciente</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_bronco" id="obs_cir_gastrica" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row" id="div_detalle_urgencia_cir_gastrica" style="display:none">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="ingresohosp();"><i class="feather icon-edit-1"></i> Orden de Hospitalización </button>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_pabellon();"><i class="feather icon-edit-1"></i> Solicitar Pabellón</button>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_endoscopia()";><i class="feather icon-edit-1"></i> Solicitar Estudio Endoscópico</button>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_rx_gastro()";><i class="feather icon-edit-1"></i> Solicitar Estudio Radiológico</button>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_ex_func_gastro()";><i class="feather icon-edit-1"></i> Examenes Funcionales</button>
                                            </div>
                                             <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_ex_comunes()";><i class="feather icon-edit-1"></i> Examenes Frecuentes</button>
                                            </div>
                                        </div>
                                        @endif
                                         {{--  <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="pr_cda" name="pr_cda" value="1" onchange="javascript: showContentProc_cda()" />
                                                        <label for="pr_cda" class="cr"></label>
                                                    </div>
                                                </div>

                                                <div id="contentProc_cda" style="display: none;">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm" for="tipo_proc_cda"> Tipo</label>
                                                            <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_cda" id="tipo_proc_cda">
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <label class="floating-label-activo-sm" for="plan_proc_cda"> Plan</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_cda" id="plan_proc_cda"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>  --}}

                                        @if($subtipo && $subtipo->nombre == 'Cirugía General' )
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0" for="tto_mcg"><strong>Tratamiento médico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="tto_med_cg" name="tto_med_cg" value="1" onchange="javascript: showContentTmcg() " />
                                                        <label for="tto_med_cg" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div id="contentTto_cg" style="display: none;">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm" for="rec_tto_cirgeneral">Recomendaciones</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan de Tratamiento" data-tipo="recomendaciones médicas"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_cirgeneral" id="rec_tto_cirgeneral"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="pr_cg" name="pr_cg" value="1" onchange="javascript: showContentProc_cg()" />
                                                        <label for="pr_cg" class="cr"></label>
                                                    </div>
                                                </div>

                                                    <div id="contentProc_cg" style="display: none;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm" for="tipo_proc_g"> Tipo</label>
                                                                <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_g" id="tipo_proc_g">
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <label class="floating-label-activo-sm" for="plan_proc_g"> Plan</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_cda" id="plan_proc_cda"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-0 mt-0">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <label class="ml-0" for="tto_med_cda"><strong>Cirugía</strong></label>
                                                        <input type="checkbox" class="custom-control-input" id="cirug_cda" name="cirug_cda" value="{!! old('cirug_cda') !!}">
                                                        <label class="cr" for="cirug_cda"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="urgencia_bronco">¿Es Urgencia Qx.?</label>
                                                <select name="urgencia_bronco" id="urgencia_cir_gastrica"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cir_gastrica','div_detalle_urgencia_cir_gastrica','obs_urgencia_cir_gastrica',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 form-group">
                                                <label class="floating-label-activo-sm" for="obs_bronco">Obs. Estado General Paciente</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_bronco" id="obs_cir_gastrica" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row" id="div_detalle_urgencia_cir_gastrica" style="display:none">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="ingresohosp();"><i class="feather icon-edit-1"></i> Orden de Hospitalización </button>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_pabellon();"><i class="feather icon-edit-1"></i> Solicitar Pabellón</button>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-12 col-md-4 col-lg-34col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_endoscopia()";><i class="feather icon-edit-1"></i> Solicitar Estudio Endoscópico</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_rx_gastro()";><i class="feather icon-edit-1"></i> Solicitar Estudio Radiológico</button>
                                            </div>
                                           <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_ex_comunes()";><i class="feather icon-edit-1"></i> Examenes Frecuentes</button>
                                            </div>
                                        </div>
                                        @endif

                                        @if($subtipo && $subtipo->nombre == 'Medicina general adultos y niños' )
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0" for="tto_med_cda"><strong>Tratamiento médico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="tto_med_cda" name="tto_med_cda" value="1" onchange="javascript:showContentTmcda()" />
                                                        <label for="tto_med_cda" class="cr"></label>
                                                    </div>
                                                </div>
                                                <div id="contentTto_cda" style="display: none;">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm" for="rec_tto_cda">Recomendaciones</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan de Tratamiento" data-tipo="recomendaciones médicas"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_cda" id="rec_tto_cda"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-0 mt-0">
                                                <div class="form-group">
                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="pr_cda" name="pr_cda" value="1" onchange="javascript: showContentProc_cda()" />
                                                        <label for="pr_cda" class="cr"></label>
                                                    </div>
                                                </div>

                                                    <div id="contentProc_cda" style="display: none;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm" for="tipo_proc_cda"> Tipo</label>
                                                                <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_cda" id="tipo_proc_cda">
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <label class="floating-label-activo-sm" for="plan_proc_cda"> Plan</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_cda" id="plan_proc_cda"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-0 mt-0">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <label class="ml-0" for="tto_med_cda"><strong>Cirugía</strong></label>
                                                        <input type="checkbox" class="custom-control-input" id="cirug_cda" name="cirug_cda" value="{!! old('cirug_cda') !!}">
                                                        <label class="cr" for="cirug_cda"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="urgencia_bronco">¿Es Urgencia Qx.?</label>
                                                <select name="urgencia_bronco" id="urgencia_cir_gastrica"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cir_gastrica','div_detalle_urgencia_cir_gastrica','obs_urgencia_cir_gastrica',2);">
                                                    <option value="1" selected>No</option>
                                                    <option value="2">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 form-group">
                                                <label class="floating-label-activo-sm" for="obs_bronco">Obs. Estado General Paciente</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_bronco" id="obs_cir_gastrica" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row" id="div_detalle_urgencia_cir_gastrica" style="display:none">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="ingresohosp();"><i class="feather icon-edit-1"></i> Orden de Hospitalización </button>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_pabellon();"><i class="feather icon-edit-1"></i> Solicitar Pabellón</button>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-12 col-md-4 col-lg-34col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_endoscopia()";><i class="feather icon-edit-1"></i> Solicitar Estudio Endoscópico</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_rx_gastro()";><i class="feather icon-edit-1"></i> Solicitar Estudio Radiológico</button>
                                            </div>
                                           <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-1">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_ex_comunes()";><i class="feather icon-edit-1"></i> Examenes Frecuentes</button>
                                            </div>
                                        </div>
                                        @endif

                                        @if($subtipo && $subtipo->nombre == 'Traumatología General' )
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario1">Boton1</button>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario2">Boton2</button>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario3">Boton3</button>
                                        @endif

                                        @if($profesional->TipoEspecialidad()->first()->nombre == 'SIQUIATRÍA' )
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario1">Boton1</button>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario2">Boton2</button>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formulario3">Boton3</button>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm"for="obs_plan_trat_cda">Observaciones Plan de Tratamiento</label>
                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_trat_cda" id="obs_plan_trat_cda"></textarea>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
