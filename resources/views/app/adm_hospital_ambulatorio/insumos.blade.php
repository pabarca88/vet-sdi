@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Inventario</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.administracion_cm') }}">Administracion del centro médico</a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.insumos') }}">Inventario</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Insumos y medicamentos</h4>
                              <button type="button" class="btn btn-success btn-sm d-inline float-right" onclick="agregar_producto();"><i class="feather icon-plus"></i>Agregar productos</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>
                    <table id="inventario_insumos" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Nº lote /código</th>
                                <th class="text-center align-middle">Producto</th>
                                <th class="text-center align-middle">Stock Inicial</th>
                                <th class="text-center align-middle">Entradas</th>
                                <th class="text-center align-middle">Salidas</th>
                                <th class="text-center align-middle">Stock actual</th>
                                <th class="text-center align-middle">Sucursal</th>
                                <th class="text-center align-middle">Proveedor</th>
                                <th class="text-center align-middle">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>#8129812898</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Guantes desechables talla M</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>300</span><br>
                                </td>
                                <td class="align-middle text-center">
                                    <span>-</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>100</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>250</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Nombre sucursal</span>
                                </td> 
                                <td class="align-middle text-center">
                                    <span>Nombre Proveedor</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_producto();"><i class="feather icon-edit"></i> Editar producto</button>
                                </td>                                                                    
                            </tr>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>#37283728</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Jeringa Desechable 5 mL</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>1050</span><br>
                                </td>
                                <td class="align-middle text-center">
                                    <span>-</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>50</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>1000</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Nombre sucursal</span>
                                </td> 
                                <td class="align-middle text-center">
                                    <span>Nombre Proveedor</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-danger btn-sm" onclick="quitar_producto();"><i class="feather icon-plus"></i> Quitar producto</button>
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_producto();"><i class="feather icon-edit"></i> Editar producto</button>
                                </td>                                                          
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->
<!--Modal agregar producto-->
<div id="agregar_producto_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_producto_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar productos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nº lote / código</label>
                                <input class="form-control form-control-sm" name="codigo_lote" id="codigo_lote" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Nombre del producto</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Cantidad</label>
                                <input class="form-control form-control-sm" name="cantidad" id="cantidad" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Vencimiento</label>
                                <input class="form-control form-control-sm" name="vencimiento" id="vencimiento" type="date">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Proveedor</label>
                                <select class="form-control form-control-sm" name="proveedor" id="proveedor">
                                    <option>Seleccione una opción</option>
                                    <option>Nombre del Proveedor</option>
                                    <option>Nombre del Proveedor</option>
                                    <option>Nombre del Proveedor</option>
                                    <option>etc..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Sucursal</label>
                                <select class="form-control form-control-sm" name="sucursal" id="sucursal">
                                    <option>Seleccione una opción</option>
                                    <option>Nombre de la sucursal que se ingresan los productos</option>
                                    <option>Nombre de la sucursal que se ingresan los productos</option>
                                    <option>Nombre de la sucursal que se ingresan los productos</option>
                                    <option>etc..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Agregar producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal quitar producto cm-->
<div id="quitar_producto_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="quitar producto_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">
                    Quitar productos
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nº lote / código</label>
                                <input class="form-control form-control-sm" name="codigo_lote" id="codigo_lote" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Nombre del producto</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Cantidad</label>
                                <input class="form-control form-control-sm" name="cantidad" id="cantidad" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Quitar productos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal editar producto cm-->
<div id="editar_producto_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_producto_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">
                    Editar producto
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
             <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nº lote / código</label>
                                <input class="form-control form-control-sm" name="codigo_lote" id="codigo_lote" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Nombre del producto</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Cantidad</label>
                                <input class="form-control form-control-sm" name="cantidad" id="cantidad" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Vencimiento</label>
                                <input class="form-control form-control-sm" name="vencimiento" id="vencimiento" type="date">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Proveedor</label>
                                <select class="form-control form-control-sm" name="proveedor" id="proveedor">
                                    <option>Seleccione una opción</option>
                                    <option>Nombre del Proveedor</option>
                                    <option>Nombre del Proveedor</option>
                                    <option>Nombre del Proveedor</option>
                                    <option>etc..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Sucursal</label>
                                <select class="form-control form-control-sm" name="sucursal" id="sucursal">
                                    <option>Seleccione una opción</option>
                                    <option>Nombre de la sucursal que se ingresan los productos</option>
                                    <option>Nombre de la sucursal que se ingresan los productos</option>
                                    <option>Nombre de la sucursal que se ingresan los productos</option>
                                    <option>etc..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection