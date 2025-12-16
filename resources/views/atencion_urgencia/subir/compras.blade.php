@extends('template.adm_cm.template')
@section('content')
<script>
    var idUnico = 0; // Inicializa la variable fuera de la función

    function mensaje(msj,tipo){
        swal({
            position: 'top-end',
            icon: tipo,
            title: msj,
            showConfirmButton: false,
            timer: 1500
        });
    }
     function agregarItem(){
        nuevoItem();
    } // agregarEvolucion  

    function guardarProveedor(e) {
        // Tu código aquí...
        e.preventDefault();
        var nombreProv = $('#nombre_prov').val();
        var provProd = $('#prov_prod').val();
        var rut = $('#rut').val();
        var email = $('#email').val();
        var telefono = $('#telefono').val();
        var telefono2 = $('#telefono2').val();
        var direccion = $('#direccion').val();
        var numero = $('#numero').val();
        var idregion = $('#region_agregar').val();
        var idcomuna = $('#comunas').val();
        var rol = $('#rol').val();

        var data = {
            nombre: nombreProv,
            tipo_producto: provProd,
            rut: rut,
            email: email,
            telefono: telefono,
            telefono2: telefono2,
            direccion: direccion,
            numero: numero,
            idregion: idregion,
            idcomuna: idcomuna,
            rol: rol
        };

        console.log(data);

        // headers para enviar el token de csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('guardarProveedorCompras') }}",
            data: data,
            success: function(response) {
                console.log(response);
                let mensaje = response.mensaje;
                if(mensaje === 'OK'){
                    limpiarFormularioProveedor();
                    // ocultar el formulario
                    $('#form_agregar_proveedor').fadeOut('slow');
                    let proveedores = response.proveedores;
                    $('#proveedor_cab').empty();
                    $('#proveedor').empty();
                    $('#proveedor_cab').append('<option value="0">Elija un Proveedor</option>');
                    $('#proveedor').append('<option value="0">Elija un Proveedor</option>');
                    proveedores.forEach(proveedor => {
                        $('#proveedor_cab').append('<option value="'+proveedor.id+'">'+proveedor.nombre+'</option>');
                        $('#proveedor').append('<option value="'+proveedor.id+'">'+proveedor.nombre+'</option>');
                    });
                } else {
                    alert('Error al guardar el proveedor');
                }
            },
            error: function(response) {
                console.log(response);
            }
        });

        return true; // Devuelve true para permitir que el formulario se envíe. Si devuelves false, el formulario no se enviará.
    }

    function guardarCompra(){
        var proveedor = $('#proveedor_cab').val();
        var fecha = $('#fecha').val();
        var nro_factura = $('#nro_factura').val();

        // validar que los campos no estén vacíos
        if(proveedor === '0'){
            // acceder a la funcion mensaje y enviarle los parametros
            return mensaje('Debe seleccionar un proveedor','error');
        }

        if(fecha === ''){
            return mensaje('Debe seleccionar una fecha','error');
        }

        if(nro_factura === ''){
            return mensaje('Debe ingresar un número de factura','error');
        }

        var data = {
            proveedor: proveedor,
            fecha: fecha,
            nro_factura: nro_factura
        };

        // headers para enviar el token de csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('guardarCompra') }}",
            data: data,
            success: function(response) {
                console.log(response);
                let mensaje = response.mensaje;
                if(mensaje === 'OK'){
                    $('#id_compra').val(response.id_compra);
                    // quitar el atributo disabled a los input dentro del div contenedor_procedimiento
                    $('#contenedor_procedimiento input').removeAttr('disabled');
                    swal({
                        title: "Compra guardada correctamente",
                        text: "Desea agregar productos a la factura?",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                        
                    }).then((result) => {
                        console.log(result);
                        if(result){
                            $('#contenedor_procedimiento').fadeIn('slow');
                        }
                    });
                    // limpiamos la tabla de productos
                    $('#productos_factura').DataTable().clear().draw();
                } else if(mensaje === 'existe') {
                    let productos = response.productos;
                    // usar la consulta swal
                    swal({
                        title: "Ya existe una factura con ese numero.",
                        text: "Desea cargar los productos de la factura?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        
                    }).then((result) => {
                        console.log(result);
                    if (result) {
                        $('#id_compra').val(response.id_compra);
                        // quitar el atributo disabled a los input dentro del div contenedor_procedimiento
                        $('#contenedor_procedimiento input').removeAttr('disabled');
                        swal({
                            title: "Productos cargados correctamente",
                            text: "Puede agregar más productos si lo desea",
                            icon: "success",
                            button: "Aceptar",
                            position:'top-right',
                            timer: 3000,
                            timerProgressBar: true,
                            toast: true,
                        })
                        $('#productos_factura').DataTable().clear().draw();
                        // mostrar los productos en la tabla
                        productos.forEach(producto => {
                            console.log(producto);
                            let precio_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(producto.precio_unitario);
                            let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);
                            let total_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(total);
                            $('#productos_factura').DataTable().row.add([
                                producto.codigo_interno,
                                producto.nombre,
                                producto.cantidad,
                                producto.unidad_medida,
                                producto.marca,
                                precio_format,
                                total_format,
                                '<button class="btn btn-danger btn-sm" onclick="eliminarItemFactura('+producto.id_item+')"><i class="fas fa-trash"></i></button>'
                            ]).draw();
                        });
                    }
                    });
                }
            },
            error: function(response) {
                console.log(response);
            }
        });

        console.log('Hola desde la función guardarCompra');
    }

    function limpiarFormularioProveedor(){
        $('#nombre_prov').val('');
        $('#prov_prod').val('');
        $('#rut').val('');
        $('#email').val('');
        $('#telefono').val('');
        $('#telefono2').val('');
        $('#direccion').val('');
        $('#numero').val('');
        $('#region_agregar').val(0);
        $('#comunas').val(0);
    }

    function buscarFacturasPorProveedor(){
    var id_proveedor = parseInt($('#proveedor').val());
    var data = {
        id_proveedor: id_proveedor
    };

    // headers para enviar el token de csrf
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: "{{ route('buscarFacturasPorProveedor') }}",
        data: data,
        success: function(response) {
            console.log(response);
            // pasar json a la tabla
            let compras =  response.compras;
            $('#tbody_compras_proveedor').empty();
            compras.forEach(compra => {
               console.log(compra);
                $('#tbody_compras_proveedor').append('<tr><td>'+compra.fecha_emision+'</td><td><a href="javascript:void(0)" onclick="buscarProductosFactura('+compra.id+')"> '+compra.numero_factura+'</a></td></tr>');
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function buscarProductosFactura(idFactura){
    //return alert('Hola desde la función buscarProductosFactura para '+idFactura);
    var data = {
        id_factura: idFactura
    };

    // headers para enviar el token de csrf
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Inicializa tu DataTable con la opción createdRow
    var table = $('#inventario_insumos').DataTable({
        destroy: true,
        createdRow: function(row, data, dataIndex) {
            $(row).addClass('text-center align-middle');
        }
    });

    $.ajax({
        type: 'POST',
        url: "{{ route('buscarProductosFactura') }}",
        data: data,
        success: function(response) {
            console.log(response);
            // pasar json a la tabla
            let productos =  response.productos;
            let factura = response.factura;
            $('#id_compra').val(factura.id);
            $('#informacion_compra').html('<p>Fecha: '+factura.fecha_emision+'<br>Proveedor: '+factura.proveedor+'<br>Factura: '+factura.numero_factura+'<br>IVA: '+factura.iva+'<br>SubTotal: '+factura.total+'</p>');
            $('#inventario_insumos').DataTable().clear().draw();
            productos.forEach(producto => {
                console.log(producto);
                let precio_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(producto.precio_unitario);
                let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);
                let total_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(total);
                $('#inventario_insumos').DataTable().row.add([
                    producto.codigo_interno,
                    producto.nombre,
                    producto.cantidad,
                    producto.unidad_medida,
                    producto.marca,
                    precio_format,
                    total_format,
                    '<button class="btn btn-danger btn-sm" onclick="eliminarItemFactura('+producto.id_item+')"><i class="fas fa-trash"></i></button>'
                ]).draw();
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function guardarItemFactura(){
    var codigo_interno = $('#codigo_interno').val();
    var id_compra = $('#id_compra').val();
    var nombre_producto = $('#nombre').val();
    var precio = $('#precio').val();
    var stock_minimo = $('#stock_minimo').val();
    var stock_maximo = $('#stock_maximo').val();
    var tipo_producto = $('#producto').val();
    var unidad_medida = $('#um').val();
    var marca = $('#marca').val();
    var cantidad = $('#cantidad').val();
    var observaciones = $('#observaciones').val();
    var lote = $('#lote').val();
    var fecha_vencimiento = $('#fecha_vencimiento').val();
    var nuevo=document.getElementById("elegir").value;
    var bodega = $('#bodega').val();


    var id_producto=document.getElementById("id_producto").value;
    if(id_producto === '') id_producto = 0;
    // validar 

    if(codigo_interno === ''){
        return mensaje('Debe ingresar el código interno del producto','error');
    }

    if(nombre_producto === ''){
        return mensaje('Debe ingresar el nombre del producto','error');
    }

    if(precio === ''){
        return mensaje('Debe ingresar el precio del producto','error');
    }

    if(stock_minimo === ''){
        return mensaje('Debe ingresar el stock mínimo del producto','error');
    }

    if(stock_maximo === ''){
       return mensaje('Debe ingresar el stock máximo del producto','error');
    }

    if(tipo_producto === '0'){
        return mensaje('Debe seleccionar un tipo de producto','error');
    }

    if(unidad_medida === '0'){
        return mensaje('Debe seleccionar una unidad de medida','error');
    }

    if(marca === '0'){
        return mensaje('Debe seleccionar una marca','error');
    }

    if(cantidad === ''){
        return mensaje('Debe ingresar la cantidad del producto','error');
    }

    if(lote !== '' && fecha_vencimiento === '') {
        return mensaje('Debe ingresar la fecha de vencimiento','error');
    }

    if(bodega === '0'){
        return mensaje('Debe seleccionar una bodega','error');
    }
    

    var data = {
        nuevo:nuevo,
        id_producto:id_producto,
        id_compra: id_compra,
        codigo_interno: codigo_interno,
        nombre_producto: nombre_producto,
        cantidad: cantidad,
        precio: precio,
        stock_minimo: stock_minimo,
        stock_maximo: stock_maximo,
        tipo_producto: tipo_producto,
        unidad_medida: unidad_medida,
        marca: marca,
        observaciones: observaciones,
        lote: lote,
        fecha_vencimiento: fecha_vencimiento,
        bodega: bodega
    };

    // headers para enviar el token de csrf
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: "{{ route('guardarItemFactura') }}",
        data: data,
        success: function(response) {
            console.log(response);
            let mensaje = response.mensaje;
            let productos = response.productos;
            if(mensaje === 'OK'){
                $('#productos_factura').DataTable().clear().draw();
                productos.forEach(producto => {
                    console.log(producto);
                    let precio_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(producto.precio_unitario);
                    let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);
                    let total_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(total);
                    $('#productos_factura').DataTable().row.add([
                        producto.codigo_interno,
                        producto.nombre,
                        producto.cantidad,
                        producto.unidad_medida,
                        producto.marca,
                        precio_format,
                        total_format,
                        '<button class="btn btn-danger btn-sm" onclick="eliminarItemFactura('+producto.id_item+')"><i class="fas fa-trash"></i></button>'
                    ]).draw();
                });
                swal({
                    title: "Producto guardado correctamente",
                    text: "Desea agregar otro producto?",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                    
                }).then((result) => {
                    console.log(result);
                    if (result) {
                        nuevoItem();
                    } else {
                        buscarProductosFactura(id_compra);
                    }
                });
                nuevoItem();
            } else {
                swal({
                    title: "Error al guardar el producto",
                    text: "Desea intentar nuevamente? "+mensaje,
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                    
                }).then((result) => {
                    console.log(result);
                })
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function eliminarItemFactura(idProducto){
    var id_compra = $('#id_compra').val();
    var data = {
        id_item: idProducto,
        id_compra: id_compra
    };

    // headers para enviar el token de csrf
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: "{{ route('eliminarItemFactura') }}",
        data: data,
        success: function(response) {
            console.log(response);
            let mensaje = response;
            if(mensaje === 'OK'){
                alert('Producto eliminado correctamente');
                buscarProductosFactura(id_compra);
            } else {
                alert('Error al eliminar el producto');
            }
        },
        error: function(response) {
            console.log(response);
        }
    });

}

function nuevoItem(){
    // cerrar el buscador de productos
    ocultarBuscadorProducto();
    $('#codigo_interno').val('');
    $('#nombre').val('');
    $('#precio').val('');
    $('#stock_minimo').val('');
    $('#stock_maximo').val('');
    $('#producto').val(0);
    $('#um').val(0);
    $('#marca').val(0);
    $('#cantidad').val('');
    $('#observaciones').val('');
    $('#fecha_vencimiento').val('');
    $('#lote').val('');
    $('#contenedor_procedimiento').removeClass('d-none').hide().fadeIn('slow');

    $('#elegir').val("SI");
}

function dameNuevaMedida(){
    $('#divNuevaMedida').removeClass('d-none').hide().fadeIn('slow');
}

function ocultarNuevaMedida(){
    $('#divNuevaMedida').fadeOut('slow');
}

function dameNuevaMarca(){
    $('#divNuevaMarca').removeClass('d-none').hide().fadeIn('slow');
}

function agregarMarcaNueva(){
    var marca = $('#nueva_marca').val();
    // validar el ingreso de marca
    if(marca === ''){
        alert('Debe ingresar una marca');
        return false;
    }
    var data = {
        marca: marca
    };

    // headers para enviar el token de csrf
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: "{{ route('guardarMarca') }}",
        data: data,
        success: function(response) {
            console.log(response);
            let mensaje = response.mensaje;
            if(mensaje === 'OK'){
                let marcas = response.marcas;
                $('#marca').empty();
                $('#marca').append('<option value="0">Elija una Marca</option>');
                marcas.forEach(m => {
                    console.log(m,marca);
                    let selected = (marca === m.id) ? 'selected' : '';
                    $('#marca').append('<option value="'+m.id+'" '+selected+'>'+m.nombre+'</option>');
                });
                swal({
                    title: "Marca guardada correctamente",
                    text: "Puede seleccionarla en el campo Marca",
                    icon: "success",
                    button: "Aceptar",
                    position:'top-right',
                    timer: 3000,
                    timerProgressBar: true,
                    toast: true,
                });
                
                $('#nueva_marca').val('');
                ocultarNuevaMarca();
            } else if(mensaje === 'existe') {
                swal({
                    title: "La marca ya existe",
                    text: "Desea seleccionarla en el campo Marca?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    
                }).then((result) => {
                    console.log(result);
                });
            }else{
                swal({
                    title: "Error al guardar la marca",
                    text: "Desea intentar nuevamente?",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                    
                }).then((result) => {
                    console.log(result);
                });
            }
        },
        error: function(response) {
            console.log(response);
        }
    });

}

function guardarNuevaMedida(){
    var medida = $('#nueva_medida').val();
    // validar el ingreso de medida
    if(medida === ''){
        swal({
            title: "Debe ingresar una medida",
            text: "Desea intentar nuevamente?",
            icon: "error",
            buttons: true,
            dangerMode: true,
            
        }).then((result) => {
            console.log(result);
            if(result){
                $('#nueva_medida').focus();
            }
        
        })
        return false;
    }
    var data = {
        medida: medida
    };

    // headers para enviar el token de csrf
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: "{{ route('guardarMedida') }}",
        data: data,
        success: function(response) {
            console.log(response);
            let mensaje = response.mensaje;
            if(mensaje === 'OK'){
                let medidas = response.unidades_medidas;
                $('#um').empty();
                $('#um').append('<option value="0">Elija una Unidad de Medida</option>');
                medidas.forEach(medida => {
                    $('#um').append('<option value="'+medida.id+'">'+medida.nombre+'</option>');
                });
                swal({
                    title: "Medida guardada correctamente",
                    text: "Puede seleccionarla en el campo Unidad de Medida",
                    icon: "success",
                    button: "Aceptar",
                    position:'top-right',
                    timer: 3000,
                    timerProgressBar: true,
                    toast: true,
                })
                
                $('#nueva_medida').val('');
                ocultarNuevaMedida();
            } else if(mensaje === 'existe') {
                swal({
                    title: "La medida ya existe",
                    text: "Desea seleccionarla en el campo Unidad de Medida?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    
                }).then((result) => {
                    console.log(result);
                })
            }else{
                swal({
                    title: "Error al guardar la medida",
                    text: "Desea intentar nuevamente?",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                    
                }).then((result) => {
                    console.log(result);
                })
            }
        },
        error: function(response) {
            console.log(response);
        }
    });

}

function ocultarNuevaMarca(){
    $('#divNuevaMarca').fadeOut('slow');
}

function dameProductosPorTipo(idTipo){
    var url = '/buscarProductosTipo/'+idTipo;
    // Inicializa tu DataTable con la opción createdRow
    var table = $('#inventario_tipo_producto_'+idTipo).DataTable({
        destroy: true,
        createdRow: function(row, data, dataIndex) {
            $(row).addClass('text-center align-middle');
        }
    });
    $.ajax({
        type: 'get',
        url: url,
        success: function(response) {
             console.log(response);
             $('#id_tipo_productos').val(idTipo);
            // pasar json a la tabla
            let productos =  response.productos;
            $('#inventario_tipo_producto_'+idTipo).DataTable().clear().draw();
            
                productos.forEach(producto => {
                console.log(producto);
                let precio_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(producto.precio_unitario);
                let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);
                let total_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(total);
                $('#inventario_tipo_producto_'+idTipo).DataTable().row.add([
                    producto.codigo_interno,
                    producto.nombre_producto,
                    producto.tipo_producto,
                    producto.cantidad,
                    producto.unidad_medida,
                    producto.marca,
                    '<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button><button class="btn btn-warning btn-sm" onclick="detalleCompraProducto('+producto.id+')">D</button>'
                ]).draw();
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function detalleCompraProducto(idProducto){
    var url = '/detalleCompraProducto/'+idProducto;

    $.ajax({
        type: 'get',
        url: url,
        success: function(response) {
            console.log(response);
            let compras = response;
            // abrir modal detalle compra producto
            $('#modalDetalleCompraProducto').modal('show');
            $('#detalle_compra_producto').DataTable().clear().draw();
            compras.forEach(compra => {
                console.log(compra);
                let precio_formateado = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(compra.precio_compra);
                let total_formateado = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(compra.precio_compra * compra.cantidad);
                $('#detalle_compra_producto').DataTable().row.add([
                    compra.fecha_compra,
                    compra.proveedor,
                    compra.factura,
                    precio_formateado,
                    compra.cantidad,
                    total_formateado
                ]).draw();
            });
        },
        error: function(response) {
            console.log(response);
        }
    });

}

function dameTodosProductos(){
    var url = '/buscarProductosTipo/0';

    var table = $('#inventario').DataTable({
        destroy: true,
        createdRow: function(row, data, dataIndex) {
            $(row).addClass('text-center align-middle');
        }
    });
    $.ajax({
        type: 'get',
        url: url,
        success: function(response) {
            console.log(response);
            // pasar json a la tabla
            let productos =  response.productos;
            $('#inventario').DataTable().clear().draw();
            
                productos.forEach(producto => {
                console.log(producto);
                let precio_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(producto.precio_unitario);
                let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);
                let total_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(total);
                $('#inventario').DataTable().row.add([
                    producto.codigo_interno,
                    producto.nombre_producto,
                    producto.tipo_producto,
                    producto.cantidad,
                    producto.unidad_medida,
                    producto.marca,
                    total_format,
                    '<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button><button class="btn btn-warning btn-sm" onclick="detalleCompraProducto('+producto.id+')">D</button>'
                ]).draw();
            });
        },
        error: function(response) {
            console.log(response);
        }
    });

}

function mostrarBuscadorProducto(){
    cancelarItemFactura();
    $('#divBuscarProducto').removeClass('d-none').hide().fadeIn('slow');
    $('#div_contenedor_productos').removeClass('d-none').hide().fadeIn('slow');
}

function ocultarBuscadorProducto(){
    $('#divBuscarProducto').fadeOut('slow');
    $('#div_contenedor_productos').fadeOut('slow');
    // limpiar tabla 
    $('#contenedor_productos').DataTable().clear().draw();
    // limpiar el input de búsqueda
    $('#buscar_producto').val('');
}

function buscarProducto(){
    var producto = $('#buscar_producto').val();
    var idproveedor = $('#proveedor_cab').val();
    if(idproveedor == 0){
        alert('Debe seleccionar un proveedor');
        return false;
    }
    var url = '{{ route("buscarProductos") }}';

    // Inicializa tu DataTable con la opción createdRow
    var table = $('#contenedor_productos').DataTable({
        destroy: true,
        createdRow: function(row, data, dataIndex) {
            $(row).addClass('text-center align-middle');
        }
    });

    console.log(idproveedor);

    // headers
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: url,
        data:{producto: producto, idproveedor: idproveedor},
        success: function(response) {
            // pasar json a la tabla
            let productos =  response.productos;
            $('#contenedor_productos').DataTable().clear().draw();
            productos.forEach(producto => {
                console.log(producto);
                let precio_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(producto.precio_unitario);
                let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);
                let total_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(total);
                $('#contenedor_productos').DataTable().row.add([
                    producto.nombre_producto,
                    producto.proveedor,
                    producto.marca,
                    precio_format,
                    '<button class="btn btn-success-light-c btn-xxs d-inline float-right mb-2" onclick="agregarProducto('+producto.id+')">Agregar</button>'
                ]).draw();
            });
        },
        error: function(response) {
            console.log(response.responseText);
        }
    });
}

function cancelarItemFactura(){
    $('#contenedor_procedimiento').fadeOut('slow');
}

function agregarProducto(idproducto){
    seleccionarProducto(idproducto);
    $('#id_producto').val(idproducto);
}

function seleccionarProducto(idproducto){
    var url = '/seleccionarProducto/'+idproducto;

    $.ajax({
        type: 'get',
        url: url,
        success: function(response) {
            console.log(response);
            let producto = response.producto;
            nuevoItem();
            $('#elegir').val("NO");
            $('#codigo_interno').val(producto.codigo_interno);
            $('#nombre').val(producto.nombre);
            $('#precio').val(producto.precio_unitario);
            $('#producto').val(producto.id_tipo_producto);
            $('#um').val(producto.id_unidad_medida);
            $('#marca').val(producto.id_marca);
            $('#cantidad').val(producto.cantidad);
            $('#observaciones').val(producto.observaciones);
            $('#lote').val(producto.lote);
            $('#fecha_vencimiento').val(producto.fecha_vencimiento);
            ocultarBuscadorProducto();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function filtrarProductos(tipo){
    var id_tipo_productos = $('#id_tipo_productos').val();
    if(tipo == 1){
        var mes = $('#mes-'+id_tipo_productos).val();
        var anio = $('#anio-'+id_tipo_productos).val();
    }else{
        var mes = $('#mes_total').val();
        var anio = $('#anio_total').val();
    }
    
    var url = '{{ route("filtrarProductos") }}';

    // Inicializa tu DataTable con la opción createdRow
    var table = $('#inventario_tipo_producto_'+id_tipo_productos).DataTable({
        destroy: true,
        createdRow: function(row, data, dataIndex) {
            $(row).addClass('text-center align-middle');
        }
    });

    console.log(id_tipo_productos, mes, anio,tipo);

    // headers
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: url,
        data:{id_tipo_productos: id_tipo_productos, mes: mes, anio: anio, tipo: tipo},
        success: function(response) {
            console.log(response);
            // pasar json a la tabla
            let productos =  response;
            
            
            if(tipo == 1){
                $('#inventario_tipo_producto_'+id_tipo_productos).DataTable().clear().draw();
                productos.forEach(producto => {
                console.log(producto);
                let precio_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(producto.precio_unitario);
                let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);
                let total_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(total);
                $('#inventario_tipo_producto_'+id_tipo_productos).DataTable().row.add([
                    producto.codigo_interno,
                    producto.nombre_producto,
                    producto.tipo_producto,
                    producto.cantidad,
                    producto.unidad_medida,
                    producto.marca,
                    precio_format,
                    '<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button><button class="btn btn-warning btn-sm" onclick="detalleCompraProducto('+producto.id+')">D</button>'
                ]).draw();
            });
            }else{
                $('#inventario').DataTable().clear().draw();
                productos.forEach(producto => {
                console.log(producto);
                let precio_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(producto.precio_unitario);
                let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);
                let total_format = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(total);
                $('#inventario').DataTable().row.add([
                    producto.codigo_interno,
                    producto.nombre_producto,
                    producto.tipo_producto,
                    producto.cantidad,
                    producto.unidad_medida,
                    producto.marca,
                    precio_format,
                    '<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button><button class="btn btn-warning btn-sm" onclick="detalleCompraProducto('+producto.id+')">D</button>'
                ]).draw();
            });
            }
            
        },
        error: function(response) {
            console.log(response.responseText);
        }
    });
}

   
   $(document).ready(function(){
       /* Sacar la funcion "agregarPieza de este ámbito */
       $('.btn-agregar-procedimiento').click(function(){
           agregarItem();
       });
       // al div con id contenedor_procedimiento a todos los input agregar el atributo disabled
         $('#contenedor_procedimiento input').attr('disabled', true);
   });

</script>
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Compras</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_cm.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="administracion_cm.php">Administracion del centro médico</a></li>
                            <li class="breadcrumb-item"><a href="compras.php">Compras</a></li>
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
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Compras</h4>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-0" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-wizard active" id="" data-toggle="pill" href="#uno_nutri" role="tab" aria-controls="pills-home" aria-selected="true">Facturas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-wizard" id="dos_nutri_tab" data-toggle="pill" href="#dos_nutri" role="tab" aria-controls="pills-home" aria-selected="true">Análisis por item</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-wizard" id="tres_nutri_tab" data-toggle="pill" href="#tres_nutri" role="tab" aria-controls="pills-home" aria-selected="true" onclick="dameTodosProductos()">Compras total</a>
                            </li>
                            
                        </ul>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tablas_calculo_nutri">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="uno_nutri" role="tabpanel" aria-labelledby="uno_nutri_tab">
                                <div class="modal-body">
                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                                                <button class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modalIngresoFactura"><i class="feather icon-plus"></i>Ingresar Factura</button>
                                            </div>
                                            <ul class="nav nav-pills mb-0" id="pesos" role="tablist">
                                                {{-- <li class="nav-item">
                                                    <a class="nav-link-wizard active" id="peso_teorico_tab" data-toggle="pill" href="#peso_teorico" role="tab" aria-controls="peso_teoricoe" aria-selected="true">Get para peso Teórico</a>
                                                </li> --}}
                                                {{-- <li class="nav-item">
                                                    <a class="nav-link-wizard active" id="peso_actual_tab" data-toggle="pill" href="#peso_actual" role="tab" aria-controls="peso_actual" aria-selected="true">Get para peso Actúal</a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                        <div class="card-body" >
                                            <div class="row">
                                                <div class="col-md-3 form-group fill">
                                                    <label for="proveedor" class="floating-label">Proveedor:</label>
                                                    <select name="proveedor" class="form-control form-control-sm" id="proveedor">
                                                        <option value="0">Elija un Proveedor</option>
                                                        @foreach ($proveedores as $proveedor)
                                                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-outline-success btn-sm my-2 w-100" onclick="buscarFacturasPorProveedor()"><i class="fas fa-search"></i></button>
                                                    <table class="table w-100">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Fecha</th>
                                                                <th scope="col">Nro. Factura</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody_compras_proveedor">
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-9">
                                                    <div id="informacion_compra" class="border p-3">
                                                        <p>HOLA, AQUI VA LA INFORMACION DE LA COMPRA</p>
                                                    </div>
                                                    <table id="inventario_insumos" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">Codigo</th>
                                                                <th class="text-center align-middle">Producto</th>
                                                                <th class="text-center align-middle">Cantidad</th>
                                                                <th class="text-center align-middle">Unidad de medida</th>
                                                                <th class="text-center align-middle">Marca</th>
                                                                <th class="text-center align-middle">Precio Unitario</th>
                                                                <th class="text-center align-middle">Total</th>
                                                                <th class="text-center align-middle"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--TAB 2-->

                            <div class="tab-pane fade show" id="dos_nutri" role="tabpanel" aria-labelledby="dos_nutri_tab">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="nav nav-pills mb-3" id="pesos" role="tablist">
                                                @foreach($tipos_producto as $tipo_producto)
                                                    <li class="nav-item">
                                                        <a class="nav-link-wizard" id="{{ $tipo_producto->nombre }}-tab" data-toggle="pill" href="#producto_{{ $tipo_producto->id }}" role="tab" aria-controls="peso_teoricoe" aria-selected="true" href="javascript:void(0)" onclick="dameProductosPorTipo({{ $tipo_producto->id }})">{{ $tipo_producto->nombre }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="pills-tablas_calculo_nutricional">
                                        <div class="tab-pane fade show active" id="analisis" role="tabpanel" aria-labelledby="analisis_tab">
                                            
                                        </div>
                                        @foreach($tipos_producto as $tipo_producto)
                                            <div class="tab-pane fade show" id="producto_{{ $tipo_producto->id }}" role="tabpanel" aria-labelledby="{{ $tipo_producto->nombre }}-tab">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-2 border p-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Mes</label>
                                                                <select class="form-control form-control-sm" id="mes-{{ $tipo_producto->id }}">
                                                                    <option value="0">Elija un mes</option>
                                                                    <option value="1">Enero</option>
                                                                    <option value="2">Febrero</option>
                                                                    <option value="3">Marzo</option>
                                                                    <option value="4">Abril</option>
                                                                    <option value="5">Mayo</option>
                                                                    <option value="6">Junio</option>
                                                                    <option value="7">Julio</option>
                                                                    <option value="8">Agosto</option>
                                                                    <option value="9">Septiembre</option>
                                                                    <option value="10">Octubre</option>
                                                                    <option value="11">Noviembre</option>
                                                                    <option value="12">Diciembre</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Año</label>
                                                                <select class="form-control form-control-sm" id="anio-{{ $tipo_producto->id }}">
                                                                    <option value="0">Elija un año</option>
                                                                    @for($i = 2021; $i <= date('Y'); $i++)
                                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                                    @endfor
                                                                </select>
                                                            </div> 
                                                            <button class="btn btn-outline-success btn-sm my-2 w-100" onclick="filtrarProductos(1)"><i class="fas fa-search"></i></button>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <table class="table" id="inventario_tipo_producto_{{ $tipo_producto->id }}" class="display table table-striped  table-sm table-hover dt-responsive nowrap w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle">Codigo</th>
                                                                        <th class="text-center align-middle">Producto</th>
                                                                        <th class="text-center align-middle">Tipo</th>
                                                                        <th class="text-center align-middle">Cantidad</th>
                                                                        <th class="text-center align-middle">Unidad de medida</th>
                                                                        <th class="text-center align-middle">Marca</th>
                                                                        <th class="text-center align-middle"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 3 -->
                            <div class="tab-pane fade show" id="tres_nutri" role="tabpanel" aria-labelledby="tres_nutri_tab">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-2 border p-2">
                                            <div class="form-group fill">
                                                <label class="floating-label">Mes</label>
                                                <select class="form-control form-control-sm" id="mes_total">
                                                    <option value="0">Elija un mes</option>
                                                    <option value="1">Enero</option>
                                                    <option value="2">Febrero</option>
                                                    <option value="3">Marzo</option>
                                                    <option value="4">Abril</option>
                                                    <option value="5">Mayo</option>
                                                    <option value="6">Junio</option>
                                                    <option value="7">Julio</option>
                                                    <option value="8">Agosto</option>
                                                    <option value="9">Septiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select>
                                            </div>
                                            <div class="form-group fill">
                                                <label class="floating-label">Año</label>
                                                <select class="form-control form-control-sm" id="anio_total">
                                                    <option value="0">Elija un año</option>
                                                    @for($i = 2021; $i <= date('Y'); $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div> 
                                            <button class="btn btn-outline-success btn-sm my-2 w-100" onclick="filtrarProductos(0)"><i class="fas fa-search"></i></button>
                                        </div>
                                        <div class="col-md-10">
                                            <table class="table" id="inventario" class="display table table-striped  table-sm table-hover dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Codigo</th>
                                                        <th class="text-center align-middle">Producto</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Cantidad</th>
                                                        <th class="text-center align-middle">Unidad de medida</th>
                                                        <th class="text-center align-middle">Marca</th>
                                                        <th class="text-center align-middle">Total</th>
                                                        <th class="text-center align-middle"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
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
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalIngresoFactura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingreso Factura</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="titulo-factura-fila2">
                <div class="row">
                    <div class="col-md-3 form-group fill">
                        <label for="proveedor" class="floating-label">Proveedor:</label>
                        <div class="d-flex justify-content-between">
                            <select name="proveedor" class="form-control form-control-sm" id="proveedor_cab">
                                <option value="0">Elija un Proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success btn-sm" onclick="agregarProveedor()">+</button>
                        </div>
                        
                    </div>
                    <div class="col-md-3 form-group fill">
                        <label for="fecha" class="floating-label">Fecha de factura:</label>
                        <input type="date" class="form-control form-control-sm" id="fecha">
                    </div>
                    <div class="col-md-3 form-group fill">
                        <label for="nro_factura" class="floating-label">Nro. Factura:</label>
                        <input type="text" class="form-control form-control-sm" id="nro_factura">
                    </div>
                    <div class="col-md-3 d-flex align-items-start">
                        <button class="btn btn-success btn-sm w-100" onclick="guardarCompra()">Guardar</button>
                    </div> 
                </div>

                <div id="form_agregar_proveedor" class="d-none">
                    <form action="{{ ROUTE('guardarProveedor') }}" method="post" onsubmit="return guardarProveedor(event);">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group fill">
                                    <label class="floating-label">Proveedor</label>
                                    <input class="form-control form-control-sm" name="nombre_prov" id="nombre_prov" type="text">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group fill">
                                    <label class="floating-label">Productos</label>
                                    <select name="prov_prod" id="prov_prod" class="form-control">
                                        <option value="0">Seleccione</option>
                                        @foreach($tipos_producto as $producto)
                                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group fill">
                                    <label class="floating-label">Rut</label>
                                    <input class="form-control form-control-sm" name="rut" id="rut" type="text" >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Rol</label>
                                    <input class="form-control form-control-sm" name="rol" id="rol" type="text" >
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
                            <div class="form-group fill">
                                <label class="floating-label">Dirección / Calle</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Número</label>
                                <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Región</label>
                                <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar"
                                    class="form-control form-control-sm" required>
                                    <option value="0">Seleccione</option>
                                    @if (isset($region))
                                        @foreach ($region as $reg)
                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-md-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ciudad</label>
                                <select id="comunas" name="comunas" class="form-control form-control-sm" required>
                                    
    
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mb-0" onclick="cerrarProveedor()">Cancelar</button>
                            <button type="submit" class="btn btn-info mb-0" >Agregar proveedor</button>
                        </div>
                    </form>
                </div>
                <!-- BODY  -->
                <hr>
                <div class="form-row mx-2 my-2">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="t-aten d-inline">Detalle</h6>
                        <button type="button" class="btn btn-warning-light-c btn-xxs btn-buscar-producto d-inline float-right mb-2" onclick="mostrarBuscadorProducto()"><i class="feather icon-plus"></i>Buscar item</button>
                        <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-procedimiento d-inline float-right mb-2" onclick="nuevoItem()"><i class="feather icon-plus"></i> Nuevo item</button>
                     </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-4">
                        <div class="form-group fill p-2" id="divBuscarProducto">
                            <label for="buscar_producto" class="floating-label">Codigo Producto:</label>
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
                    
                
                <div id="contenedor_procedimiento" class="d-none">
                    <div class="row" id="procedimiento">
                        <div class="form-group fill col-md-3">
                            <label for="codigo_interno" class="floating-label">Codigo interno</label>
                            <input type="text" class="form-control form-control-sm" id="codigo_interno">
                        </div>
                        <div class="form-group fill col-md-3">
                            <label for="nombre" class="floating-label">Nombre</label>
                            <input type="text" class="form-control form-control-sm" id="nombre">
                        </div>
                        <div class="form-group fill col-md-3">
                            <label for="producto" class="floating-label">Producto:</label>
                            <select name="producto" class="form-control form-control-sm" id="producto">
                                <option value="0">Elija un Producto</option>
                                @foreach ($tipos_producto as $tp)
                                    <option value="{{$tp->id}}">{{$tp->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group fill col-md-3">
                            <label for="precio" class="floating-label">Precio Neto</label>
                            <input type="number" class="form-control form-control-sm" id="precio">
                        </div>
                        <div class="form-group fill col-md-3">
                            <label for="stock_minimo" class="floating-label">Stock Minimo</label>
                            <input type="number" class="form-control form-control-sm" id="stock_minimo">
                        </div>
                        <div class="form-group fill col-md-3">
                            <label for="stock_maximo" class="floating-label">Stock Maximo</label>
                            <input type="number" class="form-control form-control-sm" id="stock_maximo">
                        </div>
                        <div class="form-group fill col-md-3">
                            
                            <label for="marca" class="floating-label">Marca:</label>
                            <div class="d-flex">
                                <select name="marca" class="form-control form-control-sm" id="marca">
                                    <option value="0">Elija un marca</option>
                                    @foreach($marcas as $marca)
                                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-success btn-sm" onclick="dameNuevaMarca()">+</button>
                            </div>
                            <div class="d-none p-3 border" id="divNuevaMarca">
                                <div class="form-group">
                                    <label for="nueva_marca" class="floating-label">Marca:</label>
                                    <input type="text" class="form-control form-control-sm" id="nueva_marca">
                                </div>
                                <button class="btn btn-info btn-sm" onclick="agregarMarcaNueva()"><i class="fas fa-save"></i></button>
                                <button class="btn btn-danger btn-sm" onclick="ocultarNuevaMarca()">Ocultar</button>
                            </div>
                        </div>
                         
                        <div class="form-group fill col-md-3">
                            <label for="imagen" class="floating-label">Imagen</label>
                            <input type="file" class="form-control form-control-sm" id="imagen">
                        </div>
                        
                        <div class="form-group fill col-md-3">
                            <label for="um" class="floating-label">Unidad de medida:</label>
                            <div class="d-flex">
                                <select name="um" class="form-control form-control-sm" id="um">
                                    <option value="0">Elija una unidad de medida</option>
                                    @foreach($unidades_medidas as $um)
                                        <option value="{{$um->id}}">{{$um->nombre}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-success btn-sm" onclick="dameNuevaMedida()">+</button>
                            </div>
                            <div class="d-none p-3 border" id="divNuevaMedida">
                                <div class="form-group">
                                    <label for="nueva_medida" class="floating-label">Unidad de medida:</label>
                                    <input type="text" class="form-control form-control-sm" id="nueva_medida">
                                </div>
                                <button class="btn btn-info btn-sm" onclick="guardarNuevaMedida()"><i class="fas fa-save"></i></button>
                                <button class="btn btn-danger btn-sm" onclick="ocultarNuevaMedida()">Ocultar</button>
                            </div>
                        </div>
                        <div class="form-group fill col-md-3">
                            <label for="fecha_vencimiento" class="floating-label">Fecha de Vencimiento:</label>
                            <input type="date" class="form-control form-control-sm" id="fecha_vencimiento">
                        </div>  
                        
                        <div class="form-group fill col-md-3">
                            <label for="cantidad" class="floating-label">Cantidad:</label>
                            <input type="number" class="form-control form-control-sm" id="cantidad">
                        </div>

                        <div class="form-group fill col-md-3">
                            <label for="lote" class="floating-label">Lote:</label>
                            <input type="text" class="form-control form-control-sm" id="lote">
                        </div>

                        <div class="form-group fill col-md-6">
                            <label for="observaciones" class="floating-label">Observaciones:</label>
                            <textarea name="observaciones" id="observaciones" cols="30" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="form-group fill col-md-3">
                            <label for="bodega" class="floating-label">Bodega:</label>
                            <select name="bodega" id="bodega" class="form-control">
                                <option value="0">Seleccione</option>
                                @foreach($bodegas as $b)
                                    <option value="{{$b->id}}">{{$b->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right py-2">
                            
                            <button class="btn btn-info-light-c btn-xxs d-inline  mb-2" onclick="guardarItemFactura()">Guardar item</button>
                            <button class="btn btn-danger-light-c btn-xxs d-inline  mb-2" onclick="cancelarItemFactura()">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
             <!--EJECUTAR PROCEDIMIENTO-->
             {{-- <div class="tab-pane fade show " id="enf_proc" role="tabpanel" aria-labelledby="enf_proc_tab">
                
                <div class="border px-2 pt-3 pb-1 mb-4 rounded shadow mx-2">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="av_subj_sc_od">Responsable</label>
                                <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm">
                                    <option  value="0">Seleccione</option>
                                    <option  value="1">Juana Perez </option>
                                    <option  value="2">Maria la del Barrio</option>
                                    <option  value="3">alumna en práctica</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="av_subj_sc_od">Indicado por:</label>
                                <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm">
                                    <option  value="0">Seleccione</option>
                                    <option  value="1">Juana Perez </option>
                                    <option  value="2">Maria la del Barrio</option>
                                    <option  value="3">alumna en práctica</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="proc_enf_urg">Procedimiento</label>
                                <select name="proc_enf_urg"  id="proc_enf_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('proc_enf_urg','div_proc_enf_urg',obs_proc_enf_urg',7);">
                                    <option  value="0">Seleccione</option>
                                    <option  value="1">Reanimación</option>
                                    <option  value="2">Nebulización</option>
                                    <option  value="3">Curación</option>
                                    <option  value="4">Sonda Folley</option>
                                    <option  value="5">Sonda Nasogástrica</option>
                                    <option  value="6">Inmovilización Fx.</option>
                                    <option  value="7">Otro/a<option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="procedimiento_1">
                                <label class="custom-control-label" for="procedimiento_1">Finalizado</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-11 col-xxxl-11">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="obs_proc_enf_urg">Observaciones</label>
                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_proc_enf_urg" id="obs_proc_enf_urg"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1 col-xxxl-1">
                            <button type="button" class="btn btn-icon btn-danger-light-c" onclick="cancelarNuevoItem()"><i class="feather icon-x"></i></button>
                            <button type="button" class="btn btn-icon btn-info-light-c"><i class="feather icon-save"></i></button>
                        </div>
                    </div>
                </div>
                
                <!--PAGINACIÓN-->
                <!--Programar paginación para las evoluciones, ejemplo: Se muestran 8 y para ver las otras se usa la paginación-->
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link">Anterior</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Siguiente</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> --}}
            <table class="table" id="productos_factura">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Unidad Medida</th>
                        <th>Marca</th>
                        <th>Precio Compra</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL DETALLE COMPRAS PRODUCTO -->
    <div class="modal fade" id="modalDetalleCompraProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de compra de producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" id="detalle_compra_producto">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Proveedor</th>
                                    <th>N° Factura</th>
                                    <th>Precio Compra</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
<!-- Input hidden -->
<input type="hidden" id="id_compra" value="0">
<input type="hidden" id="elegir" value="SI">
<input type="hidden" id="id_producto" value="0">
<input type="hidden" id="id_tipo_productos" value="0">
@endsection