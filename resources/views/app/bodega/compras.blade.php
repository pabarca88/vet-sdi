@extends('template.adm_cm.template')

@section('content')
    <!--Container Completo-->

    <div class="pcoded-main-container">

        <div class="pcoded-content">

            <div class="page-header">

                <div class="page-block">

                    <div class="row align-items-center">

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="page-header-title">

                                <h5 class="m-b-10 font-weight-bold">Compras</h5>

                            </div>

                            <ul class="breadcrumb">

                                <li class="breadcrumb-item">
                                    @if($institucion->id_tipo_institucion == 3)
                                    <a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('adm_cm.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                    @endif
                                </li>

                                <li class="breadcrumb-item"><a href="administracion_cm.php">Administracion del centro
                                        médico {{ $institucion->nombre }}</a></li>

                                <li class="breadcrumb-item"><a href="compras.php">Compras</a></li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <div class="row">

                    <div class="col-sm-12 col-md-12">

                        <div class="card mb-1">

                            <div class="card-header bg-info">

                                <div class="row">

                                    <div class="col-md-12 align-botton">

                                        <h4 class="text-white f-20 d-inline ml-4 mt-3">Compras</h4>



                                    </div>

                                </div>

                            </div>

                            <div class="card-body pb-0 pt-0">

                                <div class="row mt-0">

                                    <div class="col-md-12 ">

                                        <ul class="nav nav-tabs profile-tabs nav-fill bg-white rounded" id="tablas_examenes"
                                            role="tablist">

                                            <li class="nav-item">

                                                <a class="nav-link active" id="" data-toggle="pill"
                                                    href="#uno_nutri" role="tab" aria-controls="pills-home"
                                                    aria-selected="true">Facturas</a>

                                            </li>

                                            <li class="nav-item">

                                                <a class="nav-link" id="dos_nutri_tab" data-toggle="pill" href="#dos_nutri"
                                                    role="tab" aria-controls="pills-home" aria-selected="true">Análisis
                                                    por item</a>

                                            </li>

                                            <li class="nav-item">

                                                <a class="nav-link" id="tres_nutri_tab" data-toggle="pill"
                                                    href="#tres_nutri" role="tab" aria-controls="pills-home"
                                                    aria-selected="true" onclick="dameTodosProductos()">Compras total</a>

                                            </li>

                                            <li class="nav-item">

                                                <a class="nav-link" id="cuatro_nutri_tab" data-toggle="pill"
                                                    href="#cuatro_nutri" role="tab" aria-controls="pills-home"
                                                    aria-selected="true">Historial total</a>

                                            </li>
                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="tab-content" id="pills-tablas_calculo_nutri">

                            <!--FACTURAS-->

                            <div class="tab-pane fade show active" id="uno_nutri" role="tabpanel"
                                aria-labelledby="uno_nutri_tab">

                                <div class="row">

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2 mt-3">

                                        <h6 class="text-c-blue f-22 d-inline">Facturas</h6>

                                        <div class="btn-group float-right d-inline" role="group"
                                            aria-label="Basic example">

                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modalIngresoFactura"><i class="fas fa-plus"></i> Ingresar
                                                Factura</button>

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

                                </div>

                                <div class="form-row">

                                    <div class="col-md-3">

                                        <div class="card">

                                            <div class="card-body">

                                                <div class="form-group">

                                                    <label for="proveedor"
                                                        class="floating-label-activo-sm">Proveedor</label>

                                                    <select name="proveedor" class="form-control form-control-sm"
                                                        id="proveedor">

                                                        <option value="0">Seleccione</option>

                                                        @foreach ($proveedores as $proveedor)
                                                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                </div>

                                                <button class="btn btn-outline-primary btn-xxs btn-block mb-2"
                                                    onclick="buscarFacturasPorProveedor()"><i class="fas fa-search"></i>
                                                    Buscar</button>

                                                <table class="table table-xs w-100">

                                                    <thead>

                                                        <tr>

                                                            <th scope="col">Fecha</th>

                                                            <th scope="col">Nº Factura</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody id="tbody_compras_proveedor">

                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-9">

                                        <div class="card-previas">

                                            <div class="card-header-previas  px-2">

                                                <h6 class="t-aten mt-2">Información de la compra</h6>

                                            </div>

                                            <div class="card-body-previas px-2 py-2">

                                                <div class="px-2" id="informacion_compra">



                                                </div>

                                            </div>

                                        </div>

                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                        <div style="overflow-x:auto;">

                                                            <table id="inventario_insumos"
                                                                class="display table table-striped table-xs dt-responsive nowrap"
                                                                style="width:100%">

                                                                <thead>

                                                                    <tr>

                                                                        <th class="align-middle">Código</th>

                                                                        <th class="align-middle">Producto</th>

                                                                        <th class="align-middle">Cantidad</th>

                                                                        <th class="align-middle">Unidad de medida</th>

                                                                        <th class="align-middle">Marca</th>

                                                                        <th class="align-middle">Precio Unitario</th>

                                                                        <th class="align-middle">Total</th>

                                                                        <th class="align-middle"></th>

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





                            <!--ANÁLISIS POR ITEM-->

                            <div class="tab-pane fade show" id="dos_nutri" role="tabpanel"
                                aria-labelledby="dos_nutri_tab">

                                <div class="form-row">

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">

                                        <h6 class="text-c-blue f-20 d-inline">Análisis por item</h6>

                                    </div>

                                    <div class="col-md-12">

                                        <ul class="nav nav-tabs-secciones mb-3" id="pesos" role="tablist">

                                            @foreach ($tipos_producto as $tipo_producto)
                                                <li class="nav-item-secciones">

                                                    <a class="nav-secciones text-uppercase"
                                                        id="{{ $tipo_producto->nombre }}-tab" data-toggle="pill"
                                                        href="#producto_{{ $tipo_producto->id }}" role="tab"
                                                        aria-controls="peso_teoricoe" aria-selected="true"
                                                        href="javascript:void(0)"
                                                        onclick="dameProductosPorTipo({{ $tipo_producto->id }})">{{ $tipo_producto->nombre }}</a>

                                                </li>
                                            @endforeach

                                        </ul>

                                    </div>

                                </div>

                                <div class="tab-content" id="pills-tablas_calculo_nutricional">

                                    <div class="tab-pane fade show active" id="analisis" role="tabpanel"
                                        aria-labelledby="analisis_tab">



                                    </div>

                                    @foreach ($tipos_producto as $tipo_producto)
                                        <div class="tab-pane fade show" id="producto_{{ $tipo_producto->id }}"
                                            role="tabpanel" aria-labelledby="{{ $tipo_producto->nombre }}-tab">

                                            <div class="form-row">

                                                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">

                                                    <div class="card">

                                                        <div class="card-body">

                                                            <div class="form-group">

                                                                <label class="floating-label-activo-sm">Mes</label>

                                                                <select class="form-control form-control-sm"
                                                                    id="mes-{{ $tipo_producto->id }}">

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

                                                            <div class="form-group">

                                                                <label class="floating-label-activo-sm">Año</label>

                                                                <select class="form-control form-control-sm"
                                                                    id="anio-{{ $tipo_producto->id }}">

                                                                    <option value="0">Elija un año</option>

                                                                    @for ($i = 2021; $i <= date('Y'); $i++)
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }}</option>
                                                                    @endfor

                                                                </select>

                                                            </div>

                                                            <button class="btn btn-outline-primary btn-xxs my-2 w-100"
                                                                onclick="filtrarProductos(1)"><i
                                                                    class="fas fa-search"></i> Buscar</button>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10 ">

                                                    <div class="card">

                                                        <div class="card-body">

                                                            <div style="overflow-x:auto;"></div>

                                                            <table class="table"
                                                                id="inventario_tipo_producto_{{ $tipo_producto->id }}"
                                                                class="display table table-striped  table-xs dt-responsive nowrap w-100">

                                                                <thead>

                                                                    <tr>

                                                                        <th class="align-middle">Código</th>

                                                                        <th class="align-middle">Producto</th>

                                                                        <th class="align-middle">Tipo</th>

                                                                        <th class="align-middle">Cantidad</th>

                                                                        <th class="align-middle">Unidad de medida</th>

                                                                        <th class="align-middle">Marca</th>

                                                                        <th class="align-middle"></th>

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
                                    @endforeach

                                </div>

                            </div>



                            <!--COMPRAS TOTAL-->

                            <div class="tab-pane fade show" id="tres_nutri" role="tabpanel"
                                aria-labelledby="tres_nutri_tab">

                                <div class="form-row">

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2 mt-3">

                                        <h6 class="text-c-blue f-20 d-inline">Compras totales</h6>

                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">

                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                        <div class="form-group">

                                                            <label class="floating-label-activo-sm">Mes</label>

                                                            <select class="form-control form-control-sm" id="mes_total">

                                                                <option value="0">Seleccione</option>

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

                                                        <div class="form-group">

                                                            <label class="floating-label-activo-sm">Año</label>

                                                            <select class="form-control form-control-sm" id="anio_total">

                                                                <option value="0">Seleccione</option>

                                                                @for ($i = 2021; $i <= date('Y'); $i++)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}</option>
                                                                @endfor

                                                            </select>

                                                        </div>

                                                        <button class="btn btn-outline-primary btn-xxs my-2 w-100"
                                                            onclick="filtrarProductos(0)"><i class="fas fa-search"></i>
                                                            Buscar</button>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10 ">

                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                        <div style="overflow-x:auto;">

                                                            <table class="table" id="inventario"
                                                                class="display table table-striped table-xs dt-responsive nowrap w-100">

                                                                <thead>

                                                                    <tr>

                                                                        <th class="align-middle">Código</th>

                                                                        <th class="align-middle">Producto</th>

                                                                        <th class="align-middle">Tipo</th>

                                                                        <th class="align-middle">Cantidad</th>

                                                                        <th class="align-middle">Unidad de medida</th>

                                                                        <th class="align-middle">Marca</th>

                                                                        <th class="align-middle">Total</th>

                                                                        <th class="align-middle"></th>

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

            </div>

        </div>

    </div>

    <!-- MODAL DETALLE COMPRAS PRODUCTO -->


    <!-- Input hidden -->

    <input type="hidden" id="id_compra" value="0">

    <input type="hidden" id="elegir" value="SI">

    <input type="hidden" id="id_producto" value="0">

    <input type="hidden" id="id_tipo_productos" value="0">
