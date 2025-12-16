@extends('template.laboratorio.laboratorio_profesional.template')
@section('page-script')
<script>

    $(document).ready(function() {
        // Cargar audífonos al cargar la página
        mis_audifonos();
    });

    function mis_audifonos(){
        // Mostrar mensaje de carga
        $('#lista_audifonos_control').html(`
            <div class="col-12">
                <div class="loading-message">
                    <i class="feather icon-loader"></i>
                    <h5 class="mt-3">Cargando audífonos...</h5>
                    <p class="text-muted">Por favor espere un momento</p>
                </div>
            </div>
        `);

        let id_paciente = $('#paciente_seleccionado_id').val();
        if(id_paciente === ''){
            $('#lista_audifonos_control').html(`
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        <i class="feather icon-alert-circle"></i>
                        Por favor seleccione un paciente para ver sus audífonos.
                    </div>
                </div>
            `);
            return;
        }

        let url = "{{ route('laboratorio.paciente.producto.listar') }}";
        let data = {
            id_paciente: $('#paciente_seleccionado_id').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            url: url,
            type: "GET",
            data: data,
        })
        .done(function(response) {
            console.log(response);
            $('#lista_audifonos_control').empty();
            let productos = response.productos;

            if(productos.length > 0){
                productos.forEach(function(producto){
                    let esPrestado = producto.estado == 2; // O producto.producto.estado == 2 según tu estructura

                    let bandaPrestado = '';
                    let botones = '';
                    if (esPrestado) {
                        bandaPrestado = `
                            <span class="badge badge-prestado" style="position: absolute; top: 10px; right: 10px; background: #f6ad55; color: #fff; font-weight: bold; padding: 6px 12px; border-radius: 8px; z-index: 10;">
                                <i class="feather icon-clock"></i> Prestado
                            </span>
                        `;
                        
                        
                    }else{
                            botones = `
                            <!-- Botones de acción -->
                                    <div class="botones-accion" style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 10px; width: 100%;">
                                        <button type="button"
                                                class="btn-accion btn-calibracion"
                                                onclick="calib_audif(); dame_audifono(${producto.id}, 'calibracion'); dame_historial_calibraciones_audifono()"
                                                style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 12px 6px; border: none; border-radius: 8px; font-size: 0.75rem; font-weight: 600; cursor: pointer; text-align: center; background: #5a67d8; background-color: #5a67d8; color: white; box-shadow: 0 2px 6px rgba(0,0,0,0.12); min-width: 0; width: 100%;">
                                            <i class="feather icon-settings" style="font-size: 1.5rem; margin-bottom: 4px; display: block;"></i>
                                            <span style="display: block; line-height: 1.2; font-size: 0.75rem;">Calibración</span>
                                        </button>
                                        <button type="button"
                                                class="btn-accion btn-reparacion"
                                                onclick="reparacion_audif(); dame_audifono(${producto.id}, 'reparacion'); dame_historial_reparaciones_audifono()"
                                                style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 12px 6px; border: none; border-radius: 8px; font-size: 0.75rem; font-weight: 600; cursor: pointer; text-align: center; background: #ed8936; background-color: #ed8936; color: white; box-shadow: 0 2px 6px rgba(0,0,0,0.12); min-width: 0; width: 100%;">
                                            <i class="feather icon-settings" style="font-size: 1.5rem; margin-bottom: 4px; display: block;"></i>
                                            <span style="display: block; line-height: 1.2; font-size: 0.75rem;">Reparación</span>
                                        </button>
                                    </div>
                        `;
                    }
                    // Filtrar solo audífonos
                    if(producto.producto.tipo_producto && producto.producto.tipo_producto.nombre.toLowerCase() !== 'audífonos'){
                        return;
                    }

                    console.log(producto);

                    // Procesar imagen
                    let imagenUrl = producto.producto.image_path || '';
                    if (imagenUrl && !imagenUrl.startsWith('http')) {
                        imagenUrl = '/' + imagenUrl;
                    }
                    if (!imagenUrl) {
                        imagenUrl = '/images/no-image.png';
                    }

                    // Determinar clase de stock
                    let stockActual = parseInt(producto.producto.stock_actual) || 0;
                    let stockClase = 'stock-alto';
                    let stockTexto = 'Stock disponible';

                    if (stockActual === 0) {
                        stockClase = 'stock-bajo';
                        stockTexto = 'Sin stock';
                    } else if (stockActual <= 5) {
                        stockClase = 'stock-medio';
                        stockTexto = 'Stock bajo';
                    } else if (stockActual <= 10) {
                        stockClase = 'stock-medio';
                        stockTexto = 'Stock medio';
                    }

                    // Obtener datos
                    let nombre = producto.producto.nombre || 'Sin nombre';
                    let codigo = producto.producto.codigo_interno || 'N/A';
                    let marca = producto.producto.marca ? producto.producto.marca.nombre : 'N/A';
                    let tipo = producto.producto.tipo_producto ? producto.producto.tipo_producto.nombre : 'N/A';
                    let precio = parseFloat(producto.producto.precio_venta || 0).toLocaleString('es-CL');
                    let lado = producto.lado || 'Ambos lados';

                    let item = `
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="card card-audifono h-100">
                                    ${bandaPrestado}
                                <!-- Imagen del producto -->
                                <div class="imagen-container">
                                    <img src="${imagenUrl}"
                                            class="card-img-top"
                                            alt="${nombre}"
                                            onerror="this.src='/images/no-image.png'">
                                    <span class="badge badge-stock ${stockClase}">
                                        <i class="feather icon-package"></i> ${stockTexto} (${stockActual} unidades)
                                    </span>
                                </div>

                                <!-- Cuerpo de la card -->
                                <div class="card-body-audifono" style="padding: 15px;">
                                    <!-- Icono y nombre -->
                                    <div class="producto-header">
                                        <i class="feather icon-headphones icon-producto"></i>
                                        <h6 class="producto-nombre">${nombre}</h6>
                                    </div>

                                    <!-- Información compacta -->
                                    <div class="producto-info">
                                        <div class="info-row">
                                            <i class="feather icon-tag"></i>
                                            <span>Código: <strong>${codigo}</strong></span>
                                        </div>
                                        <div class="info-row">
                                            <i class="feather icon-award"></i>
                                            <span>Marca: <strong>${marca}</strong></span>
                                        </div>
                                        <div class="info-row">
                                            <i class="feather icon-headphones"></i>
                                            <span>Tipo: <strong>${tipo}</strong></span>
                                        </div>
                                        <div class="info-row">
                                            <i class="feather icon-headphones"></i>
                                            <span>Lado: <strong>${lado}</strong></span>
                                        </div>
                                    </div>

                                    <!-- Precio -->
                                    <div class="producto-precio">
                                        $${precio}
                                    </div>

                                    ${botones}
                                    
                                </div>
                            </div>
                        </div>
                    `;

                    $('#lista_audifonos_control').append(item);
                });

                // Agregar eventos hover a los botones después de crearlos
                $('#lista_audifonos_control .btn-calibracion').hover(
                    function() {
                        $(this).css({
                            'background': '#4c51bf',
                            'background-color': '#4c51bf',
                            'transform': 'translateY(-2px)',
                            'box-shadow': '0 4px 12px rgba(0,0,0,0.2)'
                        });
                    },
                    function() {
                        $(this).css({
                            'background': '#5a67d8',
                            'background-color': '#5a67d8',
                            'transform': 'translateY(0)',
                            'box-shadow': '0 2px 6px rgba(0,0,0,0.12)'
                        });
                    }
                );

                $('#lista_audifonos_control .btn-reparacion').hover(
                    function() {
                        $(this).css({
                            'background': '#dd6b20',
                            'background-color': '#dd6b20',
                            'transform': 'translateY(-2px)',
                            'box-shadow': '0 4px 12px rgba(0,0,0,0.2)'
                        });
                    },
                    function() {
                        $(this).css({
                            'background': '#ed8936',
                            'background-color': '#ed8936',
                            'transform': 'translateY(0)',
                            'box-shadow': '0 2px 6px rgba(0,0,0,0.12)'
                        });
                    }
                );
            } else {
                // Mensaje cuando no hay productos
                let emptyMessage = `
                    <div class="col-12">
                        <div class="empty-message">
                            <i class="feather icon-inbox"></i>
                            <h5 class="mt-3">No se encontraron audífonos</h5>
                            <p class="text-muted">Este paciente no tiene audífonos registrados en el sistema.</p>
                        </div>
                    </div>
                `;
                $('#lista_audifonos_control').append(emptyMessage);
            }
        })
        .fail(function(jqXHR) {
            console.error('Error al obtener productos:', jqXHR);

            // Mostrar mensaje de error amigable
            $('#lista_audifonos_control').html(`
                <div class="col-12">
                    <div class="alert alert-danger text-center" role="alert">
                        <i class="feather icon-alert-circle" style="font-size: 2rem;"></i>
                        <h5 class="mt-3">Error al cargar los audífonos</h5>
                        <p>No se pudieron obtener los datos del servidor. Por favor intente nuevamente.</p>
                        <button class="btn btn-danger mt-2" onclick="mis_audifonos()">
                            <i class="feather icon-refresh-cw"></i> Reintentar
                        </button>
                    </div>
                </div>
            `);
        });
    }
    function buscar_paciente_venta_post_venta() {
        const tipoBusqueda = $('#tipo_busqueda_paciente_post_venta').val();
        const termino = $('#termino_busqueda_paciente_post_venta').val().trim();

        if (!termino || termino === '') {
            swal('Atención', 'Por favor ingrese un término de búsqueda', 'warning');
            return;
        }

        // Mostrar loader
        $('#resultados_busqueda_paciente_post_venta').html(`
            <div class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Buscando...</span>
                </div>
                <p class="mt-2">Buscando pacientes...</p>
            </div>
        `);

        // Petición AJAX (ajusta la ruta según tu configuración)
        $.ajax({
            url: "{{ route('profesional.buscar_rut_paciente') }}",
            method: 'GET',
            dataType: 'json', // Especificamos que esperamos JSON
            data: {
                tipo: tipoBusqueda,
                rut: termino
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Respuesta recibida:', response);
                console.log('Tipo de respuesta:', typeof response);

                // Si la respuesta es un objeto paciente directamente
                if (response && response.id) {
                    mostrar_resultado_paciente_post_venta(response);
                } else {
                    $('#resultados_busqueda_paciente_post_venta').html(`
                        <div class="alert alert-warning">
                            <i class="feather icon-alert-circle mr-2"></i>
                            No se encontró ningún paciente con ese RUT.
                        </div>
                    `);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en búsqueda:', xhr);
                console.error('Status:', status);
                console.error('Error:', error);

                let mensajeError = 'Error al buscar pacientes. Por favor intente nuevamente.';

                // Si hay una respuesta JSON del servidor con mensaje de error
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensajeError = xhr.responseJSON.message;
                }

                $('#resultados_busqueda_paciente').html(`
                    <div class="alert alert-danger">
                        <i class="feather icon-alert-circle mr-2"></i>
                        ${mensajeError}
                    </div>
                `);
            }
        });
    }
    /**
     *
     * Mostrar resultado de búsqueda de un solo paciente (por RUT) para post venta
     */
    function mostrar_resultado_paciente_post_venta(paciente) {
        const nombre = `${paciente.nombres || ''} ${paciente.apellido_uno || ''} ${paciente.apellido_dos || ''}`.trim();
        const rut = paciente.rut || 'N/A';
        const email = paciente.email || 'Sin email';
        const telefono = paciente.telefono_uno || paciente.telefono || 'Sin teléfono';
        const edad = paciente.edad || 'N/A';
        const prevision = paciente.prevision?.nombre || 'Sin previsión';

        let html = `
            <div class="card border-success mb-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="mb-2">
                                <i class="feather icon-user text-success mr-2"></i>
                                ${nombre}
                            </h5>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <small class="text-muted d-block">RUT:</small>
                                    <strong>${rut}</strong>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <small class="text-muted d-block">Edad:</small>
                                    <strong>${edad} años</strong>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <small class="text-muted d-block">Teléfono:</small>
                                    <strong>${telefono}</strong>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <small class="text-muted d-block">Email:</small>
                                    <strong>${email}</strong>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <small class="text-muted d-block">Previsión:</small>
                                    <strong>${prevision}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <button type="button" class="btn btn-success btn-lg btn-block"
                                    onclick="seleccionar_paciente_post_venta(${paciente.id}, '${rut}', '${nombre}', '${telefono}', '${email}')">
                                <i class="feather icon-check-circle mr-2"></i>
                                Seleccionar Paciente
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm btn-block mt-2"
                                    onclick="limpiar_busqueda_paciente()">
                                <i class="feather icon-x mr-1"></i>
                                Buscar otro
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#resultados_busqueda_paciente_post_venta').html(html);
    }

    function seleccionar_paciente_post_venta(id, rut, nombre, telefono, email) {
        // Reutilizar la función unificada
        seleccionar_paciente_venta(id, rut, nombre, telefono, email);
    }

    /**
 * Seleccionar paciente UNIFICADO - Sincroniza en ambas pestañas (Venta y Post Venta)
 */
    function seleccionar_paciente_venta(id, rut, nombre, telefono, email) {
        // Guardar ID del paciente en TODOS los campos hidden (incluyendo el de la vista padre)
        $('#paciente_seleccionado_id').val(id);
        $('#paciente_seleccionado_id_post_venta').val(id);
        $('#id_paciente_fc').val(id); // Campo de la vista padre

        // Actualizar card de VENTA
        $('#paciente_sel_rut').text(rut);
        $('#paciente_sel_nombre').text(nombre);
        $('#paciente_sel_email').text(email);
        $('#paciente_sel_telefono').text(telefono);
        $('#card_paciente_seleccionado').removeClass('d-none');
        $('#card_busqueda_paciente').hide();

        // Actualizar card de POST VENTA (si existe)
        if ($('#card_paciente_seleccionado_post_venta').length > 0) {
            $('#paciente_sel_rut_post_venta').text(rut);
            $('#paciente_sel_nombre_post_venta').text(nombre);
            $('#paciente_sel_email_post_venta').text(email);
            $('#paciente_sel_telefono_post_venta').text(telefono);
            $('#card_paciente_seleccionado_post_venta').removeClass('d-none');

            $('#card_busqueda_paciente_post_venta').hide();
        }

        // Actualizar card de COTIZACIÓN (si existe)
        if ($('#card_paciente_seleccionado_cotiz').length > 0) {
            $('#cotiz_rut_paciente').val(rut);
            $('#cotiz_nombre_paciente').val(nombre);
            $('#cotiz_telefono').val(telefono || '');
            $('#cotiz_email').val(email || '');

            $('#cotiz_paciente_sel_rut').text(rut);
            $('#cotiz_paciente_sel_nombre').text(nombre);
            $('#cotiz_paciente_sel_telefono').text(telefono);
            $('#cotiz_paciente_sel_email').text(email || 'No registrado');

            $('#card_paciente_seleccionado_cotiz').show();
            $('#card_busqueda_paciente_cotiz').hide();
        }

        // Actualizar card de PRÉSTAMO DE AUDÍFONOS (si existe)
        if ($('#card_paciente_seleccionado_prestamo').length > 0) {
            $('#prestamo_paciente_sel_rut').text(rut);
            $('#prestamo_paciente_sel_nombre').text(nombre);
            $('#prestamo_paciente_sel_email').text(email);
            $('#prestamo_paciente_sel_telefono').text(telefono);
            
            $('#card_paciente_seleccionado_prestamo').show();
            $('#card_busqueda_paciente_prestamo').hide();

            $('#card_advertencia_paciente_prestamo').hide();
            $('#card_busqueda_paciente_prestamo').hide();
        }

        // Actualizar card de RECEPCIÓN DE AUDÍFONOS (si existe)
        if ($('#card_paciente_seleccionado_recepcion').length > 0) {
            $('#recepcion_paciente_sel_rut').text(rut);
            $('#recepcion_paciente_sel_nombre').text(nombre);
            $('#recepcion_paciente_sel_email').text(email);
            $('#recepcion_paciente_sel_telefono').text(telefono);
            
            $('#card_paciente_seleccionado_recepcion').show();
            $('#card_busqueda_paciente_recepcion').hide();

            $('#card_advertencia_paciente_recepcion').hide();
            $('#card_busqueda_paciente_recepcion').hide();
        }

        // Limpiar resultados de búsqueda de TODAS las pestañas
        $('#resultados_busqueda_paciente').html('');
        $('#termino_busqueda_paciente').val('');
        $('#resultados_busqueda_paciente_post_venta').html('');
        $('#termino_busqueda_paciente_post_venta').val('');
        $('#resultados_busqueda_paciente_cotiz').html('');
        $('#termino_busqueda_paciente_cotiz').val('');
        $('#resultados_busqueda_paciente_prestamo').html('');
        $('#termino_busqueda_paciente_prestamo').val('');

        // Cargar productos del paciente seleccionado (para post venta)
        if (typeof mis_productos === 'function') {
            mis_productos(id);
        }
        if (typeof mis_audifonos === 'function') {
            mis_audifonos(id);
        }

        // Mensaje de éxito
        swal({
            title: 'Paciente seleccionado',
            text: `${nombre} ha sido seleccionado para toda la atención`,
            icon: 'success',
            timer: 1500,
            buttons: false
        });

        console.log(`Paciente ID ${id} seleccionado y sincronizado en todos los campos (id_paciente_fc incluido)`);
    }

    function dame_audifono(id_producto, seccion) {
        console.log('Producto seleccionado ID:', id_producto);

        // cargamos datos del producto en campos del formulario
        let url = "{{ route('laboratorio.paciente.producto.dameProducto', '') }}/" + id_producto;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            success: function(data) {
                console.log(data);
                if(data.estado == 1){
                    let producto = data.producto.producto;
                    $('#id_producto').val(producto.id);
                    // abrir modal de detalle del producto para su control y revision
                    console.log(producto);
                    if(seccion == 'calibracion') {
                        $('#marca_audif').val(producto.marca.nombre || 'N/A');
                        $('#model_audif').val(producto.nombre || 'N/A');
                    }else{
                        $('#marca_rep').val(producto.marca.nombre || 'N/A');
                        $('#modelo_rep').val(producto.nombre || 'N/A');
                    }
                }
            },
            error: function() {
                console.error('Error al cargar los datos del producto');
            }
        });
    }

    function mis_productos(){
        let url = "{{ route('laboratorio.paciente.producto.listar') }}";
        let data = {
            id_paciente: $('#id_paciente_fc').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            url: url,
            type: "GET",
            data: data,
        })
        .done(function(response) {
            console.log(response);
            $('#productos-lista').empty();
            let productos = response.productos;
            if(productos.length > 0){
                let productosPropios = [];
                productos.forEach(function(producto){
                    console.log(producto);
                    let imagenUrl = producto.producto.image_path || '';
                    if (imagenUrl && !imagenUrl.startsWith('http')) {
                        imagenUrl = '/' + imagenUrl;
                    }

                    let esPrestado = producto.estado == 2; // O producto.producto.estado == 2 según tu estructura
                    if(esPrestado){
                        return; // Saltar este producto si está prestado
                    }else{
                        productosPropios.push(producto);
                    }

                    let item = `
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <img src="${imagenUrl}" class="img-fluid rounded" style="width: 200px; height: 200px;" alt="${producto.producto.nombre}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">${producto.producto.nombre}</h5>
                                    <p class="card-text">Código: ${producto.producto.codigo_interno || 'N/A'}</p>
                                    <p class="card-text">Marca: ${producto.producto.marca ? producto.producto.marca.nombre : 'N/A'}</p>
                                    <p class="card-text">Tipo: ${producto.producto.tipo_producto ? producto.producto.tipo_producto.nombre : 'N/A'}</p>
                                    <p class="card-text">Stock Actual: ${producto.producto.stock_actual || 0}</p>
                                    <p class="card-text">Precio: $${parseFloat(producto.producto.precio_venta).toFixed(0)}</p>
                                    <button class="btn btn-primary mt-auto" onclick="dame_producto(${producto.id})">Revisar</button>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#productos-lista').append(item);
                });
            } else {
                $('#productos-lista').append('<p>No se encontraron productos.</p>');
            }
            
        })
        .fail(function(jqXHR) {
            console.error('Error al obtener productos:', jqXHR);
        });
    }

    // Ver detalle del producto
    function ver_detalle_producto_audifono(id_producto) {
        console.log('Ver detalle del producto ID:', id_producto);

        // Hacer petición AJAX para obtener detalles completos
        let url = "{{ route('laboratorio.profesional.detalle_producto_audifono', '') }}/" + id_producto;

        $.ajax({
            url: url,
            type: "GET",
        })
        .done(function(data) {
            console.log('Detalle del producto:', data);
            if (data.producto) {
                mostrar_modal_detalle_producto(data.producto);
            }
        })
        .fail(function() {
            swal({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo cargar el detalle del producto.'
            });
        });
    }

    // Mostrar modal con detalle del producto
    function mostrar_modal_detalle_producto(producto) {
        let imagenUrl = producto.image_path || '';
        if (imagenUrl && !imagenUrl.startsWith('http')) {
            imagenUrl = '/' + imagenUrl;
        }

        let contenido = '<div class="container-fluid">';
        contenido += '<div class="row">';
        contenido += '<div class="col-md-4 text-center">';
        contenido += '<img src="' + (imagenUrl || '/images/no-image.png') + '" class="img-fluid rounded mb-2" onerror="this.src=\'/images/no-image.png\'">';
        contenido += '</div>';
        contenido += '<div class="col-md-8">';
        contenido += '<h5>' + producto.nombre + '</h5>';
        contenido += '<p><strong>Código:</strong> ' + (producto.codigo_interno || 'N/A') + '</p>';
        contenido += '<p><strong>Marca:</strong> ' + (producto.marca.nombre || 'N/A') + '</p>';
        contenido += '<p><strong>Tipo:</strong> ' + (producto.tipo_producto.nombre || 'N/A') + '</p>';
        contenido += '<p><strong>Stock Actual:</strong> ' + (producto.stock_actual || 0) + '</p>';
        contenido += '<p><strong>Stock Mínimo:</strong> ' + (producto.stock_minimo || 0) + '</p>';
        contenido += '<p><strong>Stock Máximo:</strong> ' + (producto.stock_maximo || 0) + '</p>';
        contenido += '<p><strong>Descripción:</strong> ' + (producto.descripcion || 'Sin descripción') + '</p>';
        if (producto.observaciones) {
            contenido += '<p><strong>Observaciones:</strong> ' + producto.observaciones + '</p>';
        }
        contenido += '</div>';
        contenido += '</div>';
        contenido += '</div>';

        swal({
            title: 'Detalle del Producto',
            content: {
                element: "div",
                attributes: {
                    innerHTML: contenido
                }
            },
            buttons: {
                cancel: "Cerrar",
                confirm: {
                    text: "Seleccionar",
                    value: true,
                }
            }
        }).then((seleccionar) => {
            if (seleccionar) {
                seleccionar_producto_audifono(producto.id, producto.precio_venta);
            }
        });
    }

        // Seleccionar producto
    function dame_producto(id_producto) {
        console.log('Producto seleccionado ID:', id_producto);

        // cargamos datos del producto en campos del formulario
        let url = "{{ route('laboratorio.paciente.producto.dameProducto', '') }}/" + id_producto;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            success: function(data) {
                console.log(data);
                if(data.estado == 1){
                    let producto = data.producto.producto;
                    swal({
                        icon: 'success',
                        title: 'Producto seleccionado',
                        text: 'Ha seleccionado el producto: ' + (producto.nombre || 'Sin nombre'),
                        showConfirmButton: false,
                        timer: 1500
                    });
                    // abrir modal de detalle del producto para su control y revision
                    console.log(producto);
                    if(producto.image_path && !producto.image_path.startsWith('http')){
                        producto.image_path = '/' + producto.image_path;
                    }
                    $('#detalle-codigo-interno').text(producto.codigo_interno || 'N/A');
                    $('#detalle-nombre').text(producto.nombre || 'N/A');
                    $('#detalle-descripcion').text(producto.descripcion || 'N/A');
                    $('#detalle-numero-serie').text(producto.numero_serie || 'N/A');
                    $('#detalle-imagen').attr('src', producto.image_path || '').toggle(!!producto.image_path);

                    // Mostrar calificación con estrellas
                    mostrarCalificacionEstrellas(data.producto.satisfaccion);

                    $('#id_producto_seleccionado').val(producto.id);
                }
            },
            error: function() {
                console.error('Error al cargar los datos del producto');
            }
        });
    }

     function evaluar_tipo_control(){
        let tipo_control = $('#tipo_control_audifono').val();
        console.log('Tipo de control seleccionado:', tipo_control);
        if(tipo_control === 'Otro proveedor'){
            $('#div_otro_proveedor').removeClass('d-none');
            $('#lista_audifonos_control').addClass('d-none');
            dame_audifonos_externos();
        } else {
            $('#div_otro_proveedor').addClass('d-none');
            $('#lista_audifonos_control').removeClass('d-none');
        }
    }

    function dame_audifonos_externos(){
        let id_paciente = $('#paciente_seleccionado_id').val();
        let url = "{{ route('laboratorio.audifono.externo.listar') }}";
        let data = {
            id_paciente: id_paciente,
            _token: CSRF_TOKEN
        };

        // Mostrar mensaje de carga
        $('#lista_audifonos_externos').html(`
            <div class="col-12">
                <div class="loading-message">
                    <i class="feather icon-loader"></i>
                    <h5 class="mt-3">Cargando audífonos externos...</h5>
                    <p class="text-muted">Por favor espere un momento</p>
                </div>
            </div>
        `);
        $.ajax({
            url: url,
            type: "GET",
            data: data,
        })
        .done(function(response) {
            console.log(response);
            $('#lista_audifonos_externos').empty();
            let audifonos = response.audifonos;
            if(audifonos.length > 0){
                audifonos.forEach(function(audifono){
                    console.log(audifono);

                    // Formatear fecha
                    let fechaAdq = new Date(audifono.fecha_adquisicion);
                    let fechaAdqStr = fechaAdq.toLocaleDateString('es-CL');

                    let item = `
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Proveedor: ${audifono.procedencia_laboratorio}</h5>
                                    <p class="card-text">Fecha Adquisición: ${fechaAdqStr}</p>
                                    <hr>
                                    <h6>Audífono Izquierdo</h6>
                                    <p class="card-text">Marca: ${audifono.marca_izquierdo || 'N/A'}</p>
                                    <p class="card-text">Modelo: ${audifono.modelo_izquierdo || 'N/A'}</p>
                                    <p class="card-text">N° Serie: ${audifono.n_serie_izquierdo || 'N/A'}</p>
                                    <hr>
                                    <h6>Audífono Derecho</h6>
                                    <p class="card-text">Marca: ${audifono.marca_derecho || 'N/A'}</p>
                                    <p class="card-text">Modelo: ${audifono.modelo_derecho || 'N/A'}</p>
                                    <p class="card-text">N° Serie: ${audifono.n_serie_derecho || 'N/A'}</p>
                                    <hr>
                                    <p class="card-text">Estado: ${audifono.estado_audifono || 'N/A'}</p>
                                    <p class="card-text">Motivo Control: ${audifono.motivo_control || 'N/A'}</p>
                                    <p class="card-text">Observaciones: ${audifono.observaciones || 'N/A'}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#lista_audifonos_externos').append(item);
                });
            } else {
                $('#lista_audifonos_externos').append('<p>No se encontraron audífonos externos.</p>');
            }
        })
        .fail(function(jqXHR) {
            console.error('Error al obtener audífonos externos:', jqXHR);
            $('#lista_audifonos_externos').html('<p>Error al cargar audífonos externos.</p>');
        });

    }

    function dame_historial_reparaciones_audifono(){
            let id_producto = $('#id_producto').val();
            let id_paciente = $('#paciente_seleccionado_id').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_profesional = $('#id_profesional_fc').val();

            let url = "{{ route('laboratorio.profesional.dame_historial_reparaciones_audifono') }}";
            let data = {
                id_producto: id_producto,
                id_paciente: id_paciente,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type: "POST",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                if(response.estado === 1){
                    // Procesar las reparaciones de audífono
                    let table = $('#tabla_historial_reparaciones_audifono').DataTable();
                    table.clear().draw();
                    let reparaciones = response.data;
                    reparaciones.forEach(function(reparacion) {
                        let fecha = new Date(reparacion.created_at).toLocaleDateString('es-CL');
                        let hora = new Date(reparacion.created_at).toLocaleTimeString('es-CL', { hour: '2-digit', minute: '2-digit' });
                        let fila = [
                            fecha + ' ' + hora,
                            reparacion.motivo_reparacion_text,
                            reparacion.estado_reparacion_text,
                            reparacion.marca_producto + ' ' + reparacion.nombre_producto,
                            reparacion.acciones_reparacion,
                            reparacion.opinion_paciente,
                            reparacion.nombre_producto_reparo
                        ];
                        table.row.add(fila).draw();
                    });
                } else {
                    swal('Error', response.mensaje || 'No se pudo obtener el historial de reparaciones', 'error');
                }
            })
        }

        function deseleccionar_paciente_post_venta() {
            deseleccionar_paciente();
        }

        function deseleccionar_paciente() {
            swal({
                title: '¿Cambiar paciente?',
                text: "Se perderá la selección actual en todas las pestañas",
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: 'Cancelar',
                        visible: true,
                        closeModal: true,
                    },
                    confirm: {
                        text: 'Sí, cambiar',
                        value: true,
                        closeModal: true
                    }
                }
            }).then((willChange) => {
                if (willChange) {
                    // Limpiar TODOS los campos hidden (incluyendo el de la vista padre)
                    $('#paciente_seleccionado_id').val('');
                    $('#paciente_seleccionado_id_post_venta').val('');
                    $('#id_paciente_fc').val(''); // Campo de la vista padre

                    // Limpiar campos de cotización
                    $('#cotiz_rut_paciente').val('');
                    $('#cotiz_nombre_paciente').val('');
                    $('#cotiz_telefono').val('');
                    $('#cotiz_email').val('');

                    $('#card_busqueda_paciente').show();
                    $('#card_advertencia_paciente').show();

                    // Ocultar TODAS las cards de paciente seleccionado
                    $('#card_paciente_seleccionado').addClass('d-none');
                    if ($('#card_paciente_seleccionado_post_venta').length > 0) {
                        $('#card_paciente_seleccionado_post_venta').addClass('d-none');
                        $('#card_advertencia_paciente_post_venta').show();
                        $('#card_busqueda_paciente_post_venta').show();
                    }
                    if ($('#card_paciente_seleccionado_cotiz').length > 0) {
                        $('#card_paciente_seleccionado_cotiz').hide();
                        $('#card_advertencia_paciente_cotiz').show();
                        $('#card_busqueda_paciente_cotiz').show();
                    }

                    if($('#card_paciente_seleccionado_prestamo').length > 0) {
                        $('#card_paciente_seleccionado_prestamo').hide();
                        $('#card_advertencia_paciente_prestamo').show();
                        $('#card_busqueda_paciente_prestamo').show();
                    }

                    if($('#card_paciente_seleccionado_recepcion').length > 0) {
                        $('#card_paciente_seleccionado_recepcion').hide();
                        $('#card_advertencia_paciente_recepcion').show();
                        $('#card_busqueda_paciente_recepcion').show();
                    }

                    // Limpiar campos de búsqueda de TODAS las pestañas
                    $('#termino_busqueda_paciente').val('');
                    $('#resultados_busqueda_paciente').html('');
                    $('#termino_busqueda_paciente_post_venta').val('');
                    $('#resultados_busqueda_paciente_post_venta').html('');
                    $('#termino_busqueda_paciente_cotiz').val('');
                    $('#resultados_busqueda_paciente_cotiz').html('');
                    $('#termino_busqueda_paciente_prestamo').val('');
                    $('#resultados_busqueda_paciente_prestamo').html('');
                    $('#termino_busqueda_paciente_recepcion').val('');
                    $('#resultados_busqueda_paciente_recepcion').html('');

                    // Limpiar listas de productos
                    $('#productos-lista').html('');
                    $('#lista_audifonos_control').html('');

                    swal('Paciente deseleccionado', 'Puede buscar otro paciente', 'success');

                    console.log('Todos los campos de paciente limpiados (incluyendo id_paciente_fc y cotización)');
                }
            });
        }

        function limpiar_busqueda_paciente() {
            $('#termino_busqueda_paciente').val('');
            $('#resultados_busqueda_paciente').html('');
            $('#tipo_busqueda_paciente').val('rut');
            if ($('#termino_busqueda_paciente_post_venta').length > 0) {
                $('#termino_busqueda_paciente_post_venta').val('');
                $('#resultados_busqueda_paciente_post_venta').html('');
                $('#tipo_busqueda_paciente_post_venta').val('rut');
            }

            if( $('#termino_busqueda_paciente_cotiz').length > 0) {
                $('#termino_busqueda_paciente_cotiz').val('');
                $('#resultados_busqueda_paciente_cotiz').html('');
                $('#tipo_busqueda_paciente_cotiz').val('rut');
            }

            if( $('#termino_busqueda_paciente_prestamo').length > 0) {
                $('#termino_busqueda_paciente_prestamo').val('');
                $('#resultados_busqueda_paciente_prestamo').html('');
                $('#tipo_busqueda_paciente_prestamo').val('rut');
            }
        }
</script>
@endsection
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
                            </div>
                            <ul class="breadcrumb mb-2">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Control de audífonos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- Paciente Seleccionado para POST VENTA (oculto inicialmente) -->
       
        
        @if($profesional->id_tipo_institucion == 3)
            <h5 class="text-c-blue f-18 mb-3">
                <i class="feather icon-inbox mr-2"></i>
                Buscar Paciente para Control Post Venta de Audífonos
            </h5>
            
            <div class="row d-none" id="card_paciente_seleccionado_post_venta">
                <div class="col-12">
                    <div class="card border-success mb-3" style="background-color: #d4edda;">
                        <div class="card-body py-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="feather icon-check text-white" style="font-size: 24px;"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="mb-0 text-success font-weight-bold">
                                        Paciente Seleccionado
                                    </h6>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <small class="text-muted d-block mb-0">RUT:</small>
                                    <strong id="paciente_sel_rut_post_venta" class="d-block">-</strong>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <small class="text-muted d-block mb-0">Nombre:</small>
                                    <strong id="paciente_sel_nombre_post_venta" class="d-block">-</strong>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <small class="text-muted d-block mb-0">Email:</small>
                                    <strong id="paciente_sel_email_post_venta" class="d-block">-</strong>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <small class="text-muted d-block mb-0">Teléfono:</small>
                                    <strong id="paciente_sel_telefono_post_venta" class="d-block">-</strong>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-right">
                                    <button type="button" class="btn btn-sm btn-warning" onclick="deseleccionar_paciente_post_venta()" title="Cambiar paciente">
                                        <i class="feather icon-refresh-cw"></i> Cambiar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Buscador de Paciente -->
            <div class="card border-primary" id="card_busqueda_paciente_post_venta">
                <div class="card-header bg-primary">
                    <h6 class="text-white mb-0">
                        <i class="feather icon-search mr-2"></i>
                        Buscar Paciente
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Tipo de búsqueda -->
                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label class="font-weight-bold">Buscar por:</label>
                            <select class="form-control form-control-sm" id="tipo_busqueda_paciente_post_venta" name="tipo_busqueda_paciente_post_venta" disabled>
                                <option value="rut" selected>RUT</option>
                                <option value="nombre">Nombre</option>
                                <option value="email">Email</option>
                            </select>
                        </div>

                        <!-- Campo de búsqueda -->
                        <div class="form-group col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            <label class="font-weight-bold">Término de búsqueda:</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="termino_busqueda_paciente_post_venta" oninput="formatoRut(this)" name="termino_busqueda_paciente_post_venta" placeholder="Ingrese RUT, nombre o email del paciente..." onkeypress="if(event.keyCode==13){buscar_paciente_venta_post_venta(); return false;}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="button" onclick="buscar_paciente_venta_post_venta()">
                                        <i class="feather icon-search"></i> Buscar
                                    </button>
                                </div>
                            </div>
                            <small class="form-text text-muted">
                                <i class="feather icon-info"></i> Presione Enter o haga clic en Buscar
                            </small>
                        </div>


                        <!-- Botón limpiar -->
                        <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label class="font-weight-bold d-block">&nbsp;</label>
                            <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="limpiar_busqueda_paciente_post_venta()">
                                <i class="feather icon-x"></i> Limpiar
                            </button>
                        </div>
                    </div>

                    <!-- Resultados de búsqueda -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <div id="resultados_busqueda_paciente_post_venta"></div>
                        </div>
                    </div>
                </div>
            </div>

    
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 pl-0 mt-1">
                        <ul class="nav nav-tabs-secciones mb-2" id="control-aud" role="tablist">
                            <li class="nav-item-secciones">
                                <a class="nav-secciones active text-uppercase" id="control-calibracion-tab" onclick="mis_audifonos()" data-toggle="tab" href="#control-calibracion" role="tab" aria-controls="control-calibracion" aria-selected="true">Control y calibracion de audifonos</a>
                            </li>
                            <li class="nav-item-secciones">
                                <a class="nav-secciones text-uppercase" id="control-mis-productos-tab" data-toggle="tab" href="#control-mis-productos" role="tab" aria-controls="control-mis-productos" aria-selected="false">Control de productos del paciente</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="control-audContent">
                    <div class="tab-pane fade show active" id="control-calibracion" role="tabpanel" aria-labelledby="control-calibracion-tab">
                        <h5 class="text-c-blue f-18 mb-3">
                            <i class="feather icon-inbox mr-2"></i>
                            Buscar Paciente para Control Post Venta de Audífonos
                        </h5>
         
                        <div class="row d-none" id="card_paciente_seleccionado_post_venta">
                            <div class="col-12">
                                <div class="card border-success mb-3" style="background-color: #d4edda;">
                                    <div class="card-body py-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                    <i class="feather icon-check text-white" style="font-size: 24px;"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-0 text-success font-weight-bold">
                                                    Paciente Seleccionado
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <small class="text-muted d-block mb-0">RUT:</small>
                                                <strong id="paciente_sel_rut_post_venta" class="d-block">-</strong>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <small class="text-muted d-block mb-0">Nombre:</small>
                                                <strong id="paciente_sel_nombre_post_venta" class="d-block">-</strong>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <small class="text-muted d-block mb-0">Email:</small>
                                                <strong id="paciente_sel_email_post_venta" class="d-block">-</strong>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <small class="text-muted d-block mb-0">Teléfono:</small>
                                                <strong id="paciente_sel_telefono_post_venta" class="d-block">-</strong>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-right">
                                                <button type="button" class="btn btn-sm btn-warning" onclick="deseleccionar_paciente_post_venta()" title="Cambiar paciente">
                                                    <i class="feather icon-refresh-cw"></i> Cambiar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Buscador de Paciente -->
                        <div class="card border-primary" id="card_busqueda_paciente_post_venta">
                            <div class="card-header bg-primary">
                                <h6 class="text-white mb-0">
                                    <i class="feather icon-search mr-2"></i>
                                    Buscar Paciente
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Tipo de búsqueda -->
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="font-weight-bold">Buscar por:</label>
                                        <select class="form-control form-control-sm" id="tipo_busqueda_paciente_post_venta" name="tipo_busqueda_paciente_post_venta" disabled>
                                            <option value="rut" selected>RUT</option>
                                            <option value="nombre">Nombre</option>
                                            <option value="email">Email</option>
                                        </select>
                                    </div>

                                    <!-- Campo de búsqueda -->
                                    <div class="form-group col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                        <label class="font-weight-bold">Término de búsqueda:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" id="termino_busqueda_paciente_post_venta" oninput="formatoRut(this)" name="termino_busqueda_paciente_post_venta" placeholder="Ingrese RUT, nombre o email del paciente..." onkeypress="if(event.keyCode==13){buscar_paciente_venta_post_venta(); return false;}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sm" type="button" onclick="buscar_paciente_venta_post_venta()">
                                                    <i class="feather icon-search"></i> Buscar
                                                </button>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">
                                            <i class="feather icon-info"></i> Presione Enter o haga clic en Buscar
                                        </small>
                                    </div>


                                    <!-- Botón limpiar -->
                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <label class="font-weight-bold d-block">&nbsp;</label>
                                        <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="limpiar_busqueda_paciente_post_venta()">
                                            <i class="feather icon-x"></i> Limpiar
                                        </button>
                                    </div>
                                </div>

                                <!-- Resultados de búsqueda -->
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div id="resultados_busqueda_paciente_post_venta"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-c-blue f-18">Control de Audífonos</h5>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Control de Audifono</label>
                                                <select class="form-control form-control-sm" name="tipo_control_audifono" id="tipo_control_audifono" onchange="evaluar_tipo_control()">
                                                    <option selected>Seleccione</option>
                                                    <option>Propio</option>
                                                    <option>Otro proveedor</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Fecha de Control</label>
                                                        <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="<?php echo date('Y-m-d') ?>">
                                                    </div>
                                                    @if(isset($profesional))
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Examinador</label>
                                                        <input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="{{ $profesional->nombre }}">
                                                    </div>
                                                    @endif
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Examen del Cae</label>
                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ex_fis_control_audif" id="ex_fis_control_audif" placeholder="sintomatología, examen conducto auditivo."></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                            @if(isset($profesional) && isset($id_lugar_atencion))
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div id="pieza_dentalrx" class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-group">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-block"
                                                                onclick="hora_medica({{ $profesional->id }}, {{ $id_lugar_atencion }})"><i
                                                                    class="feather icon-calendar"></i> Agendar
                                                                hora</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto">
                                                        <div class="card-informacion"
                                                            style="border: 1px solid #6c9bd5;">
                                                            <div class="card-top text-center">
                                                                <h5 class="text-c-blue">PRÓXIMO CONTROL</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div
                                                                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                        <h5 class="text-c-blue"><i
                                                                                class="fas fa-calendar"></i>
                                                                            Fecha:</h5>
                                                                        <h5 class="font-weight-bold" id="proxima_fecha_atencion">
                                                                            {{ isset($proxima_fecha_atencion) ? $proxima_fecha_atencion : '' }}
                                                                        </h5>
                                                                    </div>
                                                                    <div
                                                                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                        <h5 class="text-c-blue"><i
                                                                                class="fas fa-clock"></i>
                                                                            Horario:</h5>
                                                                        <p id="proxima_hora_atencion"> <strong id="hora_inicio_atencion">{{ isset($hora_inicio_atencion) ? $hora_inicio_atencion : '--:--' }}</strong>
                                                                            a
                                                                            <strong id="hora_fin_atencion">{{ isset($hora_fin_atencion) ? $hora_fin_atencion : '--:--' }}</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                <!--Card Información audifono-->

                                    <div class="row" id="lista_audifonos_control">
                                        <!--AUDIFONO IZQUIERDO-->
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="badge badge-izq">AUDÍFONO IZQUIERDO</div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">N° Serie</label>
                                                    {{--  <div> {{ $n_serie_aud_izq" }} </div>  --}}
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                    {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                    {{--  <div> {{ $paciente->apellido_dos }}
                                                    </div>  --}}
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                    <div>
                                                        {{--  @if ($paciente->sexo == 'F')
                                                            Mujer
                                                        @elseif ($paciente->sexo == 'M')
                                                            Hombre
                                                        @endif  --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Fecha de último control</label>
                                                    <div>
                                                        {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                    <div> Buena</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--AUDIFONO DERECHO-->
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="badge badge-der">AUDÍFONO DERECHO</div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">N° Serie</label>
                                                    {{--  <div> {{ $paciente->rut }} </div>  --}}
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                    {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                    {{--  <div> {{ $paciente->apellido_dos }}
                                                    </div>  --}}
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                    <div>
                                                        {{--  @if ($paciente->sexo == 'F')
                                                            Mujer
                                                        @elseif ($paciente->sexo == 'M')
                                                            Hombre
                                                        @endif  --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Fecha de último control</label>
                                                    <div>
                                                        {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                    <div> Buena</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Formulario para audífonos de otro proveedor --}}
                                    <div class="row d-none" id="div_otro_proveedor">
                                        <div class="col-12">
                                            <div class="card border-info">
                                                <div class="card-header bg-info">
                                                    <h5 class="text-white mb-0">
                                                        <i class="feather icon-package mr-2"></i>
                                                        Registro de Audífono Externo
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form_audifono_externo">
                                                        @if(isset($paciente))
                                                        <input type="hidden" id="id_paciente_externo" name="id_paciente" value="{{ $paciente->id }}">
                                                        @endif
                                                        <div class="row">
                                                            <div class="col-12 mb-3">
                                                                <h6 class="text-primary font-weight-bold">
                                                                    <i class="feather icon-info mr-1"></i>
                                                                    Información de Procedencia
                                                                </h6>
                                                                <hr class="mt-2">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Laboratorio / Proveedor <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" id="procedencia_laboratorio" name="procedencia_laboratorio" placeholder="Ej: Audifono Center, Widex Chile, etc." required>
                                                                <small class="form-text text-muted">Nombre del laboratorio o proveedor externo</small>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Fecha de Adquisición <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control form-control-sm" id="fecha_adquisicion_ext" name="fecha_adquisicion" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mb-3 mt-2">
                                                                <h6 class="text-primary font-weight-bold">
                                                                    <i class="feather icon-headphones mr-1"></i>
                                                                    Datos del Audífono Izquierdo
                                                                </h6>
                                                                <hr class="mt-2">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">N° Serie Izquierdo</label>
                                                                <input type="text" class="form-control form-control-sm" id="n_serie_izq_ext" name="n_serie_izquierdo" placeholder="N° Serie">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Marca <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" id="marca_izq_ext" name="marca_izquierdo" placeholder="Ej: Phonak, Widex" required>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Modelo <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" id="modelo_izq_ext" name="modelo_izquierdo" placeholder="Modelo" required>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" id="tipo_izq_ext" name="tipo_izquierdo">
                                                                    <option value="">Seleccione</option>
                                                                    <option value="BTE">Retroauricular (BTE)</option>
                                                                    <option value="ITE">Intraauricular (ITE)</option>
                                                                    <option value="ITC">Intracanal (ITC)</option>
                                                                    <option value="CIC">Completamente en el canal (CIC)</option>
                                                                    <option value="RIC">Receptor en el canal (RIC)</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mb-3 mt-2">
                                                                <h6 class="text-primary font-weight-bold">
                                                                    <i class="feather icon-headphones mr-1"></i>
                                                                    Datos del Audífono Derecho
                                                                </h6>
                                                                <hr class="mt-2">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">N° Serie Derecho</label>
                                                                <input type="text" class="form-control form-control-sm" id="n_serie_der_ext" name="n_serie_derecho" placeholder="N° Serie">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Marca <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" id="marca_der_ext" name="marca_derecho" placeholder="Ej: Phonak, Widex" required>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Modelo <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" id="modelo_der_ext" name="modelo_derecho" placeholder="Modelo" required>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" id="tipo_der_ext" name="tipo_derecho">
                                                                    <option value="">Seleccione</option>
                                                                    <option value="BTE">Retroauricular (BTE)</option>
                                                                    <option value="ITE">Intraauricular (ITE)</option>
                                                                    <option value="ITC">Intracanal (ITC)</option>
                                                                    <option value="CIC">Completamente en el canal (CIC)</option>
                                                                    <option value="RIC">Receptor en el canal (RIC)</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mb-3 mt-2">
                                                                <h6 class="text-primary font-weight-bold">
                                                                    <i class="feather icon-file-text mr-1"></i>
                                                                    Información Adicional
                                                                </h6>
                                                                <hr class="mt-2">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Estado del Audífono</label>
                                                                <select class="form-control form-control-sm" id="estado_audifono_ext" name="estado_audifono">
                                                                    <option value="Excelente">Excelente</option>
                                                                    <option value="Bueno" selected>Bueno</option>
                                                                    <option value="Regular">Regular</option>
                                                                    <option value="Malo">Malo</option>
                                                                    <option value="Requiere reparación">Requiere reparación</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Motivo del Control</label>
                                                                <select class="form-control form-control-sm" id="motivo_control_ext" name="motivo_control">
                                                                    <option value="">Seleccione</option>
                                                                    <option value="Control rutinario">Control rutinario</option>
                                                                    <option value="Calibración">Calibración</option>
                                                                    <option value="Reparación">Reparación</option>
                                                                    <option value="Ajuste">Ajuste de volumen/programación</option>
                                                                    <option value="Limpieza">Limpieza profunda</option>
                                                                    <option value="Cambio de accesorios">Cambio de accesorios</option>
                                                                    <option value="Otro">Otro</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label class="floating-label-activo-sm">Observaciones del Control</label>
                                                                <textarea class="form-control form-control-sm" id="observaciones_control_ext" name="observaciones" rows="3" placeholder="Describa el estado del audífono, problemas encontrados, ajustes realizados, etc."></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="alert alert-info mb-3" role="alert">
                                                                    <i class="feather icon-info mr-2"></i>
                                                                    <strong>Nota:</strong> Los campos marcados con <span class="text-danger">*</span> son obligatorios
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="button" class="btn btn-secondary btn-sm mr-2" onclick="cancelar_audifono_externo()">
                                                                    <i class="feather icon-x mr-1"></i>
                                                                    Cancelar
                                                                </button>
                                                                <button type="button" class="btn btn-primary btn-sm" onclick="guardar_audifono_externo()">
                                                                    <i class="feather icon-save mr-1"></i>
                                                                    Guardar Audífono Externo
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="lista_audifonos_externos"></div>
                                <!--Cierre: Card Datos audifono-->
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="control-mis-productos" role="tabpanel" aria-labelledby="control-mis-productos-tab">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <!-- Card Productos Paciente -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h6 class="tit-gen mb-2">Productos del Paciente</h6>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div id="productos-lista" class="row"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-informacion">
                                                        <div class="card-header">
                                                            <h5 class="card-title">Detalle del Producto</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <input type="hidden" name="id_producto_seleccionado" id="id_producto_seleccionado" value="">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-bolder ml-0 mb-0">Imagen:</label> <br>
                                                                <img src="" alt="" class="img-fluid rounded" id="detalle-imagen" style="max-height: 150px; max-width: 200px; display: none;">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Código Interno:</label>
                                                                <div id="detalle-codigo-interno">-</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Nombre:</label>
                                                                <div id="detalle-nombre">-</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Descripción:</label>
                                                                <div id="detalle-descripcion">-</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Número de Serie:</label>
                                                                <div id="detalle-numero-serie">-</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Satisfacción:</label>
                                                                <select name="nivel_satisfaccion" id="nivel_satisfaccion" class="form-control form-control-sm">
                                                                    <option value="">Seleccione</option>
                                                                    <option value="1">1 - Muy Insatisfecho</option>
                                                                    <option value="2">2 - Insatisfecho</option>
                                                                    <option value="3">3 - Neutral</option>
                                                                    <option value="4">4 - Satisfecho</option>
                                                                    <option value="5">5 - Muy Satisfecho</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-bolder ml-0 mb-0">Calificación:</label>
                                                                <div id="detalle-calificacion" class="rating-display">
                                                                    <span class="text-muted">Sin calificar</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Observaciones:</label>
                                                                <textarea name="observaciones_satisfaccion" id="observaciones_satisfaccion" class="form-control form-control-sm" rows="3"></textarea>
                                                            </div>
                                                            <button type="button" class="btn btn-primary btn-sm w-100" id="btn-guardar-satisfaccion" onclick="guardar_evaluacion_producto()">Guardar</button>
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
        </div>
        @include("app.laboratorio.lab_profesional.modal_cont_audifono.calibracion_audifono")
        @include("app.laboratorio.lab_profesional.modal_cont_audifono.audiom_control_aud")
        @include("app.laboratorio.lab_profesional.modal_cont_audifono.mantencion_audifono")
        @include("app.laboratorio.lab_profesional.modal_cont_audifono.cita_control_aud")
        @include("app.laboratorio.lab_profesional.modal_cont_audifono.reparacion_audifono")
    </div>
    <!--Cierre: Container Completo-->
    <input type="hidden" name="id_paciente_fc" id="id_paciente_fc" value="{{ isset($paciente) ? $paciente->id : '' }}">
    <input type="hidden" name="paciente_seleccionado_id" id="paciente_seleccionado_id" value="">
@endsection
