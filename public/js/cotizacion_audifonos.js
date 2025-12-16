/**
 * Sistema de Cotización de Audífonos y Accesorios
 * Gestiona la búsqueda, selección y cotización de productos
 */

// Variables globales
let productosCotizacion = [];
let cotizacionActual = null;

// Objeto de rutas (se debe definir en la vista Blade)
// window.cotizacionRoutes = { ... }
if (typeof window.cotizacionRoutes === 'undefined') {
    console.error('Las rutas de cotización no están definidas. Asegúrese de incluir el objeto cotizacionRoutes en la vista.');
}

/**
 * Buscar productos para cotización
 */
function buscar_productos_cotizacion() {
    const tipoProd = $('#cotiz_tipo_producto').val();
    const busqueda = $('#cotiz_buscar_producto').val();

    if (!busqueda || busqueda.trim() === '') {
        swal('Atención', 'Por favor ingrese un término de búsqueda', 'warning');
        return;
    }

    // Mostrar loader
    $('#cotiz_lista_productos_busqueda').html(`
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Buscando...</span>
            </div>
            <p class="mt-2">Buscando productos...</p>
        </div>
    `);

    // Petición AJAX
    $.ajax({
            url: window.cotizacionRoutes.buscarProductos,
        method: 'GET',
        data: {
            tipo_producto: tipoProd,
            termino: busqueda,
            id_lugar_atencion: $('#id_lugar_atencion').val()
        },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        success: function(response) {
            console.log(response);
            mostrar_resultados_busqueda_cotizacion(response.productos);
        },
        error: function(xhr) {
            console.error('Error en búsqueda:', xhr);
            $('#cotiz_lista_productos_busqueda').html(`
                <div class="alert alert-danger">
                    <i class="feather icon-alert-circle mr-2"></i>
                    Error al buscar productos. Por favor intente nuevamente.
                </div>
            `);
        }
    });
}

/**
 * Mostrar resultados de búsqueda
 */
function mostrar_resultados_busqueda_cotizacion(productos) {
    let html = '';

    if (productos.length === 0) {
        html = `
            <div class="alert alert-info">
                <i class="feather icon-info mr-2"></i>
                No se encontraron productos con los criterios de búsqueda
            </div>
        `;
    } else {
        html = '<div class="row">';

        productos.forEach(producto => {
            const imagen = '/'+producto.image_path || '/images/no-image.png';
            const precio = formatearMoneda(producto.precio_venta || 0);
            const precioNumerico = producto.precio_venta || 0;
            const stock = producto.stock_actual || 0;
            const codigo = producto.codigo_interno || producto.codigo || '';
            const esProcedimiento = producto.es_procedimiento || false;
            const tipoLabel = esProcedimiento ? 'Servicio' : 'Producto';
            const tipoBadge = esProcedimiento ? 'badge-info' : 'badge-primary';

            html += `
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
                    <div class="card h-100 producto-card">
                        <div class="position-absolute" style="top: 10px; right: 10px; z-index: 10;">
                            <span class="badge ${tipoBadge}">${tipoLabel}</span>
                        </div>
                        <img src="${imagen}" class="card-img-top" alt="${producto.nombre}" style="height: 150px; object-fit: cover;">
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1 text-truncate" title="${producto.nombre}">${producto.nombre}</h6>
                            <p class="card-text mb-1">
                                <small class="text-muted">Código: ${codigo}</small>
                            </p>
                            <p class="card-text mb-1">
                                <small class="text-muted">Marca: ${producto.marca || 'N/A'}</small>
                            </p>
                            <p class="card-text mb-2">
                                <strong class="text-primary">${precio}</strong>
                            </p>
                            <p class="card-text mb-2">
                                <small class="badge ${stock > 0 ? 'badge-success' : 'badge-danger'}">
                                    Stock: ${stock}
                                </small>
                            </p>
                            <button type="button" class="btn btn-sm btn-success btn-block"
                                    onclick="agregar_producto_cotizacion(${producto.id}, '${codigo}', '${producto.nombre}', ${precioNumerico}, ${stock}, ${esProcedimiento})">
                                <i class="feather icon-plus"></i> Agregar
                            </button>
                        </div>
                    </div>
                </div>
            `;
        });

        html += '</div>';
    }

    $('#cotiz_lista_productos_busqueda').html(html);
}

