<div id="rec_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rec_producto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recepci&oacute;n de Productos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="label" id="label_f_recepcion">Fecha Recepci&oacute;n</label>
                            </div>
                        </div>
                        <div class="col-sm-6" id="f_recepcion">
                            <div class="form-group fill">
                                 <script>
                                    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                                    var f=new Date();
                                    document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                </script>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Factura-N&uacute;mero</label>
                                <input class="form-control form-control-sm" name="num_fact" id="num_fact" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">C&oacute;digo de Producto</label>
                                <input class="form-control form-control-sm" name="cod_prod" id="cod_prod" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nombre Producto</label>
                                 <input class="form-control form-control-sm" name="nombre_prod" id="nombre_prod" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"> Cantidad </label>
                                <input class="form-control form-control-sm" name="cant_prod" id="cant_prod" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Categor&iacute;a</label>
                                <select class="form-control form-control-sm" id="categoria">
                                    <option>Seleccione  opci&oacute;n</option>
                                    <optgroup label="Farmacia">
                                        <option value="AL">Medicamentos</option>
                                        <option value="LA">Desinfectantes</option>
                                        <option value="VA">Sanitizadores</option>
                                        <option value="VA">Aseo Quir&uacute;rgico</option>
                                    </optgroup>
                                    <optgroup label="Insumos">
                                        <option value="AL">Librer&iacute;a</option>
                                        <option value="LA">Materiales de Aseo</option>
                                        <option value="VA">otro</option>
                                        <option value="VA">Otro</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Proveedor</label>
                                <input class="form-control form-control-sm" name="proveedor" id="proveedor" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                                <button type="button" class="btn btn-success btn-sm float-right">
                                <i class="fa fa-plus"></i> Agregar Otro Producto</button>
                        </div>
                        <br>   
                        <div class="col-sm-12 mt-3">
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Codigo</th>
                                            <th class="text-center align-middle">Nombre</th>
                                            <th class="text-center align-middle">cantidad</th>
                                            <th class="text-center align-middle">proveedor</th>
                                            <th class="text-center align-middle">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/21</span></td>
                                            <td class="text-center align-middle">7217821-5</td>
                                            <td class="text-center align-middle">resina pqte</td>
                                            <td class="text-center align-middle">2</td>
                                            <td class="text-center align-middle">Profarma</td>
                                            <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--Cierre Tabla-->
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Enviar C&oacute;digo</button>
                        <button type="submit" class="btn btn-info mb-0" >Recibir Conforme</button>
                </div>
            </div>
        </div>
    </div>
</div>

