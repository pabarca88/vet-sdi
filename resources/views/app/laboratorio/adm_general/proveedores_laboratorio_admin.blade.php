@extends('template.laboratorio.adm_general.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Proveedores</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="administracion.php">Administración</a></li>
                            <li class="breadcrumb-item"><a href="proveedores_laboratorio_admin.php">Proveedores</a></li>
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
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Proveedores</h4>
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-outline-light btn-sm" onclick="agregar_proveedor();"><i class="feather icon-plus"></i>Agregar proveedor</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>
                    <table id="proveedores_lab" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Proveedor</th>
                                <th class="text-center align-middle">Tipo de proveedor</th>
                                <th class="text-center align-middle">Dirección</th>
                                <th class="text-center align-middle">Contacto</th>
                                <th class="text-center align-middle">Editar</th>
                                <th class="text-center align-middle">Habilitar /<br> deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>Todo Guantes</span>
                                </td>
                                 <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="productos_proveedor();" data-toggle="tooltip" data-placement="top" title="Ver productos"><i class="feather icon-home"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <span>-</span><br>

                                </td>
                                <td class="align-middle text-center">
                                    <span>ventas@todoguantes.cl</span><br>
                                    <span>+56 9 9858 5882</span><br>
                                    <span>+56 9 9858 5882</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_proveedor();"><i class="feather icon-edit"></i> Editar</button>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="form-check">
                                      <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                    </div>
                                </td>                                                           
                            </tr>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>MP Medical</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="productos_proveedor();" data-toggle="tooltip" data-placement="top" title="Ver productos"><i class="feather icon-home"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <span>San Nicolás 795</span><br>
                                    <span>Santiago de Chile</span><br>
                                    <span>Región Metropolitana</span>

                                </td>
                                <td class="align-middle text-center">
                                    <span>ventas@todoguantes.cl</span><br>
                                    <span>+56 9 9858 5882</span><br>
                                    <span>+56 9 9858 5882</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_proveedor();"><i class="feather icon-edit"></i> Editar</button>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="form-check">
                                      <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                    </div>
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

<!--Modal agregar gastos laboratorio -->
<div id="agregar_proveedor_lab" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_proveedor_lab" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar proveedor</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Proveedor</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="f-12">Tipo de proveedor</label>
                                <input class="form-control" type="text" value="" data-role="tagsinput"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Comuna</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <optgroup label="Valparaíso">
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valparaíso</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Agregar proveedor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal editar gastos laboratorio-->
<div id="editar_proveedor_lab" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_proveedor_lab" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">
                    Editar proveedor
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
             <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Proveedor</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre" type="text">
                            </div>
                        </div>
                         <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="f-12">Tipo de proveedor</label>
                                <input class="form-control" type="text" value="" data-role="tagsinput"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Comuna</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <optgroup label="Valparaíso">
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valparaíso</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal productos proveedor -->
<div id="productos_proveedor_lab" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="productos_proveedor_lab" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Productos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Guantes de latex</li>
                    <li>Guantes de nitrilo</li>
                    <li>Alcohol</li>
                    <li>Alcohol etilico</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
/*-Tabla-*/
$(document).ready(function() {
    $('#proveedores_lab').DataTable({
        responsive: true,
    });
});

/*-Modals Proveedores-*/
    function agregar_proveedor (){
        $('#agregar_proveedor_lab').modal('show');
    }

    function editar_proveedor (){
        $('#editar_proveedor_lab').modal('show');
    }

    function productos_proveedor () {
        $('#productos_proveedor_lab').modal('show');
    }

</script>


@endsection