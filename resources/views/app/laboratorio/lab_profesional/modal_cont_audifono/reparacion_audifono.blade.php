<!--datos Contacto-->
<div id="rep_audifono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rep_audifono" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Reparación de audífono</h5>
                    <p class="font-weight-bold mt-1 mb-0 text-white float-md-right">
                        @php
                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            $fecha = \Carbon\Carbon::parse(now());
                            $mes = $meses[($fecha->format('n')) - 1];
                            $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                        @endphp
                        {{ $fecha }}
                    </p>
                <button type="button" class="close text-white" data-dismiss="modal"  onclick="$('#rep_audifono').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <div class="row info-basica" id="info-basica-1">
                    <div class="col-md-12">
                     <div class="form- row">
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Motivo de Reparación</label>
                                    <select name="mot_rep_audif" id="mot_rep_audif" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mot_rep_audif','div_mot_rep_audif','obs_mot_rep_audif',3);">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Accidente</option>
                                        <option value="2">Deterioro normal</option>
                                        <option value="3">Otros (anotar)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_mot_rep_audif" style="display:none;">
                                    <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Otro Motivo <i>(describir)</i></label>
                                    <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mot_rep_audif" id="obs_mot_rep_audif"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Estado del Audífono</label>
                                    <select name="est_audifono_rep" id="est_audifono_rep" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_audifono_rep','div_est_audifono_rep','obs_est_audifono_rep',3);">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Buenas condiciones</option>
                                        <option value="2">Deteriorado</option>
                                        <option value="3">Otros (anotar)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_est_audifono_rep" style="display:none;">
                                    <label class="floating-label-activo-sm t-red" for="obs_est_audifono_rep">Estado del audífono<i>(describir)</i></label>
                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_audifono_rep" id="obs_est_audifono_rep"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo">Marca</label>
                                <input type="text" class="form-control form-control-sm" placeholder="MARCA" id="marca_rep" name="nmarca_rep" value="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo">Modelo</label>
                                <input type="text" class="form-control form-control-sm" placeholder="MODELO" id="modelo_rep" name="modelo_rep" value="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo">N° de serie</label>
                                <input type="text" class="form-control form-control-sm" placeholder="N° SERIE" id="n_serie_aud_rep" name="n_serie_aud_rep" value="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo">Fecha de entrega</label>
                                <input type="date" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_audifono" name="fecha_ent_audifono" value="">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-blue" for="av_pris_oi">Descripción reparación</label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="descp_reparacion" id="descp_reparacion"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-blue" for="av_pris_oi">Petición del paciente</label>
                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="peticion_pcte" id="peticion_pcte"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-blue" for="entrega_audifono">¿Audífono de reemplazo?</label>
                                <select name="entrega_audifono" id="entrega_audifono" class="form-control form-control-sm" onchange="evaluar_entrega_audifono()">
                                    <option value="SI">SI</option>
                                    <option value="NO" selected>NO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="entrega_repuesto" class="d-none mb-4">
                                <div class="card border-primary shadow-sm mb-3">
                                    <div class="card-header bg-primary text-white">
                                        <h6 class="mb-0">
                                            <i class="feather icon-package"></i> Producto de Reemplazo
                                        </h6>
                                        <small>Seleccione el producto que se entregará como reemplazo durante la reparación</small>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row align-items-center">
                                                        <!-- Tipo de búsqueda -->
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                            <label class="font-weight-bold text-primary mb-1">
                                                                <i class="feather icon-filter"></i> Tipo de Producto
                                                            </label>
                                                            <select class="form-control form-control-sm" id="tipo_producto_busqueda_reparo" name="tipo_producto_busqueda_reparo">
                                                                <option value="">Todos</option>
                                                                <option value="1" selected>Audífonos</option>
                                                                <option value="2">Repuestos</option>
                                                                <option value="3">Pilas</option>
                                                            </select>
                                                        </div>

                                                        <!-- Campo de búsqueda -->
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bold text-primary mb-1">
                                                                <i class="feather icon-search"></i> Buscar Producto
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm" name="buscar_producto_reparo" id="buscar_producto_reparo" placeholder="Código, marca, modelo o nombre..." onkeypress="if(event.keyCode==13){buscar_productos_audifonos_reparo(); return false;}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary btn-sm" type="button" onclick="buscar_productos_audifonos_reparo()">
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
                                                            <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="limpiar_busqueda_reparo()">
                                                                <i class="feather icon-x"></i> Limpiar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Área de resultados -->
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div id="lista_audifonos_reparo" class="resultado-busqueda"></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                <table class="table table-striped table-sm" id="tabla_historial_reparaciones_audifono">
                                    <thead class="thead-light sticky-top">
                                        <tr>
                                            <th style="min-width: 120px;">Fecha Reparación</th>
                                            <th style="min-width: 120px;">Motivo Control</th>
                                            <th style="min-width: 120px;">Estado de audífono</th>
                                            <th style="min-width: 150px;">Producto</th>
                                            <th style="min-width: 150px;">Acciones de reparación</th>
                                            <th style="min-width: 120px;">Opiniones</th>
                                            <th style="min-width: 120px;">Producto reemplazo</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpo_historial_reparaciones_audifono">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-sm btn-danger-light-c" data-dismiss="modal" onclick="$('#rep_audifono').modal('hide')" ><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-sm btn-info-light-c" onclick="registrar_reparacion();"><i class="feather icon-save"></i> Guardar</button>
			</div>
        </div>
    </div>

