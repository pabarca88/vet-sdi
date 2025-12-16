@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Rechazos o devoluciones</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" data-toggle="tooltip" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('comercial') }}">Administración del centro médico {{ $institucion->nombre }}</a></li>
                            <li class="breadcrumb-item">Devoluciones</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Devoluciones de productos</h4>
                </div>
                <div class="card-body">
                    <!-- Buscador de productos -->
                    <div class="form-group row">
                        <label for="buscador_producto" class="col-sm-2 col-form-label font-weight-bold">Buscar producto:</label>
                        <div class="col-sm-8">
                            <input type="text" id="buscador_producto" class="form-control" placeholder="Ingrese nombre o código de producto">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary" id="btn_buscar_producto"><i class="feather icon-search"></i> Buscar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <!-- Resultados de búsqueda -->
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-hover" id="tabla_resultados_productos">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Producto</th>
                                            <th>Código</th>
                                            <th>Stock</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Aquí se mostrarán los productos encontrados -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-info">
                                <h5 class="font-weight-bold">Instrucciones</h5>
                                <p>1. Utiliza el buscador para encontrar productos por nombre o código.</p>
                                <p>2. Haz clic en el botón de devolver para seleccionar la sucursal de destino y la cantidad a devolver.</p>
                                <p>3. Confirma la devolucion y verifica que el stock se actualice correctamente.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    // Ejemplo visual: mostrar modal al seleccionar producto
    $(document).on('click', '.btn-traspasar-producto', function() {
        $('#modalSucursalesDestino').modal('show');
        var url = "{{ route('laboratorio.profesional.detalle_producto') }}";
        var id_producto = $('#id_producto_seleccionado').val();
        $.ajax({
            url: url,
            type:'get',
            data:{id_producto: id_producto},
            success: function(response){
                console.log(response);
                var info_html = '<p><strong>Producto:</strong> ' + response.producto.nombre + '</p><p><strong>Código:</strong> ' + response.producto.codigo_interno + '</p>';

                // Crear el select de bodegas
                var select_html = '<label for="select_bodega_origen"><strong>Bodega de origen:</strong></label>';
                select_html += '<select id="select_bodega_origen" class="form-control mb-2">';
                select_html += '<option value="">Seleccione bodega de origen</option>';
                response.bodegas.forEach(function(bodega){
                    select_html += '<option value="' + bodega.id + '">' + bodega.nombre + ' | ' + bodega.sucursal + ' | Stock: ' + bodega.stock_actual + '</option>';
                });
                select_html += '</select>';

                $('#info_producto_bodegas').html(info_html + select_html);
                // Si necesitas guardar el id seleccionado en un input oculto:
                $('#select_bodega_origen').change(function(){
                    $('#id_bodega_origen').val($(this).val());
                });
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    });

    // Ejemplo: agregar producto a la tabla (simulado)
    $('#btn_buscar_producto').click(function() {
        var nombre = $('#buscador_producto').val();
        var url = "{{ route('laboratorio.profesional.buscar_productos_general') }}";
        $.ajax({
            url: url,
            method: 'GET',
            data: {
                nombre: nombre,
                id_institucion: "{{ $institucion->id }}"
            },
            success: function(data) {
                console.log(data);
                var tbody = $('#tabla_resultados_productos tbody');
                var productos = data.productos;
                tbody.empty();
                productos.forEach(function(producto) {
                    var fila = '<tr>' +
                        '<td><img src="' + "/"+producto.image_path + '" alt="' + producto.nombre + '" width="50"></td>' +
                        '<td>' + producto.nombre + '</td>' +
                        '<td>' + producto.codigo_interno + '</td>' +
                        '<td>' + producto.stock_actual + '</td>' +
                        '<td><button class="btn btn-danger btn-sm" onclick="rechazar_producto(' + producto.id + ')"><i class="fas fa-trash"></i></button></td>' +
                        '</tr>';
                    tbody.append(fila);
                });
            }
        });
    });

    function guardar_id_producto(id) {
        $('#id_producto_seleccionado').val(id);
    }

    function rechazar_producto(id_producto) {
        guardar_id_producto(id_producto);
        $('#modalRechazarProducto').modal('show');
        var url = "{{ route('laboratorio.profesional.detalle_producto') }}";
        $.ajax({
            url: url,
            type:'get',
            data:{id_producto: id_producto},
            success: function(response){
                console.log(response);
                var bodegas = response.bodegas;
                var info_html = '<p><strong>Producto:</strong> ' + response.producto.nombre + '</p><p><strong>Código:</strong> ' + response.producto.codigo_interno + '</p>';
                $('#info_producto_bodegas').html(info_html);
                var select_html = '<label for="select_bodega_origen"><strong>Bodega de origen:</strong></label>';
                select_html += '<select id="select_bodega_origen" class="form-control mb-2">';
                select_html += '<option value="">Seleccione bodega de origen</option>';
                bodegas.forEach(function(bodega){
                    select_html += '<option value="' + bodega.id + '">' + bodega.nombre + ' | ' + bodega.sucursal + ' | Stock: ' + bodega.stock_actual + '</option>';
                });
                select_html += '</select>';
                $('#info_producto_bodegas').append(select_html);
                // Si necesitas guardar el id seleccionado en un input oculto:
                $('#select_bodega_origen').change(function(){
                    $('#id_bodega_origen').val($(this).val());
                });
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

    function detalle_producto_bodegas(id_producto){
        var url = "{{ route('laboratorio.profesional.detalle_producto') }}";
        $.ajax({
            url: url,
            type:'get',
            data:{id_producto: id_producto},
            success: function(response){
                console.log(response);
                $('#modalDetalleProductoBodegas').modal('show');
                // Limpia la tabla
                var tbody = $('#tablaDetalleProductoBodegas tbody');
                let producto = response.producto;
                $('#info_producto').html('<p><strong>Producto:</strong> ' + producto.nombre + '</p><p><strong>Código:</strong> ' + producto.codigo_interno + '</p>');
                tbody.empty();
                // Supongo que response.bodegas es el array de bodegas
                if(response.bodegas && response.bodegas.length > 0){
                    response.bodegas.forEach(function(bodega){
                        var fila = '<tr>' +
                            '<td>' + bodega.nombre + '</td>' +
                            '<td>' + bodega.sucursal + '</td>' +
                            '<td>' + bodega.stock_actual + '</td>' +
                            '</tr>';
                        tbody.append(fila);
                    });
                } else {
                    tbody.append('<tr><td colspan="3" class="text-center">No hay stock en ninguna bodega</td></tr>');
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

    $('#btn_confirmar_rechazo').click(function(){
        var id_producto = $('#id_producto_seleccionado').val();
        var id_bodega_origen = $('#select_bodega_origen').val();
        var cantidad_rechazo = $('#cantidad_rechazo').val();
        var observaciones = $('#observaciones').val();

        // validaciones básicas
        if(!id_bodega_origen){
            swal({
                title: "Error",
                text: "Debe seleccionar una bodega de origen.",
                icon: "error",
            });
            return;
        }
        if(cantidad_rechazo <= 0){
            swal({
                title: "Error",
                text: "La cantidad a rechazar debe ser mayor a cero.",
                icon: "error",
            });
            return;
        }

        var url = "{{ route('laboratorio.profesional.rechazar_guardar') }}";
        $.ajax({
            url: url,
            type:'post',
            data:{
                id_producto: id_producto,
                id_bodega_origen: id_bodega_origen,
                cantidad_rechazo: cantidad_rechazo,
                observaciones: observaciones,
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log(response);
                swal({
                    title: "Éxito",
                    text: "El producto ha sido rechazado/devolvido correctamente.",
                    icon: "success",
                })
                $('#modalRechazarProducto').modal('hide');
                // Aquí podrías actualizar la tabla de productos o hacer alguna otra acción
            },
            error: function(error){
                console.log(error.responseText);
                swal({
                    title: "Error",
                    text: "No se pudo procesar el rechazo. Verifique los datos e intente nuevamente.",
                    icon: "error",
                })
            }
        });
    });
</script>
@endsection

@section('modales')
<!-- Modal para seleccionar sucursal de destino -->
<div class="modal fade" id="modalRechazarProducto" tabindex="-1" role="dialog" aria-labelledby="modalRechazarProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modalRechazarProductoLabel">Rechazar Producto</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar" onclick="$('#modalRechazarProducto').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="info_producto_bodegas"></div>
                <input type="hidden" id="id_producto_seleccionado">
                <input type="hidden" id="id_bodega_origen">
                <div class="form-group">
                    <label for="cantidad_rechazo">Cantidad a rechazar</label>
                    <input type="number" id="cantidad_rechazo" class="form-control" min="1" value="1">
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea id="observaciones" class="form-control" rows="3"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modalRechazarProducto').modal('hide')">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_confirmar_rechazo">Confirmar Rechazo</button>
            </div>
        </div>
    </div>
</div>
<!--MODAL detalle producto bodegas -->
<div class="modal fade" id="modalDetalleProductoBodegas" tabindex="-1" role="dialog" aria-labelledby="modalDetalleProductoBodegasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modalDetalleProductoBodegasLabel">Detalle de ubicación</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar" onclick="$('#modalDetalleProductoBodegas').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="info_producto">

                </div>
                <table class="table" id="tablaDetalleProductoBodegas">
                    <thead>
                        <tr>
                            <th>Bodega</th>
                            <th>Sucursal</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se insertan las filas por JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
