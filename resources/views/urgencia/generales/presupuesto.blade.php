<div class="card">
    <div class="card-body">
        <div id="form-presup_dent">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <ul class="nav nav-tabs-aten nav-fill mb-10" id="od_grl" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link-aten text-reset active" id="od_pac_depend_tab" data-toggle="tab" href="#od_pac_depend" role="tab" aria-controls="od_pac_depend" aria-selected="true">Paciente Menor de edad y Dependientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-aten text-reset" id="od_presup_clinico-tab" data-toggle="tab" href="#od_presup_clinico" role="tab" aria-controls="od_presup_clinico" aria-selected="true">Presupuesto Clinico</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-aten text-reset" id="od_laboratorio-tab" data-toggle="tab" href="#od_laboratorio" role="tab" aria-controls="od_laboratorio" aria-selected="true">Laboratorio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-aten text-reset" id="od__presup_gral-tab" data-toggle="tab" href="#od__presup_gral" role="tab" aria-controls="od__presup_gral" aria-selected="true">Presupuesto General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-aten text-reset" id="od_abonos_pres-tab" data-toggle="tab" href="#od_abonos_pres" role="tab" aria-control="od_abonos_pres" aria-selected="false">Abonos y Estados de Pago</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="tab-content" id="od_grl">
                        <!--DEPENDIENTES-->
                        <div class="tab-pane fade show active" id="od_pac_depend" role="tabpanel" aria-labelledby="od_pac_depend_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link-aten text-reset active " id="od_at_menor-tab" data-toggle="tab" href="#od_at_menor" role="tab" aria-controls="od_at_menor" aria-selected="false">Identificación </a>
                                                        <a class="nav-link-aten text-reset" id="od_at_acomp_a-tab" data-toggle="tab" href="#od_at_acomp_a" role="tab" aria-controls="od_at_acomp_a" aria-selected="true">Acompañantes Autorizados</a>
                                                        <a class="nav-link-aten text-reset" id="od_at_res_p-tab" data-toggle="tab" href="#od_at_res_p" role="tab" aria-controls="od_at_res_p" aria-selected="true">Responsable del Pago </a>
                                                        <a class="nav-link-aten text-reset" id="od_at_part-tab" data-toggle="tab" href="#od_at_part" role="tab" aria-controls="od_at_part" aria-selected="false">Particularidades</a>
                                                        <a class="nav-link-aten text-reset" id="od_at_perm-tab" data-toggle="tab" href="#od_at_perm" role="tab" aria-controls="od_at_perm" aria-selected="false">Solicitar Permisos</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="od_at_menor" role="tabpanel" aria-labelledby="od_at_menor-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label">Rut</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_pte_rut"id="od_id_pte_rut">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label">Nombre y Apellidos</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_pte_nomb"id="od_id_pte_nomb">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label">FN</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_pte_fn"id="od_id_pte_fn">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label">Edad</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_pte_edad"id="od_id_pte_edad">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Observaciones </label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade show" id="od_at_acomp_a" role="tabpanel" aria-labelledby="od_at_acomp_a-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">Rut</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_rut"id="od_id_aca_rut">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label">Nombre y Apellidos</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_nomb"id="od_id_aca_nomb">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">Parentezco</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_rut"id="od_id_aca_rut">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label">Teléfono</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_tel"id="od_id_aca_tel">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label">Email</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_email"id="od_id_aca_email">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Observaciones </label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade show" id="od_at_res_p" role="tabpanel" aria-labelledby="od_at_res_p-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label">Rut</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_rut"id="od_id_aca_rut">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label">Nombre y Apellidos</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_nomb"id="od_id_aca_nomb">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label">Teléfono</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_tel"id="od_id_aca_tel">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label">Email</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_email"id="od_id_aca_email">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="abrir_modal_guardar_aceptar_pago(' ');"><i class="fas fa-save"></i> Aceptar Presupuesto y pago</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="od_at_part" role="tabpanel" aria-labelledby="od_at_part-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Observaciones Acerca del tipo de Paciente</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="od_at_perm" role="tabpanel" aria-labelledby="od_at_perm-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label">Autorización Vigente</label>
                                                                            <input type="text" class="form-control form-control-sm" name="od_est_aut_v"id="od_est_aut_venc">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label">Autorización Vencida</label>
                                                                            <input type="text" class="form-control form-control-sm" name="od_est_aut_venc"id="od_est_aut_venc">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="abrir_modal_guardar_aceptar_pago(' ');"><i class="fas fa-save"></i> Solicitar o Renovar autorización</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Observaciones</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
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
                        <!--TRABAJOS-->
                        <div class="tab-pane fade show" id="od_presup_clinico" role="tabpanel" aria-labelledby="od_presup_clinico_tab">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Pieza</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Descuento</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Total prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Cuadrante</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Descuento</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Total prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Boca</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Descuento</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Total Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)"> Ver Estado Trabajo</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Arcada</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Descuento</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Total Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)"> Ver Estado Trabajo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--LABORATORIO-->
                        <div class="tab-pane fade show" id="od_laboratorio" role="tabpanel" aria-labelledby="od_laboratorio-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link-aten text-reset" id="od_laboratorio_trab-tab" data-toggle="tab" href="#od_laboratorio_trab" role="tab" aria-controls="od_laboratorio_trab" aria-selected="false">Estados Trabajos</a>
                                                        <a class="nav-link-aten text-reset" id="od_lab_estadopago-tab" data-toggle="tab" href="#od_lab_estadopago" role="tab" aria-controls="od_lab_estadopago" aria-selected="false">Estados de Pago</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-10 col-xl-10">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="od_laboratorio_trab" role="tabpanel" aria-labelledby="od_laboratorio_trab-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">ESTADO TRABAJOS</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">Nombre Laboratorio</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_nom" id="lab_nom">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">Trabajo Requerido</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_ord_trab" id="lab_ord_trab">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">F.envío</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_fenv" id="lab_fenv">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">F.entrega</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_fent" id="lab_fent">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">Estado</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_est" id="lab_est">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">N° Identificación</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label"> Valor Total</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_cost_tot" id="lab_cost_tot">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label"> Abonos</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_abon" id="lab_abon">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label"> Valor Pendiente</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_val_pend" id="lab_val_pend">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2"onclick="info_lab();"><i class="fa fa-plus"></i>  Info Laboratorio</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2"onclick="info_lab();"><i class="fa fa-plus"></i>  Ingresar abono</button><!--este boton hace el calculo del abono y lo anota-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Observaciones </label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade show " id="od_lab_estadopago" role="tabpanel" aria-labelledby="od_lab_estadopago-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">ESTADOS DE PAGOS A LABORATORIO</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">Nombre Laboratorio</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_nom" id="lab_nom">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">N° Identificación</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">F.pago</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_fenv" id="lab_fenv">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label">Cantidad</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_fent" id="lab_fent">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label"> Valor Total</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_cost_tot" id="lab_cost_tot">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label"> Valor Pendiente</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_cost_tot" id="lab_cost_tot">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Observaciones</label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
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
                        <!--EXAMEN CUELLO-->
                        <div class="tab-pane fade show" id="od__presup_gral" role="tabpanel" aria-labelledby="od__presup_gral-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Laboratorio</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total Laboratorio</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Clínico</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="   pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total Clínico</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Valor final</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total presupuesto</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="od_abonos_pres" role="tabpanel" aria-labelledby="od_abonos_pres-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Laboratorio</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total Laboratorio</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-success btn-block btn-sm"
                                                        onclick="respon_pago_dent();"><i class="fa fa-plus"></i>Boton 1</button>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Clínico</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="   pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total Clínico</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-success btn-block btn-sm" onclick="respon_pago_dent();"><i class="fa fa-plus"></i>Boton 2</button>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Valor final</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total presupuesto</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
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
        </div>
    </div>
</div>