/**
 * Agregar producto a la cotización
 */
function agregar_producto_cotizacion(id, codigo, nombre, precio, stock, esProcedimiento = false) {
    // Verificar si el producto ya está en la cotización
    const existe = productosCotizacion.find(p => p.id === id && p.es_procedimiento === esProcedimiento);

    if (existe) {
        swal('Producto ya agregado', 'Este producto ya está en la cotización. Puede modificar la cantidad en la tabla.', 'info');
        return;
    }

    // Agregar producto o procedimiento
    productosCotizacion.push({
        id: id,
        codigo: codigo,
        nombre: nombre,
        precio: parseFloat(precio),
        cantidad: 1,
        descuento: 0,
        stock: stock,
        es_procedimiento: esProcedimiento
    });

    actualizar_tabla_cotizacion();

    const tipo = esProcedimiento ? 'Servicio' : 'Producto';
    swal({
        title: `${tipo} agregado`,
        text: `${nombre} ha sido agregado a la cotización`,
        icon: 'success',
        timer: 1500,
        buttons: false
    });
}

/**
 * Actualizar tabla de productos cotizados
 */
function actualizar_tabla_cotizacion() {
    const tbody = $('#cotiz_tbody_productos');

    if (productosCotizacion.length === 0) {
        tbody.html(`
            <tr id="cotiz_row_vacio">
                <td colspan="8" class="text-center text-muted py-4">
                    <i class="feather icon-inbox f-20 d-block mb-2"></i>
                    No hay productos agregados a la cotización
                </td>
            </tr>
        `);
        $('#cotiz_cantidad_items').text('0');
        calcular_totales_cotizacion();
        return;
    }

    let html = '';
    let contador = 1;

    productosCotizacion.forEach((producto, index) => {
        const subtotal = producto.precio * producto.cantidad;
        const descuentoMonto = subtotal * (producto.descuento / 100);
        const subtotalConDescuento = subtotal - descuentoMonto;
        const esProcedimiento = producto.es_procedimiento || false;
        const tipoIcon = esProcedimiento ? '<i class="feather icon-briefcase text-info" title="Servicio"></i>' : '<i class="feather icon-package text-primary" title="Producto"></i>';

        html += `
            <tr>
                <td class="text-center">${contador++}</td>
                <td>${tipoIcon} ${producto.codigo}</td>
                <td>${producto.nombre}</td>
                <td class="text-center">
                    <input type="number"
                           class="form-control form-control-sm text-center"
                           value="${producto.cantidad}"
                           min="1"
                           max="${producto.stock}"
                           onchange="actualizar_cantidad_cotizacion(${index}, this.value)"
                           style="width: 70px;">
                </td>
                <td class="text-center">
                    <input type="number"
                           class="form-control form-control-sm text-right"
                           value="${producto.precio}"
                           min="0"
                           step="0.01"
                           onchange="actualizar_precio_cotizacion(${index}, this.value)"
                           style="width: 100px;">
                </td>
                <td class="text-center">
                    <input type="number"
                           class="form-control form-control-sm text-center"
                           value="${producto.descuento}"
                           min="0"
                           max="100"
                           onchange="actualizar_descuento_cotizacion(${index}, this.value)"
                           style="width: 70px;">
                </td>
                <td class="text-right font-weight-bold">${formatearMoneda(subtotalConDescuento)}</td>
                <td class="text-center">
                    <button type="button"
                            class="btn btn-sm btn-danger"
                            onclick="eliminar_producto_cotizacion(${index})"
                            title="Eliminar">
                        <i class="feather icon-trash-2"></i>
                    </button>
                </td>
            </tr>
        `;
    });

    tbody.html(html);
    $('#cotiz_cantidad_items').text(productosCotizacion.length);
    calcular_totales_cotizacion();
}

/**
 * Actualizar cantidad de un producto
 */