@endsection

@section('js-profesionales')
    <script>
        var idUnico = 0; // Inicializa la variable fuera de la función



        function mensaje(msj, tipo) {

            swal({

                position: 'top-end',

                icon: tipo,

                title: msj,

                showConfirmButton: false,

                timer: 1500

            });

        }

        function evaluar_almacenamiento(){
            var almacenamiento = $('#almacenamiento').val();
            if(almacenamiento == 1){
                $('#fecha_vencimiento').prop('disabled', false);
                $('#tipo_almacenamiento').prop('disabled', false);
                $('#tipo_almacenamiento').val('0');
            } else {
                $('#fecha_vencimiento').prop('disabled', true);
                $('#fecha_vencimiento').val('');
                $('#tipo_almacenamiento').prop('disabled', true);
                $('#tipo_almacenamiento').val('0');
            }
        }

        function agregarItem() {

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

            var valido = 1;
            var mensaje = '';

            if (nombreProv === '') {
                mensaje += '<li>Debe ingresar un nombre de proveedor</li>';
                valido = 0;
            }
            if (provProd === '') {
                mensaje += '<li>Debe ingresar un tipo de producto</li>';
                valido = 0;
            }
            if (rut === '') {
                mensaje += '<li>Debe ingresar un rut de proveedor</li>';
                valido = 0;
            }
            if (email === '') {
                mensaje += '<li>Debe ingresar un email</li>';
                valido = 0;
            }
            if (telefono === '') {
                mensaje += '<li>Debe ingresar un teléfono</li>';
                valido = 0;
            }
            if (direccion === '') {
                mensaje += '<li>Debe ingresar una dirección</li>';
                valido = 0;
            }
            if (numero === '') {
                mensaje += '<li>Debe ingresar un número</li>';
                valido = 0;
            }
            if (idregion === '0') {
                mensaje += '<li>Debe seleccionar una región</li>';
                valido = 0;
            }
            if (idcomuna === '0') {
                mensaje += '<li>Debe seleccionar una comuna</li>';
                valido = 0;
            }
            if (rol === '0') {
                mensaje += '<li>Debe seleccionar un rol</li>';
                valido = 0;
            }

            if (valido === 0) {
                swal({
                    title: "Error al guardar el proveedor",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje
                        }
                    },
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                });
                return false;
            }

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
                    if (mensaje === 'OK') {
                        limpiarFormularioProveedor();
                        // ocultar el formulario
                        $('#form_agregar_proveedor').fadeOut('slow');
                        let proveedores = response.proveedores;
                        $('#proveedor_cab').empty();
                        $('#proveedor').empty();
                        $('#proveedor_cab').append('<option value="0">Elija un Proveedor</option>');
                        $('#proveedor').append('<option value="0">Elija un Proveedor</option>');
                        proveedores.forEach(proveedor => {
                            $('#proveedor_cab').append('<option value="' + proveedor.id + '">' +
                                proveedor.nombre + '</option>');
                            $('#proveedor').append('<option value="' + proveedor.id + '">' + proveedor
                                .nombre + '</option>');
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



        function guardarCompra() {

            var proveedor = $('#proveedor_cab').val();
            var fecha = $('#fecha').val();
            var nro_factura = $('#nro_factura').val();

            // validar que los campos no estén vacíos
            if (proveedor === '0') {
                // acceder a la funcion mensaje y enviarle los parametros
                return mensaje('Debe seleccionar un proveedor', 'error');
            }

            if (fecha === '') {
                return mensaje('Debe seleccionar una fecha', 'error');
            }

            if (nro_factura === '') {
                return mensaje('Debe ingresar un número de factura', 'error');
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
                    if (mensaje === 'OK') {
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
                            if (result) {
                                $('#contenedor_procedimiento').fadeIn('slow');
                            }
                        });

                        // limpiamos la tabla de productos
                        $('#productos_factura').DataTable().clear().draw();
                    } else if (mensaje === 'existe') {
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
                                    position: 'top-right',
                                    timer: 3000,
                                    timerProgressBar: true,
                                    toast: true,
                                });

                                $('#productos_factura').DataTable().clear().draw();

                                // mostrar los productos en la tabla

                                productos.forEach(producto => {

                                    console.log(producto);

                                    let precio_format = new Intl.NumberFormat('es-CL', {
                                        style: 'currency',
                                        currency: 'CLP'
                                    }).format(producto.precio_unitario);

                                    let total = parseInt(producto.precio_unitario) * parseInt(
                                        producto.cantidad);

                                    let total_format = new Intl.NumberFormat('es-CL', {
                                        style: 'currency',
                                        currency: 'CLP'
                                    }).format(total);

                                    $('#productos_factura').DataTable().row.add([

                                        producto.codigo_interno,

                                        producto.nombre,

                                        producto.cantidad,

                                        producto.unidad_medida,

                                        producto.marca,

                                        precio_format,

                                        total_format,

                                        '<button class="btn btn-danger btn-sm" onclick="eliminarItemFactura(' +
                                        producto.id_item +
                                        ')"><i class="fas fa-trash"></i></button>'

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



        function limpiarFormularioProveedor() {

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



        function buscarFacturasPorProveedor() {

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

                    let compras = response.compras;

                    $('#tbody_compras_proveedor').empty();

                    compras.forEach(compra => {

                        console.log(compra);

                        $('#tbody_compras_proveedor').append('<tr><td>' + compra.fecha_emision +
                            '</td><td><a href="javascript:void(0)" onclick="buscarProductosFactura(' +
                            compra.id + ')"> ' + compra.numero_factura + '</a></td></tr>');

                    });

                },

                error: function(response) {

                    console.log(response);

                }

            });

        }



        function buscarProductosFactura(idFactura) {

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

                    $(row).addClass('align-middle');

                }

            });



            $.ajax({

                type: 'POST',

                url: "{{ route('buscarProductosFactura') }}",

                data: data,

                success: function(response) {

                    console.log(response);

                    // pasar json a la tabla

                    let productos = response.productos;

                    let factura = response.factura;

                    $('#id_compra').val(factura.id);

                    $('#informacion_compra').html('<p>Fecha: ' + factura.fecha_emision + '<br>Proveedor: ' +
                        factura.proveedor + '<br>Factura: ' + factura.numero_factura + '<br>IVA: ' + factura
                        .iva + '<br>SubTotal: ' + factura.total + '</p>');

                    $('#inventario_insumos').DataTable().clear().draw();

                    productos.forEach(producto => {

                        console.log(producto);

                        let precio_format = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        }).format(producto.precio_unitario);

                        let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);

                        let total_format = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        }).format(total);

                        $('#inventario_insumos').DataTable().row.add([

                            producto.codigo_interno,

                            producto.nombre,

                            producto.cantidad,

                            producto.unidad_medida,

                            producto.marca,

                            precio_format,

                            total_format,

                            '<button class="btn btn-danger btn-icon" onclick="eliminarItemFactura(' +
                            producto.id_item + ')"><i class="fas fa-trash"></i></button>'

                        ]).draw();

                    });

                },

                error: function(response) {

                    console.log(response);

                }

            });

        }



        function guardarItemFactura() {
            var numero_serie = $('#numero_serie').val();
            var codigo_interno = $('#codigo_interno').val();
            var id_compra = $('#id_compra').val();
            var nombre_producto = $('#nombre').val();
            var precio_neto = $('#precio_neto').val();
            var precio_venta = $('#precio_venta').val();
            var precio_compra = $('#precio_compra').val();
            var precio = precio_neto;
            var stock_minimo = $('#stock_minimo').val();
            var stock_maximo = $('#stock_maximo').val();
            var tipo_producto = $('#producto').val();
            var unidad_medida = $('#um').val();
            var almacenamiento = $('#almacenamiento').val();
            var tipo_almacenamiento = $('#tipo_almacenamiento').val();
            var marca = $('#marca').val();
            var cantidad = $('#cantidad').val();
            var observaciones = $('#observaciones').val();
            var lote = $('#lote').val();
            var fecha_vencimiento = $('#fecha_vencimiento').val();
            var nuevo = document.getElementById("elegir").value;
            var bodega = $('#bodega').val();
            var id_producto = document.getElementById("id_producto").value;

            var imagen = $('#imagen').val();

            if (id_producto === '') id_producto = 0;
            var valido = 1;
            var mensaje = '';
            if (id_compra == '' || id_compra == 0) {
                mensaje += '<li>Debe seleccionar una compra</li>';
                valido = 0;
            }
            if(numero_serie === '') {
                mensaje += '<li>Debe ingresar un número de serie</li>';
                valido = 0;
            }
            if (codigo_interno === '') {
                mensaje += '<li>Debe ingresar un código interno</li>';
                valido = 0;
            }
            if (nombre_producto === '') {
                mensaje += '<li>Debe ingresar un nombre de producto</li>';
                valido = 0;
            }
            if (precio_neto === '') {
                mensaje += '<li>Debe ingresar un precio neto</li>';
                valido = 0;
            }
            if (precio_venta === '') {
                mensaje += '<li>Debe ingresar un precio de venta</li>';
                valido = 0;
            }
            if (precio_compra === '') {
                mensaje += '<li>Debe ingresar un precio de compra</li>';
                valido = 0;
            }
            if (stock_minimo === '') {
                mensaje += '<li>Debe ingresar un stock mínimo</li>';
                valido = 0;
            }
            if (stock_maximo === '') {
                mensaje += '<li>Debe ingresar un stock máximo</li>';
                valido = 0;
            }
            if (tipo_producto === '0') {
                mensaje += '<li>Debe seleccionar un tipo de producto</li>';
                valido = 0;
            }
            if (unidad_medida === '0') {
                mensaje += '<li>Debe seleccionar una unidad de medida</li>';
                valido = 0;
            }
            if (almacenamiento === '' || almacenamiento == 0) {
                mensaje += '<li>Debe ingresar un almacenamiento</li>';
                valido = 0;
            }
            if (almacenamiento == 1) {
                if (tipo_almacenamiento === '' || tipo_almacenamiento == 0) {
                    mensaje += '<li>Debe ingresar un tipo de almacenamiento</li>';
                    valido = 0;
                }
            }

            if (marca === '0') {
                mensaje += '<li>Debe seleccionar una marca</li>';
                valido = 0;
            }
            if (cantidad === '') {
                mensaje += '<li>Debe ingresar una cantidad</li>';
                valido = 0;
            }
            if (observaciones === '') {
                mensaje += '<li>Debe ingresar observaciones</li>';
                valido = 0;
            }
            if (lote === '') {
                mensaje += '<li>Debe ingresar un lote</li>';
                valido = 0;
            }
            if (fecha_vencimiento === '') {
                // mensaje += '<li>Debe ingresar una fecha de vencimiento</li>';
                // valido = 0;
            }
            if (bodega === '0') {
                mensaje += '<li>Debe seleccionar una bodega</li>';
                valido = 0;
            }

            if (valido === 0) {
                swal({
                    title: "Error al guardar el producto",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje
                        }
                    },
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                });
                return false;
            }

            var formData = new FormData();
            formData.append('nuevo', nuevo);
            formData.append('id_producto', id_producto);
            formData.append('id_compra', id_compra);
            formData.append('numero_serie', numero_serie);
            formData.append('codigo_interno', codigo_interno);
            formData.append('nombre_producto', nombre_producto);
            formData.append('cantidad', cantidad);
            formData.append('precio_compra', precio_compra);
            formData.append('precio_neto', precio_neto);
            formData.append('precio_venta', precio_venta);
            formData.append('stock_minimo', stock_minimo);
            formData.append('stock_maximo', stock_maximo);
            formData.append('tipo_producto', tipo_producto);
            formData.append('unidad_medida', unidad_medida);
            formData.append('almacenamiento', almacenamiento);
            formData.append('tipo_almacenamiento', tipo_almacenamiento);
            formData.append('marca', marca);
            formData.append('observaciones', observaciones);
            formData.append('lote', lote);
            formData.append('fecha_vencimiento', fecha_vencimiento);
            formData.append('bodega', bodega);

            // Adjuntar el archivo
            var imagen = $('#imagen')[0].files[0];
            formData.append('imagen', imagen);

            // Enviar el FormData usando AJAX
            $.ajax({
                url: "{{ route('guardarItemFactura') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    let mensaje = response.mensaje;
                    let productos = response.productos;
                    if (mensaje === 'OK') {
                        $('#productos_factura').DataTable().clear().draw();
                        productos.forEach(producto => {
                            console.log(producto);
                            let precio_format = new Intl.NumberFormat('es-CL', {
                                style: 'currency',
                                currency: 'CLP'
                            }).format(producto.precio_unitario);
                            let total = parseInt(producto.precio_unitario) * parseInt(producto
                            .cantidad);
                            let total_format = new Intl.NumberFormat('es-CL', {
                                style: 'currency',
                                currency: 'CLP'
                            }).format(total);
                            $('#productos_factura').DataTable().row.add([
                                producto.codigo_interno,
                                producto.nombre,
                                producto.cantidad,
                                producto.unidad_medida,
                                producto.marca,
                                precio_format,
                                total_format,
                                '<button class="btn btn-danger btn-icon" onclick="eliminarItemFactura(' +
                                producto.id_item + ')"><i class="fas fa-trash"></i></button>'
                            ]).draw();
                        });
                        swal({
                            title: "Producto guardado correctamente",
                            text: "¿Desea agregar otro producto?",
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
                            text: "¿Desea intentar nuevamente? " + mensaje,
                            icon: "error",
                            buttons: true,
                            dangerMode: true,
                        }).then((result) => {
                            console.log(result);
                        })
                    }
                },
                error: function(xhr, status, error) {
                    // Manejar el error
                    console.error(error);
                }
            });

        }



        function eliminarItemFactura(idProducto) {

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

                    if (mensaje === 'OK') {

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



        function nuevoItem() {
            // cerrar el buscador de productos
            ocultarBuscadorProducto();
            $('#codigo_interno').val('');
            $('#nombre').val('');
            $('#precio').val('');
            $('#stock_minimo').val('');
            $('#stock_maximo').val('');
            $('#producto').val(0);
            $('#um').val(0);
            $('#almacenamiento').val(0);
            $('#tipo_almacenamiento').val(0);
            $('#marca').val(0);
            $('#cantidad').val('');
            $('#observaciones').val('');
            $('#fecha_vencimiento').val('');
            $('#lote').val('');
            $('#contenedor_procedimiento').removeClass('d-none').hide().fadeIn('slow');
            $('#elegir').val("SI");
        }



        function dameNuevaMedida() {

            $('#divNuevaMedida').removeClass('d-none').hide().fadeIn('slow');

        }



        function ocultarNuevaMedida() {

            $('#divNuevaMedida').fadeOut('slow');

        }



        function dameNuevaMarca() {

            $('#divNuevaMarca').removeClass('d-none').hide().fadeIn('slow');

        }



        function agregarMarcaNueva() {

            var marca = $('#nueva_marca').val();

            // validar el ingreso de marca

            if (marca === '') {

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

                    if (mensaje === 'OK') {

                        let marcas = response.marcas;

                        $('#marca').empty();

                        $('#marca').append('<option value="0">Elija una Marca</option>');

                        marcas.forEach(m => {

                            console.log(m, marca);

                            let selected = (marca === m.id) ? 'selected' : '';

                            $('#marca').append('<option value="' + m.id + '" ' + selected + '>' + m
                                .nombre + '</option>');

                        });

                        swal({

                            title: "Marca guardada correctamente",

                            text: "Puede seleccionarla en el campo Marca",

                            icon: "success",

                            button: "Aceptar",

                            position: 'top-right',

                            timer: 3000,

                            timerProgressBar: true,

                            toast: true,

                        });



                        $('#nueva_marca').val('');

                        ocultarNuevaMarca();

                    } else if (mensaje === 'existe') {

                        swal({

                            title: "La marca ya existe",

                            text: "¿Desea seleccionarla en el campo Marca?",

                            icon: "warning",

                            buttons: true,

                            dangerMode: true,



                        }).then((result) => {

                            console.log(result);

                        });

                    } else {

                        swal({

                            title: "Error al guardar la marca",

                            text: "¿Desea intentar nuevamente?",

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



        function guardarNuevaMedida() {

            var medida = $('#nueva_medida').val();

            // validar el ingreso de medida

            if (medida === '') {

                swal({

                    title: "Debe ingresar una medida",

                    text: "Desea intentar nuevamente?",

                    icon: "error",

                    buttons: true,

                    dangerMode: true,



                }).then((result) => {

                    console.log(result);

                    if (result) {

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

                    if (mensaje === 'OK') {

                        let medidas = response.unidades_medidas;

                        $('#um').empty();

                        $('#um').append('<option value="0">Elija una Unidad de Medida</option>');

                        medidas.forEach(medida => {

                            $('#um').append('<option value="' + medida.id + '">' + medida.nombre +
                                '</option>');

                        });

                        swal({

                            title: "Medida guardada correctamente",

                            text: "Puede seleccionarla en el campo Unidad de Medida",

                            icon: "success",

                            button: "Aceptar",

                            position: 'top-right',

                            timer: 3000,

                            timerProgressBar: true,

                            toast: true,

                        })



                        $('#nueva_medida').val('');

                        ocultarNuevaMedida();

                    } else if (mensaje === 'existe') {

                        swal({

                            title: "La medida ya existe",

                            text: "Desea seleccionarla en el campo Unidad de Medida?",

                            icon: "warning",

                            buttons: true,

                            dangerMode: true,



                        }).then((result) => {

                            console.log(result);

                        })

                    } else {

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



        function ocultarNuevaMarca() {

            $('#divNuevaMarca').fadeOut('slow');

        }



        function dameProductosPorTipo(idTipo) {

            var url = '/buscarProductosTipo/' + idTipo;

            // Inicializa tu DataTable con la opción createdRow

            var table = $('#inventario_tipo_producto_' + idTipo).DataTable({

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

                    let productos = response.productos;

                    $('#inventario_tipo_producto_' + idTipo).DataTable().clear().draw();



                    productos.forEach(producto => {

                        console.log(producto);

                        let precio_format = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        }).format(producto.precio_unitario);

                        let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);

                        let total_format = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        }).format(total);

                        $('#inventario_tipo_producto_' + idTipo).DataTable().row.add([

                            producto.codigo_interno,

                            producto.nombre_producto,

                            producto.tipo_producto,

                            producto.cantidad,

                            producto.unidad_medida,

                            producto.marca,

                            '<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button><button class="btn btn-warning btn-sm" onclick="detalleCompraProducto(' +
                            producto.id + ')">D</button>'

                        ]).draw();

                    });

                },

                error: function(response) {

                    console.log(response);

                }

            });

        }



        function detalleCompraProducto(idProducto) {
            var url = '/detalleCompraProducto/' + idProducto;
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
                        let precio_formateado = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        }).format(compra.precio_compra);
                        let total_formateado = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        }).format(compra.precio_compra * compra.cantidad);
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



        function dameTodosProductos() {

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

                    let productos = response.productos;

                    $('#inventario').DataTable().clear().draw();



                    productos.forEach(producto => {

                        console.log(producto);

                        let precio_format = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        }).format(producto.precio_unitario);

                        let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);

                        let total_format = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        }).format(total);

                        $('#inventario').DataTable().row.add([

                            producto.codigo_interno,

                            producto.nombre_producto,

                            producto.tipo_producto,

                            producto.cantidad,

                            producto.unidad_medida,

                            producto.marca,

                            total_format,

                            '<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button><button class="btn btn-warning btn-sm" onclick="detalleCompraProducto(' +
                            producto.id + ')">D</button>'

                        ]).draw();

                    });

                },

                error: function(response) {

                    console.log(response);

                }

            });



        }



        function mostrarBuscadorProducto() {

            cancelarItemFactura();

            $('#divBuscarProducto').removeClass('d-none').hide().fadeIn('slow');

            $('#div_contenedor_productos').removeClass('d-none').hide().fadeIn('slow');

        }



        function ocultarBuscadorProducto() {

            $('#divBuscarProducto').fadeOut('slow');

            $('#div_contenedor_productos').fadeOut('slow');

            // limpiar tabla

            $('#contenedor_productos').DataTable().clear().draw();

            // limpiar el input de búsqueda

            $('#buscar_producto').val('');

        }



        function buscarProducto() {

            var producto = $('#buscar_producto').val();

            var idproveedor = $('#proveedor_cab').val();

            if (idproveedor == 0) {

                alert('Debe seleccionar un proveedor');

                return false;

            }

            var url = '{{ route('buscarProductos') }}';



            // Inicializa tu DataTable con la opción createdRow

            var table = $('#contenedor_productos').DataTable({

                destroy: true,

                createdRow: function(row, data, dataIndex) {

                    $(row).addClass('align-middle');

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

                data: {
                    producto: producto,
                    idproveedor: idproveedor
                },

                success: function(response) {

                    // pasar json a la tabla

                    let productos = response.productos;

                    $('#contenedor_productos').DataTable().clear().draw();

                    productos.forEach(producto => {

                        console.log(producto);

                        let precio_format = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        }).format(producto.precio_unitario);

                        let total = parseInt(producto.precio_unitario) * parseInt(producto.cantidad);

                        let total_format = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        }).format(total);

                        $('#contenedor_productos').DataTable().row.add([

                            producto.nombre_producto,

                            producto.proveedor,

                            producto.marca,

                            precio_format,

                            '<button class="btn btn-success-light-c btn-xxs d-inline float-right mb-2" onclick="agregarProducto(' +
                            producto.id + ')">Agregar</button>'

                        ]).draw();

                    });

                },

                error: function(response) {

                    console.log(response.responseText);

                }

            });

        }



        function cancelarItemFactura() {

            $('#contenedor_procedimiento').fadeOut('slow');

        }



        function agregarProducto(idproducto) {

            seleccionarProducto(idproducto);

            $('#id_producto').val(idproducto);

        }



        function seleccionarProducto(idproducto) {

            var url = '/Administracion/seleccionarProducto/' + idproducto;



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
                    $('#stock_minimo').val(producto.stock_minimo);
                    $('#stock_maximo').val(producto.stock_maximo);
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



        function filtrarProductos(tipo) {

            var id_tipo_productos = $('#id_tipo_productos').val();

            if (tipo == 1) {

                var mes = $('#mes-' + id_tipo_productos).val();

                var anio = $('#anio-' + id_tipo_productos).val();

            } else {

                var mes = $('#mes_total').val();

                var anio = $('#anio_total').val();

            }



            var url = '{{ route('filtrarProductos') }}';



            // Inicializa tu DataTable con la opción createdRow

            var table = $('#inventario_tipo_producto_' + id_tipo_productos).DataTable({

                destroy: true,

                createdRow: function(row, data, dataIndex) {

                    $(row).addClass('align-middle');

                }

            });



            console.log(id_tipo_productos, mes, anio, tipo);



            // headers

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });



            $.ajax({

                type: 'post',

                url: url,

                data: {
                    id_tipo_productos: id_tipo_productos,
                    mes: mes,
                    anio: anio,
                    tipo: tipo
                },

                success: function(response) {

                    console.log(response);

                    // pasar json a la tabla

                    let productos = response;





                    if (tipo == 1) {

                        $('#inventario_tipo_producto_' + id_tipo_productos).DataTable().clear().draw();

                        productos.forEach(producto => {

                            console.log(producto);

                            let precio_format = new Intl.NumberFormat('es-CL', {
                                style: 'currency',
                                currency: 'CLP'
                            }).format(producto.precio_unitario);

                            let total = parseInt(producto.precio_unitario) * parseInt(producto
                            .cantidad);

                            let total_format = new Intl.NumberFormat('es-CL', {
                                style: 'currency',
                                currency: 'CLP'
                            }).format(total);

                            $('#inventario_tipo_producto_' + id_tipo_productos).DataTable().row.add([

                                producto.codigo_interno,

                                producto.nombre_producto,

                                producto.tipo_producto,

                                producto.cantidad,

                                producto.unidad_medida,

                                producto.marca,

                                precio_format,

                                '<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button><button class="btn btn-warning btn-sm" onclick="detalleCompraProducto(' +
                                producto.id + ')">D</button>'

                            ]).draw();

                        });

                    } else {

                        $('#inventario').DataTable().clear().draw();

                        productos.forEach(producto => {

                            console.log(producto);

                            let precio_format = new Intl.NumberFormat('es-CL', {
                                style: 'currency',
                                currency: 'CLP'
                            }).format(producto.precio_unitario);

                            let total = parseInt(producto.precio_unitario) * parseInt(producto
                            .cantidad);

                            let total_format = new Intl.NumberFormat('es-CL', {
                                style: 'currency',
                                currency: 'CLP'
                            }).format(total);

                            $('#inventario').DataTable().row.add([

                                producto.codigo_interno,

                                producto.nombre_producto,

                                producto.tipo_producto,

                                producto.cantidad,

                                producto.unidad_medida,

                                producto.marca,

                                precio_format,

                                '<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button><button class="btn btn-warning btn-sm" onclick="detalleCompraProducto(' +
                                producto.id + ')">D</button>'

                            ]).draw();

                        });

                    }



                },

                error: function(response) {

                    console.log(response.responseText);

                }

            });

        }





        $(document).ready(function() {

            /* Sacar la funcion "agregarPieza de este ámbito */

            $('.btn-agregar-procedimiento').click(function() {

                agregarItem();

            });

            // al div con id contenedor_procedimiento a todos los input agregar el atributo disabled

            $('#contenedor_procedimiento input').attr('disabled', true);

        });







        $(document).ready(function() {

            $('#tipo').DataTable({

                responsive: true,

            });

        });



        $(document).ready(function() {

            $('#inventario').DataTable({

                responsive: true,

            });

        });





        $(document).ready(function() {

            $('#productos_factura').DataTable({

                responsive: true,

            });

        });



        $(document).ready(function() {

            $('#contenedor_productos').DataTable({

                responsive: true,

            });

        });
    </script>
