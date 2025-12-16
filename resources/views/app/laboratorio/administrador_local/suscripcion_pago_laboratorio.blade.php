@extends('template.laboratorio.administrador_local.template')
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Suscripción y pagos</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio_admin_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="suscripcion_pago_laboratorio.php">Suscripción y pagos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Plan-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h6 class="text-primary f-18 mb-0">Plan actual</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mt-2 d-inline">
                                    <h6>Nombre del plan premium o básico</h6>
                                    <p class="text-secondary">Plan Mensual</p>
                                    <!--<p class="text-secondary">Plan Anual</p>-->
                                </div>
                                <div class="col-md-6 text-right d-inline">
                                    <button type="button" class="btn btn-outline-primary btn-sm sweet-multiple">Cancelar Suscripción</button>
                                </div>
                            </div>
                            <!--Eliminar Row  de info cuando sea una cuenta básica-->
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <p>Su próximo pago será de <strong>23.990 CLP</strong>, a efectuarse el día <strong>10 de oct. de 2021</strong> Su pago se renovará automáticamente todos los meses.</p>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <!--Método de pago-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h6 class="text-primary f-18 mb-0">Método de pago</h6>
                        </div>
                        <div class="card-body pro-det-edit collapse show" id="metodo_pago_1">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <p class="text-secondary">•••• •••• •••• 1244</p>
                                </div>
                                <div class="col-md-6 mt-3 text-right">
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false" aria-controls="pro-det-edit-1 pro-det-edit-2">
                                    Actualizar Tarjeta
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pro-det-edit collapse" id="metodo_pago_2">
                            <form>
                                <div class="form-row mb-0">
                                    <div class="form-group col-md-4
                                     ">
                                    <label class="floating-label">Nombre del titular</label>
                                    <input type="text" class="form-control form-control-sm" name="num_tarjeta" id="num_tarjeta">
                                    </div>
                                    <div class="form-group col-md-4
                                     ">
                                    <label class="floating-label">Nº Tarjeta de Crédito</label>
                                    <input type="text" class="form-control form-control-sm" name="num_tarjeta" id="num_tarjeta"><!--Que en este formulario aparezca la tarjeta identificada al escribir el numero con el icono de la tarjeta-->
                                    </div>
                                    <div class="form-group col-md-2
                                     ">
                                    <label class="floating-label">DD/MM</label>
                                    <input type="text" class="form-control form-control-sm" name="ddmm" id="ddmm">
                                    </div>
                                    <div class="form-group col-md-2
                                     ">
                                    <label class="floating-label">CVC</label>
                                    <input type="text" class="form-control form-control-sm" name="cvc" id="cvc">
                                    </div>
                                </div>
                                <div class="form-row mb-0">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Cancelar</button>
                                        <button type="submit" class="btn btn-outline-primary btn-sm">Guardar Cambios</button>
                                    </div>
                                </div>
                            </form>
                        </div>   
                    </div>
                </div>
            </div>
            <!--Facturación-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h6 class="text-primary f-18 mb-0">Facturación</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <p class="text-secondary">Último pago: 10/09/21</p>
                                </div>
                                <div class="col-md-6 mt-3 text-right">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#historial_facturacion">Historial de Facturación</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#datos_facturacion">Modificar datos de Facturación</button>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!--Footer-->
    <footer>
        <?php
        require_once('../include/footer.php');
        ?>
    </footer>

    <!-- Modal Historial Facturación -->
    <div id="historial_facturacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="historial_facturacion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                   <h5 class="modal-title text-white text-center">Historial de facturación</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                              <i class="feather icon-alert-circle"></i> La factura se generará 24 horas después de que hayamos recibido el pago.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 my-3">
                            <h4 class="text-c-blue f-20">Facturas</h4>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <table id="tabla_facturacion" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">Suscripción</th>
                                        <th class="align-middle text-center">Fecha</th>
                                        <th class="align-middle text-center">Valor</th>
                                        <th class="align-middle text-center">Estado</th>
                                        <th class="align-middle text-center">Factura</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-center">Medichile</td>
                                        <td class="align-middle text-center">20/11/2021</td>
                                        <td class="align-middle text-center">$5.990 CLP</td>
                                        <td class="align-middle text-center">
                                            <span class="badge badge-danger">No pagado</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-info btn-sm"><i class="feather icon-download"></i> Descargar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">Medichile</td>
                                        <td class="align-middle text-center">15/11/2021</td>
                                        <td class="align-middle text-center">$5.990 CLP</td>
                                        <td class="align-middle text-center">
                                            <span class="badge badge-warning">Por pagar</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-info btn-sm"><i class="feather icon-download"></i> Descargar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">Medichile</td>
                                        <td class="align-middle text-center">12/10/2021</td>
                                        <td class="align-middle text-center">$5.990 CLP</td>
                                        <td class="align-middle text-center">
                                            <span class="badge badge-success">Pagado</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-info btn-sm"><i class="feather icon-download"></i> Descargar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Datos Facturación -->
    <div id="datos_facturacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="datos_facturacion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                   <h5 class="modal-title text-white text-center">Datos de facturación</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                <i class="feather icon-alert-circle"></i> Los cambios en tus datos de facturación serán efectivos a partir de tu siguiente factura.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Nombre completo</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_facturacion" id="nombre_facturacion">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Email</label>
                                <input type="text" class="form-control form-control-sm" name="email_facturacion" id="email_facturacion">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">País</label>
                                <select class="form-control form-control-sm" name="pais_facturacion" id="pais_facturacion">
                                    <option>Seleccione una opción</option>>
                                    <option value="AL">Chile</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Dirección</label>
                                <input type="text" class="form-control form-control-sm" name="direccion_facturacion" id="direccion_facturacion">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Región / Ciudad</label>
                                <select class="form-control form-control-sm" name="ciudad_facturacion" id="ciudad_facturacion">
                                    <option>Seleccione</option>
                                    <optgroup label="Valparaíso">
                                        <option>Viña del Mar</option>
                                        <option>La Calera</option>
                                        <option>Valparaíso</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>   
                    </div>
                </div>
                <div class="modal-footer text-right">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                   <button type="submit" class="btn btn-info">Guardar Cambios</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
	@endsection