function actualizar_cantidad_cotizacion(index, cantidad) {
    cantidad = parseInt(cantidad);

    if (cantidad < 1) {
        cantidad = 1;
    }

    if (cantidad > productosCotizacion[index].stock) {
        swal('Stock insuficiente', `Solo hay ${productosCotizacion[index].stock} unidades disponibles`, 'warning');
        cantidad = productosCotizacion[index].stock;
    }

    productosCotizacion[index].cantidad = cantidad;
    actualizar_tabla_cotizacion();
}

/**
 * Actualizar descuento de un producto
 */
function actualizar_descuento_cotizacion(index, descuento) {
    descuento = parseFloat(descuento);

    if (descuento < 0) descuento = 0;
    if (descuento > 100) descuento = 100;

    productosCotizacion[index].descuento = descuento;
    actualizar_tabla_cotizacion();
}

/**
 * Actualizar precio de un producto
 */
function actualizar_precio_cotizacion(index, precio) {
    precio = parseFloat(precio);

    if (precio < 0) {
        precio = 0;
    }

    // Validar que el precio sea un número válido
    if (isNaN(precio)) {
        swal('Precio inválido', 'Por favor ingrese un precio válido', 'warning');
        // Restaurar el precio anterior
        actualizar_tabla_cotizacion();
        return;
    }

    productosCotizacion[index].precio = precio;
    actualizar_tabla_cotizacion();
}

/**
 * Eliminar producto de la cotización
 */
function eliminar_producto_cotizacion(index) {
    swal({
        title: '¿Eliminar producto?',
        text: "El producto será removido de la cotización",
        icon: 'warning',
        buttons: {
            cancel: {
                text: 'Cancelar',
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: 'Sí, eliminar',
                value: true,
                closeModal: true
            }
        },
        dangerMode: true
    }).then((willDelete) => {
        if (willDelete) {
            productosCotizacion.splice(index, 1);
            actualizar_tabla_cotizacion();

            swal({
                title: 'Eliminado',
                text: 'Producto eliminado de la cotización',
                icon: 'success',
                timer: 1500,
                buttons: false
            });
        }
    });
}

/**
 * Calcular totales de la cotización
 */
function calcular_totales_cotizacion() {
    let subtotal = 0;
    let descuentoTotal = 0;

    productosCotizacion.forEach(producto => {
        const subtotalProducto = producto.precio * producto.cantidad;
        const descuentoProducto = subtotalProducto * (producto.descuento / 100);

        subtotal += subtotalProducto;
        descuentoTotal += descuentoProducto;
    });

    const subtotalConDescuento = subtotal - descuentoTotal;
    const iva = subtotalConDescuento * 0.19;
    const total = subtotalConDescuento + iva;

    $('#cotiz_subtotal').text(formatearMoneda(subtotal));
    $('#cotiz_descuento_total').text('-' + formatearMoneda(descuentoTotal));
    $('#cotiz_iva').text(formatearMoneda(iva));
    $('#cotiz_total').text(formatearMoneda(total));
}

/**
 * Limpiar cotización
 */
function limpiar_cotizacion() {
    if (productosCotizacion.length === 0) {
        swal('Cotización vacía', 'No hay productos para limpiar', 'info');
        return;
    }

    swal({
        title: '¿Limpiar cotización?',
        text: "Se eliminarán todos los productos de la cotización actual",
        icon: 'warning',
        buttons: {
            cancel: {
                text: 'Cancelar',
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: 'Sí, limpiar',
                value: true,
                closeModal: true
            }
        },
        dangerMode: true
    }).then((willClear) => {
        if (willClear) {
            productosCotizacion = [];
            $('#cotiz_observaciones').val('');
            actualizar_tabla_cotizacion();

            swal({
                title: 'Cotización limpiada',
                icon: 'success',
                timer: 1500,
                buttons: false
            });
        }
    });
}

/**
 * Guardar borrador de cotización
 */
function guardar_borrador_cotizacion() {
    if (productosCotizacion.length === 0) {
        swal('Cotización vacía', 'Debe agregar al menos un producto', 'warning');
        return;
    }

    const datos = recopilar_datos_cotizacion('borrador');

    $.ajax({
            url: window.cotizacionRoutes.guardarBorrador,
        method: 'POST',
        data: JSON.stringify(datos),
        contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        success: function(response) {
            swal('Borrador guardado', 'La cotización se ha guardado como borrador', 'success');
            cargar_historial_cotizaciones();
        },
        error: function(xhr) {
            console.error('Error:', xhr);
            swal('Error', 'No se pudo guardar el borrador', 'error');
        }
    });
}

