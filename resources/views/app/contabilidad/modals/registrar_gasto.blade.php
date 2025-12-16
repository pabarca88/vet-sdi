<div id="registrar_gasto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_gasto" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
           <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Registrar Gastos</h5>
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
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo Documento</label>
                                <select class="form-control form-control-sm" id="tipo_doc">
                                    <option>Seleccione opci&oacute;n</option>
                                    <option value="AL">Factura</option>
                                    <option value="LA">Boleta</option>
                                    <option value="VA">Guia De Despacho</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha Ingreso</label>
                                <input type="date" class="form-control form-control-sm" name="f_ingreso" id="f_ingreso">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre" type="name" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email" >
                            </div>
                        </div>
                    
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                <input class="form-control form-control-sm" name="telefono" id="telefono" type="phone" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Direcci&oacute;n / Calle / N&uacute;mero</label>
                                <input class="form-control form-control-sm" name="direccion_asist" id="direccion_asist" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione  opci&oacute;n</option>
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valparaíso</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione opci&oacute;n</option>
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valparaíso</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Detalle</label>
                                <input class="form-control form-control-sm" name="detalle" id="email" type="detalle" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Unidades</label>
                                <input class="form-control form-control-sm" name="numero" id="numero" type="email" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Valor a Pagar</label>
                                <input class="form-control form-control-sm" name="costo" id="costo" type="number" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="imp" checked="">
                                    <label for="imp" class="cr"></label>
                                </div>
                                <label>Imprimir</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="correo-1" checked="">
                                    <label for="correo-1" class="cr"></label>
                                </div>
                                <label>Enviar Documento por Email</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 mt-3">
                    <!--Tabla-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Mes</th>
                                    <th class="text-center align-middle">N&deg; Atenciones</th>
                                    <th class="text-center align-middle">&#37;</th>
                                    <th class="text-center align-middle">Descuentos</th>
                                    <th class="text-center align-middle">A Pagar</th>
                                    <th class="text-center align-middle">ver PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle"><span>03/12/20</span></td>
                                    <td class="text-center align-middle">Noviembre</td>
                                    <td class="text-center align-middle">120</td>
                                    <td class="text-center align-middle"><span>30</span></td>
                                    <td class="text-center align-middle">35000</td>
                                    <td class="text-center align-middle">1165000</td>
                                    <td class="text-center align-middle">
                                    <button class="btn btn-danger btn-sm btn-info"><i class="feather icon-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <!--Cierre Tabla-->
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar </button>
            </div>
        </div>
    </div>
</div>