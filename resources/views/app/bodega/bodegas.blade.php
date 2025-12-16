@extends('template.adm_cm.template')
@section('content')
<script>

    window.onload = function(){
        // que la tabla se inicialice con dataTable
        $('#existencia_total').DataTable();
    }

    function mensaje(msj,tipo){
        swal({
            title: msj,
            icon: tipo,
            button: "Ok",
        });
    }

    function agregarBodega(){
        // abrir modal
        $('#modalBodega').modal('show');  
    }

    function editarBodega(){
        // abrir modal
        $('#modalBodega_editar').modal('show');  
    }

    function buscarProductosBodega(){
        var bodega = $('#bodega_').val();
        if(bodega == ''){
            return mensaje('Seleccione una bodega','warning');
        }
        $.ajax({
            url: "{{ route('bodegas.buscarProductosBodega') }}",
            type: 'POST',
            data: {
                bodega: bodega,
                _token: "{{ csrf_token() }}"
            },
            success: function(response){
                
                console.log(response);
                let productos = response[0];
                let opt = response[1];
                let bodega = response[2];
                // si no hay bodega es bodega principal
                if(bodega == null){
                    bodega = {
                        nombre: 'Principal', 
                        direccion: 'Principal', 
                        telefono: 'Principal', 
                        email: 'Principal', 
                        responsable: 'Principal'
                    };
                }
                $('#info_bodega').empty();
                $('#info_bodega').append(`
                    <p><strong>Bodega:</strong> ${bodega.nombre}</p>
                    <p><strong>Dirección:</strong> ${bodega.direccion}</p>
                    <p><strong>Telefono:</strong> ${bodega.telefono}</p>
                    <p><strong>Email:</strong> ${bodega.email}</p>
                    <p><strong>Responsable:</strong> ${bodega.responsable}</p>
                `);
                console.log(productos);
                // usar el datatable en existencia_total
                $('#existencia_total').DataTable().destroy();
                $('#existencia_total tbody').empty();
                if(opt == 1){
                    productos.forEach(p => {
                    $('#existencia_total tbody').append(`
                        <tr>
                            <td class="text-center align-middle">${p.codigo_interno}</td>
                            <td class="text-center align-middle">${p.nombre_producto}</td>
                            <td class="text-center align-middle">${p.stock_actual}</td>
                            <td class="text-center align-middle">${p.unidad_medida}</td>
                            <td class="text-center align-middle">${p.marca}</td>
                            <td class="text-center align-middle">
                                <button class="btn btn-outline-danger btn-sm" onclick="devolverProductoBodega( `+p.id+`)">Devolver</button>
                            </td>
                        </tr>
                    `);
                });
                }else{
                    productos.forEach(p => {
                        let clase = '';
                        let button = '';
                        if(p.stock_actual == 0){
                            clase = 'bg-danger text-white';
                            button = `<button class="btn btn-outline-warning btn-sm" onclick="solicitarCompra(${p.id})">Solicitar Compra</button>`;
                        } else{
                            button = `<button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalEditarProducto" onclick="asignarProductoBodega(${p.id})">Asignar</button>`;
                        }
                    $('#existencia_total tbody').append(`
                        <tr class="${clase}">
                            <td class="text-center align-middle">${p.codigo_interno}</td>
                            <td class="text-center align-middle">${p.nombre_producto}</td>
                            <td class="text-center align-middle">${p.stock_actual}</td>
                            <td class="text-center align-middle">${p.unidad_medida}</td>
                            <td class="text-center align-middle">${p.marca}</td>
                            <td class="text-center align-middle">
                                ${button}
                            </td>
                        </tr>
                    `);
                });
                }
                
                $('#existencia_total').DataTable();

            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function devolverProductoBodega(idProducto){
        return mensaje('Funcion no disponible','warning');
    }

    function asignarProductoBodega(idproducto){
        dameProducto(idproducto).then(response => {
            console.log(response);
            limpiarFormularioAsignacion();
            // abrir modal con el formulario para asignar producto a bodega
            $('#modalAsignarProductoBodega').modal('show');
            $('#id_producto_asignar').val(idproducto);

            $('#codigo_interno').text(response.codigo_interno);
            $('#nombre_producto').text(response.nombre);
            $('#marca').text(response.marca);
            $('#stock_actual').text(response.stock_actual);
            $('#unidad_medida').text(response.unidad_medida);

        }).catch(error => {
            console.log(error);
        });
        
    }

    function limpiarFormularioAsignacion(){
        $('#bodega_asignacion').val('');
        $('#responsable_asignacion').val('');
        $('#cantidad_asignar').val('');
    }

    function dameProducto(idProducto){
        // realizar una promesa
        return new Promise((resolve,reject) => {
            $.ajax({
                url: "dameProducto/"+idProducto,
                type: 'get',
                success: function(response){
                    resolve(response);
                },
                error: function(error){
                    reject(error);
                }
            });
        });
    }

    function guardarAsignacion(){
        var bodega = $('#bodega_asignacion').val();
        var responsable = $('#responsable_asignacion').val();
        var producto = $('#id_producto_asignar').val();
        var cantidad = $('#cantidad_asignar').val();
        if(bodega == ''){
            return mensaje('Seleccione una bodega','warning');
        }
        // if(responsable == ''){
        //     return mensaje('Seleccione un responsable','warning');
        // }
        $.ajax({
            url: "{{ route('bodegas.guardarAsignacion') }}",
            type: 'POST',
            data: {
                bodega: bodega,
                responsable: responsable,
                producto: producto,
                cantidad: cantidad,
                _token: "{{ csrf_token() }}"
            },
            success: function(response){
                console.log(response);
                if(response == 'OK'){
                    mensaje('Producto asignado a bodega','success');
                    // cerrar modal con mensaje de exito
                    $('#modalAsignarProductoBodega').modal('hide');
                }else{
                    mensaje(response,'error');
                }
                

                
            },
            error: function(error){
                console.log(error);
            }
        });
    
    }

    function realizar_pedido(){
        // abrir modal 
        $('#modalPedido').modal('show');
    }
</script>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Bodegas</h5>

                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('comercial') }}">Administracion del centro médico</a></li>
                            <li class="breadcrumb-item"><a href="compras.php">Bodegas</a></li>
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
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Bodegas</h4>
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-outline-light btn-sm" onclick="agregarBodega();"><i class="feather icon-plus"></i>Agregar Bodega</button>
                            </div>
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-light btn-sm mx-2" onclick="realizar_pedido()">Realizar pedido</button> 
                              </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Exito!</strong> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group fill">
                                        <label for="" class="floating-label">Bodegas</label>
                                        <select name="bodega_" id="bodega_" class="form-control">
                                            <option value="0">Seleccione</option>
                                            <option value="0">Principal</option>
                                            @foreach($bodegas as $b)
                                                <option value="{{ $b->id }}">{{ $b->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-outline-primary btn-xxs btn-block" onclick="buscarProductosBodega()"><i class="fas fa-search"></i> Buscar</button>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-8">
                                            <div id="info_bodega" class="border p-3 mb-3 d-flex justify-content-between">
                                                <p>HOLA</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="border p-2 text-center">
                                                <button class="btn btn-outline-warning btn-sm" onclick="editarBodega()">Editar</button>
                                                <button class="btn btn-outline-danger btn-sm">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="existencia_total" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Codigo</th>
                                                <th class="text-center align-middle">Producto</th>
                                                <th class="text-center align-middle">Cantidad</th>
                                                <th class="text-center align-middle">Unidad de medida</th>
                                                <th class="text-center align-middle">Marca</th>
                                                <th class="text-center align-middle"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($existencia as $p)
                                            @php
                                                if($p->stock_actual == 0) $clase = 'bg-danger text-white';
                                                else $clase = '';
                                            @endphp
                                                <tr class="{{ $clase }}">
                                                    <td class="text-center align-middle">{{ $p->codigo_interno }}</td>
                                                    <td class="text-center align-middle">{{ $p->nombre_producto }}</td>
                                                    <td class="text-center align-middle ">{{ $p->stock_actual }}</td>
                                                    <td class="text-center align-middle">{{ $p->unidad_medida }}</td>
                                                    <td class="text-center align-middle">{{ $p->marca }}</td>
                                                    <td class="text-center align-middle">
                                                        @if($p->stock_actual > 0)
                                                        <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalEditarProducto" onclick="asignarProductoBodega({{ $p->id }})">Asignar</button>
                                                        @else
                                                        <button class="btn btn-outline-warning btn-sm" onclick="solicitarCompra({{ $p->id }})">Solicitar Compra</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal agregar bodega -->
<div class="modal fade" id="modalBodega" tabindex="-1" role="dialog" aria-labelledby="modalBodega" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('bodegas.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Bodega</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="alias" class="floating-label">Alias</label>
                                <input type="text" class="form-control" name="alias" id="alias">
                            </div>
                       </div>
                       <div class="col-4">
                            <div class="form-group fill">
                                <label for="" class="floating-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre">
                            </div>
                       </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="" class="floating-label">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="direccion" class="floating-label">Direccion</label>
                                <input type="text" class="form-control" name="direccion" id="direccion">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="telefono" class="floating-label">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="email" class="floating-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="responsable" class="floating-label">Responsable</label>
                                <select name="responsable" id="responsable" class="form-control">
                                    <option value="">Seleccione</option>
                                    @foreach($responsables as $r)
                                        <option value="{{ $r->id }}">{{ $r->nombre }} {{ $r->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal agregar bodega Editar-->
<div class="modal fade" id="modalBodega_editar" tabindex="-1" role="dialog" aria-labelledby="modalBodega" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('bodegas.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Bodega</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="alias" class="floating-label">Alias</label>
                                <input type="text" class="form-control" name="alias" id="alias">
                            </div>
                       </div>
                       <div class="col-4">
                            <div class="form-group fill">
                                <label for="" class="floating-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre">
                            </div>
                       </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="" class="floating-label">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="direccion" class="floating-label">Direccion</label>
                                <input type="text" class="form-control" name="direccion" id="direccion">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="telefono" class="floating-label">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="email" class="floating-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="responsable" class="floating-label">Responsable</label>
                                <select name="responsable" id="responsable" class="form-control">
                                    <option value="">Seleccione</option>
                                    @foreach($responsables as $r)
                                        <option value="{{ $r->id }}">{{ $r->nombre }} {{ $r->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal asignar producto bodega -->
<div class="modal fade" id="modalAsignarProductoBodega" tabindex="-1" role="dialog" aria-labelledby="modalAsignarProductoBodega" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Producto a Bodega</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Producto</th>
                                        <th>Marca</th>
                                        <th>Stock</th>
                                        <th>Unidad de medida</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="codigo_interno"></td>
                                        <td id="nombre_producto"></td>
                                        <td id="marca"></td>
                                        <td id="stock_actual"></td>
                                        <td id="unidad_medida"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="bodega_asignacion" class="floating-label">Bodega</label>
                                <select name="bodega_asignacion" id="bodega_asignacion" class="form-control">
                                    <option value="">Seleccione</option>
                                    @foreach($bodegas as $b)
                                        <option value="{{ $b->id }}">{{ $b->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="responsable_asignacion" class="floating-label">Responsable</label>
                                <select name="responsable_asignacion" id="responsable_asignacion" class="form-control">
                                    <option value="0">Seleccione</option>
                                    @foreach($responsables as $r)
                                        <option value="{{ $r->id }}">{{ $r->nombre }} {{ $r->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group fill">
                                <label for="cantidad_asignar" class="floating-label">Cantidad</label>
                                <input type="number" class="form-control" name="cantidad_asignar" id="cantidad_asignar" value="1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" onclick="guardarAsignacion()" >Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>

<!-- MODAL PEDIDO --> 
<div class="modal fade" id="modalPedido" tabindex="-1" role="dialog" aria-labelledby="modalAsignarProductoBodega" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Realizar pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row my-3">
                        <div class="col-md-4">
                            <div class="form-group fill p-2" id="divBuscarProducto">
                                <label for="buscar_producto" class="floating-label">Descripcion producto:</label>
                                <input type="text" class="form-control form-control-sm" id="buscar_producto">
                                <div class="my-3">
                                    <button class="btn btn-success-light-c btn-xxs d-inline float-left mb-2" onclick="buscarProducto()">Buscar</button>
                                    <button class="btn btn-danger-light-c btn-xxs d-inline float-right mb-2" onclick="ocultarBuscadorProducto()">Cancelar</button>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-8" id="div_contenedor_productos">
                            <table class="table" id="contenedor_productos">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Proveedor</th>
                                        <th>Marca</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" >Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>

<!-- Hiddens -->
<input type="hidden" id="id_producto_asignar">
<input type="hidden" id="id_bodega">
@endsection