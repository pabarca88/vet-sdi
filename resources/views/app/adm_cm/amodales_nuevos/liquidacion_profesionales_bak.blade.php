<div id="liquidar_prof" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="liq_prof_institucion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine">Detalle Liquidación Profesionales Institución:</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span onclick="cerrarModal()"; aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Profesional: <span id="nombre_profesional_liquidacion"></span></p>
                <p>Convenios: <span id="convenios_profesional_liquidacion"></span></p>
                <p>Valor: <span id="valor_profesional_liquidacion"></span></p>
                <p>Tipo Atención: <span id="tipo_atencion_liquidacion"></span></p>
                <form>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="liq_profes_inst" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="fonasa_liq_inst-tab" data-toggle="tab" href="#fonasa_liq_inst" role="tab" aria-controls="fonasa_liq_inst" aria-selected="false">Fonasa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="isapre_liq_inst-tab" data-toggle="tab" href="#isapre_liq_inst" role="tab" aria-controls="isapre_liq_inst" aria-selected="false">Isapres</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="particular_liq_inst-tab" data-toggle="tab" href="#particular_liq_inst" role="tab" aria-controls="particular_liq_inst" aria-selected="false">particulares y efectivo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="info_contrato_pers_convenio-tab" data-toggle="tab" href="#info_contrato_pers_convenio" role="tab" aria-controls="info_contrato_pers_convenio" aria-selected="false">Información bancaria</a>
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
                                <!--INFO FONASA-->
                                <div class="tab-pane fade show active" id="fonasa_liq_inst" role="tabpanel" aria-labelledby="fonasa_liq_inst-tab">
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
                                                            <input class="form-control form-control-sm" type="text" id="n_bonos_mes_fonasa">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Copago</label>
                                                            <input class="form-control form-control-sm" type="text" id="total_copago_mes_fonasa">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Seguros</label>
                                                            <input class="form-control form-control-sm" type="text" id="total_seguros_mes_fonasa">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">bonificación a Cobrar</label>
                                                            <input class="form-control form-control-sm" type="text" id="bonificacion_mes_fonasa">
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
                                                            <input class="form-control form-control-sm" type="text" id="n_bonos_profesional_fonasa">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago Recibidos</label>
                                                            <input class="form-control form-control-sm" type="text" id="n_copagos_profesional_fonasa">
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
                                                            <input class="form-control form-control-sm" type="text" id="n_bonos_pendientes_fonasa">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago pendiente</label>
                                                            <input class="form-control form-control-sm" type="text" id="n_copagos_pendientes_fonasa">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Valor Enviado a Cobro (bonif+seguros)</label>
                                                            <input class="form-control form-control-sm" type="text" id="valor_enviado_fonasa_cobro">
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
                                                            <input class="form-control form-control-sm" type="text" id="n_bonos_mes_isapre">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Copago</label>
                                                            <input class="form-control form-control-sm" type="text" id="total_copago_mes_isapre">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Seguros</label>
                                                            <input class="form-control form-control-sm" type="text" id="total_seguros_mes_isapre">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">bonificación a Cobrar</label>
                                                            <input class="form-control form-control-sm" type="text" id="bonificacion_mes_isapre">
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
                                                            <input class="form-control form-control-sm" type="text" id="n_bonos_recibidos_isapre">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago Recibidos</label>
                                                            <input class="form-control form-control-sm" type="text" id="total_copagos_recibidos_mes_isapre">
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
                                                            <input class="form-control form-control-sm" type="text" id="n_bonos_pendientes_mes_isapre">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago pendiente</label>
                                                            <input class="form-control form-control-sm" type="text" id="total_copagos_pendientes_isapre">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Valor Enviado a Cobro (bonif+seguros)</label>
                                                            <input class="form-control form-control-sm" type="text" id="valor_enviado_cobro_isapre">
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
                                                            <input class="form-control form-control-sm" type="text" id="n_atenciones">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Valor Particulares</label>
                                                            <input class="form-control form-control-sm" type="text" id="valor_particular">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copagos recibidos</label>
                                                            <input class="form-control form-control-sm" type="text" id="total_copagos_recibidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Efectivo Recibido</label>
                                                            <input type="number" disabled="disabled" class="form-control form-control-sm" type="text" id="total_efectivo_recibido">
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
                                                            <input class="form-control form-control-sm" type="text" id="n_particulares_pendientes">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copagos Pendientes</label>
                                                            <input class="form-control form-control-sm" type="text" id="n_copagos_pendientes">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Efectivo Pendiente</label>
                                                            <input type="number" disabled="disabled" class="form-control form-control-sm" type="text" id="total_efectivo_pendiente">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- DATOS BANCARIOS -->
                                <div class="tab-pane fade" id="info_contrato_pers_convenio" role="tabpanel" aria-labelledby="info_contrato_pers_convenio-tab">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h5>Datos Bancarios Para Dep&oacute;sito</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Banco</label>
                                                <select class="form-control form-control-sm" name="banco_nuevo_profesional_convenio" id="banco_nuevo_profesional_convenio">
                                                    <option value="0">Seleccione opci&oacute;n</option>
                                                    @foreach($bancos as $banco)
                                                        <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">N&deg; Cuenta</label>
                                                <input class="form-control form-control-sm" name="n_cta_nuevo_profesional_convenio" id="n_cta_nuevo_profesional_convenio" type="number" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Sucursal</label>
                                                <input class="form-control form-control-sm" name="sucursal_nuevo_profesional_convenio" id="sucursal_nuevo_profesional_convenio" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="contenedor_cuentas_bancarias_profesional">

                                    </div>
                                </div>
                                <!--INFO LIQUIDACION-->
                                <div class="tab-pane fade show" id="a_pagar_prof" role="tabpanel" aria-labelledby="a_pagar_prof-tab">
                                    <form>
                                        <div class="form-row">

                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Fecha Inicio Liq</label>
                                                <input type="date" class="form-control form-control-sm" name="fecha_inicio_profesional_convenio" id="fecha_inicio_profesional_convenio">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Fecha Termino Liq</label>
                                                <input type="date" class="form-control form-control-sm" name="fecha_termino_profesional_convenio" id="fecha_termino_profesional_convenio">
                                            </div>
                                            <div class="col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm"><strong>Mes</strong></label>
                                                    <select name="mes_liquidacion" id="mes_liquidacion" class="form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Enero</option>
                                                        <option value="2">Febrero</option>
                                                        <option value="3">Marzo</option>
                                                        <option value="4">Abril</option>
                                                        <option value="5">Mayo</option>
                                                        <option value="6">Junio</option>
                                                        <option value="7">Julio</option>
                                                        <option value="8">Agosto</option>
                                                        <option value="9">Septiembre</option>
                                                        <option value="10">Octubre</option>
                                                        <option value="11">Noviembre</option>
                                                        <option value="12">Diciembre</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-md-3">

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
                                                <input type="number" class="form-control form-control-sm" name="dcto_institucion_convenio" id="dcto_institucion_convenio" value="N/A">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Valores Recibidos</label>
                                                <input type="number" class="form-control form-control-sm" name="dcto_valores_recibidos_convenio" id="dcto_valores_recibidos_convenio" value="N/A">
                                            </div>
                                            <div class="col-sm-3 col-md-3">

                                            </div>
                                            <div class="col-sm-3 col-md-3">

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
                <button type="button" class="btn btn-info" onclick="liquidar_profesional_institucion()">Guardar </button>
                <button type="button" class="btn btn-primary" onclick="generar_pdf_liquidacion()" style="color: #3268bf;background-color: #cde0f6;border-color: #cde0f6;"><i class="feather icon-file"></i>Generar PDF</button>
            </div>
        </div>
    </div>
