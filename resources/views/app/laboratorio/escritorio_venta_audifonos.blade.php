@extends('template.laboratorio.laboratorio_profesional.template')
@section('page-script')
<script>
    var carritoData = {
        items: [],
        total: 0,
        cantidad_items: 0
    };
    // ===== RUTAS PARA EL SISTEMA DE COTIZACIONES =====
            window.cotizacionRoutes = {
                buscarProductos: "{{ route('laboratorio.profesional.buscar_productos_audifonos') }}",
                guardarBorrador: "{{ route('laboratorio.cotizaciones.guardar_borrador') }}",
                vistaPrevia: "{{ route('laboratorio.cotizaciones.vista_previa') }}",
                generar: "{{ route('laboratorio.cotizaciones.generar') }}",
                enviarEmail: "{{ route('laboratorio.cotizaciones.enviar_email') }}",
                historial: "{{ route('laboratorio.cotizaciones.historial', ':paciente_id') }}",
                detalle: "{{ route('laboratorio.cotizaciones.detalle', ':id') }}",
                descargarPdf: "{{ route('laboratorio.cotizaciones.descargar_pdf', ':id') }}",
                anular: "{{ route('laboratorio.cotizaciones.anular', ':id') }}",
                aceptar: "{{ route('laboratorio.cotizaciones.aceptar', ':id') }}",
                rechazar: "{{ route('laboratorio.cotizaciones.rechazar', ':id') }}"
            };
            // ===== FIN RUTAS COTIZACIONES =====

    $(document).ready(function() {
        dame_tipos_productos();
        $('#tabla_historial_productos_prestados').DataTable();
    });

    document.addEventListener('DOMContentLoaded', function() {
        Dropzone.autoDiscover = false; // <--- Agrega esto al inicio
        const editorElement = document.querySelector('#campana_mensaje');
        if (editorElement) {
            ClassicEditor
                .create(editorElement, {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', '|',
                        'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                        'alignment', '|',
                        'numberedList', 'bulletedList', '|',
                        'outdent', 'indent', '|',
                        'link', 'insertTable', '|',
                        'undo', 'redo'
                    ],
                    language: 'es'
                })
                .then(editor => {
                    window.editorVppb = editor;
                    if (!editor.getData().trim()) {
                        editor.setData('Escriba aquí el contenido del informe...');
                    }
                })
                .catch(error => {
                    console.error('❌ Error inicializando editor VPPB:', error);
                    if (typeof swal === 'function') {
                        swal('Error', 'No se pudo inicializar el editor de texto', 'error');
                    }
                });
        }
        var dropzoneArchivosCamp;
        dropzoneArchivosCamp = new Dropzone("#dropzoneArchivosCamp", {
            url: "{{ route('laboratorio.cargar_archivo_campania') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4, // Tamaño máximo en MiB
            maxFiles: 4,
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
            dictInvalidFileType: "No puedes subir archivos de este tipo.",
            dictCancelUpload: "Cancelar carga",
            dictUploadCanceled: "Subida cancelada.",
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
            dictRemoveFile: "Eliminar archivo",
            dictMaxFilesExceeded: "No puede cargar más archivos.",
            autoProcessQueue: false, // Desactiva el procesamiento automático
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    formData.append("id", "{{ Auth::user()->id }}");
                });
                this.on("success", function(file, response) {
                    // Manejar la respuesta de éxito
                    console.log(response);
                });
                this.on("error", function(file, message) {
                    // Manejar el error
                    console.error(message);
                });
                this.on("removedfile", function(file) {
                    // Manejar la eliminación del archivo
                    console.log("Archivo eliminado");
                });
                this.on("canceled", function(file) {
                    // Manejar la cancelación de la carga
                    console.log("Carga cancelada");
                });
            }
        });
        var dropzoneImagenesCamp;
        dropzoneImagenesCamp = new Dropzone("#dropzoneImagenesCamp", {
            url: "{{ route('laboratorio.cargar_archivo_campania') }}",
            paramName: "file",
            maxFilesize: 5,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            dictDefaultMessage: "Arrastra y suelta imágenes aquí o haz clic para subir",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                this.on("success", function(file, response) {
                    console.log('Imagen subida:', response);
                });
                this.on("error", function(file, errorMessage) {
                    console.error('Error al subir imagen:', errorMessage);
                    swal('Error', 'No se pudo subir la imagen: ' + errorMessage, 'error');
                    this.removeFile(file);
                });
            }
        });
    });

    function dame_tipos_productos(){
        url = "{{ route('laboratorio.tipos_productos') }}";
        $.ajax({
            url: url,
            type: "GET",
            data: {
            },
        })
        .done(function(data)
        {
            console.log('-----------------------');
            console.log(data);
            console.log('-----------------------');
            if(data.estado == 1)
            {
                if(data.tipos.length>0)
                {
                    var html = '<option value="">Seleccione</option>';
                    data.tipos.forEach(element => {
                        html += '<option value="'+element.id+'">'+element.nombre+'</option>';
                    });
                    html += '<option value="0">Otros</option>';
                    $('#tipo_producto_busqueda').html(html);
                    $('#tipo_producto_busqueda_prestamo').html(html);
                    $('#cotiz_tipo_producto').html(html);
                }
                else
                {
                    $('#tipo_producto_busqueda').html('<option value="">No hay registros</option>');
                    $('#tipo_producto_busqueda_prestamo').html('<option value="">No hay registros</option>');
                    $('#cotiz_tipo_producto').html('<option value="">No hay registros</option>');
                }
            }
            else
            {
                $('#tipo_producto_busqueda').html('<option value="">No hay registros</option>');
                $('#cotiz_tipo_producto').html('<option value="">No hay registros</option>');
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al comunicarse con el servidor'
                });
            }
        });
    }

    function seleccionar_producto_audifono(id_producto, precio_venta) {
        console.log('Producto seleccionado ID:', id_producto);

        swal({
            title: '¿Agregar al carrito?',
            content: {
                element: "div",
                attributes: {
                    innerHTML: `
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Cantidad:</label>
                            <input type="number" id="swal-cantidad" class="form-control" value="1" min="1" max="100">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Precio Unitario:</label>
                            <input type="number" id="swal-precio" class="form-control" value="${precio_venta}" min="0" step="0.01">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Descuento:</label>
                            <input type="number" id="swal-descuento" class="form-control" value="0" min="0" step="0.01">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Observaciones:</label>
                            <textarea id="swal-observaciones" class="form-control" rows="2" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                        </div>
                    `
                }
            },
            buttons: {
                cancel: {
                    text: "Cancelar",
                    value: null,
                    visible: true,
                    className: "btn btn-secondary",
                    closeModal: true,
                },
                confirm: {
                    text: "Agregar al Carrito",
                    value: true,
                    visible: true,
                    className: "btn btn-success",
                    closeModal: false
                }
            }
        }).then((willAdd) => {
            if (willAdd) {
                // Validar campos
                let cantidad = parseInt(document.getElementById('swal-cantidad').value);
                let precio = parseFloat(document.getElementById('swal-precio').value);
                let descuento = parseFloat(document.getElementById('swal-descuento').value);
                let observaciones = document.getElementById('swal-observaciones').value;

                // Validaciones
                if (!cantidad || cantidad <= 0) {
                    swal("Error", "La cantidad debe ser mayor a 0", "error");
                    return;
                }

                if (precio < 0) {
                    swal("Error", "El precio no puede ser negativo", "error");
                    return;
                }

                if (descuento < 0) {
                    swal("Error", "El descuento no puede ser negativo", "error");
                    return;
                }

                if (descuento > precio * cantidad) {
                    swal("Error", "El descuento no puede ser mayor al subtotal", "error");
                    return;
                }

                // Cerrar modal y agregar al carrito
                swal.close();

                let datos = {
                    cantidad: cantidad,
                    precio_unitario: precio,
                    descuento: descuento,
                    observaciones: observaciones
                };

                agregarProductoAlCarrito(id_producto, datos);
            }
        });
    }

    function seleccionar_producto_audifono_prestamo(id_producto, precio_venta){
        console.log('Producto seleccionado ID:', id_producto);

        swal({
            title: '¿Agregar al carrito de préstamos?',
            content: {
                element: "div",
                attributes: {
                    innerHTML: `
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Cantidad:</label>
                            <input type="number" id="swal-cantidad" class="form-control" value="1" min="1" max="100">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Precio Unitario:</label>
                            <input type="number" id="swal-precio" class="form-control" value="${precio_venta}" min="0" step="0.01">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Descuento:</label>
                            <input type="number" id="swal-descuento" class="form-control" value="0" min="0" step="0.01">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Fecha de entrega esperada:</label>
                            <input type="date" id="swal-fecha-entrega" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Observaciones:</label>
                            <textarea id="swal-observaciones" class="form-control" rows="2" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                        </div>
                    `
                }
            },
            buttons: {
                cancel: {
                    text: "Cancelar",
                    value: null,
                    visible: true,
                    className: "btn btn-secondary",
                    closeModal: true,
                },
                confirm: {
                    text: "Agregar al Carrito",
                    value: true,
                    visible: true,
                    className: "btn btn-success",
                    closeModal: false
                }
            }
        }).then((willAdd) => {
            if (willAdd) {
                // Validar campos
                let cantidad = parseInt(document.getElementById('swal-cantidad').value);
                let precio = parseFloat(document.getElementById('swal-precio').value);
                let descuento = parseFloat(document.getElementById('swal-descuento').value);
                let fecha_esperada_entrega = document.getElementById('swal-fecha-entrega').value;
                let observaciones = document.getElementById('swal-observaciones').value;

                // Validaciones
                if (!cantidad || cantidad <= 0) {
                    swal("Error", "La cantidad debe ser mayor a 0", "error");
                    return;
                }

                if (precio < 0) {
                    swal("Error", "El precio no puede ser negativo", "error");
                    return;
                }

                if (descuento < 0) {
                    swal("Error", "El descuento no puede ser negativo", "error");
                    return;
                }

                // if (!fecha_esperada_entrega) {
                //     swal("Error", "Debe ingresar una fecha de entrega esperada", "error");
                //     return;
                // }

                if (descuento > precio * cantidad) {
                    swal("Error", "El descuento no puede ser mayor al subtotal", "error");
                    return;
                }

                // Cerrar modal y agregar al carrito
                swal.close();

                let datos = {
                    cantidad: cantidad,
                    precio_unitario: precio,
                    descuento: descuento,
                    fecha_esperada_entrega: fecha_esperada_entrega,
                    observaciones: observaciones
                };

                agregarProductoAlCarritoPrestamo(id_producto, datos);
            }
        });
    }

    function agregarProductoAlCarrito(id_producto, datos_adicionales = {}) {
        // Mostrar loading
        swal({
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

                swal({
                    icon: 'success',
                    title: '¡Agregado!',
                    text: response.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                });

                // Opcional: Mostrar botón para ver carrito
                mostrarBotonVerCarrito();
            } else {
                swal({
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

            swal({
                icon: 'error',
                title: 'Error',
                text: mensaje
            });
        });
    }

    function agregarProductoAlCarritoPrestamo(id_producto, datos_adicionales = {}) {
        // Mostrar loading
        swal({
            title: 'Agregando al carrito de préstamos...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        let url = "{{ route('laboratorio.carrito_prestamos.agregar') }}";

        let data = {
            id_producto: id_producto,
            cantidad: datos_adicionales.cantidad || 1,
            id_paciente: datos_adicionales.id_paciente || $('#id_paciente_fc').val(),
            id_ficha: datos_adicionales.id_ficha || $('#id_fc').val(),
            precio_unitario: datos_adicionales.precio_unitario || 0,
            descuento: datos_adicionales.descuento || 0,
            fecha_devolucion_esperada: datos_adicionales.fecha_esperada_entrega || '',
            observaciones: datos_adicionales.observaciones || '',
            _token: CSRF_TOKEN
        };

        if(data.id_paciente == '' || data.id_ficha == ''){
            swal({
                icon: 'error',
                title: 'Error',
                text: 'No se ha asociado un paciente o ficha clínica'
            });
            return;
        }

        $.ajax({
            url: url,
            type: "POST",
            data: data,
        })
        .done(function(response) {
            console.log('Producto agregado al carrito de préstamos:', response);

            if (response.estado === 1) {
                // Actualizar datos del carrito
                carritoData.total = response.total_carrito;
                carritoData.cantidad_items = response.cantidad_items;

                // Actualizar UI
                actualizarBadgeCarritoPrestamo();

                swal({
                    icon: 'success',
                    title: '¡Agregado al carrito de préstamos!',
                    text: response.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                });

                // Opcional: Mostrar botón para ver carrito
                mostrarBotonVerCarritoPrestamo();
            } else {
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: response.mensaje
                });
            }
        })
        .fail(function(jqXHR) {
            console.error('Error al agregar al carrito de préstamos:', jqXHR);

            let mensaje = 'Error al agregar el producto al carrito de préstamos';
            if (jqXHR.responseJSON && jqXHR.responseJSON.mensaje) {
                mensaje = jqXHR.responseJSON.mensaje;
            }

            swal({
                icon: 'error',
                title: 'Error',
                text: mensaje
            });
        });
    }

    /**
         * Actualizar badge del carrito
         */
        function actualizarBadgeCarrito() {
            // Actualizar badge del botón flotante
            let badge = $('#badge-carrito');
            if (carritoData.cantidad_items > 0) {
                badge.text(carritoData.cantidad_items).show();
            } else {
                badge.hide();
            }

            // Actualizar badge del botón en el header
            let badgeHeader = $('#badge-carrito-header');
            let totalHeader = $('#total-carrito-header');

            if (carritoData.cantidad_items > 0) {
                // Animación de pulso al actualizar
                badgeHeader.addClass('badge-animated');
                setTimeout(function() {
                    badgeHeader.removeClass('badge-animated');
                }, 500);

                badgeHeader.text(carritoData.cantidad_items).show();
                totalHeader.text('Total: $' + parseFloat(carritoData.total || 0).toFixed(2)).show();

                // Mostrar el botón del carrito si estaba oculto
                $('#btn-abrir-carrito').removeClass('d-none');
            } else {
                badgeHeader.hide();
                totalHeader.hide();
            }
        }

        /**
            * Actualizar badge del carrito de préstamos
            */

        function actualizarBadgeCarritoPrestamo() {
            // Actualizar badge del botón flotante
            let badge = $('#badge-carrito-prestamo');
            if (carritoData.cantidad_items > 0) {
                badge.text(carritoData.cantidad_items).show();
            } else {
                badge.hide();
            }
            // Actualizar badge del botón en el header
            let badgeHeader = $('#badge-carrito-prestamo-header');
            let totalHeader = $('#total-carrito-prestamo-header');

            if (carritoData.cantidad_items > 0) {
                // Animación de pulso al actualizar
                badgeHeader.addClass('badge-animated');
                setTimeout(function() {
                    badgeHeader.removeClass('badge-animated');
                }, 500);

                badgeHeader.text(carritoData.cantidad_items).show();
                totalHeader.text('Total: $' + parseFloat(carritoData.total || 0).toFixed(2)).show();

                // Mostrar el botón del carrito si estaba oculto
                $('#btn-abrir-carrito-prestamo').removeClass('d-none');
            } else {
                badgeHeader.hide();
                totalHeader.hide();
            }

            if ($('#btn-ver-carrito-prestamo').length === 0) {
                let boton = `
                    <button id="btn-ver-carrito-prestamo" class="btn btn-success btn-lg"
                            style="position:fixed; bottom:20px; right:20px; z-index:9999; border-radius:50%; width:60px; height:60px;"
                            onclick="obtenerCarrito()" title="Ver carrito">
                        <i class="feather icon-shopping-cart"></i>
                        <span id="badge-carrito-prestamo" class="badge badge-danger"
                            style="position:absolute; top:-5px; right:-5px; display:none;">0</span>
                    </button>
                `;
                //$('body').append(boton);
            }
        }


        /**
         * Procesar venta
         */
        function procesarVenta() {
            // Aquí puedes implementar lógica adicional para procesar la venta
            swal({
                title: 'Procesar Venta',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: `
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Método de Pago:</label>
                                <select id="swal-metodo-pago" class="form-control">
                                    <option value="efectivo">Efectivo</option>
                                    <option value="tarjeta">Tarjeta</option>
                                    <option value="transferencia">Transferencia</option>
                                </select>
                            </div>
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Observaciones:</label>
                                <textarea id="swal-obs-venta" class="form-control" rows="3" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                            </div>
                        `
                    }
                },
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Confirmar Venta",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: false
                    }
                }
            }).then((willProcess) => {
                if (willProcess) {
                    let metodo_pago = document.getElementById('swal-metodo-pago').value;
                    let observaciones = document.getElementById('swal-obs-venta').value;

                    // Validar método de pago
                    if (!metodo_pago) {
                        swal("Error", "Debe seleccionar un método de pago", "error");
                        return;
                    }

                    // Cerrar modal y procesar
                    swal.close();

                    let datos = {
                        metodo_pago: metodo_pago,
                        observaciones: observaciones
                    };

                    finalizarVenta(datos);
                }
            });
        }

        /**
         * Procesar préstamo 
         */

        function procesarPrestamo() {
            // Aquí puedes implementar lógica adicional para procesar el préstamo
            swal({
                title: 'Procesar Préstamo',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: `
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Observaciones:</label>
                                <textarea id="swal-obs-prestamo" class="form-control" rows="3" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                            </div>
                        `
                    }
                },
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Confirmar Préstamo",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: false
                    }
                }
            }).then((willProcess) => {
                if (willProcess) {
                    let observaciones = document.getElementById('swal-obs-prestamo').value;

                    // Validar observaciones
                    if (!observaciones) {
                        swal("Error", "Debe ingresar observaciones", "error");
                        return;
                    }

                    // Cerrar modal y procesar
                    swal.close();

                    let datos = {
                        observaciones: observaciones
                    };

                    finalizarPrestamo(datos);
                }
            });
        }

        function finalizarPrestamo(datos) {
            let url = "{{ route('laboratorio.carrito_prestamos.procesar_prestamo') }}";

            swal({
                title: 'Procesando préstamo...',
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
                    observaciones: datos.observaciones,
                    _token: CSRF_TOKEN
                },
            })
            .done(function(response) {
                console.log(response);
                if (response.estado === 1) {
                    carritoData = {
                        items: [],
                        total: 0,
                        cantidad_items: 0
                    };

                    actualizarBadgeCarritoPrestamo();

                    swal({
                        icon: 'success',
                        title: '¡Préstamo Exitoso!',
                        html: `
                            <p>${response.mensaje}</p>
                            <p><strong>Items procesados:</strong> ${response.items_procesados}</p>
                            <p><strong>Total:</strong> $${parseFloat(response.total).toFixed(2)}</p>
                        `,
                        confirmButtonText: 'Aceptar'
                    });
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: response.mensaje
                    });
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al procesar préstamo:', jqXHR);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo procesar el préstamo'
                });
            });
        }

        /**
         * Finalizar venta (enviar al servidor)
         */
        function finalizarVenta(datos) {
            let url = "{{ route('laboratorio.carrito.procesar_venta') }}";

            swal({
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
                console.log(response);
                if (response.estado === 1) {
                    carritoData = {
                        items: [],
                        total: 0,
                        cantidad_items: 0
                    };

                    actualizarBadgeCarrito();

                    swal({
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
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: response.mensaje
                    });
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al procesar venta:', jqXHR);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo procesar la venta'
                });
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
                console.log('Carrito obtenido:', response);
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
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cargar el carrito'
                });
            });
        }

        /**
         * Obtener y mostrar carrito de préstamos
         */
        function obtenerCarritoPrestamo() {
            let url = "{{ route('laboratorio.carrito_prestamos.obtener') }}";
            let id_paciente = $('#id_paciente_fc').val();
            let id_ficha = $('#id_fc').val();

            if(id_paciente == ''){
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se ha asociado un paciente'
                });
                return;
            }

            $.ajax({
                url: url,
                type: "GET",
                data:{
                    id_paciente: id_paciente,
                    id_ficha: id_ficha,
                }
            })
            .done(function(response) {
                console.log('Carrito de préstamos obtenido:', response);
                if (response.estado === 1) {
                    carritoData = {
                        items: response.items,
                        total: response.total,
                        cantidad_items: response.cantidad_items
                    };
                    if(response.items.length > 0) {
                        var nombre_paciente = response.items[0].paciente?.nombres + ' ' + response.items[0].paciente?.apellido_uno;
                    }else{
                        var nombre_paciente = response.nombre_paciente || '';
                    }
                    

                    mostrarModalCarritoPrestamo(nombre_paciente);
                    actualizarBadgeCarritoPrestamo();
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener carrito de préstamos:', jqXHR);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cargar el carrito de préstamos'
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
                html += '<button class="btn btn-secondary mr-2" onclick="swal.close()">Cerrar</button>';
                html += '<button class="btn btn-danger mr-2" onclick="vaciarCarritoCompleto()"><i class="feather icon-trash"></i> Vaciar Carrito</button>';
                html += '<button class="btn btn-success" onclick="procesarVenta()"><i class="feather icon-check"></i> Procesar Venta</button>';
                html += '</div>';
            }

            html += '</div>';

            swal({
                title: 'Carrito de Compras',
                icon: 'info', // Opcional: agrega un ícono visual
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: '<div class="text-center mb-3"><i class="feather icon-shopping-cart" style="font-size: 2rem; color: #28a745;"></i><h4 class="mt-2">Carrito de Compras</h4></div>' + html
                    }
                },
                buttons: false,
                closeOnClickOutside: true,
                className: 'swal-wide' // Clase personalizada para ancho
            });
        }

        /**
         * Mostar modal con contenido del carrito de préstamos
         */
        function mostrarModalCarritoPrestamo(nombrePaciente = '') {
            let html = '<div class="table-responsive">';
            html += '<div class="mb-2 text-left">';
            html += '<strong>Paciente:</strong> ' + (nombrePaciente || 'No seleccionado');
            html += '</div>';
        
            if (carritoData.items.length === 0) {
                html += '<p class="text-center py-4">El carrito de préstamos está vacío</p>';
            } else {
                html += '<table class="table table-hover">';
                html += '<thead><tr>';
                html += '<th>Producto</th>';
                html += '<th>Cantidad</th>';
                html += '<th>Fecha devolución</th>';
                html += '<th>Observaciones</th>';
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
                    html += '<td>' + item.cantidad + '</td>';
                    html += '<td>' + (item.fecha_devolucion_esperada ? new Date(item.fecha_devolucion_esperada).toLocaleDateString() : '-') + '</td>';
                    html += '<td>' + (item.observaciones || '-') + '</td>';
                    html += '<td>';
                    html += '<button class="btn btn-sm btn-danger" onclick="eliminarItemCarritoPrestamo(' + item.id + ')" title="Eliminar">';
                    html += '<i class="feather icon-trash-2"></i>';
                    html += '</button>';
                    html += '</td>';
                    html += '</tr>';
                });
        
                html += '</tbody>';
                html += '<tfoot>';
                html += '<tr class="bg-light">';
                html += '<td colspan="2" class="text-right"><strong>TOTAL:</strong></td>';
                html += '<td colspan="3"><strong class="text-success">$' + parseFloat(carritoData.total).toFixed(2) + '</strong></td>';
                html += '</tr>';
                html += '</tfoot>';
                html += '</table>';
                html += '<div class="text-right mt-3">';
                html += '<button class="btn btn-secondary mr-2" onclick="swal.close()">Cerrar</button>';
                html += '<button class="btn btn-danger mr-2" onclick="vaciarCarritoPrestamoCompleto()"><i class="feather icon-trash"></i> Vaciar Carrito</button>';
                html += '<button class="btn btn-success" onclick="procesarPrestamo()"><i class="feather icon-check"></i> Procesar Préstamo</button>';
                html += '</div>';
            }
            html += '</div>';
            swal({
                title: 'Préstamo de Productos',
                icon: 'info',
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: '<div class="text-center mb-3"><i class="feather icon-shopping-cart" style="font-size: 2rem; color: #28a745;"></i><h4 class="mt-2">Productos a prestar</h4></div>' + html
                    }
                },
                buttons: false,
                closeOnClickOutside: true,
                className: 'swal-wide'
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
                    swal({
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

        /**
         * Eliminar item del carrito
         */
        function eliminarItemCarrito(id_item) {
            swal({
                title: '¿Eliminar producto?',
                text: 'Se eliminará este producto del carrito',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Sí, eliminar",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
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

                            swal({
                                icon: 'success',
                                title: 'Eliminado',
                                text: response.mensaje || 'Producto eliminado del carrito',
                                buttons: false,
                                timer: 1500
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Error',
                                text: response.mensaje || 'No se pudo eliminar el producto'
                            });
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al eliminar del carrito:', jqXHR);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al comunicarse con el servidor'
                        });
                    });
                }
            });
        }

        /**
         * Eliminar item del carrito de préstamos
         */
        function eliminarItemCarritoPrestamo(id_item) {
            swal({
                title: '¿Eliminar producto del préstamo?',
                text: 'Se eliminará este producto del carrito de préstamos',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Sí, eliminar",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    let url = "{{ route('laboratorio.carrito_prestamos.eliminar') }}";
                    let id_paciente = $('#id_paciente_fc').val();

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            id_item: id_item,
                            id_paciente: id_paciente,
                            _token: CSRF_TOKEN
                        },
                    })
                    .done(function(response) {
                        console.log('Respuesta al eliminar del carrito de préstamos:', response);
                        if (response.estado === 1) {
                            // Actualizar carrito
                            obtenerCarritoPrestamo();

                            swal({
                                icon: 'success',
                                title: 'Eliminado',
                                text: response.mensaje || 'Producto eliminado del carrito de préstamos',
                                buttons: false,
                                timer: 1500
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Error',
                                text: response.mensaje || 'No se pudo eliminar el producto'
                            });
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al eliminar del carrito de préstamos:', jqXHR);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al comunicarse con el servidor'
                        });
                    });
                }
            });
        }

        function proxima_atencion_paciente(){
            let id_ficha_atencion = $('#id_fc').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_profesional = $('#id_profesional_fc').val();
            let id_hora_medica = $('#hora_medica').val();

            let url = "{{ ROUTE('dental.proxima_atencion_paciente')}}";

            let data = {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
                id_hora_medica: id_hora_medica,
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                beforeSend: function(){
                    swal({
                        title: "Cargando...",
                        text: "Por favor, espere mientras se procesa su solicitud.",
                        icon: "info",
                        buttons: false,
                        closeOnClickOutside: false
                    });
                },
                success: function(response) {
                    swal.close();
                    console.log(response);
                    if(response.estado == 'ok'){
                        let fecha = response.fecha_atencion;
                        $('#proxima_fecha_atencion').html(fecha.fecha_consulta);
                        $('#proxima_hora_atencion').html(fecha.hora_inicio+' a '+fecha.hora_termino);
                    }else{
                        $('#proxima_fecha_atencion').html('N/A');
                        $('#proxima_hora_atencion').html('N/A');
                        // swal('Error', response.mensaje, 'error');
                    }

                },
                error: function(error) {
                    swal.close();
                    console.log(error);
                }
            });
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
                                @if($profesional->id_tipo_institucion == 3)
                                    <li class="breadcrumb-item"><a href="{{ route('laboratorio.adm_general.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                @else
                                    <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                @endif
                                
                                <li class="breadcrumb-item"><a href="#">Ventas de audífonos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cuerpo-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                           @include('app.laboratorio.atencion_fono_audifonos')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<input type="hidden" name="id_paciente_fc" id="id_paciente_fc" value="">
<input type="hidden" name="id_profesional_fc" id="id_profesional_fc" value="{{ $profesional->id }}">
<input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $profesional->id_lugar_atencion }}">

<!--Cierre: Container Completo-->
@include('app.laboratorio.lab_profesional.modal_cont_audifono.calibracion_audifono')
@include('app.laboratorio.lab_profesional.modal_cont_audifono.reparacion_audifono')
@endsection
