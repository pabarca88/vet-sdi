@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
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
        <div class="col-md-12">
            <!--Card Nav Pills-->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                        <li class="nav-item active">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="ingresos-tab" data-toggle="tab" href="#ingresos" role="tab" aria-controls="ingresos" aria-selected="false">Ingresos</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="salidas-tab" data-toggle="tab" href="#salidas" role="tab" aria-controls="salidas" aria-selected="false">Salidas</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="traslados-tab" data-toggle="tab" href="#traslados" role="tab" aria-controls="salidas" aria-selected="false">Traslados entre sucursales</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="rechazados-tab" data-toggle="tab" href="#rechazados" role="tab" aria-controls="salidas" aria-selected="false">Rechazados o devueltos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Historial Almacen</h4>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="Profesionales_cm">
                        <div class="tab-pane fade active show" id="ingresos" role="tabpanel" aria-labelledby="ingresos-tab">
                            <div class="row">
                                <div class="col-12">
                                    <table class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%" id="tabla_productos_historial">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Imagen</th>

                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ingresos as $producto)
                                            <tr>
                                                <td>{{ $producto->created_at }}</td>
                                                <td><img src="{{ $producto->image_path }}" alt="foto" style="width: 100px;"></td>

                                                <td>{{ $producto->producto }}</td>
                                                <td>{{ $producto->cantidad }}</td>
                                                <td>{{ $producto->tipo_producto }}</td>
                                                <td>{{ $producto->observaciones }}</td>
                                                <td>
                                                    <button class="btn btn-outline-primary btn-sm" onclick="ver_producto_inventario({{ $producto->id }})"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-outline-warning btn-sm" onclick="editar_producto_inventario({{ $producto->id }})"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-outline-danger btn-sm" onclick="eliminar_producto_inventario({{ $producto->id }})"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="salidas" role="tabpanel" aria-labelledby="salidas-tab">
                            <div class="row">
                                <div class="col-12">
                                    <table class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%" id="tabla_productos_historial_salida">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Imagen</th>

                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pedidos as $producto)
                                            <tr>
                                                <td>{{ $producto->created_at }}</td>
                                                <td><img src="{{$producto->image_path }}" alt="foto" style="width: 100px;"></td>

                                                <td>{{ $producto->producto }}</td>
                                                <td>{{ $producto->cantidad_entregada }}</td>
                                                <td>{{ $producto->tipo_producto }}</td>
                                                <td>{{ $producto->usuario }}</td>
                                                <td>
                                                    <button class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-outline-warning btn-sm" onclick="editar_producto_inventario({{ $producto->id }})"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-outline-danger btn-sm" onclick="eliminar_producto({{ $producto->id }})"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="traslados" role="tabpanel" aria-labelledby="traslados-tab">
                            <div class="row">
                                <div class="col-12">
                                    <table class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%" id="tabla_productos_historial_traslados">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Imagen</th>

                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Origen</th>
                                                <th scope="col">Destino</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pedidos as $producto)
                                            <tr>
                                                <td>{{ $producto->created_at }}</td>
                                                <td><img src="{{asset($producto->producto->image_path) }}" alt="foto" style="width: 100px;"></td>

                                                <td>{{ $producto->producto->nombre }}</td>
                                                <td>{{ $producto->cantidad }}</td>
                                                <td>{{ $producto->bodegaOrigen->nombre }}</td>
                                                <td>{{ $producto->bodegaDestino->nombre }}</td>
                                                <td>{{ $producto->producto->tipo_producto }}</td>
                                                <td>{{ $producto->responsable->name }}</td>
                                                <td>
                                                    <button class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-outline-warning btn-sm" onclick="editar_producto_inventario({{ $producto->producto->id }})"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-outline-danger btn-sm" onclick="eliminar_producto({{ $producto->producto->id }})"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rechazados" role="tabpanel" aria-labelledby="rechazados-tab">
                            <div class="row">
                                <div class="col-12">
                                    <table class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%" id="tabla_productos_historial_traslados">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Imagen</th>

                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($devoluciones as $producto)
                                            <tr>
                                                <td>{{ $producto->created_at }}</td>
                                                <td><img src="{{asset($producto->producto->image_path) }}" alt="foto" style="width: 100px;"></td>

                                                <td>{{ $producto->producto->nombre }}</td>
                                                <td>{{ $producto->cantidad }}</td>
                                                <td>{{ $producto->producto->tipo_producto }}</td>
                                                <td>{{ $producto->responsable->name }}</td>
                                                <td>
                                                    <button class="btn btn-outline-primary btn-sm" onclick="ver_producto_inventario({{ $producto->producto->id }})"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-outline-warning btn-sm" onclick="editar_producto_inventario({{ $producto->producto->id }})"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-outline-danger btn-sm" onclick="eliminar_producto({{ $producto->producto->id }})"><i class="fas fa-trash"></i></button>
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
@endsection

