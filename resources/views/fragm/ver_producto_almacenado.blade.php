<div class="row">
    <div class="col-md-4">
        <table class="table">
            <tr>
                <td><strong>Imagen:</strong></td>
                <td>
                    <img src="{{ $producto->image_path }}" alt="" class="w-100">
                </td>
            </tr>
            <tr>
                <td><strong>Proveedor:</strong></td>
                <td>{{ $producto->proveedor }}</td>
            </tr>
            <tr>
                <td><strong>Codigo:</strong></td>
                <td>{{ $producto->codigo_interno }}</td>
            </tr>
            <tr>
                <td><strong>Nombre:</strong></td>
                <td>{{ $producto->nombre }}</td>
            </tr>
            <tr>
                <td><strong>Descripcion:</strong></td>
                <td>{{ $producto->descripcion }}</td>
            </tr>
            <tr>
                <td><strong>Tipo Producto:</strong></td>
                <td>{{ $producto->tipo_producto }}</td>
            </tr>
            <tr>
                <td><strong>Ubicacion:</strong></td>
                <td>{{ $producto->bodega }}</td>
            </tr>
            <tr>
                <td><strong>Stock:</strong></td>
                <td>{{ $producto->stock_actual }}</td>
            </tr>
            @if(isset($temperaturas))
            <tr>
                <td><strong>Tipo Temperaturas</strong></td>
                <td>
                    <select name="id_temperatura" id="id_temperatura" class="form-control form-control-sm">
                        <option value="0">Seleccione</option>
                        @foreach($temperaturas as $t)
                        <option value="{{ $t->id }}" @if($producto->id_temperatura == $t->id) selected @endif>{{ $t->descripcion }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            @endif
            <tr>
                <td><strong>Temperatura:</strong></td>
                <td>
                    <input type="number" id="temperatura_producto" class="form-control form-control-sm" placeholder="{{ $producto->temperatura }}">
                </td>
            </tr>
            <tr>
                <td><strong>Condiciones de almacenamiento</strong></td>
                <td><input type="text" class="form-control form-control-sm" name="cond_alm" id="cond_alm"></td>
            </tr>

            <tr>
                <td><strong>Observaciones:</strong></td>
                <td>
                    <textarea class="form-control form-control-sm" id="observaciones_producto" rows="3"></textarea>
                </td>
            </tr>
        </table>
        <button class="btn btn-outline-success btn-sm my-2 w-100" onclick="editar_producto_almacenado({{ $producto->id }})"><i class="fas fa-save"></i> Guardar</button>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registros de temperaturas</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table_productos_almacenados">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Temperatura</th>
                            <th>Tipo Cuidado</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($movimientos))
                        @foreach($movimientos as $m)
                        <tr>
                            <td>{{ $m->created_at }}</td>
                            <td>{{ $m->temperatura }}°</td>
                            <td>{{ $m->tipo_temperatura }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm has-ripple" onclick="eliminar_registro_temperatura({{ $m->id }})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Observaciones Direccion de salud</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped mt-2" id="table_productos_prueba">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($movimientos_salud))
                @foreach($movimientos_salud as $m)
                <tr>
                    <td>{{ $m->created_at }}</td>
                    <td>{{ $m->usuario }}</td>
                    <td>{{ $m->stock }}</td>
                    <td>{{ $m->descripcion }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table_productos_almacenados').DataTable();
        $('#table_productos_prueba').DataTable();
    });

    function editar_producto_almacenado(id){
        var temperatura = $('#temperatura_producto').val();
        var observaciones = $('#observaciones_producto').val();
        var id_temperatura = $('#id_temperatura').val();

        var valido = 1;
        var mensaje = '';

        if(temperatura == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la temperatura del producto</li>';
        }
        if(observaciones == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar las observaciones del producto</li>';
        }
        if(id_temperatura == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el tipo de temperatura</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'div',
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }

        $.ajax({
            url: "{{ ROUTE('bodegas.editar_producto_almacenado') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "temperatura": temperatura,
                "observaciones": observaciones,
                "id_temperatura": id_temperatura
            },
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal({
                        title: 'Exito',
                        icon: 'success',
                        text: 'Producto actualizado correctamente'
                    });
                    console.log(response);
                    // $('#verSolicitud').modal('show');
                    $('#detalle_pedido_body').html(response.vista);
                }
            }
        });
    }

    function eliminar_registro_temperatura(id){
        swal({
            title: 'Advertencia',
            text: '¿Esta seguro de eliminar este registro?',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if(willDelete){
                confirmar_eliminar_registro_temperatura(id);
            }
        })
    }

    function confirmar_eliminar_registro_temperatura(id){
        $.ajax({
            url: "{{ ROUTE('bodegas.eliminar_registro_temperatura') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal({
                        title: 'Exito',
                        icon: 'success',
                        text: 'Registro eliminado correctamente'
                    });
                    $('#detalle_pedido_body').html(response.vista);
                }
            }
        });
    }
</script>