/**
 * Vista previa de cotización
 */
function vista_previa_cotizacion() {
    if (productosCotizacion.length === 0) {
        swal('Cotización vacía', 'Debe agregar al menos un producto', 'warning');
        return;
    }

    // Sincronizar datos de la tabla con el array antes de enviar
    sincronizar_productos_desde_tabla();

    const datos = recopilar_datos_cotizacion('vista_previa');

    // Debug: Verificar que los precios modificados se incluyen
    console.log('Datos enviados a vista previa:', datos);
    console.log('Productos con precios modificados:', productosCotizacion);

    // Abrir modal o nueva ventana con vista previa
    $.ajax({
            url: window.cotizacionRoutes.vistaPrevia,
            method: 'POST',
            data: JSON.stringify(datos),
            contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function(response) {
                // Mostrar PDF en modal o nueva ventana
                window.open(response.url, '_blank');
            },
            error: function(xhr) {
                console.error('Error:', xhr);
                swal('Error', 'No se pudo generar la vista previa', 'error');
        }
    });
}

/**
 * Generar cotización final
 */
function generar_cotizacion() {
    if (productosCotizacion.length === 0) {
        swal('Cotización vacía', 'Debe agregar al menos un producto', 'warning');
        return;
    }

    // Sincronizar datos de la tabla con el array antes de generar
    sincronizar_productos_desde_tabla();

    const datos = recopilar_datos_cotizacion('generada');

    swal({
        title: 'Generar Cotización',
        text: '¿Desea generar la cotización definitiva?',
        icon: 'info',
        buttons: {
            cancel: {
                text: 'Cancelar',
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: 'Sí, generar',
                value: true,
                closeModal: true
            }
        }
    }).then((willGenerate) => {
        if (willGenerate) {
            // Debug: Verificar datos antes de enviar
            console.log('Datos enviados para generar cotización:', datos);

            $.ajax({
                    url: window.cotizacionRoutes.generar,
                method: 'POST',
                data: JSON.stringify(datos),
                contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function(response) {
                    console.log(response);
                    swal({
                        title: 'Cotización generada',
                        text: `Cotización N° ${response.numero} generada exitosamente`,
                        icon: 'success',
                        buttons: {
                            cancel: {
                                text: 'Cerrar',
                                visible: true,
                                closeModal: true,
                            },
                            confirm: {
                                text: 'Descargar PDF',
                                value: true,
                                closeModal: true
                            }
                        }
                    }).then((willDownload) => {
                        if (willDownload) {
                            window.open(response.pdf_url, '_blank');
                        }
                    });

                    // Limpiar y recargar historial
                    productosCotizacion = [];
                    $('#cotiz_observaciones').val('');
                    actualizar_tabla_cotizacion();
                    cargar_historial_cotizaciones();
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    swal('Error', 'No se pudo generar la cotización', 'error');
                }
            });
        }
    });
}

/**
 * Enviar cotización por email
 */
function enviar_cotizacion_email() {
    const email = $('#cotiz_email').val();

    if (!email || email.trim() === '') {
        swal('Email requerido', 'Por favor ingrese un email para enviar la cotización', 'warning');
        $('#cotiz_email').focus();
        return;
    }

    if (productosCotizacion.length === 0) {
        swal('Cotización vacía', 'Debe agregar al menos un producto', 'warning');
        return;
    }

    // Sincronizar datos de la tabla con el array antes de enviar
    sincronizar_productos_desde_tabla();

    const datos = recopilar_datos_cotizacion('email');
    datos.email_destino = email;

    swal({
        title: 'Enviar por Email',
        text: `¿Desea enviar la cotización a ${email}?`,
        icon: 'info',
        buttons: {
            cancel: {
                text: 'Cancelar',
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: 'Sí, enviar',
                value: true,
                closeModal: true
            }
        }
    }).then((willSend) => {
        if (willSend) {
            $.ajax({
                    url: window.cotizacionRoutes.enviarEmail,
                method: 'POST',
                data: JSON.stringify(datos),
                contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function(response) {
                    swal('Email enviado', `La cotización ha sido enviada a ${email}`, 'success');
                    cargar_historial_cotizaciones();
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    swal('Error', 'No se pudo enviar el email', 'error');
                }
            });
        }
    });
}

