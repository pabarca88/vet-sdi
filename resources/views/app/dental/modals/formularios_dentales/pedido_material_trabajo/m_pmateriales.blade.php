<div id="modal_pedido_materiales" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_pedido_materiales" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Pedido materiales Dentales</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body mb-0">
                <form id="modal_pedido_materiales">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre Material</label>
                            <input type="text" class="form-control form-control-sm" name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Pedir a :</label>
                            <select id="lugar_pedido" name="lugar_pedido" class="form-control form-control-sm">
                                <option selected value="0">Seleccione una opción </option>
                                <option>Bodega del Centro</option>
                                <option>Proveedor</option>
                                <option>Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm-activo-sm">Fecha</label>
                            <input type="date" class="form-control form-control-sm" name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Cantidad</label>
                            <input type="person" class="form-control form-control-sm" name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Uso en:</label>
                            <input type="number" class="form-control form-control-sm" name="" id="">
                        </div>
                    </div>
                </form>
                <ul class="nav nav-pills mt-3 mb-4" id="pills-ext" role="tablist">
                    <li class="nav-item">
                        <!---*******  Pedido materiales con autorización administrador genera petición de código autorización********-->
                        <a class="nav-link-modal" id="pills-tab-extcvb" data-toggle="pill" href="#extcvb" role="tab"
                            aria-controls="pills-tab-extcvb" aria-selected="false">Solicitar Visto Bueno</a>
                    </li>
                </ul>
                <div class="tab-content" id="extsvb">
                    <div class="tab-pane fade show active" id="pills-tab-extsvb" role="tabpanel"
                        aria-labelledby="pills-tab-extsvb">
                        <form id="extsvb">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Nombre Proveedor</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Dirección</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Email</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="2" name=""
                                        id=""></textarea>
                                </div>
                                <div class="col-sm-12 col-md-12 text-center mb-2">
                                    <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                                </div>
                            </div>
                            <div class="modal-footer pt-2 pb-0">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-info">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
