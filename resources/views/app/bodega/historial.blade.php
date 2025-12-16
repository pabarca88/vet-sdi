@extends('template.adm_cm.template')
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
                                                    <button class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button>
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
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

<script>
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

    function editar_producto_inventario(){
        alert('editar');
    }
</script>