/**
 * Sincronizar datos de la tabla con el array de productos
 */
function sincronizar_productos_desde_tabla() {
    // Leer los valores actuales de la tabla y actualizar el array
    $('#cotiz_tbody_productos tr').each(function(index) {
        if ($(this).attr('id') !== 'cotiz_row_vacio' && productosCotizacion[index]) {
            const $row = $(this);

            // Obtener valores de los inputs
            const cantidad = parseInt($row.find('input[type="number"]').eq(0).val()) || 1;
            const precio = parseFloat($row.find('input[type="number"]').eq(1).val()) || 0;
            const descuento = parseFloat($row.find('input[type="number"]').eq(2).val()) || 0;

            // Actualizar el array
            productosCotizacion[index].cantidad = cantidad;
            productosCotizacion[index].precio = precio;
            productosCotizacion[index].descuento = descuento;
        }
    });
}

/**
 * Recopilar datos de la cotización
 */
function recopilar_datos_cotizacion(estado) {
    // Asegurar que los productos tengan los datos actualizados
    const productosActualizados = productosCotizacion.map(producto => {
        const subtotal = producto.precio * producto.cantidad;
        const descuentoMonto = subtotal * (producto.descuento / 100);
        const subtotalConDescuento = subtotal - descuentoMonto;

        return {
            id: producto.id,
            codigo: producto.codigo,
            nombre: producto.nombre,
            precio: parseFloat(producto.precio), // Asegurar que sea número
            cantidad: parseInt(producto.cantidad), // Asegurar que sea número
            descuento: parseFloat(producto.descuento), // Asegurar que sea número
            stock: producto.stock,
            es_procedimiento: producto.es_procedimiento || false, // Flag para identificar tipo
            subtotal: subtotal,
            descuento_monto: descuentoMonto,
            subtotal_con_descuento: subtotalConDescuento
        };
    });

    return {
        paciente_id: $('#id_paciente_fc').val(), // Asegúrate de tener este campo oculto
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        rut: $('#cotiz_rut_paciente').val(),
        nombre: $('#cotiz_nombre_paciente').val(),
        telefono: $('#cotiz_telefono').val(),
        email: $('#cotiz_email').val(),
        fecha: $('#cotiz_fecha').val(),
        validez_dias: $('#cotiz_validez').val(),
        forma_pago: $('#cotiz_forma_pago').val(),
        observaciones: $('#cotiz_observaciones').val(),
        estado: estado,
        productos: productosActualizados
    };
}

/**
 * Cargar historial de cotizaciones
 */
function cargar_historial_cotizaciones() {
    const pacienteId = $('#id_paciente_fc').val();

    $.ajax({
            url: window.cotizacionRoutes.historial.replace(':paciente_id', pacienteId),
        method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        success: function(response) {
            mostrar_historial_cotizaciones(response.data);
        },
        error: function(xhr) {
            console.error('Error al cargar historial:', xhr);
        }
    });
}

/**
 * Mostrar historial de cotizaciones
 */
