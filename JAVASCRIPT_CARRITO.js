// ========================================
// FUNCIONES JAVASCRIPT PARA CARRITO DE COMPRAS
// ========================================
// Agregar estas funciones en tu archivo blade

// Variable global para almacenar el carrito
var carritoData = {
    items: [],
    total: 0,
    cantidad_items: 0
};

/**
 * Agregar producto al carrito
 */
function agregarProductoAlCarrito(id_producto, datos_adicionales = {}) {
    // Mostrar loading
    Swal.fire({
        title: 'Agregando al carrito...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    let url = "{{ route('laboratorio.carrito.agregar') }}";

    let data = {
        id_producto: id_producto,
        cantidad: datos_adicionales.cantidad || 1,
        id_paciente: datos_adicionales.id_paciente || $('#id_paciente_fc').val(),
        id_ficha: datos_adicionales.id_ficha || $('#id_fc').val(),
        precio_unitario: datos_adicionales.precio_unitario || 0,
        descuento: datos_adicionales.descuento || 0,
        observaciones: datos_adicionales.observaciones || '',
        _token: CSRF_TOKEN
    };

    $.ajax({
        url: url,
        type: "POST",
        data: data,
    })
    .done(function(response) {
        console.log('Producto agregado al carrito:', response);

        if (response.estado === 1) {
            // Actualizar datos del carrito
            carritoData.total = response.total_carrito;
            carritoData.cantidad_items = response.cantidad_items;

            // Actualizar UI
            actualizarBadgeCarrito();

            Swal.fire({
                icon: 'success',
                title: '¡Agregado!',
                text: response.mensaje,
                showConfirmButton: false,
                timer: 1500
            });

            // Opcional: Mostrar botón para ver carrito
            mostrarBotonVerCarrito();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.mensaje
            });
        }
    })
    .fail(function(jqXHR) {
        console.error('Error al agregar al carrito:', jqXHR);

        let mensaje = 'Error al agregar el producto al carrito';
        if (jqXHR.responseJSON && jqXHR.responseJSON.mensaje) {
            mensaje = jqXHR.responseJSON.mensaje;
        }

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: mensaje
        });
    });
}

/**
 * Modificar la función de selección de producto para agregar al carrito
 */
