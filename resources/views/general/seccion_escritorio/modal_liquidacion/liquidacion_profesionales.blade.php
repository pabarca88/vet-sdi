<div id="liquid_prof_institucion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="liquid_prof_institucion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine">Detalle Liquidación Profesionales Institución:</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span onclick="cerrarModal()"; aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="liq_profes_inst" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="edit_info-tipo_contrato_liqinst-tab" data-toggle="tab" href="#edit_info-tipo_contrato_liqinst" role="tab" aria-controls="edit_info-tipo_contrato_liqinst" aria-selected="true">Info Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="fonasa_liq_inst-tab" data-toggle="tab" href="#fonasa_liq_inst" role="tab" aria-controls="fonasa_liq_inst" aria-selected="false">Fonasa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="isapre_liq_inst-tab" data-toggle="tab" href="#isapre_liq_inst" role="tab" aria-controls="isapre_liq_inst" aria-selected="false">Isapres</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="particular_liq_inst-tab" data-toggle="tab" href="#particular_liq_inst" role="tab" aria-controls="particular_liq_inst" aria-selected="false">particulares y efectivo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="a_pagar_prof-tab" data-toggle="tab" href="#a_pagar_prof" role="tab" aria-controls="a_pagar_prof" aria-selected="false">Valor a Pagar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="liq_profes_inst">
                                <!--INFO CONTRATO-->
                                <div class="tab-pane fade show active" id="edit_info-tipo_contrato_liqinst" role="tabpanel" aria-labelledby="edit_info-tipo_contrato_liqinst-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                <a class="nav-link-aten text-reset active" id="exam-rn-traumato-tab" data-toggle="tab" href="#info_liq_inst_fijo" role="tab" aria-controls="info_liq_inst_fijo" aria-selected="true">Valor Fijo</a>
                                                                <a class="nav-link-aten text-reset" id="info_liq_inst_variable-tab" data-toggle="tab" href="#info_liq_inst_variable" role="tab" aria-controls="info_liq_inst_variable" aria-selected="false">Variable</a>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                <div class="tab-pane fade show active" id="info_liq_inst_fijo" role="tabpanel" aria-labelledby="info_liq_inst_fijo-tab">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Valor Fijo por mes</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label id="valor_fijo" class="floating-label-activo-sm">$:.......</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade " id="info_liq_inst_variable" role="tabpanel" aria-labelledby="info_liq_inst_variable-tab">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Porcentaje</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Conf. Agenda</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Gastos Comunes</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Gastos Box</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Valor Variable</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label id="total_variable" class="floating-label-activo-sm">$:.......</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr> <br>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Valor Total</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label id="valor_total" class="floating-label-activo-sm">$:.......</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INFO FONASA-->
                                <div class="tab-pane fade show" id="fonasa_liq_inst" role="tabpanel" aria-labelledby="fonasa_liq_inst-tab">
                                    <form>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <h6> Total del Mes</h6>
                                         </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-row">
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">N° Bonos mes</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Copago</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Seguros</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">bonificación a Cobrar</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <h6> Desglose recibidos Por el Profesional</h6>
                                         </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">N° Bonos</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago Recibidos</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <h6> Desglose pendiente</h6>
                                         </div>
                                         <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-row">
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">N° Bonos</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago pendiente</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Valor Enviado a Cobro (bonif+seguros)</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--INFO ISAPRES-->
                                <div class="tab-pane fade show" id="isapre_liq_inst" role="tabpanel" aria-labelledby="isapre_liq_inst-tab">
                                    <form>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <h6> Total del Mes</h6>
                                         </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-row">
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">N° Bonos mes</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Copago</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Seguros</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">bonificación a Cobrar</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <h6> Desglose recibidos Por el Profesional</h6>
                                         </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">N° Bonos Recibidos</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago Recibidos</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <h6> Desglose pendiente</h6>
                                         </div>
                                         <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-row">
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">N° Bonos Pendientes</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago pendiente</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Valor Enviado a Cobro (bonif+seguros)</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--INFO PARTICULAR-->
                                <div class="tab-pane fade show" id="particular_liq_inst" role="tabpanel" aria-labelledby="particular_liq_inst-tab">
                                    <form>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <h6> Total Recibidos</h6>
                                         </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-row">
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">N° Atenciones</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Valor Particulares</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copagos recibidos</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Efectivo Recibido</label>
                                                            <input type="number" disabled="disabled" class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <h6> Total Pendiente</h6>
                                         </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-row">
                                                    <div class="col-sm-3 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm"> Particulares Pendientes</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copagos Pendientes</label>
                                                            <input class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Efectivo Pendiente</label>
                                                            <input type="number" disabled="disabled" class="form-control form-control-sm" type="text" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--INFO LIQUIDACION-->
                                <div class="tab-pane fade show" id="a_pagar_prof" role="tabpanel" aria-labelledby="a_pagar_prof-tab">
                                    <form>
                                        <div class="form-row">

                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Fecha Inicio Liq</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_inicio" id="edit_empleado_fecha_inicio">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Fecha Termino Liq</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_termino" id="edit_empleado_fecha_termino">
                                            </div>
                                            <div class="col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm mt-3"><strong>Valor Total</strong></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm mt-3">$:.......</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                               <h6> Haberes</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">N° Bonos Físico</label>
                                                <input type="number" class="form-control form-control-sm" name="edit_empleado_monto_imponible" id="edit_empleado_monto_imponible">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Valores Fonasa</label>
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_caja_compensacion_porcentaje" id="edit_empleado_caja_compensacion_porcentaje" value="N/A">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Valores Isapre</label>
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_caja_compensacion_porcentaje" id="edit_empleado_caja_compensacion_porcentaje" value="N/A">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Valores Particulares</label>
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_caja_compensacion_porcentaje" id="edit_empleado_caja_compensacion_porcentaje" value="N/A">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                               <h6> Descuentos</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Valor a pagar a Institución</label>
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_caja_compensacion_porcentaje" id="edit_empleado_caja_compensacion_porcentaje" value="N/A">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Valores Recibidos</label>
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_caja_compensacion_porcentaje" id="edit_empleado_caja_compensacion_porcentaje" value="N/A">
                                            </div>
                                            <div class="col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm mt-3"><strong>Valor Total a Pagar</strong></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm mt-3">$:.......</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="cerrarModal()"; data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info">Guardar </button>
                <button type="button" class="btn btn-primary" style="color: #3268bf;background-color: #cde0f6;border-color: #cde0f6;"><i class="feather icon-file"></i>Generar PDF</button>
            </div>
        </div>
    </div>
</div>

<script>
    function liquidacion_prof_cm() {
        $('#liquid_prof_institucion').modal('show');
    }
    function cerrarModal() {
        $('#liq_prof_institucion').modal('hide');
      }
</script>