@section('modales')
<!-- Modal Editar Producto Inventario -->
<div class="modal fade" id="editarProductoInventarioModal" tabindex="-1" role="dialog" aria-labelledby="editarProductoInventarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarProductoInventarioModalLabel">Editar Producto Inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="editarProductoInventarioForm">
                    <input type="hidden" id="id_producto_editar" name="id_producto_editar">
                    <!-- Imagen del producto -->
                    <div class="form-group">
                        <label for="imagen_producto_editar">Imagen del Producto</label>
                        <img src="" alt="Imagen del producto" id="imagen_producto_editar" class="img-fluid mb-2" style="max-width: 200px;">
                    </div>
                    <!-- Campo para editar Imagen del Producto -->
                    <div class="form-group">
                        <label for="nueva_imagen_producto_editar">Cambiar Imagen del Producto</label>
                        <input type="file" class="form-control-file" id="nueva_imagen_producto_editar" name="nueva_imagen_producto_editar" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="nombre_producto_editar">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre_producto_editar" name="nombre_producto_editar" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad_producto_editar">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad_producto_editar" name="cantidad_producto_editar" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_producto_editar">Tipo de Producto</label>
                        <input type="text" class="form-control" id="tipo_producto_editar" name="tipo_producto_editar" required>
                    </div>
                    <div class="form-group">
                        <label for="observaciones_producto_editar">Observaciones</label>
                        <textarea class="form-control" id="observaciones_producto_editar" name="observaciones_producto_editar" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarCambiosProducto()">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Editar Producto Inventario -->
<!-- Modal Ver Detalle Producto Inventario -->
<div class="modal fade" id="verDetalleProductoInventarioModal" tabindex="-1" role="dialog" aria-labelledby="verDetalleProductoInventarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verDetalleProductoInventarioModalLabel">Detalle del Producto Inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Imgen del producto -->
                <div class="text-center mb-3">
                    <img id="detalle_imagen_producto" src="" alt="Imagen del Producto" class="img-fluid" style="max-width: 200px;">
                </div>
                <p><strong>Nombre del Producto:</strong> <span id="detalle_nombre_producto"></span></p>
                <p><strong>Cantidad:</strong> <span id="detalle_cantidad_producto"></span></p>
                <p><strong>Tipo de Producto:</strong> <span id="detalle_tipo_producto"></span></p>
                <p><strong>Observaciones:</strong> <span id="detalle_observaciones_producto"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Ver Detalle Producto Inventario -->
@endsection
@section('page-script')
<script>
    function guardarCambiosProducto(){
        var id = $('#id_producto_editar').val();
        var nombre = $('#nombre_producto_editar').val();
        var cantidad = $('#cantidad_producto_editar').val();
        var tipo = $('#tipo_producto_editar').val();
        var observaciones = $('#observaciones_producto_editar').val();
        var nueva_imagen = $('#nueva_imagen_producto_editar')[0].files[0];

        var formData = new FormData();
        formData.append('id', id);
        formData.append('nombre', nombre);
        formData.append('cantidad', cantidad);
        formData.append('tipo', tipo);
        formData.append('observaciones', observaciones);
        if(nueva_imagen){
            formData.append('nueva_imagen', nueva_imagen);
        }
        formData.append('_token', "{{ csrf_token() }}");

        var url = "{{ route('bodegas.editar_producto')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data);
                if(data.estado == 'ok'){
                    //cerrar modal
                    $('#editarProductoInventarioModal').modal('hide');
                    swal({
                        title: "Éxito",
                        text: "Producto actualizado correctamente",
                        icon: "success",
                    }).then(() => {
                        location.reload();
                    })
                }
            }
        });
    }

    function eliminar_producto_inventario(id){
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no podrás recuperar este producto!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_producto_inventario(id);
            }
        });
    }

    function confirmar_eliminar_producto_inventario(id){
        var url = "{{ route('bodegas.eliminar_producto')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(data){
                console.log(data);
                if(data == 'ok'){
                    alert('Producto eliminado');
                    location.reload();
                }
            }
        });
    }

    function ver_producto_inventario(id){
        var url = "{{ route('bodegas.dame_producto_inventario')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(data){
                console.log(data);
                let image_path = "{{ asset('') }}/" + data.image_path;
                $('#detalle_nombre_producto').text(data.producto);
                $('#detalle_cantidad_producto').text(data.cantidad);
                $('#detalle_tipo_producto').text(data.tipo_producto);
                $('#detalle_observaciones_producto').text(data.observaciones);
                $('#detalle_imagen_producto').attr('src', image_path);
                $('#verDetalleProductoInventarioModal').modal('show');
            }
        });
    }

   function editar_producto_inventario(id){
        dame_producto_inventario(id);
    }

    function dame_producto_inventario(id){
        var url = "{{ route('bodegas.dame_producto_inventario')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(data){
                console.log(data);
                $('#id_producto_editar').val(data.id);
                let image_path = "{{ asset('') }}/" + data.image_path;
                $('#imagen_producto_editar').attr('src', image_path);
                $('#nombre_producto_editar').val(data.producto);
                $('#cantidad_producto_editar').val(data.cantidad);
                $('#tipo_producto_editar').val(data.tipo_producto);
                $('#observaciones_producto_editar').val(data.observaciones);
                $('#editarProductoInventarioModal').modal('show');
            }
        });
    }



</script>
@endsection