function mostrar_historial_cotizaciones(cotizaciones) {
    const tbody = $('#tbody_historial_cotizaciones');

    if (cotizaciones.length === 0) {
        tbody.html(`
            <tr>
                <td colspan="7" class="text-center text-muted py-3">
                    <i class="feather icon-file-text f-18 d-block mb-2"></i>
                    No hay cotizaciones previas
                </td>
            </tr>
        `);
        return;
    }

    let html = '';

    cotizaciones.forEach(cotiz => {
        const estadoBadge = obtener_badge_estado(cotiz.estado);

        // Calcular días restantes
        const hoy = new Date();
        const fechaValidaHasta = new Date(cotiz.valida_hasta);
        const diffMs = fechaValidaHasta - hoy;
        const diffDias = Math.ceil(diffMs / (1000 * 60 * 60 * 24));

        let seguimientoBtn = '';
        if (diffDias <= 3 && diffDias >= 0) {
            seguimientoBtn = `
                <button type="button" class="btn btn-sm btn-warning" onclick="realizar_seguimiento_cotizacion(${cotiz.id})" title="Seguimiento">
                    <i class="feather icon-alert-triangle"></i>
                </button>
            `;
        }

        html += `
            <tr>
                <td><strong>${cotiz.numero}</strong></td>
                <td>${formatearFecha(cotiz.fecha)}</td>
                <td>${formatearFecha(cotiz.valida_hasta)}</td>
                <td>${cotiz.cantidad_productos} producto(s)</td>
                <td class="text-right"><strong>${formatearMoneda(cotiz.total)}</strong></td>
                <td>${estadoBadge}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-info" onclick="ver_detalle_cotizacion(${cotiz.id})" title="Ver detalle">
                        <i class="feather icon-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary" onclick="descargar_cotizacion_pdf(${cotiz.id})" title="Descargar PDF">
                        <i class="feather icon-download"></i>
                    </button>
                    ${cotiz.estado !== 'anulada' ? `
                        <button type="button" class="btn btn-sm btn-danger" onclick="anular_cotizacion(${cotiz.id})" title="Anular">
                            <i class="feather icon-x"></i>
                        </button>
                    ` : ''}
                    ${seguimientoBtn}
                </td>
            </tr>
        `;
    });

    tbody.html(html);
}

/**
 * Obtener badge según estado
 */
function obtener_badge_estado(estado) {
    const estados = {
        'borrador': '<span class="badge badge-secondary">Borrador</span>',
        'generada': '<span class="badge badge-success">Generada</span>',
        'enviada': '<span class="badge badge-info">Enviada</span>',
        'aceptada': '<span class="badge badge-primary">Aceptada</span>',
        'rechazada': '<span class="badge badge-warning">Rechazada</span>',
        'anulada': '<span class="badge badge-danger">Anulada</span>'
    };
    return estados[estado] || '<span class="badge badge-secondary">Desconocido</span>';
}

/**
 * Formatear moneda
 */
function formatearMoneda(valor) {
    return new Intl.NumberFormat('es-CL', {
        style: 'currency',
        currency: 'CLP'
    }).format(valor);
}

/**
 * Formatear fecha
 */
function formatearFecha(fecha) {
    return new Date(fecha).toLocaleDateString('es-CL');
}

/**
 * Ver detalle de cotización
 */
function ver_detalle_cotizacion(id) {
    // Implementar modal o vista de detalle
    window.open(window.cotizacionRoutes.detalle.replace(':id', id), '_blank');
}

/**
 * Descargar PDF de cotización
 */
function descargar_cotizacion_pdf(id) {
    window.open(window.cotizacionRoutes.descargarPdf.replace(':id', id), '_blank');
}

/**
 * Anular cotización
 */
function anular_cotizacion(id) {
    swal({
        title: '¿Anular cotización?',
        text: "Esta acción no se puede deshacer",
        icon: 'warning',
        buttons: {
            cancel: {
                text: 'Cancelar',
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: 'Sí, anular',
                value: true,
                closeModal: true
            }
        },
        dangerMode: true
    }).then((willCancel) => {
        if (willCancel) {
            $.ajax({
                    url: window.cotizacionRoutes.anular.replace(':id', id),
                method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function(response) {
                    swal({
                        title: 'Cotización anulada',
                        icon: 'success',
                        timer: 1500,
                        buttons: false
                    });
                    cargar_historial_cotizaciones();
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    swal('Error', 'No se pudo anular la cotización', 'error');
                }
            });
        }
    });
}

function realizar_seguimiento_cotizacion(id) {
    // Implementar lógica de seguimiento (ej. abrir modal, enviar email, etc.)
    $('#id_seguimiento_cotizacion').val(id);
    // abrir modal para escribir el mensaje de seguimiento
    $('#modal_seguimiento_cotizacion').modal('show');
}

// Inicializar al cargar la página
$(document).ready(function() {
    // Cargar historial al abrir el tab
    $('a[href="#cotizacion_audif"]').on('shown.bs.tab', function() {
        cargar_historial_cotizaciones();
    });

    // Enter en búsqueda
    $('#cotiz_buscar_producto').on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            buscar_productos_cotizacion();
        }
    });
});
