<div id="finiquito" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="finiquito" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Finiquito Trabajador</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Rut</label><!--carga los datos de la empresa, del trabajador para el pdf-->
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Causal Finiquito</label>
                            <input type="text" class="form-control form-control-sm" name="causal" id="causal">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Fecha Ingreso a Empresa</label><!--carga los datos de la empresa, del trabajador para el pdf-->
                            <input type="number" class="form-control form-control-sm" name="f_ingrsoemp" id="f_ingrsoemp">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Fecha Salida Empresa</label>
                            <input type="number" class="form-control form-control-sm" name="f_salidaemp" id="f_salidaemp">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill" style="background-color: #EEEEEE">
                            <h6 class="text-center">Promedios Variables &Uacute;ltimos tres meses</h6>
                        </div>
                    </div>
                    <div class="col-sm-4"><!--carga los datos de liquidaciones de últimos 3 meses de trabajo-->
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Mes 1</label>
                            <input class="form-control form-control-sm" name="mes_1" id="mes_1" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Mes 2</label>
                            <input class="form-control form-control-sm" name="mes_2" id="mes_2" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Mes 3</label>
                            <input class="form-control form-control-sm" name="mes_3" id="mes_3" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill" style="background-color: #EEEEEE">
                            <h6 class="text-center">Vacaciones</h6>
                        </div>
                    </div>
                    <div class="col-sm-2"><!--carga los datos de liquidaciones de últimos 3 meses de trabajo-->
                        <div class="form-group">
                            <label class="floating-label-activo-sm">A&ntilde;os</label>
                            <input class="form-control form-control-sm" name="vac_anios" id="vac_anios" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-1"><!--carga los datos de liquidaciones de últimos 3 meses de trabajo-->
                        <div class="form-group">
                            <label class="floating-label-activo-sm">vac</label>
                            <input class="form-control form-control-sm" name="diasvacporanios" id="diasvacporanios" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Meses</label>
                            <input class="form-control form-control-sm" name="vac_meses" id="vac_meses" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-1"><!--carga los datos de liquidaciones de últimos 3 meses de trabajo-->
                        <div class="form-group">
                            <label class="floating-label-activo-sm">vac</label>
                            <input class="form-control form-control-sm" name="diasvac_meses" id="diasvac_meses" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">D&iacute;as</label>
                            <input class="form-control form-control-sm" name="vac_dias" id="vac_dias" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-1"><!--carga los datos de liquidaciones de últimos 3 meses de trabajo-->
                        <div class="form-group">
                            <label class="floating-label-activo-sm">vac</label>
                            <input class="form-control form-control-sm" name="diasvac_dias" id="diasvac_dias" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Total</label>
                            <input class="form-control form-control-sm" name="total_vac" id="total_vac" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-3"><!--carga los datos de liquidaciones de últimos 3 meses de trabajo-->
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Progresivos</label>
                            <input class="form-control form-control-sm" name="progresivos" id="progresivos" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">D&iacute;as Tomados</label>
                            <input class="form-control form-control-sm" name="dias_tomados" id="dias_tomados" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Saldo H&aacute;biles</label>
                            <input class="form-control form-control-sm" name="saldohab" id="saldohab" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Saldo H&aacute;b.+Inh&aacute;b.</label>
                            <input class="form-control form-control-sm" name="habmasinhab" id="habmasinhab" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill" style="background-color: #EEEEEE">
                            <h6 class="text-center">Datos Para el C&aacute;lculo del Finiquito</h6>
                        </div>
                    </div>
                    <div class="col-sm-3"><!--carga los datos de liquidaciones de últimos 3 meses de trabajo-->
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Sueldo Base</label>
                            <input class="form-control form-control-sm" name="sueldo_base" id="sueldo_base" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Gratificaci&oacute;n Legal</label>
                            <input class="form-control form-control-sm" name="grat_legal" id="grat_legal" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Moviliz.y Colaci&oacute;n</label>
                            <input class="form-control form-control-sm" name="mov_colac" id="mov_colac" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-3"><!--carga los datos de liquidaciones de últimos 3 meses de trabajo-->
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Prom/variab/&uacute;lt 3 meses</label>
                            <input class="form-control form-control-sm" name="promedio" id="promedio" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill" style="background-color: #EEEEEE">
                            <h6 class="text-center">Tope Indemnizaci&oacute;n</h6>
                        </div>
                    </div>
                    <div class="#">
                        <div class="form-group">
                            <!--<label class="floating-label-activo-sm">valor hoy de UF</label>-->
                            <input class="form-control form-control-sm" name="valor_UF" id="valor_UF" type="hidden" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">90 UF</label>
                            <input class="form-control form-control-sm" name="tope_uf" id="tope_uf" type="text" ><!--valor hoy de UF mult por 90-->
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Para Indemnizaci&oacute;n</label>
                            <input class="form-control form-control-sm" name="uf_indem" id="uf_indem" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill" style="background-color: #EEEEEE">
                            <h5 class="text-center">Items Indemnizaci&oacute;n</h5>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Gratificaci&oacute;n</label>
                            <input class="form-control form-control-sm" name="gratif" id="gratif" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Vacaciones</label>
                            <input class="form-control form-control-sm" name="vacac" id="vacac" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Mes de Aviso</label>
                            <input class="form-control form-control-sm" name="mes_aviso" id="mes_aviso" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Aporte emp. seguro cesant&iacute;a</label>
                            <input class="form-control form-control-sm" name="ap_seg_ces" id="ap_seg_ces" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">indemnizaci&oacute;n Acordada</label>
                            <input class="form-control form-control-sm" name="indem_acord" id="indem_acord" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Remuneraciones mes act&uacute;al</label>
                            <input class="form-control form-control-sm" name="sueld_mes" id="sueld_mes" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Descuentos</label>
                            <input class="form-control form-control-sm" name="desc_por" id="desc_por" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Prestamos por Pagar</label>
                            <input type="hidden" name="afp" value="11,44%" />
                            <input class="form-control form-control-sm" name="prest_adeud" id="prest_adeud" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">D&iacute;as no trabajados</label>
                            <input type="hidden" name="seg" value="0,6%" />
                            <input class="form-control form-control-sm" name="desc_dias_notrab" id="desc_dias_notrab" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Descuentos totales</label>
                            <input type="hidden" name="salud" value="7%" />
                            <input class="form-control form-control-sm" name="desc_totales" id="desc_totales" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Total del Finiquito</label>
                            <input class="form-control form-control-sm" name="t_finiquito" id="t_finiquito" type="number" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-finiquito" checked="">
                                <label for="correo-finiquito" class="cr"></label>
                            </div>
                            <label>Notificar por correo electr&oacute;nico</label>
                        </div>
                    </div>
                            
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-finiquito_doc" checked="">
                                <label for="correo-finiquito_doc" class="cr"></label>
                            </div>
                            <label>Acompa&ntilde;ar doc para firma Notarial</label>
                        </div>
                    </div>
                </div>
            </div><!--****transformar en pdf todo el documento hacer el scrpts de calculo segun excel(en carpeta documento)****-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar </button>
            </div>
        </div>
    </div>
</div>