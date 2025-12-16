<div id="registrar_remuneracion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_remuneracion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar remuneracio&oacute;n</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha Pagar</label>
                                <input type="date" class="form-control form-control-sm" name="f_pago" id="f_pago">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_trabajador" id="nombre_trabajador" type="text" >
                            </div>
                        </div>
                    </div>
                    <div  class="modal-header">
                        <h5 class="modal-title text-black text-center">Desglose Haberes</h5>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Sueldo Base</label>
                                <input class="form-control form-control-sm" name="s_base" id="s_base" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Otros Ingresos Imponibles</label>
                                <input class="form-control form-control-sm" name="ot_haberes" id="ot_haberes" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Total Haberes Imponibles</label>
                                <input class="form-control form-control-sm" name="total_haberes_imp" id="total_haberes_imp" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Asignaciones Familiares</label>
                                <input class="form-control form-control-sm" name="a_Fam" id="a_Fam" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Movilizaci&oacute;n</label>
                                <input class="form-control form-control-sm" name="moviliz" id="moviliz" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Colaci&oacute;n</label>
                                <input class="form-control form-control-sm" name="colacion" id="colacion" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Horas Extra</label>
                                <input class="form-control form-control-sm" name="t_h_extra" id="t_h_extra" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Gratificaciones</label>
                                <input class="form-control form-control-sm" name="t_gratif" id="t_gratif" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Total Haberes</label>
                                <input class="form-control form-control-sm" name="t_haberes" id="t_haberes" type="text">
                            </div>
                        </div>
                    </div>

                    <div  class="modal-header">
                        <h5 class="modal-title text-black text-center">Descuentos Previsionales</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Cotizaci&oacute;n Previsional</label>
                                <input class="form-control form-control-sm" name="a_Fam" id="a_Fam" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Cotizaci&oacute;n Salud</label>
                                <input class="form-control form-control-sm" name="salud" id="salud" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Cotizaci&oacute;n Voluntaria</label>
                                <input class="form-control form-control-sm" name="cot_vol" id="cot_vol" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Seguro de Cesant&iacute;a</label>
                                <input class="form-control form-control-sm" name="s_cesantia" id="s_cesantia" type="text">
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Total Descuentos Previsionales</label>
                                <input class="form-control form-control-sm" name="t_desc_prev" id="t_desc_prev" type="number" >
                            </div>
                        </div>
                    </div>
                    <div  class="modal-header">
                        <h5 class="modal-title text-black text-center">Otros Descuentos</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Glosa Otro Descuento</label>
                                <input class="form-control form-control-sm" name="o_desc" id="o_desc" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Total Otros Descuentos</label>
                                <input class="form-control form-control-sm" name="to_o_desc" id="to_o_desc" type="number" >
                            </div>
                        </div>
                    </div>
                    <div  class="modal-header">
                        <h5 class="modal-title text-black text-center">Sueldo L&iacute;quido</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Total Sueldo L&iacute;quido</label>
                                <input class="form-control form-control-sm" name="s_liquido" id="s_liquido" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <button type="submit" class="btn btn-info">enviar c&oacute;digo recibo </button>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Enviar por correo electr&oacute;nico</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar </button>
            </div>
        </div>
    </div>
</div>