</div>

<script>
    function liquidar_profesional_institucion(){
        let id_institucion = $('#id_institucion').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        // fonasa
        let n_bonos_mes_fonasa = $('#n_bonos_mes_fonasa').val();
        let total_copago_mes_fonasa = $('#total_copago_mes_fonasa').val();
        let total_seguros_mes_fonasa = $('#total_seguros_mes_fonasa').val();
        let bonificacion_mes_fonasa = $('#bonificacion_mes_fonasa').val();
        let n_bonos_profesional_fonasa = $('#n_bonos_profesional_fonasa').val();
        let n_copagos_profesional_fonasa = $('#n_copagos_profesional_fonasa').val();
        let n_bonos_pendientes_fonasa = $('#n_bonos_pendientes_fonasa').val();
        let n_copagos_pendientes_fonasa = $('#n_copagos_pendientes_fonasa').val();
        let valor_enviado_fonasa_cobro = $('#valor_enviado_fonasa_cobro').val();

        // isapre
        let n_bonos_mes_isapre = $('#n_bonos_mes_isapre').val();
        let total_copago_mes_isapre = $('#total_copago_mes_isapre').val();
        let total_seguros_mes_isapre = $('#total_seguros_mes_isapre').val();
        let bonificacion_mes_isapre = $('#bonificacion_mes_isapre').val();
        let n_bonos_recibidos_isapre = $('#n_bonos_recibidos_isapre').val();
        let total_copagos_recibidos_mes_isapre = $('#total_copagos_recibidos_mes_isapre').val();
        let n_bonos_pendientes_mes_isapre = $('#n_bonos_pendientes_mes_isapre').val();
        let total_copagos_pendientes_isapre = $('#total_copagos_pendientes_isapre').val();
        let valor_enviado_cobro_isapre = $('#valor_enviado_cobro_isapre').val();

        // particulares
        let n_atenciones = $('#n_atenciones').val();
        let valor_particular = $('#valor_particular').val();
        let total_copagos_recibidos = $('#total_copagos_recibidos').val();
        let total_efectivo_recibido = $('#total_efectivo_recibido').val();
        let n_particulares_pendientes = $('#n_particulares_pendientes').val();
        let n_copagos_pendientes = $('#n_copagos_pendientes').val();
        let total_efectivo_pendiente = $('#total_efectivo_pendiente').val();

        // información banco
        let banco = $('#banco_nuevo_profesional_convenio').val();
        let n_cta = $('#n_cta_nuevo_profesional_convenio').val();
        let sucursal = $('#sucursal_nuevo_profesional_convenio').val();
        let opt;

        // valor a pagar

        // descuentos
        let dcto_institucion_convenio =$('#dcto_institucion_convenio').val();
        let dcto_valores_recibidos_convenio =$('#dcto_valores_recibidos_convenio').val();

        // FECHAS
        let fecha_inicio = $('#fecha_inicio_profesional_convenio').val();
        let fecha_termino = $('#fecha_termino_profesional_convenio').val();
        let mes_liquidacion = $('#mes_liquidacion').val();

        console.log(dcto_institucion_convenio);
        console.log(dcto_valores_recibidos_convenio);

        let descuentos = dcto_institucion_convenio - dcto_valores_recibidos_convenio;

        let valido = 1;
        let mensaje = '';


        if(banco == 0){
            valido = 0;
            mensaje += '<li>Debe selecciona un banco </li>';
        }
        if(n_cta == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un numero de cuenta </li>';
        }
        if(sucursal == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una sucursal </li>';
        }

        if(descuentos == 0 || descuentos == '' || descuentos == null){
            valido = 0;
            mensaje += "<li>Debe ingresar descuentos </li>";
        }

        if(n_atenciones == '' || n_atenciones == 0 || n_atenciones == null){
            valido = 0;
            mensaje += "<li>Debe ingresar número de atenciones </li>";
        }

        if(fecha_inicio == '' || fecha_inicio == null){
            valido = 0;
            mensaje += "<li>Debe ingresar fecha inicio de liquidacion </li>";
        }
        if(fecha_termino == '' || fecha_termino == null){
            valido = 0;
            mensaje += "<li>Debe ingresar fecha termino de liquidacion </li>";
        }

        console.log(valido);

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let url = "{{ ROUTE('adm_cm.liquidar_profesional') }}";

        let data = {
            _token:CSRF_TOKEN,
            n_bonos_mes_fonasa: n_bonos_mes_fonasa,
            total_copago_mes_fonasa: total_copago_mes_fonasa,
            total_seguros_mes_fonasa: total_seguros_mes_fonasa,
            bonificacion_mes_fonasa: bonificacion_mes_fonasa,
            n_bonos_profesional_fonasa: n_bonos_profesional_fonasa,
            n_copagos_profesional_fonasa: n_copagos_profesional_fonasa,
            n_bonos_pendientes_fonasa: n_bonos_pendientes_fonasa,
            n_copagos_pendientes_fonasa: n_copagos_pendientes_fonasa,
            valor_enviado_fonasa_cobro: valor_enviado_fonasa_cobro,
            n_bonos_mes_isapre: n_bonos_mes_isapre,
            total_copago_mes_isapre: total_copago_mes_isapre,
            total_seguros_mes_isapre: total_seguros_mes_isapre,
            bonificacion_mes_isapre: bonificacion_mes_isapre,
            n_bonos_recibidos_isapre: n_bonos_recibidos_isapre,
            total_copagos_recibidos_mes_isapre: total_copagos_recibidos_mes_isapre,
            n_atenciones: n_atenciones,
            n_bonos_pendientes_mes_isapre: n_bonos_pendientes_mes_isapre,
            total_copagos_pendientes_isapre: total_copagos_pendientes_isapre,
            valor_enviado_cobro_isapre: valor_enviado_cobro_isapre,
            valor_particular: valor_particular,
            total_copagos_recibidos: total_copagos_recibidos,
            total_efectivo_recibido: total_efectivo_recibido,
            n_particulares_pendientes: n_particulares_pendientes,
            n_copagos_pendientes: n_copagos_pendientes,
            total_efectivo_pendiente: total_efectivo_pendiente,
            id_lugar_atencion: id_lugar_atencion,
            opt: opt,
            banco: banco,
            n_cta: n_cta,
            sucursal: sucursal,
            id_institucion: id_institucion,
            id_profesional: id_profesional,
            descuentos: descuentos,
            fecha_inicio: fecha_inicio,
            fecha_termino: fecha_termino
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(data){
                console.log(data);
                if (data != null) {
                    if(data.estado == 'OK'){
                        swal({
                            title: "Registro Exitoso",
                            text: data.message,
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                        $('#card_body_profesionales_contratados').empty();
                        $('#card_body_profesionales_contratados').append(data.v);
                    }else{
                        swal({
                            title: "Error",
                            text: data.msj,
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }
                } else {
                    swal({
                        title: "Error",
                        text: "Error al registrar profesional",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
      }
</script>