</div>

<input type="hidden" name="id_producto_reparo" id="id_producto_reparo" value="0">

<style>
    /* Estilos para mejorar la tabla en el modal */
    #tabla_historial_reparaciones_audifono {
        font-size: 0.85rem;
    }

    #tabla_historial_reparaciones_audifono th {
        border-top: none;
        font-weight: 600;
        background-color: #f8f9fa;
    }

    #tabla_historial_reparaciones_audifono td {
        vertical-align: middle;
        word-wrap: break-word;
        max-width: 200px;
    }

    .table-responsive {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
    }

    /* Mantener el header fijo mientras se hace scroll */
    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 10;
    }

    /* Estilos para el buscador de productos de reemplazo */
    #entrega_repuesto .card {
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    #entrega_repuesto .card-header {
        border-radius: 0.5rem 0.5rem 0 0;
        padding: 1rem;
    }

    #entrega_repuesto .card-header h6 {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    #entrega_repuesto .card-header small {
        font-size: 0.85rem;
        opacity: 0.9;
    }

    #entrega_repuesto .card-body {
        padding: 1.25rem;
        background-color: #f8f9fa;
    }

    #entrega_repuesto .form-control:focus {
        border-color: #4099ff;
        box-shadow: 0 0 0 0.2rem rgba(64, 153, 255, 0.25);
    }

    #entrega_repuesto .input-group-append .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    /* Estilos para el área de resultados */
    .resultado-busqueda {
        min-height: 100px;
        max-height: 500px;
        overflow-y: auto;
        background-color: #ffffff;
        border-radius: 0.375rem;
        padding: 1rem;
    }

    .resultado-busqueda:empty {
        background-color: transparent;
        padding: 0;
        min-height: 0;
    }

    /* Estilos para las cards de productos */
    .resultado-busqueda .card {
        transition: all 0.3s ease;
        border: 1px solid #e0e0e0;
    }

    .resultado-busqueda .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .hover-shadow {
        transition: box-shadow 0.3s ease;
    }

    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    /* Estilos para alertas en resultados */
    .resultado-busqueda .alert {
        margin-bottom: 1rem;
        border-radius: 0.375rem;
    }

    /* Scrollbar personalizado para resultados */
    .resultado-busqueda::-webkit-scrollbar {
        width: 8px;
    }

    .resultado-busqueda::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .resultado-busqueda::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }

    .resultado-busqueda::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Animación de aparición */
    #entrega_repuesto {
        animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Estilos para etiquetas de texto */
    .text-primary {
        color: #4099ff !important;
    }

    /* Badge para producto seleccionado */
    .producto-seleccionado {
        position: relative;
    }

    .producto-seleccionado::after {
        content: "✓ Seleccionado";
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #28a745;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-size: 0.75rem;
        font-weight: 600;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        dame_tipos_productos_reparo();
    });
    function reparacion_audif (){
        $('#rep_audifono').modal('show');
    }
     function evaluar_para_carga_detalle(select, div, input, valor)
        {
            var valor_select = $('#'+select+'').val();
            if(valor_select == valor) $('#'+div+'').show();
            else {
                $('#'+div+'').hide();
                $('#'+input+'').val('');
            }
        }

    function registrar_reparacion(){
        var mot_rep_audif = $('#mot_rep_audif').val();
        var obs_mot_rep_audif = $('#obs_mot_rep_audif').val();
        var est_audifono_rep = $('#est_audifono_rep').val();
        var obs_est_audifono_rep = $('#obs_est_audifono_rep').val();
        var marca_rep = $('#marca_rep').val();
        var modelo_rep = $('#modelo_rep').val();
        var n_serie_aud_rep = $('#n_serie_aud_rep').val();
        var fecha_ent_audifono = $('#fecha_ent_audifono').val();
        var descp_reparacion = $('#descp_reparacion').val();
        var peticion_pcte = $('#peticion_pcte').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_hora_medica = $('#hora_medica').val();
        var id_producto = $('#id_producto').val();
        var id_producto_reparo = $('#id_producto_reparo').val();

        if(mot_rep_audif == 0){
            swal({
                title: 'Debe seleccionar un motivo de reparación',
                icon: 'warning'
            })
            return;
        }
        if(est_audifono_rep == 0){
            swal({
                title: 'Debe seleccionar un estado del audífono',
                icon: 'warning'
            })
            return;
        }

        $.ajax({
            type: "POST",
            url: "{{ route('laboratorio.profesional.registrar_reparacion_audifono') }}",
            data: {
                _token: '{{ csrf_token() }}',
                mot_rep_audif: mot_rep_audif,
                obs_mot_rep_audif: obs_mot_rep_audif,
                est_audifono_rep: est_audifono_rep,
                obs_est_audifono_rep: obs_est_audifono_rep,
                marca_rep: marca_rep,
                modelo_rep: modelo_rep,
                n_serie_aud_rep: n_serie_aud_rep,
                fecha_ent_audifono: fecha_ent_audifono,
                descp_reparacion: descp_reparacion,
                peticion_pcte: peticion_pcte,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                id_paciente: id_paciente,
                id_hora_medica: id_hora_medica,
                id_producto: id_producto,
                id_producto_reparo: id_producto_reparo
            },
            success: function (response) {
                console.log(response);
                swal({
                    title: 'Reparación registrada correctamente',
                    icon: 'success'
                });
                dame_historial_reparaciones_audifono();
                // Limpiar campos
                $('#mot_rep_audif').val(0);
                $('#obs_mot_rep_audif').val('');
                $('#est_audifono_rep').val(0);
                $('#obs_est_audifono_rep').val('');
                $('#marca_rep').val('');
                $('#modelo_rep').val('');
                $('#n_serie_aud_rep').val('');
                $('#fecha_ent_audifono').val('');
                $('#descp_reparacion').val('');
                $('#peticion_pcte').val('');
            }
        });
    }

    function evaluar_entrega_audifono(){
        var entrega_audifono = $('#entrega_audifono').val();
        if(entrega_audifono == 'SI'){
            $('#entrega_repuesto').removeClass('d-none');
        } else {
            $('#entrega_repuesto').addClass('d-none');
        }
    }

    function buscar_productos_audifonos_reparo(){
        var tipo_producto = $('#tipo_producto_busqueda_reparo').val();
        var buscar_producto = $('#buscar_producto_reparo').val();
        var url = "{{ route('laboratorio.profesional.buscar_productos_audifonos') }}";

        $.ajax({
            type: "GET",
            url: url,
            data: {
                tipo_producto: tipo_producto,
                termino: buscar_producto
            },
            success: function (response) {
                console.log(response);
                let html = '';
                let productos = response.productos;
                console.log('Productos encontrados:', productos);
                if (productos.length > 0) {
                    html += '<div class="alert alert-info mb-3">';
                    html += '<i class="feather icon-info"></i> Se encontraron <strong>' + productos.length + '</strong> productos.';
                    html += '</div>';

                    html += '<div class="row">';

                    $.each(productos, function(index, producto) {
                        // Construir URL de imagen
                        let imagenUrl = producto.image_path || '';
                        if (imagenUrl && !imagenUrl.startsWith('http')) {
                            imagenUrl = '/' + imagenUrl;
                        }

                        // Card de producto
                        html += '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">';
                        html += '    <div class="card h-100 shadow-sm hover-shadow">';
                        html += '        <div class="card-body p-2">';

                        // Imagen del producto
                        html += '            <div class="text-center mb-2">';
                        html += '                <img src="' + (imagenUrl || '/images/no-image.png') + '" ';
                        html += '                     alt="' + (producto.nombre || 'Producto') + '" ';
                        html += '                     class="img-fluid rounded" ';
                        html += '                     style="max-height: 150px; object-fit: contain;" ';
                        html += '                     onerror="this.src=\'/images/no-image.png\'">';
                        html += '            </div>';

                        // Información del producto
                        html += '            <h6 class="mb-1 font-weight-bold text-truncate" title="' + (producto.nombre || 'Sin nombre') + '">';
                        html += '                ' + (producto.nombre || 'Sin nombre');
                        html += '            </h6>';

                        html += '            <small class="text-muted d-block mb-1">';
                        html += '                <strong>Código:</strong> ' + (producto.codigo_interno || 'N/A');
                        html += '            </small>';

                        html += '            <small class="text-muted d-block mb-1">';
                        html += '                <strong>Marca:</strong> ' + (producto.marca || 'N/A');
                        html += '            </small>';

                        html += '            <small class="text-muted d-block mb-1">';
                        html += '                <strong>Tipo:</strong> ' + (producto.tipo_producto || 'N/A');
                        html += '            </small>';

                        // Stock
                        let stockClass = producto.stock_actual > producto.stock_minimo ? 'text-success' : 'text-danger';
                        html += '            <small class="d-block mb-2 ' + stockClass + '">';
                        html += '                <strong>Stock:</strong> ' + (producto.stock_actual || 0) + ' unidades';
                        html += '            </small>';

                        // Botones de acción
                        html += '            <div class="btn-group btn-group-sm w-100">';
                        html += '                <button type="button" class="btn btn-primary btn-sm" onclick="seleccionar_producto_audifono_reparo(' + producto.id + ', ' + producto.precio_venta + ')" title="Seleccionar producto">';
                        html += '                    <i class="feather icon-check"></i> Seleccionar';
                        html += '                </button>';
                        html += '            </div>';

                        html += '        </div>';
                        html += '    </div>';
                        html += '</div>';
                    });

                    html += '</div>';
                } else {
                    html += '<div class="alert alert-warning text-center">';
                    html += '    <i class="feather icon-search"></i> ';
                    html += '    <strong>No se encontraron productos</strong><br>';
                    html += '    <small>Intente con otros términos de búsqueda</small>';
                    html += '</div>';
                }

                $('#lista_audifonos_reparo').html(html);
            }
        });
    }

    function dame_tipos_productos_reparo(){
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
                    $('#tipo_producto_busqueda_reparo').html(html);

                }
                else
                {
                    $('#tipo_producto_busqueda_reparo').html('<option value="">No hay registros</option>');
                }
            }
            else
            {
                $('#tipo_producto_busqueda_reparo').html('<option value="">No hay registros</option>');

                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al comunicarse con el servidor'
                });
            }
        });
    }

    function seleccionar_producto_audifono_reparo(id, precio) {
        // Lógica para seleccionar el producto de audífono para reparación
        console.log('Producto seleccionado para reparación:', id, precio);
        $('#id_producto_reparo').val(id);

        // Remover clase de seleccionado de todos los productos
        $('.resultado-busqueda .card').removeClass('producto-seleccionado border-success');

        // Agregar clase de seleccionado al producto actual
        $(event.target).closest('.card').addClass('producto-seleccionado border-success');

        // Mostrar mensaje de confirmación
        swal({
            title: 'Producto seleccionado',
            text: 'El producto ha sido seleccionado como reemplazo',
            icon: 'success',
            timer: 1500,
            buttons: false
        });
    }

    function limpiar_busqueda_reparo() {
        // Limpiar campos de búsqueda
        $('#tipo_producto_busqueda_reparo').val('1');
        $('#buscar_producto_reparo').val('');
        $('#lista_audifonos_reparo').html('');
        $('#id_producto_reparo').val('0');

        // Remover clases de selección
        $('.resultado-busqueda .card').removeClass('producto-seleccionado border-success');
    }
</script>
