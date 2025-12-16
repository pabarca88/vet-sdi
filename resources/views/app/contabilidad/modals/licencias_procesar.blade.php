<div id="procesar_licencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="procesar_licencia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Procesar Licencia M&eacute;dica</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Licencia</label>
                                <input type="number" class="form-control form-control-sm" name="num_lic" id="num_lic">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Inicio Reposo</label>
                                <input class="form-control form-control-sm" name="f_inic_rep" id="f_inic_rep" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">T&eacute;rmino Reposo</label>
                                <input class="form-control form-control-sm" name="f_fin_rep" id="f_fin_rep" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">D&iacute;as de Licencia</label>
                                <input class="form-control form-control-sm" name="dias_lic" id="dias_lic" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                                <div class="col-md-12 mb-3">
                                </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12 mb-3">
                                <div style="overflow-x:auto;">
                                    <table id="tabla_m_liq_3_meses" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                        <thead>
                                            <tr>
                                                <td class="text-center " colspan="5">Cotizaciones 3 &Uacute;ltimos Meses</td>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle">Mes</th>
                                                <th class="text-center align-middle">N&deg;liquid</th>
                                                <th class="text-center align-middle">licencia ant</th>
                                                <th class="text-center align-middle">Previsi&oacute;n</th>
                                                <th class="text-center align-middle">Acci&oacute;n</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>Mayo</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>00212</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>No</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Fonasa</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                    <i class="feather icon-edit"></i> adjuntar</button>
                                                </td>                                                                        
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>Junio</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>00222</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>No</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Fonasa</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                    <i class="feather icon-edit"></i> adjuntar</button>
                                                </td>                                                                        
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>Julio</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>00412</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span><strong>No</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Fonasa</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                    <i class="feather icon-edit"></i> adjuntar</button>
                                                </td>                                                                           
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="lic_cont" checked="">
                                        <label for="lic_cont" class="cr"></label>
                                    </div>
                                    <label>Certificado de Cotizaciones</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="lic_cont1" checked="">
                                        <label for="lic_cont1" class="cr"></label>
                                    </div>
                                    <label>Adjuntar Copia Contrato</label>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Enviar  </button>
            </div>
        </div>
    </div>
</div>