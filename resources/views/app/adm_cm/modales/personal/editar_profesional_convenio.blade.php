<div id="editar_profesional_cm_convenio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_profesional_cm_convenio" aria-hidden="true">
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
                                    <a class="nav-link-aten text-reset active" id="editar_info-profesion_convenio-tab" data-toggle="tab" href="#editar_info-profesion_convenio" role="tab" aria-controls="editar_info-profesion" aria-selected="true">Profesión</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="editar_info-tipo_contrato_liqinst-tab" data-toggle="tab" href="#editar_info-tipo_contrato_liqinst" role="tab" aria-controls="editar_info-tipo_contrato_liqinst" aria-selected="true">Info Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="editar_info_personal-tab" data-toggle="tab" href="#editar_info_personal" role="tab" aria-controls="editar_info_personal" aria-selected="false">Información Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="editar_fonasa_liq_inst-tab" data-toggle="tab" href="#editar_fonasa_liq_inst" role="tab" aria-controls="editar_fonasa_liq_inst" aria-selected="false">Fonasa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="editar_isapre_liq_inst-tab" data-toggle="tab" href="#editar_isapre_liq_inst" role="tab" aria-controls="editar_isapre_liq_inst" aria-selected="false">Isapres</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="editar_particular_liq_inst-tab" data-toggle="tab" href="#editar_particular_liq_inst" role="tab" aria-controls="editar_particular_liq_inst" aria-selected="false">particulares y efectivo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="editar_info_contrato_pers_convenio-tab" data-toggle="tab" href="#editar_info_contrato_pers_convenio" role="tab" aria-controls="editar_info_contrato_pers_convenio" aria-selected="false">Información bancaria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="editar_a_pagar_prof-tab" data-toggle="tab" href="#editar_a_pagar_prof" role="tab" aria-controls="editar_a_pagar_prof" aria-selected="false">Valor a Pagar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="editar_horario_contrato_convenio-tab" data-toggle="tab" href="#editar_horario_contrato_convenio" role="tab" aria-controls="editar_horario_contrato" aria-selected="false">Horario</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="liq_profes_inst">
                                <!-- INFO PROFESIONAL -->
                                <div class="tab-pane fade show active" id="editar_info-profesion_convenio" role="tabpanel" aria-labelledby="editar_info-profesion_convenio-tab">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Profesi&oacute;n</label>
                                                <select name="editar_profesion_nuevo_profesional" id="editar_profesion_nuevo_profesional_convenio" class="form-control" onchange="dame_tipo_especialidad_convenio()">
                                                    <option value="0">Seleccione opci&oacute;n</option>
                                                    @foreach($especialidades as $especialidad)
                                                        <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Especialidad</label>
                                                <select name="editar_especialidad_nuevo_profesional" id="editar_especialidad_nuevo_profesional_convenio" class="form-control" onchange="dame_subtipo_especialidad()">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Sub-especialidad</label>
                                                <select name="editar_sub_especialidad_nuevo_profesional" id="editar_sub_especialidad_nuevo_profesional_convenio" class="form-control">
                                                    <option value="0">Seleccione opci&oacute;n</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INFO CONTRATO-->
                                <div class="tab-pane fade show" id="editar_info-tipo_contrato_liqinst" role="tabpanel" aria-labelledby="editar_info-tipo_contrato_liqinst-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                <a class="nav-link-aten text-reset active" id="editar_valor_fijo_pill-tab" data-toggle="tab" href="#editar_valor_fijo_pill" role="tab" aria-controls="valor_fijo_pill" aria-selected="true">Valor Fijo</a>
                                                                <a class="nav-link-aten text-reset" id="editar_valor_variable_pill-tab" data-toggle="tab" href="#editar_valor_variable_pill" role="tab" aria-controls="valor_variable_pill" aria-selected="false">Variable</a>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                <div class="tab-pane fade show active" id="editar_valor_fijo_pill" role="tabpanel" aria-labelledby="editar_valor_fijo_pill-tab">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Valor Fijo por mes</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="valor_fijo" class="floating-label-activo-sm">Valor fijo</label>
                                                                                    <input type="text" name="editar_valor_fijo" id="editar_valor_fijo" class="form-control form-control-sm" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade " id="editar_valor_variable_pill" role="tabpanel" aria-labelledby="editar_valor_variable_pill-tab">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Porcentaje</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="editar_porc_convenio">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Conf. Agenda</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="editar_conf_agenda_convenio">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Gastos Comunes</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="editar_gc_convenio">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Gastos Box</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="editar_gb_convenio">
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
                                <!-- INFO PERSONAL -->
                                <div class="tab-pane fade show" id="editar_info_personal" role="tabpanel" aria-labelledby="editar_info_personal-tab">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Rut</label>
                                                <input type="text" class="form-control form-control-sm" oninput="formatoRut(this)" name="editar_rut_nuevo_profesional_convenio" id="editar_rut_nuevo_profesional_convenio">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Fecha de Ingreso</label>
                                                <input type="date" class="form-control form-control-sm" name="editar_f_ingreso_nuevo_profesional_convenio" id="editar_f_ingreso_nuevo_profesional_convenio" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Nombre</label>
                                                <input class="form-control form-control-sm" name="editar_nombre_nuevo_profesional_convenio" id="editar_nombre_nuevo_profesional_convenio" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Primer Apellido</label>
                                                <input class="form-control form-control-sm" name="editar_apellido1_nuevo_profesional_convenio" id="editar_apellido1_nuevo_profesional_convenio" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                <input class="form-control form-control-sm" name="editar_apellido2_nuevo_profesional_convenio" id="editar_apellido2_nuevo_profesional_convenio" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="floating-label-activo-sm">Sexo</label>
                                            <select class="form-control form-control-sm" name="editar_empleado_sexo_convenio" id="editar_empleado_sexo_convenio">
                                                <option value="">Seleccione</option>
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                            <input type="date" class="form-control form-control-sm" name="editar_fecha_nacimiento_convenio" id="editar_fecha_nacimiento_convenio">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                <input class="form-control form-control-sm" name="editar_email_nuevo_profesional_convenio" id="editar_email_nuevo_profesional_convenio" type="email" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                <input class="form-control form-control-sm" name="editar_telefono1_nuevo_profesional_convenio" id="editar_telefono1_nuevo_profesional_convenio" type="number" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Tel&eacute;fono (opcional)</label>
                                                <input class="form-control form-control-sm" name="editar_telefono2_nuevo_profesional_convenio" id="editar_telefono2_nuevo_profesional_convenio" type="number" >
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Direcci&oacute;n N&deg; / Calle</label>
                                                <input class="form-control form-control-sm" name="editar_direccion_nuevo_profesional_convenio" id="editar_direccion_nuevo_profesional_convenio" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">N&deg; Dpto / Casa</label>
                                                <input class="form-control form-control-sm" name="editar_n_dpto_nuevo_profesional_convenio" id="editar_n_dpto_nuevo_profesional_convenio" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                                <select class="form-control form-control-sm" onchange="buscar_ciudad_profesional_convenio();" id="editar_region_nuevo_profesional_convenio">
                                                    <option>Seleccione opci&oacute;n</option>
                                                    @foreach($regiones as $region)
                                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Comuna</label>
                                                <select class="form-control form-control-sm" id="editar_comuna_nuevo_profesional_convenio">

                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="editar_correo-cont" checked="">
                                                    <label for="editar_correo-cont" class="cr"></label>
                                                </div>
                                                <label>Notificar por correo electr&oacute;nico</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INFO FONASA-->
                                <div class="tab-pane fade show" id="editar_fonasa_liq_inst" role="tabpanel" aria-labelledby="editar_fonasa_liq_inst-tab">
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
                                                            <input class="form-control form-control-sm" type="text" id="editar_n_bonos_mes_fonasa">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Copago</label>
                                                            <input class="form-control form-control-sm" type="text" id="editar_total_copago_mes_fonasa">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total Seguros</label>
                                                            <input class="form-control form-control-sm" type="text" id="editar_total_seguros_mes_fonasa">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">bonificación a Cobrar</label>
                                                            <input class="form-control form-control-sm" type="text" id="editar_bonificacion_mes_fonasa">
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
                                                            <input class="form-control form-control-sm" type="text" id="editar_n_bonos_profesional_fonasa">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago Recibidos</label>
                                                            <input class="form-control form-control-sm" type="text" id="editar_n_copagos_profesional_fonasa">
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
                                                            <input class="form-control form-control-sm" type="text" id="editar_n_bonos_pendientes_fonasa">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago pendiente</label>
                                                            <input class="form-control form-control-sm" type="text" id="editar_n_copagos_pendientes_fonasa">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Valor Enviado a Cobro (bonif+seguros)</label>
                                                            <input class="form-control form-control-sm" type="text" id="editar_valor_enviado_fonasa_cobro">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--INFO ISAPRES-->
                                <div class="tab-pane fade show" id="editar_isapre_liq_inst" role="tabpanel" aria-labelledby="editar_isapre_liq_inst-tab">
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
                                <div class="tab-pane fade show" id="editar_particular_liq_inst" role="tabpanel" aria-labelledby="editar_particular_liq_inst-tab">
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
                                <div class="tab-pane fade" id="editar_info_contrato_pers_convenio" role="tabpanel" aria-labelledby="editar_info_contrato_pers_convenio-tab">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h5>Datos Bancarios Para Dep&oacute;sito</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Banco</label>
                                                <select class="form-control form-control-sm" name="editar_banco_nuevo_profesional_convenio" id="editar_banco_nuevo_profesional_convenio">
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
                                                <input class="form-control form-control-sm" name="editar_n_cta_nuevo_profesional_convenio" id="editar_n_cta_nuevo_profesional_convenio" type="number" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Sucursal</label>
                                                <input class="form-control form-control-sm" name="editar_sucursal_nuevo_profesional_convenio" id="editar_sucursal_nuevo_profesional_convenio" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INFO LIQUIDACION-->
                                <div class="tab-pane fade show" id="editar_a_pagar_prof" role="tabpanel" aria-labelledby="editar_a_pagar_prof-tab">
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
                                <!-- HORARIO DE TRABAJO -->
                                <div class="tab-pane fade" id="editar_horario_contrato_convenio" role="tabpanel" aria-labelledby="editar_horario_contrato_convenio-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">HORARIO DE TRABAJO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Días de Trabajo</label>
                                                <select class="js-example-basic-multiple" name="editar_dias_laborales_convenio" id="editar_dias_laborales_convenio" multiple="multiple">
                                                    <option value="1">Lunes</option>
                                                    <option value="2">Martes</option>
                                                    <option value="3">Miercoles</option>
                                                    <option value="4">Jueves</option>
                                                    <option value="5">Viernes</option>
                                                    <option value="6">Sabado</option>
                                                    <option value="7">Domingo</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora entrada</label>
                                                <input type="time" class="form-control form-control-sm" id="editar_hora_entrada_convenio" name="editar_hora_entrada_convenio" value="08:00">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora salida</label>
                                                <input type="time" class="form-control form-control-sm" id="editar_hora_salida_convenio" name="editar_hora_salida_convenio" value="19:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora Inicio Colación</label>
                                                <input type="time" class="form-control form-control-sm" id="editar_hora_entrada_colacion_convenio" name="editar_hora_entrada_colacion_convenio" value="12:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora término colación</label>
                                                <input type="time" class="form-control form-control-sm" id="editar_hora_salida_colacion_convenio" name="editar_hora_salida_colacion_convenio" value="13:00">
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
                <button type="button" class="btn btn-warning" onclick="editar_convenio_profesional()">Editar </button>
                <button type="button" class="btn btn-primary" style="color: #3268bf;background-color: #cde0f6;border-color: #cde0f6;"><i class="feather icon-file"></i>Generar PDF</button>
            </div>
        </div>
    </div>
</div>

<script>
    function buscar_ciudad_editar_prof_convenio(id_ciudad = 0) {
        return new Promise((resolve, reject) => {
            let region = $('#editar_region_nuevo_profesional_convenio').val();
            console.log(region);
            let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    region: region,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#editar_comuna_nuevo_profesional_convenio');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    });

                    if (id_ciudad != 0) {
                        ciudades.val(id_ciudad);
                    }

                    resolve(); // Resuelve la promesa cuando se hayan cargado las ciudades
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                    reject("Error al cargar las ciudades"); // Rechaza la promesa en caso de error
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
                reject(thrownError); // Rechaza la promesa en caso de fallo en la solicitud AJAX
            });
        });
    }
</script>
