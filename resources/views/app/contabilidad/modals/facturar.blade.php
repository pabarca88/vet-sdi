<div id="facturar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="facturar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Datos de Facturaci&oacute;n</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut Cliente</label>
                                <input type="number" class="form-control form-control-sm" name="rut cliente" id="rut">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Giro</label>
                                <input type="text" class="form-control form-control-sm" name="giro" id="giro">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo Documento</label>
                                <select class="form-control form-control-sm" id="region">
                                    <option>Seleccione opci&oacute;n</option>
                                    <option value="AL">Factura</option>
                                    <option value="LA">Boleta</option>
                                    <option value="VA">Gu&iacute;a de Despacho</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input type="name" class="form-control form-control-sm" name="nombre" id="nombre">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion" type="address-line1">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                <input class="form-control form-control-sm" name="telef" id="telef" type="tel" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                <select class="form-control form-control-sm" id="region">
                                    <option>Seleccione opci&oacute;n</option>
                                    <optgroup label="Valparaíso">
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm"  id="region">
                                    <option>Seleccione opci&oacute;n</option>
                                    <optgroup label="Valparaíso">
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email" >
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-sm-12">
                        <div class="form-group fill" style="background-color: #EEEEEE">
                            <h6 class="text-center">Detalle de Compra</h6>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Articulo</label>
                                <input type="number" class="form-control form-control-sm" name="art" id="art">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Cantidad</label>
                                <input type="text" class="form-control form-control-sm" name="art_cant" id="art_cant">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Valor Unit</label>
                                <input type="name" class="form-control form-control-sm" name="art_valor_unit" id="art_valor_unit">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Valor Tot</label>
                                <input type="name" class="form-control form-control-sm" name="art_valor_total" id="art_valor_total">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <button type="button" class="btn btn-success btn-sm"><i class="feather icon-edit"></i> Agregar</button>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div style="overflow-x:auto;">
                            <table id="#" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                <thead>
                                    <tr>
                                        <td class="text-center " colspan="6">Detalle de Compra</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle">Cod_art</th>
                                        <th class="text-center align-middle">Nombre_art</th>
                                        <th class="text-center align-middle">N&deg;/ Cantidad</th>
                                        <th class="text-center align-middle">Valor Neto</th>
                                        <th class="text-center align-middle">Descuentos</th>
                                        <th class="text-center align-middle">Acci&oacute;n</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span>00212</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span><strong>Atenciones de Laboratorio</strong></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span><strong>100</strong></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span><strong>150.000</strong></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>20%</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-success btn-sm">
                                            <i class="feather icon-edit"></i> eliminar</button>
                                        </td>                                                                        
                                    </tr>
                                   <tr>
                                        <td class="align-middle text-center">
                                            <span>00212</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span><strong>Atenciones de Laboratorio</strong></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span><strong>100</strong></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span><strong>150.000</strong></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>20%</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-success btn-sm">
                                            <i class="feather icon-edit"></i> eliminar</button>
                                        </td>                                                                        
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span>00212</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span><strong>Atenciones de Laboratorio</strong></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span><strong>100</strong></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span><strong>150.000</strong></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>20%</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-success btn-sm">
                                            <i class="feather icon-edit"></i> eliminar</button>
                                        </td>                                                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="lic_cont" checked="">
                                    <label for="lic_cont" class="cr"></label>
                                </div>
                                <label>Facturar</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="lic_cont1" checked="">
                                    <label for="lic_cont1" class="cr"></label>
                                </div>
                                <label>Enviar Factura</label>
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