@endsection

@section('modales')
<!-- MODAL DETALLE COMPRAS PRODUCTO -->
<div class="modal fade" id="modalDetalleCompraProducto" tabindex="-1" role="dialog" aria-labelledby="modalDetalleCompraProducto" aria-hidden="true">
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

<!-- Modal -->

<div class="modal fade" id="modalIngresoFactura" tabindex="-1" role="dialog" aria-labelledby="modalIngresoFactura" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingreso Factura</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bg-light">
            <div id="titulo-factura-fila2">

                 <div class="card">

                    <div class="card-body pb-1">
                        <div class="form-row">
                            <div class="col-md-3 form-group">
                                <label for="proveedor" class="floating-label-activo-sm">Proveedor</label>
                                <div class="d-flex justify-content-between">
                                    <select name="proveedor" class="form-control form-control-sm" id="proveedor_cab">
                                        <option value="0">Seleccione</option>
                                        @foreach ($proveedores as $proveedor)
                                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary btn-sm" onclick="agregarProveedor()"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="fecha" class="floating-label-activo-sm">Fecha de factura</label>
                                <input type="date" class="form-control form-control-sm" id="fecha">
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="nro_factura" class="floating-label-activo-sm">Nº Factura</label>
                                <input type="text" class="form-control form-control-sm" id="nro_factura">
                            </div>

                            <div class="col-md-3 d-flex align-items-start">
                                <button class="btn btn-info btn-sm btn-block" onclick="guardarCompra()"><i class="feather icon-save"></i> Guardar</button>
                            </div>
                        </div>

                        <div id="form_agregar_proveedor" class="d-none">
                            <form action="{{ ROUTE('guardarProveedor') }}" method="post" onsubmit="return guardarProveedor(event);">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Proveedor</label>
                                            <input class="form-control form-control-sm" name="nombre_prov" id="nombre_prov" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Productos</label>
                                            <select name="prov_prod" id="prov_prod" class="form-control form-control-sm">
                                                <option value="0">Seleccione</option>
                                                @foreach($tipos_producto as $producto)
                                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Rut</label>
                                            <input class="form-control form-control-sm" oninput="formatoRut(this)" name="rut" id="rut" type="text">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Rol</label>
                                            <input class="form-control form-control-sm" name="rol" id="rol" type="text">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Correo Electrónico</label>
                                            <input class="form-control form-control-sm" name="email" id="email" type="email">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group">

                                            <label class="floating-label-activo-sm">Teléfono</label>

                                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >

                                        </div>

                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group">

                                            <label class="floating-label-activo-sm">Teléfono (opcional)</label>

                                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >

                                        </div>

                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group">

                                            <label class="floating-label-activo-sm">Dirección / Calle</label>

                                            <input class="form-control form-control-sm" name="direccion" id="direccion" type="text">

                                        </div>

                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group fill">

                                            <label class="floating-label-activo-sm">Número</label>

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
                                            <select id="comunas" name="comunas" class="form-control form-control-sm">
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger  btn-xxs mb-0" onclick="cerrarProveedor()"><i class="feather icon-x"></i> Cancelar</button>
                                    <button type="submit" class="btn btn-info  btn-xxs mb-0"><i class="feather icon-plus"></i> Agregar proveedor</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>



                <!-- DETALLE  -->

                <div class="card">

                    <div class="card-header bg-white">

                        <h6 class="t-aten d-inline">Detalle</h6>

                        <button type="button" class="btn btn-secondary-light-c btn-xxs btn-buscar-producto d-inline float-right mb-2" onclick="mostrarBuscadorProducto()"><i class="feather icon-search"></i> Buscar item</button>

                        <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-procedimiento d-inline float-right mr-2  mb-2" onclick="nuevoItem()"><i class="feather icon-plus"></i> Nuevo item</button>

                    </div>

                    <div class="card-body pb-1">

                        <div class="form-row ">

                            <div class="col-md-12 mt-0 mb-3">

                                <div class="input-group"id="divBuscarProducto">

                                    <label for="buscar_producto" class="floating-label-activo-sm">Código Producto</label>

                                      <input type="text" class="form-control form-control-sm" id="buscar_producto">

                                      <div class="input-group-append" id="button-addon4">

                                            <button class="btn btn-info-light-c btn-sm d-inline float-left mb-2"  onclick="buscarProducto()"><i class="feather icon-search"></i> Buscar</button>

                                            <button class="btn btn-danger-light-c btn-sm d-inline float-right mb-2"  onclick="ocultarBuscadorProducto()"><i class="feather icon-x"></i> Cancelar</button>

                                      </div>

                                </div>

                            </div>

                            <div class="col-md-12" id="div_contenedor_productos">

                                <div style="overflow-x:auto;"></div>

                                <table class="display table table-striped table-xs dt-responsive nowrap" id="contenedor_productos" style="width:100%">

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

                            <div class="form-row" id="procedimiento">

                                <div class="form-group col-md-3">

                                    <label for="numero_serie" class="floating-label-activo-sm">Número de serie</label>

                                    <input type="text" class="form-control form-control-sm" id="numero_serie">

                                </div>

                                <div class="form-group col-md-3">

                                    <label for="codigo_interno" class="floating-label-activo-sm">Código interno</label>

                                    <input type="text" class="form-control form-control-sm" id="codigo_interno">

                                </div>

                                <div class="form-group col-md-3">

                                    <label for="nombre" class="floating-label-activo-sm">Nombre</label>

                                    <input type="text" class="form-control form-control-sm" id="nombre">

                                </div>

                                <div class="form-group col-md-3">

                                    <label for="producto" class="floating-label-activo-sm">Producto</label>

                                    <select name="producto" class="form-control form-control-sm" id="producto">

                                        <option value="0">Seleccione</option>

                                        @foreach ($tipos_producto as $tp)
                                            @if($tp->id_tipo_institucion == 3 && $tp->id_tipo_institucion != 8)
                                            <option value="{{$tp->id}}">{{$tp->nombre}}</option>
                                            @endif
                                        @endforeach

                                    </select>

                                </div>


                                <div class="form-group col-md-3">

                                    <label for="precio_compra" class="floating-label-activo-sm">Precio Compra</label>

                                    <input type="number" class="form-control form-control-sm" id="precio_compra">

                                </div>

                                <div class="form-group col-md-3">

                                    <label for="precio_neto" class="floating-label-activo-sm">Precio Neto</label>

                                    <input type="number" class="form-control form-control-sm" id="precio_neto">

                                </div>

                                <div class="form-group col-md-3">

                                    <label for="precio_venta" class="floating-label-activo-sm">Precio Venta</label>

                                    <input type="number" class="form-control form-control-sm" id="precio_venta">

                                </div>

                                <div class="form-group col-md-3">

                                    <label for="stock_minimo" class="floating-label-activo-sm">Stock Minimo</label>

                                    <input type="number" class="form-control form-control-sm" id="stock_minimo">

                                </div>

                                <div class="form-group col-md-3">

                                    <label for="stock_maximo" class="floating-label-activo-sm">Stock Maximo</label>

                                    <input type="number" class="form-control form-control-sm" id="stock_maximo">

                                </div>

                                <div class="form-group fill col-md-3">



                                    <label for="marca" class="floating-label-activo-sm">Marca</label>

                                    <div class="d-flex">

                                        <select name="marca" class="form-control form-control-sm" id="marca">

                                            <option value="0">Seleccione</option>

                                            @foreach($marcas as $marca)

                                                <option value="{{$marca->id}}">{{$marca->nombre}}</option>

                                            @endforeach

                                        </select>

                                        <button class="btn btn-primary btn-sm" onclick="dameNuevaMarca()"><i class="fas fa-plus"></i></button>

                                    </div>

                                    <div class="d-none mt-3" id="divNuevaMarca">

                                        <div class="form-group">

                                            <label for="nueva_marca" class="floating-label-activo-sm">Marca</label>

                                            <input type="text" class="form-control form-control-sm" id="nueva_marca">

                                        </div>

                                        <button class="btn btn-info-light-c btn-xxs" onclick="agregarMarcaNueva()"><i class="feather icon-save"></i></button>

                                        <button class="btn btn-danger-light-c btn-xxs" onclick="ocultarNuevaMarca()">Ocultar</button>

                                    </div>

                                </div>



                                <div class="form-group col-md-3">

                                    <label for="imagen" class="floating-label-activo-sm">Imagen</label>

                                    <input type="file" class="form-control form-control-sm" id="imagen">

                                </div>

                                <div class="form-group col-md-3">

                                    <label for="um" class="floating-label-activo-sm">Unidad de medida</label>

                                    <div class="d-flex">

                                        <select name="um" class="form-control form-control-sm" id="um">

                                            <option value="0">Seleccione</option>

                                            @foreach($unidades_medidas as $um)

                                                <option value="{{$um->id}}">{{$um->nombre}}</option>

                                            @endforeach

                                        </select>

                                        <button class="btn btn-primary btn-sm" onclick="dameNuevaMedida()"><i class="fas fa-plus"></i></button>

                                    </div>



                                    <div class="d-none mt-3" id="divNuevaMedida">

                                        <div class="form-group">

                                            <label for="nueva_medida" class="floating-label-activo-sm">Unidad de medida</label>

                                            <input type="text" class="form-control form-control-sm" id="nueva_medida">

                                        </div>

                                        <button class="btn btn-info-light-c btn-xxs" onclick="guardarNuevaMedida()"><i class="feather icon-save"></i></button>

                                        <button class="btn btn-danger-light-c btn-xxs" onclick="ocultarNuevaMedida()">Ocultar</button>

                                    </div>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="fecha_vencimiento" class="floating-label-activo-sm">¿Almacenamiento?</label>
                                    <select name="almacenamiento" id="almacenamiento" class="form-control form-control-sm" onchange="evaluar_almacenamiento()">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="fecha_vencimiento" class="floating-label-activo-sm">Tipo de Almacenamiento</label>
                                    <select name="tipo_almacenamiento" id="tipo_almacenamiento" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        @foreach($tipos_almacenamiento as $ta)
                                            <option value="{{$ta->id}}">{{$ta->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="fecha_vencimiento" class="floating-label-activo-sm">Fecha de Vencimiento</label>
                                    <input type="date" class="form-control form-control-sm" id="fecha_vencimiento">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bodega" class="floating-label-activo-sm">Bodega</label>
                                    <select name="bodega" id="bodega" class="form-control form-control-sm">

                                        <option value="0">Seleccione</option>
                                        @if(isset($bodegas))
                                        @foreach($bodegas as $b)

                                            <option value="{{$b->id}}">{{$b->nombre}}</option>

                                        @endforeach
                                        @endif
                                    </select>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cantidad" class="floating-label-activo-sm">Cantidad a ingresar</label>
                                    <input type="number" class="form-control form-control-sm" id="cantidad">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="lote" class="floating-label-activo-sm">Lote</label>
                                    <input type="text" class="form-control form-control-sm" id="lote">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="observaciones" class="floating-label-activo-sm">Observaciones</label>
                                    <textarea name="observaciones" id="observaciones" cols="30" rows="3" class="form-control"></textarea>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12 text-right py-2">

                                    <button class="btn btn-info-light-c btn-xxs d-inline  mb-2" onclick="guardarItemFactura()"><i class="feather icon-save"></i> Guardar item</button>

                                    <button class="btn btn-danger-light-c btn-xxs d-inline  mb-2" onclick="cancelarItemFactura()"><i class="feather icon-x"></i> Cancelar</button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                <div style="overflow-x:auto;">

                                <table id="productos_factura" class="display table table-striped table-xs dt-responsive nowrap" style="width:100%">

                                    <thead>

                                        <tr>

                                            <th>Código</th>

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

                            </div>

                        </div>

                    </div>

                </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>

        </div>

      </div>

    </div>

</div>


@endsection