function seleccionar_producto_audifono(id_producto) {
    console.log('Producto seleccionado ID:', id_producto);

    Swal.fire({
        title: '¿Agregar al carrito?',
        html: `
            <div class="form-group">
                <label>Cantidad:</label>
                <input type="number" id="swal-cantidad" class="form-control" value="1" min="1" max="100">
            </div>
            <div class="form-group">
                <label>Precio Unitario:</label>
                <input type="number" id="swal-precio" class="form-control" value="0" min="0" step="0.01">
            </div>
            <div class="form-group">
                <label>Descuento:</label>
                <input type="number" id="swal-descuento" class="form-control" value="0" min="0" step="0.01">
            </div>
            <div class="form-group">
                <label>Observaciones:</label>
                <textarea id="swal-observaciones" class="form-control" rows="2"></textarea>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: '<i class="feather icon-shopping-cart"></i> Agregar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#28a745',
        preConfirm: () => {
            return {
                cantidad: document.getElementById('swal-cantidad').value,
                precio_unitario: document.getElementById('swal-precio').value,
                descuento: document.getElementById('swal-descuento').value,
                observaciones: document.getElementById('swal-observaciones').value
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            agregarProductoAlCarrito(id_producto, result.value);
        }
    });
}

/**
 * Obtener y mostrar carrito
 */
function obtenerCarrito() {
    let url = "{{ route('laboratorio.carrito.obtener') }}";

    $.ajax({
        url: url,
        type: "GET",
    })
    .done(function(response) {
        if (response.estado === 1) {
            carritoData = {
                items: response.items,
                total: response.total,
                cantidad_items: response.cantidad_items
            };

            mostrarModalCarrito();
            actualizarBadgeCarrito();
        }
    })
    .fail(function(jqXHR) {
        console.error('Error al obtener carrito:', jqXHR);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo cargar el carrito'
        });
    });
}

/**
 * Mostrar modal con contenido del carrito
 */
function mostrarModalCarrito() {
    let html = '<div class="table-responsive">';

    if (carritoData.items.length === 0) {
        html += '<p class="text-center py-4">El carrito está vacío</p>';
    } else {
        html += '<table class="table table-hover">';
        html += '<thead><tr>';
        html += '<th>Producto</th>';
        html += '<th>Cantidad</th>';
        html += '<th>Precio</th>';
        html += '<th>Subtotal</th>';
        html += '<th>Acciones</th>';
        html += '</tr></thead><tbody>';

        carritoData.items.forEach(function(item) {
            html += '<tr>';
            html += '<td>';
            if (item.image_path) {
                html += '<img src="/' + item.image_path + '" alt="' + item.nombre_producto + '" class="img-thumbnail mr-2" style="width:50px;">';
            }
            html += '<div>';
            html += '<strong>' + item.nombre_producto + '</strong><br>';
            html += '<small class="text-muted">' + (item.marca_producto || '') + '</small>';
            html += '</div>';
            html += '</td>';
            html += '<td>';
            html += '<input type="number" class="form-control form-control-sm" value="' + item.cantidad + '" ';
            html += 'min="1" max="' + (item.stock_disponible || 100) + '" ';
            html += 'onchange="actualizarCantidadItem(' + item.id + ', this.value)">';
            html += '</td>';
            html += '<td>$' + parseFloat(item.precio_unitario).toFixed(2) + '</td>';
            html += '<td><strong>$' + parseFloat(item.subtotal).toFixed(2) + '</strong></td>';
            html += '<td>';
            html += '<button class="btn btn-sm btn-danger" onclick="eliminarItemCarrito(' + item.id + ')" title="Eliminar">';
            html += '<i class="feather icon-trash-2"></i>';
            html += '</button>';
            html += '</td>';
            html += '</tr>';
        });

        html += '</tbody>';
        html += '<tfoot>';
        html += '<tr class="bg-light">';
        html += '<td colspan="3" class="text-right"><strong>TOTAL:</strong></td>';
        html += '<td colspan="2"><strong class="text-success">$' + parseFloat(carritoData.total).toFixed(2) + '</strong></td>';
        html += '</tr>';
        html += '</tfoot>';
        html += '</table>';

        html += '<div class="text-right mt-3">';
        html += '<button class="btn btn-secondary mr-2" onclick="Swal.close()">Cerrar</button>';
        html += '<button class="btn btn-danger mr-2" onclick="vaciarCarritoCompleto()"><i class="feather icon-trash"></i> Vaciar Carrito</button>';
        html += '<button class="btn btn-success" onclick="procesarVenta()"><i class="feather icon-check"></i> Procesar Venta</button>';
        html += '</div>';
    }

    html += '</div>';

    Swal.fire({
        title: '<i class="feather icon-shopping-cart"></i> Carrito de Compras',
        html: html,
        width: '80%',
        showConfirmButton: false,
        showCloseButton: true
    });
}

/**
 * Actualizar cantidad de un item
 */
function actualizarCantidadItem(id_item, cantidad) {
    let url = "{{ route('laboratorio.carrito.actualizar_cantidad') }}";

    $.ajax({
        url: url,
        type: "PUT",
        data: {
            id_item: id_item,
            cantidad: cantidad,
            _token: CSRF_TOKEN
        },
    })
    .done(function(response) {
        if (response.estado === 1) {
            // Actualizar carrito
            obtenerCarrito();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.mensaje
            });
        }
    })
    .fail(function(jqXHR) {
        console.error('Error al actualizar cantidad:', jqXHR);
    });
}

/**
 * Eliminar item del carrito
 */
function eliminarItemCarrito(id_item) {
    Swal.fire({
        title: '¿Eliminar producto?',
        text: 'Se eliminará este producto del carrito',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            let url = "{{ route('laboratorio.carrito.eliminar') }}";

            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    id_item: id_item,
                    _token: CSRF_TOKEN
                },
            })
            .done(function(response) {
                if (response.estado === 1) {
                    // Actualizar carrito
                    obtenerCarrito();

                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminado',
                        text: response.mensaje,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }
    });
}

/**
 * Vaciar carrito completo
 */
function vaciarCarritoCompleto() {
    Swal.fire({
        title: '¿Vaciar carrito?',
        text: 'Se eliminarán todos los productos del carrito',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, vaciar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            let url = "{{ route('laboratorio.carrito.vaciar') }}";

            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: CSRF_TOKEN
                },
            })
            .done(function(response) {
                if (response.estado === 1) {
                    carritoData = {
                        items: [],
                        total: 0,
                        cantidad_items: 0
                    };

                    actualizarBadgeCarrito();
                    Swal.close();

                    Swal.fire({
                        icon: 'success',
                        title: 'Carrito vaciado',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }
    });
}

/**
 * Actualizar badge del carrito
 */
function actualizarBadgeCarrito() {
    let badge = $('#badge-carrito');
    if (carritoData.cantidad_items > 0) {
        badge.text(carritoData.cantidad_items).show();
    } else {
        badge.hide();
    }
}

/**
 * Mostrar botón flotante del carrito
 */
function mostrarBotonVerCarrito() {
    if ($('#btn-ver-carrito').length === 0) {
        let boton = `
            <button id="btn-ver-carrito" class="btn btn-success btn-lg"
                    style="position:fixed; bottom:20px; right:20px; z-index:9999; border-radius:50%; width:60px; height:60px;"
                    onclick="obtenerCarrito()" title="Ver carrito">
                <i class="feather icon-shopping-cart"></i>
                <span id="badge-carrito" class="badge badge-danger"
                      style="position:absolute; top:-5px; right:-5px; display:none;">0</span>
            </button>
        `;
        $('body').append(boton);
    }
}

/**
 * Procesar venta
 */
function procesarVenta() {
    // Aquí puedes implementar lógica adicional para procesar la venta
    Swal.fire({
        title: 'Procesar Venta',
        html: `
            <div class="form-group text-left">
                <label>Método de Pago:</label>
                <select id="swal-metodo-pago" class="form-control">
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                    <option value="transferencia">Transferencia</option>
                </select>
            </div>
            <div class="form-group text-left">
                <label>Observaciones:</label>
                <textarea id="swal-obs-venta" class="form-control" rows="3"></textarea>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Confirmar Venta',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#28a745',
        preConfirm: () => {
            return {
                metodo_pago: document.getElementById('swal-metodo-pago').value,
                observaciones: document.getElementById('swal-obs-venta').value
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            finalizarVenta(result.value);
        }
    });
}

/**
 * Finalizar venta (enviar al servidor)
 */
function finalizarVenta(datos) {
    let url = "{{ route('laboratorio.carrito.procesar_venta') }}";

    Swal.fire({
        title: 'Procesando venta...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: url,
        type: "POST",
        data: {
            id_paciente: $('#id_paciente_fc').val(),
            id_ficha: $('#id_fc').val(),
            metodo_pago: datos.metodo_pago,
            observaciones: datos.observaciones,
            _token: CSRF_TOKEN
        },
    })
    .done(function(response) {
        if (response.estado === 1) {
            carritoData = {
                items: [],
                total: 0,
                cantidad_items: 0
            };

            actualizarBadgeCarrito();

            Swal.fire({
                icon: 'success',
                title: '¡Venta Exitosa!',
                html: `
                    <p>${response.mensaje}</p>
                    <p><strong>Items procesados:</strong> ${response.items_procesados}</p>
                    <p><strong>Total:</strong> $${parseFloat(response.total).toFixed(2)}</p>
                `,
                confirmButtonText: 'Aceptar'
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.mensaje
            });
        }
    })
    .fail(function(jqXHR) {
        console.error('Error al procesar venta:', jqXHR);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo procesar la venta'
        });
    });
}

// Cargar carrito al iniciar la página
$(document).ready(function() {
    // Obtener datos del carrito
    $.ajax({
        url: "{{ route('laboratorio.carrito.obtener') }}",
        type: "GET",
    })
    .done(function(response) {
        if (response.estado === 1) {
            carritoData = {
                items: response.items,
                total: response.total,
                cantidad_items: response.cantidad_items
            };

            if (carritoData.cantidad_items > 0) {
                mostrarBotonVerCarrito();
                actualizarBadgeCarrito();
            }
        }
    });
});
